<style>
#productList {
    border: 1px solid #4d6e87;
    display: none;
}

#productList ul {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;


}
</style>
<style>
#searcList {
    border: 1px solid #4d6e87;
    display: none;
}

#productList ul {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;


}
</style>
<script type="text/javascript">
var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?67394';
var s = document.createElement('script');
s.type = 'text/javascript';
s.async = true;
s.src = url;
var options = {
    "enabled": true,
    "chatButtonSetting": {
        "backgroundColor": "#4dc247",
        "ctaText": "",
        "borderRadius": "25",
        "marginLeft": "50",
        "marginBottom": "50",
        "marginRight": "50",
        "position": "left"
    },
    "brandSetting": {
        "brandName": "UBAAZAR",
        "brandSubTitle": "...",
        "brandImg": "<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $fav_Icon; ?>",
        "welcomeText": "Hi, there!\nHow can I help you?",
        "messageText": "Hello, Team UBaazar!",
        "backgroundColor": "#0a5f54",
        "ctaText": "Start Chat",
        "borderRadius": "25",
        "autoShow": false,
        "phoneNumber": "918271721722"
    }
};
s.onload = function() {
    CreateWhatsappChatWidget(options);
};
var x = document.getElementsByTagName('script')[0];
x.parentNode.insertBefore(s, x);
</script>
<script type="text/javascript">
$(document).ready(function() {
    // Autocomplete Textbox


    $("#product-box").keyup(debounce(function() {
        var product = $(this).val();

        if (product != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>load-product.php",
                method: "GET",
                crossDomain: true,
                data: {
                    product: product
                },
                beforeSend: function() {
                    $("#fspinner").show();
                    $("#fsearch").hide();
                },
                success: function(data) {
                    $("#productList").fadeIn("fast").html(data);
                    $("#fspinner").hide();
                    $("#fsearch").show();
                }
            });
        } else {
            $("#productList").fadeOut();
            // $("#table-data").html("");
        }
    }, 600));


    $("#searchList-box").keyup(debounce(function() {
        var products = $(this).val();

        if (products != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>loads-products.php",
                method: "GET",
                crossDomain: true,
                data: {
                    products: products
                },
                beforeSend: function() {
                    $("#searchListspinner").show();
                    $("#searchListsearch").hide();
                },
                success: function(data) {
                    $("#searchProductList").fadeIn("fast").html(data);
                    $("#searchListspinner").hide();
                    $("#searchListsearch").show();
                }
            });
        } else {
            $("#searchProductList").fadeOut();
            // $("#table-data").html("");
        }
    }, 600));





    // Autocomplete List Click Code
    $(document).on('click', '#productList li', function() {
        $('#product-box').val($(this).text());
        $("#productList").fadeOut();
    });
    // Search Button Code
    $("#search-btn").on('click', function(e) {
        e.preventDefault();

        var city = $('#city-box').val();

        if (city == "") {
            alert("Please enter the city Name.");
            $("#table-data").html("");
        } else {
            $.ajax({
                url: "load-table.php",
                method: "POST",
                data: {
                    city: city
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        }
    })
});



function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
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


<script>
$(document).ready(function() {

    $('.add_cart').click(function() {
        var product_id = $(this).data("productid");
        var product_name = $(this).data("productname");
        var product_price = $(this).data("price");
        var product_slug = $(this).data("slug");
        var product_photo = $(this).data("photo");
        var product_sellerid = $(this).data("sellerid");
        var quantity = $('#' + product_id).val();
        if (quantity != '' && quantity > 0) {
            $.ajax({
                url: "<?php echo base_url(); ?>home/addcart",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_photo: product_photo,
                    product_slug: product_slug,
                    product_price: product_price,
                    product_sellerid: product_sellerid,
                    quantity: quantity
                },
                success: function(data) {
                    //alert("Product Added into Cart");
                    toastr.success("Successfully Added to Cart!");
                    $('#cart_details').html(data);
                    $('#' + product_id).val('');
                }
            });
        } else {
            toastr.error("Select Quantity!");
        }
    });


    $('.update_cart_minus').click(function() {
        var row_id = $(this).data("row_id");
        var qty = $(this).data("qty");
        $.ajax({
            url: "<?php echo base_url(); ?>home/updateminus",
            method: "POST",
            data: {
                row_id: row_id,
                qty: qty
            },
            success: function(data) {
                //alert("Product Added into Cart");
                toastr.success("Cart Updated!");
                $('#cart_details').html(data);
                $('#' + product_id).val('');
            }
        });
        $('#cart_details').load("<?php echo base_url(); ?>home/load");
    });

    $('.update_cart_plus').click(function() {
        var row_id = $(this).data("row_id");
        var qty = $(this).data("qty");
        // console.log(row_id);
        $.ajax({
            url: "<?php echo base_url(); ?>home/updateplus",
            method: "POST",
            data: {
                row_id: row_id,
                qty: qty
            },
            success: function(data) {
                // alert("Product Added into Cart");
                toastr.success("Cart Updated!");
                $('#cart_details').html(data);
                $('#cart_details').load("<?php echo base_url(); ?>home/load");
            }
        });

    });

    $('#cart_details').load("<?php echo base_url(); ?>home/load");

    $(document).on('click', '.remove_inventory', function() {
        var row_id = $(this).attr("id");
        if (confirm("Are you sure you want to remove this?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>home/removecart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {

                    toastr.error("Removed item from Cart!");
                    $('#cart_details').html(data);
                }
            });
        } else {
            return false;
        }
    });

    $(document).on('click', '#clear_cart', function() {
        if (confirm("Are you sure you want to clear cart?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>home/clear",
                success: function(data) {
                    alert("Your cart has been clear...");
                    $('#cart_details').html(data);
                }
            });
        } else {
            return false;
        }
    });

});
</script>
<script>
// Update item quantity
function updateCartItem(obj, rowid) {
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
        rowid: rowid,
        qty: obj.value
    }, function(resp) {
        if (resp == 'ok') {
            location.reload();
        } else {
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    $("#butsave").click(function() {
        var email = $('#email').val();
        if (validateEmail(email) && email != "") {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo WEB_URL . 'home/subscribe'; ?>",
                dataType: 'html',
                data: {
                    email: email
                },
                success: function(res) {
                    if (res == 1) {
                        toastr.success("Thank you for subscription!");
                        $('#email').val('');
                    } else {
                        toastr.error("Already Subscribed!");
                    }

                },
                error: function() {
                    toastr.error('Plz try again.');
                }
            });
        } else {
            toastr.error("Please enter valid Email Id!");
        }

    });
});
</script>
<script type="text/javascript" language="javascript"
    src="https://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH_FRONT; ?>js/json2.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- Start of Footer -->
<footer class="footer " data-animation-options="{
            'name': 'fadeIn'
        }">






    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <div class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input onfocus="this.value=''" onblur="this.placeholder = 'Enter email address'"
                            autocomplete="off" id="email" name="email" type="email" class="form-control mr-2 bg-white"
                            placeholder="Your E-mail Address" />
                        <button id="butsave" class="btn btn-dark btn-rounded" type="button">Subscribe<i
                                class="w-icon-long-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="<?php echo WEB_URL; ?>" class="logo-footer">
                            <img src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $footerLogo; ?>"
                                alt="logo-footer" width="144" height="45" />
                        </a>
                        <div class="widget-body">
                            <?php
if (is_array($companyAddress) && count($companyAddress) > 0) {
    foreach ($companyAddress as $val) {
        ?>
                            <p class="widget-about-title">Got Question? Call us 24/7</p>
                            <a href="tel:<?php echo $val['mobile']; ?>"
                                class="widget-about-call"><?php echo $val['mobile']; ?></a>
                            <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p>
                            <?php
}
}
?>
                            <?php
if (is_array($socialmediaicons) && count($socialmediaicons) > 0) {
    foreach ($socialmediaicons as $val) {
        ?>
                            <div class="social-icons social-icons-colored">
                                <a href="<?php echo $val['facebook']; ?>"
                                    class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="<?php echo $val['twitter']; ?>"
                                    class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="<?php echo $val['instagram']; ?>"
                                    class="social-icon social-instagram w-icon-instagram"></a>
                            </div>

                            <?php }
}
?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <?php
if (is_array($pagesList) && count($pagesList) > 0) {
    foreach ($pagesList as $val) {
        ?>
                            <li><a
                                    href="<?php echo WEB_URL . 'pages/' . $val['slug']; ?>"><?php echo $val['title']; ?></a>
                            </li>
                            <?php
}
}
?>
                            <li><a href="<?php echo WEB_URL . 'ask-question.html' ?>">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="<?php echo WEB_URL . 'login' ?>">Sign In</a></li>
                            <li><a href="<?php echo WEB_URL.'home/trackOrder'?>">Track My Order</a></li>
                            <li><a href="<?php echo WEB_URL . 'cart' ?>">View Cart</a></li>
                            <li><a href="javascript:void(0);">My Wishlist</a></li>
                            <li><a href="javascript:void(0);">Help</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="<?php echo WEB_URL . 'ask-question.html' ?>">Ask a Question</a></li>
                            <li><a href="<?php echo WEB_URL . 'users/seller' ?>">Sell on U-Baazar</a></li>
                            <li><a href="javascript:void(0);">Stores</a></li>

                            <li><a href="javascript:void(0);">FAQ</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © <?php echo date('Y'); ?> <?php echo CLIENT_NAME; ?>. All Rights
                    Reserved.</p>
            </div>

        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Page-wrapper-->

<style>
.fixed-bottom {
    right: 0;
    bottom: 0;
    left: 0;
    background-color: #fff;

}
</style>


<div class="d-inline d-xs-inline d-sm-inline d-md-inline d-lg-none d-xl-none container-fluid container-homeslider"
    style="padding-right: 0px; padding-left: 0px;">

    <div class="fixed-bottom container d-flex justify-content-center"
        style="background:#f3f3f3;box-shadow: inset 0px 11px 8px -10px #CCC,inset 0px -11px 8px -10px #CCC;">

        <div class="osahan-menu-fotter fixed-bottom text-center border-top">
            <div class="row m-0">
                <a href="<?php echo WEB_URL . '' ?>"
                    class="sticky-link text-dark col font-weight-bold text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-home"></i></p>
                    Home
                </a>

                <span style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL . 'shop' ?>'"
                    class="sticky-link text-muted col font-weight-bold  text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-category"></i></p>
                    Shop
                </span>
                <?php if ($this->isUserLoggedIn) {?>
                <a onclick="window.location.href='<?php echo WEB_URL . 'myaccount' ?>'"
                    class="sticky-link text-muted col font-weight-bold text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-account"></i></p>
                    Account

                </a>
                <?php } else {?>
                <a onclick="window.location.href='<?php echo WEB_URL . 'login' ?>'"
                    class="sticky-link text-muted col font-weight-bold text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-account"></i></p>
                    Login

                </a>
                <?php }?>
                <a href="<?php echo WEB_URL . 'shop' ?>"
                    class="sticky-link text-muted font-weight-bold col text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-search"></i></p>
                    Search
                </a>
                <a href="<?php echo WEB_URL . 'cart' ?>"
                    class="sticky-link text-muted font-weight-bold col text-decoration-none p-2">
                    <p class="h5 m-0"><i class="w-icon-cart"></i></p>
                    My&nbsp;Cart
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Start of Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="<?php echo WEB_URL . 'search?q=' ?>" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                    <li>
                        <a href="<?php echo WEB_URL . 'shop'; ?>">Shop</a>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'dailydeals'; ?>">Daily Deals</a>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'users/seller'; ?>">Seller</a>

                    </li>
                    <li><a href="<?php echo WEB_URL.'home/trackOrder'?>">Track My Order</a></li>
                    <?php if ($this->isUserLoggedIn) {?>
                    <li>
                        <a href="<?php echo WEB_URL . 'myaccount'; ?>">My Account</a>
                    </li>
                    <?php } else {?>
                    <li>
                        <a href="<?php echo WEB_URL . 'login'; ?>">Sign In</a>
                    </li>
                    <?php }?>

                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=29' ?>">
                            <i class="w-icon-ice-cream"></i>Grocery
                        </a>
                        <ul>
                            <?php
foreach ($grocery_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=29&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=29&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=23' ?>">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <?php
foreach ($fashion_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=23&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=23&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=22' ?>">
                            <i class="w-icon-heartbeat"></i>Beauty
                        </a>
                        <ul>
                            <?php
foreach ($beauty_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=22&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=22&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=19' ?>">
                            <i class="w-icon-home"></i>Home & Appliances
                        </a>
                        <ul>
                            <?php
foreach ($home_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=19&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=19&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=24' ?>">
                            <i class="w-icon-heartbeat"></i>Health Care
                        </a>
                        <ul>
                            <?php
foreach ($health_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=24&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=24&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=28' ?>">
                            <i class="w-icon-gamepad"></i>Baby Care
                        </a>
                        <ul>
                            <?php
foreach ($babycare_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=18&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=18&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=16' ?>">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <?php
foreach ($electronic_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=16&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=16&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=15' ?>">
                            <i class="w-icon-ios"></i>Mobile
                        </a>
                        <ul>
                            <?php
foreach ($mobile_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=15&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=15&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=14' ?>">
                            <i class="w-icon-computer"></i>Computer & Laptops
                        </a>
                        <ul>
                            <?php
foreach ($Computer_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=14&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=14&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=17' ?>">
                            <i class="w-icon-truck"></i>Automobiles
                        </a>
                        <ul>
                            <?php
foreach ($automobiles_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=17&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=17&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=21' ?>">
                            <i class="w-icon-sport"></i>Sports
                        </a>
                        <ul>
                            <?php
foreach ($sports_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=21&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=21&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo WEB_URL . 'category?cat=25' ?>">
                            <i class="w-icon-orders"></i>Books
                        </a>
                        <ul>
                            <?php
foreach ($books_subcategories_list as $subcategory) {?>
                            <li>
                                <a
                                    href="<?php echo WEB_URL; ?>category?cat=25&subcat=<?php echo $subcategory->id; ?>"><?php echo $subcategory->name; ?></a>
                                <ul>
                                    <?php foreach ($subcategory->childsubs as $childsubs) {?>
                                    <li><a
                                            href="<?php echo WEB_URL; ?>category?cat=25&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><?php echo $childsubs->name; ?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php }?>

                        </ul>
                    </li>




                    <li>
                        <a href="<?php echo WEB_URL . 'browsecategories' ?>"
                            class="font-weight-bold text-primary text-uppercase ls-25">
                            More Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky mb-0">
                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                    <figure class="product-image">
                        <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/1-440x494.jpg"
                            data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/popup/1-800x900.jpg"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/2-440x494.jpg"
                            data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/popup/2-800x900.jpg"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/3-440x494.jpg"
                            data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/popup/3-800x900.jpg"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/4-440x494.jpg"
                            data-zoom-image="<?php echo WEB_PATH_FRONT; ?>images/products/popup/4-800x900.jpg"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                </div>
                <div class="product-thumbs-wrap">
                    <div class="product-thumbs">
                        <div class="product-thumb active">
                            <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/1-103x116.jpg"
                                alt="Product Thumb" width="103" height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/2-103x116.jpg"
                                alt="Product Thumb" width="103" height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/3-103x116.jpg"
                                alt="Product Thumb" width="103" height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo WEB_PATH_FRONT; ?>images/products/popup/4-103x116.jpg"
                                alt="Product Thumb" width="103" height="116">
                        </div>
                    </div>
                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Electronics Black Wrist Watch</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="<?php echo WEB_PATH_FRONT; ?>images/products/brand/brand-1.jpg" alt="Brand"
                            width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Electronics</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                        <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->

<!-- Plugin JS File -->
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/jquery.plugin/jquery.plugin.min.js"></script>
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/zoom/jquery.zoom.min.js"></script>
<script src="<?php echo WEB_PATH_FRONT; ?>vendor/skrollr/skrollr.min.js"></script>

<!-- Main JS -->
<script src="<?php echo WEB_PATH_FRONT; ?>js/main.min.js"></script>
</body>

</html>