<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }
    $admin_id = $_SESSION['admin_id'];
    $sql_query = "SELECT * FROM admins WHERE admin_id ='$admin_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../../db.php');
        if($_SESSION['role'] == 6){
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
    <title>Physical Examination Record</title>
    
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
    <link rel="stylesheet" href="assets/dentalstyles.css">

</head> 

<body class="app">   	

<?php  	
$idnumber = $_GET['idnumber'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM physicalexaminationgsjhs WHERE idnumber = '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $idnumber = $row['idnumber'];
    $fullname = $row['fullname'];
    $age= $row['age'];
    $sex = $row['sex'];
    $levelsection = $row['levelsection'];
    $pastsurgeries = $row['pastsurgeries'];
    $familyhistory = $row['familyhistory'];
    $bp = $row['bp'];
    $pr = $row['pr'];
    $height = $row['height'];
    $weight= $row['weight'];
    $bmi = $row['bmi'];
    $heent = $row['heent'];
    $cvs = $row['cvs'];
    $gis = $row['gis'];
    $gus = $row['gus'];
    $remarks = $row['remarks'];
    $medicalexaminer = $row['medicalexaminer'];
    $dateexamined = $row['dateexamined'];
  
  
      }
   else {
   } 
  ?>

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
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
        </span>
        <span class="nav-link-text">Physician Consultation Request</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="physicianstudentgsjhsshs.php">Student</a></li>
            <li class="submenu-item"><a class="submenu-link" href="physicianemployeegsjhsshs.php">Employee</a></li>
        </ul>
    </div>
</li>

    
<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="physicianapproved.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Physician Consultation Appointments</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-3">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
            <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Physical Examination <br>Record</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link active" href="physicalexaminationgsjhs.php">Grade School and Junior High School Department</a></li>
            <li class="submenu-item"><a class="submenu-link" href="physicalexaminationshs.php">Senior High School Department</a></li>
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
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Physical Examination Record</h4>
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
                   
             
                  
                   <div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label">Patient ID Number</label>
      <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="form-group">
      <label for="fullname" class="col-sm-12 control-label">Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-1">
    <div class="form-group">
      <label for="age" class="col-sm-12 control-label">Age</label>
      <input type="text" class="form-control" id="age" name="age" value="<?=$row['age'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
    <label for="fullname">Sex</label>
                <select class="form-select" name="sex">
                <option disabled selected><?= $row['sex'];?></option>
                </select>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-7">
                         <div class="form-group">
                           <label for="levelsection" class="col-sm-12 control-label">Level/Section</label>
                           <input type="text" id="levelsection" name="levelsection" class="form-control" value="<?=$row['levelsection'];?>" readonly>
                         </div>
                       </div>
                  </div>
    <br>

   <b><i> <p>Significant Medical History:</b></i></p>

   <div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="pastsurgeries" class="col-sm-12 control-label">Past Illnesses/Surgeries</label>
                           <input type="text" id="pastsurgeries" name="pastsurgeries" class="form-control" value="<?=$row['pastsurgeries'];?>" readonly>
                         </div>
                       </div>
                  </div>
   <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="allergies" class="col-sm-12 control-label">Allergies</label>
                           <input type="text" id="allergies" name="allergies" class="form-control" value="<?=$row['allergies'];?>" readonly>
                         </div>
                       </div>
                  </div>
    
                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="familyhistory" class="col-sm-12 control-label">Family History</label>
                           <input type="text" id="familyhistory" name="familyhistory" class="form-control" value="<?=$row['familyhistory'];?>" readonly>
                         </div>
                       </div>
                  </div>

<br>
   <b><i> <p>Physical Examination:</b></i></p>

   <div class="row">
  <div class="col-sm-2">
    <div class="form-group" style="margin-right: 20px">
      <label for="bp" class="col-sm-12 control-label">BP</label>
      <input type="text" class="form-control" id="bp" name="bp" value="<?=$row['bp'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2" style="margin-right: 20px">
    <div class="form-group">
      <label for="pr" class="col-sm-12 control-label">PR</label>
      <input type="text" class="form-control" id="pr" name="pr" value="<?=$row['pr'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2" style="margin-right: 20px">
    <div class="form-group">
      <label for="height" class="col-sm-12 control-label">Height</label>
      <input type="text" class="form-control" id="height" name="height" value="<?=$row['height'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2" style="margin-right: 20px">
    <div class="form-group">
      <label for="weight" class="col-sm-12 control-label">Weight</label>
      <input type="text" class="form-control" id="weight" name="weight" value="<?=$row['weight'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2" style="margin-right: 20px">
    <div class="form-group">
      <label for="bmi" class="col-sm-12 control-label">BMI</label>
      <input type="text" class="form-control" id="bmi" name="bmi" value="<?=$row['bmi'];?>" readonly>
    </div>
  </div>
</div>

<br>
   <b><i> <p>General Appearance:</b></i></p>

   <div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="heent" class="col-sm-12 control-label">HEENT</label>
                           <input type="text" id="heent" name="heent" class="form-control" value="<?=$row['heent'];?>" readonly>
                         </div>
                       </div>
                  </div>
   <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="cvs" class="col-sm-12 control-label">CVS</label>
                           <input type="text" id="cvs" name="cvs" class="form-control"value="<?=$row['cvs'];?>" readonly>
                         </div>
                       </div>
                  </div>
    
                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="gis" class="col-sm-12 control-label">GIS</label>
                           <input type="text" id="gis" name="gis" class="form-control" value="<?=$row['gis'];?>" readonly>
                         </div>
                       </div>
                  </div>

                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="gus" class="col-sm-12 control-label">GUS</label>
                           <input type="text" id="gus" name="gus" class="form-control" value="<?=$row['gus'];?>" readonly>
                         </div>
                       </div>
                  </div>

                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="extremities" class="col-sm-12 control-label">Extremities</label>
                           <input type="text" id="extremities" name="extremities" class="form-control" value="<?=$row['extremities'];?>" readonly>
                         </div>
                       </div>
                  </div>
                  <br>
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="remarks" class="col-sm-12 control-label"><b>Remarks</b></label>
                           <input type="text" id="remarks" name="remarks" class="form-control" value="<?=$row['remarks'];?>" readonly>
                         </div>
                       </div>
                  </div>

                  <br><br>
<div class="row">
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="medicalexaminer" class="col-sm-12 control-label">Medical Examiner</label>
                           <input type="text" id="medicalexaminer" name="medicalexaminer" class="form-control" value="<?=$row['medicalexaminer'];?>" readonly>
                         </div>
                       </div>
 <div class="col-sm-6">
                         <div class="form-group">
                           <label for="dateexamined" class="col-sm-12 control-label">Date Examined</label>
                           <input type="date" id="dateexamined" name="dateexamined" class="form-control" value="<?=$row['dateexamined'];?>" readonly>
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

