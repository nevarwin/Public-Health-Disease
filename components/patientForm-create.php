<?php
// session_start();
include("connection.php");
include('barangayScript.php');
// include("function.php");

// $user_data = check_login($con);

// patient name
$fName = '';
$lName = '';
$mName = '';

$contact = '';
$address = '';
$addressDRU = '';

$errorMessage = '';
$successMessage = '';

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the Form
    $patientId = $_POST['patientId'];
    // $_SESSION['patiendId'] = $patientId;
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

    // check if the data is empty
    do {
        if (empty($fName) or empty($lName) or empty($municipality) or empty($barangay) or empty($municipalityDRU) or empty($barangayDRU) or empty($disease) or empty($contact) or empty($address) or empty($gender)) {
            $errorMessage = "All fields are required";
            break;
        }
        // added new data into the db
        $sql = "INSERT INTO patients
        (`creationDate`, `firstName`, `lastName`, `middleName`, `munCityOfDRU`, `addressOfDRU`,`gender`, `dob`, `municipality`, `barangay`, `address`, `disease`,`brgyOfDRU`, `contact`) 
        VALUES 
        ('$currentDate', '$fName', '$lName', '$mName' , '$municipalityDRU', '$addressDRU','$gender', '$dob', '$municipality', '$barangay', '$address', '$disease', '$barangayDRU', '$contact')";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            $errorMessage = mysqli_error($con);
            break;
        }

        $diseaseName = $_POST['disease'];
        $sql = "SELECT * FROM diseases WHERE diseaseId = '$diseaseName'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $value = $row['diseaseId'];
        $diseaseValue = strtolower($row['disease']);


        echo ($value);
        echo gettype($value);
        echo ($diseaseName);
        echo ($diseaseValue);
        echo gettype($diseaseValue);

        if (strcmp($diseaseName, $value) == 0) {
            echo "
            <script> 
            alert('Patient Successfully Updated');
            window.location= 'http://localhost/admin2gh/patientTable.php';
            </script>
            ";
            $link = "/phpsandbox/publichealth/{$diseaseValue}Form-create.php";
            echo ($link);
            header("Location: $link");
            // exit(0);

            // check if certain disease form is present *not working
            if (file_exists($link)) {
                echo ('Link Exist!');
                // header("Location: $link");
                // exit(0);
            } else {
                echo ('Link does not exist!');
            }
        } else {
            // Handle error
            echo ('error');
        }
        $successMessage = "Client added correctly";

        // header("location: /phpsandbox/publichealth/patient.php");
        // exit;
    } while (false);
}

?>

<!-- Name Form Group -->
<div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <h2>New Patient</h2>

        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="hidden" class='form-control' name='patientId' value='<?php echo $patientId; ?>'>
                <span class="input-group-text">Patient Name</span>
                <input placeholder="Last Name" type="text" class='form-control' name='lName' value='<?php echo $fName; ?>'>
                <input placeholder="First Name" type="text" class='form-control' name='fName' value='<?php echo $lName; ?>'>
                <input placeholder="Middle Name" type="text" class='form-control' name='mName' value='<?php echo $mName; ?>'>
            </div>

            <!-- Gender Dropdown -->
            <div class="row mb-3">
                <label class='col-sm-3 col-form-label' for="gender">Gender</label>
                <div class="col-sm-6">
                    <select class="form-select" id="gender" name="gender">
                        <option value="">Select gender</option>
                        <?php
                        // Connect to database and fetch municipalities
                        include("connection.php");
                        $result = mysqli_query($con, 'SELECT * FROM genders');

                        // Display each municipalities in a dropdown option
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['genderId'] . '">' . $row['gender'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Date of Birthday</label>
                <div class="col-sm-6">
                    <input type="date" class='form-control' name='dob' id="dob" onchange="calculateAge()" value=''>
                </div>
            </div>
            <!-- Age minus the DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Age</label>
                <div class="col-sm-6">
                    <input type="number" class='form-control' id="age" name='age' disabled>
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
            <div class="input-group mb-3">
                <span class="input-group-text">Municipality</span>
                <select class="form-select" id="municipality" onchange="updateBarangays()" name="municipality">
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
                <!-- Barangay Dropdown -->
                <span class="input-group-text">Barangay</span>
                <select class="form-select" id="barangay" name="barangay">
                    <option>Select Barangay</option>
                </select>
            </div>
            <!-- Address -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Address</label>
                <div class="col-sm-6">
                    <input placeholder="Address" type="text" class='form-control' name='address' value='<?php echo $address; ?>'>
                </div>
            </div>
            <!-- Municipality of DRU Dropdown -->
            <div class="input-group mb-3">
                <span class="input-group-text">Municipality of DRU</span>
                <select class="form-select" id="municipalityDRU" onchange="updateBarangaysDRU()" name="municipalityDRU">
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
                <!-- Barangay of DRU Dropdown -->
                <span class="input-group-text">Barangay of DRU</span>
                <select class="form-select" id="barangayDRU" name="barangayDRU">
                    <option>Select Barangay of DRU</option>
                </select>
            </div>
            <!-- Address of DRU -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Address of DRU</label>
                <div class="col-sm-6">
                    <input placeholder="Address of DRU" type="text" class='form-control' name='addressDRU' value='<?php echo $addressDRU; ?>'>
                </div>
            </div>
            <!-- Disease Dropdown -->
            <div class="row mb-3">
                <label class='col-sm-3 col-form-label' for="disease">Disease</label>
                <div class="col-sm-6">
                    <select class="form-select" id="disease" name="disease">
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