<?php
// Replace with your database connection code
require('components\connection.php');
require('components\alertMessage.php');

// Get the list of unique diseases from the "patients" table
$diseaseQuery = "SELECT DISTINCT disease FROM patients ";
$diseaseResult = mysqli_query($con, $diseaseQuery);
$diseases = [];
while ($diseaseRow = mysqli_fetch_assoc($diseaseResult)) {
    $diseases[] = $diseaseRow['disease'];
}

// Get the list of unique years from the "patients" table
$yearQuery = "SELECT DISTINCT YEAR(creationDate) AS year 
            FROM patients ORDER BY year ASC";
$yearResult = mysqli_query($con, $yearQuery);
$years = [];
while ($yearRow = mysqli_fetch_assoc($yearResult)) {
    $years[] = $yearRow['year'];
}

// Fetch latitude and longitude from the "patients" table
$selectedDisease = $_GET['disease'] ?? '';
$selectedYear = $_GET['year'] ?? '';

$query = "SELECT latitude, longitude, creationDate FROM patients";

if (!empty($selectedDisease)) {
    // echo "Disease Only";
    $query = "SELECT latitude, longitude, creationDate FROM patients WHERE disease = '$selectedDisease'";
}

if (!empty($selectedDisease) && !empty($selectedYear)) {
    // echo "This is triggered";
    $query = "SELECT latitude, longitude, creationDate FROM patients WHERE disease = '$selectedDisease' AND YEAR(creationDate) = $selectedYear";
}

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
    $message = "No records found!";
    $type = 'warning';
    $strongContent = 'Oh no!';
    $alert = generateAlert($type, $strongContent, $message);
}

// Fetch the data and convert it to JSON
$locationData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $locationData[] = [
        'lat' => floatval($row['latitude']),
        'lng' => floatval($row['longitude']),
        'creationDate' => $row['creationDate']
    ];
}
echo '<script>var locationData = ' . json_encode($locationData) . ';</script>';
