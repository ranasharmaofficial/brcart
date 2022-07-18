<form method="get"  action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="5">Furniture</option>
                                    <option value="6">Shoes</option>
                                    <option value="7">Sports</option>
                                    <option value="8">Games</option>
                                    <option value="9">Computers</option>
                                    <option value="10">Electronics</option>
                                    <option value="11">Kitchen</option>
                                    <option value="12">Clothing</option>
                                </select>
                            </div>
                            <input id="product-box" type="text" class="form-control" name="q" placeholder="Search in..." required />
							
                            <button id="fsearch" class="btn btn-search" type="submit"><i class="w-icon-search"></i>
							
                            </button>
							 <div id="productList"></div> 
							 <div class="spinner-border text-success" id="fspinner" style="display:none;" role="status">
  <span class="sr-only">Loading...</span>
</div>
						</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    // Autocomplete Textbox


    $("#product-box").keyup(debounce(function(){
      var product = $(this).val();

      if(product != ''){
         $.ajax({
            url: "http://localhost/papa/load-product.php",
            method: "GET",
            crossDomain: true,
            data: { product: product},
            beforeSend: function() {
              $("#fspinner").show();
              $("#fsearch").hide();
           },
            success: function(data){
              $("#productList").fadeIn("fast").html(data);
              $("#fspinner").hide();
              $("#fsearch").show();
            }
         });  
      }else{
        $("#productList").fadeOut();
       // $("#table-data").html("");
      }
    },600));


    $("#searchList-box").keyup(debounce(function(){
      var products = $(this).val();

      if(products != ''){
         $.ajax({
            url: "<?php echo base_url(); ?>loads-products.php",
            method: "GET",
            crossDomain: true,
            data: { products: products},
            beforeSend: function() {
              $("#searchListspinner").show();
              $("#searchListsearch").hide();
           },
            success: function(data){
              $("#searchProductList").fadeIn("fast").html(data);
              $("#searchListspinner").hide();
              $("#searchListsearch").show();
            }
         });  
      }else{
        $("#searchProductList").fadeOut();
       // $("#table-data").html("");
      }
    },600));


  
  
  
  function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};
</script> 