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
                    <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li>Login</li>
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
                                    <a href="#sign-in" class="nav-link active">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#sign-up" class="nav-link">Sign Up</a>
                                </li>
                            </ul>
                            <div class="tab-content">
											<?php  
						if(!empty($success_msg)){ ?>
						<br>
						<div class="alert alert-icon alert-success alert-bg alert-inline">
                                    <h4 class="alert-title">
                                        <i class="fas fa-check"></i>Succcess!</h4>&nbsp;<p class=""><?php echo $success_msg; ?> </p>
                                </div>
						
					   <?php  } elseif(!empty($error_msg)) { ?>
					   <br>
					   <div style="padding:5px;" class="alert alert-icon alert-danger alert-bg alert-inline">
                                    <h4 class="alert-title">
                                        <i class="w-icon-times-circle"></i>Oh!</h4>&nbsp;<p class=""><?php echo $error_msg; ?> </p>
                                </div>
					   <?php  } ?>
							  <div class="tab-pane active" id="sign-in">
								<form action="" method="post" >
                                    <div class="form-group">
                                        <label>Mobile Number *</label>
                                        <input style="font-size:18px;" type="text" class="form-control" name="mobile" id="username">
										<?php echo form_error('mobile'); ?>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input style="font-size:18px;" type="password" class="form-control" name="passwords" id="password">
										<?php echo form_error('passwords'); ?>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input style="font-size:20px;" type="checkbox" class="custom-checkbox" id="remember1" name="remember1">
                                        <label for="remember1">Remember me</label>
                                        <a style="font-size:20px;" href="#">Lost your password?</a>
                                    </div>
                                    <div class="send-button">
										<input class="btn btn-primary"  id="ubaazarlogin" type="submit" name="loginSubmit" value="LOGIN">
									</div>
                                <a style="font-size:20px;" href="#sign-up">Don't have and account? Sign Up</a>
							</form>	
								</div>
								
								
								 <div class="tab-pane" id="sign-up">
									<form method="post" action="">    
								 
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
                                      <button style="width:100%;height:40px;background-color:#ffc107;border:1px solid #ffc107;" type="submit" value="submit" name="signupSubmit" class="">Sign Up</button>
                                </div>
						</form>	
									<a style="font-size:20px;" href="#sign-in">Have an account? Sign in now.</a>
							
								 
                            	
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
		
		