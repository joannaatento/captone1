<?php
    session_start();
    include '../../../db.php';

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $cp = trim(mysqli_real_escape_string($conn, $_POST['cp']));
        $birthday = trim(mysqli_real_escape_string($conn, $_POST['birthday']));
        $gender = isset($_POST['gender']) ? trim(mysqli_real_escape_string($conn, $_POST['gender'])) : "";
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $paddress = trim(mysqli_real_escape_string($conn, $_POST['paddress']));
        $father = trim(mysqli_real_escape_string($conn, $_POST['father']));
        $cfather = trim(mysqli_real_escape_string($conn, $_POST['cfather']));
        $mother = trim(mysqli_real_escape_string($conn, $_POST['mother']));
        $cmother = trim(mysqli_real_escape_string($conn, $_POST['cmother']));
        $religion = isset($_POST['religion']) ? trim(mysqli_real_escape_string($conn, $_POST['religion'])) : "";
        $otherReligion = trim(mysqli_real_escape_string($conn, $_POST['otherReligion']));
        $nationality = isset($_POST['nationality']) ? trim(mysqli_real_escape_string($conn, $_POST['nationality'])) : "";        
        $otherNationality = trim(mysqli_real_escape_string($conn, $_POST['otherNationality']));
        $language = trim(mysqli_real_escape_string($conn, $_POST['language']));
        $student_lives = isset($_POST['student_lives']) ? trim(mysqli_real_escape_string($conn, $_POST['student_lives'])) : "";
        $guardianname = trim(mysqli_real_escape_string($conn, $_POST['guardianname']));
        $guardianrelation = trim(mysqli_real_escape_string($conn, $_POST['guardianrelation']));
        $cguardian = trim(mysqli_real_escape_string($conn, $_POST['cguardian']));
        $bcg = isset($_POST['bcg']) ? trim(mysqli_real_escape_string($conn, $_POST['bcg'])) : "";
        $dpt = isset($_POST['dpt']) ? trim(mysqli_real_escape_string($conn, $_POST['dpt'])) : "";
        $opv = isset($_POST['opv']) ? trim(mysqli_real_escape_string($conn, $_POST['opv'])) : "";
        $hepa = isset($_POST['hepa']) ? trim(mysqli_real_escape_string($conn, $_POST['hepa'])) : "";
        $measles = isset($_POST['measles']) ? trim(mysqli_real_escape_string($conn, $_POST['measles'])) : "";
        $others = trim(mysqli_real_escape_string($conn, $_POST['others']));
        $vaccination = isset($_POST['vaccination']) ? trim(mysqli_real_escape_string($conn, $_POST['vaccination'])) : "";
        $imagevac = $_FILES['imagevac']['name'];
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $faintingspells = isset($_POST['faintingspells']) ? trim(mysqli_real_escape_string($conn, $_POST['faintingspells'])) : "";
        $allergicrhinitis = isset($_POST['allergicrhinitis']) ? trim(mysqli_real_escape_string($conn, $_POST['allergicrhinitis'])) : "";
        $freqheadache = isset($_POST['freqheadache']) ? trim(mysqli_real_escape_string($conn, $_POST['freqheadache'])) : "";
        $anxietydis = isset($_POST['anxietydis']) ? trim(mysqli_real_escape_string($conn, $_POST['anxietydis'])) : "";
        $g6pd = isset($_POST['g6pd']) ? trim(mysqli_real_escape_string($conn, $_POST['g6pd'])) : "";
        $bleedingclotting = isset($_POST['bleedingclotting']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingclotting'])) : "";
        $hearingprob = isset($_POST['hearingprob']) ? trim(mysqli_real_escape_string($conn, $_POST['hearingprob'])) : "";
        $hypergas = isset($_POST['hypergas']) ? trim(mysqli_real_escape_string($conn, $_POST['hypergas'])) : "";
        $derma = isset($_POST['derma']) ? trim(mysqli_real_escape_string($conn, $_POST['derma'])) : "";
        $hypertension  = isset($_POST['hypertension']) ? trim(mysqli_real_escape_string($conn, $_POST['hypertension'])) : "";
        $diabetes = isset($_POST['diabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetes'])) : "";
        $hyperventilation  = isset($_POST['hyperventilation']) ? trim(mysqli_real_escape_string($conn, $_POST['hyperventilation'])) : "";
        $mens = isset($_POST['mens']) ? trim(mysqli_real_escape_string($conn, $_POST['mens'])) : "";
        $othersmedical = trim(mysqli_real_escape_string($conn, $_POST['othersmedical']));
        $heartcondition = isset($_POST['heartcondition']) ? trim(mysqli_real_escape_string($conn, $_POST['heartcondition'])) : "";
        $heartcon_specify = isset($_POST['heartcon_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['heartcon_specify'])) : "";
        $eyeproblem = isset($_POST['eyeproblem']) ? trim(mysqli_real_escape_string($conn, $_POST['eyeproblem'])) : "";
        $eyeprob_specify = isset($_POST['eyeprob_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['eyeprob_specify'])) : "";
        $seriousillness = isset($_POST['seriousillness']) ? trim(mysqli_real_escape_string($conn, $_POST['seriousillness'])) : "";
        $seriousillness_specify = isset($_POST['seriousillness_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['seriousillness_specify'])) : "";
        $surgeries_injuries = isset($_POST['surgeries_injuries']) ? trim(mysqli_real_escape_string($conn, $_POST['surgeries_injuries'])) : "";
        $surgeries_injuries_specify = isset($_POST['surgeries_injuries_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['surgeries_injuries_specify'])) : "";
        $medicationtreatment = isset($_POST['medicationtreatment']) ? trim(mysqli_real_escape_string($conn, $_POST['medicationtreatment'])) : "";
        $medicationtreatment_specify = isset($_POST['medicationtreatment_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['medicationtreatment_specify'])) : "";
        $allergiesmed = isset($_POST['allergiesmed']) ? trim(mysqli_real_escape_string($conn, $_POST['allergiesmed'])) : "";
        $allergiesmed_specify = isset($_POST['allergiesmed_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['allergiesmed_specify'])) : "";
        $allergiesfood = isset($_POST['allergiesfood']) ? trim(mysqli_real_escape_string($conn, $_POST['allergiesfood'])) : "";
        $allergiesfood_specify = isset($_POST['allergiesfood_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['allergiesfood_specify'])) : "";
        $firstaid = isset($_POST['firstaid']) ? trim(mysqli_real_escape_string($conn, $_POST['firstaid'])) : "";
        $concerns = isset($_POST['concerns']) ? trim(mysqli_real_escape_string($conn, $_POST['concerns'])) : "";
        $concerns_specify = isset($_POST['concerns_specify']) ? trim(mysqli_real_escape_string($conn, $_POST['concerns_specify'])) : "";
        

 $sql = "INSERT INTO healthrecordformgsjhs (
    user_id, image, fullname, idnumber, cp, birthday, gender, address, paddress, father, cfather, mother, cmother, 
    religion, otherReligion, nationality, otherNationality, language, student_lives, guardianname, guardianrelation, cguardian, 
    bcg, dpt, opv, hepa, measles, others, vaccination,imagevac, asthma, faintingspells, 
    allergicrhinitis, freqheadache, anxietydis, g6pd, bleedingclotting, hearingprob, hypergas, derma, hypertension, 
    diabetes, hyperventilation, mens, othersmedical, heartcondition, heartcon_specify, eyeproblem, eyeprob_specify, 
    seriousillness, seriousillness_specify, surgeries_injuries, surgeries_injuries_specify, medicationtreatment, 
    medicationtreatment_specify, allergiesmed, allergiesmed_specify, allergiesfood, allergiesfood_specify, firstaid, 
    concerns, concerns_specify
) VALUES (
    '$user_id', '$image', '$fullname', '$idnumber', '$cp', '$birthday', '$gender', '$address', '$paddress', '$father', '$cfather', 
    '$mother', '$cmother', '$religion','$otherReligion', '$nationality', '$otherNationality', '$language', '$student_lives',
    '$guardianname', '$guardianrelation', '$cguardian', '$bcg', '$dpt', '$opv', '$hepa', '$measles', '$others', '$vaccination', 
    '$imagevac', '$asthma', '$faintingspells', '$allergicrhinitis', '$freqheadache', 
    '$anxietydis', '$g6pd', '$bleedingclotting', '$hearingprob', '$hypergas', '$derma', '$hypertension', '$diabetes', 
    '$hyperventilation', '$mens', '$othersmedical', '$heartcondition', '$heartcon_specify', '$eyeproblem', '$eyeprob_specify', 
    '$seriousillness', '$seriousillness_specify', '$surgeries_injuries', '$surgeries_injuries_specify', '$medicationtreatment', 
    '$medicationtreatment_specify', '$allergiesmed', '$allergiesmed_specify', '$allergiesfood', '$allergiesfood_specify', 
    '$firstaid', '$concerns', '$concerns_specify'
)";

         
      
      $imageUploadSuccess = false;
      $secondFileUploadSuccess = false;
  
      if (mysqli_query($conn, $sql)) {
          // Check if the first image was uploaded successfully
          if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
              $imageUploadSuccess = move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/DivineClinic/upload_image/" . $_FILES["image"]["name"]);
          } else {
              echo "Error uploading the first image: " . $_FILES["image"]["error"];
          }
  
          // Check if the second image was uploaded successfully
          if (isset($_FILES["imagevac"]) && $_FILES["imagevac"]["error"] === UPLOAD_ERR_OK) {
              $secondFileUploadSuccess = move_uploaded_file($_FILES["imagevac"]["tmp_name"], "/xampp/htdocs/DivineClinic/upload_image/" . $_FILES["imagevac"]["name"]);
          } else {
              // Handle the case when no file was uploaded or other errors occurred
              if ($_FILES["imagevac"]["error"] === UPLOAD_ERR_NO_FILE) {
                  // If no file was attached, set the second file upload as successful
                  $secondFileUploadSuccess = true;
              } else {
                  echo "Error uploading the second image: " . $_FILES["imagevac"]["error"];
              }
          }
  
          if ($imageUploadSuccess && $secondFileUploadSuccess) {
              // Both files were uploaded successfully
                    header('location: ../healthrecordformgsjhs.php');
                    $_SESSION['success'] = "
                         <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                             <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Your health record has been submitted</h2>
                         </div>
                     ";
                }
      }
  }

  ?>

  
  
  