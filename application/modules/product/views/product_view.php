 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>E-commerce</h1>
          </div>
		  <title><?php echo $row['product_name']; ?></title>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#"><?php echo $row['product_name']; ?></a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	  <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">
    <!-- Main content -->
    <section class="content">
	<style>
	hr
	{
		margin:2px;
	}
	</style>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-4">
              <h3 class="d-inline-block d-sm-none"><?php echo $row['product_name']; ?></h3>
              <div class="col-12">
                <img  src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>" class="product-image" alt="Product Image">
              </div>
			<?php if(false) { ?>  
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
              </div>
			<?php } ?>  
            </div>
            <div class="col-12 col-sm-8">
              <h3 class="my-3"><?php echo $row['product_name']; ?></h3>
			    <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Category</b> <a class="float-right"><?php echo $row['cat_name']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>SubCategory</b> <a class="float-right"><?php echo $row['subcat_name']; ?></a>
                  </li>
				  <li class="list-group-item">
                    <b>Child Category</b> <a class="float-right"><?php echo $row['childcat_name']; ?></a>
                  </li>
                </ul>
				 
				<p>Product SKU : <?php echo $row['sku']; ?></p>

              <hr>
              <h4>Available Colors</h4>
              

              <h5 class="mt-3"><b>Size:</b> <?php echo $row['size']; ?></h5>
              <h5 class="mt-3"><b>Size Quantity:</b> <?php echo $row['size_qty']; ?></h5>
              <h5 class="mt-3"><b>Size Price:</b> <?php echo $row['size_price']; ?></h5>
              <h5 class="mt-3"><b>Size Price:</b> <?php echo $row['weight']; ?></h5>
              <h5 class="mt-3"><b>Shipping Weight:</b> <?php echo $row['shipping_weight']; ?><?php echo $row['shipping_measurement']; ?></h5>
              <h5 class="mt-3"><b>Volumetric Weight:</b> <?php echo $row['volumetric_weight']; ?> KG</h5>
              
              	

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Rs <?php echo getNumberFormat($row['price']); ?>
                </h2>
				<h5 class="mt-3"><b>Purchase Price:</b> Rs <?php echo getNumberFormat($row['purchase_price']); ?></h5>
				<h5 class="mt-3"><b>Admin Commission:</b> Rs <?php echo getNumberFormat($row['admin_commission_amount']); ?></h5>
				<h5 class="mt-3"><b>Gst Amount:</b> Rs <?php echo getNumberFormat($row['gst_amount']); ?></h5>
				<h5 class="mt-3"><b>Without Gst Amount:</b> Rs <?php echo getNumberFormat($row['without_gst_price']); ?></h5>
              <h5 class="mt-3"><b>Seller Payable:</b> Rs <?php echo getNumberFormat($row['seller_payable_amount']); ?></h5>
              
				
               </div>
		<?php if(false) {  ?>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Add to Wishlist
                </div>
              </div>
		
              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>
<?php } ?>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Return Policy</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?php echo $row['details']; ?> </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
			  
			  <p>If an order, once placed, can be canceled until the seller processes it.</p>
<p>This Product is eligible for the Return and Replacement Policy, within <?php echo $row['policy']; ?> days of delivery. For any queries, do reach out to Customer Care.</p>
			  
			  </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"><?php echo $row['details']; ?> </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
