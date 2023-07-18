<?php
include("./components/connection.php");

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
$labDiagnosis = $row['labDiagnosis'];
$labResult = $row['labResult'];
$animalStatus = $row['animalStatus'];
$dateVaccStarted = $row['dateVaccStarted'];
$animalVacc = $row['animalVacc'];
$woundCleaned = $row['woundCleaned'];
$rabiesVaccine = $row['rabiesVaccine'];
$animalOutcome = $row['animalOutcome'];
$caseClass = $row['caseClass'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$outcome = $row['outcome'];
$morbidityWeek = $row['morbidityWeek'];
?>

<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Date Admitted</label>
    <div class="col-sm-6">
        <p><?php echo $dateAdmitted; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Type Of Exposure</label>
    <div class="col-sm-6">
        <p><?php echo $typeOfExposure; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Category</label>
    <div class="col-sm-6">
        <p><?php echo $category; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Bite Site</label>
    <div class="col-sm-6">
        <p><?php echo $biteSite; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Date Bitten</label>
    <div class="col-sm-6">
        <p><?php echo $dateBitten; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Type Of Animal</label>
    <div class="col-sm-6">
        <p><?php echo $typeOfAnimal; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Lab Diagnosis</label>
    <div class="col-sm-6">
        <p><?php echo $labDiagnosis; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Lab Result</label>
    <div class="col-sm-6">
        <p><?php echo $labResult; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Animal Status</label>
    <div class="col-sm-6">
        <p><?php echo $animalStatus; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Date Vacc Started</label>
    <div class="col-sm-6">
        <p><?php echo $dateVaccStarted; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Animal Vaccination</label>
    <div class="col-sm-6">
        <p><?php echo $animalVacc; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Wound Cleaned</label>
    <div class="col-sm-6">
        <p><?php echo $woundCleaned; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Rabies Vaccine</label>
    <div class="col-sm-6">
        <p><?php echo $rabiesVaccine; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Animal Outcome</label>
    <div class="col-sm-6">
        <p><?php echo $animalOutcome; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Case Class</label>
    <div class="col-sm-6">
        <p><?php echo $caseClass; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Morbidity Month</label>
    <div class="col-sm-6">
        <p><?php echo $morbidityMonth; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm-4 form-label font-weight-bold'>Morbidity Week</label>
    <div class="col-sm-6">
        <p><?php echo $morbidityWeek; ?></p>
    </div>
</div>
<?php
include("./components/outcomeView.php");
?>