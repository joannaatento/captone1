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

<body class="app">   
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
                    <?php  	
    $healthshs_id = $_GET['healthshs_id'];
    $sql = "SELECT * FROM healthrecordformshs WHERE healthshs_id='$healthshs_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $healthshs_id = $row['healthshs_id'];
    ?>


					
					<form class="form-horizontal mt-4" action="function/editrecordshs.php" method="POST" enctype="multipart/form-data">
                    <div class="container">

<div class="form-container ">
    <div class="form-title">
    Health Profile Record
    </div>

        <div class="input_form">

            <div class="input_wrap" style="text-align: center;">
                <div class="image_container" style="display: inline-block; text-align: center;">
                        <img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>"style="display: block; margin: 0 auto;">
                </div>
            </div>

        </div>
        <br>

    <div class="input_form grid-row-3">

        <div class="input_wrap">
            <label for="fullname">Full Name</label>
            <input class="input-box name="fullname" type="text" value="<?=$row['fullname'];?>" readonly>
        </div>
        <div class="input_wrap">
            <label for="fullname">ID Number</label>
            <input class="input-box" name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly>
        </div>
        <div class="input_wrap">
            <label for="personal_contact">Personal Contact No</label>
            <input class="input-box" name="phoneno" type="text" value="<?=$row['phoneno'];?>" readonly>
        </div>

    </div>

    <div class="input_form grid-row-2">

        <div class="input_wrap">
            <label for="fullname">Birthday</label>
            <input class="input-box" name="birthday" type="text" value="<?=$row['birthday'];?>" readonly>
        </div>                    
        
        <div class="input_wrap">
            <label for="fullname">Gender</label>
            <select class="form-select" name="gender" readonly>
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
            <input name="father" id="father" type="text" value="<?=$row['father'];?>" readonly>
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input class="input-box" name="cfather" id="contactInput_one" type="text" value="<?=$row['cfather'];?>" readonly>
        </div>
    </div>

    <div class="input_form grid-row-2">
        <div class="input_wrap">
            <label for="fullname">Name of Mother</label>
            <input name="mother" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cmother" class="input-box" id="contactInput_two" type="text" value="<?=$row['cmother'];?>" readonly>
        </div>
    </div>
<br>

<div class="medical-history">

<p style="color: #000; text-align: left;" >Please select box if you have/had any of the following illnesses:</p>

<div class="checkbox-group">

    <div>
        <input class="checkbox" name="polio" value="polio" type="checkbox" id="polio" value="<?= $row['polio'];?>" <?php if ($row['polio']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="polio" style="font-size: 14px; padding-left: 30px;">Polio</label>
    </div>

    <div>
        <input class="checkbox" name="tetanus" value="tetanus" type="checkbox" id="tetanus" value="<?= $row['tetanus'];?>" <?php if ($row['tetanus']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="tetanus" style="font-size: 14px; padding-left: 30px;">Tetanus</label>
    </div>

    <div>
        <input class="checkbox" name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox" value="<?= $row['chickenpox'];?>" <?php if ($row['chickenpox']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="chickenpox" style="font-size: 14px; padding-left: 30px;">Chicken Pox</label>
    </div>

    <div>
        <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="measles" style="font-size: 14px; padding-left: 30px;">Measles</label>
    </div>

    <div>
        <input class="checkbox" name="mumps" value="mumps" type="checkbox" id="mumps" value="<?= $row['mumps'];?>" <?php if ($row['mumps']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="mumps" style="font-size: 14px; padding-left: 30px;">Mumps</label>
    </div>

    <div>
        <input class="checkbox" name="tb" value="tb" type="checkbox" id="tb" value="<?= $row['tb'];?>" <?php if ($row['tb']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="tb" style="font-size: 14px; padding-left: 30px;">Pulmonary Tuberculosis</label>
    </div>

    <div>
        <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="asthma" style="font-size: 14px; padding-left: 30px;">Asthma</label>
    </div>
    
    <div>
        <input class="checkbox" name="hepatitis" value="hepatitis" type="checkbox" id="hepatitis" value="<?= $row['hepatitis'];?>" <?php if ($row['hepatitis']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="hepatitis" style="font-size: 14px; padding-left: 30px;">Hepatitis</label>
    </div>

    <div>
        <input class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="faintingspells" style="font-size: 14px; padding-left: 30px;">Fainting Spells</label>
    </div>

    <div>
        <input class="checkbox" name="seizure" value="seizure" type="checkbox" id="seizure" value="<?= $row['seizure'];?>" <?php if ($row['seizure']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="seizure" style="font-size: 14px; padding-left: 30px;">Seizure/Epilepsy</label>
    </div>

    <div>
        <input class="checkbox" name="bleeding" value="bleeding" type="checkbox" id="bleeding" value="<?= $row['bleeding'];?>" <?php if ($row['bleeding']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="bleeding" style="font-size: 14px; padding-left: 30px;">Bleeding Tendencies</label>
    </div>

    <div>
        <input class="checkbox" name="eyedis" value="eyedis" type="checkbox" id="eyedis" value="<?= $row['eyedis'];?>" <?php if ($row['eyedis']) echo "checked"; ?> readonly>
        <label class="checkbox-label" for="eyedis" style="font-size: 14px; padding-left: 30px;">Eye Disorder</label>
    </div>

</div>
</div>

<div class="input_form grid-row-1">
<div class="input_wrap">
    <label for="fullname">Heart Ailment</label>
    <input name="heartailment" class="input-box" id ="heartailment" type="text" value="<?=$row['heartailment'];?>" readonly>
</div>
</div>
<div class="input_form grid-row-1">
<div class="input_wrap">
    <label for="fullname">Other Illness</label>
    <input name="otherillness" class="input-box" id ="otherillness" type="text" value="<?=$row['otherillness'];?>" readonly>
</div>
</div>

    <br>
    <p style="color: #000; text-align: left;">Do you have any allergy to:</p>


        <p style="text-align: left;"><b>Food:</b></p>

        <div>
            <input class="checkbox" name="allergy_food" value="yes" type="radio" id="yesallergy_food" <?php if (isset($row['allergy_food']) && $row['allergy_food'] == 'yes') echo "checked"; ?>>
            <label class="checkbox-label" for="yesfood" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
            <input class="checkbox" name="allergy_food" value="no" type="radio" id="noallergy_food" <?php if (isset($row['allergy_food']) && $row['allergy_food'] == 'no') echo "checked"; ?>>
            <label class="checkbox-label" for="nofood" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
            <input name="allergyfood_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergyfood_specify'];?>" readonly>
        </div>

        <p style="text-align: left;"><b>Medicine:</b></p>

        <div>
            <input class="checkbox" name="allergy_med" value="yes" type="radio" id="yesallergy_med" <?php if (isset($row['allergy_med']) && $row['allergy_med'] == 'yes') echo "checked"; ?>>
            <label class="checkbox-label" for="yesmed" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
            <input class="checkbox" name="allergy_med" value="no" type="radio" id="noallergy_med" <?php if (isset($row['allergy_med']) && $row['allergy_med'] == 'no') echo "checked"; ?>>
            <label class="checkbox-label" for="nomed" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
            <input name="allergymed_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergymed_specify'];?>" readonly>
        </div>



<div class="input_form"> 

<div class="row-container">

    <div class="input_wrap">
        <label for="fullname" id="language">Would you allow your child to be given medicine (as needed) while here in the school?</label>
    </div>

    <div>
        <input class="checkbox" name="give_med" value="allow" type="radio" id="yesgive_med" <?php if (isset($row['give_med']) && $row['give_med'] == 'allow') echo "checked"; ?>>
        <label class="checkbox-label" for="allow" style="font-size: 14px; padding-left: 30px;">Yes</label>
    </div>

    <div>
        <input class="checkbox" name="give_med" value="notallow" type="radio" id="yesgive_med" <?php if (isset($row['give_med']) && $row['give_med'] == 'notallow') echo "checked"; ?>>
        <label class="checkbox-label" for="notallow" style="font-size: 14px; padding-left: 30px;">No</label>
    </div>

</div>       

</div>
<div class="input_form">

<div class="row-container">

    <div class="input_wrap">
        <label for="fullname" id="language">Is your child taking any medications at present?</label>  
    </div>

    <div>
        <input class="checkbox" name="take_medication" value="yes" type="radio" id="yestake_medication" <?php if (isset($row['take_medication']) && $row['take_medication'] == 'yes') echo "checked"; ?>>
        <label class="checkbox-label" for="yesgive_med" style="font-size: 14px; padding-left: 30px;">Yes</label>
    </div>

    <div>
        <input class="checkbox" name="take_medication" value="no" type="radio" id="noallergy_med" <?php if (isset($row['take_medication']) && $row['take_medication'] == 'no') echo "checked"; ?>>
        <label class="checkbox-label" for="nogive_med" style="font-size: 14px; padding-left: 30px;">No</label>
    </div>



</div>

</div>


<div class="input_form grid-row-1">

<div class="input_wrap">
        <input name="take_medication_specify" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['take_medication_specify'];?>" readonly>
    </div>
</div>

<br>

    <div class="input_form grid-row-3"> 

    

        <div class="input_wrap">
            <label for="fullname" >Person to contact in case of emergency:</label>
            <input name="notified" id ="languages" type="text"  value="<?=$row['notified'];?>" readonly>
        </div>
        <div class="input_wrap">
            <label for="fullname"> Contact </label>
            <input name="contact" id ="languages" type="text"  value="<?=$row['contact'];?>" readonly>
        </div>
        <div class="input_wrap">
            <label for="fullname">Relationship</label>
            <input name="relationship" id ="languages" type="text"  value="<?=$row['relationship'];?>" readonly>
        </div>

        </div>

</div>
</form>

<?php

    }
?>

				    </div><!--//app-card-body-->
				</div>			    
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


