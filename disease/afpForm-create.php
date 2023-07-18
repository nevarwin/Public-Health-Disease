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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $fever = mysqli_real_escape_string($con, $_POST['fever']);
    $rarm = mysqli_real_escape_string($con, $_POST['rarm']);
    $cough = mysqli_real_escape_string($con, $_POST['cough']);
    $paralysisatBirth = mysqli_real_escape_string($con, $_POST['paralysisatBirth']);
    $diarrheaVomiting = mysqli_real_escape_string($con, $_POST['diarrheaVomiting']);
    $musclePain = mysqli_real_escape_string($con, $_POST['musclePain']);
    $mening = mysqli_real_escape_string($con, $_POST['mening']);
    $brthMusc = mysqli_real_escape_string($con, $_POST['brthMusc']);
    $neckMusc = mysqli_real_escape_string($con, $_POST['neckMusc']);
    $paradev = mysqli_real_escape_string($con, $_POST['paradev']);
    $facialMusc = mysqli_real_escape_string($con, $_POST['facialMusc']);
    $rasens = $_POST['rasens'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rasens']);
    $lasens = $_POST['lasens'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['lasens']);
    $rlsens = $_POST['rlsens'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rlsens']);
    $llsens = $_POST['llsens'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['llsens']);
    $raref = $_POST['raref'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['raref']);
    $laref = $_POST['laref'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['laref']);
    $rlref = $_POST['rlref'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rlref']);
    $llref = $_POST['llref'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['llref']);
    $ramotor = $_POST['ramotor'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['ramotor']);
    $lamotor = $_POST['lamotor'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['lamotor']);
    $rlmotor = $_POST['rlmotor'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rlmotor']);
    $llmotor = $_POST['llmotor'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['llmotor']);
    $hxDisorder = mysqli_real_escape_string($con, $_POST['hxDisorder']);
    $otherCases = mysqli_real_escape_string($con, $_POST['otherCases']);
    $firststoolSpec = mysqli_real_escape_string($con, $_POST['firststoolSpec']);
    $outcome = mysqli_real_escape_string($con, $_POST['outcome']);
    $dstool1Taken = mysqli_real_escape_string($con, $_POST['dstool1Taken']);
    $dstool2Taken = mysqli_real_escape_string($con, $_POST['dstool2Taken']);
    $dstool1Sent = mysqli_real_escape_string($con, $_POST['dstool1Sent']);
    $dstool2Sent = mysqli_real_escape_string($con, $_POST['dstool2Sent']);
    $stool1Result = $_POST['stool1Result'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stool1Result']);
    $stool2Result = $_POST['stool2Result'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stool2Result']);
    $paradir = $_POST['paradir'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['paradir']);
    $dateAdmitted = mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {
        // Insert the data into the afpinfotbl table
        $query = "UPDATE afpinfotbl SET
                fever = '$fever',
                rarm = '$rarm',
                cough = '$cough',
                paralysisatBirth = '$paralysisatBirth',
                diarrheaVomiting = '$diarrheaVomiting',
                musclePain = '$musclePain',
                mening = '$mening',
                brthMusc = '$brthMusc',
                neckMusc = '$neckMusc',
                paradev = '$paradev',
                paradir = '$paradir',
                facialMusc = '$facialMusc',
                rasens = '$rasens',
                lasens = '$lasens',
                rlsens = '$rlsens',
                llsens = '$llsens',
                raref = '$raref',
                laref = '$laref',
                rlref = '$rlref',
                llref = '$llref',
                ramotor = '$ramotor',
                lamotor = '$lamotor',
                rlmotor = '$rlmotor',
                llmotor = '$llmotor',
                hxDisorder = '$hxDisorder',
                otherCases = '$otherCases',
                firststoolSpec = '$firststoolSpec',
                dateDied = '$dateDied',
                outcome = '$outcome',
                dstool1Taken = '$dstool1Taken',
                dstool2Taken = '$dstool2Taken',
                dstool1Sent = '$dstool1Sent',
                dstool2Sent = '$dstool2Sent',
                stool1Result = '$stool1Result',
                stool2Result = '$stool2Result',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek'
            WHERE patientId = '$patientId';";


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
    <div class="card shadow col-md-12 col-sm-4 col-lg-10" style="padding: 30px">
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
            <div class="row row-cols-4 justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('fever'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('rarm'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('cough'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('paralysisatBirth'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('diarrheaVomiting'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('musclePain'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('mening'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('brthMusc'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('neckMusc'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('hxDisorder'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('otherCases'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('firststoolSpec'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('paradev'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('facialMusc'); ?>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">paradir</label>
                        <input placeholder="ex. Ascending" type="text" class="form-control" name="paradir" />
                    </div>
                </div>
            </div>
            <div class="row row-cols-4 justify-content-center mx-1 my-2">
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rasens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rasens" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">lasens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lasens" />
                    </div>
                </div>
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlsens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlsens" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llsens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llsens" />
                    </div>
                </div>
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">raref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="raref" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">laref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="laref" />
                    </div>
                </div>
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlref" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llref" />
                    </div>
                </div>
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">ramotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="ramotor" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlmotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlmotor" />
                    </div>
                </div>
                <div class="col">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">lamotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lamotor" />
                    </div>
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llmotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llmotor" />
                    </div>
                </div>
                <div class="col">
                    <label for="dstool1Taken" class="col-form-label">dstool1Taken</label>
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool1Taken" name="dstool1Taken" max="<?php echo date('Y-m-d'); ?>">

                    <label for="dstool1Sent" class="col-form-label">dstool1Sent</label>
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool1Sent" name="dstool1Sent" max="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col">
                    <label for="dstool2Taken" class="col-form-label">dstool2Taken</label>
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool2Taken" name="dstool2Taken" max="<?php echo date('Y-m-d'); ?>">

                    <label for="dstool2Sent" class="col-form-label">dstool2Sent</label>
                    <input placeholder="ex. N/A" type="date" class="form-control" id="dstool2Sent" name="dstool2Sent" max="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="col">
                    <label for="" class="col-form-label">stool1Result</label>
                    <input placeholder="ex. N/A" type="text" class="form-control" name="stool1Result" />
                </div>
                <div class="col">
                    <label for="" class="col-form-label">stool2Result</label>
                    <input placeholder="ex. N/A" type="text" class="form-control" name="stool2Result" />
                </div>
                <div class="col">
                    <label for="" class="col-form-label">Morbidity Week</label>
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek" />
                </div>
                <div class="col">
                    <label for="" class="col-form-label">Morbidity Month</label>
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth" />
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>