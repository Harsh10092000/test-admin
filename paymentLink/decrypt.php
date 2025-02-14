<?php
function decryptDataGCM($encrypted_data, $key) {
    $cipher = "aes-256-gcm";

    // Decode the encrypted data, IV, and tag
    $parts = explode('::', base64_decode($encrypted_data));
    if (count($parts) !== 3) {
        throw new Exception('Invalid encrypted data format');
    }

    list($encrypted_data, $iv, $tag) = $parts;

    // Decrypt the data and verify the tag
    $decrypted_data = openssl_decrypt(
        $encrypted_data, 
        $cipher, 
        $key, 
        OPENSSL_RAW_DATA, 
        $iv, 
        $tag
    );

    if ($decrypted_data === false) {
        throw new Exception('Decryption failed: ' . openssl_error_string());
    }

    return $decrypted_data;
}

// Example for handling the incoming encrypted data
try {
    $encrypted_data = $_GET['data']; // Assuming the encrypted data is passed in the 'data' URL parameter
    $encryption_key = "0123456789abcdef0123456789abcdef"; // The same dummy key used for encryption

    echo "Encrypted Data: " . $encrypted_data . "<br>";

    $decrypted_data = decryptDataGCM($encrypted_data, $encryption_key);

    // Debugging: Print the decrypted data to check what's being decrypted
    echo "Decrypted Data: " . $decrypted_data . "<br>";

    parse_str($decrypted_data, $data); // Parse the decrypted data back into an array

    // Now $data will contain the original values such as order_id, amount, etc.
    echo "<pre>";
    print_r($data); // For debugging purposes, to see the decrypted data array
    echo "</pre>";

    echo $data['order_id'];
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>