<!--Profile-->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="profile">
						<div class="profile-img">
							<img src="images/userprofile.gif" alt="Profile_image" class="rounded-circle img-fluid" >
						</div>
						<div class="user-name">
							<small>Hello,</small>
							<h6><?php echo $_SESSION['Uname'];?> <?php echo $_SESSION['Lname'];?></h6>
						</div>
					</div>
                    <div class="account">
                        <div class="account-setting" >
                            <i class="fas fa-user"><span>Account Setting</span></i>
                        </div>

                        <!--Personal info-->
                        <div class="profile-info account-info">
                            <a href="myaccount.html"><h6>Personal Information</h6></a>
                        </div>
                        <!--/Personal info-->
                    
                        <!--address-->
                        <div class="address account-info">
                            <a href="address.html"><h6>Manage Address</h6></a>
                        </div>
                        <!--/address-->
                    
                        <!--Pancard info-->
                        <div class="pan-info account-info">
                            <a href="paninfo.html"><h6>PAN Card Information</h6></a>
                        </div>
                        <!--/Pancard info-->

                        <!--My Order-->
                        <div class="pan-info account-info">
                            <a href="myorder.html"  target="_blank"><h6>Order Details</h6></a>
                        </div>
                        <!--/My Order-->

                        <!--Save Cared Details-->
                        <div class="pan-info account-info">
                            <a href="savecard.html"><h6>Card Details</h6></a>
                        </div>
                        <!--/Save Cared Details-->
                        <!--Change Password-->
                        <div class="pan-info account-info">
                            <a href="changepassword.html"><h6>Change Password</h6></a>
                        </div>
                        <!--/Change Password-->
                    </div>
                    <br>
                </div>
                <!--/Profile-->