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
    <title>Edit Physical Examination Record</title>
    
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
$sql = "SELECT * FROM physicalexaminationshs";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $age = $row['age'];
  $gradesection = $row['gradesection'];
  $sex = $row['sex'];
  $pastsurgeries = $row['pastsurgeries'];
  $allergies = $row['allergies'];
  $familyhistory = $row['familyhistory'];
  $bp = $row['bp'];
  $pr = $row['pr'];
  $height = $row['height'];
  $weight = $row['weight'];
  $heent = $row['heent'];
  $cvs = $row['cvs'];
  $gis = $row['gis'];
  $gus = $row['gus'];
  $skin = $row['skin'];
  $musculoskeletal = $row['musculoskeletal'];
  $remarks = $row['remarks'];
  $medicalexaminer = $row['medicalexaminer'];
  $dateexamined = $row['dateexamined'];
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
				        </div><!--//row-->
				    </div><!--//app-card-header-->
                    <div class="app-card-body p-4">
                   

                    <?php  	
    $peshs_id = $_GET['peshs_id'];
    $sql = "SELECT * FROM physicalexaminationshs WHERE peshs_id='$peshs_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $peshs_id = $row['peshs_id'];
    ?>
                   <form class="form-horizontal mt-4" method="post" action="function/physicianrecordsgsjhsshs.php">
                  
<div class="container">
  <div class="form-container">

    <div class="form-title">
      Edit Physical Examination Record
    </div>

<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label">Patient ID Number</label>
      <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="fullname" class="col-sm-12 control-label">Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>">
    </div>
  </div>
  <div class="col-sm-1">
    <div class="form-group">
      <label for="age" class="col-sm-12 control-label">Age</label>
      <input type="text" class="form-control" id="age" name="age" value="<?=$row['age'];?>">
    </div>
  </div>
  <div class="col-sm-2">
  <div class="form-group">
  <label for="fullname">Grade & Section</label>
                                  <select class="form-select" name="gradesection">
                                      <option value="" <?php if(empty($row['gradesection'])) echo "selected"; ?>>Select Grade & Section</option>
                                      <option value="Grade 11" <?php if($row['gradesection'] == "Grade 11") echo "selected"; ?>>Grade 11</option>
                                      <option value="Grade 12" <?php if($row['gradesection'] == "Grade 12") echo "selected"; ?>>Grade 12</option>
                                  </select>
                         </div>
                       </div>
     <div class="col-sm-2">
  <div class="form-group">
  <label for="fullname">Sex</label>
                                  <select class="form-select" name="sex">
                                      <option value="" <?php if(empty($row['sex'])) echo "selected"; ?>>Select Sex</option>
                                      <option value="Female" <?php if($row['sex'] == "Female") echo "selected"; ?>>Female</option>
                                      <option value="Male" <?php if($row['sex'] == "Male") echo "selected"; ?>>Male</option>
                                  </select>
    </div>
  </div>

</div>

   <b><i> <p class="sched">Significant Medical History:</b></i></p>

   <div class="row">
  <div class="col-sm-12">
                         <div class="form-group">
                           <label for="pastsurgeries" class="col-sm-12 control-label">Past Illnesses/Surgeries</label>
                           <input type="text" id="pastsurgeries" name="pastsurgeries" class="form-control" value="<?=$row['pastsurgeries'];?>">
                         </div>
                       </div>
                  </div>
<div class="row">
  <div class="col-sm-12">
                         <div class="form-group">
                           <label for="allergies" class="col-sm-12 control-label">Allergies</label>
                           <input type="text" id="allergies" name="allergies" class="form-control" value="<?=$row['allergies'];?>">
                         </div>
                       </div>
                  </div>
<div class="row">
  <div class="col-sm-12">
                         <div class="form-group">
                           <label for="familyhistory" class="col-sm-12 control-label">Family History</label>
                           <input type="text" id="familyhistory" name="familyhistory" class="form-control" value="<?=$row['familyhistory'];?>">
                         </div>
                       </div>
                  </div>

   <b><i> <p class="sched">Physical Examination:</b></i></p>

   <div class="row">

    <div class="col-sm-3">
        <div class="form-group">
            <label for="height" class="col-sm-10 control-label">Height</label>
                <input type="text" class="form-control" id="height" name="height" value="<?=$row['height'];?>">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="weight" class="col-sm-10 control-label">Weight</label>
                <input type="text" class="form-control" id="weight" name="weight" value="<?=$row['weight'];?>">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="bp" class="col-sm-10 control-label">BP</label>
                <input type="text" class="form-control" id="bp" name="bp" value="<?=$row['bp'];?>">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="pr" class="col-sm-10 control-label">PR</label>
                <input type="text" class="form-control" id="pr" name="pr" value="<?=$row['pr'];?>">
        </div>
    </div>

</div>

   <b><i> <p class="sched">General Appearance:</b></i></p>

   <div class="row">
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="heent" class="col-sm-12 control-label">HEENT</label>
                           <input type="text" id="heent" name="heent" class="form-control" value="<?=$row['heent'];?>">
                         </div>
                       </div>
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="cvs" class="col-sm-12 control-label">CVS</label>
                           <input type="text" id="cvs" name="cvs" class="form-control" value="<?=$row['cvs'];?>">
                         </div>
                       </div>
                  </div>
<div class="row">
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="gis" class="col-sm-12 control-label">GIS</label>
                           <input type="text" id="gis" name="gis" class="form-control" value="<?=$row['gis'];?>">
                         </div>
                       </div>
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="gus" class="col-sm-12 control-label">GUS</label>
                           <input type="text" id="gus" name="gus" class="form-control" value="<?=$row['gus'];?>">
                         </div>
                       </div>
                  </div>

<div class="row">
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="skin" class="col-sm-12 control-label">Skin</label>
                           <input type="text" id="skin" name="skin" class="form-control" value="<?=$row['skin'];?>">
                         </div>
                       </div>
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="musculoskeletal" class="col-sm-12 control-label">Musculoskeletal</label>
                           <input type="text" id="musculoskeletal" name="musculoskeletal" class="form-control" value="<?=$row['musculoskeletal'];?>">
                         </div>
                       </div>
                  </div>

                  <hr>

<div class="row">
  <div class="col-sm-6">
                         <div class="form-group">
                           <label for="medicalexaminer" class="col-sm-12 control-label">Medical Examiner</label>
                           <input type="text" id="medicalexaminer" name="medicalexaminer" class="form-control" value="<?=$row['medicalexaminer'];?>">
                         </div>
                       </div>
 <div class="col-sm-6">
                         <div class="form-group">
                           <label for="dateexamined" class="col-sm-12 control-label">Date Examined</label>
                           <input type="date" id="dateexamined" name="dateexamined" class="form-control" value="<?=$row['dateexamined'];?>">
                         </div>
                       </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">
                         <div class="form-group">
                           <label for="remarks" class="col-sm-12 control-label"><b>Remarks</b></label>
                           <input type="text" id="remarks" name="remarks" class="form-control" value="<?=$row['remarks'];?>">
                         </div>
                       </div>
                  </div>

                     <div class="row">
                       <div class="col-sm-12 text-left">
                       <input type="hidden" name="peshs_id" value="<?php echo $peshs_id;?>">
                    <input type="submit" name="update_physicalexamshsrecord" value="Update">
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

