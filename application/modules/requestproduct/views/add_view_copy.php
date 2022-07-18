<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'product/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
		<form method="post" action="" enctype="multipart/form-data">
							<?php function generateRandomString($length = 9) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTVWXYZ', ceil($length/strlen($x)) )),1,$length);
}?>
		<div class="row">			
			<div class="col-md-8">			
				<div class="card mb-4 shadow">
					<div class="card-body">
						<div class="form-row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Product Name <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('name'); ?>" id="BlogCategory" type="text" placeholder="Enter Product name" name="name"/>
										<?php echo form_error('name'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Product Sku <star>*</star></label>
										<input class="form-control" value="<?php echo generateRandomString(); ?>" id="BlogCategory" type="text" placeholder="Enter Product name" name="sku"/>
										<?php echo form_error('sku'); ?>
									</div>
								</div>
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
								<label class="small mb-1"  for="subject">Select Subcategory <star>*</star></label>
									<select name="subcategory_id"  class="form-control" id="state">
										<option value="">Select Category first</option>
									</select>
									<?php echo form_error('subcategory_id'); ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select Child Category <star>*</star></label>
									<!-- City dropdown -->
									<select name="childcategory_id" class="form-control" id="city">
										<option value="">Select Subcategory first</option>
									</select>
									<?php echo form_error('childcategory_id'); ?>
								</div>
							</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Estimated Shipping Time <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('ship'); ?>" id="Shipping" type="text" placeholder="Product Estimated Shipping Time" name="ship"/>
										<?php echo form_error('ship'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Size <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('size'); ?>" id="Shipping" type="text" placeholder="Product Size" name="size"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Size Quantity<star>*</star></label>
										<input class="form-control" value="<?php echo set_value('size_qty'); ?>" id="Shipping" type="number" placeholder="Size Quantity" name="size_qty"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Size Price<star>*</star></label>
										<input class="form-control" value="<?php echo set_value('size_price'); ?>" id="Shipping" type="number" placeholder="Size Price" name="size_price"/>
									</div>
								</div>
								<div id="autoUpdate" class="col-md-12">
								<label class="small mb-1" for="Shipping">Product Colors<star>*</star></label><br>
										
									<div class="input-group form-group mb-3" id="inputFormRow">
										<input type="color" name="color" class="form-control m-input" placeholder="Enter Color" autocomplete="off">
											<div class="input-group-append">                
												<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
											</div>
										</div>
									
										<div id="newRow"></div>
									<button id="addRow" type="button" class="btn btn-info btn-sm">Add More Color</button>
								</div>
								<div class="col-md-12">
									<label class="mb-1 font-weight-bold" for="Shipping">Product Whole Sell</label><br>
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="small mb-1" for="BlogCategory">Enter Quantity <star>*</star></label>
												<input class="form-control" value="<?php echo set_value('whole_sell_qty'); ?>" id="BlogCategory" type="number" placeholder="Enter Quantity" name="whole_sell_qty"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="small mb-1" for="BlogCategory">Enter Discount Percentage <star>*</star></label>
												<input class="form-control" value="<?php echo set_value('whole_sell_discount'); ?>" id="BlogCategory" type="number" placeholder="Enter Discount Percentage" name="whole_sell_discount"/>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<label class="mb-1 font-weight-bold" for="Shipping">Product Measurement</label><br>
									<div class="form-row">
										<div class="col-md-6">
											<select class="form-control" id="product_measure">
													<option value="">None</option>
													<option value="Gram">Gram</option>
													<option value="Kilogram">Kilogram</option>
													<option value="Litre">Litre</option>
													<option value="Pound">Pound</option>
													<option value="Milliliter">Milliliter (ML)</option>
													<option value="Custom">Custom</option>
											</select>
										</div>
										<div style="display:none;" id="measure" class="col-md-6">
											<div class="form-group">
												<input class="form-control" name="measure" type="text" id="measurement" class="input-field" placeholder="Enter Unit">
												
											</div>
										</div>
									</div>
								</div>
								<?php if(false) { ?>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1"><input type="checkbox" id="checkbox1"/> Allow Product Size</label>
									</div>
								</div>
								<?php  }?>
									<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
									<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="summernote">Enter Description <star>*</star></label>
									<textarea class="form-control" id="summernote" type="text" placeholder="Enter Description" name="details"><?php echo set_value('details'); ?></textarea>
										<?php echo form_error('details'); ?>
									</div>
								</div>
								<script>

									$('#summernote').summernote({

										placeholder: 'Write Details Here...',

										tabsize: 2,

										height: 100

									});
								</script>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="summernote">Product Buy/Return Policy* <star>*</star></label>
										<textarea class="form-control" id="summernote1" type="text" placeholder="Enter Description" name="policy"><?php echo set_value('policy'); ?></textarea>
									</div>
								</div>
								<script>

									$('#summernote1').summernote({

										placeholder: 'Write Product Buy/Return Policy...',

										tabsize: 2,

										height: 100

									});
								</script>
							</div>
							<div class="form-row">
								<div class="form-group mt-4 mb-0">
									<button style="background-color:#2d3274;color:#fff;" type="submit" name="submit" value="submit" class="btn btn-lg" >Add Product</button>
									<button type="reset" class="btn btn-danger btn-lg" >Reset</button>
								</div>
							</div>
							 
					</div>
				</div>
			</div>
			
			<div class="col-md-4">			
				<div class="card mb-4 shadow">
					<div class="card-body">
						<div class="form-row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Feature Image <star>*</star></label>
										<input class="form-control" onchange="loadFile(event)" value="<?php echo set_value('file'); ?>" id="BlogCategory" type="file" name="file"/>
										<?php echo form_error('file'); ?>
									</div>
								</div>
								<div class="col-md-12">
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
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Weight <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('weight'); ?>" id="BlogCategory" type="text" placeholder="Enter Product Weight" name="weight"/>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">GST Percentage <star>*</star></label>
										<select id="gst_percentage" class="form-control" name="gst_percentage" required="">
												<option value="">Select Gst Percentage</option>
												<option value="0">0</option>
												<option value="5">5</option>
												<option value="12">12</option>
												<option value="18">18</option>
												<option value="28">28</option>
											</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Delivery Charge Pay By <star>*</star></label>
										<select class="form-control" name="delivery_charge_pay_by" required="">
											<option value="">Select Delivery Charge Pay By</option>
											<!--<option value="seller">Seller</option>-->
											<option value="buyer">Buyer</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="BlogCategory">Sell Price <small>in INR</small>&nbsp; <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('price'); ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="price"/>
										<?php echo form_error('price'); ?>
									</div>
								</div>
								
								
							</div>
					</div>
				</div>
			</div>
		</div>
	</form>	
		</div>
	</main>
	
	<script type="text/javascript">
	 // Product Measure :)

        $("#product_measure").on( "change" ,function() {
            var val = $(this).val();
            $('#measurement').val(val);
            if(val == "Custom")
            {
            $('#measurement').val('');
              $('#measure').show();
            }
            else{
              $('#measure').hide();      
            }
        });

        // Product Measure Ends :)

	
	$(document).ready(function() {
    $("input").change(function() {
        var index = $(this).closest("li").index();
        $(".metabox").eq(index)[this.checked ? "show" : "hide"]();
    }).change();
});
	
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="color" name="title[]" class="form-control m-input" placeholder="" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>';
            html += '</div>';
            html += '</div>';
			

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
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
    
	
	/* Populate data to city dropdown */
    $('#state').on('change',function(){
        var stateID = $(this).val();
		var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"dropdowns/getChildcategory";
        if(stateID){
            $.ajax({
                type:'POST',
               url:base_url,
                data:'subcategory_id='+stateID,
                success:function(data){
                    $('#city').html('<option value="">Select Child Category</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);           
                            $('#city').append(option);
                        });
                    }else{
                        $('#city').html('<option value="">City not available</option>');
                    }
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
	
	/* Populate data to city dropdown */
    $('#state').on('change',function(){
        var stateID = $(this).val();
		var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"dropdowns/getAdminCommission";
        if(stateID){
            $.ajax({
                type:'POST',
               url:base_url,
                data:'subcategory_id='+stateID,
                success:function(data){
                    $('#city').html('<option value="">Select Admin Commssion</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);           
                            $('#city').append(option);
                        });
                    }else{
                        $('#city').html('<option value="">City not available</option>');
                    }
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
});
</script>
