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
$sql = "SELECT * FROM leptospirosisinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "No information Available";;
    exit;
}
$labResult = $row['labResult'];
$serovar = $row['serovar'];
$caseClass = $row['caseClass'];
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
    <label class="col-sm-4 form-label font-weight-bold">Lab Result</label>
    <div class="col-sm-6">
        <p> <?php echo $labResult; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Serovar</label>
    <div class="col-sm-6">
        <p> <?php echo $serovar; ?> </p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Case Classification</label>
    <div class="col-sm-6">
        <p> <?php echo $caseClass; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Morbidity Month</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityMonth; ?></p>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-4 form-label font-weight-bold">Morbidity Week</label>
    <div class="col-sm-6">
        <p> <?php echo $morbidityWeek; ?></p>
    </div>
</div>
<?php
include("./components/outcomeView.php");
?>