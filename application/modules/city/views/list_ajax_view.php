<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-bordered table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>State</th>
				<th>City</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllCity) && count($getAllCity) > 0){
				foreach($getAllCity as $val) {
				?>
				<tr>
					<td><?php echo $val['state_name']; ?></td>
					<td><?php echo $val['city_name']; ?></td>
					<td><a href="<?php echo WEB_URL.'city/edit?id='.$val['city_id'];?>" class="btn btn-success btn-sm">Edit</a></td>
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
