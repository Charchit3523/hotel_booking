<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<?php require('inc/links.php')?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		background: #63738a;
		
		
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h1{
		color: #636363;
        margin: 0 0 15px;
		
		text-align: center;
    }
	
	
	
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
	.signup-form .message{
		color:red;
	}
	.form-group{
		text-align: center;
	}
	.pass{
		font-size: 13px;
		
	}
</style>
</head>
<body>

<div class="signup-form ">

	
    <form method="post">
		<h1 class="me-3"><img src="images/carousel/logo.png" width="70px">Hotel Booking</h1>
		<hr>
		<h2 class="mt-4">Login</h2>
		<p class="hint-text mt-3">Enter your email id and password.</p>
         
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
		
		<div class="form-group">
            <button type="button" class="btn text-white shadow-none custom-bg" onclick="login_now()">Login Now</button>
			<button type="reset" class="btn text-secondary shadow-none ms-6 mb-2" data-bs-dismiss="modal">Cancel</button><br><br>
			<a href="forgetpassword.php" class="pass  mt-3">Forgot password</a>
        </div>
		<div class="message"></div>
    </form>
	<div class="text-center">Create a account? <a href="registration.php">Sign up</a></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
function login_now(){
	var email=jQuery('#email').val();
	var password=jQuery('#password').val();
	
	jQuery.ajax({
		url:'login_check.php',
		type:'post',
		data:'email='+email+'&password='+password,
		success:function(result){
			if(result=='done'){
				window.location.href='index.php';
			}
			jQuery('.message').html(result);
		}
	});
}

 
</script>
</body>
</html>                            