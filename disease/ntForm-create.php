<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdown.php");


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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $mother = $_POST['mother'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['mother']);
    $first2Days = $_POST['first2Days'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['first2Days']);
    $after2Days = $_POST['after2Days'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['after2Days']);
    $finalDx = $_POST['finalDx'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['finalDx']);
    $trismus = $_POST['trismus'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['trismus']);
    $clenFis = $_POST['clenFis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['clenFis']);
    $opistho = $_POST['opistho'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['opistho']);
    $stumpInf = $_POST['stumpInf'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stumpInf']);
    $cordCut = $_POST['cordCut'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['cordCut']);
    $finalClass = $_POST['finalClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['finalClass']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the ntinfotbl table
        $query = "UPDATE ntinfotbl SET
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
            $message = "Neonatal Tetanus info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Neonatal Tetanus form submitted successfully!');
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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Neonatal Tetanus Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Mother's Name</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Juana" type="text" class="form-control" id="mother" name="mother" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('first2Days'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('after2Days'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('first2Days'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('trismus'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('clenFis'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('opistho'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo generateDropdown('stumpInf'); ?>
                </div>
                <div class="col">
                    <?php echo generateDropdown('cordCut'); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Final Dx</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="finalDx" name="finalDx">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Final Classifications</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Suspected" type="text" class="form-control" id="finalClass" name="finalClass">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth" />
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>