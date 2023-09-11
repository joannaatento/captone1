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
        if($_SESSION['role'] == 4){
            // User type 1 specific code here
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['report_type']) && isset($_POST['selected_year'])) {
                    $report_type = $_POST['report_type'];
                    $selected_year = $_POST['selected_year'];
            
                    $chartData = array();
            
                    switch ($report_type) {
                        case 'week':
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', WEEK(date_time)) AS label,
                            SUM(CASE WHEN role = 'student in gs/jhs' THEN 1 ELSE 0 END) AS total_student_gs_jhs,
                            SUM(CASE WHEN role = 'employee in gs/jhs' THEN 1 ELSE 0 END) AS total_employee_gs_jhs,
                            SUM(CASE WHEN role = 'student in shs' THEN 1 ELSE 0 END) AS total_student_shs,
                            SUM(CASE WHEN role = 'employee in shs' THEN 1 ELSE 0 END) AS total_employee_shs
                            FROM dentalapp
                            WHERE YEAR(date_time) = ?
                            GROUP BY label";                    
                            $report_label = 'Weekly';
                            break;
            
                        case 'month':
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', MONTHNAME(date_time)) AS label,
                            SUM(CASE WHEN role = 'student in gs/jhs' THEN 1 ELSE 0 END) AS total_student_gs_jhs,
                            SUM(CASE WHEN role = 'employee in gs/jhs' THEN 1 ELSE 0 END) AS total_employee_gs_jhs,
                            SUM(CASE WHEN role = 'student in shs' THEN 1 ELSE 0 END) AS total_student_shs,
                            SUM(CASE WHEN role = 'employee in shs' THEN 1 ELSE 0 END) AS total_employee_shs
                            FROM dentalapp
                            WHERE YEAR(date_time) = ?
                            GROUP BY label";         
                            $report_label = 'Monthly';
                            break;
            
                        case 'year':
                            $sql = "SELECT CONCAT(YEAR(date_time)) AS label,
                            SUM(CASE WHEN role = 'student in gs/jhs' THEN 1 ELSE 0 END) AS total_student_gs_jhs,
                            SUM(CASE WHEN role = 'employee in gs/jhs' THEN 1 ELSE 0 END) AS total_employee_gs_jhs,
                            SUM(CASE WHEN role = 'student in shs' THEN 1 ELSE 0 END) AS total_student_shs,
                            SUM(CASE WHEN role = 'employee in shs' THEN 1 ELSE 0 END) AS total_employee_shs
                            FROM dentalapp
                            WHERE YEAR(date_time) = ?
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
                        $chartData['total_student_gs_jhs'][] = $row->total_student_gs_jhs;
                        $chartData['total_employee_gs_jhs'][] = $row->total_employee_gs_jhs;
                        $chartData['total_student_shs'][] = $row->total_student_shs;
                        $chartData['total_employee_shs'][] = $row->total_employee_shs;
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
    <title>Nurse Dashboard</title>
    
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
   

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="dentistingsjhsshs.php" data-bs-target="#submenu-6" aria-controls="submenu-6">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Dental Appointment Reports</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle" href="dentalgsjhsshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Dental Approved Appointments</span>
    </a>
</li>
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
    <p>Total Dental Appointments Report</p>
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

                fetch("dentistingsjhsshs.php", {
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
                            label: "Total of Student in GS/JHS",
                            data: data.total_student_gs_jhs,
                            backgroundColor: "rgba(0, 0, 128, 0.5)", // You can change the color here
                        },
                        {
                            label: "Total of Employees in GS/JHS",
                            data: data.total_employee_gs_jhs,
                            backgroundColor: "rgba(139, 0, 0, 0.5)", // You can change the color here
                        },

                        {
                            label: "Total of Student in SHS",
                            data: data.total_student_shs,
                            backgroundColor: "rgba(255, 165, 0, 0.5)", // This sets the background color to orange with 50% opacity
                        },
                        {
                            label: "Total of Employees in SHS",
                            data: data.total_employee_shs,
                            backgroundColor: "rgba(0, 128, 0, 0.5)", // You can change the color here
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
                   printWindow.document.write('<td style="text-align: center; vertical-align: middle; font-size: 18px;"><b>HEALTH SERVICE UNIT - North Campus</b></td>');
                   
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
                   printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Students GS/JHS</th>');
                   printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Employees GS/JHS</th>');
                   printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Students SHS</th>');
                   printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Employees SHS</th>');
                   printWindow.document.write('</tr>');
                   
                       
                       // Get the data from the chart
                       const data = window.myChart.data;
                       
                       // Display data for each label
                       for (let i = 0; i < data.labels.length; i++) {
                           const label = data.labels[i];
                           const totalStudentsGSJHS = data.datasets[0].data[i];
                           const totalEmployeesGSJHS = data.datasets[1].data[i];
                           const totalStudentsSHS = data.datasets[2].data[i];
                           const totalEmployeesSHS = data.datasets[3].data[i];
                           
                   printWindow.document.write('<tr style="background-color: #f2f2f2; text-align: center;">');
                   printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + label + '</td>');
                   printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalStudentsGSJHS + '</td>');
                   printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalEmployeesGSJHS + '</td>');
                   printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalStudentsSHS + '</td>');
                   printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalEmployeesSHS + '</td>');
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

