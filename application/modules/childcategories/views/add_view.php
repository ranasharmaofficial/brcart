
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Sub Category</h1>
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
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List'; ?></h3>

          <div class="card-tools">
           <a href="<?php echo WEB_URL.'childcategories/all';?>" class="btn btn-sm btn-danger">Back</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-2"></div>
             <div class="col-sm-8">
				<div class="form-group">
				<p for="subject">Select Category <star>*</star></p>
					<!-- Country dropdown -->

				<?php echo form_dropdown('category_id',$CategoryId,'','class="form-control" id="category"');
					?>
					<?php echo form_error('category_id'); ?>
				</div>
				<div class="form-group">
				<p name="state_id"  for="subject">Select Subcategory <star>*</star></p>
					<select name="subcategory_id"  class="form-control" id="state">
						<option value="">Select Category first</option>
					</select>
				</div>
				<div class="form-group">
				<p for="Childcategory">Enter Child Category <star>*</star></p>
					<input type="text" name="name" class="form-control" id="Childcategory">
				</div>
              
				<div class="form-group text-right">
					<button type="reset" class="btn btn-danger" >Reset</button>
					<button type="submit" name="submit" value="submit" class="btn btn-info" >Add Sub Category</button>
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

  <script type="text/javascript">
$(document).ready(function(){
    /* Populate data to state dropdown */
    $('#category').on('change',function(){
        var countryID = $(this).val();
        var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"dropdowns/getSubcategory";
		if(countryID){
            $.ajax({
                type:'POST',
                url:base_url,
				data:'category_id='+countryID,
                success:function(data){
                    $('#state').html('<option value="">Select Category</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);           
                            $('#state').append(option);
                        });
                    }else{
                        $('#state').html('<option value="">Category not available</option>');
                    }
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    
});
</script>
