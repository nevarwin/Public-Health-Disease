<?php
include("./components/connection.php");

$user_data = check_login($con);

$patientId = '';

$errorMessage = '';
$successMessage = '';

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
  $typeOfExposure = $_POST['typeOfExposure'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['typeOfExposure']);
  $category = $_POST['category'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['category']);
  $biteSite = $_POST['biteSite'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['biteSite']);
  $dateBitten = $_POST['dateBitten'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateBitten']);
  $typeOfAnimal = $_POST['typeOfAnimal'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['typeOfAnimal']);
  $labDiagnosis = $_POST['labDiagnosis'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['labDiagnosis']);
  $labResult = $_POST['labResult'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['labResult']);
  $animalStatus = $_POST['animalStatus'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['animalStatus']);
  $dateVaccStarted = $_POST['dateVaccStarted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateVaccStarted']);
  $animalVacc = $_POST['animalVacc'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['animalVacc']);
  $woundCleaned = $_POST['woundCleaned'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['woundCleaned']);
  $rabiesVaccine = $_POST['rabiesVaccine'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['rabiesVaccine']);
  $animalOutcome = $_POST['animalOutcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['animalOutcome']);
  $caseClass = $_POST['caseClass'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['caseClass']);
  $dateAdmitted = $_POST['dateAdmitted'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['dateAdmitted']);
  $morbidityWeek = $_POST['morbidityWeek'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityWeek']);
  $morbidityMonth = $_POST['morbidityMonth'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['morbidityMonth']);
  $outcome = $_POST['outcome'] == '' ? 'N/A' : mysqli_real_escape_string($con, $_POST['outcome']);
  $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';


  // check if the data is empty
  do {
    // Proceed with form submission
    $query = "UPDATE rabiesinfotbl SET
            typeOfExposure = '$typeOfExposure',
            category = '$category',
            biteSite = '$biteSite',
            dateBitten = '$dateBitten',
            typeOfAnimal = '$typeOfAnimal',
            labDiagnosis = '$labDiagnosis',
            labResult = '$labResult',
            animalStatus = '$animalStatus',
            dateVaccStarted = '$dateVaccStarted',
            animalVacc = '$animalVacc',
            woundCleaned = '$woundCleaned',
            rabiesVaccine = '$rabiesVaccine',
            animalOutcome = '$animalOutcome',
            caseClass = '$caseClass',
            dateAdmitted = '$dateAdmitted',
            morbidityMonth = '$morbidityMonth',
            morbidityWeek = '$morbidityWeek',
            outcome = '$outcome',
            dateDied = '$dateDied'
        WHERE patientId = $patientId";



    $result = mysqli_query($con, $query);

    if ($result) {
      $successMessage = "Rabies info successfully added!";
      echo "<script>
      alert('Rabies form submitted successfully!');
      window.location = 'patientTable.php';
      </script>";
      exit;
    } else {
      $errorMessage = "Error submitting form!";
      echo "<script>alert('Error submitting form! " . mysqli_error($con) . "');</script>";
    }
  } while (false);
}

?>
<div class="row d-flex justify-content-center">
  <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
    <h2 class="row justify-content-center mb-3">Rabies Disease Form</h2>
    <form action="" method="POST">
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
        <div class="col-sm-6">
          <input placeholder="ex. 1" type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Type Of Exposure</label>
        <div class="col-sm-6">
          <input placeholder="ex. Bite" type="text" class="form-control" name="typeOfExposure" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Category</label>
        <div class="col-sm-6">
          <input placeholder="ex. Category 3" type="text" class="form-control" name="category" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Bite Site</label>
        <div class="col-sm-6">
          <input placeholder="ex. Hand" type="text" class="form-control" name="biteSite" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Bitten</label>
        <div class="col-sm-6">
          <input placeholder="ex. 1" type="date" class="form-control" name="dateBitten" max="<?php echo date('Y-m-d'); ?>" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Type Of Animal</label>
        <div class="col-sm-6">
          <input placeholder="ex. Dog" type="text" class="form-control" name="typeOfAnimal" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class='col-sm-3 col-form-label'>Lab Diagnosis</label>
        <div class="col-sm-6">
          <input placeholder="ex. No" type="text" class='form-control' name='labDiagnosis'>
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class='col-sm-3 col-form-label'>Lab Result</label>
        <div class="col-sm-6">
          <input placeholder="ex. N/A" type="text" class='form-control' name='labResult'>
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Animal Status</label>
        <div class="col-sm-6">
          <input placeholder="ex. Domestic" type="text" class="form-control" name="animalStatus" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Date Vacc Started</label>
        <div class="col-sm-6">
          <input placeholder="ex. 1" type="date" class="form-control" name="dateVaccStarted" max="<?php echo date('Y-m-d'); ?>" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Animal Vaccination</label>
        <div class="col-sm-6">
          <input placeholder="ex. Vaccinated" type="text" class="form-control" name="animalVacc" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Wound Cleaned</label>
        <div class="col-sm-6">
          <input placeholder="ex. Yes" type="text" class="form-control" name="woundCleaned" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Rabies Vaccine</label>
        <div class="col-sm-6">
          <input placeholder="ex. Yes" type="text" class="form-control" name="rabiesVaccine" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Animal Outcome</label>
        <div class="col-sm-6">
          <input placeholder="ex. Alive" type="text" class="form-control" name="animalOutcome" />
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <label for="" class="col-sm-3 col-form-label">Case Class</label>
        <div class="col-sm-6">
          <input placeholder="ex. Suspected" type="text" class="form-control" name="caseClass" />
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