<?php
    session_start();
    include '../db.php';

    if (!isset($_SESSION['user_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        require_once('../db.php');
        if($_SESSION['type'] == 1){
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
    <title>CAPSTONE</title>
    
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
	<link rel="stylesheet" href="assets/formstyle.css">

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
    <li class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
            </span>
            <span class="nav-link-text">Health Record</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link active" href="#_">Health Record Form</a></li>
                <li class="submenu-item"><a class="submenu-link" href="viewhealthrecord.php">View Health Record</a></li>
            </ul>
        </div>
    </li>
  


												<li class="nav-item has-submenu">
								<a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-plus" viewBox="0 0 16 16">
										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
										<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4zM8 8a.5.5 0 0 1 .5.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5A.5.5 0 0 1 8 8z"/>
										</svg>
									</span>
									<span class="nav-link-text">Request Dental Schedule</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
								</a>
								<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
										<li class="submenu-item"><a class="submenu-link active" href="adddentalmessage.php">Add Dental Schedule</a></li>
										<li class="submenu-item"><a class="submenu-link" href="viewhealthrecord.php">View Dental Record</a></li>
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
					
					<form class="form-horizontal mt-4" action="function/funct.php" method="post" enctype="multipart/form-data">
    <div class="align_form">

	
        <div class="input_form">

		<div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image">
							</div>
        <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
            </div>

            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text">
            </div>

            <div class="input_wrap">
                <label>Contact Number</label>
                <input name="personalcpnum" type="text">
            </div>

            <div class="input_wrap">
                <label for="fullname">Age</label>
                <input name="age" type="text">
            </div>

            <div class="input_wrap">
                <label for="fullname">Birthday</label>
                <input name="birthday" type="date">
            </div>
            <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>

            <div class="input_wrap">
                <label for="fullname">Home Address</label>
                <input name="address" type="text">
            </div>

            <div class="input_wrap">
                <label for="fullname">Role</label>
                <select class="form-select" name="role">
                    <option value="" disabled selected>Select Role</option>
                    <option value="Student">Student</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>
            <div class="input_wrap">
                <label for="fullname">Grade/Course & Year/Position</label>
                <input name="gradecourse" type="text">
            </div>

            <div class="input_wrap">
                <label for="fullname">Level of Education</label>
                <select class="form-select" name="leveleduc">
                    <option value="" disabled selected>Select Level of Education</option>
                    <option value="Grade School">Grade School and Junior High School</option>
                    <option value="Junior High School">Junior High School</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="College">College</option>
					<option value="Employee">Employee</option>
                </select>
            </div>
        </div>
    </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Father</label>
            <input name="fathername" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cfather" type="text">
        </div>
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Mother</label>
            <input name="mothername" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cmother" type="text">
        </div>
    </div>
    <div>
        <p class="title_">Medical History</p>
    </div>
    <div class="input_form">
        <div class="checkbox">
            <input name="polio" value="polio" type="checkbox" id="polio">
            <label class="label" for="polio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POLIO</label>
        </div>
        <div class="checkbox">
            <input name="measles" value="measles" type="checkbox" id="measles">
            <label class="label" for="measles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEASLES</label>
        </div>
        <div class="checkbox">
            <input name="tb" value="tb" type="checkbox" id="tb">
            <label class="label" for="tb">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PULMONARY TUBERCULOSIS</label>
        </div>
        <div class="checkbox">
            <input name="seizure_epilepsy" value="seizure_epilepsy" type="checkbox" id="seizure_epilepsy">
            <label class="label" for="seizure_epilepsy">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEIZURE / EPILEPSY</label>
        </div>
        <div class="checkbox">
            <input name="tetanus" value="tetanus" type="checkbox" id="tetanus">
            <label class="label" for="tetanus">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TETANUS</label>
        </div>
        <div class="checkbox">
            <input name="mumps" value="mumps" type="checkbox" id="mumps">
            <label class="label" for="mumps">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MUMPS</label>
        </div>
        <div class="checkbox">
            <input name="hepatits" value="hepatits" type="checkbox" id="hepatits">
            <label class="label" for="hepatits">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEPATITIS</label>
        </div>
        <div class="checkbox">
            <input name="bleeding_tendencies" value="bleeding_tendencies" type="checkbox" id="bleeding_tendencies">
            <label class="label" for="bleeding_tendencies">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLEEDING TENDENCIES</label>
        </div>
        <div class="checkbox">
            <input name="chicken_pox" value="chicken_pox" type="checkbox" id="chicken_pox">
            <label class="label" for="chicken_pox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHICKEN POX</label>
        </div>
        <div class="checkbox">
            <input name="asthma" value="asthma" type="checkbox" id="asthma">
            <label class="label" for="asthma">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASTHMA</label>
        </div>
        <div class="checkbox">
            <input name="fainting_spells" value="fainting_spells" type="checkbox" id="fainting_spells">
            <label class="label" for="fainting_spells">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FAINTING SPELLS</label>
        </div>
        <div class="checkbox">
            <input name="eye_disorder" value="eye_disorder" type="checkbox" id="eye_disorder">
            <label class="label" for="eye_disorder">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EYE DISORDER</label>
        </div>
        <div class="input_wrap">
            <label>Heart Ailment(please specify) Put N/A if none.</label>
            <input name="heart" value="" type="text">
        </div>
        <div class="input_wrap">
            <label>Other illness(please specify) Put N/A if none.</label>
            <input name="illness" value="" type="text">
        </div>
    </div>
    <div>
        <p class="title_">Do you have any allergy to:</p>
    </div>
    <div class="input_form_2">
        <div class="input_wrap">
            <label>Food (if YES please specify, if NO leave it blank)</label>
            <input name="allergyfood" type="text">
        </div>
        <div class="input_wrap">
            <label>Medicine (if YES please specify, if NO leave it blank)</label>
            <input name="allergymed" type="text">
        </div>
        <div class="input_wrap">
            <label>Would you allow your child to be given medicine (as needed) while here in the school?</label>
            <input name="allow_not" type="text">
        </div>
        <div class="input_wrap">
            <label>Is your child taking any medications at present? If YES, please list the name of the medicine/s:</label>
            <input name="medications" type="text">
        </div>
        <div class="input_wrap">
            <label>Name of the person to be notified in case of emergency:</label>
            <input name="nameperson" type="text">
        </div>
        <div class="input_wrap">
            <label>Contact Number</label>
            <input name="personcp" type="text">
        </div>
        <div class="input_wrap">
            <label>Relationship</label>
            <input name="relationship" type="text">
        </div>
    </div>
    <div class="app-card-footer px-4 py-3">
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

</body>
</html> 

