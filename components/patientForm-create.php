<?php
// include 'function.php';
include("connection.php");
include('barangayScript.php');
include('alertMessage.php');
include('ageScript.php');

// patient name
$fName = '';
$lName = '';
$mName = '';

$contact = '';
$address = '';
$addressDRU = '';

$alert = '';

$apiKey = 'AIzaSyBDCpppcL179vukeD8LAeMYSS-WamNfzgI';

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
    $patientId = $_POST['patientId'];
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
    $unitCode = mysqli_real_escape_string($con, $_POST['unitCode']);
    $subd = mysqli_real_escape_string($con, $_POST['subd']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $postalCode = mysqli_real_escape_string($con, $_POST['postalCode']);
    $municipalityDRU = mysqli_real_escape_string($con, $_POST['municipalityDRU']);
    $barangayDRU = mysqli_real_escape_string($con, $_POST['barangayDRU']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $addressDRU = mysqli_real_escape_string($con, $_POST['addressDRU']);
    $currentDate = date("Y-m-d H:i:s");

    // check if the data is empty
    do {
        if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($disease) or empty($contact) or empty($gender)) {
            $errorMessage = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
            // Handle the error or display the alert message
        } else {
            // Store the values in the patients table
            $sql = "INSERT INTO patients
                    (
                        `creationDate`,
                        `createdby_id`,
                        `nurse_id`,
                        `firstName`, 
                        `lastName`, 
                        `middleName`, 
                        `munCityOfDRU`, 
                        `addressOfDRU`,
                        `gender`, 
                        `dob`, 
                        `age`, 
                        `municipality`, 
                        `barangay`, 
                        `street`,
                        `unitCode`,
                        `postalCode`,
                        `subd`, 
                        `disease`,
                        `brgyOfDRU`, 
                        `contact`
                    ) 
                    VALUES 
                    (
                        '$currentDate',
                        '$deptid',
                        '$nurseid',
                        '$fName', 
                        '$lName', 
                        '$mName', 
                        '$municipalityDRU', 
                        '$addressDRU',
                        '$gender', 
                        '$dob', 
                        '$age', 
                        '$municipality', 
                        '$barangay', 
                        '$street',
                        '$unitCode',
                        '$postalCode',
                        '$subd', 
                        '$disease', 
                        '$barangayDRU', 
                        '$contact'
                    )";


            if ($con->query($sql) === TRUE) {
                $insert_id = mysqli_insert_id($con);

                // Fetch the necessary values from another table using the last inserted ID
                $addressQuery = "SELECT patients.*, barangay.barangay, municipality.municipality
                        FROM patients 
                        LEFT JOIN barangay ON patients.barangay = barangay.id
                        LEFT JOIN municipality ON patients.municipality = municipality.munId
                        WHERE patientId = $insert_id
                        ";
                $addressResult = $con->query($addressQuery);
                $row = mysqli_fetch_assoc($addressResult);

                $barangayValue = $row['barangay'];
                $municipalityValue = $row['municipality'];

                // Create the full address
                // $address = $unitCode . ', ' . $subd . ', ' .  $street . ', ' . $barangayValue . ', ' . $municipalityValue . ', ' . 'Cavite ' . ', ' . $postalCode . ', ' . 'Philippines';

                // TODO baka yung ph ang nagpapagulo try tanggalin
                // $address = $barangayValue . ', ' . $municipalityValue . ', ' . $postalCode . ', ' . 'Cavite' . ', ' . 'Philippines';

                // medyo accurate at nagana na yung sa naic
                // $address = $barangayValue . ', ' . 'Cavite';
                $address = $unitCode . ' ' . $subd . ' ' .  $street . ', ' . $barangayValue . ' ' . $municipalityValue . ' Cavite ';
                // echo $address;

                // Format the address for URL encoding 
                $formattedAddress = urlencode($address);

                // Create the geocoding API URL
                $geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key={$apiKey}";

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
                        $updateSql = "UPDATE patients SET latitude = '$latitude', longitude = '$longitude' WHERE patientId = $insert_id";

                        if ($con->query($updateSql) === TRUE) {
                            // echo "Address saved successfully";
                        } else {
                            $errorMessage = "Error updating address: " .  mysqli_error($con);
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
                $errorMessage = "Error saving address: " .  mysqli_error($con);
                $type = 'warning';
                $strongContent = 'Oh no!';
                $alert = generateAlert($type, $strongContent, $errorMessage);
            }
        }

        if (!$result) {
            $errorMessage = mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        // Converting the disease to its string from their respective table
        $diseaseName = $_POST['disease'];
        $sql = "SELECT * FROM diseases WHERE diseaseId = '$diseaseName'";
        $diseaseNameResult = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($diseaseNameResult);
        $value = $row['diseaseId'];
        $diseaseValue = strtolower($row['disease']);

        $tableExistsQuery = "SHOW TABLES LIKE '" . $diseaseValue . "infotbl'";
        $tableExistsResult = mysqli_query($con, $tableExistsQuery);

        if ($tableExistsResult) {
            $rowCount = mysqli_num_rows($tableExistsResult);

            if ($rowCount > 0) {
                // Table exists, proceed with the insertion
                $addDiseaseSql = "INSERT INTO " . $diseaseValue . "infotbl (patientId) VALUES ($insert_id)";

                // error in here if new disease
                $addDiseaseResult = mysqli_query($con, $addDiseaseSql);
                if (strcmp($diseaseName, $value) == 0) {
                    echo "<script>window.location = '{$diseaseValue}Page-create.php?patientId={$insert_id}';</script>";
                    echo diseaseUrl($diseaseValue, $insert_id);
                } else {
                    // Handle error
                    $errorMessage = "Link does not exists!";
                    $type = 'warning';
                    $strongContent = 'Oh no!';
                    $alert = generateAlert($type, $strongContent, $errorMessage);
                }
            } else {
            }

            mysqli_free_result($tableExistsResult);
        } else {
            // Error in querying table existence, handle accordingly
            echo "Error checking table existence: " . mysqli_error($connection);
        }

        $type = 'success';
        $strongContent = 'Yay!';
        $successMessage = "Patient added correctly";
        $alert = generateAlert($type, $strongContent, $successMessage);
    } while (false);
}

?>

<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-8 col-sm-6" style="padding: 30px">
        <h2>New Patient Information</h2>

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
                        <input placeholder="Last Name" type="text" class="form-control" name="lName" value="<?php echo $fName; ?>">
                    </div>
                    <div class="col">
                        <input placeholder="First Name" type="text" class="form-control" name="fName" value="<?php echo $lName; ?>">
                    </div>
                    <div class="col">
                        <input placeholder="Middle Name" type="text" class="form-control" name="mName" value="<?php echo $mName; ?>">
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
                                    // Connect to database and fetch genders
                                    include("connection.php");
                                    $result = mysqli_query($con, 'SELECT * FROM genders');

                                    // Display each gender in a dropdown option
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['genderId'] . '">' . $row['gender'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- DOB -->
                            <div class="col">
                                <label for="" class="col-form-label">Birthday</label>
                                <input type="date" class="form-control" name="dob" id="dob" onchange="updateVariable(event)" max="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <!-- Age -->
                            <div class="col">
                                <label for="" class="col-form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age" readonly>
                            </div>
                            <!-- Contact Number -->
                            <div class="col">
                                <label for="" class='col-form-label'>Contact Number</label>
                                <input placeholder="Contact Number" id="contact" type="text" class='form-control' name='contact' value='<?php echo $contact; ?>'>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="">Patient's Complete Address</span>
                <div class="input-group">
                    <div class="col">
                        <input placeholder="Building Number" type="text" class='form-control' name='unitCode'>
                    </div>
                    <div class="col">
                        <input placeholder="Subd/Village" type="text" class='form-control' name='subd'>
                    </div>
                    <div class="col">
                        <input placeholder="Street" type="text" class='form-control' name='street'>
                    </div>
                    <div class="col">
                        <input id="postalCode" placeholder="Postal Code" type="text" class='form-control' name='postalCode' readonly>
                    </div>
                    <div class="input-group my-3">
                        <div class="col">
                            <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
                                <option value="">Select municipality</option>
                                <?php
                                // Connect to database and fetch municipalities
                                include("connection.php");
                                $result = mysqli_query($con, 'SELECT * FROM municipality');
                                // Display each municipality in a dropdown option
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="custom-select" id="barangay" name="barangay">
                                <option>Select Barangay</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="permanentAddress" id="permanentAddressCheckbox">
                        <label class="form-check-label" for="permanentAddressCheckbox">
                            Permanent Address
                        </label>
                    </div> -->
                </div>

                <!-- <div id="additionalFields" style="display: none;">
                    Additional fields go here
                    <div class="input-group">
                        <div class="col">
                            <input placeholder="Building Number" type="text" class='form-control' name='permanentUnitCode'>
                        </div>
                        <div class="col">
                            <input placeholder="Subd/Village" type="text" class='form-control' name='permanentSubd'>
                        </div>
                        <div class="col">
                            <input placeholder="Street" type="text" class='form-control' name='permanentStreet'>
                        </div>
                        <div class="col">
                            <input id="postalCode" placeholder="Postal Code" type="text" class='form-control' name='postalCode' readonly>
                        </div>
                        <div class="input-group my-3">
                            <div class="col">
                                <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
                                    <option value="">Select municipality</option>
                                    <?php
                                    // Connect to database and fetch municipalities
                                    include("connection.php");
                                    $result = mysqli_query($con, 'SELECT * FROM municipality');
                                    // Display each municipality in a dropdown option
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="custom-select" id="barangay" name="barangay">
                                    <option>Select Barangay</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var checkbox = document.getElementById("permanentAddressCheckbox");
                    var additionalFields = document.getElementById("additionalFields");

                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            additionalFields.style.display = "block";
                        } else {
                            additionalFields.style.display = "none";
                        }
                    });
                </script> -->

                <!-- Address of DRU -->
                <span>Address of DRU</span>
                <div class="row justify-content-start mb-3">
                    <!-- Municipality of DRU Dropdown -->
                    <div class="input-group">
                        <div class="col">
                            <input placeholder="Address of DRU" type="text" class='form-control' name='addressDRU' value='<?php echo $addressDRU; ?>'>
                        </div>
                        <div class="col">
                            <select class="custom-select" id="municipalityDRU" onchange="updateBarangaysDRU()" name="municipalityDRU">
                                <option value="">Select municipality of DRU</option>
                                <?php
                                // Connect to database and fetch municipalities
                                include("connection.php");
                                $result = mysqli_query($con, 'SELECT * FROM municipality');

                                // Display each municipalities in a dropdown option
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select class="custom-select" id="barangayDRU" name="barangayDRU">
                                <option>Select Barangay of DRU</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Disease Dropdown -->
                <span>Disease</span>
                <div class="row justify-content-start mb-3">
                    <div class="col-sm-12">
                        <select class="custom-select" id="dynamicDisease" name="disease">
                            <option value="">Select Disease</option>
                            <?php
                            // Connect to database and fetch disease
                            include("connection.php");
                            $result = mysqli_query($con, 'SELECT * FROM diseases GROUP BY disease ASC');

                            // Display each disease in a dropdown option
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['diseaseId'] . '">' . $row['disease'] . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div class="text-center">
                        <button type="submit" class='btn btn-primary' name="createPatient">Submit</button>
                    </div>
                    <div class="text-center">
                        <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include('ageScript.php');
?>

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