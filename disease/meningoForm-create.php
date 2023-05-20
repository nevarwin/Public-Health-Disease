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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Meningo Disease Form</h2>
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
            echo generateDropdown('seizure');
            echo generateDropdown('malaise');
            echo generateDropdown('headache');
            echo generateDropdown('stiffNeck');
            echo generateDropdown('cough');
            echo generateDropdown('rash');
            echo generateDropdown('vomiting');
            echo generateDropdown('soreThroat');
            echo generateDropdown('petechia');
            echo generateDropdown('sensoriumCh');
            echo generateDropdown('runnyNose');
            echo generateDropdown('purpura');
            echo generateDropdown('drowsiness');
            echo generateDropdown('dyspnea');
            echo generateDropdown('bloodSpecimen');
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSS" name="otherSS">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">clinicalPres</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="clinicalPres" name="clinicalPres">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Suspected" type="text" class="form-control" id="caseClass" name="caseClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Antibiotics</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="antibiotics" name="antibiotics">
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