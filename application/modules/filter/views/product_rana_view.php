<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
star {
    color: red;
    font-weight: bold;
}

.error_prefix {
    color: red;
}

.pagination {
    float: right;
}

.pagination li a {
    padding: 6px 12px;
    border: 1px solid #007bff;
    border-radius: 3px;
    margin: 2px;
}

.pagination li a:hover {
    text-decoration: none;
    background-color: #007bff;
    border-radius: 3px;
    color: #fff;
}

.pagination li a.current_page {
    background-color: #007bff;
    color: #fff;
    padding: 6px 12px;
    border-radius: 3px margin:2px;

}

@-webkit-keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

@keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

.content-placeholder {
    display: inline-block;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-name: placeHolderShimmer;
    animation-name: placeHolderShimmer;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
    background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    -webkit-background-size: 800px 104px;
    background-size: 800px 104px;
    height: inherit;
    position: relative;
}

.post_data {
    padding: 24px;
    border: 1px solid #f9f9f9;
    border-radius: 5px;
    margin-bottom: 24px;
    box-shadow: 10px 10px 5px #eeeeee;
}
</style>
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
                                                value="<?php echo $row['id']; ?>">
                                            <?php echo ucfirst($row['name']); ?></label>
                                    </div>
                                    <?php
}
?>

                                </ul>
                            </div>
                            <!-- End of Categories -->
                            <?php if(false) { ?>
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
                            <?php } ?>
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

                    <div class="p-1 bg-light shadow-sm mb-4">
                        <form method="get" action="<?php echo WEB_URL . 'search?q=' ?>" class="input-group input-wrapper">
                            <input name="q" id="keywords" onkeyup="searchFilter();" type="search"
                                placeholder="Search your desired products..." aria-describedby="button-addon1"
                                class="form-control border-0 bg-light">
                            <button style="background-color:none;" class="btn btn-search" type="submit"><i
                                    style="background-color:none;" class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>


                    <!-- Loading Image -->
                    <div class="loading" style="display: none;">
                        <div class="content"><img src="<?php echo WEB_PATH_FRONT; ?>loader.gif" /></div>
                    </div>

                    <div id="load_data" class="row product-wrapper cols-xl-5 cols-lg-3 cols-md-4 cols-sm-3 cols-2">


                    </div>
                    <div id="load_data_message"></div>

                </div>
                <!-- End of Shop Main Content -->

                <!-- Start of Sidebar, Right-sidebar -->
                <aside class="shop-sidebar right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content">
                        <div class="widget widget-icon-box mb-6">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="w-icon-truck"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                    <p>For all orders over Rs 99</p>
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
                                    <img src="assets/images/shop/banner3.jpg" alt="Banner" width="266" height="220"
                                        style="background-color: #1D2D44;" />
                                </figure>
                                <div class="banner-content">
                                    <div class="banner-price-info font-weight-bolder text-white lh-1">
                                        40<sup class="font-weight-bold">%</sup><sub
                                            class="font-weight-bold text-uppercase">Off</sub>
                                    </div>
                                    <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                        Ultimate Sale</h4>
                                </div>
                            </div>
                        </div>
                        <!-- End of Widget Banner -->

                    </div>
                </aside>
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->




<!--
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->

<script>
$(document).ready(function() {

    var limit = 15;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit) {
        var output = '';
        for (var count = 0; count < limit; count++) {
            output += '<div class="post_data">';
            output +=
            '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
            output +=
                '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
            output += '</div>';
        }
        $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start) {
        $.ajax({
            url: "<?php echo base_url(); ?>filter/fetch",
            method: "POST",
            data: {
                limit: limit,
                start: start
            },
            cache: false,
            success: function(data) {
                if (data == '') {
                    $('#load_data_message').html(
                        '<h3 class="text-center text-danger">No More Products Found!</h3>');
                    action = 'active';
                } else {
                    $('#load_data').append(data);
                    $('#load_data_message').html("");
                    action = 'inactive';
                }
            }
        })
    }

    if (action == 'inactive') {
        action = 'active';
        load_data(limit, start);
    }

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action ==
            'inactive') {
            lazzy_loader(limit);
            action = 'active';
            start = start + limit;
            setTimeout(function() {
                load_data(limit, start);
            }, 1000);
        }
    });

});
</script>
<script>
$(document).ready(function() {

    filter_product(1);

    function filter_product(page) {
        $('#load_data').html('<div id="loading" style="" ></div>');
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
                $('#load_data').html(data.product_list);
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
            $('#load_data').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>