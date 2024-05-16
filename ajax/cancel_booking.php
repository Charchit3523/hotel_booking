<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
date_default_timezone_set("Asia/Kathmandu");
session_start();

// Check if user is logged in
if (!isset($_SESSION['IS_LOGIN'])) {
    redirect('index.php');
}

if (isset($_POST['cancel_booking'])) {
    // Filter POST data
    $frm_data = filteration($_POST);

    // Construct SQL query
    $query = "UPDATE `booking_order` SET `booking_status`='cancelled', `refund`=0 WHERE `booking_id`='{$frm_data['id']}' AND `user_id`='{$_SESSION['u_id']}'";

    // Execute SQL query
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if ($result) {
        // Query executed successfully
        $row_count = mysqli_affected_rows($con);
        echo $row_count;
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($con);
    }
}
?>

