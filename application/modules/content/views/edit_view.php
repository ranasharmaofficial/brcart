
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit <?php echo $row['title']; ?> Page</h1>
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
          <div class="col-md-2">
		  </div>
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
			  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <div class="card-body">
                <div class="form-group">
					<p for="name">Content Name <star>*</star></p>
					<input class="form-control" value="<?php echo $row['title']; ?>" id="name" type="text" name="title"/>
					<?php echo form_error('title'); ?>
				</div>
				<div class="form-group">
					<p for="name">Slug Url <star>*</star></p>
					<input class="form-control" value="<?php echo $row['slug']; ?>" id="name" type="text" placeholder="Enter slug url" name="slug"/>
					<?php echo form_error('slug'); ?>
				</div>
                 <div class="form-group">
							<p for="BlogCategory">Meta Tags</p>
							<input class="form-control" value="<?php echo $row['meta_tag']; ?>" id="BlogCategory" type="text" name="meta_tag"/>
						</div>
						<div class="form-group">
							<p for="BlogCategory">Meta Description</p>
							<input class="form-control" value="<?php echo $row['meta_description']; ?>" id="BlogCategory" type="text" name="meta_description"/>
						</div>
					
				<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
				<div class="form-group">
					<p>Enter Description <star>*</star></p>
					<textarea class="form-control" id="summernote" type="text" placeholder="Enter Description" name="details"><?php echo $row['details']; ?></textarea>
					
				<script>
$('#summernote').summernote({

	placeholder: 'Write Details Here...',

	tabsize: 2,

	height: 150

});
</script>
				</div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">Update&nbsp;Details</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
         <div class="col-md-2">
		  </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
