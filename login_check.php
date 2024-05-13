<?php
include('db.php');
session_start();
if(isset($_POST['email']) && $_POST['password']){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$res=mysqli_query($con,"select * from user where email='$email' and password='$password'");
	$check=mysqli_num_rows($res);
	$u_fetch=mysqli_fetch_assoc($res);
	if($check>0){
			echo "done";
			$_SESSION['IS_LOGIN']=1;
			$_SESSION['u_id']=$u_fetch['sr_no'];
			$_SESSION['u_name']=$u_fetch['name'];
		}
	}else{
		echo"Please enter corect login details";
	}

?>
