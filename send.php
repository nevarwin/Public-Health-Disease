<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

include('connection.php');

$randomText = substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

if (isset($_POST['send']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // Use prepared statement to avoid SQL injection
    $stmt = $con->prepare("SELECT * FROM account_info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $lname = $row['lname'];

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'iversonlomat03@gmail.com';
        $mail->Password = 'xclp qhyp qbdt knkg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('iversonlomat03@gmail.com');
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

        $reset_password_sql = "UPDATE account_info SET otp = '$randomText' WHERE email = ? AND fname = ? AND lname = ?";
        $stmt_reset_password = $con->prepare($reset_password_sql);
        $stmt_reset_password->bind_param("sss", $email, $fname, $lname);
        $result_reset_password = $stmt_reset_password->execute();
        $stmt_reset_password->close();

        if ($result_reset_password) {
            echo "<script>alert('Confirmation sent to $email. Please check your email'); 
      window.location='confirm_code.php?fname=$fname&lname=$lname&email=$email'</script>";

        } else {
            echo "We can't process your request right now, try again later. " . mysqli_error($con);
        }
    } else {
        echo "No account found associated on that email.";
    }

    $stmt->close();
}
?>