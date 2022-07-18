<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right">&nbsp;</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<?php $this->load->view('adminlayout/message_view');?>
					<form action="" method="POST">
						<div class="form-row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="oldpassword">Old Password <star>*</star></label>
									<input class="form-control" id="oldpassword" type="password" name="oldpassword" placeholder="Enter Old Password" value="<?php echo set_value('oldpassword');?>"/>
									<?php echo form_error('oldpassword');?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="newpassword">New Password <star>*</star></label>
									<input class="form-control" id="newpassword" type="password" name="new_password" placeholder="Enter New Password" value="<?php echo set_value('new_password');?>"/>
									<?php echo form_error('new_password');?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="medium mb-1" for="repassword">Re enter password <star>*</star></label>
									<input class="form-control" id="repassword" type="password" name="re_enter_password" placeholder="Re enter password" value="<?php echo set_value('re_enter_password');?>"/>
									<?php echo form_error('re_enter_password');?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm" >Submit</button>
								<button type="submit" name="reset" value="reset" class="btn btn-danger btn-sm" >Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
