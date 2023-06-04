<?php
include("./js/landingPageChart.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=visualization&callback=initMap" async defer></script>
</head>

<body>
    <!-- <body> -->
    <div id="map"></div>
    <script src="./js/map.js"></script>
</body>

</html>