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
$contact = ($row['contact'] === '' ? 'N/A' : $row['contact']);
$street = empty($row['street']) ? 'N/A' : $row['street'];
$unitCode = empty($row['unitCode']) ? 'N/A' : $row['unitCode'];
$subd = empty($row['subd']) ? 'N/A' : $row['subd'];
$postalCode = $row['postalCode'];
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

$fullName = "";

switch ($disease) {
    case "ABD":
        $fullName = "Amoebiasis";
        break;
    case "AEFI":
        $fullName = "Adverse Event Following Immunization";
        break;
    case "AES":
        $fullName = "Acute encephalitis syndrome";
        break;
    case "AFP":
        $fullName = "Alpha-Fetoprotein";
        break;
    case "AMES":
        $fullName = "Acute Meningitis";
        break;
    case "DIPH":
        $fullName = "Diphtheria";
        break;
    case "NT":
        $fullName = "Neonatal Tetanus";
        break;
    case "PERT":
        $fullName = "Perthes Disease";
        break;
    case "NNT":
        $fullName = "Number Needed to Treat";
        break;
    case "HFMD":
        $fullName = "Hand, Foot, and Mouth Disease";
        break;
    case "Influenza":
        $fullName = "Influenza";
        break;
    case "Dengue":
        $fullName = "Dengue";
        break;
    case "Rabies":
        $fullName = "Rabies";
        break;
    case "Cholera":
        $fullName = "Cholera";
        break;
    case "Hepatitis":
        $fullName = "Hepatitis";
        break;
    case "Meningitis":
        $fullName = "Meningitis";
        break;
    case "Meningo":
        $fullName = "Meningo";
        break;
    case "Typhoid":
        $fullName = "Typhoid";
        break;
    case "Leptospirosis":
        $fullName = "Leptospirosis";
        break;
    default:
        $fullName = "Unknown";
        break;
}

$update_page_path = strtolower($disease) . "Page-update.php";

if (is_file($update_page_path)) {
    $hreflink = "{$disease}Page-update.php?patientId={$patientId}";
} else {
    $hreflink = "";
}
?>
<div class="container-fluid">
    <!-- Begin of Row -->
    <div class="row">
        <div class="col-xl-8 col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT NAME</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800 mx-3">
                                <?php echo $fName . " " . $lName . " " . $mName; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="text-xs font-weight-bold text-success">PATIENT ID</div>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800 mx-3">
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
                <div class="card-body mx-4"> <!--Card Body begin tag  -->
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Disease</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $fullName  ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Age</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $age ?> years old</div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Birthday</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $dob ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Building Number</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $unitCode ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Subdivision/Village</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $subd ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Street</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $street ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Barangay</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $barangay ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Municipality</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $municipality ?></div>
                    </div>
                    <div style="margin-bottom:17px;">
                        <div class="row no-gutters">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Postal Code</div>
                        </div>
                        <div class="h5 mb-1 font-weight-bold text-gray-800"><?php echo $postalCode ?></div>
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
        <div id="findings" class="col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success"><?= $disease ?> Disease Information
                    </h6>
                    <a style="text-decoration:none;" class="text-secondary" href="<?= $hreflink ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col-sm-12">
                        <?php
                        $file_path = "./disease/{$disease}Form-view.php";

                        if (file_exists($file_path)) {
                            include($file_path);
                        } else {
                            echo 'No information Available';
                        }
                        ?>
                    </div>
                </div>
            </div><!-- End of Row -->
        </div>
    </div>