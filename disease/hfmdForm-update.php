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
$sql = "SELECT * FROM hfmdinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$rashChar = $row['rashChar'];
$rashSores = $row['rashSores'];
$palms = $row['palms'];
$fingers = $row['fingers'];
$footSoles = $row['footSoles'];
$buttocks = $row['buttocks'];
$mouthUlcers = $row['mouthUlcers'];
$pain = $row['pain'];
$anorexia = $row['anorexia'];
$bm = $row['bm'];
$soreThroat = $row['soreThroat'];
$nausVom = $row['nausVom'];
$diffBreath = $row['diffBreath'];
$paralysis = $row['paralysis'];
$meningLes = $row['meningLes'];
$otherSymptoms = $row['otherSymptoms'];
$anyComp = $row['anyComp'];
$complicated = $row['complicated'];
$otherCase = $row['otherCase'];
$travel = $row['travel'];
$probExposure = $row['probExposure'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$wfDiag = $row['wfDiag'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

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
        // Insert the data into the leptospirosisinfotbl table
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
                wfDiag = '$wfDiag',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Hand, Foot and Mouth Disease info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Hand, Foot and Mouth Disease info successfully updated!');
                window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form! " . mysqli_error($con);
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
        <label for="" class="col-sm-3 form-label">Date Admitted</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Fever</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fever" name="fever" value='<?php echo $fever; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rashChar</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rashChar" name="rashChar" value='<?php echo $rashChar; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rashSores</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rashSores" name="rashSores" value='<?php echo $rashSores; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">palms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="palms" name="palms" value='<?php echo $palms; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fingers" name="fingers" value='<?php echo $fingers; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">footSoles</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="footSoles" name="footSoles" value='<?php echo $footSoles; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">buttocks</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="buttocks" name="buttocks" value='<?php echo $buttocks; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">mouthUlcers</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mouthUlcers" name="mouthUlcers" value='<?php echo $mouthUlcers; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">pain</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="pain" name="pain" value='<?php echo $pain; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anorexia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anorexia" name="anorexia" value='<?php echo $anorexia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bm</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="bm" name="bm" value='<?php echo $bm; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="soreThroat" name="soreThroat" value='<?php echo $soreThroat; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">nausVom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nausVom" name="nausVom" value='<?php echo $nausVom; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">diffBreath</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="diffBreath" name="diffBreath" value='<?php echo $diffBreath; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">paralysis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="paralysis" name="paralysis" value='<?php echo $paralysis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms" value='<?php echo $otherSymptoms; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anyComp</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anyComp" name="anyComp" value='<?php echo $anyComp; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">complicated</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="complicated" name="complicated" value='<?php echo $complicated; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">travel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="travel" name="travel" value='<?php echo $travel; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">probExposure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="probExposure" name="probExposure" value='<?php echo $probExposure; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherCase</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherCase" name="otherCase" value='<?php echo $otherCase; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">meningLes</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="meningLes" name="meningLes" value='<?php echo $meningLes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">wfDiag</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="wfDiag" name="wfDiag" value='<?php echo $wfDiag; ?>'>
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
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome" value='<?php echo $outcome; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateDied" name="dateDied" value='<?php echo $dateDied; ?>'>
        </div>
    </div>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>