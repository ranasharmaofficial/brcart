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
<select class="form-control" name="id_country" id="country">
    <option value="">Select Country</option>
    <?php
    if(!empty($countries)){
        foreach($countries as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>
<?php echo form_error('id_country'); ?>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select State <star>*</star></label>
									<select name="id_state" class="form-control" id="state">
										<option value="">Select country first</option>
									</select>
									<?php echo form_error('id_state'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" for="subject">Select City <star>*</star></label>
									<!-- City dropdown -->
									<select name="id_city" class="form-control" id="city">
										<option value="">Select city first</option>
									</select>
									<?php echo form_error('id_city'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								<label class="small mb-1" for="subject">Enter Location <star>*</star></label>
									<input type="text" class="form-control" id="location" name="name"/>
									<?php echo form_error('name'); ?>
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
	<?php if(false) { ?> url:'<?php echo WEB_URL('dropdowns/getStates'); ?>',
	
	<?php } ?>
<script type="text/javascript">

$(document).ready(function(){
    /* Populate data to state dropdown */
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
              url:'http://grihprawesh.com/admin/dropdowns/getStates',
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
               url:'http://grihprawesh.com/admin/dropdowns/getCities',
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
