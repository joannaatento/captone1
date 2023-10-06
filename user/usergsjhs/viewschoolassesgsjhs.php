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
    <title>View School Assessment Record</title>
    
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
	  <link rel="stylesheet" href="assets/style.css">

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
          </div><!--//row-->
				</div><!--//app-card-header-->
			<div class="app-card-body p-4">

      <?php
        $sql = "SELECT * FROM schoolhealthasses WHERE idnumber = '$idnumber'";
        $result = $conn->query($sql);
        while($row = $result->fetch_array()){
      ?>

<div class="container">
  <div class="form-container">
    <div class="form-title">
      School Health Assessment Records
    </div>
                        
      <div class="row">
                     
        <div class="col-sm-4">
          <div class="form-group">
            <label for="patient_name" class="control-label">Your Fullname</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" readonly>
          </div>
        </div>
      
        <div class="col-sm-3">
          <div class="form-group">
            <label for="idnumber" class="control-label">Your ID Number</label>
            <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $row['idnumber']; ?>" readonly>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label for="birthday" class="control-label">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>" readonly>
          </div>
        </div>
 

        <div class="col-sm-3">
          <div class="form-group">
            <label for="gender" class="control-label">Gender</label>
            <select class="form-control" id="gender" name="gender" readonly>
              <option disabled selected><?= $row['gender'];?></option>
            </select>
          </div>
        </div>

      </div>

      <p class="sched"><b><br>A. PHYSICAL EXAMINATION</p></b>

      <div class="row">

        <div class="col-md-2">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="height">Height(cm)</label>
            <input type="text" class="form-control" id="height" name="height" value="<?php echo $row['height']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="bmi">BMI</label>
            <input type="text" class="form-control" id="bmi" name="bmi" value="<?php echo $row['bmi']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="pr">Pulse Rate</label>
            <input type="text" class="form-control" id="pr" name="pr" value="<?php echo $row['pr']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="bp">Blood Pressure</label>
            <input type="text" class="form-control" id="bp" name="bp" value="<?php echo $row['bp']; ?>" readonly>
          </div>
        </div>

      </div>

      <br>


      <div class="row">

        <div class="col-md-2">
          <div class="form-group">
            <label for="scalp">Scalp</label>
            <input type="text" class="form-control" id="scalp" name="scalp" value="<?php echo $row['scalp']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="skin_nails">Skin & Nails</label>
            <input type="text" class="form-control" id="skin_nails" name="skin_nails" value="<?php echo $row['skin_nails']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="eyes">Eyes</label>
            <input type="text" class="form-control" id="eyes" name="eyes" value="<?php echo $row['eyes']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="visual_acuity">Visual Acuity</label>
            <input type="text" class="form-control" id="visual_acuity" name="visual_acuity" value="<?php echo $row['visual_acuity']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="ears">Ears</label>
            <input type="text" class="form-control" id="ears" name="ears" value="<?php echo $row['ears']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="hearing_test">Hearing Test</label>
            <input type="text" class="form-control" id="hearing_test" name="hearing_test" value="<?php echo $row['hearing_test']; ?>" readonly>
          </div>
        </div>

      </div>

      <br>
      <div class="row">

        <div class="col-md-2">
          <div class="form-group">
            <label for="nose">Nose</label>
            <input type="text" class="form-control" id="nose" name="nose" value="<?php echo $row['nose']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="throat">Throat</label>
            <input type="text" class="form-control" id="throat" name="throat" value="<?php echo $row['throat']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label class="font-minus" for="mouth_tongue">Mouth & Tongue</label>
            <style> 
          @media screen and (max-width: 1366px) {
               
                .font-minus {
                  font-size: 14px!important;
                }
            
          
          }
          </style>
            <input type="text" class="form-control" id="mouth_tongue" name="mouth_tongue" value="<?php echo $row['mouth_tongue']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="teeth_gums">Teeth & Gums</label>
            <input type="text" class="form-control" id="teeth_gums" name="teeth_gums" value="<?php echo $row['teeth_gums']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label class="font-minus" for="chest_breasts">Chest & Breasts</label>
            <input type="text" class="form-control" id="chest_breasts" name="chest_breasts" value="<?php echo $row['chest_breasts']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="heart">Heart</label>
            <input type="text" class="form-control" id="heart" name="heart" value="<?php echo $row['heart']; ?>" readonly>
          </div>
        </div>

      </div>

      <br>
      <div class="row">

        <div class="col-md-2">
          <div class="form-group">
            <label for="lungs">Lungs</label>
            <input type="text" class="form-control" id="lungs" name="lungs" value="<?php echo $row['lungs']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="abdomen">Abdomen</label>
            <input type="text" class="form-control" id="abdomen" name="abdomen" value="<?php echo $row['abdomen']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="genitalia">Genitalia</label>
            <input type="text" class="form-control" id="genitalia" name="genitalia" value="<?php echo $row['genitalia']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label for="spine_extremities" style="font-size: 15px">Spine/Extremities</label>
            <input type="text" class="form-control" id="spine_extremities" name="spine_extremities" value="<?php echo $row['spine_extremities']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="sexual">Sexual Maturity Rating</label>
            <input type="text" class="form-control" id="sexual" name="sexual" value="<?php echo $row['sexual']; ?>" readonly>
          </div>
        </div>

      </div>
      <br>

      <div class="row">

        <div class="col-md-4">
          <div class="form-group">
            <label for="screening">Screening, Risk Taking Behavior</label>
            <input type="text" class="form-control" id="screening" name="screening" value="<?php echo $row['screening']; ?>" readonly>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="otherfindings">Other Findings</label>
            <input type="text" class="form-control" id="otherfindings" name="otherfindings" value="<?php echo $row['otherfindings']; ?>" readonly>
          </div>
        </div>

      </div>
      <hr>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="remarks" style="color: #800000 !important;"><b>Remarks</b></label>
            <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $row['remarks']; ?>" readonly>
          </div>
        </div>

      </div>

  </div>
</div>
  
        <?php } ?>
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

