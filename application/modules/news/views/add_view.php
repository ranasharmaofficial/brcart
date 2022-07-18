<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'News/all';?>" class="btn btn-sm btn-danger">Back</a> </div>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
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
					<form method="post" action="" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="small mb-1" for="title">News Title <star>*</star></label>
									<input class="form-control" value="<?php echo set_value('title'); ?>" id="title" type="text" placeholder="Enter Title" name="title"/>
									<?php echo form_error('title'); ?>
								</div>
							</div>
		
							<div class="col-md-12">
								<div class="form-group">
									<label class="small mb-1" for="summernote">Enter Details <star>*</star></label>
								<textarea class="form-control" id="summernote" type="text" placeholder="Enter Details" name="details"><?php echo set_value('details'); ?></textarea>
									<?php echo form_error('details'); ?>
								</div>
							</div>
							<script>

								$('#summernote').summernote({

									placeholder: 'Write Details Here...',

									tabsize: 2,

									height: 100

								});
							</script>
							
						</div>
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="state">Image <star>*</star></label>
									<input type="file" name="file"  class="form-control" accept=".png,.jpeg,.jpg,.gif" id="attachment">

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
