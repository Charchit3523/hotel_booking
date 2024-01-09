<!-- <?php
    // session_start();
    // require('./admin/inc/db_config.php');
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // //Load Composer's autoloader
    // require 'vendor/autoload.php';

    // function sendemail_verify($name,$email,$verify_token){
    //     $mail = new PHPMailer(true);
    //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    //     $mail->isSMTP(); 
    //                                             //Send using SMTP
    //     $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //     $mail->Username   = 'maharjancharchit11@gmail.com';                     //SMTP username
    //     $mail->Password   = 'czno nngj sqbq diat';                               //SMTP password
    //     $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    //     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //     $mail->setFrom('maharjancharchit11@gmail.com', $name);
    //     $mail->addAddress($email);
    //     $mail->isHTML(true);                                  //Set email format to HTML
    //     $mail->Subject = 'Email verification';
    //      $email_template="
    //         <h2>YOu have REgistered</h2>
    //         <h5>Verify email Address to login with the below Link</h5>
    //         <br><br>
    //         <a href ='http://localhost/hbw/verify.php?token=$verify_token'>Click me</a>
    //      ";
    //      $mail->Body = $email_template;
    //      $mail->send();
    //      echo 'Message sent';
    // }
    // if(isset($_POST['register_btn']))
    // {
    //     $name=$_POST['name'];

    //     $email=$_POST['email'];
    //     $phonenum=$_POST['phonenum'];
    //     $address=$_POST['address'];
    //     $dob=$_POST['dob'];
    //     $pass=$_POST['pass'];
    //     $verify_token=md5(rand());
    //     sendemail_verify("$name","$email","$verify_token");
    //     echo'sent or not';
    
    //     //eailcheck
    //         $check_email_querry="SELECT email FROM user_cred WHERE email='$email' LIMIT 1";
    //         $check_email_querry_run=mysqli_querry($con,$check_email_querry);
                
    //         if(mysqli_num_rows($check_email_querry_run) > 0){
    //                 $_SESSION['status']="Email alreday exixt";
    //                 header("Location:register.php");
    //             }

            //         else{
                            // $query="INSERT INTO user_cred (INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `dob`, `password`,  `token`,  )) VALUES('$name','$email','$phonenum','$address',' $dob','$pass','$verify_token')";
            //                 $query_run=mysqli_query($con,$query);
            //                 if ($query_run) {

            //                     sendemail_verify("$name","$email","$verify_token");
            //                     $_SESSION['status']="Registration Successful verify your email";
            //                     header("Location:register.php");
            //                 }
            //                 else {
            //                     $_SESSION['status']="Registration failed";
            //                     header("Location:register.php");
            //                 }
            //             }
            // }
?> -->