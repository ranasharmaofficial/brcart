<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Req Date</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Mobile No.</th>
				<th>State</th>
				<th>City</th>
				<th>Status</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllTeacherRequest) && count($getAllTeacherRequest) > 0){
				foreach($getAllTeacherRequest as $val) {
				?>
				<tr>
					<td><?php echo $val['created_at']; ?></td>
					<td><?php echo $val['first_name']; ?></td>
					<td><?php echo $val['last_name']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['mobile_no']; ?></td>
					<td><?php echo $val['state_name']; ?></td>
					<td><?php echo $val['city_name']; ?></td>
					<td><?php echo getRecordStatus($val['status']); ?></td>
					<td>
					<?php
					if($val['status']==1) {
						?>
						<a href="<?php echo WEB_URL . 'teacherrequest/edit?id=' . encrypt_url($val['id_teacher_reg']); ?>"
						   class="btn btn-success btn-sm">Edit</a>
						<?php
					}else{
						echo "--";
					}
						?>
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
