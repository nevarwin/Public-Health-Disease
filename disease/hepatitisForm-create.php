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
    $type = $_POST['type'];
    $labResult = $_POST['labResult'];
    $typeofHepatitis = $_POST['typeofHepatitis'];
    $caseClass = $_POST['caseClass'];
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
        // Insert the data into the hepatitisinfotbl table
        $query = "INSERT INTO hepatitisinfotbl (
                    patientId,
                    type,
                    labResult,
                    typeofHepatitis,
                    caseClass,
                    outcome,
                    dateDied,
                    dateAdmitted,
                    morbidityMonth,
                    morbidityWeek
                )
                VALUES (
                    '$patientId',
                    '$type',
                    '$labResult',
                    '$typeofHepatitis',
                    '$caseClass',
                    '$outcome',
                    '$dateDied',
                    '$dateAdmitted',
                    '$morbidityMonth',
                    '$morbidityWeek'
                )";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Hepatitis info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Hepatitis form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
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
        <label class="col-sm-3 form-label">Type</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="type" name="type">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Lab Result</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="labResult" name="labResult">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Type of Hepatitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="typeofHepatitis" name="typeofHepatitis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Case Class</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass">
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
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">

            <input type="datetime-local" class="col-sm-3 form-control" id="dateDied" name="dateDied">
        </div>
    </div>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>