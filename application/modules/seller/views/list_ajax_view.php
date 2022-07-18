<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Admin Commission</th>
				<th>Seller Pay. Amount</th>
				
				<th>Product Stock</th>
				<th>Picture</th>
				<th>Status</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllSellerProduct) && count($getAllSellerProduct) > 0){
				foreach($getAllSellerProduct as $val) {
				?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?php echo $val['product_name']; ?></td>
					<td>Rs&nbsp;<?php echo getNumberFormat($val['seller_product_price']); ?></td>
					<td>Rs&nbsp;<?php echo getNumberFormat($val['admin_commission_amount']); ?></td>
					<td>Rs&nbsp;<?php echo getNumberFormat($val['seller_payable_amount']); ?></td>
					<td><?php echo $val['seller_product_stock']; ?></td>
					<td><img style="height:80px;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['product_photo']; ?>" class="img-thumbnail"/></td>
					<td>
						<div class="input-group-prepend">
						<?php if($val['product_status']=='2') { ?>
							<span class="btn btn-success dropdown-toggle" data-toggle="dropdown">
								Activated
							</span>
						<?php } else { ?>
							<span class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
								Deactivated
							</span>
						<?php } ?>
							<ul class="dropdown-menu">
								<li class="dropdown-item"><a class="update" style="color:#5D6D7E;" href="<?php echo WEB_URL.'seller/updateStatusactive?id='.$val['id']; ?>">Activated</a></li>
								<li class="dropdown-item"><a class="update" style="color:#5D6D7E;" href="<?php echo WEB_URL.'seller/updateStatusdeactive?id='.$val['id']; ?>">Deactivated</a></li>
							</ul>
						</div>
					</td>
					<td>
						<div class="input-group-prepend">
							<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
								Action
							</button>
							<ul class="dropdown-menu">
								<li class="dropdown-item"><a style="color:#555;" href="<?php echo WEB_URL.'seller/edit?pid='.$val['pid'];?>"><i class="fas fa-edit"></i>&nbsp;Edit</a></li>
								<li class="dropdown-item"><a style="color:#555;" class="remove"><i class="fas fa-trash"></i>&nbsp;Remove</a></li>
							</ul>
						</div>
					</td>
					
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
			base_url = base_url+"seller/delete/"+id;
			
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
	
	
	$(".update").click(function(){
        var id = $(this).parents("tr").attr("id");
		var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"seller/activeProduct/"+id;
			
		 $.ajax({
             url: base_url,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).update();
                  // swal("Activated!", "Your product has been activated.", "success");
                  alert('Activated');
             }
          });
        
     
    });
	
	
	
	/*$(".update").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Yes, Activate it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"seller/activeProduct/"+id;
			
		if (isConfirm) {
          $.ajax({
             url: base_url,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).update();
                  swal("Activated!", "Your product has been activated.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your product will not show to user:)", "error");
        }
      });
     
    });*/
    
</script>