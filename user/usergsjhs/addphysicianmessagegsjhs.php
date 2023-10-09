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
        $idnumber = $row['idnumber'];
        $fullname = $row['fullname'];
        $gradelevel = $row['gradelevel'];
        $role = $row['role'];
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
    <title>Request Physician Consultation Schedule</title>
    
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
				    <div class="app-card-header"> <!-- Remove py and px-->
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

<div class="container">
    <div class="form-container" style="margin-left: 10px;">
        <div class="form-title">
            Request Physician Consultation Schedule
        </div>

        <p><b>PHYSICIAN is only available every WEDNESDAY. Please wait for a message for approval of your physician consultation request appointment.</p></b>

<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">

<div class="row" style="margin-left:auto">

        <div class="col-sm-3">
            <div class="form-group">
                <label for="idnumber" class="control-label">Enter your ID Number</label>
                <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?= $idnumber; ?>" readonly>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="patient_name" class="control-label">Enter your Fullname</label>
                <input type="text" class="form-control" id="name" name="fullname" value="<?= $fullname; ?>" readonly>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="gradelevel" class="control-label">Grade & Section</label>
                <input type="text" class="form-control" id="gradelevel" name="gradelevel" value="<?= $gradelevel; ?>" readonly>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="phoneno" class="control-label">Phone Number</label>
                <input id="personalContactInput" name="phoneno" type="text" placeholder="+63" class="form-control contactInput">
                <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
            </div>
        </div>

<script>
    const personalContactInput = document.getElementById('personalContactInput');
    const personalContactError = document.getElementById('personalContactError');

    personalContactInput.addEventListener('input', function() {
        let inputValue = personalContactInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            personalContactInput.value = inputValue;
            personalContactError.style.display = 'none'; // Hide the error message
        } else {
            personalContactInput.value = ''; // Clear the input if it's invalid
            personalContactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>

</div>
<br>

 <div class="row" style="margin-left:auto">

    <div class="col-sm-4">
        <div class="form-group">
            <label for="datetime" class="control-label">Schedule</label>
                <input type="text" class="form-control no-color-change" id="selected-date" name="date_time" placeholder="Choose Date in the Calendar" readonly>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="newInput" class="control-label">Time</label>
                <input type="text" class="form-control no-color-change" id="sched_time" name="sched_time" placeholder="Select Time" readonly>
        </div>
    </div>


    <div class="col-sm-3">
    <div class="form-group">
        <label for="role" class="control-label">Role</label>
        <select class="form-control" id="role" name="role">
            <option value="Student in GS/JHS" <?php if ($role === "Student in GS/JHS") echo "selected"; ?>>Student</option>
            <option value="Employee in GS/JHS" <?php if ($role === "Employee in GS/JHS") echo "selected"; ?>>Employee</option>
        </select>
    </div>
</div>
</div>

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



    /* Calendar container */
#calendar {
  font-family: Arial, sans-serif;
  width: 300px;
  margin: 0 auto;
}

/* Calendar header */
#calendar .header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px 0;
}

/* Previous and Next month links */
#calendar .prev,
#calendar .next {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
  font-size: 18px;
}

/* Calendar title */
#calendar .title {
  font-size: 20px;
}

/* Calendar labels (Mon, Tue, etc.) */
#calendar .label {
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #eee;
  text-align: center;
}

#calendar .label li {
  display: inline-block;
  width: 14.285%;
  padding: 10px 0;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  box-sizing: border-box;
}

/* Calendar dates */
#calendar .dates {
  list-style: none;
  padding: 0;
  margin: 0;
}

#calendar .dates li {
  display: inline-block;
  width: 14.285%;
  padding: 10px 0;
  text-align: center;
  box-sizing: border-box;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
}

/* Highlighted start and end days */
#calendar .start {
  background-color: #337ab7;
  color: #fff;
}

#calendar .end {
  background-color: #337ab7;
  color: #fff;
}

/* Today's date */
#calendar .today {
  background-color: #5bc0de;
  color: #fff;
}

/* Disabled days */
#calendar .mask {
  color: #ccc;
}

</style>
<?php
    $week = [
        "monday" => [],
        "tuesday"=> [],
        "wednesday"=> [],
        "thursday"=> [],
        "friday"=> [],
    ];

    foreach(["09:00AM", "10:00AM", "11:00AM"] as $time){
        if($time != "Unavailable"){
           
            array_push($week["wednesday"], str_replace('.', '', str_replace(' ', '', $time)));
        }
    }
?>

<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/calendar.php";
?>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_physician" class="btn btn-success">Send Physician Appointment</button>
    </div>
</div>
</form>

    </div>
    </div>


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

