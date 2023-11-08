<?php
include('connection.php');
include('alertMessage.php');

$message = '';
$type = '';
$strongContent = '';

// Get admin by id

if ($user_data['positionId'] != 1) {
    $link = "http://localhost/admin2gh/patientTable.php";
} else {
    $link = "http://localhost/admin2gh/adminTable.php";
}


// execute the sql query
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'error in result' . mysqli_error($con);;
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    exit;
}
// $newDisease = $row['newDisease'];

// POST Method: Update the data of the client
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newDisease = mysqli_real_escape_string($con, $_POST['newDisease']);


    // check if the data is empty
    do {
        if (empty($newDisease)) {
            $message = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $message);
            break;
        }

        // update data into the db
        $sql = "INSERT INTO diseases (disease) VALUES ('$newDisease')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Profile Successfully Update";
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
        <h2 class="row justify-content-center mb-3">Add New Disease:</h2>
        <?php
        if (!empty($alert)) {
            echo $alert;
        }
        ?>
        <form action="" method="post">
            <div class="row justify-content-center mb-3">
                <label for="" class='col-sm-3 col-form-label'>New Disease</label>
                <div class="col-sm-6">
                    <input type="text" class='form-control' name='newDisease'>
                </div>
            </div>
            <div class="row justify-content-around">
                <button type="submit" class='btn btn-primary' name="updateAdmin">Submit</button>
                <a href="<?= $link ?>" class="btn btn-outline-primary" role="button">Cancel</a>
            </div>
        </form>
    </div>
</div>