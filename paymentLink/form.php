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
function validateForm($data) {
    $errors = [];

    echo "Session Token: " . $_SESSION['form_token'] . "<br>";
    echo "Submitted Token: " . $data['form_token'] . "<br>";

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

    // 4. Field validation
    if (empty($data['name'])) {
        $errors[] = "Name is required.";
    }
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    return $errors;
}

// Function to generate a simple math CAPTCHA
function generateCaptcha() {
    $num1 = rand(1, 100);
    $num2 = rand(1, 10);
    $_SESSION['captcha_answer'] = $num1 + $num2;
    return "$num1 + $num2 = ?";
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the form
    $errors = validateForm($_POST);

    

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
</head>
<body>
    <form method="POST" action="">
        <!-- Hidden token field -->
        <input type="hidden" name="form_token" value="<?php echo generateFormToken(); ?>">

        <!-- Honeypot field -->
        <input type="text" name="honeypot" style="display:none;">

        <!-- Regular form fields -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>

        <!-- CAPTCHA field -->
        <label for="captcha"><?php echo $captchaQuestion; ?></label>
        <input type="text" name="captcha" id="captcha" required>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>