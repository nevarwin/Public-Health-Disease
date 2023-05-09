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
    // header('location: http://localhost/admin2gh/patientTable.php');
    echo 'no id';
    exit;
}

$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM rabiesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    // header('location: http://localhost/admin2gh/patientTable.php');
    echo 'error in row';
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
?>


<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Type Of Exposure</label>
    <div class="col-sm-6">
        <p><?php echo $typeOfExposure; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Category</label>
    <div class="col-sm-6">
        <p><?php echo $category; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Bite Site</label>
    <div class="col-sm-6">
        <p><?php echo $biteSite; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Date Bitten</label>
    <div class="col-sm-6">
        <p><?php echo $dateBitten; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Type Of Animal</label>
    <div class="col-sm-6">
        <p><?php echo $typeOfAnimal; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Animal Status</label>
    <div class="col-sm-6">
        <p><?php echo $animalStatus; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Date Vacc Started</label>
    <div class="col-sm-6">
        <p><?php echo $dateVaccStarted; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Animal Vaccination</label>
    <div class="col-sm-6">
        <p><?php echo $animalVacc; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Wound Cleaned</label>
    <div class="col-sm-6">
        <p><?php echo $woundCleaned; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Rabies Vaccine</label>
    <div class="col-sm-6">
        <p><?php echo $rabiesVaccine; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Animal Outcome</label>
    <div class="col-sm-6">
        <p><?php echo $animalOutcome; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-3 col-form-label'>Case Class</label>
    <div class="col-sm-6">
        <p><?php echo $caseClass; ?></p>
    </div>
</div>