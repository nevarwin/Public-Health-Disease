<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdown.php");


$user_data = check_login($con);

$patientId = '';
$labResult = '';
$organism = '';
$outcome = '';
$dateDied = date("Y-m-d");

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
    $fever = $_POST['fever'];
    $rarm = $_POST['rarm'];
    $cough = $_POST['cough'];
    $paralysisatBirth = $_POST['paralysisatBirth'];
    $diarrheaVomiting = $_POST['diarrheaVomiting'];
    $musclePain = $_POST['musclePain'];
    $mening = $_POST['mening'];
    $brthMusc = $_POST['brthMusc'];
    $neckMusc = $_POST['neckMusc'];
    $paradev = $_POST['paradev'];
    $paradir = $_POST['paradir'];
    $facialMusc = $_POST['facialMusc'];
    $rasens = $_POST['rasens'];
    $lasens = $_POST['lasens'];
    $rlsens = $_POST['rlsens'];
    $llsens = $_POST['llsens'];
    $raref = $_POST['raref'];
    $laref = $_POST['laref'];
    $rlref = $_POST['rlref'];
    $llref = $_POST['llref'];
    $ramotor = $_POST['ramotor'];
    $lamotor = $_POST['lamotor'];
    $rlmotor = $_POST['rlmotor'];
    $llmotor = $_POST['llmotor'];
    $hxDisorder = $_POST['hxDisorder'];
    $otherCases = $_POST['otherCases'];
    $firststoolSpec = $_POST['firststoolSpec'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $outcome = $_POST['outcome'];
    $dstool1Taken = $_POST['dstool1Taken'];
    $dstool2Taken = $_POST['dstool2Taken'];
    $dstool1Sent = $_POST['dstool1Sent'];
    $dstool2Sent = $_POST['dstool2Sent'];
    $stool1Result = $_POST['stool1Result'];
    $stool2Result = $_POST['stool2Result'];
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
        // Insert the data into the afpinfotbl table
        $query = "INSERT INTO afpinfotbl (
                patientId,
                fever,
                rarm,
                cough,
                paralysisatBirth,
                diarrheaVomiting,
                musclePain,
                mening,
                brthMusc,
                neckMusc,
                paradev,
                paradir,
                facialMusc,
                rasens,
                lasens,
                rlsens,
                llsens,
                raref,
                laref,
                rlref,
                llref,
                ramotor,
                lamotor,
                rlmotor,
                llmotor,
                hxDisorder,
                otherCases,
                firststoolSpec,
                dateDied,
                outcome,
                dstool1Taken,
                dstool2Taken,
                dstool1Sent,
                dstool2Sent,
                stool1Result,
                stool2Result,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek
            )
            VALUES (
                '$patientId',
                '$fever',
                '$rarm',
                '$cough',
                '$paralysisatBirth',
                '$diarrheaVomiting',
                '$musclePain',
                '$mening',
                '$brthMusc',
                '$neckMusc',
                '$paradev',
                '$paradir',
                '$facialMusc',
                '$rasens',
                '$lasens',
                '$rlsens',
                '$llsens',
                '$raref',
                '$laref',
                '$rlref',
                '$llref',
                '$ramotor',
                '$lamotor',
                '$rlmotor',
                '$llmotor',
                '$hxDisorder',
                '$otherCases',
                '$firststoolSpec',
                '$dateDied',
                '$outcome',
                '$dstool1Taken',
                '$dstool2Taken',
                '$dstool1Sent',
                '$dstool2Sent',
                '$stool1Result',
                '$stool2Result',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek'
            );
";


        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "AFP info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AFP form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
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
        <h2 class="row justify-content-center mb-3"> Alpha-Fetoprotein Disease Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <?php
            echo generateDropdown('fever');
            echo generateDropdown('rarm');
            echo generateDropdown('cough');
            echo generateDropdown('paralysisatBirth');
            echo generateDropdown('diarrheaVomiting');
            echo generateDropdown('musclePain');
            echo generateDropdown('mening');
            echo generateDropdown('brthMusc');
            echo generateDropdown('neckMusc');
            echo generateDropdown('paradev');
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">paradir</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Ascending" type="text" class="form-control" name="paradir" />
                </div>
            </div>
            <?php
            echo generateDropdown('facialMusc');
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rasens</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rasens" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">lasens</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lasens" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlsens</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlsens" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llsens</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llsens" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">raref</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="raref" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">laref</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="laref" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlref</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlref" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llref</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llref" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">ramotor</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="ramotor" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">lamotor</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lamotor" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlmotor</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlmotor" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llmotor</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llmotor" />
                </div>
            </div>
            <?php
            echo generateDropdown('hxDisorder');
            echo generateDropdown('otherCases');
            echo generateDropdown('firststoolSpec');
            ?>
            <div class="row justify-content-center mb-3">
                <label for="dstool1Taken" class="col-sm-3 col-form-label">dstool1Taken</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool1Taken" name="dstool1Taken" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool1Sent" class="col-sm-3 col-form-label">dstool1Sent</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool1Sent" name="dstool1Sent" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool2Taken" class="col-sm-3 col-form-label">dstool2Taken</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool2Taken" name="dstool2Taken" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool2Sent" class="col-sm-3 col-form-label">dstool2Sent</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool2Sent" name="dstool2Sent" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">stool1Result</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" name="stool1Result" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">stool2Result</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" name="stool2Result" />
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