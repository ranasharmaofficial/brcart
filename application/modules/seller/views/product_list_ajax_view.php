<style>
hr
{
	margin:2px;
}
</style>
<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-bordered table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllProductList) && count($getAllProductList) > 0){
				foreach($getAllProductList as $val) {
					
					include('db.php');
					$pid=$val['id'];
		$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) from vendor_product where pid='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($CountPidInSellerStock);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();

					?>
					<tr>
						<td>
							<span><?php echo $val['name']; ?></span></br>
							ID:&nbsp;<?php echo $val['id']; ?>&nbsp;&nbsp;SKU:<?php echo $val['sku']; ?>
						</td>
						<td>Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></td>
						 
						<td>
							<?php if($CountPidInSellerStock<'1') { ?>
								<button class="btn btn-info btn-xs" data-toggle="modal" type="button" data-target="#update_modal<?php echo $val['id']?>">Add&nbsp;Product</button>
								<?php } else { ?>
							<button class='btn btn-warning btn-sm'>Added in Stock</button>
							<?php } ?>
						</td>
						<td>
							<div class="input-group-prepend">
								<button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
									Action
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'editpost/'.$val['slug'];?>"><i class="fas fa-edit"></i>&nbsp;Edit</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'post/'.$val['slug'];?>"><i class="fas fa-eye"></i>&nbsp;View Details</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/galleryview?pid='.$val['id'];?>"><i class="fas fa-eye"></i>&nbsp;View Gallery</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/addsize?pid='.$val['id'];?>"><i class="fas fa-plus"></i>&nbsp;Add Size Qty</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'post/'.$val['slug'];?>"><i class="fas fa-trash"></i>&nbsp;Delete</a></li><hr>
								</ul>
							</div>
						</td>
					</tr>
					<div class="modal fade" id="update_modal<?php echo $val['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<form method="post" action="">
			<div class="modal-content"> <?php// echo WEB_URL.'seller/allproducts'?>
			
				<div style="padding: .4rem;background-color:teal;color:#fff;text-align:center;" class="modal-header">
					<h4 class="modal-title text-center">Add Product</h4>
				</div>
				<div style="padding:.4rem;" class="modal-body row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="form-group">
							<label>Product Name</label>
							<input type="text" readonly value="<?php echo $val['name']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>MRP</label>
							<input type="hidden" name="pid" value="<?php echo $val['id']?>"/>
							<input type="text" value="<?php echo $val['previous_price']?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Price-<?php echo $this->sellerId; ?></label><?php// echo $val['price']?>
							<input type="text" name="price" required value="" class="form-control"/>
							<?php// echo form_error('price'); ?>
						</div>
						<div class="form-group">
							<label>Stock -<?php echo WEB_URL.'seller/allproducts'?></label>
							<input type="text" name="stock" required class="form-control"/>
							<?php// echo form_error('stock'); ?>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div style="clear:both;"></div>
				<div style="padding: .4rem;" class="modal-footer">
					<button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" value="submit" class="btn btn-warning btn-sm"> Add&nbsp;Product</button>
				</div>
				</div>
		</form>
	</div>
	</div>
</div>
					<?php
				}
			}else {
				?>
				<tr><td><?php echo NO_RECORDS_FOUND;?></td></tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<ul class="pagination">
	<?php echo $pagelinks ?>
</ul>
