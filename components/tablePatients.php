<?php
include('connection.php');
include('search.php');

// Determine the total number of records and the number of records per page
$totalRecords = mysqli_query($con, "SELECT COUNT(*) FROM patients ")->fetch_array()[0];
// to edit how many fields in the web
$recordsPerPage = 10;

// Determine the current page number and the starting record for the page
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}
$startRecord = ($currentPage - 1) * $recordsPerPage;
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h2 class="m-0 font-weight-bold text-primary">Patient's Data</h2>
            <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search">
            <a href="http://localhost/admin2gh/patientPage-create.php" class="btn btn-primary ml-auto" role="button">Add new patient</a>
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
                <!-- <tfoot>
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
                </tfoot> -->
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
                    ORDER BY patientId DESC
                    LIMIT $startRecord, $recordsPerPage
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
                                    <a class="btn btn-primary btn-sm btn-block my-1" href="http://localhost/admin2gh/patientPage-update.php?patientId=<?= $patients['patientId']; ?>">Edit</a>

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
        <div class="container my-5">
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php
                    // Determine the current page number and the starting record for the page
                    if (isset($_GET['page'])) {
                        $currentPage = $_GET['page'];
                    } else {
                        $currentPage = 1;
                    }
                    $startRecord = ($currentPage - 1) * $recordsPerPage;
                    // Add links to navigate between the pages
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                    if ($totalPages > 1) {
                        if ($currentPage > 1) {
                            echo "<li class='page-item'><a class='page-link' href=\"?page=" . ($currentPage - 1) . "\">Previous</a>";
                        }
                        // old code with class
                        // if ($currentPage > 1) {
                        //     echo "<li class='page-item disabled'> <a class='page-link' aria-disabled='true' tabindex='-1' href=\"?page=" . ($currentPage - 1) . "\">Previous</a></li>";
                        // }
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                echo "<li class='page-item active'><a class='page-link'>" . $i . "</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href=\"?page=" . $i . "\">" . $i . "</a></li>";
                            }
                        }
                        if ($currentPage < $totalPages) {
                            echo "<li class='page-item'><a class='page-link' href=\"?page=" . ($currentPage + 1) . "\">Next</a>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</div>