<?php
// Include the PhpSpreadsheet library
require_once __DIR__ . '/vendor/autoload.php'; // Adjust path as needed

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection (using PDO)
$host = 'localhost';
$dbname = 'application_db';
$username = 'your_username'; // Replace with your MySQL username
$password = 'your_password'; // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch data from the database
    $stmt = $pdo->query("SELECT registration_no, name, father_name, address, district, pin_code, state, mobile, age, aadhar, family_id, business, location, consent, amount, account_holder, account_no, bank_name, ifsc, branch, family_doc, aadhar_doc FROM applications");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set headers for the Excel sheet (matching your application form fields)
$headers = [
    'A1' => 'Registration No./पंजीकरण संख्या',
    'B1' => 'Name/नाम',
    'C1' => 'Father/Husband Name/पिता/पति का नाम',
    'D1' => 'Full Address/पूरा पता',
    'E1' => 'District/जिला',
    'F1' => 'Pin Code/पिन कोड',
    'G1' => 'State/राज्य',
    'H1' => 'Mobile Number (10 digits)/मोबाइल नंबर (10 अंकों का)',
    'I1' => 'Age (21-65 years)/आयु (21-65 वर्ष के बीच)',
    'J1' => 'Aadhar Card Number/आधार कार्ड नंबर',
    'K1' => 'Family ID Number/फैमिली आईडी नंबर',
    'L1' => 'Chosen Business/चुना गया व्यवसाय',
    'M1' => 'Location/स्थान',
    'N1' => 'Consent/सहमति',
    'O1' => 'Total Amount/कुल राशि',
    'P1' => 'Account Holder Name/खाता धारक का नाम',
    'Q1' => 'Bank Account Number/बैंक खाता नंबर',
    'R1' => 'Bank Name/बैंक का नाम',
    'S1' => 'IFSC Code/आईएफएससी कोड',
    'T1' => 'Bank Branch/ब बैंक शाखा',
    'U1' => 'Family ID Document/फैमिली आईडी',
    'V1' => 'Aadhar Card Document/आधार कार्ड'
];

// Apply headers to the sheet
$sheet->fromArray(array_values($headers), NULL, 'A1');

// Apply data starting from row 2
$sheet->fromArray($data, NULL, 'A2');

// Style headers
$sheet->getStyle('A1:V1')->applyFromArray([
    'font' => [
        'bold' => true,
        'color' => ['rgb' => '2d6a4f'],
        'size' => 12,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'f9fafb'],
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => 'e5e7eb'],
        ],
    ],
]);

// Style data rows
$sheet->getStyle('A2:V' . ($sheet->getHighestRow()))->applyFromArray([
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['rgb' => 'e5e7eb'],
        ],
    ],
    'font' => [
        'size' => 12,
    ],
]);

// Auto-size columns
foreach (range('A', 'V') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

// Set document properties
$spreadsheet->getProperties()
    ->setCreator('Your Organization')
    ->setTitle('Application Form Data')
    ->setSubject('Export of Application Data')
    ->setDescription('Excel sheet containing application form data');

// Create writer and output Excel file for download
$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="application_form_data.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit;