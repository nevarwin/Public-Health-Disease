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
        // Insert the data into the meningoinfotbl table
        $query = "INSERT INTO meningoinfotbl (
                patientId,
                fever,
                seizure,
                malaise,
                headache,
                stiffNeck,
                cough,
                rash,
                vomiting,
                soreThroat,
                petechia,
                sensoriumCh,
                runnyNose,
                purpura,
                drowsiness,
                dyspnea,
                otherSS,
                clinicalPres,
                caseClass,
                antibiotics,
                bloodSpecimen,
                outcome,
                dateDied,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek
            )
            VALUES (
                '$patientId',
                '$fever',
                '$seizure',
                '$malaise',
                '$headache',
                '$stiffNeck',
                '$cough',
                '$rash',
                '$vomiting',
                '$soreThroat',
                '$petechia',
                '$sensoriumCh',
                '$runnyNose',
                '$purpura',
                '$drowsiness',
                '$dyspnea',
                '$otherSS',
                '$clinicalPres',
                '$caseClass',
                '$antibiotics',
                '$bloodSpecimen',
                '$outcome',
                '$dateDied',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek'
            );";



        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Meningo info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Meningo form submitted successfully!');
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
        <label class="col-sm-3 form-label">seizure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="seizure" name="seizure">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">malaise</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="malaise" name="malaise">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">headache</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="headache" name="headache">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="stiffNeck" name="stiffNeck">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cough" name="cough">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">rash</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rash" name="rash">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vomiting</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vomiting" name="vomiting">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">soreThroat</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="soreThroat" name="soreThroat">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">petechia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="petechia" name="petechia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sensoriumCh</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sensoriumCh" name="sensoriumCh">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">runnyNose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="runnyNose" name="runnyNose">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">purpura</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="purpura" name="purpura">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">drowsiness</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="drowsiness" name="drowsiness">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dyspnea</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dyspnea" name="dyspnea">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSS" name="otherSS">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clinicalPres</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clinicalPres" name="clinicalPres">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">caseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">antibiotics</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="antibiotics" name="antibiotics">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">bloodSpecimen</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="bloodSpecimen" name="bloodSpecimen">
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
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>