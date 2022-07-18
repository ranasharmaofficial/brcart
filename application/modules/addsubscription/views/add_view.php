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
            <h1>Subscription</h1>
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
           <a href="<?php echo WEB_URL.'addsubscription/all';?>" class="btn btn-sm btn-danger">Subscription List</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8 row">
                <div class="form-group col-sm-6">
					<p for="subject">Title <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('title'); ?>" id="subject" type="text" placeholder="Enter Page Title" name="title"/>
					<?php echo form_error('title'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Currency <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('currency'); ?>" id="subject" type="text" placeholder="Enter Currency" name="currency"/>
					<?php echo form_error('currency'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Currency Code <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('currency_code'); ?>" id="subject" type="text" placeholder="Enter Currency Code" name="currency_code"/>
					<?php echo form_error('currency_code'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Price <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('price'); ?>" id="subject" type="text" placeholder="Enter Price" name="price"/>
					<?php echo form_error('price'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Days <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('days'); ?>" id="subject" type="text" placeholder="Enter Days" name="days"/>
					<?php echo form_error('days'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Allowed Products </p>
					<input class="form-control" value="<?php echo set_value('allowed_products'); ?>" id="subject" type="text" placeholder="Enter Allowed Products" name="allowed_products"/>
				</div>
				
				<div class="form-group col-sm-12">
					<p>Enter Details</p>
					<textarea class="form-control" type="text" placeholder="Enter Description" name="details"><?php echo set_value('details'); ?></textarea>
					

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

  <script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
