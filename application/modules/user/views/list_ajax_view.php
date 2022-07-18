<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Time</th>
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
					<td><?php echo $val['first_name'].' ', $val['last_name']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['mobile_no']; ?></td>
					<td><?php echo $val['created_at']; ?></td>
					<td>
					<button onclick="window.location.href='<?php echo WEB_URL.'user/details'?>?id=<?php echo $val['id_user']; ?>'" class='btn btn-info btn-sm'>View&nbsp;Details</button>
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
