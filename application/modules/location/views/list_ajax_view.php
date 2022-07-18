<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-bordered table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Country</th>
				<th>State</th>
				<th>City</th>
				<th>Location</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllLocation) && count($getAllLocation) > 0){
				foreach($getAllLocation as $val) {
				?>
				<tr>
					<td><?php echo $val['country_name']; ?></td>
					<td><?php echo $val['state_name']; ?></td>
					<td><?php echo $val['city_name']; ?></td>
					<td><?php echo $val['location_name']; ?></td>
					<td><a href="<?php echo WEB_URL.'location/edit?id='.$val['location_id'];?>" class="btn btn-success btn-sm">Edit</a></td>
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
