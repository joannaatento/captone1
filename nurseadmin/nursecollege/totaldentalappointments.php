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
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', WEEK(date_time)) AS label,
                                SUM(CASE WHEN role = 'student in college' THEN 1 ELSE 0 END) AS total_student_college,
                                SUM(CASE WHEN role = 'employee in college' THEN 1 ELSE 0 END) AS total_employee_college
                                FROM dentalappcollege
                                WHERE YEAR(date_time) = ?
                                GROUP BY label";                    
                            $report_label = 'Weekly';
                            break;
            
                        case 'month':
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', MONTH(date_time)) AS label,
                                SUM(CASE WHEN role = 'student in college' THEN 1 ELSE 0 END) AS total_student_college,
                                SUM(CASE WHEN role = 'employee in college' THEN 1 ELSE 0 END) AS total_employee_college
                                FROM dentalappcollege
                                WHERE YEAR(date_time) = ?
                                GROUP BY label";         
                            $report_label = 'Monthly';
                            break;
            
                        case 'year':
                            $sql = "SELECT YEAR(date_time) AS label,
                                SUM(CASE WHEN role = 'student in college' THEN 1 ELSE 0 END) AS total_student_college,
                                SUM(CASE WHEN role = 'employee in college' THEN 1 ELSE 0 END) AS total_employee_college
                                FROM dentalappcollege
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
                        $chartData['total_student_college'][] = $row->total_student_college;
                        $chartData['total_employee_college'][] = $row->total_employee_college;
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
    <title>Total Dental Appointments Report</title>
    
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
    <style>
        /* Style the container to have fixed size and enable scrolling */
        .chart-container {
            width: 800px;
            height: 400px;
            overflow: auto;
        }

        #reportForm {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    #generateReport {
        background-color: #007bff; /* Clinic blue */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Clinic chart title styling */
    .chart-title {
        font-size: 24px;
        font-weight: bold;
        color: #007bff; /* Clinic blue */
        margin-bottom: 10px;
    }

    /* Clinic chart container styling */
    .chart-container {
        background-color: #f8f9fa; /* Clinic light gray */
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
    }
    #tableSelectYear {
    font-size: 16px!important;
    padding: 8px!important;
    border: 1px solid #ccc!important;
    border-radius: 4px!important;
    width: 100px!important;
}


#tableSelectYear option {
    font-size: 14px!important;
    padding: 4px!important;
    background-color: #f7f7f7!important;
}


#tableSelectYear option:checked {
    background-color: #007bff!important;
    color: #fff!important;
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

                fetch("totaldentalappointments.php", {
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
                            label: "Total of Student in College",
                            data: data.total_student_college,
                            backgroundColor: "rgba(0, 0, 128, 0.5)", // You can change the color here
                        },
                        {
                            label: "Total of Employees in College",
                            data: data.total_employee_college,
                            backgroundColor: "rgba(139, 0, 0, 0.5)", // You can change the color here
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

    // Check if the canvas element exists
    if (!canvas) {
        console.error("Canvas element not found");
        return;
    }

    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();

    // Create a title for the print window
    printWindow.document.write('<title>Chart Report</title>');

    // Create a table for alignment and center it
    printWindow.document.write('<table style="margin: 0 auto;">');

    // Add aligned text with center-aligned cell
    printWindow.document.write('<tr><td style="text-align: center; vertical-align: middle; font-size: 18px;"><b>HEALTH SERVICE UNIT - College Department</b></td></tr>');

    // Close the table and start the rest of the content
    printWindow.document.write('</table>');

    // Get the report type and label
    const reportType = document.getElementById("report_type").value;
    const reportLabel = reportType === 'week' ? 'Weekly' : (reportType === 'month' ? 'Monthly' : 'Yearly');

    // Display the report label with a custom font-size
    printWindow.document.write('<h1 style="font-size: 24px; text-align: center">' + reportLabel + ' Report</h1>');

    // Display the data table
    printWindow.document.write('<table style="border-collapse: collapse; width: 100%; margin-top: 20px; border: 1px solid #000;">');
    printWindow.document.write('<tr>');
    printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">' + reportLabel + '</th>');
    printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Students</th>');
    printWindow.document.write('<th style="border: 2px solid #000; padding: 8px; text-align: center; background-color: #f2f2f2;">Total Employees</th>');
    printWindow.document.write('</tr>');

    // Get the data from the chart
    const data = window.myChart.data;

    // Display data for each label
    for (let i = 0; i < data.labels.length; i++) {
        const label = data.labels[i];
        const totalStudents = data.datasets[0].data[i];
        const totalEmployees = data.datasets[1].data[i];

        printWindow.document.write('<tr style="background-color: #f2f2f2; text-align: center;">');
        printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + label + '</td>');
        printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalStudents + '</td>');
        printWindow.document.write('<td style="border: 2px solid #000; padding: 8px;">' + totalEmployees + '</td>');
        printWindow.document.write('</tr>');
    }

    printWindow.document.write('</table>');
    printWindow.document.close();

    // Add a delay to ensure the content is loaded before printing
    setTimeout(function () {
        printWindow.print();
        printWindow.close();
    }, 1000); // Adjust the delay as needed
}
            
                               // Fetch and draw the chart when the page loads
                               fetchChartData();
                           });
                       </script>

<br><br>
    
<?php
$selected_years = isset($_POST['selected_years']) ? $_POST['selected_years'] : '2023';
$report_types = isset($_POST['report_types']) ? $_POST['report_types'] : 'week';
$report_labels = 'Weekly'; // Initialize with a default value

// Your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['report_types']) && isset($_POST['selected_years'])) {
        $report_types = $_POST['report_types'];
        $selected_years = $_POST['selected_years'];
    }
}

switch ($report_types) {
    case 'week':
        $sql = "SELECT CONCAT(YEAR(date_time), '-', WEEK(date_time)) AS label,
        fullname, sched_time
        FROM dentalappcollege
        WHERE role = 'Student in College' AND YEAR(date_time) = ?";
        break;

    case 'month':
        $sql = "SELECT CONCAT(YEAR(date_time), '-', MONTHNAME(date_time)) AS label,
        fullname, sched_time
        FROM dentalappcollege
        WHERE role = 'Student in College' AND YEAR(date_time) = ?";
        $report_labels = 'Monthly';
        break;

    case 'year':
        $sql = "SELECT CONCAT(YEAR(date_time)) AS label,
        fullname, sched_time
        FROM dentalappcollege
        WHERE role = 'Student in College' AND YEAR(date_time) = ?";
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

<br>
<br>

<style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .clinic-table {
            border-collapse: collapse;
            width: 100%;
        }

        .clinic-table th,
        .clinic-table td {
            border: 1px solid #2e37a4; 
            padding: 8px;
            text-align: left;
        }
        .clinic-table th {
            background-color: #2e37a4;
            color: white;
        }
        .clinic-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

    </style>

<div class="center-container">

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
                                </div>
<br>
    
<table class="clinic-table" id="clinicTable">
            <thead>
                <tr>
                    <th style="width: 20px"><?php echo $report_labels; ?></th>
                    <th style="width: 20px">List of Students</th>
                    <th style="width: 20px"> Schedule Time</th>
                </tr>
            </thead>
            <tbody id="healthRecordTableBody">
                <?php while ($row = $result->fetch_object()): ?>
                    <tr>
                        <td><?php echo $row->label; ?></td>
                        <td><?php echo $row->fullname; ?></td>
                        <td><?php echo $row->sched_time; ?></td>
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
    
        // Add another cell for the text beside the image
        printWindow.document.write('<td style="text-align: center;">');
        printWindow.document.write('<div style="text-align: center;"><b>HEALTH SERVICE UNIT - South Campus</b></div>');
        printWindow.document.write('</td>');
    
        // Close the row and start a new row for your table content
        printWindow.document.write('</tr></table>');
    
        printWindow.document.write('<br><br>');
    // Create the table for your content
        printWindow.document.write('<style>');
        printWindow.document.write('table {color: black; margin: 0 auto; }');
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


</body>
</html> 

