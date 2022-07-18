<?php
function getSellerPrice($pid)
{
    include 'db.php';
    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
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
    include 'db.php';
    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
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
<?php if(!empty($posts)){ foreach($posts as $row){ 
$product = strlen($row['name']) > 20 ? substr($row['name'],0,20)." ..." : $row['name']; 
						$sellerProductPrice=getSellerPrice($row['id']);
						$countSellerProduct=getCountSellerProduct($row['id']);
?>
								<div class="product-wrap p-1 shadow-sm">
                                    <div class="product text-center">
                                        <center>
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL.'item/'.$row['slug'];?>">
                                                <img style="height:140px;width:auto;"  src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo  $row['photo']; ?>" alt="<?php echo $row['name']; ?>" />
                                            </a>
											<?php if(false) { ?>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
					</div><?php } ?>
											<?php if($countSellerProduct>=1) { ?>   
											<?php if($row['previous_price']>$sellerProductPrice) {  ?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
												<?php if(round((($row['previous_price']-$sellerProductPrice)*(100/$row['previous_price'])),0)>='0') { ?>
												<?php echo round((($row['previous_price']-$sellerProductPrice)*(100/$row['previous_price'])),0); ?> % Off
												<?php } ?>
												</label>
                                        </div>
											<?php } ?>
										<?php } else { ?>
										<?php if($row['previous_price']>$row['price']) {  ?>
										<div class="product-label-group">
                                            <label class="product-label label-discount">
												<?php if(round((($row['previous_price']-$row['price'])*(100/$row['previous_price'])),0)>='0') { ?>
												<?php echo round((($row['previous_price']-$row['price'])*(100/$row['previous_price'])),0); ?> % Off
												<?php } ?>
												</label>
                                        </div>
										<?php }  } ?>
                                        </figure>
										</center>
                                         <div class="product-details">
                                           
                                            <h3 class="product-name">
                                                <a style="text-decoration:none;" href="<?php echo WEB_URL.'item/'.$row['slug'];?>"><?php echo $product; ?></a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <?php if($countSellerProduct>=1) { ?> 
                                        <div class="product-price">
                                            <ins class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                            <del class="old-price">Rs&nbsp;<?php echo getNumberFormat($row['previous_price']); ?></del>
                                        </div>
										<?php } else { ?>
										<div class="product-price">
                                            <ins class="new-price">Rs&nbsp;<?php echo getNumberFormat($row['price']); ?></ins>
                                            <del class="old-price">Rs&nbsp;<?php echo getNumberFormat($row['previous_price']); ?></del>
                                        </div>
										<?php } ?>
                                            </div>
										</div>
                                    </div>
                                </div>
								<?php } }else{ ?>
								<div class="product-wrap">
                                    <div class="product text-center">
		<h3 class="text-center text-danger">Product Not found...</h3>
		</div>
		</div>
	<?php } ?>
                            <!-- Render pagination links -->
	 <br>
	 <br>
	 <br>
	 <div style="margin-top:100px;" class="container">
		 <div class="row">
			 <div class="col-sm-12" align="center"> 
				<?php echo $this->ajax_pagination->create_links(); ?>
			 </div>
		 </div>
	 </div>