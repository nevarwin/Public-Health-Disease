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
    $dateDied = $_POST['dateDied'];
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

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Date Admitted</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Mother's Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="mother" name="mother" required>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">First 2 Days</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="first2Days" name="first2Days" required>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">after2Days</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="after2Days" name="after2Days">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">finalDx</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalDx" name="finalDx">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">trismus</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="trismus" name="trismus">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">clenFis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="clenFis" name="clenFis">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">opistho</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="opistho" name="opistho">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">stumpInf</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="stumpInf" name="stumpInf">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">cordCut</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cordCut" name="cordCut">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">finalClass</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="finalClass" name="finalClass">
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome">
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="col-sm-3 form-control" id="dateDied" name="dateDied">
        </div>
    </div>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>