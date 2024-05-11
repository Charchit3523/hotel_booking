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
    <title>Admin Panel - Features and Facilities</title>
    
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
               <h3 class="mb-4"> Features and Facilities</h3> 
               <!-- features -->
               <div class="card  border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align_items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>
                    
                        <div class="table-responsive-md" style="height:350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- facilities -->
                <div class="card  border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align_items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                    
                        <div class="table-responsive-md" style="height:350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="40%">Description</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> 
    </div>
        

      <!-- Feature modal -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Features</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            
                            <label class="form-label">Name</label>
                            <input name="feature_name" type="text"  class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <!-- Facility modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility_s_form"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Facilities</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input name="facility_name" type="text" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input name="facility_icon" type="file" accept=".svg" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" >Description</label>
                            <textarea name="facility_description" class="form-control shadow-none" rows="3" required></textarea>
                        </div>
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



   

    <?php
        require('inc/scripts.php');
    ?>
<script> 
    
let feature_s_form = document.getElementById('feature_s_form');
let facility_s_form = document.getElementById('facility_s_form');
feature_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_feature();
});

function add_feature() {
    let data = new FormData();
    data.append('name', feature_s_form.elements['feature_name'].value);
    data.append('add_feature', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var myModal = document.getElementById('feature-s');
            var modal = new bootstrap.Modal(myModal);
            modal.hide();
            console.log(xhr.responseText);

            if (xhr.responseText.trim() === '1') {
                alert('success', 'New Feature added!');
                feature_s_form.elements['feature_name'].value = '';
                get_features();
            } else {
                alert('error', 'Upload failed');
            }
        } else {
            console.error('Request failed with status: ' + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error('Request failed');
    };

    xhr.send(data);
}
function get_features(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('features-data').innerHTML =this.responseText;
    }

    xhr.send('get_features');
}
function rem_feature(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function(){
        console.log('Response received:', this.responseText);
        if (this.responseText == 1) {
            alert('success', 'Feature removed');
            get_features();
        } 
        else if(this.responseText == 'room_added') {
            alert('feature is added in a room');
        }
        else {
            alert('error', 'Server error');
        }
    };

    xhr.send('rem_feature=' + val);
}
facility_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_facility();
});
function add_facility() {
    let data = new FormData();
    data.append('name', facility_s_form.elements['facility_name'].value);
    data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
    data.append('desc', facility_s_form.elements['facility_description'].value);

    data.append('add_facility', '');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var myModal = document.getElementById('facility-s');
            var modal = new bootstrap.Modal(myModal);
            modal.hide();
            console.log(xhr.responseText);

            if (xhr.responseText.trim() === '1') {
                alert('success', 'New Facility added!');
                facility_s_form.reset();
                get_facilities();
                
            } else if(xhr.responseText.trim() === 'inv_img'){
                alert('error', 'invalid image only svg image can be uploaded');
            }
            else if(xhr.responseText.trim() === 'inv_size'){
                alert('error', 'image should be less than 1mb');
            }
            else{
                alert('error', 'upload failed');
            }
        } else {
            console.error('Request failed with status: ' + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error('Request failed');
    };

    xhr.send(data);
}
function get_facilities(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('facilities-data').innerHTML =this.responseText;
    }

    xhr.send('get_facilities');
}
function rem_facility(val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/features_facilities.php", true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onload = function(){
        console.log('Response received:', this.responseText);
        if (this.responseText == 1) {
            alert('success', 'Facility removed');
            get_facilities();
        }
        else if(this.responseText == 'room_added'){
            alert('error', 'facility added in room');
        }
        else {
            alert('error', 'Server error');
        }
    };

    xhr.send('rem_facility=' + val);
}

window.onload = function() {
    get_features(); 
    get_facilities();
};

        

</script>
</body>
</html>