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
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/formstyles.css">

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
				            <img src="assets/images/user.png">
				             <div class="app-utility-item app-user-dropdown dropdown">

                   <?php  if (isset($_SESSION['username'])) : ?>
                                    <p><?php echo $_SESSION['username']; ?></p>
                                    <?php endif ?></a>
                   </div>
				   <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
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
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                </svg>
            </span>
            <span class="nav-link-text">Report Generation</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-3" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="totalappointments.php">Total Medical Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalvisitors.php">Total Clinic Visitors</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalmedicines.php">Total Medicine Cosumes</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
            </span>
            <span class="nav-link-text">Health Profiles</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link" href="gsjhslists.php">Grade School and Junior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="shslist.php">Senior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="collegelists.php">College Building</a></li>
            </ul>
        </div>
    </li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="medicalcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Medical Approved Appointments</span>
    </a>
</li>

    <li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="consultationformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Consultation Form</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="schoolhealthassessmentformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
            <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
            </svg>
        </span>
        <span class="nav-link-text">School Health Assessment Form</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Printable Papers</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-8" class="collapse submenu submenu-8" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="healthprofilecollege.php">Health Profile</a></li>
            <li class="submenu-item"><a class="submenu-link" href="healthdeclarationcollege.php">Health Declaration</a></li>
            <li class="submenu-item"><a class="submenu-link" href="medicalcertificatecollege.php">Medical Certificate</a></li>
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

                    <?php  	
                        $healthcollege_id = $_GET['healthcollege_id'];
                        $sql = "SELECT * FROM healthrecordformcollege WHERE healthcollege_id='$healthcollege_id'";

                        $result = mysqli_query($conn, $sql);

                        while($row = $result->fetch_assoc()){
                        $healthcollege_id = $row['healthcollege_id'];
                    ?>


					<p class="title_">Personal Information</p>
					
					<form class="form-horizontal mt-4" action="function/editrecordcollege.php" method="POST" enctype="multipart/form-data">
                    <div class="align_form">
								<div class="input_form">
								<div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
                                <input type="file" name="image" id="image">
							</div>
						</div>
            <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?=$row['fullname'];?>" >
            </div>
            <div class="input_wrap">
                <label for="fullname">Course & Year</label>
                <input id="fullname" name="courseyear" type="text" value="<?=$row['courseyear'];?>" >
            </div>
            <div class="input_wrap">
    <label for="fullname">Role</label>
    <select class="form-select" name="role">
        <option value="" <?php if(empty($row['role'])) echo "selected"; ?>>Select Role</option>
        <option value="Student in SHS" <?php if($row['role'] == "Student in SHS") echo "selected"; ?>>Student in SHS</option>
        <option value="Employee in SHS" <?php if($row['role'] == "Employee in SHS") echo "selected"; ?>>Employee in SHS</option>
    </select>
</div>
       
                            </div>
                            </div><br><br>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?=$row['idnumber'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option value="" <?php if(empty($row['gender'])) echo "selected"; ?>>Select Gender</option>
                    <option value="Female" <?php if($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                    <option value="Male" <?php if($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                </select>
            </div>
            <div class="input_wrap">
                <label for="fullname">Address</label>
                <input name="address" id ="address1" type="text" value="<?=$row['address'];?>">
            </div>
         </div>
         <div class="input_form">
     <div class="input_wrap">
                <label for="fullname">Personal Contact No</label>
                <input name="pcontact" type="text" id="pcontact" value="<?=$row['pcontact'];?>">
            </div>
   
        <div class="input_wrap">
            <label for="fullname">Nationality</label>
            <input name="nationality" id="nationality1" type="text" value="<?=$row['nationality'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Birthday</label>
            <input name="birthday" id="birthday" type="date" value="<?=$row['birthday'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Religion</label>
            <input name="religion" id="religion1" type="text" value="<?=$row['religion'];?>">
        </div>
      </div>

      <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Father's/Guardian's Name</label>
            <input name="fguardian" id="fguardian" type="text" value="<?=$row['fguardian'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation</label>
            <input name="occupation1" id="fguardian" type="text" value="<?=$row['occupation1'];?>">
        </div>
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Mother's Name</label>
            <input name="mother" id="fguardian" type="text" value="<?=$row['mother'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Occupation</label>
            <input name="occupation2" id="fguardian" type="text" value="<?=$row['occupation2'];?>">
        </div>
    </div>
    <div class="input_form">
   <div class="input_wrap">
            <label for="fullname">Contact in case of emergency</label>
            <input name="contactemer" id="contactemer" type="text" value="<?=$row['contactemer'];?>">
        </div>

  <div class="input_wrap">
            <label for="fullname">Contact Numbers</label>
            <input name="contactno" id="con" type="text" value="<?=$row['contactno'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Address</label>
            <input name="address2" id="con" type="text" value="<?=$row['address2'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Relation to student/employee</label>
            <input name="relation" id="con" type="text" value="<?=$row['relation'];?>">
        </div>
   </div>

   <div class="input_form">
   <div class="input_wrap">
            <label for="fullname">Hospital of Choice of referral</label>
            <input name="referral" id="referral" type="text" value="<?=$row['referral'];?>">
            </div>
        <div class="input_wrap">
            <label for="fullname">Contact Numbers</label>
            <input name="contactno2" id="con" type="text" value="<?=$row['contactno2'];?>">
        </div>
        </div>
        <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Physician and number to call</label>
            <input name="physiciannumcall" id="physician" type="text" value="<?=$row['physiciannumcall'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Address of hospital</label>
            <input name="addresshospital" id="physician" type="text" value="<?=$row['addresshospital'];?>">
        </div>
   </div>

   <div>
   <br>
     <b><p class="title">A. IMMUNIZATION</p></b>
    </div>
    <b><p class="vaccine">VACCINE</p></b>
    <div class="input_form">
   <div class="input_wrap">
            <label for="fullname">Tetanus & Diphtheria (Td) of Tetanus toxoid</label>
            <input name="td" id="vaccine" type="text" placeholder="Write WHEN and WHERE adminitered" value="<?=$row['td'];?>">
        </div>

  <div class="input_wrap">
            <label for="fullname">Measles, Mumps, Rubella (MMR) </label>
            <input name="mmr" id="vaccine" type="text" placeholder="Write WHEN and WHERE adminitered" value="<?=$row['mmr'];?>">
        </div>
        </div>

        <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Hepatitis B</label>
            <input name="hepab" id="vaccine" type="text" placeholder="Write WHEN and WHERE adminitered" value="<?=$row['hepab'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Varicella</label>
            <input name="varicella" id="vaccine" type="text" placeholder="Write WHEN and WHERE adminitered" value="<?=$row['varicella'];?>">
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
  <div class="checkbox">
  <input name="yesasthma" value="yesasthma" type="checkbox" id="yesasthma" <?php if($row['yesasthma']=="yesasthma") {echo "checked";} ?>>
    <label class="labels" for="yesasthma" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="noasthma" value="noasthma" type="checkbox" id="noasthma" <?php if($row['noasthma']=="noasthma") {echo "checked";} ?>>
    <label class="labels" for="noasthma" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationasthma" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationasthma'];?>">
  </div>
</div>
<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 53px;">Bleeding Tendency:</p>
  <div class="checkbox">
  <input name="yesbleeding" value="yesbleeding" type="checkbox" id="yesbleeding" <?php if($row['yesbleeding']=="yesbleeding") {echo "checked";} ?>>
    <label class="labels" for="yesbleeding" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nobleeding" value="nobleeding" type="checkbox" id="nobleeding" <?php if($row['nobleeding']=="nobleeding") {echo "checked";} ?>>
    <label class="labels" for="nobleeding" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationbleeding" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationbleeding'];?>">
  </div>
</div>
<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 137px;">Cancer:</p>
  <div class="checkbox">
  <input name="yescancer" value="yescancer" type="checkbox" id="yescancer" <?php if($row['yescancer']=="yescancer") {echo "checked";} ?>>
    <label class="labels" for="yescancer" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nocancer" value="nocancer" type="checkbox" id="nocancer" <?php if($row['nocancer']=="nocancer") {echo "checked";} ?>>
    <label class="labels" for="nocancer" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationcancer" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationcancer'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 125px;">Diabetes:</p>
  <div class="checkbox">
  <input name="yesdiabetes" value="yesdiabetes" type="checkbox" id="yesdiabetes" <?php if($row['yesdiabetes']=="yesdiabetes") {echo "checked";} ?>>
    <label class="labels" for="yesdiabetes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nodiabetes" value="nodiabetes" type="checkbox" id="nodiabetes" <?php if($row['nodiabetes']=="nodiabetes") {echo "checked";} ?>>
    <label class="labels" for="nodiabetes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationdiabetes" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationdiabetes'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 84px;">Heart Disorder:</p>
  <div class="checkbox">
  <input name="yesheartdis" value="yesheartdis" type="checkbox" id="yesheartdis" <?php if($row['yesheartdis']=="yesheartdis") {echo "checked";} ?>>
    <label class="labels" for="yesheartdis" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="noheartdis" value="noheartdis" type="checkbox" id="noheartdis" <?php if($row['noheartdis']=="noheartdis") {echo "checked";} ?>>
    <label class="labels" for="noheartdis" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationheartdis" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationheartdis'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 45px;">High Blood Pressure:</p>
  <div class="checkbox">
  <input name="yesbp" value="yesbp" type="checkbox" id="yesbp" <?php if($row['yesbp']=="yesbp") {echo "checked";} ?>>
    <label class="labels" for="yesbp" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nobp" value="nobp" type="checkbox" id="nobp" <?php if($row['nobp']=="nobp") {echo "checked";} ?>>
    <label class="labels" for="nobp" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationbp" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationbp'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 78px;">Kidney Problem:</p>
  <div class="checkbox">
  <input name="yeskidney" value="yeskidney" type="checkbox" id="yeskidney" <?php if($row['yeskidney']=="yeskidney") {echo "checked";} ?>>
    <label class="labels" for="yeskidney" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nokidney" value="nokidney" type="checkbox" id="nokidney" <?php if($row['nokidney']=="nokidney") {echo "checked";} ?>>
    <label class="labels" for="nokidney" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationkidney" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationkidney'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 78px;">Mental Disorder:</p>
  <div class="checkbox">
  <input name="yesmental" value="yesmental" type="checkbox" id="yesmental" <?php if($row['yesmental']=="yesmental") {echo "checked";} ?>>
    <label class="labels" for="yesmental" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nomental" value="nomental" type="checkbox" id="nomental" <?php if($row['nomental']=="nomental") {echo "checked";} ?>>
    <label class="labels" for="nomental" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationmental" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationmental'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 140px;">Obesity:</p>
  <div class="checkbox"> 
  <input name="yesobese" value="yesobese" type="checkbox" id="yesobese" <?php if($row['yesobese']=="yesobese") {echo "checked";} ?>>
    <label class="labels" for="yesobese" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="noobese" value="noobese" type="checkbox" id="noobese" <?php if($row['noobese']=="noobese") {echo "checked";} ?>>
    <label class="labels" for="noobese" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationobese" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationobese'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 79px;">Seizure Disorder:</p>
  <div class="checkbox">
  <input name="yesseizure" value="yesseizure" type="checkbox" id="yesseizure" <?php if($row['yesseizure']=="yesseizure") {echo "checked";} ?>>
    <label class="labels" for="yesseizure" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="noseizure" value="noseizure" type="checkbox" id="noseizure" <?php if($row['noseizure']=="noseizure") {echo "checked";} ?>>
    <label class="labels" for="noseizure" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationseizure" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationseizure'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 150px;">Stroke:</p>
  <div class="checkbox">
  <input name="yesstroke" value="yesstroke" type="checkbox" id="yesstroke" <?php if($row['yesstroke']=="yesstroke") {echo "checked";} ?>>
    <label class="labels" for="yesstroke" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nostroke" value="nostroke" type="checkbox" id="nostroke" <?php if($row['nostroke']=="nostroke") {echo "checked";} ?>>
    <label class="labels" for="nostroke" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationstroke" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationstroke'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <br>
    <div class="row-container">
    <p style="margin-right: 109px;">Tuberculosis:</p>
  <div class="checkbox">
  <input name="yestb" value="yestb" type="checkbox" id="yestb" <?php if($row['yestb']=="yestb") {echo "checked";} ?>>
    <label class="labels" for="yestb" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="notb" value="notb" type="checkbox" id="notb" <?php if($row['notb']=="notb") {echo "checked";} ?>>
    <label class="labels" for="notb" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="relationtb" id="otherillnesss" type="text" placeholder="Relation(s) to student/emloyee" value="<?=$row['relationtb'];?>">
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
            <input name="allergy" value="allergy" type="checkbox" id="allergy" <?php if($row['allergy']=="allergy") {echo "checked";} ?>>
            <label class="label" for="allergy" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALLERGY</label>
        </div>
        <div class="checkbox">
            <input name="anemia" value="anemia" type="checkbox" id="anemia" <?php if($row['anemia']=="anemia") {echo "checked";} ?>>
            <label class="anemia" for="anemia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ANEMIA</label>
        </div>
        <div class="checkbox">
            <input name="asthma" value="asthma" type="checkbox" id="asthma" <?php if($row['asthma']=="asthma") {echo "checked";} ?>>
            <label class="label" for="asthma" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASTHMA</label>
        </div>
        <div class="checkbox">
            <input name="behavioral" value="behavioral" type="checkbox" id="behavioral" <?php if($row['behavioral']=="behavioral") {echo "checked";} ?>>
            <label class="label" for="behavioral" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BEHAVIORAL PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="bleedingprob" value="bleedingprob" type="checkbox" id="bleedingprob" <?php if($row['bleedingprob']=="bleedingprob") {echo "checked";} ?>>
            <label class="label" for="bleedingprob" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLEEDING PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="blood" value="blood" type="checkbox" id="blood" <?php if($row['blood']=="blood") {echo "checked";} ?>>
            <label class="label" for="blood" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLOOD ABNORMALITY</label>
        </div>
        <div class="checkbox">
            <input name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox" <?php if($row['chickenpox']=="chickenpox") {echo "checked";} ?>>
            <label class="label" for="chickenpox" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CHICKEN POX</label>
        </div>
        <div class="checkbox">
            <input name="convulsion" value="convulsion" type="checkbox" id="convulsion" <?php if($row['convulsion']=="convulsion") {echo "checked";} ?>>
            <label class="label" for="convulsion" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONVULSION</label>
        </div>
        <div class="checkbox">
            <input name="dengue" value="dengue" type="checkbox" id="dengue" <?php if($row['dengue']=="dengue") {echo "checked";} ?>>
            <label class="label" for="dengue" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DENGUE</label>
        </div>
        <div class="checkbox">
            <input name="diabetess" value="diabetess" type="checkbox" id="diabetess" <?php if($row['diabetess']=="diabetess") {echo "checked";} ?>>
            <label class="label" for="diabetess" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIABETES</label>
        </div>
        <div class="checkbox">
            <input name="earproblem" value="earproblem" type="checkbox" id="earproblem" <?php if($row['earproblem']=="earproblem") {echo "checked";} ?>>
            <label class="label" for="earproblem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EAR PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="eating_disorder" value="eating_disorder" type="checkbox" id="eating_disorder" <?php if($row['eating_disorder']=="eating_disorder") {echo "checked";} ?>>
            <label class="label" for="eating_disorder" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EATING DISORDER</label>
        </div>

        <div class="checkbox">
            <input name="epilepsy" value="epilepsy" type="checkbox" id="epilepsy" <?php if($row['epilepsy']=="epilepsy") {echo "checked";} ?>>
            <label class="label" for="epilepsy" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EPILEPSY</label>
        </div>
        <div class="checkbox">
            <input name="eyeproblemm" value="eyeproblemm" type="checkbox" id="eyeproblemm" <?php if($row['eyeproblemm']=="eyeproblemm") {echo "checked";} ?>>
            <label class="label" for="eyeproblemm" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EYE PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="fracture" value="fracture" type="checkbox" id="fracture" <?php if($row['fracture']=="fracture") {echo "checked";} ?>>
            <label class="label" for="fracture" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FRACTURE</label>
        </div>

        <div class="checkbox">
            <input name="hearing_problem" value="hearing_problem" type="checkbox" id="hearing_problem" <?php if($row['hearing_problem']=="hearing_problem") {echo "checked";} ?>>
            <label class="label" for="hearing_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEARING PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="heart_disorder" value="heart_disorder" type="checkbox" id="heart_disorder" <?php if($row['heart_disorder']=="heart_disorder") {echo "checked";} ?>>
            <label class="label" for="heart_disorder" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HEART DISORDER</label>
        </div>
        <div class="checkbox">
            <input name="hyperacidity" value="hyperacidity" type="checkbox" id="hyperacidity" <?php if($row['hyperacidity']=="hyperacidity") {echo "checked";} ?>>
            <label class="label" for="hyperacidity" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HYPERACIDITY</label>
        </div>
        <div class="checkbox">
            <input name="indigestion" value="indigestion" type="checkbox" id="indigestion" <?php if($row['indigestion']=="indigestion") {echo "checked";} ?>>
            <label class="label" for="indigestion" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDIGESTION</label>
        </div>
        <div class="checkbox">
            <input name="insomia" value="insomia" type="checkbox" id="insomia" <?php if($row['insomia']=="insomia") {echo "checked";} ?>>
            <label class="label" for="insomia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSOMIA</label>
        </div>

        <div class="checkbox">
            <input name="kidney_problem" value="kidney_problem" type="checkbox" id="kidney_problem" <?php if($row['kidney_problem']=="kidney_problem") {echo "checked";} ?>>
            <label class="label" for="kidney_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KIDNEY PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="liver_problem" value="liver_problem" type="checkbox" id="liver_problem" <?php if($row['liver_problem']=="liver_problem") {echo "checked";} ?>>
            <label class="label" for="liver_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LIVER PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="measless" value="measless" type="checkbox" id="measless" <?php if($row['measless']=="measless") {echo "checked";} ?>>
            <label class="label" for="measless" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MEASLES</label>
        </div>
        <div class="checkbox">
            <input name="mumpss" value="mumpss" type="checkbox" id="mumpss" <?php if($row['mumpss']=="mumpss") {echo "checked";} ?>>
            <label class="label" for="mumpss" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MUMPS</label>
        </div>
        <div class="checkbox">
            <input name="parasitism" value="parasitism" type="checkbox" id="parasitism" <?php if($row['parasitism']=="parasitism") {echo "checked";} ?>>
            <label class="label" for="parasitism" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARASITISM</label>
        </div>
        <div class="checkbox">
            <input name="pneumonia" value="pneumonia" type="checkbox" id="pneumonia" <?php if($row['pneumonia']=="pneumonia") {echo "checked";} ?>>
            <label class="label" for="pneumonia" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PNEUMONIA</label>
        </div>
        <div class="checkbox">
            <input name="primary_complex" value="primary_complex" type="checkbox" id="primary_complex" <?php if($row['primary_complex']=="primary_complex") {echo "checked";} ?>>
            <label class="label" for="primary_complex" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRIMARY COMPLEX</label>
        </div>
        <div class="checkbox">
            <input name="scoliosis" value="scoliosis" type="checkbox" id="scoliosis" <?php if($row['scoliosis']=="scoliosis") {echo "checked";} ?>>
            <label class="label" for="scoliosis" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SCOLIOSIS</label>
        </div>

        <div class="checkbox">
            <input name="skin_problem" value="skin_problem" type="checkbox" id="skin_problem" <?php if($row['skin_problem']=="skin_problem") {echo "checked";} ?>>
            <label class="label" for="skin_problem" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SKIN PROBLEM</label>
        </div>
        <div class="checkbox">
            <input name="tonsillitis" value="tonsillitis" type="checkbox" id="tonsillitis" <?php if($row['tonsillitis']=="tonsillitis") {echo "checked";} ?>>
            <label class="label" for="tonsillitis" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TONSILLITIS</label>
        </div>
        <div class="checkbox">
            <input name="typhoid_fever" value="typhoid_fever" type="checkbox" id="typhoid_fever" <?php if($row['typhoid_fever']=="typhoid_fever") {echo "checked";} ?>>
            <label class="label" for="typhoid_fever" style="font-size: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TYPHOID FEVER</label>
        </div>
        <div class="checkbox">
            <input name="vision_defect" value="vision_defect" type="checkbox" id="vision_defect" <?php if($row['vision_defect']=="vision_defect") {echo "checked";} ?>>
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
  <div class="checkbox">
  <input name="yeshospitalization" value="yeshospitalization" type="checkbox" id="yeshospitalization" <?php if($row['yeshospitalization']=="yeshospitalization") {echo "checked";} ?>>
    <label class="labels" for="yeshospitalization" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="nohospitalization" value="nohospitalization" type="checkbox" id="nohospitalization" <?php if($row['nohospitalization']=="nohospitalization") {echo "checked";} ?>>
    <label class="labels" for="nohospitalization" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <p style="margin-right: 30px;">Surgical Operation</p>
  <div class="checkbox">
    <input name="yessurgical" value="yessurgical" type="checkbox" id="yessurgical" <?php if($row['yessurgical']=="yessurgical") {echo "checked";} ?>>
    <label class="labels" for="yessurgical" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="nosurgical" value="nosurgical" type="checkbox" id="nosurgical" <?php if($row['nosurgical']=="nosurgical") {echo "checked";} ?>>
    <label class="labels" for="nosurgical" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>
<br>
        <div class="input_wrap">
            <label>The student/employee is on special medication</label>
            <input name="specialmed" type="text" value="<?=$row['specialmed'];?>">
        </div>
        <div class="input_wrap">
            <label>The student/employee is allergic to the following drugs</label>
            <input name="allergicdrugs" type="text" value="<?=$row['allergicdrugs'];?>">
        </div>
        <div class="input_wrap">
            <label>Other relevant information</label>
            <input name="otherrelevant" type="text" value="<?=$row['otherrelevant'];?>">
        </div>

                            <input type="hidden" id ="language" name="hidden" value="<?=$row['healthcollege_id'];?>">
                            <input type="hidden" name="healthcollege_id" value="<?php echo $healthcollege_id; ?>">
                            <input type="submit" name="update_recordcollege" value="Update">

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


