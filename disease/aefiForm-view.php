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
$sql = "SELECT * FROM aefiinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$case = $row['case'];
$anaphylactoid = $row['anaphylactoid'];
$anaphylaxis = $row['anaphylaxis'];
$brachialneuritis = $row['brachialneuritis'];
$dissbcginfect = $row['dissbcginfect'];
$encephalopathy = $row['encephalopathy'];
$hhe = $row['hhe'];
$injectsiteAbcess = $row['injectsiteAbcess'];
$intussusception = $row['intussusception'];
$lymphadenitis = $row['lymphadenitis'];
$osteitis = $row['osteitis'];
$persistent = $row['persistent'];
$seizures = $row['seizures'];
$sepsis = $row['sepsis'];
$thrombocytopenia = $row['thrombocytopenia'];
$outcome = $row['outcome'];
$aliveCondition = $row['aliveCondition'];
$dateDied = $row['dateDied'];
$otherSign = $row['otherSign'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];
$suspectedVacc = $row['suspectedVacc'];
$dateVaccination = $row['dateVaccination'];
$dose = $row['dose'];
$siteInjection = $row['siteInjection'];
$manufacturer = $row['manufacturer'];
$dateExpire = $row['dateExpire'];

?>

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">case</label>
        <div class="col-sm-6">
            <p> <?php echo $case; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylactoid</label>
        <div class="col-sm-6">
            <p> <?php echo $anaphylactoid; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylaxis</label>
        <div class="col-sm-6">
            <p> <?php echo $anaphylaxis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">brachialneuritis</label>
        <div class="col-sm-6">
            <p> <?php echo $brachialneuritis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dissbcginfect</label>
        <div class="col-sm-6">
            <p> <?php echo $dissbcginfect; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">encephalopathy</label>
        <div class="col-sm-6">
            <p> <?php echo $encephalopathy; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">hhe</label>
        <div class="col-sm-6">
            <p> <?php echo $hhe; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">injectsiteAbcess</label>
        <div class="col-sm-6">
            <p> <?php echo $injectsiteAbcess; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">intussusception</label>
        <div class="col-sm-6">
            <p> <?php echo $intussusception; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">lymphadenitis</label>
        <div class="col-sm-6">
            <p> <?php echo $lymphadenitis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">osteitis</label>
        <div class="col-sm-6">
            <p> <?php echo $osteitis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">persistent</label>
        <div class="col-sm-6">
            <p> <?php echo $persistent; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">seizures</label>
        <div class="col-sm-6">
            <p> <?php echo $seizures; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sepsis</label>
        <div class="col-sm-6">
            <p> <?php echo $sepsis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">thrombocytopenia</label>
        <div class="col-sm-6">
            <p> <?php echo $thrombocytopenia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">aliveCondition</label>
        <div class="col-sm-6">
            <p> <?php echo $aliveCondition; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Sign</label>
        <div class="col-sm-6">
            <p> <?php echo $otherSign; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">suspectedVacc</label>
        <div class="col-sm-6">
            <p> <?php echo $suspectedVacc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateVaccination</label>
        <div class="col-sm-6">
            <p> <?php echo $dateVaccination; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dose</label>
        <div class="col-sm-6">
            <p> <?php echo $dose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">siteInjection</label>
        <div class="col-sm-6">
            <p> <?php echo $siteInjection; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">manufacturer</label>
        <div class="col-sm-6">
            <p> <?php echo $manufacturer; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateExpire</label>
        <div class="col-sm-6">
            <p> <?php echo $dateExpire; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo $outcome; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>