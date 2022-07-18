
<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Sl</th>
				<th>Name</th>
				 
				<th>Gender</th>
				<th>Date of Birth</th>
				 
				<th>Date</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$s=1;
			if(is_array($getAllApplicationList) && count($getAllApplicationList) > 0){
				foreach($getAllApplicationList as $val) {
				?>
				<tr id="<?= $val['id']; ?>">
					<td><?= $s; ?></td>
					<td><?= $val['name']; ?></td>
					 
					<td><?= $val['gender']; ?></td>
					<td><?= $val['dob']; ?></td>
					
					<td><?= $val['created_at']; ?></td>
					<td>
					<?php if($val['payment_status']=='1') { ?>
						<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" value="pay_online" name="pay_online">
						<script src="https://checkout.razorpay.com/v1/checkout.js"
							data-key="rzp_test_4ThugwziGyAF6F"
							data-amount="<?= $val['amount']; ?>00"
							data-buttontext="Pay Now" data-name="Sharma Telecom"
							data-description="Pay Registration Fee"
							data-image=""
							data-prefill.name="<?= $this->distributorName; ?>"
							data-prefill.contact="8825171386"
							data-prefill.email="cgcgfc@gmail.com"
							data-theme.color="#251564">
							</script>
						</form>
					<?php } else if($val['payment_status']=='2') { ?>
					In Process
					<?php } else if($val['payment_status']=='3') { ?>
					Paid &nbsp; Download
					<?php } ?>
					</td>
					
					
					
					</td>
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