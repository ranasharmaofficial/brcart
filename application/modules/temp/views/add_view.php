<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="#" class="btn btn-sm btn-danger">Back</a> </div>
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
					<form>
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="inputFirstName">First Name</label>
									<input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" />
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="inputLastName">Last Name</label>
									<input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" />
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="small mb-1" for="inputPassword">Password</label>
									<input class="form-control" id="inputPassword" type="password" placeholder="Enter password" />
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group mt-4 mb-0">
								<button class="btn btn-primary btn-sm" >Submit</button>
								<button class="btn btn-danger btn-sm" >Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
