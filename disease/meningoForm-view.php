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


<div class="row mb-3">
    <label for="" class="col-sm-4 form-label font-weight-bold">Date Admitted</label>
    <div class="col-sm-6">
        <p> <?php echo $dateAdmitted; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Fever</label>
    <div class="col-sm-6">
        <p> <?php echo $fever; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Seizure</label>
    <div class="col-sm-6">
        <p> <?php echo $seizure; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Malaise</label>
    <div class="col-sm-6">
        <p> <?php echo $malaise; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Headache</label>
    <div class="col-sm-6">
        <p> <?php echo $headache; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Stiff Neck</label>
    <div class="col-sm-6">
        <p> <?php echo $stiffNeck; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Cough</label>
    <div class="col-sm-6">
        <p> <?php echo $cough; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Rash</label>
    <div class="col-sm-6">
        <p> <?php echo $rash; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Vomiting</label>
    <div class="col-sm-6">
        <p> <?php echo $vomiting; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Sore Throat</label>
    <div class="col-sm-6">
        <p> <?php echo $soreThroat; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Petechia</label>
    <div class="col-sm-6">
        <p> <?php echo $petechia; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">SensoriumCh</label>
    <div class="col-sm-6">
        <p> <?php echo $sensoriumCh; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Runny Nose</label>
    <div class="col-sm-6">
        <p> <?php echo $runnyNose; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Purpura</label>
    <div class="col-sm-6">
        <p> <?php echo $purpura; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Drowsiness</label>
    <div class="col-sm-6">
        <p> <?php echo $drowsiness; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Dyspnea</label>
    <div class="col-sm-6">
        <p> <?php echo $dyspnea; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Other Symptoms</label>
    <div class="col-sm-6">
        <p> <?php echo $otherSS; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Clinical Pres</label>
    <div class="col-sm-6">
        <p> <?php echo $clinicalPres; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Case Class</label>
    <div class="col-sm-6">
        <p> <?php echo $caseClass; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Antibiotics</label>
    <div class="col-sm-6">
        <p> <?php echo $antibiotics; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Blood Specimen</label>
    <div class="col-sm-6">
        <p> <?php echo $bloodSpecimen; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Morbidity Month</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityMonth; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Morbidity Week</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityWeek; ?> </p>
    </div>
</div>
<?php
include("./components/outcomeView.php");
?>