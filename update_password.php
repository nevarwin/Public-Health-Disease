<?php
session_start();
include("php/connection.php");
$account_id = isset($_GET['account_id']) ? $_GET['account_id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["password"];
    $confirm_password = $_POST["r_password"];

    // Check if the two password inputs match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password does not match.'); window.location='update_password_form.php?account_id=$account_id'</script>";
        exit();
    }

    // Hash the new password using MD5 (for educational purposes only, not recommended for actual use)
    $hashed_password = md5($new_password);

    // Update password in the accounts table
    $sql = "UPDATE accounts SET password = ? WHERE account_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $account_id);

    if ($stmt->execute()) {
        echo "<script>alert('Password updated successfully.\\nYou may now log in to your account.'); window.location='user_loginpage.php';</script>";
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCMS Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    body {
        
    }
    .cell {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 500px; /* Adjust this value to your desired maximum width */
    }
    th {background-color: #BFFFCD; color: black;}
    .create-post {
      max-width: 500px;
      
      margin-top: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #fff;
    }

    .create-post textarea {
      resize: none;
    }
    .cvgreen {
    background-color: #006B38;
    }
    .side-image {
    background-image: url('images/ccat.jpg');
    background-size: cover; /* or 'contain' depending on your preference */
    background-position: center center; /* or adjust as needed */
    
}

    </style>
</head>

<body class="">

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block side-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Enter new password</h1>
                                <p class="mb-4">
                                Create a strong and memorable password to enhance your security, ensuring you won't forget it.

                                </p>
                            </div>
                            
                            <form class="user" method="post">

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="r_password" class="form-control form-control-user" placeholder="Repeat New Password">
                                </div>
                                
                                <input type="submit" name="submit" class="btn btn-success btn-user btn-block" value="Confirm">
                                    
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="user_signup.php">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="user_loginpage.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
        



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
</body>
</html>