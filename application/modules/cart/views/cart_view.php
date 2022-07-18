 <!-- Start of Main -->
 <main class="main cart">
     <?php if(false) {?>
     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav">
         <div class="container">
             <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                 <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                 <li>Shopping Cart</li>
             </ul>
         </div>
     </nav>
     <!-- End of Breadcrumb -->
     <?php } ?>

     <!-- Start of PageContent -->
     <div style="background-color: #f1f3f6;width:100%;" class="page-content mt-5 p-3">
         <div class="container">

             <?php if($this->cart->total_items() > 0) {     ?>





             <div class="row gutter-lg mb-10">
                 <div class="col-lg-8 mt-4  p-4 bg-white shadow-sm">
                     <div class="title-link-wrapper pb-1 mb-4">
                         <h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Shopping Cart
                         </h2>
                     </div>
                     <?php foreach($cartItems as $item)
						   {   

						   ?>
                     <?php
						   
			$productID=$item["id"];  
						   include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT previous_price FROM products where id='$productID'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($mrp);	
    while ($stmt->fetch()) {	
	
        		}  
}

$sellerid=$item["sellerid"];
						   include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT shop_name FROM seller where id='$sellerid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($sold_by);	
    while ($stmt->fetch()) {	
	
        		}  
}
						   ?>

                     <div class="row">
                         <div class="col-3">
                             <a href="<?php echo $item['slug']; ?>">
                                 <?php //include('./offer.php'); ?>


                                 <img class="img-thumbnail" id="product_pic"
                                     src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $item['photo']; ?>"></a>
                         </div>

                         <div class="col-9">

                             <a style="text-decoration:none;" href="<?php echo WEB_URL.'item/'.$item['slug']; ?>">
                                 <h3 style="text-decoration:none;" class="font-weight-bold p-1">
                                     <?php echo $item["name"]; ?></h3>
                             </a>


                             <span><span class="text-secondary p-1">Sold by <a style="text-decoration:none;"
                                         href=""><?php echo $sold_by; ?></a></span>






                                 <h3 style="font-size:21px;" class="text-danger font-weight-bold p-2"><i
                                         class="fa fa-inr">&nbsp;</i><?php echo $item["price"]; ?>

                                     <span style="font-size:16px;" class="text-secondary"><s><i
                                                 class="fa fa-inr"></i>&nbsp;<?php echo $mrp; ?></s><span>
                                             <?php if(round(($item['qty']*$mrp)-($item['qty']*$item['price']))>0) { ?>
                                             <span style="font-size:15px;" class="text-success">&nbsp;Save <i
                                                     class="fa fa-inr"></i>
                                                 <?php echo round(($mrp)-($item['price']))?></span>
                                             <?php } ?>
                                 </h3>
                                 <span style="float:right;">
                                     <button style="text-align:right;"
                                         onclick="window.location.href='<?php echo WEB_URL.'cart/removeItem/'?><?php echo $item['rowid']; ?>'"
                                         type="submit" class="btn btn-close"><i style="color:red;"
                                             class="fas fa-times"></i></button>
                                 </span>
                                 </span>
                                 <div class="row" id="field1">
                                     <div class="col-3 float-right text-danger font-weight-bold">
                                         <p style="font-size:20px;">Quantity</p>
                                     </div>
                                     <div class="col-9">

                                         <button data-row_id="<?php echo $item['rowid']; ?>"
                                             data-qty="<?php echo $item['qty']; ?>" type="button"
                                             style="height:30px;width:30px;font-size:18px;outline:none;background-color:#FE004D;color:white;border:1px white solid;font-weight:bold;"
                                             id="sub" name="update_cart_minus" class="sub update_cart_minus"><i
                                                 class="fa fa-minus"></i></button>
                                         <input type="number" name="qty"
                                             style="border:0px;text-align:center;font-weight:bold;font-size:18px;"
                                             required id="1" readonly value="<?php echo $item['qty']; ?>" min="1"
                                             max="15" />
                                         <button data-row_id="<?php echo $item['rowid']; ?>"
                                             data-qty="<?php echo $item['qty']; ?>" type="button"
                                             style="height:30px;width:30px;font-size:18px;outline:none;background-color:#FE004D;color:white;border:1px white solid;font-weight:bold;"
                                             id="add" name="update_cart_plus" class="add update_cart_plus"><i
                                                 class="fa fa-plus"></i></button>
                                     </div>
                                 </div>

                                 <?php if(false) { ?>
                                 <div class="row" id="field1">
                                     <div class="col-3 float-right text-danger font-weight-bold">
                                         <p style="font-size:20px;">Quantity</p>
                                     </div>
                                     <div class="col-12">

                                         <button
                                             onclick="window.location.href='<?php echo WEB_URL.'home/decart/?row_id='?><?php echo $item['rowid']; ?>&qty=<?php echo $item['qty']; ?>'"
                                             type="button"
                                             style="height:30px;width:30px;font-size:18px;outline:none;background-color:#FE004D;color:white;border:1px white solid;font-weight:bold;"
                                             id="sub" class="sub"><i class="fa fa-minus"></i></button>
                                         <input type="number" name="qty"
                                             style="border:0px;text-align:center;font-weight:bold;font-size:18px;"
                                             required id="1" readonly value="<?php echo $item['qty']; ?>" min="1"
                                             max="15" />
                                         <button
                                             onclick="window.location.href='<?php echo WEB_URL.'home/upcart/?row_id='?><?php echo $item['rowid']; ?>&qty=<?php echo $item['qty']; ?>'"
                                             type="button"
                                             style="height:30px;width:30px;font-size:18px;outline:none;background-color:#FE004D;color:white;border:1px white solid;font-weight:bold;"
                                             id="add" class="add"><i class="fa fa-plus"></i></button>
                                     </div>
                                 </div>
                                 <?php } ?>

                         </div>
                     </div>
                     <hr>

                     <?php } ?>

                     <div class="cart-action mb-6">
                         <a style="padding: 1em 2em;" href="<?php echo WEB_URL.''?>"
                             class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                 class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                         <button type="submit" onclick="window.location.href='<?php echo WEB_URL.'home/clear' ?>'"
                             class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear
                             Cart</button>

                     </div>
                     <?php if(false) { ?>
                     <form class="coupon">
                         <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                         <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..."
                             required />
                         <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                     </form>
                     <?php } ?>
                 </div>

                 <div class="col-lg-4 sticky-sidebar-wrapper mt-4 p-4 bg-white shadow-sm">
                     <div class="title-link-wrapper pb-1 mb-4">
                         <h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Cart Totals
                         </h2>
                     </div>
                     <div class="">
                         <div style="border:none;" class="cart-summary mb-4">
                             <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                 <label
                                     class="ls-25">Subtotal&nbsp;(<?php echo $this->cart->total_items();?>&nbsp;Item[s]):</label>
                                 <span id="cart_details">
                                     <span class="font-weight-bold">
                                         <i class="fa fa-inr">&nbsp;</i>
                                         <?php echo getNumberFormat($this->cart->total()); ?>
                                     </span>
                                 </span>
                             </div>
							 <?php if($this->cart->total()<=600) { ?>
							 <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                 <p class="ls-25">Add Rs <?php echo (600-$this->cart->total());?>.00 of items To get Free delivery</p>
                             </div><?php } ?>

                             <hr class="divider">

                             <center>
                                 <div onclick="window.location.href='<?php echo WEB_URL.'checkout'?>'"
                                     style="width:100%;font-size:15px;background-color:#ffd814;border-radius:5px;"
                                     class="btn text-center text-black p-2">Buy Now</div>
                             </center>

                         </div>
                     </div>
                 </div>
             </div>
             <?php } else { ?>
             <div style="padding:10px;" class="page-content bg-white shadow-sm mt-5 mb-5">
                 <div class="title-link-wrapper pb-1 mb-4">
                     <h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Shopping Cart</h2>
                 </div>
                 <div class="container">
                     <div class="main-content-wrap">
                         <div class="main-content">
                             <div class="woocommerce">
                                 <div class="cart-empty-page text-center">
                                     <div class="woocommerce-notices-wrapper"></div>
                                     <img src="<?php echo WEB_PATH_FRONT.'images/empty-cart-icon.png'?>"
                                         alt="Empty Cart">
                                     <p class="return-to-shop">
                                         <a style="padding: 1em 2em;"
                                             class="button wc-backward btn btn-rounded btn-dark"
                                             href="<?php echo WEB_URL.''?>">
                                             Return to shop </a>
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <?php } ?>
         </div>
     </div>
     <!-- End of PageContent -->
 </main>
 <!-- End of Main -->

 <script>
$('.add').click(function() {
    if ($(this).prev().val() < 15) {
        $(this).prev().val(+$(this).prev().val() + 1);
    }
});
$('.sub').click(function() {
    if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    }
});
 </script>