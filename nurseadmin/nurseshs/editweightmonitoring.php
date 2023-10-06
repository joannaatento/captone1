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
        if($_SESSION['role'] == 2){
            // User type 1 specific code here
        }
        else{
            header('location: ../../login.php');
            exit; // Exit the script to prevent further execution
        }
    }

?>



<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Edit Weight Monitoring Record</title>
    
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
$sql = "SELECT * FROM weightmonitor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $age = $row['age'];
  $gradesection = $row['gradesection'];
  $date_time = $row['date_time'];
  $weight = $row['weight'];
  $remarks = $row['remarks'];
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
					        <div class="col-12 col-lg-auto text-center text-lg-start">

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
    $weight_id = $_GET['weight_id'];
    $sql = "SELECT * FROM weightmonitor WHERE weight_id='$weight_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $weight_id = $row['weight_id'];
    ?>
                    <form class="form-horizontal mt-4" method="post" action="function/shsrecords.php">

<div class="container">
    <div class="form-container">
        <div class="form-title">
           Edit Weight Monitoring Record
        </div>

<div class="row">
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="idnumber" class="col-sm-7 control-label">ID Number</label>
                              <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="fullname" class="col-sm-4 control-label">Name</label>
                              <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>">
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="age" class="col-sm-4 control-label">Age</label>
                              <input type="age" class="form-control" id="age" name="age" value="<?=$row['age'];?>">
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="gradesection" class="col-sm-10 control-label">Grade & Section</label>
                              <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?=$row['gradesection'];?>">
                      </div>
                  </div>
                  
              </div>
            
              <div class="row">
                  
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="weight" class="control-label">Weight (kg)</label>
                              <input type="text" class="form-control" id="weight" name="weight" value="<?=$row['weight'];?>">
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="remarks" class="col-sm-4 control-label">Remarks</label>
                              <input type="text" class="form-control" id="remarks" name="remarks" value="<?=$row['remarks'];?>">
                      </div>
                  </div>

              </div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
    <br>
    <input type="hidden" name="weight_id" value="<?php echo $weight_id; ?>">
    <input type="submit" name="update_weightmonitoring" value="Update">
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

