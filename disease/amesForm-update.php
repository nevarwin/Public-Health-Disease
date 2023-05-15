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
$sql = "SELECT * FROM amesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$behaviorChng = $row['behaviorChng'];
$seizure = $row['seizure'];
$stiffneck = $row['stiffneck'];
$bulgefontanel = $row['bulgefontanel'];
$menSign = $row['menSign'];
$clinDiag = $row['clinDiag'];
$pcv10 = $row['pcv10'];
$pcv13 = $row['pcv13'];
$meningoVacc = $row['meningoVacc'];
$vacMeningDate = $row['vacMeningDate'];
$meningoVaccDose = $row['meningoVaccDose'];
$measVacc = $row['measVacc'];
$vacMeasDate = $row['vacMeasDate'];
$measVaccDose = $row['measVaccDose'];
$aesCaseClass = $row['aesCaseClass'];
$finalDiagnosis = $row['finalDiagnosis'];
$outcome = $row['outcome'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];
$dateDied = $row['dateDied'];

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
            $message = "AMES info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AMES form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
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
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
        </div>
    </div>
    <div class="row mb-3">

        <label for="" class="col-sm-3 col-form-label">Fever</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="fever" name="fever" value='<?php echo $fever; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">behaviorChng</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="behaviorChng" name="behaviorChng" value='<?php echo $behaviorChng; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">seizure</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="seizure" value='<?php echo $seizure; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Stiff Neck</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="stiffneck" value='<?php echo $stiffneck; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">bulgefontanel</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="bulgefontanel" value='<?php echo $bulgefontanel; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">menSign</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="menSign" value='<?php echo $menSign; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">clinDiag</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="clinDiag" value='<?php echo $clinDiag; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">pcv10</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pcv10" value='<?php echo $pcv10; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">pcv13</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pcv13" value='<?php echo $pcv13; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">meningoVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="meningoVacc" value='<?php echo $meningoVacc; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="vacMeningDate" class="col-sm-3 col-form-label">vacMeningDate</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" id="vacMeningDate" name="vacMeningDate" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacMeningDate; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">meningoVaccDose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="meningoVaccDose" value='<?php echo $meningoVaccDose; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">measVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="measVacc" value='<?php echo $measVacc; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="vacMeasDate" class="col-sm-3 col-form-label">vacMeasDate</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" id="vacMeasDate" name="vacMeasDate" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacMeasDate; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">measVaccDose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="measVaccDose" value='<?php echo $measVaccDose; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">aesCaseClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="aesCaseClass" value='<?php echo $aesCaseClass; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">finalDiagnosis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="finalDiagnosis" value='<?php echo $finalDiagnosis; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
        </div>
    </div>
    <?php
    include('./components/outcomeUpdate.php');
    ?>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>