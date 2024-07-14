<?php

session_start();
include('dbconnection.php');
	
if(isset($_POST['admin_login']))
{
 	$email=  $_POST['email'];
	$password = $_POST['password'];
    $sql=("SELECT * FROM admin WHERE email ='$email' AND password='$password'")
	or die($mysqli->error);
	$result12 = mysqli_query($mysqli,$sql);
	$count = mysqli_num_rows($result12);
	$check12 = mysqli_fetch_array($result12);
	if($count > 0)
	{
			
		$_SESSION['email'] = $email ;
		$_SESSION['Admin_login'] = 'yes' ;
        $_SESSION['msg'] = ' Successfully Login!!';
		$_SESSION['msg_status'] = 'success';
		echo $_SESSION['msg'];
		echo $_SESSION['msg_status'];
		header('location:/E-Mart/admin_categories.php');


           
	}
	else
	{
		$_SESSION['msg'] = 'Email id or Password is incorrect!!!!';
		$_SESSION['msg_status'] = 'error';
		header('location:/E-Mart/admin_login.php');
		exit();
	
	}
}



?>
		
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Site Metas -->
   <title>Admin | Login</title>  
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">

   <?php include('links.php'); ?>

   <style type="text/css">
 
   	.form-group h4{
   		font-family: 'Rubik', sans-serif; margin-bottom: 0px;color: rgb(105, 105, 105);
   	}
   	@media (min-width: 220px) and (max-width: 768px){
    .col-left{
        display: none;
    }
	.col-right{
		padding-left:2rem;
		padding-right:4rem;
		padding-bottom:1rem;
	}
    .sub-footer{
        border-left:none;
    }
    .left-item{
        display: none;
    }

}
   	
   </style>
    
</head>
<!--Login page-->
<body>
  <section id="login">
    <div class="login container">
        <div class="butn border-bottom text-center mt-3 pb-2">
            <a href="admin_login.php" id="login" class="selected" style=" color:#16b5b0;font-weight: 500;font-size:20px;">Login</a>
           
        </div>
		<div class="admin_login my-4 mx-auto" style=" box-shadow: 2px 2px 10px rgba(0,0,0,0.2); width:90%">
        	<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
					<div class="col-left">
						<div class="reg-img">
							<a href="index.html"><img src="images/admin_login.PNG" class="img-fluid w-100"alt=""></a>
						</div>
					</div>
				</div>     
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="col-right pl-auto pr-4 mx-auto" style="">
						<form class="form" id="form" action="admin_login.php" method="POST">
							<div class="header">
								<a href="index.html"><img src="images/" alt=""></a>
								<h6 style=" font-family: 'Raleway', sans-serif;">Hello Admin!!</h6>
								
							</div>
							<hr>
							<div class="form-group">
								<h4 class="p-0">Email ID</h4>
								<input type="text" class="form-control br-radius-zero" name="email" id="email" placeholder="Email ID"  />
							</div>
							<div class="form-group" style="margin-bottom:0px; padding-bottom:8px;">
								<h4>Password</h4>
								<input type="password" class="form-control br-radius-zero" name="password" id="password" placeholder="Password" />
							</div>
							<a href="user_forgotpassword.php" style="font-family: 'Baloo Thambi 2', cursive;font-size: 20px;text-decoration: none; " >Forgot password?</a>
							<div class="form-action my-2" style="">
								<button type="submit" name="admin_login" id="submit" class="btn btn-primary w-100">Login</button>
							</div>
						</form>   
					</div>
				</div>
			</div>
        </div>
      </div>
    </section>
    <?php include('scriptlinks.php') ?>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<?php
		if(isset($_SESSION['msg']) && $_SESSION['msg']!='')
		{
	  ?>
	  <script>
		swal.fire({
					title:"<?php echo $_SESSION['msg'];?>",
					icon:"<?php echo $_SESSION['msg_status'];?>",
					button:"OK",
			});
	  </script>
	  <?php
	  unset($_SESSION['msg']);
		}
	  ?>

	
	  


</body>
</html>
