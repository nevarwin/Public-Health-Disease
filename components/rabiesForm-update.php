<?php
include("connection.php");

$rabiesInfoId = '';
$typeOfExposure = '';
$category = '';
$biteSite = '';
$dateBitten = date("Y-m-d");
$typeOfAnimal = '';
$animalStatus = '';
$dateVaccStarted = date("Y-m-d");
$animalVacc = '';
$woundCleaned = '';
$rabiesVaccine = '';
$animalOutcome = '';
$caseClass = '';

$errorMessage = '';
$successMessage = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM rabiesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$typeOfExposure = $row['typeOfExposure'];
$category = $row['category'];
$biteSite = $row['biteSite'];
$dateBitten = $row['dateBitten'];
$typeOfAnimal = $row['typeOfAnimal'];
$animalStatus = $row['animalStatus'];
$dateVaccStarted = $row['dateVaccStarted'];
$animalVacc = $row['animalVacc'];
$woundCleaned = $row['woundCleaned'];
$rabiesVaccine = $row['rabiesVaccine'];
$animalOutcome = $row['animalOutcome'];
$caseClass = $row['caseClass'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $typeOfExposure = $_POST['typeOfExposure'];
    $category = $_POST['category'];
    $biteSite = $_POST['biteSite'];
    $dateBitten = $_POST['dateBitten'];
    $typeOfAnimal = $_POST['typeOfAnimal'];
    $animalStatus = $_POST['animalStatus'];
    $dateVaccStarted = $_POST['dateVaccStarted'];
    $animalVacc = $_POST['animalVacc'];
    $woundCleaned = $_POST['woundCleaned'];
    $rabiesVaccine = $_POST['rabiesVaccine'];
    $animalOutcome = $_POST['animalOutcome'];
    $caseClass = $_POST['caseClass'];


    // check if the data is empty
    do {
        if (empty($typeOfExposure) or empty($category) or empty($biteSite) or empty($dateBitten) or empty($typeOfAnimal) or empty($animalStatus) or empty($dateVaccStarted) or empty($animalVacc) or empty($woundCleaned) or empty($rabiesVaccine) or empty($animalOutcome) or empty($caseClass)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
        $query = "UPDATE rabiesinfotbl SET
            typeOfExposure = '$typeOfExposure',
            category = '$category',
            biteSite = '$biteSite',
            dateBitten = '$dateBitten',
            typeOfAnimal = '$typeOfAnimal',
            animalStatus = '$animalStatus',
            dateVaccStarted = '$dateVaccStarted',
            animalVacc = '$animalVacc',
            woundCleaned = '$woundCleaned',
            rabiesVaccine = '$rabiesVaccine',
            animalOutcome = '$animalOutcome',
            caseClass = '$caseClass'
        WHERE patientId = $patientId";


        $result = mysqli_query($con, $query);

        if ($result) {
            $successMessage = "Rabies info successfully added!";
            echo "
            <script>
                alert('Rabies form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $errorMessage = "Error submitting form!";
            echo "<script>alert('Error submitting form! " . mysqli_error($con) . "');</script>";
        }
    } while (false);
}

?>

<form action="" method="POST">
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Type Of Exposure</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='typeOfExposure' value='<?php echo $typeOfExposure; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Category</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='category' value='<?php echo $category; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Bite Site</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='biteSite' value='<?php echo $biteSite; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Date Bitten</label>
        <div class="col-sm-6">
            <input type="date" class='form-control' name='dateBitten' value='<?php echo $dateBitten; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Type Of Animal</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='typeOfAnimal' value='<?php echo $typeOfAnimal; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Animal Status</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='animalStatus' value='<?php echo $animalStatus; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Date Vacc Started</label>
        <div class="col-sm-6">
            <input type="date" class='form-control' name='dateVaccStarted' value='<?php echo $dateVaccStarted; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Animal Vaccination</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='animalVacc' value='<?php echo $animalVacc; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Wound Cleaned</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='woundCleaned' value='<?php echo $woundCleaned; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Rabies Vaccine</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='rabiesVaccine' value='<?php echo $rabiesVaccine; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Animal Outcome</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='animalOutcome' value='<?php echo $animalOutcome; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Case Class</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='caseClass' value='<?php echo $caseClass; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class='btn btn-primary'>Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>