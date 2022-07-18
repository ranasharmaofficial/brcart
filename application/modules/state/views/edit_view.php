
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h1>
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
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
               <div class="card-body">
				<form method="post" action="">
						<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="name">State Name <star>*</star></label>
									<input class="form-control" value="<?php echo $row['name']; ?>" id="name" type="text" placeholder="Enter State name" name="name"/>
									<?php echo form_error('name'); ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm" >Update</button>
								<a href="<?php echo WEB_URL.'state/all';?>" class="btn btn-danger btn-sm" >Reset</a>
							</div>
						</div>
					</form>
			   </div>
              
            </div>
            <!-- /.card -->

            
          </div>
		  
		  
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
