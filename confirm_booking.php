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
        <!-- Display room name dynamically -->
        <h2 class="fw-bold "> <?php echo $room_data['name']?> </h2>
        <div style="font-size:14px;">
          <!-- Breadcrumb navigation -->
          <a href="index.php" class="text-secondary text-decoration-none">Home</a>
          <span class="text-secondary"> > </span>
          <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">Confirm</a>
        </div>
      </div>

      <div class="col-lg-7 col-md-12 px-4">
          <?php
            // Default thumbnail image
            $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
            // Query to fetch room thumbnail image
            $thumb_q = mysqli_query($con, "SELECT * FROM `room_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");

            // If thumbnail image exists, update $room_thumb
            if(mysqli_num_rows($thumb_q) > 0){
              $thumb_res = mysqli_fetch_assoc($thumb_q);
              $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
            }

            // Display room details
            echo <<<data
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
            <!-- Booking form -->
            <form action="pay_now.php" method="POST" id="booking_form">
              <h6 class="mb-3">Booking details</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Name</label>
                  <!-- User name input -->
                  <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Phone number</label>
                  <!-- User phone number input -->
                  <input name="phonenum" type="number" value="<?php echo $user_data['pn'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-label">Address</label>
                  <!-- User address input -->
                  <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $user_data['address'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Check-in</label>
                  <!-- Check-in date input -->
                  <input name="checkin" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label">Check-out</label>
                  <!-- Check-out date input -->
                  <input name="checkout" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
                <div class="col-12">
                  <!-- Loading spinner -->
                  <div class="spinner-border mb-3 d-none" id="info_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  
                  <!-- Payment information message -->
                  <h6 class="mb-3 text-secondary" id="pay_info">Provide check-in & check-out details</h6>
                  
                  <!-- Pay now button -->
                  <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay now</button>
                </div>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- Include footer -->
<?php require('inc/footer.php')?>

<script>
  // Get the booking form and other necessary elements by their IDs
  let booking_form = document.getElementById('booking_form');
  let info_loader = document.getElementById('info_loader');
  let pay_info = document.getElementById('pay_info');

  // Function to check room availability and calculate total amount
  function check_availability() {
    // Get the selected check-in and check-out dates from the booking form
    let checkin_val = booking_form.elements['checkin'].value;
    let checkout_val = booking_form.elements['checkout'].value;

    // Disable the "Pay Now" button until availability is checked
    booking_form.elements['pay_now'].setAttribute('disabled', true);

    // Check if both check-in and check-out dates are selected
    if (checkin_val != '' && checkout_val != '') {
      // Hide pay_info and show info_loader while checking availability
      pay_info.classList.add('d-none');
      pay_info.classList.replace('text-dark', 'text-secondary');
      info_loader.classList.remove('d-none');

      // Prepare form data to send via AJAX
      let data = new FormData();
      data.append('check_availability', '');
      data.append('check_in', checkin_val);
      data.append('check_out', checkout_val);

      // Create a new XMLHttpRequest object
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/confirm_booking.php", true);

      // Handle the response from the server
      xhr.onload = function() {
        console.log(this.responseText);
        let data = JSON.parse(this.responseText);

        // Handle different availability scenarios
        if (data.status == 'check_in_out_equal') {
          pay_info.innerHTML = "You cannot check-out on the same day";
        } else if (data.status == 'check_out_earlier') {
          pay_info.innerHTML = "You cannot check-out earlier than the check-in date";
        } else if (data.status == 'check_in_earlier') {
          pay_info.innerHTML = "You cannot check-in earlier than today's date";
        } else if (data.status == 'unavailable') {
          pay_info.innerHTML = "Room not available for this check-in date";
        } else {
          // Display total amount to pay and enable "Pay Now" button
          pay_info.innerHTML = "No. of days: " + data.days + "<br>Total Amount to pay: Rs." + data.payment;
          pay_info.classList.replace('text-secondary', 'text-dark');
          booking_form.elements['pay_now'].removeAttribute('disabled');
        }

        // Show pay_info and hide info_loader after processing
        pay_info.classList.remove('d-none');
        info_loader.classList.add('d-none');
      };

      // Send the AJAX request with form data
      xhr.send(data);
    }
  }
</script>
    



</body>
</html> 