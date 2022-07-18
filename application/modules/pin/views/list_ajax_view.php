<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Pin</th>
				<th>Place</th>
				<th>State</th>
				<th>Cod Limit</th>
				<th>Cod</th>
				<th>Add&nbsp;Charges</th>
				<th style="width:100px;">Option</th>
			</tr>
			</thead>
			<tbody>
			<?php
			function show_charges($pin)
 {
	 
	include('./db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM pin_charge where pin='$pin'";
 

echo ' <table class="table-sm">
 <tr>
		<th class="text-danger">On&nbsp;Amount</th>
		<th  class="text-danger">Delivery&nbsp;Charges</th>
		<th  class="text-danger">Action</th>
 </tr>'; 
 
$result = $conn->query($sql);

if ($result->num_rows >0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
 
 ?>
 

  <tr id="<?php echo $row['id']; ?>">
		<td>₹&nbsp;<?php echo $row['order_amount']; ?></td>
		<td>₹&nbsp;<?php echo $row['delivery_amount']; ?></td>
		<td>
			<p style="cursor:pointer;" class="text-danger">
			<i class="fa fa-trash removecharge text-danger">&nbsp;</i>
			<?php if(false) { ?>
	<i data-toggle="modal" data-target="#update_modal<?php echo $row['id']?>" class="far fa-edit"></i>
	<?php } ?>
			</p>
		</td>
 </tr>

 <div class="modal fade" id="update_modal<?php echo $row['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="<?php echo WEB_URL.'pin/all/updatepincharge'?>" enctype="multipart/form-data">
				<div style="background-color:orange;color:#fff;font-weight:bold;border:4px solid skyblue;" class="modal-header">
					<h5 class="modal-title">Update Charge</h5>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<div class="form-group">
							<label>Order Amount</label>
							<input required type="text" value="<?php echo $row['order_amount']; ?>" name="order_amount" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Delivery Amount</label>
							<input required type="text" value="<?php echo $row['delivery_amount']; ?>" name="delivery_amount" class="form-control"/>
						</div>
						 
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="updatepincharge" type="submit" value="updatepincharge" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
 <?php
 
    
    }
} 
$conn->close();


echo '</table>';
	 
}
			$s=1;
			if(is_array($getAllPin) && count($getAllPin) > 0){
				foreach($getAllPin as $val) {
				?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?php echo $val['pin']; ?></td>
					<td><?php echo $val['place']; ?></td>
					<td><?php echo $val['state']; ?></td>
					<td>Rs&nbsp;<?php echo $val['cod_limit']; ?></td>
					<td><?php echo $val['cod']; ?></td>
					<td>
						<form method="post" action="" enctype="multipart/form-data">
						<input  type="hidden" value="<?php  echo $val['pin']; ?>" name="pin">
						<input  type="hidden" value="<?php  echo $s; ?>" name="id">
						 
						<input style="width:150px;" placeholder="Order Amount" type="number" value="" name="order_amount">
						<input style="width:150px;"  placeholder="Delivery Charge" type="number" value="" name="delivery_amount">
						<button type="submit" class="btn btn-sm rounded bg-primary" value="save" name="save">SAVE</button>
						
						</form>
						<hr>
						<?php echo show_charges($val['pin']); ?>
					</td>
					<td><a href="<?php echo WEB_URL.'pin/edit?id='.$val['id'];?>" class="btn btn-success btn-sm"><i class="far fa-edit"></i>&nbsp;Edit</a><hr>
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
			base_url = base_url+"pin/delete/"+id;
			
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

<script type="text/javascript">
    $(".removecharge").click(function(){
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
			base_url = base_url+"pin/deletecharge/"+id;
			
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