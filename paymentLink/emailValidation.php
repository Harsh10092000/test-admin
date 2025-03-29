<?php
function validateEmailDomain($email) {
    $domain = substr(strrchr($email, "@"), 1);
    if (getmxrr($domain, $mx_records)) {
        return true;
    } else {
        return false;
    }
}

$email = "howardea@aafes.com";
if (validateEmailDomain($email)) {
    echo $email . "<br />";
    echo "The email domain is valid!";
} else {
    echo $email . "<br />";
    echo "The email domain is invalid or not configured for email!";
}
?>


<!-- function validateGmailAddress($email) {
    // Basic regex pattern for Gmail (it only checks the format of the email)
    $pattern = "/^[a-zA-Z0-9._%+-]+@gmail\.com$/"; // Only validates Gmail addresses
    return preg_match($pattern, $email);
}

// Usage
$email = "example@gmail.com";
if (validateGmailAddress($email)) {
    echo "Valid Gmail address!";
} else {
    echo "Invalid Gmail address!";
} -->



<!-- function validateEmailAddress($email) {
    // Basic regex pattern for general email validation
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // General email format
    return preg_match($pattern, $email);
}

// Usage
$email = "example@gmail.com";
if (validateEmailAddress($email)) {
    echo "Valid email address!";
} else {
    echo "Invalid email address!";
} -->



<!-- function isDisposableEmail($email) {
    // List of known disposable email domains
    $disposable_domains = [
        'tempmail.org',
        'guerrillamail.com',
        'mailinator.com',
        '10minutemail.com',
        'throwawaymail.com',
        'yopmail.com',
        'tempinbox.com',
        // Add more disposable domains here
    ];

    // Extract the domain from the email address
    $domain = substr(strrchr($email, "@"), 1);

    // Check if the domain is in the disposable domains list
    if (in_array($domain, $disposable_domains)) {
        return true; // It's a disposable email
    }

    return false; // It's not a disposable email
}

// Usage
$email = "lejihod131@minduls.com";
if (isDisposableEmail($email)) {
    echo "This is a disposable email address.";
} else {
    echo "This is a regular email address.";
    kj
} -->

