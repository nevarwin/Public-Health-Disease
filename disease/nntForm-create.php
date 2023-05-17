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
    $recentAcuteWound = $_POST['recentAcuteWound'];
    $woundSite = $_POST['woundSite'];
    $woundType = $_POST['woundType'];
    $otherWound = $_POST['otherWound'];
    $tetanusToxoid = $_POST['tetanusToxoid'];
    $tetanusAntitoxin = $_POST['tetanusAntitoxin'];
    $skinLesion = $_POST['skinLesion'];
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
        // Insert the data into the nntinfotbl table
        $query = "INSERT INTO nntinfotbl (
                patientId,
                recentAcuteWound,
                woundSite,
                woundType,
                otherWound,
                tetanusToxoid,
                tetanusAntitoxin,
                skinLesion,
                outcome,
                dateDied,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek
            )
            VALUES (
                '$patientId',
                '$recentAcuteWound',
                '$woundSite',
                '$woundType',
                '$otherWound',
                '$tetanusToxoid',
                '$tetanusAntitoxin',
                '$skinLesion',
                '$outcome',
                '$dateDied',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek'
            );";



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
        <label class="col-sm-3 form-label">Lab Result</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="labResult" name="labResult">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">recentAcuteWound</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="recentAcuteWound" name="recentAcuteWound">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Wound Site</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="woundSite" name="woundSite">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Wound Type</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="woundType" name="woundType">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Wound</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherWound" name="otherWound">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Tetanus Toxoid</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="tetanusToxoid" name="tetanusToxoid">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">tetanusAntitoxin</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="tetanusAntitoxin" name="tetanusAntitoxin">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Skin Lesion</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="skinLesion" name="skinLesion">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth">
        </div>
    </div>
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>