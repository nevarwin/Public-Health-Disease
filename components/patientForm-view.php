<?php
include('barangayScript.php');
include("connection.php");

// patient name
$patientId = '';
$fName = '';
$lName = '';
$mName = '';

$contact = '';
$address = '';
$addressDRU = '';

$errorMessage = '';
$successMessage = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$patientId = $_GET['patientId'];
// read row 
// $sql = "SELECT * FROM patients WHERE patientId = $patientId";

$sql = "SELECT *
    FROM patients
    LEFT JOIN municipality AS m1 ON patients.municipality = m1.munId
    LEFT JOIN barangay AS b1 ON patients.barangay = b1.id
    LEFT JOIN diseases ON patients.disease = diseases.diseaseId
    LEFT JOIN genders ON patients.gender = genders.genderId
    WHERE patients.patientId = $patientId
";
// execute the sql query
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'error in result' . mysqli_error($con);;
}
$row = mysqli_fetch_assoc($result);

if (!$row) {
    // header('location: http://localhost/admin2gh/patientTable.php');
    exit;
}

$fName = $row['firstName'];
$lName = $row['lastName'];
$mName = $row['middleName'];
$gender = $row['gender'];
$dob = $row['dob'];
$age = $row['age'];
$municipality = $row['municipality'];
$barangay = $row['barangay'];
$municipalityDRU = $row['munCityOfDRU'];
$barangayDRU = $row['brgyOfDRU'];
$disease = $row['disease'];
$contact = $row['contact'];
$address = $row['address'];
$addressDRU = $row['addressOfDRU'];
$creationDate = $row['creationDate'];

$sql = "SELECT * FROM municipality WHERE munId = '$municipalityDRU'";
$result = mysqli_query($con, $sql);
$municipalityDRURow = mysqli_fetch_assoc($result);
$municipalityDRU = $municipalityDRURow['municipality'];

$sql = "SELECT * FROM barangay WHERE id = '$barangayDRU'";
$result = mysqli_query($con, $sql);
$barangayDRURow = mysqli_fetch_assoc($result);
$barangayDRU = $barangayDRURow['barangay'];

?>
<div class="container-fluid">
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 text-center">Patient Records</h1>
    </div>

    <div class="row"> <!-- Begin of Row -->

        <div class="col-xl-7 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT NAME</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $fName . " " . $lName . " " . $mName; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT ID</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $patientId; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- End of Row -->
    <div class="row"><!-- Begin Row -->
        <!-- First Column -->
        <div class="col-lg-4">
            <!-- Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Details
                        <!-- <a style="margin-left: 225px; text-decoration:none;" class="text-secondary" href="http://localhost/admin2gh/patientPage-viewupdate.php?patientId=<?= $patientId ?>">
                            <i class="fa fa-edit"></i>
                        </a> -->
                    </h6>
                </div>
                <div class="card-body"> <!--Card Body begin tag  -->
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Disease</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $disease ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Address</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $address ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $age ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Birthday</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $dob ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Municipality</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $municipality ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barangay</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $barangay ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gender</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $gender ?></div>
                    </div>
                    <div style="margin-bottom:18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Contact Number</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $contact ?></div>
                    </div>
                    <div style="margin-bottom:18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Municipality of DRU</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $municipalityDRU ?></div>
                    </div>
                    <div style="margin-bottom:18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barangay of DRU</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $barangayDRU ?></div>
                    </div>

                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Address of DRU</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $addressDRU ?></div>
                    </div>

                    <div style="margin-bottom:18px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Date Added</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $creationDate; ?></div>
                    </div>
                </div><!--Card body end tag -->
            </div>
        </div>
        <!-- Second Column -->
        <div id="findings" class="col-xl-6 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success"><?= $disease ?> Disease Information <a style="margin-left: 450px; text-decoration:none;" class="text-secondary" href="<?php echo "{$disease}Page-update.php?patientId={$patientId}"; ?>"> <i class="fa fa-edit"></i></a></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col-sm-12">
                        <?php
                        include("./disease/{$disease}Form-view.php");
                        ?>
                    </div>
                </div>
            </div><!-- End of Row -->
        </div>
    </div>