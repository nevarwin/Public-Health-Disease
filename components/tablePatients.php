<style>
    label {
        display: flex;
        align-items: center;
    }

    .dataTables_wrapper .dataTables_length select {
        display: inline-block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6e707e;
        vertical-align: middle;
        background: #fff url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%235a5c69' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") right 0.75rem center/8px 10px no-repeat;
        border: 1px solid #d1d3e2;
        border-radius: 0.35rem;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        color: #212529;
        background-color: #fff;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.01rem rgba(13, 110, 253, 0.25);
    }

    #myTable_paginate {
        display: flex;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        z-index: 3;
        color: #fff !important;
        background: #007bff !important;
        border-color: #007bff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        z-index: 2;
        color: #0056b3 !important;
        text-decoration: none !important;
        background: #e9ecef !important;
        border-color: #dee2e6 !important;
    }
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h2 class="m-0 font-weight-bold text-primary">Patient's Data</h2>
            <!-- <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search"> -->
            <div class="ml-auto">
                <a href="generate_report.php" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50 mr-auto"></i> Generate Report</a>
                &nbsp;
                <a href="http://localhost/admin2gh/patientPage-create.php" class="btn btn-primary" role="button">Add new patient</a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table cell-border hover" id="myTable" width="100%" cellspacing="0">
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
                <tbody>
                    <?php
                    include("connection.php");
                    // read all the data from db table
                    $sql = "SELECT *
                    FROM patients
                    LEFT JOIN barangay ON patients.barangay = barangay.id
                    LEFT JOIN municipality ON patients.municipality = municipality.munId
                    LEFT JOIN diseases ON patients.disease = diseases.diseaseId
                    LEFT JOIN genders ON patients.gender = genders.genderId
                    ORDER BY patientId DESC
                    ";

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
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm btn-block my-1" href="http://localhost/admin2gh/patientPage-view.php?patientId=<?= $patients['patientId']; ?>">View</a>
                                    <a class="btn btn-primary btn-sm btn-block my-1" href="http://localhost/admin2gh/patientPage-update.php?patientId=<?= $patients['patientId']; ?>">Update</a>

                                    <?php
                                    if ($user_data['positionId'] == 1 or $user_data['positionId'] == 2) {
                                    ?>
                                        <a class="btn btn-danger btn-sm btn-block my-1" href="http://localhost/admin2gh/components/patientForm-remove.php?patientId=<?= $patients['patientId']; ?>">Remove</a>
                                    <?php
                                    }
                                    ?>
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