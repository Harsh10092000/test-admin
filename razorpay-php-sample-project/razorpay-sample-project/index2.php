<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
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
            color: #0078d4; /* Blue from your design */
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
        .payment-form {
            margin: 20px 0;
        }
        .payment-form input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        .payment-button {
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
            border: none;
            cursor: pointer;
        }
        .payment-button:hover {
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
        <h1>Make Payment</h1>
        <p>Please complete your payment to proceed with your order.</p>
        <div class="order-details">
            <p><strong>Order ID:</strong> <?php echo $order_id; ?></p>
            <p><strong>Amount:</strong> ₹990.00 (INR)</p>
        </div>
        <div class="payment-form">
            <input type="tel" id="phone_number" placeholder="Enter your phone number (optional)" pattern="[0-9]{10}">
            <button class="payment-button" onclick="startPayment()">Pay with Razorpay</button>
        </div>
        <div class="footer">
            <p>Questions? Contact us at <a href="mailto:support@example.com">support@example.com</a></p>
        </div>
    </div>

    <?php
    // Include the Razorpay PHP library and initialize
    require('razorpay-php/Razorpay.php');
    use Razorpay\Api\Api;

    $api_key = 'rzp_live_ALzPxuAS54iJhF';
    $api_secret = 'nlDVdxL6QDPm36Ae2ID1Eih4';

    $api = new Api($api_key, $api_secret);

    // Create an order
    $order = $api->order->create([
        'amount' => 9900, // amount in paise (100 paise = 1 rupee)
        'currency' => 'INR',
        'receipt' => 'order_receipt_12asa3'
    ]);
    $order_id = $order->id;

    // Set your callback URL
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
                    contact: phoneNumber // Pre-fill phone number in Razorpay if provided
                }
            };
            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>
</html>