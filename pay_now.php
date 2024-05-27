<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
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
    $q2 = "INSERT INTO `booking_details`( `booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenumber`, `address`) VALUES (?,?,?,?,?,?,?)";
    insert($q2, [$booking_id, $_SESSION['room']['name'], $_SESSION['room']['price'], $_SESSION['room']['payment'], $form_data['name'], $form_data['phonenum'], $form_data['address']], 'issssss');
}

$querry1 = "SELECT `booking_id`,`user_id` `payment` FROM `booking_order` WHERE `room_id`={$_SESSION['room']['id']} ORDER BY `booking_id` DESC LIMIT 1";

$res = mysqli_query($con, $querry1);

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        $q1_fetch = mysqli_fetch_assoc($res);
        if (isset($_POST['pay'])) {
            $booking_id = mysqli_real_escape_string($con, $q1_fetch['booking_id']);
            $existing_booking = mysqli_query($con, "SELECT * FROM `booking_order` WHERE `booking_id`='$booking_id'");
            if (mysqli_num_rows($existing_booking) > 0) {
                $q = "UPDATE `booking_order` SET `booking_status`='booked' WHERE `booking_id`='$booking_id'";
                $res2 = mysqli_query($con, $q);
                if ($res2) {
                   
                    if (mysqli_affected_rows($con) == 1) {
                      
                        redirect('pay_status.php?user=' . $_POST[$q1_fetch['user_id']]);
                    } else {
                        echo "<script> alert('No rows updated. Check booking ID: $booking_id') </script>";
                    }
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
$khalti_public_key = "test_public_key_0857bcbe52514eb2bd8e2cae509c2c73y";



$amount = $q1_fetch['payment'];
$uniqueProductId = "nike-shoes";
$uniqueUrl = "http://localhost/hotel_booking/";
$uniqueProductName = "Nike shoes";
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



// declaring some global variables
$token = "";
$price = $amount;
$mpin = "";
// send otp
if (isset($_POST["mobile"]) && isset($_POST["mpin"])) {
    try {
        $mobile = $_POST["mobile"];
        $mpin = $_POST["mpin"];
        $price = (float) $amount;

        $amount = (float) $amount * 100;


        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://khalti.com/api/v2/payment/initiate/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "public_key": "' . $khalti_public_key . '",
            "mobile": ' . $mobile . ',
            "transaction_pin": ' . $mpin . ',
            "amount": ' . ($amount) . ',
            "product_identity": "' . $uniqueProductId . '",
            "product_name": "' . $uniqueProductName . '",
            "product_url": "' . $uniqueUrl . '"
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
            $token = $parsed["token"];

        } else {
            $error_message = "incorrect mobile or mpin";




        }
    } catch (Exception $e) {
        $error_message = "incorrect mobile or mpin";

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
