<?php
// session_start();
include('barangayScript.php');
include("connection.php");
// include("function.php");

// $user_data = check_login($con);

// patient name
$patientId = '';
$fName = '';
$lName = '';
$mName = '';

$contact = '';
$address = '';
$addressDRU = '';

$errorMessage = '';
$successMessage = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    header('location:/phpsandbox/publichealthd/patient.php');
    exit;
}

$patientId = $_GET['patientId'];
// read row 
$sql = "SELECT * FROM patients WHERE patientId = $patientId";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: /phpsandbox/publichealth/patient.php');
    exit;
}

$fName = $row['firstName'];
$lName = $row['lastName'];
$mName = $row['middleName'];
$gender = $row['gender'];
$dob = $row['dob'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];
$municipalityDRU = $row['munCityOfDRU'];
$barangayDRU = $row['brgyOfDRU'];
$disease = $row['disease'];
// $outcome = $row['outcome'];
$contact = $row['contact'];
$address = $row['address'];
$addressDRU = $row['addressOfDRU'];

// Converting the dropdowns to its string from their rescpetive table
$sql = "SELECT * FROM genders WHERE genderId = '$gender'";
$result = mysqli_query($con, $sql);
$genderRow = mysqli_fetch_assoc($result);
$gender = $genderRow['gender'];

$sql = "SELECT * FROM municipality WHERE munId = '$municipality'";
$result = mysqli_query($con, $sql);
$municipalityRow = mysqli_fetch_assoc($result);
$municipality = $municipalityRow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangay'";
$result = mysqli_query($con, $sql);
$barangayRow = mysqli_fetch_assoc($result);
$barangay = $barangayRow['barangay'];

$sql = "SELECT * FROM municipality WHERE munId = '$municipalityDRU'";
$result = mysqli_query($con, $sql);
$municipalityDRURow = mysqli_fetch_assoc($result);
$municipalityDRU = $municipalityDRURow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangayDRU'";
$result = mysqli_query($con, $sql);
$barangayDRURow = mysqli_fetch_assoc($result);
$barangayDRU = $barangayDRURow['barangay'];

$sql = "SELECT * FROM diseases WHERE diseaseId = '$disease'";
$result = mysqli_query($con, $sql);
$diseaseRow = mysqli_fetch_assoc($result);
$disease = $diseaseRow['disease'];

$sql = "SELECT * FROM rabiesinfotbl WHERE patientId = $patientId";
$result = mysqli_query($con, $sql);
$rabies = mysqli_fetch_assoc($result);
print_r($rabies);

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mName = $_POST['mName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $municipalityDRU = $_POST['municipalityDRU'];
    $barangayDRU = $_POST['barangayDRU'];
    $disease = $_POST['disease'];
    // $outcome = $_POST['outcome'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $addressDRU = $_POST['addressDRU'];
    // $dateDied = $_POST['dateDied'];
    $currentDate = date("Y-m-d H:i:s");
}

?>

<!-- Name Form Group -->
<div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <h2>View Patient</h2>

        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" disabled class='form-control' name='patientId' value='<?php echo $patientId; ?>'>
                <span class="input-group-text">Patient Name</span>
                <input disabled class='form-control' name='lName' placeholder='<?php echo $fName; ?>'>
                <input disabled class='form-control' name='fName' placeholder='<?php echo $lName; ?>'>
                <input disabled class='form-control' name='mName' placeholder='<?php echo $mName; ?>'>
            </div>

            <!-- Gender Dropdown -->
            <div class="row mb-3">
                <label class='col-sm-3 col-form-label' for="gender">Gender</label>
                <div class="col-sm-6">
                    <p> <?php echo $gender; ?> </p>
                </div>
            </div>

            <!-- DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Date of Birthday</label>
                <div class="col-sm-6">
                    <input type="date" class='form-control' name='dob' id="dob" onchange="calculateAge()" value='<?php echo $dob; ?>'>
                </div>
            </div>
            <!-- Age minus the DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Age</label>
                <div class="col-sm-6">
                    <input type="text" class='form-control' id="age" name='age' value="<?php $age ?>">
                </div>
            </div>
            <!-- Contact Number -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
                <div class="col-sm-6">
                    <input type="text" class='form-control' name='contact' value='<?php echo $contact; ?>'>
                </div>
            </div>
            <!-- Municipality Dropdown -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Municipality</label>
                <input placeholder="<?php echo $municipality; ?>" disabled>
            </div>
            <div class='row mb-3'>
                <!-- Barangay Dropdown -->
                <label for="" class='col-sm-3 col-form-label'>Barangay</label>
                <input placeholder="<?php echo $barangay; ?>" disabled>
            </div>
            <!-- Municipality Dropdown -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Municipality of DRU</label>
                <input placeholder="<?php echo $municipalityDRU; ?>" disabled>
            </div>
            <div class='row mb-3'>
                <!-- Barangay Dropdown -->
                <label for="" class='col-sm-3 col-form-label'>Barangay of DRU</label>
                <input placeholder="<?php echo $barangayDRU; ?>" disabled>
            </div>
            <!-- Address -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Address of DRU</label>
                <input placeholder="<?php echo $addressDRU; ?>" disabled>
            </div>
            <!-- Disease Dropdown -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Disease</label>
                <input placeholder="<?php echo $disease; ?>" disabled>
            </div>
            <!-- Outcome Dropdown
                <div class="row mb-3">
                    <label class='col-sm-3 col-form-label' for="outcome">Outcome</label>
                    <div class="col-sm-6">
                        <select class="form-select" id="outcome" name="outcome">
                            <option value="">Select Outcome</option>
                            <?php
                            // Connect to database and fetch municipalities
                            include("connection.php");
                            $result = mysqli_query($con, 'SELECT * FROM outcomes');

                            // Display each municipalities in a dropdown option
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['outcomeId'] . '">' . $row['outcome'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                DateDied 
                <div class="row mb-3">
                    <label for="" class='col-sm-3 col-form-label'>Date Died</label>
                    <div class="col-sm-6">
                        <input type="date" class='form-control' name='dateDied' value='<?php echo $dateDied; ?>'>
                    </div>
                </div> -->

            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dimissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type = 'button' class = 'btn-close' data-bs-dismissible = 'alert' aria-label = 'close'></button>
                    </div>
                    </div>
                    </div>
                    ";
            }
            ?>
            <div class="row mb-3">
                <div class="col-sm-3 d-grid">
                    <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-outline-primary" role="button">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>