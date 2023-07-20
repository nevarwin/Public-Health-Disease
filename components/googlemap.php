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

$query = "SELECT latitude, longitude FROM patients";

if (!empty($selectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude FROM patients WHERE disease = '$selectedDisease'";
}

if (!empty($selectedDisease) && !empty($selectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude FROM patients WHERE disease = '$selectedDisease' AND YEAR(creationDate) = $selectedYear";
}

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
    $message = "No records found!";
    $type = 'warning';
    $strongContent = 'Holy guacamole!';
    $alert = generateAlert($type, $strongContent, $message);
}

// Fetch the data and convert it to JSON
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'lat' => floatval($row['latitude']),
        'lng' => floatval($row['longitude'])
    ];
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=visualization"></script>
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
                $pieDropdown = [
                    1 => 'Amebiasis',
                    2 => 'Adverse Event Following Immunization',
                    3 => 'Acute encephalitis syndrome',
                    4 => 'Alpha-Fetoprotein',
                    5 => 'Acute Meningitis',
                    6 => 'ChikV',
                    7 => 'Diphtheria',
                    8 => 'Hand, Foot, and Mouth Disease',
                    9 => 'Number Needed to Treat',
                    10 => 'Neonatal Tetanus',
                    11 => 'Perthes Disease',
                    12 => 'Influenza',
                    13 => 'Dengue',
                    14 => 'Rabies',
                    15 => 'Cholera',
                    16 => 'Hepatitis',
                    17 => 'Measles',
                    18 => 'Meningitis',
                    19 => 'Meningo',
                    20 => 'Typhoid',
                    21 => 'Leptospirosis',
                ];
                ?>
                <?php foreach ($pieDropdown as $key => $disease) : ?>
                    <option value="<?php echo $key; ?>" <?php echo $key == $selectedDisease ? 'selected' : ''; ?>><?php echo $disease; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label for="year">Select Year:</label>
            <select name="year" id="year" class="custom-select">
                <option value="">All</option>
                <?php foreach ($years as $year) : ?>
                    <option value="<?php echo $year; ?>" <?php echo $year == $selectedYear ? 'selected' : ''; ?>><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label>Select Color Vision Deficiency Type:</label>
            <select id="color-deficiency" class="custom-select" onchange="changeGradientColor()">
                <option value="default">Default</option>
                <option value="deuteranomaly">Deuteranomaly</option>
                <option value="protanomaly">Protanomaly</option>
                <option value="tritanomaly">Tritanomaly</option>
            </select>
        </div>
    </div>

    <div id="map"></div>

    <script>
        let map;
        let heatmap;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 14.278023306102497,
                    lng: 120.88505851514495
                },
                zoom: 11,
                mapTypeId: "satellite",

            });

            const data = <?php echo json_encode($data); ?>;

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: data.map(item => new google.maps.LatLng(item.lat, item.lng)),
                map: map,
                radius: 20,
            });
        }
        const deuteranomalyColors = [
            'rgba(255, 0, 0, 0)',
            "rgba(255, 136, 0, 1)", // Orange
            "rgba(0, 221, 0, 1)", // Light green
            "rgba(0, 0, 255, 1)", // Blue
            'rgba(255, 0, 0, 1)'

        ];
        const protanomalyColors = [
            'rgba(255, 0, 0, 0)',
            "rgba(255, 187, 0, 1)", // Yellow
            "rgba(0, 238, 0, 1)", // Lime green
            "rgba(0, 0, 255, 1)", // Blue
            'rgba(255, 0, 0, 1)'
        ];
        const tritanomalyColors = [
            'rgba(255, 0, 0, 0)',
            "rgba(255, 0, 0, 1)", // Red
            "rgba(0, 255, 204, 1)", // Light turquoise
            "rgba(0, 0, 255, 1)", // Blue
            'rgba(255, 0, 0, 1)'
        ];
        const
            defaultColors = [
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
                console.log('trita');
                heatmap.set("gradient", heatmap.get("gradient") ? null : defaultColors);
            }
        }

        // Handle changes in the dropdown menus
        const diseaseSelect = document.getElementById('disease');
        const yearSelect = document.getElementById('year');

        diseaseSelect.addEventListener('change', updateHeatmap);
        yearSelect.addEventListener('change', updateHeatmap);

        function updateHeatmap() {
            const selectedDisease = diseaseSelect.value;
            const selectedYear = yearSelect.value;

            // Redirect to the same page with updated query parameters
            window.location.href = `map.php?disease=${selectedDisease}&year=${selectedYear}`;
        }

        initMap();
    </script>
</body>

</html>