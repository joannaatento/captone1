<?php
    session_start();
    include '../../../db.php';
   
// Get the search query from the URL parameter
$searchQuery = $_GET['query'];

// Modify the SQL query to include the search condition
$sql = "SELECT * FROM healthrecord WHERE role = 'student' AND (fullname LIKE '%$searchQuery%' OR idnumber LIKE '%$searchQuery%' OR leveleduc LIKE '%$searchQuery%' OR age LIKE '%$searchQuery%' OR nameperson LIKE '%$searchQuery%' OR personcp LIKE '%$searchQuery%' OR relationship LIKE '%$searchQuery%')";
$result = mysqli_query($conn, $sql);

// Generate the HTML for the filtered table rows
$output = '';
while ($row = $result->fetch_assoc()) {
  $output .= '<tr>';
  $output .= '<td>' . $row['fullname'] . '</td>';
  $output .= '<td>' . $row['idnumber'] . '</td>';
  $output .= '<td>' . $row['leveleduc'] . '</td>';
  $output .= '<td>' . $row['age'] . '</td>';
  $output .= '<td>' . $row['nameperson'] . '</td>';
  $output .= '<td>' . $row['personcp'] . '</td>';
  $output .= '<td>' . $row['relationship'] . '</td>';
  $output .= '<td><center><a href="viewstudentlistsphysiciancollege.php?idnumber=' . $row['idnumber'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16"><path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/></svg></a></center></td>';
  $output .= '</tr>';
}

echo $output;
?>
