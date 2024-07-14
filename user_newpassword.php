
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
   <style type=css/text>
   .form-group h4
   {
	font-family: 'Baloo Thambi 2', cursive;
	font-size:26px;
	margin-bottom:0px;
   }
   </style>

   
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
			<div class="newpassword my-3">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="col-left">
							<div class="reg-img">
								<img src="images/set_password.jpg"  class="img-fluid rounded"alt="">
							</div>
						</div>
					</div>     
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="col-right">
							<form class="form" id="form" action="user_register.php" method="POST">
								<div class="header">
									
									<span class="text-capitalize" style=" font-family: 'Rubik', sans-serif;font-size:20px;">Your new password must be different from previously used password.</span>
								</div>
								<hr>
								<div class="form-group">
									<h4 class="mb-0">Password</h4>
									<input class="form-control" type="password" name="password" placeholder="Create new password" required>
								</div>
								<div class="form-group">
									<h4 class="mb-0">Confirm Password</h4>
									<input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
								</div>
								<div class="form-action">
									<button class="btn btn-success w-100" type="submit" name="change-password" value="Change">Change</button>
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

