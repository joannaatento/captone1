<?php
    session_start();
    include '../../../db.php';
    if(isset($_POST['submit_physiciangsjhsshs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $cenrolled = $_POST['cenrolled'];
        $role = $_POST['role'];
        $date_time = $_POST['date_time'];
       
        date_default_timezone_set('Asia/Manila');
        $date_created = date('Y-m-d h:i A'); 
    
        $sql = "INSERT INTO physicianapp VALUES ('','$admin_id','$idnumber','$fullname','$cenrolled','$role','$date_time','$date_created')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicianapproved.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physician Consultation Appointment Added.</h2>
                </div>
            ";
        }
    } // for physician gsjhsshs

    if(isset($_POST['submit_physicalgsjhs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $levelsection = $_POST['levelsection'];
        $pastsurgeries = $_POST['pastsurgeries'];
        $allergies = $_POST['allergies'];
        $familyhistory = $_POST['familyhistory'];
        $bp = $_POST['bp'];
        $pr = $_POST['pr'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bmi = $_POST['bmi'];
        $heent = $_POST['heent'];
        $cvs = $_POST['cvs'];
        $gis = $_POST['gis'];
        $gus = $_POST['gus'];
        $extremities = $_POST['extremities'];
        $remarks = $_POST['remarks'];
        $medicalexaminer = $_POST['medicalexaminer'];
        $dateexamined = $_POST['dateexamined'];

       
     
        $sql = "INSERT INTO physicalexaminationgsjhs VALUES ('','$admin_id','$idnumber','$fullname','$age','$sex','$levelsection','$pastsurgeries', '$allergies',
        '$familyhistory', '$bp', '$pr', '$height', '$weight', '$bmi', '$heent', '$cvs', '$gis', '$gus', '$extremities', '$remarks', '$medicalexaminer', '$dateexamined')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicalexaminationgsjhs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physical Examination Record Added.</h2>
                </div>
            ";
        }
    } // for physician gsjhsshs
?>
