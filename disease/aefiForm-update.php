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
    $case = $_POST['case'];
    $anaphylactoid = $_POST['anaphylactoid'];
    $anaphylaxis = $_POST['anaphylaxis'];
    $brachialneuritis = $_POST['brachialneuritis'];
    $dissbcginfect = $_POST['dissbcginfect'];
    $encephalopathy = $_POST['encephalopathy'];
    $hhe = $_POST['hhe'];
    $injectsiteAbcess = $_POST['injectsiteAbcess'];
    $intussusception = $_POST['intussusception'];
    $lymphadenitis = $_POST['lymphadenitis'];
    $osteitis = $_POST['osteitis'];
    $persistent = $_POST['persistent'];
    $seizures = $_POST['seizures'];
    $sepsis = $_POST['sepsis'];
    $thrombocytopenia = $_POST['thrombocytopenia'];
    $outcome = $_POST['outcome'];
    $aliveCondition = $_POST['aliveCondition'];
    $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';
    $otherSign = $_POST['otherSign'];
    $dateAdmitted = $_POST['dateAdmitted'];
    $morbidityMonth = $_POST['morbidityMonth'];
    $morbidityWeek = $_POST['morbidityWeek'];
    $suspectedVacc = $_POST['suspectedVacc'];
    $dateVaccination = $_POST['dateVaccination'];
    $dose = $_POST['dose'];
    $siteInjection = $_POST['siteInjection'];
    $manufacturer = $_POST['manufacturer'];
    $dateExpire = $_POST['dateExpire'];

    // check if the data is empty
    do {
        if (empty($dateAdmitted)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
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
            $alert
                = generateAlert($type, $strongContent, $message);

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
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
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
                <label class="col-sm-3 col-form-label">case</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="case" name="case" value='<?php echo $case; ?>'>
                </div>
            </div>
            <?php
            echo generateDropdownUpdate('anaphylactoid', $anaphylactoid);
            echo generateDropdownUpdate('anaphylaxis', $anaphylaxis);
            echo generateDropdownUpdate('brachialneuritis', $brachialneuritis);
            echo generateDropdownUpdate('dissbcginfect', $dissbcginfect);
            echo generateDropdownUpdate('hhe', $hhe);
            echo generateDropdownUpdate('encephalopathy', $encephalopathy);
            echo generateDropdownUpdate('injectsiteAbcess', $injectsiteAbcess);
            echo generateDropdownUpdate('intussusception', $intussusception);
            echo generateDropdownUpdate('lymphadenitis', $lymphadenitis);
            echo generateDropdownUpdate('osteitis', $osteitis);
            echo generateDropdownUpdate('persistent', $persistent);
            echo generateDropdownUpdate('seizures', $seizures);
            echo generateDropdownUpdate('sepsis', $sepsis);
            echo generateDropdownUpdate('thrombocytopenia', $thrombocytopenia);
            ?>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">aliveCondition</label>
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
                <label class="col-sm-3 col-form-label">suspectedVacc</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="suspectedVacc" name="suspectedVacc" value='<?php echo $suspectedVacc; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">dateVaccination</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="dateVaccination" name="dateVaccination" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateVaccination; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">dose</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="dose" name="dose" value='<?php echo $dose; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">siteInjection</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="siteInjection" name="siteInjection" value='<?php echo $siteInjection; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">manufacturer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value='<?php echo $manufacturer; ?>'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class="col-sm-3 col-form-label">dateExpire</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="dateExpire" name="dateExpire" value='<?php echo $dateExpire; ?>'>
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