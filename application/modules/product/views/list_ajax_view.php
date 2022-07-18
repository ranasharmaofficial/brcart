<style>
hr
{
	margin:2px;
}
</style>
<div class="table-responsive">
	<div  style="min-height: 250px;">
		<table class="table table-hover table-bordered table-sm"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Picture</th>
				<th>Name</th>
				<th>Type</th>
				<th>Price</th>
				<th>Daily Deals status</th>
				<th>Status</th>
				<th>Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllProduct) && count($getAllProduct) > 0){
				foreach($getAllProduct as $val) {
					?>
					<tr id="<?php echo $val['id']; ?>">
						<td>
							<img style="height:100px;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" class="img-thumbnail">
						</td>
						<td>
							<span><?php echo $val['name']; ?></span></br>
							ID:&nbsp;<?php echo $val['id']; ?>&nbsp;&nbsp;SKU:<?php echo $val['sku']; ?>
						</td>
						<td><?php echo $val['type']; ?></td>
						<td>Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></td>
						<td>
						  
								<div class="input-group-prepend">
								<?php if($val['hot']=='0') { ?>
									<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown">
										Hot Off
									</button>
					<?php } else { ?>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">
										Hot On
									</button>
					<?php }  ?>
									<ul class="dropdown-menu">
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/hoton?id='.$val['id']; ?>">On</a></li>
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/hotoff?id='.$val['id']; ?>">Off</a></li>
									</ul>
								</div>
							 <hr>
							 <div class="input-group-prepend">
								<?php if($val['sale']=='0') { ?>
									<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown">
										Sale Off
									</button>
					<?php } else { ?>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">
										Sale On
									</button>
					<?php }  ?>
									<ul class="dropdown-menu">
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/saleon?id='.$val['id']; ?>">On</a></li>
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/saleoff?id='.$val['id']; ?>">Off</a></li>
									</ul>
								</div>
							 <hr>
							 <div class="input-group-prepend">
								<?php if($val['trending']=='0') { ?>
									<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown">
										Trending Off
									</button>
					<?php } else { ?>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">
										Trending On
									</button>
					<?php }  ?>
									<ul class="dropdown-menu">
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/trendingon?id='.$val['id']; ?>">On</a></li>
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/trendingoff?id='.$val['id']; ?>">Off</a></li>
									</ul>
								</div>
							 <hr>
								<div class="input-group-prepend">
								<?php if($val['dailydeals']=='0') { ?>
									<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown">
										Daily Deals Off
									</button>
					<?php } else { ?>
					<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">
										Daily Deals On
									</button>
					<?php }  ?>
									<ul class="dropdown-menu">
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/dailydealson?id='.$val['id']; ?>">On</a></li>
										<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/dailydealsoff?id='.$val['id']; ?>">Off</a></li>
									</ul>
								</div>
							 
							
						</td>
						<td>
							<div class="input-group-prepend">
							<?php if($val['status']=='1') { ?>
								<button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown">
									Inactive
								</button>
				<?php } else { ?>
				<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">
									Activated
								</button>
				<?php }  ?>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/updateStatusactive?id='.$val['id']; ?>">Activated</a></li>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/updateStatusdeactive?id='.$val['id']; ?>">Deactivated</a></li>
								</ul>
							</div>
						</td>
						<td>
							<div class="input-group-prepend">
								<button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
									Action
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'editpost/'.$val['slug'];?>"><i class="fas fa-edit"></i>&nbsp;Edit</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'post/'.$val['slug'];?>"><i class="fas fa-eye"></i>&nbsp;View Details</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/galleryview?pid='.$val['id'];?>"><i class="fas fa-eye"></i>&nbsp;View Gallery</a></li><hr>
									<li class="dropdown-item"><a style="color:#5D6D7E;" href="<?php echo WEB_URL.'product/addsize?pid='.$val['id'];?>"><i class="fas fa-plus"></i>&nbsp;Add Size Qty</a></li><hr>
									<li style="color:#5D6D7E;cursor:pointer;" class="dropdown-item"><button type="submit" class="btn remove btn-danger btn-sm">Remove</button></td></li> 
								</ul>
							</div>
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
			base_url = base_url+"product/delete/"+id;
			
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