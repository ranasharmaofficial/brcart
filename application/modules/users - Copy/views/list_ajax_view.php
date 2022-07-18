<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Time</th>
				<th>User Catgeory</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile No</th>
				<th>Message</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllUser) && count($getAllUser) > 0){
				foreach($getAllUser as $val) {
				?>
				<tr>
					<td><?php echo $val['created_at']; ?></td>
					<td><?php  if($val['user_category']=='1') { ?>
					Owner
					<?php } else if($val['user_category']=='2') { ?>
					Agent
					<?php } else if($val['user_category']=='3') { ?>
					Builder
					<?php } else if($val['user_category']=='4') { ?>
					Guest
					<?php } ?>
					</td>
					<td><?php echo $val['name']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['mobile']; ?></td>
					<td><?php echo $val['date']; ?></td>
					<td>
					<a href="tel:<?php echo $val['mobile']; ?>" class="btn btn-info btn-sm">Call</a>
					<button class='btn btn-danger btn-sm delete-btn' data-id='<?php echo $val["id_user"]; ?>'>Delete</button>
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
