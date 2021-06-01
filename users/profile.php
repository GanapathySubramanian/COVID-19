<?php include('partials/user-nav.php');?>
<div id="profile">
            <br>
            <div class="container mt-5">
                    <div class="col-md-5">
                        <div class="form-area"> 
                            <form role="form" method="post" action="partials/users_db.php" autocomplete="off">
                                <h3 style="margin-bottom: 25px;font-size: 25px text-primary font-weight-bold">Edit Profile</h3>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo "$loggeduser_id"?>">
                                <input type="hidden" class="form-control" id="email" name="email_id" value="<?php echo "$loggeduser_email"?>">

                                    <div class="form-group">
                                        <label style="">Fullname</label><br/>
                                        <input type="text" class="form-control" id="name" name="username" value="<?php echo "$loggeduser_name"?>">
                                    </div>
                                    
                                 <div class="form-group">
                                        <label style="">Phone Number</label><br/>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?php echo "$loggeduser_phone"?>">
                                    </div>
     
                                    </div>
                                    <button type="submit" name="edituser_profile" class="btn btn-info pull-right">Update</button><br><br>
                                    
                            </form>
                            
                            <form role="form" method="post" action="partials/users_db.php" autocomplete="off">
                            
                                <h3 style="margin-bottom: 25px;font-size: 25px;">Change Password</h3>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo "$loggeduser_id"?>">
                                <input type="hidden" class="form-control" id="user_pass" name="user_pass" value="<?php echo "$loggeduser_password"?>">
                                <input type="hidden" class="form-control" id="email" name="email_id" value="<?php echo "$loggeduser_email"?>">
                                   
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="old_password" placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="password" class="form-control" id="password" name="new_password" placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group">
                                       
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" name="changeuser_password"class="btn btn-info pull-right">Update</button>
                                </form>
                            </div>
                        </div>      
                    </div>
</div>
<?php include('partials/user-footer.php');?>