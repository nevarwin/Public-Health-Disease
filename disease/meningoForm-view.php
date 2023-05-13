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
$sql = "SELECT * FROM meningoinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$seizure = $row['seizure'];
$malaise = $row['malaise'];
$headache = $row['headache'];
$stiffNeck = $row['stiffNeck'];
$cough = $row['cough'];
$rash = $row['rash'];
$vomiting = $row['vomiting'];
$soreThroat = $row['soreThroat'];
$petechia = $row['petechia'];
$sensoriumCh = $row['sensoriumCh'];
$runnyNose = $row['runnyNose'];
$purpura = $row['purpura'];
$drowsiness = $row['drowsiness'];
$dyspnea = $row['dyspnea'];
$otherSS = $row['otherSS'];
$clinicalPres = $row['clinicalPres'];
$caseClass = $row['caseClass'];
$antibiotics = $row['antibiotics'];
$bloodSpecimen = $row['bloodSpecimen'];
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
        <label class="col-sm-3 form-label">Fever</label>
        <div class="col-sm-6">
            <p> <?php echo $fever; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">seizure</label>
        <div class="col-sm-6">
            <p> <?php echo $seizure; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">malaise</label>
        <div class="col-sm-6">
            <p> <?php echo $malaise; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">headache</label>
        <div class="col-sm-6">
            <p> <?php echo $headache; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <p> <?php echo $stiffNeck; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <p> <?php echo $cough; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rash</label>
        <div class="col-sm-6">
            <p> <?php echo $rash; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vomiting</label>
        <div class="col-sm-6">
            <p> <?php echo $vomiting; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <p> <?php echo $soreThroat; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">petechia</label>
        <div class="col-sm-6">
            <p> <?php echo $petechia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sensoriumCh</label>
        <div class="col-sm-6">
            <p> <?php echo $sensoriumCh; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">runnyNose</label>
        <div class="col-sm-6">
            <p> <?php echo $runnyNose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">purpura</label>
        <div class="col-sm-6">
            <p> <?php echo $purpura; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">drowsiness</label>
        <div class="col-sm-6">
            <p> <?php echo $drowsiness; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dyspnea</label>
        <div class="col-sm-6">
            <p> <?php echo $dyspnea; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <p> <?php echo $otherSS; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clinicalPres</label>
        <div class="col-sm-6">
            <p> <?php echo $clinicalPres; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <p> <?php echo $caseClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">antibiotics</label>
        <div class="col-sm-6">
            <p> <?php echo $antibiotics; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bloodSpecimen</label>
        <div class="col-sm-6">
            <p> <?php echo $bloodSpecimen; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
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
    <?php
    include('./components/submitCancel.php');
    ?>
</form>