<?php
    session_start();
    include '../../db.php';

    if(isset($_SESSION['form_submitted'])) {
        echo '<script>window.alert("You have already submitted the form!")</script>';
        echo '<script>window.location.replace("../viewhealthrecord.php");</script>';
        exit;
    }
    
    // Process the form submission
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ... Your form processing code here ...
        
        // Mark the form as submitted
        $_SESSION['form_submitted'] = true;
        

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $contact = trim(mysqli_real_escape_string($conn, $_POST['contact']));
        $age = trim(mysqli_real_escape_string($conn, $_POST['age']));
        $birthday = trim(mysqli_real_escape_string($conn, $_POST['birthday']));
        $gender = trim(mysqli_real_escape_string($conn, $_POST['gender']));
        $role = trim(mysqli_real_escape_string($conn, $_POST['role']));
        $gradecourse = trim(mysqli_real_escape_string($conn, $_POST['gradecourse']));
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $fathername = trim(mysqli_real_escape_string($conn, $_POST['fathername']));
        $cfather = trim(mysqli_real_escape_string($conn, $_POST['cfather']));
        $mothername = trim(mysqli_real_escape_string($conn, $_POST['mothername']));
        $cmother = trim(mysqli_real_escape_string($conn, $_POST['cmother']));
        $polio = isset($_POST['polio']) ? trim(mysqli_real_escape_string($conn, $_POST['polio'])) : "";
        $measles = isset($_POST['measles']) ? trim(mysqli_real_escape_string($conn, $_POST['measles'])) : "";
        $tb = isset($_POST['tb']) ? trim(mysqli_real_escape_string($conn, $_POST['tb'])) : "";
        $seizure_epilepsy = isset($_POST['seizure_epilepsy']) ? trim(mysqli_real_escape_string($conn, $_POST['seizure_epilepsy'])) : "";
        $tetanus = isset($_POST['tetanus']) ? trim(mysqli_real_escape_string($conn, $_POST['tetanus'])) : "";
        $mumps = isset($_POST['mumps']) ? trim(mysqli_real_escape_string($conn, $_POST['mumps'])) : "";
        $hepatits = isset($_POST['hepatits']) ? trim(mysqli_real_escape_string($conn, $_POST['hepatits'])) : "";
        $bleeding_tendencies = isset($_POST['bleeding_tendencies']) ? trim(mysqli_real_escape_string($conn, $_POST['bleeding_tendencies'])) : "";
        $chicken_pox = isset($_POST['chicken_pox']) ? trim(mysqli_real_escape_string($conn, $_POST['chicken_pox'])) : "";
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $fainting_spells = isset($_POST['fainting_spells']) ? trim(mysqli_real_escape_string($conn, $_POST['fainting_spells'])) : "";
        $eye_disorder = isset($_POST['eye_disorder']) ? trim(mysqli_real_escape_string($conn, $_POST['eye_disorder'])) : "";
        $heart = trim(mysqli_real_escape_string($conn, $_POST['heart']));
        $illness = trim(mysqli_real_escape_string($conn, $_POST['illness']));
        $allergyfood = trim(mysqli_real_escape_string($conn, $_POST['allergyfood']));
        $allergymed = trim(mysqli_real_escape_string($conn, $_POST['allergymed']));
        $allow_not = trim(mysqli_real_escape_string($conn, $_POST['allow_not']));
        $medications = trim(mysqli_real_escape_string($conn, $_POST['medications']));
        $nameperson = trim(mysqli_real_escape_string($conn, $_POST['nameperson']));
        $personcp = trim(mysqli_real_escape_string($conn, $_POST['personcp']));
        $relationship = trim(mysqli_real_escape_string($conn, $_POST['relationship']));

        $sql = "INSERT INTO healthrecord VALUES ('','$user_id','$fullname','$idnumber','$contact','$age','$birthday','$gender','$role','$gradecourse','$address','$fathername','$cfather','$mothername','$cmother','$polio','$measles','$tb','$seizure_epilepsy','$tetanus','$mumps','$hepatits','$bleeding_tendencies','$chicken_pox','$asthma','$fainting_spells','$eye_disorder','$heart','$illness','$allergyfood','$allergymed','$allow_not','$medications','$nameperson','$personcp','$relationship')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../healthrecordform.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Your health record has been submitted.</h2>
                </div>
            ";
        }
    }
}

    if(isset($_POST['signup'])){
        $fullname = $_POST['fullname'];
        $type = $_POST['type'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if(substr($email, -16) != '@dwc-legazpi.edu'){
            echo $_SESSION['failed'] = "
                <div>
                    <p style='font-size: 12px; color: red;'>Email is not a valid email. Please try again.</p>
                </div>
            ";
            header('Location: ../signup.php');
        } else {
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            if(mysqli_num_rows($query) > 0){
                echo $_SESSION['failed'] = "
                    <div>
                        <p style='font-size: 12px; color: red;'>Email is already taken. Please try again.</p>
                    </div>
                ";
                header('Location: ../signup.php');
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                $sql_add = "INSERT INTO `users`(`type`, `fullname`, `email`, `password`) VALUES ('$type','$fullname','$email','$hashedPassword')";
                if($conn->query($sql_add) === TRUE){
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = mysqli_fetch_array($result);
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['type'] = $row['type'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: ../healthrecorddashboard.php');
                    }
                }
            }
        }
    }
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $hashedPassword = $row['password'];
    
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];
                header('Location: ../healthrecorddashboard.php');
            } else {
                echo $_SESSION['failed'] = "
                    <div>
                        <p style='font-size: 12px; color: red;'>Invalid email or password. Please try again.</p>
                    </div>
                ";
                header('Location: ../login.php');
            }
        } else {
            echo $_SESSION['failed'] = "
                <div>
                    <p style='font-size: 12px; color: red;'>Invalid email or password. Please try again.</p>
                </div>
            ";
            header('Location: ../login.php');
        }
    }
    
    if(isset($_POST['submit_dental'])){ // pag get ng data
      
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $dental_service = $_POST['dental_service'];
        $c_enrolled = $_POST['c_enrolled'];
        $message = $_POST['message'];
        $date_created = date('Y-m-d');

        $sql = "INSERT INTO dental VALUES ('','$user_id','$idnumber','$name','$dental_service','$c_enrolled','$message','$date_created')";
       
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../adddentalmessage.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        }
    }
?>