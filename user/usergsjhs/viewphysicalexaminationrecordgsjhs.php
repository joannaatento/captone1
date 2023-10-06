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
        $idnumber = $row['idnumber'];
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
    <title>View Physical Examination Record</title>
    
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
    

    <style>
       .form-group input,
        .form-group select,
        .form-group textarea{
            border: 2px solid #afbdcf !important; /* Change the border color and style as needed */
            border-radius: 5px; /* Add rounded corners */
            padding: 5px; /* Add some padding to improve appearance */
        }

        .form-group input:not([readonly]):hover,
        .form-group textarea:not([readonly]):hover{
            border-color: blue !important; /* Change the border color on hover */
            background-color: transparent !important;
        }
        
        .form-group select:not([readonly]):hover {
            border-color: blue !important; /* Change the border color on hover */      
          }

        .form-group input[readonly]:hover,
        .form-group select[readonly]:hover,
        .form-group textarea[readonly]:hover
    {
            background-color: transparent !important;
            border-color: #c6c6d9 !important;
        }

       .form-group input[readonly]:focus,
        .form-group select[readonly]:focus,
        .form-group textarea[readonly]:focus  {
            background-color: transparent !important;
        }

        .form-group input:not([readonly]):focus,
        .form-group select:not([readonly]):focus,
        .form-group textarea:not([readonly]):focus {
            background-color: transparent !important;
        }
        /* Define custom styles here */
        .form-container {
            background-color: #fff;
            box-shadow: 4px 4px 4px 4px rgba(76, 84, 177, 0.5);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .form-title {
            text-align: center;
            color: #4c54b1;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #000 !important;
        }

        input.form-control {
            border: 3px solid #4e5864;
            background-color: #fff !important;
            padding: 10px;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }

        input.form-control:hover {
            background-color: #e0e0e0 !important;
            border-color: #4e5864 !important;
        }
        input.form-control:focus{
            background-color: #e0e0e0 !important;
        }
        .sched{
            color: #800000;
            font-size: 17px !important;
        }
        select{
          background-color: transparent !important;
          border: 3px solid #4e5864 !important;
        }
        select:hover{
          border: 1px solid #4e5864 !important;
          background-color: #e0e0e0 !important;
          border-color: #4e5864 !important;
        }
    </style>


</head> 

<body class="app">   	

<?php  	
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
							$sql = "SELECT * FROM physicalexaminationgsjhs WHERE idnumber = '$idnumber'";
							$result = $conn->query($sql);
    						while($row = $result->fetch_array()){
						?>
           
<div class="container">
  <div class="form-container">

    <div class="form-title">
      Physical Examination Records
    </div>

    <div class="row">

    <div class="col-sm-6">
        <div class="form-group">
          <label for="fullname" class="control-label">Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$row['fullname'];?>" readonly>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="idnumber" class="control-label">ID Number</label>
          <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>" readonly>
        </div>
      </div>
      
      <div class="col-sm-3">
        <div class="form-group">
          <label for="age" class="control-label">Age</label>
          <input type="text" class="form-control" id="age" name="age" value="<?=$row['age'];?>" readonly>
        </div>
      </div>
      
    </div>
<div class="row">

<div class="col-sm-5">
    <div class="form-group">
      <label for="levelsection" class="control-label">Level/Section</label>
      <input type="text" id="levelsection" name="levelsection" class="form-control" value="<?=$row['levelsection'];?>" readonly>
    </div>
   </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="fullname" class="control-label">Sex</label>
      <select class="form-control" name="sex" readonly>
        <option disabled selected><?= $row['sex'];?></option>
      </select>
    </div>
  </div>

</div>
<hr>
  <b><i> <p class="sched">Significant Medical History:</b></i></p>

  <div class="row">

    <div class="col-sm-4">
      <div class="form-group">
        <label for="pastsurgeries" class="control-label">Past Illnesses/Surgeries</label>
        <input type="text" id="pastsurgeries" name="pastsurgeries" class="form-control" value="<?=$row['pastsurgeries'];?>" readonly>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
        <label for="allergies" class="control-label">Allergies</label>
        <input type="text" id="allergies" name="allergies" class="form-control" value="<?=$row['allergies'];?>" readonly>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
        <label for="familyhistory" class="control-label">Family History</label>
        <input type="text" id="familyhistory" name="familyhistory" class="form-control" value="<?=$row['familyhistory'];?>" readonly>
      </div>
    </div>

  </div>

  <b><i><p class="sched">Physical Examination:</b></i></p>

<div class="row">

  <div class="col-sm-3">
    <div class="form-group">
      <label for="bmi" class="control-label">BMI</label>
      <input type="text" class="form-control" id="bmi" name="bmi" value="<?=$row['bmi'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group">
      <label for="bp" class="control-label">BP</label>
      <input type="text" class="form-control" id="bp" name="bp" value="<?=$row['bp'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="pr" class="control-label">PR</label>
      <input type="text" class="form-control" id="pr" name="pr" value="<?=$row['pr'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="height" class="control-label">Height</label>
      <input type="text" class="form-control" id="height" name="height" value="<?=$row['height'];?>" readonly>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="weight" class="control-label">Weight</label>
      <input type="text" class="form-control" id="weight" name="weight" value="<?=$row['weight'];?>" readonly>
    </div>
  </div>
  
</div>

<b><i><p class="sched">General Appearance:</b></i></p>

<div class="row">

  <div class="col-sm-6">
    <div class="form-group">
      <label for="heent" class="control-label">HEENT</label>
      <input type="text" id="heent" name="heent" class="form-control" value="<?=$row['heent'];?>" readonly>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="cvs" class="control-label">CVS</label>
      <input type="text" id="cvs" name="cvs" class="form-control"value="<?=$row['cvs'];?>" readonly>
    </div>
  </div>
                  
</div>

<div class="row">

  <div class="col-sm-6">
    <div class="form-group">
      <label for="gis" class="control-label">GIS</label>
      <input type="text" id="gis" name="gis" class="form-control" value="<?=$row['gis'];?>" readonly>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="gus" class="control-label">GUS</label>
      <input type="text" id="gus" name="gus" class="form-control" value="<?=$row['gus'];?>" readonly>
    </div>
  </div>

</div>

<div class="row">

  <div class="col-sm-6">
    <div class="form-group">
      <label for="extremities" class="control-label">Extremities</label>
      <input type="text" id="extremities" name="extremities" class="form-control" value="<?=$row['extremities'];?>" readonly>
    </div>
  </div>

</div>
<hr>



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

<div class="row">

  <div class="col-sm-6">
    <div class="form-group">
      <label for="remarks" class="control-label" style="color: #800000 !important;"><b>Remarks</b></label>
      <input type="text" id="remarks" name="remarks" class="form-control" value="<?=$row['remarks'];?>" readonly>
    </div>
  </div>
                  
</div>
  
  </div>
</div>  
                  <?php } ?>

                
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

