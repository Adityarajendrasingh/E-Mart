<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | www.emart.com</title>
 	<?php 
	  
	 	include('links.php');
  	?>
	<meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
</head>
<?php include('header_cart.php');?>

<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: user_login.php');
}
?>
<!--/Header-->
<body>
  	<section id="login">
    	<div class="container" style="width:90%;">
			<div class="password_verification my-3">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="col-left">
							<div class="reg-img">
								<img src="images/phone_verifi.png" class="img-fluid rounded" alt="">
							</div>
						</div>
					</div>     
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="col-right">
							<form class="form" id="form" action="user_register.php" method="POST">
								<div class="header">
									<span class="mt-1" style=" font-family: 'Rubik', sans-serif;font-size:20px;">Enter the vertification code we just sent you on your email address.</span>
								</div>
								<hr>
								<div class="form-group">
									<h4 style=" font-family: 'Baloo Thambi 2', cursive;font-size:26px;">OTP</h4>
									<input class="form-control" type="number" name="otp" placeholder="Enter code" required>
								</div>
								<span class="" style="font-family: 'Raleway', sans-serif;font-size:18px;">If you didn't receive a code! <a href="">Resend</a></span>
								
								<div class="form-action">
									<button class= "btn btn-info w-100 mt-2"type="submit" name="check-reset-otp" value="Submit">Continue</button>
								</div>
							</form>   
						</div>
					</div>
				</div>
			</div>  
      	</div>
    </section>
	 <?php include('footer.php');?>
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
   
<!--<script src="js/login.js"></script> -->
  

    
<!--End of Login page-->
