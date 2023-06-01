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
        $totalCount += $count;
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
        <div class="dropdown mx-2">
            <select class="form-select" id="pieDisease" name="pieDisease">
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
        <div class="dropdown mx-2">
            <select class="form-select" id="pieYear" name="pieYear">
                <?php echo $options; ?>
            </select>
        </div>
    </div>
</div>

<script>
    var pieDiseaseSelect = document.getElementById('pieDisease');
    var pieYearSelect = document.getElementById('pieYear');

    pieDiseaseSelect.addEventListener('change', updateChartData);
    pieYearSelect.addEventListener('change', updateChartData);

    function updateChartData() {
        var pieDisease = pieDiseaseSelect.value;
        var pieYear = pieYearSelect.value;
        var urlParams = new URLSearchParams(window.location.search);
        urlParams.set('pieDisease', pieDisease);
        urlParams.set('pieYear', pieYear);
        window.location.search = urlParams.toString();
    }
</script>