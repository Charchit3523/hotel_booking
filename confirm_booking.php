<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-Comfrm Booking</title>
    
  <?php require('inc/links.php')?>
 
    
   
   
</head>
<body class="bg-light">
   <?php require('inc/header.php')?>
   <?php
    if(!isset($_GET['id']) ){
        redirect('rooms.php');
    }
    else if(!(isset($_SESSION['IS_LOGIN']))){
      redirect('rooms.php');
    }
   
    $data=filteration($_GET);
    $room_res=select("SELECT * FROM `rooms` WHERE `id`=? AND `satus`=? AND `removed`=?",[$data['id'],1,0],'iii');
    
    if(mysqli_num_rows($room_res)==0){
      redirect('rooms.php');
    }
    $room_data=mysqli_fetch_assoc($room_res);

    $_SESSION['room']=[
      "id"=>$room_data['id'],
      "name"=>$room_data['name'],
      "price"=>$room_data['price'],
      "payment"=>null,
      "available"=>false,
    ];
    $user_res=select("SELECT * FROM `user` WHERE `sr_no`=? LIMIT 1",[$_SESSION['u_id']],"i");
    $user_data=mysqli_fetch_assoc( $user_res);
?>

  
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold "> <?php echo $room_data['name']?> </h2>
        <div style="font-size:14px;">
          <a href="index.php" class="text-secondary text-decoration-none">Home</a>
          <span class="text-secondary"> > </span>
          <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">Confirm</a>
        </div>
      </div>

      <div class="col-lg-7 col-md-12 px-4">
          <?php
            $room_thumb=ROOMS_IMG_PATH."thumbnail.jpg";
            $thumb_q = mysqli_query($con, "SELECT * FROM `room_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");

            if( mysqli_num_rows($thumb_q)>0){
              $thumb_res=mysqli_fetch_assoc($thumb_q);
              $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];
            } 

            echo<<<data
              <div class="card p-3 shadow-sm rounded">
                <img src="$room_thumb" class="img-fluid rounded mb-3">
                <h5>{$room_data['name']}</h5>
                <h6> Rs {$room_data['price']} per night</h6>

              </div>

            data;

          ?>
      </div>

      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">
            <form action="#" id="booking_form">
              <h6 class="mb-3">Booking details</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Name</label>
                  <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Phone number</label>
                  <input name="phonenum" type="number" value="<?php echo $user_data['pn'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-label ">Address</label>
                  <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $user_data['address'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label ">Check-in</label>
                  <input name="checkin"  onchange="check_availability()" type="date"  class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label ">Check-out</label>
                  <input name="checkout"  onchange="check_availability()" type="date"  class="form-control shadow-none" required>
                </div>
                <div class="col-12">
                 
                  <div class="spinner-border mb-3 d-none" id="info_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  
                  <h6 class="mb-3 text-secondary" id="pay_info">Provide check-in & check-out details</h6>
                  
                  <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay now</button>
                
                </div>
                
              </div> 
            </form>
          </div>
        </div>
      </div>

      
      
    </div>
</div>

<?php require('inc/footer.php')?>

<script>
  let booking_form=document.getElementBYId('booking_form');
  let info_loader=document.getElementBYId('info_loader');
  let pay_info=document.getElementBYId('pay_info');

  function check_availability(){

  }

  

</script>     



</body>
</html> 