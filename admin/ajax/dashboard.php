<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if(isset($_POST['booking_analytics'])){
  $frm_data = filteration($_POST);

  // Fetch data from the database
  $query = "SELECT 
              COUNT(booking_id) AS `total_bookings`,
              COUNT(CASE WHEN booking_status='Booked' AND arival=0 THEN 1 END) AS `active_bookings`,
              COUNT(CASE WHEN booking_status='cancelled' AND refund=1 THEN 1 END) AS `cancelled_bookings`
              FROM `booking_order`";
  $result = mysqli_query($con, $query);

  if($result){
      $data = array();
      while($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
      }
      // Encode the result array into JSON format
      $output = json_encode($data);
      // Print JSON output
      echo $output;
  } else {
      echo "Error executing query: " . mysqli_error($con);
  }
}
