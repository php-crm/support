<?php
	/* 
	Author: PHP CRM
	Web: www.phpcrm.com
	Date: 15 April 2024
	Version: 13 
	*/	
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
 // To set the API endpoint URL, please log in to your PHP CRM account. 	
$url = "#";
// Validate form fields
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$subject = trim($_POST["subject"]);
$message = trim($_POST["message"]);

// Initialize cURL session
$curl = curl_init();
// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false, // Assuming you're using self-signed SSL certificate in local environment
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        'company' => $name,
        'email' => $email,
        'subject' => $subject,
        'description' => $message,
    ],
]);

// Execute the request and get the response
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    $error = curl_error($curl);
    // Handle cURL error
    echo "Error in creating support ticket: " . $error;
} else {
    // Decode JSON response
    $responseData = json_decode($response, true);

    // Check if response contains success message
    if (isset($responseData['messages']['success'])) {
        echo "Thank you! Your support ticket has been successfully submitted.";
    } elseif (isset($responseData['messages']['error'])) {
        echo "Error in creating support ticket: " . $responseData['messages']['error'];
    } else {
        echo "Unknown error occurred.";
    }
}

// Close cURL session
curl_close($curl);
}
?>
