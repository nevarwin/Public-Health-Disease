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
    echo "No information Available";
}

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $fever = mysqli_real_escape_string($con, $_POST['fever']);
    $behaviorChng = mysqli_real_escape_string($con, $_POST['behaviorChng']);
    $seizure = mysqli_real_escape_string($con, $_POST['seizure']);
    $stiffneck = mysqli_real_escape_string($con, $_POST['stiffneck']);
    $bulgefontanel = mysqli_real_escape_string($con, $_POST['bulgefontanel']);
    $menSign = mysqli_real_escape_string($con, $_POST['menSign']);
    $pcv10 = mysqli_real_escape_string($con, $_POST['pcv10']);
    $pcv13 = mysqli_real_escape_string($con, $_POST['pcv13']);
    $meningoVacc = mysqli_real_escape_string($con, $_POST['meningoVacc']);
    $vacMeningDate = mysqli_real_escape_string($con, $_POST['vacMeningDate']);
    $clinDiag = $_POST['clinDiag'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['clinDiag']);
    $meningoVaccDose = $_POST['meningoVaccDose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['meningoVaccDose']);
    $measVacc = $_POST['measVacc'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['measVacc']);
    $vacMeasDate = $_POST['vacMeasDate'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['vacMeasDate']);
    $measVaccDose = $_POST['measVaccDose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['measVaccDose']);
    $aesCaseClass = $_POST['aesCaseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['aesCaseClass']);
    $finalDiagnosis = $_POST['finalDiagnosis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['finalDiagnosis']);
    $outcome = mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the afpinfotbl table
        $query = "UPDATE amesinfotbl SET
                fever = '$fever',
                behaviorChng = '$behaviorChng',
                seizure = '$seizure',
                stiffneck = '$stiffneck',
                bulgefontanel = '$bulgefontanel',
                menSign = '$menSign',
                clinDiag = '$clinDiag',
                pcv10 = '$pcv10',
                pcv13 = '$pcv13',
                meningoVacc = '$meningoVacc',
                vacMeningDate = '$vacMeningDate',
                meningoVaccDose = '$meningoVaccDose',
                measVacc = '$measVacc',
                vacMeasDate = '$vacMeasDate',
                measVaccDose = '$measVaccDose',
                aesCaseClass = '$aesCaseClass',
                finalDiagnosis = '$finalDiagnosis',
                outcome = '$outcome',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek',
                dateDied = '$dateDied'
            WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "AFP info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AFP form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "
            <script>
                alert('Error submitting form! " . mysqli_error($con) . "');
            </script>";
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Acute Meningitis Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('fever'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('behaviorChng'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('seizure'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('stiffneck'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('bulgefontanel'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('menSign'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('pcv10'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('pcv13'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('meningoVacc'); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Clin Diag</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="clinDiag" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="vacMeningDate" class="col-sm-3 col-form-label">Vac Mening Date</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="date" class="form-control" id="vacMeningDate" name="vacMeningDate" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Meningo Vacc Dose</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="meningoVaccDose" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Meas Vacc</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="measVacc" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="vacMeasDate" class="col-sm-3 col-form-label">Vaccine Meas Date</label>
                <div class="col-sm-6">

                    <input placeholder="ex. 1" type="date" class="form-control" id="vacMeasDate" name="vacMeasDate" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Meas Vacc Dose</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="measVaccDose" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">AES Case Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="aesCaseClass" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Final Diagnosis</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="finalDiagnosis" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth" />
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>