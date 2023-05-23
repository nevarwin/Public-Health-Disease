<?php
if (isset($_GET['patientId'])) {
    $patientId = $_GET['patientId'];

    include("connection.php");
    //check connection
    if (mysqli_connect_errno()) {
        // die equivalent to exit
        die("Connection failed: " . mysqli_connect_error());
    }
    // getting the patientId 
    $sql = "SELECT * 
            FROM patients 
            WHERE patientId = $patientId
            ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $fieldValue = $row['patientId'];

    // Insert the deleted field into the deleted_fields table
    $query = "INSERT INTO deleted_fields (patientId) VALUES ('$fieldValue')";
    mysqli_query($con, $query);

    // Deleting the value from the table
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

    // Redirect to the admin page
    echo
    "<script>
    alert('Patient Successfully Removed');
    window.location= 'http://localhost/admin2gh/patientTable.php';
    </script>";
}
