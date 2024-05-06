<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-contact</title>
    
  <?php require('inc/links.php')?>
    
   
   
</head>
<body class="bg-light">
   <?php require('inc/header.php')?>

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>1
    <p class="text-center mt-3">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi molestiae impedit dolorem <br>iste blanditiis et quasi! Nostrum, officiis reprehenderit.

    </p>

  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6  px-4">

       <iframe class="w-100 rounded mb-4" height="360pz"  src="<?php echo $contact_r['iframe']?>" loading="lazy" ></iframe>
        <h5>Call Us</h5>
        <a href="tell: +<?php echo $contact_r['pn1']?>" class="d-inline-block mb-2 text-decoration-none text-dark">  
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
        <h5 class="mt-4">Email</h5>
        <a href="mailto: maharjancharchit11@gmail.com" class="d-inline-block  text-decoration-none text-dark">
        <i class="bi bi-envelope-fill"></i> <?php echo $contact_r['email']?>
        </a>
        <h5 class="mt-4">Follow us</h5>
        <?php
        if ($contact_r['tw'] != '') {
            echo <<<data
            <a href="{$contact_r['tw']}" class="d-inline-block text-dark text-decoration-none mb-2">  
                
                    <i class="bi bi-twitter-x me-1"></i> Twitter
                
            </a>
            data;
        }
        ?>  <br>
        <a href="<?php echo $contact_r['fb']?>" class="d-inline-block  text-dark text-decoration-none mb-2 ">  
            <i class="bi bi-facebook me-1"></i> Facebook      
        </a><br>
        <a href="<?php echo $contact_r['insta']?>" class="d-inline-block  text-dark text-decoration-none mb-2 ">  
            <i class="bi bi-instagram      me-1"></i> Instagram        
        </a>
      </div>
      <div class="col-lg-6 col-md-6  px-4">
        <div class="bg-white rounded shadow p-4 ">
          <form >
            <h5>Send a message</h5>
            <div class="mt-3">
                <label  class="form-label " style="font-weight: 500;">Name</label>
                <input type="text" class="form-control shadow-none" >
            </div>
            <div class="mt-3">
                <label  class="form-label " style="font-weight: 500;">Email</label>
                <input type="email" class="form-control shadow-none" >
            </div>
            <div class="mt-3">
                <label  class="form-label " style="font-weight: 500;">Subject</label>
                <input type="text" class="form-control shadow-none" >
            </div>
            <div class="mt-3">
                <label  class="form-label " style="font-weight: 500;">Message</label>
                <textarea name="address" class="form-control shadow-none" rows="5" style="resize:none;"></textarea>
            </div>
            <button type="submit" class="btn text-white custom-bg mt-3 ">
                Send
            </button>
          </form>
        </div>
     </div>
  </div>

    <?php require('inc/footer.php')?>


        



</body>
</html> 