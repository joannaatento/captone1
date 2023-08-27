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
    <title>Request Medical Schedule</title>
    
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
	<link rel="stylesheet" href="assets/styless.css">

   
</style>
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

    <a class="nav-link submenu-toggle active" href="healthrecordformgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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



	<li class="nav-item has-submenu">
								<a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
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
										<li class="submenu-item"><a class="submenu-link" href="adddentalmessagegsjhs.php">Request Dental Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link active" href="addmedicalmessagegsjhs.php">Request Medical Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addphysicianmessagegsjhs.php">Request Physician Scheduling</a></li>
									</ul>
								</div>
							</li>


							<li class="nav-item has-submenu">
								<a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
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
									<li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofile.php">Health Profile Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdentalappgsjhs.php">Dental Record</a>
                  <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappgsjhs.php">Medical Record</a>
                  <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappgsjhs.php">Physician Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdiagnosisgsjhs.php">Diagnosis/Chief Complaints, Management & Treatment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewschoolassesgsjhs.php">School Health Assessment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicalexaminationrecordgsjhs.php">Physical Examination Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicianorderandprogressnotesgsjhs.php">Physician's Order Sheet and Progress Notes Record</a>
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
					   
					       
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Request Medical Schedule</h4>
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
                    <b><p>Please wait for a message for approval of your medical request appointment.</b></p>
<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" placeholder="Enter Grade & Section">
      </div>
    </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
    <label for="phoneno" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
    <div class="col-sm-12">
      <input type="text" class="form-control contactInput" name="phoneno" placeholder="+63">
      <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
    </div>
  </div>
</div>

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

</div>

<br>

<br>
<div class="row">
<div class="col-sm-3">
    <div class="form-group">
      <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule</label>
      <div class="col-sm-12">
        <input type="datetime-local" class="form-control" id="datetime" name="date_time">
      </div>
    </div>
</div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="role" class="col-sm-12 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="Student in GS/JHS">Student</option>
                <option value="Employee in GS/JHS">Employee</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="onoff" class="col-sm-12 control-label" style="font-size: 16px">On-campus/Off-campus Activity</label>
            <div class="col-sm-12">
                <select id="onoff" name="onoff" class="form-control" required>
                <option value="">Select</option>
                <option value="On-campus Activity">On-campus Activity</option>
                <option value="Off-campus Activity">Off-campus Activity</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br><br>

<div class="container">
  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN GS and JHS</b></p>
    </center>

    <?php
    $sql1 = "SELECT * FROM statusmedicalgsjhs";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmedmonam_1 = $row1['statusmedmonam_1']; 
        $statusmedtueam_2 = $row1['statusmedtueam_2']; 
        $statusmedwedam_3 = $row1['statusmedwedam_3']; 
        $statusmedthuam_4 = $row1['statusmedthuam_4']; 
        $statusmedfriam_5 = $row1['statusmedfriam_5']; 
        $statusmedmonpm_6 = $row1['statusmedmonpm_6']; 
        $statusmedtuepm_7 = $row1['statusmedtuepm_7']; 
        $statusmedwedpm_8 = $row1['statusmedwedpm_8']; 
        $statusmedthupm_9 = $row1['statusmedthupm_9']; 
        $statusmedfripm_10 = $row1['statusmedfripm_10']; 
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>

  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN SHS</b></p>
    </center>
     <?php
    $sql2 = "SELECT * FROM statusmedicalshs";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2)) {
        $row2 = $result2->fetch_assoc();

        $statusmedmonam_1 = $row2['statusmedmonam_1']; 
        $statusmedtueam_2 = $row2['statusmedtueam_2']; 
        $statusmedwedam_3 = $row2['statusmedwedam_3']; 
        $statusmedthuam_4 = $row2['statusmedthuam_4']; 
        $statusmedfriam_5 = $row2['statusmedfriam_5']; 
        $statusmedmonpm_6 = $row2['statusmedmonpm_6']; 
        $statusmedtuepm_7 = $row2['statusmedtuepm_7']; 
        $statusmedwedpm_8 = $row2['statusmedwedpm_8']; 
        $statusmedthupm_9 = $row2['statusmedthupm_9']; 
        $statusmedfripm_10 = $row2['statusmedfripm_10']; 
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>


  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN COLLEGE</b></p>
    </center>
     <?php
    $sql3 = "SELECT * FROM statusmedicalcollege";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3)) {
        $row3 = $result3->fetch_assoc();

        $statusmedmonam_1 = $row3['statusmedmonam_1']; 
        $statusmedtueam_2 = $row3['statusmedtueam_2']; 
        $statusmedwedam_3 = $row3['statusmedwedam_3']; 
        $statusmedthuam_4 = $row3['statusmedthuam_4']; 
        $statusmedfriam_5 = $row3['statusmedfriam_5']; 
        $statusmedmonpm_6 = $row3['statusmedmonpm_6']; 
        $statusmedtuepm_7 = $row3['statusmedtuepm_7']; 
        $statusmedwedpm_8 = $row3['statusmedwedpm_8']; 
        $statusmedthupm_9 = $row3['statusmedthupm_9']; 
        $statusmedfripm_10 = $row3['statusmedfripm_10']; 
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function updateColor() {
      var selectedValue = $(this).val();
      $(this).removeClass('available unavailable').addClass(selectedValue.toLowerCase());
    }

    $('select').each(updateColor).change(updateColor);
  });
</script>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_medical" class="btn btn-success">Send Medical Appointment</button>
    </div>
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

