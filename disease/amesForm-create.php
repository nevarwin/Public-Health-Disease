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
    $behaviorChng = $_POST['behaviorChng'];
    $seizure = $_POST['seizure'];
    $stiffneck = $_POST['stiffneck'];
    $bulgefontanel = $_POST['bulgefontanel'];
    $menSign = $_POST['menSign'];
    $clinDiag = $_POST['clinDiag'];
    $pcv10 = $_POST['pcv10'];
    $pcv13 = $_POST['pcv13'];
    $meningoVacc = $_POST['meningoVacc'];
    $vacMeningDate = $_POST['vacMeningDate'];
    $meningoVaccDose = $_POST['meningoVaccDose'];
    $measVacc = $_POST['measVacc'];
    $vacMeasDate = $_POST['vacMeasDate'];
    $measVaccDose = $_POST['measVaccDose'];
    $aesCaseClass = $_POST['aesCaseClass'];
    $finalDiagnosis = $_POST['finalDiagnosis'];
    $outcome = $_POST['outcome'];
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityMonth = $_POST['morbidityMonth'];
    $morbidityWeek = $_POST['morbidityWeek'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        if (empty($dateAdmitted)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
        // Insert the data into the afpinfotbl table
        $query = "INSERT INTO amesinfotbl (
                patientId,
                fever,
                behaviorChng,
                seizure,
                stiffneck,
                bulgefontanel,
                menSign,
                clinDiag,
                pcv10,
                pcv13,
                meningoVacc,
                vacMeningDate,
                meningoVaccDose,
                measVacc,
                vacMeasDate,
                measVaccDose,
                aesCaseClass,
                finalDiagnosis,
                outcome,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek,
                dateDied
            )
            VALUES (
                '$patientId',
                '$fever',
                '$behaviorChng',
                '$seizure',
                '$stiffneck',
                '$bulgefontanel',
                '$menSign',
                '$clinDiag',
                '$pcv10',
                '$pcv13',
                '$meningoVacc',
                '$vacMeningDate',
                '$meningoVaccDose',
                '$measVacc',
                '$vacMeasDate',
                '$measVaccDose',
                '$aesCaseClass',
                '$finalDiagnosis',
                '$outcome',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek',
                '$dateDied'
            );";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "AFP info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AFP form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "
            <script>
                alert('Error submitting form! " . mysqli_error($con) . "');
            </script>";
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
            <?php
            echo generateDropdown('fever');
            echo generateDropdown('behaviorChng');
            echo generateDropdown('seizure');
            echo generateDropdown('stiffneck');
            echo generateDropdown('bulgefontanel');
            echo generateDropdown('menSign');
            echo generateDropdown('pcv10');
            echo generateDropdown('pcv13');
            echo generateDropdown('meningoVacc');
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">clinDiag</label>
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