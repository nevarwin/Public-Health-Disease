<?php
// Replace with your database connection code
include('../components/connection.php');

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
<style>
    #map {
        height: 100%;
        width: 100%;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=visualization"></script>


<body>
    <div class="maps">
        <div id="map"></div>
    </div>

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
                map: map
            });
        }

        // // Handle changes in the dropdown menus
        // const diseaseSelect = document.getElementById('disease');
        // const yearSelect = document.getElementById('year');

        // diseaseSelect.addEventListener('change', updateHeatmap);
        // yearSelect.addEventListener('change', updateHeatmap);

        // function updateHeatmap() {
        //     const selectedDisease = diseaseSelect.value;
        //     const selectedYear = yearSelect.value;

        //     // Redirect to the same page with updated query parameters
        //     window.location.href = `map.php?disease=${selectedDisease}&year=${selectedYear}`;
        // }

        initMap();
    </script>
</body>

</html>