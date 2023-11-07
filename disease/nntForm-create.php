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
    echo "No information Available";
}

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $recentAcuteWound = $_POST['recentAcuteWound'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['recentAcuteWound']);
    $woundSite = $_POST['woundSite'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['woundSite']);
    $woundType = $_POST['woundType'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['woundType']);
    $otherWound = $_POST['otherWound'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherWound']);
    $tetanusToxoid = $_POST['tetanusToxoid'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['tetanusToxoid']);
    $tetanusAntitoxin = $_POST['tetanusAntitoxin'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['tetanusAntitoxin']);
    $skinLesion = $_POST['skinLesion'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['skinLesion']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';


    // check if the data is empty
    do {
        // Insert the data into the nntinfotbl table
        $query = "UPDATE nntinfotbl SET
                recentAcuteWound = '$recentAcuteWound',
                woundSite = '$woundSite',
                woundType = '$woundType',
                otherWound = '$otherWound',
                tetanusToxoid = '$tetanusToxoid',
                tetanusAntitoxin = '$tetanusAntitoxin',
                skinLesion = '$skinLesion',
                outcome = '$outcome',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Number Need to Treat info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Number Need to Treat form submitted successfully!');
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
        <h2 class="row justify-content-center mb-3">Number Needed to Treat Form</h2>
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
                <label class="col-sm-3 col-form-label">Lab Result</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="labResult" name="labResult">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Recent Acute Wound</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="recentAcuteWound" name="recentAcuteWound">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Wound Site</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="woundSite" name="woundSite">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Wound Type</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="woundType" name="woundType">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Wound</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherWound" name="otherWound">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Tetanus Toxoid</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="tetanusToxoid" name="tetanusToxoid">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Tetanus Antitoxin</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="tetanusAntitoxin" name="tetanusAntitoxin">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Skin Lesion</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="skinLesion" name="skinLesion">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Month</label>
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