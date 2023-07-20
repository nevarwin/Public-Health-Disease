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
    <script src="./js/map.js"></script>
    <div class="col">
        <label>Select Color Vision Deficiency Type:</label>
        <select id="color-deficiency" class="custom-select" onchange="changeGradientColor()">
            <option value="default">Default</option>
            <option value="deuteranomaly">Deuteranomaly</option>
            <option value="protanomaly">Protanomaly</option>
            <option value="tritanomaly">Tritanomaly</option>
        </select>
    </div>
    <div id="map"></div>
</body>

</html>