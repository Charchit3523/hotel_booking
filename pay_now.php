<?php
      require('admin/inc/db_config.php');
      require('admin/inc/essentials.php');
      date_default_timezone_set("Asia/Kathmandu");
      session_start();
      
      if(!(isset($_SESSION['IS_LOGIN']))){
        redirect('index.php');
      }
     
      if(isset($_POST['pay_now'])){
        $order_id = 'ORD_'.$_SESSION['u_id'].random_int(11111, 999999999);
        // insert ddata into database
       
        $form_data=filteration($_POST);
        $q1="INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out`,`order_id`) VALUES (?,?,?,?,?)";
        insert($q1,[$_SESSION['u_id'],$_SESSION['room']['id'],$form_data['checkin'],$form_data['checkout'], $order_id ],'issss');
        
        $booking_id=mysqli_insert_id($con);
        $q2="INSERT INTO `booking_details`( `booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenumber`, `address`) VALUES (?,?,?,?,?,?,?)";
        insert($q2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$_SESSION['room']['payment'],$form_data['name'],$form_data['phonenum'],$form_data['address']],'issssss');
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
   
    
<div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">
            <form action="pay_response.php" method="POST" id="payment_form">
              <h6 class="mb-3">Payment</h6>
              <div class="row">
               
                  <img src="payment.png" alt="">
                  <button name="pay" class="btn text-white custom-bg shadow-none mb-1" >Pay now</button>
                
                </div>
                
              </div> 
            </form>
          </div>
        </div>
      </div>
</body>
</html>