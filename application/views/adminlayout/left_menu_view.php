<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo WEB_URL . 'dashboard/myDashboard' ?>" class="brand-link">
        <img src="<?php echo WEB_PATH_ADMIN; ?>img/favicon.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo SITE_NAME; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo WEB_PATH_ADMIN; ?>img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><small>Logged in
                        as:&nbsp;</small><?php echo $this->session->userdata('first_name'); ?></a>
            </div>
        </div>
        <?php if (false) {?>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php }?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'dashboard/myDashboard' ?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'user/all' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User List
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="echo WEB_URL . 'vendor/all' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Seller List
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'enquiry/all' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Enquiry List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'emailsubscribe/all' ?>" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email Subscription&nbsp;List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ion ion-bag"></i>
                        <p>
                            Manage Order
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/pendingOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/approvedOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/shippedOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipped Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/deliveredOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Delivered Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/cancelRequestOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancellation Request Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/cancelledOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancelled Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/codOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cod Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'order/onlineOrder'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Online Order</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Manage Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'categories/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'subcategories/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href=" echo WEB_URL . 'childcategories/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Child Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" echo WEB_URL . 'categories/allbrand'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li> -->

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Manage State Hospital
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'state/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>State</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'hospital/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hospital</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Manage Application
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'dobapplication/pendingapplication'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Application</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'hospital/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hospital</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Manage Application Amount
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'manage-application-amount'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Application Amount</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            Manage Pin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="< echo WEB_URL . 'pin/add'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Pin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="< echo WEB_URL . 'pin/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pin List</p>
                            </a>
                        </li>


                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Manage Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'product/add'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'product/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href=" echo WEB_URL . 'addsubscription/all' ?>" class="nav-link">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>Vendor&nbsp;Subscription&nbsp;Plans</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            General Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'slider/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'manage-application-amount'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Application Amount</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'generalsettings/logo'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'generalsettings/favicon'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Favicon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'generalsettings/updateAddress'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Address</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL . 'generalsettings/UpdateSocialMedia'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Media Links</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href=" echo WEB_URL . 'content/all'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pages</p>
                            </a>
                        </li> -->


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'logout' ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sign Out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>