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
$sql = "SELECT * FROM meningoinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "No information Available";;
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
    $fever = $_POST['fever'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['fever']);
    $seizure = $_POST['seizure'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['seizure']);
    $malaise = $_POST['malaise'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['malaise']);
    $headache = $_POST['headache'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['headache']);
    $stiffNeck = $_POST['stiffNeck'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stiffNeck']);
    $cough = $_POST['cough'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['cough']);
    $rash = $_POST['rash'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rash']);
    $vomiting = $_POST['vomiting'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['vomiting']);
    $soreThroat = $_POST['soreThroat'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['soreThroat']);
    $petechia = $_POST['petechia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['petechia']);
    $sensoriumCh = $_POST['sensoriumCh'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['sensoriumCh']);
    $runnyNose = $_POST['runnyNose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['runnyNose']);
    $purpura = $_POST['purpura'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['purpura']);
    $drowsiness = $_POST['drowsiness'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['drowsiness']);
    $dyspnea = $_POST['dyspnea'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dyspnea']);
    $otherSS = $_POST['otherSS'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSS']);
    $clinicalPres = $_POST['clinicalPres'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['clinicalPres']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $antibiotics = $_POST['antibiotics'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['antibiotics']);
    $bloodSpecimen = $_POST['bloodSpecimen'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['bloodSpecimen']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    // check if the data is empty
    do {
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
            $strongContent = 'Oh no!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Meningo info successfully updated!');
                window.location = 'patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form! " . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Meningo Disease Form</h2>
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
                    <?php echo generateDropdownUpdate('fever', $fever); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('seizure', $seizure); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('malaise', $malaise); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('headache', $headache); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('stiffNeck', $stiffNeck); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('cough', $cough); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('rash', $rash); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('vomiting', $vomiting); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('soreThroat', $soreThroat); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('petechia', $petechia); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('sensoriumCh', $sensoriumCh); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('runnyNose', $runnyNose); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('purpura', $purpura); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('drowsiness', $drowsiness); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dyspnea', $dyspnea); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('bloodSpecimen', $bloodSpecimen); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSS" name="otherSS" value='<?php echo $otherSS; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Clinical Pres</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="clinicalPres" name="clinicalPres" value='<?php echo $clinicalPres; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case Class</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Antibiotics</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="antibiotics" name="antibiotics" value='<?php echo $antibiotics; ?>'>
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