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
<!--/Header-->

<!--Login page-->
<body>
	<section id="login">
		<div class="container" style="width:90%;">
			<div class="forgot_password my-3" >
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="col-left">
						<div class="reg-img">
							<img src="images/forgot_password.jpg" class="img-fluid rounded mx-auto d-block" alt="">
						</div>
					</div>
				</div>     
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="col-right">
						<form class="form" id="form" action="user_register.php" method="POST">
							<div class="header d-flex">
								<img src="images/emart_logo.PNG" class="img-fluid" style="width: 150px;" alt="">
								<span class="mx-2 mt-3"style=" font-family: 'Rubik', sans-serif;font-size:20px;">Enter your registered email below to receive password reset instruction</span>
							</div>
							<hr>
							<div class="form-group">
							<h4 style=" font-family: 'Baloo Thambi 2', cursive;">Enter your email address</h4>
								<input class="form-control" type="email" name="email" placeholder="Enter email address" required >
							</div>
							<div class="form-action">
								<button class="btn btn-info w-100" type="submit" name="check-email" value="Continue">Continue</button>
							</div>
						</form>   
					</div>
				</div>
			</div>
			</div>
		
		</div>
	</section>
	<?php include('footer.php'); ?>
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
<!--<script src="js/login.js"></script> -->
  

    
<!--End of Login page-->
