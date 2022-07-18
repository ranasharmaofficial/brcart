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
                    <h3 class="breadcrumb-title pe-3">Registration Successful</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo WEB_URL; ?>"><i
                                            class="bx bx-home-alt"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Registration Successful</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section style="margin-top:100px;" class="py-0 py-lg-15 mt-5 mb-5 p-10">
            <div class="container">

                <div class="row row-cols-xl-12">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body justify-content-center">
                                <?php if(!empty($success_msg)){ ?>
                                <br>
                                <div class="alert alert-icon alert-success alert-bg alert-inline">
                                    <h4 class="alert-title">
                                        <i class="fas fa-check"></i>Success!
                                    </h4>&nbsp;<p class=""><?php echo $success_msg; ?> </p>
                                </div>

                                <?php  } elseif(!empty($error_message)) { ?>
                                <br>
                                <div style="padding:5px;" class="alert alert-icon alert-danger alert-bg alert-inline">
                                    <h4 class="alert-title">
                                        <i class="w-icon-times-circle"></i>Oh!
                                    </h4>&nbsp;<p class=""><?php echo $error_message; ?> </p>
                                </div>
                                <?php  } ?>
                                <div class="border row rounded justify-content-center">
                                    <div class="col-sm-12 text-center py-3">
                                        <div class="text-center">
                                            <h3 class="">Registration Successful</h3>
                                        </div>


                                        <img style="height:100px;"
                                            src="<?php echo WEB_PATH_FRONT.'images/green-check.png'?>"
                                            class="img-fluid"></br>
                                        <button class="btn bg-info">Back to Login</button>
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