<script>
window.addEventListener('load', function() {
    var allimages = document.getElementsByTagName('img');
    for (var i = 0; i < allimages.length; i++) {
        if (allimages[i].getAttribute('data-src')) {
            allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
        }
    }
}, false)
</script>
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
<style>
@media (max-width:576px) {
    #slider {
        width: 100%;

    }

}

@media (max-width : 450px) {
    .intro-slider {
        max-width: 100%;
        min-height: 320px;
    }
}
</style>
<!-- Start of Main-->
<main style="background-color: #f1f3f6;width:100%;" class="main">
    <section class="intro-section">
        <!-- Start of .owl-carousel -->
        <div class="owl-carousel owl-theme custom-test">
            <?php
            if (is_array($allSlider) && count($allSlider) > 0) {
                foreach ($allSlider as $val) {
                    ?>
            <div class="item">
                <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['slider_pic']; ?>" alt="">
            </div>
            <?php 
                } 
            }
            ?>
        </div>
        <!-- End of .owl-carousel -->
    </section>
    <!-- End of .intro-section  -->



    <div class="container mt-2">

        <div style="background-color:none;" class="row deals-wrapper mb-8">
            <div class="col-lg-12  bg-white mb-4">
                <div class=" h-100 br-sm">

                    <div style="position: relative;
    margin-bottom: 0.8rem;
    padding: 0.8rem 0;" class="row pb-1 mb-4">
                        <h2 class="col-6 title ls-normal mb-0">Best Offers</h2>
                        <span class="col-6 " style="float:right;"><a href="<?php echo WEB_URL . 'dailydeals' ?>"
                                class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a>
                        </span>
                    </div>
                    <hr>

                    <div class="owl-carousel owl-theme owl-nav-top owl-nav-lg row cols-1 gutter-no" data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'margin': 20,
                                'items': 1
                            }">
                        <div class="tab-content product-wrapper">
                            <div class="tab-pane active pt-4" id="tab1-1">
                                <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                    <?php
if (is_array($dailydeals) && count($dailydeals) > 0) {
    foreach ($dailydeals as $val) {

        $product = strlen($val['name']) > 20 ? substr($val['name'], 0, 20) . " ..." : $val['name'];
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
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
                                                <?php if ($countSellerProduct >= 1) {?>
                                                <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                                <div class="product-label-group">
                                                    <label class="product-label label-discount">
                                                        <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                        <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                                <?php if ($countSellerProduct >= 1) {?>
                                                <div class="product-price">
                                                    <ins
                                                        class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                    <del
                                                        class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                                </div>
                                                <?php } else {?>
                                                <div class="product-price">
                                                    <ins class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
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
                            </div>
                            <!-- End of Tab Pane -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Deals Wrapper -->

        <div class="row category-banner-wrapper  pt-2 pb-2">
            <?php
if (is_array($homeFashion) && count($homeFashion) > 0) {
    foreach ($homeFashion as $val) {
        ?>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed category-banner-1 br-xs">
                    <figure>
                        <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>"
                            alt="Category Banner" width="610" height="200" style="background-color: #3B4B48;" />
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 style="color:<?php echo $val['text_color']; ?>"
                            class="banner-subtitle font-weight-bold text-uppercase"><?php echo $val['short_title']; ?>
                        </h5>
                        <h3 style="color:<?php echo $val['text_color']; ?>"
                            class="banner-title font-weight-bolder text-capitalize text-white">
                            <?php echo $val['long_title']; ?></h3>
                        <a href="<?php echo $val['link']; ?>" class="btn btn-link btn-icon-right">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php }
}?>

        </div>
        <!-- End of Category Banner Wrapper -->

    </div>

    <section class="category-section top-category bg-grey pt-5 pb-5 ">
        <div class="container pb-2">
            <div class="mb-3 mt-3 bg-white p-2" style="">

                <div style="position: relative;margin-bottom: 0.8rem;padding: 0.8rem 0;" class="row pb-1 mb-4">
                    <h2 class="col-6 title ls-normal mb-0">Categories </h2>
                    <span class="col-6 " style="float:right;"><a href="<?php echo WEB_URL . 'shop' ?>"
                            class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a>
                    </span>
                </div>
                <hr>

                <div class="row cols-lg-6 cols-md-5 cols-sm-3 cols-3 p-3">

                    <?php
if (is_array($allCategory) && count($allCategory) > 0) {
    foreach ($allCategory as $val) {
        ?>
                    <div class="category-wrap">
                        <div class="category ">
                            <figure class="category-media">
                                <a href="<?php echo WEB_URL . 'category?cat=' . $val['id']; ?>">
                                    <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                        alt="<?php echo $val['name']; ?>" style="height:84px;width:84px;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a style="font-size:11px;"
                                        href="<?php echo WEB_URL . 'category?cat=' . $val['id']; ?>"><?php echo $val['name']; ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php
}
}
?>
                </div>
            </div>
        </div>
    </section>
    <!-- End of .category-section top-category -->

    <div class="container">

        <div class="mb-3 mt-3 bg-white p-2" style="">
            <div style="position: relative;margin-bottom: 0.8rem;padding: 0.8rem 0;" class="row pb-1 mb-4">
                <h2 class="col-6 title ls-normal mb-0">Grocery </h2>
                <span class="col-6 " style="float:right;"><a href="<?php echo WEB_URL . 'shop' ?>"
                        class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a> </span>
            </div>
            <hr>


            <!-- End of Tab -->
            <div class="tab-content product-wrapper ">
                <div class="tab-pane active pt-4" id="tab1-1">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        <?php
if (is_array($groceryProduct) && count($groceryProduct) > 0) {
    foreach ($groceryProduct as $val) {

        $product = strlen($val['name']) > 20 ? substr($val['name'], 0, 20) . " ..." : $val['name'];
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
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
                                        <a href="#" class="btn-product-icon w-icon-heart" title="Add to wishlist"></a>


                                    </div><input type="hidden" name="quantity" class="form-control quantity"
                                        id="<?php echo $val['id']; ?>" /><br />

                                    <?php if ($countSellerProduct >= 1) {?>
                                    <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">
                                            <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                            <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                    <?php if ($countSellerProduct >= 1) {?>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
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
                </div>
                <!-- End of Tab Pane -->

            </div>
            <!-- End of Tab Content -->
        </div>

        <div class="mb-3 mt-3 bg-white p-2" style="">

            <div style="position: relative;margin-bottom: 0.8rem;padding: 0.8rem 0;" class="row pb-1 mb-4">
                <h2 class="col-6 title ls-normal mb-0">New Arrivals </h2>
                <span class="col-6 " style="float:right;"><a href="<?php echo WEB_URL . 'shop' ?>"
                        class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a> </span>
            </div>
            <hr>

            <!-- End of Tab -->
            <div class="tab-content product-wrapper ">
                <div class="tab-pane active pt-4" id="tab1-1">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        <?php
if (is_array($newArrivalProduct) && count($newArrivalProduct) > 0) {
    foreach ($newArrivalProduct as $val) {

        $product = strlen($val['name']) > 20 ? substr($val['name'], 0, 20) . " ..." : $val['name'];
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
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


                                    </div>
                                    <?php if ($countSellerProduct >= 1) {?>
                                    <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">
                                            <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                            <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                    <?php if ($countSellerProduct >= 1) {?>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
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
                </div>
                <!-- End of Tab Pane -->

            </div>
            <!-- End of Tab Content -->
        </div>

        <div class="mb-3 mt-3 bg-white p-2" style="">

            <div style="position: relative;margin-bottom: 0.8rem;padding: 0.8rem 0;" class="row pb-1 mb-4">
                <h2 class="col-9 title ls-normal mb-0">Best Price on Fashion </h2>
                <span class="col-3" style="float:right;"><a href="<?php echo WEB_URL . 'shop' ?>"
                        class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a> </span>
            </div>
            <hr>

            <!-- End of Tab -->
            <div class="tab-content product-wrapper ">
                <div class="tab-pane active pt-4" id="tab1-1">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        <?php
if (is_array($fashionProduct) && count($fashionProduct) > 0) {
    foreach ($fashionProduct as $val) {

        $product = strlen($val['name']) > 20 ? substr($val['name'], 0, 20) . " ..." : $val['name'];
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
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
                                    </div>
                                    <?php if ($countSellerProduct >= 1) {?>
                                    <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">
                                            <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                            <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                    <?php if ($countSellerProduct >= 1) {?>
                                    <div class="product-price">
                                        <ins
                                            class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
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
                </div>
                <!-- End of Tab Pane -->

            </div>
            <!-- End of Tab Content -->
        </div>


        <div class="row category-cosmetic-lifestyle  mb-5">
            <?php
if (is_array($homeFashion) && count($homeFashion) > 0) {
    foreach ($homeFashion as $val) {
        ?>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed category-banner-1 br-xs">
                    <figure>
                        <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>"
                            alt="Category Banner" width="610" height="200" style="background-color: #3B4B48;" />
                    </figure>
                    <div class="banner-content y-50 pt-1">
                        <h5 style="color:<?php echo $val['text_color']; ?>"
                            class="banner-subtitle font-weight-bold text-uppercase"><?php echo $val['short_title']; ?>
                        </h5>
                        <h3 style="color:<?php echo $val['text_color']; ?>"
                            class="banner-title font-weight-bolder text-capitalize text-white">
                            <?php echo $val['long_title']; ?></h3>
                        <a href="<?php echo $val['link']; ?>" class="btn btn-link btn-icon-right">Shop Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php }
}?>
        </div>
        <!-- End of Category Cosmetic Lifestyle -->
        <div class="mb-3 mt-3 bg-white p-2" style="">
            <div class="product-wrapper-1  mb-5">

                <div style="position: relative;margin-bottom: 0.8rem;padding: 0.8rem 0;" class="row pb-1 mb-4">
                    <h2 class="col-9 title ls-normal mb-0">Skin and Beauty </h2>
                    <span class="col-3 " style="float:right;"><a href="<?php echo WEB_URL . 'shop' ?>"
                            class="font-size-normal font-weight-bold ls-25 mb-0 text-white viewallproduct">More</a>
                    </span>
                </div>
                <hr>
                <div class="row">
                    <?php
if (is_array($ClothingApparel) && count($ClothingApparel) > 0) {
    foreach ($ClothingApparel as $val) {
        ?>
                    <div class="col-lg-3 col-sm-4 mb-4">
                        <div class="banner h-100 br-sm" style="background-image: url(<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>);
                                background-color: #ebeced;">
                            <div class="banner-content content-top">
                                <h5 class="banner-subtitle font-weight-normal mb-2"><?php echo $val['short_title']; ?>
                                </h5>
                                <hr class="banner-divider bg-dark mb-2">
                                <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                                    <?php echo $val['long_title']; ?><br> <span
                                        class="font-weight-normal text-capitalize">Collection</span>
                                </h3>
                                <a href="<?php echo $val['link']; ?>"
                                    class="btn btn-dark btn-outline btn-rounded btn-sm">shop Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
}}
?>
                    <!-- End of Banner -->
                    <div class="col-lg-9 col-sm-8">
                        <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-2" data-owl-options="{
                                'nav': false,
                                'dots': true,
                                'margin': 20,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    },
                                    '1200': {
                                        'items': 4
                                    }
                                }
                            }">
                            <?php
if (is_array($beautyProducts) && count($beautyProducts) > 0) {
    foreach ($beautyProducts as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                            <div class="product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                            <img style="height:140px;width:auto;"
                                                src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                alt="<?php echo $val['name']; ?>" alt="Product" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                        </div>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php } else {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $val['price']) * (100 / $val['previous_price'])), 0); ?>
                                                % Off
                                                <?php }?>
                                            </label>
                                        </div>
                                        <?php }?>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a
                                                href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>"><?php echo $val['name']; ?></a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Product Wrapper 1 -->

        <?php
if (is_array($HomeDisplayAds) && count($HomeDisplayAds) > 0) {
    foreach ($HomeDisplayAds as $val) {
        ?>

        <div class="banner banner-fashion  br-sm mb-9" style="background-image: url(<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>);
                    background-color: #383839;">
            <div class="banner-content align-items-center">
                <div class="content-left d-flex align-items-center mb-3">
                    <div style="color:<?php echo $val['text_color']; ?>;"
                        class="banner-price-info font-weight-bolder text-uppercase lh-1 ls-25">
                        <?php echo $val['discount']; ?>% Off
                        <?php if (false) {?><sup class="font-weight-bold">%</sup><sub
                            class="font-weight-bold ls-25">Off</sub><?php }?>
                    </div>
                    <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                </div>
                <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                    <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                        <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">
                            <?php echo $val['short_title']; ?></h3>
                        <p class="text-white mb-0"><?php echo $val['long_title']; ?></p>
                    </div>
                    <a href="<?php echo $val['link']; ?>"
                        class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!-- End of Banner Fashion -->
        <?php
}
}
?>
        <!-- End of Brands Wrapper -->
        <div class="deals-wrapper  mb-8">
            <div class=" row mb-3 mt-3 bg-white p-2" style="">

                <div class="col-lg-3 mb-4  bg-white">
                    <div class="widget widget-products widget-products-bordered h-100 shadow-sm">
                        <div class="widget-body br-sm h-100 p-3">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Hot</h4>
                            <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3" data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                                <div class="product-widget-wrap">
                                    <?php
if (is_array($hotProduct) && count($hotProduct) > 0) {
    foreach ($hotProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>

                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                                        </div>
                                    </div>
                                    <?php
}
}
?>

                                </div>
                                <div class="product-widget-wrap">

                                    <?php
if (is_array($nexthotProduct) && count($nexthotProduct) > 0) {
    foreach ($nexthotProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>

                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
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

                <div class="col-lg-3 mb-4  bg-white">
                    <div class="widget widget-products widget-products-bordered h-100 shadow-sm">
                        <div class="widget-body br-sm h-100 p-3">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Trending</h4>
                            <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3" data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                                <div class="product-widget-wrap">
                                    <?php
if (is_array($trendingProduct) && count($trendingProduct) > 0) {
    foreach ($trendingProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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

                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>
                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                                        </div>
                                    </div>
                                    <?php
}
}
?>

                                </div>
                                <div class="product-widget-wrap">

                                    <?php
if (is_array($nexttrendingProduct) && count($nexttrendingProduct) > 0) {
    foreach ($nexttrendingProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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

                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>
                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
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

                <div class="col-lg-3 mb-4  bg-white">
                    <div class="widget widget-products widget-products-bordered h-100 shadow-sm">
                        <div class="widget-body br-sm h-100 p-3">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">New</h4>
                            <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3" data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                                <div class="product-widget-wrap">
                                    <?php
if (is_array($allProduct) && count($allProduct) > 0) {
    foreach ($allProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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

                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>
                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                                        </div>
                                    </div>
                                    <?php
}
}
?>

                                </div>
                                <div class="product-widget-wrap">

                                    <?php
if (is_array($nextallProduct) && count($nextallProduct) > 0) {
    foreach ($nextallProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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

                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
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
                                    <?php
}
}
?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4  bg-white">
                    <div class="widget widget-products widget-products-bordered h-100 shadow-sm">
                        <div class="widget-body br-sm h-100 p-3">
                            <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Sale</h4>
                            <div class="owl-carousel owl-theme owl-nav-top row cols-lg-1 cols-md-3" data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 1
                                        }
                                    }
                                }">
                                <div class="product-widget-wrap">
                                    <?php
if (is_array($saleProduct) && count($saleProduct) > 0) {
    foreach ($saleProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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
                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>

                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                                        </div>
                                    </div>
                                    <?php
}
}
?>

                                </div>
                                <div class="product-widget-wrap">

                                    <?php
if (is_array($nextsaleProduct) && count($nextsaleProduct) > 0) {
    foreach ($nextsaleProduct as $val) {
        $sellerProductPrice = getSellerPrice($val['id']);
        $countSellerProduct = getCountSellerProduct($val['id']);
        ?>
                                    <div class="product product-widget">
                                        <figure class="product-media">
                                            <a href="<?php echo WEB_URL . 'item/' . $val['slug']; ?>">
                                                <img style="height:100px;width:auto;"
                                                    src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                                    alt="<?php echo $val['name']; ?>" />
                                            </a>
                                        </figure>
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <?php if ($val['previous_price'] > $sellerProductPrice) {?>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">
                                                <?php if (round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0) >= '0') {?>
                                                <?php echo round((($val['previous_price'] - $sellerProductPrice) * (100 / $val['previous_price'])), 0); ?>
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

                                            <?php if ($countSellerProduct >= 1) {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php } else {?>
                                            <div class="product-price">
                                                <ins
                                                    class="new-price">Rs&nbsp;<?php echo getNumberFormat($val['price']); ?></ins>
                                                </br><del
                                                    class="old-price">Rs&nbsp;<?php echo getNumberFormat($val['previous_price']); ?></del>
                                            </div>
                                            <?php }?>
                                            <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $val['price'] . '" data-slug="' . $val['slug'] . '" data-photo="' . $val['photo'] . '" data-productid="' . $val['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
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


            </div>

            <div class="bg-white owl-carousel owl-theme row cols-md-4 cols-sm-3 cols-1icon-box-wrapper  br-sm mt-6 mb-6"
                data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'loop': false,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                }">
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'same-day-delivery' ?>'"
                    class="icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Same Day Delivery</h4>

                    </div>
                </div>
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'free-shipping' ?>'"
                    class="icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping</h4>

                    </div>
                </div>
                <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'secure-payment' ?>'"
                    class="icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-payment">
                        <i class="w-icon-bag"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>

                    </div>
                </div>
                <div style="cursor:pointer;"
                    onclick="window.location.href='<?php echo WEB_URL . 'money-back-guarantee' ?>'"
                    class="icon-box icon-box-side icon-box-primary icon-box-money">
                    <span class="icon-box-icon icon-money">
                        <i class="w-icon-money"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>

                    </div>
                </div>

            </div>
            <!-- End of Iocn Box Wrapper -->
            <div class="bg-white" style="">
                <div class="title-link-wrapper pb-1 mb-4 p-4">
                    <h2 class="title ls-normal mb-0">Brands</h2>

                </div>
                <div class="owl-carousel owl-theme brands-wrapper mb-9 row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2 "
                    data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'margin': 0,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        },
                        '1200': {
                            'items': 6
                        }
                    }
                }">
                    <?php
if (is_array($brand_list) && count($brand_list) > 0) {
    foreach ($brand_list as $val) {?>
                    <div class="brand-col m-4">
                        <figure class="">
                            <img style="" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['photo']; ?>"
                                alt="<?php echo $val['brand']; ?>" />
                        </figure>

                    </div>
                    <?php }
}
?>
                </div>
            </div>


        </div>


    </div>
    <!--End of Catainer -->
</main>
<!-- End of Main -->
<script>
$(document).ready(function() {
    $('.custom-test').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 1,
        margin: 0,
        animateOut: 'slideOutDown',
        smartSpeed: 450,
        responsive: {
            0: {
                animateIn: 'flipInX',
                stagePadding: 30
            },
            600: {
                animateIn: 'zoomIn',
                stagePadding: 0
            }
        }
    });
});
</script>