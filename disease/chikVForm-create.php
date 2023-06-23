<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdown.php");


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

if (empty($patientId)) {
    echo 'patiend Id emtpy';
}
// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $dayswithSymp = $_POST['dayswithSymp'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dayswithSymp']);
    $fever = $_POST['fever'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['fever']);
    $arthritis = $_POST['arthritis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['arthritis']);
    $hands = $_POST['hands'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['hands']);
    $feet = $_POST['feet'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['feet']);
    $ankles = $_POST['ankles'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['ankles']);
    $otherSite = $_POST['otherSite'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSite']);
    $arthralgia = $_POST['arthralgia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['arthralgia']);
    $periEdema = $_POST['periEdema'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['periEdema']);
    $skinMani = $_POST['skinMani'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['skinMani']);
    $skinDesc = $_POST['skinDesc'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['skinDesc']);
    $myalgia = $_POST['myalgia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['myalgia']);
    $backPain = $_POST['backPain'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['backPain']);
    $headache = $_POST['headache'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['headache']);
    $nausea = $_POST['nausea'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['nausea']);
    $mucosBleed = $_POST['mucosBleed'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['mucosBleed']);
    $vomiting = $_POST['vomiting'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['vomiting']);
    $asthenia = $_POST['asthenia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['asthenia']);
    $meningoEncep = $_POST['meningoEncep'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['meningoEncep']);
    $otherSymptom = $_POST['otherSymptom'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSymptom']);
    $clinDx = $_POST['clinDx'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['clinDx']);
    $dCollected = $_POST['dCollected'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dCollected']);
    $dspecSent = $_POST['dspecSent'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dspecSent']);
    $serIgm = $_POST['serIgm'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['serIgm']);
    $igm_Res = $_POST['igm_Res'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['igm_Res']);
    $digMres = $_POST['digMres'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['digMres']);
    $serIgG = $_POST['serIgG'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['serIgG']);
    $igG_Res = $_POST['igG_Res'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['igG_Res']);
    $dIgGRes = $_POST['dIgGRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dIgGRes']);
    $rt_PCR = $_POST['rt_PCR'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rt_PCR']);
    $rt_PCRRes = $_POST['rt_PCRRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rt_PCRRes']);
    $drtPCRRes = $_POST['drtPCRRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['drtPCRRes']);
    $virIso = $_POST['virIso'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['virIso']);
    $virIsoRes = $_POST['virIsoRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['virIsoRes']);
    $travHist = $_POST['travHist'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['travHist']);
    $placeOfTravel = $_POST['placeOfTravel'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['placeOfTravel']);
    $dVirIsoRes = $_POST['dVirIsoRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dVirIsoRes']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);

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
            $message = "Chikungunya Virus info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Chikungunya Virus form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Chikungunya Virus Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Days With Symptom</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" id="dayswithSymp" name="dayswithSymp">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('fever'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('arthritis'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('hands'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('feet'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('ankles'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('otherSite'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('arthralgia'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('periEdema'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('skinMani'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('skinDesc'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('myalgia'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('backPain'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('headache'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('nausea'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('mucosBleed'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('vomiting'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('asthenia'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('meningoEncep'); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptom</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSymptom" name="otherSymptom">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">ClinDx</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="clinDx" name="clinDx">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('dCollected'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('dspecSent'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('serIgm'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('igm_Res'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('digMres'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('serIgG'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('igG_Res'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('dIgGRes'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('rt_PCR'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('rt_PCRRes'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('drtPCRRes'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('virIso'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('virIsoRes'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('travHist'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('dVirIsoRes'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Place Of Travel</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="placeOfTravel" name="placeOfTravel">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Suspected" type="text" class="form-control" id="caseClass" name="caseClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>