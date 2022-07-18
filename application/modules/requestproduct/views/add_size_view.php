
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
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Size Qunantity</h3>
				<div class="card-tools">
          
				<a href="<?php echo WEB_URL.'product/all';?>" class="btn btn-sm btn-danger text-right">Product List</a>
				</div>
              </div>
              <!-- /.card-header -->
			 
              <!-- form start -->
             <div class="card-body">
			  
                <div class="form-group">
					<p for="Shipping">Product Size&nbsp; <small>(eg. S,M,L,XL,XXL,3XL,4XL)</small>&nbsp;<star>*</star></p>
					<input class="form-control" value="<?php echo set_value('size'); ?>" id="Shipping" type="text" placeholder="Size Name" name="size"/>
				</div>
				<div class="form-group">
					<p for="Shipping">Product Size Quantity&nbsp; <small>(Number of quantity of this size)</small>&nbsp;<star>*</star></p>
					<input class="form-control" value="<?php echo set_value('size_qty'); ?>" id="Shipping" type="number" placeholder="Size Quantity" name="size_qty"/>
				</div>
				<div class="form-group">
					<p for="Shipping">Product Size Price&nbsp; <small>(Size Price)</small>&nbsp;<star>*</star></p>
					<input class="form-control" value="<?php echo set_value('size_price'); ?>" id="Shipping" type="number" placeholder="Size Price" name="size_price"/>
				</div>
				<div class="form-group">
					<p for="Shipping">Product Color&nbsp; <small>(Product Color)</small>&nbsp;<star>*</star></p>
					<input class="form-control" value="<?php echo set_value('color'); ?>" id="Shipping" type="color" placeholder="Size Price" name="color"/>
				</div>
					<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>"/>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">Add&nbsp;</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
		 <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Product Size Quantity Price Details</h3>
              </div>
              <div class="card-body">
                 <table class="table table-hover table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Size</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Color</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($productSizeQuantity) && count($productSizeQuantity) > 0){
				foreach($productSizeQuantity as $val) {
					?>
					<tr>
						<td>
							<span><?php echo $val['size']; ?></span></br>
							
						</td>
						<td><?php echo $val['size_qty']; ?></td>
						<td>Rs&nbsp;<?php echo getNumberFormat($val['size_price']); ?></td>
						<td style="background-color:<?php echo $val['color']; ?>;">
							
						</td>
						
					</tr>
					<?php
				}
			}else {
				?>
				<tr><td><?php echo NO_RECORDS_FOUND;?></td></tr>
				<?php
			}
			?>
			</tbody>
		</table>
			  </div>

				</div>
            </div>
			
          </div>
        </div>
	</form>	
      </div>
   
      
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
<script>
$('#summernote').summernote({

	placeholder: 'Write Details Here...',

	tabsize: 2,

	height: 100

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
