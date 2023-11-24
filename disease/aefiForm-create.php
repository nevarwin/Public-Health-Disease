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
    echo "No information Available";
}

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
                seizures = '$seizures',
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
            $message = "Adverse Event Following Immunization info successfully added!";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Adverse Event Following Immunization form submitted successfully!');
                window.location = 'patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
        }
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Adverse Event Following Immunization Form</h2>
        <form method="POST">
            <?php
            if (!empty($alert)) {
                echo $alert;
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Case</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="case" name="case">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('anaphylactoid'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('anaphylaxis'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('brachialneuritis'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('dissbcginfect'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('hhe'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('encephalopathy'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('injectsiteAbcess'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('intussusception'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('lymphadenitis'); ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <?php echo generateDropdown('osteitis'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('persistent'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('seizures'); ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-lg-3">
                    <?php echo generateDropdown('sepsis'); ?>
                </div>
                <div class="col-lg-3">
                    <?php echo generateDropdown('thrombocytopenia'); ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Alive Condition</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Recovering" type="text" class="form-control" id="aliveCondition" name="aliveCondition">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Other Sign</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="otherSign" name="otherSign">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Suspected Vaccine</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="suspectedVacc" name="suspectedVacc">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Date Vaccination</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="datetime-local" class="form-control" id="dateVaccination" name="dateVaccination" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Dose</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" id="dose" name="dose">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Site Injection</label>
                <div class="col-sm-6">
                    <input placeholder="ex. Arm" type="text" class="form-control" id="siteInjection" name="siteInjection">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Manufacturer</label>
                <div class="col-sm-6">
                    <input placeholder="ex. N/A" type="text" class="form-control" id="manufacturer" name="manufacturer">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Date Expire</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="datetime-local" class="form-control" id="dateExpire" name="dateExpire">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Month</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityMonth">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">Morbidity Week</label>
                <div class="col-sm-6">
                    <input placeholder="ex. 1" type="text" class="form-control" name="morbidityWeek">
                </div>
            </div>
            <?php
            include('./components/outcomeCreate.php');
            ?>
        </form>
    </div>
</div>