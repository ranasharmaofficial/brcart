 <!-- Start of Main -->
        <main class="main cart">
           <?php if(false) { ?>
		   <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
			<?php } ?>
	
            <!-- Start of PageContent -->
            <div style="background-color: #f1f3f6;width:100%;" class="page-content mt-5 p-3">
                <div class="container">
				
				<?php if($this->cart->total_items() > 0) {     ?>
                    
					
					
					
				<form method="post" action="" enctype="multipart/form-data">	
					<div class="row gutter-lg mb-10">
                        <div class="col-lg-8 mt-4  p-4 bg-white shadow-sm">
					<center>
			<div style="width:100%;font-size:15px;background-color:#ffd814;border-radius:5px;" class="btn text-center text-black p-2 mt-3 mb-3">Proceed to Buy with these Item[s]</div>
		</center>
		<hr>
			<h4>Select a Shipping Address</h4>
		<hr>
		<div class="row">
								
								<div class="col-sm-12 mb-3">
                                       <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'users/addAddress'?>'" class="card p-3">
											<div class="row">
											<div class="col-12">
												<h4 style="font-size:15px;float:left;" class="address-box-title">Add a New Address</h4>
											
												<i style="font-size:15px;float:right;margin-top:6px;" class="fa fa-angle-double-right address-box-title" aria-hidden="true"></i>
											</div>	
											</div>
                                        </div>
                                    </div>
												
								<?php
								if($user['address']=='')
								{
									?>
									<?php
				if(is_array($user_address) && count($user_address) > 0) {
					foreach ($user_address as $val) {
						$userAddressId=$val['id'];
						?>
									<div class="col-sm-12 mb-3">
                                        <div style="cursor:pointer;font-size:14px;" class="card card-body p-3">
										<label for="selectaddress<?php echo $val['id']; ?>" style="margin-left:5px;font-size:19px;font-weight:bold;">
										<input id="selectaddress<?php echo $val['id']; ?>" value="<?php echo $userAddressId; ?>" type="radio" title="Please Select Your Delivery Address!" name="addressid"/>&nbsp;Select This Address</label>
										<?php echo form_error('addressid'); ?>
										<hr>
											<span class="font-weight-bold"><?php echo $val['fullname']; ?></span>
											<span>House No. - <?php echo $val['house_no']; ?></span>
											<span><?php echo $val['address']; ?>, <?php echo $val['landmark']; ?></span>
											<span><?php echo $val['city']; ?>, <?php echo $val['state']; ?> - <?php echo $val['pin']; ?></span>
											<span><?php echo $val['address_type']; ?></span>
											
										
										</div>
                                    </div>
					<?php }
				}
					?>
								<?php } else { ?>
							<?php
				if(is_array($user_default_address) && count($user_default_address) > 0) {
					foreach ($user_default_address as $val) {
						$userAddressId=$val['id'];
						?>
									<div class="col-sm-12 mb-3">
                                        <div style="cursor:pointer;font-size:14px;" class="card card-body p-3">
										<label for="selectaddress<?php echo $val['id']; ?>" style="margin-left:5px;font-size:19px;font-weight:bold;">
										<input checked id="selectaddress<?php echo $val['id']; ?>" value="<?php echo $userAddressId; ?>" type="radio" title="Please Select Your Delivery Address!" name="addressid"/>&nbsp;Select This Address</label>
										<hr>
											<span class="font-weight-bold"><?php echo $val['fullname']; ?></span>
											<span>House No. - <?php echo $val['house_no']; ?></span>
											<span><?php echo $val['address']; ?>, <?php echo $val['landmark']; ?></span>
											<span><?php echo $val['city']; ?>, <?php echo $val['state']; ?> - <?php echo $val['pin']; ?></span>
											<span><?php echo $val['address_type']; ?></span>
											
										
										</div>
                                    </div>
					<?php }
				}
					?>								
								<?php } ?>		 
						 
									
									
									 
									
                                </div>
								
								
                           <?php foreach($cartItems as $item)
						   {   

						   
						   
			$productID=$item["id"];  
						   include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT previous_price FROM products where id='$productID'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($mrp);	
    while ($stmt->fetch()) {	
	
        		}  
}

$sellerid=$item["sellerid"];
						   include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT shop_name FROM seller where id='$sellerid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sold_by);	
    while ($stmt->fetch()) {	
	
        		}  
}
						   ?>
						   
						   <div class="row">
<div class="col-3">
<a href="<?php echo $item['slug']; ?>">
 <?php //include('./offer.php'); ?>


<img style="height:100px;" class="img-thumbnail" id="product_pic" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $item['photo']; ?>"></a>
</div>

<div class="col-9">
<a style="text-decoration:none;" href="<?php echo $item['slug']; ?>"><h3 style="text-decoration:none;" class="font-weight-bold p-1"><?php echo $item["name"]; ?></h3></a>


<span><span class="text-secondary p-1">Sold by <a style="text-decoration:none;" href=""><?php echo $sold_by; ?></a></span>



				
				

							<h3 style="font-size:21px;" class="text-danger font-weight-bold p-2"><i class="fa fa-inr">&nbsp;</i><?php echo $item["price"]; ?> 
					
					<span style="font-size:16px;" class="text-secondary"><s><i class="fa fa-inr"></i>&nbsp;<?php echo $mrp; ?></s><span>
				<?php if(round(($item['qty']*$mrp)-($item['qty']*$item['price']))>0) { ?>
				<span style="font-size:15px;" class="text-success">&nbsp;Save <i class="fa fa-inr"></i>					
				<?php echo round(($mrp)-($item['price']))?></span>
				<?php } ?>
					</h3>
					<?php if(false) { ?>
					<span> <span style="font-size:16px;" class="font-weight-bold p-3">Qty</span> <span style="float:left;">
					
					<select onchange="location = this.value;" class="form-control"  style="width:60px;height:30px;z-index:0;" name="quantity">
					<option selected><?php echo $item['qty']; ?></option>
					  
      
				<?php for($i=1;$i<=20;$i++)  { ?>
					<option  value="./cart.php?id=<?php echo $item['rowid']; ?>&qt=<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>					 
					</select>
					</span>
					<span style="float:right;"><button onclick="window.location.href='<?php echo WEB_URL.'cart/removeItem/'?><?php echo $item['rowid']; ?>'" class="btn btn-sm btn-primary float-right"><i class="fa fa-trash"></i></button></span>
					</span>
					<?php } ?>

</div>
</div>
<hr>

						   <?php //} ?>
					 
						<?php } ?>
                           
                        </div>
						
                        <div class="col-lg-4 sticky-sidebar-wrapper mt-4 p-4 bg-white shadow-sm">
                    <div class="title-link-wrapper pb-1 mb-4">
						<h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Cart Totals</h2>
					</div>
					<div class="container">
						<div style="border:none;" class="row mb-4">
							<div class="row">
								<div class="col-6">
									<p>Items : </p>
								</div>
								<div class="col-6">
									<p style="float:right;color:black;font-weight:none;"><?php echo $this->cart->total_items();?></p>
								</div>
							</div>
									</br>
							<div class="row">
								<div class="col-6">
									<p>Sub Total : </p>
								</div>
								<div class="col-6">
									<p style="float:right;color:black;font-weight:none;">Rs <?php echo getNumberFormat($this->cart->total()); ?></p>
								</div>
							</div>
									</br>
							<div class="row">
								<div class="col-6">
									<p>Delivery : </p>
								</div>
								<div class="col-6">
									<p style="float:right;color:black;font-weight:none;">Rs 0<?php //echo $delivery; ?></p>
								</div>
							</div>
								</br>
							<div class="row">
								<div class="col-8">
									<p style="color:black;font-weight:bold;">Payable&nbsp;Total&nbsp;Amount : </p>
								</div>
								<div class="col-4">
									<p style="float:right;color:black;font-weight:bold;">Rs 0<?php //echo $price+$delivery; ?></p>
								</div>
							</div>
									<hr>
							<div class="row text-danger font-weight-bold">
								<div class="col-6">
									<p style="font-weight:bold;">Your total savings : </p>
								</div>
								<div class="col-6">
									<p style="float:right;font-weight:bold;">Rs  0<?php //echo $save; ?></p>
								</div>
							</div>   
							<hr>
							<div class="row">
								<div class="col-12 text-center">
									<span style="color:black;font-size:25px;text-align:center;font-weight:bold;">Payment Option</span>
								</div> 
							</div>
							
							<div class="row">
								<div class="col-12"></div>
									
								<div class="col-5">
									<hr>
								</div>
								<div class="col-2 text-center">
									OR
								</div>
								<div class="col-5">
									<hr>
								</div>

								<div class="col-12">
				<?php //if($cod=='YES' and $price<=$cod_limit) { ?>										 
				 		

					<?php if(false) { ?>
					<input type="hidden" name="address" value="<?php echo $userAddressId; ?>"> 
					<input type="hidden" name="total" value="<?php if(false) { echo round($price+$delivery); } ?>0">				
					<input type="hidden" name="delivery_charge" value="0">				
					<input type="hidden" name="payment_mode" value="COD">				
					<input type="hidden" name="save" value="<?php if(false) { echo $save; } ?>0">				
					<input type="hidden" name="cart"><?php } ?>
					
					<input type="hidden" name="address" value="<?php echo $userAddressId; ?>"> 
					<input type="hidden" name="total" value="<?php echo round($this->cart->total()); ?>">				
					<input type="hidden" name="delivery_charge" value="50">				
					<input type="hidden" name="shippping_cost" value="50">				
					<input type="hidden" name="payment_mode" value="COD">				
					<input type="hidden" name="save" value="100">				
					<button style="width:100%;font-size:16px;height:45px;border:1px solid grey;font-weight:bold;" name="make_order" value="make_order" type="submit" class="btn bg-primary text-white">CASH&nbsp;ON&nbsp;DELIVERY (COD)</button> 
				 
				<?php //} ELSE { ?>		


				<?php
				// echo '<p style="color:orange;font-size:16px;" class="text-center font-weight-bold">COD Limit ₹'.$cod_limit.' On Your Location.</p>';
				// 
				// }
				?>		
						</div>
							</div>
			 
						</div>
					</div>
							
                        </div>
                    </div>
			</form>		
					<?php } else { ?>
						<div style="padding:10px;" class="page-content bg-white shadow-sm mt-5 mb-5">
<div class="title-link-wrapper pb-1 mb-4">
						<h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Shopping Cart</h2>
					</div>
	<div class="container"><div class="main-content-wrap"><div class="main-content"><div class="woocommerce">
	<div class="cart-empty-page text-center">
		<div class="woocommerce-notices-wrapper"></div>
			<img src="<?php echo WEB_PATH_FRONT.'images/empty-cart-icon.png'?>" alt="Empty Cart">
		<p class="return-to-shop">
			<a style="padding: 1em 2em;" class="button wc-backward btn btn-rounded btn-dark" href="<?php echo WEB_URL.''?>">
				Return to shop			</a>
		</p>
	</div>
</div>
</div></div></div>
</div>
    <?php } ?>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
		
		