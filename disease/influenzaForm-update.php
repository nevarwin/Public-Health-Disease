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
$sql = "SELECT * FROM influenzainfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$labResult = $row['labResult'];
$organism = $row['organism'];
$sari = $row['sari'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$vaccinated = $row['vaccinated'];
$vacName = $row['vacName'];
$vacDate1 = $row['vacDate1'];
$vacDate2 = $row['vacDate2'];
$boosterName = $row['boosterName'];
$boosterDate = $row['boosterDate'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $labResult = $_POST['labResult'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['labResult']);
    $organism = $_POST['organism'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['organism']);
    $sari = $_POST['sari'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['sari']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $vaccinated = $_POST['vaccinated'];
    $vacName = ($_POST['vaccinated'] === 'yes') ? $_POST['vacName'] : 'N/A';
    $vacDate1 = ($_POST['vaccinated'] === 'yes') ? $_POST['vacDate1'] : '';
    $vacDate2 = ($_POST['vaccinated'] === 'yes') ? $_POST['vacDate2'] : '';
    $boosterName = ($_POST['vaccinated'] === 'yes') ? $_POST['boosterName'] : 'N/A';
    $boosterDate = ($_POST['vaccinated'] === 'yes') ? $_POST['boosterDate'] : '';
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    // check if the data is empty
    do {
        // Insert the data into the influenzainfotbl table
        $query = "UPDATE influenzainfotbl
                SET
                    labResult = '$labResult',
                    organism = '$organism',
                    sari = '$sari',
                    caseClass = '$caseClass',
                    outcome = '$outcome',
                    vacName = '$vacName',
                    vaccinated = '$vaccinated',
                    vacDate1 = '$vacDate1',
                    vacDate2 = '$vacDate2',
                    boosterName = '$boosterName',
                    boosterDate = '$boosterDate',
                    dateDied = '$dateDied',
                    dateAdmitted = '$dateAdmitted',
                    morbidityMonth = '$morbidityMonth',
                    morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId'";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Influenza info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Influenza info successfully updated!');
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
        <h2 class="row justify-content-center mb-3">Update Influenza Virus Form</h2>
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
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Lab Result</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="labResult" name="labResult" value='<?php echo $labResult; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Booster Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="organism" name="organism" value='<?php echo $organism; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Vaccinated?</label>
                <div class="col-sm-6">
                    <select class="custom-select" id="vaccinated" name="vaccinated">
                        <option value="yes" <?php echo ($vaccinated == 'yes') ? 'selected' : ''; ?>>Yes</option>
                        <option value="no" <?php echo ($vaccinated == 'no') ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
            </div>
            <div id="vaccinationInputs" style="display: none;">
                <div class="row justify-content-center mb-3">
                    <label class="col-sm-3 col-form-label">Vaccine Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="vacName" name="vacName" value='<?php echo $vacName; ?>' <?= $vaccinated == 'yes' ? 'required' : '' ?>>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <label for="" class="col-sm-3 col-form-label">1st Vaccine Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="vacDate1" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacDate1; ?>' />
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <label for="" class="col-sm-3 col-form-label">2nd Vaccine Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="vacDate2" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacDate2; ?>' />
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <label class="col-sm-3 col-form-label">Booster Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="boosterName" name="boosterName" value='<?php echo $boosterName; ?>' <?= $vaccinated == 'yes' ? 'required' : '' ?>>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <label for="" class="col-sm-3 col-form-label">Booster Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="boosterDate" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $boosterDate; ?>' />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Sari</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="sari" name="sari" value='<?php echo $sari; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case Classification</label>
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
            include('./components/submitCancel.php');
            ?>
        </form>
    </div>
</div>
<script>
    // Get the vaccination dropdown element
    var vaccinatedDropdown = document.getElementById('vaccinated');
    // Get the vaccination inputs container
    var vaccinationInputs = document.getElementById('vaccinationInputs');

    // Function to toggle the visibility of the vaccination inputs
    function toggleVaccinationInputs() {
        if (vaccinatedDropdown.value === 'yes') {
            vaccinationInputs.style.display = 'block';
        } else {
            vaccinationInputs.style.display = 'none';
        }
    }

    // Add event listener to the dropdown to toggle inputs on change
    vaccinatedDropdown.addEventListener('change', toggleVaccinationInputs);

    // Initial check on page load
    toggleVaccinationInputs();
</script>