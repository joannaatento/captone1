<?php
    session_start();
    include '../../db.php';


    if(isset($_POST['signup'])){
        $username = $_POST['username'];
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
            $query = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username'");
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
    
                $sql_add = "INSERT INTO `admins`(`username`, `email`, `password`) VALUES ('$username','$email','$hashedPassword')";
                if($conn->query($sql_add) === TRUE){
                    $sql = "SELECT * FROM admins WHERE username = '$username'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = mysqli_fetch_array($result);
                        $_SESSION['admin_id'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: ../healthrecorddashboard.php');
                    }
                }
            }
        }
    }
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM admins WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $hashedPassword = $row['password'];
    
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                header('Location: ../healthrecorddashboard.php');
            } else {
                echo $_SESSION['failed'] = "
                    <div>
                        <p style='font-size: 12px; color: red;'>Invalid username or password. Please try again.</p>
                    </div>
                ";
                header('Location: ../login.php');
            }
        } else {
            echo $_SESSION['failed'] = "
                <div>
                    <p style='font-size: 12px; color: red;'>Invalid username or password. Please try again.</p>
                </div>
            ";
            header('Location: ../login.php');
        }
    }
    

    if(isset($_POST['submit_dental'])){ // pag get ng data
        
        $user_id = $_POST['user_id']; 
        $idnumber = $_POST['idnumber']; 
        $patient_name = $_POST['patient_name'];
        $date = $_POST['date'];
        $dentist_name = $_POST['dentist_name'];

        $sql = "INSERT INTO dental VALUES ('','$user_id','$idnumber','$patient_name','$date','$dentist_name')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../dental.php');
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