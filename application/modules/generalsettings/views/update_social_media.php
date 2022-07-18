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
									<p for="Facebook">Facebook</p>
									<input  class="form-control" value="<?php echo $row['facebook']; ?>" id="Facebook" type="text" name="facebook"/>
								</div>
								<div class="form-group">
									<p for="Twitter">Twitter</p>
									<input  class="form-control" id="Twitter" value="<?php echo $row['twitter']; ?>" type="text" name="twitter"/>
								</div>
								<div class="form-group">
									<p for="Instagram">Instagram</p>
									<input  class="form-control" id="Instagram" value="<?php echo $row['instagram']; ?>" type="text" name="instagram"/>
								</div>
								<div class="form-group">
									<p for="LinkedIn">LinkedIn</p>
									<input  class="form-control" id="LinkedIn" value="<?php echo $row['linkedin']; ?>" type="text" name="linkedin"/>
								</div>
								<div class="form-group">
									<p for="WhatsApp">WhatsApp</p>
									<input  class="form-control" id="WhatsApp" value="<?php echo $row['whatsapp']; ?>" type="text" name="whatsapp"/>
								</div>
								<div class="form-group text-right">
									<button type="submit" name="update_social" value="update_social" class="btn btn-info btn-sm" >Update</button>
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

  