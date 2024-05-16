<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-BookingStatus</title>
    
  <?php require('inc/links.php')?>
</head>
<body class="bg-light">
   <?php require('inc/header.php')?>
   <?php
   
  if(!(isset($_SESSION['IS_LOGIN']))){
      redirect('index.php');
    }
   
?>
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb- px-4">
        <h2 class="fw-bold "> Payment status</h2>
        
      </div>
      <?php
        if(!(isset($_SESSION['IS_LOGIN']))){
          redirect('index.php');
        }
        $booking_q="SELECT  bo.*, bd.*  FROM`booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id WHERE bo.user_id=? AND bo.booking_status!=?";
        
      $booking_res=select($booking_q,[$_SESSION['u_id'],'booked'],'is');
      if(mysqli_num_rows($booking_res)==0){
        redirect('index.php');
      }
      $booking_fetch=mysqli_fetch_assoc($booking_res);
        if($booking_fetch['booking_status']=="booked"){

          echo<<<data
              <div class="col-12 px-4">
                <p class="fw-bold alert alert-danger">
                 <i class="bi bi-check-circle-fill"></i>
                 Payment done! Booking successful!
                 <br><br>
                 <a href='bookings.php'>Go to bookings</a>
                </p>
              </div>

          data;
        }
        else{
          
          echo<<<data
            <div class="col-12 px-4">
              <p class="fw-bold alert alert-success">
              <i class="bi bi-exclamation-triangle-fill"></i>
              Payment done! Booking successful!
              <br><br>
              <a href='bookings.php'>Go to bookings</a>
              </p>
            </div>

           data;


        }
      
      ?>
    </div>
</div>

<?php require('inc/footer.php')?>
</body>
</html> 