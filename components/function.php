<?php
function check_login($con) {
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query = "select * from clients where id= '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result &&  mysqli_num_rows($result) > 0) {
            $user_data =  mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header('Location: http://localhost/admin2gh/adminTable.php');
    exit();
}

function isUrl($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function diseaseUrl($value, $id) {
    return "{$value}Page-create.php?patientId={$id}";
}
