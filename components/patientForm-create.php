<?php
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

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $patientId = $_POST['patientId'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mName = $_POST['mName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $unitCode = $_POST['unitCode'];
    $subd = $_POST['subd'];
    $street = $_POST['street'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $postalCode = $_POST['postalCode'];
    $municipalityDRU = $_POST['municipalityDRU'];
    $barangayDRU = $_POST['barangayDRU'];
    $disease = $_POST['disease'];
    $contact = $_POST['contact'];
    $addressDRU = $_POST['addressDRU'];
    $currentDate = date("Y-m-d H:i:s");

    // check if the data is empty
    do {
        // if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($disease) or empty($contact) or empty($gender)) {
        //     $errorMessage = "All fields are required";
        //     $type = 'warning';
        //     $strongContent = 'Holy guacamole!';
        //     $alert = generateAlert($type, $strongContent, $errorMessage);
        //     break;
        // }
        // // added new data into the db
        // $sql = "INSERT INTO patients
        // (`creationDate`, `firstName`, `lastName`, `middleName`, `munCityOfDRU`, `addressOfDRU`,`gender`, `dob`, `age`, `municipality`, `barangay`, `street`,`unitCode`,`postalCode`,`subd`, `disease`,`brgyOfDRU`, `contact`) 
        // VALUES 
        // ('$currentDate', '$fName', '$lName', '$mName' , '$municipalityDRU', '$addressDRU','$gender', '$dob', '$age', '$municipality', '$barangay', '$street','$unitCode','$postalCode','$subd', '$disease', '$barangayDRU', '$contact')";
        // $result = mysqli_query($con, $sql);
        // $insert_id = mysqli_insert_id($con);

        if (empty($fName) || empty($lName) || empty($municipality) || empty($barangay) || empty($municipalityDRU) || empty($barangayDRU) || empty($disease) || empty($contact) || empty($gender)) {
            $errorMessage = "All fields are required";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            // Handle the error or display the alert message
        } else {
            // Store the values in the patients table
            $sql = "INSERT INTO patients
                    (
                        `creationDate`, 
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
                $address = $barangayValue . ', ' . $municipalityValue . ', ' . 'Cavite ' . $postalCode;
                echo $address;

                // Format the address for URL encoding
                $formattedAddress = urlencode($address);

                // Create the geocoding API URL
                $geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E";

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
                            echo "Address saved successfully";
                        } else {
                            echo "Error updating address: " . $con->error;
                        }
                    } else {
                        echo "Geocoding failed: " . $geocodingData['status'];
                    }
                } else {
                    echo "Failed to fetch geocoding data";
                }
            } else {
                echo "Error saving address: " . $con->error;
            }
        }


        if (!$result) {
            $errorMessage = mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
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

        if (strcmp($diseaseName, $value) == 0) {

            // $link = "localhost/admin2gh/{$diseaseValue}Page-create.php";
            //echo "<script>window.location = '{$diseaseValue}Page-create.php?patientId={$insert_id}';</script>";
            // echo 'success';
            // header("Location: $link");
            // echo ($link);


            // // check if certain disease form is present *not working
            // if (file_exists($link)) {
            //     echo ('Link Exist!');
            // } else {
            //     echo ('Link does not exist!');
            // }
        } else {
            // Handle error
            $errorMessage = "Link does not exists!";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
        }
        $type = 'success';
        $strongContent = 'Holy guacamole!';
        $successMessage = "Patient added correctly";
        $alert = generateAlert($type, $strongContent, $successMessage);
    } while (false);
}

?>

<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-8 col-sm-6" style="padding: 30px">
        <h2>Create New Patient Information</h2>

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
                                // Display each municipalities in a dropdown option
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

                <!-- Disease Dropdown -->
                <div class="row mb-3">
                    <label class='col-sm-3 col-form-label' for="disease">Disease</label>
                    <div class="col-sm-6">
                        <select class="custom-select" id="dynamicDisease" name="disease">
                            <option value="">Select Disease</option>
                            <?php
                            // Connect to database and fetch disease
                            include("connection.php");
                            $result = mysqli_query($con, 'SELECT * FROM diseases');

                            // Display each disease in a dropdown option
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['diseaseId'] . '">' . $row['disease'] . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div id="form-extension"></div>
                <br>
                <div class="row">
                    <div class="col-md-3 mx-auto">
                        <button type="submit" class='btn btn-primary' name="createPatient">Submit</button>
                    </div>
                    <div class="col-md-3 mx-auto">
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