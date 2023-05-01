<?php
include('connection.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h2 class="m-0 font-weight-bold text-primary">
                Admin's Data
            </h2>
            <a href="http://localhost/admin2gh/adminPage-create.php" class="btn btn-primary" role="button">Add new Admin</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
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
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Barangay</th>
                        <th>Municipality</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    // read all the data from db table
                    $sql = "SELECT clients.*, barangay.barangay, municipality.municipality
                    FROM clients
                    LEFT JOIN barangay ON clients.barangay = barangay.id 
                    LEFT JOIN municipality ON clients.municipality = municipality.munId
                    ";
                    // LIMIT $startRecord, $recordsPerPage
                    $result = mysqli_query($con, $sql);

                    // check if there is data in the table
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $admins) {
                    ?>
                            <tr>
                                <td><?= $admins['name']; ?></td>
                                <td><?= $admins['email']; ?></td>
                                <td><?= $admins['contact_number']; ?></td>
                                <td><?= $admins['address']; ?></td>
                                <td><?= $admins['barangay']; ?></td>
                                <td><?= $admins['municipality']; ?></td>
                                <td><?= $admins['created_at']; ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="http://localhost/admin2gh/adminPage-update.php?id=<?= $admins['id']; ?>">Update</a>
                                    <a class="btn btn-danger btn-sm" href="http://localhost/admin2gh/components/adminForm-remove.php?id=<?= $admins['id']; ?>">Remove</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>