<style>
p
{
	font-weight:none;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-body">
        
		<div class="form-row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-header bg-secondary"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></div>
						<div class="card-body">
						<?php $this->load->view('adminlayout/message_view');?>
							<form method="post" action="" enctype="multipart/form-data">	
								<div class="form-group">
									<p for="Address">Address <star>*</star></p>
									<input  class="form-control" value="<?php echo $row['address']; ?>" id="Address" type="text" name="address"/>
								</div>
								<div class="form-group">
									<p for="Mobile">Mobile <star>*</star></p>
									<input  class="form-control" id="Mobile" value="<?php echo $row['mobile']; ?>" type="text" name="mobile"/>
								</div>
								<div class="form-group">
									<p for="Mail">E-Mail<star>*</star></p>
									<input  class="form-control" id="Mail" value="<?php echo $row['email']; ?>" type="email" name="email"/>
								</div>
								<div class="form-group text-right">
									<button type="submit" name="update_address" value="update_address" class="btn btn-info btn-sm" >Update</button>
								</div>
							</form>
							
						</div>
				</div>
			</div>
			<div class="col-sm-3">
			</div>
		</div>
		
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  