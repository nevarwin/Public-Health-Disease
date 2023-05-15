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
        // Insert the data into the measlesinfotbl table
        $query = "INSERT INTO measlesinfotbl (
                patientId,
                measVacc,
                vitaminA,
                cough,
                koplikSpot,
                lastVac,
                runnyNose,
                redEyes,
                arthritisArthralgia,
                swolympNod,
                otherSymptoms,
                complications,
                otherCase,
                finalClass,
                infectionSource,
                outcome,
                dateDied,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek
            )
            VALUES (
                '$patientId',
                '$measVacc',
                '$vitaminA',
                '$cough',
                '$koplikSpot',
                '$lastVac',
                '$runnyNose',
                '$redEyes',
                '$arthritisArthralgia',
                '$swolympNod',
                '$otherSymptoms',
                '$complications',
                '$otherCase',
                '$finalClass',
                '$infectionSource',
                '$outcome',
                '$dateDied',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek'
            );";




        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Measles info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Measles form submitted successfully!');
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
        <label class="col-sm-3 form-label">Measles Vaccine</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="measVacc" name="measVacc">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">vitaminA</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vitaminA" name="vitaminA">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cough</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cough" name="cough">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">koplikSpot</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="koplikSpot" name="koplikSpot">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="lastVac" max="<?php echo date('Y-m-d'); ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Runny Nose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="runnyNose" name="runnyNose">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Red Eye</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="redEyes" name="redEyes">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">arthritisArthralgia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="arthritisArthralgia" name="arthritisArthralgia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">swolympNod</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="swolympNod" name="swolympNod">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Symptoms</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSymptoms" name="otherSymptoms">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">complications</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="complications" name="complications">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">otherCase</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherCase" name="otherCase">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">finalClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalClass" name="finalClass">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">infectionSource</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="infectionSource" name="infectionSource">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth">
        </div>
    </div>
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>