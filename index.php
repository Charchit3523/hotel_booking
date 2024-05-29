<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-home</title>
    
  <?php require('inc/links.php')?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <style>
        .availability-form{
          margin-top:-50px;
          z-index: 2;
          position:relative;
        }
        @media screen and(max-width:575px){
            .availability-form{
              margin-top:25px;
              padding:0 35px;
          }
        }
    </style>
</head>
<body class="bg-light">
   <?php require('inc/header.php')?>

    <!-- swiper js -->
    <div class="container-fluid px-lg-4 mt-4 ">
      <div class="swiper swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="images/carousel/IMG_15372.png" class="w-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_40905.png" class="w-100 d-block" >
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_62045.png"  class="w-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_55677.png" class="w-100 d-block">
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_93127.png" class="w-100 d-block" >
          </div>
          <div class="swiper-slide">
            <img src="images/carousel/IMG_99736.png"  class="w-100 d-block">
          </div>
        </div>
      </div>
    </div>

  <!-- booking -->
    <div class="container availability-form ">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
          <h5 class="mb-4">Check Booking Availability</h5>
          <form action="rooms.php">
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Check-in</label>
                <input type="date" class="form-control shadow-none" name="checkin" required> 
              </div>
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Check-out</label>
                <input type="date" class="form-control shadow-none" name="checkout" required> 
              </div>
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Adult</label>
                <select class="form-select shadow-none" name="adult" >
                  <!-- finding the maax num of adult from database and displaying that no in the options -->
                  <?php   
                  $guests_q = mysqli_query($con, "SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` 
                  FROM `rooms` WHERE `satus`='1' AND `removed`='0'");

                  $guests_res=mysqli_fetch_assoc($guests_q);
                  for($i=1; $i<=$guests_res['max_adult']; $i++){
                    echo"<option value='$i'>$i</option>";
                  }
                  
                  ?>
          
                </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label  class="form-label" style="font-weihght: 500;" >Children</label>
                <select class="form-select shadow-none" name="children">
                <option value='0'>0</option>  
                <!-- finding the maax num of childrens from database and displaying that no in the options -->
                  <?php
                  $guests_q2 = mysqli_query($con, "SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` 
                  FROM `rooms` WHERE `satus`='1' AND `removed`='0'");

                    $guests_res2=mysqli_fetch_assoc($guests_q2);
                    for($i=1; $i<=$guests_res2['max_children']; $i++){
                      echo"<option value='$i'>$i</option>";
                    }
                  
                  ?>
               
                </select>
              </div>
              <input type="hidden" name="check_availability">
              <div class="col-lg-1 mb-lg-3 mt-2">
              <button class="btn text-white shadow-none custom-bg">Submit</button>

              </div>
            </div>
            </div> 
          </form>
        </div>
      </div>
    </div>

    <!-- rooms -->
   <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Our Rooms</h2>
    <div class="container">
      <div class="row">
      <?php
        $room_res=select("SELECT * FROM `rooms` WHERE `satus`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3 ",[1,0],'ii');


        while($room_data=mysqli_fetch_assoc($room_res))
          {
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
              $book_btn="<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book now</button>";
                         
              $rating_q="SELECT AVG(rating) AS `avg_rating` FROM `rating_review`
              WHere `room_id`='$room_data[id]' ORDER BY `sr_no` DESC LIMIT 20";
              $rating_res=mysqli_query($con,$rating_q);
              $rating_fetch=mysqli_fetch_assoc($rating_res);
              $rating_data="";
              if( $rating_fetch['avg_rating']!=NULL){
                $rating_data="<div class='rating mb-4'>
                              <h6 class='mb-1'>Rating</h6>
                              <span class ='badge rounded-pill bg-light'>";


                for($i=0;$i<$rating_fetch['avg_rating']; $i++){
                  $rating_data.="<i class='bi bi-star-fill text-warning'></i> ";
                }
                $rating_data.=" </span>               
                              </div>";
              }
             

              //print room
              echo <<<data
                  <div class="col-lg-4 col-mb-6 my-3">        
                  <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                      <img src="$room_thumb" class="card-img-top" >          
                      <div class="card-body">
                        <h5>{$room_data['name']}</h5>
                        <h6 class="mb-4"> Rs $room_data[price] per night</h6>
                        <div class="features mb-4">
                          <h6 class="mb-1">Features</h6>
                          $features_data
                          
                        </div>
                        <div class="facilities mb-4">

                          <h6 class="mb-1">Facilities</h6>
                            $facilities_data
                          
                        </div>
                        <div class="Guests mb-3">
                          <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                            {$room_data['adult']} Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap " >
                            {$room_data['children']} children
                            </span>
                        
                        </div>
                        $rating_data
                        <div class="d-flex justify-content-evenly mb-2">             
                        $book_btn 
                        <a href="room_details.php?id=$room_data[id]"  class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More details</a>  
                        </div>             
                    </div>
                  </div>
                </div>


           
              data;
              
          }
            
          

          
        
      ?>
         
          <div class="col-lg-12 text-center mt-5">
            <a href="rooms.php"  class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More rooms>>></a>
          </div>
      </div>
    </div>

    <!-- facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Our Facilities</h2>
    <div class="container">
      <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">

      <?php
        $res=mysqli_query($con,"SELECT * FROM `facilities`  ORDER BY `id` DESC LIMIT 5");
        $path=FEATURES_IMG_PATH; 

        while($row=mysqli_fetch_assoc($res)){
          echo<<<data
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
              <img src="{$path}{$row['icon']}" width="60px">
              <h5 class="mt-3">{$row['name']}</h5>
            </div>
         
          data;
        }
      ?>
      
        <div class="col-lh-12 text-center mt-5">
          <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities>>></a>
        </div>
      </div>
    </div>

     <!-- testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Testimonials</h2>
     <div class="container">
      <div class="swiper swiper_testimonials">
      <div class="swiper-wrapper mb-5">
        <?php
          $review_q="SELECT rr.*,uc.name AS uname, r.name AS rname FROM `rating_review` rr 
          INNER JOIN `user` uc ON rr.user_id=uc.sr_no  
          INNER JOIN `rooms` r On rr.room_id=r.id 
          ORDER BY `sr_no` DESC LIMIT 6";

          $review_res=mysqli_query($con,$review_q);
          if(mysqli_num_rows($review_res)==0){
              echo 'No reviews yet';
          }
          else{
            while($row=mysqli_fetch_assoc($review_res)){
              $stars="<i class='bi bi-star-fill text-warning'></i> ";
              for($i=1;$i<$row['rating'];$i++){
                $stars.=" <i class='bi bi-star-fill text-warning'></i>";
              }
              echo <<<slides
              <div class="swiper-slide bg-white p-4">
                  <div class="profile d-flex align-items-center mb-3">
                      <i class="bi bi-person-square fs-3 me-2" width="30px"></i>
                      <h6 class="m-0 ms-2">$row[uname]</h6>
                  </div>
                  <p>$row[review]</p>
                  <div class="rating">
                      $stars
                     
                  </div>
              </div>
              slides;
            }
          }
        ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
     </div>
         <!-- reach us-->

        
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Reach Us</h2>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="360pz"  src="http://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7064.147533277554!2d85.3071212431779!3d27.715008604712473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4bd%3A0x58099b1deffed8d4!2z4KSg4KSu4KWH4KSyLCDgpJXgpL7gpKDgpK7gpL7gpKHgpYzgpIEgNDQ2MDA!5e0!3m2!1sne!2snp!4v1716810818389!5m2!1sne!2snp" loading="lazy" ></iframe>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="bg-white p-4 rounded mb-4">
                <h5>Call Us</h5>
                <a href="tell: <?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark">  
                  <i class="bi bi-telephone"></i> +<?php echo $contact_r['pn1']?>
                </a>
                <br>
                <?php
                if ($contact_r['pn2'] != '') {
                    echo <<<data
                    <a href="{$contact_r['pn2']}" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone"></i> +{$contact_r['pn2']}
                    </a>
                    data;
                }
                ?>
              </div>
              <div class="bg-white p-4 rounded mb-4">
                <h5>Follow Us</h5>
                <?php
                  if ($contact_r['tw'] != '') {
                      echo <<<data
                      <a href="{$contact_r['tw']}" class="d-inline-block mb-3">  
                          <span class="badge bg-light text-dark fs-6 p-2">
                              <i class="bi bi-twitter-x me-1"></i> Twitter
                          </span>
                      </a>
                      data;
                  }
                ?>              
                <br>
                <a href="<?php echo $contact_r['fb']?>" class="d-inline-block mb-3 ">  
                  <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-facebook me-1"></i> Facebook
                  </span>
                </a>
                <br>
                <a href="<?php echo $contact_r['insta']?>" class="d-inline-block  ">  
                  <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-instagram me-1"></i> Instagram
                  </span>
                </a>
                
               
              </div>

            </div>
          </div>
        </div>

    <?php require('inc/footer.php')?>


        



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
 
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  // Initialize Swiper for the main container with fade effect
  var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30, // Space between slides in pixels
    effect: "fade", // Fade effect for slide transition
    loop: true, // Enable looping of slides
    autoplay: {
      delay: 3500, // Delay between slides in milliseconds
      disableOnInteraction: false, // Continue autoplay after user interactions
    }
  });

  // Initialize Swiper for testimonials with coverflow effect
  var swiper = new Swiper(".swiper_testimonials", {
    effect: "coverflow", // Coverflow effect for slide transition
    grabCursor: true, // Show grab cursor icon on hover
    centeredSlides: true, // Center slides
    slidesPerView: "auto", // Set slides per view to automatic
    slidesPerView: "3", // Show 3 slides at a time
    loop: true, // Enable looping of slides
    coverflowEffect: {
      rotate: 50, // Rotate value for coverflow effect
      stretch: 0, // Stretch value for coverflow effect
      depth: 100, // Depth value for coverflow effect
      modifier: 1, // Modifier value for coverflow effect
      slideShadows: false, // Disable slide shadows
    },
    pagination: {
      el: ".swiper-pagination", // Pagination element
    },
    breakpoints: {
      320: {
        slidesPerView: 1, // Show 1 slide for screens >= 320px
      },
      6402: {
        slidesPerView: 1, // Show 1 slide for screens >= 640px (typo? Consider changing to 640)
      },
      768: {
        slidesPerView: 2, // Show 2 slides for screens >= 768px
      },
      1024: {
        slidesPerView: 3, // Show 3 slides for screens >= 1024px
      },
    }
  });

</script>
</body>
</html> 