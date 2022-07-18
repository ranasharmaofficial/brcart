<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Short Tile</th>
				<th>Long Tile</th>
				<th>Discount</th>
				<th>Link</th>
				<th>Text-color</th>
				<th>Slider Picture</th>
				<th>Action</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllSlider) && count($getAllSlider) > 0){
				foreach($getAllSlider as $val) {
				?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?php echo $val['short_title']; ?></td>
					<td><?php echo $val['long_title']; ?></td>
					<td><?php echo $val['sale_discount']; ?></td>
					<td><?php echo $val['link']; ?></td>
					<td><div style="height:20px;width:20px;background-color:<?php echo $val['text_color']; ?>;"></div></td>
					<td><img style="height:80px;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['slider_pic']; ?>" class="img-thumbnail"/></td>
					<td>
							<div class="input-group-prepend">
							<?php if($val['status']=='1') { ?>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
									Inactive
								</button>
				<?php } else { ?>
				<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
									Activated
								</button>
				<?php }  ?>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'slider/updateStatusactive?id='.$val['id']; ?>">Activated</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'slider/updateStatusdeactive?id='.$val['id']; ?>">Deactivated</a></li>
								</ul>
							</div>
						</td>
					<td><a href="<?php echo WEB_URL.'slider/edit?id='.$val['id'];?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i>&nbsp;Edit</a><hr>
					<button type="submit" class="btn remove btn-danger btn-sm">Remove</button></td>
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
			base_url = base_url+"slider/delete/"+id;
			
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