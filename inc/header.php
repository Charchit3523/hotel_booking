<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');


$contact_q="SELECT * FROM `contact_details` WHERE `sr_no`=?";
$values=[1];
$contact_r = mysqli_fetch_assoc(select( $contact_q,$values,'i'));


?>
<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 " href="index.php"> <img src="images/carousel/logo.png"class=" align-middle fs-3" width="100px"> Hotel Booking</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link me-2" href="rooms.php">Rooms</a>
        </li>
        <li class="nav-item">
            <a class="nav-link me-2" href="facilities.php">Facilities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link me-2" href="contact.php">Contact us</a>
        </li>
        
         
        </ul>
        <div class="d-flex">
         <?php
            session_start();
            if(isset($_SESSION['IS_LOGIN'])){
                echo<<<data
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-dark shadow none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <i class="bi bi-person-square  me-2" ></i>
                    {$_SESSION['u_name'] }
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>

                data;
            }
            else{
                echo<<<data
                <button onclick="redirect('login.php')" id="login" type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Login
                </button>
                <script type="text/javascript">
                    document.getElementById("login").onclick = function () {
                        location.href = "login.php";
                    };
                </script>
                <button type="button" id="register" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                    Register
                </button>   
                <script type="text/javascript">
                    document.getElementById("register").onclick = function () {
                        location.href = "registration.php";
                    };
                </script>   
                data;
            }
            
         ?>   
           
        </div>
    </div>
    </div>
</nav>
