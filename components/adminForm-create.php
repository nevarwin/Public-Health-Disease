<?php
include('connection.php');
include('alertMessage.php');
include('adminBarangayScript.php');

$message = '';
$type = '';
$strongContent = '';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    do {
        $position = mysqli_real_escape_string($con, $_POST['position']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
        $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
        // $password = mysqli_real_escape_string($con, $_POST['password']);
        $password = mysqli_real_escape_string($con, md5($_POST['password']));
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        function checkDuplicate($field, $value, $con) {
            $count = 0;

            $stmt = $con->prepare("SELECT COUNT(*) FROM clients WHERE $field = ?");
            $stmt->bind_param("s", $value);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            return $count;
        }

        $emailDuplicateCount = checkDuplicate('email', $email, $con);
        $contactDuplicateCount = checkDuplicate('contact_number', $contact, $con);

        if ($emailDuplicateCount > 0) {
            $errorMessage = "Email already exists";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        if ($contactDuplicateCount > 0) {
            $errorMessage = "Contact number already exists";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }


        if ($position == "Select Position" or empty($name) or empty($email) or empty($password) or empty($contact) or empty($address) or $municipality  == "Select Municipality" or $barangay == "Select Barangay") {
            $message = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
            break;
        }

        $sql = "INSERT INTO clients (name, createdby_id ,email, municipality, barangay, password, contact_number, address, positionId) VALUES ('$name', '$id', '$email', '$municipality', '$barangay', '$password', '$contact', '$address', '$position')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Admin Successfully Created";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
        } else {
            $message = "Invalid query: " . $result;
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
            break;
        }
        echo "
        <script> 
        alert('Admin Successfully Created');
        window.location = 'adminTable.php';
        </script>
        ";
        // exit(header("Location: /patientTable.php"));
    } while (false);
}
?>

<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-6 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Create New Admin</h2>
        <?php
        if (!empty($alert)) {
            echo $alert;
        }
        ?>
        <form class="" method="post" onsubmit="return validateForm(event)">
            <?php
            if ($user_data['positionId'] < 2) {
            ?>
                <div class=" row justify-content-center mb-3">
                    <label for="" class='col-sm-3 col-form-label font-weight-bold'>Position</label>
                    <div class="col-sm-6">
                        <select class="custom-select" id="position" name="position">
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
            <?php
            } else {
                echo '<input type="hidden" name="position" value="3">';
            }
            ?>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label font-weight-bold'>Name</label>
                <div class="col-sm-6">
                    <input placeholder="Name" type="text" class='form-control' name='name'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label font-weight-bold'>Email</label>
                <div class="col-sm-6">
                    <input placeholder="Email" autocomplete=false type="email" class='form-control' name='email' id='email'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label font-weight-bold'>Password</label>
                <div class="col-sm-6">
                    <input placeholder="Password" autocomplete=false type="password" class='form-control' name='password' id='password'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label font-weight-bold'>Contact Number</label>
                <div class="col-sm-6">
                    <input placeholder="Contact Number" type="text" class='form-control' name='contact' id="contact">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label font-weight-bold'>Address</label>
                <div class="col-sm-6">
                    <input placeholder="Address" type="text" class='form-control' name='address'>
                </div>
            </div>
            <!-- Municipality Dropdown -->
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold' for="municipality">Municipality</label>
                <div class="col-sm-6">
                    <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
                        <option>Select Municipality</option>
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
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold' for="barangay">Barangay</label>
                <div class="col-sm-6">
                    <select class="custom-select" id="barangay" name="barangay">
                        <option>Select Barangay</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-around">
                <button type="submit" class='btn btn-primary' name="createAdmin">Submit</button>
                <a href="adminTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
            </div>
        </form>
    </div>
</div>
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