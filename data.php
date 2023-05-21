<?php
// Replace with your database connection code
include('./components/connection.php');

// Fetch all rows from the "patients" table
$query = "SELECT patients.*, barangay.barangay, municipality.municipality 
          FROM patients
          LEFT JOIN barangay ON patients.barangay = barangay.id
          LEFT JOIN municipality ON patients.municipality = municipality.munId";
$result = mysqli_query($con, $query);

// Fetch the data and convert it to JSON
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
