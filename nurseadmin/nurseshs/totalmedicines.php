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
        if($_SESSION['role'] == 2){
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
    <title>Total Medicine Consumed Reports</title>
    
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
    
    <style> 

#generateReport {
        background-color: #2E37A4; /* Clinic blue */
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 6px;
        cursor: pointer;

    }

    #tableSelectYear {
    font-size: 16px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100px;
}


#tableSelectYear option {
    font-size: 14px;
    padding: 4px;
    background-color: #f7f7f7;
}


#tableSelectYear option:checked {
    background-color: #007bff;
    color: #fff;
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
						        <h4 class="notification-title mb-1">Total Medicine Consumed Reports</h4>
					        </div>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
                    <?php
$selected_year = isset($_POST['selected_year']) ? $_POST['selected_year'] : '2023';
$report_type = isset($_POST['report_type']) ? $_POST['report_type'] : 'week';

// Your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['report_type']) && isset($_POST['selected_year'])) {
        $report_type = $_POST['report_type'];
        $selected_year = $_POST['selected_year'];
    }
}

switch ($report_type) {
    case 'week':
        $sql = "SELECT CONCAT(YEAR(date_created), '-', WEEK(date_created)) AS label,
                medicine_name,
                COUNT(medicine_name) AS total_medicine,
                SUM(quantity) AS total_quantity
                FROM medicine
                WHERE role = '2' AND YEAR(date_created) = ?
                GROUP BY label, medicine_name";
        $report_label = 'Weekly';
        break;

    case 'month':
        $sql = "SELECT CONCAT(YEAR(date_created), '-', MONTHNAME(date_created)) AS label,
                medicine_name,
                COUNT(medicine_name) AS total_medicine,
                SUM(quantity) AS total_quantity
                FROM medicine
                WHERE role = '2' AND YEAR(date_created) = ?
                GROUP BY label, medicine_name";
        $report_label = 'Monthly';
        break;

    case 'year':
        $sql = "SELECT CONCAT(YEAR(date_created)) AS label,
                medicine_name,
                COUNT(medicine_name) AS total_medicine,
                SUM(quantity) AS total_quantity
                FROM medicine
                WHERE role = '2' AND YEAR(date_created) = ?
                GROUP BY label, medicine_name";
        $report_label = 'Yearly';
        break;

    default:
        echo "Invalid report type selection.";
        exit;
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $selected_year);
$stmt->execute();
$result = $stmt->get_result();
?>

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

<br>

<div class="center-container">

<form class="clinic-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select id="tableSelect" name="report_type">
        <option value="week" <?php echo $report_type === 'week' ? 'selected' : ''; ?>>Weekly</option>
        <option value="month" <?php echo $report_type === 'month' ? 'selected' : ''; ?>>Monthly</option>
        <option value="year" <?php echo $report_type === 'year' ? 'selected' : ''; ?>>Yearly</option>
    </select>

    <select id="yearSelect" name="selected_year">
        <option value="2023" <?php echo $selected_year === '2023' ? 'selected' : ''; ?>>2023</option>
        <option value="2024" <?php echo $selected_year === '2024' ? 'selected' : ''; ?>>2024</option>
        <option value="2025" <?php echo $selected_year === '2025' ? 'selected' : ''; ?>>2025</option>
    </select>

    <button type="submit">Generate Report</button>
    <button id="printButton">Print Report</button>

</form>
    </div>
    <br>

    <div class="clinic-table-container">
    <table class="clinic-table" id="clinicTable">
        <thead>
            <tr>
                <th style="width: 20px;"><?php echo $report_label; ?></th>
                <th style="width: 20px;">Medicine Name</th>
                <th style="width: 20px;">Total Quantity</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
            <?php while ($row = $result->fetch_object()): ?>
                <tr>
                    <td><?php echo $row->label; ?></td>
                    <td><?php echo $row->medicine_name; ?></td>
                    <td><?php echo $row->total_quantity; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>

    <script>
  document.getElementById("printButton").addEventListener("click", function () {
    var table = document.getElementById("clinicTable");
    var printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.open();
    
    printWindow.document.write('<table style="margin: 0 auto;"><tr>');

    // Add another cell for the text beside the image
    printWindow.document.write('<td style="text-align: center;">');
    printWindow.document.write('<div style="text-align: center;"><b>HEALTH SERVICE UNIT - SHS Department</b></div>');
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
