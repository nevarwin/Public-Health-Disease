<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdownUpdate.php");


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
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Update Neonatal Tetanus Form</h2>
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
                <label class="col-sm-3 col-form-label">Mother's Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="mother" name="mother" value='<?php echo $mother; ?>'>
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('first2Days', $first2Days);
            echo generateDropdownUpdate('after2Days', $after2Days);
            echo generateDropdownUpdate('first2Days', $first2Days);
            echo generateDropdownUpdate('trismus', $trismus);
            echo generateDropdownUpdate('clenFis', $clenFis);
            echo generateDropdownUpdate('opistho', $opistho);
            echo generateDropdownUpdate('stumpInf', $stumpInf);
            echo generateDropdownUpdate('cordCut', $cordCut);
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Final Dx</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="finalDx" name="finalDx" value='<?php echo $finalDx; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Final Classification</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="finalClass" name="finalClass" value='<?php echo $finalClass; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">morbidityMonth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">MorbidityWeek</label>
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
    </div>
</div>