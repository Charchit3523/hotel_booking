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
    
    $q="SELECT * FROM `user` WHERE `email`='{$_POST['email']}'";
    $result=mysqli_query($con,$q);
    if($result){
        if(mysqli_num_rows($result)==1){
            $reset_token=rand(111111111, 999999999);
            date_default_timezone_set('Asia/Kathmandu');
            $date=date("Y-m-d");
            $q="UPDATE `user` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE email='{$_POST['email']}'";
           
            if(mysqli_query($con,$q) && send_mail($_POST['email'],$reset_token)){
                echo
                "<script> alert('Password reset link sent to email');</script>
                ";
            }
            else{
                echo
                "<script> alert('server down try later');</script>
                ";
            }
        
        }
        else{
            echo
            "<script> alert('Email not found');</script>
            ";
           
        }
    }
    else{
        echo
        "<script> alert('error querry');</script>
        ";
        
    }
}

?>