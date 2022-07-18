<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Price</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllProduct) && count($getAllProduct) > 0){
				foreach($getAllProduct as $val) {
					?>
					<tr>
						<td>
							<span><?php echo $val['name']; ?></span></br>
							ID:&nbsp;<?php echo $val['id']; ?>&nbsp;&nbsp;SKU:<?php echo $val['sku']; ?>
						</td>
						<td><?php echo $val['type']; ?></td>
						<td>Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></td>
						<td>
							<div class="input-group-prepend">
								<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
									Activated
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="#">Activated</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="#">Deactivated</a></li>
								</ul>
							</div>
						</td>
						<td>
							<div class="input-group-prepend">
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
									Action
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/edit?id='.$val['id'];?>"><i class="fas fa-edit"></i>&nbsp;Edit</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'post/'.$val['slug'];?>"><i class="fas fa-eye"></i>&nbsp;View Details</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/galleryview?pid='.$val['id'];?>"><i class="fas fa-eye"></i>&nbsp;View Gallery</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/addsize?pid='.$val['id'];?>"><i class="fas fa-plus"></i>&nbsp;Add Size Qty</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'post/'.$val['slug'];?>"><i class="fas fa-trash"></i>&nbsp;Delete</a></li>
								</ul>
							</div>
						</td>
					</tr>
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
