<?php
session_start();
include("./components/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Perform server-side validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "
            <script>
                alert('Invalid email format!');
                window.location = 'login.php';
            </script>
            ";
            die;
        }

        // Sanitize the input to prevent SQL injection
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        // // Query the database to get the hashed password
        $query = "SELECT * FROM clients WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if (
            $result && mysqli_num_rows($result) > 0
        ) {
            $user_data = mysqli_fetch_assoc($result);
            $hashed_password = $user_data['password'];

            // Hash the user's input password using MD5
            $input_password_md5 = md5($password);

            // Compare the hashed password with the MD5 hash of the user's input
            if ($hashed_password === $input_password_md5) {
                // Passwords match
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $user_data['id'];

                // if ($user_data['positionId'] == 1) {
                //     header('location: http://localhost/admin2gh/adminTable.php');
                //     echo "<script>alert('Log In Successfully!');</script>";
                //     die;
                // } else {
                //     header('location: http://localhost/admin2gh/patientTable.php');
                //     echo "<script>alert('Log In Successfully!');</script>";
                //     die;
                // }
                header('location: homepage.php');
                echo "<script>alert('Log In Successfully!');</script>";
                die;
            } else {
                // Incorrect password
                echo "<script>alert('Incorrect password. Please try again.');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            }
        } else {
            // User not found
            echo "<script>alert('User not found. Please try again.');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }

        // $query = "SELECT * FROM clients WHERE email = '$email' LIMIT 1";
        // $result = mysqli_query($con, $query);

        // if ($result && mysqli_num_rows($result) > 0) {
        //     $user_data = mysqli_fetch_assoc($result);
        //     if ($user_data['password'] === $password) {
        //         $_SESSION['logged_in'] = true;
        //         $_SESSION['id'] = $user_data['id'];
        //         if ($user_data['positionId'] == 1) {
        //             echo "
        //             <script>
        //                 alert('Log In Successfully!');
        //             </script>
        //             ";
        //             header('location: http://localhost/admin2gh/adminTable.php');
        //             die;
        //         }
        //         echo "
        //             <script>
        //                 alert('Log In Successfully!');
        //             </script>
        //             ";
        //         header('location: http://localhost/admin2gh/patientTable.php');
        //         die;
        //     }
        // }
        echo "
        <script>
            alert('Invalid Email or Password!');
            //window.location = 'login.php';
        </script>
        ";
    } else {
        echo "Enter valid information!";
    }
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
            height: 520px;
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
        <h3>Login Here</h3>
        <label for="username">Email</label>
        <input type="text" placeholder="Email" id="email" name="email">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <button>Log In</button>
        <a href="./forgotPassword.php" class="btn w-100">Forgot Password?</a>
        <a href="./landingpage/landingpage.php" class="btn w-100">Cancel</a>
    </form>

    <script>
        function validateLoginForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Check if email is empty
            if (email.trim() === '') {
                alert('Please enter your email.');
                return false;
            }

            // Check if password is empty
            if (password.trim() === '') {
                alert('Please enter your password.');
                return false;
            }

            // Validation passed
            return true;
        }
    </script>

</body>

</html>