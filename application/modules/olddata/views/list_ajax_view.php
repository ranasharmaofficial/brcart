<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile No</th>
				<th>Message</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllOlddata) && count($getAllOlddata) > 0){
				foreach($getAllOlddata as $val) {
				?>
				<tr>
					<td><?php echo $val['name']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['mobile']; ?></td>
					<td><?php echo $val['message']; ?></td>
					<td><?php echo $val['date']; ?></td>
					<td>
					<a href="tel:<?php echo $val['mobile']; ?>" class="btn btn-info btn-sm">Call</a>
					<button class='btn btn-danger btn-sm delete-btn' data-id='<?php echo $val["id"]; ?>'>Delete</button>
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
