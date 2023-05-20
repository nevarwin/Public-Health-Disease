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
                probExposure = '$probExposure',
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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Hand, Foot and Mouth Disease Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('fever', $fever);
            echo generateDropdownUpdate('rashChar', $rashChar);
            echo generateDropdownUpdate('rashSores', $rashSores);
            echo generateDropdownUpdate('palms', $palms);
            echo generateDropdownUpdate('fingers', $fingers);
            echo generateDropdownUpdate('footSoles', $footSoles);
            echo generateDropdownUpdate('buttocks', $buttocks);
            echo generateDropdownUpdate('mouthUlcers', $mouthUlcers);
            echo generateDropdownUpdate('pain', $pain);
            echo generateDropdownUpdate('anorexia', $anorexia);
            echo generateDropdownUpdate('bm', $bm);
            echo generateDropdownUpdate('soreThroat', $soreThroat);
            echo generateDropdownUpdate('nausVom', $nausVom);
            echo generateDropdownUpdate('diffBreath', $diffBreath);
            echo generateDropdownUpdate('paralysis', $paralysis);
            echo generateDropdownUpdate('meningLes', $meningLes);
            echo generateDropdownUpdate('travel', $travel);
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms" value='<?php echo $otherSymptoms; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">anyComp</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="anyComp" name="anyComp" value='<?php echo $anyComp; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">complicated</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="complicated" name="complicated" value='<?php echo $complicated; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">probExposure</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="probExposure" name="probExposure" value='<?php echo $probExposure; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">otherCase</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherCase" name="otherCase" value='<?php echo $otherCase; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">wfDiag</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="wfDiag" name="wfDiag" value='<?php echo $wfDiag; ?>'>
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
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
                </div>
            </div>
            <?php
            include('./components/outcomeUpdate.php');
            ?>
            <?php
            include('./components/submitCancel.php');
            ?>
        </form>
    </div>
</div>