<?php
    session_start();
    include '../../db.php';
    require '../../vendor/autoload.php';

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
    <title>Medical Appointments</title>
    
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
    <link rel="stylesheet" href="assets/tables.css">

</head> 

<body class="app">   	
<?php
$sql = "SELECT * FROM medicalapp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $gradelevel = $row['gradelevel'];
  $phoneno = $row['phoneno'];
  $date_time = $row['date_time'];
  $sched_time = $row['sched_time'];
  $role = $row['role'];
  $onoff  = $row['onoff'];
    }
 else {
 } 
?>
<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

<style> 
.styled-table thead tr {
   
    background-color: #2E37A4;

}

.btn-secondary {
    background-color: #2E37A4;
   
}

.btn:hover {
    background-color: #2E37A4;
}

.btn:active {
    background-color: #2E37A4;
}

.btn:disabled {
    background-color: #2E37A4;
}

.modal-body {
    justify-content: center;
    text-align: center;
    
}
 
.modal-btnn {
    width: 40%;
    margin-bottom: 10px;
}
td{
    white-space: nowrap;
    text-align: center;
}

</style>


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
						        <h4 class="notification-title mb-1">Medical Appointments</h4>
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

<div class="main-content">
    <table class="styled-table">

        <thead>
            <tr>
                <th>Number</th>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Grade & Section</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Role</th>
                <th>On or Off-campus Activity</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
        <?php
             $sql = "SELECT * FROM medicalapp WHERE (role = 'Student in GS/JHS' OR role = 'Employee in GS/JHS') AND is_deleted_on_website = 0 ORDER BY done_status ASC, date_time ASC, sched_time ASC";
            $result = mysqli_query($conn, $sql);

            while ($row = $result->fetch_assoc()) {
                $medicalapp_id = $row['medicalapp_id'];
                $phoneno = $row['phoneno'];
            ?>
                <tr>
                    <!-- Table data cells for each record -->
                    <td><?php echo $row['medicalapp_id']; ?></td>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['gradelevel']; ?></td>
                    <td><?php echo $row['phoneno']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['sched_time']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['onoff']; ?></td>
                    <td>
                        
    <center>
    <a href="#openModal<?= $medicalapp_id; ?>" class="modal-link" data-bs-toggle="modal" data-bs-target="#openModal<?= $medicalapp_id; ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                      <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                      </svg>
                       </a>
    <a href="editmedicals.php?medicalapp_id=<?php echo $medicalapp_id; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg>
    </a>
        
    <td>
  <center>
        <?php if ($row['done_status'] === 'Done') { ?>
            <!-- If done_status is 'Done', disable the button --><br>
            <p style="color: blue">Done</p>
        <?php } else { ?>
            <!-- If done_status is not 'Done', enable the button -->
            <a href="function/updated_status.php?medicalapp_id=<?php echo $row['medicalapp_id']; ?>&done_status=Done"
                onclick="return confirm('Are you sure you want to mark this record as done?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M13.78 3.22a.75.75 0 0 1 1.06 0l.97.97a.75.75 0 0 1 0 1.06l-7 7a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 1 1 1.06-1.06L7 10.94l6.72-6.72a.75.75 0 0 1 0-1.06z"/>
                </svg>
            </a>
        <?php } ?>
    </center>
</td>
                  </tr>
                  <div class="modal fade" id="openModal<?= $medicalapp_id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $medicalapp_id; ?>" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modalLabel<?= $medicalapp_id; ?>">Send Message</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                  <form action="" method="POST">
                      <div class="mb-3">
                          <label for="inputTo" class="form-label">To</label>
                          <input type="text" class="form-control" id="inputTo" name="phone" value="<?= $phoneno; ?>">  
                      </div>
                      <div class="mb-3">
                          <label for="messagesms" class="form-label">Message</label>
                          <textarea class="form-control" id="messagesms" name="message" rows="4">Good Day <?=$row['fullname'];?>! Your request for medical appointment is approved. Your schedule will be on <?= date('F j, Y', strtotime($row['date_time'])); ?> at <?= date('h:i A', strtotime($row['sched_time'])); ?>.</textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Send</button>
                      </div>
                      </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>
    <style>
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


/* Style table cell links on hover */
td a:hover {
    text-decoration: underline;
}

    </style>
</div>
    </div>
</div>

<?php
/**
 * Send an SMS message directly by calling the HTTP endpoint.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL, and phone number.
 *
 * Please find detailed information in the readme file.
 */
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone'];
    $message = $_POST['message'];
    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    // Send the SMS using the Infobip API
    $client = new Client([
        'base_uri' => "https://k3n5n1.api.infobip.com",
        'headers' => [
            'Authorization' => "App a1cc15ac73929724c9baa209623b92f0-b2637835-dbf5-4578-bf37-f9218d5072de",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]
    ]);

    $response = $client->request(
        'POST',
        'sms/2/text/advanced',
        [
            RequestOptions::JSON => [
                'messages' => [
                    [
                        'from' => 'Clinic DWCL',
                        'destinations' => [
                            ['to' => $phoneNumber]
                        ],
                        'text' => $message,
                    ]
                ]
            ],
        ]
    );

    // Prepare the SQL query
    $sql = "INSERT INTO sms_message (phone, message, date_created) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("sss", $phoneNumber, $message, $date_created);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    if ($response->getStatusCode() == 200) {
        echo '<script>alert("SMS sent successfully!");</script>';
    }
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

