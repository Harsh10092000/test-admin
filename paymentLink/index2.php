<!-- <?php
function encryptDataGCM($data, $key) {
    $cipher = "aes-256-gcm";
    $iv = openssl_random_pseudo_bytes(12); // 12 bytes recommended for GCM
    $tag = null;

    // Encrypt data
    $encrypted_data = openssl_encrypt(
        $data, 
        $cipher, 
        $key, 
        OPENSSL_RAW_DATA, 
        $iv, 
        $tag
    );

    if ($encrypted_data === false) {
        throw new Exception('Encryption failed: ' . openssl_error_string());
    }

    // Base64 encode the encrypted data, IV, and tag for URL encoding
    return base64_encode($encrypted_data . '::' . $iv . '::' . $tag);
}

// Example usage of encryptDataGCM
$encryption_key = "0123456789abcdef0123456789abcdef"; // 256-bit key for AES-256-GCM
$order_id = "12345";
$amount = "100.50"; 
$user_name = "John Doe";
$user_email = "johndoe@example.com";
$user_phone = "1234567890";

// Combine data into a query string
$data = [
    'order_id' => $order_id,
    'amount' => $amount,
    'user_name' => $user_name,
    'user_email' => $user_email,
    'user_phone' => $user_phone
];

// Encrypt the data (convert to query string before encryption)
$encrypted_data = encryptDataGCM(http_build_query($data), $encryption_key);

// Generate the payment URL
$payment_url = "decrypt.php?data=" . urlencode($encrypted_data);

// Display the button
echo "<a href='$payment_url' target='_blank'><button>Pay Now</button></a>";
?> -->