<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    
    if (isset($_POST['submit_medicalshs'])) {
        // Sanitize and validate user inputs
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
        $gradecourseyear1 = $_POST['gradecourseyear1'];
        $role = $_POST['role'];
        $onoff = $_POST['onoff'];
        $date_time = $_POST['date_time'];
        $phoneNumber = $_POST['phoneNumber'];
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
        $sql = "INSERT INTO medicalapp VALUES ('','$admin_id','$idnumber','$name1','$gradecourseyear1','$role','$onoff','$formattedDatetime', NOW(), '$phoneNumber', '$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 1 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$name1}, this is a reminder for your medical appointment on {$formattedDatetime}. It's just 1 hour away. See you soon!";
    
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
    
            header('location: ../medicalshs.php');
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
    }
     //for medical appointment shs

if(isset($_POST['submit_medicine'])){ // pag get ng data
    $role = $_POST['role'];
    $medicine_name = $_POST['medicine_name']; 
    $quantity = $_POST['quantity']; 

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicine VALUES ('','$role','$medicine_name','$quantity','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../consultationformshs.php');
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

if(isset($_POST['submit_consultationform'])){ // pag get ng data
    $admin_id = $_POST['admin_id']; 
    $idnumber = $_POST['idnumber']; 
    $date = $_POST['date'];
    $fullname = $_POST['fullname']; 
    $gradesection = $_POST['gradesection'];
    $chiefcomplaint = $_POST['chiefcomplaint'];
    $status = $_POST['status'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    $sql = "INSERT INTO consultationformrecord VALUES ('','$admin_id','$idnumber','$date','$fullname','$gradesection','$chiefcomplaint','$status', '$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../consultationformshs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Consultation Form Added.</h2>
            </div>
        ";
    }
} // for consultation form shs

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
    '$genitalia','$spine_extremities','$sexual','$screening','$otherfindings','$remarks','is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../schoolhealthassessmentformshs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>School Health Assessment Added.</h2>
            </div>
        ";
    }
} // for school health assessment form shs

if(isset($_POST['submit_weightmonitor'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gradesection = $_POST['gradesection'];

    date_default_timezone_set('Asia/Manila');
    $date_time = date('Y-m-d h:i A'); 

    $weight = $_POST['weight'];
    $remarks = $_POST['remarks'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];


    $sql = "INSERT INTO weightmonitor VALUES ('','$admin_id','$idnumber','$fullname','$age','$gradesection','$date_time','$weight','$remarks','$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../weightmonitoringshs.php');
        echo $_SESSION['success'] ="
        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
        <h2 style='
        color: #fff;
        font-size: 16px;
        margin-left: 10px;'>Weight Monitoring Added.</h2>
    </div>
        ";
    }
} //for weight monitoring shs

if(isset($_POST['submit_vitalsigns'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $bp = $_POST['bp'];
    $t = $_POST['t'];
    $p = $_POST['p'];
    $r = $_POST['r'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];


    $sql = "INSERT INTO vitalsigns VALUES ('','$admin_id','$idnumber','$fullname','$age','$date','$time','$bp','$t','$p','$r', '$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../vitalsignsmonitoringshs.php');
        echo $_SESSION['success'] ="
        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
        <h2 style='
        color: #fff;
        font-size: 16px;
        margin-left: 10px;'>Vital Signs Monitoring Added</h2>
    </div>
        ";
    }
} //for vital signs shs

if(isset($_POST['submit_nursenotes'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname'];
    $gradesection = $_POST['gradesection'];
    $datetime = $_POST['datetime'];
    $formattedDatetime = date("Y-m-d h:i A", strtotime($datetime));

    $vitalsigns = $_POST['vitalsigns'];
    $nursenotes = $_POST['nursenotes'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];




    $sql = "INSERT INTO nursenotesshs VALUES ('','$admin_id','$idnumber','$fullname','$gradesection','$formattedDatetime','$vitalsigns','$nursenotes', '$is_deleted_on_website')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../nursenotesshs.php');
        echo $_SESSION['success'] ="
        <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
        <h2 style='
        color: #fff;
        font-size: 16px;
        margin-left: 10px;'>Nurse's Notes Added</h2>
    </div>
        ";
    }
} //for nurse's notes shs



if (isset($_POST['update_consultationrecord'])) {
    // Sanitize and validate user inputs
    $consultform_id = $_POST['consultform_id'];
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber'];
    $date = $_POST['date'];
    $fullname = $_POST['fullname'];
    $gradesection = $_POST['gradesection'];
    $chiefcomplaint = $_POST['chiefcomplaint'];
    $status  = $_POST['status'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE consultationformrecord SET
   idnumber='$idnumber', date='$date', fullname='$fullname', gradesection='$gradesection',
   chiefcomplaint='$chiefcomplaint', status='$status'
  WHERE consultform_id = '$consultform_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Consultation Record has been updated.</h2>
          </div>
      ";
      header('Location: ../editconsultation.php?consultform_id=' . $consultform_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}

if (isset($_GET['consultform_id'])) {
    $consultform_id = $_GET['consultform_id'];
    
    // Validate $p_id to prevent SQL injection
    if (!is_numeric($consultform_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE consultationformrecord SET is_deleted_on_website = 1 WHERE consultform_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $consultform_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../consultationformshs.php");
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
    header("Location: ../schoolhealthassessmentformshs.php");
    exit();
}
if (isset($_POST['update_weightmonitoring'])) {
    // Sanitize and validate user inputs
    $weight_id = $_POST['weight_id'];
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gradesection = $_POST['gradesection'];
    $date_time = $_POST['date_time'];
    $weight = $_POST['weight'];
    $remarks = $_POST['remarks'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE weightmonitor SET
    idnumber='$idnumber', fullname='$fullname',age='$age', gradesection='$gradesection',
    date_time='$date_time', weight='$weight', remarks='$remarks'
  WHERE weight_id = '$weight_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Weight Monitoring Record has been updated.</h2>
          </div>
      ";
      header('Location: ../editweightmonitoring.php?weight_id=' . $weight_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}


if (isset($_GET['weight_id'])) {
    $weight_id = $_GET['weight_id'];
    
    // Validate $p_id to prevent SQL injection
    if (!is_numeric($weight_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE weightmonitor SET is_deleted_on_website = 1 WHERE weight_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $weight_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../weightmonitoringshs.php");
    exit();
}


if (isset($_POST['update_vitalsigns'])) {
    // Sanitize and validate user inputs
    $vital_id = $_POST['vital_id'];
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $bp = $_POST['bp'];
    $t = $_POST['t'];
    $p = $_POST['p'];
    $r = $_POST['r'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE vitalsigns SET
    idnumber='$idnumber', fullname='$fullname',age='$age', date='$date',
    time='$time', bp='$bp', t='$t',p='$p',r='$r'
  WHERE vital_id = '$vital_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Vital Sign Record has been updated.</h2>
          </div>
      ";
      header('Location: ../editvitalsigns.php?vital_id=' . $vital_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}


if (isset($_GET['vital_id'])) {
    $vital_id = $_GET['vital_id'];
    
    // Validate $p_id to prevent SQL injection
    if (!is_numeric($vital_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE vitalsigns SET is_deleted_on_website = 1 WHERE vital_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vital_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../vitalsignsmonitoringshs.php");
    exit();
}


if (isset($_POST['update_nursenotes'])) {
    // Sanitize and validate user inputs
    $nurse_id = $_POST['nurse_id'];
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $gradesection = $_POST['gradesection'];
    $datetime = $_POST['datetime'];
    $vitalsigns = $_POST['vitalsigns'];
    $nursenotes = $_POST['nursenotes'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

   
    // Update the record in the database
  $sql = "UPDATE nursenotesshs SET
    idnumber='$idnumber', fullname='$fullname',gradesection='$gradesection', datetime='$datetime',
    vitalsigns='$vitalsigns', nursenotes='$nursenotes'
  WHERE nurse_id = '$nurse_id'";

  if (mysqli_query($conn, $sql)) {
      // Update successful
      $_SESSION['success'] = "
          <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
              <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Nurse Notes Record has been updated.</h2>
          </div>
      ";
      header('Location: ../editnursenotes.php?nurse_id=' . $nurse_id);
      exit(); // Make sure to exit after redirection
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}


if (isset($_GET['nurse_id'])) {
    $nurse_id = $_GET['nurse_id'];
    
    // Validate $p_id to prevent SQL injection
    if (!is_numeric($nurse_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE nursenotesshs SET is_deleted_on_website = 1 WHERE nurse_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nurse_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../nursenotesshs.php");
    exit();
}

?>

