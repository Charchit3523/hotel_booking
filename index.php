<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System </title>
    
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
                <input type="date" class="form-control shadow-none" >
              </div>
              <div class="col-lg-3 mb-3">
                <label  class="form-label" style="font-weihght: 500;">Check-out</label>
                <input type="date" class="form-control shadow-none" >
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
                <button type="submit" class="btn text-white shadow-none custom-bg">
                  Submit
                </button>

              </div>
            </div>
            </div> 
          </form>
        </div>
      </div>
    </div>
    <!-- rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Our rooms</h2>
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
                  <button onclick="redirect('booking.php')" id="book" type="button" class="btn btn-sm text-white custom-bg shadow-none me-lg-3 me-2" >
                            Book
                    </button>
                    <script type="text/javascript">
                        document.getElementById("book").onclick = function () {
                            location.href = "booking.php";
                        };
                    </script>
                  <!-- <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More details</a>   -->
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
                    <button onclick="redirect('booking.php')" id="book" type="button" class="btn btn-sm text-white custom-bg shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Book now
                    </button>
                    <script type="text/javascript">
                        document.getElementById("book").onclick = function () {
                            location.href = "booking.php";
                        };
                    </script>
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
                  <button onclick="redirect('booking.php')" id="book" type="button" class="btn btn-sm text-white custom-bg shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Book now
                    </button>
                    <script type="text/javascript">
                        document.getElementById("book").onclick = function () {
                            location.href = "booking.php";
                        };
                    </script><a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book now</a>
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
    

    <?php require('inc/footer.php')?>


        



    
    <br><br><br>
    <br><br><br>
    <br><br><br>
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
</script>
</body>
</html> 