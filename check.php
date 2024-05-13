<?php
include('db.php');
$id=mysqli_real_escape_string($con,$_GET['id']);
mysqli_query($con,"UPDATE `user` SET `verification_status`='1' WHERE  verification_id='$id'");
echo "Your account verified";
?>
<a href="login.php"> Click here for Login<a/>
