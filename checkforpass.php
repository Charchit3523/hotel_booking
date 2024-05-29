<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



function send_mail($email,$reset_token){
    require('PHPmailer/Exception.php');
    require('PHPmailer/SMTP.php');
    require('PHPmailer/PHPMailer.php');
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
                  
    	$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'maharjancharchit11@gmail.com';                     //SMTP username
		$mail->Password   = 'qnwv nngf swjv jhvy ';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('maharjancharchit11@gmail.com', 'Hotel Booking');
        $mail->addAddress($email);     //Add a recipient
      
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password reset';
        $mail->Body    = "We got request to reset your password </b>
        Click the link below:<br>
         <a href='http://localhost/hotel_booking/updatepassword.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
       
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
}
if(isset($_POST['reset_pass'])){
    // Check if the 'reset_pass' POST parameter is set, indicating a password reset request
    
    // Construct a SQL query to select user data based on the provided email
    $q = "SELECT * FROM `user` WHERE `email`='{$_POST['email']}'";
    
    // Execute the SQL query
    $result = mysqli_query($con, $q);
    
    // Check if the query was successful
    if($result){
        // If the query was successful, check if exactly one row (user) was found
        if(mysqli_num_rows($result) == 1){
            // If exactly one user is found, generate a random reset token and set the reset token expiration date
            $reset_token = rand(111111111, 999999999);
            date_default_timezone_set('Asia/Kathmandu');
            $date = date("Y-m-d");
            
            // Construct an SQL query to update the user's reset token and token expiration date
            $q = "UPDATE `user` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE email='{$_POST['email']}'";
            
            // Execute the SQL query to update the user's reset token and token expiration date
            if(mysqli_query($con, $q) && send_mail($_POST['email'], $reset_token)){
                // If the update query is successful and the reset email is sent successfully, display a success message and redirect to the login page
                echo "<script>
                        alert('Password reset link sent to email'); window.location.href='login.php';
                    </script>";
            } else {
                // If there is an error sending the reset email or executing the update query, display an error message and redirect to the login page
                echo "<script> 
                        alert('Server down, please try again later'); window.location.href='login.php';
                    </script>";
            }
        } else {
            // If no user is found with the provided email, display a message indicating that the email is not found and redirect to the login page
            echo "<script> 
                    alert('Email not found'); window.location.href='login.php';
                </script>";
            }
    } else {
        // If there is an error executing the SQL query, display an error message and redirect to the login page
        echo "<script> 
                alert('Error querying database'); window.location.href='login.php';
            </script>";
    }
}

?>