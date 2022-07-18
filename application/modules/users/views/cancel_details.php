<style>
star{
	color:red;
	font-weight: bold;
}
.error_prefix
{
	color:red;
}
.pagination {
	float:right;
}
.pagination li a {
	padding: 6px 16px;
	border:1px solid #007bff;
	border-radius:3px;
	margin:2px;
}
.pagination li a:hover{
	text-decoration:none;
	background-color:#007bff;
	border-radius:3px;
	color:#fff;
}

.pagination li a.current_page{
	background-color:#007bff;
	color:#fff;
	padding: 6px 16px;
	border-radius:3px
	margin:2px;
	
}
</style>

  <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Cancel Order</h1>
                </div>
            </div>
            <!-- End of Page Header -->

 <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg p-2">
					 
                    <?php include('profile_left.php'); ?>    

                        <div class="tab-content mb-6">
                            <div class="tab-pane active" id="account-dashboard">
                                
                                <div class="container p-3">	
<center>
			<div style="width:100%;font-size:15px;background-color:teal;" class="btn text-center text-white p-2">Request to Cancel Your Order</div>
		</center>
		<hr>
			<div style="line-height:1.8;border-left:10px solid #FCD200;border-right:2px solid #FCD200;border-top:2px solid #FCD200;border-bottom:2px solid #FCD200;" class="card p-2">	
		 		<div class="row">						
					<div class="col-12">
					<span style="color:black;">
						Cancelling items in this order may cause you to lose promotional offers and/or cashbacks on undispatched items in this and/or other orders. Additionally, if discounted items have already been dispatched you may not be able to cancel some of the items in this order.
					</span>
					</div>
				</div>
			</div>
			<form class="mt-5" method="post" action="">
	<div style="line-height:1.8;" class="card p-3">	
	 
 	<div style="line-height:1.8;border:2px solid teal;" class="mt-2 mb-2 card p-2">	
		 		<div class="row">						
					<div class="col-12">
					<label class="font-weight-bold">Cancellation reason</label>
					<select required name="cancel_reason" class="form-control" style="color:black;font-size:1.5rem;">
						<option>---Select Cancellation Reason---</option>
						<option>Order Created by Mistake</option>
						<option>Item(s) Would Not Arrive on Time</option>
						<option>Shipping Cost Too High</option>
						<option>Item price too high</option>
						<option>Found Cheaper Somewhere Else</option>
						<option>Need to Change Shipping Address</option>
						<option>Need to Change Billing Address</option>
						<option>Need to Change Payment Method</option>
						<option>Other</option>
					</select>
					</div>
				</div>
			</div>
			<input type="hidden" required name="cancelid" value="<?php echo $cancelOrderDetails['id']; ?>">
			
			<button style="width:100%;font-size:15px;"  type="submit" name="requestCancel" value="requestCancel" class="btn btn-warning text-center text-black mt-3 p-2">Cancel items</button>
	</div>
</form>
 </div> 

			 
		 
	 </div>		 
		  
                                 
	 
                            </div>

                            

                             
                        </div>
                    </div>
                </div>
             
        </main>
        <!-- End of Main -->
		  
 
