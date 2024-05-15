<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
date_default_timezone_set("Asia/Kathmandu");
session_start();

if (!isset($_SESSION['IS_LOGIN'])) {
    redirect('index.php');
}

$q1 = "SELECT `booking_id`,`user_id` FROM `booking_order` WHERE `room_id`={$_SESSION['room']['id']}";
$res = mysqli_query($con, $q1);

// Check if the query was successful
if ($res) {
    // Check if any rows were returned
    if (mysqli_num_rows($res) > 0) {
        // Fetch the result
        $q1_fetch = mysqli_fetch_assoc($res);
        print_r($q1_fetch);

        if (isset($_POST['pay'])) {
            $booking_id = mysqli_real_escape_string($con, $q1_fetch['booking_id']); // Sanitize input
            
            // Check if the booking ID exists
            $existing_booking = mysqli_query($con, "SELECT * FROM `booking_order` WHERE `booking_id`='$booking_id'");
            if(mysqli_num_rows($existing_booking) > 0) {
                $q = "UPDATE `booking_order` SET `booking_status`='booked' WHERE `booking_id`='$booking_id'";
                $res2 = mysqli_query($con, $q);

                // Check if the update was successful
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
            echo "error";
        }
    } else {
        echo "No booking found for this room.";
    }
} else {
    echo "<script> alert('Error fetching booking information: " . mysqli_error($con) . "') </script>";
}
?>
