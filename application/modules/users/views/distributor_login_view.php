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
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Distributor Login</h3>
                                            <p>Already have an account? <a href="<?php echo WEB_URL.'distributor-register'?>">Sign up Here</a>
                                            </p>
                                        </div>
                                        
                                        <div class="form-body">
                                            <form class="row g-3" method="post" action="<?php echo WEB_URL.'distributor-login'?>">
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
                                                <div class="col-sm-12">
                                                    <label style="font-size:18px;" for="inputChoosePassword" class="form-label">Mobile Number</label>
                                                    <div class="input-group" id="mobile">
                                                        <input style="font-size:18px;"  required type="tel" name="mobile" class="form-control" id="inputChoosePassword"/>
														<?php echo form_error('mobile'); ?>
                                                    </div>
                                                </div>
												<div class="col-sm-12">
                                                    <label for="confirmPass" style="font-size:18px;"  class="form-label">Password</label>
                                                    <div class="input-group" id="password">
                                                        <input style="font-size:18px;"  required type="password" name="passwords" class="form-control" id="confirmPass"/>
														<?php echo form_error('passwords'); ?>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <div class="col-sm-12">
                                                     
                                                        <button name="loginSubmit" value="loginSubmit" type="submit" class="btn btn-dark w-100 my-3"><i
                                                                class='bx bx-user'></i>Sign In</button>
                                                     
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
