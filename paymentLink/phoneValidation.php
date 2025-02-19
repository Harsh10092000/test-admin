<?php

function validatePhoneNumber($phone) {
    $pattern = "/^\+?[1-9]\d{1,14}$/"; // E.164 format (international cf)
    return preg_match($pattern, $phone);
}

// Usage
$phone = "+91415555261";
if (validatePhoneNumber($phone)) {
    echo "Valid phone number!";
} else {
    echo "Invalid phone number!";
}

?>