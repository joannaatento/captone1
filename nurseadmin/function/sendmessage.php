<?php
    session_start();
    include '../../db.php';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $sender = filter_input(INPUT_POST, 'sender', FILTER_SANITIZE_STRING);
    $numbers = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (!empty($sender) && !empty($numbers) && !empty($message)) {
        // API key
        $apiKey = 'NjY0MTQyNTA1NjdhNGM1MTQyNTU0YjcwNTc2MTdhNDM=';

        // Prepare data for POST request
        $data = array(
            'apikey' => $apiKey,
            'numbers' => $numbers,
            'sender' => $sender,
            'message' => $message
        );

        // Send the POST request with cURL
        $ch = curl_init('https://api.txtlocal.com/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        // Check for cURL errors
        if ($response === false) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Process the response
            echo $response;
        }

        curl_close($ch);
    } else {
        // Handle validation errors
        echo 'Please fill in all required fields.';
    }
}
?>