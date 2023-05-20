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
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('fever', $fever);
            echo generateDropdownUpdate('rarm', $rarm);
            echo generateDropdownUpdate('cough', $cough);
            echo generateDropdownUpdate('paralysisatBirth', $paralysisatBirth);
            echo generateDropdownUpdate('diarrheaVomiting', $diarrheaVomiting);
            echo generateDropdownUpdate('musclePain', $musclePain);
            echo generateDropdownUpdate('mening', $mening);
            echo generateDropdownUpdate('brthMusc', $brthMusc);
            echo generateDropdownUpdate('neckMusc', $neckMusc);
            echo generateDropdownUpdate('paradev', $paradev);
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">paradir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="paradir" value='<?php echo $paradir; ?>' />
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('facialMusc', $facialMusc);
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rasens</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rasens" value='<?php echo $rasens; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">lasens</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lasens" value='<?php echo $lasens; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlsens</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rlsens" value='<?php echo $rlsens; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llsens</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="llsens" value='<?php echo $llsens; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">raref</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="raref" value='<?php echo $raref; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">laref</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="laref" value='<?php echo $laref; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlref</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rlref" value='<?php echo $rlref; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llref</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="llref" value='<?php echo $llref; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">ramotor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ramotor" value='<?php echo $ramotor; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">lamotor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lamotor" value='<?php echo $lamotor; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">rlmotor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rlmotor" value='<?php echo $rlmotor; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">llmotor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="llmotor" value='<?php echo $llmotor; ?>' />
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('hxDisorder', $hxDisorder);
            echo generateDropdownUpdate('otherCases', $otherCases);
            echo generateDropdownUpdate('firststoolSpec', $firststoolSpec);
            ?>
            <div class="row justify-content-center mb-3">
                <label for="dstool1Taken" class="col-sm-3 col-form-label">dstool1Taken</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dstool1Taken" name="dstool1Taken" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dstool1Taken; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool1Sent" class="col-sm-3 col-form-label">dstool1Sent</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dstool1Sent" name="dstool1Sent" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dstool1Taken; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool2Taken" class="col-sm-3 col-form-label">dstool2Taken</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dstool2Taken" name="dstool2Taken" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dstool2Taken; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="dstool2Sent" class="col-sm-3 col-form-label">dstool2Sent</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dstool2Sent" name="dstool2Sent" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dstool2Sent; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">stool1Result</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stool1Result" value='<?php echo $stool1Result; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">stool2Result</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stool2Result" value='<?php echo $stool2Result; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
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