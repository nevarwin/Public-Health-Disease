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
  <title>Geocoding Example</title>
  <style>
    #map {
      height: 90vh;
      width: 100%;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=places&callback=loadGoogleMapsAPI" async defer></script>
</head>

<body>
  <div id="map"></div>

  <script>
    let map;
    let markers = [];
    let heatmapData = [];

    // Markers
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

            // Print latitude and longitude
            console.log(`Name: ${name}`);
            console.log(`Disease: ${disease}`);
            console.log(`Latitude: ${latitude}`);
            console.log(`Longitude: ${longitude}`);

            // Create a LatLng object
            const latLng = new google.maps.LatLng(latitude, longitude);

            // Create a marker and set its position
            const marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: name
            });

            // Add the marker to the markers array
            markers.push(marker);

            resolve();
          } else {
            reject(status);
          }
        });
      });
    }

    function loadGoogleMapsAPI() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: 14.2180912010889,
          lng: 120.86307689036485
        },
        zoom: 8
      });

      // Process the fetched data
      const data = <?php echo json_encode($data); ?>;
      const latitudes = [];

      data.forEach(row => {
        const address = row.barangay + ', ' + row.municipality + ', ' + row.postalCode + 'Cavite';
        const name = row.firstName;
        const disease = row.disease;
        initializeGeocoding(address, name, disease).then(() => {
          console.log('Geocoding successful');
        });

        // Add latitude to the latitudes array
        latitudes.push(row.latitude);
      });

      // Log the latitudes array
      console.log('Latitudes:', latitudes);
    }
  </script>
</body>

</html>