<?php
    session_start();
    include '../../db.php';

    if (isset($_POST['submit_dental'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $dental_service = $_POST['dental_service'];
        $c_enrolled = $_POST['c_enrolled'];
        $gradecourseyear = $_POST ['gradecourseyear'];
        $c_employee = $_POST['c_employee'];
        $message = $_POST['message'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
    
        $date_created = date('Y-m-d h:i A'); // Include time in the date with AM/PM format
        $is_read = $_POST['is_read'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        $sql = "INSERT INTO dental VALUES ('','$user_id','$idnumber','$name','$dental_service','$c_enrolled','$gradecourseyear','$c_employee','$message','$date_created','$is_read','$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            header('location: ../adddentalmessage.php');
            echo $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        }
    }
    
    
    
    
?>