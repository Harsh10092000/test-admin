<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .details-header {
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-id-heading {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .order-id {
            padding-left: 10px;
            font-size: 16px;
            color: #555;
        }

        .btn-design {
            padding: 5px 15px;
            border-radius: 5px;
            font-weight: 600;
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border: 1px solid #0d6efd;
            cursor: pointer;
        }

        .btn-design:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .sec-heading {
            font-weight: 600;
            font-size: 20px;
            color: rgb(51, 51, 51);
            margin: 0;
            padding-top: 12px;
            padding-bottom: 12px;
            position: relative;
            border-bottom: 1px solid #ccc;
            margin-bottom: 12px;
        }

        .sec-heading:before {
            content: "";
            position: absolute;
            width: 120px;
            height: 3px;
            z-index: 2;
            bottom: -1px;
            background-color: #0d6efd;
        }

        .btm-border {
            font-size: 14px;
            color: rgb(102, 102, 102);
            line-height: 24px;
            padding: 11px 0px 14px;
            margin: 0px;
            border-bottom: 1px solid rgb(247, 247, 247);
            display: flex;
        }

        .user-details .sec-1 {
            font-size: 15px;
            padding: 0px 10px 0px 0px;
            margin: 0px;
            width: 25%;
        }

        .user-details .sec-2 {
            color: rgb(51, 51, 51);
            font-weight: 700;
            font-size: 15px;
            padding: 0px;
            margin: 0px;
            width: 75%;
        }

        .curr-status {
            color: red !important;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #007bff;
        }

        .search-btn {
            padding: 8px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .search-btn:hover {
            background: #0056b3;
        }

        .result, .no-result {
            display: none;
        }

        .no-result {
            text-align: center;
            color: #dc3545;
            font-size: 14px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="font-size: 22px; color: #333; text-align: center; margin-bottom: 20px;">Check Application Status</h1>
        <form class="search-form" onsubmit="searchOrder(event)">
            <input type="text" id="orderId" placeholder="Enter Registration ID" required>
            <button type="submit" class="search-btn">Search</button>
        </form>

        <div id="results" class="result">
            <div class="details-header">
                <div>
                    <span class="order-id-heading">Order Id:</span>
                    <span class="order-id" id="resultOrderId"></span>
                </div>
                <button class="btn-design" onclick="window.print()">Print</button>
            </div>

            <div>
                <div class="sec-heading">Current Status</div>
                <div class="btm-border user-details">
                    <div class="sec-1">Status</div>
                    <div class="sec-2 curr-status" id="resultStatus"></div>
                </div>
            </div>

            <div>
                <div class="sec-heading">Personal Details</div>
                <div class="btm-border user-details">
                    <div class="sec-1">Name</div>
                    <div class="sec-2" id="resultName"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Father/Husband</div>
                    <div class="sec-2" id="resultFatherName"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Address</div>
                    <div class="sec-2" id="resultAddress"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">District</div>
                    <div class="sec-2" id="resultDistrict"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Pin Code</div>
                    <div class="sec-2" id="resultPincode"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">State</div>
                    <div class="sec-2" id="resultState"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Mobile</div>
                    <div class="sec-2" id="resultMobile"></div>
                </div>
            </div>

            <div>
                <div class="sec-heading">Business Details</div>
                <div class="btm-border user-details">
                    <div class="sec-1">Type</div>
                    <div class="sec-2" id="resultBusinessType"></div>
                </div>
            </div>

            <div>
                <div class="sec-heading">Documents</div>
                <div class="btm-border user-details">
                    <div class="sec-1">Aadhar</div>
                    <div class="sec-2" id="resultAadhar"></div>
                </div>
            </div>

            <div>
                <div class="sec-heading">Bank Details</div>
                <div class="btm-border user-details">
                    <div class="sec-1">Holder</div>
                    <div class="sec-2" id="resultBankHolder"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Account</div>
                    <div class="sec-2" id="resultBankAccount"></div>
                </div>
                <div class="btm-border user-details">
                    <div class="sec-1">Bank</div>
                    <div class="sec-2" id="resultBankName"></div>
                </div>
            </div>
        </div>

        <div id="noResults" class="no-result">
            <p>No results found for this Registration ID. Please verify and try again.</p>
        </div>
    </div>

    <script>
        const sampleData = {
            "REG20250220-12345": {
                orderId: "REG20250220-12345",
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
                document.getElementById('resultOrderId').textContent = data.orderId;
                document.getElementById('resultStatus').textContent = data.status;
                document.getElementById('resultName').textContent = data.name;
                document.getElementById('resultFatherName').textContent = data.fatherName;
                document.getElementById('resultAddress').textContent = data.address;
                document.getElementById('resultDistrict').textContent = data.district;
                document.getElementById('resultPincode').textContent = data.pincode;
                document.getElementById('resultState').textContent = data.state;
                document.getElementById('resultMobile').textContent = data.mobile;
                document.getElementById('resultAadhar').textContent = data.aadhar;
                document.getElementById('resultBusinessType').textContent = data.businessType;
                document.getElementById('resultBankHolder').textContent = data.bankHolder;
                document.getElementById('resultBankAccount').textContent = data.bankAccount;
                document.getElementById('resultBankName').textContent = data.bankName;
                results.style.display = 'block';
            } else {
                noResults.style.display = 'block';
            }
        }
    </script>
</body>
</html>