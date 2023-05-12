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
$sql = "SELECT * FROM hepatitisinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$type = $row['type'];
$labResult = $row['labResult'];
$typeofHepatitis = $row['typeofHepatitis'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

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
        // Insert the data into the diphinfotbl table
        $query = "UPDATE hepatitisinfotbl
                SET
                    type = '$type',
                    labResult = '$labResult',
                    typeofHepatitis = '$typeofHepatitis',
                    caseClass = '$caseClass',
                    outcome = '$outcome',
                    dateDied = '$dateDied',
                    dateAdmitted = '$dateAdmitted',
                    morbidityMonth = '$morbidityMonth',
                    morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId'";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Hepatitis info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Hepatitis info successfully updated!');
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
        <label for="" class="col-sm-3 form-label">Date Admitted</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Type</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="type" name="type" value='<?php echo $type; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Lab Result</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="labResult" name="labResult" value='<?php echo $labResult; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Type of Hepatitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="typeofHepatitis" name="typeofHepatitis" value='<?php echo $typeofHepatitis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Case Classification</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
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
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome" value='<?php echo $outcome; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateDied" name="dateDied" value='<?php echo $dateDied; ?>'>
        </div>
    </div>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>