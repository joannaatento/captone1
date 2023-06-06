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
      
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $date_time = $_POST['date_time'];

        $sql = "INSERT INTO dentalapp VALUES ('','$idnumber','$fullname','$role','$cenrolled','$date_time')";
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
// Step 3: Handle the form submission
if(isset($_POST['submit_status'])) {
    // Retrieve the submitted form data
    $status_id = $_POST['status_id'];
    $statuses1030 = $_POST['statuses1030'];
    $statuses1130 = $_POST['statuses1130'];
    $statuses230 = $_POST['statuses230'];
    $statuses330 = $_POST['statuses330'];

    // Step 4: Execute the update query
    $sql = "UPDATE status SET statuses1030='$statuses1030', statuses1130='$statuses1130', statuses230='$statuses230', statuses330='$statuses330' WHERE status_id = $status_id";

    // Execute the query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Step 5: Handle the update result
        echo '<script>alert("Successfully updated!");</script>';
        echo '<script>window.location.href="../dental.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}    

?>
