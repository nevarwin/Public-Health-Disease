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
$sql = "SELECT * FROM nntinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "No information Available";;
    exit;
}
$recentAcuteWound = $row['recentAcuteWound'];
$woundSite = $row['woundSite'];
$woundType = $row['woundType'];
$otherWound = $row['otherWound'];
$tetanusToxoid = $row['tetanusToxoid'];
$tetanusAntitoxin = $row['tetanusAntitoxin'];
$skinLesion = $row['skinLesion'];
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
    <label class="col-sm-4 form-label font-weight-bold">Recent Acute Wound</label>
    <div class="col-sm-6">
        <p> <?php echo $recentAcuteWound; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Wound Site</label>
    <div class="col-sm-6">
        <p> <?php echo $woundSite; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Wound Type</label>
    <div class="col-sm-6">
        <p> <?php echo $woundType; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Other Wound</label>
    <div class="col-sm-6">
        <p> <?php echo $otherWound; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Tetanus Antitoxin</label>
    <div class="col-sm-6">
        <p> <?php echo $tetanusAntitoxin; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Skin Lesion</label>
    <div class="col-sm-6">
        <p> <?php echo $skinLesion; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Morbidity Month</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityMonth; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">MorbidityWeek</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityWeek; ?></p>
    </div>
</div>
<?php
include("./components/outcomeView.php");
?>