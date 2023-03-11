<?php 
//URL is set this up on my server at esjo.org.ng
$url = 'https://esjo.org.ng/api/index.php';
//Get current time
$cur_time = time();
// Set the post parameters
$params = array(
    'param1' => 'Esan',
    'param2' => 'Joshua',
    'paramt' => (string)$cur_time
);

// Set the secret key used to sign the request
$secret_key = 'esjograceman-'.$cur_time;

// Generate the signature by hashing the secret key and the parameters
$sign = hash_hmac('sha256', json_encode($params), $secret_key);
// Add the signature to the parameters array
$params['signature'] = $sign;

// Create a new CURL request
$ch = curl_init();
// Set the request URL and options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the request and get the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) { 
    echo 'Error: ' . curl_error($ch);
} else {
    echo $response;
}
// Close the CURL request
curl_close($ch);
?>