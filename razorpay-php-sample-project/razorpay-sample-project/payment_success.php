<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
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
            color: #0078d4; /* Blue from your previous design */
            font-size: 32px;
            margin-bottom: 10px;
        }
        p {
            color: #333;
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .order-details {
            background: #eef7f2;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
        .order-details p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }
        .order-details strong {
            color: #0078d4;
        }
        .back-button {
            display: inline-block;
            padding: 12px 30px;
            background: #0078d4;
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
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #0078d4;
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
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction has been processed successfully.</p>
        <div class="order-details">
            <p><strong>Order ID:</strong>REG29783-868</p>
            <p><strong>Phone Number:</strong> +1 (234) 567-890</p>
            <p><strong>Amount:</strong> ₹990.00 (INR)</p>
            <p><strong>Date:</strong> <?php echo date('F d, Y, h:i A'); ?></p>
        </div>
        <a href="/" class="back-button">Return to Homepage</a>
        <div class="footer">
            <p>Questions? Contact us at <a href="mailto:support@example.com">support@example.com</a></p>
        </div>
    </div>

</body>
</html>