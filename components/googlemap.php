<?php
include('js/heatmap.php');
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        #map {
            height: 77%;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDCpppcL179vukeD8LAeMYSS-WamNfzgI&libraries=visualization"></script>
</head>

<body>
    <?php
    if (!empty($alert)) {
        echo $alert;
    }
    ?>
    <div class="row d-flex align-contents-center my-2">
        <div class="col">
            <label for="disease">Select Disease:</label>
            <select name="disease" id="disease" class="custom-select">
                <option value="">All</option>
                <?php
                $sql = "SELECT diseaseId, disease FROM diseases";
                $result = $con->query($sql);

                $pieDropdown = [];

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $pieDropdown[$row['diseaseId']] = $row['disease'];
                    }
                }

                $pieSelectedDisease = $_GET['disease'] ?? '';

                foreach ($pieDropdown as $key => $value) {
                    $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
                    echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col">
            <label for="year">Select Year:</label>
            <select name="year" id="year" class="custom-select">
                <option value="">All</option>
                <?php foreach ($years as $year) : ?>
                    <option value="<?php echo $year; ?>" <?= $year == $selectedYear ? 'selected' : '' ?>><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label>Select Color:</label>
            <select id="color-deficiency" class="custom-select" onchange="changeGradientColor()">
                <option value="default">Default</option>
                <option value="deuteranomaly">Deuteranomaly</option>
                <option value="protanomaly">Protanomaly</option>
                <option value="tritanomaly">Tritanomaly</option>
            </select>
        </div>
        <div class="col">
            <label for="quarter-selection">Select Quarterly:</label>
            <select id="quarter-selection" class="custom-select">
                <option value="0">All</option>
                <option value="1">First Quarter</option>
                <option value="2">Second Quarter</option>
                <option value="3">Third Quarter</option>
                <option value="4">Fourth Quarter</option>
            </select>
        </div>
        <div class="col">
            <label for="month-selection">Select Month:</label>
            <select id="month-selection" class="custom-select">
                <option value="0">All</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col">
            <label for="week-selection">Select Week:</label>
            <select id="week-selection" class="custom-select">
                <option value="0">All</option>
                <option value="1">Week 1</option>
                <option value="2">Week 2</option>
                <option value="3">Week 3</option>
                <option value="4">Week 4</option>
            </select>
        </div>
    </div>

    <div id="map"></div>
    <script src="components\js\map.js"></script>
</body>

</html>