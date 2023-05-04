<?php
$patientId = 1234; // Replace with the actual patient ID you want to check

switch (true) {
    case checkPatientExistsInTable($patientId, 'table1'):
        // Do something if patient exists in table1
        break;
    case checkPatientExistsInTable($patientId, 'table2'):
        // Do something if patient exists in table2
        break;
    case checkPatientExistsInTable($patientId, 'table3'):
        // Do something if patient exists in table3
        break;
        // Repeat for the other 7 tables
    default:
        // Do something if patient does not exist in any of the tables
}

function checkPatientExistsInTable($patientId, $tableName) {
    include('./connection.php');

    // Prepare SQL statement
    $sql = "SELECT * FROM $tableName WHERE patientId = $patientId";

    // Execute SQL statement
    $result = $conn->query($sql);

    // Check if patient exists in table
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
