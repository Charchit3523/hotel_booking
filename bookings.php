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
     $q = "SELECT bo.*, bd.* FROM `booking_order` bo 
     INNER JOIN `booking_details` bd ON bo.booking_id=bd.booking_id 
     WHERE ((bo.booking_status = 'booked') OR (bo.booking_status = 'cancelled')) 
     AND (bo.user_id=?) ORDER BY bo.booking_id DESC";
     $result = select($q, [$_SESSION['u_id']], 'i');
     
     while ($data = mysqli_fetch_assoc($result)) {
          $checkin = date("d-m-Y", strtotime($data['check_in']));
          $checkout = date("d-m-Y", strtotime($data['check_out']));
      
          $status_bg = "";
          $btn = "";
          if ($data['booking_status'] == 'booked') {
              $status_bg = 'bg-success';
              $btn = "<a href='generate_pdf.php?gen_pdf&id=$data[booking_id]' class='btn btn-dark btn-sm shadow-none me-2'>
                      Booking Receipt
                    </a>";
              if($data['rate_review']==0){
                $btn .=" <button  type='button' onclick='review_room($data[booking_id],$data[room_id])' class=' btn btn-dark btn-sm shadow-none md-mt-2'  data-bs-toggle='modal' data-bs-target='#reviewModal'>
                  Rate and Review 
                </button>";
              }
              
              $btn .="<button type='button' onclick='cancel_booking($data[booking_id])' class='btn btn-sm btn-danger shadow-none ms '>
                Cancel
              </button>";
                      // if($data['rate_review']==0){
                      //   $btn .=" <button class='btn btn-dark btn-sm shadow-none mt-2'>
                      //     Rate and Revirew
                      //   </button>";
                      // }
                      
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
 <!-- Modal -->
  <div class="modal fade" id="reviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <form id="review-form" method="POST">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                  <i class="bi bi-pencil-square fs-3 me-2"></i>Rate and Review</h5>
                  <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                      <label  class="form-label">Rating</label>
                      <select class="form-select shadow-none" name="rating">
                        
                        <option value="5">Excellent</option>
                        <option value="4">Good</option>
                        <option value="3">Ok</option>
                        <option value="2">Poor</option>
                        <option value="1">Bad</option>


                      </select>
                  </div>
                  <div class="mb-">
                      <label  class="form-label">Review</label>
                      <textarea type="text" name="review" rows="3" required class="form-control shadow-none"></textarea>
                  </div>
                  <input type="hidden" name="booking_id">

                  <input type="hidden" name="room_id">
                  <div class="text-end">
                    <button type="submit" class="btn custom-bg text-white shadow-none mt-2">
                        Submit
                    </button>
                  </div>
                </div>
              </form>
          </div>
        </div>
    </div>  
<?php
  if(isset($_GET['cancel_status'])){
    alert('success','Booking Successful');
  }
  else if(isset($_GET['review_status'])){
    alert('success','Thank you for rating and reviewing');
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


       let review_form=document.getElementById('review-form');

       function review_room(bid,rid){
          review_form.elements['booking_id'].value=bid;
          review_form.elements['room_id'].value=rid;

       }
       review_form.addEventListener('submit',function(e){
        e.preventDefault();
        

        let data = new FormData();
        data.append('review_form', '');
        data.append('rating', review_form.elements['rating'].value);
        data.append('review', review_form.elements['review'].value);
        data.append('booking_id', review_form.elements['booking_id'].value);
        data.append('room_id', review_form.elements['room_id'].value);


        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/review_room.php", true);

        xhr.onload = function() {
            console.log('Response:', this.responseText); // Debug statement
            if (this.responseText == 1) {
              window.location.href='bookings.php?review_status=true';
            } else {
                
                alert('Rating and review failed');
            }
            
        }

        xhr.send(data);

       });

     </script>



</body>
</html> 