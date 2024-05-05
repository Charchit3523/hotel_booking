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
    <div class="container availability-form">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
          <h5 class="mb-4">Check Booking Availability</h5>
          <form>
            <div class="row align-items-end">
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Check-in</label>
                <input type="date" class="form-control shadow-none"> 
              </div>
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Check-out</label>
                <input type="date" class="form-control shadow-none"> 
              </div>
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Adult</label>
                <select class="form-select shadow-none" >
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-lg-2 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Children</label>
                <select class="form-select shadow-none" >
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
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
          <div class="col-lg-4 col-mb-6 my-3">        
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/1.jpg" class="card-img-top" >          
                <div class="card-body">
                  <h5>Room name</h5>
                  <h6 class="mb-4"> Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap ">
                      2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap " >
                      1 Bathroom
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap" >
                      2 sofa
                    </span>
                    <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                      2 sofa
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                        Wifi
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap " >
                        Telivision
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Ac
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Heater
                      </span>
                  </div>
                  <div class="rating mb-4">
                  <h6 class="mb-1">Rating</h6>
                    <span class ="badge rounded-pill bg-light">
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </span>               
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">             
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>  
                  </div>             
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-mb-6 my-3">        
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/1.jpg" class="card-img-top" >          
                <div class="card-body">
                  <h5>Room name</h5>
                  <h6 class="mb-4"> Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap ">
                      2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap " >
                      1 Bathroom
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap" >
                      2 sofa
                    </span>
                    <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                      2 sofa
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                        Wifi
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap " >
                        Telivision
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Ac
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Heater
                      </span>
                  </div>
                  <div class="rating mb-4">
                    <h6 class="mb-1">Rating</h6>
                    <span class ="badge rounded-pill bg-light">
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </span>               
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">             
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>  
                  </div>             
                </div>
            </div>
          </div>
          <div class="col-lg-4 col-mb-6 my-3">        
            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="images/rooms/1.jpg" class="card-img-top" >          
                <div class="card-body">
                  <h5>Room name</h5>
                  <h6 class="mb-4"> Rs 2000 per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    <span class="badge rounded-pill bg-light text-dark text-wrap ">
                      2 Rooms
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap " >
                      1 Bathroom
                    </span>
                    <span class="badge rounded-pill bg-light text-dark text-wrap" >
                      2 sofa
                    </span>
                    <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                      2 sofa
                    </span>
                  </div>
                  <div class="facilities mb-4">
                    <h6 class="mb-1">Facilities</h6>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap ">
                        Wifi
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap " >
                        Telivision
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Ac
                      </span>
                      <span class="badge rounded-pill bg-light text-dark  text-wrap" >
                        Heater
                      </span>
                  </div>
                  <div class="rating mb-4">
                    <h6 class="mb-1">Rating</h6>
                    <span class ="badge rounded-pill bg-light">
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                      <i class="bi bi-star text-warning"></i>
                    </span>               
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">             
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>  
                  </div>             
                </div>
            </div>
          </div>
          <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More rooms>>></a>
          </div>
      </div>
    </div>

    <!-- facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Our Facilities</h2>
    <div class="container">
      <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/facilities/wifi.svg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/facilities/wifi.svg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/facilities/wifi.svg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/facilities/wifi.svg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
          <img src="images/facilities/wifi.svg" width="80px">
          <h5 class="mt-3">Wifi</h5>
        </div>
        <div class="col-lh-12 text-center mt-5">
          <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities>>></a>
        </div>
      </div>
    </div>

     <!-- testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Testimonials</h2>
     <div class="container">
     <div class="swiper swiper_testimonials">
    <div class="swiper-wrapper mb-5">
      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-3">
          <img src="images/facilities/wifi.svg" width="30px">
          <h6 class="m-0 ms-2 ">Random user</h6>
          
        </div>
        
       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius minus vel, totam nam nemo eos corrupti nostrum molestias et esse?</p>
       <div class="rating">
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       </div>
      </div>
      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-3">
          <img src="images/facilities/wifi.svg" width="30px">
          <h6 class="m-0 ms-2 ">Random user</h6>
          
        </div>
        
       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius minus vel, totam nam nemo eos corrupti nostrum molestias et esse?</p>
       <div class="rating">
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       </div>
      </div>
      <div class="swiper-slide bg-white p-4">
        <div class="profile d-flex align-items-center mb-3">
          <img src="images/facilities/wifi.svg" width="30px">
          <h6 class="m-0 ms-2 ">Random user</h6>
          
        </div>
        
       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius minus vel, totam nam nemo eos corrupti nostrum molestias et esse?</p>
       <div class="rating">
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       <i class="bi bi-star text-warning"></i>
       </div>
      </div>

   
      
    </div>
    <div class="swiper-pagination"></div>
  </div>
     </div>
         <!-- reach us-->

         <?php
         
         ?>
         <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Reach Us</h2>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
            <iframe class="w-100 rounded" height="360pz"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7064.1475333032795!2d85.30711051253164!3d27.715008604315045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4bd%3A0x58099b1deffed8d4!2sThamel%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1714809935973!5m2!1sen!2snp" loading="lazy" ></iframe>
            </div>
            <div class="col-lg-4 col-md-4 ">
              <div class="bg-white p-4 rounded mb-4">
                <h5>Call Us</h5>
                <a href="tell: +977-9000000000" class="d-inline-block mb-2 text-decoration-none text-dark">  
                  <i class="bi bi-telephone"></i> +977-9000000000
                </a>
                <br>
                <a href="tell: +977-9000000000" class="d-inline-block  text-decoration-none text-dark">  
                  <i class="bi bi-telephone"></i> +977-9000000000
                </a>
               
              </div>
              <div class="bg-white p-4 rounded mb-4">
                <h5>Follow Us</h5>
                <a href="#" class="d-inline-block mb-3 ">  
                  <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-twitter-x me-1"></i> Twitter
                  </span>
                </a>
                <br>
                <a href="#" class="d-inline-block mb-3 ">  
                  <span class="badge bg-light text-dark fs-6 p-2">
                  <i class="bi bi-facebook me-1"></i> Facebook
                  </span>
                </a>
                <br>
                <a href="#" class="d-inline-block  ">  
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
  var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay:{
      delay:3500,
      disableOnInteraction: false,

    }
  });
  
    var swiper = new Swiper(".swiper_testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320:{
          slidesPerView:1,
        },
        6402:{
          slidesPerView:1,
        },
        768:{
          slidesPerView:2,
        },
        1024:{
          slidesPerView:3,
        },
      }
    });
  
</script>
</body>
</html> 