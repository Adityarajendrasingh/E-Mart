
		<div class="col-xl-9 col-lg-9 col-md-6 col-sm-12">
            <div class="details my-3" style="box-shadow: 2px 2px 30px rgba(0,0,0,0.1);">

                      <form action="POST" class="py-3">
                          <!--Name mobile-->
                         <div class="form-group px-4">
                            <h3 style="font-family: 'Baloo Thambi 2', cursive;">Manage Address</h3>
                            <div class="row">
                              <div class="col">
                                <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Name</h5>
                                <input type="text" class="form-control w-100" placeholder="Name" name="fname"  value="<?php echo $_SESSION['Uname']; ?> <?php echo $_SESSION['Lname']; ?>">
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                              </div>
                              <div class="col">
                                <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Mobile Number</h5>
                                <input type="number" class="form-control br-radius-zero" name="mobno" id="mobile" required placeholder="10-Digit Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)" row-rule="Mobile" minlength="10" maxlength="10" />
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
                                      <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Pincode</h5>
                                      <input type="text" class="form-control w-100" placeholder="Pincode" name="pcode" id="pcode"  >
                                      <i class="fa fa-exclamation-circle"></i>
                                      <small>Error message</small>
                                  </div>
                                  <div class="col">
                                      <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Locality</h5>
                                      <input type="text" class="form-control w-100" placeholder="Locality" name="locality" id="locality">
                                      <i class="fa fa-exclamation-circle"></i>
                                      <small>Error message</small>
                                  </div>
                              </div>
                          </div>
                          <!--/Pincode locality-->

                          <!--address-->
                          <div class="form-group py-1 px-4">
                              <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Address</h5>
                              <textarea name="" id="" cols="" rows="5" class="px-2 py-1 w-100 form-control " placeholder="Address(Area and Street)" name="address" id="address"></textarea>
                          </div>
                          <!--/address-->

                          <!--city state-->
                          <div class="form-group py-1 px-4">
                              <div class="row">
                                  <div class="col">
                                      <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">City/District/Town</h5>
                                      <input type="text" class="form-control w-100" placeholder="City/District/Town" name="city" id="city" >
                                      <i class="fa fa-exclamation-circle"></i>
                                      <small>Error message</small>
                                  </div>
                                  <div class="col">
                                      <label for="inputState" class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">State</label>
                                      <select id="inputState" class="form-control br-radius-zero" style="font-size:14px;border:2px solid #f0f0f0;">
                                      <option selected>--Select State--</option>
                                      <option>...</option>
                                      <option>...</option>
                                      <option>...</option>
                                      <option>...</option>
                                      <option>...</option>
                                      <option>...</option>
                                      <option>...</option>
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
                                  <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Landmark(Optional)</h5>
                                  <input type="text" class="form-control w-100" placeholder="Landmark(Optional)" name="landmark" >
                                  <i class="fa fa-exclamation-circle" id="landmark"></i>
                                  <small>Error message</small>
                              </div>
                              <div class="col">
                                  <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Alternative No.(Optional)</h5>
                                  <input type="text" class="form-control w-100" placeholder="Alternative Mobile Number(Optional)" name="mob2" id="mobile2">
                                  <i class="fa fa-exclamation-circle"></i>
                                  <small>Error message</small>
                              </div>
                              </div>
                          </div>
                          <!--/landmark mobile2-->

                          <!--addr type-->

                          <div class="radio-group py-1 px-4" style="font-family: 'Raleway', sans-serif;"> 
                            
                              <h5 class="mb-0" style="color: rgb(105, 105, 105);font-family: 'Rubik', sans-serif;">Address Type</h5>               
                              <label class="radio-inline pr-2 ">
                              <input type="radio" name="addtype" value="home" required > Home
                              </label>
                              <label class="radio-inline pr-4">
                              <input type="radio"name="addtype"  value="work"  >Work
                              </label>
                          </div>
                          <div class="form-group py-1 px-4">
                          	<button type="button" class="btn btn-secondary" id="submit">ADD</button> 
                          </div> 
                          <!--/addr type-->          
                      </form>
                 </div>
            </div>

