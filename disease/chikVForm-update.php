<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdownUpdate.php");

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
    echo "No information Available";;
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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $dayswithSymp = empty($_POST['dayswithSymp']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dayswithSymp']);
    $fever = empty($_POST['fever']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['fever']);
    $arthritis = empty($_POST['arthritis']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['arthritis']);
    $hands = empty($_POST['hands']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['hands']);
    $feet = empty($_POST['feet']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['feet']);
    $ankles = empty($_POST['ankles']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['ankles']);
    $otherSite = empty($_POST['otherSite']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSite']);
    $arthralgia = empty($_POST['arthralgia']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['arthralgia']);
    $periEdema = empty($_POST['periEdema']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['periEdema']);
    $skinMani = empty($_POST['skinMani']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['skinMani']);
    $skinDesc = empty($_POST['skinDesc']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['skinDesc']);
    $myalgia = empty($_POST['myalgia']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['myalgia']);
    $backPain = empty($_POST['backPain']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['backPain']);
    $headache = empty($_POST['headache']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['headache']);
    $nausea = empty($_POST['nausea']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['nausea']);
    $mucosBleed = empty($_POST['mucosBleed']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['mucosBleed']);
    $vomiting = empty($_POST['vomiting']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['vomiting']);
    $asthenia = empty($_POST['asthenia']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['asthenia']);
    $meningoEncep = empty($_POST['meningoEncep']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['meningoEncep']);
    $otherSymptom = empty($_POST['otherSymptom']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSymptom']);
    $clinDx = empty($_POST['clinDx']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['clinDx']);
    $dCollected = empty($_POST['dCollected']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dCollected']);
    $dspecSent = empty($_POST['dspecSent']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dspecSent']);
    $serIgm = empty($_POST['serIgm']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['serIgm']);
    $igm_Res = empty($_POST['igm_Res']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['igm_Res']);
    $digMres = empty($_POST['digMres']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['digMres']);
    $serIgG = empty($_POST['serIgG']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['serIgG']);
    $igG_Res = empty($_POST['igG_Res']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['igG_Res']);
    $dIgGRes = empty($_POST['dIgGRes']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dIgGRes']);
    $rt_PCR = empty($_POST['rt_PCR']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['rt_PCR']);
    $rt_PCRRes = empty($_POST['rt_PCRRes']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['rt_PCRRes']);
    $drtPCRRes = empty($_POST['drtPCRRes']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['drtPCRRes']);
    $virIso = empty($_POST['virIso']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['virIso']);
    $virIsoRes = empty($_POST['virIsoRes']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['virIsoRes']);
    $travHist = empty($_POST['travHist']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['travHist']);
    $placeOfTravel = empty($_POST['placeOfTravel']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['placeOfTravel']);
    $dVirIsoRes = empty($_POST['dVirIsoRes']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dVirIsoRes']);
    $caseClass = empty($_POST['caseClass']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = empty($_POST['outcome']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = empty($_POST['dateAdmitted']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = empty($_POST['morbidityMonth']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = empty($_POST['morbidityWeek']) ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the chikvinfotbl table
        $query = "UPDATE chikvinfotbl SET
                dayswithSymp = '$dayswithSymp',
                fever = '$fever',
                arthritis = '$arthritis',
                hands = '$hands',
                feet = '$feet',
                ankles = '$ankles',
                otherSite = '$otherSite',
                arthralgia = '$arthralgia',
                periEdema = '$periEdema',
                skinMani = '$skinMani',
                skinDesc = '$skinDesc',
                myalgia = '$myalgia',
                backPain = '$backPain',
                headache = '$headache',
                nausea = '$nausea',
                mucosBleed = '$mucosBleed',
                vomiting = '$vomiting',
                asthenia = '$asthenia',
                meningoEncep = '$meningoEncep',
                otherSymptom = '$otherSymptom',
                clinDx = '$clinDx',
                dCollected = '$dCollected',
                dspecSent = '$dspecSent',
                serIgm = '$serIgm',
                igm_Res = '$igm_Res',
                digMres = '$digMres',
                serIgG = '$serIgG',
                igG_Res = '$igG_Res',
                dIgGRes = '$dIgGRes',
                rt_PCR = '$rt_PCR',
                rt_PCRRes = '$rt_PCRRes',
                drtPCRRes = '$drtPCRRes',
                virIso = '$virIso',
                virIsoRes = '$virIsoRes',
                travHist = '$travHist',
                placeOfTravel = '$placeOfTravel',
                dVirIsoRes = '$dVirIsoRes',
                caseClass = '$caseClass',
                outcome = '$outcome',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
            WHERE patientId = '$patientId'";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Chikungunya Virus info successfully updated!";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Chikungunya Virus info successfully updated!');
                window.location = 'patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
            echo "
            <script>
                alert('Error submitting form! " . mysqli_error($con) . "');
            </script>";
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Chikungunya Virus Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Days with Symptom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dayswithSymp" name="dayswithSymp" value='<?php echo $dayswithSymp; ?>'>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('fever', $fever); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('arthritis', $arthritis); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('hands', $hands); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('feet', $feet); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('ankles', $ankles); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('otherSite', $otherSite); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('arthralgia', $arthralgia); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('periEdema', $periEdema); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('skinMani', $skinMani); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('skinDesc', $skinDesc); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('myalgia', $myalgia); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('backPain', $backPain); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('headache', $headache); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('nausea', $nausea); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('mucosBleed', $mucosBleed); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('vomiting', $vomiting); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('asthenia', $asthenia); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('meningoEncep', $meningoEncep); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dCollected', $dCollected); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dspecSent', $dspecSent); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('serIgm', $serIgm); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('igm_Res', $igm_Res); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('digMres', $digMres); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('serIgG', $serIgG); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('igG_Res', $igG_Res); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dIgGRes', $dIgGRes); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('rt_PCR', $rt_PCR); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('rt_PCRRes', $rt_PCRRes); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('drtPCRRes', $drtPCRRes); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('virIso', $virIso); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('virIsoRes', $virIsoRes); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('travHist', $travHist); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dVirIsoRes', $dVirIsoRes); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSymptom" name="otherSymptom" value='<?php echo $otherSymptom; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">ClinDx</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="clinDx" name="clinDx" value='<?php echo $clinDx; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Place Of Travel</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="placeOfTravel" name="placeOfTravel" value='<?php echo $placeOfTravel; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case Class</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>'>
                </div>
            </div>
            <?php
            include('./components/outcomeUpdate.php');
            ?>
            <?php
            include('./components/submitCancel.php');
            ?>
        </form>