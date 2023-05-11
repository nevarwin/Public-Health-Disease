<?php
include("./components/connection.php");

$patientId = '';
$stoolCulture = '';
$organism = '';
$outcome = '';
$dateDied = date("Y-m-d");

$message = '';
$type = '';
$strongContent = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    echo "User ID is not set.";
    // header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM aesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    // header('location: http://localhost/admin2gh/patientTable.php');
    echo 'error in row';
    exit;
}

$labResult = $row['labResult'];
$organism = $row['organism'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityWeek = $row['morbidityWeek'];
$morbidityMonth = $row['morbidityMonth'];
$caseClass = $row['caseClass'];
?>

<div class="row mb-2">
    <label for="" class='col-sm form-label'>Date Admitted</label>
    <div class="col-sm-6">
        <p><?php echo $dateAdmitted; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Lab Result</label>
    <div class="col-sm-6">
        <p><?php echo $labResult; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Organism</label>
    <div class="col-sm-6">
        <p><?php echo $organism; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Outcome</label>
    <div class="col-sm-6">
        <p><?php echo $outcome; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Morbidity Month</label>
    <div class="col-sm-6">
        <p><?php echo $morbidityMonth; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Morbidity Week</label>
    <div class="col-sm-6">
        <p><?php echo $morbidityWeek; ?></p>
    </div>
</div>
<div class="row mb-2">
    <label for="" class='col-sm form-label'>Date Died</label>
    <div class="col-sm-6">
        <p><?php echo $dateDied; ?></p>
    </div>
</div>