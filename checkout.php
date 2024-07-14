<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | www.emart.com</title>
  <?php include('links.php'); ?>

</head>
<?php include('header.php');?>
<!--/Header-->
<!--main-->
<?php 
if(isset($_POST['submit']))
{
    $pcode = $_POST['pcode'];
    $locality = $_POST['locality'];
    $address = $_POST['address'];
    $landmark = $_POST['landmark'];
    $mobile2 = $_POST['mobile2'];
    echo $pcode;
    $sql=$mysqli->query ("INSERT INTO address (pcode, locality,address, city,mobile2) VALUES('$pcode','$locality','$address','$city','$mobile2')") or die($mysqli->error);
    if($sql)
    {
        echo "inserted";
    }
    else
    {
        echo"failed";
    }
    
}
?>

<section id="billing">
     <!-- cart-main-area start -->
    <div class="checkout-wrap ptb--100">
        <div class="container-fluid my-3 "style="width: 95%">
            <div class="row">
                <div class="col-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                                <?php if(empty($_SESSION['Uid']))
                                { ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form class="form py-2 px-3" id="form"  method="POST" action="user_login.php">
                                                        <div class="header m-auto text-center" >
                                                            <h4 style="display: inline;font-family: 'Rubik',sans-serif;">LOGIN</h3>
                                                            
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
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form class="form mb-0 py-2 px-3" id="form" action="user_register.php"  method="POST">
                                                        <div class="header m-auto text-center" >
                                                            <h4 style="display: inline;font-family: 'Rubik',sans-serif;">REGISTER</h3>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
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
                                </div>
                            <?php } 
                                    else
                                    {
                                     ?>
                                <div class="accordion__title ">
                                    <div class="title_1 ">
                                        Checkout Method
                                    </div>
                                    <div class="icon mx-3 mt-2 ">
                                        <h4 class="" ><i class="far fa-check-circle text-success"></i></h4>
                                    </div>
                                </div>
                                    <?php } ?>
                                <?php 
                                if(empty($_SESSION['Uid']))
                                { 
                                    echo'<div class="accordion__title">
                                            Address Information
                                        </div>'; 
                                
                                }
                                else{
                                    $res= $mysqli->query("select * from user_address where user_id = '".$_SESSION['Uid']."'") or die($mysqli->error);
                                    $r = mysqli_num_rows($res);
                                    if($r<=0)
                                { ?>
                                <div class="accordion__title">
                                    Address Information
                                </div>
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="details my-3" style="box-shadow: 2px 2px 30px rgba(0,0,0,0.1);">
                                            <form id="fupForm" name="form1" method="post">
                                            <!--Name mobile-->
                                              <div class="form-group px-4 py-2">
                                                <div class="row">
                                                  <div class="col">
                                                    <h5 class="mb-0" >Name</h5>
                                                    <input type="text" class="form-control w-100" placeholder="Name" name="fname"   value="<?php echo $_SESSION['Uname']; ?> <?php echo $_SESSION['Lname']; ?>" readonly >
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    <small>Error message</small>
                                                  </div>
                                                  <div class="col">
                                                    <h5 class="mb-0">Mobile Number</h5>
                                                    <input type="number" class="form-control br-radius-zero" name="mobno" id="mobile" readonly required placeholder="10-Digit Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)" row-rule="Mobile" minlength="10" maxlength="10" value="<?php echo $_SESSION['Umobile']?>" />
                                                    <i class="fa fa-exclamation-circle"></i>
                                                    <small>Error message</small>
                                                  </div>
                                                </div>
                                              </div>
                                              <!--/Name mobile-->

                                              <!--Pincode locality-->
                                              <div class="form-group py-1 px-4">
                                                  <div class="row">
                                                      <div class="col">
                                                          <h5 class="mb-0">Pincode</h5>
                                                          <input type="text" class="form-control w-100" placeholder="Pincode" name="pcode" id="pcode"  >
                                                          <i class="fa fa-exclamation-circle"></i>
                                                          <small>Error message</small>
                                                      </div>
                                                      <div class="col">
                                                          <h5 class="mb-0" >Locality</h5>
                                                          <input type="text" class="form-control w-100" placeholder="Locality" name="locality" id="locality">
                                                          <i class="fa fa-exclamation-circle"></i>
                                                          <small>Error message</small>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!--/Pincode locality-->

                                              <!--address-->
                                              <div class="form-group py-1 px-4">
                                                  <h5 class="mb-0" >Address</h5>
                                                  <textarea id="addr"  rows="5" class="px-2 py-1 w-100 form-control " placeholder="Address(Area and Street)"  ></textarea>
                                              </div>
                                              <!--/address-->

                                              <!--city state-->
                                              <div class="form-group py-1 px-4">
                                                  <div class="row">
                                                      <div class="col">
                                                          <h5 class="mb-0" >City/District/Town</h5>
                                                          <input type="text" class="form-control w-100" placeholder="City/District/Town" name="city" id="city" >
                                                          <i class="fa fa-exclamation-circle"></i>
                                                          <small>Error message</small>
                                                      </div>
                                                      <div class="col">
                                                          <label for="inputState" class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">State</label>
                                                          <select id="state" class="form-control br-radius-zero" style="font-size:14px;border:2px solid #f0f0f0;">
                                                          <option selected>--Select State--</option>
                                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                          <option value="Bihar">Bihar</option>
                                                          <option value="Gujarat">Gujarat</option>
                                                          <option value="Haryana">Haryana</option>
                                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                          <option value="Maharashtra">Maharashtra</option>
                                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                          <option value="Uttarakhand">Uttarakhand</option>
                                                          </select>
                                                          <i class="fa fa-exclamation-circle"></i>
                                                          <small>Error message</small>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!--/city state-->

                                              <!--landmark mobile2-->
                                              <div class="form-group py-1 px-4">
                                                  <div class="row">
                                                  <div class="col">
                                                      <h5 class="mb-0" >Landmark(Optional)</h5>
                                                      <input type="text" class="form-control w-100" placeholder="Landmark(Optional)" name="landmark" id="landmark">
                                                      <i class="fa fa-exclamation-circle"></i>
                                                      <small>Error message</small>
                                                  </div>
                                                  <div class="col">
                                                      <h5 class="mb-0" >Alternative No.(Optional)</h5>
                                                      <input type="text" class="form-control w-100" placeholder="Alternative Mobile Number(Optional)" name="mob2" id="mobile2">
                                                      <i class="fa fa-exclamation-circle"></i>
                                                      <small>Error message</small>
                                                  </div>
                                                  </div>
                                              </div>
                                              <!--/landmark mobile2-->

                                              <!--addr type-->

                                              <div class="radio-group py-1 px-4" style="font-family: 'Raleway', sans-serif;"> 
                                                
                                                  <h5 class="mb-0" >Address Type</h5>               
                                                  <label class="radio-inline pr-2 ">
                                                  <input type="radio" id="addrtype" name="addtype" value="home" required checked > Home
                                                  </label>
                                                  <label class="radio-inline pr-4">
                                                  <input type="radio" id="addrtype"name="addtype"  value="work"  >Work
                                                  </label>
                                              </div>
                                              <div class="form-action py-1 px-4">
                                                <button type="button" class="btn btn-primary w-100" id="submit">ADD</button> 
                                              </div> 
                                              <br>
                                              <!--/addr type-->  
                                            </form>        
                                        </div>
                                    </div>
                                </div>
                                 <?php } 
                                    else
                                    {
                                     ?>
                                <div class="accordion__title ">
                                    <div class="title_1 ">
                                        Address Information
                                    </div>
                                    <div class="icon mx-3 mt-2 ">
                                        <h4 class="" ><i class="far fa-check-circle text-success"></i></h4>
                                    </div>
                                </div>
                                <?php } }?>
                                <?php 
                                if(empty($_SESSION['Uid']))
                                {
                                    echo' <div class="accordion__title order_detail">
                                    Order Summary
                                </div>';
                                }
                                else{
                                ?>
                                
                                <div class="accordion__title order_detail">
                                    Order Summary
                                </div>
                                <?php
                                $result = $mysqli->query("select * from checkout where user_id = '".$_SESSION['Uid']."'");
                                $res=$result->fetch_assoc();
                                $re = mysqli_num_rows($result);
                                if($re<=0)
                                {
                                    ?>
                                    <div class="empty_checkout">
                                        <template id="my-template">
                                            <swal-title>
                                               You checkout has no item!
                                              </swal-title>
                                              <swal-icon type="warning" color="warning"></swal-icon>
                                              <swal-button type="confirm">
                                                <a href="cart.html" class="text-white">Got to cart</a>
                                              </swal-button>
                                              <swal-param name="allowEscapeKey" value="false" />
                                              <swal-param
                                                name="customClass"
                                                value='{ "popup": "my-popup" }' />
                                        </template>

                                    </div>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                        <script type="text/javascript">
                                            Swal.fire({
                                                    template: '#my-template'
                                                    })
                                        </script>
                                <?php 
                                }
                                else 
                                {
                                ?>
                                <div class="accordion__body order_detail_body">
                                    <div class="order-details my-3" style="box-shadow: 2px 2px 30px rgba(0,0,0,0.1);">
                                        <h5 class="order-details__title text-center pt-3" style="font-size:24px;font-family:'Baloo 2',cursive;">Your Order</h5>
                                        <?php 
                                            $sql = $mysqli->query("SELECT product.*,checkout.*,laptop_brand.id,laptop_brand.id,laptop_brand.brand_name as item_brand,checkout.id as checkoutid FROM product,checkout,laptop_brand WHERE product.item_id=checkout.item_id AND checkout.user_id = '".$_SESSION['Uid']."' AND product.item_brand = laptop_brand.id ") or die($mysqli->error);
                                                  $sum_price=0;
                                                  $sum_mrp=0;
                                                  $total_saving=0;
                                              while($row = $sql->fetch_assoc())
                                                    { 
                                                        $sum_price+=$row['item_price'];
                                                        $r=mysqli_num_rows($sql);
                                                        $sum_mrp += $row['item_mrp'];
                                                        $total_saving=$sum_mrp-$sum_price;
                                                        

                                        ?>
                                        <div class="order-details__item border-bottom pb-2 pt-3" id=<?php echo $row['item_id'] ?> >
                                            <div class="single_item"  data-id=<?php echo $row['item_id'] ?>>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="single-item__thumb text-center">
                                                        <img src="images/<?php echo $row['item_images'];?>"  class ="img-fluid mb-3 mx-2"alt="ordered item" style="max-width:320px">
                                                        <div class="qty d-flex mx-5 py-3">
                                                            <div class="d-flex  text-center" style="font-family: 'Raleway', sans-serif;font-size:20px;">     
                                                                <button data-id="<?php echo $row['item_id'];?>" class="qty-up bg-light border" id="up" name="submit"><i class="fas fa-angle-up"></i></button>
                                                                <input data-id="<?php echo $row['item_id'];?>" type="text" class="qty_input border px-2 bg-light text-center text-black" style="width: 50px;" disabled value="1" placeholder="1">

                                                                <button data-id="<?php echo $row['item_id'];?>" class="qty-down  bg-light border" name="submit" ><i class="fas fa-angle-down"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-item__content order_detail_checkout d-flex flex-column justify-content-center mx-5">
                                                        <h5 class="m-0 p-0 " style="  font-family: 'Baloo Thambi 2', cursive;font-size: 22px;"> <a href="product.html?item_id=<?= $row['item_id'];?>" class="text-black prod_name" style="color:black;"><?php echo $row['item_name'];?></a></h5>
                                                        <span class="seller" style="font-family: 'Baloo 2', cursive;font-size: 16px;">Seller :<?php echo $row['item_brand'] ?></span>
                                                        <div class="price d-flex flex-row  pt-1">
                                                           ₹<span class="product-price ml-1" data-id="<?php echo $row['item_id'];?>" style="font-size: 19px;font-family: 'Rubik', sans-serif;"><?php echo $row['item_price'];?></span>
                                                           <span class="pt-1 " style="font-size: 13px;padding-left: 8px;font-family: 'Baloo 2', cursive;"> <strike>₹<span class="mrp" data-id="<?php echo $row['item_id'];?>"> <?php echo $row['item_mrp'];?></span></strike></span>
                                                        </div>
                                                        <div class="remove">
                                                           <a href="checkout_action.php?delete=<?php echo $row['id']; ?> & item_name=<?php echo $row['item_name'];?>" id="<?php echo $row['checkoutid']; ?>" class="delete btn btn-outline-danger"  style="font-family:'Baloo Thambi 2', cursive;text-decoration: none"><i class="far fa-trash-alt"></i> Remove</a>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php  } ?>
                                    </div>
                                    
                                         
                                    <div class="mail_confirmation mb-3" style="box-shadow: 2px 2px 30px rgba(0,0,0,0.1);">
                                        <div class="continue_btn py-3 px-2">
                                            <div class="row">
                                                <div class="col-7">
                                                    <div class="mail_text">
                                                        <p class="pl-3 pt-1 ">Order confirmation email will be sent to <span class="bg-light font-weight-bold"> <?php echo $_SESSION['Uemail']; ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="cont_btn mt-2 mr-1">
                                                        <button type="button" id="continue" class="float-right btn btn-primary w-75">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="accordion__title order_detail_after " hidden>
                                    <div class="title_1 ">
                                        order summary
                                    </div>
                                    <div class="icon mx-3 mt-2 ">
                                        <h4 class="" ><i class="far fa-check-circle text-success"></i></h4>
                                    </div>
                                </div>
                                <?php    
                                    $result = $mysqli->query("select * from checkout where user_id = '".$_SESSION['Uid']."'");
                                    $res=$result->fetch_assoc();
                                    $re = mysqli_num_rows($result);
                                    if($re<=0)
                                    { 
                                        echo '<div class="accordion__title paymenttitle">
                                                payment information
                                            </div>';
                                    }
                                    else
                                    {                                   
                                
                                ?>
                                <div class="accordion__title paymenttitle">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo ml-2">               
                                        <label class="radio-inline pr-2 cardpayment" id="payment">
                                            <?php
                                            require('config.php');
                                            ?>
                                            <form action="submit.php" method="post">
                                                <script
                                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button btn-btn-info"
                                                    data-key="<?php echo $publishableKey?>"
                                                    data-amount="<?php echo $_SESSION['total_amt']*100;?>"
                                                    data-name="Emart"
                                                    data-description="Card Payment"
                                                    data-image="images/hp_icon.png"
                                                    data-currency="inr"
                                                    data-email="<?php echo $_SESSION['Uemail'];?>"
                                                >
                                                </script>
                                                

                                            </form>
                                            </input>

                                        </label>
                                        <label class="radio-inline pr-4">
                                            <input type="radio" id="payment"name="payment"  value="UPI" disabled> UPI
                                        </label>
                                        <label class="radio-inline pr-4">
                                            <input type="radio" id="payment"name="payment"  value="Net Banking" disabled>  Net Banking
                                        </label>
                                        <label class="radio-inline pr-4">
                                            <input type="radio" id="payment"name="payment"  value="EMI(Easy Installments)" disabled> EMI(Easy Installments)
                                        </label>
                                        <label class="radio-inline pr-4">
                                            <input type="radio" id="payment"name="payment"  value="Cash on Delivery"> Cash on Delivery
                                        </label>
                                        <div class="pay_cont_btn mt-2 mr-1">
                                            <button type="button" id="pay_continue" class="float-right btn btn-primary">Continue</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-4">
                    <div class="total-payment px-3 py-2 m-auto" style="box-shadow: 2px 2px 30px rgba(0,0,0,0.1); text-align: middle;align-content: center;justify-content: center;">
                        <h4 class="text-uppercase border-bottom pb-1" >price details</h4>
                        <h5 class="" >Total Items<span style="float:right;"><span><?php echo $r  ?></span></h5>
                        <h5 class="" >Price<span> (<?php echo $r  ?> item)</span><span style="float:right;"><span>₹ </span><span id="deal_price1"><?php echo $sum_price  ?></span></span></h5>
                        <h5 >Delivery Charges<span style="float: right;">Free</span></h5>
                        <hr class="mt-0 mb-1">
                        <h4 style="font-size: 21px" class="py-2">Amount Payable <span style="float:right;"><span>₹ </span><span id="deal_price"><?php echo $sum_price  ?></span></span></h4>
                         <hr class="mt-0 mb-1">
                        <h4 style="font-size: 15px" class="text-capitalize py-1 text-success">your total saving on this order <span  id="total_saving" style="float: right;">₹ <?php echo $total_saving ?></span></h4>
                    </div>
                </div>
                <?php } ?>
                
            </div>
            <?php } ?>
           
        </div>
    </div>
    <!-- cart-main-area end -->
</section>

<!--/main-->

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

<script>
      function emeAccordion(){
        $('.accordion__title')
          .siblings('.accordion__title').removeClass('active')
          .first().addClass('active');

        $('.accordion__body')
          .siblings('.accordion__body').slideUp()
          .first().slideDown();
        $('.accordion').on('click', '.accordion__title', function(){
          $(this).addClass('active').siblings('.accordion__title').removeClass('active');
          $(this).next('.accordion__body').slideDown().siblings('.accordion__body').slideUp();
        });
        };
        emeAccordion();
</script>

<!--QTy-->
<script>
  $(document).ready(function(){
    //product qty session
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal_price");
    let $deal_price1 = $("#deal_price1");
    let $total_saving = $("#total_saving");
    //click btn up
   //change product price on increasing qunantity

             
    $qty_up.on('click',function(e){

          let $in = $(`.qty_input[data-id='${$(this).data("id")}']`);
          let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
          let $mrp = $(`.mrp[data-id='${$(this).data("id")}']`);

     
          $.ajax({
           url:'update-qty.php',
            type:'post',
            data:{item_id:$(this).data("id")},
            success:function(result)
            {
                let obj = JSON.parse(result);
                $item_price = obj['item_price'];
                $item_mrp = obj['item_mrp'];
                
                if($in.val()>=1 && $in.val()<=9)
                {
                  $in.val(function(i,oldval)
                  {
                    return ++oldval;
                  });
                // console.log($item_mrp);
                $price.text(parseInt($item_price * $in.val()).toFixed(2));
                $mrp.text(parseInt($item_mrp * $in.val()).toFixed(2));
                let subtotal = parseInt($deal_price.text()) + parseInt($item_price);
                $deal_price.text(subtotal.toFixed(2));
                let subtotal1 = parseInt($deal_price1.text()) + parseInt($item_price);
                $deal_price1.text(subtotal1.toFixed(2));
                let saving = parseInt($mrp.text()) - parseInt($price.text());
                $total_saving.text(saving.toFixed(2));
                console.log($in.val());
                if(subtotal1>=900000)
                {
                    $('.qty-up').attr('disabled',true);
                    $('.qty-up').css('cursor','not-allowed');

                    Swal.fire(
                        'Sorry!',
                        'You can only order items under 9lakh.',
                        'warning'
                              )
                }
                else
                {
                    $('.qty-up').attr('disabled',false);
                  
                    $('.qty-up').css('cursor','pointer');

                }
               //console.log($item_price);

                }
              }
             
              
        });
    });

    //click btn down
    $qty_down.click(function(e){
        let $in = $(`.qty_input[data-id='${$(this).data("id")}']`);
          let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
           let $mrp = $(`.mrp[data-id='${$(this).data("id")}']`);
     
          $.ajax({
           url:'update-qty.php',
            type:'post',
            data:{item_id:$(this).data("id")},
            success:function(result)
                {
                    let obj = JSON.parse(result);
                     $item_price = obj['item_price'];
                    $item_mrp = obj['item_mrp'];

                    if($in.val()>1 && $in.val()<=10)
                    {
                      $in.val(function(i,oldval)
                      {
                        return --oldval;
                      });
                      $price.text(parseInt($item_price * $in.val()).toFixed(2));
                       $mrp.text(parseInt($item_mrp * $in.val()).toFixed(2));
                    let subtotal = parseInt($deal_price.text()) - parseInt($item_price);
                    $deal_price.text(subtotal.toFixed(2));
                     let subtotal1 = parseInt($deal_price1.text()) - parseInt($item_price);
                    $deal_price1.text(subtotal1.toFixed(2));
                     let saving = parseInt($mrp.text()) - parseInt($price.text());
                    $total_saving.text(saving.toFixed(2));
                if(subtotal1>=900000)
                   
                {
                    $('.qty-up').attr('disabled',true);
                    $('.qty-up').css('cursor','not-allowed');
                  

                    Swal.fire(
                        'Sorry!',
                        'You can only order items under 9lakh',
                        'warning'
                              )
                }
                else
                {
                    $('.qty-up').attr('disabled',false);
                 
                    $('.qty-up').css('cursor','pointer');

                }

                    }
                    
                }
             });
         });
    });
</script>
<!--/QTy-->

<!-- REMOVE ITEM -->
<script>
     $(document).ready(function(){
        $(document).on('click','.delete',function(e){
          e.preventDefault();
              var id = $(this).attr("id");
              console.log(id);
              Swal.fire({
                  title: 'Are you sure you want to remove the item?',
                  text: "",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                     $.ajax({
                      url:"checkout_action.php",
                      type:"post",
                      data:{id:id},
                      success:function(result)
                      {
                        //   let obj = JSON.parse(result);
                        //   console.log(result);
                         Swal.fire(
                        'Removed!',
                        '',
                        'success'
                              ).then((result) =>{

                       window.location.href = location.href ;
                          });
                      }
                     })
                   }
              })

        });


     });
</script>
<!--/Remove item-->

<!--Address-->
<script>
    $(document).ready(function(){
      $("#submit").click(function(){
        var pcode = $('#pcode').val();
        var locality = $('#locality').val();
        var address =$('#addr').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var landmark = $('#landmark').val();
        var mobile2 = $('#mobile2').val();
        var $option = $('input[type="radio"]:checked'); // $option is the jQuery wrapped HTML element
        var myValue = $option.val();
        if(pcode!="" && locality!="" && city!="" )
        {
          $.ajax({
            url: 'address_retrieving.php',
            type: "POST",
            data: { pcode: pcode,locality: locality,address : address, landmark: landmark,city: city,state : state,mobile2 : mobile2,addrtype : myValue},
            success:function(result)
            {
                
               $('#fupForm')[0].reset();
               Swal.fire({
                          icon: 'success',
                          title: 'Address Added...!!!',
                        }).then((result) => {
                        if (result.value) {
                           window.location.href = window.location.href;
                       }
                   });
            }
          });

        }

      });
    });
</script>
<!--/Address-->

<!--order-->
<script>
    $(document).ready(function(){
        $('#continue').on('click',function(){
            var total_price = $('#deal_price').text();
            let $item_id = $(`.single_item[data-id='${$(this).data("id")}']`);
            
          let $qty=[];
           $(".qty_input").each(function(){
           $qty.push( $(this).val());
       })
           let $id =[];
           $(".single_item").each(function(){
           $id.push($(this).data('id'));
       })
           let $price= [];
           $(".product-price").each(function(){
             $price.push($(this).text());
        });
       console.log($qty);
       console.log($id);
       console.log($price);
       $.ajax({
        url:'checkout_action.php',
        type:'post',
        data:{item_id : $id ,item_qty : $qty , item_price : $price,total : total_price},
        success:function(result)
        {
            alert('Proceed for payment process');
            $('.order_detail').attr("hidden",true);
            $('.order_detail_body').attr("hidden",true);
            $('.order_detail_after').attr("hidden",false);
             
        }
       });

        });

    });
</script>
<!--/order-->


<!-- payment -->
<script>
    $(document).ready(function(){
        $('#pay_continue').on('click',function(){
            var $option = $('input[type="radio"]:checked'); // $option is the jQuery wrapped HTML element
            var myvalue = $option.val();
            var total_price = $('#deal_price').text();
            $('#pay_continue').html('Please Wait!!!');
            $('#pay_continue').removeClass('btn btn-primary');
            $('#pay_continue').addClass('btn btn-warning');
            $('#pay_continue').attr('disabled',true);
            $('#payment').attr('disabled',true);
            $.ajax({
                url:"checkout_action.php",
                type:"post",
                data:{payment:myvalue},
                success:function(result)
                {   
                    Swal.fire(
                        'Thankyou for your order',
                        'we are currently processing your order.You can track your order under orderpage',
                        'success'
                        ).then((result) => {
                            if (result.value) {
                           window.location.href = "myorder.html";
                        }
                   });
               
                }

            });
            
        });
    });
</script>
<!-- payment -->
