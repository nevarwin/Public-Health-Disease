<?php
include('connection.php');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            DataTables Example
        </h6>
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
                    $result = $con->query($sql);

                    // check if there is data in the table
                    if (!$result) {
                        die('Invalid Query: ' . $con->error);
                    }

                    while ($row = $result->fetch_object()) {
                        echo "
                        <tr>
                        <td>$row->name</td>
                        <td>$row->email</td>
                        <td>$row->contact_number</td>
                        <td>$row->address</td>
                        <td>$row->barangay</td>
                        <td>$row->municipality</td>
                        <td>$row->created_at</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/phpsandbox/publichealth/editAdmin.php?id=$row->id'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/phpsandbox/publichealth/deleteAdmin.php?id=$row->id'>Delete</a>
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