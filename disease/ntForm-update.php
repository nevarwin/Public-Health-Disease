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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $mother = $_POST['mother'];
    $first2Days = $_POST['first2Days'];
    $after2Days = $_POST['after2Days'];
    $finalDx = $_POST['finalDx'];
    $trismus = $_POST['trismus'];
    $clenFis = $_POST['clenFis'];
    $opistho = $_POST['opistho'];
    $stumpInf = $_POST['stumpInf'];
    $cordCut = $_POST['cordCut'];
    $finalClass = $_POST['finalClass'];
    $outcome = $_POST['outcome'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityWeek = $_POST['morbidityWeek'];
    $morbidityMonth = $_POST['morbidityMonth'];

    // check if the data is empty
    do {
        if (empty($dateAdmitted)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
        // Insert the data into the diphinfotbl table
        $query = "UPDATE neonatalinfotbl SET
            mother = '$mother',
            first2Days = '$first2Days',
            after2Days = '$after2Days',
            finalDx = '$finalDx',
            trismus = '$trismus',
            clenFis = '$clenFis',
            opistho = '$opistho',
            stumpInf = '$stumpInf',
            cordCut = '$cordCut',
            finalClass = '$finalClass',
            outcome = '$outcome',
            dateDied = '$dateDied',
            dateAdmitted = '$dateAdmitted',
            morbidityMonth = '$morbidityMonth',
            morbidityWeek = '$morbidityWeek'
            WHERE patientId = $patientId;
";



        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Neonatal Tetanus info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Neonatal Tetanus info successfully updated!');
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
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Mother's Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mother" name="mother" value='<?php echo $mother; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">first2Days</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="first2Days" name="first2Days" value='<?php echo $first2Days; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">after2Days</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="after2Days" name="after2Days" value='<?php echo $after2Days; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">finalDx</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalDx" name="finalDx" value='<?php echo $finalDx; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">trismus</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="trismus" name="trismus" value='<?php echo $trismus; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">clenFis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clenFis" name="clenFis" value='<?php echo $clenFis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">opistho</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="opistho" name="opistho" value='<?php echo $opistho; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">stumpInf</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="stumpInf" name="stumpInf" value='<?php echo $stumpInf; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Cord Cut</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cordCut" name="cordCut" value='<?php echo $cordCut; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Final Classification</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalClass" name="finalClass" value='<?php echo $finalClass; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
        </div>
    </div>
    <?php
    include('./components/outcomeUpdate.php');
    ?>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>