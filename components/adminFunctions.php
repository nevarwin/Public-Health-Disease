<?php
require('connection.php');
include('function.php');


if (isset($_POST['createAdmin'])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO clients (name, email, municipality, barangay, password, contact_number, address) VALUES ('$name', '$email', '$municipality', '$barangay', '$password', '$contact', '$address')";

    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['message'] = "Admin Successfully Created";
        header('Location: adminTable.php');
        exit(0);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
        $_SESSION['message'] = "Admin Not Created";
        header('Location: adminTable.php');
        exit(0);
    }
}

if (isset($_POST['updateAdmin'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $municipality = mysqli_real_escape_string($con, $_POST['municipality']);
    $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $sql = "UPDATE clients SET name='$name', email='$email', municipality='$municipality', barangay='$barangay', password='$password', contact_number='$contact', address='$address' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['message'] = "Admin Successfully Updated";
        header('Location: adminTable.php');
        exit(0);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
        $_SESSION['message'] = "Admin Not Updated";
        header('Location: adminTable.php');
        exit(0);
    }
}
