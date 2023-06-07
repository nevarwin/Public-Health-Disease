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
$sql = "SELECT * FROM ntinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$mother = $row['mother'];
$first2Days = $row['first2Days'];
$after2Days = $row['after2Days'];
$finalDx = $row['finalDx'];
$trismus = $row['trismus'];
$clenFis = $row['clenFis'];
$opistho = $row['opistho'];
$stumpInf = $row['stumpInf'];
$cordCut = $row['cordCut'];
$finalClass = $row['finalClass'];
$outcome = $row['outcome'];
$dateDied = $row['dateDied'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityWeek = $row['morbidityWeek'];
$morbidityMonth = $row['morbidityMonth'];

?>

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>

    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label font-weight-bold">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Mother's Name</label>
        <div class="col-sm-6">
            <p> <?php echo ucfirst($mother); ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">First 2Days</label>
        <div class="col-sm-6">
            <p> <?php echo $first2Days; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">After 2Days</label>
        <div class="col-sm-6">
            <p> <?php echo $after2Days; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">FinalDx</label>
        <div class="col-sm-6">
            <p> <?php echo $finalDx; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Trismus</label>
        <div class="col-sm-6">
            <p> <?php echo $trismus; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">ClenFis</label>
        <div class="col-sm-6">
            <p> <?php echo $clenFis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Opistho</label>
        <div class="col-sm-6">
            <p> <?php echo $opistho; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Stump Information</label>
        <div class="col-sm-6">
            <p> <?php echo $stumpInf; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Cord Cut</label>
        <div class="col-sm-6">
            <p> <?php echo $cordCut; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label font-weight-bold">Final Classification</label>
        <div class="col-sm-6">
            <p> <?php echo $finalClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="outcome" class="col-sm-3 form-label font-weight-bold">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo ucfirst($outcome); ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label font-weight-bold">Morbidity Month</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label font-weight-bold">Morbidity Week</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm-3 form-label font-weight-bold">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>