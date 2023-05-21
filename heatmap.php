<?php
// Replace with your database connection code
include('./components/connection.php');

// Fetch all rows from the "patients" table
$query = "SELECT patients.*, barangay.barangay, municipality.municipality, diseases.disease 
          FROM patients
          LEFT JOIN barangay ON patients.barangay = barangay.id
          LEFT JOIN municipality ON patients.municipality = municipality.munId
          LEFT JOIN diseases ON patients.disease = diseases.diseaseId";
$result = mysqli_query($con, $query);

// Fetch the data and convert it to JSON
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Heatmap Example</title>
    <style>
        #map {
            height: 50%;
            width: 100%;
        }
    </style>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=places&callback=loadGoogleMapsAPI&v=weekly" async></script> -->
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })
        ({
            key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg",
            v: "weekly"
        });
    </script>
</head>

<body>
    <div id="map"></div>

    <script>
        let map;
        let heatmap;
        let heatmapData = [];

        // Heatmap
        function initializeGeocoding(address, name, disease) {
            return new Promise((resolve, reject) => {
                // Create a Geocoder instance
                const geocoder = new google.maps.Geocoder();

                // Geocode the address
                geocoder.geocode({
                    address: address
                }, (results, status) => {
                    if (status === "OK") {
                        // Get the latitude and longitude
                        const location = results[0].geometry.location;
                        const latitude = location.lat();
                        const longitude = location.lng();

                        console.log(latitude);
                        console.log(longitude);

                        // Create a LatLng object
                        const latLng = new google.maps.LatLng(latitude, longitude);

                        // Add the LatLng object to the heatmap data
                        heatmapData.push(latLng);

                        resolve();
                    } else {
                        reject(status);
                    }
                });
            });
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 14.2180912010889,
                    lng: 120.86307689036485
                },
                zoom: 10
            });

            // Process the fetched data
            const data = <?php echo json_encode($data); ?>;

            data.forEach(row => {
                const address = row.barangay + ', ' + row.municipality + ', ' + row.postalCode + 'Cavite';
                const name = row.firstName;
                const disease = row.disease;
                initializeGeocoding(address, name, disease).then(() => {
                    console.log('Geocoding successful');
                });
            });

            // Create a heatmap layer
            heatmap = new google.maps.visualization.HeatmapLayer({
                data: heatmapData,
                map: map,
            });
        }

        // Load Google Maps API and initialize the map
        window.initMap = initMap;
    </script>
</body>

</html>