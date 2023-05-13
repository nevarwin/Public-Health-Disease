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
$sql = "SELECT * FROM hfmdinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$rashChar = $row['rashChar'];
$rashSores = $row['rashSores'];
$palms = $row['palms'];
$fingers = $row['fingers'];
$footSoles = $row['footSoles'];
$buttocks = $row['buttocks'];
$mouthUlcers = $row['mouthUlcers'];
$pain = $row['pain'];
$anorexia = $row['anorexia'];
$bm = $row['bm'];
$soreThroat = $row['soreThroat'];
$nausVom = $row['nausVom'];
$diffBreath = $row['diffBreath'];
$paralysis = $row['paralysis'];
$meningLes = $row['meningLes'];
$otherSymptoms = $row['otherSymptoms'];
$anyComp = $row['anyComp'];
$complicated = $row['complicated'];
$otherCase = $row['otherCase'];
$travel = $row['travel'];
$probExposure = $row['probExposure'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$wfDiag = $row['wfDiag'];
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
        <label class="col-sm-3 form-label">rashChar</label>
        <div class="col-sm-6">
            <p> <?php echo $rashChar; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rashSores</label>
        <div class="col-sm-6">
            <p> <?php echo $rashSores; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">palms</label>
        <div class="col-sm-6">
            <p> <?php echo $palms; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <p> <?php echo $fingers; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">footSoles</label>
        <div class="col-sm-6">
            <p> <?php echo $footSoles; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">buttocks</label>
        <div class="col-sm-6">
            <p> <?php echo $buttocks; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">mouthUlcers</label>
        <div class="col-sm-6">
            <p> <?php echo $mouthUlcers; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">pain</label>
        <div class="col-sm-6">
            <p> <?php echo $pain; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anorexia</label>
        <div class="col-sm-6">
            <p> <?php echo $anorexia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bm</label>
        <div class="col-sm-6">
            <p> <?php echo $bm; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <p> <?php echo $soreThroat; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">nausVom</label>
        <div class="col-sm-6">
            <p> <?php echo $nausVom; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">diffBreath</label>
        <div class="col-sm-6">
            <p> <?php echo $diffBreath; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">paralysis</label>
        <div class="col-sm-6">
            <p> <?php echo $paralysis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <p> <?php echo $otherSymptoms; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anyComp</label>
        <div class="col-sm-6">
            <p> <?php echo $anyComp; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">complicated</label>
        <div class="col-sm-6">
            <p> <?php echo $complicated; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">travel</label>
        <div class="col-sm-6">
            <p> <?php echo $travel; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">probExposure</label>
        <div class="col-sm-6">
            <p> <?php echo $probExposure; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherCase</label>
        <div class="col-sm-6">
            <p> <?php echo $otherCase; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">meningLes</label>
        <div class="col-sm-6">
            <p> <?php echo $meningLes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">wfDiag</label>
        <div class="col-sm-6">
            <p> <?php echo $wfDiag; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <p> <?php echo $caseClass; ?> </p>
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