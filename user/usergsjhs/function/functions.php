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
        $gradecourseyear = $_POST['gradecourseyear'];
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
        $checkSql = "SELECT COUNT(*) AS count FROM dentalapp WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
    
            if ($row['count'] == 0) {
                // No duplicate entry, proceed with the insertion
                $sql = "INSERT INTO dentalapp (user_id, idnumber, fullname, service, phoneno, date_time, sched_time, gradecourseyear, role, created_at, is_deleted_on_website, status) 
                         VALUES ('$user_id', '$idnumber', '$fullname', '$service', '$phoneno', '$formattedDatetime', '$sched_time', '$gradecourseyear','$role', NOW(), '$is_deleted_on_website', 'Available')";
    
                if (mysqli_query($conn, $sql)) {
                    // Mark the selected slot as unavailable
                    $updateSql = "UPDATE dentalapp SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                    mysqli_query($conn, $updateSql);
    
                    header('location: ../adddentalmessagegsjhs.php');
                    $_SESSION['success'] = "
                         <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                             <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Dental Request Appointment Added.</h2>
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
    }//for dental appointment gsjhs

    
    if (isset($_POST['submit_medical'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
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
        $checkSql = "SELECT COUNT(*) AS count FROM medicalapp WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
        $checkResult = mysqli_query($conn, $checkSql);
    
        if ($checkResult) {
            $row = mysqli_fetch_assoc($checkResult);
    
            if ($row['count'] == 0) {
                // No duplicate entry, proceed with the insertion
                $sql = "INSERT INTO medicalapp (user_id, idnumber, name1, gradecourseyear1, phoneno, date_time, sched_time, role, onoff, created_at, is_deleted_on_website, status) 
                        VALUES ('$user_id', '$idnumber', '$name1', '$gradecourseyear1', '$phoneno', '$formattedDatetime', '$sched_time', '$role','$onoff', NOW(), '$is_deleted_on_website', 'Available')";
    
                if (mysqli_query($conn, $sql)) {
                    // Mark the selected slot as unavailable
                    $updateSql = "UPDATE medicalapp SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                    mysqli_query($conn, $updateSql);
    
                    header('location: ../addmedicalmessagegsjhs.php');
                    $_SESSION['success'] = "
                        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                            <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Request Appointment Added.</h2>
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
    } //for medical gsjhs

if (isset($_POST['submit_physician'])) {
    $user_id = $_POST['user_id'];
    $idnumber = $_POST['idnumber'];
    $name = $_POST['name'];
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
    $checkSql = "SELECT COUNT(*) AS count FROM physicianapp WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
    $checkResult = mysqli_query($conn, $checkSql);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);

        if ($row['count'] == 0) {
            // No duplicate entry, proceed with the insertion
            $sql = "INSERT INTO physicianapp (user_id, idnumber, name, gradesection, phoneno, date_time, sched_time, role, created_at, is_deleted_on_website, status) 
                    VALUES ('$user_id', '$idnumber', '$name', '$gradesection', '$phoneno', '$formattedDatetime', '$sched_time', '$role', NOW(), '$is_deleted_on_website', 'Available')";

            if (mysqli_query($conn, $sql)) {
                // Mark the selected slot as unavailable
                $updateSql = "UPDATE physicianapp SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
                mysqli_query($conn, $updateSql);

                header('location: ../addphysicianmessagegsjhs.php');
                $_SESSION['success'] = "
                    <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                        <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Request Appointment Added.</h2>
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
} //for physician gsjhs

?>