<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set("Asia/Kathmandu");
session_start();

if (!(isset($_SESSION['IS_LOGIN']))) {
    redirect('index.php');
}

if (isset($_POST['pay_now'])) {
    $order_id = 'ORD_' . $_SESSION['u_id'] . random_int(11111, 999999999);
    // insert data into database
    $form_data = filteration($_POST);
    $q1 = "INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`, `payment`, `order_id`) VALUES (?,?,?,?,?,?)";
    insert($q1, [$_SESSION['u_id'], $_SESSION['room']['id'], $form_data['checkin'], $form_data['checkout'], $_SESSION['room']['payment'], $order_id], 'isssss');


    $booking_id = mysqli_insert_id($con);
    $q2 = "INSERT INTO `booking_details`( `booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenumber`, `address`,`no_of_rooms`,`adult`,`children`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    insert($q2, [$booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $_SESSION['room']['payment'], $form_data['name'], $form_data['phonenum'], $form_data['address'],$form_data['no_of_rooms'],$form_data['adult'],$form_data['children']], 'issssssiii');
}

$querry1 = "SELECT `booking_id`,`user_id`, `payment` FROM `booking_order` WHERE `room_id`={$_SESSION['room']['id']} ORDER BY `booking_id` DESC LIMIT 1";

$res = mysqli_query($con, $querry1);

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        $q1_fetch = mysqli_fetch_assoc($res);
        if (isset($_POST['pay'])) {
            $booking_id = mysqli_real_escape_string($con, $q1_fetch['booking_id']);
            $existing_booking = mysqli_query($con, "SELECT * FROM `booking_order` WHERE `booking_id`='$booking_id'");
            if (mysqli_num_rows($existing_booking) > 0) {
                $q = "UPDATE `booking_order` SET `booking_status`='booked' WHERE `booking_id`='$booking_id'";
                $q_em = "SELECT * FROM `user` WHERE `sr_no`= ?";
                
                // Prepare and execute the query to update booking status
                $stmt_update = mysqli_prepare($con, $q);
                mysqli_stmt_execute($stmt_update);

                // Prepare and execute the query to fetch user email
                $stmt_user = mysqli_prepare($con, $q_em);
                mysqli_stmt_bind_param($stmt_user, "i", $q1_fetch['user_id']);
                mysqli_stmt_execute($stmt_user);
                $res_user = mysqli_stmt_get_result($stmt_user);
                $user_data = mysqli_fetch_assoc($res_user);

                if ($stmt_update && $stmt_user) {
                    // Send email and redirect upon successful update
                    send_mail($user_data['email']);
                    redirect('pay_status.php?user=' . $q1_fetch['user_id']);
                } else {
                    echo "<script> alert('Error updating booking status: " . mysqli_error($con) . "') </script>";
                }
            } else {
                echo "<script> alert('Booking ID $booking_id does not exist.') </script>";
            }
        } else {
            echo "";
        }
    } else {
        echo "No booking found for this room.";
    }
} else {
    echo "<script> alert('Error fetching booking information: " . mysqli_error($con) . "') </script>";
}

// for priice in khalti



$error_message = "";
$khalti_public_key = "test_public_key_0857bcbe52514eb2bd8e2cae509c2c73";



$amount = $q1_fetch['payment'];
$uniqueProductId = "room";
$uniqueUrl = "http://localhost/hotel_booking/";
$uniqueProductName = "room";
$successRedirect = "http://localhost/hotel_booking/pay_status"; // change this url , it will be the page user will be redirected after successful payment


// ------------------------------------------------------------------------
// HINT : just change price above and redirect user to this page. It will handel everything automatically.
// ------------------------------------------------------------------------

function checkValid($data)
{
    $verifyAmount = 1000; // get amount from database and multiply by 100
    // $data contains khalti response. you can print it to view more details.
    // eg. $data["token] will give token & $data["amount] will give amount and more. see khalti docs for response format
    // $error_message="";
    // show error from above message
    if ((float) $data["amount"] == $verifyAmount) {
        return 1;
    } else {
        return 0;
    }

    // use your extra function for checking price & all again. You can perform more action here. 
    // 1= success, 0 = error, 

    //
}
// ------------------------------------------------------------------------
// DONOT CHANGE THE CODE BELOW UNLESS YOU KNOW WHAT YOU ARE DOING
// ------------------------------------------------------------------------
function send_mail($email){
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
        $mail->Subject = 'bookings';
        $mail->Body    = "Your room has been booked </b>
        Click the link below for more information:<br>
         <a href='http://localhost/hotel_booking/bookings.php?email=$email'>Booking</a>";
       
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
}


// declaring some global variables
$token = "";
$price = $amount;
$mpin = "";
// send otp
if (isset($_POST["mobile"]) && isset($_POST["mpin"])) {
    try {
            // Retrieve the mobile number and MPIN from POST request
            $mobile = $_POST["mobile"];
            $mpin = $_POST["mpin"];

            // Convert amount to a float and then multiply by 100 to get the value in paisa
            $price = (float) $amount;
            $amount = (float) $amount * 100;

            // Initialize cURL session
            $curl = curl_init();

            // Set cURL options
            curl_setopt_array($curl, [
            CURLOPT_URL => 'https://khalti.com/api/v2/payment/initiate/',  // Khalti API URL
            CURLOPT_RETURNTRANSFER => true,  // Return the response as a string instead of outputting it
            CURLOPT_POST => true,  // Use POST method
            CURLOPT_POSTFIELDS => json_encode([  // Set the POST fields as a JSON encoded array
                "public_key" => $khalti_public_key,
                "mobile" => $mobile,
                "transaction_pin" => $mpin,
                "amount" => $amount,
                "product_identity" => $uniqueProductId,
                "product_name" => $uniqueProductName,
                "product_url" => $uniqueUrl
            ]),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],  // Set content type to application/json
            ]);

            // Execute cURL request
            $response = curl_exec($curl);

            // Close cURL session
            curl_close($curl);

            // Log the response for debugging purposes
            file_put_contents('khalti_response_log.txt', $response, FILE_APPEND);

            // Parse the JSON response
            $parsed = json_decode($response, true);

            // Check if the response contains a token
            if (isset($parsed["token"])) {
            $token = $parsed["token"];  // Extract the token from the response
            } else {
            // Handle errors if the token is not present
            $error_message = "Incorrect mobile or MPIN";
            if (isset($parsed["detail"])) {
                $error_message .= ": " . $parsed["detail"];  // Append detailed error message if available
            }
            // Log the detailed error message for further inspection
            file_put_contents('khalti_error_log.txt', json_encode($parsed), FILE_APPEND);
            }
            } catch (Exception $e) {
                $error_message = "Error processing request: " . $e->getMessage();
            }
            }



// otp verification
if (isset($_POST["otp"]) && isset($_POST["token"]) && isset($_POST["mpin"])) {
    try {
        $otp = $_POST["otp"];
        $token = $_POST["token"];
        $mpin = $_POST["mpin"];


        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://khalti.com/api/v2/payment/confirm/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "public_key": "' . $khalti_public_key . '",
            "transaction_pin": ' . $mpin . ',
            "confirmation_code": ' . $otp . ',
            "token": "' . $token . '"
    }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);
        $parsed = json_decode($response, true);

        if (key_exists("token", $parsed)) {
            $isvalid = checkValid($parsed);
            if ($isvalid) {
                $error_message = "<span style='color:green'>payment success</span> <script> window.location='" . $successRedirect . "'; </script>";
            }


        } else {
            $error_message = "couldnot process the transaction at the moment.";
            if (key_exists("detail", $parsed)) {
                $error_message = $parsed["detail"];
            }

        }
    } catch (Exception $e) {
        $error_message = "couldnot process the transaction at the moment.";

    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require('inc/links.php')?>
    
    <div class="khalticontainer">
        <center>
            <div><img src="khalti.png" alt="khalti" width="200"></div>
        </center>
        <?php if ($token == "") : ?>
            <form action="pay_now.php" method="post">
                <small>Mobile Number:</small> <br>
                <input type="number" class="number" minlength="10" maxlength="10" name="mobile" placeholder="98xxxxxxxx">
                <small>Khalti Mpin:</small> <br>
                <input type="password" class="mpin" name="mpin" minlength="4" maxlength="6" placeholder="xxxx">
                <small>Price:</small> <br>
                <input type="text" class="price" Value="Rs. <?php echo $price; ?>" disabled>
                <input type="hidden" class="price" name="amount" Value="<?php echo $price; ?>">
                <br>
                <span style="display:block;color:red;">
                    <?php echo $error_message; ?>
                </span>
                <button >Pay Rs. <?php echo $price; ?></button>
                <br>
                <small>We dont store your credientials for some security reasons. You will have to reenter your details everytime.</small>
            </form>
        <?php endif; ?>
        <?php if ($token != "") : ?>
            <form action="pay_now.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <input type="hidden" name="mpin" value="<?php echo $mpin; ?>">
                <small>OTP:</small> <br>
                <input type="number" value="" name="otp" placeholder="xxxx">
                <span style="display:block;color:red;">
                    <?php echo $error_message; ?>
                </span>
                <button name="pay">pay RS. <?php echo $price; ?></button>
            </form>
        <?php endif; ?>
    </div>
    <style>
    .khalticontainer {
        width: 300px;
        border: 2px solid #5C2D91;
        margin: 0 auto;
        padding: 8px;
    }

    input {
        display: block;
        width: 98%;
        padding: 8px;
        margin: 2px;
    }

    button {
        display: block;
        background-color: #5C2D91;
        border: none;
        color: white;
        cursor: pointer;
        width: 98%;
        padding: 8px;
        margin: 2px;
    }

    button:hover {
        opacity: 0.8;
    }
    </style>
</body>
</html>
