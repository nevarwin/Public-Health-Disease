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
            <a href="/phpsandbox/publichealth/createPatient.php" class="btn btn-primary" role="button">Add new Patient</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Disease</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
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

                    $result = $con->query($sql);

                    // check if there is data in the table
                    if (!$result) {
                        die('Invalid Query: ');
                    }

                    while ($row = $result->fetch_object()) {
                        // <td>$row->outcome</td>
                        echo "
                        <tr>
                        <td>$row->firstName</td>
                        <td>$row->lastName</td>
                        <td>$row->gender</td>
                        <td>$row->disease</td>
                        <td>$row->dob</td>
                        <td>$row->age</td>
                        <td>$row->barangay</td>
                        <td>$row->municipality</td>
                        <td>
                            <a class='btn btn-info btn-sm' href='/phpsandbox/publichealth/viewPatient.php?patientId=$row->patientId'>View</a>
                            <a class='btn btn-primary btn-sm' href='/phpsandbox/publichealth/editPatient.php?patientId=$row->patientId'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/phpsandbox/publichealth/deletePatient.php?patientId=$row->patientId'>Remove</a>
                        </td>
                        </tr>
                    ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>