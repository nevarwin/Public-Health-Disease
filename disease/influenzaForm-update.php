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
$sql = "SELECT * FROM influenzainfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$labResult = $row['labResult'];
$organism = $row['organism'];
$sari = $row['sari'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$vacName = $row['vacName'];
$vacDate1 = $row['vacDate1'];
$vacDate2 = $row['vacDate2'];
$boosterName = $row['boosterName'];
$boosterDate = $row['boosterDate'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $labResult = $_POST['labResult'];
    $organism = $_POST['organism'];
    $sari = $_POST['sari'];
    $caseClass = $_POST['caseClass'];
    $outcome = $_POST['outcome'];
    $vacName = $_POST['vacName'];
    $vacDate1 = $_POST['vacDate1'];
    $vacDate2 = $_POST['vacDate2'];
    $boosterName = $_POST['boosterName'];
    $boosterDate = $_POST['boosterDate'];
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
        // Insert the data into the influenzainfotbl table
        $query = "UPDATE influenzainfotbl
                SET
                    labResult = '$labResult',
                    organism = '$organism',
                    sari = '$sari',
                    caseClass = '$caseClass',
                    outcome = '$outcome',
                    vacName = '$vacName',
                    vacDate1 = '$vacDate1',
                    vacDate2 = '$vacDate2',
                    boosterName = '$boosterName',
                    boosterDate = '$boosterDate',
                    dateDied = '$dateDied',
                    dateAdmitted = '$dateAdmitted',
                    morbidityMonth = '$morbidityMonth',
                    morbidityWeek = '$morbidityWeek'
                WHERE patientId = '$patientId'";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Influenza info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Influenza info successfully updated!');
                //window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
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
        <label class="col-sm-3 form-label">Lab Result</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="labResult" name="labResult" value='<?php echo $labResult; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">boosterName</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="organism" name="organism" value='<?php echo $organism; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Vaccine Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="vacName" name="vacName" value='<?php echo $vacName; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">1st Vaccine Date</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="vacDate1" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacDate1; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">2nd Vaccine Date</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="vacDate2" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $vacDate2; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Booster Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="boosterName" name="boosterName" value='<?php echo $boosterName; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">Booster Date</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="boosterDate" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $boosterDate; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Sari</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sari" name="sari" value='<?php echo $sari; ?>'>
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
    <?php
    include('./components/outcomeUpdate.php');
    include('./components/submitCancel.php');
    ?>
</form>