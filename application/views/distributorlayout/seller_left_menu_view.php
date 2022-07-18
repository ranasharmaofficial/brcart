<!-- Main Sidebar Container -->
<style>
.css-selector {
    background: linear-gradient(176deg, #1f1d81, #cd0fd7, #21b8c1, #f52a2a);
    background-size: 800% 800%;

    -webkit-animation: AnimationName 31s ease infinite;
    -moz-animation: AnimationName 31s ease infinite;
    -o-animation: AnimationName 31s ease infinite;
    animation: AnimationName 31s ease infinite;
}

@-webkit-keyframes AnimationName {
    0% {
        background-position: 0% 81%
    }

    50% {
        background-position: 100% 20%
    }

    100% {
        background-position: 0% 81%
    }
}

@-moz-keyframes AnimationName {
    0% {
        background-position: 0% 81%
    }

    50% {
        background-position: 100% 20%
    }

    100% {
        background-position: 0% 81%
    }
}

@-o-keyframes AnimationName {
    0% {
        background-position: 0% 81%
    }

    50% {
        background-position: 100% 20%
    }

    100% {
        background-position: 0% 81%
    }
}

@keyframes AnimationName {
    0% {
        background-position: 0% 81%
    }

    50% {
        background-position: 100% 20%
    }

    100% {
        background-position: 0% 81%
    }
}

[class*=sidebar-light-] .sidebar a {
    color: rgb(255 255 255 / 80%) !important;
}

[class*=sidebar-light] .brand-link,
[class*=sidebar-light] .brand-link .pushmenu {
    color: rgb(255 255 255 / 80%);
}

.navbar-white {
    background-color: #cd0fd7 !important;
    color: #fff !important;
}

.navbar-light .navbar-nav .nav-link {
    color: #fff;
}

.content-wrapper {
    background-color: #FFE1B7 !important;
}
</style>
<aside class="main-sidebar sidebar-light-info elevation-4 css-selector">
    <!-- Brand Logo -->
    <?php if($this->roleID=='1') { ?>
    <a href="<?php echo WEB_URL.'distributor/dashboard'; ?>" class="brand-link">
        <img src="<?php echo WEB_PATH_ADMIN; ?>img/favicon.png" alt="<?php echo SITE_NAME; ?> Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Distributor PANEL</span>
    </a>
    <?php } elseif($this->roleID=='2') { ?>
    <a href="<?php echo WEB_URL.'distributor/dashboard'; ?>" class="brand-link">
        <img src="<?php echo WEB_PATH_ADMIN; ?>img/favicon.png" alt="<?php echo SITE_NAME; ?> Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">Retailer PANEL</span>
    </a>
    <?php } ?>
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
                        as:&nbsp;</small><?php echo $this->distributorName; ?></a>



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
                    <a href="<?php echo WEB_URL.'distributor/dashboard'?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo WEB_URL.''?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Go to Home
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Death Certificate
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'distributor/addDeathApplication';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Death Application </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'distributor/deathapplicationlist';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Death Application List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Birthday Certificate
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'distributor/addapplication';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Birth Application </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo WEB_URL.'distributor/applicationlist';?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Birth Application List</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo WEB_URL . 'distributorlogout' ?>" class="nav-link">
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