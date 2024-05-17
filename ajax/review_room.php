<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
date_default_timezone_set("Asia/Kathmandu");
session_start();

// Check if user is logged in
if (!isset($_SESSION['IS_LOGIN'])) {
    redirect('index.php');
}

if (isset($_POST['review_form'])) {
    // Filter POST data
    $frm_data = filteration($_POST);

    // Construct SQL query
    $query = "UPDATE `booking_order` SET `rate_review`=1 WHERE `booking_id`='{$frm_data['booking_id']}' AND `user_id`='{$_SESSION['u_id']}'";

    // Execute SQL query
    $result = mysqli_query($con, $query);
    $ins_q="INSERT INTO `rating_review`( `booking_id`, `room_id`, `user_id`, `rating`, `review`) VALUES (?,?,?,?,?)";
    $ins_values=[$frm_data['booking_id'],$frm_data['room_id'],$_SESSION['u_id'],$frm_data['rating'],$frm_data['review']];
    $ins_result=insert( $ins_q, $ins_values,'iiiis');
    
    echo $ins_result;
    
   
    
}
?>

