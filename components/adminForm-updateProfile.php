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
$sql = "SELECT * FROM clients WHERE id = $id";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: /phpsandbox/publichealth/admin.php');
    exit;
}

$name = $row['name'];
$email = $row['email'];
$contact = $row['contact_number'];
$address = $row['address'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];

// Converting the munid and barangayid to its string from their rescpetive table
$sql = "SELECT * FROM municipality WHERE munId = '$municipality'";
$result = mysqli_query($con, $sql);
$municipalityRow = mysqli_fetch_assoc($result);
$municipality = $municipalityRow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangay'";
$result = mysqli_query($con, $sql);
$barangayRow = mysqli_fetch_assoc($result);
$barangay = $barangayRow['barangay'];

// POST Method: Update the data of the client
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];

    // check if the data is empty
    do {
        if (empty($name) or empty($email) or empty($password)  or empty($contact) or empty($address) or empty($municipality) or empty($barangay)) {
            $errorMessage = "All fields are required";
            break;
        }
        if ($password != $confirmPassword) {
            echo "Password and Confirm Password must be the same";
            $errorMessage = "Password and Confirm Password must be the same";
            break;
        }
        // update data into the db
        $sql = "UPDATE `clients` SET `name` = '$name', `email` = '$email',`password` = '$password', `contact_number` = '$contact', `address` = '$address', `municipality` = '$municipality', `barangay` = '$barangay' WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
            $successMessage = "Client added correctly";
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
<form action="" method="post">
    <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='name' value='<?= $name ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='email' value='<?= $email ?>'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Password</label>
        <div class="col-sm-6">
            <input type="password" class='form-control' name='password' placeholder='Password'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Confirm Password</label>
        <div class="col-sm-6">
            <input type="password" class='form-control' name='confirmPassword' placeholder='Confirm Password'>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <input type="text" class='form-control' name='contact' value='<?= $contact ?>'>
        </div>
    </div>
    <!-- Municipality Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="municipality">Municipality</label>
        <div class="col-sm-6">
            <select class="form-select" id="municipality" onchange="updateBarangays()" name="municipality">
                <option value=""> <?= $municipality ?></option>
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
                <option><?= $barangay ?></option>
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
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/adminTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>
<?php
