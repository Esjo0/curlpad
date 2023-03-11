<?php
//Confirm that incoming request is a post request before proceeding.
if(isset($_POST['paramt'])){
    // Retrieve the parameters and the signature from the POST request
    $params = $_POST;

    //Get Parameter time
    $params_time = $params['paramt'];

    // Set the secret key used to sign the request
    $secret_key = 'esjograceman-'.$params_time;

    $attached_signature = $params['signature'];
    unset($params['signature']);

    // Generate a new signature by hashing the secret key and the parameters
    $signature = hash_hmac('sha256', json_encode($params), $secret_key);

    // Compare the generated signature with the received signature
    if ($signature === $attached_signature) {
        echo "Nice Signature is valid. Noice Noice!!!!!";
    } else {
        exit('OOPs!! : Invalid signature not allowed');
    }
}else{
    exit('OOPs!! : Invalid Request');
}


?>