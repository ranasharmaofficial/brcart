  
<html>

<head>
<title>Invoice</title>
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
	border:1px solid #000;
}

.table > thead > tr > .no-line {
    border-bottom: none;
	border:1px solid #000;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid #000;
}



table {
	border:2px solid #000;
}

</style>
</head>

<link rel="icon"  type="image/x-icon" href="<?php echo WEB_PATH_ADMIN.'img/favicon.png?v='.CSS_JS_VERSION;?>"/>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</br>
<div style="" class="container">
    <div class="row">
        <div style="" class="col-xs-6">
			<span><img style="height:80px;" src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $invoiceLogo; ?>">
		</div>
        <div class="col-xs-6">
			<h4 style="font-weight:600;" class="text-right font-weight-bold">Tax Invoice/Bill of Supply/Cash Memo</br>
				<span>(Original for Recipient)</span>
			</h4>
		</div>
	</div>	
	</br>
	<div class="row">
		<div class="col-xs-6">
			<span class="font-weight-bold">
			Digital Signed by : Seller name</br>
			<span>(Original for Recipient)</span>
			</span>
		</div>
		<div class="col-xs-6">
			<span class="font-weight-bold">
			Digital Signed by : Seller name</br>
			<span>(Original for Recipient)</span>
			</span>
		</div>
		 
		
	</div>
</div>

	
	 
</html>