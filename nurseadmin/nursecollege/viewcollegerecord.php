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
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="../../assets/newcss/style.css">
    <link rel="stylesheet" href="../../assets/newcss/formstyles.css">


</head> 

<body class="app">   	
<?php  	
$healthcollege_id = $_GET['healthcollege_id'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM healthrecordformcollege WHERE healthcollege_id = '$healthcollege_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $image = $row['image'];
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $gender = $row['gender'];
  $address = $row ['address'];
  $pcontact = $row ['pcontact'];
  $nationality = $row['nationality'];
  $otherNationality = $row['otherNationality'];
  $birthday = $row['birthday'];
  $religion = $row['religion'];
  $otherReligion = $row['otherReligion'];
  $fguardian = $row['fguardian'];
  $occupation1 = $row['occupation1'];
  $mother = $row['occupation2'];
  $contactemer= $row['contactemer'];
  $contactno = $row['contactno'];
  $relation = $row['relation'];
  $referral = $row['referral'];
  $contactno2 = $row['contactno2'];
  $physiciannumcall = ['physiciannumcall'];
  $addresshospital = $row['addresshospital'];
  $td = $row['td'];
  $mmr = $row['mmr'];
  $hepab = $row ['hepab'];
  $varicella = $row['varicella'];
  $asthma_history =$row['asthma_history'];
  $asthma_relation = $row['asthma_relation'];
  $bleedingtendency_history = $row['bleedingtendency_history'];
  $bleedingtendency_relation = $row['bleedingtendency_relation'];
  $cancer_history = $row['cancer_history'];
  $cancer_relation = $row['cancer_relation'];
  $diabetes_history =$row['diabetes_history'];
  $heartdisorder_history =$row['heartdisorder_history'];
  $heartdisorder_relation = $row['heartdisorder_relation'];
  $highblood_history =$row['highblood_history'];
  $highblood_relation =$row['highblood_relation'];
  $kidneyproblem_history =$row['kidneyproblem_history'];
  $kidneyproblem_relation =$row['kidneyproblem_relation'];
  $mentaldisorder_history =$row['mentaldisorder_history'];
  $mentaldisorder_relation =$row['mentaldisorder_relation'];
  $obesity_history  = $row['obesity_history'];
  $obesity_relation = $row['obesity_relation'];
  $seizuredisorder_history = $row['seizuredisorder_history'];
  $seizuredisorder_relation =$row['seizuredisorder_relation'];
  $stroke_history =$row['stroke_history'];
  $stroke_relation =$row['stroke_relation'];
  $tb_history =$row['tb_history'];
  $tb_relation =$row['tb_relation'];
  $allergy =$row['allergy'];
  $anemia =$row['anemia'];
  $asthma = $row['asthma'];
  $behavioral =$row['behavioral'];
  $bleedingprob =$row['bleedingprob'];
  $blood= $row['blood'];
  $chickenpox =$row['chickenpox'];
  $convulsion =$row['convulsion'];
  $dengue =$row['dengue'];
  $diabetess =$row['diabetess'];
  $earproblem =$row['earproblem'];
  $eating_disorder =$row['eating_disorder'];
  $epilepsy =$row['epilepsy'];
  $eyeproblemm =$row['eyeproblemm'];
  $fracture =$row['fracture'];
  $hearing_problem =$row['hearing_problem'];
  $heart_disorder =$row['heart_disorder'];
  $hyperacidity =$row['hyperacidity'];
  $indigestion =$row['indigestion'];
  $insomia =$row['insomia'];
  $kidney_problem =$row['kidney_problem'];
  $liver_problem =$row['liver_problem'];
  $measless =$row['measless'];
  $mumpss =$row['mumpss'];
  $parasitism =$row['parasitism'];
  $pneumonia =$row['pneumonia'];
  $primary_complex =$row['primary_complex'];
  $scoliosis =$row['scoliosis'];
  $skin_problem =$row['skin_problem'];
  $tonsillitis =$row['tonsillitis'];
  $typhoid_fever =$row['typhoid_fever'];
  $vision_defect =$row['vision_defect'];
  $otherillness =$row['otherillness'];
  $hospitalization_history =$row['hospitalization_history'];
  $surgicaloperation_history =$row['surgicaloperation_history'];
  $specialmed =$row['specialmed'];
  $otherrelevant =$row['otherrelevant'];

    }
 else {
 } 
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
                                        
                                            <form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data">

                                    <div class="input_form">

                                        <div class="input_wrap" style="text-align: center;">
                                            <div class="image_container" style="display: inline-block; text-align: center;">
                                                <img src="<?php echo "/DivineClinic/upload_image/".$row['image'];?>" style="display: block; margin: 0 auto;">
                                            </div>
                                        </div>

                            </div>
                            <br>

                                <div class="input_form">

                                <div class="input_wrap">
                                    <label for="fullname">Full Name</label>
                                    <input class="input-box" id="fullname" name="fullname" type="text" value="<?= $row['fullname']; ?>" readonly>
                                </div>

                                <div class="input_wrap">
                                    <label for="fullname">ID Number</label>
                                    <input name="idnumber" class="input-box" type="text" value="<?=$row['idnumber'];?>" readonly>
                                </div>

                                <div class="input_wrap">
                                    <label for="fullname">Gender</label>
                                    <select class="form-select" name="gender">
                            <option disabled selected><?= $row['gender'];?></option>
                            </select>            </div>

                            <div class="input_wrap">
                                <label for="fullname">Address</label>
                                <input name="address" id ="address" type="text" style="width:  553px;" value="<?=$row['address'];?>" readonly>
                                </div>


                                </div>


                                                
                        <div class="input_form">

                            <div class="input_wrap">
                            <label for="fullname">Personal Contact No</label>
                            <input name="pcontact" class="input-box" type="text" id="pcontact" value="<?=$row['pcontact'];?>" readonly>
                            </div>
                        
                            <div class="input_wrap">
  <label for="fullname">Nationality</label>
  <?php if ($row['nationality'] === 'Other' && !empty($row['otherNationality'])) : ?>
    <input class="input-box" name="nationality" id="nationality" type="text" style="width: 240px;" value="<?php echo $row['otherNationality']; ?>" readonly>
  <?php else : ?>
    <input class="input-box" name="nationality" id="nationality" type="text" style="width: 240px;" value="<?php echo $row['nationality']; ?>" readonly>
  <?php endif; ?>
</div>


                            <div class="input_wrap">
                            <label for="fullname">Birthday</label>
                            <input name="birthday" class="input-box" id="birthday" type="date" value="<?=$row['birthday'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                    <label for="fullname">Religion</label>
                                    <?php if ($row['religion'] === 'Other' && !empty($row['otherReligion'])) : ?>
                                        <input class="input-box" name="religion" id="religion" type="text" style="width: 240px;" value="<?php echo $row['otherReligion']; ?>" readonly>
                                    <?php else : ?>
                                        <input class="input-box" name="religion" id="religion" type="text" style="width: 240px;" value="<?php echo $row['religion']; ?>" readonly>
                                    <?php endif; ?>
                                    </div>

                        </div>

                            <div class="input_for">

                            <div class="input_wrap">
                                <label for="fullname">Father's Name</label>
                                <input name="fguardian" class="input-box" id="fguardian" type="text" value="<?=$row['fguardian'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Occupation</label>
                                <input name="occupation1" class="input-box" id="fguardian" type="text" value="<?=$row['occupation1'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Mother's Name</label>
                                <input name="mother" id="fguardian" type="text"  class="input-box" value="<?=$row['mother'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Occupation</label>
                                <input name="occupation2" class="input-box" id="fguardian" type="text" value="<?=$row['occupation2'];?>" readonly>
                            </div>

                            </div>

                            <div class="input_form grid-row-3">

                            <div class="input_wrap">
                                <label for="fullname">Contact in case of emergency</label>
                                <input class="input-box" name="contactemer" id="contactemer" type="text" value="<?=$row['contactemer'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Contact Numbers</label>
                                <input name="contactno" class="input-box" id="con" type="text" value="<?=$row['contactno'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Relation to student/employee</label>
                                <input name="relation" class="input-box" id="con" type="text" value="<?=$row['relation'];?>" readonly>
                            </div>

                            </div>

                            <div class="input_form">

                            <div class="input_wrap">
                                <label for="fullname">Hospital of Choice of referral</label>
                                <input class="input-box" name="referral" id="referral" type="text" value="<?=$row['referral'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Contact Numbers</label>
                                <input class="input-box" name="contactno2" id="con" type="text" value="<?=$row['contactno2'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Physician and Number to call</label>
                                <input class="input-box" name="physiciannumcall" id="physician" type="text" value="<?=$row['physiciannumcall'];?>" readonly>
                            </div>

                            <div class="input_wrap">
                                <label for="fullname">Address of Hospital</label>
                                <input class="input-box" name="addresshospital" id="physician" type="text" value="<?=$row['addresshospital'];?>" readonly>
                            </div>

                            </div>

                        <div>
                            <br>
                            <b><p class="title" style="font-size: 20px; color: #000;">A. IMMUNIZATION</p></b>
                        </div>

                        <b><p class="vaccine">VACCINE</p></b>

                        <div class="input_form grid-row-2">

                            <div class="input_wrap">
                            <label for="fullname">Tetanus & Diphtheria (Td) of Tetanus Toxoid</label>
                            <input class="input-box" name="td" id="vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" value="<?=$row['td'];?>" readonly>
                            </div>

                            <div class="input_wrap" style="margin-left: 65px;">
                            <label for="fullname">Measles, Mumps, Rubella (MMR) </label>
                            <input class="input-box" name="mmr" id="vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" value="<?=$row['mmr'];?>" readonly>
                            </div>

                        </div>

                        <div class="input_form grid-row-2">

                            <div class="input_wrap">
                            <label for="fullname">Hepatitis B</label>
                            <input class="input-box" name="hepab" id="vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" value="<?=$row['hepab'];?>" readonly>
                            </div>

                            <div class="input_wrap" style="margin-left: 65px;">
                            <label for="fullname">Varicella</label>
                            <input class="input-box" name="varicella" id="vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" value="<?=$row['varicella'];?>" readonly>
                            </div>

                        </div>

                        <div>
                            <br>
                            <b><p class="title" style="font-size: 20px; color: #000;">B. FAMILY HISTORY</p></b>
                        </div>

                        <b><p class="vaccine">DISEASE</p></b>

                        <div class="input_wrap">
                            <p>Asthma:</p>

                            <div class="row-container">

                            <div>
                                <input class="checkbox" name="asthma_history" value="yes" type="radio" id="yesasthma_history" <?php if (isset($row['asthma_history']) && $row['asthma_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesasthma_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="asthma_history" value="no" type="radio" id="noasthma_history" <?php if (isset($row['asthma_history']) && $row['asthma_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="noasthma_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="asthma_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['asthma_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>

                        <div class="input_wrap">
                            <p>Bleeding Tendency:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="bleedingtendency_history" value="yes" type="radio" id="yesbleedingtendency_history" <?php if (isset($row['bleedingtendency_history']) && $row['bleedingtendency_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesbleedingtendency_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>
                            
                            <div>
                                <input class="checkbox" name="bleedingtendency_history" value="no" type="radio" id="nobleedingtendency_history" <?php if (isset($row['bleedingtendency_history']) && $row['bleedingtendency_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nobleedingtendency_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>
                            
                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="bleedingtendency_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['asthma_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>

                        

                        <div class="input_wrap">
                            <p>Cancer:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="cancer_history" value="yes" type="radio" id="yescancer_history" <?php if (isset($row['cancer_history']) && $row['cancer_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yescancer_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>
                            
                            <div>
                                <input class="checkbox" name="cancer_history" value="no" type="radio" id="nocancer_history" <?php if (isset($row['cancer_history']) && $row['cancer_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nocancer_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>
                            
                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="cancer_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['cancer_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>
                        

                        <div class="input_wrap">
                            <p>Diabetes:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="diabetes_history" value="yes" type="radio" id="yesdiabetes_history" <?php if (isset($row['diabetes_history']) && $row['diabetes_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesdiabetes_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>
                            
                            <div>
                                <input class="checkbox" name="diabetes_history" value="no" type="radio" id="nodiabetes_history" <?php if (isset($row['diabetes_history']) && $row['diabetes_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nodiabetes_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>
                            
                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="diabetes_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['diabetes_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>

                        

                        <div class="input_wrap">
                            <p>Heart Disorder:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="heartdisorder_history" value="yes" type="radio" id="yesheartdisorder_history" <?php if (isset($row['heartdisorder_history']) && $row['heartdisorder_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesheartdisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>
                            
                            <div>
                                <input class="checkbox" name="heartdisorder_history" value="no" type="radio" id="noheartdisorder_history" <?php if (isset($row['heartdisorder_history']) && $row['heartdisorder_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="noheartdisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>
                            
                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="heartdisorder_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['heartdisorder_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>
                        


                        <div class="input_wrap">
                            <p>High Blood Pressure:</p>

                            <div class="row-container">

                            <div>
                                <input class="checkbox" name="highblood_history" value="yes" type="radio" id="yeshighblood_history" <?php if (isset($row['highblood_history']) && $row['highblood_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yeshighblood_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="highblood_history" value="no" type="radio" id="nohighblood_history" <?php if (isset($row['highblood_history']) && $row['highblood_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nohighblood_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="highblood_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['highblood_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>


                        <div class="input_wrap">
                            <p>Kidney Problem:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="kidneyproblem_history" value="yes" type="radio" id="yeskidneyproblem_history" <?php if (isset($row['kidneyproblem_history']) && $row['kidneyproblem_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yeskidneyproblem_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox"  name="kidneyproblem_history" value="no" type="radio" id="nokidneyproblem_history" <?php if (isset($row['kidneyproblem_history']) && $row['kidneyproblem_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nokidneyproblem_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="kidneyproblem_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['kidneyproblem_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>
                        
                        <!--  -->
                        <div class="input_wrap">
                            <p>Mental Disorder:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="mentaldisorder_history" value="yes" type="radio" id="yesmentaldisorder_history" <?php if (isset($row['mentaldisorder_history']) && $row['mentaldisorder_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesmentaldisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="mentaldisorder_history" value="no" type="radio" id="nomentaldisorder_history" <?php if (isset($row['mentaldisorder_history']) && $row['mentaldisorder_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nomentaldisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="mentaldisorder_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['mentaldisorder_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>
                        

                        <div class="input_wrap">
                            <p>Obesity:</p>

                            <div class="row-container">
                        
                            <div> 
                                <input class="checkbox" name="obesity_history" value="yes" type="radio" id="yesobesity_history" <?php if (isset($row['obesity_history']) && $row['obesity_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesobesity_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="obesity_history" value="no" type="radio" id="noobesity_history" <?php if (isset($row['obesity_history']) && $row['obesity_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="noobesity_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="obesity_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['obesity_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>
                        

                        <div class="input_wrap">
                            <p>Seizure Disorder:</p>
                        </div>

                        <div class="row-container">
                        
                            <div>
                            <input class="checkbox" name="seizuredisorder_history" value="yes" type="radio" id="yesseizuredisorder_history" <?php if (isset($row['seizuredisorder_history']) && $row['seizuredisorder_history'] == 'yes') echo "checked"; ?>>
                            <label class="checkbox-label" for="yesseizuredisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                            <input class="checkbox" name="seizuredisorder_history" value="no" type="radio" id="noseizuredisorder_history" <?php if (isset($row['seizuredisorder_history']) && $row['seizuredisorder_history'] == 'no') echo "checked"; ?>>
                            <label class="checkbox-label" for="noseizuredisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                            <input class="input-box" style="width: 400px;" name="seizuredisorder_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['seizuredisorder_relation'];?>" readonly>
                            </div>
                        </div>

                        <div class="input_wrap">
                            <p>Stroke:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="stroke_history" value="yes" type="radio" id="yesstroke_history" <?php if (isset($row['stroke_history']) && $row['stroke_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesstroke_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="stroke_history" value="no" type="radio" id="nostroke_history" <?php if (isset($row['stroke_history']) && $row['stroke_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nostroke_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="stroke_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['stroke_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>

                        <div class="input_wrap">
                            <p>Tuberculosis:</p>

                            <div class="row-container">
                        
                            <div>
                                <input class="checkbox" name="tb_history" value="yes" type="radio" id="yestb_history" <?php if (isset($row['tb_history']) && $row['tb_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yesstroke_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="tb_history" value="no" type="radio" id="notb_history" <?php if (isset($row['tb_history']) && $row['tb_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="notb_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                            <div class="input_wrap">
                                <input class="input-box" style="width: 400px;" name="tb_relation" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['tb_relation'];?>" readonly>
                            </div>

                            </div>
                        </div>

                        <div>
                        <br>
                        <b><p class="title" style="font-size: 20px; color: #000;">C. MEDICAL HISTORY:</b></p>
                        <p><i> The student/employee has suffered from: (please tick the box)</i></p>
                        </div>
                        
                        <b><p class="vaccine">ILLNESS</p></b>

                        <div class="input_form">

                            <div>
                                <input class="checkbox" name="allergy" value="allergy" type="checkbox" id="allergy" value="<?= $row['allergy'];?>" <?php if ($row['allergy']) echo "checked"; ?>>
                                <label class="checkbox-label" for="allergy" style="font-size: 14px; padding-left: 30px;">ALLERGY</label>
                            </div>
                            <div>
                                <input class="checkbox" name="anemia" value="anemia" type="checkbox" id="anemia" value="<?= $row['anemia'];?>" <?php if ($row['anemia']) echo "checked"; ?>>
                                <label class="checkbox-label" for="anemia" style="font-size: 14px; padding-left: 30px;">ANEMIA</label>
                            </div>
                            <div>
                                <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>> 
                                <label class="checkbox-label" for="asthma" style="font-size: 14px; padding-left: 30px;">ASTHMA</label>
                            </div>
                            <div>
                                <input class="checkbox" name="behavioral" value="behavioral" type="checkbox" id="behavioral" value="<?= $row['behavioral'];?>" <?php if ($row['behavioral']) echo "checked"; ?>>
                                <label class="checkbox-label" for="behavioral" style="font-size: 14px; padding-left: 30px;">BEHAVIORAL PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="bleedingprob" value="bleedingprob" type="checkbox" id="bleedingprob" value="<?= $row['bleedingprob'];?>" <?php if ($row['bleedingprob']) echo "checked"; ?>>
                                <label class="checkbox-label" for="bleedingprob" style="font-size: 14px; padding-left: 30px;">BLEEDING PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="blood" value="blood" type="checkbox" id="blood" value="<?= $row['blood'];?>" <?php if ($row['blood']) echo "checked"; ?>>
                                <label class="checkbox-label" for="blood" style="font-size: 14px; padding-left: 30px;">BLOOD ABNORMALITY</label>
                            </div>
                            <div>
                                <input class="checkbox" name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox" value="<?= $row['chickenpox'];?>" <?php if ($row['chickenpox']) echo "checked"; ?>>
                                <label class="checkbox-label" for="chickenpox" style="font-size: 14px; padding-left: 30px;">CHICKEN POX</label>
                            </div>
                            <div>
                                <input class="checkbox" name="convulsion" value="convulsion" type="checkbox" id="convulsion" value="<?= $row['convulsion'];?>" <?php if ($row['convulsion']) echo "checked"; ?>>
                                <label class="checkbox-label" for="convulsion" style="font-size: 14px; padding-left: 30px;">CONVULSION</label>
                            </div>
                            <div>
                                <input class="checkbox" name="dengue" value="dengue" type="checkbox" id="dengue" value="<?= $row['dengue'];?>" <?php if ($row['dengue']) echo "checked"; ?>>
                                <label class="checkbox-label" for="dengue" style="font-size: 14px; padding-left: 30px;">DENGUE</label>
                            </div>
                            <div>
                                <input class="checkbox" name="diabetess" value="diabetess" type="checkbox" id="diabetess" value="<?= $row['diabetess'];?>" <?php if ($row['diabetess']) echo "checked"; ?>>
                                <label class="checkbox-label" for="diabetess" style="font-size: 14px; padding-left: 30px;">DIABETES</label>
                            </div>
                            <div>
                                <input class="checkbox" name="earproblem" value="earproblem" type="checkbox" id="earproblem" value="<?= $row['earproblem'];?>" <?php if ($row['earproblem']) echo "checked"; ?>>
                                <label class="checkbox-label" for="earproblem" style="font-size: 14px; padding-left: 30px;">EAR PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="eating_disorder" value="eating_disorder" type="checkbox" id="eating_disorder" value="<?= $row['eating_disorder'];?>" <?php if ($row['eating_disorder']) echo "checked"; ?>>
                                <label class="checkbox-label" for="eating_disorder" style="font-size: 14px; padding-left: 30px;">EATING DISORDER</label>
                            </div>

                            <div>
                                <input class="checkbox" name="epilepsy" value="epilepsy" type="checkbox" id="epilepsy" value="<?= $row['epilepsy'];?>" <?php if ($row['epilepsy']) echo "checked"; ?>>
                                <label class="checkbox-label" for="epilepsy" style="font-size: 14px; padding-left: 30px;">EPILEPSY</label>
                            </div>
                            <div>
                                <input class="checkbox" name="eyeproblemm" value="eyeproblemm" type="checkbox" id="eyeproblemm" value="<?= $row['eyeproblemm'];?>" <?php if ($row['eyeproblemm']) echo "checked"; ?>>
                                <label class="checkbox-label" for="eyeproblemm" style="font-size: 14px; padding-left: 30px;">EYE PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="fracture" value="fracture" type="checkbox" id="fracture" value="<?= $row['fracture'];?>" <?php if ($row['fracture']) echo "checked"; ?>>
                                <label class="checkbox-label" for="fracture" style="font-size: 14px; padding-left: 30px;">FRACTURE</label>
                            </div>
                            <div>
                                <input class="checkbox" name="hearing_problem" value="hearing_problem" type="checkbox" id="hearing_problem" value="<?= $row['hearing_problem'];?>" <?php if ($row['hearing_problem']) echo "checked"; ?>>
                                <label class="checkbox-label" for="hearing_problem" style="font-size: 14px; padding-left: 30px;">HEARING PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="heart_disorder" value="heart_disorder" type="checkbox" id="heart_disorder" value="<?= $row['heart_disorder'];?>" <?php if ($row['heart_disorder']) echo "checked"; ?>>
                                <label class="checkbox-label" for="heart_disorder" style="font-size: 14px; padding-left: 30px;">HEART DISORDER</label>
                            </div>
                            <div>
                                <input class="checkbox" name="hyperacidity" value="hyperacidity" type="checkbox" id="hyperacidity" value="<?= $row['hyperacidity'];?>" <?php if ($row['hyperacidity']) echo "checked"; ?>>
                                <label class="checkbox-label" for="hyperacidity" style="font-size: 14px; padding-left: 30px;">HYPERACIDITY</label>
                            </div>
                            <div>
                                <input class="checkbox" name="indigestion" value="indigestion" type="checkbox" id="indigestion" value="<?= $row['indigestion'];?>" <?php if ($row['indigestion']) echo "checked"; ?>>
                                <label class="checkbox-label" for="indigestion" style="font-size: 14px; padding-left: 30px;">INDIGESTION</label>
                            </div>
                            <div>
                                <input class="checkbox" name="insomia" value="insomia" type="checkbox" id="insomia" value="<?= $row['insomia'];?>" <?php if ($row['insomia']) echo "checked"; ?>>
                                <label class="checkbox-label" for="insomia" style="font-size: 14px; padding-left: 30px;">INSOMIA</label>
                            </div>
                            <div>
                                <input class="checkbox" name="kidney_problem" value="kidney_problem" type="checkbox" id="kidney_problem" value="<?= $row['kidney_problem'];?>" <?php if ($row['kidney_problem']) echo "checked"; ?>>
                                <label class="checkbox-label" for="kidney_problem" style="font-size: 14px; padding-left: 30px;">KIDNEY PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="liver_problem" value="liver_problem" type="checkbox" id="liver_problem" value="<?= $row['liver_problem'];?>" <?php if ($row['liver_problem']) echo "checked"; ?>>
                                <label class="checkbox-label" for="liver_problem" style="font-size: 14px; padding-left: 30px;">LIVER PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="measless" value="measless" type="checkbox" id="measless" value="<?= $row['measless'];?>" <?php if ($row['measless']) echo "checked"; ?>>
                                <label class="checkbox-label" for="measless" style="font-size: 14px; padding-left: 30px;">MEASLES</label>
                            </div>
                            <div>
                                <input class="checkbox" name="mumpss" value="mumpss" type="checkbox" id="mumpss" value="<?= $row['mumpss'];?>" <?php if ($row['mumpss']) echo "checked"; ?>>
                                <label class="checkbox-label" for="mumpss" style="font-size: 14px; padding-left: 30px;">MUMPS</label>
                            </div>
                            <div>
                                <input class="checkbox" name="parasitism" value="parasitism" type="checkbox" id="parasitism" value="<?= $row['parasitism'];?>" <?php if ($row['parasitism']) echo "checked"; ?>>
                                <label class="checkbox-label" for="parasitism" style="font-size: 14px; padding-left: 30px;">PARASITISM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="pneumonia" value="pneumonia" type="checkbox" id="pneumonia" value="<?= $row['pneumonia'];?>" <?php if ($row['pneumonia']) echo "checked"; ?>>
                                <label class="checkbox-label" for="pneumonia" style="font-size: 14px; padding-left: 30px;">PNEUMONIA</label>
                            </div>
                            <div>
                                <input class="checkbox" name="primary_complex" value="primary_complex" type="checkbox" id="primary_complex" value="<?= $row['primary_complex'];?>" <?php if ($row['primary_complex']) echo "checked"; ?>>
                                <label class="checkbox-label" for="primary_complex" style="font-size: 14px; padding-left: 30px;">PRIMARY COMPLEX</label>
                            </div>
                            <div>
                                <input class="checkbox" name="scoliosis" value="scoliosis" type="checkbox" id="scoliosis" value="<?= $row['scoliosis'];?>" <?php if ($row['scoliosis']) echo "checked"; ?>>
                                <label class="checkbox-label" for="scoliosis" style="font-size: 14px; padding-left: 30px;">SCOLIOSIS</label>
                            </div>
                            <div>
                                <input class="checkbox" name="skin_problem" value="skin_problem" type="checkbox" id="skin_problem" value="<?= $row['skin_problem'];?>" <?php if ($row['skin_problem']) echo "checked"; ?>>
                                <label class="checkbox-label" for="skin_problem" style="font-size: 14px; padding-left: 30px;">SKIN PROBLEM</label>
                            </div>
                            <div>
                                <input class="checkbox" name="tonsillitis" value="tonsillitis" type="checkbox" id="tonsillitis" value="<?= $row['tonsillitis'];?>" <?php if ($row['tonsillitis']) echo "checked"; ?>>
                                <label class="checkbox-label" for="tonsillitis" style="font-size: 14px; padding-left: 30px;">TONSILLITIS</label>
                            </div>
                            <div>
                                <input class="checkbox" name="typhoid_fever" value="typhoid_fever" type="checkbox" id="typhoid_fever" value="<?= $row['typhoid_fever'];?>" <?php if ($row['typhoid_fever']) echo "checked"; ?>>
                                <label class="checkbox-label" for="typhoid_fever" style="font-size: 14px; padding-left: 30px;">TYPHOID FEVER</label>
                            </div>
                            <div>
                                <input class="checkbox" name="vision_defect" value="vision_defect" type="checkbox" id="vision_defect" value="<?= $row['vision_defect'];?>" <?php if ($row['vision_defect']) echo "checked"; ?>>
                                <label class="checkbox-label" for="vision_defect" style="font-size: 14px; padding-left: 30px;">VISION DEFECT</label>
                            </div>
                            
                        </div>

                            <div class="input_wrap">
                                <label>Other Illness</label>
                                <input name="otherillness" type="text" style="width: 900px !important;" value="<?=$row['otherillness'];?>" readonly>
                                </div>

                        <div>
                            <br>
                            <p><i>The student/employee has a history of</i></p>
                        </div>

                        <div class="row-container">
                        
                            <b><p>Hospitalization</p></b>

                            <div>
                                <input class="checkbox" name="hospitalization_history" value="yes" type="radio" id="yeshospitalization_history" <?php if (isset($row['hospitalization_history']) && $row['hospitalization_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yeshospitalization_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="hospitalization_history" value="no" type="radio" id="nohospitalization_history" <?php if (isset($row['hospitalization_history']) && $row['hospitalization_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nohospitalization_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>
                            
                            <b><p>Surgical Operation</p></b>

                            <div>
                                <input class="checkbox" name="surgicaloperation_history" value="yes" type="radio" id="yessurgicaloperation_history" <?php if (isset($row['surgicaloperation_history']) && $row['surgicaloperation_history'] == 'yes') echo "checked"; ?>>
                                <label class="checkbox-label" for="yessurgicaloperation_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
                            </div>

                            <div>
                                <input class="checkbox" name="surgicaloperation_history" value="no" type="radio" id="nosurgicaloperation_history" <?php if (isset($row['surgicaloperation_history']) && $row['surgicaloperation_history'] == 'no') echo "checked"; ?>>
                                <label class="checkbox-label" for="nosurgicaloperation_history" style="font-size: 14px; padding-left: 30px;">No</label>
                            </div>

                        </div>

                        <br>
                            
                        <div class="row">
                        <div class="input_form grid-row-3">
                        <div class="input_wrap">
                            <label>Special medication:</label>
                            <input name="specialmed" type="text" style="" value="<?=$row['specialmed'];?>" readonly>
                        </div>
                        <div class="input_wrap">
                            <label>Allergic to the ff. drugs:</label>
                            <input name="allergicdrugs" style="" type="text" value="<?=$row['allergicdrugs'];?>" readonly>
                        </div>
                        <div class="input_wrap">
                            <label>Other relevant information</label>
                            <input name="otherrelevant" style="" type="text" value="<?=$row['otherrelevant'];?>" readonly>
                        </div>
                        </div>
                        </div>
                        </div>

                   </div><!--//app-card-body-->
               </div>			    
           </div>
       </div>				
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
	
	<script>
		// Timer to remove success message after 5 seconds (5000 milliseconds)
		setTimeout(function(){
			var successMessage = document.getElementById('success-message');
			if(successMessage){
				successMessage.remove();
			}
		}, 5000);
	</script>

</body>
</html> 

