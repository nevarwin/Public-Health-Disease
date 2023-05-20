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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
            <?php
            echo generateDropdown('fever');
            echo generateDropdown('rashChar');
            echo generateDropdown('rashSores');
            echo generateDropdown('palms');
            echo generateDropdown('fingers');
            echo generateDropdown('footSoles');
            echo generateDropdown('buttocks');
            echo generateDropdown('mouthUlcers');
            echo generateDropdown('pain');
            echo generateDropdown('anorexia');
            echo generateDropdown('bm');
            echo generateDropdown('soreThroat');
            echo generateDropdown('nausVom');
            echo generateDropdown('diffBreath');
            echo generateDropdown('paralysis');
            echo generateDropdown('meningLes');
            echo generateDropdown('travel');
            ?>
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
                <label class="col-sm-3 col-form-label">complicated</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="complicated" name="complicated">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">probExposure</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="probExposure" name="probExposure">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">wfDiag</label>
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