<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'teacherrequest/allteacherrequest';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="">
						<input type="hidden" name="id" value="<?php echo $row['id_teacher_reg'];?>">
						<div class="form-row">
							<div class="col-sm-3">
								<div class="form-group">
									<label class="medium mb-1" for="FirstName">First Name <star>*</star></label>
									<input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control" placeholder="Enter First Name" id="FirstName">
									<?php echo form_error('first_name');?>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<label class="medium mb-1" for="LastName">Last Name <star>*</star></label>
									<input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control" placeholder="Enter Last Name" id="LastName">
									<?php echo form_error('last_name');?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="medium mb-1" for="description">Description</label>
									<input type="text" name="description" value="<?php echo $row['about_us']; ?>" class="form-control" placeholder="Enter Description" id="description">
									<?php echo form_error('description');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="Gender">Gender <star>*</star></label>
									<?php
									$gArr = getGender();
									echo form_dropdown('gender',$gArr,$row['gender'],'class="form-control" id="gender" ');
									echo form_error('gender');
									?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="Mobile">Mobile No. <star>*</star></label>
									<input type="text" name="mobile_no" value="<?php echo $row['mobile_no']; ?>" class="form-control" placeholder="Enter Mobile No." id="Mobile">
									<?php echo form_error('mobile_no');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="alt_mobile_no">Alternate Mobile No.</label>
									<input type="tel" name="alt_mobile_no" value="<?php echo $row['alt_mobile_no']; ?>" class="form-control" placeholder="Enter Alternate Mobile No." id="alt_mobile_no">
									<?php echo form_error('alt_mobile_no');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="Email">Email <star>*</star></label>
									<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter Email" id="Email">
									<?php echo form_error('email');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="director_name">Specialization <star>*</star></label>
									<input type="tel" name="specialization" value="<?php echo $row['specialization']; ?>" class="form-control" placeholder="Enter Specialization" id="specialization">
									<?php echo form_error('specialization');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="state">State <star>*</star></label>
									<?php
									echo form_dropdown('id_state',$state,$row['id_state'],'class="form-control" id="id_state" ');
									?>
									<?php echo form_error('id_state');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="state">City <star>*</star></label>
									<?php
									echo form_dropdown('id_city',$city,$row['id_city'],'class="form-control" id="id_city" ');
									?>
									<?php echo form_error('id_city');?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="status">Status <star>*</star></label>
									<?php
									$statusArr = getRecordStatus();
									unset($statusArr[3]);
									echo form_dropdown('status',$statusArr,$row['status'],'class="form-control" id="status" ');
									echo form_error('status');
									?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="state">Image <star>*</star></label>
									<input type="file" class="form-control" name="attachment" accept=".png,.jpeg,.jpg,.gif" id="attachment">
									<?php echo form_error('attachment'); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<?php
									if(CLDNRY_ACCESS) {
										$this->load->library('cloudinary_lib');
										echo cl_image_tag($row['file_path'], array("class" => "special_img", "width" => 75, "height" => 50, "type" => "fetch"));
									}else{
										echo getDefaultImg(array("str"=>"class='special_img' width='75px' height='50px' "));
									}
									?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm" >Update</button>
								<a href="<?php echo WEB_URL.'teacherrequest/allteacherrequest';?>" class="btn btn-danger btn-sm" >Reset</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
