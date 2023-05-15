<?php
// session_start();
include('barangayScript.php');
include("connection.php");
include('alertMessage.php');
include('ageScript.php');

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
$age = $row['age'];
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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mName = $_POST['mName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $municipalityDRU = $_POST['municipalityDRU'];
    $barangayDRU = $_POST['barangayDRU'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $addressDRU = $_POST['addressDRU'];

    // check if the data is empty
    do {
        if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($contact) or empty($address) or empty($gender)) {
            $errorMessage = "All fields are required";
            break;
        }
        // added new data into the db
        $sql = "UPDATE patients SET `firstName`='$fName', `lastName`='$lName', `middleName`='$mName', `munCityOfDRU`='$municipalityDRU', `brgyOfDRU`='$barangayDRU', `addressOfDRU`='$addressDRU', `gender`='$gender', `dob`='$dob', `age`='$age',`municipality`='$municipality', `barangay`='$barangay', `address`='$address', `contact`='$contact' WHERE patientId=$patientId";

        $result = mysqli_query($con, $sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $result;
            break;
        }

        $successMessage = "Client added correctly";

        echo "
        <script> 
        alert('Patient Successfully Updated');
        window.location= 'http://localhost/admin2gh/patientTable.php';
        </script>
        ";
        exit;
    } while (false);
}
?>

<div class="container-fluid">
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 text-center">Patient Records</h1>
    </div>

    <div class="row"> <!-- Begin of Row -->

        <div class="col-xl-7 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT NAME</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $fName . " " . $lName . " " . $mName; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT ID</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $patientId; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- End of Row -->
    <div class="row"><!-- Begin Row -->
        <!-- First Column -->
        <div class="col-lg-4">
            <!-- Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Details <a style="margin-left: 225px; text-decoration:none;" class="text-secondary" href="http://localhost/admin2gh/patientPage-update.php?patientId=<?= $patientId ?>">
                            <i class="fa fa-edit"></i></a> </h6>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Address</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $address; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $age; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Birthday</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $dob; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Municipality</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $municipality; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barangay</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $barangay; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gender</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $gender; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Contact Number</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $contact; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Municipality of DRU</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $municipalityDRU; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barangay of DRU</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $barangayDRU; ?>" readonly>
                    </div>
                    <div style="margin-bottom: 18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Address of DRU</div>
                        </div>
                        <input type="text" class="h5 mb-1 font-weight-bold text-gray-800" value="<?php echo $addressDRU; ?>" readonly>
                    </div>
                </div><!--Card body end tag -->
            </div>
        </div>
        <!-- Second Column -->
        <div id="findings" class="col-xl-6 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Disease Information <a style="margin-left: 450px; text-decoration:none;" class="text-secondary" href="<?php echo "{$disease}Page-update.php?patientId={$patientId}"; ?>"> <i class="fa fa-edit"></i></a></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col-sm-12">
                        <?php
                        include("{$disease}Form-view.php");
                        ?>
                    </div>
                </div>
            </div><!-- End of Row -->
        </div>
    </div>


    <script>
        function validateForm(event) {
            var contactNumber = document.getElementById('contact').value;

            // Initialize error messages array
            var errors = [];

            // Check if contact number is in valid format
            if (!contactNumber.match(/^09\d{9}$/)) {
                errors.push("Contact number must start with '09' and be 11 characters long.");
            }

            // Check if there are any errors
            if (errors.length > 0) {
                // Display error messages
                var errorString = "";
                for (var i = 0; i < errors.length; i++) {
                    errorString += errors[i] + "\n";
                }
                alert(errorString);
                return false;
            }
            return true;
        }
    </script>