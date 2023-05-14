<!DOCTYPE html>
<html>

<head>
  <title>Geocoding Example</title>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGlIP94SkG0lgQw2Hc7OOGhrZosODfQ1E&libraries=places&callback=loadGoogleMapsAPI" async defer></script>
  <script>
    let map;
    let markers = [];

    function initializeGeocoding(address, name) {
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

      <?php
      // Replace with your database connection code
      include('./components/connection.php');

      // Fetch all rows from the "patients" table
      $query = "SELECT patients.*, barangay.barangay, municipality.municipality 
                FROM patients
                LEFT JOIN barangay ON patients.barangay = barangay.id
                LEFT JOIN municipality ON patients.municipality = municipality.munId";
      $result = mysqli_query($con, $query);

      // Iterate over each row
      while ($row = mysqli_fetch_assoc($result)) {
        // Build the address string for each row
        $address = $row['barangay'] . ', ' . $row['municipality'] . ', ' . $row['address'] . 'Cavite';
        $name = $row['name'];
        initializeGeocoding($address, $name)
          . then(function () {
            console . log('Geocoding successful');
          });
      }
      ?>
    }
  </script>
</head>

<body>
  <div id="map"></div>
</body>

</html>