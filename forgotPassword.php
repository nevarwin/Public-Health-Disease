<?php


include("./components/connection.php");
// require 'Exception.php';
// require 'PHPMailer.php';
// require 'SMTP.php';

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$randomText = substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Use prepared statement to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['email'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'rukaxkazuya@gmail.com';
        $mail->Password = 'mzpx othb pvge arkw';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('ravencsolis@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "Confirmation for password reset. [$randomText]";
        $mail->Body = "
        We have received a request to reset the password associated with your account. To proceed with the password reset, please follow the instructions below:
        <br><br>Confirmation Code: <b>$randomText</b><br><br>

        If you did not request a password reset or have any concerns about the security of your account, please contact our clinic admin immediately.<br>

        Thank you for your prompt attention to this matter.<br><br><br>

        <b>Best regards,</b><br><br>

        <i>Cavite State University - CCAT | Clinic</i><br>
        <b>Admin Nurse</b>
";

        $mail->send();

        $reset_password_sql = "UPDATE clients SET otp = '$randomText' WHERE email = ?";
        $stmt_reset_password = $con->prepare($reset_password_sql);
        $stmt_reset_password->bind_param("s", $email);
        $result_reset_password = $stmt_reset_password->execute();
        $stmt_reset_password->close();

        if ($result_reset_password) {
            echo "<script>alert('Confirmation sent to $email. Please check your email'); 
      window.location='confirm_code.php?&email=$email'</script>";
        } else {
            echo "We can't process your request right now, try again later. " . mysqli_error($con);
        }
    } else {
        echo "No account found associated on that email.";
    }

    $stmt->close();
}
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
            top: -90px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #0061ff,
                    #60efff);
            right: -60px;
            bottom: -80px;
        }

        form {
            height: 600px;
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
    </style>
</head>

<body>
    <!-- Your forgot password form -->
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post" onsubmit="return validateForgotPasswordForm()">
        <h3>Forgot Password</h3>
        <label>Enter your email:</label>
        <input type="text" placeholder="Email" id="email" name="email">
        <!-- New password fields
        <label>New Password:</label>
        <input type="password" placeholder="New Password" id="newPassword" name="newPassword">
        <label>Confirm New Password:</label>
        <input type="password" placeholder="Confirm New Password" id="confirmPassword" name="confirmPassword"> -->
        <button type="submit">Reset Password</button>
        <a class="btn w-100" href="login.php">Back to Login</a>
    </form>

    <!-- JavaScript validation function -->
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