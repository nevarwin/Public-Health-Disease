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
$sql = "SELECT * FROM measlesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$measVacc = $row['measVacc'];
$vitaminA = $row['vitaminA'];
$cough = $row['cough'];
$koplikSpot = $row['koplikSpot'];
$lastVac = $row['lastVac'];
$runnyNose = $row['runnyNose'];
$redEyes = $row['redEyes'];
$arthritisArthralgia = $row['arthritisArthralgia'];
$swolympNod = $row['swolympNod'];
$otherSymptoms = $row['otherSymptoms'];
$complications = $row['complications'];
$otherCase = $row['otherCase'];
$finalClass = $row['finalClass'];
$infectionSource = $row['infectionSource'];
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
        <label class="col-sm-3 form-label font-weight-bold">Measles Vaccine</label>
        <div class="col-sm-6">
            <p> <?php echo $measVacc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">VitaminA</label>
        <div class="col-sm-6">
            <p> <?php echo $vitaminA; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Cough</label>
        <div class="col-sm-6">
            <p> <?php echo $cough; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Koplik Spot</label>
        <div class="col-sm-6">
            <p> <?php echo $koplikSpot; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label font-weight-bold">Last Vaccine</label>
        <div class="col-sm-6">
            <p> <?php echo $lastVac; ?>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Runny Nose</label>
        <div class="col-sm-6">
            <p> <?php echo $runnyNose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Red Eye</label>
        <div class="col-sm-6">
            <p> <?php echo $redEyes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Arthritis Arthralgia</label>
        <div class="col-sm-6">
            <p> <?php echo $arthritisArthralgia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">SwolympNod</label>
        <div class="col-sm-6">
            <p> <?php echo $swolympNod; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Complications</label>
        <div class="col-sm-6">
            <p> <?php echo $complications; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Other Case</label>
        <div class="col-sm-6">
            <p> <?php echo $otherCase; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Final Class</label>
        <div class="col-sm-6">
            <p> <?php echo $finalClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Infection Source</label>
        <div class="col-sm-6">
            <p> <?php echo $infectionSource; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Morbidity Month</label>
        <div class="col-sm-6">
            <p><?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class=" row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Morbidity Week</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class=" row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo ucfirst($outcome); ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>