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
        if($_SESSION['leveleduc'] == 1){
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
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/formstyles.css">

    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
  
   

</head> 

<body class="app">   	
    
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

<div class="spinner-wrapper">
<img src="/DivineClinic/assets/3D/divineloader.gif" alt="">
</div>
<style>

.input_form {
    grid-template-columns: repeat(3, 1fr);
}

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

        .spinner-wrapper {
      background-color: #F5F6FE;
      position: fixed;
      top: 0;
      left: 0; 
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.2s;
 
    }

 
    .spinner-wrapper img{
      width: 20%;
      height: 20%;
    }


                        .spinner-wrapper:before,
                        .spinner-wrapper:after {
                            content: "";
                            position: absolute;
                            height: 100px;
                            width: 100px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							
                        }

                        .spinner-wrapper:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .spinner-wrapper:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }

                        .input_form select {
        border: 2px solid #afbdcf !important; /* Change 'red' to the color you want */
    }
    .input_form select:hover {
        border-color: blue !important; /* Change border color on hover */
    }
              
        
    </style>


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
                            </div>
<div class="app-card-body p-4">

    <div class="container">

        <div class="form-container">
            <div class="form-title">
            Health Record Form
            </div>
					
<form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" >    
                    
<div class="align_form">

    <div class="input_form">

    <div class="input_wrap">
    <label for="image">Upload Image<span class="required" style="color: red;">*</span></label>
    <input type="file" name="image" id="image" required>
</div>




    </div>

        <div class="input_form">

            <div class="input_wrap">
                <label for="fullname">Full Name<span class="required" style="color: red;">*</span></label>
                <input name="fullname" type="text" class="input-box" value="<?= $fullname; ?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">ID Number<span class="required" style="color: red;">*</span></label>
                <input name="idnumber" type="text" class="input-box" value="<?= $idnumber; ?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="personal_contact">Personal Contact Number<span class="required" style="color: red;">*</span></label>
                <input id="personalContactInput" class="input-box" name="cp" type="text" placeholder="+63" required>
                <p id="personalContactError" class="error-message">Invalid Phone Number</p>
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


<div class="input_wrap">
                <label for="fullname">Birthday<span class="required" style="color: red;">*</span></label>
                <input class="input-box" name="birthday" id="birthday" type="date" required>
            </div>
</div>
   </div>

        <div class="input_form">

            <div class="input_wrap">
                <label for="fullname">Gender<span class="required" style="color: red;">*</span></label> 
                <select class="form-select" name="gender" required>          
                    <option disabled selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
            <div class="input_wrap">
                <label for="fullname">Home Address<span class="required" style="color: red;">*</span></label>
                <input class="input-box" name="address" id ="address" type="text" required>
            </div>
            <div class="input_wrap">
                <label for="fullname">Present Address<span class="required" style="color: red;">*</span></label>
                <input class="input-b" name="paddress" id="paddress" type="text" required>
            </div>

        </div>

        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Name of Father<span class="required" style="color: red;">*</span></label>
                <input name="father" id="father" type="text" required>
            </div>

            <div class="input_wrap">
                <label for="fullname">Contact<span class="required" style="color: red;">*</span></label>
                <input id="contactInput_one" class="input-box" name="cfather" type="text" placeholder="+63" required>
                <p id="contactInputOneError" class="error-message">Invalid Phone Number</p>
            </div>
    

<script>
    const contactInput_one = document.getElementById('contactInput_one');
    const contactInputOneError = document.getElementById('contactInputOneError');

        contactInput_one.addEventListener('input', function() {
        let inputValue = contactInput_one.value.trim();

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
            contactInput_one.value = inputValue;
            contactInputOneError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_one.value = ''; // Clear the input if it's invalid
            contactInputOneError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
</div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Mother<span class="required" style="color: red;">*</span></label>
            <input name="mother" id="mother" type="text" rquired>
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact<span class="required" style="color: red;">*</span></label>
            <input id="contactInput_two" class="input-box" name="cmother" type="text" placeholder="+63" required>
            <p id="contactInputTwoError" class="error-message">Invalid Phone Number</p>
        </div>

<script>
    const contactInput_two = document.getElementById('contactInput_two');
    const contactInputTwoError = document.getElementById('contactInputTwoError');

        contactInput_two.addEventListener('input', function() {
        let inputValue = contactInput_two.value.trim();

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
            contactInput_two.value = inputValue;
            contactInputTwoError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_two.value = ''; // Clear the input if it's invalid
            contactInputTwoError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
</div>
    <div class="input_form">
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
                <label for="fullname">Primary Language Spoken<span class="required" style="color: red;">*</span></label>
                <input name="language" id ="language" type="text" required>
            </div>
    </div>

  

     <div class="input_form">
        <label for="fullname" style="font-size: 18px;">Student lives with:<span class="required" style="color: red;">*</span></label>
    </div>
<br>


<div class="checkbox-group">
    <div>
        <input class="checkbox" name="student_lives" value="livesbothparents" type="radio" id="bothparents" required>
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bothparents">Both Parents</label>
    </div>

    <div >
        <input class="checkbox" name="student_lives" value="livesfather" type="radio" id="livesfather" required>
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="livesfather">Father</label>
    </div>

    <div>
        <input class="checkbox" name="student_lives" value="livesmother" type="radio" id="livesmother" required>
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="livesmother">Mother</label>
    </div>

    <div>
        <input class="checkbox" name="student_lives" value="livesguardian" type="radio" id="livesguardian" required>
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="livesguardian">Guardian</label>
    </div>
</div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Person to contact in case of emergency<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="guardianname" id="guardianname" type="text" required>
        </div>
        <div class="input_wrap">
            <label for="fullname">Relation to the Student<span class="required" style="color: red;">*</span></label>
            <input class="input-box" name="guardianrelation" id="guardianrelation" type="text" required>
        </div>
 
        <div class="input_wrap">
            <label for="fullname">Contact<span class="required" style="color: red;">*</span></label>
            <input id="contactInput_cguardian" class="input-box" name="cguardian" type="text" placeholder="+63" required>            
            <p id="contactguardianError" class="error-message">Invalid Phone Number</p>
        </div>
    

<script>
    const contactInput_cguardian = document.getElementById('contactInput_cguardian');
    const contactguardianError = document.getElementById('contactguardianError');

        contactInput_cguardian.addEventListener('input', function() {
        let inputValue = contactInput_cguardian.value.trim();

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
            contactInput_cguardian.value = inputValue;
            contactguardianError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_cguardian.value = ''; // Clear the input if it's invalid
            contactguardianError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
<script>
  function validateForm() {
    var contactInputs = document.querySelectorAll('#contactInput_cguardian, #contactInput_one, #contactInput_two, #personalContactInput ');
    var isValid = true;
    contactInputs.forEach(contact =>{
      var contactInput = contact.value;
      if (!contactInput.startsWith("+63")) {
        isValid = false;
        document.getElementsByClassName("errorMessage")[i].style.display = "block";
      } else {
        document.getElementsByClassName("errorMessage")[i].style.display = "none";
      }
    });
    
    return isValid;
  }
</script>
</div>
 

    <div class="indent">
        <div>
            <p class="title" style="font-size: 20px; font-weight: bold;">IMMUNIZATION<span class="required" style="color: red;">*</span></label>
        </div>
        <p class="instructions">Please select the box if your child/ward has completed the following Primary Immunization.</p>

        <div class="checkbox-group">
            <div>
                <input class="checkbox" name="bcg" value="bcg" type="checkbox" id="bcg">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bcg">BCG</label>
            </div>
            <div>
                <input class="checkbox" name="dpt" value="dpt" type="checkbox" id="dpt">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="dpt">DPT</label>
            </div>
            <div>
                <input class="checkbox" name="opv" value="opv" type="checkbox" id="opv">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="opv">OPV</label>
            </div>
            <div>
                <input class="checkbox" name="hepa" value="hepa" type="checkbox" id="hepa">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hepa">Hepa B</label>
            </div>
            <div>
                <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="measles">Measles</label>
            </div>
        </div>

    <div class="input-wrap">
        <label for="fullname">Others</label>
        <input class="input-box" name="others" id="others" type="text" placeholder ="Put N/A if not completed">
    </div>

    <br>
        <p>Does your child/ward have COVID-19 Vaccination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card).
        <span class="required" style="color: red;">*</span></p>

        <div class="input_form">

            <div>
            <input class="checkbox" name="vaccination" value="firstdose" type="radio" id="firstdose" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="firstdose">First Dose Only</label>
            </div>
            <div>
            <input class="checkbox" name="vaccination" value="seconddose" type="radio" id="seconddose" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="seconddose">Second Dose</label>
            </div>
            <div>
            <input class="checkbox" name="vaccination" value="boosterdose" type="radio" id="boosterdose" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="boosterdose">Booster Dose</label>
            </div>
            <div>
            <input class="checkbox" name="vaccination" value="no" type="radio" id="no" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="no">No</label>
            </div>

        </div>
        <br>


        <div class="input_wrap">
            <label for="imagevac">Please Attach the screenshot of yor Vaccination Card</label>
            <input style="width: fit-content;" type="file" name="imagevac" id="imagevac">
		</div>
    <br>
    <div class="medical-history">
        <p class="title" style="font-size: 20px; font-weight: bold;">MEDICAL HISTORY</p>
        <p>Does you/your child have/ or history of the following conditions?<span class="required" style="color: red;">*</span></p>

        <div class="checkbox-group">
            <div>
                <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="asthma">Asthma</label>
            </div>

            <div>
                <input class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="faintingspells">Fainting Spells</label>
            </div>

            <div>
                <input class="checkbox" name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="allergicrhinitis">Allergic Rhinitis</label>
            </div>

            <div>
                <input class="checkbox" name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="freqheadache">Frequent Headache</label>
            </div>

            <div>
                <input class="checkbox" name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="anxietydis">Anxiety Disorder</label>
            </div>

            <div>
                <input class="checkbox" name="g6pd" value="g6pd" type="checkbox" id="g6pd">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="g6pd">G6PD</label>
            </div>

            <div>
                <input class="checkbox" name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bleedingclotting">Bleeding/Clotting Disorder</label>
            </div>

            <div>
                <input class="checkbox" name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hearingprob">Hearing Problem</label>
            </div>

            <div>
                <input class="checkbox" name="hypergas" value="hypergas" type="checkbox" id="hypergas">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypergas">Hyperacidity/Gastritis</label>
            </div>

            <div>
                <input  class="checkbox" name="derma" value="derma" type="checkbox" id="derma">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="derma">Dermatitis/Skin Problem</label>
            </div>

            <div>
                <input class="checkbox" name="hypertension" value="hypertension" type="checkbox" id="hypertension">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypertension">Hypertension</label>
            </div>

            <div>
                <input class="checkbox" name="diabetes" value="diabetes" type="checkbox" id="diabetes">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="diabetes">Diabetes Mellitus</label>
            </div>

            <div>
                <input class="checkbox" name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hyperventilation">Hyperventilation</label>
            </div>

            <div>
                <input class="checkbox" name="mens" value="mens" type="checkbox" id="mens">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="mens">Dysmenorrhea/Menstrual Cramps</label>
            </div>

        </div>
    </div>

            <div class="input_wrap">
                <label for="fullname">Others</label>
                <input name="othersmedical" class="input-box" id ="othersmedical" type="text" placeholder="Other Conditions (if None put N/A)">
            </div>

            <div class="input_wrap">
                <p>Do you have a heart condition?<span class="required" style="color: red;">*</span></p>
                <div class="row-container">
                    <div>
                        <input class="checkbox" value="yes" name="heartcondition" value="yesheartcon" type="radio" id="yesheartcon" required>
                        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesheartcon">Yes</label>
                    </div>

                    <div>
                        <input class="checkbox" value="no" name="heartcondition" value="noheartcon" type="radio" id="noheartcon" required>
                        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noheartcon">No</label>
                    </div>

                    <div class="input_wrap">
                        <input class="input-box" name="heartcon_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
                    </div>
                </div>
            </div>

    <div class="question">
        <p>Do you have an Eye problem?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
        <div>
        <input class="checkbox"  name="eyeproblem" value="yes" type="radio" id="yeseyeproblem" required>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yeseyeproblem">Yes</label>
</div>

<div>
    <input class="checkbox" name="eyeproblem" value="no" type="radio" id="noeyeproblem" required>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noeyeproblem">No</label>
</div>

            <div class="input_wrap">
                <input class="input-box" name="eyeprob_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="seriousillness" value="yes" type="radio" id="yesseriousillness" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillness">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="seriousillness" value="no" type="radio" id="noseriousillness" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillness">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="seriousillness_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="surgeries_injuries" value="yes" type="radio" id="yessurgeries_injuries" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yessurgeries_injuries">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="surgeries_injuries" value="no" type="radio" id="nosurgeries_injuries" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="nosurgeries_injuries">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="surgeries_injuries_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do receive any medication or medical treatment, either regularly or occasionally?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="medicationtreatment" value="yes" type="radio" id="yesmedicationtreatment" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesmedicationtreatment">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="medicationtreatment" value="no" type="radio" id="nomedicationtreatment" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="nomedicationtreatment">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="medicationtreatment_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>
<div class="question">
        <p>Do you have any allergies to medication?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="allergiesmed" value="yes" type="radio" id="yesallergiesmed" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesallergiesmed">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="allergiesmed" value="no" type="radio" id="noallergiesmed" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noallergiesmed">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="allergiesmed_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have any allergies to food?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="allergiesfood" value="yes" type="radio" id="yesallergiesfood" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesallergiesfood">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="allergiesfood" value="no" type="radio" id="noallergiesfood" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noallergiesfood">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="allergiesfood_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">
        <div>
        <input class="checkbox" name="firstaid" value="yes" type="radio" id="yesfirstaid" required>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesfirstaid">Yes</label>
</div>

<div>
    <input class="checkbox" name="firstaid" value="no" type="radio" id="nofirstaid" required>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="nofirstaid">No</label>
</div>

        </div>
    </div>

    <div class="question">

        <p>Do you have any concerns related to your health?<span class="required" style="color: red;">*</span></p>
        <div class="row-container">

            <div>
                <input class="checkbox" name="concerns" value="yes" type="radio" id="yesconcerns" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesconcerns">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="concerns" value="no" type="radio" id="noconcerns" required>
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noconcerns">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="concerns_specify" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>

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
    
    <script> 
const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

window.addEventListener('load', () => {
  spinnerWrapperEl.style.opacity = '1';

  setTimeout(() => {
    spinnerWrapperEl.style.display = 'none';
  }, 1000);
})
</script>
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

