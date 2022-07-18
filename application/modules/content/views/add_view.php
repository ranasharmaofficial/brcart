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
            <h1>Manage Content</h1>
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
           <a href="<?php echo WEB_URL.'content/all';?>" class="btn btn-sm btn-danger">Page List</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8">
                <div class="form-group">
					<p for="subject">Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('title'); ?>" id="subject" type="text" placeholder="Enter Page Title" name="title"/>
					<?php echo form_error('title'); ?>
				</div>
				<div class="form-group">
					<label style="cursor:pointer;"><input type="checkbox" value="1"> Allow Product SEO</label>
					<div style="display:none;" class="1 box">
						<div class="form-group">
							<p for="BlogCategory">Meta Tags</p>
							<input class="form-control" value="<?php echo set_value('meta_tag'); ?>" id="BlogCategory" type="text" placeholder="Enter Meta Tags" name="meta_tag"/>
						</div>
						<div class="form-group">
							<p for="BlogCategory">Meta Description</p>
							<input class="form-control" value="<?php echo set_value('meta_description'); ?>" id="BlogCategory" type="text" placeholder="Enter Meta Description" name="meta_description"/>
						</div>
					</div>
				</div>
				<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
				<div class="form-group">
					<p>Enter Description <star>*</star></p>
					<textarea class="form-control" id="summernote" type="text" placeholder="Enter Description" name="details"><?php echo set_value('details'); ?></textarea>
					
				<script>
$('#summernote').summernote({

	placeholder: 'Write Details Here...',

	tabsize: 2,

	height: 150

});
</script>
				</div>
               
					<div class="form-group text-right">
						<button type="reset" class="btn btn-danger" >Reset</button>
						<button type="submit" name="submit" value="submit" class="btn btn-info" >Add Page</button>
					</div>
            </div>
			<div class="col-sm-2"></div>
        </div>
	</form>	
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>