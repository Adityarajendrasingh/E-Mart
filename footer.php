<footer id="footer" class="footer_emart">
      <div class="container footer_data">
        <div class="row">
          <div class="col-xl-3 col-12 text-center">
             <a href="./index.html"><img src="./images/emart_logo.png" alt="Logo"></a>
            <p>Make your shopping simple and easy with E-Mart!!</p>
          </div>
          <div class="col-xl-2 col-12">
            <h5>help</h5>
            <div class="d-flex flex-column flex-wrap ">
              <a href="#">payment</a>
              <a href="#">shipping</a>
              <a href="#">cancellation & Returns</a>
              <a href="#">fAQ</a>
              <a href="#">report</a>
            </div>
          
          </div>
          <div class="col-xl-2 col-12">
            <h5>about</h5>
            <div class="d-flex flex-column flex-wrap">
              <a href="contact_us.php">Contact Us</a>
              <a href="#">About Us</a>
              <a href="#">Stores</a>
              <a href="#">Wholesales</a>
              <a href="#">Terms Of Use</a>
              <a href="#">security</a>
            </div>
        
          </div>
          
          <div class="col-xl-4 col-12 newslatter" style="">
            <h4>NewsLatter</h4>
            <form action="" class="form-row w-100">
              <div class="col">
                <input type="text" class="form-control"  id="footer_email" placeholder="Email">
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary mb-3 " id="footer_email_btn">Subscribe</button>
              </div>
            </form>
            <img src="./images/payment-method_7934bc (1).svg" class="mb-5" alt="">

          </div>
          
        </div>
      </div>
      <div class="social-media text-center">
       <a href=""><i class="fab fa-facebook fa-2x"></i></a> 
       <a href=""><i class="fab fa-twitter fa-2x"></i></a> 
      <a href=""><i class="fab fa-instagram fa-2x"></i></a> 
      </div>
      <hr class="footer_line">
      <div class="copyright text-center">
        <p>&copy; copyright 2021.Design by <a href="#">Hritik</a></p>
    </div>
  </footer>
 
  
   <!--Jquery-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <!--/Jquery-->
  
  <!--Bootstrap js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!--Owl caresoul-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>

  <!--isotope plugin-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>
  </body>
  <!--/isotope plugin-->

  <!--Validation-->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <!--Validation-->

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- sweetalert -->

  <script>
  var mybutton = document.getElementById("scroll_top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    $(".scroll_top").css("display","block");
  } else {
    $(".scroll_top").css("display","none");
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  $('html, body').animate({
              scrollTop: 0
            }, 3000);
}
</script>

<script>
  $(document).ready(function(){
     $(document).on('click','.add_cart',function(){
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url:'cart.php',
            type:'post',
            data:{item_id:id},
            success:function(result)
            {
              // let obj = JSON.parse(result);
              // console.log(obj);
              Swal.fire({
                        icon: 'success',
                        title: 'Added to your cart...!!!',
                      }).then((result) => {
                      if (result.value) {
                        window.location.href = "cart.html";
                        // $("#special-price").load("index.html");
                        // $('html, body').animate({
                        //     scrollTop: $("#special-price").offset().top
                        // }, 2000);
                      }
                  });
  
              }
        })
      
      });
});
</script>
  
</html>

