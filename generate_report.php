<?php
// the header and  value is longer than the a4 error

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Include the database connection file
include('./components/connection.php');

// Fetch the data from the patients table
$sql = "SELECT `patientId`, `firstName`, `lastName`, `gender`, `disease`, `dob`, `age`, `barangay`, `municipality`, `creationDate` FROM patients";
$result = mysqli_query($con, $sql);

// Create a new PDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

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

// Set table header values
$header = array('Patient Id', 'First Name', 'Last Name', 'Gender', 'Disease', 'Date of Birth', 'Age', 'Barangay', 'Municipality', 'Year');

// Set table header styling
$pdf->SetFillColor(230, 230, 230);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.1);
$pdf->SetFont('', 'B');
$pdf->Cell(15, 7, '#', 1, 0, 'C', 1);
foreach ($header as $col) {
    $pdf->Cell(20, 7, $col, 1, 0, 'C', 1);
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
    $pdf->Cell(15, 7, $rowCount, 1, 0, 'C', 1);
    foreach ($row as $column) {
        $pdf->Cell(20, 7, $column, 1, 0, 'C', 1);
    }
    $pdf->Ln();
    $rowCount++;
}

// Output the PDF
$pdf->Output('patient_report.pdf', 'D');
