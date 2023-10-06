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
        $role = $row['role'];
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../../db.php');
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
    <title>Edit Consultation Record</title>
    
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
	<link rel="stylesheet" href="assets/table.css">
    

</head> 
<body class="app">   	

<?php
$sql = "SELECT * FROM consultationformrecord";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $date = $row['date'];
  $fullname = $row['fullname'];
  $gradesection = $row['gradesection'];
  $chiefcomplaint = $row['chiefcomplaint'];
  $status  = $row['status'];
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
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">

                                  
            <?php  	
    $consultform_id = $_GET['consultform_id'];
    $sql = "SELECT * FROM consultationformrecord WHERE consultform_id='$consultform_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $consultform_id = $row['consultform_id'];
    ?>
					   
                     <form class="form-horizontal mt-4" method="post" action="function/shsrecords.php">

                     <div class="container">
    <div class="form-container">
        <div class="form-title">
           Edit Consultation Record
        </div>

    <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="idnumber" class="col-sm-4 control-label">ID Number</label>
                                  <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="date" class="col-sm-4 control-label">Date</label>
                                  <input type="date" class="form-control" id="date" name="date" value="<?=$row['date'];?>">
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="fullname" class="col-sm-4 control-label">Name</label>
                                  <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>">
                              </div>
                          </div>
                      </div>
                  
     <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="gradesection" class="col-sm-8 control-label" >Grade & Section</label>
                                  <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?=$row['gradesection'];?>">
                              </div>
                          </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="chiefcomplaint" class="col-sm-8 control-label">Chief Complaint/Medicine</label>
                                  <input type="text" class="form-control" id="chiefcomplaint" name="chiefcomplaint" value="<?=$row['chiefcomplaint'];?>">
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="status" class="col-sm-4 control-label">Status</label>
                                  <input type="text" class="form-control" id="status " name="status" value="<?=$row['status'];?>">
                          </div>
                      </div>

                  </div>
                  

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="hidden" name="consultform_id" value="<?php echo $consultform_id; ?>">
                   <input type="submit" name="update_consultationrecord" value="Update">
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

