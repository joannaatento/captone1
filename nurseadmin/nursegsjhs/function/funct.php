<?php
    session_start();
    include '../../db.php';


    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $role = $_POST['role'];
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
    
                $sql_add = "INSERT INTO `admins`(`role`, `username`, `email`, `password`) VALUES ('$role','$username','$email','$hashedPassword')";
                if($conn->query($sql_add) === TRUE){
                    $sql = "SELECT * FROM admins WHERE username = '$username'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = mysqli_fetch_array($result);
                        $_SESSION['admin_id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: ../signup.php');
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
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
    
                $role = $row['role'];
                if ($role == '1') {
                    header('Location: ../nursegsjhs/nurseingsjhs.php');
                } elseif ($role == '2') {
                    header('Location: ../nurseinshs.php');
                } elseif ($role == '3') {
                    // Handle role 3
                    header('Location: ../nurseincollege.php');
                } elseif ($role == '4') {
                    // Handle role 4
                    header('Location: ../dentistingsjhsshs.php');
                } elseif ($role == '5') {
                    // Handle role 5
                    header('Location: ../dentistincollege.php');
                } elseif ($role == '6') {
                    // Handle role 6
                    header('Location: ../physiciangsjhsshs.php');
                } elseif ($role == '7') {
                    // Handle role 7
                    header('Location: ../physiciancollege.php');
                } else {
                    // Handle other roles or scenarios as needed
                    header('Location: ../dashboard.php');
                }
            } else {
                $_SESSION['failed'] = "Invalid username or password. Please try again.";
                header('Location: ../login.php');
            }
        } else {
            $_SESSION['failed'] = "Invalid username or password. Please try again.";
            header('Location: ../login.php');
        }
    }
    
  


?>
