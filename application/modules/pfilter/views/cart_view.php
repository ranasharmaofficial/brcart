<?php
include "Product.php";
$product = new Product();
$categories = $product->getCategories();
$brands = $product->getBrand();
// $materials = $product->getMaterial();
// $productSizes = $product->getProductSize();
$totalRecords = $product->getTotalProducts();
 

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

?>

<link rel="stylesheet" href="httpss://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="httpss://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="httpss://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="httpss://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">

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
                            
       
		
		<form method="post" id="search_form">
					 <!---Brand cat will be here---->	
						
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
                                                class="sort_rang category"><?php echo ucfirst($category_name); ?></label>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
						</div>
						
						<div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Brand</label></h3>
                            
							<ul class="list-group">
                                <?php
foreach ($brands as $key => $brand) {
    if (isset($_POST['brand'])) {
        if (in_array($product->cleanString($brand['brand']), $_POST['brand'])) {
            $brandChecked = 'checked="checked"';
        } else {
            $brandChecked = "";
        }
    }
    ?>
                                <li class="list-group-item">
                                    <div class="checkbox"><label><input type="checkbox"
                                                value="<?php echo $product->cleanString($brand['brand']); ?>"
                                                <?php echo @$brandChecked; ?> name="brand[]"
                                                class="sort_rang brand"><?php echo ucfirst($brand['brand']); ?></label>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
						</div>
						
						<div class="widget widget-collapsible">
                                <h3 class="widget-title"><label>Sort by</label></h3>
                            
							<div class="panel list">
                        <div class="panel-heading">
                            <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">
                                Sort By </h3>
                        </div>
                        <div class="panel-body collapse in" id="panelOne">
                            <div class="radio disabled">
                                <label><input type="radio" name="sorting" value="newest"
                                        <?php if (isset($_POST['sorting']) && ($_POST['sorting'] == 'newest' || $_POST['sorting'] == '')) {echo "checked";}?>
                                        class="sort_rang sorting">Newest</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="sorting" value="low"
                                        <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'low') {echo "checked";}?>
                                        class="sort_rang sorting">Price: Low to High</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="sorting" value="high"
                                        <?php if (isset($_POST['sorting']) && $_POST['sorting'] == 'high') {echo "checked";}?>
                                        class="sort_rang sorting">Price: High to Low</label>
                            </div>
                        </div>
                    </div>
						</div>
 
				</div>
				</div>
				</aside>
				
				
				
				<!----Home ---->
				<div class="main-content">
                    <?php if (false) {?> <nav class="toolbox sticky-toolbox sticky-content fix-top">
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
                                   
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                    
                                </select>

                            </div>
                        </div>

                    </nav>

<?php }?>
                    
                   <!---- <div id="results" class="p-3 product-wrapper row cols-xl-5 cols-lg-3 cols-md-4 cols-sm-3 cols-2">

                         

                    </div> ---->
					
					<div id="results" class="p-3 row">

                         

                    </div>
                     
                     
                </div>
                <!-- End of Shop Main Content -->
				<!----Home End ---->
				
                 
            
            <input type="hidden" id="totalRecords" value="<?php echo $totalRecords; ?>">
        </form>
    </div>
</div>
<script src="product_filter/js/script.js"></script>

 </main>

 

