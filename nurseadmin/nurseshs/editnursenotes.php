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
            header('location: ../login.php');
            exit; // Exit the script to prevent further execution
        }
    }

?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Edit Nurse's Notes Record</title>
    
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
$sql = "SELECT * FROM nursenotesshs";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $gradesection = $row['gradesection'];
  $datetime = $row['datetime'];
  $vitalsigns = $row['vitalsigns'];
  $nursenotes = $row['nursenotes'];
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
    $nurse_id = $_GET['nurse_id'];
    $sql = "SELECT * FROM nursenotesshs WHERE nurse_id='$nurse_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $nurse_id = $row['nurse_id'];
    ?>
                     <form class="form-horizontal mt-4" method="post" action="function/shsrecords.php">

                     <div class="container">
  <div class="form-container">

    <div class="form-title">
      Edit Nurse's Notes Record
    </div>

    <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="idnumber" class="col-sm-4 control-label" style="font-size: 16px">ID Number</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px">Name</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="gradesection" class="col-sm-6 control-label" style="font-size: 16px">Grade & Section</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?=$row['gradesection'];?>">
                              </div>
                          </div>
                      </div>
                  </div>
                  
     <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                            <br>
                              <label for="datetime" class="col-sm-8 control-label" style="font-size: 16px">Date/Time</label>
                              <div class="col-sm-11">
                                  <input type="datetime" class="form-control" id="datetime" name="datetime" value="<?=$row['datetime'];?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                            <br>
                              <label for="vitalsigns" class="col-sm-8 control-label" style="font-size: 16px">Vital Signs</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="vitalsigns" name="vitalsigns" value="<?=$row['vitalsigns'];?>">
                              </div>
                          </div>
                      </div>
                </div>
         <div class="row">
                      <div class="col-sm-17">
                          <div class="form-group">
                            <br>
                              <label for="nursenotes" class="col-sm-8 control-label" style="font-size: 16px">Nurse's Notes</label>
                              <div class="col-sm-11">
                              <textarea class="form-control" id="nursenotes" name="nursenotes"><?=$row['nursenotes'];?></textarea>
                              </div>
                          </div>
                      </div> 
                </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="hidden" name="nurse_id" value="<?php echo $nurse_id; ?>">
    <input type="submit" name="update_nursenotes" value="Update">
</div>
</div>
</form>
<?php
    }

    ?>
</form>

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

