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
    let successfulGeocoding = 0;
    let unsuccessfulGeocoding = 0;

    function initializeGeocoding(address, name, disease) {
      return new Promise((resolve, reject) => {
        const geocoder = new google.maps.Geocoder();

        geocoder.geocode({
          address: address
        }, (results, status) => {
          if (status === "OK") {
            const location = results[0].geometry.location;
            const latitude = location.lat();
            const longitude = location.lng();

            // console.log(`Name: ${name}`);
            // console.log(`Disease: ${disease}`);
            // console.log(`Latitude: ${latitude}`);
            // console.log(`Longitude: ${longitude}`);

            const latLng = new google.maps.LatLng(latitude, longitude);

            const marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: name
            });

            markers.push(marker);
            successfulGeocoding++;
            resolve();
          } else {
            console.error(`Geocoding failed for address: ${address}. Status: ${status}`);
            unsuccessfulGeocoding++;
            resolve();
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
        zoom: 10
      });

      const data = <?php echo json_encode($data); ?>;

      data.forEach(row => {
        const address = row.barangay + ', ' + row.municipality + ', ' + row.postalCode + ' Cavite';
        console.log(row.patientId);
        console.log(address);
        const name = row.patientId;
        const disease = row.disease;

        initializeGeocoding(address, name, disease).then(() => {
          console.log('Geocoding complete');
          console.log(`Successful geocoding: ${successfulGeocoding}`);
          console.log(`Unsuccessful geocoding: ${unsuccessfulGeocoding}`);
        });
      });
    }
  </script>
</body>

</html>