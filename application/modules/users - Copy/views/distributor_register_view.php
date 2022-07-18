<style>
star {
    color: red;
}

.error_prefix {
    color: red;
}
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Sign Up</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo WEB_URL; ?>"><i
                                            class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section style="margin-top:100px;" class="py-0 py-lg-15 mt-5">
            <div class="container">
                <div
                    class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                    <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
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
                                                    <label for="inputFirstName" class="form-label">Select User
                                                        Type</label>
                                                    <select class="form-control" name="user_type" id="inputFirstName">
                                                        <option selected disabled>---Select User Type---</option>
                                                        <option value="1">Distributor</option>
                                                        <option value="2">Retailer</option>
                                                    </select>

                                                </div>
                                                <?php echo form_error('first_name'); ?>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="first_name"
                                                        id="inputFirstName"
                                                        value="<?php echo set_value('first_name'); ?>" />

                                                </div>
                                                <?php echo form_error('first_name'); ?>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label">Last Name</label>
                                                    <input required type="text" name="last_name" class="form-control"
                                                        id="inputLastName"
                                                        value="<?php echo set_value('last_name'); ?>" />
                                                    <?php echo form_error('last_name'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <input required type="email" name="email" class="form-control"
                                                        id="inputEmailAddress"
                                                        value="<?php echo set_value('email'); ?>" />
                                                    <?php echo form_error('email'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputMobile" class="form-label">Mobile No.</label>
                                                    <input required type="tel" name="mobile_no" class="form-control"
                                                        id="inputMobile"
                                                        value="<?php echo set_value('mobile_no'); ?>" />
                                                    <?php echo form_error('mobile_no'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="State" class="form-label">State</label>
                                                    <input required type="text" name="state" class="form-control"
                                                        id="State" value="<?php echo set_value('state'); ?>" />
                                                    <?php echo form_error('state'); ?>
                                                </div>
                                                <div class="col-6">
                                                    <label for="City" class="form-label">City</label>
                                                    <input required type="text" name="city" class="form-control"
                                                        id="City" value="<?php echo set_value('city'); ?>" />
                                                    <?php echo form_error('city'); ?>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input required type="password" name="password"
                                                            class="form-control" id="inputChoosePassword" />
                                                        <?php echo form_error('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="confirmPass" class="form-label">Confirm Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input required type="password" name="conf_password"
                                                            class="form-control" id="confirmPass" />
                                                        <?php echo form_error('conf_password'); ?>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">I
                                                            read and agree to Terms & Conditions</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button name="submit" value="submit" type="submit"
                                                            class="btn btn-dark"><i class='bx bx-user'></i>Sign
                                                            up</button>
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
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
<!--end page wrapper -->
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