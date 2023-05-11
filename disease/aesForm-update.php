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
// read row 
$sql = "SELECT * FROM aesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$labResult = $row['labResult'];
$organism = $row['organism'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityWeek = $row['morbidityWeek'];
$morbidityMonth = $row['morbidityMonth'];
$caseClass = $row['caseClass'];


// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $labResult = $_POST['labResult'];
    $organism = $_POST['organism'];
    $outcome = $_POST['outcome'];
    $dateDied = $_POST['dateDied'];
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
        // Insert the data into the amebiasisinfotbl table
        $query = "UPDATE aesinfotbl SET 
            labResult = '$labResult',
            organism = '$organism',
            outcome = '$outcome',
            dateDied = '$dateDied',
            dateAdmitted = '$dateAdmitted',
            morbidityMonth = '$morbidityMonth',
            morbidityWeek = '$morbidityWeek',
            caseClass = '$caseClass'
        WHERE patientId = '$patientId'";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "AES info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AES info successfully updated!');
                window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
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
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
        </div>
    </div>
    <div class="mb-3">
        <label for="stoolCulture" class="form-label">Lab Result</label>
        <input type="text" class="form-control" id="labResult" name="labResult" required value='<?php echo $labResult; ?>'>
    </div>
    <div class="mb-3">
        <label for="organism" class="form-label">Organism</label>
        <input type="text" class="form-control" id="organism" name="organism" required value='<?php echo $organism; ?>'>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">Case Class</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="caseClass" value='<?php echo $caseClass; ?>' />
        </div>
    </div>
    <div class="mb-3">
        <label for="outcome" class="form-label">Outcome</label>
        <input type="text" class="form-control" id="outcome" name="outcome" value='<?php echo $outcome; ?>'>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
        </div>
    </div>
    <div class="mb-3">
        <label for="" class="col-form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
        </div>
    </div>

    <div class="mb-3">
        <label for="dateDied" class="form-label">Date Died</label>
        <input type="datetime-local" class="form-control" id="dateDied" name="dateDied" value='<?php echo $dateDied; ?>' max="<?php echo date('Y-m-d'); ?>">
    </div>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>