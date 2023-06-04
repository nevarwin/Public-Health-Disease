<?php
// PHP for the line and pie chart
include('../components/connection.php');

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

?>

<!-- form dropdown for both line and pie chart -->
<div class="d-flex justify-content-center">
  <div class="row align-items-center">
    <form id="form2">
      <div class="btn-group col-xl-12 col-lg-12  col-sm-8 my-2">
        <div class="dropdown mx-2">
          <select class="form-select" name="pieDisease">
            <?php
            $pieDropdown = [
              1 => 'Amebiasis',
              2 => 'Adverse Event Following Immunization',
              3 => 'Acute encephalitis syndrome',
              4 => 'Alpha-Fetoprotein',
              5 => 'Acute Meningitis',
              6 => 'ChikV',
              7 => 'Diphtheria',
              8 => 'Hand, Foot, and Mouth Disease',
              9 => 'Number Needed to Treat',
              10 => 'Neonatal Tetanus',
              11 => 'Perthes Disease',
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
        <div class="dropdown mx-2">
          <select class="form-select" name="pieYear">
            <?php echo $options; ?>
          </select>
        </div>
        <button type="submit" class='btn btn-primary mx-2'>Check</button>
      </div>
    </form>
  </div>
</div>