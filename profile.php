<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System-profile</title>
    
  <?php require('inc/links.php')
  ?>
 
    
   
   
</head>
<body class="bg-light">
   <?php require('inc/header.php');
   if(!(isset($_SESSION['IS_LOGIN']))){
    redirect('index.php');
  }
   
  $u_exist=select("SELECT * FROM `user` WHERE `sr_no`=? LIMIT 1",[$_SESSION['u_id']],'s');
  if(mysqli_num_rows($u_exist)==0){
    redirect('index.php');
  }
  $u_fetch=mysqli_fetch_assoc($u_exist);
   
   ?>
 

  
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb-5 px-4">
        <h2 class="fw-bold ">Profile</h2>
        <div style="font-size:14px;">
          <a href="index.php" class="text-secondary text-decoration-none">Home</a>
          <span class="text-secondary"> > </span>
          
          <a href="#" class="text-secondary text-decoration-none">Profile</a>
        </div>
      </div>
      <div class="col-12 mb-5 mb-5 px-4">
        <div class="bg-white p-3 p-md-4 rounded shadow-sm">
          <form id="info-form" >
            <h5 class="mb-3 fw-bold">Basic Information</h5>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label  class="form-label">Name</label>
                <input name="name" type="text" value="<?php echo $u_fetch['name']  ?>"class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label  class="form-label">Phone number</label>
                <input name="phonenum" value="<?php echo $u_fetch['pn']  ?>" type="number" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-4">
                <label  class="form-label">Address</label>
                <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $u_fetch['address'] ?> </textarea>
              </div>
            </div>
            <button type="submit"  class="btn text-white custom-bg shadow-none">
                Save Changes
            </button>
          </form>
        </div>
      </div>
   
      
      

      
      
    </div>
</div>

<?php require('inc/footer.php')?>

<script>
    let info_form = document.getElementById('info-form');
    info_form.addEventListener('submit', function(e) {
        e.preventDefault();

        let data = new FormData();
        data.append('info_form', '');
        data.append('name', info_form.elements['name'].value);
        data.append('phonenum', info_form.elements['phonenum'].value);
        data.append('address', info_form.elements['address'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/profile.php", true);

        xhr.onload = function() {
            console.log('Response:', this.responseText); // Debug statement
            if (this.responseText == 'phone_already') {
                alert('Phone number is already taken');
            } else if (this.responseText == 0) {
                alert('No changes made');
            } else {
                window.location.href = "profile.php";
            }
        }

        xhr.send(data);
    });
</script>




</body>
</html> 