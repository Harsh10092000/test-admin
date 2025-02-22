<?php
$data = "Hello, World!";
$encoded = base64_encode($data);
echo "Encoded: " . $encoded;  // Output: SGVsbG8sIFdvcmxkIQ==
?>

<?php
$encoded = "SGVsbG8sIFdvcmxkIQ==";  // Base64 encoded string
$decoded = base64_decode($encoded);
echo "Decoded: " . $decoded;  // Output: Hello, World!
?>