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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $dayswithSymp = $_POST['dayswithSymp'];
    $fever = $_POST['fever'];
    $arthritis = $_POST['arthritis'];
    $hands = $_POST['hands'];
    $feet = $_POST['feet'];
    $ankles = $_POST['ankles'];
    $otherSite = $_POST['otherSite'];
    $arthralgia = $_POST['arthralgia'];
    $periEdema = $_POST['periEdema'];
    $skinMani = $_POST['skinMani'];
    $skinDesc = $_POST['skinDesc'];
    $myalgia = $_POST['myalgia'];
    $backPain = $_POST['backPain'];
    $headache = $_POST['headache'];
    $nausea = $_POST['nausea'];
    $mucosBleed = $_POST['mucosBleed'];
    $vomiting = $_POST['vomiting'];
    $asthenia = $_POST['asthenia'];
    $meningoEncep = $_POST['meningoEncep'];
    $otherSymptom = $_POST['otherSymptom'];
    $clinDx = $_POST['clinDx'];
    $dCollected = $_POST['dCollected'];
    $dspecSent = $_POST['dspecSent'];
    $serIgm = $_POST['serIgm'];
    $igm_Res = $_POST['igm_Res'];
    $digMres = $_POST['digMres'];
    $serIgG = $_POST['serIgG'];
    $igG_Res = $_POST['igG_Res'];
    $dIgGRes = $_POST['dIgGRes'];
    $rt_PCR = $_POST['rt_PCR'];
    $rt_PCRRes = $_POST['rt_PCRRes'];
    $drtPCRRes = $_POST['drtPCRRes'];
    $virIso = $_POST['virIso'];
    $virIsoRes = $_POST['virIsoRes'];
    $travHist = $_POST['travHist'];
    $placeOfTravel = $_POST['placeOfTravel'];
    $dVirIsoRes = $_POST['dVirIsoRes'];
    $caseClass = $_POST['caseClass'];
    $outcome = $_POST['outcome'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityMonth = $_POST['morbidityMonth'];
    $morbidityWeek = $_POST['morbidityWeek'];

    // check if the data is empty
    do {
        if (empty($dateAdmitted)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
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
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Chikungunya Virus info successfully updated!');
                window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
            echo "
            <script>
                alert('Error submitting form! " . mysqli_error($con) . "');
            </script>";
        }
    } while (false);
}

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
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dayswithSymp</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dayswithSymp" name="dayswithSymp" value='<?php echo $dayswithSymp; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">fever</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fever" name="fever" value='<?php echo $fever; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthritis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthritis" name="arthritis" value='<?php echo $arthritis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">hands</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="hands" name="hands" value='<?php echo $hands; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">feet</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="feet" name="feet" value='<?php echo $feet; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">ankles</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="ankles" name="ankles" value='<?php echo $ankles; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherSite</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSite" name="otherSite" value='<?php echo $otherSite; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthralgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthralgia" name="arthralgia" value='<?php echo $arthralgia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">periEdema</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="periEdema" name="periEdema" value='<?php echo $periEdema; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">skinMani</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="skinMani" name="skinMani" value='<?php echo $skinMani; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">skinDesc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="skinDesc" name="skinDesc" value='<?php echo $skinDesc; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">myalgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="myalgia" name="myalgia" value='<?php echo $myalgia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">backPain</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="backPain" name="backPain" value='<?php echo $backPain; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">headache</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="headache" name="headache" value='<?php echo $headache; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">nausea</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nausea" name="nausea" value='<?php echo $nausea; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">mucosBleed</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mucosBleed" name="mucosBleed" value='<?php echo $mucosBleed; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Vomiting</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vomiting" name="vomiting" value='<?php echo $vomiting; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">asthenia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="asthenia" name="asthenia" value='<?php echo $asthenia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">meningoEncep</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="meningoEncep" name="meningoEncep" value='<?php echo $meningoEncep; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherSymptom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptom" name="otherSymptom" value='<?php echo $otherSymptom; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clinDx</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clinDx" name="clinDx" value='<?php echo $clinDx; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dCollected</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dCollected" name="dCollected" value='<?php echo $dCollected; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dspecSent</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dspecSent" name="dspecSent" value='<?php echo $dspecSent; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">serIgm</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="serIgm" name="serIgm" value='<?php echo $serIgm; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">serIgG</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="serIgG" name="serIgG" value='<?php echo $serIgG; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">igm_Res</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="igm_Res" name="igm_Res" value='<?php echo $igm_Res; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">digMres</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="digMres" name="digMres" value='<?php echo $digMres; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">serIgG</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="serIgG" name="serIgG" value='<?php echo $serIgG; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">igG_Res</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="igG_Res" name="igG_Res" value='<?php echo $igG_Res; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dIgGRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dIgGRes" name="dIgGRes" value='<?php echo $dIgGRes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rt_PCR</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rt_PCR" name="rt_PCR" value='<?php echo $rt_PCR; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rt_PCRRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rt_PCRRes" name="rt_PCRRes" value='<?php echo $rt_PCRRes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">drtPCRRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="drtPCRRes" name="drtPCRRes" value='<?php echo $drtPCRRes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">virIso</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="virIso" name="virIso" value='<?php echo $virIso; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">virIsoRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="virIsoRes" name="virIsoRes" value='<?php echo $virIsoRes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">travHist</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="travHist" name="travHist" value='<?php echo $travHist; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">placeOfTravel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="placeOfTravel" name="placeOfTravel" value='<?php echo $placeOfTravel; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dVirIsoRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dVirIsoRes" name="dVirIsoRes" value='<?php echo $dVirIsoRes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
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