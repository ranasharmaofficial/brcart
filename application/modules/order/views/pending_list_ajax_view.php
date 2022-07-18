<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Order No</th>
				<th>User</th>
				<th>Order Date</th>
				<th>Product Details</th>
				<th>Order Amount</th>
				<th style="width:100px;">Action</th>
				<th style="width:100px;">Status</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(is_array($getAllPendingOrder) && count($getAllPendingOrder) > 0){
				foreach($getAllPendingOrder as $val) {
				?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?php echo $val['order_no']; ?></td>
					<td>
					<p><b>Name:&nbsp;</b><?php echo $val['first_name'].' '.$val['last_name']; ?></p>
					<p><b>Mobile:&nbsp;</b><?php echo $val['mobile_no']; ?></p>
					</td>
					<td><?php echo $val['order_date']; ?></td>
					<td>
					<p><b>Product:&nbsp;</b><?php echo $val['product_name']; ?></p>
					<p><b>Price:&nbsp;</b>Rs&nbsp;<?php echo getNumberFormat($val['product_price']); ?></p>
					<p><b>Qty:&nbsp;</b><?php echo $val['qty']; ?></p>
					</td>
					<td>Rs&nbsp;<?php echo getNumberFormat($val['total_price']); ?></td>
					<td>
					<a target="_blank" href="<?php echo WEB_URL .'order/orderdetails/' ?><?php echo encrypt_url($val['id']); ?>"><button type="submit" class="btn btn-danger btn-sm">Order&nbsp;Details</button></a></td>
					<td>
							<div class="input-group-prepend">
							<?php if($val['deliverystatus']=='1') { ?>
								<button onclick="window.location.href='<?php echo WEB_URL.'order/updatePendingStatus?id='.$val['order_id']; ?>'" type="button" class="btn btn-danger btn-sm">
									Accept&nbsp;Order
								</button>&nbsp;
								<button onclick="window.location.href='<?php echo WEB_URL.'order/updateDeclineStatus?id='.$val['order_id']; ?>'" style="background-color:#FFC733;" onclick="window.location.href='<?php echo WEB_URL.'seller/updatePendingStatus?id='.$val['order_id']; ?>'" type="button" class="btn btn-sm">
									Decline&nbsp;Order
								</button>
				<?php } else if($val['deliverystatus']=='2') { ?>
				<button type="button" class="btn btn-success dropdown-toggle btn-sm">
									Order&nbsp;Approved
								</button>
				<?php }  ?>
							
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
			base_url = base_url+"categories/delete/"+id;
			
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