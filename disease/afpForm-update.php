<?php
include('./components/alertMessage.php');
include("./components/connection.php");
include("./components/dropdownUpdate.php");

$user_data = check_login($con);

$patientId = '';
$stoolCulture = '';
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
// read row 
$sql = "SELECT * FROM afpinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    // header('location: http://localhost/admin2gh/patientTable.php');
    echo mysqli_error($con);
    exit;
}

$fever = $row['fever'];
$rarm = $row['rarm'];
$cough = $row['cough'];
$paralysisatBirth = $row['paralysisatBirth'];
$diarrheaVomiting = $row['diarrheaVomiting'];
$musclePain = $row['musclePain'];
$mening = $row['mening'];
$brthMusc = $row['brthMusc'];
$neckMusc = $row['neckMusc'];
$paradev = $row['paradev'];
$paradir = $row['paradir'];
$facialMusc = $row['facialMusc'];
$rasens = $row['rasens'];
$lasens = $row['lasens'];
$rlsens = $row['rlsens'];
$llsens = $row['llsens'];
$raref = $row['raref'];
$laref = $row['laref'];
$rlref = $row['rlref'];
$llref = $row['llref'];
$ramotor = $row['ramotor'];
$lamotor = $row['lamotor'];
$rlmotor = $row['rlmotor'];
$llmotor = $row['llmotor'];
$hxDisorder = $row['hxDisorder'];
$otherCases = $row['otherCases'];
$firststoolSpec = $row['firststoolSpec'];
$dateDied = $row['dateDied'];
$outcome = $row['outcome'];
$dstool1Taken = $row['dstool1Taken'];
$dstool2Taken = $row['dstool2Taken'];
$dstool1Sent = $row['dstool1Sent'];
$dstool2Sent = $row['dstool2Sent'];
$stool1Result = $row['stool1Result'];
$stool2Result = $row['stool2Result'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];

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
    $facialMusc = $_POST['facialMusc'];
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
    $hxDisorder = $_POST['hxDisorder'];
    $otherCases = $_POST['otherCases'];
    $firststoolSpec = $_POST['firststoolSpec'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $outcome = $_POST['outcome'];
    $dstool1Taken = $_POST['dstool1Taken'];
    $dstool2Taken = $_POST['dstool2Taken'];
    $dstool1Sent = $_POST['dstool1Sent'];
    $dstool2Sent = $_POST['dstool2Sent'];
    $stool1Result = $_POST['stool1Result'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stool1Result']);
    $stool2Result = $_POST['stool2Result'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['stool2Result']);
    $paradir = $_POST['paradir'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['paradir']);
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityMonth = $_POST['morbidityMonth'];
    $morbidityWeek = $_POST['morbidityWeek'];

    // check if the data is empty
    do {
        // Insert the data into the amebiasisinfotbl table
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
            $message = "AFP info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('AFP info successfully updated!');
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
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('fever', $fever); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('rarm', $rarm); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('cough', $cough); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('paralysisatBirth', $paralysisatBirth); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('diarrheaVomiting', $diarrheaVomiting); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('musclePain', $musclePain); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('mening', $mening); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('brthMusc', $brthMusc); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('neckMusc', $neckMusc); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('hxDisorder', $hxDisorder); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('otherCases', $otherCases); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('firststoolSpec', $firststoolSpec); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('paradev', $paradev); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('facialMusc', $facialMusc); ?>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-sm-5 col-form-label">paradir</label>
                        <input placeholder="ex. Ascending" type="text" class="form-control" name="paradir" />
                    </div>
                </div>
            </div>
            <div class="row row-cols-4 justify-content-center mb-3">
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rasens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rasens" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">lasens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lasens" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlsens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlsens" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llsens</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llsens" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">raref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="raref" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">laref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="laref" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlref" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llref</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llref" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">ramotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="ramotor" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">lamotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="lamotor" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">rlmotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="rlmotor" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">llmotor</label>
                        <input placeholder="ex. 1-Normal" type="text" class="form-control" name="llmotor" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="dstool1Taken" class="col-form-label">D Stool 1 Taken</label>
                        <input type="date" class="form-control" id="dstool1Taken" name="dstool1Taken" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="dstool1Sent" class="col-form-label">D Stool 1 Sent</label>
                        <input type="date" class="form-control" id="dstool1Sent" name="dstool1Sent" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="dstool2Taken" class="col-form-label">D Stool 2 Taken</label>
                        <input type="date" class="form-control" id="dstool2Taken" name="dstool2Taken" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="dstool2Sent" class="col-form-label">D Stool 2 Sent</label>
                        <input type="date" class="form-control" id="dstool2Sent" name="dstool2Sent" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">Stool 1 Result</label>
                        <input placeholder="ex. Negative" type="text" class="form-control" name="stool1Result" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">Stool 2 Result</label>
                        <input placeholder="ex. Negative" type="text" class="form-control" name="stool2Result" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">Morbidity Week</label>
                        <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="justify-content-center">
                        <label for="" class="col-form-label">Morbidity Month</label>
                        <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth" />
                    </div>
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