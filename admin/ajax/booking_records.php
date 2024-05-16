<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['get_bookings'])){
  $frm_data = filteration($_POST);

    $limit=10;
    $page=$frm_data['page'];
    $start=($page-1)*$limit;


    $q = "SELECT bo.*, bd.* FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id WHERE ( (bo.booking_status = 'booked' AND bo.arival = 0) OR(bo.booking_status = 'cancelled' AND bo.refund = 1 )) ORDER by bo.booking_id DESC";
   
    $res = mysqli_query($con, $q);
    $limit_q=$q." LIMIT $start,$limit";
    $limit_res = mysqli_query($con, $limit_q);
    $i = $start+1;
    $table_data = "";
    $total_res=mysqli_num_rows($res);
    if($total_res==0){
      $output=json_encode(["table_data"=>"<b>No data Found</b>","pagination"=>'']);
      echo $output;
      exit;
    }
    while($data = mysqli_fetch_assoc($limit_res)){
        
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        if($data['booking_status']=='booked'){
          $status_bg='bg-success';
        }
        else if($data['booking_status']=='cancelled') {
          $status_bg='bg-danger';
        }

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
                <b>Price:</b> Rs {$data['price']}
              </td>
              <td> 
                <b>Amount:</b> Rs {$data['total_pay']}
              </td>
              <td>
                <span class='badge $status_bg'>{$data['booking_status']}</span>
              </td>
              <td> 
                <button type='button' onclick='download($data[booking_id])' class='mt-2 btn btn-sm btn-info fw-bold  shadow-none'>
                <i class='bi bi-file-earmark-pdf-fill'></i> Download
                </button>
              </td>
            </tr>
        ";
        $i++;
    }
    $pagination="";

    if($total_res>$limit){
      $total_pages= ceil($total_res/$limit);
      $disabled=($page==1) ? "disabled" : "";
      $prev=$page-1;
      $pagination.="<li class='page-item $disabled'><button onclick='change_page($prev)' class='page-link shadow-none' >Prev</button></li>";
      $disabled=($page==$total_pages) ? "disabled" : "";
     
      $next=$page+1;

     
      $pagination.="<li class='page-item $disabled'><button onclick='change_page($next)' class='page-link shadow-none' >Next</button></li>";

    } 
    $output=json_encode(["table_data"=>$table_data]);
    $output=json_encode(["table_data"=>$table_data,"pagination"=>$pagination]);
    echo $output;
}


if (isset($_POST['cancel_booking'])) {
    $frm_data = filteration($_POST);
    $q="UPDATE `booking_order` SET `booking_status`=?, `refund`=? WHERE `booking_id`=?";
    $values=['cancelled',0,$frm_data['booking_id']];
    $res= update($q,$values,'sii');
    echo $res;
}
