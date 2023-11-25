<?php
include('connection.php');
include('alertMessage.php');

// $user_data = check_login($con);
// Get admin by id
if (!isset($_GET["id"])) {
    header('location:adminTable.php');
    exit;
}

if ($user_data['positionId'] != 1) {
    $link = "patientTable.php";
} else {
    $link = "adminTable.php";
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

$oldHashedPassword = md5($row['password']);
// POST Method: Update the data of the client
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // check if the data is empty
    do {
        if (empty($password)) {
            $errorMessage = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }
        if ($password != $confirmPassword) {
            $errorMessage = "Password and Confirm Password must be the same";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        // Add MD5 encryption to the password
        $hashedPassword = md5($password);

        if ($hashedPassword == $user_data['password']) {
            $errorMessage = "New password must be different from the previous password";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }
        // Update data in the database
        $sql = "UPDATE `clients` SET `password` = '$hashedPassword' WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Password updated successfully";
            $type = 'success';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $successMessage);
        } else {
            $errorMessage = "Error updating password";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
        }

        if ($user_data['positionId'] != 1) {
            $link = "patientTable.php";
        } else {
            $link = "adminTable.php";
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
    <?php
    if (!empty($errorMessage)) {
        echo $alert;
    }
    if (!empty($successMessage)) {
        echo $alert;
    }
    ?>
    <div class="card shadow col-md-8 col-sm-4 col-lg-8 col-xl-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Change Password</h2>
        <form action="" method="post" onsubmit="return validateForm(event)">
            <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label'>Password</label>
                <div class="col-sm-6">
                    <input id="password" type="password" class='form-control' name='password' placeholder='Password'>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label'>Confirm Password</label>
                <div class="col-sm-6">
                    <input id="confirmPassword" type="password" class='form-control' name='confirmPassword' placeholder='Confirm Password'>
                </div>
            </div>
            <div class="row justify-content-around">
                <button type="submit" class='btn btn-primary' name="updateAdmin">Submit</button>
                <a href="<?= $link ?>" class="btn btn-outline-primary" role="button">Cancel</a>
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