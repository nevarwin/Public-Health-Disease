<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="pragma" content="no-cache" />
    <title>Public Health Disease Geomapping</title>
    <link rel="shortcut icon" href="../assets/img/caviteLogo.png" type="image/png">

    <!-- chart.js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- $apiKey = 'AIzaSyBDCpppcL179vukeD8LAeMYSS-WamNfzgI'; -->

    <!-- All CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDCpppcL179vukeD8LAeMYSS-WamNfzgI&libraries=visualization&callback=initMap" async defer></script>
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
    <div class="row py-2">
        <div class="row">
            <div class="col text-center">
                <label for="quarter-selection">Select Quarterly:</label>
                <select id="quarter-selection" class="form-select form-select-md">
                    <option value="0">All</option>
                    <option value="1">First Quarter</option>
                    <option value="2">Second Quarter</option>
                    <option value="3">Third Quarter</option>
                    <option value="4">Fourth Quarter</option>
                </select>
            </div>
            <div class="col text-center">
                <label for="month-selection">Select Month:</label>
                <select id="month-selection" class="form-select form-select-md">
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
            <div class="col text-center">
                <label for="week-selection">Select Week:</label>
                <select id="week-selection" class="form-select form-select-md">
                    <option value="0">All</option>
                    <option value="1">Week 1</option>
                    <option value="2">Week 2</option>
                    <option value="3">Week 3</option>
                    <option value="4">Week 4</option>
                </select>
            </div>
            <div class="col text-center">
                <label for=""></label>
                <button onclick="applyFilter()" class="form-select form-select-md btn btn-primary">Apply Filter</button>
            </div>
        </div>
    </div>
    <div id="map"></div>
    <script src="js/map.js"></script>
</body>

</html>