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

// Check if the 'id' key is present in the GET request

// Fetch the disease from the database
$sql = "SELECT * FROM diseases WHERE id = $diseaseId";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo 'Error in fetching disease: ' . mysqli_error($con);
    exit;
}

// Check if the disease record was found
if ($row = mysqli_fetch_assoc($result)) {
    $diseaseName = $row['disease'];
} else {
    echo 'Disease not found';
    exit;
}

?>

<div class="row d-flex justify-content-center">
    <div class="card shadow col-md-12 col-sm-4 col-lg-6" style="padding: 30px">
        <h2 class="row justify-content-center mb-3">Edit Diseases:</h2>
        <?php
        if (!empty($alert)) {
            echo $alert;
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Disease Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['disease']}</td>";
                    echo "<td><a href='edit_disease.php?id={$row['id']}' class='btn btn-primary'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>