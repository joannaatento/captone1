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
        if($_SESSION['role'] == 3){
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
    <title>Edit School Health Assessment Record</title>
    
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
$sql = "SELECT * FROM schoolhealthasses";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $birthday = $row['birthday'];
  $gender = $row['gender'];
  $date = $row['date'];
  $weight = $row['weight'];
  $height = $row['height'];
  $bmi = $row['bmi'];
  $bp = $row['bp'];
  $pr = $row['pr'];
  $scalp = $row['scalp'];
  $skin_nails = $row['skin_nails'];
  $eyes = $row['eyes'];
  $visual_acuity = $row['visual_acuity'];
  $ears = $row['ears'];
  $hearing_test = $row['hearing_test'];
  $nose = $row['nose'];
  $throat = $row['throat'];
  $mouth_tongue = $row['mouth_tongue'];
  $teeth_gums = $row['teeth_gums'];
  $chest_breasts = $row['chest_breasts'];
  $heart = $row['heart'];
  $lungs = $row['lungs'];
  $abdomen = $row['abdomen'];
  $genitalia = $row['genitalia'];
  $spine_extremities = $row['spine_extremities'];
  $sexual = $row['sexual'];
  $screening = $row['screening'];
  $otherfindings = $row['otherfindings'];
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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>


						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Edit School Health Assessment Record</h4>
					        </div>
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
    $schoolasses_id = $_GET['schoolasses_id'];
    $sql = "SELECT * FROM schoolhealthasses WHERE schoolasses_id='$schoolasses_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $schoolasses_id = $row['schoolasses_id'];
    ?>
                 <form class="form-horizontal mt-4" method="post" action="function/collegerecords.php">
                
<div class="container">
<div class="form-container">
    <div class="form-title">
        Edit School Health Assessment Record
    </div>

    <div class="row">
                      
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="idnumber" class="col-sm-4 control-label">Enter the ID Number</label>
                                  <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="patient_name" class="col-sm-4 control-label">Enter the Fullname</label>
                                  <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>">
                          </div>
                      </div>
                  </div>
                  
                  <div class="row">
                  
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="birthday" class="col-sm-4 control-label">Birthday</label>
                                  <input type="date" class="form-control" id="birthday" name="birthday" value="<?=$row['birthday'];?>">
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label for="fullname">Gender</label>
                                  <select class="form-select" name="gender">
                                      <option value="" <?php if(empty($row['gender'])) echo "selected"; ?>>Select Gender</option>
                                      <option value="Female" <?php if($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                                      <option value="Male" <?php if($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                                  </select>
                  </div>
                      </div>
                  
                  </div>
                  
                  <p class="sched"><b>A. PHYSICAL EXAMINATION</p></b>
                  <div class="row">
                  
                  <div class="col-md-2">
                        <div class="form-group">
                          <label for="date">Date</label>
                          <input type="date" class="form-control" id="date" name="date" value="<?=$row['date'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="weight">Weight</label>
                          <input type="text" class="form-control" id="weight" name="weight" value="<?=$row['weight'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="height">Height (in cm)</label>
                          <input type="text" class="form-control" id="height" name="height" value="<?=$row['height'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="bmi">BMI</label>
                          <input type="text" class="form-control" id="bmi" name="bmi" value="<?=$row['bmi'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="pr">Pulse Rate</label>
                          <input type="text" class="form-control" id="pr" name="pr" value="<?=$row['pr'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="bp">Blood Pressure</label>
                          <input type="text" class="form-control" id="bp" name="bp" value="<?=$row['bp'];?>">
                        </div>
                      </div>
                  
                    </div>             
                  
                    <div class="row">
                  
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="scalp">Scalp</label>
                          <input type="text" class="form-control" id="scalp" name="scalp" value="<?=$row['scalp'];?>">
                        </div>
                     </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="skin_nails">Skin & Nails</label>
                          <input type="text" class="form-control" id="skin_nails" name="skin_nails" value="<?=$row['skin_nails'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="eyes">Eyes</label>
                          <input type="text" class="form-control" id="eyes" name="eyes" value="<?=$row['eyes'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="visual_acuity">Visual Acuity</label>
                          <input type="text" class="form-control" id="visual_acuity" name="visual_acuity" value="<?=$row['visual_acuity'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="ears">Ears</label>
                          <input type="text" class="form-control" id="ears" name="ears" value="<?=$row['ears'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="hearing_test">Hearing Test</label>
                          <input type="text" class="form-control" id="hearing_test" name="hearing_test" value="<?=$row['hearing_test'];?>">
                        </div>
                      </div>
                  
                    </div>
                  
                    <div class="row">
                  
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="nose">Nose</label>
                          <input type="text" class="form-control" id="nose" name="nose" value="<?=$row['nose'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="throat">Throat</label>
                          <input type="text" class="form-control" id="throat" name="throat" value="<?=$row['throat'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="mouth_tongue">Mouth & Tongue</label>
                          <input type="text" class="form-control" id="mouth_tongue" name="mouth_tongue" value="<?=$row['mouth_tongue'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="teeth_gums">Teeth & Gums</label>
                          <input type="text" class="form-control" id="teeth_gums" name="teeth_gums" value="<?=$row['teeth_gums'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="chest_breasts">Chest & Breasts</label>
                          <input type="text" class="form-control" id="chest_breasts" name="chest_breasts" value="<?=$row['chest_breasts'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="heart">Heart</label>
                          <input type="text" class="form-control" id="heart" name="heart" value="<?=$row['heart'];?>">
                        </div>
                      </div>
                  
                    </div>
                  
                    <div class="row">
                  
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="lungs">Lungs</label>
                          <input type="text" class="form-control" id="lungs" name="lungs" value="<?=$row['lungs'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="abdomen">Abdomen</label>
                          <input type="text" class="form-control" id="abdomen" name="abdomen" value="<?=$row['abdomen'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="genitalia">Genitalia</label>
                          <input type="text" class="form-control" id="genitalia" name="genitalia" value="<?=$row['genitalia'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="spine_extremities">Spine/Extremities</label>
                          <input type="text" class="form-control" id="spine_extremities" name="spine_extremities" value="<?=$row['spine_extremities'];?>">
                        </div>
                      </div>
                  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="sexual">Sexual Maturity Rating</label>
                          <input type="text" class="form-control" id="sexual" name="sexual" value="<?=$row['sexual'];?>">
                        </div>
                      </div>
                  
                    </div>
                    <hr>
                  
                    <div class="row">
                  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="screening">Screening, Risk Taking Behavior</label>
                          <input type="text" class="form-control" id="screening" name="screening" value="<?=$row['screening'];?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="otherfindings">Other Findings</label>
                          <input type="text" class="form-control" id="otherfindings" name="otherfindings" value="<?=$row['otherfindings'];?>">
                        </div>
                      </div>
                  
                    </div>
                  
                    <div class="row">
                  
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="remarks">Remarks</label>
                          <input type="text" class="form-control" id="remarks" name="remarks" value="<?=$row['remarks'];?>">
                        </div>
                      </div>
                  
                    </div>
                  
                    <div class="row">
                       <div class="col-sm-12">
                       <input type="hidden" name="schoolasses_id" value="<?php echo $schoolasses_id; ?>">
                                     <input type="submit" name="update_schoolhealthassessrecord" value="Update">
                       </div>
                     </div>
                   </form>
                    <?php
                  
                      }
                  
                      ?>

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

