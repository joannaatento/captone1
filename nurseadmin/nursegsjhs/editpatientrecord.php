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
        if($_SESSION['role'] == 1){
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
    <title>Edit Patient Management Record Appointment</title>
    
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
$sql = "SELECT * FROM patientrecord";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $fullname = $row['fullname'];
  $idnumber = $row['idnumber'];
  $gradesection = $row['gradesection'];
  $vitalsigns = $row['vitalsigns'];
  $diagnosis  = $row['diagnosis'];
  $status = $row['status'];
  $date_time = $row['date_time'];
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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Edit Patient Management Record</h4>
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
    $p_id = $_GET['p_id'];
    $sql = "SELECT * FROM patientrecord WHERE p_id='$p_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $p_id = $row['p_id'];
    ?>
                     <form class="form-horizontal mt-4" method="post" action="function/gsjhsrecords.php">
 
 <div class="row">
 <div class="col-sm-3">
   <div class="form-group">
     <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">ID Number</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
     </div>
   </div>
 </div>

 <div class="col-sm-3">
   <div class="form-group">
     <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Fullname</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="name" name="fullname" value="<?=$row['fullname'];?>">
     </div>
   </div>
 </div>

 <div class="col-sm-3">
   <div class="form-group">
     <label for="gradesection" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?=$row['gradesection'];?>">
     </div>
   </div>
 </div>

 <div class="col-sm-3">
   <div class="form-group">
     <label for="vitalsigns" class="col-sm-12 control-label" style="font-size: 16px">Vital Signs</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="vitalsigns" name="vitalsigns" value="<?=$row['vitalsigns'];?>">
     </div>
   </div>
 </div>
</div>
<br>
<div class="row">
<div class="col-sm-6">
       <div class="form-group">
       <label for="diagnosis" class="col-sm-12 control-label" style="font-size: 16px">Diagnosis/Chief Complaints, Management & Treatment</label>
     <div class="col-sm-12">
       <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="<?=$row['diagnosis'];?>">
     </div>
       </div>
   </div>

   <div class="col-sm-3">
       <div class="form-group">
            <label for="status" class="col-sm-12 control-label" style="font-size: 16px">Status</label>
            <div class="col-sm-12">
            <input type="text" class="form-control" id="status" name="status" value="<?=$row['status'];?>">
            </div>
       </div>
   </div>
   <div class="col-sm-3">
       <div class="form-group">
       <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule Date</label>
           <div class="col-sm-12">
               <input type="text" class="form-control" id="datetime" name="date_time" value="<?=$row['date_time'];?>">
           </div>
       </div>
   </div>
   
</br>
   <div class="row">
     <div class="col-sm-12">
     <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">
                   <input type="submit" name="update_patientrecord" value="Update">
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

