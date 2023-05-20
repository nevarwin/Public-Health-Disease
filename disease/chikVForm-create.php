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
echo $patientId;

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
        $query = "INSERT INTO chikvinfotbl (
                    patientId,
                    dayswithSymp,
                    fever,
                    arthritis,
                    hands,
                    feet,
                    ankles,
                    otherSite,
                    arthralgia,
                    periEdema,
                    skinMani,
                    skinDesc,
                    myalgia,
                    backPain,
                    headache,
                    nausea,
                    mucosBleed,
                    vomiting,
                    asthenia,
                    meningoEncep,
                    otherSymptom,
                    clinDx,
                    dCollected,
                    dspecSent,
                    serIgm,
                    igm_Res,
                    digMres,
                    serIgG,
                    igG_Res,
                    dIgGRes,
                    rt_PCR,
                    rt_PCRRes,
                    drtPCRRes,
                    virIso,
                    virIsoRes,
                    travHist,
                    placeOfTravel,
                    dVirIsoRes,
                    caseClass,
                    outcome,
                    dateDied,
                    dateAdmitted,
                    morbidityMonth,
                    morbidityWeek
                ) VALUES (
                    '$patientId',
                    '$dayswithSymp',
                    '$fever',
                    '$arthritis',
                    '$hands',
                    '$feet',
                    '$ankles',
                    '$otherSite',
                    '$arthralgia',
                    '$periEdema',
                    '$skinMani',
                    '$skinDesc',
                    '$myalgia',
                    '$backPain',
                    '$headache',
                    '$nausea',
                    '$mucosBleed',
                    '$vomiting',
                    '$asthenia',
                    '$meningoEncep',
                    '$otherSymptom',
                    '$clinDx',
                    '$dCollected',
                    '$dspecSent',
                    '$serIgm',
                    '$igm_Res',
                    '$digMres',
                    '$serIgG',
                    '$igG_Res',
                    '$dIgGRes',
                    '$rt_PCR',
                    '$rt_PCRRes',
                    '$drtPCRRes',
                    '$virIso',
                    '$virIsoRes',
                    '$travHist',
                    '$placeOfTravel',
                    '$dVirIsoRes',
                    '$caseClass',
                    '$outcome',
                    '$dateDied',
                    '$dateAdmitted',
                    '$morbidityMonth',
                    '$morbidityWeek'
                )";



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
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">dayswithSymp</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dayswithSymp" name="dayswithSymp">
                </div>
            </div>
            <?php
            echo generateDropdown('fever');
            echo generateDropdown('arthritis');
            echo generateDropdown('hands');
            echo generateDropdown('feet');
            echo generateDropdown('ankles');
            echo generateDropdown('otherSite');
            echo generateDropdown('arthralgia');
            echo generateDropdown('periEdema');
            echo generateDropdown('skinMani');
            echo generateDropdown('skinDesc');
            echo generateDropdown('myalgia');
            echo generateDropdown('backPain');
            echo generateDropdown('headache');
            echo generateDropdown('nausea');
            echo generateDropdown('mucosBleed');
            echo generateDropdown('vomiting');
            echo generateDropdown('asthenia');
            echo generateDropdown('meningoEncep');
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">otherSymptom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSymptom" name="otherSymptom">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">clinDx</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="clinDx" name="clinDx">
                </div>
            </div>
            <?php
            echo generateDropdown('dCollected');
            echo generateDropdown('dspecSent');
            echo generateDropdown('serIgm');
            echo generateDropdown('igm_Res');
            echo generateDropdown('digMres');
            echo generateDropdown('serIgG');
            echo generateDropdown('igG_Res');
            echo generateDropdown('dIgGRes');
            echo generateDropdown('rt_PCR');
            echo generateDropdown('rt_PCRRes');
            echo generateDropdown('drtPCRRes');
            echo generateDropdown('virIso');
            echo generateDropdown('virIsoRes');
            echo generateDropdown('travHist');
            echo generateDropdown('dVirIsoRes');
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">placeOfTravel</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="placeOfTravel" name="placeOfTravel">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">caseClass</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="caseClass" name="caseClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>