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
           <a href="<?php echo WEB_URL.'dobapplication/pendingapplication';?>" class="btn btn-sm btn-danger">Back</a>
          </div>
        </div>
	 
        <div class="card-body row justify-content-center">
				<?php if($row['type']=='1') { ?>
					<button class="btn btn-warning">Date of Birthday Application</button>
				<?php } else if($row['type']=='2') { ?>
					<button class="btn btn-danger">Application of Death Certificate</button>
				<?php }  ?>
             <div class="col-sm-10 mt-3">
                  <div class="row">
                      <div class="col-sm-6 form-group">
                        <p for="subject">Full Name </p>
                        <input class="form-control" readonly value="<?php echo $row['name']; ?>" id="subject" type="text" placeholder="Enter Full Name" name="name"/>
                       </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadhar_no">Aadhar Number </p>
                        <input class="form-control" readonly value="<?php echo $row['aadhar_no']; ?>" id="aadhar_no" type="tel" placeholder="Aadhar Number" name="aadhar_no"/>
                       </div>
                      <div class="col-sm-6 form-group">
                        <p for="Gender">Gender </p>
                       <input class="form-control" readonly value="<?php echo $row['dob']; ?>" id="dateOfBirth" type="date" placeholder="Date of Births" name="dob"/>
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dateOfBirth">Date of Birth </p>
                        <input class="form-control" readonly value="<?php echo $row['dob']; ?>" id="dateOfBirth" type="date" placeholder="Date of Births" name="dob"/>
                       
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dateOfBirts">Date of Birth (in Words)</p>
                        <input class="form-control" readonly value="<?php echo $row['dob_inwords']; ?>" id="dateOfBirts" type="text" placeholder="Date of Births" name="dob_inwords"/>
                       
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="birthPlace">Place of Birth</p>
                        <input class="form-control" readonly value="<?php echo $row['place_of_birth']; ?>" id="birthPlace" type="text" placeholder="Place of Birth" name="place_of_birth"/>
                        
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="nameOfFather">Father's Name</p>
                        <input class="form-control" readonly value="<?php echo $row['fathersname']; ?>" id="nameOfFather" type="text" placeholder="Father's Name" name="fathersname"/>
                        
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadharOfFather">Father's Aadhar No</p>
                        <input class="form-control" readonly value="<?php echo $row['fatheraadhar']; ?>" id="aadharOfFather" type="text" placeholder="Father's Aadhar No" name="fatheraadhar"/>
                       
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="nameOfMother">Mother's Name</p>
                        <input class="form-control" readonly value="<?php echo $row['mothersname']; ?>" id="nameOfMother" type="text" placeholder="Mother's Name" name="mothersname"/>
                        
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="aadharOfMother">Mother's Aadhar No</p>
                        <input class="form-control" readonly value="<?php echo $row['motheraadhar']; ?>" id="aadharOfMother" type="text" placeholder="Mother's Aadhar No" name="motheraadhar"/>
                        
                      </div>
                      <div class="col-sm-12 form-group">
                        <p for="Address">Permanent Address</p>
                        <input class="form-control" readonly value="<?php echo $row['permanent_address']; ?>" id="Address" type="text" placeholder="Permanent Address" name="permanent_address"/>
                       
                      </div>
                      <div class="col-sm-12 form-group">
                        <p for="AddressOfBirth">Address at Time of Birth</p>
                        <input class="form-control" readonly value="<?php echo $row['address_of_birth']; ?>" id="AddressOfBirth" type="text" placeholder="Address at Time of Birth" name="address_of_birth"/>
                       
                      </div>
                      
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Date of Registration</p>
                        <input class="form-control" readonly value="<?php echo $row['dob_registration']; ?>" id="dobReg" type="text" placeholder="Date of Registration" name="dob_registration"/>
                        
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Select State</p>
                        <input class="form-control" readonly value="<?php echo $row['state']; ?>" id="dobReg" type="text" placeholder="Date of Registration" name="dob_registration"/>
				
                      </div>
                      <div class="col-sm-6 form-group">
                        <p for="dobReg">Select Hospital</p>
                        <input class="form-control" readonly value="<?php echo $row['hospital']; ?>" id="dobReg" type="text" placeholder="Date of Registration" name="dob_registration"/>
				
                      
                      </div>


                    
                </div> 
				<hr>
				<h3 class="text-center">Verify and Upload Certificate</h3>
				<form method="post" action="" enctype="multipart/form-data" class="row">
					<div class="col-sm-6 form-group">
                        <p for="upcer">Upload Certificate</p>
                        <input class="form-control" id="upcer" type="file" placeholder="" name="dob_certificate"/>
                        <input class="form-control" id="upcer" type="hidden" value="<?php echo $row['id']; ?>" placeholder="" name="dob_appl_id"/>
					</div>
					<div class="col-sm-12 form-group">
                        <button class="btn btn-primary" type="submit" value="submit" name="submit">Upload</button>
					</div>
				</form>
                
				    </div>
		</div>
	 
		
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
        var base_url = $('meta[name="weburl"]').attr('content'];
			base_url = base_url+"dropdowns/getSubcategory";
		if(countryID){
            $.ajax({
                type:'POST',
               url:base_url,
				data:'category_id='+countryID,
                success:function(data){
                    $('#state').html('<option value="">Select Hospital</option>']; 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />'];
                            option.attr('value', this.id).text(this.name);           
                            $('#state').append(option);
                        });
                    }else{
                        $('#state').html('<option value="">Hospital not available</option>'];
                    }
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>'];
            $('#city').html('<option value="">Select state first</option>']; 
        }
    });
    
	
	/* Populate data to city dropdown */
    $('#state').on('change',function(){
        var stateID = $(this).val();
		var base_url = $('meta[name="weburl"]').attr('content'];
			base_url = base_url+"dropdowns/getChildcategory";
        if(stateID){
            $.ajax({
                type:'POST',
               url:base_url,
                data:'subcategory_id='+stateID,
                success:function(data){
                    $('#city').html('<option value="">Select Child Category</option>']; 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />'];
                            option.attr('value', this.id).text(this.name);           
                            $('#city').append(option);
                        });
                    }else{
                        $('#city').html('<option value="">Child Category not available</option>'];
                    }
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Subcategory first</option>']; 
        }
    });
	
	/* Populate data to city dropdown */
    $('#state').on('change',function(){
        var commissionID = $(this).val();
		var base_url = $('meta[name="weburl"]').attr('content'];
			base_url = base_url+"dropdowns/getAdminCommission";
        if(commissionID){
            $.ajax({
                type:'POST',
               url:base_url,
                data:'subcategory_id='+commissionID,
                success:function(data){
                    $('#commission').html('<option value="">Select Admin Commssion</option>']; 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />'];
                            option.attr('value', this.id).text(this.admin_commission_percentage);           
                            $('#commission').append(option);
                        });
                    }else{
                        $('#commission').html('<option value="">Commission not available</option>'];
                    }
                }
            }); 
        }else{
            $('#commission').html('<option value="">Select Commission first</option>']; 
        }
    });
    
	
    
});
</script>