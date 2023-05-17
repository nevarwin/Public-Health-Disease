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
        $query = "INSERT INTO aefiinfotbl (
                patientId,
                `case`,
                anaphylactoid,
                anaphylaxis,
                brachialneuritis,
                dissbcginfect,
                encephalopathy,
                hhe,
                injectsiteAbcess,
                intussusception,
                lymphadenitis,
                osteitis,
                persistent,
                seizures,
                sepsis,
                thrombocytopenia,
                outcome,
                aliveCondition,
                dateDied,
                otherSign,
                dateAdmitted,
                morbidityMonth,
                morbidityWeek,
                suspectedVacc,
                dateVaccination,
                dose,
                siteInjection,
                manufacturer,
                dateExpire
            )
            VALUES (
                '$patientId',
                '$case',
                '$anaphylactoid',
                '$anaphylaxis',
                '$brachialneuritis',
                '$dissbcginfect',
                '$encephalopathy',
                '$hhe',
                '$injectsiteAbcess',
                '$intussusception',
                '$lymphadenitis',
                '$osteitis',
                '$persistent',
                '$seizures',
                '$sepsis',
                '$thrombocytopenia',
                '$outcome',
                '$aliveCondition',
                '$dateDied',
                '$otherSign',
                '$dateAdmitted',
                '$morbidityMonth',
                '$morbidityWeek',
                '$suspectedVacc',
                '$dateVaccination',
                '$dose',
                '$siteInjection',
                '$manufacturer',
                '$dateExpire'
            );";



        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "Adverse Event Following Immunization info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('Adverse Event Following Immunization form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!" . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
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
            <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">case</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="case" name="case">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylactoid</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anaphylactoid" name="anaphylactoid">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">anaphylaxis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="anaphylaxis" name="anaphylaxis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">brachialneuritis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="brachialneuritis" name="brachialneuritis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dissbcginfect</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dissbcginfect" name="dissbcginfect">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">encephalopathy</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="encephalopathy" name="encephalopathy">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">hhe</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="hhe" name="hhe">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">injectsiteAbcess</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="injectsiteAbcess" name="injectsiteAbcess">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">intussusception</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="intussusception" name="intussusception">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">lymphadenitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lymphadenitis" name="lymphadenitis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">osteitis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="osteitis" name="osteitis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">persistent</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="persistent" name="persistent">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">seizures</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="seizures" name="seizures">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">sepsis</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sepsis" name="sepsis">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">thrombocytopenia</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="thrombocytopenia" name="thrombocytopenia">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">aliveCondition</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="aliveCondition" name="aliveCondition">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">Other Sign</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="otherSign" name="otherSign">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">suspectedVacc</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="suspectedVacc" name="suspectedVacc">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateVaccination</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateVaccination" name="dateVaccination" max="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dose</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="dose" name="dose">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">siteInjection</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="siteInjection" name="siteInjection">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">manufacturer</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="manufacturer" name="manufacturer">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">dateExpire</label>
        <div class="col-sm-6">
            <input type="datetime-local" class="form-control" id="dateExpire" name="dateExpire">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">morbidityMonth</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityMonth">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 form-label">MorbidityWeek</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="morbidityWeek">
        </div>
    </div>
    <?php
    include('./components/outcomeCreate.php');
    ?>
    <div class="col-sm-3 mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>