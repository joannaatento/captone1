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
        if($_SESSION['leveleduc'] == 2){
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
    <title>View Weight Monitoring Record</title>
    
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

        
.row > .col-sm-1 > .form-group input,
        .row > .col-sm-1 > .form-group select,
        .row > .col-sm-4 > .form-group input,
        .row > .col-sm-4 > .form-group select,
.row > .col-sm-5 > .form-group input,
        .row > .col-sm-5 > .form-group select,
.row > .col-md-4 > .form-group input,
        .row > .col-md-4 > .form-group select,
.row > .col-md-2 > .form-group input,
        .row > .col-md-2 > .form-group select,
.row > .col-sm-2 > .form-group input,
        .row > .col-sm-2 > .form-group select,
.row > .col-sm-3 > .form-group input,
        .row > .col-sm-3 > .form-group select {
            border: 2px solid #afbdcf !important; /* Change the border color and style as needed */
            border-radius: 5px; /* Add rounded corners */
            padding: 5px; /* Add some padding to improve appearance */
        }

        .row > .col-sm-1 > .form-group input:not([readonly]):hover,
        .row > .col-sm-4 > .form-group input:not([readonly]):hover,
        .row > .col-sm-5 > .form-group input:not([readonly]):hover,
        .row > .col-md-4 > .form-group input:not([readonly]):hover,
        .row > .col-md-2 > .form-group input:not([readonly]):hover,
        .row > .col-sm-2 > .form-group input:not([readonly]):hover,
        .row > .col-sm-3 > .form-group input:not([readonly]):hover{
            border-color: blue !important; /* Change the border color on hover */
            background-color: transparent !important;
        }


        .row > .col-sm-1 > .form-group select:not([readonly]):hover,
        .row > .col-sm-4 > .form-group select:not([readonly]):hover,
        .row > .col-sm-5 > .form-group select:not([readonly]):hover,
        .row > .col-md-4 > .form-group select:not([readonly]):hover,
        .row > .col-md-2 > .form-group select:not([readonly]):hover,
        .row > .col-sm-2 > .form-group select:not([readonly]):hover,
        .row > .col-sm-3 > .form-group select:not([readonly]):hover {
            border-color: blue !important; /* Change the border color on hover */        }



            .row > .col-sm-1 > .form-group input[readonly]:hover,
        .row > .col-sm-1 > .form-group select[readonly]:hover,
        .row > .col-sm-4 > .form-group input[readonly]:hover,
        .row > .col-sm-4 > .form-group select[readonly]:hover,
 .row > .col-sm-5 > .form-group input[readonly]:hover,
        .row > .col-sm-5 > .form-group select[readonly]:hover,
            .row > .col-md-4 > .form-group input[readonly]:hover,
        .row > .col-md-4 > .form-group select[readonly]:hover,
            .row > .col-md-2 > .form-group input[readonly]:hover,
        .row > .col-md-2 > .form-group select[readonly]:hover,
            .row > .col-sm-2 > .form-group input[readonly]:hover,
        .row > .col-sm-2 > .form-group select[readonly]:hover,
        .row > .col-sm-3 > .form-group input[readonly]:hover,
        .row > .col-sm-3 > .form-group select[readonly]:hover {
            background-color: transparent !important;
            border-color: #c6c6d9 !important;
        }


        .row > .col-sm-1 > .form-group input[readonly]:focus,
        .row > .col-sm-1 > .form-group select[readonly]:focus,
        .row > .col-sm-4 > .form-group input[readonly]:focus,
        .row > .col-sm-4 > .form-group select[readonly]:focus,
        .row > .col-sm-5 > .form-group input[readonly]:focus,
        .row > .col-sm-5 > .form-group select[readonly]:focus,
        .row > .col-md-4 > .form-group input[readonly]:focus,
        .row > .col-md-4 > .form-group select[readonly]:focus,
        .row > .col-md-2 > .form-group input[readonly]:focus,
        .row > .col-md-2 > .form-group select[readonly]:focus,
        .row > .col-sm-2 > .form-group input[readonly]:focus,
        .row > .col-sm-2 > .form-group select[readonly]:focus,
        .row > .col-sm-3 > .form-group input[readonly]:focus,
        .row > .col-sm-3 > .form-group select[readonly]:focus {
            background-color: transparent !important;
        }

        .row > .col-sm-1 > .form-group input:not([readonly]):focus,
        .row > .col-sm-4 > .form-group input:not([readonly]):focus,
        .row > .col-sm-5 > .form-group input:not([readonly]):focus,
        .row > .col-md-4 > .form-group input:not([readonly]):focus,
        .row > .col-md-2 > .form-group input:not([readonly]):focus,
        .row > .col-sm-2 > .form-group input:not([readonly]):focus,
        .row > .col-sm-3 > .form-group input:not([readonly]):focus {
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
        /* Hide placeholder text on hover and focus */
        input.form-control:hover::placeholder,
        input.form-control:focus::placeholder {
            color: transparent !important;
        }
    </style>

</head> 

<body class="app">   	
<?php

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM weightmonitor WHERE idnumber= '$idnumber'";
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
                    </div><!--//row-->
                </div><!--//app-card-header-->

                <div class="app-card-body p-4">
                    <?php
                    $sql = "SELECT * FROM weightmonitor WHERE idnumber = '$idnumber'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_array()) {
                    ?>
                    <br>

<div class="container">
    <div class="form-container">
        <div class="form-title">
            Weight Monitoring Records
        </div>
        
        <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="fullname" class="control-label">Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" readonly>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="idnumber" class="control-label">ID Number</label>
                        <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $row['idnumber']; ?>" readonly>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="gradesection" class="col-sm-10 control-label" style="font-size: 16px">Grade & Section</label>
                        <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?php echo $row['gradesection']; ?>" readonly>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group">
                        <label for="age" class="control-label">Age</label>
                        <input type="age" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" readonly>
                    </div>
                </div>

                

                <div class="col-sm-2">
                    <div class="form-group">
                          <label for="weight" class="control-label">Weight (kg)</label>
                              <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" readonly>
                    </div>
                </div>

        </div>
            <hr>
            <div class="row">
                  
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="remarks" class="control-label">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $row['remarks']; ?>" readonly>
                    </div>
                </div>

            </div>

              <div class="form-group">
                            <span class="sched"><b>Date & Time:</b> <?php echo $row['date_time']; ?></span>
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

