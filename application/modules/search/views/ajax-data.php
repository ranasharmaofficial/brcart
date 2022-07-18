<?php if(!empty($posts)){ foreach($posts as $row){ ?>
								<div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL.'item/'.$row['slug'];?>">
                                                <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo  $row['photo']; ?>" alt="Product" width="300"
                                                    height="338" />
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                             <h3 class="product-name">
                                                <a style="text-decoration:none;" href="<?php echo WEB_URL.'item/'.$row['slug'];?>"><?php echo  $row['name']; ?></a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                             </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    Rs <?php echo  $row['price']; ?>
                                                </div>
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