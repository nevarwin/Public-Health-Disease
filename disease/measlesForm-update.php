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
$sql = "SELECT * FROM measlesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$measVacc = $row['measVacc'];
$vitaminA = $row['vitaminA'];
$cough = $row['cough'];
$koplikSpot = $row['koplikSpot'];
$lastVac = $row['lastVac'];
$runnyNose = $row['runnyNose'];
$redEyes = $row['redEyes'];
$arthritisArthralgia = $row['arthritisArthralgia'];
$swolympNod = $row['swolympNod'];
$otherSymptoms = $row['otherSymptoms'];
$complications = $row['complications'];
$otherCase = $row['otherCase'];
$finalClass = $row['finalClass'];
$infectionSource = $row['infectionSource'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

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
        // Insert the data into the leptospirosisinfotbl table
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
            $message = "Measles info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Measles info successfully updated!');
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
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Measles Disease Form</h2>
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
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('measVacc', $measVacc); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('vitaminA', $vitaminA); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('cough', $cough); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('koplikSpot', $koplikSpot); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('runnyNose', $runnyNose); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('redEyes', $redEyes); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('arthritisArthralgia', $arthritisArthralgia); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('swolympNod', $swolympNod); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="lastVac" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $lastVac; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms" value='<?php echo $otherSymptoms; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Complications</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="complications" name="complications" value='<?php echo $complications; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Case</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherCase" name="otherCase" value='<?php echo $otherCase; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Final Class</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="finalClass" name="finalClass" value='<?php echo $finalClass; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Infection Source</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="infectionSource" name="infectionSource" value='<?php echo $infectionSource; ?>'>
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