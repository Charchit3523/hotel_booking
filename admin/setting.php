<?php
require('inc/essentials.php');
adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel-Setting</title>
    <?php
        require('inc/links.php');
    ?>
</head>
<body class="bg-light">
    
    <?php
        require('inc/header.php');
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden" >
               <h3 class="mb-4">Settings</h3> 
               <!-- general setting -->
               <div class="card" >
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i>Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-2 mb-1 fw-bold">Site title</h6>
                        <p class="card-text" id="site_title"> </p>
                        <h6 class="card-subtitle mb-2 mb-1 fw-bold">About us</h6>
                        <p class="card-text" id="site_about"> </p>
                    </div>
                </div>
                 <!-- general modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form >

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" >General Setting</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label  class="form-label">Site Title</label>
                                        <input name="site_title" type="text" class="form-control shadow-none">
                                    </div>
                                    <div class="mb-3">
                                        <label  class="form-label">About us</label>
                                        <textarea name="side_about" class="form-control shadow-none" rows="6" ></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn custom-bg text-white shadow-none">Submit</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
                <div class="card" >
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Shutdown website</h5>  
                        <div class="form-check form-switch">
                            <form >
                                <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                            </form>
                            
                            
                        </div>       
                    </div>No customers to be allowed to book hotel room </p>
                    
                </div>
            </div>

            </div>
            <!-- Shutdown section -->
            
    </div>
    </div>
    <?php
        require('inc/scripts.php');
    ?>
    <script>
        let general_data;
        function get_general(){
            let site_title=document.getElementById('site_title');
            let site_about=document.getElementById('site_about');
            
            let xhr=new XMLHttpRequest();
            xhr.open("POST","ajax/settings_curd.php",true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onload= function(){
                general_data= JSON.parse(this.responseText);
                site_title.innerText=general_data.site_title;
                site_about.innerText=general_data.site_title;
                // console.log(general_data);
            }
            xhr.send('get_general');
        }
  
        window.onlode=function(){
            get_general();
        }
    </script>
</body>
</html>