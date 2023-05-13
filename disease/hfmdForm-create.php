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
    $fever = $_POST['fever'];
    $rashChar = $_POST['rashChar'];
    $rashSores = $_POST['rashSores'];
    $palms = $_POST['palms'];
    $fingers = $_POST['fingers'];
    $footSoles = $_POST['footSoles'];
    $buttocks = $_POST['buttocks'];
    $mouthUlcers = $_POST['mouthUlcers'];
    $pain = $_POST['pain'];
    $anorexia = $_POST['anorexia'];
    $bm = $_POST['bm'];
    $soreThroat = $_POST['soreThroat'];
    $nausVom = $_POST['nausVom'];
    $diffBreath = $_POST['diffBreath'];
    $paralysis = $_POST['paralysis'];
    $meningLes = $_POST['meningLes'];
    $otherSymptoms = $_POST['otherSymptoms'];
    $anyComp = $_POST['anyComp'];
    $complicated = $_POST['complicated'];
    $otherCase = $_POST['otherCase'];
    $travel = $_POST['travel'];
    $probExposure = $_POST['probExposure'];
    $caseClass = $_POST['caseClass'];
    $outcome = $_POST['outcome'];
    $wfDiag = $_POST['wfDiag'];
    $dateDied = $_POST['dateDied'];
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
        // Insert the data into the Hand, Foot and Mouth Diseaseinfotbl table
        $query = "INSERT INTO hfmdinfotbl (
                patientId,
                fever,
                rashChar,
                rashSores,
                palms,
                fingers,
                footSoles,
                buttocks,
                mouthUlcers,
                pain,
                anorexia,
                bm,
                soreThroat,
                nausVom,
                diffBreath,
                paralysis,
                meningLes,
                otherSymptoms,
                anyComp,
                complicated,
                otherCase,
                travel,
                probExposure,
                caseClass,
                outcome,
                wfDiag,
                dateDied,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek
            )
            VALUES (
                '$patientId',
                '$fever',
                '$rashChar',
                '$rashSores',
                '$palms',
                '$fingers',
                '$footSoles',
                '$buttocks',
                '$mouthUlcers',
                '$pain',
                '$anorexia',
                '$bm',
                '$soreThroat',
                '$nausVom',
                '$diffBreath',
                '$paralysis',
                '$meningLes',
                '$otherSymptoms',
                '$anyComp',
                '$complicated',
                '$otherCase',
                '$travel',
                '$probExposure',
                '$caseClass',
                '$outcome',
                '$wfDiag',
                '$dateDied',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek'
            );";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Hand, Foot and Mouth Disease info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Hand, Foot and Mouth Disease form submitted successfully!');
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
        <label class="col-sm-3 form-label">Fever</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fever" name="fever">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rashChar</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rashChar" name="rashChar">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rashSores</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rashSores" name="rashSores">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">palms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="palms" name="palms">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Fingers</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fingers" name="fingers">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">footSoles</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="footSoles" name="footSoles">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">buttocks</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="buttocks" name="buttocks">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">mouthUlcers</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mouthUlcers" name="mouthUlcers">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">pain</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="pain" name="pain">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anorexia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anorexia" name="anorexia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bm</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="bm" name="bm">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="soreThroat" name="soreThroat">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">nausVom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nausVom" name="nausVom">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">diffBreath</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="diffBreath" name="diffBreath">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">paralysis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="paralysis" name="paralysis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anyComp</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anyComp" name="anyComp">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">complicated</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="complicated" name="complicated">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">travel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="travel" name="travel">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">probExposure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="probExposure" name="probExposure">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherCase</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherCase" name="otherCase">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">meningLes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="meningLes" name="meningLes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">wfDiag</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="wfDiag" name="wfDiag">
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
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="col-sm-3 form-control" id="dateDied" name="dateDied">
        </div>
    </div>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>