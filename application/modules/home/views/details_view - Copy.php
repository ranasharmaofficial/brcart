<?php
$productID=$details['product_id'];


include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT vendor_id FROM vendor_product where pid='$productID' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($vendorId);	
    while ($stmt->fetch()) {	
	
        		}  
}

include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT price FROM vendor_product where pid='$productID' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sellerProductPrice);	
    while ($stmt->fetch()) {	
	
        		}  
}


include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT shop_name FROM seller where id='$vendorId'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($shopName);	
    while ($stmt->fetch()) {	
	
        		}  
}

 $pid=$details['product_id'];
 //$vendor_id=$details['vendorid'];
 
 
include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) FROM vendor_product where pid='$pid' and status='2'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_item);	
    while ($stmt->fetch()) {	
	
        		}  
}
?>
 <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav style="width:100%;" class="breadcrumb-nav container">
                <ul  class="breadcrumb bb-no">
                    <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                    <li><?php echo $details['product_name']; ?></li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
<figure class="product-image">
                                                <img style="height:300px;width:auto;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>"
                                                    data-zoom-image="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>"
                                                    alt="" width="800" height="900">
                                            </figure>                                            
											<?php
			if(is_array($galleryItem) && count($galleryItem) > 0){
				foreach($galleryItem as $val) {
					?>
											<figure class="product-image">
                                                <img src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                    data-zoom-image="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                    alt="">
                                            </figure>
											 <?php
				}
			}?>
                                            
                                        </div>
                                        <div class="product-thumbs-wrap">
                                            <div class="product-thumbs row cols-4 gutter-sm">
                                                <?php
			if(is_array($galleryItem) && count($galleryItem) > 0){
				foreach($galleryItem as $val) {
					?>
												<div title="<?php echo $details['product_name']; ?>" class="product-thumb active">
                                                    <img src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                        alt="Product Thumb" width="800" height="900">
                                                </div>
												 <?php
				}
			}?>
                                                
                                            </div>
                                            <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                            <button class="thumb-down disabled"><i
                                                    class="w-icon-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
								<div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h2 title="<?php echo $details['product_name']; ?>" class="product-title"><?php echo $details['product_name']; ?></h2>
                                        <div class="product-bm-wrapper">
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                    <span class="product-category"><a href="#"><?php echo $details['cat_name']; ?></a></span>
                                                </div>
                                                <div class="product-sku">
                                                    SKU: <span><?php echo $details['sku']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">
										<p  style="margin:0px;">M.R.P.: <strike><i class="fa fa-inr"></i>&nbsp;<?php echo getNumberFormat($details['previous_price']); ?></strike></p>
										<?php if($count_item>=1) { ?>
                                        <p  style="margin:0px;">Price:&nbsp;<span style="font-size:25px;"><i class="fa fa-inr"></i> <?php echo getNumberFormat($sellerProductPrice); ?></span></p>
                                        <p  style="margin:0px;" class="text-success">You Save: <i class="fa fa-inr"></i>&nbsp;<?php echo $details['previous_price']-$sellerProductPrice; ?>&nbsp;(<?php if(round((($details['previous_price']-$sellerProductPrice)*(100/$details['previous_price'])),0)>'0') { ?>
												<?php echo round((($details['previous_price']-$sellerProductPrice)*(100/$details['previous_price'])),0); ?>% Off
												<?php } ?>)</p>
												<p style="margin-left:25px;">Inclusive of all taxes</p>
												<p style="color:green;font-weight:bold;">In Stock.</p>
												<p style="color:#000;font-weight:none;">Sold by <a href="#"><?php echo $shopName; ?></a> and fulfilled by <?php echo SITE_NAME; ?>.</p>
										<?php }  else { ?>		
										 <p  style="margin:0px;">Price:&nbsp;<span style="font-size:25px;"><i class="fa fa-inr"></i> <?php echo getNumberFormat($details['price']); ?></span></p>
                                        <p  style="margin:0px;" class="text-success">You Save: <i class="fa fa-inr"></i>&nbsp;<?php echo $details['previous_price']-$details['price']; ?>&nbsp;(<?php if(round((($details['previous_price']-$details['price'])*(100/$details['previous_price'])),0)>'0') { ?>
												<?php echo round((($details['previous_price']-$details['price'])*(100/$details['previous_price'])),0); ?>% Off
												<?php } ?>)</p>
												<p style="margin-left:25px;">Inclusive of all taxes</p>
												<p style="color:red;font-weight:bold;">Out of Stock.</p>
										<?php }  ?>		
												
												
									<?php if(false) { ?>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                                Reviews)</a>
                                        </div>
									<?php } ?>
                                        <div class="product-short-desc">
                                            <?php echo $details['short_details']; ?>
                                        </div>
									
                                        <hr class="product-divider">
									<?php if(false) { ?>
                                        <div class="product-form product-variation-form product-color-swatch">
                                            <label>Color:</label>
                                            <div class="d-flex align-items-center product-variations">
                                                <a href="#" class="color" style="background-color: #ffcc01"></a>
                                                <a href="#" class="color" style="background-color: #ca6d00;"></a>
                                                <a href="#" class="color" style="background-color: #1c93cb;"></a>
                                                <a href="#" class="color" style="background-color: #ccc;"></a>
                                                <a href="#" class="color" style="background-color: #333;"></a>
                                            </div>
                                        </div>
                                        <div class="product-form product-variation-form product-size-swatch">
                                            <label class="mb-1">Size:</label>
                                            <div class="flex-wrap d-flex align-items-center product-variations">
                                                <a href="#" class="size">Small</a>
                                                <a href="#" class="size">Medium</a>
                                                <a href="#" class="size">Large</a>
                                                <a href="#" class="size">Extra Large</a>
                                            </div>
                                            <a href="#" class="product-variation-clean">Clean All</a>
                                        </div>

                                        <div class="product-variation-price">
                                            <span></span>
                                        </div>
<?php } ?>								
									<?php if($count_item>=1) { ?>
                                        <div class="product-sticky-content sticky-content">
                                            <div class="product-form container">
                                                <div class="product-qty-form">
                                                    <div class="input-group">
                                                        <input class="quantity form-control" type="number" min="1"
                                                            max="10000000">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <?php echo '<button type="button" name="add_cart" data-productname="'.$details['product_name'].'" data-price="'.$sellerProductPrice.'" data-slug="'.$details['slug'].'" data-photo="'.$details['photo'].'" data-productid="'.$details['product_id'].'"  data-sellerid="'.$vendorId.'" class="btn-details-cart-button add_cart"><i class="w-icon-cart"></i>&nbsp;<span>Add to Cart</span></button>'; ?>
												 
												
                                            </div>
                                        </div>
										
									<?php } ?> 

                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <span id="shareBtn" class="social-icon social-facebook w-icon-facebook"></span>
													<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    display: 'popup',
    method: 'share',
    href: '<?php echo WEB_URL.'item/'.$details['slug'];?>',
  }, function(response){});
}
</script>
                                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                    <a href="#"
                                                        class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                    <a href="https://api.whatsapp.com/send?&text=*<?php echo $details['product_name']; ?>*
 
To purchase this product click here 👉 <?php echo WEB_URL.'item/'.$details['slug'];?>" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    <a href="#"
                                                        class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show"></span>
                                            <div class="product-link-wrapper d-flex">
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                                <?php if(false) { ?><a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Product Details</a>
                                    </li>
									<li class="nav-item">
                                        <a href="#product-tab-vendor" class="nav-link">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-specification" class="nav-link">Return Policy</a>
                                    </li>
									 
                                    
									 
                                    <li class="nav-item">
                                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-5">
                                                <p class="mb-4">
													<?php echo $details['details']; ?>
												</p>
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="tab-pane" id="product-tab-specification">
                                        <p>If an order, once placed, can be canceled until the seller processes it.</p>
<p>This Product is eligible for the Return and Replacement Policy, within <?php echo $details['policy']; ?> days of delivery. For any queries, do reach out to Customer Care.</p>
                              
                                    </div>
									 
                                    <div class="tab-pane" id="product-tab-vendor">
                                        <div class="row p-3">
											 <p><?php echo $details['description']; ?></p>	
                                        </div>
                                        
                                    </div>
                                     
									<div class="tab-pane" id="product-tab-reviews">
                                        <div class="row mb-4">
                                            <div class="col-xl-4 col-lg-5 mb-4">
                                                <div class="ratings-wrapper">
                                                    <div class="avg-rating-container">
                                                        <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                        <div class="avg-rating">
                                                            <p class="text-dark mb-1">Average Rating</p>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ratings-value d-flex align-items-center text-dark ls-25">
                                                        <span
                                                            class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                            class="count">(2 of 3)</span>
                                                    </div>
                                                    <div class="ratings-list">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>70%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>30%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>40%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 40%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>0%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 20%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>0%</mark>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-7 mb-4">
                                                <div class="review-form-wrapper">
                                                    <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                        Review</h3>
                                                    <p class="mb-3">Your email address will not be published. Required
                                                        fields are marked *</p>
                                                    <form action="#" method="POST" class="review-form">
                                                        <div class="rating-form">
                                                            <label for="rating">Your Rating Of This Product :</label>
                                                            <span class="rating-stars">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>
                                                            <select name="rating" id="rating" required=""
                                                                style="display: none;">
                                                                <option value="">Rate…</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very poor</option>
                                                            </select>
                                                        </div>
                                                        <textarea cols="30" rows="6"
                                                            placeholder="Write Your Review Here..." class="form-control"
                                                            id="review"></textarea>
                                                        <div class="row gutter-md">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Your Name" id="author">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Your Email" id="email_1">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="checkbox" class="custom-checkbox"
                                                                id="save-checkbox">
                                                            <label for="save-checkbox">Save my name, email, and website
                                                                in this browser for the next time I comment.</label>
                                                        </div>
                                                        <button type="submit" class="btn btn-dark">Submit
                                                            Review</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a href="#show-all" class="nav-link active">Show All</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#helpful-positive" class="nav-link">Most Helpful
                                                        Positive</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#helpful-negative" class="nav-link">Most Helpful
                                                        Negative</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="show-all">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/agents/1-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:54 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>pellentesque habitant morbi tristique senectus
                                                                        et. In dictum non consectetur a erat.
                                                                        Nunc ultrices eros in cursus turpis massa
                                                                        tincidunt ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-1.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-1-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/agents/2-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:52 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 80%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>Nullam a magna porttitor, dictum risus nec,
                                                                        faucibus sapien.
                                                                        Ultrices eros in cursus turpis massa tincidunt
                                                                        ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-2.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-2.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-3.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/default/review-img-3.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/agents/3-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:21 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                        condimentum vitae
                                                                        sapien pellentesque habitant morbi tristique
                                                                        senectus et. In dictum
                                                                        non consectetur a erat. Nunc scelerisque viverra
                                                                        mauris in aliquam sem fringilla.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (1)
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <section class="related-product-section">
                                <div class="title-link-wrapper mb-4">
                                    <h4 class="title">Related Products</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                        Products<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
								 <?php
				if(is_array($relatedProducts) && count($relatedProducts) > 0) {
					foreach ($relatedProducts as $val) {
						$product = strlen($val['name']) > 20 ? substr($val['name'],0,20)." ..." : $val['name']; 
						?>
                            <div style="" class="product-wrap p-2 shadow-sm">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <center><a href="<?php echo WEB_URL.'item/'.$val['slug'];?>">
                                            <img style="height:140px;width:auto;" src="<?php echo WEB_ATTACHMENT_PATH ?>/loader.svg" data-src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" alt="<?php echo $val['name']; ?>"/>
                                        </a></center>
                                        <div class="product-action-vertical">
                                            <a onclick="window.location.href='<?php echo base_url('home/addToCart/'.$val['id']); ?>'" href="javascript:void(0)" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            
                                        </div><input type="hidden" name="quantity" class="form-control quantity" id="<?php echo $val['id']; ?>" /><br />
										    
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
												<?php if(round((($val['previous_price']-$val['price'])*(100/$val['previous_price'])),0)>'0') { ?>
												<?php echo round((($val['previous_price']-$val['price'])*(100/$val['previous_price'])),0); ?> % Off
												<?php } ?>
												</label>
                                        </div>
										
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
										<?php if(false) { echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="'.$product.'" data-price="'.$val['price'].'" data-slug="'.$val['slug'].'" data-photo="'.$val['photo'].'" data-productid="'.$val['id'].'" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>'; } ?>
                                    </div>
                                </div>
                            </div>
									 <?php
					}
				}
				?>
                                </div>
                            </section>
                        </div>
						
						<div class="col-sm-3">
                                <div class="">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                                <p>For all orders over Rs 599</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->
									<?php if($count_item>1) { ?>
									<div class="widget mb-6 card">
									<div class="card-header">Other Sellers on <?php echo SITE_NAME; ?></div>
									  <ul class="list-group list-group-flush">
									  <?php



  
include('db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
$fields="a.*,b.shop_name as shopname";
$sql = "SELECT $fields FROM `vendor_product` `a` INNER JOIN `seller` `b` ON `a`.`vendor_id`=`b`.`id` where pid='$pid' and vendor_id!='$vendorId' order by price asc";
//$sql = "SELECT count(a.vendor_id) as vendorIDfromdetails, `a`.`price`, `b`.* FROM `vendor_product` `a` INNER JOIN `products` `b` ON `a`.`pid`=`b`.`id` WHERE `slug` = 'saffola-gold-pro-healthy-lifestyle-refined-cooking-oil.html' ORDER BY `a.price` ASC;

$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   
	  
?>
										<li class="list-group-item">
										<div class="row">
											<div class="col-12">
										<p style="color:#B12704!important;font-size:18px;"><i class="fa fa-inr"></i>&nbsp;<?php echo getNumberFormat($row['price']); ?></p>
										<p style="color:#000!important;font-size:14px;">Sold by:&nbsp;<?php echo $row['shopname']; ?></p>
											</div>
										</div>
										</li>
					<?php
		}

$conn->close();
}
?>
									</ul>
									</div>
									<?php } ?>
                                    <div class="widget widget-banner mb-9">
                                        <div class="banner banner-fixed br-sm">
                                            <figure>
                                                <img src="<?php echo WEB_PATH_FRONT; ?>images/shop/banner3.jpg" alt="Banner" width="266"
                                                    height="220" style="background-color: #1D2D44;" />
                                            </figure>
                                            <div class="banner-content">
                                                <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                    40<sup class="font-weight-bold">%</sup><sub
                                                        class="font-weight-bold text-uppercase ls-25">Off</sub>
                                                </div>
                                                <h4
                                                    class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                    Ultimate Sale</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Banner -->

                                    <div class="widget widget-products">
                                        <div class="title-link-wrapper mb-2">
                                            <h4 class="title title-link font-weight-bold">More Products</h4>
                                        </div>

                                        <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                            <div class="widget-col">
                                                 <?php
				if(is_array($allProduct) && count($allProduct) > 0) {
					foreach ($allProduct as $val) {
						?>
												<div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="<?php echo WEB_URL.'item/'.$val['slug'];?>">
                                                            <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="<?php echo WEB_URL.'item/'.$val['slug'];?>"><?php echo $val['name']; ?></a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">Rs&nbsp;<?php echo $val['price']; ?></div>
                                                    </div>
                                                </div>
												 <?php
					}
				}
				?>
                                                
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        <!-- End of Main Content -->
						<?php if(false) { ?>
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                                <p>For all orders over Rs 599</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->

                                    <div class="widget widget-banner mb-9">
                                        <div class="banner banner-fixed br-sm">
                                            <figure>
                                                <img src="<?php echo WEB_PATH_FRONT; ?>images/shop/banner3.jpg" alt="Banner" width="266"
                                                    height="220" style="background-color: #1D2D44;" />
                                            </figure>
                                            <div class="banner-content">
                                                <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                    40<sup class="font-weight-bold">%</sup><sub
                                                        class="font-weight-bold text-uppercase ls-25">Off</sub>
                                                </div>
                                                <h4
                                                    class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                    Ultimate Sale</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Banner -->

                                    <div class="widget widget-products">
                                        <div class="title-link-wrapper mb-2">
                                            <h4 class="title title-link font-weight-bold">More Products</h4>
                                        </div>

                                        <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                            <div class="widget-col">
                                                 <?php
				if(is_array($allProduct) && count($allProduct) > 0) {
					foreach ($allProduct as $val) {
						?>
												<div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="<?php echo WEB_URL.'item/'.$val['slug'];?>">
                                                            <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>" alt="Product"
                                                                width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="<?php echo WEB_URL.'item/'.$val['slug'];?>"><?php echo $val['name']; ?></a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">Rs&nbsp;<?php echo $val['price']; ?></div>
                                                    </div>
                                                </div>
												 <?php
					}
				}
				?>
                                                
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->
						<?php } ?>
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
 


