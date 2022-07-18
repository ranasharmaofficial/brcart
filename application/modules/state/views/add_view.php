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
            <h1><?=(isset($pvalue['page_heading']))?$pvalue['page_heading']:'List'; ?></h1>
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
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h3>

          <div class="card-tools">
           <a href="<?php echo WEB_URL.'state/all';?>" class="btn btn-sm btn-danger">Back</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row justify-content-center">
							<div class="col-md-4">
								<div class="form-group">
									<label class="mb-1" for="ChooseCategory">Choose Country <star>*</star></label>
									<?php
									echo form_dropdown('country_id',$CountryId,'','class="form-control" id="id_country" ');
									?>
									<?php echo form_error('country_id'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="mb-1" for="subject">State Name <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('name'); ?>" id="subject" type="text" placeholder="Enter State name" name="name"/>
									<?php echo form_error('name'); ?>
								</div>
							</div>
             <div class="col-sm-8">
                
				<div class="form-group text-right">
					<button type="reset" class="btn btn-danger btn-sm" >Reset</button>
					<button type="submit" name="submit" value="submit" class="btn btn-info btn-sm" >Add State</button>
				</div>
            </div>
			 
        </div>
	</form>	
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  