<?php
			if(is_array($getAllorder) && count($getAllorder) > 0){
				foreach($getAllorder as $val) {
				?>
				
				<div onclick="window.location.href='./product-details.php?id=<?php// echo $row['pid']; ?>'" class="row shadow-sm p-1 mb-1 bg-white">						
			<div class="col-4 text-center">
			<img onclick="window.location.href='./product-details.php?id=<?php// echo $row['pid']; ?>" class="img-thumbnail" id="product_pic" style="border:none;height:auto;width:100%;" src="./images/loader.svg" data-src="<?php //echo $pic; ?>">
			</div>
			
			<div onclick="window.location.href='window.location.href='./product-details.php?id=<?php echo $val['order_no']; ?>'" style="float:left;" class="col-8">
				<h4 class="font-weight-bold p-1"><?php// echo $product; ?>Product Name</h4>
			
			

			 
			
			
				<?php //if($row['orderstatus']=='PENDING') {  ?>
				<h5 style="line-height:1.8;" class="font-weight-bold text-danger">Order Status : Pending !</h5>
				<?php// } else if($row['orderstatus']=='SEEN') { ?>
				<h5  style="line-height:1.8;"  class="font-weight-bold text-success">Order Status : Confirmed !</h5>				
				<?php //} else if($row['orderstatus']=='INTRANSIT') { ?>
				<h5  style="line-height:1.8;"  class="font-weight-bold  text-success">Order Status : In Transit (Delivery Boy Picked Up Your Product)</h5>				
				<?php //}  else if($row['orderstatus']=='VERIFIED') { ?>
				<h5  style="line-height:1.8;"  class="font-weight-bold  text-success">Order Status : Successfully Delivered!</h5>				
				<?php// }  ?>
				
				 
				<h5  style="line-height:1.8;" >Order Date : <?php// echo $row['date']; ?></h5>
			
			 
				
				 
			
			
			
			</div>
			<!-- 
			<div style="float:right;" class="col-12">
			<a href="./myorders.php?del=<?php //echo $row['id']; ?>"><button style="float:right;" type="submit" class="btn btn-primary">REMOVE</button></a></br>
			</div>
			-->
		</div>
		
		<?php
				}
			}else {
				?>
				<tr><td><?php echo NO_RECORDS_FOUND;?></td></tr>
				<?php
			}
			?>