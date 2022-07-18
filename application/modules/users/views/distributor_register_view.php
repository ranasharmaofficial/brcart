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
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li>Distributor Login</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="card mb-0">
                                <div class="card-body">
								<?php if(isset($_GET['error_message'])) { ?>
									<div class="alert alert-danger">
									This number is already registered with us.
									</div>
								<?php } ?>
                                    <?php if(!empty($success_msg)){ ?>
                                    <br>
                                    <div class="alert alert-icon alert-success alert-bg alert-inline">
                                        <h4 class="alert-title">
                                            <i class="fas fa-check"></i>Success!
                                        </h4>&nbsp;<p class=""><?php echo $success_msg; ?> </p>
                                    </div>

                                    <?php  } elseif(!empty($error_message)) { ?>
                                    <br>
                                    <div style="padding:5px;"
                                        class="alert alert-icon alert-danger alert-bg alert-inline">
                                        <h4 class="alert-title">
                                            <i class="w-icon-times-circle"></i>Oh!
                                        </h4>&nbsp;<p class=""><?php echo $error_message; ?> </p>
                                    </div>
                                    <?php  } ?>
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign Up</h3>
                                            <p>Already have an account? <a href="<?php echo WEB_URL.'distributor-login'?>">Sign in
                                                    here</a>
                                            </p>
                                        </div>

                                        <div class="form-body">
                                            <form class="row g-3" method="post" action="<?php echo WEB_URL.'distributor-register'?>">
                                                <div class="col-sm-12">
                                                    <label style="font-size:18px;" for="inputFirstName" class="form-label">Select User
                                                        Type</label>
                                                    <select style="font-size:18px;" class="form-control" name="user_type" id="inputFirstName">
                                                        <option selected disabled>---Select User Type---</option>
                                                        <option value="1">Distributor</option>
                                                        <option value="2">Retailer</option>
                                                    </select>

                                                </div>
                                                <?php echo form_error('first_name'); ?>
                                                <div class="col-sm-6">
                                                    <label style="font-size:18px;" for="inputFirstName" class="form-label">First Name</label>
                                                    <input style="font-size:18px;" type="text" class="form-control" name="first_name"
                                                        id="inputFirstName"
                                                        value="<?php echo set_value('first_name'); ?>" />

                                                </div>
                                                <?php echo form_error('first_name'); ?>
                                                <div class="col-sm-6">
                                                    <label style="font-size:18px;" for="inputLastName" class="form-label">Last Name</label>
                                                    <input style="font-size:18px;" required type="text" name="last_name" class="form-control"
                                                        id="inputLastName"
                                                        value="<?php echo set_value('last_name'); ?>" />
                                                    <?php echo form_error('last_name'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label style="font-size:18px;" for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <input style="font-size:18px;" required type="email" name="email" class="form-control"
                                                        id="inputEmailAddress"
                                                        value="<?php echo set_value('email'); ?>" />
                                                    <?php echo form_error('email'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label style="font-size:18px;" for="inputMobile" class="form-label">Mobile No.</label>
                                                    <input style="font-size:18px;" required type="tel" name="mobile_no" class="form-control"
                                                        id="inputMobile"
                                                        value="<?php echo set_value('mobile_no'); ?>" />
                                                    <?php echo form_error('mobile_no'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label style="font-size:18px;" for="State" class="form-label">State</label>
                                                    <input style="font-size:18px;" required type="text" name="state" class="form-control"
                                                        id="State" value="<?php echo set_value('state'); ?>" />
                                                    <?php echo form_error('state'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label style="font-size:18px;" for="City" class="form-label">City</label>
                                                    <input style="font-size:18px;" required type="text" name="city" class="form-control"
                                                        id="City" value="<?php echo set_value('city'); ?>" />
                                                    <?php echo form_error('city'); ?>
                                                </div>
                                                <div class="col-12">
                                                    <label style="font-size:18px;" for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input style="font-size:18px;" required type="password" name="password"
                                                            class="form-control" id="inputChoosePassword" />
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label style="font-size:18px;" for="confirmPass" class="form-label">Confirm Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input style="font-size:18px;" required type="password" name="conf_password"
                                                            class="form-control" id="confirmPass" />
                                                        <?php echo form_error('conf_password'); ?>
                                                    </div>
                                                </div>

                                                
                                                <div class="col-12 my-3">
                                                    <div class="d-grid">
                                                        <button name="submit" style="font-size:18px;" value="submit" type="submit"
                                                            class="btn btn-dark"><i class='bx bx-user'></i>Sign&nbsp;up</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
            </div>
        </main>
        <!-- End of Main -->
		
		
<script>
$(function() {
    $('#view_pass').click(function() {
        if ($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password').attr('type', 'text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type', 'password');
        }
    });
});
</script>