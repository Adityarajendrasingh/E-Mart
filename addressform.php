        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12">
            <div class="details">
                <form action="POST" id="fupForm">
                    <div class="title">
						<h3>Manage Address</h3>
						<span class="input-group-addon" id="edit">Edit</span>
					    <span class="input-group-addon" id="cancel" hidden>Cancel</span>
					</div>
                    <!--Name mobile-->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <h5>Name</h5>
                            <input type="text" class="form-control" placeholder="Name" name="fname"  value="<?php echo $_SESSION['Uname']; ?> <?php echo $_SESSION['Lname']; ?>" readonly/>
                            <i class="fa fa-exclamation-circle"></i>
                            <small>Error message</small>
                            </div>
                            <div class="col">
                            <h5>Mobile Number</h5>
                            <input type="number" class="form-control br-radius-zero" name="mobno"  id="mobile" required placeholder="10-Digit Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)" row-rule="Mobile" minlength="10" maxlength="10"  value="<?php echo $_SESSION['Umobile']; ?>" readonly />
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
                                <input type="text" class="form-control" placeholder="First name" name="pcode" id="pcode"   value="<?php echo htmlentities($row['pcode']); ?>"readonly>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="col">
                                <h5>Locality</h5>
                                <input type="text" class="form-control" placeholder="Locality" name="locality" id="locality"  value="<?php echo htmlentities($row['locality']); ?>"readonly>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                        </div>
                    </div>
                    <!--/Pincode locality-->

                    <!--address-->
                    <div class="form-group">
                        <h5>Address</h5>
                        <textarea id="addr"  cols="" rows="5" class="form-control " readonly placeholder="Address(Area and Street)" name="address"><?php echo htmlentities($row['address']); ?></textarea>
                    </div>
                    <!--/address-->

                    <!--city state-->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <h5>City/District/Town</h5>
                                <input type="text" class="form-control" placeholder="City/District/Town" name="city" id="city"   value="<?php echo htmlentities($row['city']); ?>"readonly>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="col">
                                <label for="inputState" class="state_label mb-0"><h5>State</h5></label>
                                <select id="state"  class="form-control br-radius-zero state_list" disabled>
                                <?php
                                $options=$row['state'];
                                ?>
                                <option selected>--Select State--</option>
                                <option value="Andhra Pradesh"<?php if($options=="Andhra Pradesh") echo 'selected="selected"'; ?>>Andhra Pradesh</option>
                                <option value="Bihar"<?php if($options=="Bihar") echo 'selected="selected"'; ?>>Bihar</option>
                                <option value="Gujarat"<?php if($options=="Gujarat") echo 'selected="selected"'; ?>>Gujarat</option>
                                <option value="Haryana"<?php if($options=="Haryana") echo 'selected="selected"'; ?>>Haryana</option>
                                <option value="Madhya Pradesh"<?php if($options=="Madhya Pradesh") echo 'selected="selected"'; ?>>Madhya Pradesh</option>
                                <option value="Maharashtra"<?php if($options=="Maharashtra") echo 'selected="selected"'; ?>>Maharashtra</option>
                                <option value="Uttar Pradesh"<?php if($options=="Uttar Pradesh") echo 'selected="selected"'; ?>>Uttar Pradesh</option>
                                <option value="Uttarakhand"<?php if($options=="Uttarakhand") echo 'selected="selected"'; ?>>Uttarakhand</option>
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
                            <input type="text" class="form-control" placeholder="Landmark(Optional)" name="landmark" id="landmark" value="<?php echo htmlentities($row['landmark']); ?>" readonly>
                            <i class="fa fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="col">
                            <h5>Alternative No.(Optional)</h5>
                            <input type="text" class="form-control" placeholder="Alternative Mobile Number(Optional)" name="mob2" id="mobile2" value="<?php echo htmlentities($row['mobile2']); ?>" readonly>
                            <i class="fa fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        </div>
                    </div>
                    <!--/landmark mobile2-->

                    <!--addr type-->

                    <div class="radio-group"> 
                        <?php $addrtype=$row['addrtype'];?>
                        <h5>Address Type</h5>               
                        <label class="radio-inline">
                            <input type="radio" name="addtype" value="home" <?php echo ($addrtype==='home')?'checked':'' ?> style:"color:black;" required disabled > Home
                        </label>
                        <label class="radio-inline">
                            <input type="radio"name="addtype"  value="work" <?php echo ($addrtype==='work')?'checked':'' ?> disabled style:"color:black;" >Work
                        </label>
                    </div>   
                    <!--/addr type--> 
                    <!--submit--> 
                    <div class="form-action">
					    <button type="button"  class="submit btn btn-primary" id="update" hidden>Update</button>
				    </div>        
                    <!--submit-->         
                </form>
            </div>
        </div>
