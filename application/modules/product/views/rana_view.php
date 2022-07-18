
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'product/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
		<div class="row">			
			<div class="col-md-8">			
				<div class="card mb-4 shadow">
					<div class="card-body">
						<form method="post" action="">
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
										<input class="form-control" value="<?php echo set_value('name'); ?>" id="BlogCategory" type="text" placeholder="Enter Product name" name="name"/>
										<?php echo form_error('name'); ?>
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
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select Child Category <star>*</star></label>
									<!-- City dropdown -->
									<select name="childcategory_id" class="form-control" id="city">
										<option value="">Select Subcategory first</option>
									</select>
									<?php echo form_error('id_city'); ?>
								</div>
							</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Estimated Shipping Time <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('mrp_price'); ?>" id="Shipping" type="text" placeholder="Product Estimated Shipping Time" name="mrp_price"/>
										<?php echo form_error('mrp_price'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="Shipping">Product Size <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('mrp_price'); ?>" id="Shipping" type="text" placeholder="Product Estimated Shipping Time" name="mrp_price"/>
										<?php echo form_error('mrp_price'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1"><input type="checkbox" id="checkbox1"/> Allow Product Size</label>
									</div>
								</div>
								<div id="autoUpdate" class="col-lg-12">
									<div id="inputFormRow">
										<div class="input-group mb-3">
											<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">
											<div class="input-group-append">                
												<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
											</div>
										</div>
									</div>
										<div id="newRow"></div>
									<button id="addRow" type="button" class="btn btn-info">Add Row</button>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="DiscountAmount">Discount Amount <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('discount_amount'); ?>" id="DiscountAmount" type="text" placeholder="Enter Discount Amount" name="discount_amount"/>
										<?php echo form_error('discount_amount'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="SellPrice">Sell Price <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('sell_price'); ?>" id="SellPrice" type="text" placeholder="Enter Sell Price" name="sell_price"/>
										<?php echo form_error('sell_price'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="PurchasePrice">Purchase Price <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('purchase_price'); ?>" id="PurchasePrice" type="text" placeholder="Enter Purchase Price" name="purchase_price"/>
										<?php echo form_error('purchase_price'); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="small mb-1" for="PurchasePrice">Quantity <star>*</star></label>
										<input class="form-control" value="<?php echo set_value('quantity'); ?>" id="PurchasePrice" type="text" placeholder="Enter quantity" name="quantity"/>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="small mb-1" for="summernote">Enter Description <star>*</star></label>
									<textarea class="form-control" id="summernote" type="text" placeholder="Enter Description" name="description"><?php echo set_value('description'); ?></textarea>
										<?php echo form_error('description'); ?>
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
										<label class="small mb-1" for="summernote">Enter Hindi Description <star>*</star></label>
										<textarea class="form-control" id="summernote1" type="text" placeholder="Enter Description" name="hindi_des"><?php echo set_value('description'); ?></textarea>
										<?php echo form_error('description'); ?>
									</div>
								</div>
								<script>

									$('#summernote1').summernote({

										placeholder: 'Write Hindi Details Here...',

										tabsize: 2,

										height: 100

									});
								</script>
							</div>
							<div class="form-row">
								<div class="form-group mt-4 mb-0">
									<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm" >Submit</button>
									<button type="reset" class="btn btn-danger btn-sm" >Reset</button>
								</div>
							</div>
							
							
							
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="add-product-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-description">
							<div class="body-area">
			
		
		
									<div class="showbox">
		
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">Product Estimated Shipping Time* </h4>
												</div>
											</div>
											<div class="col-lg-12">
												<input type="text" class="input-field"
													placeholder="Estimated Shipping Time" name="ship">
											</div>
										</div>
		
		
									</div>
		
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
		
											</div>
										</div>
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input name="size_check" type="checkbox" id="size-check" value="1">
													<label for="size-check">Allow Product Sizes</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="showbox" id="size-display">
										<div class="row">
											<div class="col-lg-12">
											</div>
											<div class="col-lg-12">
												<div class="product-size-details" id="size-section">
													<div class="size-area">
														<span class="remove size-remove"><i class="fas fa-times"></i></span>
														<div class="row">
															<div class="col-md-4 col-sm-6">
																<label>
																	Size Name :
																	<span>
																		(eg. S,M,L,XL,XXL,3XL,4XL)
																	</span>
																</label>
																<input type="text" name="size[]" class="input-field"
																	placeholder="Size Name">
															</div>
															<div class="col-md-4 col-sm-6">
																<label>
																	Size Qty :
																	<span>
																		(Number of quantity of this size)
																	</span>
																</label>
																<input type="number" name="size_qty[]" class="input-field"
																	placeholder="Size Qty" value="1" min="1">
															</div>
															<div class="col-md-4 col-sm-6">
																<label>
																	Size Price :
																	<span>
																		(This price will be added with base price)
																	</span>
																</label>
																<input type="number" name="size_price[]" class="input-field"
																	placeholder="Size Price" value="0" min="0">
															</div>
														</div>
													</div>
												</div>
		
												<a href="javascript:;" id="size-btn" class="add-more"><i
														class="fas fa-plus"></i>Add More Size </a>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
		
											</div>
										</div>
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input class="checkclick1" name="color_check" type="checkbox" id="check3"
														value="1">
													<label for="check3">Allow Product Colors</label>
												</li>
											</ul>
										</div>
									</div>
		
									<div class="showbox">
		
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">
														Product Colors*
													</h4>
													<p class="sub-heading">
														(Choose Your Favorite Colors)
													</p>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="select-input-color" id="color-section">
													<div class="color-area">
														<span class="remove color-remove"><i class="fas fa-times"></i></span>
														<div class="input-group colorpicker-component cp">
															<input type="text" name="color[]" value="#000000"
																class="input-field cp" />
															<span class="input-group-addon"><i></i></span>
														</div>
													</div>
												</div>
												<a href="javascript:;" id="color-btn" class="add-more mt-4 mb-3"><i
														class="fas fa-plus"></i>Add More Color </a>
											</div>
										</div>
		
									</div>
		
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
		
											</div>
										</div>
										<div class="col-lg-12">
											<ul class="list">
												<li>
													<input class="checkclick1" name="whole_check" type="checkbox"
														id="whole_check" value="1">
													<label for="whole_check">Allow Product Whole Sell</label>
												</li>
											</ul>
										</div>
									</div>
		
									<div class="showbox">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
		
												</div>
											</div>
											<div class="col-lg-12">
												<div class="featured-keyword-area">
													<div class="feature-tag-top-filds" id="whole-section">
														<div class="feature-area">
															<span class="remove whole-remove"><i
																	class="fas fa-times"></i></span>
															<div class="row">
																<div class="col-lg-6">
																	<input type="number" name="whole_sell_qty[]"
																		class="input-field"
																		placeholder="Enter Quantity" min="0">
																</div>
		
																<div class="col-lg-6">
																	<input type="number" name="whole_sell_discount[]"
																		class="input-field"
																		placeholder="Enter Discount Percentage"
																		min="0" />
																</div>
															</div>
														</div>
													</div>
		
													<a href="javascript:;" id="whole-btn" class="add-fild-btn"><i
															class="icofont-plus"></i> Add More Field</a>
												</div>
											</div>
										</div>
									</div>
		
									<div class="row" id="stckprod">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">Product Stock*</h4>
												<p class="sub-heading">(Leave Empty will Show Always Available)</p>
											</div>
										</div>
										<div class="col-lg-12">
											<input name="stock" type="text" class="input-field"
												placeholder="e.g 20">
											<div class="checkbox-wrapper">
												<input type="checkbox" name="measure_check" class="checkclick"
													id="allowProductMeasurement" value="1">
												<label
													for="allowProductMeasurement">Allow Product Measurement</label>
											</div>
										</div>
									</div>
		
		
		
									<div class="showbox">
		
										<div class="row">
											<div class="col-lg-6">
												<div class="left-area">
													<h4 class="heading">Product Measurement*</h4>
												</div>
											</div>
											<div class="col-lg-6">
												<select id="product_measure">
													<option value="">None</option>
													<option value="Gram">Gram</option>
													<option value="Kilogram">Kilogram</option>
													<option value="Litre">Litre</option>
													<option value="Pound">Pound</option>
													<option value="Milliliter">Milliliter (ML)</option>
													<option value="Custom">Custom</option>
												</select>
											</div>
											<div class="col-lg-6 hidden" id="measure">
												<input name="measure" type="text" id="measurement" class="input-field"
													placeholder="Enter Unit">
											</div>
										</div>
		
									</div>
		
		
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">
													Product Description*
												</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="text-editor">
												<textarea class="nic-edit-p" name="details"></textarea>
											</div>
										</div>
									</div>
		
		
		
									<div class="row">
										<div class="col-lg-12">
											<div class="left-area">
												<h4 class="heading">
													Product Buy/Return Policy*
												</h4>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="text-editor">
												<textarea class="nic-edit-p" name="policy"></textarea>
											</div>
										</div>
									</div>
		
		
									<div class="row">
										<div class="col-lg-12">
											<div class="checkbox-wrapper">
												<input type="checkbox" name="seo_check" value="1" class="checkclick"
													id="allowProductSEO" value="1">
												<label for="allowProductSEO">Allow Product SEO</label>
											</div>
										</div>
									</div>
		
		
		
									<div class="showbox">
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">Meta Tags *</h4>
												</div>
											</div>
											<div class="col-lg-12">
												<ul id="metatags" class="myTags">
												</ul>
											</div>
										</div>
		
										<div class="row">
											<div class="col-lg-12">
												<div class="left-area">
													<h4 class="heading">
														Meta Description *
													</h4>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="text-editor">
													<textarea name="meta_description" class="input-field"
														placeholder="Meta Description"></textarea>
												</div>
											</div>
										</div>
									</div>
		

		
		
									<div class="row">
										<div class="col-lg-12 text-center">
											<button class="addProductSubmit-btn"
												type="submit">Create Product</button>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	</main>
	<script type="text/javascript">
	

	$(document).ready(function(){
$('#checkbox1').change(function(){
if(this.checked)
$('#autoUpdate').fadeIn('slow');
else
$('#autoUpdate').fadeOut('slow');

});
});
	
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';
			
			html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';
			
			html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
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
    
});
</script>