<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo WEB_URL.'seller/sellerDashboard'; ?>" class="brand-link">
        <img src="<?php echo WEB_PATH_ADMIN; ?>img/favicon.png" alt="<?php echo SITE_NAME; ?> Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SELLER PANEL</span>
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
                <?php if(false) { ?><a href="#" class="d-block"><small>User
                        type:&nbsp;</small><?php echo $this->id_seller_type; ?></a>
                <a href="#" class="d-block"><small>User type:&nbsp;</small><?php echo $this->sellerId; ?></a><?php } ?>


            </div>
        </div>
        <?php if(false) { ?>
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
        <?php } ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo WEB_URL.'seller/sellerDashboard'?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WEB_URL.'users/selleraccount'?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Go to Home
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Visit Store
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/pendingOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/approvedOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/shippedOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipped Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/deliveredOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Delivered Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/cancelRequestOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancellation Request Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/cancelledOrder';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancelled Order</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/showProduct';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/productslist';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/inactiveproduct';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inactive Product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/lowstock';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Low Stock Product </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Links</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'seller/profile';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Address</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'sellerlogout' ?>" class="nav-link">
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
