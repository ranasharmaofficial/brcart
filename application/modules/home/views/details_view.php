<?php
function getSellerPrice($pids)
{
    include 'db.php';
    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "SELECT price FROM vendor_product where pid='$pids' and status='2' order by price ASC limit 1";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($sellerProductPriceValue);
        while ($stmt->fetch()) {

        }
    }
    return $sellerProductPriceValue;
}

function getCountSellerProduct($pids)
{
    include 'db.php';
    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "SELECT count(id) FROM vendor_product where pid='$pids' and status='2' order by price ASC limit 1";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($countSellerProductQty);
        while ($stmt->fetch()) {

        }
    }
    return $countSellerProductQty;
}

$productID = $details['product_id'];

include 'db.php';
$con = new mysqli($host, $user, $password, $dbname)
or die('Could not connect to the database server' . mysqli_connect_error());
$query = "SELECT vendor_id FROM vendor_product where pid='$productID' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($vendorId);
    while ($stmt->fetch()) {

    }
}

include 'db.php';
$con = new mysqli($host, $user, $password, $dbname)
or die('Could not connect to the database server' . mysqli_connect_error());
$query = "SELECT price FROM vendor_product where pid='$productID' and status='2' order by price ASC limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sellerProductPrice);
    while ($stmt->fetch()) {

    }
}

include 'db.php';
$con = new mysqli($host, $user, $password, $dbname)
or die('Could not connect to the database server' . mysqli_connect_error());
$query = "SELECT shop_name FROM seller where id='$vendorId'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($shopName);
    while ($stmt->fetch()) {

    }
}

$pid = $details['product_id'];
//$vendor_id=$details['vendorid'];

include 'db.php';
$con = new mysqli($host, $user, $password, $dbname)
or die('Could not connect to the database server' . mysqli_connect_error());
$query = "SELECT count(id) FROM vendor_product where pid='$pid' and status='2'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_item);
    while ($stmt->fetch()) {

    }
}

function total_sale($productID, $vendorId)
{
    include './db.php';

    $con = new mysqli($servername, $username, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "select sum(qty) from orderdetails where product_id='$productID' and seller_id='$vendorId'";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($sale);
        while ($stmt->fetch()) {

        }
    }
    $stmt->close();
    $con->close();

    include './db.php';

    $con = new mysqli($servername, $username, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "select stock from vendor_product where pid='$productID' and vendor_id='$vendorId'";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($stock);
        while ($stmt->fetch()) {

        }
    }
    $stmt->close();
    $con->close();

    return ($stock - $sale);

}

?>
<!-- Start of Main -->
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav style="width:100%;" class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
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
                                        <img style="height:300px;width:auto;"
                                            src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>"
                                            data-zoom-image="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>"
                                            alt="<?php echo $details['product_name']; ?>" width="800" height="900">
                                    </figure>
                                    <?php
if (is_array($galleryItem) && count($galleryItem) > 0) {
    foreach ($galleryItem as $val) {
        ?>
                                    <figure class="product-image">
                                        <img style="height:300px;width:auto;"
                                            src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                            data-zoom-image="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                            alt="<?php echo $details['product_name']; ?>">
                                    </figure>
                                    <?php
}
}?>

                                </div>
                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs row cols-4 gutter-sm">
                                        <div title="<?php echo $details['product_name']; ?>"
                                            class="product-thumb active">
                                            <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>"
                                                alt="<?php echo $details['product_name']; ?>">
                                        </div>
                                        <?php
if (is_array($galleryItem) && count($galleryItem) > 0) {
    foreach ($galleryItem as $val) {
        ?>
                                        <div title="<?php echo $details['product_name']; ?>"
                                            class="product-thumb active">
                                            <img src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                alt="<?php echo $details['product_name']; ?>">
                                        </div>
                                        <?php
}
}?>

                                    </div>
                                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h2 title="<?php echo $details['product_name']; ?>" class="product-title">
                                    <?php echo $details['product_name']; ?></h2>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="<?php echo WEB_URL . 'item/' . $details['slug']; ?>"
                                        class="rating-reviews">(5
                                        reviews)</a>
                                </div>

                                <hr class="product-divider">
                                <p style="margin:0px;">M.R.P.: <strike><i
                                            class="fa fa-inr"></i>&nbsp;<?php echo getNumberFormat($details['previous_price']); ?></strike>
                                </p>
                                <?php if ($count_item >= 1) {?>
                                <p style="margin:0px;">Price:&nbsp;<span style="font-size:25px;"><i
                                            class="fa fa-inr"></i>
                                        <?php echo getNumberFormat($sellerProductPrice); ?></span></p>
                                <?php if ($details['previous_price'] > $sellerProductPrice) {?>
                                <p style="margin:0px;" class="text-success">You Save: <i
                                        class="fa fa-inr"></i>&nbsp;<?php echo $details['previous_price'] - $sellerProductPrice; ?>&nbsp;(<?php if (round((($details['previous_price'] - $sellerProductPrice) * (100 / $details['previous_price'])), 0) > '0') {?>
                                    <?php echo round((($details['previous_price'] - $sellerProductPrice) * (100 / $details['previous_price'])), 0); ?>%
                                    Off
                                    <?php }?>)</p>
                                <?php }?>
                                <p style="margin-left:25px;">Inclusive of all taxes</p>
                                <?php 
								$stock = total_sale($productID, $vendorId);
// if(false) {   
   if ($stock >= 1) {
        echo ' <h3 style="font-weight:bold;color:green;line-height:1.6;">In Stock</h3>';

        if ($stock < 2) {
            echo '<p style="color:black;font-size:15px;font-style:italic;">Only <b>(' . $stock . ')</b> Left In Stock!</p>';
        }

    } else {
        echo ' <h3 style="font-weight:bold;color:red;">Out Of Stock</h3>
							';
    }
								// }
    ?>
                                <p style="color:#000;font-weight:none;">Sold by <a href="#"><?php echo $shopName; ?></a>
                                    and fulfilled by <?php echo SITE_NAME; ?>.</p>
                                <?php } else {?>
                                <p style="margin:0px;">Price:&nbsp;<span style="font-size:25px;"><i
                                            class="fa fa-inr"></i>
                                        <?php echo getNumberFormat($details['price']); ?></span></p>
                                <p style="margin:0px;" class="text-success">You Save: <i
                                        class="fa fa-inr"></i>&nbsp;<?php echo $details['previous_price'] - $details['price']; ?>&nbsp;(<?php if (round((($details['previous_price'] - $details['price']) * (100 / $details['previous_price'])), 0) > '0') {?>
                                    <?php echo round((($details['previous_price'] - $details['price']) * (100 / $details['previous_price'])), 0); ?>%
                                    Off
                                    <?php }?>)</p>
                                <p style="margin-left:25px;">Inclusive of all taxes</p>
                                <p style="color:red;font-weight:bold;">Out of Stock.</p>

                                <?php }?>


                                <?php if (false) {?>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                        Reviews)</a>
                                </div>
                                <?php }?>
                                <div class="product-short-desc">
                                    <?php echo $details['short_details']; ?>
                                </div>

                                <hr class="product-divider">
                                <?php if (false) {?>
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
                                <?php }?>
                                <?php if ($count_item >= 1) {
    if ($stock >= 1) {
        ?>
                                <div class="product-sticky-content sticky-content">
                                    <div class="product-form container">
                                        <div class="product-qty-form">
                                            <div class="input-group">
                                                <input name="quantity" id="<?php echo $details['product_id']; ?>"
                                                    class="quantity form-control" type="number" min="1"
                                                    max="<?php echo $stock; ?>">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </div>
                                        <?php echo '<button type="button" name="add_cart" data-productname="' . $details['product_name'] . '" data-price="' . $sellerProductPrice . '" data-slug="' . $details['slug'] . '" data-photo="' . $details['photo'] . '" data-productid="' . $details['product_id'] . '"  data-sellerid="' . $vendorId . '" class="btn-details-cart-button add_cart"><i class="w-icon-cart"></i>&nbsp;<span>Add to Cart</span></button>'; ?>


                                    </div>
                                </div>

                                <?php }}?>

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a data-href="<?php echo WEB_URL . 'item/' . $details['slug']; ?>"
                                                href="https://www.facebook.com/sharer/sharer.php?u=<?php echo WEB_URL . 'item/' . $details['slug']; ?>&amp;src=sdkpreparse"
                                                class="social-icon social-facebook w-icon-facebook"></a>

                                            <a href="https://twitter.com/intent/tweet?text=<?php echo WEB_URL . 'item/' . $details['slug']; ?>"
                                                class="social-icon social-twitter w-icon-twitter"></a>

                                            <a href="https://api.whatsapp.com/send?&text=*<?php echo $details['product_name']; ?>*

To purchase this product click here 👉 <?php echo WEB_URL . 'item/' . $details['slug']; ?>"
                                                class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&summary=youtube&url=<?php echo WEB_URL . 'item/' . $details['slug']; ?>"
                                                class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        <?php if (false) {?><a href="#"
                                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a><?php }?>
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


                            <?php if (false) {?>
                            <li class="nav-item">
                                <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                            </li>
                            <?php }?>
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

                                <?php if ($details['policy'] == '0') {?>
                                <p>If order, once placed, can be cancelled until the seller processes it.
                                    Refund or Replacement is not applicable on this product, See The Return Policy.
                                    For any queries, do reach out to Customer Care.</p>
                                <?php }?>
                                <?php if ($details['policy'] == '7') {?>
                                <p>If order, once placed, can be cancelled until the seller processes it.
                                    This Product is eligible for Return and Replacement policy, within 7 days of
                                    delivery.
                                    For any queries, do reach out to Customer Care.and Read Return Policy</p>
                                <?php }?>


                            </div>

                            <div class="tab-pane" id="product-tab-vendor">
                                <div class="row p-3">
                                    <p><?php echo $details['description']; ?></p>
                                </div>

                            </div>


                        </div>
                    </div>

                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title"> Products related to this item</h4>
                            <a style="text-decoration:none;" href="#"
                                class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                Products<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                            <?php
if (is_array($relatedProducts) && count($relatedProducts) > 0) {
    foreach ($relatedProducts as $val) {
        $product = strlen($val['name']) > 130 ? substr($val['name'], 0, 130) . " ..." : $val['name'];
        $sellerProductPriceValue = getSellerPrice($val['id']);
        $countSellerProductQty = getCountSellerProduct($val['id']);
        ?>
                            <div style="" class="product-wrap p-2 shadow-sm">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <center><a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:140px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH ?>/loader.svg"
                                                    data-src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a></center>
                                        <div class="product-action-vertical">

                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>


                                        </div><input type="hidden" name="quantity" class="form-control quantity"
                                            id="<?php echo $val['id']; ?>" /><br />

                                        <?php if ($countSellerProductQty >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPriceValue) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPriceValue) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPriceValue) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php }?>
                                        <?php } else {?>
                                        <?php if ($val['previous_price'] > $val['price']) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php }}?>

                                    </figure>
                                    <div class="product-details">
                                        <h4 title="<?php echo $val['name']; ?>" class="product-name"><a
                                                href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"><?php echo $product; ?></a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"
                                                class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <?php if ($countSellerProductQty >= 1) {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPriceValue); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                        </div>
                                        <?php } else {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                        </div>
                                        <?php }?>
                                        <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                                    </div>
                                </div>
                            </div>
                            <?php
}
}
?>
                        </div>
                    </section>

                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h3 class="title"> Customer who viewed this item also viewed</h3>
                            <a style="text-decoration:none;" href="#"
                                class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                Products<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div class="row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                            <?php
if (is_array($relatedProductsbyBrand) && count($relatedProductsbyBrand) > 0) {
    foreach ($relatedProductsbyBrand as $val) {
        $product = strlen($val['name']) > 200 ? substr($val['name'], 0, 200) . " ..." : $val['name'];
        $sellerProductPriceValue = getSellerPrice($val['id']);
        $countSellerProductQty = getCountSellerProduct($val['id']);
        ?>
                            <div style="" class="product-wrap p-2 shadow-sm">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <center><a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:140px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH ?>/loader.svg"
                                                    data-src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a></center>
                                        <div class="product-action-vertical">

                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>


                                        </div><input type="hidden" name="quantity" class="form-control quantity"
                                            id="<?php echo $val['id']; ?>" /><br />

                                        <?php if ($countSellerProductQty >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPriceValue) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPriceValue) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPriceValue) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php }?>
                                        <?php } else {?>
                                        <?php if ($val['previous_price'] > $val['price']) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php }}?>

                                    </figure>
                                    <div class="product-details">
                                        <h4 style="line-height:1.7;" title="<?php echo $val['name']; ?>"
                                            class="product-name"><a
                                                href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"><?php echo $product; ?></a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"
                                                class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <?php if ($countSellerProductQty >= 1) {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPriceValue); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                        </div>
                                        <?php } else {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                        </div>
                                        <?php }?>
                                        <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
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
					<div class="widget widget-products">
                            <div class="title-link-wrapper mb-2">
                                <h4 class="title title-link font-weight-bold">More Products from Seller</h4>
                            </div>

                            <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                <div class="widget-col">
                                    <?php

include 'db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");
// $fields="a.*,b.name as product_name,b.photo as product_photo,b.slug,b.id as productid";
$sql = "SELECT a.*,b.name,b.photo,b.slug FROM `vendor_product` `a` LEFT JOIN `products` `b` ON `a`.`pid`=`b`.`id` where vendor_id='$vendorId' and pid!='$pid' order by price asc limit 4";
// $sql = "SELECT *  FROM `vendor_product` where vendor_id='$vendorId' order by price asc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $row['slug']; ?>">
                                                <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>"
                                                    alt="<?php echo $row['name']; ?>" width="100" height="113" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a
                                                    href="<?php echo WEB_URL . 'item/' . $row['slug']; ?>"><?php echo $row['name']; ?></a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-price">Rs&nbsp;<?php echo $row['price']; ?></div>
                                        </div>
                                    </div>
                                    <?php
}

    $conn->close();
}
?>

                                </div>
                            </div>
                        </div>
                        <div class="widget widget-icon-box mb-6">
                            <div style="cursor:pointer;"
                                onclick="window.location.href='<?php echo WEB_URL . 'same-day-delivery' ?>'"
                                class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="w-icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Same Day Delivery</h4>
                                </div>
                            </div>
                            <div style="cursor:pointer;"
                                onclick="window.location.href='<?php echo WEB_URL . 'free-shipping' ?>'"
                                class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="w-icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Free Shipping</h4>
                                </div>
                            </div>
                            <div style="cursor:pointer;"
                                onclick="window.location.href='<?php echo WEB_URL . 'secure-payment' ?>'"
                                class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="w-icon-bag"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Secure Payment</h4>
                                </div>
                            </div>
                            <div style="cursor:pointer;"
                                onclick="window.location.href='<?php echo WEB_URL . 'money-back-guarantee' ?>'"
                                class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="w-icon-money"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Money Back Guarantee</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End of Widget Icon Box -->
                        <?php if ($count_item > 1) {?>
                        <div class="widget mb-6 card">
                            <div class="card-header">Other Sellers on <?php echo SITE_NAME; ?></div>
                            <ul class="list-group list-group-flush">
                                <?php

    include 'db.php';
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn, "utf8");
    $fields = "a.*,b.shop_name as shopname";
    $sql = "SELECT $fields FROM `vendor_product` `a` INNER JOIN `seller` `b` ON `a`.`vendor_id`=`b`.`id` where pid='$pid' and vendor_id!='$vendorId' order by price asc";
//$sql = "SELECT count(a.vendor_id) as vendorIDfromdetails, `a`.`price`, `b`.* FROM `vendor_product` `a` INNER JOIN `products` `b` ON `a`.`pid`=`b`.`id` WHERE `slug` = 'saffola-gold-pro-healthy-lifestyle-refined-cooking-oil.html' ORDER BY `a.price` ASC;

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <p style="color:#B12704!important;font-size:18px;"><i
                                                    class="fa fa-inr"></i>&nbsp;<?php echo getNumberFormat($row['price']); ?>
                                            </p>
                                            <p style="color:#000!important;font-size:14px;">Sold
                                                by:&nbsp;<?php echo $row['shopname']; ?></p>
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
                        <?php }?>
                        <div class="widget widget-banner mb-9">
                            <?php
if (is_array($productDetailsRight) && count($productDetailsRight) > 0) {
    foreach ($productDetailsRight as $val) {
        ?>
                            <div onclick="window.location.href='<?php echo $val['link']; ?>'" style="cursor:pointer;"
                                class="banner banner-fixed br-sm">
                                <figure>
                                    <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>"
                                        alt="<?php echo SITE_NAME; ?>" width="266" height="220"
                                        style="background-color: #1D2D44;" />
                                </figure>
                                <div class="banner-content">
                                    <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                        <?php echo $val['discount']; ?><sup class="font-weight-bold">%</sup><sub
                                            class="font-weight-bold text-uppercase ls-25">Off</sub>
                                    </div>
                                    <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                        Ultimate Sale</h4>
                                </div>
                            </div>
                            <?php
}
}
?>

                        </div>
                        <!-- End of Widget Banner -->

                        
                    </div>
                </div>
                <!-- End of Main Content -->
                <?php if (false) {?>
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
                                        <img src="<?php echo WEB_PATH_FRONT; ?>images/shop/banner3.jpg" alt="Banner"
                                            width="266" height="220" style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">Off</sub>
                                        </div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
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
if (is_array($allProduct) && count($allProduct) > 0) {
    foreach ($allProduct as $val) {
        ?>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                    <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                        alt="<?php echo $row['name']; ?>" width="100" height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a
                                                        href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"><?php echo $val['name']; ?></a>
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
                <?php }?>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->