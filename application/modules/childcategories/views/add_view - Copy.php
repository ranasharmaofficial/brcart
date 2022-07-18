<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'childcategories/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
			<div class="card mb-4 shadow">
				<?php
				if(FALSE) {
					?>
					<div class="card-header">
						DataTable Example
					</div>
					<?php
				}
				?>
				<div class="card-body">
					<form class="form-row" method="post" action="">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<div class="col-md-12">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select Category <star>*</star></label>
									<!-- Country dropdown -->

								<?php echo form_dropdown('category_id',$CategoryId,'','class="form-control" id="category"');
									?>
									<?php echo form_error('category_id'); ?>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
								<label class="small mb-1" name="state_id"  for="subject">Select Subcategory <star>*</star></label>
									<select name="subcategory_id"  class="form-control" id="state">
										<option value="">Select Category first</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label class="small mb-1" for="Childcategory">Enter Child Category <star>*</star></label>
									<input type="text" name="name" class="form-control" id="Childcategory">
								</div>
							</div>
							<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button type="reset" class="btn btn-danger btn-sm" >Reset</button>
								<button type="submit" name="submit" value="submit" class="btn btn-info btn-sm" >Add</button>
							</div>
						</div>
						</div>	
						<div class="col-md-2">
						</div>
						 
					</form>
				</div>
			</div>
		</div>
	</main>
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
               //url:'http://localhost/papamummy/dropdowns/getSubcategory',
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
