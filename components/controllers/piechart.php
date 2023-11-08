<?php
require "components/connection.php";
require "components/alertMessage.php";
require "components/adminBarangayScript.php";

$piePatientCount = 0;
$pieJsonData = 0;
$totalCount = 0;
$pieDiseaseMode = True;

echo '<script>var selectedDisease; </script>';
echo '<script>var pieDiseaseMode;</script>';

if (isset($_GET['pieDisease']) && $_GET['pieMun'] == '' && $_GET['pieDisease'] != '') {
  // echo 'if statement';

  $pieDiseaseMode = true;

  // echo $pieDiseaseMode . '<br>';

  $pieSelectedDisease = $_GET['pieDisease'];
  $pieSelectedYear = $_GET['pieYear'];

  $pieCountQuery = "SELECT municipality, 
            COUNT(*) AS piePatientCount 
            FROM patients 
            WHERE disease = $pieSelectedDisease 
            AND YEAR(creationDate) = $pieSelectedYear
            GROUP BY municipality";

  $countResult = mysqli_query($con, $pieCountQuery);

  $data = array();
  if (mysqli_num_rows($countResult) == 0) {
    $errorMessage = "No data found for the selected disease.";
    $type = 'warning';
    $strongContent = 'Oh no!';
    $alert = generateAlert($type, $strongContent, $errorMessage);
  } else {
    while ($row = $countResult->fetch_assoc()) {
      $municipality = $row['municipality'];
      $count = $row['piePatientCount'];
      $data[$municipality] = $count;
      $totalCount += $count; // Increment the total count
    }
  }
  // Encode the PHP array as JSON
  $pieJsonData = json_encode($data);

  // Echo the JSON data inside a JavaScript block
  echo '<script>var selectedDisease = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var pieSelectedYear = ' . $pieSelectedYear . ';</script>';
  echo '<script>var pieJsonData = ' . $pieJsonData . ';</script>';

  // Echo the municipality and cases as JavaScript variables
  echo '<script>';
  echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
  echo 'var cases = ' . json_encode(array_values($data)) . ';';
  echo '</script>';

  echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';

  // // Display the municipalities, their counts, and the total count
  // echo '<ul>';
  // foreach ($data as $municipality => $count) {
  //     echo '<li>' . $municipality . ': ' . $count . '</li>';
  // }
  // echo '</ul>';
}

// For the municipality dropdown logic without the disease
else if (isset($_GET['pieMun']) && $_GET['pieDisease'] == '') {
  // echo '1st else if statement <br>';

  // to show if 'true' or 'false'
  // echo var_export($pieDiseaseMode);
  $pieDiseaseMode = false;

  // echo 'pieMun <br>';

  $pieSelectedYear = $_GET['pieYear'];
  $pieSelectedMun = $_GET['pieMun'];

  // echo (gettype($pieSelectedMun) . '<br>');

  // Selecting the counts of cases per disease in selected municipality
  $diseaseCountQuery = "SELECT p.disease, p.municipality, COUNT(*) AS diseaseCount 
                FROM patients p
                JOIN municipality m ON p.municipality = m.munId
                WHERE m.municipality = '$pieSelectedMun'
                AND YEAR(p.creationDate) = $pieSelectedYear
                GROUP BY p.disease;";

  $countResult = mysqli_query($con, $diseaseCountQuery);

  // Check if there is an error in the query
  if (!$countResult) {
    die("Error in the query: " . mysqli_error($con));
  }

  $data = array();
  $municipality;

  // Check if the query has returned any rows
  if (mysqli_num_rows($countResult) == 0) {
    $errorMessage = "No data found for the selected municipality.";
    $type = 'warning';
    $strongContent = 'Oh no!';
    $alert = generateAlert($type, $strongContent, $errorMessage);
  } else {
    while ($row = $countResult->fetch_assoc()) {
      $disease = $row['disease'];
      $municipality = $row['municipality'];
      $count = $row['diseaseCount'];

      // Store the disease count for the selected municipality
      $data[$disease] = $count;

      // echo "Disease: $disease, Count: $count, Municipality: $municipality <br>";
    }
  }

  // // Display the disease counts for the selected municipality
  // echo "<br> Disease Counts for $pieSelectedMun: <br>";
  // foreach ($data as $disease => $count) {
  //     echo "$disease: $count <br>";
  // }

  // Encode the PHP variable as JSON before using it in JavaScript
  $encodedSelectedMun = json_encode($pieSelectedMun);

  // Echo the JSON data inside a JavaScript block
  echo '<script>selectedDisease = ' . $encodedSelectedMun . ';</script>';
  echo '<script>var pieSelectedYear = ' . $pieSelectedYear . ';</script>';
  echo '<script>var pieJsonData = ' . $pieJsonData . ';</script>';

  // Echo the municipality and cases as JavaScript variables
  echo '<script>';
  echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
  echo 'var cases = ' . json_encode(array_values($data)) . ';';
  echo '</script>';

  echo '<script>pieDiseaseMode =' . var_export($pieDiseaseMode, true) . ';</script>';
}

// For the municipality dropdown logic that displays the barangay
else if (isset($_GET['pieMun']) && $_GET['pieDisease'] != '') {
  // echo '2nd else if statement <br>';

  // to show if 'true' or 'false'
  // echo '150 <br>';
  $pieDiseaseMode = false;
  // echo var_export($pieDiseaseMode);

  // echo 'pieMun <br>';

  $pieSelectedYear = $_GET['pieYear'];
  $pieSelectedMun = $_GET['pieMun'];
  $pieSelectedDisease = $_GET['pieDisease'];

  // echo (gettype($pieSelectedMun) . '<br>');

  // Selecting the counts of cases per disease in selected municipality
  $diseaseCountQuery = "SELECT
    p.disease,
    p.municipality,
    b.barangay,
    COUNT(*) AS diseaseCount
    FROM
        patients p
    JOIN municipality m ON
        p.municipality = m.munId
    JOIN barangay b ON
        p.barangay = b.id
    WHERE
        m.municipality = '$pieSelectedMun' 
    AND 
        YEAR(p.creationDate) = $pieSelectedYear 
    AND 
        p.disease = $pieSelectedDisease
    GROUP BY
        p.disease,
        p.municipality,
        p.barangay;";

  $countResult = mysqli_query($con, $diseaseCountQuery);

  // Check if there is an error in the query
  if (!$countResult) {
    die("Error in the query: " . mysqli_error($con));
  }

  $data = array();
  $municipality;


  // Check if the query has returned any rows
  if (mysqli_num_rows($countResult) == 0) {
    $errorMessage = "No data found for the selected municipality.";
    $type = 'warning';
    $strongContent = 'Oh no!';
    $alert = generateAlert($type, $strongContent, $errorMessage);
  } else {
    while ($row = $countResult->fetch_assoc()) {
      $disease = $row['disease'];
      $barangay = $row['barangay'];
      $municipality = $row['municipality'];
      $count = $row['diseaseCount'];

      // Store the disease count for the selected municipality
      $data[$barangay] = $count;

      // echo "Disease: $disease, Count: $count, Municipality: $municipality, Barangay: $barangay <br>";
    }
  }

  // // Display the disease counts for the selected municipality
  // echo "<br> Disease Counts for $pieSelectedMun: <br>";
  // foreach ($data as $disease => $count) {
  //     echo "$disease: $count <br>";
  // }

  // var_dump($data);

  // Encode the PHP variable as JSON before using it in Javascript
  $encodedSelectedMun = json_encode($pieSelectedMun);

  // Echo the JSON data inside a JavaScript block
  echo "<script>selectedDisease = $encodedSelectedMun;</script>";
  echo "<script>var pieSelectedYear = $pieSelectedYear;</script>";
  echo "<script>var pieJsonData = $pieJsonData;</script>";

  // Echo the municipality and cases as JavaScript variables
  echo '<script>';
  echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
  echo 'var cases = ' . json_encode(array_values($data)) . ';';
  echo '</script>';

  // echo '<script>pieDiseaseMode =' . var_export($pieDiseaseMode, true) . ';</script>';
}

// Select query for all available creation date in patients table
$pieYearQuery = "SELECT DISTINCT YEAR(creationDate) AS year FROM patients ORDER BY year ASC";
$pieYearResult = mysqli_query($con, $pieYearQuery);

// creating html option tag with value base on the result
$options = '';
while ($row = mysqli_fetch_assoc($pieYearResult)) {
  $year = $row['year'];
  $pieSelectedYear = $_GET['pieYear'] ?? '';
  $selected = ($year == $pieSelectedYear) ? 'selected' : '';
  $options .= "<option value=\"$year\" $selected>$year</option>";
}

// for the municipality dropdown
$municipality = ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"];

$municipalityOption = '';
$selectedMunicipality = $_GET['pieMun'] ?? '';

foreach ($municipality as $municipal) {
  $selected = ($municipal == $selectedMunicipality) ? 'selected' : '';
  $municipalityOption .= "<option value=\"$municipal\" $selected>$municipal</option>";
}

require './components/views/piechart.view.php';
