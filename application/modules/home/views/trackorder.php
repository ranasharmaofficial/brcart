<?php 
function getSellerPrice($pid)
{
	include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT price FROM vendor_product where pid='$pid' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sellerProductPrice);	
    while ($stmt->fetch()) {	
	
        		}  
}
return $sellerProductPrice;
}

function getCountSellerProduct($pid)
{
	include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) FROM vendor_product where pid='$pid' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($countSellerProduct);	
    while ($stmt->fetch()) {	
	
        		}  
}
return $countSellerProduct;
}
?> 
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
    font-size:9px;
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
 <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav style="width:100%;" class="breadcrumb-nav container">
                <ul  class="breadcrumb bb-no">
                    <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                    <li>Track Your Order</li>
                    
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div style="width:100%" class="col-sm-12">
                            <div class="card row">
								<h4 class="title-sm title-underline font-weight-bolder ls-normal pb-1 mb-4 p-4"> Track Your Order </h4>
										
								<div class="card-body">
								
								<!--TrackOrder Start--->
									<div class="col-md-12 mb-2">
										<div class="row justify-content-center">
											<div class="form-group col-12">
												<form autocomplete="off" method="get" action="<?php echo WEB_URL . 'home/trackOrder?orderid=' ?>">
													<div class="p-1 bg-light shadow-sm mb-4">
														<div class="input-group input-wrapper">
															<input style="font-size:16px;" value="<?php if (isset($_GET['orderid'])) {echo $_GET['orderid'];}?>" id="keywords" name="orderid"
																 type="search" placeholder="Enter Your Order Id..." aria-describedby="button-addon1"
																class="form-control border-0 bg-light">
															<button style="background-color:none;" class="btn btn-search" type="submit"><i style="background-color:none;" class="fa fa-search"></i>
															</button>
														</div>
													</div>
												</form>
											</div>
											
										</div>
										<div class="row justify-content-center">
											<div class="form-group col-12">
											<?php 
											if(isset($_GET['orderid']))
											{
											$us=$_GET['orderid'];
			   			include('./db.php');			
				$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) FROM myorder where order_no='$us'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($countOrder);	
    while ($stmt->fetch()) {	
        		}  
}
											?>	
			<?php 
			   if($countOrder>=1)
			   {
			 	
				if(isset($_GET['orderid']))
{
	$orderid=$_GET['orderid'];
	
	include('./db.php');			
				$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT id FROM myorder where order_no='$us'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($order_id);	
    while ($stmt->fetch()) {	
        		}  
}

include('db.php');

mysqli_set_charset($conn,"utf8");
$sql = "SELECT * FROM orderdetails where orderid='$order_id' order by id desc";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($val = $result->fetch_assoc()) {
		$product_id=$val['product_id'];
		$sellerId=$val['seller_id'];
		$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT name FROM products where id='$product_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($product_name);	
    while ($stmt->fetch()) {	
        		}  
}
		$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT photo FROM products where id='$product_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($photo);	
    while ($stmt->fetch()) {	
        		}  
}	
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT shop_name FROM seller where id='$sellerId'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($shop_name);	
    while ($stmt->fetch()) {	
        		}  
}
	?>
<div class="row">	
					<div class="col-12">
							<?php if($val['delivery_status']!='5') { ?>
	<?php if($val['delivery_status']!='6') { ?>									    
									    
									    
<ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Order Placed</li><!--
	--><li class="progtrckr-<?php if($val['delivery_status']=='2' OR $val['delivery_status']=='3' OR $val['delivery_status']=='4' ) { echo 'done'; } else {echo 'todo';}?>">Approved</li><!--
 --><li class="progtrckr-<?php if($val['delivery_status']=='3' OR $val['delivery_status']=='4') { echo 'done'; }else{echo 'todo';}?>">Shipped</li><!--
 --><li class="progtrckr-<?php if($val['delivery_status']=='4') { echo 'done'; }else{echo 'todo';}?>">Delivered</li>
</ol>


<?php } else {  ?>
<ol class="progtrckrcan" data-progtrckrcan-steps="2">
    <li class="progtrckrcan-done"><div style="float: left; display: inline-block;font-size: 14px;">Order Cancelled</div></li>
</ol>



<?php } ?>
<?php } ?>
<hr>
					</div>
				<div class="col-3">
					<div class="content">
						<img style="height:70px;" class="" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $photo; ?>" alt="<?php echo $product_name; ?>">
						
					</div>
				</div>
				<div class="col-9">
				<span style="font-size:16px;font-weight:bold;color:#000;" class=""><?php echo $product_name; ?></span>
				<br>
				<span style="font-weight:700;font-size:13px;">Sold By : <?php echo $shop_name; ?></span>
				</div>
				
				<div class="col-3">
					
				</div>
				<div class="col-9">
					<span style="color:black;font-size:13px;">Qunatity : <span style="color:black;"><?php echo $val['qty']; ?></span></span>
				</div>
				 <div class="col-3">
					
				</div>
				<div class="col-9">
					<span style="color:black;font-size:13px;">Price : <span style="color:black;">Rs <?php echo $val['product_price']; ?></span></span>
				</div>
				<div class="col-3">
					
				</div>
			 
				<div class="col-9">
					<span style="color:black;font-size:13px;">Order Total : <span style="color:green;">Rs <?php echo $val['total_price']; ?></span></span>
				</div>
				 
			</div>
		<hr>

<?php
		}

$conn->close();
}
}
?>		
			   <?php } else { ?>
					<div class="alert alert-danger">
						Order Id Not Found! Please Try Again.
					</div>
			   
			   <?php } ?>									
											<?php } ?>
											</div>
										</div>
									</div>
								<!--TrackOrder End--->
								</div> 
                            </div>
							
                            
                            
                             
                        </div>
						 
                        
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
 


