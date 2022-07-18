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
            <h1>Manage <?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h1>
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
           <a href="<?php echo WEB_URL.'distributor/applicationlist';?>" class="btn btn-sm btn-danger">Back</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row justify-content-center">
            
             <div class="col-sm-10">
                  <div class="row">
                      <div class="col-sm-6 form-group">
                        <p for="subject">Full Name <star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('name'); ?>" id="subject" type="text" placeholder="Enter Full Name" name="name"/>
                        <?php echo form_error('name'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadhar_no">Aadhar Number <star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('aadhar_no'); ?>" id="aadhar_no" type="tel" placeholder="Aadhar Number" name="aadhar_no"/>
                        <?php echo form_error('aadhar_no'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="Gender">Gender <star>*</star></p>
                        <select class="form-control" id="Gender" name="gender">
                            <option selected disabled>---Select Gender----</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>
                        <?php echo form_error('gender'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dateOfBirth">Date of Birth <star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('dob'); ?>" id="dateOfBirth" type="date" placeholder="Date of Births" name="dob"/>
                        <?php echo form_error('dob'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dateOfBirts">Date of Birth (in Words)<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('dob_inwords'); ?>" id="dateOfBirts" type="text" placeholder="Date of Births" name="dob_inwords"/>
                        <?php echo form_error('dob_inwords'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="birthPlace">Place of Birth<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('place_of_birth'); ?>" id="birthPlace" type="text" placeholder="Place of Birth" name="place_of_birth"/>
                        <?php echo form_error('place_of_birth'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="nameOfFather">Father's Name<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('fathersname'); ?>" id="nameOfFather" type="text" placeholder="Father's Name" name="fathersname"/>
                        <?php echo form_error('fathersname'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadharOfFather">Father's Aadhar No<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('fatheraadhar'); ?>" id="aadharOfFather" type="text" placeholder="Father's Aadhar No" name="fatheraadhar"/>
                        <?php echo form_error('fatheraadhar'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="nameOfMother">Mother's Name<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('mothersname'); ?>" id="nameOfMother" type="text" placeholder="Mother's Name" name="mothersname"/>
                        <?php echo form_error('mothersname'); ?>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadharOfMother">Mother's Aadhar No<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('motheraadhar'); ?>" id="aadharOfMother" type="text" placeholder="Mother's Aadhar No" name="motheraadhar"/>
                        <?php echo form_error('motheraadhar'); ?>
                      </div>
                      <div class="col-sm-12 form-group">
                        <p for="Address">Permanent Address<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('permanent_address'); ?>" id="Address" type="text" placeholder="Permanent Address" name="permanent_address"/>
                        <?php echo form_error('permanent_address'); ?>
                      </div>
                      <div class="col-sm-12 form-group">
                        <p for="AddressOfBirth">Address at Time of Birth<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('address_of_birth'); ?>" id="AddressOfBirth" type="text" placeholder="Address at Time of Birth" name="address_of_birth"/>
                        <?php echo form_error('address_of_birth'); ?>
                      </div>
                      
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Date of Registration<star>*</star></p>
                        <input class="form-control" value="<?php echo set_value('dob_registration'); ?>" id="dobReg" type="date" placeholder="Date of Registration" name="dob_registration"/>
                        <?php echo form_error('dob_registration'); ?>
                      </div>
					  <?php if(false) { ?>
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Select State<star>*</star></p>
                        <?php echo form_dropdown('state',$StateId,'','class="form-control" id="category"'); ?>
						<?php echo form_error('state'); ?>
                      </div>
					  
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Select Hospital<star>*</star></p>
                        <select name="hospital"  class="form-control" id="state">
					<option value="">Select State first</option>
				</select>
				<?php echo form_error('hospital'); ?>
                      
                      </div>
					  <?php } ?>
<script language="Javascript" src="<?php echo WEB_PATH_FRONT; ?>search/jquery.js">
                                    </script>
                                    <script type="text/JavaScript" src='<?php echo WEB_PATH_FRONT; ?>search/state.js'>
                                    </script>
									
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">State *</label>
                                            <select style="font-size:16px;" class="form-control" name="state"
                                                id="listBox" onchange='selct_district(this.value)'></select>
                                            <?php echo form_error('state'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="listBox">City *</label>
                                            <select style="font-size:16px;" class="form-control" name="city"
                                                id='secondlist'></select>
                                            <?php echo form_error('city'); ?>
                                        </div>
                                    </div>

                      <div class="col-sm-12 form-group text-right">
                        <button type="reset" class="btn btn-danger" >Reset</button>
                        <button type="submit" name="submit" value="submit" class="btn btn-info" >Add</button>
                      </div>
                </div> 
                
				    </div>
				
            </div>
			
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
                    $('#state').html('<option value="">Select Hospital</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.name);           
                            $('#state').append(option);
                        });
                    }else{
                        $('#state').html('<option value="">Hospital not available</option>');
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