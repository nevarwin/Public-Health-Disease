<?php
include("./components/connection.php");
include('./components/alertMessage.php');

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
$sql = "SELECT * FROM diphinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "No information Available";;
    exit;
}
$dateLastDose = $row['dateLastDose'];
$dptDoses = $row['dptDoses'];
$caseClass = $row['caseClass'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityWeek = $row['morbidityWeek'];
$morbidityMonth = $row['morbidityMonth'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $dptDoses = $_POST['dptDoses'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dptDoses']);
    $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateLastDose = $_POST['dateLastDose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateLastDose']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the diphinfotbl table
        $query = "UPDATE diphinfotbl
                    SET
                    patientId = '$patientId',
                    dptDoses = '$dptDoses',
                    dateLastDose = '$dateLastDose',
                    caseClass = '$caseClass',
                    outcome = '$outcome',
                    dateDied = '$dateDied',
                    dateAdmitted = '$dateAdmitted',
                    morbidityMonth = '$morbidityMonth',
                    morbidityWeek = '$morbidityWeek'
                    WHERE
                    patientId = '$patientId';
                    ";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Diphtheria info successfully updated!";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Diphtheria info successfully updated!');
                window.location = 'patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Oh no!';
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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Diphtheria Disease Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>

            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dptDoses" class="col-sm-3 col-form-label">Dpt Doses</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dptDoses" name="dptDoses" value='<?php echo $dptDoses; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Last Dose</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateLastDose" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateLastDose; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="caseClass" class="col-sm-3 col-form-label">Case Classification</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="caseClass" name="caseClass" value='<?php echo $caseClass; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
                </div>
            </div>
            <?php
            include('./components/outcomeUpdate.php');
            include('./components/submitCancel.php');
            ?>
        </form>
    </div>
</div>