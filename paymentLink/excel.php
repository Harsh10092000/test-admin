<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form Data - Excel Export</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        h1 {
            color: #2d6a4f;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        .export-btn {
            padding: 10px 20px;
            background-color: #2d6a4f;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            transition: background-color 0.3s ease;
        }
        .export-btn:hover {
            background-color: #1f4b36;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Application Form Data - Export to Excel</h1>
        <button class="export-btn" onclick="exportToExcel()">Download Excel</button>
    </div>

    <script>
        function exportToExcel() {
            // Headers (matching your PHP code)
            const headers = [
                'Registration No./पंजीकरण संख्या',
                'Name/नाम',
                'Father/Husband Name/पिता/पति का नाम',
                'Full Address/पूरा पता',
                'District/जिला',
                'Pin Code/पिन कोड',
                'State/राज्य',
                'Mobile Number (10 digits)/मोबाइल नंबर (10 अंकों का)',
                'Age (21-65 years)/आयु (21-65 वर्ष के बीच)',
                'Aadhar Card Number/आधार कार्ड नंबर',
                'Family ID Number/फैमिली आईडी नंबर',
                'Chosen Business/चुना गया व्यवसाय',
                'Location/स्थान',
                'Consent/सहमति',
                'Total Amount/कुल राशि',
                'Account Holder Name/खाता धारक का नाम',
                'Bank Account Number/बैंक खाता नंबर',
                'Bank Name/बैंक का नाम',
                'IFSC Code/आईएफएससी कोड',
                'Bank Branch/बैंक शाखा',
                'Family ID Document/फैमिली आईडी',
                'Aadhar Card Document/आधार कार्ड'
            ];

            // Dummy data (matching your PHP code)
            const dummyData = [
                [
                    'REG978545-8566', 'John Doe', 'Mr. Smith', '123 Main Street, Kurukshetra, Haryana', 'Kurukshetra', '136118', 'Haryana', '9876543210', '35',
                    '1234-5678-9012', 'F123456789', 'चाय/कॉफी/जलजीरा/शिकंजी', 'गुलजारी लाल पार्क, लाइब्रेरी के पास, ब्रह्मसरोवर पार्किंग क्षेत्र के पूर्व में',
                    'मैं सहमत हूँ कि स्थान परिवर्तन पर तुरंत जगह खाली कर दूँगा/दूँगी', '₹10,000 (अग्रिम भुगतान)', 'John Doe', '123456789012',
                    'State Bank of India', 'SBIN0001234', 'Kurukshetra Branch', 'family_id_document.pdf', 'aadhar_card.jpg'
                ],
                [
                    'REG978546-8567', 'Jane Smith', 'Mr. Johnson', '456 Park Road, Delhi, Delhi', 'Delhi', '110011', 'Delhi', '9876543211', '42',
                    '5678-9012-3456', 'F234567890', 'फल/सब्जी की दुकान', 'चांदनी चौक, दिल्ली, पार्किंग क्षेत्र के पास',
                    'मैं सहमत हूँ कि स्थान परिवर्तन पर तुरंत जगह खाली करूँगी', '₹12,000 (अग्रिम भुगतान)', 'Jane Smith', '234567890123',
                    'HDFC Bank', 'HDFC0001234', 'Connaught Place Branch', 'family_id_document2.pdf', 'aadhar_card2.jpg'
                ],
                [
                    'REG978547-8568', 'Rahul Sharma', 'Mr. Gupta', '789 Market Lane, Chandigarh, Punjab', 'Chandigarh', '160017', 'Punjab', '9876543212', '28',
                    '9012-3456-7890', 'F345678901', 'खाद्य स्टॉल', 'सेक्टर 17, चंडीगढ़, बस स्टैंड के पास',
                    'मैं सहमत हूँ कि स्थान परिवर्तन पर तुरंत जगह खाली कर दूँगा', '₹8,000 (अग्रिम भुगतान)', 'Rahul Sharma', '345678901234',
                    'ICICI Bank', 'ICIC0001234', 'Sector 17 Branch', 'family_id_document3.pdf', 'aadhar_card3.jpg'
                ]
            ];

            // Create workbook and worksheet
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.aoa_to_sheet([headers, ...dummyData]);

            // Style headers (bold, green color, light gray background)
            ws['!cols'] = headers.map(() => ({ wch: 20 })); // Auto-width columns
            const range = XLSX.utils.decode_range(ws['!ref']);
            for (let C = range.s.c; C <= range.e.c; ++C) {
                const cell = ws[XLSX.utils.encode_cell({ r: 0, c: C })];
                if (cell) {
                    cell.s = {
                        font: { bold: true, color: { rgb: "2D6A4F" } },
                        fill: { fgColor: { rgb: "F9FAFB" } },
                        border: {
                            top: { style: 'thin', color: { rgb: "E5E7EB" } },
                            bottom: { style: 'thin', color: { rgb: "E5E7EB" } },
                            left: { style: 'thin', color: { rgb: "E5E7EB" } },
                            right: { style: 'thin', color: { rgb: "E5E7EB" } }
                        }
                    };
                }
            }

            // Style data rows (borders)
            for (let R = 1; R <= range.e.r; ++R) {
                for (let C = range.s.c; C <= range.e.c; ++C) {
                    const cell = ws[XLSX.utils.encode_cell({ r: R, c: C })];
                    if (cell) {
                        cell.s = {
                            border: {
                                top: { style: 'thin', color: { rgb: "E5E7EB" } },
                                bottom: { style: 'thin', color: { rgb: "E5E7EB" } },
                                left: { style: 'thin', color: { rgb: "E5E7EB" } },
                                right: { style: 'thin', color: { rgb: "E5E7EB" } }
                            },
                            font: { size: 12 }
                        };
                    }
                }
            }

            // Add worksheet to workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Application Data');

            // Generate and trigger download
            const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
            const blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'application_form_data.xlsx';
            link.click();
            window.URL.revokeObjectURL(url);
        }
    </script>
</body>
</html>