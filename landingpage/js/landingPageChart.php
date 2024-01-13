<?php
// PHP for the line and pie chart
// '../components/connection.php' for the landingpage/landingPage.php
// for the login.php
require_once('../components/connection.php');
// require '../components/alertMessage.php';
$piePatientCount = 0;
$pieJsonData = 0;
$totalCount = 0;
$pieDiseaseMode = True;

echo '<script>var selectedDisease; </script>';
echo '<script>var diseaseTitle; </script>';
echo '<script>var pieDiseaseMode;</script>';
echo '<script>var defaultGradient = [];</script>';

// GETTER for the form 
if (isset($_GET['pieDisease']) && $_GET['pieMun'] == '' && $_GET['pieDisease'] != '') {

  // echo 'first if statement';

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

  echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';

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

  //
  //
  // H E A T M A P   L O G I C
  //
  //
  $query = "SELECT latitude, longitude, creationDate, age FROM patients";

  if (!empty($pieSelectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease'";
  }

  if (!empty($pieSelectedDisease) && !empty($pieSelectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease' AND YEAR(creationDate) = $pieSelectedYear";
  }

  $result = mysqli_query($con, $query);
  // TODO
  if (mysqli_num_rows($result) == 0) {
    $errorMessage = "No data found for the selected municipality.";
    $type = 'warning';
    $strongContent = 'Oh no!';
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
      'lng' => floatval($row['longitude']),
      'creationDate' => $row['creationDate'],
      'age' => $row['age'],
    ];
  }

  echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';

  heatmapGradient($pieSelectedDisease);


  // age line chart
  $countQuery = "SELECT COUNT(*) AS patientCount, YEAR(creationDate) AS creationYear, age
            FROM patients 
            WHERE disease = $pieSelectedDisease AND YEAR(creationDate) = $pieSelectedYear
            GROUP BY age";

  $countResult = mysqli_query($con, $countQuery);

  $data = array();
  while ($row = $countResult->fetch_assoc()) {
    $year = $row['age'];
    $count = $row['patientCount'];
    $data[$year] = $count;
  }

  // Encode the PHP array as JSON
  $ageJsonData = json_encode($data);

  // Echo the JSON data inside a JavaScript block
  echo '<script>var selectedDisease = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var jsonData = ' . $ageJsonData . ';</script>';
  echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';
}

// For the municipality dropdown logic without the disease
else if (isset($_GET['pieMun']) && $_GET['pieDisease'] == '') {
  $pieDiseaseMode = false;

  $pieSelectedYear = $_GET['pieYear'];
  $pieSelectedMun = $_GET['pieMun'];

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

  while ($row = $countResult->fetch_assoc()) {
    $disease = $row['disease'];
    $municipality = $row['municipality'];
    $count = $row['diseaseCount'];

    // Store the disease count for the selected municipality
    $data[$disease] = $count;

    echo "Disease: $disease, Count: $count, Municipality: $municipality <br>";
  }

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

  // echo '<script>pieDiseaseMode =' . var_export($pieDiseaseMode, true) . ';</script>';

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

  //
  //
  // H E A T M A P   L O G I C
  //
  //
  $query = "SELECT latitude, longitude, creationDate, age FROM patients";

  if (!empty($pieSelectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease'";
  }

  if (!empty($pieSelectedDisease) && !empty($pieSelectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease' AND YEAR(creationDate) = $pieSelectedYear";
  }

  $result = mysqli_query($con, $query);
  // TODO
  if (mysqli_num_rows($result) == 0) {
    $errorMessage = "No data found for the selected municipality.";
    $type = 'warning';
    $strongContent = 'Oh no!';
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
      'lng' => floatval($row['longitude']),
      'creationDate' => $row['creationDate'],
      'age' => $row['age'],
    ];
  }

  echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';
  heatmapGradient($pieSelectedDisease);
}

// For the municipality dropdown logic that displays the barangay
else if (isset($_GET['pieMun']) && $_GET['pieDisease'] != '') {
  $pieSelectedYear = $_GET['pieYear'];
  $pieSelectedMun = $_GET['pieMun'];
  $pieSelectedDisease = $_GET['pieDisease'];
  // echo 'else if statement displays barangay <br>';

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

  // echo $pieSelectedDisease . ' -pieselecteddisease in linechart <br>';

  // Echo the JSON data inside a JavaScript block
  echo '<script>var diseaseTitle = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var lineJsonData = ' . $lineJsonData . ';</script>';

  // Start of PIE CHART Logic and query
  // to show if 'true' or 'false'
  $pieDiseaseMode = '';
  // echo var_export($pieDiseaseMode) . "<br>";

  // echo 'pieMun <br>';

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
  // if (mysqli_num_rows($countResult) == 0) {
  //   $errorMessage = "No data found for the selected municipality.";
  //   $type = 'warning';
  //   $strongContent = 'Oh no!';
  //   $alert = generateAlert($type, $strongContent, $errorMessage);
  // } else {
  while ($row = $countResult->fetch_assoc()) {
    $disease = $row['disease'];
    $barangay = $row['barangay'];
    $municipality = $row['municipality'];
    $count = $row['diseaseCount'];

    // Store the disease count for the selected municipality
    $data[$barangay] = $count;

    // echo "Disease: $disease, Count: $count, Municipality: $municipality, Barangay: $barangay <br>";
  }
  // }

  // // Display the disease counts for the selected municipality
  // echo "<br> Disease Counts for $pieSelectedMun: <br>";
  // foreach ($data as $disease => $count) {
  //     echo "$disease: $count <br>";
  // }
  // echo 'below is vardump data <br>';
  // var_dump($data);

  // Encode the PHP variable as JSON before using it in Javascript
  $encodedSelectedMun = json_encode($pieSelectedMun);
  // echo  '<br>' . $encodedSelectedMun . ' encodedselectedmun';

  // Echo the JSON data inside a JavaScript block
  echo "<script>selectedDisease = $encodedSelectedMun;</script>";
  echo "<script>var pieSelectedYear = $pieSelectedYear;</script>";
  echo "<script>var pieJsonData = $pieJsonData;</script>";

  // Echo the municipality and cases as JavaScript variables
  echo '<script>';
  echo 'var municipalities = ' . json_encode(array_keys($data)) . ';';
  echo 'var cases = ' . json_encode(array_values($data)) . ';';
  echo '</script>';

  // echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';

  // echo '<script>pieDiseaseMode =' . var_export($pieDiseaseMode, true) . ';</script>';

  //
  //
  // H E A T M A P   L O G I C
  //
  //
  $query = "SELECT latitude, longitude, creationDate, age FROM patients";

  if (!empty($pieSelectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease'";
  }

  if (!empty($pieSelectedDisease) && !empty($pieSelectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude, creationDate, age FROM patients WHERE disease = '$pieSelectedDisease' AND YEAR(creationDate) = $pieSelectedYear";
  }

  $result = mysqli_query($con, $query);

  // Fetch the data and convert it to JSON
  $locationData = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $locationData[] = [
      'lat' => floatval($row['latitude']),
      'lng' => floatval($row['longitude']),
      'creationDate' => $row['creationDate'],
      'age' => $row['age'],
    ];
  }

  echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';
  heatmapGradient($pieSelectedDisease);

  // age line chart
  $countQuery = "SELECT COUNT(*) AS patientCount, YEAR(creationDate) AS creationYear, age
            FROM patients 
            WHERE disease = $pieSelectedDisease AND YEAR(creationDate) = $pieSelectedYear
            GROUP BY age";

  $countResult = mysqli_query($con, $countQuery);

  $data = array();
  while ($row = $countResult->fetch_assoc()) {
    $year = $row['age'];
    $count = $row['patientCount'];
    $data[$year] = $count;
  }

  // Encode the PHP array as JSON
  $ageJsonData = json_encode($data);

  // Echo the JSON data inside a JavaScript block
  echo '<script>var selectedDisease = ' . $pieSelectedDisease . ';</script>';
  echo '<script>var jsonData = ' . $ageJsonData . ';</script>';
  echo '<script>pieDiseaseMode =' . $pieDiseaseMode . ';</script>';
}

// For smooth scrolling after the submit button is clicked
if (isset($_GET['pieDisease']) > 0) {
  echo '
    <script>
          window.location.href = "#Heatmap";
    </script>';
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

// for the municipality dropdown
$municipality = ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"];

$municipalityOption = '';
$selectedMunicipality = $_GET['pieMun'] ?? '';

foreach ($municipality as $municipal) {
  $selected = ($municipal == $selectedMunicipality) ? 'selected' : '';
  $municipalityOption .= "<option value=\"$municipal\" $selected>$municipal</option>";
}
?>

<?php
function heatmapGradient($pieSelectedDisease) {
  // echo $pieSelectedDisease;
  switch ($pieSelectedDisease) {
    case 1:
    case 7:
    case 8:
    case 12:
    case 16:
    case 17:
    case 18:
    case 19:
    case 20:
      // code... (default case)
      // echo 'warm';
      echo " 
      <script>
      const warmColors = [
          'rgba(0, 0, 0, 0)',

          'rgba(144, 238, 144, 1)',
          'rgba(0, 128, 0, 1)',
          'rgba(0, 100, 0, 1)',

          'rgba(255, 255, 153, 1)',
          'rgba(255, 255, 0, 1)',
          'rgba(184, 134, 11, 1)',
          
          'rgba(255, 128, 128, 1)',
          'rgba(255, 0, 0, 1)',
          'rgba(139, 0, 0, 1)',

          'rgba(0, 0, 0, 1)',
          ];
          
          defaultGradient = warmColors;
          var isWarm = true;
      </script>
    ";
      break;
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 9:
    case 10:
    case 11:
    case 13:
    case 14:
    case 15:
    case 21:
      // code... (cool case)
      // echo 'cool';
      echo "
          <script>
          const coolColors = [
            'rgba(0, 0, 0, 0)',
            // Teal Shades
            'rgba(0, 128, 128, 1)',     // Dark Teal
            'rgba(0, 128, 128, 1)',     // Medium Teal
            'rgba(0, 206, 209, 1)',     // Light Teal
            
            // Purple Shades
            'rgba(128, 0, 128, 1)',     // Dark Purple
            'rgba(148, 0, 211, 1)',     // Medium Purple
            'rgba(218, 112, 214, 1)',   // Light Purple
            
            'rgba(173, 216, 230, 1)',   // Light Blue
            'rgba(0, 0, 255, 1)',       // Medium Blue
            'rgba(0, 0, 128, 1)',       // Dark Blue
            'rgba(0, 0, 0, 1)',
            ];

            defaultGradient = coolColors;
            var gradientColors = 'blue, purple, teal';
            var isWarm = false;
          </script>
          ";
      break;
    default:
      echo " <script>
            const warmColors = [
                'rgba(0, 0, 0, 0)',
                'rgba(255, 128, 128, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(139, 0, 0, 1)',
                'rgba(255, 255, 153, 1)',
                'rgba(255, 255, 0, 1)',
                'rgba(184, 134, 11, 1)',
                'rgba(144, 238, 144, 1)',
                'rgba(0, 128, 0, 1)',
                'rgba(0, 100, 0, 1)',
                'rgba(0, 0, 0, 1)',
                ];
            defaultGradient = warmColors;
            var isWarm = true;
            </script>
            ";
      break;
  }
}
?>