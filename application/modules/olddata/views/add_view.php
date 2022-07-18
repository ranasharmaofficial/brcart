<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'category/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
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
									<label class="small mb-1" for="Name">Name <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('name'); ?>" id="Name" type="text" placeholder="Enter Name" name="name"/>
									<?php echo form_error('name'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="Mobile">Mobile <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('mobile'); ?>" id="Mobile" type="tel" placeholder="Enter Mobile" name="mobile"/>
									<?php echo form_error('mobile'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="Email">Email <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('email'); ?>" id="Email" type="text" placeholder="Enter Email(Optional)" name="email"/>
									 
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="Address">Address <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('address'); ?>" id="Address" type="text" placeholder="Enter Address" name="address"/>
									 
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="Message">Message <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('message'); ?>" id="Message" type="text" placeholder="Enter Message" name="message"/>
									 
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
