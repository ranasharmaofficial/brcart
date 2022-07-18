<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered table-striped"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Sl.</th>
				<th>Name</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$s=1;
			if(is_array($getAllState) && count($getAllState) > 0){
				foreach($getAllState as $val) {
					
				?>
				<tr id="<?php echo $val['state_id']; ?>">
					<td><?php echo $s; ?></td>
					<td><?php echo $val['state_name']; ?></td>
					
					<td><a href="<?php echo WEB_URL.'state/edit?id='.$val['state_id'];?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i>&nbsp;Edit</a><hr>
					<button type="submit" class="btn remove btn-danger btn-sm">Remove</button></td>
				</tr>
			<?php
			$s=$s+1;
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
			base_url = base_url+"state/delete/"+id;
			
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