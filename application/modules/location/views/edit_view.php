<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'Location/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<form method="post" action="">
						<input type="hidden" name="id" value="<?php echo $row['id_city'];?>">
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="name">Location Name <star>*</star></label>
									<input class="form-control" value="<?php echo $row['name']; ?>" id="name" type="text" placeholder="Enter Location name" name="name"/>
									<?php echo form_error('name'); ?>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm" >Update</button>
								<a href="<?php echo WEB_URL.'Location/all';?>" class="btn btn-danger btn-sm" >Reset</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
