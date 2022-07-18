<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/pendingOrder' ?>'"
                    class="col-lg-3 col-6">
                    <!-- small box -->
                    <div style="background-color:darkslateblue;" class="small-box">
                        <div class="inner">
                            <h3 class="text-white"><?php echo $totalOrders; ?></h3>

                            <p class="text-white">Total Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag text-white"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/pendingOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
				<div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/pendingOrder' ?>'"
                    class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalPendingOrder; ?></h3>

                            <p>Pending Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/pendingOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/approvedOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $totalApprovedOrder; ?></h3>

                            <p>Approved Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/approvedOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/shippedOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $totalShippedOrder; ?></h3>

                            <p>Shipped Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/shippedOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/deliveredOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $totalDeliveredOrder; ?></h3>

                            <p>Delivered Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/deliveredOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/cancelRequestOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div style="background-color:#FA8072;" class="small-box">
                        <div class="inner">
                            <h3><?php echo $totalCancelReqOrder; ?></h3>

                            <p>Cancellation Request Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/cancelRequestOrder' ?>" class="small-box-footer">More info
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/cancelledOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div style="background-color:red;color:#fff;" class="small-box">
                        <div class="inner">
                            <h3><?php echo $totalCancelledOrder; ?></h3>

                            <p style="color:#fff;">Cancelled Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/cancelledOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'order/codOrder' ?>'"
                    class="col-lg-3 col-6">
                    <div style="background-color:teal;color:#fff;" class="small-box">
                        <div class="inner">
                            <h3><?php echo $totalCodOrder; ?></h3>

                            <p style="color:#fff;">COD Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/codOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'order/onlineOrder' ?>'" class="col-lg-3 col-6">
                    <div style="background-color:cyan;color:#000;" class="small-box">
                        <div class="inner">
                            <h3><?php echo $totalNonCodOrder; ?></h3>

                            <p style="color:#000;">Non COD/Online Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'order/onlineOrder' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'product/all' ?>'"
                    class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalProducts; ?></h3>

                            <p>Total Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'product/all' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'user/all' ?>'"
                    class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $totalUser; ?></h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'user/all' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'vendor/all' ?>'"
                    class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $totalSeller; ?></h3>
                            <p>Seller Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo WEB_URL . 'vendor/all' ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->