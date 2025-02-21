<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Printable Version</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 850px;
            margin: 0 auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 2px solid #eef7f2;
            position: relative;
        }
        h1 {
            color: #2d6a4f;
            font-size: 32px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
            text-transform: uppercase;
        }
        h4 {
            color: #2d6a4f;
            font-size: 22px;
            font-weight: 600;
            margin-top: 25px;
            margin-bottom: 15px;
            border-bottom: 2px solid #eef7f2;
            padding-bottom: 10px;
        }
        .section {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 15px;
        }
        .col {
            flex: 1;
            min-width: 250px;
        }
        .label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            font-size: 16px;
        }
        .value {
            padding: 12px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
            word-wrap: break-word;
        }
        .print-btn {
            padding: 10px 20px;
            background-color: #2d6a4f;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            position: absolute;
            top: 30px;
            right: 30px;
            transition: background-color 0.3s ease;
        }
        .print-btn:hover {
            background-color: #1f4b36;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 14px;
            border-top: 1px solid #eef7f2;
            padding-top: 15px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
            }
            .container {
                border: none;
                box-shadow: none;
                padding: 10px;
                max-width: 100%;
                border-radius: 0;
            }
            .print-btn {
                display: none;
            }
            .footer {
                display: none;
            }
            h1 {
                font-size: 28px;
                margin-bottom: 20px;
            }
            h4 {
                font-size: 20px;
                margin-top: 20px;
                margin-bottom: 10px;
            }
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin: 10px;
            }
            .row {
                flex-direction: column;
                gap: 15px;
            }
            .col {
                min-width: 100%;
            }
            h1 {
                font-size: 26px;
            }
            h4 {
                font-size: 18px;
            }
            .print-btn {
                position: static;
                margin: 15px auto;
                display: block;
            }
        }

        .print-heading {
           
    color: #2d6a4f;
    font-size: 32px;
    font-weight: 600;
    /* text-align: center; */
    margin-bottom: 25px;
    text-transform: uppercase;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex">
        <div class="print-heading">Application Form</div>
        <div><button class="print-btn" onclick="window.print()">Print</button></div>
        </div>
       


        <div class="section">
            <h4>पंजीकरण संख्या/Registration No.</h4>
            <div class="row">
                <div class="col">
                    <div class="label">संख्या/Id:</div>
                    <div class="value">REG978545-8566</div>
                </div>
              
            </div>
        </div>    

        <!-- Section 1: व्यक्तिगत जानकारी -->
        <div class="section">
            <h4>व्यक्तिगत जानकारी</h4>
            <div class="row">
                <div class="col">
                    <div class="label">नाम:</div>
                    <div class="value">John Doe</div>
                </div>
                <div class="col">
                    <div class="label">पिता/पति का नाम:</div>
                    <div class="value">Mr. Smith</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">पूरा पता:</div>
                    <div class="value">123 Main Street, Kurukshetra, Haryana</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">जिला:</div>
                    <div class="value">Kurukshetra</div>
                </div>
                <div class="col">
                    <div class="label">पिन कोड:</div>
                    <div class="value">136118</div>
                </div>
                <div class="col">
                    <div class="label">राज्य:</div>
                    <div class="value">Haryana</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">मोबाइल नंबर (10 अंकों का):</div>
                    <div class="value">9876543210</div>
                </div>
                <div class="col">
                    <div class="label">आयु (21-65 वर्ष के बीच):</div>
                    <div class="value">35</div>
                </div>
            </div>
        </div>

        <!-- Section 2: दस्तावेज़ जानकारी -->
        <div class="section">
            <h4>दस्तावेज़ जानकारी</h4>
            <div class="row">
                <div class="col">
                    <div class="label">आधार कार्ड नंबर:</div>
                    <div class="value">1234-5678-9012</div>
                </div>
                <div class="col">
                    <div class="label">फैमिली आईडी नंबर:</div>
                    <div class="value">F123456789</div>
                </div>
            </div>
        </div>

        <!-- Section 3: व्यवसाय का प्रकार -->
        <div class="section">
            <h4>व्यवसाय का प्रकार</h4>
            <div class="row">
                <div class="col">
                    <div class="label">चुना गया व्यवसाय:</div>
                    <div class="value">चाय/कॉफी/जलजीरा/शिकंजी</div>
                </div>
            </div>
        </div>

        <!-- Section 4: कार्य स्थान -->
        <div class="section">
            <h4>कार्य स्थान</h4>
            <div class="row">
                <div class="col">
                    <div class="label">स्थान:</div>
                    <div class="value">गुलजारी लाल पार्क, लाइब्रेरी के पास, ब्रह्मसरोवर पार्किंग क्षेत्र के पूर्व में</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">सहमति:</div>
                    <div class="value">मैं सहमत हूँ कि स्थान परिवर्तन पर तुरंत जगह खाली कर दूँगा/दूँगी</div>
                </div>
            </div>
        </div>

        <!-- Section 5: बैंक विवरण (रिफंड के लिए) -->
        <div class="section">
            <h4>बैंक विवरण (रिफंड हेतु)</h4>
            <div class="row">
                <div class="col">
                    <div class="label">कुल राशि:</div>
                    <div class="value">₹10,000 (अग्रिम भुगतान)</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">खाता धारक का नाम:</div>
                    <div class="value">John Doe</div>
                </div>
                <div class="col">
                    <div class="label">बैंक खाता नंबर:</div>
                    <div class="value">123456789012</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="label">बैंक का नाम:</div>
                    <div class="value">State Bank of India</div>
                </div>
                <div class="col">
                    <div class="label">आईएफएससी कोड:</div>
                    <div class="value">SBIN0001234</div>
                </div>
                <div class="col">
                    <div class="label">बैंक शाखा:</div>
                    <div class="value">Kurukshetra Branch</div>
                </div>
            </div>
        </div>

        <!-- Section 6: दस्तावेज़ अपलोड करें -->
        <div class="section">
            <h4>दस्तावेज़ अपलोड करें (PDF/JPEG, अधिकतम 2MB)</h4>
            <div class="row">
                <div class="col">
                    <div class="label">फैमिली आईडी:</div>
                    <div class="value">family_id_document.pdf</div>
                </div>
                <div class="col">
                    <div class="label">आधार कार्ड:</div>
                    <div class="value">aadhar_card.jpg</div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Generated on: <?php echo date('F d, Y'); ?></p>
        </div>
    </div>
</body>
</html>