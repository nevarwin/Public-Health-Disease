<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Public Health Disease Geomapping</title>
    <link rel="shortcut icon" href="../assets/img/caviteLogo.png" type="image/png">

    <!-- chart.js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- All CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=visualization&callback=initMap" async defer></script>
    <style>
        #map {
            height: 100%;
            width: 100%;
        }

        #colorGradient {
            height: 20px;
            background: linear-gradient(to right, red, yellow, green);
        }

        .label {
            display: inline-block;
            width: 50px;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <!-- <body> -->
    <div class="row py-2">
        <div class="col-auto d-flex align-items-center">
            <label for="color-deficiency">Select Color Vision Deficiency Type:</label>
        </div>
        <div class="col">
            <select id="color-deficiency" class="form-select form-select-md" onchange="changeGradientColor()">
                <option value="default">Default</option>
                <option value="deuteranomaly">Deuteranomaly</option>
                <option value="protanomaly">Protanomaly</option>
                <option value="tritanomaly">Tritanomaly</option>
            </select>
        </div>
    </div>
    <div id="map"></div>
    <script src="./js/map.js"></script>
</body>

</html>