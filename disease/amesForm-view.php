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
$sql = "SELECT * FROM amesinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$fever = $row['fever'];
$behaviorChng = $row['behaviorChng'];
$seizure = $row['seizure'];
$stiffneck = $row['stiffneck'];
$bulgefontanel = $row['bulgefontanel'];
$menSign = $row['menSign'];
$clinDiag = $row['clinDiag'];
$pcv10 = $row['pcv10'];
$pcv13 = $row['pcv13'];
$meningoVacc = $row['meningoVacc'];
$vacMeningDate = $row['vacMeningDate'];
$meningoVaccDose = $row['meningoVaccDose'];
$measVacc = $row['measVacc'];
$vacMeasDate = $row['vacMeasDate'];
$measVaccDose = $row['measVaccDose'];
$aesCaseClass = $row['aesCaseClass'];
$finalDiagnosis = $row['finalDiagnosis'];
$outcome = $row['outcome'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];
$dateDied = $row['dateDied'];

?>

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Fever</label>
        <div class="col-sm-6">
            <p> <?php echo $fever; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">behaviorChng</label>
        <div class="col-sm-6">
            <p> <?php echo $behaviorChng; ?></p>
        </div>
    </div>

    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">seizure</label>
        <div class="col-sm-6">
            <p> <?php echo $seizure; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">Stiff Neck</label>
        <div class="col-sm-6">
            <p> <?php echo $stiffneck; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">bulgefontanel</label>
        <div class="col-sm-6">
            <p> <?php echo $bulgefontanel; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">menSign</label>
        <div class="col-sm-6">
            <p> <?php echo $menSign; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">clinDiag</label>
        <div class="col-sm-6">
            <p> <?php echo $clinDiag; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">pcv10</label>
        <div class="col-sm-6">
            <p> <?php echo $pcv10; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">pcv13</label>
        <div class="col-sm-6">
            <p> <?php echo $pcv13; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">meningoVacc</label>
        <div class="col-sm-6">
            <p> <?php echo $meningoVacc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="vacMeningDate" class="col-sm form-label font-weight-bold">vacMeningDate</label>
        <div class="col-sm-6">
            <p> <?php echo $vacMeningDate; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">meningoVaccDose</label>
        <div class="col-sm-6">
            <p> <?php echo $meningoVaccDose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">measVacc</label>
        <div class="col-sm-6">
            <p> <?php echo $measVacc; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="vacMeasDate" class="col-sm form-label font-weight-bold">vacMeasDate</label>
        <div class="col-sm-6">
            <p> <?php echo $vacMeasDate; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">measVaccDose</label>
        <div class="col-sm-6">
            <p> <?php echo $measVaccDose; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">aesCaseClass</label>
        <div class="col-sm-6">
            <p> <?php echo $aesCaseClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">finalDiagnosis</label>
        <div class="col-sm-6">
            <p> <?php echo $finalDiagnosis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">MorbidityWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm form-label font-weight-bold">morbidityMonth</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="outcome" class="col-sm form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">

            <p> <?php echo $outcome; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p><?php echo $dateDied; ?></p>
        </div>
    </div>
</form>