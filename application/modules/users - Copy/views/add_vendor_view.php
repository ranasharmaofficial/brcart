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
                    <h1 class="page-title mb-0">Seller Login/Registration</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li>Seller Login/Registration</li>
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
								<?php echo form_error('mobile_no'); ?>
					   <?php  } ?>
							
                                <div class="tab-pane active" id="sign-in">
								<form action="" method="post" >
                                    <div class="form-group">
                                        <label>Mobile Number *</label>
                                        <input style="font-size:16px;" type="text" class="form-control" name="mobile" id="username">
										<?php echo form_error('mobile'); ?>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input style="font-size:16px;" type="password" class="form-control" name="passwords" id="password">
										<?php echo form_error('passwords'); ?>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input style="font-size:16px;" type="checkbox" class="custom-checkbox" id="remember1" name="remember1">
                                        <label for="remember1">Remember me</label>
                                        <a style="font-size:16px;" href="#">Lost your password?</a>
                                    </div>
                                    <input style="width:100%;height:40px;background-color:#007bff;border:1px solid #007bff;font-size:15px;color:#fff;font-weight:bold;" class="btn" type="submit" name="VendorloginSubmit" value="LOGIN">
									
                                <a style="font-size:16px;" href="#sign-up">Don't have and account? Sign Up</a>
							</form>	
								</div>
								
								
								 <div class="tab-pane" id="sign-up">
									<form method="post" class="row" action="">    
								 
									<div class="form-group mb-5 col-sm-6">
										<label>First Name *</label>
										<input style="font-size:16px;" value="<?php echo set_value('first_name'); ?>" type="text" class="form-control form-control-sm" name="first_name" id="first-name">
										<?php echo form_error('first_name'); ?>
									</div>
									<div class="form-group mb-5 col-sm-6">
										<label>Last Name *</label>
										<input style="font-size:16px;" value="<?php echo set_value('last_name'); ?>" type="text" class="form-control" name="last_name" id="last-name">
										<?php echo form_error('last_name'); ?>
									</div>
									<div class="form-group mb-5 col-sm-6">
										<label>Mobile Number *</label>
										<input style="font-size:16px;" value="<?php echo set_value('mobile_no'); ?>" type="text" class="form-control" name="mobile_no" id="last-name">
										<?php echo form_error('mobile_no'); ?>
									</div>
                                    <div class="form-group mb-5 col-sm-6">
                                        <label>Your email address *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('email'); ?>" type="text" class="form-control" name="email" id="email_1" >
										<?php echo form_error('email'); ?>
                                    </div>
									<div class="form-group mb-5 col-sm-6">
                                        <label>Shop Name *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('shop_name'); ?>" type="text" class="form-control" name="shop_name">
										<?php echo form_error('shop_name'); ?>
                                    </div>
									<div class="form-group mb-5 col-sm-6">
                                        <label>Shop Number *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('shop_number'); ?>" type="text" class="form-control" name="shop_number">
										<?php echo form_error('shop_number'); ?>
                                    </div>
									<div class="form-group mb-5 col-sm-6">
                                        <label>Shop address *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('shop_address'); ?>" type="text" class="form-control" name="shop_address">
										<?php echo form_error('shop_address'); ?>
                                    </div>
									<div class="form-group mb-5 col-sm-6">
                                        <label>Owner Name *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('owner_name'); ?>" type="text" class="form-control" name="owner_name">
										<?php echo form_error('owner_name'); ?>
                                    </div>
									<div class="form-group mb-5 col-sm-6">
                                        <label>Registration Number *</label>
                                        <input style="font-size:16px;" value="<?php echo set_value('reg_number'); ?>" type="text" class="form-control" name="reg_number">
										<?php echo form_error('reg_number'); ?>
                                    </div>
									
									 <div class="form-group mb-5 col-sm-6">
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
                
				
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" id="inlineCheckbox1" name="gender" value="Male" <?php echo $mcheck; ?>>
			  <label class="form-check-label" for="inlineCheckbox1">Male</label>
			</div>
			
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" id="inlineCheckbox2" name="gender" value="Female" <?php echo $fcheck; ?>>
			  <label class="form-check-label" for="inlineCheckbox2">Female</label>
			</div>
				
				
				</div>
                                    <div class="form-group mb-5 col-sm-6">
                                        <label>Password *</label>
                                        <input style="font-size:16px;" type="password" class="form-control" name="password" id="password_1">
										<?php echo form_error('password'); ?>
                                    </div> 
									<div class="form-group mb-5 col-sm-6">
                                        <label>Password *</label>
                                        <input style="font-size:16px;" type="password" class="form-control" name="conf_password" id="password_1">
										<?php echo form_error('conf_password'); ?>
                                    </div>
									
                                      <button type="submit" value="submit" name="VendorsignupSubmit" style="width:100%;height:40px;background-color:#007bff;border:1px solid #007bff;font-size:15px;color:#fff;font-weight:bold;"class="btn">Sign Up</button>
                               
						</form>	
								
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
		
		