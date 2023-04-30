<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include("connection.php");
    //check connection
    if (mysqli_connect_errno()) {
        // die equivalent to exit
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM clients WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "
        <script> 
        alert('Admin Not Removed');
        window.location= 'http://localhost/admin2gh/adminTable.php';
        </script>
        ";
    }
    echo
    "<script>
    let confirmDelete = confirm('Are you sure you want to delete this data?');
    if (confirmDelete) {
            window.location.href = 'http://localhost/admin2gh/components/adminForm-remove.php?id=$id';
        } else {
            window.location.href = 'http://localhost/admin2gh/adminTable.php';
        }
    </script>";

    // '<script>
    //         if(confirm("Are you sure you want to delete this data?")) {
    //             window.location.href = "http://localhost/admin2gh/components/adminForm-remove.php?id=' . $id . '";
    //         } else {
    //             window.location.href = "http://localhost/admin2gh/adminTable.php";
    //         }
    //     </script>';
    // echo "
    //     <script> 
    //     alert('Admin Successfully Removed');
    //     window.location= 'http://localhost/admin2gh/adminTable.php';
    //     </script>
    //     ";
}
