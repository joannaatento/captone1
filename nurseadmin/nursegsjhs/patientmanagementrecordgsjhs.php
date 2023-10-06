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
    <title>Patient Management Record</title>
    
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
					   
                     <form class="form-horizontal mt-4" method="post" action="function/gsjhsrecords.php">

                     <div class="container">
  <div class="form-container">

    <div class="form-title">
      Patient Management Record
    </div>

<div class="row">

    <div class="col-sm-3">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label">Enter the ID Number</label>
            <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label">Enter the Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter the Fullname" required>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="gradecsection" class="col-sm-12 control-label">Grade & Section</label>
            <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter Grade & Section" required>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="vitalsigns" class="col-sm-12 control-label">Vital Signs</label>
                <input type="text" class="form-control" id="vitalsigns" name="vitalsigns" placeholder="Enter Vital Signs" required>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <br>
            <label for="diagnosis" class="control-label">Diagnosis/Chief Complaints, Management & Treatment</label>
            <input type="text" class="form-control" id="diagnosis" name="diagnosis" placeholder="Diagnosis/Chief Complaints">
        </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
            <br>
            <label for="diagnosis" class="control-label">Status</label>
            <input type="text" class="form-control" id="diagnosis" name="status" placeholder="Status">
        </div>
    </div>

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
        <button name="submit_patientmngmt" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<form class="form-horizontal mt-4" method="post" action="function/gsjhsrecords.php">
   
<div class="row">

    <div class="col-sm-4">
        <div class="form-group">
            <label for="medicine_name" class="col-sm-4 control-label">Treatment/Medicine</label>
            <input type="text" class="form-control" id="medicine_name " name="medicine_name" placeholder="Enter Treatment/Medicine" required>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="amount" class="col-sm-4 control-label">Quantity</label>
            <input type="text" class="form-control" id="amount " name="quantity" placeholder="Enter Quantity" required>
        </div>
    </div>                            

</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="text" name="role" style="display: none;" value="<?= $_SESSION['role'];?>">
        <button name="submit_medicine" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<style> 

.app-search-form .search-btn {
    padding: 0.7rem 1rem;
  
}
td {
    text-align: left; 
}

thead{
    background-color: #2E37A4;
    color: #fff;
}



</style>
<div class="app-card-header p-4 pb-2 border-0">
  <div class="app-search-box col">
    <form class="app-search-form" onsubmit="event.preventDefault(); searchRecords();">
      <input type="text" placeholder="Search..." name="query" id="searchQuery" class="form-control search-input">
      <button type="submit" class="btn search-btn btn-primary"><i class="fas fa-search"></i></button>
    </form>
  </div>
</div>
<div class="app-card-body p-4">
    <div id="healthRecordTable" style="max-height: 400px; overflow-y: auto;">
    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Grade & Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
        <?php
$sql = "SELECT * FROM patientrecord WHERE is_deleted_on_website = 0 ORDER BY date_time";

            $result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) {
                $p_id = $row['p_id'];
            ?>
                <tr>
                    <!-- Table data cells for each record -->
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['gradesection']; ?></td>
                    <td>
                        <center>
                <a href="editpatientrecord.php?p_id=<?php echo $p_id; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>  
            <a href="function/gsjhsrecords.php?p_id=<?php echo $row['p_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
        </svg>
    </a>


</center>
          </td>
        </tr>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>
    <style>
        /* Style the table */
table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}


/* Style table rows alternately */
tr:nth-child(even) {
    background-color: #fff; /* Change background color to white */
}

/* Style table cells */
td {
    padding: 10px;
    border: 1px solid #ddd;
}
th{
    padding: 10px;
}

/* Style table cell links on hover */
td a:hover {
    text-decoration: underline;
}

    </style>
</div>
				    </div><!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  						
    <!-- Javascript -->      
    
    <style> 
    .btn-submit { 
    background-color: #2E37A4;
    color: #fff;
    padding: 6px 12px;
    font-size: 14px;

    }

    .btn-submit:hover { 
    background-color: #28308f;
    color: #fff;
   
    }
</style>

<script>
function searchRecords() {
  var searchQuery = document.getElementById("searchQuery").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("healthRecordTableBody").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "function/searchqueryforgsjhspatientrecord.php?query=" + searchQuery, true);
  xhttp.send();
}
</script>

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

