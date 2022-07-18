<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Url</th>
				<th>Title</th>
				<th>Picture</th>

				<th colspan="2" style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllNews) && count($getAllNews) > 0){
				foreach($getAllNews as $val) {
					?>
					<tr>
						<td><?php echo $val['url_slug']; ?></td>
						<td><?php echo $val['title']; ?></td>
						<td><img class="img-thumbnail" src="<?php echo $val['file_path']; ?>" /></td>

						<td>
						<a href="<?php echo WEB_URL.'news/edit?id='.$val['id'];?>" class="btn btn-success btn-sm">Edit</a>
						<hr>
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
