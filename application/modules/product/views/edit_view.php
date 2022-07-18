
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Product</h1>
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
	<form method="post" action="" enctype="multipart/form-data">  
		<div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
				<div class="card-tools">
          
				<a href="<?php echo WEB_URL.'product/all';?>" class="btn btn-sm btn-danger text-right">Product List</a>
				</div>
              </div>
              <!-- /.card-header -->
			  <?php function generateRandomString($length = 9) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTVWXYZ', ceil($length/strlen($x)) )),1,$length);
}?>
              <!-- form start -->
             <div class="card-body">
			  <input type="hidden" value="<?php echo $row['product_id'];?>" name="id" />
                <div class="form-group">
					<p for="BlogCategory">Product Name <star>*</star></p>
					<input class="form-control" value="<?php echo $row['product_name']; ?>" id="BlogCategory" type="text" placeholder="Enter Product name" name="name"/>
					<?php echo form_error('name'); ?>
				</div>
				<div class="form-group">
					<p for="BlogCategory">Product Sku <star>*</star></p>
					<input class="form-control" value="<?php echo $row['sku']; ?>" id="BlogCategory" type="text" placeholder="Enter Product name" name="sku"/>
					<?php echo form_error('sku'); ?>
				</div>
				<div class="form-group">
			<p for="subject"><b>Select Category : </b><?php echo $row['cat_name']; ?></p>
				<!-- Country dropdown -->
				<?php if(false) { ?>
				<select name="category_id" class="form-control" id="">
					<option selected><?php echo $row['cat_name']; ?></option>
				</select>
				<?php } ?>
			<?php 
			$selected = $row['cat_name'];
			echo form_dropdown('category_id',$CategoryId,'','class="form-control" id="category"');
				?>
				<?php echo form_error('category_id'); ?>
			</div>
			<div class="form-group">
			<p  for="subject"><b>Select Subcategory : </b> <?php echo $row['subcat_name']; ?></p>
				<select name="subcategory_id"  class="form-control" id="state">
					<option value="<?php echo $row['subcat_id']; ?>"><?php echo $row['subcat_name']; ?></option>
					<option value="">Select Category first</option>
				</select>
				<?php echo form_error('subcategory_id'); ?>
			</div>
			<div class="form-group">
			<p for="subject"><b>Select Child Category : </b> <?php echo $row['childcat_name']; ?></p>
				<!-- City dropdown -->
				<select name="childcategory_id" class="form-control" id="city">
					<option value="">Select Subcategory first</option>
				</select>
				<?php echo form_error('childcategory_id'); ?>
			</div>
			

			<div class="form-group">
			<p for="subject"><b>Select Brand : </b> <?php echo $row['brand_name']; ?></p>
				<!-- Country dropdown -->

			<?php echo form_dropdown('brand',$brandId,'','class="form-control" id="brand"');
				?>
				<?php echo form_error('brand'); ?>
			</div>
			 
				 
				 <?php if(false) {  ?>
				<div class="form-group">
					<p for="Shipping">Product Size <star>*</star></p>
					<input class="form-control" value="<?php echo $row['size']; ?>" id="Shipping" type="text" placeholder="Product Size" name="size"/>
				</div>
				<div class="form-group">
					<p for="Shipping">Product Size Quantity<star>*</star></p>
					<input class="form-control" value="<?php echo $row['size_qty']; ?>" id="Shipping" type="number" placeholder="Size Quantity" name="size_qty"/>
				</div>
				<div class="form-group">
					<p for="Shipping">Product Size Price<star>*</star></p>
					<input class="form-control" value="<?php echo $row['size_price']; ?>" id="Shipping" type="number" placeholder="Size Price" name="size_price"/>
				</div>
				<div id="autoUpdate" class="form-group">
				<p for="Shipping">Product Colors<star>*</star></p><br>
						
					<div class="input-group form-group mb-3" id="inputFormRow">
						<input type="color" name="color[]" class="form-control m-input" placeholder="Enter Color" autocomplete="off">
							<div class="input-group-append">                
								<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
							</div>
						</div>
					
						<div id="newRow"></div>
					<button id="addRow" type="button" class="btn btn-info btn-sm">Add More Color</button>
				</div>
			<?php } ?>
				 
				<div class="form-group">
					<p class="mb-1 font-weight-bold" for="Shipping">Product Measurement</p><br>
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
				<div class="form-group">
					<label style="cursor:pointer;"><input type="checkbox" name="is_meta" value="1"/> Allow Product SEO</label>
					<div style="display:none;" class="1 box">
						<div class="form-group">
							<p for="BlogCategory">Meta Tags</p>
							<input class="form-control" value="<?php echo $row['meta_tag']; ?>" id="BlogCategory" type="text" placeholder="Enter Meta Tags" name="meta_tag"/>
						</div>
						<div class="form-group">
							<p for="BlogCategory">Meta Description</p>
							<input class="form-control" value="<?php echo $row['meta_description']; ?>" id="BlogCategory" type="text" placeholder="Enter Meta Description" name="meta_description"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<p>Product Details <star>*</star></p>
					<textarea class="form-control" name="details"><?php echo $row['details']; ?></textarea>
				</div>
				<div class="form-group">
					<p>Product Description <star>*</star></p>
					<textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
				</div>
				
				<div class="form-group">
					<p>Short Details <star>*</star></p>
					<textarea class="form-control" type="text" placeholder="Short Details" name="short_details"><?php echo $row['short_details']; ?></textarea>
				</div>
				<div class="form-group">
					<p class="mb-1 font-weight-bold" for="Shipping">Buy and Return Policy: <?php echo $row['policy'];?></p><br>
					<select name="policy"  class="form-control">
						<option value="">None</option>
						<option value="7">7 Days</option>
						<option value="10">10 Days</option>
						<option value="15">15 Days</option>
						<option value="0">Non-Returnable</option>
					</select>
				</div>
				 
				  <p class="mb-1" for="Shipping">Select COD Available::<?php echo $row['cod_available']; ?></p><br>
					<div class="form-group container form-row">
					  <div class="col-2">
					  </div>
					   
					  <div class="custom-control custom-radio col-4">
							  <input <?php if($row['cod_available']== '1') { echo 'checked'; } ?> class="custom-control-input" value='1' type="radio" id="customRadio1" name="cod_available">
							  <label for="customRadio1" class="custom-control-label">Yes</label>
					  </div>
					  <div class="custom-control custom-radio col-4">
						  <input <?php if($row['cod_available']== '2') { echo 'checked'; } ?> class="custom-control-input" value="2" type="radio" id="customRadio2" name="cod_available">
						  <label for="customRadio2" class="custom-control-label">No</label>
					  </div>
					  <div class="col-2">
					  </div>
				  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-5">
		 <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Additonal Features</h3>
              </div>
				<div class="card-body">
                 
					<div class="form-group">
						<p for="BlogCategory">Shipping Weight</p>
						<input class="form-control" value="<?php echo $row['weight']; ?>" id="BlogCategory" type="text" placeholder="Enter Product Weight" name="weight"/>
					</div>
					<div class="form-group">
						<p for="BlogCategory">Shipping Measurement</p>
						<input class="form-control" value="<?php echo $row['weight']; ?>" id="BlogCategory" type="text" placeholder="Enter Product Weight" name="weight"/>
					</div>
					<div class="form-group">
						<p for="BlogCategory">GST Percentage:<?php echo $row['weight']; ?></p>
						<select id="gst_percentage" class="form-control" name="gst_percentage">
								<option value="">Select Gst Percentage</option>
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="12">12</option>
								<option value="18">18</option>
								<option value="28">28</option>
							</select>
					</div>
					
				  <div class="form-group">
					  <p for="BlogCategory">Purchase Price <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['purchase_price']; ?>" id="BlogCategory" type="text" placeholder="Enter Purchase Price" name="purchase_price"/>
					  <?php echo form_error('purchase_price'); ?>
				  </div>
				   <div class="form-group">
					  <p for="BlogCategory">MRP <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['previous_price']; ?>" id="BlogCategory" type="text" placeholder="Enter MRP" name="previous_price"/>
					  <?php echo form_error('previous_price'); ?>
				  </div>
				  <div class="form-group">
					  <p for="BlogCategory">Sell Price <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['price']; ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="price"/>
					  <?php echo form_error('price'); ?>
				  </div>
				  <div class="form-group">
						<p for="BlogCategory">Admin Commission Percentage</p>
						<input class="form-control" value="<?php echo $row['admin_commission_percentage']; ?>" id="BlogCategory" type="text" placeholder="Enter Product Weight" name="admin_commission_percentage"/>
					</div>
				  <div class="form-group">
					  <p for="BlogCategory">Admin Commission <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['admin_commission_amount']; ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="admin_commission_amount"/>
					  <?php echo form_error('admin_commission_amount'); ?>
				  </div>
				   <div class="form-group">
					  <p for="BlogCategory">GSt Amount <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['gst_amount']; ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="gst_amount"/>
					  <?php echo form_error('gst_amount'); ?>
				  </div>
				  <div class="form-group">
					  <p for="BlogCategory">Without Gst Price <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['without_gst_price']; ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="without_gst_price"/>
					  <?php echo form_error('without_gst_price'); ?>
				  </div>
				  <div class="form-group">
					  <p for="BlogCategory">Seller Payable Amount <small>in INR</small>&nbsp; <star>*</star></p>
					  <input class="form-control" value="<?php echo $row['seller_payable_amount']; ?>" id="BlogCategory" type="text" placeholder="Enter Sell Price" name="seller_payable_amount"/>
					  <?php echo form_error('seller_payable_amount'); ?>
				  </div>
				  <div class="form-group">
					  <p for="BlogCategory">Delivery Charge Pay By</p>
						<select class="form-control" name="delivery_charge_pay_by">
							<option value="<?php echo $row['delivery_charge_pay_by']; ?>"><?php echo $row['delivery_charge_pay_by']; ?></option>
							<option value="seller">Seller</option>
							<option value="buyer">Buyer</option>
						</select>
				  </div>
				  

				</div>
              <!-- /.card-body -->
            </div>
			<!-- /.card -->
			
          </div>
          <!--/.col (right) -->
        </div>
	 
        <!-- /.row -->
      </div><!-- /.container-fluid -->
   
      
    </section>
	
	<section class="content">
	  <div class="container-fluid">
	<form method="post" action="" enctype="multipart/form-data">  
		<div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Picture</h3>
				<div class="card-tools">
          
				<a href="<?php echo WEB_URL.'product/all';?>" class="btn btn-sm btn-danger text-right">Product List</a>
				</div>
              </div>
              <!-- /.card-header -->
			  
              <!-- form start -->
             <div class="card-body">
			  <input type="hidden" value="<?php echo $row['product_id'];?>" name="id" />
                <div class="form-group">
                    <p for="exampleInputFile">Select Picture</p>
                    <input onchange="loadFile(event)" name="file" type="file" class="form-control" id="exampleInputFile">
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
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="updatePicture" value="updatePicture" class="btn btn-sm btn-info">Update&nbsp;Picture</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-5">
		 <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Additonal Features</h3>
              </div>
				<div class="card-body">
                 
					<div class="form-group">
                    <p for="exampleInputFile">Current Picture</p>
					<img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>" style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;" class="img-fluid" id="picone"/>
                </div>
				  </div>
              
            </div>
			 
			
          </div>
          <!--/.col (right) -->
        </div>
	 	
        <!-- /.row -->
      </div><!-- /.container-fluid -->
   
      
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
                        $('#city').html('<option value="">Child Category not available</option>');
                    }
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Subcategory first</option>'); 
        }
    });
	
	/* Populate data to city dropdown */
    $('#state').on('change',function(){
        var commissionID = $(this).val();
		var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"dropdowns/getAdminCommission";
        if(commissionID){
            $.ajax({
                type:'POST',
               url:base_url,
                data:'subcategory_id='+commissionID,
                success:function(data){
                    $('#commission').html('<option value="">Select Admin Commssion</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.admin_commission_percentage);           
                            $('#commission').append(option);
                        });
                    }else{
                        $('#commission').html('<option value="">Commission not available</option>');
                    }
                }
            }); 
        }else{
            $('#commission').html('<option value="">Select Commission first</option>'); 
        }
    });
    
	
    
});
</script>
