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
$sql = "SELECT *
FROM patients 
-- LEFT JOIN barangay ON patients.barangay = barangay.id
-- LEFT JOIN municipality ON patients.municipality = municipality.munId
-- LEFT JOIN genders ON patients.gender = genders.genderId
WHERE patients.patientId = $patientId";
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
$contact = $row['contact'];
$street = $row['street'];
$unitCode = $row['unitCode'];
$subd = $row['subd'];
$postalCode = $row['postalCode'];
$addressDRU = $row['addressOfDRU'];

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
    $street = $_POST['street'];
    $unitCode = $_POST['unitCode'];
    $subd = $_POST['subd'];
    $postalCode = $_POST['postalCode'];
    $addressDRU = $_POST['addressDRU'];

    // check if the data is empty
    do {
        if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($contact) or empty($postalCode) or empty($gender)) {
            $errorMessage = "All fields are required";
            break;
        }
        // added new data into the db
        $sql = "UPDATE patients 
            SET `firstName`='$fName', 
            `lastName`='$lName', 
            `middleName`='$mName', 
            `munCityOfDRU`='$municipalityDRU', 
            `brgyOfDRU`='$barangayDRU', 
            `addressOfDRU`='$addressDRU', 
            `gender`='$gender', 
            `dob`='$dob', 
            `age`='$age',
            `municipality`='$municipality', 
            `barangay`='$barangay', 
            `street`='$street',
            `unitCode`='$unitCode',
            `postalCode`='$postalCode',
            `subd`='$subd',
            `contact`='$contact' 
        WHERE patientId=$patientId";

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

<!-- Name Form Group -->
<div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <h2>Update Patient</h2>

        <form action="" method="post" onsubmit="return validateForm(event)">
            <span class="">Patient Name</span>
            <input type="hidden" class='form-control' name='patientId' value='<?php echo $patientId; ?>'>
            <div class="input-group mb-3">
                <div class="col">
                    <input placeholder="Last Name" type="text" class='form-control' name='lName' value='<?php echo $lName; ?>'>
                </div>
                <div class="col">
                    <input placeholder="First Name" type="text" class='form-control' name='fName' value='<?php echo $fName; ?>'>
                </div>
                <div class="col">
                    <input placeholder="Middle Name" type="text" class='form-control' name='mName' value='<?php echo $mName; ?>'>
                </div>
            </div>
            <!-- Gender Dropdown -->
            <div class="row mb-3">
                <label class='col-sm-3 col-form-label' for="gender">Gender</label>
                <div class="col-sm-6">
                    <select class="custom-select" name='gender'>
                        <?php
                        $result = mysqli_query($con, 'SELECT * FROM genders');
                        while ($row = mysqli_fetch_assoc($result)) {
                            $genderId = $row['genderId'];
                            $genderName = $row['gender'];

                            // Check if the current option's gender ID matches the selected gender ID
                            $selected = ($genderId == $gender) ? 'selected' : '';
                            echo "<option value='$genderId' $selected>$genderName</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!-- DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Date of Birthday</label>
                <div class="col-sm-6">
                    <input type="date" class='form-control' name='dob' id="dob" onchange="updateVariable(event)" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dob; ?>'>
                </div>
            </div>
            <!-- Age minus the DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Age</label>
                <div class="col-sm-6">
                    <input type="text" class='form-control' id="age" name='age' value='<?php echo $age; ?>'>
                </div>
            </div>
            <!-- Contact Number -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
                <div class="col-sm-6">
                    <input id="contact" type="text" class='form-control' name='contact' value='<?php echo $contact; ?>'>
                </div>
            </div>
            <span class="">Patient's Complete Address</span>
            <div class="input-group">
                <div class="col">
                    <input placeholder="Building Number" type="text" class='form-control' name='unitCode' value='<?php echo $unitCode; ?>'>
                </div>
                <div class="col">
                    <input placeholder="Subd/Village" type="text" class='form-control' name='subd' value='<?php echo $subd; ?>'>
                </div>
                <div class="col">
                    <input placeholder="Street" type="text" class='form-control' name='street' value='<?php echo $street; ?>'>
                </div>
                <div class="col">
                    <input placeholder="Postal Code" type="text" class='form-control' name='postalCode' value='<?php echo $postalCode; ?>'>
                </div>
            </div>
            <!-- Municipality Dropdown -->
            <div class="input-group my-3">
                <div class="col">
                    <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
                        <?php
                        // Connect to database and fetch municipalities
                        $result = mysqli_query($con, 'SELECT * FROM municipality');
                        while ($row = mysqli_fetch_assoc($result)) {
                            $munId = $row['munId'];
                            $municipalityName = $row['municipality'];

                            // Check if the current option's municipality ID matches the selected municipality ID
                            $selected = ($munId == $municipality) ? 'selected' : '';

                            echo "<option value='$munId' $selected>$municipalityName</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Barangay Dropdown -->
                <div class="col">
                    <select class="custom-select" id="barangay" name="barangay">
                        <?php
                        // Fetch barangays based on the selected municipality
                        $barangayResult = mysqli_query($con, "SELECT * FROM barangay WHERE muncityId = '$municipality'");

                        // Display each barangay in a dropdown option
                        while ($barangayRow = mysqli_fetch_assoc($barangayResult)) {
                            $barangayId = $barangayRow['id'];
                            $barangayName = $barangayRow['barangay'];

                            // Check if the current option's barangay ID matches the selected barangay ID
                            $selected = ($barangayId == $barangay) ? 'selected' : '';

                            echo "<option value='$barangayId' $selected>$barangayName</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Address of DRU -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Address of DRU</label>
                <div class="col-sm-6">
                    <input placeholder="Address of DRU" type="text" class='form-control' name='addressDRU' value='<?php echo $addressDRU; ?>'>
                </div>
            </div>
            <!-- Municipality of DRU Dropdown -->
            <div class="input-group mb-3">
                <div class="col">
                    <select class="custom-select" id="municipalityDRU" onchange="updateBarangaysDRU()" name="municipalityDRU">
                        <!-- <option value="<?php echo $municipalityDRU; ?>"><?php echo $municipalityDRU; ?></option> -->
                        <?php
                        // Connect to database and fetch municipalities
                        $result = mysqli_query($con, 'SELECT * FROM municipality');
                        while ($row = mysqli_fetch_assoc($result)) {
                            $munId = $row['munId'];
                            $municipalityName = $row['municipality'];

                            // Check if the current option's municipality ID matches the selected municipality ID
                            $selected = ($munId == $municipalityDRU) ? 'selected' : '';

                            echo "<option value='$munId' $selected>$municipalityName</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Barangay of DRU Dropdown -->
                <div class="col">
                    <select class="custom-select" id="barangayDRU" name="barangayDRU">
                        <!-- <option value=""><?php echo $barangayDRU; ?></option> -->
                        <?php
                        $barangayResult = mysqli_query($con, "SELECT * FROM barangay WHERE muncityId = '$municipality'");

                        // Display each barangay in a dropdown option
                        while ($barangayRow = mysqli_fetch_assoc($barangayResult)) {
                            $barangayId = $barangayRow['id'];
                            $barangayName = $barangayRow['barangay'];

                            // Check if the current option's barangay ID matches the selected barangay ID
                            $selected = ($barangayId == $barangayDRU) ? 'selected' : '';

                            echo "<option value='$barangayId' $selected>$barangayName</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


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
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class='btn btn-primary' name="createPatient">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
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