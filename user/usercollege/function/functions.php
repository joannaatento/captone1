<?php
    session_start();
    include '../../../db.php';

    if (isset($_POST['submit_physician'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $gradesection = $_POST ['gradesection'];
        $phoneno = $_POST ['phoneno'];
        $date_time = $_POST ['date_time'];
        $sched_time = $_POST ['sched_time'];
        $role = $_POST['role'];
        
         // Check if 'is_deleted_on_website' is set in $_POST
    if (isset($_POST['is_deleted_on_website'])) {
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    } else {
        // Handle the case when 'is_deleted_on_website' is not set
        $is_deleted_on_website = ''; // or set to a default value
    }

    // Set the time zone to Asia/Manila
    date_default_timezone_set('Asia/Manila');
    $appointmentDateTime = new DateTime($date_time);
    $formattedDatetime = $appointmentDateTime->format("Y-m-d");

    // Calculate the reminder time (2 hours before appointment)
    $reminderDateTime = clone $appointmentDateTime;
    $reminderDateTime->modify("-2 hours");


 // Check for duplicate entry before inserting
 $checkSql = "SELECT COUNT(*) AS count FROM physicianappcollege WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
 $checkResult = mysqli_query($conn, $checkSql);

 if ($checkResult) {
     $row = mysqli_fetch_assoc($checkResult);

     if ($row['count'] == 0) {
         // No duplicate entry, proceed with the insertion
         $sql = "INSERT INTO physicianappcollege (user_id, idnumber, name, gradesection, phoneno, date_time, sched_time, role, created_at, is_deleted_on_website, status) 
                 VALUES ('$user_id', '$idnumber', '$name', '$gradesection', '$phoneno', '$formattedDatetime', '$sched_time', '$role', NOW(), '$is_deleted_on_website', 'Available')";

         if (mysqli_query($conn, $sql)) {
             // Mark the selected slot as unavailable
             $updateSql = "UPDATE physicianappcollege SET status = 'Unavailable' WHERE date_time = '$formattedDatetime' AND sched_time = '$sched_time'";
             mysqli_query($conn, $updateSql);

             // Check if it's time to send a reminder
             $currentTime = new DateTime(); // Current time in the specified timezone

             // Check if the reminder time is within 2 hours before the appointment time
             if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                 // Send SMS reminder
                 $message = "Hi $name, this is a reminder for your physician consultation appointment on $formattedDatetime. It's just 2 hours away. See you soon!";

                 $client = new Client([
                     'base_uri' => "https://k3n5n1.api.infobip.com",
                     'headers' => [
                         'Authorization' => "App 06c65a798c0587c8dc83b35c0ac75dab-be21e6fb-9215-4fc1-b1fd-9754acc09cac",
                         'Content-Type' => 'application/json',
                         'Accept' => 'application/json',
                     ],
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
                                         ['to' => $phoneno],
                                     ],
                                     'text' => $message,
                                 ],
                             ],
                         ],
                     ]
                 );

                 if ($response->getStatusCode() == 200) {
                     echo "SMS reminder sent to $name successfully.\n";
                 } else {
                     echo "Failed to send SMS reminder to $name.\n";
                 }
             }

             header('location: ../addphysicianmessagecollege.php');
             $_SESSION['success'] = "
                 <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                     <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Request Appointment Added.</h2>
                 </div>
             ";
         } 
         
     } else {
        // PHP error message
        echo '<script type="text/javascript">
        alert("Error: Duplicate entry for date and time.");
        window.history.back(); // Go back to the previous page
        </script>';
     }
 }
}
?>