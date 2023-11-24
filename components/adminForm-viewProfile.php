<?php
include('connection.php');
include('barangayScript.php');

// $user_data = check_login($con);

// Get admin by id
if (!isset($_GET["id"])) {
    header('location:adminTable.php');
    exit;
}

$id = $_GET['id'];
// read row 
$sql = "SELECT * FROM clients WHERE id = $id";
// execute the sql query
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    // header('location: /phpsandbox/publichealth/admin.php');
    exit;
}

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];
$contact = $row['contact_number'];
$address = $row['address'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];
$position = $row['positionId'];

// Converting the munid and barangayid to its string from their respetive table
$sql = "SELECT * FROM municipality WHERE munId = '$municipality'";
$result = mysqli_query($con, $sql);
$municipalityRow = mysqli_fetch_assoc($result);
$municipality = $municipalityRow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangay'";
$result = mysqli_query($con, $sql);
$barangayRow = mysqli_fetch_assoc($result);
$barangay = $barangayRow['barangay'];

$sql = "SELECT * FROM positions WHERE positionId = '$position'";
$result = mysqli_query($con, $sql);
$positionRow = mysqli_fetch_assoc($result);
$position = $positionRow['position'];

?>
<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-6 col-lg-8" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">View Profile</h2>
        <form action="" method="post">
            <input type="hidden" class='form-control' name='id' value='<?= $id ?>'>
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold'>Position:</label>
                <div class="col-sm-6">
                    <p> <?= $position ?> </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold'>Name:</label>
                <div class="col-sm-6">
                    <p> <?= $name ?> </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold'>Email:</label>
                <div class="col-sm-6">
                    <p> <?= $email ?> </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold'>Contact Number:</label>
                <div class="col-sm-6">
                    <p> <?= $contact ?> </p>
                </div>
            </div>
            <!-- Municipality Dropdown -->
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold' for="municipality">Municipality:</label>
                <div class="col-sm-6">
                    <p> <?= $municipality ?> </p>
                </div>
            </div>
            <!-- Barangay Dropdown -->
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold' for="barangay">Barangay:</label>
                <div class="col-sm-6">
                    <p> <?= $barangay ?> </p>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <label class='col-sm-3 col-form-label font-weight-bold'>Address:</label>
                <div class="col-sm-6">
                    <p><?= $address ?></p>
                </div>
            </div>
            <?php
            if ($user_data['positionId'] != 1) {
                $link = "patientTable.php";
            } else {
                $link = "adminTable.php";
            }
            ?>
            <div class="row justify-content-center mb-3">
                <a href="<?= $link ?> " class="btn btn-outline-primary" role="button">Back</a>
            </div>
        </form>
    </div>
</div>