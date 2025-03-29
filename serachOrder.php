<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e9ecef, #ced4da);
            margin: 0;
            padding: 30px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            max-width: 900px;
            width: 100%;
            animation: slideIn 0.6s ease-out;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            color: #1a535c;
            font-size: 36px;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
        .search-form input[type="text"] {
            padding: 12px 20px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 10px 0 0 10px;
            width: 350px;
            outline: none;
            transition: border-color 0.3s ease;
        }
        .search-form input[type="text"]:focus {
            border-color: #1a535c;
        }
        .search-form button {
            padding: 12px 25px;
            background: #ff6b6b;
            color: #fff;
            border: none;
            border-radius: 0 10px 10px 0;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .search-form button:hover {
            background: #ff8787;
            transform: translateY(-2px);
        }
        .order-card {
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        .order-field {
            margin: 12px 0;
            font-size: 17px;
            color: #333;
            display: flex;
            align-items: center;
        }
        .order-field label {
            font-weight: 600;
            color: #1a535c;
            width: 150px;
            flex-shrink: 0;
        }
        .order-field span {
            flex-grow: 1;
        }
        .status {
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
        }
        .status.pending { background: #ffd60a; color: #333; }
        .status.completed { background: #4ecdc4; color: #fff; }
        .status.cancelled { background: #ff6b6b; color: #fff; }
        .no-data {
            text-align: center;
            color: #ff6b6b;
            font-size: 18px;
            margin-top: 20px;
        }
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            h1 {
                font-size: 28px;
            }
            .search-form input[type="text"] {
                width: 200px;
            }
            .order-field {
                flex-direction: column;
                align-items: flex-start;
            }
            .order-field label {
                width: auto;
                margin-bottom: 5px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <form class="search-form" method="POST">
            <input type="text" name="order_id" placeholder="Search by Order ID">
            <button type="submit">Search</button>
        </form>

        <?php
        // Dummy order data
        $orders = [
            "ORD12345" => [
                "name" => "Amit Sharma",
                "order_date" => "2025-03-25",
                "deadline" => "2025-04-05",
                "price" => "₹4500.00",
                "phone" => "+91 98765 43210",
                "email" => "amit.sharma@example.com",
                "status" => "pending"
            ],
            "ORD12346" => [
                "name" => "Priya Singh",
                "order_date" => "2025-03-26",
                "deadline" => "2025-04-03",
                "price" => "₹7200.00",
                "phone" => "+91 87654 32109",
                "email" => "priya.singh@example.com",
                "status" => "completed"
            ],
            "ORD12347" => [
                "name" => "Rahul Verma",
                "order_date" => "2025-03-27",
                "deadline" => "2025-04-10",
                "price" => "₹3000.00",
                "phone" => "+91 76543 21098",
                "email" => "rahul.verma@example.com",
                "status" => "cancelled"
            ]
        ];

        // Check if search is performed
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["order_id"])) {
            $order_id = strtoupper(trim($_POST["order_id"]));
            if (isset($orders[$order_id])) {
                $order = $orders[$order_id];
                displayOrder($order_id, $order);
            } else {
                echo '<p class="no-data">No order found with ID: ' . htmlspecialchars($order_id) . '</p>';
            }
        } else {
            // Display all dummy orders by default
            foreach ($orders as $order_id => $order) {
                displayOrder($order_id, $order);
            }
        }

        // Function to display order details
        function displayOrder($order_id, $order) {
            echo '<div class="order-card">';
            echo '<div class="order-field"><label>Order ID:</label> <span>' . htmlspecialchars($order_id) . '</span></div>';
            echo '<div class="order-field"><label>Name:</label> <span>' . htmlspecialchars($order["name"]) . '</span></div>';
            echo '<div class="order-field"><label>Order Date:</label> <span>' . htmlspecialchars($order["order_date"]) . '</span></div>';
            echo '<div class="order-field"><label>Deadline:</label> <span>' . htmlspecialchars($order["deadline"]) . '</span></div>';
            echo '<div class="order-field"><label>Price:</label> <span>' . htmlspecialchars($order["price"]) . '</span></div>';
            echo '<div class="order-field"><label>Phone:</label> <span>' . htmlspecialchars($order["phone"]) . '</span></div>';
            echo '<div class="order-field"><label>Email:</label> <span>' . htmlspecialchars($order["email"]) . '</span></div>';
            echo '<div class="order-field"><label>Status:</label> <span class="status ' . htmlspecialchars($order["status"]) . '">' . ucfirst(htmlspecialchars($order["status"])) . '</span></div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>