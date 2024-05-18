<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');
date_default_timezone_set("Asia/Kathmandu");
session_start();

if(isset($_GET['fetch_rooms'])){


    $chk_avail=json_decode($_GET['check_avail'],true);

    if($chk_avail['checkin']!='' && $chk_avail['checkout']!=''){
        $today_date = new DateTime();
        $checkin_date = new DateTime($chk_avail['checkin']);
        $checkout_date = new DateTime($chk_avail['checkout']);
    
        if($checkin_date == $checkout_date){
            
            echo"<h3 class='text-center text-danger'>Invalid date</h3>";
            exit;
        }
        else if($checkout_date < $checkin_date){
            echo"<h3 class='text-center text-danger'>Invalid date! Check out is earlier than Check in</h3>";
            exit;
        }
        else if($checkout_date < $today_date){
            echo"<h3 class='text-center text-danger'>Invalid date! Check out & Check in are earlier than todays date </h3>";
            exit;
        }
    }
    //count no of rooms store room cards on output variable
    $count_rooms=0;
    $output="";
    $room_res=select("SELECT * FROM `rooms` WHERE `satus`=? AND `removed`=?",[1,0],'ii');


    while($room_data=mysqli_fetch_assoc($room_res))
    {     


        if($chk_avail['checkin']!='' && $chk_avail['checkout']!=''){
              // Query to count total bookings for the room within the specified date range
                $tb_query = "SELECT COUNT(*) AS total_bookings FROM booking_order 
                WHERE booking_status = ? AND room_id = ? AND check_out > ? AND check_in < ?";
                
                $values = ['booked', $room_data['id'], $chk_avail['checkin'], $chk_avail['checkout']];
                $tb_fetch = mysqli_fetch_assoc(select($tb_query, $values, 'siss'));

                

                // Check availability and respond accordingly
                if (($room_data['quantity'] - $tb_fetch['total_bookings']) == 0) {
                   continue; 
                }
        }
          // get features of room
          $fea_q=mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = rfea.features_id WHERE rfea.room_id='$room_data[id]' ");
          $features_data="";
          while($fea_row=mysqli_fetch_assoc($fea_q)){
              $features_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
              {$fea_row['name']}
            </span>";
          }

          // get facilities of room
            $fac_q=mysqli_query($con,"SELECT f.name FROM `facilities` f INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id WHERE rfac.room_id='$room_data[id]'");
            $facilities_data="";
            while($fac_row=mysqli_fetch_assoc($fac_q)){
              $facilities_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
              {$fac_row['name']}
              </span>";
          }

          // get  room image
           $room_thumb=ROOMS_IMG_PATH."thumbnail.jpg";
           $thumb_q = mysqli_query($con, "SELECT * FROM `room_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");

          if( mysqli_num_rows($thumb_q)>0){
            $thumb_res=mysqli_fetch_assoc($thumb_q);
            $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];
          }
          $login=0;
          if(isset($_SESSION['IS_LOGIN'])){
            $login=1;
          }
          $book_btn="<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
          
          //print room
         $output.="
            <div class='card mb-4 border-0 shadow'>
              <div class='row g-0 p-3 align-items-center'>
                    <div class='col-md-5 mnb-lg-0 mb-md-0 mb-3 '>
                      <img src='$room_thumb' class='img-fluid rounded'>
                    </div>
                    <div class='col-md-5 px-lg-3 px-md-3 px-0'> 
                      <h5 class='mb-3'>{$room_data['name']}</h5>
                      <div class='features mb-3'>
                        <h6 class='mb-1'>Features</h6>
                          $features_data
                      </div>
                      <div class='facilities mb-3'>
                        <h6 class='mb-1'>Facilities</h6>
                          $facilities_data
                      </div>
                      <div class='Guests mb-3'>
                        <h6 class='mb-1'>Guests</h6>
                          <span class='badge rounded-pill bg-light text-dark  text-wrap '>
                          {$room_data['adult']} Adults
                          </span>
                          <span class='badge rounded-pill bg-light text-dark  text-wrap ' >
                          {$room_data['children']} children
                          </span>
                        
                      </div>
                    </div>
                    <div class='col-md-2 mt-lg-0 mt-mf-0 mt-4 text-center'>
                      <h6 class='mb-4'> Rs $room_data[price] per night</h6>
                      $book_btn
                      <a href='room_details.php?id=$room_data[id]' class='btn btn-sm w-100 btn-outline-dark shadow-none'>More details</a>
                    </div>
                  </div>
            </div>
          ";
          $count_rooms++;
          
      }
      if($count_rooms>0){
        echo $output;
      }else{
        echo"<h3 class='text-center text-danger'>No rooms to show!</h3>";
      }
}


?>
