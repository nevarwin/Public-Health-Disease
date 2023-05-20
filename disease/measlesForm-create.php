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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Measles Disease Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <?php
            echo generateDropdown('measVacc');
            echo generateDropdown('vitaminA');
            echo generateDropdown('cough');
            echo generateDropdown('koplikSpot');
            echo generateDropdown('runnyNose');
            echo generateDropdown('redEyes');
            echo generateDropdown('arthritisArthralgia');
            echo generateDropdown('swolympNod');
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Last Vaccine</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="date" class="form-control" name="lastVac" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Other Symptoms</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSymptoms" name="otherSymptoms">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Complications</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="complications" name="complications">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Other Case</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherCase" name="otherCase">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Final Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Discarded" type="text" class="form-control" id="finalClass" name="finalClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Infection Source</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Endemic" type="text" class="form-control" id="infectionSource" name="infectionSource">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth">
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>