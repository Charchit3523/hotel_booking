<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['get_bookings'])){
    $q = "SELECT bo.*, bd.* FROM `booking_order` bo 
    INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id 
    WHERE bo.booking_status = 'cancelled' AND bo.refund = 0 ORDER by bo.booking_id ASC";
   
    $res = mysqli_query($con, $q);
    $i = 1;
    $table_data = "";
    
    while($data = mysqli_fetch_assoc($res)){
        
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        $table_data .= "
            <tr>
              <td>$i</td>
              <td>
                <b>Name:</b> {$data['user_name']}
                <br>
                <b>Phone No:</b> {$data['phonenumber']}
              </td>
              
              <td> 

                <b>Room:</b> {$data['room_name']}
                <br>
                <b>Check in:</b> $checkin
                <br>
                <b>Check out:</b> $checkout
                <br>
                
              </td>
              <td>
                <b>Amount:</b> Rs {$data['total_pay']}
              </td>
              <td> 
                <button type='button' onclick='refund_booking($data[booking_id])' class='mt-2 btn btn-sm btn-info fw-bold  shadow-none'>
                  <i class='bi bi-currency-dollar'></i> Refund
                </button>
              </td>
            </tr>
        ";
        $i++;
    }
    echo $table_data;
}


if (isset($_POST['refund_booking'])) {
    $frm_data = filteration($_POST);
    $q="UPDATE `booking_order` SET  `refund`=? WHERE `booking_id`=?";
    $values=[1,$frm_data['booking_id']];
    $res= update($q,$values,'ii');
    echo $res; 
}
