<?php
    session_start();
    include '../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("login.php");</script>';
        exit; // Exit the script to prevent further execution
    }
    $admin_id = $_SESSION['admin_id'];
    $sql_query = "SELECT * FROM admins WHERE admin_id ='$admin_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../db.php');
        if($_SESSION['role'] == 2){
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
    <link rel="stylesheet" href="assets/dentalstyles.css">

</head> 

<body class="app">   	
<?php
$sql = "SELECT * FROM dentalapp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $role = $row['role'];
  $cenrolled = $row['cenrolled'];
  $date_time = $row['date_time'];
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
                <li class="submenu-item"><a class="submenu-link" href="studentlists.php">Students</a></li>
                <li class="submenu-item"><a class="submenu-link" href="employeelists.php">Employees</a></li>
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
        <span class="nav-link-text">Dental Requests</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link active" href="dentalrequestshs.php">Senior High School</a></li>
            <li class="submenu-item"><a class="submenu-link" href="dentalrequest.php">Employee</a></li>
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
            <span class="nav-link-text">Appointments</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link active" href="dentalgsjhs.php">Dental</a></li>
                <li class="submenu-item"><a class="submenu-link" href="medical.php">Medical</a></li>
            </ul>
        </div>
    </li>

    <li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="patientmanagementrecordshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Patient's Management Record</span>
    </a>
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
						        <h4 class="notification-title mb-1">Dental Appointments</h4>
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
                   
                   <form class="form-horizontal mt-4" method="post" action="function/funct.php">
                  
                     <div class="row">
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="idnumber" class="control-label">Patient ID Number</label>
                           <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
                         </div>
                       </div>
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="fullname" class="control-label">Name</label>
                           <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter patient name" required>
                         </div>
                       </div>
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="role" class="control-label">Role</label>
                           <select id="role" name="role" class="form-control" required>
                             <option value="">Select Role</option>
                             <option value="Student">Student</option>
                             <option value="Employee">Employee</option>
                           </select>
                         </div>
                       </div>
                     </div><br>
                     <div class="row">
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="cenrolled" class="control-label">Currently enrolled in</label>
                           <input type="text" class="form-control" id="cenrolled" name="cenrolled" placeholder="Enter patient name" required>
                         </div>
                       </div>
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="service" class="control-label">Dental Service</label>
                           <select id="service" name="service" class="form-control" required>
                             <option value="">Select Service</option>
                             <option value="Cleaning">Cleaning</option>
                             <option value="Tooth Extraction">Tooth Extraction</option>
                           </select>
                         </div>
                       </div>
                       <div class="col-sm-4">
                         <div class="form-group">
                           <label for="date_time" class="control-label">Time and Date</label>
                           <input type="datetime-local" id="date_time" name="date_time" class="form-control" required>
                         </div>
                       </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-sm-4">
                         <div class="form-group">
                           <label for="dentist_name" class="control-label">Dentist</label>
                           <input type="text" id="dentist_name" name="dentist_name" class="form-control" placeholder="Enter Dentist Name" required>
                         </div>
                       </div>
                  </div>
                  <br>
                     <div class="row">
                       <div class="col-sm-12">
                       <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
                         <button name="submit_dentalshs" class="btn btn-success">Add Dental Appointment</button>
                       </div>
                     </div>
                   </form>
                   
                 </div><!--//app-card-body-->
                 <br>
                 <div style="text-align: right; margin-right: 48px;">
                     <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                         Update Dental Schedule
                     </button>
                 </div>
                 
                 
                 <center>
                   
                     <table class="styled-table">
                         <thead>
                             <tr>
                                 <th>Patient ID Number</th>
                                 <th>Patient Name</th>
                                 <th>Role</th>
                                 <th>Enrolled in</th>
                                 <th>Service</th>
                                 <th>Time and Date</th>
                                 <th>Dentist</th>
                               
                             </tr>
                         </thead>
                         <tbody id="healthRecordTableBody">
                             <?php
                             $sql = "SELECT * FROM dentalapp WHERE admin_id = '$admin_id'";
                             $result = mysqli_query($conn, $sql);
                             
                             while ($row = $result->fetch_assoc()) {
                                 ?>
                                 <tr>
                                     <td><?php echo $row['idnumber']; ?></td>
                                     <td><?php echo $row['fullname']; ?></td>
                                     <td><?php echo $row['role']; ?></td>
                                     <td><?php echo $row['cenrolled']; ?></td>
                                     <td><?php echo $row['service']; ?></td>
                                     <td><?php echo $row['date_time']; ?></td>
                                     <td><?php echo $row['dentist_name']; ?></td>
                                   
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                     <br>
                 </center>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql2 = "SELECT * FROM statusshs";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $status_id = $row2['status_id'];
                        $statuses1030_1 = $row2['statuses1030_1'];
                        $statuses1130_2 = $row2['statuses1130_2'];
                        $statuses230_3 = $row2['statuses230_3'];
                        $statuses330_4 = $row2['statuses330_4'];
                    }
                } else {

                }
                ?>
                <?php
                // Step 1: Retrieve the data to be updated
                if (isset($_GET['status_id'])) {
                    $status_id = $_GET['status_id'];
                }

                ?>
                <form action="function/funct.php" method="POST">
                    <input type="hidden" name="status_id" value="<?php echo $status_id; ?>">
                    <div class="mb-3">
                        <label for="inputStatus1030_1" class="form-label">Status 10:30 A.M</label>
                        <select class="form-select" id="inputStatus1030_1" name="statuses1030_1">
                            <option value="Available" <?php if ($statuses1030_1 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statuses1030_1 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">Status 11:30 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statuses1130_2">
                            <option value="Available" <?php if ($statuses1130_2 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statuses1130_2 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">Status 02:30 P.M</label>
                        <select class="form-select" id="inputStatus230" name="statuses230_3">
                            <option value="Available" <?php if ($statuses230_3 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statuses230_3 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">Status 03:30 P.M</label>
                        <select class="form-select" id="inputStatus330" name="statuses330_4">
                            <option value="Available" <?php if ($statuses330_4 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statuses330_4 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit_statusshs" class="btn btn-light">Update</button>
                    </div>
                </form>
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

