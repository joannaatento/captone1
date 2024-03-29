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
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/formstyles.css">
    <link rel="stylesheet" href="assets/radios.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head> 

<body class="app">   	
<header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="app-utilities col-auto">		            
			            <div class="app-utility-item app-user-dropdown dropdown">

				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png"><?= $fullname;?></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="function/logout.php">Log Out</a></li>
							</ul>
			            </div>
		            </div>
		        </div>
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
				<div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app_logo">
					<img style="width: 150px; display:flex; margin-left: 50px; margin-top: 10px;" src="assets/images/dwcl.png" alt="logo">
		        </div>
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
    
        <li class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="healthrecordformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">       
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
           <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
        </span>
        <span class="nav-link-text">Health Profile</span>
    </a>
</li>



<li id="scheduling-link" class="nav-item has-submenu">
<a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
											<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
											<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
											</svg>
									</span>
									<span class="nav-link-text">Request Scheduling Appointment</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
								</a>
								<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
										<li class="submenu-item"><a class="submenu-link" href="adddentalmessagecollege.php">Request Dental Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addmedicalmessagecollege.php">Request Medical Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addphysicianmessagecollege.php">Request Physician Scheduling</a></li>
									</ul>
								</div>
							</li>


              <li id="clinical-link" class="nav-item has-submenu">
								<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
										<path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"/>
										<path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"/>
										</svg>
									</span>
									<span class="nav-link-text">Clinic Records</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
								</a>
								<div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
									<li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofilecollege.php">Health Profile Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdentalappcollege.php">Dental Record</a>
                  <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappcollege.php">Medical Record</a>
                  <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappcollege.php">Physician Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewconsultationformcollege.php">Consultation Form Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewschoolassescollege.php">School Health Assessment</a>
</li>
									</ul>
								</div>
							</li>
				    </ul>
			    </nav>
	        </div>
	    </div>
    </header>
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Fill-up Health Record Form</h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Please fill-up honestly.</h4>
					        </div>
							<?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
							
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					<p class="title_">Personal Information</p>
					
					<form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="align_form">

	
        <div class="input_form">

		<div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
			</div>
      <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?= $idnumber; ?>" >
            </div>
            <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
            </div>
            <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
        </div>
    </div>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Address</label>
                <input name="address" id ="address" type="text">
            </div>

     </div>
                            
     <div class="input_form">
     <div class="input_wrap">
     <label for="personal_contact">Personal Contact Number</label>
    <input id="personalContactInput" name="pcontact" type="text" placeholder="+63" class="contactInput">
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
   
        <div class="input_wrap">
            <label for="fullname">Nationality</label>
            <input name="nationality" id="nationality" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Birthday</label>
            <input name="birthday" id="birthday" type="date">
        </div>

        <div class="input_wrap">
            <label for="fullname">Religion</label>
            <input name="religion" id="religion" type="text">
        </div>
      </div>
      <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Father's Name</label>
            <input name="fguardian" id="fguardian" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation</label>
            <input name="occupation1" id="fguardian" type="text">
        </div>
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Mother's Name</label>
            <input name="mother" id="fguardian" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation</label>
            <input name="occupation2" id="fguardian" type="text">
        </div>
    </div>

   <div class="input_form">
   <div class="input_wrap">
            <label for="fullname">Contact in case of emergency</label>
            <input name="contactemer" id="contactemer" type="text">
        </div>
        
   <div class="input_wrap">
   <label for="personal_contact">Contact Number</label>
    <input id="ContactEmerInput" name="contactno" type="text" placeholder="+63" class="contactInput">
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
        <div class="input_wrap">
            <label for="fullname">Relation to student/employee</label>
            <input name="relation" id="con" type="text">
        </div>
   </div>

   <div class="input_form">
   <div class="input_wrap">
            <label for="fullname">Hospital of Choice of referral</label>
            <input name="referral" id="referral" type="text">
        </div>

  <div class="input_wrap">
   <label for="personal_contact">Contact Number</label>
    <input id="ContactEmertwoInput" name="contactno2" type="text" placeholder="+63" class="contactInput">
    <p id="ContactEmertwoError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>
  </div>


        <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Physician and number to call</label>
            <input name="physiciannumcall" id="physician" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Address of hospital</label>
            <input name="addresshospital" id="physician" type="text">
        </div>
   </div>

   <div>
    <br>
    <div>
    <b><p class="title">A. IMMUNIZATION</p></b>
</div>
<div>
    <b><p class="vaccine">VACCINE</p></b>
    <div class="input_form">
        <div class="input_wrap">
            <label for="td_vaccine">Tetanus & Diphtheria (Td) of Tetanus toxoid</label>
            <input name="td" id="td_vaccine" type="text" placeholder="Write WHEN and WHERE administered">
        </div>

        <div class="input_wrap">
            <label for="mmr_vaccine">Measles, Mumps, Rubella (MMR)</label>
            <input name="mmr" id="mmr_vaccine" type="text" placeholder="Write WHEN and WHERE administered">
        </div>
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="hepab_vaccine">Hepatitis B</label>
            <input name="hepab" id="hepab_vaccine" type="text" placeholder="Write WHEN and WHERE administered">
        </div>

        <div class="input_wrap">
            <label for="varicella_vaccine">Varicella</label>
            <input name="varicella" id="varicella_vaccine" type="text" placeholder="Write WHEN and WHERE administered">
        </div>
    </div>
</div>

   <div>
    <br>
     <b><p class="title">B. FAMILY HISTORY</p></b>
    </div>
    <b><p class="vaccine">DISEASE</p></b>

    <div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p>Asthma:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="radio">
    <input name="asthma_history" value="yes" type="radio" id="yesasthma">
    <label class="labels" for="yesasthma" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="asthma_history" value="no" type="radio" id="noasthma">
    <label class="labels" for="noasthma" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="asthma_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 53px;">Bleeding Tendency:</p>
  <div class="radio">
    <input name="bleedingtendency_history" value="yes" type="radio" id="yesbleedingtendency_history">
    <label class="labels" for="yesbleedingtendency_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="bleedingtendency_history" value="no" type="radio" id="nobleedingtendency_history">
    <label class="labels" for="nobleedingtendency_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="bleedingtendency_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 137px;">Cancer:</p>
  <div class="radio">
    <input name="cancer_history" value="yes" type="radio" id="yescancer_history">
    <label class="labels" for="yescancer_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="cancer_history" value="no" type="radio" id="nocancer_history">
    <label class="labels" for="nocancer_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="cancer_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 125px;">Diabetes:</p>
  <div class="radio">
    <input name="diabetes_history" value="yes" type="radio" id="yesdiabetes_history">
    <label class="labels" for="yesdiabetes_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="diabetes_history" value="no" type="radio" id="nodiabetes">
    <label class="labels" for="nodiabetes_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="diabetes_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 84px;">Heart Disorder:</p>
  <div class="radio">
    <input name="heartdisorder_history" value="yes" type="radio" id="yesheartdisorder_history">
    <label class="labels" for="yesheartdisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="heartdisorder_history" value="no" type="radio" id="noheartdisorder_history">
    <label class="labels" for="noheartdisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="heartdisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>


<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 45px;">High Blood Pressure:</p>
  <div class="radio">
    <input name="highblood_history" value="yes" type="radio" id="yeshighblood_history">
    <label class="labels" for="yeshighblood_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="highblood_history" value="no" type="radio" id="nohighblood_history">
    <label class="labels" for="nohighblood_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="highblood_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>


<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 78px;">Kidney Problem:</p>
  <div class="radio">
    <input name="kidneyproblem_history" value="yes" type="radio" id="yeskidneyproblem_history">
    <label class="labels" for="yeskidneyproblem_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="kidneyproblem_history" value="no" type="radio" id="nokidneyproblem_history">
    <label class="labels" for="nokidneyproblem_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="kidneyproblem_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 78px;">Mental Disorder:</p>
  <div class="radio">
    <input name="mentaldisorder_history" value="yes" type="radio" id="yesmentaldisorder_history">
    <label class="labels" for="yesmentaldisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="mentaldisorder_history" value="no" type="radio" id="nomentaldisorder_history">
    <label class="labels" for="nomentaldisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="mentaldisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 140px;">Obesity:</p>
  <div class="radio">
    <input name="obesity_history" value="yes" type="radio" id="yesobesity_history">
    <label class="labels" for="yesobesity_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="obesity_history" value="no" type="radio" id="noobesity_history">
    <label class="labels" for="noobesity_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="obesity_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 79px;">Seizure Disorder:</p>
  <div class="radio">
    <input name="seizuredisorder_history" value="yes" type="radio" id="yesseizuredisorder_history">
    <label class="labels" for="yesseizuredisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="seizuredisorder_history" value="no" type="radio" id="noseizuredisorder_history">
    <label class="labels" for="noseizuredisorder_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="seizuredisorder_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 150px;">Stroke:</p>
  <div class="radio">
    <input name="stroke_history" value="yes" type="radio" id="yesstroke_history">
    <label class="labels" for="yesstroke_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="stroke_history" value="no" type="radio" id="nostroke_history">
    <label class="labels" for="nostroke_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="stroke_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 109px;">Tuberculosis:</p>
  <div class="radio">
    <input name="tb_history" value="yes" type="radio" id="yestb_history">
    <label class="labels" for="yestb_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="tb_history" value="no" type="radio" id="notb_history">
    <label class="labels" for="notb_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="tb_relation" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee">
  </div>
</div>

<div>
    <br>
     <b><p class="title">C. MEDICAL HISTORY:</b><i> The student/employee has suffered from: (please tick the box)</i></p>
    </div>
    <b><p class="vaccine">ILLNESS</p></b>
<br>
    <div class="input_form">
        <div class="checkbox">
            <input name="allergy" value="allergy" type="checkbox" id="allergy">
            <label class="label" for="allergy" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALLERGY</label>
        </div>
        <div class="checkbox">
            <input name="anemia" value="anemia" type="checkbox" id="anemia">
            <label class="anemia" for="anemia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ANEMIA</label>
        </div>
        <div class="checkbox">
            <input name="asthma" value="asthma" type="checkbox" id="asthma">
            <label class="label" for="asthma" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASTHMA</label>
        </div>
        <div class="checkbox">
            <input name="behavioral" value="behavioral" type="checkbox" id="behavioral">
            <label class="label" for="behavioral" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BEHAVIORAL PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="bleedingprob" value="bleedingprob" type="checkbox" id="bleedingprob">
            <label class="label" for="bleedingprob" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLEEDING PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="blood" value="blood" type="checkbox" id="blood">
            <label class="label" for="blood" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLOOD ABNORMALITY</label>
        </div>
        <div class="checkbox">
            <input name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox">
            <label class="label" for="chickenpox" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHICKEN POX</label>
        </div>
        <div class="checkbox">
            <input name="convulsion" value="convulsion" type="checkbox" id="convulsion">
            <label class="label" for="convulsion" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONVULSION</label>
        </div>
        <div class="checkbox">
            <input name="dengue" value="dengue" type="checkbox" id="dengue">
            <label class="label" for="dengue" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DENGUE</label>
        </div>
        <div class="checkbox">
            <input name="diabetess" value="diabetess" type="checkbox" id="diabetess">
            <label class="label" for="diabetess" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIABETES</label>
        </div>
        <div class="checkbox">
            <input name="earproblem" value="earproblem" type="checkbox" id="earproblem">
            <label class="label" for="earproblem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EAR PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="eating_disorder" value="eating_disorder" type="checkbox" id="eating_disorder">
            <label class="label" for="eating_disorder" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EATING DISORDER</label>
        </div>

        <div class="checkbox">
            <input name="epilepsy" value="epilepsy" type="checkbox" id="epilepsy">
            <label class="label" for="epilepsy" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EPILEPSY</label>
        </div>
        <div class="checkbox">
            <input name="eyeproblemm" value="eyeproblemm" type="checkbox" id="eyeproblemm">
            <label class="label" for="eyeproblemm" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EYE PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="fracture" value="fracture" type="checkbox" id="fracture">
            <label class="label" for="fracture" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FRACTURE</label>
        </div>
        <div class="checkbox">
            <input name="hearing_problem" value="hearing_problem" type="checkbox" id="hearing_problem">
            <label class="label" for="hearing_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEARING PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="heart_disorder" value="heart_disorder" type="checkbox" id="heart_disorder">
            <label class="label" for="heart_disorder" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEART DISORDER</label>
        </div>
        <div class="checkbox">
            <input name="hyperacidity" value="hyperacidity" type="checkbox" id="hyperacidity">
            <label class="label" for="hyperacidity" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HYPERACIDITY</label>
        </div>
        <div class="checkbox">
            <input name="indigestion" value="indigestion" type="checkbox" id="indigestion">
            <label class="label" for="indigestion" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDIGESTION</label>
        </div>
        <div class="checkbox">
            <input name="insomia" value="insomia" type="checkbox" id="insomia">
            <label class="label" for="insomia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSOMIA</label>
        </div>

        <div class="checkbox">
            <input name="kidney_problem" value="kidney_problem" type="checkbox" id="kidney_problem">
            <label class="label" for="kidney_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KIDNEY PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="liver_problem" value="liver_problem" type="checkbox" id="liver_problem">
            <label class="label" for="liver_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LIVER PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="measless" value="measless" type="checkbox" id="measless">
            <label class="label" for="measless" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEASLES</label>
        </div>
        <div class="checkbox">
            <input name="mumpss" value="mumpss" type="checkbox" id="mumpss">
            <label class="label" for="mumpss" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MUMPS</label>
        </div>
        <div class="checkbox">
            <input name="parasitism" value="parasitism" type="checkbox" id="parasitism">
            <label class="label" for="parasitism" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARASITISM</label>
        </div>
        <div class="checkbox">
            <input name="pneumonia" value="pneumonia" type="checkbox" id="pneumonia">
            <label class="label" for="pneumonia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PNEUMONIA</label>
        </div>
        <div class="checkbox">
            <input name="primary_complex" value="primary_complex" type="checkbox" id="primary_complex">
            <label class="label" for="primary_complex" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRIMARY COMPLEX</label>
        </div>
        <div class="checkbox">
            <input name="scoliosis" value="scoliosis" type="checkbox" id="scoliosis">
            <label class="label" for="scoliosis" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SCOLIOSIS</label>
        </div>

        <div class="checkbox">
            <input name="skin_problem" value="skin_problem" type="checkbox" id="skin_problem">
            <label class="label" for="skin_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SKIN PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="tonsillitis" value="tonsillitis" type="checkbox" id="tonsillitis">
            <label class="label" for="tonsillitis" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TONSILLITIS</label>
        </div>
        <div class="checkbox">
            <input name="typhoid_fever" value="typhoid_fever" type="checkbox" id="typhoid_fever">
            <label class="label" for="typhoid_fever" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TYPHOID FEVER</label>
        </div>
        <div class="checkbox">
            <input name="vision_defect" value="vision_defect" type="checkbox" id="vision_defect">
            <label class="label" for="vision_defect" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VISION DEFECT</label>
        </div>
        

       
    </div>
    <div>
        <br>
        <p><i>The student/employee has a history of</i></p>
    </div>
    <div class="input_form">
    </div>

    <div class="row-container">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <p style="margin-right: 30px;">Hospitalization</p>
  <div class="radio">
    <input name="hospitalization_history" value="yes" type="radio" id="yeshospitalization_history">
    <label class="labels" for="yeshospitalization_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="hospitalization_history" value="no" type="radio" id="nohospitalization_history">
    <label class="labels" for="nohospitalization_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <p style="margin-right: 30px;">Surgical Operation</p>
  <div class="radio">
    <input name="surgicaloperation_history" value="yes" type="radio" id="yessurgicaloperation_history">
    <label class="labels" for="yessurgicaloperation_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="surgicaloperation_historyl" value="no" type="radio" id="nosurgicaloperation_history">
    <label class="labels" for="nosurgicaloperation_history" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>
<br>
        <div class="input_wrap">
            <label>The student/employee is on special medication</label>
            <input name="specialmed" type="text">
        </div>
        <div class="input_wrap">
            <label>The student/employee is allergic to the following drugs</label>
            <input name="allergicdrugs" type="text">
        </div>
        <div class="input_wrap">
            <label>Other relevant information</label>
            <input name="otherrelevant" type="text">
        </div>
    </div>

 <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
	<input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
   <button name="submit_data" class="btn btn-success">SUBMIT</button>
    </div>


    

</form>

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

<script>

// Get the current URL
const currentUrl = window.location.href;

// Get references to the parent and sub-menu links
const schedulingLink = document.getElementById('scheduling-link');
const subMenuLinks = schedulingLink.querySelectorAll('.submenu-link');

// Check if the current URL matches any of the sub-menu links' href attributes
subMenuLinks.forEach(function(subMenuLink) {
    if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
        // Add the "active-link" class to the parent list item
        schedulingLink.classList.add('active-link');
        // Show the submenu by removing the "collapse" class
        const submenu = document.getElementById('submenu-2');
        submenu.classList.remove('collapse');
    }
});


</script>

</body>
</html> 

