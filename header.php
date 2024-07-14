<?php 
include('dbconnection.php');
session_start();
include('links.php');
if(isset($_SESSION['Uid']))
{
	$res = mysqli_query($mysqli,"SELECT * FROM cart where user_id = '".$_SESSION['Uid']."' ")or die(mysql_error($mysqli));
	$num = mysqli_num_rows($res);
}
?>
<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | E-Mart.com</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php include('links.php'); ?>
</head>
<body>
<!--Header-->
	<header id="header"> 
		<div class="head ">
			<div class="row  mx-2">
				<div class="address col-xl-3 col-md-3 col-sm-6">
					<p class="mt-2">321 Awesome Street India</p>
				</div>
				<!--Language Support-->
				<div class="language col-xl-3 col-md-2 col-sm-6 ">
					<div class="dropdown m-2" style="color: rgb(39, 39, 39);">
						<a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(39, 39, 39);"  >
							Language
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">English (UK)</a>
							<a class="dropdown-item" href="#">Hindi</a>
							<a class="dropdown-item" href="#">Marathi</a>
						</div>
					</div>
				</div>
				<!--/Language Support-->

				<!--Subheader-->
				<div class="my-2 sub-header col-xl-6 col-md-8 col-sm-12 d-flex text-nowrap">
				<?php 
					
					if(isset($_SESSION['Uname']))
					{
				?>
					<div class="dropdown">
						<a class=" dropdown-toggle px-3  border-right border-left" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(39, 39, 39);"  >
							<?php echo $_SESSION['Uname']; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="myaccount.html"> <i class="fas fa-user mr-1 "   style="font-size:16px;color:#0d6efd"></i> My account</a>
							<a class="dropdown-item" href="myorder.html"> <i class="fas fa-shopping-bag mr-1"   style="font-size:16px;color:#0d6efd"></i> Order</a>
							<a class="dropdown-item" href="chatbot.php"> <i class="fal fa-comment-lines"></i><i class="far fa-comments mr-1"  style="font-size:16px;color:#0d6efd"></i> Chat</a>
							<a class="dropdown-item" href="wishlist.html"> <i class="fas fa-heart mr-1"   style="font-size:16px;color:#0d6efd"></i> Wishlist</a>
							<a class="dropdown-item" href="user_logout.php"><i class="fas fa-power-off mr-1"  style="font-size:16px;color:#0d6efd"></i>&nbsp;Logout</a>
						</div>
					</div>				
				<?php
					}
					else
					{
				?>
				<!--after login-->
					<!--Login -->
					<!-- Button trigger modal -->
					<a href="#" class="px-3  border-right border-left text-dark" data-toggle="modal" data-target="#exampleModalCenter"> Login</a>
					<!-- Modal For Login -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-2" role="dialog" aria-labelledby="exampleModalCenterTitle"data-backdrop="static" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">        
								<div class="modal-body">
									<button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true" class="float-right">&times;</span>
									</button>
									<!--form-->
									<form class="form py-2 px-3" id="form"  method="POST" action="user_login.php">
										<div class="header m-auto" >
											<a href=""><img src="" alt=""></a>
											<h6 style="display: inline;font-family: 'Rubik',sans-serif;">Are you a New Customer?</h6>
											<a href="" class="float-right px-3" data-toggle="modal" data-target="#exampleModalCenterRegister" data-dismiss="modal">SignUp Here</a>
										</div>
										<hr>
										<div class="form-group">
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Email ID</h5>
											<input type="email" class="form-control br-radius-zero" name="lemail" id="lemail" placeholder="Email ID" required />
											<i class="fa fa-check-circle"></i>
											<i class="fa fa-exclamation-circle"></i>
											<small>Error message</small>
										</div>
										<div class="form-group" style="margin-bottom:0px; padding-bottom:8px;">
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Password</h5>
											<input type="password" class="form-control br-radius-zero" name="password" id="password" placeholder="Password" required />
											<i class="fa fa-check-circle"></i>
											<i class="fa fa-exclamation-circle"></i>
											<small>Error message</small>
										</div>
										<a href="user_forgotpassword.php" >Forgot password?</a>
										<div class="form-action" style="padding-top:16px;">
											<button type="submit" name="login" id="submit" class="btn btn-outline-primary w-100">Login</button>
										</div>
									</form> 
								</div>  
							</div>
						</div>
					</div>
					<!-- / Login -->
					

					<!--Register -->
					<a href="#" class="px-3 border-right text-dark" data-toggle="modal" data-target="#exampleModalCenterRegister">Register</a>
					<div class="modal fade" id="exampleModalCenterRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true" data-backdrop="static">
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<div class="modal-body">
									<button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true" class="float-right">&times;</span>
									</button>
									<div class="header" >
										<h5 class="text-center border-bottom mb-1 pb-2" style="font-family: 'Rubik', sans-serif; top:0;">Look like you're new here!</h5>
									</div>
									<form class="form mb-0 py-2 px-3" id="form" action="user_register.php"  method="POST">
										<div class="form-group  ">
											<div class="row">
												<div class="col">
												  <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">First Name</h5>
												  <input type="text" class="form-control w-100" placeholder="First name" name="fname">
												  <i class="fa fa-exclamation-circle"></i>
												  <small>Error message</small>
												</div>
												<div class="col">
												  <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Last Name</h5>
												  <input type="text" class="form-control w-100" placeholder="Last name"  name="lname">
												  <i class="fa fa-exclamation-circle"></i>
												  <small>Error message</small>
												</div>
											</div>
										</div>
										<div class="form-group">
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Mobile Number</h5>
											<input type="number" class="form-control br-radius-zero" name="mobno" id="mobile" placeholder="10-Digit Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)"  minlength="10" maxlength="10"  title="Please enter a valid mobile number" required />
											<i class="fa fa-exclamation-circle"></i>
											<small>Error message</small>
										</div>
										<div class="radio-group pt-1 " style="font-family: 'Raleway', sans-serif;"> 
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Gender</h5>               
											<label class="radio-inline pr-2 ">
											  <input type="radio" name="gender" value="male" checked required > Male
											</label>
											<label class="radio-inline pr-2">
											  <input type="radio"name="gender" value="female" > Female
											</label>
											<label class="radio-inline pr-2">
											  <input type="radio" name="gender" value="other"> Other
											</label>
										</div>  
										<div class="form-group">
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Email ID</h5>
											<input type="email" class="form-control br-radius-zero"  name="email" id="email" placeholder="Email ID"   title="Please enter valid and active Email Id"  maxlength="25" required  />
											<i class="fa fa-exclamation-circle"></i>
											<small>Error message</small>
										</div>
										<div class="form-group">
											<h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Create Password</h5>
											<input type="password" class="form-control br-radius-zero"   name="password" id="password" placeholder="Password"   onkeypress="return event.charCode != 32" minlength="6"  maxlength="25" required />
											<i class="fa fa-exclamation-circle"></i>
											<small>Error message</small>
										</div>
										
										<div class="form-action pt-2">
											<input type="submit" style="font-family: 'Baloo Thambi 2', cursive;letter-spacing: .5px;" value="Register" name="register" class="btn btn-outline-info w-100" id="submit"/>
										</div>
										
										<a href=""  style="font-family: 'Baloo Thambi 2', cursive;letter-spacing: .5px;" class="btn btn-outline-primary w-100 mt-2" data-toggle="modal" data-target="#exampleModalCenter" data-dismiss="modal" >Existing User? Login Here</a>
									</form>
								</div>  
							</div>
						</div>
					</div>
					<!-- / Register -->
					<?php } ?>
				<!--Wishlist -->
					<?php 
				     
				      	if(empty($_SESSION['Uid'])){

          			?>
          			
					<a href="#" onclick="loginagain()" class=" px-3 border-right text-dark text-norawp">My Wishlist <span class=" px-2 py-1 text-black font-weight-bold rounded-pill" style="background-color: #d6d6d6"> 0 </span>
					<div class="empty_checkout">
						<template id="my-template">
							<swal-title>
								Please Login to get access of your wishlist!
								</swal-title>
								<swal-icon type="warning" color="warning"></swal-icon>
								<swal-button type="confirm">
								<a href="user_login.html" class="px-3  text-white"> Login</a>
								</swal-button>
								<swal-button type="cancel">
								Cancel
								</swal-button>
								<swal-param name="allowEscapeKey" value="false" />
								<swal-param
								name="customClass"
								value='{ "popup": "my-popup" }' />
						</template>
					</div>
                    </a>
					<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
					<script type="text/javascript">
					function loginagain(){
						Swal.fire({
								template: '#my-template'
								});
					}
					</script>
          			<?php } else {

          				$sql = $mysqli->query("select * from wishlist where user_id = '".$_SESSION['Uid']."'");
				      	$res = mysqli_num_rows($sql);
          				?>
          				<a href="wishlist.html" class="px-3 border-right text-dark text-norawp">My Wishlist <span class=" px-2 py-1 text-black font-weight-bold rounded-pill" style="background-color: #d6d6d6"> <?php echo $res ?></span></a>
          			<?php } ?>
				<!--/Wishlist -->
					<a href="contact_us.php" class="px-3 border-right text-dark text-norawp">Contact Us</a>
					<!--Admin Login -->
					<!-- Button trigger modal -->
					<a href="admin_login.php" class="px-3  border-right border-left text-dark"> Admin Login</a>
				
					<!-- /Admin Login -->
				</div>
			</div>
		</div>
		<div class="container-fluid mx-auto mb-1" style="background-color:#74e8fc;">
			<div class="head d-flex justify-content-between  px-4 py-1">

				<!--Logo -->
				<a href="index.html">  <img src="images/emart_logo.png" class="img-fluid" alt="" style="width:55px"></a>
				<!--/Logo -->

				<!--Searchbar-->
			
				<form class="d-flex m-auto w-50" action="search.php" method="GET">
					<input type="text" class="form-control" name="search" id="searchbox" placeholder="Search for products,brands and more" value="<?php echo @$_GET['search']; ?>">
					<a href="search.php"><button class="btn btn-outline-primary mx-2" type="submit" name="searchbtn"><i class="fa fa-search"></i></button></a>
				</form>
				<!--/Searchbar-->

				<div class="contact mt-3 mx-1 m-auto">
					<a href="" class="" style="font-size: large;font-weight: 600;color: rgb(39, 39, 39);">Call 1300 00X XXX</a>
				</div>

				<!--Cart-->
				<div class="cart my-auto" >
					<a href="cart.html" class="py-2 my-4 rounded-pill" style="background-color: rgb(6, 57, 112);">
						<?php if(empty($_SESSION['Uname']))  
					{?>
					<span class="px-2 text-white"><i class="fa fa-shopping-cart fa-1x"></i></span>
					
						
					<?php } else {?>
						<span class="px-2 text-white"><i class="fa fa-shopping-cart fa-1x"></i></span>
					<span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo $num ??'0';?></span>
					<?php } ?>
					</a>


				</div>
				
				<!--/Cart-->
			</div>
		</div>
	</header>

  <!--/Header-->