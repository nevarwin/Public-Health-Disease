<?php
if (isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    include("connection.php");
    //check connection
    if (mysqli_connect_errno()) {
        // die equivalent to exit
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM patients WHERE patientId = $patientId";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "
        <script> 
        alert('Patient Not Removed');
        window.location= 'http://localhost/admin2gh/adminTable.php';
        </script>
        ";
    }
    echo
    "<script>
    alert('Patient Successfully Removed');
    window.location= 'http://localhost/admin2gh/patientTable.php';
    </script>";
}
