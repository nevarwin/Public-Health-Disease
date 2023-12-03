<?php
include("components/connection.php");
include('components/alertMessage.php');

if (!isset($_GET["id"])) {
    header('location:adminTable.php');
    exit;
}

$id = $_GET['id'];
// read row 
$sql = "SELECT *
        FROM clients
        WHERE clients.id = $id";

// execute the sql query
$result = mysqli_query($con, $sql);
if (!$result) {
    echo 'error in result' . mysqli_error($con);;
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // check if the data is empty
    do {
        if (empty($password)) {
            $errorMessage = "All fields are required";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }
        if ($password != $confirmPassword) {
            $errorMessage = "Password and Confirm Password must be the same";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
            break;
        }

        // Add MD5 encryption to the password
        $hashedPassword = md5($password);

        // if ($hashedPassword == $user_data['password']) {
        //     $errorMessage = "New password must be different from the previous password";
        //     $type = 'warning';
        //     $strongContent = 'Oh no!';
        //     $alert = generateAlert($type, $strongContent, $errorMessage);
        //     break;
        // }
        // Update data in the database
        $sql = "UPDATE `clients` SET `password` = '$hashedPassword' WHERE id = $id";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Password updated successfully";
            $type = 'success';
            $strongContent = 'Yay!';
            $alert = generateAlert($type, $strongContent, $successMessage);

            $resetOtp = "UPDATE clients SET otp = null WHERE id = ?";
            $stmt_reset_otp = $con->prepare($resetOtp);
            $stmt_reset_otp->bind_param("s", $id);
            $stmt_reset_otp->execute();
            $stmt_reset_otp->close();
        } else {
            $errorMessage = "Error updating password";
            $type = 'warning';
            $strongContent = 'Oh no!';
            $alert = generateAlert($type, $strongContent, $errorMessage);
        }

        echo "
    <script> 
        alert('Password successfully updated');
        window.location = 'login.php';
    </script>
    ";
    } while (false);
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/img/caviteLogo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #EFF3EB;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#00ff87,
                    #60efff);
            left: -80px;
            top: -70px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #0061ff,
                    #60efff);
            right: -60px;
            bottom: -60px;
        }

        form {
            height: 450px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #080710;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: #697c56;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
            color: #697c56;

        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border: .5px #CED4DA solid;
            border-radius: 10px;
            padding: 0 20px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            /* background-color: #e5e5e5; */
        }

        ::placeholder {
            color: black;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #3ac162;
            color: #fff;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
        }

        /* Media query for small to large screens (s-l) */
        @media only screen and (max-width: 768px) {
            .background {
                width: 300px;
                /* Adjust width for smaller screens */
                height: 400px;
                /* Adjust height for smaller screens */
            }

            .background .shape {
                height: 150px;
                /* Adjust shape height for smaller screens */
                width: 150px;
                /* Adjust shape width for smaller screens */
            }

            .shape:first-child {
                left: -40px;
                /* Adjust positioning for smaller screens */
                top: -60px;
                /* Adjust positioning for smaller screens */
            }

            .shape:last-child {
                right: -30px;
                /* Adjust positioning for smaller screens */
                bottom: -40px;
                /* Adjust positioning for smaller screens */
            }

            form {
                width: 300px;
                /* Adjust form width for smaller screens */
                height: auto;
                /* Let the height adjust based on content for smaller screens */
                padding: 30px;
                /* Adjust padding for smaller screens */
            }

            form {
                padding: 20px;
                /* Adjust padding for smaller screens */
            }

            input {
                height: 40px;
                /* Adjust input height for smaller screens */
                font-size: 12px;
                /* Adjust font size for smaller screens */
            }

            label {
                font-size: 14px;
                /* Adjust label font size for smaller screens */
            }

            button {
                margin-top: 30px;
                /* Adjust margin-top for smaller screens */
                padding: 12px 0;
                /* Adjust button padding for smaller screens */
                font-size: 16px;
                /* Adjust button font size for smaller screens */
            }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post" onsubmit="return validateLoginForm()">
        <h3>Change Password</h3>
        <!-- New password fields -->
        <label>New Password:</label>
        <input type="password" placeholder="New Password" id="newPassword" name="password">
        <label>Confirm New Password:</label>
        <input type="password" placeholder="Confirm New Password" id="confirmPassword" name="confirmPassword">
        <button>Change Password</button>
    </form>

    <script>
        function validateForgotPasswordForm() {
            var email = document.getElementById('email').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var errors = [];

            // Check if email is empty
            if (email.trim() === '') {
                alert('Please enter your email.');
                return false;
            }

            // Check if new password is empty
            if (newPassword.trim() === '') {
                alert('Please enter your new password.');
                return false;
            }

            // Check if confirm password is empty
            if (confirmPassword.trim() === '') {
                alert('Please enter confirm password.');
                return false;
            }

            // Check if new password and confirm password match
            if (newPassword !== confirmPassword) {
                alert('Passwords do not match.');
                return false;
            }

            if (
                newPassword.length < 8 ||
                !newPassword.match(/[A-Z]/) ||
                !newPassword.match(/[a-z]/) ||
                !newPassword.match(/[0-9]/) ||
                !newPassword.match(/[\W]/)
            ) {
                errors.push(
                    "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character."
                );
            }
            // Check if there are any errors
            if (errors.length > 0) {
                // Display error messages
                var errorString = "";
                for (var i = 0; i < errors.length; i++) {
                    errorString += errors[i] + "\n";
                }
                alert(errorString);
                return false;
            }
            return true;
        }
    </script>

</body>

</html>