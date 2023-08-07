<?php
    session_start();
    include '../../../db.php';
    if(isset($_POST['submit_dentalgsjhsshs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $service = $_POST['service'];
        $date_time = $_POST['date_time'];
        $formattedDatetime = date("Y-m-d h:i A", strtotime($date_time));

        date_default_timezone_set('Asia/Manila');
        $date_created = date('Y-m-d h:i A'); 

        $sql = "INSERT INTO dentalapp VALUES ('','$admin_id','$idnumber','$fullname','$role','$cenrolled','$service','$formattedDatetime','$date_created')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../dentalgsjhsshs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        }
    } // for dental gsjhshs

    if(isset($_POST['submit_statusgsjhsshs'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statuses1030_1 = $_POST['statuses1030_1'];
        $statuses1130_2 = $_POST['statuses1130_2'];
        $statuses230_3 = $_POST['statuses230_3'];
        $statuses330_4 = $_POST['statuses330_4'];
        $statuses430_5 = $_POST['statuses430_5'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE status SET statuses1030_1='$statuses1030_1', statuses1130_2='$statuses1130_2', statuses230_3='$statuses230_3', statuses330_4='$statuses330_4', statuses430_5='$statuses430_5' WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }  //for update dental gsjhsshs

?>
