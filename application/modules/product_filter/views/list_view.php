<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'temp/tForm';?>" class="btn btn-sm btn-primary">Add</a> </div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header">
					<form>
						<div class="form-row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="small mb-1" for="inputFirstName">First Name</label>
									<input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" />
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="small mb-1" for="inputLastName">Last Name</label>
									<input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" />
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="#">Submit</a></div>
							</div>
						</div>
					</form>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-sm"  width="100%" cellspacing="0">
							<thead class="thead-light">
							<tr>
								<th>Name</th>
								<th style="width:100px;">Option</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>Edit</td>
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Edit</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
