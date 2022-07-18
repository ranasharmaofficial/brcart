<style>
star {
    color: red;
}

.error_prefix {
    color: red;
}
</style>

<!-- Start of Main -->
<main class="main login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Verify Otp</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                <li>Verify Otp</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <?php if(false) { ?><ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="#sign-in" class="nav-link active">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sign-up" class="nav-link">Sign Up</a>
                        </li>
                    </ul><?php } ?>
                    <div class="tab-content">
                        <?php  
						if(!empty($success_msg)){ ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <?php echo $success_msg; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <?php  } elseif(!empty($error_msg)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <?php echo $error_msg; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
                        </div>
                        <?php  } ?>

                        
                        <div class="tab-pane active" id="sign-in">
                            <form autocomplete="off" action="" method="post">
                                <div class="form-group">
                                    <label for="otp_two">Enter Otp *</label>
                                    <input maxlength="6" min="6" required style="font-size:18px;" type="tel"  class="form-control" name="otp_two" id="otp_two">
									<?php echo form_error('otp_two'); ?>
                                </div>
								
                                <div class="send-button">
                                    <button style="font-size:14px;" class="btn btn-primary w-100 font-weight-bold" type="submit" name="verify_otp">Verify</button>
                                </div>
                            </form>
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