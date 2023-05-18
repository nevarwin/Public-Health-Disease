<?php
include('connection.php');
include('barangayScript.php');

// $user_data = check_login($con);

// Get admin by id
if (!isset($_GET["id"])) {
    header('location: /phpsandbox/publichealthd/admin.php');
    exit;
}

$id = $_GET['id'];
// read row 
$sql = "SELECT *
        FROM clients
        WHERE clients.id = $id";

// execute the sql query
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'error in result' . mysqli_error($con);;
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    exit;
}
$position = $row['positionId'];
$name = $row['name'];
$email = $row['email'];
$contact = $row['contact_number'];
$address = $row['address'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];


// POST Method: Update the data of the client
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $position = $_POST['position'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];

    // check if the data is empty
    do {

        if (empty($name) or empty($email) or empty($contact) or empty($address) or empty($municipality) or empty($barangay)) {
            $errorMessage = "All fields are required";
            break;
        }
        // update data into the db
        $sql = "UPDATE `clients` SET `name` = '$name', `email` = '$email', `contact_number` = '$contact', `address` = '$address', `municipality` = '$municipality', `barangay` = '$barangay', `positionId` = '$position' WHERE id = $id";

        $result = mysqli_query($con, $sql);

        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
            $successMessage = "Client updated correctly";
        } else {
            echo "Error updating record: ";
        }

        echo "
        <script> 
            alert('Admin Successfully Updated');
            window.location= 'http://localhost/admin2gh/adminTable.php';
        </script>
        ";
    } while (false);
}

?>
<form action="" method="post" onsubmit="return validateForm(event)">
    <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
    <?php
    if ($user_data['positionId'] < 2) {
    ?>
        <div class=" row mb-3">
            <label for="" class='col-sm-3 col-form-label'>Position</label>
            <div class="col-sm-6">
                <select class="custom-select" id="position" name="position">
                    <?php
                    $result = mysqli_query($con, 'SELECT * FROM positions');
                    $firstIteration = true; // Variable to track the first iteration

                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($firstIteration) {
                            $firstIteration = false;
                            continue; // Skip the first iteration
                        }

                        $positionId = $row['positionId'];
                        $positionName = $row['position'];

                        // Check if the current option's position ID matches the selected position ID
                        $selected = ($positionId == $position) ? 'selected' : '';

                        echo "<option value='$positionId' $selected>$positionName</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    <?php
    } else {
        echo '<input type="hidden" name="position" value="3">';
    }
    ?>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='name' value='<?= $name ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <input id="email" type="text" class='form-control' name='email' value='<?= $email ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <input id="contact" type="text" class='form-control' name='contact' value='<?= $contact ?>'>
        </div>
    </div>
    <!-- Municipality Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="municipality">Municipality</label>
        <div class="col-sm-6">
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
    </div>
    <!-- Barangay Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="barangay">Barangay</label>
        <div class="col-sm-6">
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
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Address</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='address' title="address" value="<?= $address ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class='btn btn-primary' name="updateAdmin">Submit</button>
        </div>
        <?php
        if ($user_data['positionId'] != 1) {
            $link = "http://localhost/admin2gh/patientTable.php";
        } else {
            $link = "http://localhost/admin2gh/adminTable.php";
        }
        ?>
        <div class="col-sm-3 d-grid">
            <a href="<?= $link ?>" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>

<script>
    function validateForm(event) {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        var contactNumber = document.getElementById('contact').value;

        // Initialize error messages array
        var errors = [];

        if (
            password.length < 8 ||
            !password.match(/[A-Z]/) ||
            !password.match(/[a-z]/) ||
            !password.match(/[0-9]/) ||
            !password.match(/[\W]/)
        ) {
            errors.push(
                "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character."
            );
        }

        if (password !== confirmPassword) {
            errors.push("Passwords do not match.");
        }

        // Check if email is in valid format
        if (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,}$/)) {
            errors.push("Email address is not in valid format.");
        }

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