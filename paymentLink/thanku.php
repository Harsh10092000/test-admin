<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        h1 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form {
            margin-bottom: 20px;
        }

        input {
            width: 70%;
            padding: 8px;
            border: 1px solid #ccc;
        }

        button {
            padding: 8px 15px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .result, .no-result {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .info {
            margin: 5px 0;
        }

        .status-approved { color: green; }
        .status-pending { color: orange; }
        .status-rejected { color: red; }

        .no-result {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Check Application Status</h1>
        <form class="search-form" onsubmit="searchOrder(event)">
            <input type="text" id="orderId" placeholder="Enter Registration ID" required>
            <button type="submit">Search</button>
        </form>
        
        <div id="results" class="result">
            <div class="info"><strong>Name:</strong> <span id="name"></span></div>
            <div class="info"><strong>Father/Husband:</strong> <span id="fatherName"></span></div>
            <div class="info"><strong>Address:</strong> <span id="address"></span>, <span id="district"></span>, <span id="state"></span> - <span id="pincode"></span></div>
            <div class="info"><strong>Contact:</strong> <span id="mobile"></span></div>
            <div class="info"><strong>Aadhar:</strong> <span id="aadhar"></span></div>
            <div class="info"><strong>Business Type:</strong> <span id="businessType"></span></div>
            <div class="info"><strong>Bank:</strong> <span id="bankHolder"></span> - <span id="bankAccount"></span> (<span id="bankName"></span>)</div>
            <div class="info"><strong>Status:</strong> <span id="status"></span></div>
        </div>

        <div id="noResults" class="no-result">
            <p>No results found for this Registration ID.</p>
        </div>
    </div>

    <script>
        const sampleData = {
            "REG20250220-12345": {
                name: "Rahul Sharma",
                fatherName: "Mohan Sharma",
                address: "123, Main Street",
                district: "Kurukshetra",
                pincode: "136118",
                state: "Haryana",
                mobile: "9876543210",
                aadhar: "1234-5678-9012",
                businessType: "Fast Food",
                bankHolder: "Rahul Sharma",
                bankAccount: "12345678901",
                bankName: "State Bank of India",
                status: "Approved"
            }
        };

        function searchOrder(event) {
            event.preventDefault();
            const orderId = document.getElementById('orderId').value.trim();
            const results = document.getElementById('results');
            const noResults = document.getElementById('noResults');

            results.style.display = 'none';
            noResults.style.display = 'none';

            const data = sampleData[orderId];
            if (data) {
                document.getElementById('name').textContent = data.name;
                document.getElementById('fatherName').textContent = data.fatherName;
                document.getElementById('address').textContent = data.address;
                document.getElementById('district').textContent = data.district;
                document.getElementById('pincode').textContent = data.pincode;
                document.getElementById('state').textContent = data.state;
                document.getElementById('mobile').textContent = data.mobile;
                document.getElementById('aadhar').textContent = data.aadhar;
                document.getElementById('businessType').textContent = data.businessType;
                document.getElementById('bankHolder').textContent = data.bankHolder;
                document.getElementById('bankAccount').textContent = data.bankAccount;
                document.getElementById('bankName').textContent = data.bankName;
                const status = document.getElementById('status');
                status.textContent = data.status;
                status.className = `status-${data.status.toLowerCase()}`;
                results.style.display = 'block';
            } else {
                noResults.style.display = 'block';
            }
        }
    </script>
</body>
</html>