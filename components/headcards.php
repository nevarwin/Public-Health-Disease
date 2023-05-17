<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Replace with your database connection code
    include('./components/connection.php');

    // Fetch the most common disease out of 20 diseases
    $query = "SELECT COUNT(*) AS count, disease FROM patients GROUP BY disease ORDER BY count DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $mostCommonDiseaseCount = $row['count'];
    $mostCommonDisease = $row['disease'];
    ?>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Most Common Disease</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $mostCommonDisease; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Replace with your database connection code
    include('./components/connection.php');

    // Define the list of diseases
    $diseases = array(
        'ABD', 'AEFI', 'AES', 'AFP', 'AMES', 'ChikV', 'DIPH', 'HFMD',
        'NNT', 'NT', 'PERT', 'Influenza', 'Dengue', 'Rabies', 'Cholera',
        'Hepatitis', 'Measles', 'Meningitis', 'Meningo', 'Typhoid', 'Leptospirosis'
    );

    // Fetch the top 4 diseases from the list
    $query = "SELECT COUNT(p.id) AS count, d.disease
          FROM patients p
          INNER JOIN diseases d ON p.disease = d.diseaseId
          WHERE d.disease IN ('" . implode("','", $diseases) . "')
          GROUP BY p.disease
          ORDER BY count DESC
          LIMIT 4";
    $result = mysqli_query($con, $query);

    // Display the top 4 diseases
    while ($row = mysqli_fetch_assoc($result)) {
        $disease = $row['disease'];
        $count = $row['count'];
    ?>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?= $disease ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>

<!-- Content Row -->