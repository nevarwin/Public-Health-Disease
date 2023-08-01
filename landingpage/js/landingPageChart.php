<?php
// PHP for the line and pie chart
include('../components/connection.php');
// require '../components/alertMessage.php';

$piePatientCount = 0;
$pieJsonData = 0;
$totalCount = 0;

// GETTER for the form 
if (isset($_GET['pieDisease'])) {
  $pieSelectedDisease = $_GET['pieDisease'];
  $pieSelectedYear = $_GET['pieYear'];
  // echo "Selected Disease: $pieSelectedDisease<br>";
  // echo "Selected Year: $pieSelectedYear<br>";

  // Query for the pie chart
  $pieCountQuery = "SELECT municipality, 
            COUNT(*) AS piePatientCount 
            FROM patients 
            WHERE disease = $pieSelectedDisease 
            AND YEAR(creationDate) = $pieSelectedYear
            GROUP BY municipality";

  $countResult = mysqli_query($con, $pieCountQuery);

  $data = array();
  while ($row = $countResult->fetch_assoc()) {
    $municipality = $row['municipality'];
    $count = $row['piePatientCount'];
    $data[$municipality] = $count;
    $totalCount += $count; // Increment the total count
  }
  // Encode the PHP array as JSON
  $pieJsonData = json_encode($data);

  // Echo the JSON data inside a JavaScript block
  echo '<script>var pieSelectedDisease = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var pieSelectedYear = ' . $pieSelectedYear . ';</script>';
  echo '<script>var pieJsonData = ' . $pieJsonData . ';</script>';

  // Echo the municipality and cases as JavaScript variables
  echo '<script>';
  echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
  echo 'var cases = ' . json_encode(array_values($data)) . ';';
  echo '</script>';

  // Query for the line chart
  $countQuery = "SELECT COUNT(*) AS patientCount, YEAR(creationDate) AS creationYear 
              FROM patients 
              WHERE disease = $pieSelectedDisease 
              GROUP BY YEAR(creationDate)";

  $countResult = mysqli_query($con, $countQuery);

  $data = array();
  while ($row = $countResult->fetch_assoc()) {
    $year = $row['creationYear'];
    $count = $row['patientCount'];
    $data[$year] = $count;
  }

  // Encode the PHP array as JSON
  $lineJsonData = json_encode($data);

  // Echo the JSON data inside a JavaScript block
  echo '<script>var selectedDisease = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var lineJsonData = ' . $lineJsonData . ';</script>';

  if ($totalCount > 0) {
    echo '<script>
    window.onload = function() {
      const scrollTarget = document.getElementById("scroll-target");
      const scrollOptions = {
        behavior: "smooth",
        block: "start",
        inline: "nearest"
      };
      setTimeout(function() {
        scrollTarget.scrollIntoView(scrollOptions);
      }, 300);
    }
  </script>';
  }

  // heatmap
  $query = "SELECT latitude, longitude FROM patients";

  if (!empty($pieSelectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude FROM patients WHERE disease = '$pieSelectedDisease'";
  }

  if (!empty($pieSelectedDisease) && !empty($pieSelectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude FROM patients WHERE disease = '$pieSelectedDisease' AND YEAR(creationDate) = $pieSelectedYear";
  }

  $result = mysqli_query($con, $query);
  // TODO
  if (mysqli_num_rows($result) == 0) {
    $errorMessage = "No data found for the selected municipality.";
    $type = 'warning';
    $strongContent = 'Holy guacamole!';
    // $alert = generateAlert($type, $strongContent, $errorMessage);
    // echo "no records";
    // if (!empty($errorMessage)) {
    //   echo $alert;
    // }
  }

  // Fetch the data and convert it to JSON
  $locationData = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $locationData[] = [
      'lat' => floatval($row['latitude']),
      'lng' => floatval($row['longitude'])
    ];
  }

  echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';
}

// Select query for all available creation date in patients table
$pieYearQuery = "SELECT DISTINCT YEAR(creationDate) AS year FROM patients ORDER BY year ASC";
$pieYearResult = mysqli_query($con, $pieYearQuery);

if (!$pieYearResult) {
  echo ("Error executing the query: " . mysqli_error($con));
}

$options = '';
// creating html option tag with value base on the result
while ($row = mysqli_fetch_assoc($pieYearResult)) {
  $year = $row['year'];
  $pieSelectedYear = $_GET['pieYear'] ?? '';
  $selected = ($year == $pieSelectedYear) ? 'selected' : '';
  $options .= "<option value=\"$year\" $selected>$year</option>";
}
