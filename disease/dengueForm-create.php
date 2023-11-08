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
    $type = $_POST['type'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['type']);
    $labTest = $_POST['labTest'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['labTest']);
    $labRes = $_POST['labRes'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['labRes']);
    $clinClass = $_POST['clinClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['clinClass']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);

    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the Dengueinfotbl table
        $query = "UPDATE dengueinfotbl SET
                    type = '$type',
                    labTest = '$labTest',
                    labRes = '$labRes',
                    clinClass = '$clinClass',
                    caseClass = '$caseClass',
                    outcome = '$outcome',
                    dateDied = '$dateDied',
                    dateAdmitted = '$dateAdmitted',
                    morbidityMonth = '$morbidityMonth',
                    morbidityWeek = '$morbidityWeek'
                WHERE patientId = $patientId;";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Dengue info successfully added!";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Dengue form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Oh no!';
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
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Dengue Disease Form</h2>
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
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Type</label>
                <div class="col-sm-6">
                    <input placeholder="ex. DF" type="text" class="form-control" id="type" name="type">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Lab Test</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Negative" type="text" class="form-control" id="labTest" name="labTest">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Lab Result</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Negative" type="text" class="form-control" id="labRes" name="labRes">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Clinical Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. No warning" type="text" class="form-control" id="clinClass" name="clinClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Case Class</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Suspected" type="text" class="form-control" id="caseClass" name="caseClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 form-label">Morbidity Month</label>
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