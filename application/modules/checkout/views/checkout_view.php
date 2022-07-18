<style>
.razorpay-payment-button {
    color: white !important;
    background-color: #fa3424;
    border-color: #fa3424;
    font-size: 14px;
    width: 100%;
    height: 45px;
    text-align: center;
    border-radius: 2px;
    padding: 10px;
}
</style>

<!-- Start of Main -->
<main class="main cart">
    <?php if (false) {?>
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
    <?php }?>

    <!-- Start of PageContent -->
    <div style="background-color: #f1f3f6;width:100%;" class="page-content mt-5 p-3">
        <div class="container">

            <?php if ($this->cart->total_items() > 0) {?>





            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 mt-4  p-4 bg-white shadow-sm">
                    <center>
                        <div style="width:100%;font-size:15px;background-color:#ffd814;border-radius:5px;"
                            class="btn text-center text-black p-2 mt-3 mb-3">Proceed to Buy with these Item[s]</div>
                    </center>
                    <hr>
                    <h4>Select a Shipping Address</h4>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 mb-3">
                            <?php $this->load->view('adminlayout/message_view');?>
                            <div style="cursor:pointer;"
                                onclick="window.location.href='<?php echo WEB_URL . 'users/addAddress' ?>'"
                                class="card p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 style="font-size:15px;float:left;" class="address-box-title">Add a New
                                            Address</h4>

                                        <i style="font-size:15px;float:right;margin-top:6px;"
                                            class="fa fa-angle-double-right address-box-title" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
if ($userrow['address'] == '') {
    ?>
                        <?php
if (is_array($user_address) && count($user_address) > 0) {
        foreach ($user_address as $val) {
            $userAddressId = $val['id'];
            $pin = $val['pin'];
            ?>
                        <div class="col-sm-12 mb-3">
                            <div style="cursor:pointer;font-size:14px;" class="card card-body p-3">
                                <label for="selectaddress<?php echo $val['id']; ?>"
                                    style="margin-left:5px;font-size:19px;font-weight:bold;">
                                    <input checked id="selectaddress<?php echo $val['id']; ?>"
                                        value="<?php echo $userAddressId; ?>" type="radio"
                                        title="Please Select Your Delivery Address!" name="addressid" />&nbsp;Select
                                    This Address</label>
                                <?php echo form_error('addressid'); ?>
                                <hr>
                                <span class="font-weight-bold"><?php echo $val['fullname']; ?></span>
                                <span>House No. - <?php echo $val['house_no']; ?></span>
                                <span><?php echo $val['address']; ?>, <?php echo $val['landmark']; ?></span>
                                <span><?php echo $val['city']; ?>, <?php echo $val['state']; ?> -
                                    <?php echo $val['pin']; ?></span>
                                <span>Address Type - <?php echo $val['address_type']; ?></span>
                                <span>Delivery Time - <?php echo $val['delivery_time']; ?></span>

                                <a
                                    href="<?php echo WEB_URL . 'users/editaddress' ?>?aid=<?php echo encrypt_url($val['id']); ?>&ref=checkout">
                                    <button style="height:40px;font-size:15px;"
                                        class="btn btn-info text-white float-right">EDIT&nbsp;ADDRESS</button></a>



                            </div>
                        </div>
                        <?php }
    }
    ?>
                        <?php } else {?>
                        <?php
if (is_array($user_default_address) && count($user_default_address) > 0) {
    foreach ($user_default_address as $val) {
        $userAddressId = $val['id'];
        $pin = $val['pin'];
        ?>
                        <div class="col-sm-12 mb-3">
                            <div style="cursor:pointer;font-size:14px;" class="card card-body p-3">
                                <label for="selectaddress<?php echo $val['id']; ?>"
                                    style="margin-left:5px;font-size:19px;font-weight:bold;">
                                    <input checked id="selectaddress<?php echo $val['id']; ?>"
                                        value="<?php echo $userAddressId; ?>" type="radio"
                                        title="Please Select Your Delivery Address!" name="addressid" />&nbsp;Select
                                    This Address</label>
                                <hr>
                                <span class="font-weight-bold"><?php echo $val['fullname']; ?></span>
                                <span>House No. - <?php echo $val['house_no']; ?></span>
                                <span><?php echo $val['address']; ?>, <?php echo $val['landmark']; ?></span>
                                <span><?php echo $val['city']; ?>, <?php echo $val['state']; ?> -
                                    <?php echo $val['pin']; ?></span>
                                <span><strong>Address Type -</strong> <?php echo $val['address_type']; ?></span>
                                <span><strong>Delivery Time -</strong> <?php echo $val['delivery_time']; ?></span>


                                <a
                                    href="<?php echo WEB_URL . 'users/editaddress' ?>?aid=<?php echo encrypt_url($val['id']); ?>&ref=checkout">
                                    <button style="height:40px;font-size:15px;"
                                        class="btn btn-info text-white float-right">EDIT&nbsp;ADDRESS</button></a>

                            </div>
                        </div>
                        <?php }
}
    ?>
                        <?php }?>

                        <?php

    include 'db.php';

    $con = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
    $query = "SELECT count(id) FROM pin where pin='$pin'";
    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($count_pin);
        while ($stmt->fetch()) {

        }
    }

    if ($count_pin == 1) {
        include 'db.php';

        $con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server' . mysqli_connect_error());
        $query = "SELECT cod FROM pin where pin='$pin'";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($cod);
            while ($stmt->fetch()) {

            }
        }

        include 'db.php';

        $con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server' . mysqli_connect_error());
        $query = "SELECT cod_limit FROM pin where pin='$pin'";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($cod_limit);
            while ($stmt->fetch()) {

            }
        }

    } else {
        $cod = 'NO';
        $cod_limit = 'NO';
    }

    ?>
                        <div class="col-sm-12 m-3">
                            <?php if ($count_pin == 0) {?>

                            <p style="color:#E69C00;font-weight:bold;text-align:justify;">Sorry , Currently Delivery Is
                                Not Available in This Location.</p>
                            <p style="color:black;font-weight:bold;text-align:justify;">We are trying to provide
                                delivery facility at this location as soon as possible.</p>
                            <hr>
                            <?php }?>

                        </div>


                    </div>


                    <?php
$price = 0;
    $save = 0;
    $mrp = 0;
    foreach ($cartItems as $item) {

        $productID = $item["id"];
        include 'db.php';
        $con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server' . mysqli_connect_error());
        $query = "SELECT previous_price FROM products where id='$productID'";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($mrp);
            while ($stmt->fetch()) {

            }
        }

        $sellerid = $item["sellerid"];
        include 'db.php';
        $con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server' . mysqli_connect_error());
        $query = "SELECT shop_name FROM seller where id='$sellerid'";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($sold_by);
            while ($stmt->fetch()) {

            }
        }

        $price = $price + ($item['price'] * $item['qty']);
        $save = $save + ($mrp * $item['qty']) - ($item['price'] * $item['qty']);
        ?>

                    <div class="row">
                        <div class="col-3">
                            <a href="<?php echo WEB_URL.'item/'.$item['slug']; ?>">
                               <img style="height:100px;" class="img-thumbnail" id="product_pic"
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
                                            <?php if (round(($item['qty'] * $mrp) - ($item['qty'] * $item['price'])) > 0) {?>
                                            <span style="font-size:15px;" class="text-success">&nbsp;Save <i
                                                    class="fa fa-inr"></i>
                                                <?php echo round(($mrp) - ($item['price'])) ?></span>
                                            <?php }?>
                                </h3>
                                <?php if (false) {?>
                                <span> <span style="font-size:16px;" class="font-weight-bold p-3">Qty</span> <span
                                        style="float:left;">

                                        <select onchange="location = this.value;" class="form-control"
                                            style="width:60px;height:30px;z-index:0;" name="quantity">
                                            <option selected><?php echo $item['qty']; ?></option>


                                            <?php for ($i = 1; $i <= 20; $i++) {?>
                                            <option
                                                value="./cart.php?id=<?php echo $item['rowid']; ?>&qt=<?php echo $i; ?>">
                                                <?php echo $i; ?></option>
                                            <?php }?>
                                        </select>
                                    </span>
                                    <span style="float:right;"><button
                                            onclick="window.location.href='<?php echo WEB_URL . 'cart/removeItem/' ?><?php echo $item['rowid']; ?>'"
                                            class="btn btn-sm btn-primary float-right"><i
                                                class="fa fa-trash"></i></button></span>
                                </span>
                                <?php }?>

                        </div>
                    </div>
                    <hr>

                    <?php //} ?>

                    <?php }

    $total_cart_amount = $this->cart->total();
    if ($cod == 'YES') {
        if ($cod_limit >= $total_cart_amount) {
            $cod = 'YES';
        } else {
            $cod = 'NO';
        }
    }

    $s = 1;

    include 'db.php';
    mysqli_set_charset($conn, "utf8");
    $sql = "SELECT * FROM pin_charge where pin='$pin'";
    $result = $conn->query($sql);
	$data=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
			$data[]= $row;
			 
		}
	}
	//print_r($data); die;
	
 $conn->close();
 
    // if (!isset($delivery)) {
        // $delivery = 0;
    // }
    ?>

                </div>

                <div class="col-lg-4 sticky-sidebar-wrapper mt-4 p-4 bg-white shadow-sm">
                    <div class="title-link-wrapper pb-1 mb-4">
                        <h2 style="float:left;line-height:1.6;" class="font-weight-none ls-normal mb-0">Cart Totals</h2>
                    </div>
                    <div class="container">
                        <div style="border:none;" class="row mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <p>Items : </p>
                                </div>
                                <div class="col-6">
                                    <p style="float:right;color:black;font-weight:none;">
                                        <?php echo $this->cart->total_items(); ?></p>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6">
                                    <p>Sub Total : </p>
                                </div>
                                <div class="col-6">
                                    <p style="float:right;color:black;font-weight:none;">Rs
                                        <?php echo getNumberFormat($this->cart->total()); ?></p>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-6">
                                    <p>Delivery : </p>
                                </div>
                                <div class="col-6">
                                    <p style="float:right;color:black;font-weight:none;">Rs
										<?php foreach($data as $item)
	{
if($item['order_amount']>=$this->cart->total())	{
	
		$delivery=$item['delivery_amount'];
}
else{
	$delivery=0;
}
                                      echo getNumberFormat($delivery);  
										}?>
										</p>
                                </div>
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-8">
                                    <p style="color:black;font-weight:bold;">Payable&nbsp;Total&nbsp;Amount : </p>
                                </div>
                                <div class="col-4">
                                    <p style="float:right;color:black;font-weight:bold;">Rs
                                        <?php echo getNumberFormat($price + $delivery); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-danger font-weight-bold">
                                <div class="col-6">
                                    <p style="font-weight:bold;">Your total savings : </p>
                                </div>
                                <div class="col-6">
                                    <p style="float:right;font-weight:bold;">Rs <?php echo $save; ?></p>
                                </div>
                            </div>
                            <hr>
                            <?php if ($count_pin >= 1) {?>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <span style="color:black;font-size:25px;text-align:center;font-weight:bold;">Payment
                                        Option</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12"></div>

                                <div class="col-5">
                                    <hr>
                                </div>
                                <div class="col-2 text-center">
                                    OR
                                </div>
                                <div class="col-5">
                                    <hr>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <?php if ($cod == 'YES' and $price <= $cod_limit) {?>


                                        <input type="hidden" name="address" value="<?php echo $userAddressId; ?>">
                                        <input type="hidden" name="total"
                                            value="<?php echo round($price + $delivery); ?>">
                                        <input type="hidden" name="total_item"
                                            value="<?php echo $this->cart->total_items(); ?>">
                                        <input type="hidden" name="delivery_charge" value="<?php echo $delivery; ?>">
                                        <input type="hidden" name="shippping_cost" value="50">
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <input type="hidden" name="save" value="<?php echo $save; ?>">
                                        <button
                                            style="width:100%;font-size:16px;height:45px;border:1px solid grey;font-weight:bold;"
                                            name="make_order" value="make_order" type="submit"
                                            class="btn bg-primary text-white">CASH&nbsp;ON&nbsp;DELIVERY (COD)</button>

                                        <?php } else {?>
                                        <p style="color:orange;font-size:16px;" class="text-center font-weight-bold">COD
                                            Limit ₹ <?php echo $cod_limit; ?> On Your Location.</p>
                                        <?php }?>
                                        <?php if ($cod == 'NO' and $price <= $cod_limit) {?>
                                        <p style="color:red;font-size:16px;" class="text-center font-weight-bold">COD
                                            Not available On Your Location.</p>
                                        <?php }?>

                                    </div>
                                </form>
                            </div>
                            <?php }?>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="address" value="<?php echo $userAddressId; ?>">
                                        <input type="hidden" name="total"
                                            value="<?php echo round($price + $delivery); ?>">
                                        <input type="hidden" name="total_item"
                                            value="<?php echo $this->cart->total_items(); ?>">
                                        <input type="hidden" name="delivery_charge" value="<?php echo $delivery; ?>">
                                        <input type="hidden" name="shippping_cost" value="50">
                                        <input type="hidden" name="save" value="<?php echo $save; ?>">
                                        <input type="hidden" name="payment_mode" value="ONLINE">
                                        <input type="hidden" value="online_order" name="online_order">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="rzp_live_ceLptbaI9K1uWs"
                                            data-amount="<?php echo round($price + $delivery); ?>00"
                                            data-buttontext="Pay Now" data-name="U-Baazar" data-description="Checkout"
                                            data-image="https://ubaazar.com/logo/U-BAAZAR1633281695u-baazar.png"
                                            data-prefill.name="<?php echo $userrow['first_name'].' '.$userrow['last_name']; ?>" 
											data-prefill.contact="<?php echo $userrow['mobile_no']; ?>"
                                            data-prefill.email="<?php echo $userrow['email']; ?>" data-theme.color="#0088CC"></script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <?php } else {?>
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
                                    <img src="<?php echo WEB_PATH_FRONT . 'images/empty-cart-icon.png' ?>"
                                        alt="Empty Cart">
                                    <p class="return-to-shop">
                                        <a style="padding: 1em 2em;" class="button wc-backward btn btn-rounded btn-dark"
                                            href="<?php echo WEB_URL . '' ?>">
                                            Return to shop </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->