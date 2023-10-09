<?php

session_start();
include '../../../db.php';

if (isset($_POST['update_medicalrecord'])) {
    // Sanitize and validate user inputs
    $medicalapp_id = $_POST['medicalapp_id'];
    $user_id = $_POST['user_id'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $gradelevel = $_POST['gradelevel'];
    $phoneno = $_POST['phoneno'];
    $date_time = $_POST['date_time'];
    $sched_time = $_POST['sched_time'];
    $role = $_POST['role'];
    $onoff = $_POST['onoff'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    // Validate and sanitize inputs here...

    // Update the record in the database
    $sql = "UPDATE medicalapp SET
    idnumber='$idnumber', fullname='$fullname', gradelevel='$gradelevel',phoneno='$phoneno',
    role='$role', date_time='$date_time', sched_time='$sched_time', onoff='$onoff'
    WHERE medicalapp_id = '$medicalapp_id'";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        $_SESSION['success'] = "
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Appointment has been updated.</h2>
            </div>
        ";
        header('Location: ../editmedicals.php?medicalapp_id=' . $medicalapp_id);
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}


if (isset($_GET['schoolasses_id'])) {
    $schoolasses_id  = $_GET['schoolasses_id'];
    
    // Validate $medicalapp_id to prevent SQL injection
    if (!is_numeric($schoolasses_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE schoolhealthasses SET is_deleted_on_website = 1 WHERE schoolasses_id  = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $schoolasses_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../schoolhealthassessmentformgsjhs.php");
    exit();
}
?>
