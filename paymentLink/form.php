<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Form</title>
</head>
<body>
<? //php include "formbackend.php";  ?>
    <form method="POST" action="">
        
        <input type="hidden" name="form_token" value="<? //php echo generateFormToken(); ?>">

        
        <input type="text" name="honeypot" style="display:none;">

       
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        
        <label for="captcha"><?//php echo $captchaQuestion; ?></label>
        <input type="text" name="captcha" id="captcha" required>
        <br>

        <button type="submit">Submit</button>
    </form>
   
</body>
</html> -->



<?php
session_start();

// Function to generate a unique token
function generateFormToken() {
    if (empty($_SESSION['form_token'])) {
        $token = bin2hex(random_bytes(32));
        $_SESSION['form_token'] = $token;
        $_SESSION['form_token_time'] = time(); // Store token generation time
    }
    return $_SESSION['form_token'];
}

// Function to validate the form
function validateForm($data, $files) {
    $errors = [];

    // 1. Token validation
    if (empty($data['form_token']) || $data['form_token'] !== $_SESSION['form_token']) {
        $errors[] = "Token validation failed.";
    }

    // 2. Honeypot field validation
    if (!empty($data['honeypot'])) {
        $errors[] = "Spam detected.";
    }

    // 3. CAPTCHA validation (example: simple math CAPTCHA)
    if ($data['captcha'] != $_SESSION['captcha_answer']) {
        $errors[] = "CAPTCHA verification failed.";
    }

    // 4. Name validation
    if (empty($data['name'])) {
        $errors[] = "Name is required.";
    }

    // 5. Email validation
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    } elseif (!validateEmailDomain($data['email'])) {
        $errors[] = "Invalid email domain.";
    } elseif (isDisposableEmail($data['email'])) {
        $errors[] = "Disposable email addresses are not allowed.";
    }

    // 6. Phone number validation
    if (empty($data['phone']) || !validatePhoneNumber($data['phone'])) {
        echo $data['phone'];
        $errors[] = "Valid phone number is required.";
    }

    // 7. Description validation
    if (empty($data['description'])) {
        $errors[] = "Description is required.";
    }

    // 8. File validation
    if (!empty($files['files']['name'][0])) {
        $fileErrors = validateFiles($files['files']);
        if (!empty($fileErrors)) {
            $errors = array_merge($errors, $fileErrors);
        }
    }

    return $errors;
}

// Function to validate phone number (E.164 format)
function validatePhoneNumber($phone) {
    $pattern = "/^\+?[1-9]\d{1,14}$/"; // E.164 format (international)
    return preg_match($pattern, $phone);
}

// Function to validate email domain
function validateEmailDomain($email) {
    $domain = substr(strrchr($email, "@"), 1);
    return checkdnsrr($domain, "MX"); // Check if domain has MX records
}

// Function to check for disposable email
function isDisposableEmail($email) {
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

    $domain = substr(strrchr($email, "@"), 1);
    return in_array($domain, $disposable_domains);
}

// Function to validate uploaded files
function validateFiles($files) {
    $errors = [];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf']; // Allowed file types
    $maxSize = 5 * 1024 * 1024; // 5 MB

    foreach ($files['tmp_name'] as $index => $tmpName) {
        if ($files['error'][$index] !== UPLOAD_ERR_OK) {
            $errors[] = "File upload error for file: " . $files['name'][$index];
            continue;
        }

        // Check file type
        $fileType = mime_content_type($tmpName);
        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Invalid file type for file: " . $files['name'][$index];
        }

        // Check file size
        if ($files['size'][$index] > $maxSize) {
            $errors[] = "File size exceeds limit for file: " . $files['name'][$index];
        }
    }

    return $errors;
}

// Function to generate a simple math CAPTCHA
function generateCaptcha() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $_SESSION['captcha_answer'] = $num1 + $num2;
    return "$num1 + $num2 = ?";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the form
    $errors = validateForm($_POST, $_FILES);

    if (empty($errors)) {
        // Process the form data (e.g., save to database, send email)
        echo "Form submitted successfully!";
        // Clear the token and CAPTCHA answer after successful submission
        unset($_SESSION['form_token']);
        unset($_SESSION['captcha_answer']);
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}

// Generate a new CAPTCHA question
$captchaQuestion = generateCaptcha();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Form</title>
    <!-- Include intl-tel-input CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Hidden token field -->
        <input type="hidden" name="form_token" value="<?php echo generateFormToken(); ?>">

        <!-- Honeypot field -->
        <input type="text" name="honeypot" style="display:none;">

        <!-- Name field -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <!-- Email field -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <!-- Phone field with intl-tel-input -->
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" required>
        <br>

        <!-- Description field -->
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>

        <!-- CAPTCHA field -->
        <label for="captcha"><?php echo $captchaQuestion; ?></label>
        <input type="text" name="captcha" id="captcha" required>
        <br>

        <!-- File upload field -->
        <label for="files">Upload files (images or PDFs, max 5MB):</label>
        <input type="file" name="files[]" id="files" multiple accept=".jpg,.jpeg,.png,.gif,.pdf">
        <br>

        <button type="submit">Submit</button>
    </form>

    <!-- Initialize intl-tel-input -->
    <script>
        const phoneInput = document.getElementById("phone");
        const iti = window.intlTelInput(phoneInput, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json")
                    .then(response => response.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
            },
        });

        phoneInput.addEventListener("input", function() {
            if (iti.isValidNumber()) {
                phoneInput.setCustomValidity("");
            } else {
                phoneInput.setCustomValidity("Invalid phone number");
            }
        });
    </script>
</body>
</html>