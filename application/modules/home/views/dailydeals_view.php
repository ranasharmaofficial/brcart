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
 <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav style="width:100%;" class="breadcrumb-nav container">
                <ul  class="breadcrumb bb-no">
                    <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                    <li>Daily Deals</li>
                    
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div style="width:100%" class="col-sm-12">
                            <div class="card row">
								<h4 class="title-sm title-underline font-weight-bolder ls-normal pb-1 mb-4 p-4">Daily Deals</h4>
										
								<div class="card-body">
								
								<!--Grocery Start--->
									<div class="col-md-12 mb-2">
										<div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
																	<?php
				if(is_array($dailydeals) && count($dailydeals) > 0) {
					foreach ($dailydeals as $val) {
						
						$product = strlen($val['name']) > 20 ? substr($val['name'],0,20)." ..." : $val['name']; 
						$sellerProductPrice=getSellerPrice($val['id']);
						$countSellerProduct=getCountSellerProduct($val['id']);
						?>
											 <div style="" class="product-wrap p-2 shadow-sm">
												 <div class="product text-center">
                                    <figure class="product-media">
                                        <center><a href="<?php echo WEB_URL.'item/'.$val['slug'];?>">
                                            <img style="height:140px;width:auto;" src="<?php echo WEB_ATTACHMENT_PATH ?>/loader.svg" data-src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" alt="<?php echo $val['name']; ?>"/>
                                        </a></center>
                                        
                                       <?php if($countSellerProduct>=1) { ?>   
											<?php if($val['previous_price']>$sellerProductPrice) {  ?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
												<?php if(round((($val['previous_price']-$sellerProductPrice)*(100/$val['previous_price'])),0)>='0') { ?>
												<?php echo round((($val['previous_price']-$sellerProductPrice)*(100/$val['previous_price'])),0); ?> % Off
												<?php } ?>
												</label>
                                        </div>
											<?php } ?>
										<?php } else { ?>
										<?php if($val['previous_price']>$val['price']) {  ?>
										<div class="product-label-group">
                                            <label class="product-label label-discount">
												<?php if(round((($val['previous_price']-$val['price'])*(100/$val['previous_price'])),0)>='0') { ?>
												<?php echo round((($val['previous_price']-$val['price'])*(100/$val['previous_price'])),0); ?> % Off
												<?php } ?>
												</label>
                                        </div>
										<?php }  } ?>
										
                                    </figure>
                                    <div class="product-details">
                                        <h4 title="<?php echo $val['name']; ?>" class="product-name"><a href="<?php echo WEB_URL.'item/'.$val['slug'];?>"><?php echo $product; ?></a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="<?php echo WEB_URL.'item/'.$val['slug'];?>" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                            <del class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                        </div>
									</div>
                                </div>
											</div>
											<?php
					}
				}
				?>
										</div>
									</div>
									<!--Grocery End--->
								</div> 
                            </div>
							
                            
                            
                             
                        </div>
						 
                        
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
 


