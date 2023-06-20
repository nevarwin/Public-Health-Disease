<body>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h2 class="m-0 font-weight-bold text-primary">Admin's Data</h2>
                <!-- <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search"> -->
                <a href="http://localhost/admin2gh/adminPage-create.php" class="btn btn-primary ml-auto">Add new Admin</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="myTable" cellspacing="0" width="100%">
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
        </div>
    </div>
</body>