<?php
// session_start();
require('connection.php');
include('function.php');

$name = '';
$email = '';
$password = '';
$contact = '';
$address = '';

if (isset($_POST['createAdmin'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO clients (name, email, municipality, barangay, password, contact, address) VALUES ('$name', '$email', '$municipality', '$barangay', '$password', '$contact', '$address')";

    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['message'] = "Admin Successfully Created";
        header('location: adminTable.php');
        exit(0);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
        $_SESSION['message'] = "Admin Not Created";
        header('location: adminTable.php');
        exit(0);
    }
}
