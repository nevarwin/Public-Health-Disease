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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
                <label class="col-sm-3 col-form-label">dayswithSymp</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dayswithSymp" name="dayswithSymp" value='<?php echo $dayswithSymp; ?>'>
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('fever', $fever);
            echo generateDropdownUpdate('arthritis', $arthritis);
            echo generateDropdownUpdate('hands', $hands);
            echo generateDropdownUpdate('feet', $feet);
            echo generateDropdownUpdate('ankles', $ankles);
            echo generateDropdownUpdate('otherSite', $otherSite);
            echo generateDropdownUpdate('arthralgia', $arthralgia);
            echo generateDropdownUpdate('periEdema', $periEdema);
            echo generateDropdownUpdate('skinMani', $skinMani);
            echo generateDropdownUpdate('skinDesc', $skinDesc);
            echo generateDropdownUpdate('myalgia', $myalgia);
            echo generateDropdownUpdate('backPain', $backPain);
            echo generateDropdownUpdate('headache', $headache);
            echo generateDropdownUpdate('nausea', $nausea);
            echo generateDropdownUpdate('mucosBleed', $mucosBleed);
            echo generateDropdownUpdate('vomiting', $vomiting);
            echo generateDropdownUpdate('asthenia', $asthenia);
            echo generateDropdownUpdate('meningoEncep', $meningoEncep);
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">otherSymptom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSymptom" name="otherSymptom" value='<?php echo $otherSymptom; ?>'>
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('dCollected', $dCollected);
            echo generateDropdownUpdate('dspecSent', $dspecSent);
            echo generateDropdownUpdate('serIgm', $serIgm);
            echo generateDropdownUpdate('igm_Res', $igm_Res);
            echo generateDropdownUpdate('digMres', $digMres);
            echo generateDropdownUpdate('serIgG', $serIgG);
            echo generateDropdownUpdate('igG_Res', $igG_Res);
            echo generateDropdownUpdate('dIgGRes', $dIgGRes);
            echo generateDropdownUpdate('rt_PCR', $rt_PCR);
            echo generateDropdownUpdate('rt_PCRRes', $rt_PCRRes);
            echo generateDropdownUpdate('drtPCRRes', $drtPCRRes);
            echo generateDropdownUpdate('virIso', $virIso);
            echo generateDropdownUpdate('virIsoRes', $virIsoRes);
            echo generateDropdownUpdate('travHist', $travHist);
            echo generateDropdownUpdate('dVirIsoRes', $dVirIsoRes);
            ?>
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