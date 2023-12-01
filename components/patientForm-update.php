<?php
include("connection.php");
include('barangayScript.php');
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

if ($user_data['positionId'] == 1 || $user_data['positionId'] == 2) {
    $deptid = $user_data['id'];
} else {
    $deptid = $user_data['createdby_id'];
}
$nurseid = $user_data['id'];

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $fName = mysqli_real_escape_string($con, $_POST['fName']);
    $lName = mysqli_real_escape_string(
        $con,
        $_POST['lName']
    );
    $mName = mysqli_real_escape_string(
        $con,
        $_POST['mName']
    );
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $municipalityDRU = mysqli_real_escape_string($con, $_POST['municipalityDRU']);
    $barangayDRU = mysqli_real_escape_string($con, $_POST['barangayDRU']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $unitCode = mysqli_real_escape_string($con, $_POST['unitCode']);
    $subd = mysqli_real_escape_string(
        $con,
        $_POST['subd']
    );
    $postalCode = mysqli_real_escape_string($con, $_POST['postalCode']);
    $addressDRU = mysqli_real_escape_string($con, $_POST['addressDRU']);
    $updatedAt = date("Y-m-d H:i:s");

    $stmt = $con->prepare("SELECT COUNT(*)
                        FROM patients 
                        WHERE 
                            firstName = ?
                            AND lastName = ?
                            AND contact = ?
                            AND disease = ?
                            AND YEAR(creationDate) = ?
                        GROUP BY contact, disease
                        HAVING COUNT(*) > 1");

    $stmt->bind_param(
        "ssisi",
        $fName,
        $lName,
        $contact,
        $disease,
        $currentYear
    );
    $stmt->execute();
    $stmt->bind_result($duplicateCount);
    $stmt->fetch();
    $stmt->close();

    // check if the data is empty
    do {
        if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($contact) or empty($postalCode) or empty($gender)) {
            $errorMessage = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        } else if ($duplicateCount > 0) {
            // Contact number and disease already exist in the database
            $errorMessage = "Patient already exists";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
            // Handle the error or display the alert message
        } else {
            $sql = "UPDATE patients 
                        SET `firstName`='$fName', 
                        `lastName`='$lName', 
                        `middleName`='$mName',
                        `nurse_id`='$nurseid',
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
                        `contact`='$contact',
                        `updated_at`='$updatedAt'
                        WHERE patientId=$patientId";
        }
        if ($con->query($sql) === TRUE) {
            // Fetch the necessary values from another table using the last inserted ID
            $addressQuery = "SELECT patients.*, barangay.barangay, municipality.municipality
                FROM patients 
                LEFT JOIN barangay ON patients.barangay = barangay.id
                LEFT JOIN municipality ON patients.municipality = municipality.munId
                WHERE patientId = $patientId
                ";
            $addressResult = mysqli_query($con, $addressQuery);
            $row = mysqli_fetch_assoc($addressResult);

            $barangayValue = $row['barangay'];
            $municipalityValue = $row['municipality'];

            // Create the full address
            $address = $barangayValue . ', ' . $municipalityValue . ', ' . 'Cavite ' . $postalCode;

            // Format the address for URL encoding
            $formattedAddress = urlencode($address);

            // Create the geocoding API URL
            $geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key=AIzaSyBDCpppcL179vukeD8LAeMYSS-WamNfzgI";

            // Send a GET request to the geocoding API
            $geocodingResponse = file_get_contents($geocodingUrl);

            // Check if the geocoding request was successful
            if ($geocodingResponse !== false) {
                // Decode the JSON response
                $geocodingData = json_decode($geocodingResponse, true);

                // Check if the geocoding was successful
                if ($geocodingData['status'] === 'OK') {
                    // Get the latitude and longitude
                    $latitude = $geocodingData['results'][0]['geometry']['location']['lat'];
                    $longitude = $geocodingData['results'][0]['geometry']['location']['lng'];

                    // Update the patients table with latitude and longitude
                    $updateSql = "UPDATE patients SET latitude = '$latitude', longitude = '$longitude' WHERE patientId = $patientId";

                    if ($con->query($updateSql) === TRUE) {
                        // echo "Address saved successfully";
                    } else {
                        $errorMessage = "Error updating address: " . mysqli_error($con);
                        $type = 'warning';
                        $strongContent = 'Oh no!';
                        $alert = generateAlert($type, $strongContent, $errorMessage);
                    }
                } else {
                    $errorMessage = "Geocoding failed: " . $geocodingData['status'];
                    $type = 'warning';
                    $strongContent = 'Oh no!';
                    $alert = generateAlert($type, $strongContent, $errorMessage);
                }
            } else {
                $errorMessage = "Failed to fetch geocoding data";
                $type = 'warning';
                $strongContent = 'Oh no!';
                $alert = generateAlert($type, $strongContent, $errorMessage);
            }
        } else {
            $errorMessage = "Error saving address: " . mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
        }

        $result = mysqli_query($con, $sql);

        if (!$result) {
            $errorMessage = mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        $type = 'success';
        $strongContent = 'Yay!';
        $successMessage = "Patient added correctly";
        $alert = generateAlert($type, $strongContent, $successMessage);

        echo "
        <script> 
            alert('Patient Successfully Updated');
            window.location= 'patientTable.php';
        </script>
        ";
        exit;
    } while (false);
}

?>

<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-8 col-sm-6" style="padding: 30px">
        <h2>Update Patient Information</h2>
        <?php
        if (!empty($errorMessage)) {
            echo $alert;
        }
        if (!empty($successMessage)) {
            echo $alert;
        }
        ?>
        <form action="" method="post" onsubmit="return validateForm(event)">
            <div class="col px-2">
                <input type="hidden" class='form-control' name='patientId' value='<?php echo $patientId; ?>'>
                <span class="">Patient Name</span>
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
                <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <!-- Gender -->
                            <div class="col">
                                <label class='col-form-label' for="gender">Gender</label>
                                <select class="custom-select" id="gender" name="gender">
                                    <?php
                                    // Connect to the database and fetch genders
                                    include("connection.php");
                                    $result = mysqli_query($con, 'SELECT * FROM genders');
                                    // Display each gender in a dropdown option
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $genderId = $row['genderId'];
                                        $genderName = $row['gender'];
                                        // Check if the current option's municipality ID matches the selected municipality ID
                                        $selected = ($genderId == $gender) ? 'selected' : '';
                                        echo "<option value='$genderId' $selected>$genderName</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- DOB -->
                            <div class="col">
                                <label for="" class="col-form-label">Birthday</label>
                                <input type="date" class="form-control" name="dob" id="dob" onchange="updateVariable(event)" max="<?php echo date('Y-m-d'); ?>" value='<?php echo $dob; ?>'>
                            </div>
                            <!-- Age -->
                            <div class="col">
                                <label for="" class="col-form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age" readonly value='<?php echo $age; ?>'>
                            </div>
                            <!-- Contact Number -->
                            <div class="col">
                                <label for="" class='col-form-label'>Contact Number</label>
                                <input placeholder="Contact Number" id="contact" type="text" class='form-control' name='contact' value='<?php echo $contact; ?>' value='<?php echo $contact; ?>'>
                            </div>
                        </div>
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
                        <input id="postalCode" readonly placeholder="Postal Code" type="text" class='form-control' name='postalCode' value='<?php echo $postalCode; ?>'>
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
                            $barangayResult = mysqli_query($con, "SELECT * FROM barangay WHERE muncityId = '$municipalityDRU'");

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
                <div class="d-flex justify-content-around">
                    <div class="col text-center">
                        <button type="submit" class='btn btn-primary' name="createPatient">Submit</button>
                    </div>
                    <div class="col text-center">
                        <a href="patientTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
                    </div>
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