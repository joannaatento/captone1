<?php
    session_start();
    include '../../db.php';



if (isset($_GET['dental_id'])) {
    $dental_id = $_GET['dental_id'];

    // Perform the necessary database update to mark the message as read
    // Replace 'your_table_name' with the actual table name where you store the messages
    $sql = "UPDATE dental SET is_read = 1 WHERE dental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dental_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../dentalrequestgsjhs.php");
    exit();
}

 
if(isset($_POST['submit_patientmngmt'])){ // pag get ng data
    $admin_id = $_POST['admin_id']; 
    $idnumber = $_POST['idnumber']; 
    $name = $_POST['name']; 
    $gradesection = $_POST['gradesection'];
    $vitalsigns = $_POST['vitalsigns'];
    $diagnosis = $_POST['diagnosis'];

    date_default_timezone_set('Asia/Manila');
    
    $date_time = date('Y-m-d h:i A'); // Include time in the date with AM/PM format

    $sql = "INSERT INTO patientrecord VALUES ('','$admin_id','$idnumber','$name','$gradesection','$vitalsigns','$diagnosis','$date_time')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../patientmanagementrecordgsjhs.php');
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
