<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'City/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
			<div class="card mb-4">
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
					<form method="post" action="">
						<div class="form-row">
						
						<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select State <star>*</star></label>
									<!-- Country dropdown -->
<?php if(false) { ?><select class="form-control" id="country">
    <option value="">Select Country</option>
    <?php
    if(!empty($CountryId)){
        foreach($CountryId as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select><?php } ?>
<?php
									echo form_dropdown('country_id',$CountryId,'','class="form-control" id="country" ');
									?>
									<?php echo form_error('country_id'); ?>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" name="state_id"  for="subject">Select State <star>*</star></label>
									<select name="state_id"  class="form-control" id="state">
										<option value="">Select country first</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" for="city">Enter City <star>*</star></label>
									<!-- City dropdown -->
									<input type="text" name="name" class="form-control" id="city">
										
								</div>
							</div>
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
	</main>
<script type="text/javascript">
$(document).ready(function(){
    /* Populate data to state dropdown */
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
			var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"dropdowns/getStates";
			url:base_url,

			$.ajax({
                type:'POST',

				url:base_url,
                data:'country_id='+countryID,
                success:function(data){
                    $('#state').html('<option value="">Select State</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);           
                            $('#state').append(option);
                        });
                    }else{
                        $('#state').html('<option value="">State not available</option>');
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
        if(stateID){
            $.ajax({
                type:'POST',
                //url:'<?php echo base_url('dropdowns/getCities'); ?>',
				url:'http://grihprawesh.com/admin/dropdowns/getStates',
                data:'state_id='+stateID,
                success:function(data){
                    $('#city').html('<option value="">Select City</option>'); 
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
