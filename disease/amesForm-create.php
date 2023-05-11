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
    $dateDied = $_POST['dateDied'];

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
    <div class="mb-3">
        <label for="" class="form-label">Fever</label>
        <input type="text" class="form-control" id="fever" name="fever">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">behaviorChng</label>
        <input type="text" class="form-control" id="behaviorChng" name="behaviorChng">
    </div>

    <div class="mb-3">
        <label for="" class="col-form-label">seizure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="seizure" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="stiffneck" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">bulgefontanel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="bulgefontanel" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">menSign</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="menSign" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">clinDiag</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="clinDiag" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">pcv10</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pcv10" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">pcv13</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pcv13" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">meningoVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="meningoVacc" />
        </div>
    </div>
    <div class="mb-3">
        <label for="vacMeningDate" class="form-label">vacMeningDate</label>
        <input type="date" class="form-control" id="vacMeningDate" name="vacMeningDate" max="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">meningoVaccDose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="meningoVaccDose" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">measVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="measVacc" />
        </div>
    </div>
    <div class="mb-3">
        <label for="vacMeasDate" class="form-label">vacMeasDate</label>
        <input type="date" class="form-control" id="vacMeasDate" name="vacMeasDate" max="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">measVaccDose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="measVaccDose" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">aesCaseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="aesCaseClass" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">finalDiagnosis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="finalDiagnosis" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" />
        </div>
    </div>
    <div class="mb-3">
        <label for="outcome" class="form-label">Outcome</label>
        <input type="text" class="form-control" id="outcome" name="outcome">
    </div>
    <div class="mb-3">
        <label for="dateDied" class="form-label">Date Died</label>
        <input type="date" class="form-control" id="dateDied" name="dateDied" max="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="row mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</form>