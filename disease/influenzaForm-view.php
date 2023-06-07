<?php
include('./components/alertMessage.php');
include("./components/connection.php");

$user_data = check_login($con);

$patientId = '';

$message = '';
$type = '';
$strongContent = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    echo "User ID is not set.";
    // header('location: http://localhost/admin2gh/patientTable.php');
    // exit;
}
$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM influenzainfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$labResult = $row['labResult'];
$organism = $row['organism'];
$vacName = $row['vacName'];
$vaccinated = $row['vaccinated'];
$vacDate1 = $row['vacDate1'];
$vacDate2 = $row['vacDate2'];
$boosterName = $row['boosterName'];
$boosterDate = $row['boosterDate'];
$sari = $row['sari'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

?>

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>

    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label font-weight-bold">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Lab Result</label>
        <div class="col-sm-6">
            <p> <?php echo $labResult; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Organism</label>
        <div class="col-sm-6">
            <p> <?php echo $organism; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Vaccinated</label>
        <div class="col-sm-6">
            <p> <?php echo $vaccinated; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Vaccine Name</label>
        <div class="col-sm-6">
            <p> <?php echo $vacName; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Vaccination Date 1</label>
        <div class="col-sm-6">
            <p> <?php echo $vacDate1; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Vaccination Date 2</label>
        <div class="col-sm-6">
            <p> <?php echo $vacDate2; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Booster Name</label>
        <div class="col-sm-6">
            <p> <?php echo $boosterName; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Booster Date</label>
        <div class="col-sm-6">
            <p> <?php echo $boosterDate; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Sari</label>
        <div class="col-sm-6">
            <p> <?php echo $sari; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Case Classification</label>
        <div class="col-sm-6">
            <p> <?php echo $caseClass; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Morbidity Month</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Morbidit yWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo ucfirst($outcome); ?>
            </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>