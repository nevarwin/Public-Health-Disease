<!-- Content Row -->
<div class="row gap-0">
    <?php
    // Replace with your database connection code
    include('./components/connection.php');

    $query = "SELECT COUNT(*) AS count, positions.position
            FROM clients
            INNER JOIN positions ON clients.positionId = positions.positionId
            GROUP BY clients.positionId, positions.position";
    $result = mysqli_query($con, $query);

    // Display the counts of admins in different positions
    while ($row = mysqli_fetch_assoc($result)) {
        $position = $row['position'];
        $count = $row['count'];
    ?>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $position ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <!-- <?php
            // Replace with your database connection code
            include('./components/connection.php');

            $query = "SELECT COUNT(*) AS count
            FROM clients
            WHERE positionId = 3";
            $result = mysqli_query($con, $query);

            // Display the count of authorized users
            while ($row = mysqli_fetch_assoc($result)) {
                $count = $row['count'];
            ?>

        <div class="col-xl-3 col-lg-3 col-md-12">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Authorized Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
            }
    ?> -->

    <?php
    // Replace with your database connection code
    include('./components/connection.php');

    // Define the list of diseases
    $diseases = array(
        'ABD', 'AEFI', 'AES', 'AFP', 'AMES', 'ChikV', 'DIPH', 'HFMD',
        'NNT', 'NT', 'PERT', 'Influenza', 'Dengue', 'Rabies', 'Cholera',
        'Hepatitis', 'Measles', 'Meningitis', 'Meningo', 'Typhoid', 'Leptospirosis'
    );

    $currentYear = date('Y');

    $query = "SELECT COUNT(p.patientId) AS count, d.disease
            FROM patients p
            INNER JOIN diseases d ON p.disease = d.diseaseId
            WHERE YEAR(p.creationDate) = '$currentYear'
                AND d.disease IN ('" . implode("','", $diseases) . "')
            GROUP BY p.disease, d.disease
            ORDER BY count DESC
            LIMIT 4";
    $result = mysqli_query($con, $query);

    // Display the top 4 diseases
    while ($row = mysqli_fetch_assoc($result)) {
        $disease = $row['disease'];
        $count = $row['count'];
    ?>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
            <div class="card border-left-warning shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?= $disease ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-disease fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<!-- Patient Table Recently Added -->
<div class="container-fluid my-2">
    <div class="row flex-wrap">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Newly Added Patients</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Disease</th>
                                    <th>Municipality</th>
                                    <th>Barangay</th>
                                    <th>Creation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Replace with your database connection code
                                include('./components/connection.php');

                                // Fetch the newly added patients from the patients table
                                $query = "SELECT p.*, d.disease, b.barangay, m.municipality
                                    FROM patients p
                                    INNER JOIN diseases d ON p.disease = d.diseaseId
                                    INNER JOIN barangay b ON p.barangay = b.id
                                    INNER JOIN municipality m ON p.municipality = m.munId
                                    WHERE YEAR(p.creationDate) = '$currentYear'
                                    ORDER BY p.creationDate DESC
                                    LIMIT 10";
                                $result = mysqli_query($con, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $patientId = $row['patientId'];
                                        $name = $row['firstName'];
                                        $disease = $row['disease'];
                                        $municipality = $row['municipality'];
                                        $barangay = $row['barangay'];
                                        $creationDate = $row['creationDate'];
                                ?>
                                        <tr>
                                            <td><?php echo $patientId; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $disease; ?></td>
                                            <td><?php echo $municipality; ?></td>
                                            <td><?php echo $barangay; ?></td>
                                            <td><?php echo $creationDate; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No newly added patients found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>