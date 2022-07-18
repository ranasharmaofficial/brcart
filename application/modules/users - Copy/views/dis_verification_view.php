<style>
star {
    color: red;
}

.error_prefix {
    color: red;
}

.razorpay-payment-button {
    color: white !important;
    background-color: #251564 !important;
    border-color: #251564;
    font-size: 14px;
    width: 100%;
    height: 45px;
    text-align: center;
    border-radius: 2px;
    padding: 10px;
}
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Conifirm Your Details</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Sign Up</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Conifirm Your Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-0 py-lg-5">
            <div class="container">
                <div class="section-authentication-signin d-flex align-items-center justify-content-center my-lg-0">
                    <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Conifirm Your Details</h3>
                                        </div>

                                        <div class="form-body">
                                            <?php if(!empty($success_msg)){ ?>
                                            <br>
                                            <div class="alert alert-icon alert-success alert-bg alert-inline">
                                                <h4 class="alert-title">
                                                    <i class="fas fa-check"></i>Success!
                                                </h4>&nbsp;<p class=""><?php echo $success_msg; ?> </p>
                                            </div>

                                            <?php  } elseif(!empty($error_msg)) { ?>
                                            <br>
                                            <div style="padding:5px;"
                                                class="alert alert-icon alert-danger alert-bg alert-inline">
                                                <h4 class="alert-title">
                                                    <i class="w-icon-times-circle"></i>Oh!
                                                </h4>&nbsp;<p class=""><?php echo $error_msg; ?> </p>
                                            </div>
                                            <?php  } ?>

                                            <?php if($this->session->userdata('mobile_no')) { ?>

                                            <div class="row g-3">
                                                <div class="col-sm-12">
                                                    <label for="inputFirstName" class="form-label">Select User
                                                        Type</label>
                                                    <?php if($this->session->userdata('user_type')=='1') { ?>
                                                    <input readonly type="text" class="form-control" id="inputFirstName"
                                                        value="Distributor" />
                                                    <?php } else if($this->session->userdata('user_type')=='2') { ?>
                                                    <input readonly type="text" class="form-control" id="inputFirstName"
                                                        value="Retailer" />
                                                    <?php } ?>

                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputFirstName" class="form-label">First Name</label>
                                                    <input readonly type="text" class="form-control" id="inputFirstName"
                                                        value="<?php echo $this->session->userdata('first_name'); ?>" />

                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="inputLastName" class="form-label">Last Name</label>
                                                    <input readonly type="text" class="form-control" id="inputLastName"
                                                        value="<?php echo $this->session->userdata('last_name'); ?>" />

                                                </div>
                                                <div class="col-6">
                                                    <label for="inputEmailAddress" class="form-label">Email
                                                        Address</label>
                                                    <input readonly type="email" class="form-control"
                                                        id="inputEmailAddress"
                                                        value="<?php echo $this->session->userdata('email'); ?>" />

                                                </div>
                                                <div class="col-6">
                                                    <label for="inputMobile" class="form-label">Mobile No.</label>
                                                    <input readonly type="tel" class="form-control" id="inputMobile"
                                                        value="<?php echo $this->session->userdata('mobile_no'); ?>" />
                                                </div>
                                                <div class="col-6">
                                                    <label for="State" class="form-label">State</label>
                                                    <input readonly type="text" class="form-control" id="State"
                                                        value="<?php echo $this->session->userdata('state'); ?>" />

                                                </div>
                                                <div class="col-6">
                                                    <label for="City" class="form-label">City</label>
                                                    <input readonly type="text" class="form-control" id="City"
                                                        value="<?php echo $this->session->userdata('city'); ?>" />
                                                </div>


                                                <div class="col-12">
                                                    <div class="d-grid">

                                                        <form method="post" action="" enctype="multipart/form-data">

                                                            <input type="hidden" name="first_name"
                                                                value="<?= $this->session->userdata('first_name'); ?>">
                                                            <input type="hidden" value="last_name"
                                                                name="<?= $this->session->userdata('last_name'); ?>">
                                                            <input type="hidden" value="mobile_no"
                                                                name="<?= $this->session->userdata('mobile_no'); ?>">
                                                            <input type="hidden" value="email"
                                                                name="<?= $this->session->userdata('email'); ?>">
                                                            <input type="hidden" value="state"
                                                                name="<?= $this->session->userdata('state'); ?>">
                                                            <input type="hidden" value="city"
                                                                name="<?= $this->session->userdata('city'); ?>">
                                                            <input type="hidden" value="password"
                                                                name="<?= $this->session->userdata('password'); ?>">
                                                            <input type="hidden" value="user_type"
                                                                name="<?= $this->session->userdata('user_type'); ?>">
                                                            <input type="hidden" value="100"
                                                                name="<?= $this->session->userdata('amount'); ?>">
                                                            <input type="hidden" value="pay_online" name="pay_online">
                                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                                data-key="rzp_test_4ThugwziGyAF6F" data-amount="1000"
                                                                data-buttontext="Pay Now" data-name="Sharma Telecom"
                                                                data-description="Pay Registration Fee"
                                                                data-image="<?= WEB_ATTACHMENT_LOGO_PATH; ?><?= $headerLogo; ?>"
                                                                data-prefill.name="<?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?>"
                                                                data-prefill.contact="<?= $this->session->userdata('mobile_no'); ?>"
                                                                data-prefill.email="<?= $this->session->userdata('email'); ?>"
                                                                data-theme.color="#251564"></script>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php } ?>
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
<?php if(false) { ?>
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

                    <div class="tab-content">
                        <?php  
						if(!empty($success_msg)){ ?>
                        <br>
                        <div class="alert alert-icon alert-success alert-bg alert-inline">
                            <h4 class="alert-title">
                                <i class="fas fa-check"></i>Succcess!
                            </h4>&nbsp;<p class=""><?php echo $success_msg; ?> </p>
                        </div>

                        <?php  } elseif(!empty($error_msg)) { ?>
                        <br>
                        <div style="padding:5px;" class="alert alert-icon alert-danger alert-bg alert-inline">
                            <h4 class="alert-title">
                                <i class="w-icon-times-circle"></i>Oh!
                            </h4>&nbsp;<p class=""><?php echo $error_msg; ?> </p>
                        </div>
                        <?php  } ?>
                        <?php if(isset($_SESSION['mobile'])) { ?>
                        <br>

                        <div class="">

                            <h1 class="text-black font-weight-bold">&nbsp;&nbsp;Verify mobile number</h1></br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">

                                        <label style="font-size:15px;margin-left:px;margin-top:3px;"
                                            class="form-check-label">
                                            +91&nbsp;<?php echo $_SESSION['mobile']; ?> </label>

                                    </div>

                                    <div class="col-2">
                                        <a href="<?php echo WEB_URL.'users/login'?>">
                                            <label style="cursor:pointer;font-size:15px;margin-top:5px;float:right;"
                                                class="form-check-label text-primary">
                                                Change
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <p>SMS with an OTP has been sent to the number above.
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <?php } ?>
                            <div class="active" id="sign-in">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Otp <star>*</star></label>
                                        <input style="font-size:18px;" type="text" class="form-control" name="otp"
                                            id="otp">
                                        <?php echo form_error('otp'); ?>
                                    </div>
                                    <?php if(false) { ?>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input style="font-size:20px;" type="checkbox" class="custom-checkbox"
                                            id="remember1" name="remember1">
                                        <label for="remember1">Remember me</label>
                                        <a style="font-size:20px;" href="#">Lost your password?</a>
                                    </div>
                                    <?php } ?>
                                    <button
                                        style="width:100%;height:40px;background-color:#ffc107;border:1px solid #ffc107;"
                                        class="" type="submit" name="verifyotp" value="verifyotp">VERIFY</button>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
</main>
<!-- End of Main -->
<?php } ?>