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
				<div class="card-body">
					<form method="post" action="<?php echo WEB_URL.'News/edit?id='.$row['id_product'];?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $row['id_product'];?>">
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="name">News Name <star>*</star></label>
									<input class="form-control" value="<?php echo $row['name']; ?>" id="name" type="text" placeholder="Enter News name" name="name"/>
									<?php echo form_error('name'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="MRP">MRP Price <star>*</star></label>
									<input class="form-control" value="<?php echo $row['mrp_price']; ?>" id="MRP" type="text" placeholder="Enter Mrp Price" name="mrp_price"/>
									<?php echo form_error('mrp_price'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="DiscountAmount">Discount Amount (%)<star>*</star></label>
									<input class="form-control" value="<?php echo $row['discount_amount']; ?>" id="DiscountAmount" type="text" placeholder="Enter Discount Amount" name="discount_amount"/>
									<?php echo form_error('discount_amount'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="SellPrice">Sell Price <star>*</star></label>
									<input class="form-control" value="<?php echo $row['sell_price']; ?>" id="SellPrice" type="text" placeholder="Enter Sell Price" name="sell_price"/>
									<?php echo form_error('sell_price'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="PurchasePrice">Purchase Price <star>*</star></label>
									<input class="form-control" value="<?php echo $row['purchase_price']; ?>" id="PurchasePrice" type="text" placeholder="Enter Purchase Price" name="purchase_price"/>
									<?php echo form_error('purchase_price'); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="PurchasePrice">Quantity <star>*</star></label>
									<input class="form-control" value="<?php echo $row['quantity']; ?>" id="PurchasePrice" type="text" placeholder="Enter Quantity" name="quantity"/>
									<?php echo form_error('quantity'); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="small mb-1" for="summernote">Enter Description <star>*</star></label>
									<textarea class="form-control" id="summernote" type="text" placeholder="Enter Description" name="description"><?php echo $row['description']; ?></textarea>
									<?php echo form_error('description'); ?>
								</div>
							</div>
							<script>

								$('#summernote').summernote({

									placeholder: 'Write Details Here...',
									tabsize: 2,

									height: 350

								});
							</script>
							<div class="col-md-6">
								<div class="form-group">
									<label class="small mb-1" for="summernote">Enter Hindi Description <star>*</star></label>
									<textarea class="form-control" id="summernote1" type="text" placeholder="Enter Description" name="hindi_desc"><?php echo $row['hindi_desc']; ?></textarea>
									<?php echo form_error('hindi_desc'); ?>
								</div>
							</div>
							<script>

								$('#summernote1').summernote({

									placeholder: 'Write Hindi Details Here...',

									tabsize: 2,

									height: 350

								});
							</script>
						</div>
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="medium mb-1" for="state">Image <star>*</star></label>
									<input type="file" class="form-control" name="attachment" accept=".png,.jpeg,.jpg,.gif" id="attachment">
									<?php echo form_error('attachment'); ?>
								</div>
							</div>
							<div class="col-md-4">
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
								<a href="<?php echo WEB_URL.'News/all';?>" class="btn btn-danger btn-sm" >Reset</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>


	
