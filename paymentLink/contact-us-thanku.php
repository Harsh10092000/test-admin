<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #ffffff);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            color: #0078d4; /* Blue from the image */
            font-size: 32px;
            margin-bottom: 10px;
        }
        p {
            color: #333;
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .back-button {
            display: inline-block;
            padding: 12px 30px;
            background: #0078d4; /* Blue from the image */
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 120, 212, 0.3);
        }
        .back-button:hover {
            background: #005a9e; /* Darker blue for hover */
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 120, 212, 0.4);
        }
        .contact-info {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .contact-info a {
            color: #0078d4;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 20px;
            }
            h1 {
                font-size: 28px;
            }
            .back-button {
                padding: 10px 25px;
                font-size: 14px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Thank You!</h1>
        <p>Your message has been successfully submitted.</p>
        <p>We’ll get back to you soon. If you need immediate assistance, feel free to reach out to us directly.</p>
        <a href="/" class="back-button">Return to Homepage</a>
        <div class="contact-info">
            <p>Phone: <a href="tel:+1234567890">+1 (234) 567-890</a></p>
            <p>Address: 123 Blue Street, Tech City, TC 45678</p>
            <p>Email: <a href="mailto:contact@example.com">contact@example.com</a></p>
        </div>
    </div>
</body>
</html>