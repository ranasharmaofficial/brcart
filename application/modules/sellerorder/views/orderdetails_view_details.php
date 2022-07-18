<style>
@media only screen and (max-width: 600px) {
	
	#img{
		margin-top:-30px;
	}
	
	
}

 ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    font-size:9px;
    line-height: 3.5em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 100%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 25%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid #278b5b;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: #278b5b;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}

ol.progtrckrcan {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckrcan li {
    display: inline-block;
    text-align: center;
    font-size:12px;
    line-height: 3.5em;
}

ol.progtrckrcan[data-progtrckrcan-steps="2"] li { width: 100%; }
ol.progtrckrcan[data-progtrckrcan-steps="3"] li { width: 33%; }
ol.progtrckrcan[data-progtrckrcan-steps="4"] li { width: 24%; }
ol.progtrckrcan[data-progtrckrcan-steps="5"] li { width: 25%; }
ol.progtrckrcan[data-progtrckrcan-steps="6"] li { width: 16%; }
ol.progtrckrcan[data-progtrckrcan-steps="7"] li { width: 14%; }
ol.progtrckrcan[data-progtrckrcan-steps="8"] li { width: 12%; }
ol.progtrckrcan[data-progtrckrcan-steps="9"] li { width: 11%; }

ol.progtrckrcan li.progtrckrcan-done {
    color: black;
    border-bottom: 4px solid #e21837;
}
ol.progtrckrcan li.progtrckrcan-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckrcan li:after {
    content: "\00a0\00a0";
}
ol.progtrckrcan li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 90%;
    line-height: 1em;
}
ol.progtrckrcan li.progtrckrcan-done:before {
    content: "\2573";
    color: white;
    background-color: #e21837;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2.2em;
}
ol.progtrckrcan li.progtrckrcan-todo:before {
    content: "\2573";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}
   
   </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage <?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">
		
      <!-- card start -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h3>

          <?php if(false) { ?><div class="card-tools">
           <a href="<?php echo WEB_URL.'categories/add';?>" class="btn btn-sm btn-danger">Add Category</a>
          </div><?php } ?>
        </div>
		<div class="card-body">
					<?php $this->load->view('adminlayout/message_view');?>
					 <div class="container p-3">	
<center>
			<div style="width:100%;font-size:15px;" class="btn btn-warning text-center text-black p-2">Order Details</div>
		</center>
		<hr>
		
	<div style="line-height:1.8;" class="card p-3">	
	<?php if($OrderDetails['delivery_status']!='5') { ?>
	<?php if($OrderDetails['delivery_status']!='6') { ?>									    
									    
									    
<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Order Placed</li><!--
	--><li class="progtrckr-<?php if($OrderDetails['delivery_status']=='2' OR $OrderDetails['delivery_status']=='3' OR $OrderDetails['delivery_status']=='4' ) { echo 'done'; } else {echo 'todo';}?>">Approved</li><!--
 --><li class="progtrckr-<?php if($OrderDetails['delivery_status']=='3' OR $OrderDetails['delivery_status']=='4') { echo 'done'; }else{echo 'todo';}?>">Shipped</li><!--
 --><li class="progtrckr-<?php if($OrderDetails['delivery_status']=='4') { echo 'done'; }else{echo 'todo';}?>">Delivered</li>
</ol>


<?php } else {  ?>
<ol class="progtrckrcan" data-progtrckrcan-steps="2">
    <li class="progtrckrcan-done"><div style="float: left; display: inline-block;font-size: 14px;">Order Cancelled</div></li>
</ol>



<?php } ?>
<?php } ?>
<hr>
		 		<div class="row">						
					<div class="col-5">
					<span class="span_orderdetails">Order date :</span>
					</div>
					<div class="col-7">
					<span class="span_orderdetails" style="float:left;"><?php echo $OrderDetails['order_time']; ?></span>
					</div>
				</div>
				
				<div class="row">						
					<div class="col-5">
					<span class="span_orderdetails">Order Id # :</span>
					</div>
					<div class="col-7">
					<span class="span_orderdetails" style="float:left;">#<?php echo $OrderDetails['order_no']; ?></span>
					</div>
				</div>
				<div class="row">						
					<div class="col-5">
					<span class="span_orderdetails">Item :</span>
					</div>
					<div class="col-7">
					<span class="span_orderdetails" style="float:left;"><?php echo $OrderDetails['total_item']; ?>&nbsp;item[s]</span>
					</div>
				</div>
				
				<div class="row">						
					<div class="col-5">
					<span class="span_orderdetails">Order Total :</span>
					</div>
					<div style="float:left;" class="col-5">
					<span class="span_orderdetails" style="float:left;"> Rs <?php echo $OrderDetails['total_payment']; ?></span>
					</div>
				</div>
				
				<div class="row">						
					<div class="col-5">
					<span class="span_orderdetails">Order Status :</span>
					</div>
					<div style="float:left;" class="col-5">
					<span class="span_orderdetails" style="float:left;"><?php if($OrderDetails['delivery_status']=='1') { ?>
							
							<span style="background-color:red;color:#fff;font-weight:bold;" class="badge badge-danger p-2">Order Placed</span>
							
							
							<?php } else if ($OrderDetails['delivery_status']=='2') { ?>
							<span style="background-color:orange;color:#fff;font-weight:bold;" class="badge badge-warning p-2">Order Approved</span>
							
							<?php } else if ($OrderDetails['delivery_status']=='3') { ?>
							<span style="background-color:;color:#fff;font-weight:bold;" class="badge badge-primary p-2">Order Shipped</span>
								<?php } else if ($OrderDetails['delivery_status']=='4') { ?>
							<span style="background-color:;color:#fff;font-weight:bold;" class="badge badge-success p-2">Order Delivered</span>
							<?php } else if ($OrderDetails['delivery_status']=='6') { ?>
							<span style="background-color:;color:#fff;font-weight:bold;" class="badge badge-danger p-2">CANCELLED</span>
							<?php } else if ($OrderDetails['delivery_status']=='5') { ?>
							<span style="background-color:;color:#fff;font-weight:bold;" class="badge badge-danger p-2">Cancellation Request Pending</span>
							<?php } ?></span>
					</div>
				</div>
	<hr>
	
				<div style="cursor:pointer;" class="row">						
					<div class="col-12">
					<span class="span_orderdetails">View Invoice&nbsp;<i style="float:right;color:black;font-weight:bold;" class="fa fa-angle-right"></i></span>
					</div>
					 
				</div>
				<?php if ($OrderDetails['delivery_status']=='1' || $OrderDetails['delivery_status']=='2' || $OrderDetails['delivery_status']=='3') { ?>
				<hr>
				
				<div onclick="window.location.href='<?php echo WEB_URL .'users/cancelorder/' ?><?php echo encrypt_url($OrderDetails['id']); ?>'" style="cursor:pointer;" class="row">						
					<div class="col-12">
					<span class="span_orderdetails">Cancel Order&nbsp;<i style="float:right;color:black;font-weight:bold;" class="fa fa-angle-right"></i></span>
					</div>
					 
				</div>
				<?php } ?> 
	
	
	
	</div>

 </div> 

			<div class="container p-3">	
	
<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;" class="font-weight-bold mt-2 mb-2">Payment Information</h5>
	<div class="card p-3">	
		<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;">Payment Method</h5> 
		 		<div class="row">						
					<div class="col-12">
					<?php if($OrderDetails['payment_mode']=='COD') { ?>
					<span style="font-size:15px;"class="text-success">Pay on delivery</span>
					<?php } ?>
					</div>
					 
				</div>
				<hr>
				 
		<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;">Billing Address</h5> 
		
				
	 
		<div class="row">						
			<div class="col-md-12">
				<span style="color:green" class="font-weight-bold span_orderdetails"><?php echo $OrderDetails['user_name']; ?></span></br>
					<span class="span_orderdetails">House No. - <?php echo $OrderDetails['house_no']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['address']; ?>, <?php echo $OrderDetails['landmark']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['city']; ?>, <?php echo $OrderDetails['state']; ?> - <?php echo $OrderDetails['pin']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['address_type']; ?></span>
											
			</div>
		</div>
		
		 
	</div>

 </div> 
   
	<div class="container p-3">	

	<div class="card p-3">
	<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;" class="font-weight-bold mt-2 mb-2">Shipping Address</h5>	
		<div class="row">						
			<div class="col-md-12">
				<span style="color:green" class="font-weight-bold span_orderdetails"><?php echo $OrderDetails['user_name']; ?></span></br>
					<span class="span_orderdetails">House No. - <?php echo $OrderDetails['house_no']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['address']; ?>, <?php echo $OrderDetails['landmark']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['city']; ?>, <?php echo $OrderDetails['state']; ?> - <?php echo $OrderDetails['pin']; ?></span></br>
					<span class="span_orderdetails"><?php echo $OrderDetails['address_type']; ?></span>
											
			</div>
		</div>
	</div>

 </div>	

<div class="container p-3">	
	
<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;" class="font-weight-bold mt-2 mb-2">Order Summary</h5>
	<div class="card p-3">	
				
	 <?php
	 $subTotal=0;
	 $totalItem=0;
				if(is_array($OrderProduct) && count($OrderProduct) > 0) {
					foreach ($OrderProduct as $val) {
						?>
						<div class="row">	
						
				<div style="float:right;" class="col-12">
				<span style="float:right;color:red;font-weight:bold;" class="span_orderdetails">
					<a href="<?php echo WEB_URL .'order/viewInvoice/' ?><?php echo encrypt_url($val['id']); ?>">View Invoice</a>
				</span>
				</div>
				<div class="col-4">
					<div class="content">
						<img style="height:120px;" class="img-thumbnail" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" alt="">
						
					</div>
				</div>
				<div class="col-8">
				<span class="text-secondary"><?php echo $val['product_name']; ?></span>
				<br>
				<span style="font-weight:700;">Sold By : <?php echo $val['shop_name']; ?></span>
				</div>
			
				<div class="col-8">
					<span style="color:black;">Qunatity :</span>
				</div>
				<div class="col-4">
					<span style="color:black;float:left;"><?php echo $val['qty']; ?></span>
				</div>
			 
				<div class="col-8">
					<span style="color:black;">Price :</span>
				</div>
				<div class="col-4">
					<span style="color:black;float:left;">Rs <?php echo $val['product_price']; ?></span>
				</div>
			 
				<div class="col-8">
					<span style="color:black;">Order Total :</span>
				</div>
				<div class="col-4">
					<span style="color:green;float:left;">Rs <?php echo $val['total_price']; ?></span>
				</div>
			</div>
		<hr>
					<?php
				$subTotal=$subTotal+$val['total_price'];
				$totalItem=$totalItem+1;
					}
				}	
					?>
		 
	</div>

 </div> 
 
 <div class="container p-3">	
	
<h5 style="font-family: Arial,sans-serif;font-weight: 700;
    font-size: 16px;
    line-height: 20px;" class="font-weight-bold mt-2 mb-2">Order Summary</h5>
	<div class="card p-3">	
		
				<div class="row">						
					<div class="col-8">
					<span class="span_orderdetails">Item[s] :</span>
					</div>
					<div class="col-4">
					<span class="span_orderdetails" style="float:left;"><?php echo $totalItem; ?></span>
					</div>
				</div>
				
				<div class="row">						
					<div class="col-8">
						<span style="color:black;">Delivery Charge :</span>
					</div>
					<div class="col-4">
						<span style="color:black;float:left;"><i class="fas fa-rupee-sign"></i>&nbsp; <?php echo $OrderDetails['delivery_charge']; ?></span>
					</div>
				</div>
				<div class="row">						
					<div class="col-8">
						<span style="color:black;">Sub Total :</span>
					</div>
					<div class="col-4">
						<span style="float:left;"><i class="fas fa-rupee-sign"></i>&nbsp; <?php echo $subTotal; ?></span>
					</div>
				</div>
				<div class="row">						
					<div class="col-8">
						<span style="color:black;">Save :</span>
					</div>
					<div class="col-4">
						<span style="float:left;">-<i class="fas fa-rupee-sign"></i>&nbsp; <?php echo $OrderDetails['save']; ?></span>
					</div>
				</div>
				<div class="row">						
					<div class="col-8">
						<span style="color:black;">Order Total :</span>
					</div>
					<div class="col-4">
						<span style="color:green;float:left;"><i class="fas fa-rupee-sign"></i>&nbsp; <?php echo $OrderDetails['total_payment']; ?></span>
					</div>
				</div>
	</div>

 </div> 
	
				</div>
			
      </div>
      <!-- /.card end -->
	  </div>
<div class="col-sm-1">
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   
<script>

		categoryList(page_url=false);

		$(document).on('click', "#searchBtn", function(event) {
			categoryList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			categoryList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click',".pagination li a", function(){
			var page_url = $(this).attr('href');
			categoryList(page_url);
			return false;
		});

		function categoryList(page_url)
		{
			var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"order/get_pending_ajax_list";
			var search_key = $('#search_key').val();
			var dataString = 'search_key='+search_key;
			if(page_url){
				base_url=page_url;
			}
			$.ajax({
				type:"POST",
				url:base_url,
				data: dataString,
				success: function(response){
					$("#categoryContent").html(response);
				}
			})
		}

	</script>
