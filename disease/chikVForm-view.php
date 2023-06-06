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
$sql = "SELECT * FROM chikVinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$dayswithSymp = $row['dayswithSymp'];
$fever = $row['fever'];
$arthritis = $row['arthritis'];
$hands = $row['hands'];
$feet = $row['feet'];
$ankles = $row['ankles'];
$otherSite = $row['otherSite'];
$arthralgia = $row['arthralgia'];
$periEdema = $row['periEdema'];
$skinMani = $row['skinMani'];
$skinDesc = $row['skinDesc'];
$myalgia = $row['myalgia'];
$backPain = $row['backPain'];
$headache = $row['headache'];
$nausea = $row['nausea'];
$mucosBleed = $row['mucosBleed'];
$vomiting = $row['vomiting'];
$asthenia = $row['asthenia'];
$meningoEncep = $row['meningoEncep'];
$otherSymptom = $row['otherSymptom'];
$clinDx = $row['clinDx'];
$dCollected = $row['dCollected'];
$dspecSent = $row['dspecSent'];
$serIgm = $row['serIgm'];
$igm_Res = $row['igm_Res'];
$digMres = $row['digMres'];
$serIgG = $row['serIgG'];
$igG_Res = $row['igG_Res'];
$dIgGRes = $row['dIgGRes'];
$rt_PCR = $row['rt_PCR'];
$rt_PCRRes = $row['rt_PCRRes'];
$drtPCRRes = $row['drtPCRRes'];
$virIso = $row['virIso'];
$virIsoRes = $row['virIsoRes'];
$travHist = $row['travHist'];
$placeOfTravel = $row['placeOfTravel'];
$dVirIsoRes = $row['dVirIsoRes'];
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
        <label class="col-sm-3 form-label font-weight-bold">dayswithSymp</label>
        <div class="col-sm-6">
            <p> <?php echo $dayswithSymp; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">fever</label>
        <div class="col-sm-6">
            <p> <?php echo $fever; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">arthritis</label>
        <div class="col-sm-6">
            <p> <?php echo $arthritis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">hands</label>
        <div class="col-sm-6">
            <p> <?php echo $hands; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">feet</label>
        <div class="col-sm-6">
            <p> <?php echo $feet; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">ankles</label>
        <div class="col-sm-6">
            <p> <?php echo $ankles; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">otherSite</label>
        <div class="col-sm-6">
            <p> <?php echo $otherSite; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">arthralgia</label>
        <div class="col-sm-6">
            <p> <?php echo $arthralgia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">periEdema</label>
        <div class="col-sm-6">
            <p> <?php echo $periEdema; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">skinMani</label>
        <div class="col-sm-6">
            <p> <?php echo $skinMani; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">skinDesc</label>
        <div class="col-sm-6">
            <p> <?php echo $skinDesc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">myalgia</label>
        <div class="col-sm-6">
            <p> <?php echo $myalgia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">backPain</label>
        <div class="col-sm-6">
            <p> <?php echo $backPain; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">headache</label>
        <div class="col-sm-6">
            <p> <?php echo $headache; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">nausea</label>
        <div class="col-sm-6">
            <p> <?php echo $nausea; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">mucosBleed</label>
        <div class="col-sm-6">
            <p> <?php echo $mucosBleed; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Vomiting</label>
        <div class="col-sm-6">
            <p> <?php echo $vomiting; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">asthenia</label>
        <div class="col-sm-6">
            <p> <?php echo $asthenia; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">meningoEncep</label>
        <div class="col-sm-6">
            <p> <?php echo $meningoEncep; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">otherSymptom</label>
        <div class="col-sm-6">
            <p> <?php echo $otherSymptom; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">clinDx</label>
        <div class="col-sm-6">
            <p> <?php echo $clinDx; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">dCollected</label>
        <div class="col-sm-6">
            <p> <?php echo $dCollected; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">dspecSent</label>
        <div class="col-sm-6">
            <p> <?php echo $dspecSent; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">serIgm</label>
        <div class="col-sm-6">
            <p><?php echo $serIgm; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">serIgG</label>
        <div class="col-sm-6">
            <p> <?php echo $serIgG; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">igm_Res</label>
        <div class="col-sm-6">
            <p> <?php echo $igm_Res; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">digMres</label>
        <div class="col-sm-6">
            <p> <?php echo $digMres; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">serIgG</label>
        <div class="col-sm-6">
            <p> <?php echo $serIgG; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">igG_Res</label>
        <div class="col-sm-6">
            <p> <?php echo $igG_Res; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">dIgGRes</label>
        <div class="col-sm-6">
            <p> <?php echo $dIgGRes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">rt_PCR</label>
        <div class="col-sm-6">
            <p> <?php echo $rt_PCR; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">rt_PCRRes</label>
        <div class="col-sm-6">
            <p> <?php echo $rt_PCRRes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">drtPCRRes</label>
        <div class="col-sm-6">
            <p> <?php echo $drtPCRRes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">virIso</label>
        <div class="col-sm-6">
            <p> <?php echo $virIso; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">virIsoRes</label>
        <div class="col-sm-6">
            <p> <?php echo $virIsoRes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">travHist</label>
        <div class="col-sm-6">
            <p> <?php echo $travHist; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">placeOfTravel</label>
        <div class="col-sm-6">
            <p> <?php echo $placeOfTravel; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">dVirIsoRes</label>
        <div class="col-sm-6">
            <p> <?php echo $dVirIsoRes; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">caseClass</label>
        <div class="col-sm-6">
            <p> <?php echo $caseClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">morbidityMonth</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">MorbidityWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo $outcome; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>