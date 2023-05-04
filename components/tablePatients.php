<?php
include('connection.php');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h2 class="m-0 font-weight-bold text-primary">
                Patient's Data
            </h2>
            <a href="http://localhost/admin2gh/patientPage-create.php" class="btn btn-primary" role="button">Add new Patient</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Patient Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Patient Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include("connection.php");
                    // read all the data from db table
                    $sql = "SELECT *
                    FROM patients
                    LEFT JOIN barangay ON patients.barangay = barangay.id
                    LEFT JOIN municipality ON patients.municipality = municipality.munId
                    LEFT JOIN diseases ON patients.disease = diseases.diseaseId
                    -- LEFT JOIN outcomes ON patients.outcome = outcomes.outcomeId
                    LEFT JOIN genders ON patients.gender = genders.genderId
                    ";
                    // LIMIT $startRecord, $recordsPerPage

                    $result = mysqli_query($con, $sql);

                    // check if there is data in the table
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $patients) {
                            $creationDate = $patients['creationDate'];
                            $year = date('Y', strtotime($creationDate));
                    ?>
                            <tr>
                                <td><?= $patients['patientId'] ?></td>
                                <td><?= $patients['firstName'] ?></td>
                                <td><?= $patients['lastName'] ?></td>
                                <td><?= $patients['gender'] ?></td>
                                <td><?= $patients['disease'] ?></td>
                                <td><?= $patients['dob'] ?></td>
                                <td><?= $patients['age'] ?></td>
                                <td><?= $patients['barangay'] ?></td>
                                <td><?= $patients['municipality'] ?></td>
                                <td><?= $year ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="http://localhost/admin2gh/patientPage-view.php?patientId=<?= $patients['patientId']; ?>">View</a>
                                    <a class="btn btn-primary btn-sm" href="http://localhost/admin2gh/patientPage-update.php?patientId=<?= $patients['patientId']; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="http://localhost/admin2gh/components/patientForm-remove.php?patientId=<?= $patients['patientId']; ?>">Remove</a>
                                </td>

                            </tr>
                    <?php
                        }
                    } else {
                        echo "No data found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>