<?php
// Connect to database and fetch barangays for selected country
include('connection.php');

$municipality_id = $_GET['municipality'];
$sql = "SELECT * FROM barangay WHERE muncityId = $municipality_id";
$result = mysqli_query($con, $sql);

// Encode barangay as JSON and return
$barangays = array();
while ($row = mysqli_fetch_assoc($result)) {
    $barangays[] = $row;
}
echo json_encode($barangays);
