<?php
// Replace with your database connection code
include('connection.php');
include('alertMessage.php');
include('adminBarangayScript.php');

$piePatientCount = 0;
$pieJsonData = 0;
$totalCount = 0;
$pieDiseaseMode = True;

echo '<script>var selectedDisease; </script>';
echo '<script>var pieDiseaseMode;</script>';

if (isset($_GET['pieDisease']) && $_GET['pieMun'] == '' && $_GET['pieDisease'] != '') {
  echo 'if statement';

  $pieDiseaseMode = true;

  echo $pieDiseaseMode . '<br>';

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
    $strongContent = 'Holy guacamole!';
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
  echo '1st else if statement <br>';

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
    $strongContent = 'Holy guacamole!';
    $alert = generateAlert($type, $strongContent, $errorMessage);
  } else {
    while ($row = $countResult->fetch_assoc()) {
      $disease = $row['disease'];
      $municipality = $row['municipality'];
      $count = $row['diseaseCount'];

      // Store the disease count for the selected municipality
      $data[$disease] = $count;

      echo "Disease: $disease, Count: $count, Municipality: $municipality <br>";
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
  echo '2nd else if statement <br>';

  // to show if 'true' or 'false'
  echo '150 <br>';
  $pieDiseaseMode = false;
  echo var_export($pieDiseaseMode);

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
    $strongContent = 'Holy guacamole!';
    $alert = generateAlert($type, $strongContent, $errorMessage);
  } else {
    while ($row = $countResult->fetch_assoc()) {
      $disease = $row['disease'];
      $barangay = $row['barangay'];
      $municipality = $row['municipality'];
      $count = $row['diseaseCount'];

      // Store the disease count for the selected municipality
      $data[$barangay] = $count;

      echo "Disease: $disease, Count: $count, Municipality: $municipality, Barangay: $barangay <br>";
    }
  }

  // // Display the disease counts for the selected municipality
  // echo "<br> Disease Counts for $pieSelectedMun: <br>";
  // foreach ($data as $disease => $count) {
  //     echo "$disease: $count <br>";
  // }

  var_dump($data);

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

?>
<?php
if (!empty($errorMessage)) {
  echo $alert;
}
?>
<div class="row">
  <form id="form2" class="col-12 p-0">
    <div class="row col-xl-12 col-lg-12 col-sm-12">
      <div class="dropdown col">
        <label for="disease">Select Disease:</label>
        <select class="custom-select" name="pieDisease">
          <option value="">Reset</option>
          <?php
          $pieDropdown = [
            1 => 'ABD',
            2 => 'AEFI',
            3 => 'AES',
            4 => 'AFP',
            5 => 'AMES',
            6 => 'ChikV',
            7 => 'DIPH',
            8 => 'HFMD',
            9 => 'NNT',
            10 => 'NT',
            11 => 'PERT',
            12 => 'Influenza',
            13 => 'Dengue',
            14 => 'Rabies',
            15 => 'Cholera',
            16 => 'Hepatitis',
            17 => 'Measles',
            18 => 'Meningitis',
            19 => 'Meningo',
            20 => 'Typhoid',
            21 => 'Leptospirosis',
          ];
          $pieSelectedDisease = $_GET['pieDisease'] ?? '';

          foreach ($pieDropdown as $key => $value) {
            $selected = ($key == $pieSelectedDisease) ? 'selected' : '';
            echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="dropdown col">
        <label>Select Year:</label>
        <select class="custom-select" name="pieYear">
          <?php echo $options; ?>
        </select>
      </div>
      <div class="dropdown col">
        <label>Select Municipality:</label>
        <select class="custom-select" name="pieMun">
          <option value="">Reset</option>
          <?php echo $municipalityOption; ?>
        </select>
      </div>
      <!-- <div class="dropdown col">
        <label>Municipality</label>
        <select class="custom-select" id="municipality" onchange="updateBarangays()" name="municipality">
          <option>Select Municipality</option>
          <?php
          // Connect to database and fetch municipalities
          include('connection.php');
          $result = mysqli_query($con, 'SELECT * FROM municipality');

          // Display each municipalities in a dropdown option
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['munId'] . '">' . $row['municipality'] . '</option>';
          }
          ?>
        </select>
      </div> -->
      <!-- Barangay Dropdown -->
      <!-- <div class="dropdown col">
        <label>Barangay</label>
        <select class="custom-select" id="barangay" name="barangay">
          <option>Select Barangay</option>
        </select>
      </div> -->
      <div class="col">
        <div class="row justify-content-end">
          <button type="submit" class="btn btn-primary">Check</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="card shadow">
  <!-- Card Header -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
    <button id="downloadButton" class="btn btn-primary">Download Chart</button>
  </div>
  <div class="card-body">
    <canvas id="pieChart"></canvas>
  </div>
</div>

<script>
  var pieJsonData;
  let pieDelayed;

  // console.log(barangay);

  if (pieJsonData === undefined || pieJsonData === null || pieJsonData === "") {
    cases = 0;
    municipalities = [];
    pieSelectedYear = "Sample Year";
  }

  var diseases = {
    1: "Amebiasis",
    2: "Adverse Event Following Immunization",
    3: "Acute encephalitis syndrome",
    4: "Alpha-Fetoprotein",
    5: "Acute Meningitis",
    6: "Chikungunya Virus",
    7: "Diphtheria",
    8: "Hand, Foot, and Mouth Disease",
    9: "Number Needed to Treat",
    10: "Neonatal Tetanus",
    11: "Perthes Disease",
    12: "Influenza",
    13: "Dengue",
    14: "Rabies",
    15: "Cholera",
    16: "Hepatitis",
    17: "Measles",
    18: "Meningitis",
    19: "Meningo",
    20: "Typhoid",
    21: "Leptospirosis",
  };

  var diseaseName;
  var selectedDisease;
  console.log(typeof(selectedDisease));
  console.log(selectedDisease);
  if (
    selectedDisease === undefined ||
    selectedDisease === null ||
    selectedDisease === ""
  ) {
    console.log('first if');
    diseaseName = "Sample Disease";
  } else if (isNaN(selectedDisease)) {
    console.log('2nd if');
    diseaseName = selectedDisease;
  } else {
    diseaseName = diseases[selectedDisease];
  }

  var municipality = {
    1: "Alfonso",
    2: "Amadeo",
    3: "Bacoor",
    4: "Carmona",
    5: "Cavite City",
    6: "Dasmariñas",
    7: "Gen. Emilio Aguinaldo",
    8: "Gen. Mariano Alvarez",
    9: "General Trias",
    10: "Imus",
    11: "Indang",
    12: "Kawit",
    13: "Magallanes",
    14: "Maragondon",
    15: "Mendez",
    16: "Naic",
    17: "Noveleta",
    18: "Rosario",
    19: "Silang",
    20: "Tagaytay City",
    21: "Tanza",
    22: "Ternate",
    23: "Trece Martires City",
  };

  // this translates the municipalities from sql to the corresponding number
  // in the municipality associated array
  console.log(pieDiseaseMode);

  // how to get all the values and store it inside 1 variable
  console.log(municipalities);

  if (pieDiseaseMode == 1) {
    console.log('pieDiseaseMode is true');
    var translatedMunicipality = municipalities.map(function(number) {
      return municipality[number];
    });

  } else if (pieDiseaseMode == false) {
    console.log('pieDiseaseMode is false');
    var translatedMunicipality = municipalities.map(function(number) {
      return diseases[number];
    });
  } else if (pieDiseaseMode == undefined) {
    console.log('pieDiseaseMode is undefined');
    var translatedMunicipality = Object.values(municipalities);
  }

  console.log(translatedMunicipality);

  const pie = document.getElementById("pieChart");

  const colors = [];
  for (let i = 0; i < 23; i++) {
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
    const alpha = (Math.floor(Math.random() * 9) + 1) / 10; // Random alpha value between 0.1 and 0.9 
    const color = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
    colors.push(color);
  }

  // variables for the values of object translatedMunicipality and cases 
  let munValue = [];
  let casesValue = [];

  // pushing the values of translatedMunicipality and cases to the their respective variables 
  for (const key in translatedMunicipality) {
    const value = translatedMunicipality[key];
    munValue.push(value);
  }
  for (const key in cases) {
    const value = cases[key];
    casesValue.push(value);
  }

  // variable for the concat values of mun and cases 
  let munCasesValues = [];

  // pushing of values 
  if (munValue.length === casesValue.length) {
    for (let i = 0; i < munValue.length; i++) {
      munCasesValues.push(`${munValue[i]} : ${casesValue[i]}`);
    }
  } else {
    console.log("Arrays must have the same length.");
  }
  console.log(munCasesValues);


  // for the pie chart 
  const pieData = {
    labels: translatedMunicipality.length === 0 ? ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City", ] : munCasesValues,
    // label: `Number of ${diseaseName} Cases`, 
    datasets: [{
      label: "Cases",
      data: cases === 0 ? [66, 50, 1362, 33, 9, 133, 16, 109, 207, 2809, 6, 108, 2, 72, 81, 14, 10, 17, 190, 301, 59, 215, 16, ] : cases,
      backgroundColor: colors,
      borderColor: colors,
      borderWidth: 1,
    }, ],
  };

  let title = pieDiseaseMode != false ? 'Municipality' : 'Disease';
  // for the pie chart configuration
  const pieConfig = {
    type: "pie",
    data: pieData,
    options: {
      plugins: {
        title: {
          display: true,
          text: `${diseaseName} Cases Per ${title} Year ${pieSelectedYear}`,
          font: {
            size: 18,
          },
        },
        legend: {
          position: "left",
        },
      },
      animation: {
        onComplete: () => {
          pieDelayed = true;
        },
        delay: (context) => {
          let delay = 0;
          if (
            context.type === "data" &&
            context.mode === "default" &&
            !pieDelayed
          ) {
            delay = context.dataIndex * 150 + context.datasetIndex * 500;
          }
          return delay;
        },
      },
      responsive: true,
    },
  };

  // displaying the pie chart using the data and config
  const pieChart = new Chart(pie, pieConfig);

  // download button to download the generated pie chart
  const downloadButton = document.getElementById("downloadButton");
  downloadButton.addEventListener("click", () => {
    const imageUrl = pieChart.toBase64Image();
    const link = document.createElement("a");
    link.href = imageUrl;
    link.download = `${diseaseName} PieChart.png`;
    link.click();
  });
</script>