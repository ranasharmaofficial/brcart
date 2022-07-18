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
					<div class="card-header bg-secondary">Header Logo</div>
						<div class="card-body">
							<form method="post" action="" enctype="multipart/form-data">	
								<div class="form-group">
										<p for="Picture">Select Header Picture <star>*</star></p>
										<input  class="form-control" id="Picture" type="file" name="file"/>
										<?php echo form_error('file'); ?>
								</div>
								<div class="form-group text-right">
									<button type="submit" name="headerlogo" value="headerlogo" class="btn btn-info btn-sm" >Submit</button>
								</div>
							</form>
							<img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $row['header_logo']; ?>">
						</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-secondary">Footer Logo</div>
						<div class="card-body">
							<form method="post" action="" enctype="multipart/form-data">	
								<div class="form-group">
										<p for="Picture">Select Footer Logo <star>*</star></p>
										<input  class="form-control" id="Picture" type="file" name="file"/>
								</div>
								<input type="hidden" name="id" value="1">
								<div class="form-group text-right">
									<button type="submit" name="footerlogo" value="footerlogo" class="btn btn-info btn-sm" >Submit</button>
								</div>
							</form>
							<img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $row['footer_logo']; ?>">
						</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-secondary">Invoice Logo</div>
						<div class="card-body">
							<form method="post" action="" enctype="multipart/form-data">	
								<div class="form-group">
										<p for="Picture">Select Invoice Logo <star>*</star></p>
										<input  class="form-control" id="Picture" type="file" name="file"/>
								</div>
								<div class="form-group text-right">
									<button type="submit" name="invoicelogo" value="invoicelogo" class="btn btn-info btn-sm" >Submit</button>
								</div>
							</form>
							<img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $row['invoice_logo']; ?>">
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

  