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
    <title>Admin Panel - new-bookings</title>
    <?php
        require('inc/links.php');
    ?>
</head>
<body class="bg-light">
    <?php
        require('inc/header.php');
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row ">

            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4"><h3 class="mb-4">New Booking </h3> </h3> 
               <!-- general setting -->
               <div class="card  border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-md" style="height:450px; overflow-y: scroll;">
                            <table class="table table-hover border "style="height:450px; overflow-y: scroll;>
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">User Details</th>
                                    <th scope="col">Room Details</th>
                                    <th scope="col">Bookings Details</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                </tbody>
                            </table>
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
        function get_bookings(){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/new_bookings.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('table-data').innerHTML = xhr.responseText;
                } else {
                    console.error('Request failed. Status:', xhr.status);
                }
            };
            
            xhr.send('get_bookings');
        }
        function cancel_booking(id) {
                if(confirm("Are you sure you want to remove booking?")) {
                    let data=new FormData();
                    data.append('booking_id', id);
                    data.append('cancel_booking','');

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/new_bookings.php", true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            if(this.responseText==1){
                                alert('success','Booking canceled');
                                get_bookings();
                            }else{
                                alert('error','server down');
                            }
                        } else {
                            console.error('Request failed. Status:', xhr.status);
                        }
                };
                
                xhr.send(data);
            }          
        }

        window.onload = function() {
            get_bookings();
        };

                
        
        
        
    </script>
</body>
</html>