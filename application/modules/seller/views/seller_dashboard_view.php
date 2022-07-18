<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo WEB_URL; ?>">Home</a></li>
						<li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></li>
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
			<div class="row row-cards-one">
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/pendingOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg1">
					<div class="left">
						<h5 class="title">Orders Pending! </h5>
						<span class="number"><?php echo $totalPendingOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/pendingOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="ion ion-bag "></i>
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/approvedOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg2">
					<div class="left">
						<h5 class="title">Orders Approved! </h5>
						<span class="number"><?php echo $totalApprovedOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/approvedOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-truck"></i>
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/shippedOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg6">
					<div class="left">
						<h5 class="title">Orders Shipped! </h5>
						<span class="number"><?php echo $totalShippedOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/shippedOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-truck"></i>
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/pendingOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg3">
					<div class="left">
						<h5 class="title">Orders Delivered! </h5>
						<span class="number"><?php echo $totalDeliveredOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/deliveredOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-check"></i>
							 
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/cancelRequestOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg1">
					<div class="left">
						<h5 class="title">Cancellation Request Order! </h5>
						<span class="number"><?php echo $totalCancelReqOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/cancelRequestOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-check"></i>
							 
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/cancelledOrder'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg5">
					<div class="left">
						<h5 class="title">Cancelled Order! </h5>
						<span class="number"><?php echo $totalCancelledOrder; ?></span>
						<a href="<?php echo WEB_URL.'seller/cancelledOrder'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-check"></i>
							 
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/productlist'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg4">
					<div class="left">
						<h5 class="title">Total Products! </h5>
						<span class="number"><?php echo $totalSellerProduct; ?></span>
						<a href="<?php echo WEB_URL.'seller/productlist'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-air-freshener"></i>
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'seller/productlist'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg1">
					<div class="left">
						<h5 class="title">Total Sell Item! </h5>
						<span class="number"><?php echo $totalSellItem; ?></span>
						<a href="<?php echo WEB_URL.'seller/productlist'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-air-freshener"></i>
						</div>
					</div>
				</div>
			</div>
			 
			<div style="cursor:pointer;" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg6">
					<div class="left">
						<h5 class="title">Total Earnings! </h5>
						<span class="number">Rs <?php echo getNumberFormat($totalEarnings); ?></span>
						<a href="#" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-rupee-sign"></i>
							
						</div>
					</div>
				</div>
			</div>
			<div style="cursor:pointer;" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg2">
					<div class="left">
						<h5 class="title">Total Profit! </h5>
						<span class="number">Rs <?php echo getNumberFormat($totalProfits); ?></span>
						<a href="#" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
							<i style="font-size:30px;" class="fas fa-rupee-sign"></i>
							
						</div>
					</div>
				</div>
			</div>
				
			</div>
			<!-- /.row -->

		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
