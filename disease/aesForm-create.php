<?php
include('./components/alertMessage.php');
include("./components/connection.php");

$user_data = check_login($con);

$patientId = '';
$labResult = '';
$organism = '';
$outcome = '';
$dateDied = date("Y-m-d");

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
    $labResult = $_POST['labResult'];
    $organism = $_POST['organism'];
    $outcome = $_POST['outcome'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityWeek = $_POST['morbidityWeek'];
    $morbidityMonth = $_POST['morbidityMonth'];
    $caseClass = $_POST['caseClass'];


    // check if the data is empty
    do {
        if (empty($dateAdmitted) or empty($labResult) or empty($organism)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
        // Insert the data into the aesinfotbl table
        $query = "INSERT INTO aesinfotbl (
            patientId, 
            labResult, 
            organism, 
            outcome, 
            dateDied, 
            dateAdmitted, 
            morbidityMonth, 
            morbidityWeek,
            caseClass
        ) 
        VALUES (
            '$patientId', 
            '$labResult', 
            '$organism', 
            '$outcome', 
            '$dateDied', 
            '$dateAdmitted', 
            '$morbidityMonth', 
            '$morbidityWeek',
            '$caseClass'
        )";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "AES info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AES form submitted successfully!');
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
    <div class="row mb-3">
        <label for="stoolCulture" class="col-sm-3 col-form-label">Lab Result</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="labResult" name="labResult" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="organism" class="col-sm-3 col-form-label">Organism</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="organism" name="organism" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Case Class</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="caseClass" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" />
        </div>
    </div>
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="row mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>