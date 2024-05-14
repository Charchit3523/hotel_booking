<?php
      require('admin/inc/db_config.php');
      require('admin/inc/essentials.php');
      date_default_timezone_set("Asia/Kathmandu");
      session_start();
      
      if(!(isset($_SESSION['IS_LOGIN']))){
        redirect('index.php');
      }

      if(isset($_POST['pay_now'])){

        // insert ddata into database

        $form_data=filteration($_POST);
        $q1="INSERT INTO `booking_order`(`user_id`, `room_id`, `check_in`, `check_out` ) VALUES (?,?,?,?)";
        insert($q1,[$_SESSION['u_id'],$_SESSION['room']['id'],$form_data['checkin'],$form_data['checkout']],'isss');
        
        $booking_id=mysqli_insert_id($con);
        $q2="INSERT INTO `booking_details`( `booking_id`, `room_name`, `price`, `total_pay`, `user_name`, `phonenumber`, `address`) VALUES (?,?,?,?,?,?,?)";
        insert($q2,[$booking_id,$_SESSION['room']['name'],$_SESSION['room']['price'],$_SESSION['room']['payment'],$form_data['name'],$form_data['phonenum'],$form_data['address']],'issssss');
    }



?>