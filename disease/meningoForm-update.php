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
$sql = "SELECT * FROM meningoinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$seizure = $row['seizure'];
$malaise = $row['malaise'];
$headache = $row['headache'];
$stiffNeck = $row['stiffNeck'];
$cough = $row['cough'];
$rash = $row['rash'];
$vomiting = $row['vomiting'];
$soreThroat = $row['soreThroat'];
$petechia = $row['petechia'];
$sensoriumCh = $row['sensoriumCh'];
$runnyNose = $row['runnyNose'];
$purpura = $row['purpura'];
$drowsiness = $row['drowsiness'];
$dyspnea = $row['dyspnea'];
$otherSS = $row['otherSS'];
$clinicalPres = $row['clinicalPres'];
$caseClass = $row['caseClass'];
$antibiotics = $row['antibiotics'];
$bloodSpecimen = $row['bloodSpecimen'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $fever = $_POST['fever'];
    $seizure = $_POST['seizure'];
    $malaise = $_POST['malaise'];
    $headache = $_POST['headache'];
    $stiffNeck = $_POST['stiffNeck'];
    $cough = $_POST['cough'];
    $rash = $_POST['rash'];
    $vomiting = $_POST['vomiting'];
    $soreThroat = $_POST['soreThroat'];
    $petechia = $_POST['petechia'];
    $sensoriumCh = $_POST['sensoriumCh'];
    $runnyNose = $_POST['runnyNose'];
    $purpura = $_POST['purpura'];
    $drowsiness = $_POST['drowsiness'];
    $dyspnea = $_POST['dyspnea'];
    $otherSS = $_POST['otherSS'];
    $clinicalPres = $_POST['clinicalPres'];
    $caseClass = $_POST['caseClass'];
    $antibiotics = $_POST['antibiotics'];
    $bloodSpecimen = $_POST['bloodSpecimen'];
    $outcome = $_POST['outcome'];
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
        $query = "UPDATE meningoinfotbl SET
                fever = '$fever',
                seizure = '$seizure',
                malaise = '$malaise',
                headache = '$headache',
                stiffNeck = '$stiffNeck',
                cough = '$cough',
                rash = '$rash',
                vomiting = '$vomiting',
                soreThroat = '$soreThroat',
                petechia = '$petechia',
                sensoriumCh = '$sensoriumCh',
                runnyNose = '$runnyNose',
                purpura = '$purpura',
                drowsiness = '$drowsiness',
                dyspnea = '$dyspnea',
                otherSS = '$otherSS',
                clinicalPres = '$clinicalPres',
                caseClass = '$caseClass',
                antibiotics = '$antibiotics',
                bloodSpecimen = '$bloodSpecimen',
                outcome = '$outcome',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Meningo info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Meningo info successfully updated!');
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
        <label class="col-sm-3 form-label">seizure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="seizure" name="seizure" value='<?php echo $seizure; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">malaise</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="malaise" name="malaise" value='<?php echo $malaise; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">headache</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="headache" name="headache" value='<?php echo $headache; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="stiffNeck" name="stiffNeck" value='<?php echo $stiffNeck; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cough" name="cough" value='<?php echo $cough; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rash</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rash" name="rash" value='<?php echo $rash; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vomiting</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vomiting" name="vomiting" value='<?php echo $vomiting; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="soreThroat" name="soreThroat" value='<?php echo $soreThroat; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">petechia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="petechia" name="petechia" value='<?php echo $petechia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sensoriumCh</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sensoriumCh" name="sensoriumCh" value='<?php echo $sensoriumCh; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">runnyNose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="runnyNose" name="runnyNose" value='<?php echo $runnyNose; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">purpura</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="purpura" name="purpura" value='<?php echo $purpura; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">drowsiness</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="drowsiness" name="drowsiness" value='<?php echo $drowsiness; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dyspnea</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dyspnea" name="dyspnea" value='<?php echo $dyspnea; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSS" name="otherSS" value='<?php echo $otherSS; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clinicalPres</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clinicalPres" name="clinicalPres" value='<?php echo $clinicalPres; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">antibiotics</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="antibiotics" name="antibiotics" value='<?php echo $antibiotics; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bloodSpecimen</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="bloodSpecimen" name="bloodSpecimen" value='<?php echo $bloodSpecimen; ?>'>
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