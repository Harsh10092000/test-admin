<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Request</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
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
            color: #2d6a4f;
            font-size: 32px;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .registration-id {
            background: #eef7f2;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 18px;
            color: #2d6a4f;
            font-weight: 600;
            margin: 20px 0;
            display: inline-block;
        }
        .payment-button {
            display: inline-block;
            padding: 12px 30px;
            background: #40916c;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(64, 145, 108, 0.3);
        }
        .payment-button:hover {
            background: #2d6a4f;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(64, 145, 108, 0.4);
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #40916c;
            text-decoration: none;
        }
        .footer a:hover {
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
            .payment-button {
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
        <p>Your request has been successfully submitted.</p>
        <div class="registration-id">Registration ID: <span id="reg-id">[REGISTRATION_ID]</span></div>
        <p>To finalize your request, please proceed with the payment below:</p>
        <a href="[PAYMENT_LINK]" class="payment-button">Make Payment Now</a>
        <div class="footer">
            <p>Questions? Contact us at <a href="mailto:support@example.com">support@example.com</a></p>
        </div>
    </div>

    <script>
        // Simulate dynamic data (replace with actual backend logic)
        const registrationId = "REG20250220-12345";
        const paymentLink = "https://example.com/payment?reg_id=" + registrationId;

        document.getElementById("reg-id").textContent = registrationId;
        document.querySelector(".payment-button").setAttribute("href", paymentLink);
    </script>
</body>
</html>