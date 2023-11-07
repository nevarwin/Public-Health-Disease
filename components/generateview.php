<?php
include('adminBarangayScript.php');

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Include the database connection file
include('./components/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
}

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

?>
<div class="row">
    <form id="form1" class="col-12 p-0">
        <div class="row col-xl-12 col-lg-12 col-sm-12">
            <div class="dropdown col">
                <label for="disease">Select Disease:</label>
                <select id='selectDisease' class="custom-select" name="disease">
                    <?php
                    $diseases = [
                        1 => 'ABD',
                        2 => 'AEFI',
                        3 => 'AES',
                        4 => 'AFP',
                        5 => 'AMES',
                        6 => 'ChikV',
                        7 => 'DIPH',
                        8 => 'HFMD',
                        9 => 'NNT',
                        10 => 'NT',
                        11 => 'PERT',
                        12 => 'Influenza',
                        13 => 'Dengue',
                        14 => 'Rabies',
                        15 => 'Cholera',
                        16 => 'Hepatitis',
                        17 => 'Measles',
                        18 => 'Meningitis',
                        19 => 'Meningo',
                        20 => 'Typhoid',
                        21 => 'Leptospirosis',
                    ];
                    $selectedDisease = $_GET['disease'] ?? '';

                    foreach ($diseases as $key => $value) {
                        $selected = ($key == $selectedDisease) ? 'selected' : '';
                        echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="dropdown col">
                <label>Select Municipality:</label>
                <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
                    <option>Select Municipality</option>
                    <?php
                    // Connect to database and fetch municipalities
                    $result = mysqli_query($con, 'SELECT * FROM municipality');

                    // Display each municipalities in a dropdown option
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- Barangay Dropdown -->
            <div class="dropdown col">
                <label>Select Barangay:</label>
                <select class="custom-select" id="barangay" name="barangay">
                    <option>Select Barangay</option>
                </select>
            </div>
            <div class="dropdown col">
                <label>Select Sex:</label>
                <select class="custom-select">
                    <option>Select Gender:</option>
                    <?php
                    // Connect to database and fetch municipalities
                    $result = mysqli_query($con, 'SELECT * FROM genders');

                    // Display each municipalities in a dropdown option
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['genderId'] . '">' . $row['gender'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="dropdown col">
                <label>Select Age Group:</label>
                <select class="custom-select">
                    <option>Select Age Group</option>
                    <?php
                    // Connect to database and fetch municipalities
                    $result = mysqli_query($con, 'SELECT age FROM patients');
                    ?>
                    <option>0-2</option>
                    <option>2-12</option>
                    <option>13-18</option>
                    <option>19-24</option>
                    <option>25-44</option>
                    <option>45-64</option>
                    <option>65+</option>
                </select>
            </div>
            <div class="col">
                <div class="row justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50 mr-auto"></i>Generate Report</button>
                </div>
            </div>
        </div>
    </form>
</div>