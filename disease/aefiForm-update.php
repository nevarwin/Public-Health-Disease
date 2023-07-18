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
$sql = "SELECT * FROM aefiinfotbl WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    echo "error in row";
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}
$case = $row['case'];
$anaphylactoid = $row['anaphylactoid'];
$anaphylaxis = $row['anaphylaxis'];
$brachialneuritis = $row['brachialneuritis'];
$dissbcginfect = $row['dissbcginfect'];
$encephalopathy = $row['encephalopathy'];
$hhe = $row['hhe'];
$injectsiteAbcess = $row['injectsiteAbcess'];
$intussusception = $row['intussusception'];
$lymphadenitis = $row['lymphadenitis'];
$osteitis = $row['osteitis'];
$persistent = $row['persistent'];
$seizures = $row['seizures'];
$sepsis = $row['sepsis'];
$thrombocytopenia = $row['thrombocytopenia'];
$outcome = $row['outcome'];
$aliveCondition = $row['aliveCondition'];
$dateDied = $row['dateDied'];
$otherSign = $row['otherSign'];
$dateAdmitted = $row['dateAdmitted'];
$morbidityMonth = $row['morbidityMonth'];
$morbidityWeek = $row['morbidityWeek'];
$suspectedVacc = $row['suspectedVacc'];
$dateVaccination = $row['dateVaccination'];
$dose = $row['dose'];
$siteInjection = $row['siteInjection'];
$manufacturer = $row['manufacturer'];
$dateExpire = $row['dateExpire'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $case = $_POST['case'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['case']);
    $siteInjection = $_POST['siteInjection'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['siteInjection']);
    $manufacturer = $_POST['manufacturer'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['manufacturer']);
    $suspectedVacc = $_POST['suspectedVacc'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['suspectedVacc']);
    $aliveCondition = $_POST['aliveCondition'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['aliveCondition']);
    $otherSign = $_POST['otherSign'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['otherSign']);
    $anaphylactoid = $_POST['anaphylactoid'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['anaphylactoid']);
    $anaphylaxis = $_POST['anaphylaxis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['anaphylaxis']);
    $brachialneuritis = $_POST['brachialneuritis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['brachialneuritis']);
    $dissbcginfect = $_POST['dissbcginfect'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dissbcginfect']);
    $encephalopathy = $_POST['encephalopathy'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['encephalopathy']);
    $hhe = $_POST['hhe'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['hhe']);
    $injectsiteAbcess = $_POST['injectsiteAbcess'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['injectsiteAbcess']);
    $intussusception = $_POST['intussusception'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['intussusception']);
    $lymphadenitis = $_POST['lymphadenitis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['lymphadenitis']);
    $osteitis = $_POST['osteitis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['osteitis']);
    $persistent = $_POST['persistent'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['persistent']);
    $seizures = $_POST['seizures'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['seizures']);
    $sepsis = $_POST['sepsis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['sepsis']);
    $thrombocytopenia = $_POST['thrombocytopenia'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['thrombocytopenia']);
    $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
    $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
    $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
    $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
    $dateVaccination = $_POST['dateVaccination'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateVaccination']);
    $dose = $_POST['dose'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dose']);
    $dateExpire = $_POST['dateExpire'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateExpire']);
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';

    // check if the data is empty
    do {

        // Proceed with form submission
        // Insert the data into the aefiinfotbl table
        $query = "UPDATE aefiinfotbl SET
                `case` = '$case',
                anaphylactoid = '$anaphylactoid',
                anaphylaxis = '$anaphylaxis',
                brachialneuritis = '$brachialneuritis',
                dissbcginfect = '$dissbcginfect',
                encephalopathy = '$encephalopathy',
                hhe = '$hhe',
                injectsiteAbcess = '$injectsiteAbcess',
                intussusception = '$intussusception',
                lymphadenitis = '$lymphadenitis',
                osteitis = '$osteitis',
                persistent = '$persistent',
                sepsis = '$sepsis',
                thrombocytopenia = '$thrombocytopenia',
                outcome = '$outcome',
                aliveCondition = '$aliveCondition',
                dateDied = '$dateDied',
                otherSign = '$otherSign',
                dateAdmitted = '$dateAdmitted',
                morbidityMonth = '$morbidityMonth',
                morbidityWeek = '$morbidityWeek',
                suspectedVacc = '$suspectedVacc',
                dateVaccination = '$dateVaccination',
                dose = '$dose',
                siteInjection = '$siteInjection',
                manufacturer = '$manufacturer',
                dateExpire = '$dateExpire'
                WHERE patientId = '$patientId';";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Adverse Event Following Immunization info successfully updated!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Adverse Event Following Immunization info successfully updated!');
                window.location = 'http://localhost/admin2gh/patientPage-view.php?patientId=$patientId';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
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
        <h2 class="row justify-content-center mb-3">Update Adverse Event Following Immunization Form</h2>
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
                <label class="col-sm-3 col-form-label">Case</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="case" name="case" value='<?php echo $case; ?>'>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('anaphylactoid', $anaphylactoid); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('anaphylaxis', $anaphylaxis); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('brachialneuritis', $brachialneuritis); ?>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('dissbcginfect', $dissbcginfect); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('hhe', $hhe); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('encephalopathy', $encephalopathy); ?>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('injectsiteAbcess', $injectsiteAbcess); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('intussusception', $intussusception); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('lymphadenitis', $lymphadenitis); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('osteitis', $osteitis); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('persistent', $persistent); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('seizures', $seizures); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('sepsis', $sepsis); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdownUpdate('thrombocytopenia', $thrombocytopenia); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Alive Condition</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="aliveCondition" name="aliveCondition" value='<?php echo $aliveCondition; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Sign</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="otherSign" name="otherSign" value='<?php echo $otherSign; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Suspected Vaccine</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="suspectedVacc" name="suspectedVacc" value='<?php echo $suspectedVacc; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Date Vaccination</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="dateVaccination" name="dateVaccination" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateVaccination; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Dose</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dose" name="dose" value='<?php echo $dose; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Site Injection</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="siteInjection" name="siteInjection" value='<?php echo $siteInjection; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Manufacturer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value='<?php echo $manufacturer; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Date Expire</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="dateExpire" name="dateExpire" value='<?php echo $dateExpire; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Morbidity Week</label>
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