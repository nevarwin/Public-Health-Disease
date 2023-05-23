<?php
// Replace with your database connection code
include('./components/connection.php');

// Fetch latitude and longitude from the "patients" table
$query = "SELECT latitude, longitude FROM patients";
$result = mysqli_query($con, $query);

// Fetch the data and convert it to JSON
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'lat' => floatval($row['latitude']),
        'lng' => floatval($row['longitude'])
    ];
}

// var_dump($data);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Heatmap Example</title>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=visualization"></script>
</head>

<body>
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
                zoom: 11
            });

            const data = <?php echo json_encode($data); ?>;

            heatmap = new google.maps.visualization.HeatmapLayer({
                data: data.map(item => new google.maps.LatLng(item.lat, item.lng)),
                map: map
            });
        }

        initMap();
    </script>
</body>

</html>