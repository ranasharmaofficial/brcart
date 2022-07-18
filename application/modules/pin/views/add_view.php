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
           <a href="<?php echo WEB_URL.'pin/all';?>" class="btn btn-sm btn-danger">Back</a>
          </div>
        </div>
	<form class="form-row" method="post" action="" enctype="multipart/form-data">	
        <div class="card-body row">
             <div class="col-sm-1"></div>
             <div class="col-sm-10 form-row">
                <div class="form-group col-sm-6">
					<p for="subject">Pin <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('pin'); ?>" id="subject" type="text" placeholder="Enter pin" name="pin"/>
					<?php echo form_error('pin'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Place <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('place'); ?>" id="subject" type="text" placeholder="Enter place" name="place"/>
					<?php echo form_error('place'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">State <star>*</star></p>
					<select name="state" id="state" class="form-control">
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
				</div>
                <div class="form-group col-sm-6">
					<p for="subject">COD Limit <star>*</star></p>
					<input class="form-control" value="<?php echo set_value('cod_limit'); ?>" id="subject" type="number" placeholder="Enter place" name="cod_limit"/>
					<?php echo form_error('cod_limit'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="cod">COD Allowed <star>*</star></p>
					<select name="cod" id="cod" class="form-control">
						<option value="YES">Yes</option>
						<option value="NO">No</option>
					</select>
				</div>
					<div class="form-group  col-sm-12 text-right">
						<button type="reset" class="btn btn-danger btn-sm" >Reset</button>
						<button type="submit" name="submit" value="submit" class="btn btn-info btn-sm" >Add</button>
					</div>
            </div>
			<div class="col-sm-1"></div>
        </div>
	</form>	
		
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  