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
    $dateDied = $_POST['dateDied'];
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

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateAdmitted; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">case</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="case" name="case" value='<?php echo $case; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylactoid</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anaphylactoid" name="anaphylactoid" value='<?php echo $anaphylactoid; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylaxis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anaphylaxis" name="anaphylaxis" value='<?php echo $anaphylaxis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">brachialneuritis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="brachialneuritis" name="brachialneuritis" value='<?php echo $brachialneuritis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dissbcginfect</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dissbcginfect" name="dissbcginfect" value='<?php echo $dissbcginfect; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">encephalopathy</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="encephalopathy" name="encephalopathy" value='<?php echo $encephalopathy; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">hhe</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="hhe" name="hhe" value='<?php echo $hhe; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">injectsiteAbcess</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="injectsiteAbcess" name="injectsiteAbcess" value='<?php echo $injectsiteAbcess; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">intussusception</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="intussusception" name="intussusception" value='<?php echo $intussusception; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">lymphadenitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lymphadenitis" name="lymphadenitis" value='<?php echo $lymphadenitis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">osteitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="osteitis" name="osteitis" value='<?php echo $osteitis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">persistent</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="persistent" name="persistent" value='<?php echo $persistent; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">seizures</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="seizures" name="seizures" value='<?php echo $seizures; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sepsis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sepsis" name="sepsis" value='<?php echo $sepsis; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">thrombocytopenia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="thrombocytopenia" name="thrombocytopenia" value='<?php echo $thrombocytopenia; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">aliveCondition</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="aliveCondition" name="aliveCondition" value='<?php echo $aliveCondition; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Sign</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSign" name="otherSign" value='<?php echo $otherSign; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">suspectedVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="suspectedVacc" name="suspectedVacc" value='<?php echo $suspectedVacc; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateVaccination</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateVaccination" name="dateVaccination" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dateVaccination; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dose" name="dose" value='<?php echo $dose; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">siteInjection</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="siteInjection" name="siteInjection" value='<?php echo $siteInjection; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">manufacturer</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="manufacturer" name="manufacturer" value='<?php echo $manufacturer; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateExpire</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateExpire" name="dateExpire" value='<?php echo $dateExpire; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth" value='<?php echo $morbidityMonth; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek" value='<?php echo $morbidityWeek; ?>' />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Outcome</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="outcome" name="outcome" value='<?php echo $outcome; ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="dateDied" class="col-sm-3 form-label">Date Died</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateDied" name="dateDied" value='<?php echo $dateDied; ?>'>
        </div>
    </div>
    <?php
    include('./components/submitCancel.php');
    ?>
</form>