<?php
    session_start();
    include '../../../db.php';

    if (isset($_POST['submit_dental'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $service = $_POST['service'];
        $phoneno = $_POST['phoneno'];
        $date_time = $_POST['date_time'];
        $sched_time = $_POST['sched_time'];
        $gradelevel = $_POST['gradelevel'];
        $role = $_POST['role'];
    
        // Check if 'is_deleted_on_website' is set in $_POST
        if (isset($_POST['is_deleted_on_website'])) {
            $is_deleted_on_website = $_POST['is_deleted_on_website'];
        } else {
            // Handle the case when 'is_deleted_on_website' is not set
            $is_deleted_on_website = ''; // or set to a default value
        }
    
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d");
    
        // Check for duplicate entry before inserting
        $checkSql = "SELECT COUNT(*) AS count FROM dentalappcollege WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
    
            if ($row['count'] == 0) {
                // No duplicate entry, proceed with the insertion
                $sql = "INSERT INTO dentalappcollege (user_id, idnumber, fullname, service, phoneno, date_time, sched_time, gradelevel, role, created_at, is_deleted_on_website, status) 
                        VALUES ('$user_id', '$idnumber', '$fullname', '$service', '$phoneno', '$formattedDatetime', '$sched_time', '$gradelevel','$role', NOW(), '$is_deleted_on_website', 'Available')";
    
                if (mysqli_query($conn, $sql)) {
                    // Mark the selected slot as unavailable
                    $updateSql = "UPDATE dentalappcollege SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                    mysqli_query($conn, $updateSql);
    
                    header('location: ../adddentalmessagecollege.php');
                    $_SESSION['success'] = "
                        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                            <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Dental Request Appointment Submitted.</h2>
                        </div>
                    ";
                }
    
            } else {
                // PHP error message
                echo '<script type="text/javascript">
                alert("Error: Duplicate entry for date and time.");
                window.history.back(); // Go back to the previous page
                </script>';
            }
        }
    }    


    if (isset($_POST['submit_medical'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $gradecourseyear1 = $_POST['gradecourseyear1'];
        $phoneno = $_POST['phoneno'];
        $date_time = $_POST['date_time'];
        $sched_time = $_POST['sched_time'];
        $role = $_POST['role'];
        $onoff = $_POST['onoff'];
    
        // Check if 'is_deleted_on_website' is set in $_POST
        if (isset($_POST['is_deleted_on_website'])) {
            $is_deleted_on_website = $_POST['is_deleted_on_website'];
        } else {
            // Handle the case when 'is_deleted_on_website' is not set
            $is_deleted_on_website = ''; // or set to a default value
        }
    
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d");
    
        // Check for duplicate entry before inserting
        $checkSql = "SELECT COUNT(*) AS count FROM medicalappcollege WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
    
            if ($row['count'] == 0) {
                // No duplicate entry, proceed with the insertion
                $sql = "INSERT INTO medicalappcollege (user_id, idnumber, fullname, gradecourseyear1, phoneno, date_time, sched_time, role, onoff, created_at, is_deleted_on_website, status) 
                        VALUES ('$user_id', '$idnumber', '$fullname', '$gradecourseyear1', '$phoneno', '$formattedDatetime', '$sched_time', '$role','$onoff', NOW(), '$is_deleted_on_website', 'Available')";
    
                if (mysqli_query($conn, $sql)) {
                    // Mark the selected slot as unavailable
                    $updateSql = "UPDATE medicalappcollege SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                    mysqli_query($conn, $updateSql);
    
                    header('location: ../addmedicalmessagecollege.php');
                    $_SESSION['success'] = "
                        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                            <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Request Appointment Submitted.</h2>
                        </div>
                    ";
                }
            } else {
                // PHP error message
                echo '<script type="text/javascript">
                alert("Error: Duplicate entry for date and time.");
                window.history.back(); // Go back to the previous page
                </script>';
            }
        }
    }    

    if (isset($_POST['submit_physician'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $gradesection = $_POST ['gradesection'];
        $phoneno = $_POST ['phoneno'];
        $date_time = $_POST ['date_time'];
        $sched_time = $_POST ['sched_time'];
        $role = $_POST['role'];
    
        // Check if 'is_deleted_on_website' is set in $_POST
        if (isset($_POST['is_deleted_on_website'])) {
            $is_deleted_on_website = $_POST['is_deleted_on_website'];
        } else {
            // Handle the case when 'is_deleted_on_website' is not set
            $is_deleted_on_website = ''; // or set to a default value
        }
    
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d");
    
        // Check for duplicate entry before inserting
        $checkSql = "SELECT COUNT(*) AS count FROM physicianappcollege WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
    
            if ($row['count'] == 0) {
                // No duplicate entry, proceed with the insertion
                $sql = "INSERT INTO physicianappcollege (user_id, idnumber, fullname, gradesection, phoneno, date_time, sched_time, role, created_at, is_deleted_on_website, status) 
                        VALUES ('$user_id', '$idnumber', '$fullname', '$gradesection', '$phoneno', '$formattedDatetime', '$sched_time', '$role', NOW(), '$is_deleted_on_website', 'Available')";
    
                if (mysqli_query($conn, $sql)) {
                    // Mark the selected slot as unavailable
                    $updateSql = "UPDATE physicianappcollege SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                    mysqli_query($conn, $updateSql);
    
                    header('location: ../addphysicianmessagecollege.php');
                    $_SESSION['success'] = "
                        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                            <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Consultation Request Appointment Submitted.</h2>
                        </div>
                    ";
                } 
            } else {
                // PHP error message
                echo '<script type="text/javascript">
                alert("Error: Duplicate entry for date and time.");
                window.history.back(); // Go back to the previous page
                </script>';
            }
        }
    }
    ?>
    