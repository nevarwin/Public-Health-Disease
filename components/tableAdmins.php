<?php
include('connection.php');
include('search.php');

// Determine the total number of records and the number of records per page
$totalRecords = mysqli_fetch_row(mysqli_query($con, "SELECT COUNT(*) FROM clients WHERE id != (SELECT MIN(id) FROM clients)"))[0];
// to edit how many fields in the web
$recordsPerPage = 5;

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
            <h2 class="m-0 font-weight-bold text-primary">Admin's Data</h2>
            <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search">
            <a href="http://localhost/admin2gh/adminPage-create.php" class="btn btn-primary ml-auto">Add new Admin</a>
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered tablesorter" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <?php

                    if ($user_data['positionId'] == 1) {
                        // read all the data from db table
                        $sql = "SELECT clients.*, barangay.barangay, municipality.municipality, positions.position
                        FROM clients
                        LEFT JOIN positions ON clients.positionId = positions.positionId
                        LEFT JOIN barangay ON clients.barangay = barangay.id 
                        LEFT JOIN municipality ON clients.municipality = municipality.munId
                        WHERE clients.positionId != 1
                        ORDER BY clients.id DESC
                        LIMIT $startRecord, $recordsPerPage
                        ";
                        $result = mysqli_query($con, $sql);
                    } else if ($user_data['positionId'] == 2) {
                        $sql = "SELECT clients.*, barangay.barangay, municipality.municipality, positions.position
                        FROM clients
                        LEFT JOIN positions ON clients.positionId = positions.positionId
                        LEFT JOIN barangay ON clients.barangay = barangay.id 
                        LEFT JOIN municipality ON clients.municipality = municipality.munId
                        WHERE clients.positionId >= 3
                        ORDER BY clients.id DESC
                        LIMIT $startRecord, $recordsPerPage
                        ";
                        $result = mysqli_query($con, $sql);
                    }


                    // check if there is data in the table
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $admins) {
                    ?>
                            <tr>
                                <td><?= $admins['position']; ?></td>
                                <td><?= $admins['name']; ?></td>
                                <td><?= $admins['email']; ?></td>
                                <td><?= $admins['contact_number']; ?></td>
                                <td><?= $admins['address']; ?></td>
                                <td><?= $admins['barangay']; ?></td>
                                <td><?= $admins['municipality']; ?></td>
                                <td><?= $admins['created_at']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm btn-block my-1" href="http://localhost/admin2gh/adminPage-update.php?id=<?= $admins['id']; ?>">Update</a>
                                    <?php
                                    if ($user_data['positionId'] == 1) {
                                    ?>
                                        <a class="btn btn-danger btn-sm btn-block my-1" href="http://localhost/admin2gh/components/adminForm-remove.php?id=<?= $admins['id']; ?>">Remove</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
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
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $startRecord = ($currentPage - 1) * $recordsPerPage;

                    // Calculate the total number of pages
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                    $maxPages = 5;

                    // Calculate the starting page for the current set
                    $startPage = max(1, $currentPage - floor($maxPages / 2));
                    $endPage = $startPage + $maxPages - 1;
                    $endPage = min($endPage, $totalPages);

                    // Add links to navigate between the pages
                    if ($totalPages > 1) {
                        if ($currentPage > 1) {
                            echo "<li class='page-item'><a class='page-link' href=\"?page=" . ($currentPage - 1) . "\">Previous</a>";
                        }

                        // Display the page links for the current set
                        for ($i = $startPage; $i <= $endPage; $i++) {
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

<!-- <script>
    $(function() {
        $("#myTable").tablesorter({
            sortList: [
                [0, 0],
                [1, 0]
            ]
        });
    });
</script> -->