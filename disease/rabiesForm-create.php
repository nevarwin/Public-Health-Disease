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
  echo 'patiend Id emtpy';
}
echo $patientId;

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $typeOfExposure = $_POST['typeOfExposure'];
  $category = $_POST['category'];
  $biteSite = $_POST['biteSite'];
  $dateBitten = $_POST['dateBitten'];
  $typeOfAnimal = $_POST['typeOfAnimal'];
  $labDiagnosis = $_POST['labDiagnosis'];
  $labResult = $_POST['labResult'];
  $animalStatus = $_POST['animalStatus'];
  $dateVaccStarted = $_POST['dateVaccStarted'];
  $animalVacc = $_POST['animalVacc'];
  $woundCleaned = $_POST['woundCleaned'];
  $rabiesVaccine = $_POST['rabiesVaccine'];
  $animalOutcome = $_POST['animalOutcome'];
  $caseClass = $_POST['caseClass'];
  $dateAdmitted = $_POST['dateAdmitted'];
  $morbidityWeek = $_POST['morbidityWeek'];
  $morbidityMonth = $_POST['morbidityMonth'];
  $outcome = $_POST['outcome'];
  $dateDied = ($_POST['outcome'] === 'dead') ? $_POST['dateDied'] : '';


  // check if the data is empty
  do {
    if (empty($dateAdmitted)) {
      $errorMessage = "All fields are required!";
      echo "<script>alert('All fields are required!');</script>";
      break;
    }
    // Proceed with form submission
    $query = "INSERT INTO rabiesinfotbl (
    `patientId`, 
    `typeOfExposure`, 
    `category`, 
    `biteSite`, 
    `dateBitten`, 
    `typeOfAnimal`, 
    `labDiagnosis`, 
    `labResult`, 
    `animalStatus`, 
    `dateVaccStarted`, 
    `animalVacc`, 
    `woundCleaned`, 
    `rabiesVaccine`, 
    `animalOutcome`, 
    `caseClass`,
    `dateAdmitted`,
    `morbidityWeek`,
    `morbidityMonth`,
    `outcome`,
    `dateDied`
) VALUES (
    '$patientId', 
    '$typeOfExposure', 
    '$category', 
    '$biteSite', 
    '$dateBitten', 
    '$typeOfAnimal',
    '$labDiagnosis',
    '$labResult',
    '$animalStatus', 
    '$dateVaccStarted', 
    '$animalVacc', 
    '$woundCleaned', 
    '$rabiesVaccine', 
    '$animalOutcome', 
    '$caseClass',
    '$dateAdmitted',
    '$morbidityWeek',
    '$morbidityMonth',
    '$outcome',
    '$dateDied'
)";



    $result = mysqli_query($con, $query);

    if ($result) {
      $successMessage = "Rabies info successfully added!";
      echo "<script>
      alert('Rabies form submitted successfully!');
      //window.location = 'http://localhost/admin2gh/patientTable.php';
      </script>";
      exit;
    } else {
      $errorMessage = "Error submitting form!";
      echo "<script>alert('Error submitting form! " . mysqli_error($con) . "');</script>";
    }
  } while (false);
}

?>

<form action="" method="POST">
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Date Admitted</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="dateAdmitted" max="<?php echo date('Y-m-d'); ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Type Of Exposure</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="typeOfExposure" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Category</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="category" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Bite Site</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="biteSite" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Date Bitten</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="dateBitten" max="<?php echo date('Y-m-d'); ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Type Of Animal</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="typeOfAnimal" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class='col-sm-3 col-form-label'>Lab Diagnosis</label>
    <div class="col-sm-6">
      <input type="text" class='form-control' name='labDiagnosis'>
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class='col-sm-3 col-form-label'>Lab Result</label>
    <div class="col-sm-6">
      <input type="text" class='form-control' name='labResult'>
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Animal Status</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="animalStatus" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Date Vacc Started</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="dateVaccStarted" max="<?php echo date('Y-m-d'); ?>" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Animal Vaccination</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="animalVacc" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Wound Cleaned</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="woundCleaned" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Rabies Vaccine</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="rabiesVaccine" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Animal Outcome</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="animalOutcome" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">Case Class</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="caseClass" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">MorbidityWeek</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="morbidityWeek" />
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-3 col-form-label">morbidityMonth</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="morbidityMonth" />
    </div>
  </div>
  <?php
  include('./components/outcomeCreate.php');
  ?>
  <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>