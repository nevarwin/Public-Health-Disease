<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Include the database connection file
include('./components/connection.php');

// Fetch the data from the patients table
$sql = "SELECT
    `patientId`,
    `firstName`,
    `lastName`,
    genders.`gender`,
    diseases.`disease`,
    `dob`,
    `age`,
    barangay.`barangay`,
    municipality.`municipality`,
    `postalCode`,
    YEAR(`creationDate`) AS `year`
FROM
    patients
JOIN
	genders ON patients.gender = genders.genderId
JOIN
	diseases ON patients.disease = diseases.diseaseId
JOIN
	barangay ON patients.barangay = barangay.id
JOIN
	municipality ON patients.municipality = municipality.munId";
$result = mysqli_query($con, $sql);

// Create a new PDF instance
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8'); // Set page orientation to landscape

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Patient Report');
$pdf->SetSubject('Patient Data');
$pdf->SetKeywords('Patient, Report, PDF');

// Set default font
$pdf->SetFont('helvetica', '', 8);

// Add a page
$pdf->AddPage();

// Define your logo file path
$logoPath = 'C:\xampp\htdocs\admin2gh\assets\img\caviteLogo.png';

// Set title text
$titleText = 'Cavite Province Patient Report';

// Set font for the title
// $pdf->SetFont('helvetica', 'B', 12);

// Set logo
$pdf->Image($logoPath, 100, 10, 30,); // Adjust the coordinates and size as needed

// Center the title horizontally
// $pdf->SetX(0);
$pdf->Cell(0, 30, $titleText, 0, 1, 'C');

// Set table header values
$header = array('Patient Id', 'First Name', 'Last Name', 'Gender', 'Disease', 'Date of Birth', 'Age', 'Barangay', 'Municipality', 'Postal Code', 'Year');

// Set table header styling
$pdf->SetFillColor(230, 230, 230);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->SetFont('', 'B');
$pdf->Cell(17, 7, '#', 1, 0, 'C', 1);
foreach ($header as $col) {
    $pdf->Cell(24, 7, $col, 1, 0, 'C', 1);
}
$pdf->Ln();

// Set table data styling
$pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$pdf->SetFont('');

// Initialize row counter
$rowCount = 1;

// Iterate over the result set and add table rows
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(17, 7, $rowCount, 1, 0, 'C', 1);
    foreach ($row as $column) {
        $pdf->Cell(24, 7, $column, 1, 0, 'C', 1);
    }
    $pdf->Ln();
    $rowCount++;
}

// Output the PDF
$pdf->Output('patient_report.pdf', 'D');
