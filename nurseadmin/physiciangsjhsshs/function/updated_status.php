<?php
session_start();
include '../../../db.php';

if (isset($_GET['done_status']) && $_GET['done_status'] == 'Done') {
    // Get the medicalapp_id from the URL
    $phy_id = $_GET['phy_id'];
    
    // Update the status in the database
    $updateSql = "UPDATE physicianapp SET done_status = 'Done' WHERE phy_id = $phy_id";
    $updateResult = mysqli_query($conn, $updateSql);
    
    if ($updateResult) {
        // Status updated successfully, you can add a success message here if needed.

        // Redirect back to medicalcollege.php
        header("Location: ../physicianapproved.php");
        exit(); // Make sure to exit after performing the redirection.
    } else {
        // Error updating status, you can handle the error here.
    }
}
?>