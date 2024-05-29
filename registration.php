<?php
include('db.php');
require('inc/links.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPmailer/Exception.php');
require('PHPmailer/SMTP.php');

require('PHPmailer/PHPMailer.php');

// Load Composer's autoloader

$msg = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $phonenumber = $_POST['pn'];

    // Check if email already exists
    $stmt = $con->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $msg = "Email id already present!!";
    } else if ($password !== $cpassword) {
        $msg = "Password does not match Confirm Password!!";
    } else {
        // Insert new user using prepared statement
        $stmt = $con->prepare("INSERT INTO user (name, email, password, cpassword, address, pn, verification_id) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Generate verification ID before binding parameters
        $verification_id = rand(111111111, 999999999);
        $stmt->bind_param("ssssssi", $name, $email, $password, $cpassword, $address, $phonenumber, $verification_id);

        $stmt->execute();
        $stmt->close();

        $msg = "We've just sent a verification link to <strong>$email</strong>. Please check your inbox and click on the link to get started. If you can't find this email (which could be due to spam filters), just request a new one here.";

        $mailHtml = "Please confirm your account registration by clicking the button or link below: <a href='http://localhost/hotel_booking/check.php?id=$verification_id'>http://localhost/hotel_booking/check.php?id=$verification_id</a>";

        $mail = new PHPMailer(true);
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                             //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                     //Enable SMTP authentication
        $mail->Username = 'maharjancharchit11@gmail.com';           //SMTP username
        $mail->Password = 'qnwv nngf swjv jhvy';                    //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                          //Set the SMTP port

        $mail->setFrom('maharjancharchit11@gmail.com', 'Hotel booking');
        $mail->addAddress($email); // Add a recipient
        $mail->isHTML(true);       // Set email format to HTML
        $mail->Subject = 'Email Verification';
        $mail->Body = $mailHtml;

        try {
            $mail->send();
            echo 'Message sent';
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #fff;
        background: #63738a;
        font-family: 'Roboto', sans-serif;
    }
    .form-control {
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus {
        border-color: #5cb85c;
    }
    .form-control, .btn {
        border-radius: 3px;
    }
    .signup-form {
        width: 400px;
        margin: 0 auto;
        padding: 30px 0;
    }
    .signup-form h2 {
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h1 {
        color: #636363;
        text-align: center;
    }
    .signup-form .hint-text {
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form input[type="checkbox"] {
        margin-top: 3px;
    }
    .signup-form .btn {
        font-size: 16px;
        font-weight: bold;
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child {
        padding-right: 10px;
    }
    .signup-form .row div:last-child {
        padding-left: 10px;
    }
    .signup-form a {
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #5cb85c;
        text-decoration: none;
    }
    .signup-form form a:hover {
        text-decoration: underline;
    }
    .signup-form .message {
        color: red;
    }
</style>
</head>
<body>
<div class="signup-form">
    <form method="post">
        <h1 class="me-3"><img src="images/carousel/logo.png" width="80px">Hotel Booking</h1>
        <hr>
        <h2 class="mt-4">Register</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" required>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="pn" placeholder="Phone Number" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn text-white shadow-none custom-bg m-3">Register Now</button>
            <button type="reset" class="btn text-secondary shadow-none ms-6" data-bs-dismiss="modal">Cancel</button>
        </div>
        <div class="message">
            <?php echo $msg; // Display message to the user ?>
        </div>
    </form>
    <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
</div>
</body>
</html>
