<?php
include('connection.php');
include('barangayScript.php');

// $user_data = check_login($con);

// Get admin by id
if (!isset($_GET["id"])) {
    header('location: /phpsandbox/publichealthd/admin.php');
    exit;
}

if ($user_data['positionId'] != 1) {
    $link = "http://localhost/admin2gh/patientTable.php";
} else {
    $link = "http://localhost/admin2gh/adminTable.php";
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

$name = $row['name'];
$email = $row['email'];
$contact = $row['contact_number'];
$address = $row['address'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];


// POST Method: Update the data of the client
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // check if the data is empty
    do {
        if (empty($password)) {
            $errorMessage = "All fields are required";
            break;
        }
        if ($password != $confirmPassword) {
            echo "Password and Confirm Password must be the same";
            $errorMessage = "Password and Confirm Password must be the same";
            break;
        }

        // Add MD5 encryption to the password
        $hashedPassword = md5($password);

        // Update data in the database
        $sql = "UPDATE `clients` SET `password` = '$hashedPassword' WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            echo "Password updated successfully";
            $successMessage = "Password updated successfully";
        } else {
            echo "Error updating password: ";
        }

        if ($user_data['positionId'] != 1) {
            $link = "http://localhost/admin2gh/patientTable.php";
        } else {
            $link = "http://localhost/admin2gh/adminTable.php";
        }

        echo "
        <script> 
            alert('Admin Successfully Updated');
            window.location= '$link';
        </script>
        ";
    } while (false);
}

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2>Change Password</h2>
        <form action="" method="post" onsubmit="return validateForm(event)">
            <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Password</label>
                <div class="col-sm-6">
                    <input id="password" type="password" class='form-control' name='password' placeholder='Password'>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class='col-sm-3 col-form-label'>Confirm Password</label>
                <div class="col-sm-6">
                    <input id="confirmPassword" type="password" class='form-control' name='confirmPassword' placeholder='Confirm Password'>
                </div>
            </div>
            <div class="row">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class='btn btn-primary'>Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="<?= $link ?>" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function validateForm(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;

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