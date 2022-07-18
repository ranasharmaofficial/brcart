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

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h3>

          <div class="card-tools">
           <a href="<?php echo WEB_URL.'slider/all';?>" class="btn btn-sm btn-danger">List</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8">
                <div class="form-group">
					<p for="subject">Short Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('short_title'); ?>" id="subject" type="text" placeholder="Enter short title" name="short_title"/>
					<?php echo form_error('short_title'); ?>
				</div>
				<div class="form-group">
					<p for="subject">Long Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('long_title'); ?>" id="subject" type="text" placeholder="Enter long title" name="long_title"/>
					<?php echo form_error('long_title'); ?>
				</div>
				<div class="form-group">
					<p for="subject">Sale Discount <small>in Number</small> <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('sale_discount'); ?>" id="subject" type="text" placeholder="Enter sale discount" name="sale_discount"/>
					<?php echo form_error('sale_discount'); ?>
				</div>
				<div class="form-group">
					<p for="subject">Page Link <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('link'); ?>" id="subject" type="text" placeholder="Enter Link" name="link"/>
					<?php echo form_error('link'); ?>
				</div>
				<div class="form-group">
					<p for="subject">Text Color <star>*</star></p>
					<input class="form-control" id="subject" type="color" name="text_color"/>
					<?php echo form_error('text_color'); ?>
				</div>
				
               
				 <div class="form-group">
						<p for="Picture">Select Slider Picture <star>*</star></p>
						<input onchange="loadFile(event)" class="form-control" id="Picture" type="file" name="sliderfile"/>
				</div>
                <div class="form-group">
					<img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="sliderpicone"/>
					<script>
						var loadFile = function(event) {
							var input = document.getElementById('sliderpicone');
							sliderpicone.src = URL.createObjectURL(event.target.files[0]);
						};
					</script>
				</div>
					<div class="form-group text-right">
						<button type="reset" class="btn btn-danger" >Reset</button>
						<button type="submit" name="submit" value="submit" class="btn btn-info" >Add Slider</button>
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

  