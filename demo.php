<?php

// API endpoint URL
$url = 'https://timeapi.io/api/Time/current/ip?ipAddress=237.71.232.203';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url); // Set the URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as string

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Decode JSON response
    $data = json_decode($response, true);

    // Check response status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode == 200) {
        // API call successful, process response data
        print_r($data);
    } else {
        // Handle error
        echo 'Error: ' . $httpCode;
    }
}

// Close cURL session
curl_close($ch);

?>
