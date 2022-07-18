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
                    <h3 class="breadcrumb-title pe-3">Login</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                               <li class="breadcrumb-item active" aria-current="page">Distributor Login</li>
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
                <div
                    class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
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
                                                    <label for="inputChoosePassword" class="form-label">Mobile Number</label>
                                                    <div class="input-group" id="mobile">
                                                        <input required type="tel" name="mobile" class="form-control" id="inputChoosePassword"/>
														<?php echo form_error('mobile'); ?>
                                                    </div>
                                                </div>
												<div class="col-sm-12">
                                                    <label for="confirmPass" class="form-label">Password</label>
                                                    <div class="input-group" id="password">
                                                        <input required type="password" name="passwords" class="form-control" id="confirmPass"/>
														<?php echo form_error('passwords'); ?>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button name="loginSubmit" value="loginSubmit" type="submit" class="btn btn-dark"><i
                                                                class='bx bx-user'></i>Sign In</button>
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
