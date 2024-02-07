<!-- Content Row -->
<div class="container-fluid">
    <h1>Dashboard</h1>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="my-2">Number of Admins</h5>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <?php
                        // Replace with your database connection code
                        include('./components/connection.php');

                        $query = "SELECT COUNT(*) AS count, positions.position
                        FROM clients
                        INNER JOIN positions ON clients.positionId = positions.positionId
                        WHERE clients.positionId != 1
                        GROUP BY clients.positionId, positions.position";
                        $result = mysqli_query($con, $query);

                        // Display the counts of admins in different positions
                        while ($row = mysqli_fetch_assoc($result)) {
                            $position = $row['position'];
                            $count = $row['count'];
                        ?>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <h5 class="my-2">Top 4 Disease Cases in Cavite</h5>
                    </button>
                </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
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
                                WHERE YEAR(p.creationDate) = '2023'
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

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
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
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <h5 class="my-2">Most Cases Per Municipality</h5>
                    </button>
                </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <?php
                        // Replace with your database connection code
                        include('./components/connection.php');

                        $currentYear = date('Y');

                        $query = "SELECT COUNT(p.patientId) AS count, m.municipality
                                FROM patients p
                                INNER JOIN municipality m ON p.municipality = m.munId
                                WHERE YEAR(p.creationDate) = '$currentYear'
                                GROUP BY p.municipality, m.municipality
                                ORDER BY count DESC
                                LIMIT 8";
                        $result = mysqli_query($con, $query);

                        // Display the top 4 municipalities
                        while ($row = mysqli_fetch_assoc($result)) {
                            $municipality = $row['municipality'];
                            $count = $row['count'];
                        ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="card border-left-warning shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?= $municipality ?></div>
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
                </div>
            </div>
        </div>
    </div> -->

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <h5 class="my-2">Municipality Cases Per Disease</h5>
                    </button>
                </h2>
            </div>

            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
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

                        $query = "SELECT COUNT(p.patientId) AS count, m.municipality, d.disease
                                FROM patients p
                                INNER JOIN municipality m ON p.municipality = m.munId
                                INNER JOIN diseases d ON p.disease = d.diseaseId
                                WHERE YEAR(p.creationDate) = '2023'
                                    AND d.disease IN ('" . implode("','", $diseases) . "')
                                GROUP BY p.municipality, m.municipality, d.disease
                                ORDER BY m.municipality, count DESC";
                        $result = mysqli_query($con, $query);

                        $previousMunicipality = null;

                        // Group diseases by municipality
                        $municipalities = array();

                        // Collect the top 4 diseases per municipality
                        while ($row = mysqli_fetch_assoc($result)) {
                            $municipality = $row['municipality'];
                            $disease = $row['disease'];
                            $count = $row['count'];

                            if (!array_key_exists($municipality, $municipalities)) {
                                $municipalities[$municipality] = array();
                            }

                            if (count($municipalities[$municipality]) < 4) {
                                $municipalities[$municipality][] = array("disease" => $disease, "count" => $count);
                            }
                        }

                        // Display the cases per municipality
                        foreach ($municipalities as $municipality => $diseases) {
                        ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="card border-left-warning shadow h-100">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?= $municipality ?></div>
                                                <?php foreach ($diseases as $diseaseData) : ?>
                                                    <?php $disease = $diseaseData["disease"]; ?>
                                                    <?php $count = $diseaseData["count"]; ?>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $disease . ': ' . $count ?></div>
                                                <?php endforeach; ?>
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
                </div>
            </div>
        </div>
    </div>
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