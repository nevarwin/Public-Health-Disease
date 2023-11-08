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
    echo "No information Available";
}

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $fever = $_POST['fever'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['fever']);
    $rashChar = $_POST['rashChar'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rashChar']);
    $rashSores = $_POST['rashSores'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rashSores']);
    $palms = $_POST['palms'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['palms']);
    $fingers = $_POST['fingers'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['fingers']);
    $footSoles = $_POST['footSoles'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['footSoles']);
    $buttocks = $_POST['buttocks'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['buttocks']);
    $mouthUlcers = $_POST['mouthUlcers'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['mouthUlcers']);
    $pain = $_POST['pain'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['pain']);
    $anorexia = $_POST['anorexia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['anorexia']);
    $bm = $_POST['bm'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['bm']);
    $soreThroat = $_POST['soreThroat'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['soreThroat']);
    $nausVom = $_POST['nausVom'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['nausVom']);
    $diffBreath = $_POST['diffBreath'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['diffBreath']);
    $paralysis = $_POST['paralysis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['paralysis']);
    $meningLes = $_POST['meningLes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['meningLes']);
    $otherSymptoms = $_POST['otherSymptoms'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSymptoms']);
    $anyComp = $_POST['anyComp'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['anyComp']);
    $complicated = $_POST['complicated'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['complicated']);
    $otherCase = $_POST['otherCase'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherCase']);
    $travel = $_POST['travel'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['travel']);
    $probExposure = $_POST['probExposure'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['probExposure']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $wfDiag = $_POST['wfDiag'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['wfDiag']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);

    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the Hand, Foot and Mouth Diseaseinfotbl table
        $query = "UPDATE hfmdinfotbl SET
                fever = '$fever',
                rashChar = '$rashChar',
                rashSores = '$rashSores',
                palms = '$palms',
                fingers = '$fingers',
                footSoles = '$footSoles',
                buttocks = '$buttocks',
                mouthUlcers = '$mouthUlcers',
                pain = '$pain',
                anorexia = '$anorexia',
                bm = '$bm',
                soreThroat = '$soreThroat',
                nausVom = '$nausVom',
                diffBreath = '$diffBreath',
                paralysis = '$paralysis',
                meningLes = '$meningLes',
                otherSymptoms = '$otherSymptoms',
                anyComp = '$anyComp',
                complicated = '$complicated',
                otherCase = '$otherCase',
                caseClass = '$caseClass',
                outcome = '$outcome',
                travel = '$travel',
                wfDiag = '$wfDiag',
                dateDied = '$dateDied',
                probExposure = '$probExposure',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Hand, Foot and Mouth Disease info successfully added!";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Hand, Foot and Mouth Disease form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-9" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Hand, Foot and Mouth Disease Form</h2>
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
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('fever'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('rashChar'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('rashSores'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('palms'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('fingers'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('footSoles'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('buttocks'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('mouthUlcers'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('pain'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('anorexia'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('bm'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('soreThroat'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('nausVom'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('diffBreath'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('paralysis'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('meningLes'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('travel'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSymptoms" name="otherSymptoms">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Any Complication</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="anyComp" name="anyComp">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Complicated</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="complicated" name="complicated">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Prob Exposure</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="probExposure" name="probExposure">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Case</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherCase" name="otherCase">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Wf Diag</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="wfDiag" name="wfDiag">
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