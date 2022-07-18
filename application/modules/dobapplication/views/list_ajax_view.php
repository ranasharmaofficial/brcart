<div class="table-responsive">
    <div style="min-height: 250px;">
        <table class="table table-hover table-bordered table-sm" width="100%" cellspacing="0">
            <thead class="thead-light">
                <tr>
				<th>Sl</th>
				<th>Type</th>
				<th>Name</th>
				 
				<th>Gender</th>
				<th>Date of Birth</th>
				 
				<th>Date</th>
				<th>Action</th>
				<th>Remove</th>
			</tr>
            </thead>
            <tbody>
                <?php
				$s=1;
			if(is_array($getAllDobApplication) && count($getAllDobApplication) > 0){
				foreach($getAllDobApplication as $val) {
				?>
                <tr id="<?php echo $val['id']; ?>">
					<td><?= $s; ?></td>
					<td><?php if($val['type']=='1') { echo '<span style="color:blue;">DOB CERTIFICATE</span>'; } else {  echo '<span style="color:red;">DEATH CERTIFICATE</span>'; } ?></td>
					<td><?= $val['name']; ?></td>
					 
					<td><?= $val['gender']; ?></td>
					<td><?= $val['dob']; ?></td>
					
					<td><?= $val['created_at']; ?></td>
					<td>
					<?php if($val['payment_status']=='1') { ?>
						<button class="btn btn-danger btn-sm">Payment&nbsp;Due</button>
						<hr>
						<a href="<?php echo WEB_URL.'dobapplication/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					<?php } else if($val['payment_status']=='2') { ?>
					<button class="btn btn-success btn-sm">In&nbsp;Process</button><hr>
					<a href="<?php echo WEB_URL.'dobapplication/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					
					<?php } else if($val['payment_status']=='3') { ?>
					Paid &nbsp; Download<hr>
					<a href="<?php echo WEB_URL.'dobapplication/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					<?php } ?>
					</td>
					<td><button type="submit" class="btn remove btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
					
					
					 
				</tr>
                <?php
				$s=$s+1;
				}
			}else {
				?>
                <tr>
                    <td><?php echo NO_RECORDS_FOUND;?></td>
                </tr>
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
<script type="text/javascript">
$(".remove").click(function() {
    var id = $(this).parents("tr").attr("id");

    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            var base_url = $('meta[name="weburl"]').attr('content');
            base_url = base_url + "dobapplication/delete/" + id;

            if (isConfirm) {
                $.ajax({
                    url: base_url,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });

});
</script>