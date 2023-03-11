<?php
//Get URL
(isset($_GET['url'])) ? $url = $_GET['url'] : $url = "https://example.com";

// Initialize session
$ch = curl_init($url);

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);

// Execute the request
$response = curl_exec($ch);

// Get the response code
$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Check if the request was successful (200-299 HTTP status codes)
if ($responseCode >= 200 && $responseCode < 300) {
    // Extract the content length from the response headers
    $responseLength = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

    // Print the result
    echo "The download size for $url is $responseLength bytes.";
} else {
    // If the request was not successful, print the error message
    echo "Error: HTTP status code $responseCode";
}

// Close the curl session
curl_close($ch);
?>
