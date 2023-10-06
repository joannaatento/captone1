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
    <title>School Health Assessment Form</title>
    
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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>


						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">School Health Assessment Form</h4>
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
                     <form class="form-horizontal mt-4" method="post" action="function/collegerecords.php">
                    
                    <div class="row">
                      
    <div class="col-sm-6">
        <div class="form-group">
            <label for="idnumber" class="col-sm-4 control-label" style="font-size: 16px">Enter the ID Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="patient_name" class="col-sm-4 control-label" style="font-size: 16px">Enter the Fullname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter the Fullname" required>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
<div class="col-sm-6">
        <div class="form-group">
            <label for="birthday" class="col-sm-4 control-label" style="font-size: 16px">Birthday</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required>
            </div>
        </div>
    </div>
 

    <div class="col-sm-6">
    <div class="form-group">
        <label for="gender" class="col-sm-4 control-label" style="font-size: 16px">Gender</label>
        <div class="col-sm-10">
            <select class="form-control" id="gender" name="gender" required>
                <option value="">--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>

<p><b><br>A. PHYSICAL EXAMINATION</p></b>
<div class="row">

<div class="col-md-2">
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="weight">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="height">Height (in cm)</label>
        <input type="text" class="form-control" id="height" name="height" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="bmi">BMI</label>
        <input type="text" class="form-control" id="bmi" name="bmi" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="pr">Pulse Rate</label>
        <input type="text" class="form-control" id="pr" name="pr" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="bp">Blood Pressure</label>
        <input type="text" class="form-control" id="bp" name="bp" required>
      </div>
    </div>


  <div class="row">

  <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="scalp">Scalp</label>
        <input type="text" class="form-control" id="scalp" name="scalp" required>
      </div>
   </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="skin_nails">Skin & Nails</label>
        <input type="text" class="form-control" id="skin_nails" name="skin_nails" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="eyes">Eyes</label>
        <input type="text" class="form-control" id="eyes" name="eyes" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="visual_acuity">Visual Acuity</label>
        <input type="text" class="form-control" id="visual_acuity" name="visual_acuity" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="ears">Ears</label>
        <input type="text" class="form-control" id="ears" name="ears" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="hearing_test">Hearing Test</label>
        <input type="text" class="form-control" id="hearing_test" name="hearing_test" required>
      </div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="nose">Nose</label>
        <input type="text" class="form-control" id="nose" name="nose" required>
      </div>
    </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="throat">Throat</label>
        <input type="text" class="form-control" id="throat" name="throat" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="mouth_tongue">Mouth & Tongue</label>
        <input type="text" class="form-control" id="mouth_tongue" name="mouth_tongue" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="teeth_gums">Teeth & Gums</label>
        <input type="text" class="form-control" id="teeth_gums" name="teeth_gums" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="chest_breasts">Chest & Breasts</label>
        <input type="text" class="form-control" id="chest_breasts" name="chest_breasts" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="heart">Heart</label>
        <input type="text" class="form-control" id="heart" name="heart" required>
      </div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="lungs">Lungs</label>
        <input type="text" class="form-control" id="lungs" name="lungs" required>
      </div>
    </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="abdomen">Abdomen</label>
        <input type="text" class="form-control" id="abdomen" name="abdomen" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="genitalia">Genitalia</label>
        <input type="text" class="form-control" id="genitalia" name="genitalia" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="spine_extremities">Spine/Extremities</label>
        <input type="text" class="form-control" id="spine_extremities" name="spine_extremities" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="sexual">Sexual Maturity Rating</label>
        <input type="text" class="form-control" id="sexual" name="sexual" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="screening">Screening, Risk Taking Behavior</label>
        <input type="text" class="form-control" id="screening" name="screening" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="otherfindings">Other Findings</label>
        <input type="text" class="form-control" id="otherfindings" name="otherfindings">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
    <br>
      <div class="form-group">
        <label for="remarks">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks" required>
      </div>
    </div>
  </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="role" style="display: none;" value="<?= $_SESSION['role'];?>">
        <button name="submit_schoolhealthassesform" class="btn btn-success">Submit</button>
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
                <th>Birthday</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
        <?php
$sql = "SELECT * FROM schoolhealthasses WHERE role = '3' AND is_deleted_on_website = 0 ORDER BY date";
$result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) {
                $schoolasses_id= $row['schoolasses_id'];
            ?>
                <tr>
                    <!-- Table data cells for each record -->
                    <td><?php echo $row['schoolasses_id']; ?></td>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['birthday']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td>
                        <center>
                <a href="editschoolassess.php?schoolasses_id=<?php echo $schoolasses_id; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>  
            <a href="function/collegerecords.php?schoolasses_id=<?php echo $row['schoolasses_id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">
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
				    </div><!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  				
    

    <style> 
    .btn-submit { 
    background-color: #2E37A4;
    color: #fff;
    padding: 6px 12px;
    font-size: 14px;

    }
    th{
    padding: 10px;
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
  xhttp.open("GET", "function/searchqueryforcollegeschoolassess.php?query=" + searchQuery, true);
  xhttp.send();
}
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

