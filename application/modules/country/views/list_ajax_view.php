<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllCountry) && count($getAllCountry) > 0){
				foreach($getAllCountry as $val) {
				?>
				<tr>
					<td><?php echo $val['name']; ?></td>
					<td><a href="<?php echo WEB_URL.'country/edit?id='.$val['id'];?>" class="btn btn-success btn-sm">Edit</a></td>
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
