<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-Booking</title>
    
  <?php require('inc/links.php')
  ?>
 
    
   
   
</head>
<body class="bg-light">
   <?php require('inc/header.php');
   if(!(isset($_SESSION['IS_LOGIN']))){
    redirect('index.php');
  }
   
   
   ?>
 

  
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb-5 px-4">
        <h2 class="fw-bold ">Bookings</h2>
        <div style="font-size:14px;">
          <a href="index.php" class="text-secondary text-decoration-none">Home</a>
          <span class="text-secondary"> > </span>
          
          <a href="#" class="text-secondary text-decoration-none">Bookings</a>
        </div>
      </div>
      <?php
     $q = "SELECT bo.*, bd.* FROM `booking_order` bo INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id WHERE ((bo.booking_status = 'booked') OR (bo.booking_status = 'cancelled')) AND (bo.user_id=?) ORDER BY bo.booking_id DESC";
     $result = select($q, [$_SESSION['u_id']], 'i');
     
     while ($data = mysqli_fetch_assoc($result)) {
      $checkin = date("d-m-Y", strtotime($data['check_in']));
      $checkout = date("d-m-Y", strtotime($data['check_out']));
  
      $status_bg = "";
      $btn = "";
      if ($data['booking_status'] == 'booked') {
          $status_bg = 'bg-success';
          $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>
                   Booking Receipt
                  </a>
                  
                  <button type='button' onclick='cancel_booking($data[booking_id])' class='btn btn-sm btn-danger shadow-none'>
                    Cancel
                  </button>";
      } elseif ($data['booking_status'] == 'cancelled') {
          $status_bg = 'bg-danger';
  
          if ($data['refund'] == 0) {
              $btn = "<span class='badge bg-primary'>Refund in process!</span>";
          } else {
              $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none'>
                      Download Receipt
                    </a>";
          }
      }
      echo <<<data
            <div class='col-md-4 px-4 mb-4'>
              <div class='bg-white p-3 rounded shadow-sm'>
                <h5 class='fw-bold'>$data[room_name]</h5>
                <p> Rs $data[price] per night</p>
                <p> 
                  <b>Check in:</b> $checkin <br>
                  <b>Check out:</b> $checkout
                </p>
                <p> 
                  <b>Amount:</b> $data[total_pay] <br>
                  <b>Booking id:</b> $data[booking_id] 
                </p>
                <p> 
                <span class='badge $status_bg'>$data[booking_status]</span>
                </p>
                $btn
              </div>
            </div>
          data;
  }
  
      
      ?>
   
      
      

      
      
    </div>
</div>
<?php
  if(isset($_GET['cancel_status'])){
    alert('success','Booking Successful');
  }

?>
<?php require('inc/footer.php')?>

     <script>
            function cancel_booking(id) {
            if (confirm('Are you sure you want to cancel booking?')) {
                console.log('Cancelling booking with ID:', id); // Debug statement
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/cancel_booking.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    console.log('Response:', this.responseText); // Debug statement
                    if (this.responseText == 1) {
                        console.log('Cancellation successful'); // Debug statement
                        window.location.href = "bookings.php?cancel_status=true";
                    } else {
                        console.log('Cancellation failed'); // Debug statement
                        alert('Cancellation failed');
                    }
                }

                xhr.send('cancel_booking&id=' + id);
            }
        }

     </script>



</body>
</html> 