<?php
include('connection.php');
include('barangayScript.php');

$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    do {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
        $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $address = mysqli_real_escape_string($con, $_POST['address']);

        if (empty($name) or empty($email) or empty($password) or empty($contact) or empty($address) or empty($municipality) or empty($barangay)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "INSERT INTO clients (name, email, municipality, barangay, password, contact_number, address) VALUES ('$name', '$email', '$municipality', '$barangay', '$password', '$contact', '$address')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            // $_SESSION['message'] = "Admin Successfully Created";
            $successMessage = "Admin Successfully Created";
        } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($con);
            $_SESSION['message'] = "Admin Not Created";
            $errorMessage = "Invalid query: " . $result;
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


<form action="" method="post">
    <?php
    if (!empty($errorMessage)) {
        echo "
        <script> 
        alert($errorMessage);
        </script>
                ";
    }
    ?>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='name'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='email'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Password</label>
        <div class="col-sm-6">
            <input type="password" class='form-control' name='password'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='contact'>
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
    <?php
    if (!empty($successMessage)) {
        echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Holy guacamole!</strong> $successMessage
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
    }
    ?>
</form>