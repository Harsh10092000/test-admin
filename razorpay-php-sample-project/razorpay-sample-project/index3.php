<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .main-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            display: flex;
            gap: 40px;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .content-section, .form-section {
            flex: 1;
        }
        .content-section {
            padding-right: 20px;
            border-right: 1px solid #eee;
        }
        h1 {
            color: #0078d4;
            font-size: 32px;
            margin-bottom: 15px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .highlight {
            color: #0078d4;
            font-weight: 500;
        }
        .order-details {
            background: #eef7f2;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .order-details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .order-details strong {
            color: #0078d4;
        }
        .payment-form {
            margin: 20px 0;
        }
        .payment-form input[type="tel"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }
        .payment-form input[type="tel"]:focus {
            border-color: #0078d4;
            outline: none;
        }
        .payment-button {
            display: block;
            width: 100%;
            padding: 12px;
            background: #0078d4;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 120, 212, 0.3);
        }
        .payment-button:hover {
            background: #005a9e;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 120, 212, 0.4);
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }
        .footer a {
            color: #0078d4;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                padding: 20px;
            }
            .content-section {
                padding-right: 0;
                border-right: none;
                border-bottom: 1px solid #eee;
                padding-bottom: 20px;
            }
            h1 {
                font-size: 28px;
            }
            h2 {
                font-size: 20px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <!-- Content Section -->
        <div class="content-section">
            <h1>Secure Payment</h1>
            <h2>Your Subscription</h2>
            <p>Thank you for choosing our service! You're just one step away from unlocking exclusive access to premium features and content.</p>
            <p>With your payment of <span class="highlight">₹990.00</span>, you'll get:</p>
            <ul style="list-style: none; padding-left: 0;">
                <li>✔ Unlimited access to all tools</li>
                <li>✔ Priority customer support</li>
                <li>✔ Monthly updates and new features</li>
            </ul>
            <p>Complete the payment now to start enjoying these benefits immediately!</p>
        </div>

        <!-- Form Section -->
        <div class="form-section">
            <div class="order-details">
                <p><strong>Order ID:</strong>R8786-8789</p>
                <p><strong>Amount:</strong> ₹990.00 (INR)</p>
            </div>
            <div class="payment-form">
                <input type="tel" id="phone_number" placeholder="Enter your phone number (optional)" pattern="[0-9]{10}">
                <button class="payment-button" onclick="startPayment()">Pay with Razorpay</button>
            </div>
            <div class="footer">
                <p>Need help? Contact us at <a href="mailto:support@example.com">support@example.com</a></p>
            </div>
        </div>
    </div>

    <?php
    require('razorpay-php/Razorpay.php');
    use Razorpay\Api\Api;

    $api_key = 'rzp_live_ALzPxuAS54iJhF';
    $api_secret = 'nlDVdxL6QDPm36Ae2ID1Eih4';

    $api = new Api($api_key, $api_secret);

    $order = $api->order->create([
        'amount' => 9900, // amount in paise
        'currency' => 'INR',
        'receipt' => 'order_receipt_12asa3'
    ]);
    $order_id = $order->id;

    $callback_url = "http://localhost:8000/success.html";
    ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function startPayment() {
            const phoneNumber = document.getElementById('phone_number').value || 'Not provided';

            var options = {
                key: "<?php echo $api_key; ?>",
                amount: <?php echo $order->amount; ?>,
                currency: "<?php echo $order->currency; ?>",
                name: "Your Company Name",
                description: "Payment for your order",
                image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
                order_id: "<?php echo $order_id; ?>",
                theme: { "color": "#738276" },
                callback_url: "<?php echo $callback_url; ?>",
                prefill: {
                    contact: phoneNumber
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>
</html>