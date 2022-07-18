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
</style>
<?php
 include('Product.php');
$product = new Product();
$categories = $product->getCategories();
$brands = $product->getBrand();
// $materials = $product->getMaterial();
// $productSizes = $product->getProductSize();
$totalRecords = $product->getTotalProducts();
// include 'inc/header.php';

function getCatName($cid)
{
    include './db.php';
    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "SELECT name FROM categories where id='$cid'";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($catName);
        while ($stmt->fetch()) {

        }
    }
    return $catName;
}


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
<form method="post" id="search_form">  
<main class="main">

    <!-- Start of Page Content -->
    <div class="page-content mb-10">
			<?php
				if(is_array($categoyHeaderAd) && count($categoyHeaderAd) > 0) {
					foreach ($categoyHeaderAd as $val) {
					?>
                <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
                    style="background-image: url(<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $val['picture']; ?>); background-color: #FFC74E;">
                    <div class="container banner-content">
                        <h4 class="banner-subtitle font-weight-bold"><?php echo $val['long_title']; ?></h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10"><?php echo $val['short_title']; ?></h3>
                        <a href="<?php echo $val['link']; ?>" style="background-color:<?php echo $val['text_color']; ?>;" class="btn btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
				<?php
					}
				}
				?>
        <!-- End of Shop Banner -->
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
foreach ($categories as $key => $category) {
    $category_name = getCatName($category['category_id']);
    if (isset($_POST['category'])) {
        if (in_array($product->cleanString($category['category_id']), $_POST['category'])) {
            $categoryCheck = 'checked="checked"';
        } else {
            $categoryCheck = "";
        }
    }
    ?>
                                <li class="list-group-item">
                                    <div class="checkbox"><label><input type="checkbox"
                                                value="<?php echo $product->cleanString($category['category_id']); ?>"
                                                <?php echo @$categoryCheck; ?> name="category[]"
                                                class="sort_rang category"> <?php echo ucfirst($category_name); ?></label>
                                    </div>
                                </li>
                                <?php }?>

                                </ul>
                            </div>
                            <!-- End of Categories -->
							<!-- Start of Categories -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>All Categories</label></h3>
                                <ul class="widget-body filter-items search-ul">
                                  <?php 
					foreach ($brands as $key => $brand) {
						if(isset($_POST['brand'])) {
							if(in_array($product->cleanString($brand['brand']),$_POST['brand'])) {
								$brandChecked ='checked="checked"';
							} else {
								$brandChecked="";
							}
						}
					?>
					<li class="list-group-item">
						<div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($brand['brand']); ?>" <?php echo @$brandChecked; ?> name="brand[]" class="sort_rang brand"><?php echo ucfirst($brand['brand']); ?></label></div>
					</li>
					<?php } ?>

                                </ul>
                            </div>
                            <!-- End of Categories -->

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

                    <div class="p-1 bg-light shadow-sm mb-4">
                        <form method="get" action="<?php echo WEB_URL . 'search?q=' ?>" class="input-group input-wrapper">
                            <input id="keywords" onkeyup="searchFilter();" type="search"
                                placeholder="Search your desired products..." aria-describedby="button-addon1"
                                class="form-control border-0 bg-light">
                            <button style="background-color:none;" class="btn btn-search" type="submit"><i
                                    style="background-color:none;" class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="row product-wrapper cols-xl-5 cols-lg-3 cols-md-4 cols-sm-3 cols-2">
						<div id="results"></div>
					</div>
                    
                    <input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">


                   
                </div>
                <!-- End of Shop Main Content -->

            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
    <!-- End of Page Content -->
</main>
</form>
<!-- End of Main -->



 
<script type="text/javascript">
var totalRecord = 0;
var category = getCheckboxValues('category');
var brand = getCheckboxValues('brand');
var material = getCheckboxValues('material');
var size = getCheckboxValues('size');
var totalData = $("#totalRecords").val();
var sorting = getCheckboxValues('sorting');
$.ajax({
	type: 'POST',
	url: "<?php echo base_url(); ?>load_products.php",
	dataType: "json",			
	data:{totalRecord:totalRecord, brand:brand, material:material, size:size, category:category, sorting:sorting},
	success: function (data) {
		$("#results").append(data.products);
		totalRecord++;
	}
});	
$(window).scroll(function() {
	scrollHeight = parseInt($(window).scrollTop() + $(window).height());		
	if(scrollHeight == $(document).height()){	
		if(totalRecord <= totalData){
			loading = true;
			$('.loader').show();                
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url(); ?>load_products.php",
				dataType: "json",			
				data:{totalRecord:totalRecord, brand:brand, material:material, size:size},
				success: function (data) {
					$("#results").append(data.products);
					$('.loader').hide();
					totalRecord++;
				}
			});
		}            
	}
});
</script>