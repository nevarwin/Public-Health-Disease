<?php
if (isset($_SESSION['id'])) {
    $deptid = $_SESSION['id'];
    // echo ($deptid);
}
?>

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


<body>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h2 class="m-0 font-weight-bold text-primary">Admin's Data</h2>
                <!-- <input class="col-sm-3 form-control" type="text" id="searchInput" placeholder="Search"> -->
                <a href="adminPage-create.php" class="btn btn-primary ml-auto">Add new Admin</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table cell-border hover" id="tableAdmins" cellspacing="0" width="100%">
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
                            <th class="no-export">Action</th>
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
                            WHERE clients.positionId >= 3 AND clients.createdby_id = $deptid
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
                                        <a class="btn btn-primary btn-sm btn-block my-1" href="adminPage-update.php?id=<?= $admins['id']; ?>">Update</a>
                                        <?php
                                        if ($user_data['positionId'] == 1) {
                                        ?>
                                            <a class="btn btn-danger btn-sm btn-block my-1" href="adminPage-remove.php?id=<?= $admins['id']; ?>">Remove</a>
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