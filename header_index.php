<?php
include('dbconnection.php');
session_start();
include('links.php');
if (isset($_SESSION['Uid'])) {
	$res = mysqli_query($mysqli, "SELECT * FROM cart where user_id = '" . $_SESSION['Uid'] . "' ") or die(mysqli_error($mysqli));
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
		<div class="head">
			<div class="header_detail row">
				<div class="address col-xl-3 col-md-3 col-sm-6">
					<p class="my-2">321 Awesome Street India</p>
				</div>
				<!--Language Support-->
				<div class="language col-xl-3 col-md-2 col-sm-6 ">
					<div class="dropdown language-dropdown m-2">
						<a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

					if (isset($_SESSION['Uname'])) {
					?>
						<div class="dropdown user_dropdown">
							<a class=" dropdown-toggle   border-right border-left" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $_SESSION['Uname']; ?>
							</a>
							<div class="dropdown-menu user_dropdown_menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="myaccount.html"> <i class="fas fa-user"></i> My account</a>
								<a class="dropdown-item" href="myorder.html"> <i class="fas fa-shopping-bag"></i> Order</a>
								<a class="dropdown-item" href="chatbot.php"> <i class="far fa-comments"></i> Chat</a>
								<a class="dropdown-item" href="wishlist.html"> <i class="fas fa-heart"></i> Wishlist</a>
								<a class="dropdown-item" href="user_logout.php"><i class="fas fa-power-off"></i>&nbsp;Logout</a>
							</div>
						</div>
					<?php
					} else {
					?>
						<!--after login-->
						<!--Login -->
						<!-- Button trigger modal -->
						<a href="#" class="border-right border-left " data-toggle="modal" data-target="#exampleModalCenter"> Login</a>
						<!-- Modal For Login -->
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="float-right">&times;</span>
										</button>
										<!--form-->
										<form class="form" id="form" method="POST" action="user_login.php">
											<div class="login_header">
												<h6>Are you a New Customer?</h6>
												<a href="" class="float-right px-3" data-toggle="modal" data-target="#exampleModalCenterRegister" data-dismiss="modal">SignUp Here</a>
											</div>
											<hr>
											<div class="form-group">
												<h5>Email ID</h5>
												<input type="email" class="form-control br-radius-zero" name="lemail" id="lemail" placeholder="Email ID" required />
												<i class="fa fa-check-circle"></i>
												<i class="fa fa-exclamation-circle"></i>
												<small>Error message</small>
											</div>
											<div class="form-group">
												<h5>Password</h5>
												<input type="password" class="form-control br-radius-zero" name="password" id="password" placeholder="Password" required />
												<div class="showpass">
													<input class="form-control showpwd" type="checkbox" onclick="togglePassword()">
													<span class="showpass_text">Show password</span>
												</div>
												<i class="fa fa-check-circle"></i>
												<i class="fa fa-exclamation-circle"></i>
												<small>Error message</small>
											</div>
											<a href="user_forgotpassword.php" class="px-0">Forgot password?</a>
											<div class="form-action login-submit-button">
												<button type="submit" name="login" id="submit" class="btn btn-outline-primary w-100 mt-2">Login</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- / Login -->


						<!--Register -->
						<a href="#" class=" border-right text-" data-toggle="modal" data-target="#exampleModalCenterRegister">Register</a>
						<div class="modal fade" id="exampleModalCenterRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
							<div class="modal-dialog " role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="float-right">&times;</span>
										</button>
										<div class="register_header text-center">
											<h6 class="border-bottom mb-1 pb-2">Look like you're new here!</h6>
										</div>
										<form class="form needs-validation" id="register_form" novalidate >
											<div class="form-group  ">
												<div class="row">
													<div class="col">
														<h5>First Name</h5>
														<input type="text" class="form-control w-100 text-capitalize" placeholder="First name" name="fname" id="fname" onkeypress="return event.charCode != 32" required minlength="4">
														<div class="invalid-feedback">
															Please enter a valid name.
														</div>
													</div>
													<div class="col">
														<h5>Last Name</h5>
														<input type="text" class="form-control w-100 text-capitalize" placeholder="Last name" name="lname" id="lname" onkeypress="return event.charCode != 32" required minlength="4">
														<div class="invalid-feedback">
															Please enter a valid last name.
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<h5>Mobile Number</h5>
												<input type="text" class="form-control br-radius-zero" name="mobno" id="mobno" placeholder="10-Digit Mobile Number" onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10" title="Please enter a valid mobile number" required />
												<div class="invalid-feedback">
													Please enter a valid Mobile Number.
												</div>
											</div>
											<div class="form-radio-button">
												<h5>Gender</h5>
												<label class="radio-inline">
													<input type="radio" id="gender" name="genders" value="male" required checked> Male
												</label>
												<label class="radio-inline">
													<input type="radio" id="gender" name="genders" value="female"> Female
												</label>
												<label class="radio-inline">
													<input type="radio" id="gender" name="genders" value="other"> Other
												</label>
											</div>
											<div class="form-group">
												<h5>Email ID</h5>
												<div class="email_id d-flex justify-content-space-between">
													<input type="email" class="form-control br-radius-zero " name="uemail" id="useremail" placeholder="Email ID" onkeypress="return event.charCode != 32" title="Please enter valid and active Email Id" maxlength="25" required />
													<button type="button" id="sendOtpBtn" class="btn btn-warning w-50 mx-2 send_opt">Send OTP</button>
													<input type="text" id="emailOtpInput" placeholder="OTP" class="form-control br-radius-zero mx-1 verify_opt" hidden>
													<button type="button" id="verifyOtpBtn" class="btn btn-warning w-50 mx-2 verify_opt" hidden>Verify OTP</button>
													<div class="invalid-feedback" style="flex-direction: row;">
														Please enter a valid Email Id.
													</div>
												</div>
												<span id="email_msg" class="mt-1" style="font-size:95%;"></span>
											</div>
											<div class="form-group">
												<h5>Create Password</h5>
												<input type="password" class="form-control br-radius-zero" name="upassword" id="password" placeholder="Password" onkeypress="return event.charCode != 32" minlength="6" maxlength="25" required />
												<div class="invalid-feedback">
													Please enter a valid password.
												</div>
											</div>
											<div class="form-action register-submit-buttton pt-2">
												<input type="submit" value="First Verify your email " name="" id="user_register" class="user_register btn btn-outline-info w-100" disabled />
											</div>
											<div class="existing-user pt-2 ">
												<a href="user_login.html" class="btn btn-outline-primary w-100 p-1">Existing User? Login Here</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- / Register -->
					<?php } ?>
					<!--Wishlist -->
					<?php
					if (empty($_SESSION['Uid'])) {
					?>
						<a href="#" onclick="loginagain()" class=" px-3 border-right text- text-norawp wishlist">My Wishlist <span class=" px-2 py-1 text-black font-weight-bold rounded-pill"> 0 </span>
							<div class="empty_checkout">
								<template id="my-template">
									<swal-title class="login-popup">
										<span>Please Login to get access of your wishlist!<span>
									</swal-title>
									<swal-icon type="warning" color="warning"></swal-icon>
									<swal-button type="confirm">
										<a href="user_login.html" class="px-3  text-white"> Login</a>
									</swal-button>
									<swal-button type="cancel">
										Cancel
									</swal-button>
									<swal-param name="allowEscapeKey" value="false" />
									<swal-param name="customClass" value='{ "popup": "my-popup" }' />
								</template>
							</div>
						</a>
						<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
						<script type="text/javascript">
							function loginagain() {
								Swal.fire({
									template: '#my-template'
								});
							}
						</script>
					<?php } else {

						$sql = $mysqli->query("select * from wishlist where user_id = '" . $_SESSION['Uid'] . "'");
						$res = mysqli_num_rows($sql);
					?>
						<a href="wishlist.html" class=" border-right text- text-norawp wishlist">My Wishlist <span class=" px-2 py-1 text-black font-weight-bold rounded-pill"> <?php echo $res ?></span></a>
					<?php } ?>
					<!--/Wishlist -->
					<a href="contact_us.php" class=" border-right text- text-norawp">Contact Us</a>
					<!--Admin Login -->
					<!-- Button trigger modal -->
					<a href="admin_login.php" class="  border-right border-left"> Admin Login</a>

					<!-- /Admin Login -->
				</div>
			</div>
		</div>
		<div class="container-fluid head_logo ">
			<div class="head d-flex justify-content-between">

				<!--Logo -->
				<a href="index.html" class="main_logo"><img src="images/emart_logo.png" class="img-fluid mx-4 my-1" alt=""></a>
				<!--/Logo -->

				<!--Searchbar-->

				<form class="d-flex m-auto w-50" action="search.php" method="GET">
					<input type="text" class="form-control" name="search" id="searchbox" placeholder="Search for products,brands and more" value="<?php echo @$_GET['search']; ?>">
					<a href="search.php"><button class="btn btn-outline-primary mx-2" type="submit" name="searchbtn"><i class="fa fa-search"></i></button></a>
				</form>
				<!--/Searchbar-->
				<div class="contact m-auto">
					<a href="phone_no">Call 1300 00X XXX</a>
				</div>

				<!--Cart-->
				<div class="cart m-auto">
					<a href="cart.html" class="user_cart py-2 my-4 rounded-pill">
						<?php if (empty($_SESSION['Uname'])) { ?>
							<span class="px-2 text-white"><i class="fa fa-shopping-cart fa-1x"></i></span>


						<?php } else { ?>
							<span class="px-2 text-white"><i class="fa fa-shopping-cart fa-1x"></i></span>
							<span class="px-3 py-2 rounded-pill text- bg-light"><?php echo $num ?? '0'; ?></span>
						<?php } ?>
					</a>


				</div>

				<!--/Cart-->
			</div>
		</div>
	</header>

	<!--/Header-->