<?php
include('alertMessage.php');
include("connection.php");

$user_data = check_login($con);

$patientId = '';
$stoolCulture = '';
$organism = '';
$outcome = '';
$dateDied = date("Y-m-d");

$message = '';
$type = '';
$strongContent = '';

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//GET Method: show the data of the client
if (!isset($_GET["patientId"])) {
    echo "User ID is not set.";
    // header('location: http://localhost/admin2gh/patientTable.php');
    // exit;
}
$patientId = $_GET['patientId'];

if (empty($patientId)) {
    echo 'patiend Id emtpy';
}
echo $patientId;

// check if the form is submitted using the post method
// initialize data above into the post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $stoolCulture = $_POST['stoolCulture'];
    $organism = $_POST['organism'];
    $outcome = $_POST['outcome'];
    $dateDied = $_POST['dateDied'];

    // check if the data is empty
    do {
        if (empty($stoolCulture) or empty($organism)) {
            $errorMessage = "All fields are required!";
            echo "<script>alert('All fields are required!');</script>";
            break;
        }
        // Proceed with form submission
        // Insert the data into the amebiasisinfotbl table
        $query = "INSERT INTO amebiasisinfotbl (patientId, stoolCulture, organism, outcome, dateDied) 
            VALUES ('$patientId', '$stoolCulture', '$organism', '$outcome', '$dateDied')";

        $result = mysqli_query($con, $query);

        if ($result) {
            $message = "ABD info successfully added!";
            $type = 'success';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "<script>
                alert('ABD form submitted successfully!');
                window.location = 'http://localhost/admin2gh/patientTable.php';
            </script>";
            exit;
        } else {
            $message = "Error submitting form!";
            $type = 'warning';
            $strongContent = 'Holy guacamole!';
            $alert
                = generateAlert($type, $strongContent, $message);

            echo "
            <script>
                alert('Error submitting form! " . mysqli_error($con) . "');
            </script>";
        }
    } while (false);
}

?>

<form method="POST">
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>

    <div class="mb-3">
        <label for="stoolCulture" class="form-label">Stool Culture</label>
        <input type="text" class="form-control" id="stoolCulture" name="stoolCulture" required>
    </div>
    <div class="mb-3">
        <label for="organism" class="form-label">Organism</label>
        <input type="text" class="form-control" id="organism" name="organism" required>
    </div>
    <div class="mb-3">
        <label for="outcome" class="form-label">Outcome</label>
        <input type="text" class="form-control" id="outcome" name="outcome">
    </div>
    <div class="mb-3">
        <label for="dateDied" class="form-label">Date Died</label>
        <input type="datetime-local" class="form-control" id="dateDied" name="dateDied">
    </div>
    <div class="row mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <div class="col-sm-3 d-grid">
            <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-outline-primary" role="button">Cancel</a>
        </div>
    </div>
</form>