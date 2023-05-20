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
echo $patientId;

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
        $query = "INSERT INTO neonatalinfotbl (
                    patientId,
                    mother,
                    first2Days,
                    after2Days,
                    finalDx,
                    trismus,
                    clenFis,
                    opistho,
                    stumpInf,
                    cordCut,
                    finalClass,
                    outcome,
                    dateDied,
                    dateAdmitted,
                    morbidityMonth,
                    morbidityWeek
                    )
                    VALUES (
                    '$patientId',
                    '$mother',
                    '$first2Days',
                    '$after2Days',
                    '$finalDx',
                    '$trismus',
                    '$clenFis',
                    '$opistho',
                    '$stumpInf',
                    '$cordCut',
                    '$finalClass',
                    '$outcome',
                    '$dateDied',
                    '$dateAdmitted',
                    '$morbidityMonth',
                    '$morbidityWeek'
        );";

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
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
            <?php
            echo generateDropdown('first2Days');
            echo generateDropdown('after2Days');
            echo generateDropdown('first2Days');
            echo generateDropdown('trismus');
            echo generateDropdown('clenFis');
            echo generateDropdown('opistho');
            echo generateDropdown('stumpInf');
            echo generateDropdown('cordCut');
            ?>
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