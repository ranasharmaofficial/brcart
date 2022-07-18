
	
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
			  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <div class="card-body">
                <div class="form-group">
					<p for="name">Enter Brand Name <star>*</star></p>
					<input class="form-control" value="<?php echo $row['brand']; ?>" id="name" type="text" placeholder="Enter brand" name="brand"/>
					<?php echo form_error('brand'); ?>
				</div>
				
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
		  
		  <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Picture</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
			  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <div class="card-body">
                 <div class="form-group">
					<img style="height:100px;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>" class=""/>
				 </div>
				  <div class="form-group">
                    <p for="exampleInputFile">Select Picture</p>
                    <input onchange="loadFile(event)" name="image_file" type="file" class="form-control" id="exampleInputFile">
					
				</div>
                 <div class="form-group">
                    <img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="picone"/>
					<script>
						var loadFile = function(event) {
							var input = document.getElementById('picone');
							picone.src = URL.createObjectURL(event.target.files[0]);
						};
					</script>
                  </div>
				
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="updatebrandpicture" value="updatebrandpicture" class="btn btn-sm btn-warning">Update</button>
                </div>
              </form>
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

  
