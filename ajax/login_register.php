 <!--<?php
    // require('../admin/inc/db_config.php');
    // require('../admin/inc/essentials.php');
    // require('../inc/smpt/smtp/PHPMailerAutoload.php');
    // if(isset($_POST['resister'])){
    //     $data = filteration($_POST);
    //     // match pass and c pass
        // if($data['pass']!=$data['cpass']){
        //     echo 'pass_missmatch';
        //     exit;
        // }
        // //check user
        // $u_exist= select("SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` = ? LIMIT 1",[$data['email'],$data['ephonenum']],"ss");
    
        // if(mysqli_num_rows($u_exist)!0){
        //     $u_exist_fetch= mysqli_fetch_assoc($u_exist);
        //     echo($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        // exit;
        // }
        // //upload user image
        // $img=uploadUserImage($_Files['profile']);
        // if ($img== 'imv_img') {
        //     echo 'inv_img';
        //     exit;
        // }
        // elseif ($img=='upd_failed') {
        //     echo 'upd_failed';
        //     exit;
        // }
       
        // // send confirmation link 
    
        // function smtp_mailer($email,$subject, $msg){
        //     $mail = new PHPMailer(); 
        //     $mail->IsSMTP(); 
        //     $mail->SMTPAuth = true; 
        //     $mail->SMTPSecure = 'tls'; 
        //     $mail->Host = "smtp.gmail.com";
        //     $mail->Port = 587; 
        //     $mail->IsHTML(true);
        //     $mail->CharSet = 'UTF-8';
        //     //$mail->SMTPDebug = 2; 
        //     $mail->Username = "maharjancharchit11@gmail.comemail";
        //     $mail->Password = "cygxyluaebwcmqbb";
        //     $mail->SetFrom("maharjancharchit11@gmail.com");
        //     $mail->setSubject("Account Verifivation Link");
        //     $mail->AddCOntent(
        //         "text/html",
        //         "
        //         CLick the link:<br>
        //         <a href='".SITE_URL."email_confirm.php?email=$email&token=$token"."'>
        //         Click
        //         </a>
        //         "
        //     );
        //     $mail->AddAddress($email);
        //     $mail->SMTPOptions=array('ssl'=>array(
        //         'verify_peer'=>false,
        //         'verify_peer_name'=>false,
        //         'allow_self_signed'=>false
        //     ));
        //     if(!$mail->Send()){
        //         echo $mail->ErrorInfo;
        //     }else{
        //         return 'Sent';
        //     }
        // }
//         $token=bin2hex(random_bytes(16));

//         if(!smtp_mailer($data['email'],$token)){
//             echo 'mail_failed';
//             exit;
//         }
//         $enc_pass= password_hash($data['pass'],PASSWORD_BCRYPT);
//         $query="INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `dob`, `profile`, `password`,  `token`,  ) VALUES(?,?,?,?,?,?,?,?)";
//         $values=[$data['name'],$data['email'],$data['address'],$data['phonenum'],$img,$enc_pass,$token];
//         if(insert($query,$values,'ssssssss')){
//             echo 1;
//         }
//         else{
//             echo 'mail_failed';
//         }
            
    
//     }
//  ?> -->
