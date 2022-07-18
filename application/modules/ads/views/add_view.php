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
           <a href="<?php echo WEB_URL.'ads/all';?>" class="btn btn-sm btn-danger">List</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-1"></div>
             <div class="col-sm-10 form-row">
                <div class="form-group col-sm-6">
					<p for="Category">Select Category <star>*</star></p>
					<select class="form-control" name="category">
						<option value="homeDisplay">homeDisplay (Size: 1240 X 198)</option>
						<option value="ClothingApparel">ClothingApparel (Size: 295 X 672)</option>
						<option value="homeDailydeals">homeDailydeals (Size: 610 X 200)</option>
						<option value="homeFashion">homeFashion (Size: 610 X 200)</option>
						<option value="productDetailsRight">productDetailsRight (Size: 280 X 220)</option>
						<option value="categoyHeaderAd">categoyHeaderAd (Size: 1920 X 300)</option>
						<option value="productDetailsAd">productDetailsAd (Size: 280 X 220)</option>
					</select>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Short Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('short_title'); ?>" id="subject" type="text" placeholder="Enter short title" name="short_title"/>
					<?php echo form_error('short_title'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Long Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('long_title'); ?>" id="subject" type="text" placeholder="Enter long title" name="long_title"/>
					<?php echo form_error('long_title'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Sale Discount <small>in Number</small> <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('sale_discount'); ?>" id="subject" type="text" placeholder="Enter sale discount" name="sale_discount"/>
					<?php echo form_error('sale_discount'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Page Link <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('link'); ?>" id="subject" type="text" placeholder="Enter Link" name="link"/>
					<?php echo form_error('link'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Text Color <star>*</star></p>
					<input class="form-control" id="subject" type="color" name="text_color"/>
					<?php echo form_error('text_color'); ?>
				</div>
				
               
				 <div class="form-group col-sm-6">
						<p for="Picture">Select Slider Picture <star>*</star></p>
						<input onchange="loadFile(event)" class="form-control" id="Picture" type="file" name="image_file"/>
				</div>
                <div class="form-group col-sm-6">
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
						<button type="submit" name="submit" value="submit" class="btn btn-info" >Add</button>
					</div>
            </div>
			<div class="col-sm-1"></div>
        </div>
	</form>	
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  