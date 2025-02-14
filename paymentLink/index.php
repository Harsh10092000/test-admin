



<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Return the URL as JSON
    echo json_encode(['payment_url' => $payment_url]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Link Generator</title>
    <script>
        function generatePaymentLink() {
            // Disable the button while processing
            document.getElementById("payButton").disabled = true;

            // Send an AJAX request to generate the payment URL
            fetch('index.php', {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                // Enable the button again after the response
                document.getElementById("payButton").disabled = false;
                
                // Display the generated payment link
                document.getElementById("paymentLink").innerHTML = `Click here to pay: <a href="${data.payment_url}" target="_blank">${data.payment_url}</a>`;
            })
            .catch(error => {
                // Enable the button if there is an error
                document.getElementById("payButton").disabled = false;
                alert('Error generating the payment link!');
            });
        }
    </script>
</head>
<body>
    <button id="payButton" onclick="generatePaymentLink()">Generate Payment Link</button>
    
    <div id="paymentLink" style="margin-top: 20px;"></div>
</body>
</html>
