<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['user_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        $idnumber = $row['idnumber'];
        require_once('../../db.php');
        if($_SESSION['leveleduc'] == 3){
            // User type 1 specific code here
        }
        else{
            header('location: ../login.php');
            exit; // Exit the script to prevent further execution
        }
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Health Profile Form</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 


    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	  <link rel="stylesheet" href="assets/formstyle.css">

    <style>

.container-xl .position-relative {
    margin-top : 35px; 
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

        .container-xl {
          padding-left: 0px!important;
          padding-right: 0px!important;
        }
        .input_form select {
        border: 2px solid #afbdcf !important; /* Change 'red' to the color you want */
    }
    .input_form select:hover {
      border: 2px solid blue   !important; /* Change border color on hover */
    }
    </style>

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
            Health Record Form
            </div>
					
					<form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

      <div class="input_form">

        <div class="input_wrap">
          <label for="image">Upload Image<span class="required" style="color: red;">*</span></label>
          <input type="file" name="image" id="image" required>
        </div>
      </div>

      <div class="input_form">

        <div class="input_wrap">
          <label for="fullname">Full Name<span class="required" style="color: red;">*</span></label>
          <input class="input-box" name="fullname" type="text" value="<?= $fullname; ?>"readonly>
        </div>

        <div class="input_wrap">
          <label for="fullname">ID Number<span class="required" style="color: red;">*</span></label>
          <input name="idnumber" class="input-box" type="text" value="<?= $idnumber; ?>" readonly>
        </div>
       
        <div class="input_wrap">
                <label for="fullname">Gender<span class="required" style="color: red;">*</span></label>
                  <select class="form-select" name="gender" required>
                      <option value="" disabled selected>Select Gender</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                  </select>
            </div>

            <div class="input_wrap">
                <label for="fullname">Address<span class="required" style="color: red;">*</span></label>
                <input name="address" id ="address" type="text" style="width: 553px;" required>
            </div>

      </div>
                            
    <div class="input_form">

    <div class="input_wrap">
     <label for="personal_contact">Personal Contact Number<span class="required" style="color: red;">*</span></label>
    <input id="personalContactInput" name="pcontact" type="text" placeholder="+63" class="contactInput" required>
    <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

      <script>
    const personalContactInput = document.getElementById('personalContactInput');
    const personalContactError = document.getElementById('personalContactError');

    personalContactInput.addEventListener('input', function() {
        let inputValue = personalContactInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            personalContactInput.value = inputValue;
            personalContactError.style.display = 'none'; // Hide the error message
        } else {
            personalContactInput.value = ''; // Clear the input if it's invalid
            personalContactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>


<script>
  function validateForm() {
    var contactInputs = document.getElementsById("contactInput");
    var isValid = true;

    for (var i = 0; i < contactInputs.length; i++) {
      var contactInput = contactInputs[i].value;

      if (!contactInput.startsWith("+63")) {
        isValid = false;
        document.getElementsByClassName("errorMessage")[i].style.display = "block";
      } else {
        document.getElementsByClassName("errorMessage")[i].style.display = "none";
      }
    }

    return isValid;
  }
</script>
   
<div class="input_wrap">
    <label for="fullname">Nationality<span class="required" style="color: red;">*</span></label>
    <select class="form-select" name="nationality" id="nationality-select" required>
        <option disabled selected>Select Nationality</option>
        <option value="Filipino">Filipino</option>
        <option value="Other">Other</option>
    </select>
    <input type="text" class="form-input" name="otherNationality" id="otherNationality" style="display: none;" placeholder="Enter other nationality">
</div>


<script>
    const nationalitySelect = document.getElementById('nationality-select');
    const otherNationalityInput = document.getElementById('otherNationality');

    nationalitySelect.addEventListener('change', function () {
        if (nationalitySelect.value === 'Other') {
            nationalitySelect.style.display = 'none';
            otherNationalityInput.style.display = 'inline-block';
            otherNationalityInput.setAttribute('required', 'required');
        } else {
            nationalitySelect.style.display = 'inline-block';
            otherNationalityInput.style.display = 'none';
            otherNationalityInput.removeAttribute('required');
        }
    });
</script>


        <div class="input_wrap">
            <label for="fullname">Birthday<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="birthday" id="birthday" type="date" required>
        </div>
 
        <div class="input_wrap">
    <label for="fullname">Religion<span class="required" style="color: red;">*</span></label>
    <select class="form-select" name="religion" id="religion-select" required>
        <option disabled selected>Select Religion</option>
        <option value="Roman Catholic">Roman Catholic</option>
        <option value="Other">Other</option>
    </select>
    <input type="text" class="form-input" name="otherReligion" id="otherReligion" style="display: none;" placeholder="Enter other religion">
</div>


<script>
    const religionSelect = document.getElementById('religion-select');
    const otherReligionInput = document.getElementById('otherReligion');

    religionSelect.addEventListener('change', function () {
        if (religionSelect.value === 'Other') {
            religionSelect.style.display = 'none';
            otherReligionInput.style.display = 'inline-block';
            otherReligionInput.setAttribute('required', 'required');
        } else {
            religionSelect.style.display = 'inline-block';
            otherReligionInput.style.display = 'none';
            otherReligionInput.removeAttribute('required');
        }
    });
</script>
  </div>
      <div class="input_form">

      <div class="input_wrap">
            <label for="fullname">Father's Name<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="fguardian" id="fguardian" type="text" required>
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="occupation1" id="fguardian" type="text" required>
        </div>

        <div class="input_wrap">
            <label for="fullname">Mother's Name<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="mother" id="fguardian" type="text" required>
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="occupation2" id="fguardian" type="text" required>
        </div>

    </div>

    <div class="input_form">
    <div class="input_wrap">
  <label for="fullname" style="width: 300px;">Person to Contact in case of Emergency<span class="required" style="color: red;">*</span></label>
  <input class="input-box" name="contactemer" id="contactemer" type="text" required>
</div>


        <div class="input_wrap">
   <label for="personal_contact">Contact Number<span class="required" style="color: red;">*</span></label>
    <input id="ContactEmerInput" name="contactno" type="text" placeholder="+63" class="contactInput" required>
    <p id="ContactEmerError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const ContactEmerInput = document.getElementById('ContactEmerInput');
    const ContactEmerError = document.getElementById('ContactEmerError');

        ContactEmerInput.addEventListener('input', function() {
        let inputValue = ContactEmerInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            ContactEmerInput.value = inputValue;
            ContactEmerError.style.display = 'none'; // Hide the error message
        } else {
            ContactEmerInput.value = ''; // Clear the input if it's invalid
            ContactEmerError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>

<script>
  function validateForm() {
    var contactInputs = document.getElementsByClassName("contactInput");
    var isValid = true;

    for (var i = 0; i < contactInputs.length; i++) {
      var contactInput = contactInputs[i].value;

      if (!contactInput.startsWith("+63")) {
        isValid = false;
        document.getElementsByClassName("errorMessage")[i].style.display = "block";
      } else {
        document.getElementsByClassName("errorMessage")[i].style.display = "none";
      }
    }

    return isValid;
  }
</script>

        <div class="input_wrap">
            <label for="fullname">Relation to the Student <span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="relation" id="con" type="text" required>
        </div>

    </div>

      <div class="input_form">

        <div class="input_wrap">
          <label for="fullname">Hospital of Choice of referral<span class="required" style="color: red;">*</span></label>
          <input class="input-box" name="referral" id="referral" type="text" placeholder="Type N/A if NONE" required>
        </div>

        <div class="input_wrap">
   <label for="personal_contact">Contact Number<span class="required" style="color: red;">*</span></label>
   <input id="ContactEmertwoInput" name="contactno2" type="text" placeholder="+63" class="input-box" required>
   <p id="ContactEmertwoError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>

        <div class="input_wrap">
            <label for="fullname">Physician and Number to call<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="physiciannumcall" id="physician" type="text" placeholder="Type N/A if NONE" required>
        </div>

        <div class="input_wrap">
            <label for="fullname">Address of Hospital<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="addresshospital" id="physician" type="text" placeholder="Type N/A if NONE" required>
        </div>

  </div>

   <div>
    <br>
    <b><p class="title" style="font-size: 20px; color: #000;">A. IMMUNIZATION<span class="required" style="color: red;">*</span></p></b>
  </div>

    <b><p class="vaccine">VACCINE</p></b>

<i>Type N/A if NONE</i>
    
    <div class="input_form grid-row-2">

      <div class="input_wrap">
      <label for="td_vaccine">Tetanus & Diphtheria (Td) of Tetanus toxoid</label>
        <input class="input-box" name="td" id="td_vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" required>
      </div>


      <div class="input_wrap">
      <label for="mmr_vaccine">Measles, Mumps, Rubella (MMR)</label>
        <input class="input-box" name="mmr" id="mmr_vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" required>
      </div>

    </div>
    <br>

    <div class="input_form grid-row-2">

        <div class="input_wrap">
        <label for="hepab_vaccine">Hepatitis B</label>
            <input class="input-box" name="hepab" id="hepab_vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" required>
        </div>

        <div class="input_wrap">
        <label for="varicella_vaccine">Varicella</label>
            <input class="input-box" name="varicella" id="varicella_vaccine" type="text" placeholder="Write WHEN and WHERE administered" style="width: 555px;" required>
        </div>

    </div>

  <div>
    <br>
    <b><p class="title" style="font-size: 20px; color: #000;">B. FAMILY HISTORY<span class="required" style="color: red;">*</span></p></b>
  </div>
  
    <b><p class="vaccine">DISEASE</p></b>

    <div class="input_wrap">
      <p>Asthma:</p>

      <div class="row-container">
        <div>
          <input class="checkbox"name="asthma_history" value="yes" type="radio" id="yesasthma">
          <label class="checkbox-label" for="yesasthma" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="asthma_history" value="no" type="radio" id="noasthma">
          <label class="checkbox-label" for="noasthma" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" name="asthma_relation" id="otherillnesss" type="text" style="width: 400px;" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
    <p>Bleeding Tendency:</p>

      <div class="row-container">

        <div>
          <input class="checkbox" name="bleedingtendency_history" value="yes" type="radio" id="yesbleedingtendency_history">
          <label class="checkbox-label" for="yesbleedingtendency_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="bleedingtendency_history" value="no" type="radio" id="nobleedingtendency_history">
          <label class="checkbox-label" for="nobleedingtendency_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="bleedingtendency_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Cancer:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="cancer_history" value="yes" type="radio" id="yescancer_history">
          <label class="checkbox-label" for="yescancer_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="cancer_history" value="no" type="radio" id="nocancer_history">
          <label class="checkbox-label" for="nocancer_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="cancer_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Diabetes:</p>
      
      <div class="row-container">
    
        <div>
          <input class="checkbox" name="diabetes_history" value="yes" type="radio" id="yesdiabetes_history">
          <label class="checkbox-label" for="yesdiabetes_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>
      
        <div>
          <input class="checkbox" name="diabetes_history" value="no" type="radio" id="nodiabetes_history">
          <label class="checkbox-label" for="nodiabetes_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>
      
        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="diabetes_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Heart Disorder:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="heartdisorder_history" value="yes" type="radio" id="yesheartdisorder_history">
          <label class="checkbox-label" for="yesheartdisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>
      
        <div>
          <input class="checkbox" name="heartdisorder_history" value="no" type="radio" id="noheartdisorder_history">
          <label class="checkbox-label" for="noheartdisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>
      
        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="heartdisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>High Blood Pressure:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="highblood_history" value="yes" type="radio" id="yeshighblood_history">
          <label class="checkbox-label" for="yeshighblood_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>
      
        <div>
          <input class="checkbox"  name="highblood_history" value="no" type="radio" id="nohighblood_history">
          <label class="checkbox-label" for="nohighblood_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>
      
        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="highblood_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Kidney Problem:</p>
      <div class="row-container">
    
        <div>
          <input class="checkbox" name="kidneyproblem_history" value="yes" type="radio" id="yeskidneyproblem_history">
          <label class="checkbox-label" for="yeskidneyproblem_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="kidneyproblem_history" value="no" type="radio" id="nokidneyproblem_history">
          <label class="checkbox-label" for="nokidneyproblem_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="kidneyproblem_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Mental Disorder:</p>
      <div class="row-container">
    
        <div>
          <input class="checkbox" name="mentaldisorder_history" value="yes" type="radio" id="yesmentaldisorder_history">
          <label class="checkbox-label" for="yesmentaldisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="mentaldisorder_history" value="no" type="radio" id="nomentaldisorder_history">
          <label class="checkbox-label" for="nomentaldisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="mentaldisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Obesity:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="obesity_history" value="yes" type="radio" id="yesobesity_history">
          <label class="checkbox-label" for="yesobesity_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>
      
        <div>
          <input class="checkbox" name="obesity_history" value="no" type="radio" id="noobesity_history">
          <label class="checkbox-label" for="noobesity_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>
      
        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="obesity_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Seizure Disorder:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="seizuredisorder_history" value="yes" type="radio" id="yesseizuredisorder_history">
          <label class="checkbox-label" for="yesseizuredisorder_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="seizuredisorder_history" value="no" type="radio" id="noseizuredisorder_history">
          <label class="checkbox-label" for="noseizuredisorder_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="seizuredisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Stroke:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="stroke_history" value="yes" type="radio" id="yesstroke_history">
          <label class="checkbox-label" for="yesstroke_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="stroke_history" value="no" type="radio" id="nostroke_history">
          <label class="checkbox-label" for="nostroke_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" style="width: 400px;" name="stroke_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

    <div class="input_wrap">
      <p>Tuberculosis:</p>

      <div class="row-container">
    
        <div>
          <input class="checkbox" name="tb_history" value="yes" type="radio" id="yestb_history">
          <label class="checkbox-label" for="yestb_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>

        <div>
          <input class="checkbox" name="tb_history" value="no" type="radio" id="notb_history">
          <label class="checkbox-label" for="notb_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

        <div class="input_wrap">
          <input class="input-box" name="tb_relation" id="otherillnesss" type="text" style="width: 400px;" placeholder="Relation(s) to student">
        </div>

      </div>
    </div>

<div>
  <br>
  <b><p class="title" style="font-size: 20px; color: #000;">C. MEDICAL HISTORY:<span class="required" style="color: red;">*</span></b></p>
  <p><i> The student has suffered from: (please tick the box)</i></p>
</div>

    <b><p class="vaccine">ILLNESS</p></b>

    <div class="input_form">

        <div>
            <input class="checkbox" name="allergy" value="allergy" type="checkbox" id="allergy">
            <label class="checkbox-label" for="allergy" style="font-size: 14px; padding-left: 30px;">ALLERGY</label>
        </div>
        <div>
            <input class="checkbox" name="anemia" value="anemia" type="checkbox" id="anemia">
            <label class="checkbox-label" for="anemia" style="font-size: 14px; padding-left: 30px;">ANEMIA</label>
        </div>
        <div>
            <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma">
            <label class="checkbox-label" for="asthma" style="font-size: 14px; padding-left: 30px;">ASTHMA</label>
        </div>
        <div>
            <input class="checkbox" name="behavioral" value="behavioral" type="checkbox" id="behavioral">
            <label class="checkbox-label" for="behavioral" style="font-size: 14px; padding-left: 30px;">BEHAVIORAL PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="bleedingprob" value="bleedingprob" type="checkbox" id="bleedingprob">
            <label class="checkbox-label" for="bleedingprob" style="font-size: 14px; padding-left: 30px;">BLEEDING PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="blood" value="blood" type="checkbox" id="blood">
            <label class="checkbox-label" for="blood" style="font-size: 14px; padding-left: 30px;">BLOOD ABNORMALITY</label>
        </div>
        <div>
            <input class="checkbox" name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox">
            <label class="checkbox-label" for="chickenpox" style="font-size: 14px; padding-left: 30px;">CHICKEN POX</label>
        </div>
        <div>
            <input class="checkbox" name="convulsion" value="convulsion" type="checkbox" id="convulsion">
            <label class="checkbox-label" for="convulsion" style="font-size: 14px; padding-left: 30px;">CONVULSION</label>
        </div>
        <div>
            <input class="checkbox" name="dengue" value="dengue" type="checkbox" id="dengue">
            <label class="checkbox-label" for="dengue" style="font-size: 14px; padding-left: 30px;">DENGUE</label>
        </div>
        <div>
            <input class="checkbox" name="diabetess" value="diabetess" type="checkbox" id="diabetess">
            <label class="checkbox-label" for="diabetess" style="font-size: 14px; padding-left: 30px;">DIABETES</label>
        </div>
        <div>
            <input class="checkbox" name="earproblem" value="earproblem" type="checkbox" id="earproblem">
            <label class="checkbox-label" for="earproblem" style="font-size: 14px; padding-left: 30px;">EAR PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="eating_disorder" value="eating_disorder" type="checkbox" id="eating_disorder">
            <label class="checkbox-label" for="eating_disorder" style="font-size: 14px; padding-left: 30px;">EATING DISORDER</label>
        </div>

        <div>
            <input class="checkbox" name="epilepsy" value="epilepsy" type="checkbox" id="epilepsy">
            <label class="checkbox-label" for="epilepsy" style="font-size: 14px; padding-left: 30px;">EPILEPSY</label>
        </div>
        <div>
            <input class="checkbox" name="eyeproblemm" value="eyeproblemm" type="checkbox" id="eyeproblemm">
            <label class="checkbox-label" for="eyeproblemm" style="font-size: 14px; padding-left: 30px;">EYE PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="fracture" value="fracture" type="checkbox" id="fracture">
            <label class="checkbox-label" for="fracture" style="font-size: 14px; padding-left: 30px;">FRACTURE</label>
        </div>
        <div>
            <input class="checkbox" name="hearing_problem" value="hearing_problem" type="checkbox" id="hearing_problem">
            <label class="checkbox-label" for="hearing_problem" style="font-size: 14px; padding-left: 30px;">HEARING PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="heart_disorder" value="heart_disorder" type="checkbox" id="heart_disorder">
            <label class="checkbox-label" for="heart_disorder" style="font-size: 14px; padding-left: 30px;">HEART DISORDER</label>
        </div>
        <div>
            <input class="checkbox" name="hyperacidity" value="hyperacidity" type="checkbox" id="hyperacidity">
            <label class="checkbox-label" for="hyperacidity" style="font-size: 14px; padding-left: 30px;">HYPERACIDITY</label>
        </div>
        <div>
            <input class="checkbox" name="indigestion" value="indigestion" type="checkbox" id="indigestion">
            <label class="checkbox-label" for="indigestion" style="font-size: 14px; padding-left: 30px;">INDIGESTION</label>
        </div>
        <div>
            <input class="checkbox" name="insomia" value="insomia" type="checkbox" id="insomia">
            <label class="checkbox-label" for="insomia" style="font-size: 14px; padding-left: 30px;">INSOMIA</label>
        </div>

        <div>
            <input class="checkbox" name="kidney_problem" value="kidney_problem" type="checkbox" id="kidney_problem">
            <label class="checkbox-label" for="kidney_problem" style="font-size: 14px; padding-left: 30px;">KIDNEY PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="liver_problem" value="liver_problem" type="checkbox" id="liver_problem">
            <label class="checkbox-label" for="liver_problem" style="font-size: 14px; padding-left: 30px;">LIVER PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="measless" value="measless" type="checkbox" id="measless">
            <label class="checkbox-label" for="measless" style="font-size: 14px; padding-left: 30px;">MEASLES</label>
        </div>
        <div>
            <input class="checkbox" name="mumpss" value="mumpss" type="checkbox" id="mumpss">
            <label class="checkbox-label" for="mumpss" style="font-size: 14px; padding-left: 30px;">MUMPS</label>
        </div>
        <div>
            <input class="checkbox" name="parasitism" value="parasitism" type="checkbox" id="parasitism">
            <label class="checkbox-label" for="parasitism" style="font-size: 14px; padding-left: 30px;">PARASITISM</label>
        </div>
        <div>
            <input class="checkbox" name="pneumonia" value="pneumonia" type="checkbox" id="pneumonia">
            <label class="checkbox-label" for="pneumonia" style="font-size: 14px; padding-left: 30px;">PNEUMONIA</label>
        </div>
        <div>
            <input class="checkbox" name="primary_complex" value="primary_complex" type="checkbox" id="primary_complex">
            <label class="checkbox-label" for="primary_complex" style="font-size: 14px; padding-left: 30px;">PRIMARY COMPLEX</label>
        </div>
        <div>
            <input class="checkbox" name="scoliosis" value="scoliosis" type="checkbox" id="scoliosis">
            <label class="checkbox-label" for="scoliosis" style="font-size: 14px; padding-left: 30px;">SCOLIOSIS</label>
        </div>

        <div>
            <input class="checkbox" name="skin_problem" value="skin_problem" type="checkbox" id="skin_problem">
            <label class="checkbox-label" for="skin_problem" style="font-size: 14px; padding-left: 30px;">SKIN PROBLEM</label>
        </div>
        <div>
            <input class="checkbox" name="tonsillitis" value="tonsillitis" type="checkbox" id="tonsillitis">
            <label class="checkbox-label" for="tonsillitis" style="font-size: 14px; padding-left: 30px;">TONSILLITIS</label>
        </div>
        <div>
            <input class="checkbox" name="typhoid_fever" value="typhoid_fever" type="checkbox" id="typhoid_fever">
            <label class="checkbox-label" for="typhoid_fever" style="font-size: 14px; padding-left: 30px;">TYPHOID FEVER</label>
        </div>
        <div>
            <input class="checkbox" name="vision_defect" value="vision_defect" type="checkbox" id="vision_defect">
            <label class="checkbox-label" for="vision_defect" style="font-size: 14px; padding-left: 30px;">VISION DEFECT</label>
        </div>
             
    </div>

        <div class="input_wrap">
  <label>Other Illness</label>
  <input name="otherillness" type="text" style="width: 900px !important;" placeholder="Type N/A if NONE">
</div>


    <div>
        <br>
        <p><i>The student has a history of<span class="required" style="color: red;">*</span></i></p>
    </div>

    <div class="row-container">
    
      <b><p>Hospitalization</p></b>

      <div>
        <input class="checkbox" name="hospitalization_history" value="yes" type="radio" id="yeshospitalization_history">
        <label class="checkbox-label" for="yeshospitalization_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
      </div>

      <div>
        <input class="checkbox" name="hospitalization_history" value="no" type="radio" id="nohospitalization_history">
          <label class="checkbox-label" for="nohospitalization_history" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>
      
      <b><p>Surgical Operation</p></b>
      
      <div>
        <input class="checkbox" name="surgicaloperation_history" value="yes" type="radio" id="yessurgicaloperation_history">
        <label class="checkbox-label" for="yessurgicaloperation_history" style="font-size: 14px; padding-left: 30px;">Yes</label>
      </div>

      <div>
        <input class="checkbox" name="surgicaloperation_history" value="no" type="radio" id="nosurgicaloperation_history">
        <label class="checkbox-label" for="nosurgicaloperation_history" style="font-size: 14px; padding-left: 30px;">No</label>
      </div>

    </div>
<br>

<div class="row"></div>
<div class="input_form grid-row-3">
    <div class="input_wrap">
      <label>Special medication:<span class="required" style="color: red;">*</span></label>
      <input name="specialmed" type="text" style="" required placeholder="Type N/A if NONE">
    </div>
    <div class="input_wrap">
      <label>Allergic to the ff. drugs:<span class="required" style="color: red;">*</span></label>
      <input name="allergicdrugs" style="" type="text" required placeholder="Type N/A if NONE">
    </div>
    <div class="input_wrap">
      <label>Other relevant information<span class="required" style="color: red;">*</span></label>
      <input name="otherrelevant" style="" type="text" required placeholder="Type N/A if NONE">
    </div>
</div>
          

     
        


 <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
	<input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
   <button name="submit_data" class="btn btn-success" style="margin-bottom: 15px; background-color: #1a14cc;">SUBMIT</button>
    </div>
</form>
  </div>
</div>

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

