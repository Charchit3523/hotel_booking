<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel-Dashboard</title>
    <?php
        require('inc/links.php');
    ?>
</head>
<body class="bg-light">

    <?php
        require('inc/header.php');
        $current_bookings=mysqli_fetch_assoc(mysqli_query($con,"SELECT 
            COUNT(CASE WHEN booking_status='Booked' AND arival=0 THEN 1 END) AS `new_bookings`,
            COUNT(CASE WHEN booking_status='cancelled' AND refund=0 THEN 1 END) AS `refund_bookings`
            FROM `booking_order`"));
        $unread_queries=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS 'count' 
            FROM `user_queries` WHERE `seen`=0"));
        $unread_reviews=mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS 'count' 
            FROM `rating_review` WHERE `seen`=0"));
        
    
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden" >
              <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>
                        Dashboard
                    </h3>
                </div>
               <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <a href="new_bookings.php" class="text-decoration-none">
                            <div class="card text-center text-dark p-3">
                                <h6>New Bookings</h6>
                                <h1 class="mt-2 mb-0"><?php echo $current_bookings['new_bookings']?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="refund_bookings.php" class="text-decoration-none">
                            <div class="card text-center text-dark p-3">
                                <h6>Refund Bookings</h6>
                                <h1 class="mt-2 mb-0"><?php echo $current_bookings['refund_bookings']?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="user_queries.php" class="text-decoration-none">
                            <div class="card text-center text-dark p-3">
                                <h6>User Queries</h6>
                                <h1 class="mt-2 mb-0"><?php echo $unread_queries['count']?></h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="rate_review.php" class="text-decoration-none">
                            <div class="card text-center text-dark p-3">
                                <h6>Reviews</h6>
                                <h1 class="mt-2 mb-0"><?php echo $unread_reviews['count']?></h1>
                            </div>
                        </a>
                    </div>
                    
               </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>
                        Booking Analytics
                    </h5>
                    
                </div>
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        
                        <div class="card text-center text-dark p-3">
                            <h6>Total Bookings</h6>
                            <h1 class="mt-2 mb-0" id="total_bookings">0</h1>
                            
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        
                        <div class="card text-center text-dark p-3">
                            <h6>Active Bookings</h6>
                            <h1 class="mt-2 mb-0"id="active_bookings">5</h1>
                            
                        </div>
                        
                    </div>
                        
                    <div class="col-md-3 mb-4">
                        <div class="card text-center text-dark p-3">
                            <h6>Cancelled Bookings</h6>
                            <h1 class="mt-2 mb-0 "id="cancelled_bookings">0</h1>
                            
                        </div>
                    </div>
                        
                    
                        
                    
               </div>

              


            </div>
        </div>
    </div>
    <?php
        require('inc/scripts.php');
    ?>
    <script>
        function booking_analystics(period=1) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/dashboard.php", true); 
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                console.log(this.responseText);
             let data=JSON.parse(this.responseText);
             console.log(data);
             document.getElementById('total_bookings').textContent = data[0].total_bookings;
            document.getElementById('active_bookings').textContent = data[0].active_bookings;
            document.getElementById('cancelled_bookings').textContent = data[0].cancelled_bookings;



             
              
            }
            xhr.send('booking_analytics&period=' + period);
        }

        window.onload=function(){
            booking_analystics();
        }
    </script>
</body>
</html>