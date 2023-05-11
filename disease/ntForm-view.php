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
$sql = "SELECT * FROM neonatalinfotbl WHERE patientId = $patientId";
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
        <label for="" class="col-sm-3 form-label">Date Admitted</label>
        <div class="col-sm-6">
            <p> <?php echo $dateAdmitted; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Mother's Name</label>
        <div class="col-sm-6">
            <p> <?php echo $mother; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">first2Days</label>
        <div class="col-sm-6">
            <p> <?php echo $first2Days; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">after2Days</label>
        <div class="col-sm-6">
            <p> <?php echo $after2Days; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">finalDx</label>
        <div class="col-sm-6">
            <p> <?php echo $finalDx; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">trismus</label>
        <div class="col-sm-6">
            <p> <?php echo $trismus; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clenFis</label>
        <div class="col-sm-6">
            <p> <?php echo $clenFis; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">opistho</label>
        <div class="col-sm-6">
            <p> <?php echo $opistho; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">stumpInf</label>
        <div class="col-sm-6">
            <p> <?php echo $stumpInf; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cord Cut</label>
        <div class="col-sm-6">
            <p> <?php echo $cordCut; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Final Classification</label>
        <div class="col-sm-6">
            <p> <?php echo $finalClass; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="outcome" class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <p> <?php echo $outcome; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityMonth; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <p> <?php echo $morbidityWeek; ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <p> <?php echo $dateDied; ?> </p>
        </div>
    </div>
</form>