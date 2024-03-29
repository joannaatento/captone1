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
        if($_SESSION['role'] == 3){
            // User type 1 specific code here
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['report_type']) && isset($_POST['selected_year'])) {
                    $report_type = $_POST['report_type'];
                    $selected_year = $_POST['selected_year'];
            
                    $chartData = array();
            
                    switch ($report_type) {
                        case 'week':
                            $sql = "SELECT CONCAT(YEAR(date), '-', WEEK(date)) AS label,
                                    COUNT(*) AS total_visitors
                                    FROM consultationformrecordcollege
                                    WHERE YEAR(date) = ?
                                    GROUP BY label";
                            $report_label = 'Weekly';
                            break;
            
                        case 'month':
                            $sql = "SELECT CONCAT(YEAR(date), '-', MONTHNAME(date)) AS label,
                                    COUNT(*) AS total_visitors
                                    FROM consultationformrecordcollege 
                                    WHERE YEAR(date) = ?
                                    GROUP BY label";
                            $report_label = 'Monthly';
                            break;
            
                        case 'year':
                            $sql = "SELECT CONCAT(YEAR(date)) AS label,
                                    COUNT(*) AS total_visitors
                                    FROM consultationformrecordcollege 
                                    WHERE YEAR(date) = ?
                                    GROUP BY label";
                            $report_label = 'Yearly';
                            break;
            
                        default:
                            echo "Invalid report type selection.";
                            exit;
                    }
            
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $selected_year);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    while ($row = $result->fetch_object()) {
                        $chartData['labels'][] = $row->label;
                        $chartData['total_visitors'][] = $row->total_visitors;
                    }
            
                    header("Content-Type: application/json");
                    echo json_encode($chartData);
                    exit;
                }
            }
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
    <title>Total of Visitors Getting Medicine</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/generate.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 

<body class="app">   	
<header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="app-utilities col-auto">		            
					<div class="app-utility-item app-user-dropdown dropdown">
				            <img src="assets/images/user.png">
				             <div class="app-utility-item app-user-dropdown dropdown">

                   <?php  if (isset($_SESSION['username'])) : ?>
                                    <p><?php echo $_SESSION['username']; ?></p>
                                    <?php endif ?></a>
                   </div>
				   <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="function/logout.php">Log Out</a></li>
							</ul>
			            </div>
		            </div>
		        </div>
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
				<div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app_logo">
					<img style="width: 150px; display:flex; margin-left: 50px; margin-top: 10px;" src="assets/images/dwcl.png" alt="logo">
		        </div>
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">

<li id="generate-link" class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                </svg>
            </span>
            <span class="nav-link-text">Report Generation</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-3" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link" href="totalappointments.php">Total Medical Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totaldentalappointments.php">Total Dental Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalphysicianappointments.php">Total Physician Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link active" href="totalvisitors.php">Total Clinic Visitors</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalmedicines.php">Total Medicine Consumed</a></li>
            </ul>
        </div>
    </li>

<li id="healthprofiles-link" class="nav-item has-submenu">
        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
            </span>
            <span class="nav-link-text">Health Profiles</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link" href="gsjhslists.php">Grade School and Junior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="shslist.php">Senior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="collegelists.php">College Building</a></li>
            </ul>
        </div>
    </li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle" href="medicalcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Medical Approved Appointments</span>
    </a>
</li>

    <li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle" href="consultationformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Consultation Form</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle" href="schoolhealthassessmentformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
            <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
            </svg>
        </span>
        <span class="nav-link-text">School Health Assessment Form</span>
    </a>
</li>

<li id="printable-link" class="nav-item has-submenu">
    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Printable Papers</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-8" class="collapse submenu submenu-8" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="healthprofilecollege.php">Health Profile</a></li>
        </ul>
    </div>
</li>
</ul>
	</nav>
	        </div>
	    </div>
    </header>

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
						        <h4 class="notification-title mb-1"></h4>
					        </div>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
                        
                    <form id="reportForm" method="POST">
                           <label for="report_type">Select Report Type:</label>
                           <select id="report_type" name="report_type">
                               <option value="week">Weekly</option>
                               <option value="month">Monthly</option>
                               <option value="year">Yearly</option>
                           </select>
                   
                           <label for="selected_year">Select Year:</label>
                           <select id="selected_year" name="selected_year">
                               <!-- For Years -->
                               <?php
                               $current_year = date("Y");
                               for ($year = $current_year; $year >= 2023; $year--) {
                                   echo "<option value='$year'>$year</option>";
                               }
                               ?>
                           </select>
                   
                           <!-- Buttons for Generate Report and Print Reports -->
                           <button type="button" id="generateReport">Generate Report</button>
                           <button type="button" id="printReport">Print Report</button>
                       </form>
    <br>
    <p>Total of Visitors Reports</p>
    <!-- Fixed-sized container for the graph -->
    <div class="chart-container">
                           <canvas id="barChart" width="2000" height="800" text-align="center"></canvas>
                       </div>
                   
                       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                       <script>
                           document.addEventListener("DOMContentLoaded", function () {
                               const generateButton = document.getElementById("generateReport");
                               const printButton = document.getElementById("printReport");
                   
                               generateButton.addEventListener("click", function () {
                                   fetchChartData();
                               });
                   
                               printButton.addEventListener("click", function () {
                                   printChart();
                               });

            function fetchChartData() {
                const form = document.getElementById("reportForm");
                const formData = new FormData(form);

                fetch("totalvisitors.php", {
                    method: "POST",
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    drawBarChart(data);
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
            }

            function drawBarChart(data) {
                const ctx = document.getElementById("barChart").getContext("2d");

                const chartData = {
                    labels: data.labels,
                    datasets: [
                        {
                            label: "Total of Visitors",
                            data: data.total_visitors,
                            backgroundColor: "rgba(0, 0, 128, 0.5)", // You can change the color here
                        },
                       
                    ],
                };
    const options = {
    responsive: true,
    scales: {
        x: {
            stacked: true,
        },
        y: {
            beginAtZero: true,
            stacked: true,
            ticks: {
                stepSize: 5,
                max: 80,
                callback: function (value, index, values) {
                    // Define the custom labels
                    const customLabels = ['0','5','10','15','20','25','30','35'];
                    return customLabels[index];
                },
            },
        },
    },
};

// Destroy the previous chart if it exists
const existingChart = window.myChart;
if (existingChart) {
    existingChart.destroy();
}

// Create a new chart instance
window.myChart = new Chart(ctx, {
    type: "bar",
    data: chartData,
    options: options,
});

            }

            function printChart() {
    const canvas = document.getElementById("barChart");
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
 // Create a table for alignment
  // Create a table for alignment and center it
  printWindow.document.write('<table style="margin: 0 auto;"><tr>');

// Add the logo image with center-aligned cell
printWindow.document.write('<td style="text-align: center;"><img src="assets/images/dwcl.png" alt="Logo" width="100" height="100"></td>');

// Add aligned text with center-aligned cell
printWindow.document.write('<td style="text-align: center; vertical-align: middle; font-size: 18px;"><b>HEALTH SERVICE UNIT - College Department</b></td>');

// Close the table and start the rest of the content
printWindow.document.write('</tr></table>');
    // Get the report type and label
    const reportType = document.getElementById("report_type").value;
    const reportLabel = reportType === 'week' ? 'Weekly' : (reportType === 'month' ? 'Monthly' : 'Yearly');
    
    // Display the report label with a custom font-size
    printWindow.document.write('<h1 style="font-size: 24px; text-align: center">' + reportLabel + ' Report</h1>');
    
    // Display the data table
    
printWindow.document.write('<table style="border-collapse: collapse; width: 100%; margin-top: 20px; border: 1px solid #000;">');
printWindow.document.write('<tr>');
printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">' + reportLabel + '</th>');
printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Clinic Visitors Getting Medicines</th>');
printWindow.document.write('</tr>');

    
    // Get the data from the chart
    const data = window.myChart.data;
    
    // Display data for each label
    for (let i = 0; i < data.labels.length; i++) {
        const label = data.labels[i];
        const totalVisitors = data.datasets[0].data[i];
        
printWindow.document.write('<tr style="background-color: #f2f2f2; text-align: center;">');
printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + label + '</td>');
printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalVisitors + '</td>');
printWindow.document.write('</tr>');

    }
    
    printWindow.document.write('</table>');
    printWindow.document.write('</body></html>');
    
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
}



            // Fetch and draw the chart when the page loads
            fetchChartData();
        });
    </script>
   
   <br><br>
    
    <?php
    $selected_years = isset($_POST['selected_years']) ? $_POST['selected_years'] : '2023';
    $report_types = isset($_POST['report_types']) ? $_POST['report_types'] : 'week';
    
    // Your database connection code here
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['report_types']) && isset($_POST['selected_years'])) {
            $report_types = $_POST['report_types'];
            $selected_years = $_POST['selected_years'];
        }
    }
    
    switch ($report_types) {
        case 'week':
            $sql = "SELECT CONCAT(YEAR(date), '-', WEEK(date)) AS label,
            fullname, 
            COUNT(fullname) AS fullname_count
            FROM consultationformrecordcollege
            WHERE YEAR(date) = ?
            GROUP BY label, fullname";
            $report_labels = 'Weekly';
            break;
    
        case 'month':
            $sql = "SELECT CONCAT(YEAR(date), '-', MONTHNAME(date)) AS label,
            fullname, 
            COUNT(fullname) AS fullname_count
            FROM consultationformrecordcollege
            WHERE YEAR(date) = ?
            GROUP BY label, fullname";
            $report_labels = 'Monthly';
            break;
    
    
        case 'year':
            $sql = "SELECT CONCAT(YEAR(date)) AS label,
           fullname, 
            COUNT(fullname) AS fullname_count
            FROM consultationformrecordcollege
            WHERE YEAR(date) = ?
            GROUP BY label, fullname";
            $report_labels = 'Yearly';
            break;
    
        default:
            echo "Invalid report type selection.";
            exit;
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selected_years);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <form class="clinic-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select id="tableSelect" name="report_types">
            <option value="week" <?php echo $report_types === 'week' ? 'selected' : ''; ?>>Weekly</option>
            <option value="month" <?php echo $report_types === 'month' ? 'selected' : ''; ?>>Monthly</option>
            <option value="year" <?php echo $report_types === 'year' ? 'selected' : ''; ?>>Yearly</option>
        </select>
    
        <label for="selected_years">Select Year:</label>
                               <select id="selected_years" name="selected_years">
                                   <!-- For Years -->
                                   <?php
                                   $current_year = date("Y");
                                   for ($year = $current_year; $year >= 2023; $year--) {
                                       echo "<option value='$year'>$year</option>";
                                   }
                                   ?>
                 </select>
    
        <button type="submit">Generate Report</button>
        <button id="printButton">Print Report</button>
    
    </form>
    
    <table class="clinic-table" id="clinicTable">
            <thead>
                <tr>
                    <th><?php echo $report_labels; ?></th>
                    <th>List of Students</th>
                    <th>Total of Visits in the Clinic</th>
                </tr>
            </thead>
            <tbody id="healthRecordTableBody">
                <?php while ($row = $result->fetch_object()): ?>
                    <tr>
                        <td><?php echo $row->label; ?></td>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->fullname_count; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    
    
        
        <script>
      document.getElementById("printButton").addEventListener("click", function () {
        var table = document.getElementById("clinicTable");
        var printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.open();
        
        printWindow.document.write('<table style="margin: 0 auto;"><tr>');
    
        // Create a div to hold the logo image with center-aligned cell
        printWindow.document.write('<td style="text-align: center;">');
        printWindow.document.write('<div style="text-align: center;"><img src="assets/images/dwcl.png" alt="Logo" width="100" height="100"></div>');
        printWindow.document.write('</td>');
    
        // Add another cell for the text beside the image
        printWindow.document.write('<td style="text-align: center;">');
        printWindow.document.write('<div style="text-align: center;"><b>HEALTH SERVICE UNIT - College Department</b></div>');
        printWindow.document.write('</td>');
    
        // Close the row and start a new row for your table content
        printWindow.document.write('</tr></table>');
    
        printWindow.document.write('<br><br>');
    // Create the table for your content
        printWindow.document.write('<style>');
        printWindow.document.write('table { margin: 0 auto; }');
        printWindow.document.write('tr.header { background-color: #f2f2f2; text-align: center; }');
        printWindow.document.write('table.special-table { border-collapse: collapse; width: 80%; max-width: 800px; border: 1px solid #ccc; }');
        printWindow.document.write('table.special-table th, table.special-table td { border: 2px solid #ccc; padding: 10px; text-align: left; }');
        printWindow.document.write('table.special-table th { background-color: #333; color: #fff; }');
        printWindow.document.write('</style>');
    
    // Create a row to hold your table
    printWindow.document.write('<tr>');
    printWindow.document.write('<td>' + table.outerHTML.replace('<table', '<table class="special-table"') + '</td>');
    printWindow.document.write('</tr>');
    
    
        // Close the HTML document
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        // Trigger the print dialog
        printWindow.print();
        printWindow.close();
      });
    </script>
        

    
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

<script>
    // Get the current URL
    const currentUrl = window.location.href;

    // Get references to the parent and sub-menu links
    const generateLink = document.getElementById('generate-link');
    const healthprofilesLink = document.getElementById('healthprofiles-link');
    const printableLink = document.getElementById('printable-link');
    const generateSubMenuLinks = generateLink.querySelectorAll('.submenu-link');
    const healthprofilesSubMenuLinks = healthprofilesLink.querySelectorAll('.submenu-link');
    const printableSubMenuLinks = printableLink.querySelectorAll('.submenu-link');

    // Check if the current URL matches any of the sub-menu links' href attributes
    generateSubMenuLinks.forEach(function(subMenuLink) {
        if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
            // Add the "active-link" class to the parent list item
            generateLink.classList.add('active-link');
            // Show the submenu by removing the "collapse" class
            const submenu = document.getElementById('submenu-3');
            submenu.classList.remove('collapse');
        }
    });

    healthprofilesSubMenuLinks.forEach(function(subMenuLink) {
        if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
            // Add the "active-link" class to the parent list item
            healthprofilesLink.classList.add('active-link');
            // Show the submenu by removing the "collapse" class
            const submenu = document.getElementById('submenu-1');
            submenu.classList.remove('collapse');
        }
    });

    printableSubMenuLinks.forEach(function(subMenuLink) {
        if (currentUrl.includes(subMenuLink.getAttribute('href'))) {
            // Add the "active-link" class to the parent list item
            printableLink.classList.add('active-link');
            // Show the submenu by removing the "collapse" class
            const submenu = document.getElementById('submenu-5');
            submenu.classList.remove('collapse');
        }
    });
</script>

</body>
</html> 

