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
            <h1><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></h1>
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
           <a href="<?php echo WEB_URL.'categories/allbrand';?>" class="btn btn-sm btn-danger">Brand List</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8">
                <div class="form-group">
					<p for="subject">Brand Name <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('brand'); ?>" id="subject" type="text" placeholder="Enter Brand name" name="brand"/>
					<?php echo form_error('brand'); ?>
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
               
					<div class="form-group text-right">
						<button type="reset" class="btn btn-danger" >Reset</button>
						<button type="submit" name="submit" value="submit" class="btn btn-info" >Add</button>
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

  