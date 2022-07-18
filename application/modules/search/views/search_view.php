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
<!-- Start of Main -->
<main class="main">

    <!-- Start of Page Content -->
    <div class="page-content mb-10">
        <?php
if (is_array($categoyHeaderAd) && count($categoyHeaderAd) > 0) {
    foreach ($categoyHeaderAd as $val) {
        ?>
        <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
            style="background-image: url(<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>); background-color: #FFC74E;">
            <div class="container banner-content">
                <h4 class="banner-subtitle font-weight-bold"><?php echo $val['long_title']; ?></h4>
                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">
                    <?php echo $val['short_title']; ?></h3>
                <a href="<?php echo $val['link']; ?>" style="background-color:<?php echo $val['text_color']; ?>;"
                    class="btn btn-rounded btn-icon-right">Discover
                    Now<i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
        <?php
}
}
?>
        <div class="container-fluid">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                            <div class="filter-actions">
                                <label>Filter :</label>
                                <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                            </div>
                            <!-- Start of Categories -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>All Categories</label></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <?php
foreach ($product_category->result_array() as $row) {
    ?>
                                    <div class="list-group-item checkbox">
                                        <label><input type="checkbox" class="select_filter category"
                                                value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></label>
                                    </div>
                                    <?php
}
?>

                                </ul>
                            </div>
                            <!-- End of Categories -->

                            <!-- Start of Brand -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>All Brand</label></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <?php
foreach ($product_brand->result_array() as $row) {
    ?>
                                    <div class="list-group-item checkbox">
                                        <label><input type="checkbox" class="select_filter brand"
                                                value="<?php echo $row['id']; ?>"> <?php echo $row['brand']; ?></label>
                                    </div>
                                    <?php
}
?>

                                </ul>
                            </div>
                            <!-- End of Brand -->

                            <!-- Start of Price Range -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Price Range</label></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <input type="hidden" id="hidden_minimum_price" value="0" />
                                    <input type="hidden" id="hidden_maximum_price" value="99999" />
                                    <p id="price_show">0 - 99999 Rs</p>
                                    <div id="price_range"></div>
                                </ul>
                            </div>
                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Price</label></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">Rs 0.00 - Rs 100.00</a></li>
                                        <li><a href="#">Rs 100.00 - Rs 200.00</a></li>
                                        <li><a href="#">Rs 200.00 - Rs 300.00</a></li>
                                        <li><a href="#">Rs 300.00 - Rs 500.00</a></li>
                                        <li><a href="#">Rs 500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" id="hidden_minimum_price" value="0"
                                            class="min_price text-center">
                                        <span class="delimiter">-</span>
                                        <input type="number" id="hidden_maximum_price" value="99999"
                                            class="max_price text-center"><a href="#"
                                            class="btn btn-primary btn-rounded">Go</a>
                                        <p id="price_show">0 - 99999 Rs</p>
                                        <div id="price_range"></div>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->
                            <!-- End of Price Range -->
                            <?php if (false) {?>
                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Price</label></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">Rs 0.00 - Rs 100.00</a></li>
                                        <li><a href="#">Rs 100.00 - Rs 200.00</a></li>
                                        <li><a href="#">Rs 200.00 - Rs 300.00</a></li>
                                        <li><a href="#">Rs 300.00 - Rs 500.00</a></li>
                                        <li><a href="#">Rs 500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                            placeholder="$min"><span class="delimiter">-</span><input type="number"
                                            name="max_price" class="max_price text-center" placeholder="$max"><a
                                            href="#" class="btn btn-primary btn-rounded">Go</a>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Size</label></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->


                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Color</label></h3>
                                <ul class="widget-body filter-items item-check">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#">Grey</a></li>
                                    <li><a href="#">Orange</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->
                            <?php }?>
                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Shop Main Content -->
                <div class="main-content">
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                    class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select id="sortBy" onchange="searchFilter();" class="form-control">
                                    <option value="">Sort by Title</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                    <?php if (false) {?>
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                    <?php }?>
                                </select>

                            </div>
                        </div>

                    </nav>
                    <form autocomplete="off" method="get" action="<?php echo WEB_URL . 'search?q=' ?>">
                        <div class="p-1 bg-light shadow-sm mb-4">
                            <div class="input-group input-wrapper">
                                <input value="<?php if (isset($_GET['q'])) {echo $_GET['q'];}?>" id="keywords" name="q"
                                    onkeyup="searchFilter();" type="search"
                                    placeholder="Search your desired products..." aria-describedby="button-addon1"
                                    class="form-control border-0 bg-light">
                                <button style="background-color:none;" class="btn btn-search" type="submit"><i
                                        style="background-color:none;" class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($_GET['q'])) {?>
                    <h4 class="text-secondary p-3">Showing selected result. See all results for "<a
                            class="text-primary font-weight-bold" href="#"><?php echo $_GET['q']; ?></a>". </h4>
                    <?php }?>
                    <!-- Loading Image -->
                    <div class="loading" style="display: none;">
                        <div class="content"><img src="<?php echo WEB_PATH_FRONT; ?>loader.gif" /></div>
                    </div>
                    <div id="dataLists" class="product-wrapper row cols-xl-5 cols-lg-3 cols-md-4 cols-sm-3 cols-2 p-2">

                        <?php

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 20;
$offset = ($pageno - 1) * $no_of_records_per_page;
include './db.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
if (isset($_GET['q'])) {
    $cat = $_GET['q'];

    $total_pages_sql = "SELECT COUNT(*) FROM products where category_id='$cat'";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
}
if (is_array($productsbycategory) && count($productsbycategory) > 0) {
    foreach ($productsbycategory as $row) {
        // $pageno=null;
        // $total_pages=null;
        $product = strlen($row['name']) > 20 ? substr($row['name'], 0, 20) . " ..." : $row['name'];
        $sellerProductPrice = getSellerPrice($row['id']);
        $countSellerProduct = getCountSellerProduct($row['id']);
        ?>
                        <div class="product-wrap p-2 shadow-sm">
                            <div class="product text-center">
                                <center>
                                    <figure class="product-media">
                                        <a href="<?php echo WEB_URL . 'item/' . $row['slug']; ?>">
                                            <img style="height:140px;width:auto;"
                                                src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>"
                                                alt="<?php echo $row['name']; ?>" />
                                        </a>
                                    </figure>
                                </center>
                                <div class="product-details">

                                    <h3 class="product-name">
                                        <a style="text-decoration:none;"
                                            href="<?php echo WEB_URL . 'item/' . $row['slug']; ?>"><?php echo $row['name']; ?></a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <?php if ($countSellerProduct >= 1) {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($sellerProductPrice); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($row['previous_price']); ?></del>
                                        </div>
                                        <?php } else {?>
                                        <div class="product-price">
                                            <ins
                                                class="new-price">Rs&nbsp;<?php echo getNumberFormat($row['price']); ?></ins>
                                            <del
                                                class="old-price">Rs&nbsp;<?php echo getNumberFormat($row['previous_price']); ?></del>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <?php if (false) {echo ' <button style="color:#fff;background-color:#336699;padding:4px;" type="button" name="add_cart" class="btn add_cart" data-productname="' . $product . '" data-price="' . $row['price'] . '" data-slug="' . $row['slug'] . '" data-photo="' . $row['photo'] . '" data-productid="' . $row['id'] . '" /><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Add to Cart</button>';}?>
                            </div>
                            <?php if ($countSellerProduct >= 1) {?>
                            <div class="product-label-group">
                                <label class="product-label label-discount">
                                    <?php if (round((($row['previous_price'] - $sellerProductPrice) * (100 / $row['previous_price'])), 0) >= '0') {?>
                                    <?php echo round((($row['previous_price'] - $sellerProductPrice) * (100 / $row['previous_price'])), 0); ?>
                                    % Off
                                    <?php }?>
                                </label>
                            </div>
                            <?php } else {?>
                            <div class="product-label-group">
                                <label class="product-label label-discount">
                                    <?php if (round((($row['previous_price'] - $row['price']) * (100 / $row['previous_price'])), 0) >= '0') {?>
                                    <?php echo round((($row['previous_price'] - $row['price']) * (100 / $row['previous_price'])), 0); ?>
                                    % Off
                                    <?php }?>
                                </label>
                            </div>
                            <?php }?>
                        </div>
                        <?php }}?>
                        <!-- Render pagination links -->

                        <?php if (false) {?>
                        <nav>
                            <ul class="pagination justify-content-center mt-4">
                                <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                                <li class="page-item <?php if ($pageno <= 1) {echo 'disabled';}?>">
                                    <a class="page-link"
                                        href="<?php if ($pageno <= 1) {echo '#';} else {echo "?pageno=" . ($pageno - 1);}?>">Previous</a>
                                </li>
                                <li class="page-item <?php if ($pageno >= $total_pages) {echo 'disabled';}?>">
                                    <a class="page-link"
                                        href="<?php if ($pageno >= $total_pages) {echo '#';} else {echo "?pageno=" . ($pageno + 1);}?>">Next</a>
                                </li>
                                <li class="page-item"><a class="page-link"
                                        href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>
                        </nav>
                        <?php }?>


                    </div>
                    <br />



                    <style>
                    #loading {
                        text-align: center;
                        background: url('<?php echo base_url(); ?>uploads/loader.gif') no-repeat center;
                        height: 500px;
                    }
                    </style>
                    <div class="toolbox toolbox-pagination justify-content-between">

                        <?php if (false) {?>
                        <ul class="pagination">
                            <li class="prev disabled">
                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <i class="w-icon-long-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="next">
                                <a href="#" aria-label="Next">
                                    Next<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul><?php }?>
                    </div>
                </div>
                <!-- End of Shop Main Content -->

            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
$(document).ready(function() {

    filter_product(1);

    function filter_product(page) {
        $('.filter_product').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_product('brand');
        var category = get_product('category');
        $.ajax({
            url: "<?php echo base_url(); ?>filter/fetch_product_list/" + page,
            method: "POST",
            dataType: "JSON",
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                brand: brand,
                category: category
            },
            success: function(data) {
                // alert('success');
                $('.filter_product').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
            }
        })
    }

    function get_product(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_product(page);
    });

    $('.select_filter').click(function() {
        filter_product(1);
    });

    $('#price_range').slider({
        range: true,
        min: 0,
        max: 99999,
        values: [0, 99999],
        step: 500,
        stop: function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_product(1);
        }

    });

});
</script>

<script>
function searchFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    var category = $('#category').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('filter/ajaxPaginationData/'); ?>' + page_num,
        data: 'page=' + page_num + '&keywords=' + keywords + '&sortBy=' + sortBy + '&category=' + category,

        beforeSend: function() {
            $('.loading').show();
        },
        success: function(html) {
            $('.filter_product').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>