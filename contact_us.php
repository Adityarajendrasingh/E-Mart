<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | www.emart.com</title>
	<?php include('links.php'); ?>
</head>


<?php include('header.php');?>
<!--/Header-->
<main>
	<!--BreadCrumb-->
  <div class="bread-crumb text-center d-flex">
    <nav aria-label="breadcrumb text-capitalize text-center ">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <span class="bread-separetor"><i class="fas fa-angle-right px-2" style="margin-top: 3px;font-size: 14px;"></i></span>
        <li class="breadcrumb-item active" aria-current="page" ><a href="#" style="color: rgb(95, 95, 95);">Contact Us</a></li>
        
      </ol>
    </nav>
  </div>
  
    <!--/BreadCrumb-->
<!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">Contact us</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-12" style=" font-family: 'Baloo Thambi 2', cursive;">
          <h3 style=" font-family: 'Raleway', sans-serif;">Contact Info</h3>
          <div class="space"></div>
          <p class=""><i class="fas fa-map-marker fa-fw pull-left fa-2x"></i> 321 Awesome Street India</p>
          <div class="space"></div>
          <p><i class="fas fa-envelope-square fa-fw pull-left fa-2x"></i> demoemart0800@gmail.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>022 234 5678 </p>
        </div>
        <div class="col-md-8 col-sm-12 marb20">
          <div class="contact-info">
            <h3 class="" style=" font-family: 'Raleway', sans-serif;">Having Any Query! Contact Us</h3>
            <div class="space"></div>
            <div id="sendmessage" hidden>Your message has been sent. Thank you!</div>
            <form action="POST" class="py-3">
                    <!--Name mobile-->
                <div class="form-group px-4">
                  <div class="row">
                    <div class="col">            
                      <input type="text" class="form-control w-100" placeholder="Your Name" name="name" id="name">
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                    <div class="col">
                       <input type="text" class="form-control w-100" placeholder="Email" name="email" id="cemail">
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                     <div class="col">
                      <input type="text" class="form-control br-radius-zero" name="mobile" id="cmobile" required placeholder="Mobile Number" />
                      <i class="fa fa-exclamation-circle"></i>
                      <small>Error message</small>
                    </div>
                  </div>
                </div>
                  <!--Message-->
                    <div class="form-group py-1 px-4">
                        <textarea name="message" id="message" cols="" rows="5" class="px-2 py-1 w-100 form-control " placeholder="Message" name="address"></textarea>
                    </div>
                    <!--/Message-->

                  <button type="button" onclick="send_message()"  class="btn btn-outline-primary w-100">Send Message</button>

              <br>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!--/ contact-->

</main>
  <!--footer-->
  <?php include('footer.php');?>
  <!--/footer-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      $(document).ready(function(){
       $('.login_again').on('click',function(e){
        e.preventDefault();

       Swal.fire({
        title: 'Please Login to get access of your wishlist',
        icon: 'info',
         button:"OK",
      }).then((result) => {
 
          if (result.isConfirmed) {
           content: '<a href="#" class="px-3  border-right border-left text-dark" data-toggle="modal" data-target="#exampleModalCenter"> Login</a>'
        }
      });
   });
          });
  </script>
<script>
	function send_message()
	{
		var name = jQuery('#name').val().trim();
		var email = jQuery('#cemail').val().trim();
		var mobile = jQuery('#cmobile').val().trim();

		var message = jQuery('#message').val().trim();
		if(name=='')
		{
			alert('Please Enter name');
		}
		else if(email=='')
		{
			alert('Please Enter email');
		}
		else if(mobile=='')
		{
			alert('Please Enter mobile');
		}
		else if(message=='')
		{
			alert('Please Enter message');
		}
		else
		{
			jQuery.ajax({
				url:'send_message.php',
				type:'post',
				data:'name='+name+'&email='+email+'&mobile='+mobile+'&message='+message,
				success:function(result){
					alert(result);
				}
			});
		}
	
	}
		
	
</script>


  