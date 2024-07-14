<!DOCTYPE html>
<html lang="en">
<!--Header-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Email Verification | www.emart.com</title>
  <?php include('links.php'); ?>

</head>


<?php include('header_cart.php');?>
<!--/Header-->

<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: user_signup.html');
}
?>
<!--Login page-->
<body>
  <section id="login">
    <div class="login container">
        <div class="butn">
            <a href="user_resetcode.php" id="login" class="selected">Code Verification</a>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="col-left">
                 <div class="reg-img">
                  <img src="images/illustration.png" alt="">
                 </div>
               </div>
            </div>     
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="col-right">
					<form class="form" id="form" action="user_register.php" method="POST">
						<div class="header">
							<img src="images/mediabedited.png" alt="">
						</div>
						<hr>
						  <div class="form-group">
							  <h4>OTP</h4>
							 <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
							<i class="fa fa-check-circle"></i>
							<i class="fa fa-exclamation-circle"></i>
							<small>Error message</small>
						  </div>
						  <div class="form-action">
						     <button class= "btn1" type="submit" name="check" value="Submit">Submit</button>
						  </div>
					</form>   
				</div>
			</div>
        </div>
      </div>
    </section>
<!--footer-->
<?php include('footer.php');?>
<!--/footer-->
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