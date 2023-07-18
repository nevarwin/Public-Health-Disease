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
    $measVacc = $_POST['measVacc'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['measVacc']);
    $vitaminA = $_POST['vitaminA'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['vitaminA']);
    $cough = $_POST['cough'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['cough']);
    $koplikSpot = $_POST['koplikSpot'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['koplikSpot']);
    $lastVac = $_POST['lastVac'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['lastVac']);
    $runnyNose = $_POST['runnyNose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['runnyNose']);
    $redEyes = $_POST['redEyes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['redEyes']);
    $arthritisArthralgia = $_POST['arthritisArthralgia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['arthritisArthralgia']);
    $swolympNod = $_POST['swolympNod'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['swolympNod']);
    $otherSymptoms = $_POST['otherSymptoms'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSymptoms']);
    $complications = $_POST['complications'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['complications']);
    $otherCase = $_POST['otherCase'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherCase']);
    $finalClass = $_POST['finalClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['finalClass']);
    $infectionSource = $_POST['infectionSource'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['infectionSource']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the measlesinfotbl table
        $query = "UPDATE measlesinfotbl SET
                measVacc = '$measVacc',
                vitaminA = '$vitaminA',
                cough = '$cough',
                koplikSpot = '$koplikSpot',
                lastVac = '$lastVac',
                runnyNose = '$runnyNose',
                redEyes = '$redEyes',
                arthritisArthralgia = '$arthritisArthralgia',
                swolympNod = '$swolympNod',
                otherSymptoms = '$otherSymptoms',
                complications = '$complications',
                otherCase = '$otherCase',
                finalClass = '$finalClass',
                infectionSource = '$infectionSource',
                outcome = '$outcome',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Measles info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Measles form submitted successfully!');
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
        <h2 class="row justify-content-center mb-3">Measles Disease Form</h2>
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
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('measVacc'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('vitaminA'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('cough'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('koplikSpot'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('runnyNose'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('redEyes'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('arthritisArthralgia'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('swolympNod'); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="date" class="form-control" name="lastVac" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSymptoms" name="otherSymptoms">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Complications</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="complications" name="complications">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Other Case</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherCase" name="otherCase">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Final Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Discarded" type="text" class="form-control" id="finalClass" name="finalClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Infection Source</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Endemic" type="text" class="form-control" id="infectionSource" name="infectionSource">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth">
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>