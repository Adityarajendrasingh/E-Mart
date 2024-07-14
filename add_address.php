<!--Header-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address | E-Mart.com</title>
	 <?php 
      include('links.php');
      include('dbconnection.php');
    ?>
</head>
<?php include('header_index.php');?>
<!--/Header-->
<main >
  <section id="account">
    <div class="container">
      <div id="all_data">
      </div>
      <div class="row">
        <?php include('profile.php'); ?>
        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12">
          <div class="details">
            <form id="fupForm" name="form1" method="post">
              <!--Name mobile-->
              <div class="form-group">
                <div class="title"><h3>Manage Address</h3></div>
                <div class="row">
                  <div class="col">
                    <h5>Name</h5>
                    <input type="text" class="form-control w-100" placeholder="Name" name="fname"  value="<?php echo $_SESSION['Uname']; ?> <?php echo $_SESSION['Lname']; ?>">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="col">
                    <h5>Mobile Number</h5>
                    <input type="number" class="form-control br-radius-zero" name="mobno" id="mobile" required placeholder="10-Digit Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)" row-rule="Mobile" minlength="10" maxlength="10" />
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                </div>
              </div>
              <!--/Name mobile-->

              <!--Pincode locality-->
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <h5>Pincode</h5>
                    <input type="text" class="form-control w-100" placeholder="Pincode" name="pcode" id="pcode"  >
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="col">
                    <h5>Locality</h5>
                    <input type="text" class="form-control w-100" placeholder="Locality" name="locality" id="locality">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                </div>
              </div>
              <!--/Pincode locality-->

              <!--address-->
              <div class="form-group">
                <h5>Address</h5>
                <textarea id="addr"  rows="5" class="px-2 py-1 w-100 form-control " placeholder="Address(Area and Street)"  ></textarea>
              </div>
              <!--/address-->

              <!--city state-->
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <h5>City/District/Town</h5>
                    <input type="text" class="form-control w-100" placeholder="City/District/Town" name="city" id="city" >
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="col">
                    <label for="inputState" class="state_label mb-0"><h5>State</h5></label>
                    <select id="state" class="form-control br-radius-zero state_list">
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
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <h5>Landmark(Optional)</h5>
                    <input type="text" class="form-control w-100" placeholder="Landmark(Optional)" name="landmark" id="landmark">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="col">
                    <h5>Alternative No.(Optional)</h5>
                    <input type="text" class="form-control w-100" placeholder="Alternative Mobile Number(Optional)" name="mob2" id="mobile2">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                </div>
              </div>
              <!--/landmark mobile2-->

              <!--addr type-->

              <div class="radio-group"> 
                <div class="title">
                  <h5>Address Type</h5>
                </div>               
                <label class="radio-inline">
                <input type="radio" id="addrtype" name="addtype" value="home" required > Home
                </label>
                <label class="radio-inline">
                <input type="radio" id="addrtype"name="addtype"  value="work"  > Work
                </label>
              </div>
              <div class="form-action">
                <button type="button" class="btn btn-primary w-100" id="submit">ADD</button> 
              </div> 
              <!--/addr type-->  
            </form>           
          </div>
        </div>
      </div>
    </div>    
  </section>
</main>
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

<!--<script >

  //ADD
   $(document).ready(function(){
    $("#submit").click(function(){
    
        var pcode = $('#pcode').val();
        var locality = $('#locality').val();
       // var address1 =$('#address').val();
        var city = $('#city').val();
        var landmark = $('#landmark').val();
        var mobile2 = $('#mobile2').val();
       // alert(address1);

        $.ajax({
            url:"address_retrieving.php",
            type:'post',
            data:{ pcode : pcode , locality : locality, city : city,
                  landmark : landmark , mobile2 : mobile2},

           sucess:function(dataResult)
           {
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200)
            {
             alert(result);
            }
            else if(dataResult.statusCode==201)
            {
             alert("Error occured !");
            }
           
          }
      });
   });
  
</script>-->
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
        //alert(myValue);
        //var addrtype = $('#addrtype').val();
        if(pcode!="" && locality!="" && city!="" )
        {
          $.ajax({
            url: 'address_retrieving.php',
            type: "POST",
            data: { pcode: pcode,locality: locality,address : address, landmark: landmark,city: city,state : state,mobile2 : mobile2,addrtype : myValue},
             success:function(result)
             {
             // window.location.href = window.location.href;
               $('#fupForm')[0].reset();
               Swal.fire({
                          icon: 'success',
                          title: 'Address Added...!!!',
                        }).then((result) => {
                        if (result.value) {
                           window.location.href = "address.html";
                       }
                   });
            }
          });
        }
      });
    });
</script>
<!--/Address-->