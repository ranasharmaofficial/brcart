$(document).ready(function(){
    // Autocomplete Textbox


    $("#product-box").keyup(debounce(function(){
      var product = $(this).val();

      if(product != ''){
         $.ajax({
            url: "http://ubaazar.in/load-product.php",
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
            url: "http://ubaazar.in/loads-products.php",
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




    // Autocomplete List Click Code
    $(document).on('click','#productList li',function(){
      $('#product-box').val($(this).text());
      $("#productList").fadeOut();
    });
    // Search Button Code
    $("#search-btn").on('click', function(e){
      e.preventDefault();

      var city = $('#city-box').val();

      if(city == ""){
        alert("Please enter the city Name.");
        $("#table-data").html("");
      }else{
        $.ajax({
            url: "load-table.php",
            method: "POST",
            data: { city: city},
            success: function(data){
              $("#table-data").html(data);
            }
         }); 
      }
    })
  });
  
  
  
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