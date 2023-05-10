<?php
include('connection.php');
include('alertMessage.php');
include('barangayScript.php');

$message = '';
$type = '';
$strongContent = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    do {
        $position = mysqli_real_escape_string($con, $_POST['position']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
        $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        if (empty($position) or empty($name) or empty($email) or empty($password) or empty($contact) or empty($address) or empty($municipality) or empty($barangay)) {
            $message = "All fields are required";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);
            break;
        }

        $sql = "INSERT INTO clients (name, email, municipality, barangay, password, contact_number, address, positionId) VALUES ('$name', '$email', '$municipality', '$barangay', '$password', '$contact', '$address', '$position')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            // $_SESSION['message'] = "Admin Successfully Created";
            $message = "Admin Successfully Created";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
        } else {
            $message = "Invalid query: " . $result;
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert = generateAlert($type, $strongContent, $message);
            break;
        }
        echo "
        <script> 
        alert('Admin Successfully Created');
        window.location= 'adminTable.php';
        </script>
        ";
        // exit(header("Location: /patientTable.php"));
    } while (false);
}
?>


<form action="" method="post" onsubmit="return validateForm(event)">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class=" row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Position</label>
        <div class="col-sm-6">
            <select class="form-select" id="position" name="position">
                <option>Select Position</option>
                <?php
                include('connection.php');
                $result = mysqli_query($con, 'SELECT * FROM positions');

                $firstIteration = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($firstIteration) {
                        $firstIteration = false;
                        continue; // Skip the first iteration
                    }
                    echo '<option value="' . $row['positionId'] . '">' . $row['position'] . '</option>';
                }

                ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='name'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <input autocomplete=false type="email" class='form-control' name='email' id='email'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Password</label>
        <div class="col-sm-6">
            <input autocomplete=false type="password" class='form-control' name='password' id='password'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='contact' id="contact">
        </div>
    </div>
    <!-- Municipality Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="municipality">Municipality</label>
        <div class="col-sm-6">
            <select class="form-select" id="municipality" onchange="updateBarangays()" name="municipality">
                <option>Select municipality</option>
                <?php
                // Connect to database and fetch municipalities
                include('connection.php');
                $result = mysqli_query($con, 'SELECT * FROM municipality');

                // Display each municipalities in a dropdown option
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <!-- Barangay Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="barangay">Barangay</label>
        <div class="col-sm-6">
            <select class="form-select" id="barangay" name="barangay">
                <option>Select Barangay</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Address</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='address'>
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class='btn btn-primary' name="createAdmin">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/adminTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>

<script>
    function validateForm(event) {

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
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