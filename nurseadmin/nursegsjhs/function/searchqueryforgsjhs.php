<?php
    session_start();
    include '../../../db.php';
   
// Get the search query from the URL parameter
$searchQuery = $_GET['query'];

// Modify the SQL query to include the search condition
$sql = "SELECT * FROM healthrecordformgsjhs WHERE fullname LIKE '%$searchQuery%' OR idnumber LIKE '%$searchQuery%' OR age LIKE '%$searchQuery%' OR cguardian LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $sql);

// Generate the HTML for the filtered table rows
$output = '';
while ($row = $result->fetch_assoc()) {
  $output .= '<tr>';
  $output .= '<td>' . $row['healthnogsjhs_id'] . '</td>';
  $output .= '<td>' . $row['fullname'] . '</td>';
  $output .= '<td>' . $row['idnumber'] . '</td>';
  $output .= '<td>' . $row['age'] . '</td>';
  $output .= '<td>' . $row['guardianname'] . '</td>';
  $output .= '<td>' . $row['cguardian'] . '</td>';
  $output .= '<td><center>
  <a href="viewgsjhsrecord.php?idnumber=' . $row['idnumber'] . '">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16"><path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/></svg></a>
  
  <a href="editrecordgsjhslist.php?healthnogsjhs_id=' . $row['healthnogsjhs_id'] . '">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
  </svg></a>  
  
  </center></td>';
  $output .= '</tr>';
}

echo $output;
?>
