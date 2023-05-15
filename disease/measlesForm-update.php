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
$sql = "SELECT * FROM measlesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$measVacc = $row['measVacc'];
$vitaminA = $row['vitaminA'];
$cough = $row['cough'];
$koplikSpot = $row['koplikSpot'];
$lastVac = $row['lastVac'];
$runnyNose = $row['runnyNose'];
$redEyes = $row['redEyes'];
$arthritisArthralgia = $row['arthritisArthralgia'];
$swolympNod = $row['swolympNod'];
$otherSymptoms = $row['otherSymptoms'];
$complications = $row['complications'];
$otherCase = $row['otherCase'];
$finalClass = $row['finalClass'];
$infectionSource = $row['infectionSource'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $measVacc = $_POST['measVacc'];
    $vitaminA = $_POST['vitaminA'];
    $cough = $_POST['cough'];
    $koplikSpot = $_POST['koplikSpot'];
    $lastVac = $_POST['lastVac'];
    $runnyNose = $_POST['runnyNose'];
    $redEyes = $_POST['redEyes'];
    $arthritisArthralgia = $_POST['arthritisArthralgia'];
    $swolympNod = $_POST['swolympNod'];
    $otherSymptoms = $_POST['otherSymptoms'];
    $complications = $_POST['complications'];
    $otherCase = $_POST['otherCase'];
    $finalClass = $_POST['finalClass'];
    $infectionSource = $_POST['infectionSource'];
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
        // Insert the data into the leptospirosisinfotbl table
        $query = "UPDATE measlesinfotbl SET
                measVacc = '$measVacc',
                vitaminA = '$vitaminA',
                cough = '$cough',
                koplikSpot = '$koplikSpot',
                lastVac = '$lastVac',
                runnyNose = '$runnyNose',
                redEyes = '$redEyes',
                arthritisArthralgia = '$arthritisArthralgia',
                swolympNod = '$swolympNod',
                otherSymptoms = '$otherSymptoms',
                complications = '$complications',
                otherCase = '$otherCase',
                finalClass = '$finalClass',
                infectionSource = '$infectionSource',
                outcome = '$outcome',
                dateDied = '$dateDied',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId';";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Measles info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Measles info successfully updated!');
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
        <label class="col-sm-3 form-label">Measles Vaccine</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="measVacc" name="measVacc" value='<?php echo $measVacc; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vitaminA</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vitaminA" name="vitaminA" value='<?php echo $vitaminA; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cough" name="cough" value='<?php echo $cough; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">koplikSpot</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="koplikSpot" name="koplikSpot" value='<?php echo $koplikSpot; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="lastVac" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $lastVac; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Runny Nose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="runnyNose" name="runnyNose" value='<?php echo $runnyNose; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Red Eye</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="redEyes" name="redEyes" value='<?php echo $redEyes; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthritisArthralgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthritisArthralgia" name="arthritisArthralgia" value='<?php echo $arthritisArthralgia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">swolympNod</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="swolympNod" name="swolympNod" value='<?php echo $swolympNod; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherSymptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms" value='<?php echo $otherSymptoms; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">complications</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="complications" name="complications" value='<?php echo $complications; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherCase</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherCase" name="otherCase" value='<?php echo $otherCase; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">finalClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalClass" name="finalClass" value='<?php echo $finalClass; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">infectionSource</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="infectionSource" name="infectionSource" value='<?php echo $infectionSource; ?>'>
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
    <?php
    include('./components/outcomeUpdate.php');
    ?>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>