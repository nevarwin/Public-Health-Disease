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
        <label for="" class="col-sm-3 form-label">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Measles Vaccine</label>
        <div class="col-sm-6">
            <p> <?php echo $measVacc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vitaminA</label>
        <div class="col-sm-6">
            <p> <?php echo $vitaminA; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <p> <?php echo $cough; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">koplikSpot</label>
        <div class="col-sm-6">
            <p> <?php echo $koplikSpot; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
        <div class="col-sm-6">
            <p> <?php echo $lastVac; ?>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Runny Nose</label>
        <div class="col-sm-6">
            <p> <?php echo $runnyNose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Red Eye</label>
        <div class="col-sm-6">
            <p> <?php echo $redEyes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthritisArthralgia</label>
        <div class="col-sm-6">
            <p> <?php echo $arthritisArthralgia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">swolympNod</label>
        <div class="col-sm-6">
            <p> <?php echo $swolympNod; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Complications</label>
        <div class="col-sm-6">
            <p> <?php echo $complications; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Case</label>
        <div class="col-sm-6">
            <p> <?php echo $otherCase; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Final Class</label>
        <div class="col-sm-6">
            <p> <?php echo $finalClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Infection Source</label>
        <div class="col-sm-6">
            <p> <?php echo $infectionSource; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Morbidity Month</label>
        <div class="col-sm-6">
            <p><?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class=" row mb-3">
        <label class="col-sm-3 form-label">Morbidity Week</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class=" row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo $outcome; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>