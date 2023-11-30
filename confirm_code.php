<?php
session_start();
include("components/connection.php");

$email = isset($_GET['email']) ? $_GET['email'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "SELECT id, otp FROM client WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        $id = $row['id'];
        $sql_otp = $row['otp'];

        $user_otp = $_POST['user_otp'];

        if ($sql_otp === $user_otp) {
            header("Location: update_password.php?id=$id");
            exit();
        }
    } else {        
        echo "<script>alert('Invalid OTP. Please try again.'); 
              window.location='confirm_code.php'</script>";
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
        background-color: whitesmoke;
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
                                <h1 class="h4 text-gray-900 mb-2">Enter your Confirmation Code</h1>
                                <p class="mb-4">An email confirmation has been sent to your inbox. Please take a moment to check and access your email.
                                <?php echo $fname, $lname;?>

                                </p>
                            </div>
                            
                            <form class="user" method="post">

                                <div class="form-group">
                                    <input type="text" name="user_otp" class="form-control form-control-user" maxlength="6" minlength="6" placeholder="Enter Code">
                                </div>
                                
                                <input type="submit" name="send" class="btn btn-success btn-user btn-block" value="Confirm">
                                    
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