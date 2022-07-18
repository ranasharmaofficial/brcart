<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-sm table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Email</th>
				<th>IP&nbsp;Address</th>
				<th>Time</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllEmails) && count($getAllEmails) > 0){
				foreach($getAllEmails as $val) {
				?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?php echo $val['email']; ?></td>
					<td><?php echo $val['ip_address']; ?></td>
					<td><?php echo $val['created_at']; ?></td>
					<td>
					<button type="submit" class="btn remove btn-danger btn-sm">Remove</button>
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

<script type="text/javascript">
    $(".remove").click(function(){
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
			base_url = base_url+"emailsubscribe/delete/"+id;
			
		if (isConfirm) {
          $.ajax({
             url: base_url,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
     
    });
    
</script>