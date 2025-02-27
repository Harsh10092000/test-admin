<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Printable Version</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', 'Noto Sans Devanagari', sans-serif;
            margin: 0;
            padding: 15px;
            background-color: #fff;
            color: #333;
            line-height: 1.3;
        }

        .container {
            max-width: 750px;
            margin: 0 auto;
            padding: 15px;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .print-heading {
            color: #2d6a4f;
            font-size: 20px;
            font-weight: 600;
            text-transform: none;
            font-family: 'Inter', sans-serif;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .print-btn, .download-btn {
            padding: 6px 12px;
            background-color: #2d6a4f;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .print-btn:hover, .download-btn:hover {
            background-color: #1f4b36;
        }

        .section {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .section h4 {
            color: #2d6a4f;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 6px;
            font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
        }

        .row , .pdf-optimized .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 8px;
            margin-bottom: 8px;
        }

        .label {
            font-weight: 500;
            color: #555;
            margin-bottom: 4px;
            font-size: 12px;
            font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
        }

        .value {
            padding: 6px 8px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 12px;
            color: #333;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.02);
            /* word-wrap: break-word; */
            font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            color: #888;
            font-size: 10px;
            border-top: 1px solid #e5e7eb;
            padding-top: 8px;
            font-family: 'Inter', sans-serif;
        }

        /* Page break class for sections */
        .page-break {
            page-break-before: always;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
                -webkit-print-color-adjust: exact; /* Ensure colors print accurately */
            }

            .container {
                border: none;
                box-shadow: none;
                padding: 5px;
                max-width: 100%;
                border-radius: 0;
                margin: 0;
            }

            .header, .print-btn, .download-btn, .footer {
                display: none;
            }

            .section {
                padding: 5px;
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                box-shadow: none;
                margin-bottom: 10px;
                page-break-inside: avoid; /* Prevent section breaks within content */
            }

            .section h4 {
                font-size: 14px;
                margin-bottom: 6px;
                padding-bottom: 4px;
                border-bottom: 1px solid #e5e7eb;
                font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
            }

            .value {
                border: 1px solid #e5e7eb;
                padding: 4px 6px;
                box-shadow: none;
                font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
            }

            .row , .pdf-optimized .row {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 6px;
                margin-bottom: 6px;
                page-break-inside: avoid; /* Prevent row breaks within grid */
            }

            .page-break {
                page-break-before: always;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
                margin: 5px;
            }

            .row, .pdf-optimized .row {
                grid-template-columns: 1fr;
                gap: 6px;
            }

            .print-heading {
                font-size: 18px;
                font-family: 'Inter', sans-serif;
            }

            .buttons {
                flex-direction: column;
                gap: 8px;
            }

            .print-btn, .download-btn {
                width: 100%;
                font-family: 'Inter', sans-serif;
            }

            .section {
                padding: 8px;
            }

            .section h4 {
                font-size: 14px;
                font-family: 'Noto Sans Devanagari', 'Inter', sans-serif;
            }
        }

        /* Ensure proper rendering for PDF */
        .pdf-optimized {
            font-family: 'Noto Sans Devanagari', 'Inter', sans-serif !important;
            line-height: 1.3 !important;
            background: #ffffff !important;
            color: #333 !important;
        }

        .pdf-optimized .section {
            background: #ffffff !important;
            border: 1px solid #e5e7eb !important;
            box-shadow: none !important;
        }

        .pdf-optimized .value {
            background: #fff !important;
            border: 1px solid #ddd !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="print-heading">Application Form</div>
            <div class="buttons">
                <button class="print-btn" onclick="window.print()">Print</button>
                <button class="download-btn" onclick="downloadPDF()">Download File</button>
            </div>
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
        <div class="section ">
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
        <div class="section ">
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
        <div class="section page-break">
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
        <div class="section ">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function downloadPDF() {
                const element = document.querySelector('.container');
                const opt = {
                    margin: 0,
                    filename: 'application_form.pdf',
                    image: { type: 'jpeg', quality: 0.7 },
                    html2canvas: { 
                        scale: 2, 
                        useCORS: true,
                        letterRendering: true,
                        logging: false,
                        allowTaint: true
                    },
                    jsPDF: { 
                        unit: 'mm', 
                        format: 'a4', 
                        orientation: 'portrait',
                        putOnlyUsedFonts: true
                    },
                    pagebreak: { 
                        mode: ['avoid-all', 'css', 'legacy'],
                        before: '.page-break'
                    }
                };

                html2pdf().set(opt).from(element).toPdf().get('pdf').then((pdf) => {
                    pdf.setProperties({
                        title: 'Application Form',
                        author: 'Your Organization',
                        creator: 'Your Application'
                    });
                    pdf.output('save');
                });
            }

            const downloadBtn = document.querySelector('.download-btn');
            if (downloadBtn) {
                downloadBtn.addEventListener('click', downloadPDF);
            }
        });
    </script>
</body>
</html>