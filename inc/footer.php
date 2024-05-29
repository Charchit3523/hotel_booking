<div class="container-fluid bg-white mt-5">
    <div class="row">
    <div class="col-lg-4 p-4">
        <h3 class="h-font fw-bold fs-3 mb-2"> Hotel booking</h3>
        <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
       Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, quia?
        </p>

    </div>
    <div class="col-lg-4 p-4">
        <h5 class="mb-3">Links</h5>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
        <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
        <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Room</a><br>
        <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
        <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a><br>
    </div>
    <div class="col-lg-4 p-4">
        <h5>Follow us</h5>
        <?php
        if ($contact_r['tw'] != '') {
            echo <<<data
            <a href="{$contact_r['tw']}" class="d-inline-block text-dark text-decoration-none mb-2">  
                
                    <i class="bi bi-twitter-x me-1"></i> Twitter
                
            </a>
            data;
        }
        ?><br>
        <a href="<?php echo $contact_r['fb']?>" class="d-inline-block  text-dark text-decoration-none mb-2 ">  
            <i class="bi bi-facebook me-1"></i> Facebook      
        </a><br>
        <a href="<?php echo $contact_r['insta']?>" class="d-inline-block  text-dark text-decoration-none mb-2 ">  
            <i class="bi bi-instagram      me-1"></i> Instagram        
        </a><br>

    </div>
    <h6 class="text-center bg-dark text-white p-3 m-0"> Creaated by infamous</h6>

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    function setActive() {
        let navbar = document.getElementById('nav-bar');
        let aTags = navbar.getElementsByTagName('a');

        for (let i = 0; i < aTags.length; i++) {
            let file = aTags[i].href.split('/').pop();
            let fileName = file.split('.')[0];
            if (document.location.href.indexOf(fileName) >= 0) {
                aTags[i].classList.add('active');
            }
        }
    }
    setActive();
</script>


<script>
    function checkLoginToBook(satus,room_id){
        if(satus){
        window.location.href = 'confirm_booking.php?id=' + room_id;
    } else {
        alert('Please login to book!');
    }
}
    
</script>