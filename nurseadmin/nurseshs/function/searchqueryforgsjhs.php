<?php
    session_start();
    include '../../../db.php';
   
// Get the search query from the URL parameter
$searchQuery = $_GET['query'];

// Modify the SQL query to include the search condition
$sql = "SELECT * FROM healthrecordformgsjhs WHERE fullname LIKE '%$searchQuery%' OR idnumber LIKE '%$searchQuery%' OR birthday LIKE '%$searchQuery%' OR cguardian LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $sql);

// Generate the HTML for the filtered table rows
$output = '';
while ($row = $result->fetch_assoc()) {
  $output .= '<tr>';
  $output .= '<td>' . $row['healthnogsjhs_id'] . '</td>';
  $output .= '<td>' . $row['fullname'] . '</td>';
  $output .= '<td>' . $row['idnumber'] . '</td>';
  $output .= '<td>' . $row['birthday'] . '</td>';
  $output .= '<td>' . $row['guardianname'] . '</td>';
  $output .= '<td>' . $row['cguardian'] . '</td>';
  $output .= '<td><center>

  <a href="viewgsjhsrecord.php?healthnogsjhs_id=' . $row['healthnogsjhs_id'] . '">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16"><path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/></svg></a>
  
  <a href="#openModal<?= $healthnogsjhs_id=' . $row ['healthnogsjhs_id'] . '">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
<path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
</svg>
</a>
  </center></td>';
  $output .= '</tr>';
}

echo $output;


?>

