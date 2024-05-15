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
    <title>Admin Panel - records</title>
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
               <h3 class="mb-4"><h3 class="mb-4">Booking Records </h3> </h3> 
               <!-- general setting -->
               <div class="card  border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive" style=" overflow-y: scroll;">
                            <table class="table table-hover border ">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">User Details</th>
                                    <th scope="col">Room Details</th>
                                    <th scope="col">Bookings Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">
                                </tbody>
                            </table>
                        </div>
                        <nav class="mt-2">
                            <ul class="pagination" id="table-pagination">
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php
        require('inc/scripts.php');
    ?>
    <script>
       function get_bookings(page = 1) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/booking_records.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
        xhr.onload = function() {
            if (xhr.status === 200) {
                
                let data=JSON.parse(xhr.responseText);
                document.getElementById('table-data').innerHTML = data.table_data;
                document.getElementById('table-pagination').innerHTML = data.pagination;

            } else {
                console.error('Request failed. Status:', xhr.status);
            }
        };
        
        xhr.send('get_bookings&page=' + page);
    }
    function change_page(page) {
        get_bookings(page);
    }
    function download(id) {
        window.location.href= 'generate_pdf.php?gen_pdf&id='+id;
    }

    window.onload = function() {
        get_bookings();
    };

                
        
        
        
    </script>
</body>
</html>