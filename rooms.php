<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-rooms</title>
    
  <?php require('inc/links.php');

  
  ?>
    
   
   
</head>
<body class="bg-light">
   <?php require('inc/header.php');
   
   $checkin_default="";
   $checkout_default="";
   $adult_default="";
   $children_default="";
   

   if(isset($_GET['check_availability']))
   {
     $frm_data=filteration($_GET);

     $checkin_default=$frm_data['checkin'];
     $checkout_default=$frm_data['checkout'];
     
     $adult_default=$frm_data['adult'];
     
     $children_default=$frm_data['children'];
     

   }
   
   ?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Rooms</h2>
    <div class="h-line bg-dark"></div>
    
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-white roundeed shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <h4 class="mt-2">
              <span>
              Filters
              </span>  
              <button id="reset_btn" onclick="reset_all()" class="btn btn-sm text-secondary d-none shadow-none">Reset All</button>
              

              </h4>
             
              <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-column  align-items-stretch mt-2" id="filterDropdown">
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size:18px;">
                     <span>
                      Check Availability
                     </span>
                     <button id="check_avail_btn"onclick="check_avail_clear()" class="btn btn-sm text-secondary d-none shadow-none">Reset</button>
                  </h5>
                  <label  class="form-label">Check-in</label>
                  <input type="date" class="form-control shadow-none mb-3" value="<?php  echo $checkin_default?>" id="checkin" onchange="check_avail_filter()"> 
                  <label  class="form-label">Check-out</label> 
                  <input type="date" class="form-control shadow-none"  value="<?php  echo $checkout_default?>" id="checkout" onchange="check_avail_filter()">
                </div>
                <div class="border bg-light p-3 rounded mb-3">
                  
                  <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size:18px;">
                        <span>
                        Facilities
                        </span>
                        <button id="facilities_btn" onclick="facilities_clear()" class="btn btn-sm text-secondary d-none shadow-none">Reset</button>
                  </h5>
                  <?php   
                    $facilities_q=selectALL('facilities');
                    while ($row=mysqli_fetch_assoc($facilities_q)) {
                      echo<<<facilities
                      <div class="mb-2">
                        <input type="checkbox" onclick="fetch_rooms()" name="facilities" value="$row[id]" id="$row[id]" class="form-check-input shadow-none me-1">
                        <label  class="form-label" for="$row[id]">$row[name]</label>
                      </div>

                      facilities;
                    }
                  
                  ?>
                 
                </div>
                <div class="border bg-light p-3 rounded mb-3">
               
                <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size:18px;">
                    <span>
                    Guests
                    </span>
                    <button id="guests_btn"onclick="guests_clear()" class="btn btn-sm text-secondary d-none shadow-none">Reset</button>
                </h5>
                  <div class="d-flex">
                    <div class="me-3 ">
                      <label  class="form-label">Adults</label> 
                      <input type="number" min="1"  value="<?php  echo $adult_default?>" id="adults" oninput="guests_filter()" class="form-control shadow-none">
                    </div>
                    <div>
                      <label  class="form-label">Childrens</label> 
                      <input type="number"  min="0" value="<?php  echo $children_default?>"   id="childrens" oninput="guests_filter()" class="form-control shadow-none">
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="border bg-light p-3 rounded mb-3">
              <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size:18px;">
                      <span>
                      Location
                      </span>
                      <button id="location_btn" onclick="location_clear()" class="btn btn-sm text-secondary d-none shadow-none">Reset</button>
                  </h5>
                  <div class="d-flex">
                    <div class="me-3 ">
                      
                      <input type="text"  class="form-control shadow-none" id="location" oninput="location_filter()">
                    </div>
                  </div>
                 

              </div>
              <div class="border bg-light p-3 rounded mb-3">
              <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size:18px;">
                      <span>
                      Price
                      </span>
                      <button id="price_btn"onclick="price_clear()" class="btn btn-sm text-secondary d-none shadow-none">Reset</button>
                  </h5>
                  <div class="d-flex">
                    <div class="me-3 ">
                     
                      <input type="number"  class="form-control shadow-none"  id="price" oninput="price_filter()">
                    </div>
                  </div>


              </div>

            </div>
          </nav>
      </div>
      
     <div class="col-lg-9 col-md-12 px-4" id="rooms-data">

    
          
          
     </div>
    </div>
  </div>

    <script>
      let rooms_data=document.getElementById('rooms-data');
      let checkin=document.getElementById('checkin');
      let checkout=document.getElementById('checkout');
      let check_avail_btn=document.getElementById('check_avail_btn');
      let adults=document.getElementById('adults');
      let childrens=document.getElementById('childrens');
      let guests_btn=document.getElementById('guests_btn');
      let locationInput = document.getElementById('location');
      let location_btn=document.getElementById('location_btn');
      let price = document.getElementById('price');
      let price_btn=document.getElementById('price_btn');


      let facilities_btn=document.getElementById('facilities_btn');
      let reset_btn=document.getElementById('reset_btn');
      
    
    

    function fetch_rooms() {
      // Stringify checkin and checkout values
          let chk_avail = JSON.stringify({
              checkin: checkin.value,
              checkout: checkout.value
          });
          let location=JSON.stringify({
            location: locationInput.value
          });
          let priceData = {
              price: price.value // Get the price from the input
          };
          let priceString = JSON.stringify(priceData); 


          // Stringify guests values
          let guests = JSON.stringify({
              adults: adults.value,
              childrens: childrens.value
          });

          // Initialize an object to store selected facilities
          let facility_list = { "facilities": [] };

          // Get all checked facilities checkboxes
          let get_facilities = document.querySelectorAll('[name="facilities"]:checked');

          // Iterate over the selected facilities and add them to the facility list
          get_facilities.forEach((facility) => {
              facility_list.facilities.push(facility.value);
          });

          // Toggle facility buttons visibility based on whether any facilities are selected
          if (get_facilities.length > 0) {
              facilities_btn.classList.remove('d-none'); // Show the facilities button
              reset_btn.classList.remove('d-none'); // Show the reset button
          } else {
              facilities_btn.classList.add('d-none'); // Hide the facilities button
          }

          // Convert the facility list to a JSON string
          facility_list = JSON.stringify(facility_list);

          // Create a new XMLHttpRequest object
          let xhr = new XMLHttpRequest();

          // Configure it: GET-request for the URL with query parameters
          xhr.open("GET", `ajax/rooms.php?fetch_rooms&check_avail=${chk_avail}&guests=${guests}&facility_list=${facility_list}&location=${location}&price=${priceString}`, true);

          // Set up a function to show a loading spinner while the request is in progress
          xhr.onprogress = function () {
              rooms_data.innerHTML = `
                  <div class="spinner-border mb-3 d-block mx-auto" id="loader" role="status">
                      <span class="visually-hidden">Loading...</span>
                  </div>`;
          };

          // Set up a function to handle the response when the request completes
          xhr.onload = function () {
              if (this.status >= 200 && this.status < 300) {
                  // If the request is successful, display the response text
                  rooms_data.innerHTML = this.responseText;
              } else {
                  // If the request fails, display an error message
                  rooms_data.innerHTML = "Error loading rooms data.";
              }
          };

          // Set up a function to handle network errors
          xhr.onerror = function () {
              // Display a network error message
              rooms_data.innerHTML = "Network error.";
          };

          // Send the request
          xhr.send();
    }


      function check_avail_filter(){
        if(checkin.value!='' && checkout.value!=''){
          fetch_rooms();
          check_avail_btn.classList.remove('d-none');
          reset_btn.classList.remove('d-none');

        }
      }
      function location_filter(){
        if(locationInput.value!=''){
          fetch_rooms();
          location_btn.classList.remove('d-none');
          reset_btn.classList.remove('d-none');

        }
      }
      function price_filter(){
        if(price.value!=''){
          fetch_rooms();
          price_btn.classList.remove('d-none');
          reset_btn.classList.remove('d-none');

        }
      }
      function check_avail_clear(){
        checkin.value='';
        checkout.value='';
        check_avail_btn.classList.add('d-none');
        fetch_rooms();
      }
      function location_clear(){
       locationInput.value='';
       
        location_btn.classList.add('d-none');
        fetch_rooms();
      }
      function price_clear(){
       price.value='';
       
        price_btn.classList.add('d-none');
        fetch_rooms();
      }
      function guests_filter(){
        if(adults.value>0 ||childrens.value>=0){
          fetch_rooms();
          guests_btn.classList.remove('d-none');
          reset_btn.classList.remove('d-none');

        }
      }
      function guests_clear(){
        adults.value='';
        childrens.value='';
        guests_btn.classList.add('d-none');
        fetch_rooms();
      }
      function location_clear(){
        locationInput.value='';
        location_btn.classList.add('d-none');
        fetch_rooms();
      }
      function facilities_clear(){
        let get_facilities=document.querySelectorAll('[name="facilities"]:checked');
        get_facilities.forEach((facility)=>{
            facility.checked=false;
          });
        facilities_btn.classList.add('d-none');
        fetch_rooms();
      }
      function reset_all(){
        check_avail_clear();
        guests_clear();
        facilities_clear();
        reset_btn.classList.add('d-none');

        fetch_rooms();
      }


      fetch_rooms();

    </script>

    <?php require('inc/footer.php')?>


        



</body>
</html> 