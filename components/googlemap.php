<?php
// Replace with your database connection code
include('connection.php');
include('alertMessage.php');


// Get the list of unique diseases from the "patients" table
$diseaseQuery = "SELECT DISTINCT disease FROM patients ";
$diseaseResult = mysqli_query($con, $diseaseQuery);
$diseases = [];
while ($diseaseRow = mysqli_fetch_assoc($diseaseResult)) {
    $diseases[] = $diseaseRow['disease'];
}

// Get the list of unique years from the "patients" table
$yearQuery = "SELECT DISTINCT YEAR(creationDate) AS year 
            FROM patients ORDER BY year ASC";
$yearResult = mysqli_query($con, $yearQuery);
$years = [];
while ($yearRow = mysqli_fetch_assoc($yearResult)) {
    $years[] = $yearRow['year'];
}

// Fetch latitude and longitude from the "patients" table
$selectedDisease = $_GET['disease'] ?? '';
$selectedYear = $_GET['year'] ?? '';

$query = "SELECT latitude, longitude, creationDate FROM patients";

if (!empty($selectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude, creationDate FROM patients WHERE disease = '$selectedDisease'";
}

if (!empty($selectedDisease) && !empty($selectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude, creationDate FROM patients WHERE disease = '$selectedDisease' AND YEAR(creationDate) = $selectedYear";
}

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
    $message = "No records found!";
    $type = 'warning';
    $strongContent = 'Oh no!';
    $alert = generateAlert($type, $strongContent, $message);
}

// Fetch the data and convert it to JSON
$locationData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $locationData[] = [
        'lat' => floatval($row['latitude']),
        'lng' => floatval($row['longitude']),
        'creationDate' => $row['creationDate']
    ];
}
echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';
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
            <label>Select Color Vision Deficiency:</label>
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

    <script>
        let map;
        let heatmap;
        let filteredData = [];
        let useFilteredData = false;

        function monthConversion(month, monthConverted) {
            if (month >= 1 && month <= 3) {
                monthConverted = 1;
            } else if (month >= 4 && month <= 6) {
                monthConverted = 2;
            } else if (month >= 7 && month <= 9) {
                monthConverted = 3;
            } else if (month >= 10 && month <= 12) {
                monthConverted = 4;
            }
            // console.log("monthConverted", monthConverted, "month", month);
            return monthConverted;
        }

        function dateConversion(date, dateConverted) {
            if (date >= 1 && date <= 7) {
                dateConverted = 1;
            } else if (date <= 14 && date >= 8) {
                dateConverted = 2;
            } else if (date <= 21 && date >= 15) {
                dateConverted = 3;
            } else if (date <= 31 && date >= 22) {
                dateConverted = 4;
            }
            // console.log("dateConverted", dateConverted, "date", date);
            return dateConverted;
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 14.278023306102497,
                    lng: 120.88505851514495
                },
                zoom: 11,
                mapTypeId: "roadmap",
            });

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: locationData.map((item) => {
                    // FOR LOGGING
                    //
                    //
                    console.log(item.creationDate);
                    console.log(new Date(item.creationDate).getDate());
                    return {
                        location: new google.maps.LatLng(item.lat, item.lng),
                        weight: new Date(item.creationDate).getDate(),
                    };
                }),
                map: map,
                radius: 20,
            });
        }
        const deuteranomalyColors = [
            'rgba(255, 0, 0, 0)',
            'rgba(255, 140, 0, 1)', // Dark Orange
            'rgba(255, 165, 0, 1)', // Medium Orange
            'rgba(255, 200, 100, 1)', // Light Orange
            'rgba(144, 238, 144, 1)', // Light Green
            'rgba(0, 192, 0, 1)', // Medium Green
            'rgba(0, 128, 0, 1)', // Dark Green
            'rgba(173, 216, 230, 1)', // Light Blue
            'rgba(0, 0, 255, 1)', // Medium Blue
            'rgba(0, 0, 128, 1)', // Dark Blue
            'rgba(0, 0, 0, 1)'
        ];
        const protanomalyColors = [
            'rgba(255, 0, 0, 0)',
            // Yellow Shades
            'rgba(255, 255, 153, 1)', // Light Yellow
            'rgba(255, 255, 102, 1)', // Medium Yellow
            'rgba(255, 255, 0, 1)', // Dark Yellow

            // Lime Green Shades
            'rgba(50, 205, 50, 1)', // Dark Lime Green
            'rgba(124, 252, 0, 1)', // Medium Lime Green
            'rgba(144, 238, 144, 1)', // Light Lime Green

            // Blue Shades
            'rgba(173, 216, 230, 1)', // Light Blue
            'rgba(0, 0, 255, 1)', // Medium Blue
            'rgba(0, 0, 128, 1)', // Dark Blue
            'rgba(0, 0, 0, 1)'
        ];
        const tritanomalyColors = [
            'rgba(255, 0, 0, 0)',
            // Red Shades
            'rgba(255, 0, 0, 1)', // Dark Red
            'rgba(255, 69, 0, 1)', // Medium Red
            'rgba(255, 99, 71, 1)', // Light Red

            // Light Turquoise Shades
            'rgba(64, 224, 208, 1)', // Dark Light Turquoise
            'rgba(0, 255, 255, 1)', // Medium Light Turquoise
            'rgba(175, 238, 238, 1)', // Light Light Turquoise

            // Blue Shades
            'rgba(173, 216, 230, 1)', // Light Blue
            'rgba(0, 0, 255, 1)', // Medium Blue
            'rgba(0, 0, 128, 1)', // Dark Blue
            'rgba(0, 0, 0, 1)',
        ];
        const defaultColors = [
            "rgba(0, 255, 255, 0)",
            "rgba(0, 255, 255, 1)",
            "rgba(0, 191, 255, 1)",
            "rgba(0, 127, 255, 1)",
            "rgba(0, 63, 255, 1)",
            "rgba(0, 0, 255, 1)",
            "rgba(0, 0, 223, 1)",
            "rgba(0, 0, 191, 1)",
            "rgba(0, 0, 159, 1)",
            "rgba(0, 0, 127, 1)",
            "rgba(63, 0, 91, 1)",
            "rgba(127, 0, 63, 1)",
            "rgba(191, 0, 31, 1)",
            "rgba(255, 0, 0, 1)"
        ];


        function changeGradientColor() {
            var dropdown = document.getElementById("color-deficiency");

            if (dropdown.value === "deuteranomaly") {
                console.log('deutera');
                heatmap.set("gradient", deuteranomalyColors);
            } else if (dropdown.value === "protanomaly") {
                console.log('prota');
                heatmap.set("gradient", protanomalyColors);
            } else if (dropdown.value === "tritanomaly") {
                console.log('trita');
                heatmap.set("gradient", tritanomalyColors);
            } else if (dropdown.value === "default") {
                console.log('default');
                heatmap.set("gradient", heatmap.get("gradient") ? null : defaultColors);
                console.log(defaultColors);
            }
        }

        // Handle changes in the dropdown menus
        const diseaseSelect = document.getElementById('disease');
        const yearSelect = document.getElementById('year');

        diseaseSelect.addEventListener('change', updateHeatmap);
        yearSelect.addEventListener('change', updateHeatmap);

        const quarterSelect = document.getElementById('quarter-selection');
        const monthSelect = document.getElementById('month-selection');
        const weekSelect = document.getElementById('week-selection');

        quarterSelect.addEventListener('change', updateHeatmap);
        monthSelect.addEventListener('change', updateHeatmap);
        weekSelect.addEventListener('change', updateHeatmap);

        function updateHeatmap() {
            const selectedDisease = diseaseSelect.value;
            const selectedYear = yearSelect.value;
            const selectedQuarter = quarterSelect.value;
            const selectedMonth = monthSelect.value;
            const selectedWeek = weekSelect.value;

            // // Redirect to the same page with updated query parameters
            // window.location.href = `map.php?disease=${selectedDisease}&year=${selectedYear}`;

            // Filter the data based on the month and week
            for (let i = 0; i < locationData.length; i++) {
                filteredData = [];
                const item = locationData[i];
                // console.log(item);
                const creationDate = new Date(item.creationDate);
                const month = creationDate.getMonth() + 1;
                // console.log("month", month);
                const date = creationDate.getDate();
                // console.log("date", date);

                let dateConverted;
                let monthConverted;

                dateConverted = dateConversion(date, dateConverted);
                monthConverted = monthConversion(month, monthConverted);

                const isQuarterlySelection = selectedQuarter === monthConverted;
                const isMonthlySelection =
                    selectedQuarter === 0 && selectedMonth === month && selectedWeek === 0;
                const isMonthlyAndWeeklySelection =
                    selectedMonth === month && selectedWeek === dateConverted;
                const isAll =
                    selectedQuarter === 0 && selectedMonth === 0 && selectedWeek === 0;

                if (
                    isQuarterlySelection ||
                    isMonthlySelection ||
                    isMonthlyAndWeeklySelection
                ) {
                    filteredData.push(item);
                } else {
                    useFilteredData = true;
                }

                if (isAll) {
                    useFilteredData = false;
                }
            }


            // Construct the URL with updated query parameters
            const baseUrl = 'map.php';
            const queryParams = new URLSearchParams({
                disease: selectedDisease,
                year: selectedYear,
                quarter: selectedQuarter,
                month: selectedMonth,
                week: selectedWeek
            });

            // Redirect to the same page with updated query parameters
            window.location.href = `${baseUrl}?${queryParams.toString()}`;

            // console.log("filteredData", Object.values(filteredData));

            // Clear previous heatmap
            if (heatmap) {
                heatmap.setMap(null);
            }
            initMap();
        }
        initMap();
    </script>
</body>

</html>