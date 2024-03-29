var totalRecord = 0;
var category = getCheckboxValues('category');
var brand = getCheckboxValues('brand');
// var material = getCheckboxValues('material');
// var size = getCheckboxValues('size');
var totalData = $("#totalRecords").val();
var sorting = getCheckboxValues('sorting');
$.ajax({
	type: 'POST',
	url : "./load_products.php",
	dataType: "json",			
	data:{totalRecord:totalRecord, brand:brand, category:category, sorting:sorting},
	// data:{totalRecord:totalRecord, brand:brand, material:material, size:size, category:category, sorting:sorting},
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
				url : "load_products.php",
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