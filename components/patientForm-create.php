<?php
// session_start();
include("connection.php");
include('barangayScript.php');
include('alertMessage.php');
include('ageScript.php');
// include("function.php");

// $user_data = check_login($con);

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
    // $_SESSION['patiendId'] = $patientId;
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $mName = $_POST['mName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    echo $age;
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
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }
        // added new data into the db
        $sql = "INSERT INTO patients
        (`creationDate`, `firstName`, `lastName`, `middleName`, `munCityOfDRU`, `addressOfDRU`,`gender`, `dob`, `age`, `municipality`, `barangay`, `address`, `disease`,`brgyOfDRU`, `contact`) 
        VALUES 
        ('$currentDate', '$fName', '$lName', '$mName' , '$municipalityDRU', '$addressDRU','$gender', '$dob', '$age', '$municipality', '$barangay', '$address', '$disease', '$barangayDRU', '$contact')";
        $result = mysqli_query($con, $sql);

        if (!$result) {
            $errorMessage = mysqli_error($con);
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        $diseaseName = $_POST['disease'];
        $sql = "SELECT * FROM diseases WHERE diseaseId = '$diseaseName'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $value = $row['diseaseId'];
        $diseaseValue = strtolower($row['disease']);

        echo ($value); //13
        echo gettype($value); //string
        echo ($diseaseName); //13
        echo ($diseaseValue); //rabies
        echo gettype($diseaseValue); //string

        if (strcmp($diseaseName, $value) == 0) {

            // $link = "/admin2gh/components/{$diseaseValue}Form-create.php";
            // echo ($link);
            // header("Location: $link");
            // exit(0);

            // check if certain disease form is present *not working
            // if (file_exists($link)) {
            //     echo ('Link Exist!');
            //     // header("Location: $link");
            //     // exit(0);
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

<!-- Name Form Group -->
<div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <h2>New Patient</h2>

        <?php
        if (!empty($errorMessage)) {
            echo $alert;
        }
        ?>

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
                    <input type="date" class='form-control' name='dob' id="dob" onchange="updateVariable(event)" max="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <!-- Age minus the DOB -->
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Age</label>
                <div class="col-sm-6">
                    <input type="text" class='form-control' id="age" name='age'>
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
                    <select class="form-select" id="dynamicDisease" name="disease">
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

            <?php
            if (!empty($successMessage)) {
                echo $alert;
            }
            ?>
            <br>
            <div id="form-extension"></div>
            <br>
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

<?php
include('ageScript.php');
?>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#dropdown').change(function() {
    //         var selectedValue = $(this).val();
    //         var value = "<?php echo $value; ?>"
    //         var diseaseValue = "<?php echo $diseaseValue; ?>"
    //         var url = diseaseValue + '-form.html';

    //         if (selectedValue === value) {
    //             $.ajax({
    //                 url: url,
    //                 dataType: 'html',
    //                 success: function(response) {
    //                     $('#form-extension').html(response);
    //                 }
    //             });
    //         } else {
    //             $('#form-extension').empty();
    //         }
    //     });
    // });

    document.getElementById('dynamicDisease').addEventListener('change', function() {
        var selectedValue = this.value;
        $(document).ready(function() {
            $('#dropdown').change(function() {
                var selectedval = $(this).val();
                // var value = "<?php echo $value; ?>"
                // var diseaseValue = "<?php echo $diseaseValue; ?>"
                var url = selectedValue + '-form.html';

                if (selectedValue === '13') {
                    $.ajax({
                        url: url,
                        dataType: 'html',
                        success: function(response) {
                            $('#form-extension').html(response);
                        }
                    });
                } else {
                    $('#form-extension').empty();
                }
            });
        });
    });
</script> -->