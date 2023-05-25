<?php
session_start();
include("./components/connection.php");
include("./components/function.php");

$user_data = check_login($con);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Public Health Disease Geo Mapping</title>

    <link rel="shortcut icon" href="https://img.icons8.com/office/16/null/longitude.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- chart.js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>