<style>
star{
	color:red;
}
.error_prefix
{
	color:red;
}
</style>
		
		 <!-- Start of Main -->
        <main class="main login-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="login-popup">
                        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                            <ul class="nav nav-tabs text-uppercase" role="tablist">
                                <li class="nav-item">
                                    <a href="#sign-in" class="nav-link active">Sign Up</a>
                                </li>
                                <li onclick="window.location.href='<?php echo WEB_URL.'login'?>'" class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">Sign In</a>
                                </li>
                            </ul>
                            <div class="tab-content">
							
							<?php 
						
						if(!empty($success_msg)){ ?>
						</br>	
						 <p style="text-align:center;color:#27AE60;font-size:15px;border: 3px dashed #27AE60;padding:5px;border-radius:5px;" class="status-msg success"><?php echo $success_msg; ?> </p>
					   <?php  } elseif(!empty($error_msg)) { ?>
					   </br><p style="text-align:center;color:#F74D28;font-size:15px;border: 3px dashed #F74D28;padding:5px;border-radius:5px;" class="status-msg success"><?php echo $error_msg; ?> </p>
							 
					  <?php  } ?>
                                <div class="tab-pane active" id="sign-up">
						<form method="post" action="">    
								<div class="tab-pane" id="sign-up">
									<div class="form-group mb-5">
										<label>First Name *</label>
										<input style="font-size:20px;" value="<?php echo set_value('first_name'); ?>" type="text" class="form-control" name="first_name" id="first-name">
										<?php echo form_error('first_name'); ?>
									</div>
									<div class="form-group mb-5">
										<label>Last Name *</label>
										<input style="font-size:20px;" value="<?php echo set_value('last_name'); ?>" type="text" class="form-control" name="last_name" id="last-name">
										<?php echo form_error('last_name'); ?>
									</div>
									<div class="form-group mb-5">
										<label>Mobile Number *</label>
										<input style="font-size:20px;" value="<?php echo set_value('mobile_no'); ?>" type="text" class="form-control" name="mobile_no" id="last-name">
										<?php echo form_error('mobile_no'); ?>
									</div>
                                    <div class="form-group">
                                        <label>Your email address *</label>
                                        <input style="font-size:20px;" value="<?php echo set_value('email'); ?>" type="text" class="form-control" name="email" id="email_1" >
										<?php echo form_error('email'); ?>
                                    </div>
									 <div class="form-group">
                <label>Gender: </label>
                <?php 
                if(!empty($user['gender']) && $user['gender'] == 'Female'){ 
                    $fcheck = 'checked="checked"'; 
                    $mcheck = ''; 
                }else{ 
                    $mcheck = 'checked="checked"'; 
                    $fcheck = ''; 
                } 
                ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
						Male
                    </label>
                    <label>
                        <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                        Female
                    </label>
                </div>
                                    <div class="form-group mb-5">
                                        <label>Password *</label>
                                        <input style="font-size:20px;" type="password" class="form-control" name="password" id="password_1">
										<?php echo form_error('password'); ?>
                                    </div> 
									<div class="form-group mb-5">
                                        <label>Password *</label>
                                        <input style="font-size:20px;" type="password" class="form-control" name="conf_password" id="password_1">
										<?php echo form_error('conf_password'); ?>
                                    </div>
                                      <button type="submit" value="submit" name="signupSubmit" class="btn btn-primary">Sign Up</button>
                                </div>
						</form>	
									<a style="font-size:20px;" href="<?php echo WEB_URL.'login'?>">Have an account? Sign in now.</a>
							
								</div>
                            	
                            </div>
							<?php if(false) { ?>
                            <div class="social-icons social-icon-border-color d-flex justify-content-center">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-google fab fa-google"></a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End of Main -->
		
		