<?php
// Including necessary files
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Set the default timezone
date_default_timezone_set("Asia/Kathmandu");

// Check if the form data for checking availability is submitted
if(isset($_POST['check_availability'])){
    // Sanitize the form data
    $frm_data = filteration($_POST);
    
    // Initialize variables for status and result
    $status="";
    $result="";

    // Validate the check-in and check-out dates
    $today_date = new DateTime();
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);

    if($checkin_date == $checkout_date){
        $status='check_in_out_equal';
        $result=json_encode(["status"=>$status]);
    }
    else if($checkout_date < $checkin_date){
        $status='check_out_earlier';
        $result=json_encode(["status"=>$status]);
    }
    else if($checkout_date < $today_date){
        $status='check_in_earlier';
        $result=json_encode(["status"=>$status]);
    }

    // Check if there were any validation errors
    if($status!=''){
        echo $result; // Return the validation error
    }
    else{
        session_start();

        // Query to count total bookings for the room within the specified date range
        $tb_query = "SELECT COUNT(*) AS total_bookings FROM booking_order WHERE booking_status = ? AND room_id = ? AND check_out > ? AND check_in < ?";
        $values = ['booked', $_SESSION['room']['id'], $frm_data['check_in'], $frm_data['check_out']];
        $tb_fetch = mysqli_fetch_assoc(select($tb_query, $values, 'siss'));

        // Query to fetch room quantity from the database
        $rq_query = "SELECT quantity FROM rooms WHERE id = ?";
        $rq_values = [$_SESSION['room']['id']];
        $rq_fetch = mysqli_fetch_assoc(select($rq_query, $rq_values, 'i'));

        // Check availability and respond accordingly
        if (($rq_fetch['quantity'] - $tb_fetch['total_bookings']) == 0) {
            $status = 'inavailable';
        } else {
            // Calculate payment and handle session
            $count_days = date_diff($checkin_date, $checkout_date)->days;
            $payment = $_SESSION['room']['price'] * $count_days;

            $_SESSION['room']['payment'] = $payment;
            $_SESSION['room']['available'] = true;
            $result = json_encode(["status"=>'available',"days"=>$count_days,"payment"=> $payment]);
            echo $result;
            exit; // Exit the script after sending response
        }

        // Return availability status
        $result = json_encode(['status' => $status]);
        echo $result;
        exit;
    }
}
?>
