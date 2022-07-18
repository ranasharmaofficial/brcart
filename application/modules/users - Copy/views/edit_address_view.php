<style>
.error_prefix {
    color: red;
}
</style>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Your Address</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg p-2">

                <?php include 'profile_left.php';?>

                <div class="tab-content mb-6">
                    <div class="tab-pane " id="account-dashboard">
                        <p class="greeting">
                        <div class="container">
                            <?php if ($user['is_vendor'] == '1') {?>
                            <div class="store store-banner mb-4">
                                <figure class="store-media">
                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/profile_background.jpg" alt="Vendor"
                                        width="930" height="416" style="background-color: #414960;" />
                                </figure>
                                <div class="store-content">
                                    <figure class="seller-brand">
                                        <img src="<?php echo WEB_PATH_FRONT; ?>images/vendor/brand/1.jpg" alt="Brand"
                                            width="80" height="80" />
                                    </figure>
                                    <h4 class="store-title">Welcome <?php echo $user['first_name']; ?>!</h4>
                                    <ul class="seller-info-list list-style-none mb-6">
                                        <li class="store-address">
                                            <i class="w-icon-map-marker"></i>
                                            Steven Street, El Carjon
                                            California, United States (US)
                                        </li>
                                        <li class="store-phone">
                                            <a href="tel:<?php echo $user['mobile_no']; ?>">
                                                <i class="w-icon-phone"></i>
                                                <?php echo $user['mobile_no']; ?>
                                            </a>
                                        </li>
                                        <li class="store-phone">
                                            <a href="mailto:<?php echo $user['email']; ?>">
                                                <i class="w-icon-envelop"></i>
                                                <?php echo $user['email']; ?>
                                                <p><b>Gender: </b><?php echo $user['id_user']; ?></p>
                                                <p><b>Gender: </b><?php echo $user['id_user_type']; ?></p>
                                                <p><b>Usertype:
                                                    </b><?php echo $this->session->userdata('id_user_type'); ?></p>
                                                <p><b>Id: </b><?php echo $this->session->userdata('userId'); ?></p>
                                            </a>
                                        </li>

                                        <li class="store-rating">
                                            <i class="w-icon-star-full"></i>
                                            4.33 rating from 3 reviews
                                        </li>
                                        <li class="store-open">
                                            <i class="w-icon-cart"></i>
                                            Store Open
                                        </li>
                                    </ul>
                                    <?php if (false) {?>
                                    <div class="social-icons social-no-color border-thin">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-google w-icon-google"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div><?php }?>
                                </div>
                            </div>
                            <?php }?>
                            <?php if ($user['is_vendor'] == '0') {?>
                            <section class="mb-10 row">
                                <div class="col-2 col-md-2 col-sm-2 col-xs-2 mb-4">
                                </div>
                                <div class="col-sm-8 col-md-8 col-sm-8 col-xs-8 mb-4">
                                    <div style="border:2px solid #143250;" class="card shadow">
                                        <div style="background-color:#143250;color:#fff;" class="card-header">Profile
                                            Details</div>
                                        <div class="card-body">
                                            <h2>Welcome <?php echo $user['first_name']; ?>!</h2>

                                            <div class="regisFrm">
                                                <p><b>Name:
                                                    </b><?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                                                </p>
                                                <p><b>Email: </b><?php echo $user['email']; ?></p>
                                                <p><b>Phone: </b><?php echo $user['mobile_no']; ?></p>
                                                <p><b>Gender: </b><?php echo $user['gender']; ?></p>
                                                <p><b>Gender: </b><?php echo $user['gender']; ?></p>
                                                <p><b>Gender: </b><?php echo $user['gender']; ?></p>
                                                <?php if (false) {?><p><b>Cust: </b><?php echo $user['id_user']; ?></p>
                                                <p><b>Seller: </b><?php echo $user['is_vendor']; ?></p>
                                                <p><b>ID: </b><?php echo $this->session->userdata('userId'); ?></p>
                                                <?php }?>
                                                <p><b>ID: </b><?php echo $userId; ?></p><?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2 col-md-2 col-sm-2 col-xs-2 mb-4">
                                </div>
                            </section>
                            <!-- End of Store Banner -->

                            </p>

                        </div>


                        <p class="mb-4">
                            From your account dashboard you can view your <a href="#account-orders"
                                class="text-primary link-to-tab">recent orders</a>,
                            manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                and billing
                                addresses</a>, and
                            <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                account details.</a>
                        </p>

                        <div class="row">

                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-orders" class="link-to-tab ">
                                    <div style="border-radius:8px;" class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-orders">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-orders"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Orders</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-downloads" class="link-to-tab">
                                    <div class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-download">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-download"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Downloads</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-addresses" class="link-to-tab">
                                    <div class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-address">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-map-marker"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Addresses</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-details" class="link-to-tab">
                                    <div class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-account">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-user"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Account Details</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="wishlist.html" class="link-to-tab">
                                    <div class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-wishlist">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-heart"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Wishlist</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="<?php echo WEB_URL . 'logout' ?>">
                                    <div class="icon-box text-center myaccount_box">
                                        <span class="icon-box-icon icon-logout">
                                            <i style="text-decoration:none;color:#fff;" class="w-icon-logout"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">
                                                Logout</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>





                    <div class="tab-pane active in" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light mb-4">
                            <div class="icon-box-content">
                                <h3 class="address-box-title mb-0 ls-normal">Your Addresses</h3>
                            </div>
                        </div>

                        <div class="container">
                            <h4 style="" class="font-weight-bold">Update Address</h4>
                            <hr>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Full Name *</label>
                                            <input style="font-size:16px;" type="text"
                                                value="<?php echo $row['fullname']; ?>" id="firstname" name="name"
                                                class="form-control form-control-md">
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="ref"
                                        value="<?php if (isset($_GET['ref'])) {echo $_GET['ref'];} else {echo '';}?>">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Mobile">Mobile Number *</label>
                                            <input type="text" value="<?php echo $row['mobile']; ?>" id="Mobile"
                                                name="mobile" style="font-size:16px;"
                                                class="form-control form-control-md">
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Pin">Pin Code *</label>
                                            <input type="text" value="<?php echo $row['pin']; ?>" id="Pin" name="pin"
                                                class="form-control form-control-md" style="font-size:16px;">
                                            <?php echo form_error('pin'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Flat">Flat, House No., Building, Company, Apartment *</label>
                                            <input type="text" value="<?php echo $row['house_no']; ?>" id="Flat"
                                                name="house_no" class="form-control form-control-md"
                                                style="font-size:16px;">
                                            <?php echo form_error('house_no'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Area">Area, Street, Sector, Village *</label>
                                            <input type="text" id="Area" value="<?php echo $row['address']; ?>"
                                                name="address" class="form-control form-control-md"
                                                style="font-size:16px;">
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Area">Landmark *</label>
                                            <input type="text" id="Area" value="<?php echo $row['landmark']; ?>"
                                                name="landmark" placeholder="E.g. Near Hospital"
                                                class="form-control form-control-md" style="font-size:16px;">
                                            <?php echo form_error('landmark'); ?>
                                        </div>
                                    </div>
                                    <script language="Javascript" src="<?php echo WEB_PATH_FRONT; ?>search/jquery.js">
                                    </script>
                                    <script type="text/JavaScript" src='<?php echo WEB_PATH_FRONT; ?>search/state.js'>
                                    </script>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">State *</label>
                                            <input type="text" id="state" value="<?php echo $row['state']; ?>"
                                                name="state" class="form-control form-control-md"
                                                style="font-size:16px;">
                                            <?php echo form_error('state'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">City *</label>
                                            <input type="text" id="city" value="<?php echo $row['city']; ?>" name="city"
                                                class="form-control form-control-md" style="font-size:16px;">
                                            <?php echo form_error('city'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">Address Type *</label>
                                            <input type="text" id="city" value="<?php echo $row['address_type']; ?>"
                                                name="address_type" class="form-control form-control-md"
                                                style="font-size:16px;">
                                            <?php echo form_error('address_type'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">Delivery Time *</label>

                                            <select style="font-size:16px;" type="combobox" id="example-email"
                                                name="delivery_time" required class="form-control">
                                                <option value="<?php echo $row['delivery_time']; ?>" selected>
                                                    <?php echo $row['delivery_time']; ?></option>
                                                <option value="Delivery Time (07AM - 11AM)">Delivery Time (07AM - 11AM)
                                                </option>
                                                <option value="Delivery Time (10AM - 02PM)">Delivery Time (10AM - 02PM)
                                                </option>
                                                <option value="Delivery Time (01PM - 05PM)">Delivery Time (01PM - 05PM)
                                                </option>
                                                <option value="Delivery Time (03PM - 07PM)">Delivery Time (03PM - 07PM)
                                                </option>

                                            </select>
                                            <?php echo form_error('delivery_time'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" name="update" value="update" class="btn btnaddress"
                                                style="background: #FFD814;border-color: #FCD200;font-size:15px;">Update
                                                Address</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                    <div class="tab-pane" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                            </div>
                        </div>

                        <form class="form account-details-form" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First name *</label>
                                        <input type="text" value="<?php echo $userrow['first_name']; ?>" id="firstname"
                                            name="firstname" class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last name *</label>
                                        <input type="text" value="<?php echo $userrow['last_name']; ?>" id="lastname"
                                            name="lastname" class="form-control form-control-md">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-6">
                                <label for="email_1">Email address *</label>
                                <input type="email" value="<?php echo $userrow['email']; ?>" id="email_1" name="email"
                                    class="form-control form-control-md">
                            </div>

                            <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                            <div class="form-group">
                                <label class="text-dark" for="cur-password">Current Password leave blank to leave
                                    unchanged</label>
                                <input type="password" class="form-control form-control-md" id="cur-password"
                                    name="cur_password">
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="new-password">New Password leave blank to leave
                                    unchanged</label>
                                <input type="password" class="form-control form-control-md" id="new-password"
                                    name="new_password">
                            </div>
                            <div class="form-group mb-10">
                                <label class="text-dark" for="conf-password">Confirm Password</label>
                                <input type="password" class="form-control form-control-md" id="conf-password"
                                    name="conf_password">
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->