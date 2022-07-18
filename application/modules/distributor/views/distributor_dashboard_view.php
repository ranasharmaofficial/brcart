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
			<div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'distributor/applicationlist'?>'" class="col-md-12 col-lg-4 col-xl-4">
				<div class="mycard bg1">
					<div class="left">
						<h5 class="title">Total Birthday Application! </h5>
						<span class="number"><?php echo $totalApplicationBirthday; ?></span>
						<a href="<?= WEB_URL.'distributor/applicationlist'?>" class="link">View All</a>
					</div>
					<div class="right d-flex align-self-center">
						<div class="icon">
						<i style="font-size:30px;" class="fa fa-birthday-cake" aria-hidden="true"></i>
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
