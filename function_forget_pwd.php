
<?php
include_once 'config/connection.php';
error_reporting(E_ALL); 
ini_set("display_errors", 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

// echo __DIR__ . '/composer/autoload_real.php';
// exit;
/*--------------------------------START of FORGOT PASSWORD FUNCTION------------------------------ */
if (isset($_POST['check-email'])) {
    // var_dump($_POST);
    // exit;
    $verified = "Not Verified";
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $check_email = "SELECT * FROM user_table WHERE email='$email'";
    $run_sql = mysqli_query($mysqli, $check_email);
    $fetch_data = mysqli_fetch_assoc($run_sql);
    $username = $fetch_data['username'];

    if (mysqli_num_rows($run_sql) == 1) {
        $vcode = rand(111111, 999999);
        $insert_code = "UPDATE user_table SET user_status='$verified',user_vcode = $vcode WHERE email = '$email'";
        $run_query =  mysqli_query($mysqli, $insert_code);
        if ($run_query) {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0; 
            $mail->Host       = 'mail.mindloops.org'; // Replace with your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'info@mindloops.org'; // Replace with your email address
            $mail->Password   = 'S(r#eZQg9wT='; // Replace with your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('info@mindloops.org', 'Mindloops'); // Replace with your name and email address
        
                $mail->addAddress($email, "Mindloops"); // Replace with the teacher's email and name
                $mail->Subject = 'Mindloops Forgot Password OTP';
            // $mail->Body = "Your password reset code is $vcode";
            // Define the email body with HTML content
            $mail->isHTML(true);
            $mail->Body = "
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Password Reset Code</h1>
        <p>Hello $username,</p>
        <p>Your password reset code is: <strong>$vcode</strong></p>
        <p>If you did not request this code, please ignore this email.</p>
        <p>Thank you!</p>
    </div>
</body>
</html>
";

// var_dump($mail->send());
// exit;

            // $mail->send();
            // echo "<script>alert('Email Sent Sucessfully!')</script>";
            try {
                $mail->send();
                echo "<script>alert('Email Sent Successfully!')</script>";
                $info = "We've sent a password reset OTP to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                echo "<script>window.location.href='forgot-password-verify';</script>";
                exit();
            } catch (Exception $e) {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        echo "<script>alert('This email address does not exist!')</script>";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($mysqli, $_POST['otp']);
    $check_code = "SELECT * FROM user_table WHERE user_vcode = $otp_code";
    $code_res = mysqli_query($mysqli, $check_code);
    $fetch_data = mysqli_fetch_assoc($code_res);
    if (mysqli_num_rows($code_res) > 0) {
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password.";
        $_SESSION['info'] = $info;
        echo "<script>window.location.href='change-password';</script>";
        // header('location: change-password.php');
        exit();
    } else {
        // $errors['otp-error'] = "You've entered incorrect code!";
        echo "<script>alert('You have entered incorrect code!')</script>";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $cpassword = mysqli_real_escape_string($mysqli, $_POST['cpassword']);
    if ($password !== $cpassword) {
        echo "<script>alert('Password does not matched!')</script>";
    } else {
        $verified = "Verified";
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_DEFAULT);
        $update_pass = "UPDATE user_table SET user_status='$verified', password = '$encpass' WHERE email = '$email'";

        $run_query = mysqli_query($mysqli, $update_pass);
        if ($run_query) {
            echo "<script>alert('Your password changed Sucessfully!')</script>";
            echo "<script>window.location.href = 'index';</script>";
            // header('Location: sign-in.php');
        } else {
            echo "<script>alert('Failed to change your password!')</script>";
        }
    }
}
/*--------------------------------END of FORGOT PASSWORD FUNCTION------------------------------ */
?>