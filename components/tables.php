<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>DataTable Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT clients.*, barangay.barangay, municipality.municipality, positions.position
                            FROM clients
                            LEFT JOIN positions ON clients.positionId = positions.positionId
                            LEFT JOIN barangay ON clients.barangay = barangay.id 
                            LEFT JOIN municipality ON clients.municipality = municipality.munId
                            WHERE clients.positionId != 1
                            ORDER BY clients.id DESC
                            ";
                        $result = mysqli_query($con, $sql);

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>