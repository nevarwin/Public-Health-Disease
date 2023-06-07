<?php
include('./components/alertMessage.php');
include("./components/connection.php");

$user_data = check_login($con);

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
    // exit;
}
$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM afpinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "error in row";
    // header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$fever = $row['fever'];
$rarm = $row['rarm'];
$cough = $row['cough'];
$paralysisatBirth = $row['paralysisatBirth'];
$diarrheaVomiting = $row['diarrheaVomiting'];
$musclePain = $row['musclePain'];
$mening = $row['mening'];
$brthMusc = $row['brthMusc'];
$neckMusc = $row['neckMusc'];
$paradev = $row['paradev'];
$paradir = $row['paradir'];
$facialMusc = $row['facialMusc'];
$rasens = $row['rasens'];
$lasens = $row['lasens'];
$rlsens = $row['rlsens'];
$llsens = $row['llsens'];
$raref = $row['raref'];
$laref = $row['laref'];
$rlref = $row['rlref'];
$llref = $row['llref'];
$ramotor = $row['ramotor'];
$lamotor = $row['lamotor'];
$rlmotor = $row['rlmotor'];
$llmotor = $row['llmotor'];
$hxDisorder = $row['hxDisorder'];
$otherCases = $row['otherCases'];
$firststoolSpec = $row['firststoolSpec'];
$dateDied = $row['dateDied'];
$outcome = $row['outcome'];
$dstool1Taken = $row['dstool1Taken'];
$dstool2Taken = $row['dstool2Taken'];
$dstool1Sent = $row['dstool1Sent'];
$dstool2Sent = $row['dstool2Sent'];
$stool1Result = $row['stool1Result'];
$stool2Result = $row['stool2Result'];
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
        <label for="" class="col-sm form-label font-weight-bold">Date Admitted</label>
        <div class="col-sm-6">
            <p><?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Fever</label>
        <div class="col-sm-6">
            <p><?php echo $fever; ?>
            <p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Rarm</label>
        <div class="col-sm-6">
            <p><?php echo $rarm; ?> </p>
        </div>
    </div>

    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Cough</label>
        <div class="col-sm-6">
            <p><?php echo $cough; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Paralysis at Birth</label>
        <div class="col-sm-6">
            <p><?php echo $paralysisatBirth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Diarrhea Vomiting</label>
        <div class="col-sm-6">
            <p><?php echo $diarrheaVomiting; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Muscle Pain</label>
        <div class="col-sm-6">
            <p><?php echo $musclePain; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Mening</label>
        <div class="col-sm-6">
            <p><?php echo $mening; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">BrthMusc</label>
        <div class="col-sm-6">
            <p><?php echo $brthMusc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Neck Musc</label>
        <div class="col-sm-6">
            <p><?php echo $neckMusc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Paradev</label>
        <div class="col-sm-6">
            <p><?php echo $paradev; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm form-label font-weight-bold">Paradir</label>
        <div class="col-sm-6">
            <p><?php echo $paradir; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Facial Musc</label>
        <div class="col-sm-6">
            <p><?php echo $facialMusc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">rasens</label>
        <div class="col-sm-6">
            <p><?php echo $rasens; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">lasens</label>
        <div class="col-sm-6">
            <p><?php echo $lasens; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">rlsens</label>
        <div class="col-sm-6">
            <p><?php echo $rlsens; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">llsens</label>
        <div class="col-sm-6">
            <p><?php echo $llsens; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">raref</label>
        <div class="col-sm-6">
            <p><?php echo $raref; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">laref</label>
        <div class="col-sm-6">
            <p><?php echo $laref; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">rlref</label>
        <div class="col-sm-6">
            <p><?php echo $rlref; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">llref</label>
        <div class="col-sm-6">
            <p><?php echo $llref; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">ramotor</label>
        <div class="col-sm-6">
            <p><?php echo $ramotor; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">lamotor</label>
        <div class="col-sm-6">
            <p><?php echo $lamotor; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">rlmotor</label>
        <div class="col-sm-6">
            <p><?php echo $rlmotor; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">llmotor</label>
        <div class="col-sm-6">
            <p><?php echo $llmotor; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">hxDisorder</label>
        <div class="col-sm-6">
            <p><?php echo $hxDisorder; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Other Cases</label>
        <div class="col-sm-6">
            <p><?php echo $otherCases; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">First Stool Spec</label>
        <div class="col-sm-6">
            <p><?php echo $firststoolSpec; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dstool1Taken" class="col-sm form-label font-weight-bold">D Stool 1 Taken</label>
        <div class="col-sm-6">
            <p><?php echo $dstool1Taken; ?>
            <p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dstool1Sent" class="col-sm form-label font-weight-bold">D Stool 1 Sent</label>
        <div class="col-sm-6">
            <p><?php echo $dstool1Taken; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dstool2Taken" class="col-sm form-label font-weight-bold">D Stool 2 Taken</label>
        <div class="col-sm-6">
            <p><?php echo $dstool2Taken; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dstool2Sent" class="col-sm form-label font-weight-bold">D Stool 2 Sent</label>
        <div class="col-sm-6">
            <p><?php echo $dstool2Sent; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">First Stool Spec</label>
        <div class="col-sm-6">
            <p><?php echo $firststoolSpec; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Stool 1 Result</label>
        <div class="col-sm-6">
            <p><?php echo $stool1Result; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Stool 2 Result</label>
        <div class="col-sm-6">
            <p><?php echo $stool2Result; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Morbidity Week</label>
        <div class="col-sm-6">
            <p><?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Morbidity Month</label>
        <div class="col-sm-6">
            <p><?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="outcome" class="col-sm form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">
            <p><?php echo ucfirst($outcome); ?>
            </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p><?php echo $dateDied; ?></p>
        </div>
    </div>
</form>