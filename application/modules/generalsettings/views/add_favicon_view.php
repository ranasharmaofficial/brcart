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
        <?php $this->load->view('adminlayout/message_view');?>
		<div class="form-row">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-secondary">Website Favicon</div>
						<div class="card-body">
							<form method="post" action="" enctype="multipart/form-data">	
								<div class="form-group">
										<p for="Picture">Select Favicon <star>*</star></p>
										<input  class="form-control" id="Picture" type="file" name="file"/>
										<?php echo form_error('file'); ?>
								</div>
								<div class="form-group text-right">
									<button type="submit" name="fav_icon" value="fav_icon" class="btn btn-info btn-sm" >Submit</button>
								</div>
							</form>
							<hr>
							<p>Current Favicon</p>
							<img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $row['favicon']; ?>">
						</div>
				</div>
			</div>
		</div>
		
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  