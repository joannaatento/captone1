<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    
    if (isset($_POST['submit_medicalgsjhs'])) {
        // Sanitize and validate user inputs
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
        $gradecourseyear1 = $_POST['gradecourseyear1'];
        $phoneno = $_POST['phoneno'];
        $date_time = $_POST['date_time'];
        $role = $_POST['role'];
        $onoff = $_POST['onoff'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        // Validate and sanitize inputs here...
    
        // Convert appointment datetime to a DateTime object
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");
    
        // Calculate the reminder time (1 hour before appointment)
        $reminderDateTime = clone $appointmentDateTime;
        $reminderDateTime->modify("-2 hour");
    
        // Insert the sanitized data into the database
        $sql = "INSERT INTO medicalapp VALUES ('','$user_id','$idnumber','$name1','$gradecourseyear1','$phoneno','$role','$onoff','$formattedDatetime', NOW(),'$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 1 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$name1}, this is a reminder for your medical appointment on {$formattedDatetime}. It's just 2 hours away. See you soon!";
    
                $client = new Client([
                    'base_uri' => "https://k3n5n1.api.infobip.com",
                    'headers' => [
                        'Authorization' => "App 06c65a798c0587c8dc83b35c0ac75dab-be21e6fb-9215-4fc1-b1fd-9754acc09cac",
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ]
                ]);
    
                $response = $client->request(
                    'POST',
                    'sms/2/text/advanced',
                    [
                        RequestOptions::JSON => [
                            'messages' => [
                                [
                                    'from' => 'Clinic DWCL',
                                    'destinations' => [
                                        ['to' => $phoneNumber]
                                    ],
                                    'text' => $message,
                                ]
                            ]
                        ],
                    ]
                );
    
                if ($response->getStatusCode() == 200) {
                    echo "SMS reminder sent to {$name1} successfully.\n";
                } else {
                    echo "Failed to send SMS reminder to {$name1}.\n";
                }
            }
    
            header('location: ../medicalgsjhs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Medical Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    } //for medical appointment gsjhs

if(isset($_POST['submit_medicine'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $medicine_name = $_POST['medicine_name']; 
    $quantity = $_POST['quantity']; 

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicine VALUES ('','$admin_id','$medicine_name','$quantity','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../patientmanagementrecordgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Medicine Added.</h2>
            </div>
        ";
    }
} //for medicine

if(isset($_POST['submit_patientmngmt'])){ // pag get ng data
    $admin_id = $_POST['admin_id']; 
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname']; 
    $gradesection = $_POST['gradesection'];
    $vitalsigns = $_POST['vitalsigns'];
    $diagnosis = $_POST['diagnosis'];
    $status = $_POST['status'];

    date_default_timezone_set('Asia/Manila');
    
    $date_time = date('Y-m-d h:i A'); // Include time in the date with AM/PM format
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    $sql = "INSERT INTO patientrecord VALUES ('','$admin_id','$idnumber','$fullname','$gradesection','$vitalsigns','$diagnosis','$status','$date_time', '$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../patientmanagementrecordgsjhs.php');
        echo $_SESSION['success'] ="
        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; padding-bottom: 20px; width:auto; border-radius: 10px;'>
        <h2 style='
                color: #fff;
                font-size: 16px;

                margin-left: 10px;'>Patient Record Management Added.</h2>
            </div>
        ";
    }
} // for patient record management gsjhs

if(isset($_POST['submit_schoolhealthassesform'])){ // pag get ng data
    $role = $_POST['role']; 
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname']; 
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];
    $bp = $_POST['bp'];
    $pr = $_POST['pr'];
    $scalp = $_POST['scalp'];
    $skin_nails = $_POST['skin_nails'];
    $eyes = $_POST['eyes'];
    $visual_acuity = $_POST['visual_acuity'];
    $ears = $_POST['ears'];
    $hearing_test = $_POST['hearing_test'];
    $nose = $_POST['nose'];
    $throat = $_POST['throat'];
    $mouth_tongue = $_POST['mouth_tongue'];
    $teeth_gums = $_POST['teeth_gums'];
    $chest_breasts = $_POST['chest_breasts'];
    $heart = $_POST['heart'];
    $lungs = $_POST['lungs'];
    $abdomen = $_POST['abdomen'];
    $genitalia = $_POST['genitalia'];
    $spine_extremities = $_POST['spine_extremities'];
    $sexual = $_POST['sexual'];
    $screening = $_POST['screening'];
    $otherfindings = $_POST['otherfindings'];
    $remarks = $_POST['remarks'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
    $sql = "INSERT INTO schoolhealthasses VALUES ('','$role','$idnumber','$fullname','$birthday','$gender','$date','$weight','$height',
    '$bmi','$bp','$pr','$scalp','$skin_nails','$eyes','$visual_acuity','$ears','$hearing_test',
    '$nose','$throat','$mouth_tongue','$teeth_gums','$chest_breasts','$heart','$lungs','$abdomen',
    '$genitalia','$spine_extremities','$sexual','$screening','$otherfindings','$remarks','$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../schoolhealthassessmentformgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>School Health Assessment Added.</h2>
            </div>
        ";
    }
} // for school health assessment form gsjhs



if (isset($_POST['update_patientrecord'])) {
    // Sanitize and validate user inputs
    $p_id = $_POST['p_id'];
    $admin_id = $_POST['admin_id'];
    $fullname = $_POST['fullname'];
    $idnumber = $_POST['idnumber'];
    $gradesection = $_POST['gradesection'];
    $vitalsigns = $_POST['vitalsigns'];
    $diagnosis = $_POST['diagnosis'];
    $status = $_POST['status'];
    $date_time = $_POST['date_time'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE patientrecord SET
   fullname='$fullname', idnumber='$idnumber', gradesection='$gradesection',vitalsigns='$vitalsigns',
   diagnosis='$diagnosis', status='$status', date_time='$date_time'
  WHERE p_id = '$p_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Patient Record Management has been updated.</h2>
          </div>
      ";
      header('Location: ../editpatientrecord.php?p_id=' . $p_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    
    // Validate $p_id to prevent SQL injection
    if (!is_numeric($p_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE patientrecord SET is_deleted_on_website = 1 WHERE p_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $p_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../patientmanagementrecordgsjhs.php");
    exit();
}

if (isset($_POST['update_schoolhealthassessrecord'])) {
    // Sanitize and validate user inputs
    $schoolasses_id = $_POST['schoolasses_id'];
    $role = $_POST['role'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];
    $bp = $_POST['bp'];
    $pr = $_POST['pr'];
    $scalp = $_POST['scalp'];
    $skin_nails = $_POST['skin_nails'];
    $eyes = $_POST['eyes'];
    $visual_acuity = $_POST['visual_acuity'];
    $ears = $_POST['ears'];
    $hearing_test = $_POST['hearing_test'];
    $nose = $_POST['nose'];
    $throat = $_POST['throat'];
    $mouth_tongue = $_POST['mouth_tongue'];
    $teeth_gums = $_POST['teeth_gums'];
    $chest_breasts = $_POST['chest_breasts'];
    $heart = $_POST['heart'];
    $lungs = $_POST['lungs'];
    $abdomen = $_POST['abdomen'];
    $genitalia = $_POST['genitalia'];
    $spine_extremities = $_POST['spine_extremities'];
    $sexual = $_POST['sexual'];
    $screening = $_POST['screening'];
    $otherfindings = $_POST['otherfindings'];
    $remarks = $_POST['remarks'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE schoolhealthasses SET
   idnumber='$idnumber', fullname='$fullname', birthday='$birthday',gender='$gender',
   date='$date', weight='$weight', height='$height', bmi='$bmi',bp='$bp',
   pr='$pr',scalp='$scalp',skin_nails='$skin_nails',eyes='$eyes',visual_acuity='$visual_acuity',
   ears='$ears',hearing_test='$hearing_test',nose='$nose',throat='$throat',mouth_tongue='$mouth_tongue',
   teeth_gums='$teeth_gums',chest_breasts='$chest_breasts',heart='$heart',lungs='$lungs',abdomen='$abdomen',
   genitalia='$genitalia',spine_extremities='$spine_extremities',sexual='$sexual',screening='$screening',
   otherfindings='$otherfindings',remarks='$remarks'
  WHERE schoolasses_id = '$schoolasses_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>School Health Assessment has been updated.</h2>
          </div>
      ";
      header('Location: ../editschoolasses.php?schoolasses_id=' . $schoolasses_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}

?>
