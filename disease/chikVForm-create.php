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

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dayswithSymp</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dayswithSymp" name="dayswithSymp">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">fever</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fever" name="fever">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthritis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthritis" name="arthritis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">hands</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="hands" name="hands">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">feet</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="feet" name="feet">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">ankles</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="ankles" name="ankles">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherSite</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSite" name="otherSite">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthralgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthralgia" name="arthralgia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">periEdema</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="periEdema" name="periEdema">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">skinMani</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="skinMani" name="skinMani">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">skinDesc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="skinDesc" name="skinDesc">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">myalgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="myalgia" name="myalgia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">backPain</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="backPain" name="backPain">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">headache</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="headache" name="headache">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">nausea</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nausea" name="nausea">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">mucosBleed</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mucosBleed" name="mucosBleed">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Vomiting</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vomiting" name="vomiting">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">asthenia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="asthenia" name="asthenia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">meningoEncep</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="meningoEncep" name="meningoEncep">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherSymptom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptom" name="otherSymptom">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clinDx</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clinDx" name="clinDx">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dCollected</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dCollected" name="dCollected">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dspecSent</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dspecSent" name="dspecSent">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">serIgm</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="serIgm" name="serIgm">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">serIgG</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="serIgG" name="serIgG">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">igm_Res</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="igm_Res" name="igm_Res">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">digMres</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="digMres" name="digMres">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">igG_Res</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="igG_Res" name="igG_Res">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dIgGRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dIgGRes" name="dIgGRes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rt_PCR</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rt_PCR" name="rt_PCR">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rt_PCRRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rt_PCRRes" name="rt_PCRRes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">drtPCRRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="drtPCRRes" name="drtPCRRes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">virIso</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="virIso" name="virIso">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">virIsoRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="virIsoRes" name="virIsoRes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">travHist</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="travHist" name="travHist">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">placeOfTravel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="placeOfTravel" name="placeOfTravel">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dVirIsoRes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dVirIsoRes" name="dVirIsoRes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek">
        </div>
    </div>
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>