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
$password = $row['password'];
$contact = $row['contact_number'];
$address = $row['address'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];

// Converting the munid and barangayid to its string from their respetive table
$sql = "SELECT * FROM municipality WHERE munId = '$municipality'";
$result = mysqli_query($con, $sql);
$municipalityRow = mysqli_fetch_assoc($result);
$municipality = $municipalityRow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangay'";
$result = mysqli_query($con, $sql);
$barangayRow = mysqli_fetch_assoc($result);
$barangay = $barangayRow['barangay'];

?>
<form action="" method="post">
    <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Name</label>
        <div class="col-sm-6">
            <p> <?= $name ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Email</label>
        <div class="col-sm-6">
            <p> <?= $email ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Password</label>
        <div class="col-sm-6">
            <p> <?= $password ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Contact Number</label>
        <div class="col-sm-6">
            <p> <?= $contact ?> </p>
        </div>
    </div>
    <!-- Municipality Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="municipality">Municipality</label>
        <div class="col-sm-6">
            <p> <?= $municipality ?> </p>
        </div>
    </div>
    <!-- Barangay Dropdown -->
    <div class="row mb-3">
        <label class='col-sm-3 col-form-label' for="barangay">Barangay</label>
        <div class="col-sm-6">
            <p> <?= $barangay ?> </p>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class='col-sm-3 col-form-label'>Address</label>
        <div class="col-sm-6">
            <p><?= $address ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/adminTable.php" class="btn btn-outline-primary" role="button">Back</a>
        </div>
    </div>
</form>