<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

  
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>View Health Profile Record</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="../../assets/newcss/style.css">
	<link rel="stylesheet" href="../../assets/newcss/formstyles.css">

</head> 
<style>
     
     .form-group input,
        .form-group select,
        .form-group textarea{
            border: 2px solid #afbdcf !important; /* Change the border color and style as needed */
            border-radius: 5px; /* Add rounded corners */
            padding: 5px; /* Add some padding to improve appearance */
        }

        .form-group input:not([readonly]):hover,
        .form-group textarea:not([readonly]):hover{
            border-color: blue !important; /* Change the border color on hover */
            background-color: transparent !important;
        }
        
        .form-group select:not([readonly]):hover {
            border-color: blue !important; /* Change the border color on hover */      
          }

        .form-group input[readonly]:hover,
        .form-group select[readonly]:hover,
        .form-group textarea[readonly]:hover
    {
            background-color: transparent !important;
            border-color: #c6c6d9 !important;
        }

       .form-group input[readonly]:focus,
        .form-group select[readonly]:focus,
        .form-group textarea[readonly]:focus  {
            background-color: transparent !important;
        }

        .form-group input:not([readonly]):focus,
        .form-group select:not([readonly]):focus,
        .form-group textarea:not([readonly]):focus {
            background-color: transparent !important;
        }
        /* Define custom styles here */
        .form-container {
            background-color: #fff;
            box-shadow: 4px 4px 4px 4px rgba(76, 84, 177, 0.5);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .form-title {
            text-align: center;
            color: #4c54b1;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>



<body class="app">   
    
<?php  	
$healthnogsjhs_id = $_GET['healthnogsjhs_id'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM healthrecordformgsjhs WHERE healthnogsjhs_id = '$healthnogsjhs_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $image = $row['image'];
  $fullname= $row['fullname'];
  $idnumber = $row['idnumber'];
  $cp = $row['cp'];
  $birthday = $row['birthday'];
  $gender = $row['gender'];
  $address = $row ['address'];
  $paddress = $row ['paddress'];
  $father = $row['father'];
  $cfather = $row['cfather'];
  $mother = $row['mother'];
  $cmother = $row['cmother'];
  $religion = $row['religion'];
  $nationality = $row['nationality'];
  $language = $row['language'];
  $student_lives = $row['student_lives'];
  $guardianname = $row['guardianname'];
  $guardianrelation = $row['guardianrelation'];
  $cguardian = $row['cguardian'];
  $bcg = $row['bcg'];
  $dpt = $row['dpt'];
  $opv = ['opv'];
  $hepa = $row['hepa'];
  $measles = $row['measles'];
  $others = $row['others'];
  $vaccination =$row ['vaccination'];
  $imagevac = $row['imagevac'];
  $asthma = $row['asthma'];
  $faintingspells = $row['faintingspells'];
  $allergicrhinitis = $row['allergicrhinitis'];
  $freqheadache =$row['freqheadache'];
  $anxietydis =$row['anxietydis'];
  $g6pd = $row['g6pd'];
  $bleedingclotting =$row['bleedingclotting'];
  $hearingprob =$row['hearingprob'];
  $hypergas = $row['hypergas'];
  $derma =$row['derma'];
  $hypertension =$row['hypertension'];
  $diabetes = $row['diabetes'];
  $hyperventilation =$row['hyperventilation'];
  $mens =$row['mens'];
  $othersmedical = $row['othersmedical'];
  $heartcondition = $row['heartcondition'];
  $heartcon_specify = $row['heartcon_specify'];
  $eyeproblem = $row['eyeproblem'];
  $eyeprob_specify = $row['eyeprob_specify'];
  $seriousillness = $row['seriousillness'];
  $seriousillness_specify = $row['seriousillness_specify'];
  $surgeries_injuries = $row['surgeries_injuries'];
  $surgeries_injuries_specify = $row['surgeries_injuries_specify'];
  $medicationtreatment = $row['medicationtreatment'];
  $medicationtreatment_specify = $row['medicationtreatment_specify'];
  $allergiesmed = $row['allergiesmed'];
  $allergiesmed_specify = $row['allergiesmed_specify'];
  $allergiesfood = $row['allergiesfood'];
  $allergiesfood_specify = $row['allergiesfood_specify'];
  $firstaid = $row['firstaid'];
  $concerns = $row['concerns'];
  $concerns_specify = $row['concerns_specify'];  

?>
<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>
     <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
				    </div>
			    </div>
			    
          <div class="app-card app-card-notification shadow-sm mb-4">
				        <div class="row g-3 align-items-center">
							<?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-6">
                            <div class="container">

<div class="form-container">
  <div class="form-title">
  Health Profile Record
  </div>
  
            <div class="input_form">
              
              <div class="input_wrap" style="text-align: center;">
                <div class="image_container" style="display: inline-block; text-align: center;">
                    <img src="<?php echo "../../../../upload_image/".$row['image'];?>" style="display: block; margin: 0 auto;">
                   
                </div>
              </div>

            </div>
            <br>

              <div class="input_form grid-row-3">

                <div class="input_wrap">
                  <label for="fullname">Full Name</label>
                  <input name="fullname" type="text" class="input-box" value="<?=$row['fullname']; ?>" readonly >
                </div>

                <div class="input_wrap">
                  <label for="fullname">ID Number</label>
                  <input name="idnumber" type="text" class="input-box" value="<?=$row['idnumber'];?>" readonly >
                </div>

                <div class="input_wrap">
                  <label for="fullname">Personal Contact Number</label>
                  <input name="cp" type="text" class="input-box" value="<?=$row['cp'];?>" readonly>
                </div>

              </div>

<div class="input_form grid-row-3">

<div class="input_wrap">
  <label for="fullname">Birthday</label>
  <input name="birthday" type="text" class="input-box" value="<?=$row['birthday'];?>" readonly>
</div>

<div class="input_wrap">
  <label for="fullname">Gender</label>
  <select class="form-select" name="gender">
    <option disabled selected><?= $row['gender'];?></option>
  </select>
</div>

</div>


<div class="input_form grid-row-1">
  <div class="input_wrap">
      <label for="fullname">Home Address</label>
      <input class="input-box" name="address" id ="address" type="text" value="<?=$row['address'];?>" readonly>
  </div>
</div>

                  
<div class="input_form grid-row-1">
  <div class="input_wrap">
      <label for="fullname">Present Address</label>
      <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>" readonly>
  </div>
</div>

<div class="input_form grid-row-2">

<div class="input_wrap">
  <label for="fullname">Name of Father</label>
  <input name="fathername" id="father" type="text" value="<?=$row['father'];?>" readonly>
</div>

<div class="input_wrap">
  <label for="fullname">Contact</label>
  <input class="input-box" name="cfather" id="contactInput_one" type="text" value="<?=$row['cfather'];?>" readonly>
</div>

</div>

<div class="input_form grid-row-2">

<div class="input_wrap">
    <label for="fullname">Name of Mother</label>
    <input name="mothername" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input class="input-box" name="cmother" id="contactInput_two" type="text" value="<?=$row['cmother'];?>" readonly>
</div>

</div>

<div class="input_form grid-row-2">
<div class="input_wrap">
    <label for="fullname">Religion</label>
    <input name="religion" id="religion" type="text" value="<?=$row['religion'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Nationality</label>
    <input name="nationality" id="nationality" type="text" value="<?=$row['nationality'];?>" readonly>
</div>
</div>

<div class="input_form grid-row-1">
  <div class="input_wrap">
      <label for="fullname">Primary Language Spoken (Bicol, Tagalog, English, etc.)</label>
      <input name="language" id ="language" type="text" value="<?=$row['language'];?>" readonly>
  </div>
</div>

<div class="input_form">
  <label for="fullname" style="font-size: 18px;">Student lives with: </label>
</div>
<br>

<div class="checkbox-group">

<div>
<input class="checkbox" name="student_lives" value="livesbothparents" type="radio" id="livesbothparents" <?php if (isset($row['student_lives']) && $row['student_lives'] == 'livesbothparents') echo "checked"; ?>>    
<label class="checkbox-label" for="livesbothparents" style="font-size: 14px; padding-left: 30px;">Both Parents</label>
</div>


<div>
<input class="checkbox" name="student_lives" value="livesfather" type="radio" id="livesfather" <?php if (isset($row['student_lives']) && $row['student_lives'] == 'livesfather') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="livesfather">Father</label>
</div>

<div>
<input class="checkbox" name="student_lives" value="livesmother" type="radio" id="livesmother" <?php if (isset($row['student_lives']) && $row['student_lives'] == 'livesmother') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="livesmother">Mother</label>
</div>

<div>
<input class="checkbox" name="student_lives" value="livesguardian" type="radio" id="livesguardian" <?php if (isset($row['student_lives']) && $row['student_lives'] == 'livesguardian') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="livesguardian">Guardian</label>
</div>

</div>

<div class="input_form grid-row-3">

<div class="input_wrap">
    <label for="fullname">Person to contact in case of emergency</label>
    <input name="guardianname" id="guardianname" type="text"  value="<?=$row['guardianname'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Relation to the student</label>
    <input name="guardianrelation" id="guardianrelation" type="text" value="<?=$row['guardianrelation'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input id="contactInput_cguardian" class="input-box" name="cguardian" type="text"  value="<?=$row['cguardian'];?>" readonly>
</div>

</div>

<div>
  <p class="title" style="font-size: 20px; font-weight: bold;">IMMUNIZATION</p>
</div>
<p class="instructions">Please select the box if your child/ward has completed the following Primary Immunization.</p>

<div class="checkbox-group">

  <div>
    <input class="checkbox" name="bcg" value="bcg" type="checkbox" id="bcg" value="<?= $row['bcg'];?>" <?php if ($row['bcg']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bcg">BCG</label>
  </div>

  <div>
    <input class="checkbox" name="dpt" value="dpt" type="checkbox" id="dpt" value="<?= $row['dpt'];?>" <?php if ($row['dpt']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="dpt">DPT</label>
  </div>

  <div>
    <input class="checkbox" name="opv" value="opv" type="checkbox" id="opv" value="<?= $row['opv'];?>" <?php if ($row['opv']) echo "checked"; ?>>
    <label class="checkbox-label"  style="font-size: 14px; padding-left: 30px;" for="opv">OPV</label>
  </div>

  <div>
    <input class="checkbox" name="hepa" value="hepa" type="checkbox" id="hepa" value="<?= $row['hepa'];?>" <?php if ($row['hepa']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hepa">Hepa B</label>
  </div>

  <div>
    <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="measles">Measles</label>
  </div>

</div>


<div class="input_wrap">
  <label for="fullname">Others</label>
  <input class="input-box" name="others" id="others" type="text" value="<?=$row['others'];?>" readonly>
</div>

<br>
<p>Does your child/ward have COVID-19 Vaccination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card).</p> <p>The Employee is required to answer this.</p>



<div class="input_form">

<div>
<input class="checkbox" name="vaccination" value="firstdose" type="radio" id="firstdose" <?php if (isset($row['vaccination']) && $row['vaccination'] == 'firstdose') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="firstdose">First Dose Only</label>
</div>

<div>
<input class="checkbox" name="vaccination" value="seconddose" type="radio" id="seconddose" <?php if (isset($row['vaccination']) && $row['vaccination'] == 'seconddose') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="seconddose">Second Dose</label>
</div>

<div>
<input class="checkbox" name="vaccination" value="boosterdose" type="radio" id="boosterdose" <?php if (isset($row['vaccination']) && $row['vaccination'] == 'boosterdose') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="boosterdose">Booster Dose</label>
</div>

<div>
<input class="checkbox" name="vaccination" value="no" type="radio" id="no" <?php if (isset($row['vaccination']) && $row['vaccination'] == 'no') echo "checked"; ?>>    
  <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="no">No</label>
</div>  

</div>

<div class="input_wrap">
<div class="image_container">
  <label>Vaccination Attachment</label>
    <img src="<?php echo "../../../../upload_image/".$row['imagevac'];?>">
</div>
</div>

<br>
<div class="medical-history">

<p class="title" style="font-size: 20px; font-weight: bold;">MEDICAL HISTORY</p>
<p>Does you/your child have/ or history of the following conditions?

<div class="checkbox-group">

  <div>
    <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="asthma">Asthma</label>
  </div>

  <div>
    <input  class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="faintingspells">Fainting Spells</label>
  </div>

  <div>
    <input class="checkbox" name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis" value="<?= $row['allergicrhinitis'];?>" <?php if ($row['allergicrhinitis']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="allergicrhinitis">Allergic Rhinitis</label>
  </div>

  <div>
    <input class="checkbox" name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache" value="<?= $row['freqheadache'];?>" <?php if ($row['freqheadache']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="freqheadache">Frequent Headache</label>
  </div>

  <div>
    <input class="checkbox" name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis" value="<?= $row['anxietydis'];?>" <?php if ($row['anxietydis']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="anxietydis">Anxiety Disoder</label>
  </div>

  <div>
    <input class="checkbox" name="g6pd" value="g6pd" type="checkbox" id="g6pd" value="<?= $row['g6pd'];?>" <?php if ($row['g6pd']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="g6pd">G6PD</label>
  </div>

  <div>
    <input class="checkbox" name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting" value="<?= $row['bleedingclotting'];?>" <?php if ($row['bleedingclotting']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bleedingclotting">Bleeding/Clotting Disorder</label>
  </div>

  <div>
    <input class="checkbox" name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob" value="<?= $row['hearingprob'];?>" <?php if ($row['hearingprob']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hearingprob">Hearing Problem</label>
  </div> 
  
  <div>
    <input class="checkbox" name="hypergas" value="hypergas" type="checkbox" id="hypergas" value="<?= $row['hypergas'];?>" <?php if ($row['hypergas']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypergas">Hyperacidity/Gastritis</label>
  </div>

  <div>
    <input class="checkbox" name="derma" value="derma" type="checkbox" id="derma" value="<?= $row['derma'];?>" <?php if ($row['derma']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="derma">Dermatitis/Skin Problem</label>
  </div>

  <div>
    <input class="checkbox" name="hypertension" value="hypertension" type="checkbox" id="hypertension" value="<?= $row['hypertension'];?>" <?php if ($row['hypertension']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypertension">Hypertension</label>
  </div>

  <div>
    <input class="checkbox" name="diabetes" value="diabetes" type="checkbox" id="diabetes" value="<?= $row['diabetes'];?>" <?php if ($row['diabetes']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="diabetes">Diabetes Mellitus</label>
  </div>

  <div>
    <input class="checkbox" name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation" value="<?= $row['hyperventilation'];?>" <?php if ($row['hyperventilation']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hyperventilation">Hyperventilation</label>
  </div>

  <div>
    <input class="checkbox" name="mens" value="mens" type="checkbox" id="mens" value="<?= $row['mens'];?>" <?php if ($row['mens']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="mens">Dysmenorrhea/Menstrual Cramps</label>
  </div>

</div>
</div>


  <div class="input_wrap">
      <label for="fullname">Others</label>
      <input name="othersmedical" class="input-box" id ="othersmedical" type="text" placeholder="Other Conditions"  value="<?=$row['othersmedical'];?>" readonly>
  </div>

<div class="input_wrap">
<p>Do you have a heart condition? (If yes, please specify.)</p>                

<div class="row-container">
  <div>
      <input class="checkbox" name="heartcondition" value="yes" type="radio" id="yesheartcon" <?php if (isset($row['heartcondition']) && $row['heartcondition'] == 'yes') echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesheartcon">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="heartcondition" value="no" type="radio" id="yesheartcon" <?php if (isset($row['heartcondition']) && $row['heartcondition'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noheartcon">No</label>
  </div>

  <div class="input_wrap">
    <input name="heartcon_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['heartcon_specify'];?>" readonly>
  </div>
</div>
</div>

<div class="question">
<p>Do you have an Eye problem? (If yes, please specify.)</p>

<div class="row-container">

  <div>
  <input class="checkbox" name="eyeproblem" value="yes" type="radio" id="eyeproblem" <?php if (isset($row['eyeproblem']) && $row['eyeproblem'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yeseyeprob">Yes</label>
  </div>

  <div>
  <input class="checkbox" name="eyeproblem" value="no" type="radio" id="eyeproblem" <?php if (isset($row['eyeproblem']) && $row['eyeproblem'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noeyeprob">No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="eyeprob_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['eyeprob_specify'];?>" readonly>  
  </div>

</div>

</div>

<div class="question">

<p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>

<div class="row-container">

  <div>
    <input class="checkbox" name="seriousillness" value="yes" type="radio" id="yesseriousillness" <?php if (isset($row['seriousillness']) && $row['seriousillness'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="seriousillness" value="no" type="radio" id="yesseriousillness" <?php if (isset($row['seriousillness']) && $row['seriousillness'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="seriousillness_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['seriousillness_specify'];?>" readonly>
  </div>

</div>

</div>

<div class="question">

<p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p>

<div class="row-container">

  <div>
  <input class="checkbox" name="surgeries_injuries" value="yes" type="radio" id="surgeries_injuries" <?php if (isset($row['surgeries_injuries']) && $row['surgeries_injuries'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">
    Yes</label>
  </div>

  <div>
  <input class="checkbox" name="surgeries_injuries" value="no" type="radio" id="surgeries_injuries" <?php if (isset($row['surgeries_injuries']) && $row['surgeries_injuries'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">
    No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="surgeries_injuries_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['surgeries_injuries_specify'];?>" readonly>
  </div>

</div>

</div>

<div class="question">

<p> Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</p>
<div class="row-container">

  <div>
    <input class="checkbox" name="medicationtreatment" value="yes" type="radio" id="yesmedicationtreatment" <?php if (isset($row['medicationtreatment']) && $row['medicationtreatment'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="medicationtreatment" value="no" type="radio" id="yesmedicationtreatment" <?php if (isset($row['medicationtreatment']) && $row['medicationtreatment'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="medicationtreatment_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['medicationtreatment_specify'];?>" readonly>
  </div>
</div>

</div>

<div class="question">

<p>Do you have any allergies to medication? (If yes, please specify.)</p>
<div class="row-container">

  <div>
    <input class="checkbox" name="allergiesmed" value="yes" type="radio" id="yesallergiesmed" <?php if (isset($row['allergiesmed']) && $row['allergiesmed'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="allergiesmed" value="yes" type="radio" id="yesallergiesmed" <?php if (isset($row['allergiesmed']) && $row['allergiesmed'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
  </div>

  <div class="input_wrap">
  <input class="input-box" name="allergiesmed_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesmed_specify'];?>" readonly>
  </div>
</div>

</div>

<div class="question">

<p>Do you have any allergies to food? (If yes, please specify.)</p>
<div class="row-container">
  <div>
    <input class="checkbox" name="allergiesfood" value="yes" type="radio" id="noallergiesfood" <?php if (isset($row['allergiesfood']) && $row['allergiesfood'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="allergiesfood" value="no" type="radio" id="noallergiesfood" <?php if (isset($row['allergiesfood']) && $row['allergiesfood'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="allergiesfood_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesfood_specify'];?>" readonly>
  </div>
  
</div>

</div>

<div class="question">

<p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
<div class="row-container">
  <div>
    <input class="checkbox" name="firstaid" value="yes" type="radio" id="yesfirstaid" <?php if (isset($row['firstaid']) && $row['firstaid'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesfirstaid">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="firstaid" value="no" type="radio" id="yesfirstaid" <?php if (isset($row['firstaid']) && $row['firstaid'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
  </div>
</div>

</div>

<div class="question">

<p>Do you have any concerns related to your health? (If yes, please explain.)</p>
<div class="row-container">
  <div>
    <input class="checkbox" name="concerns" value="yes" type="radio" id="yesconcerns" <?php if (isset($row['concerns']) && $row['concerns'] == 'yes') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
  </div>

  <div>
    <input class="checkbox" name="concerns" value="no" type="radio" id="yesconcerns" <?php if (isset($row['concerns']) && $row['concerns'] == 'no') echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noconcerns">No</label>
  </div>

  <div class="input_wrap">
    <input class="input-box" name="concerns_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['concerns_specify'];?>" readonly>
  </div>

</div>

</div>
</div>	
<?php } ?>
<!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  					
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 


</body>
</html> 
