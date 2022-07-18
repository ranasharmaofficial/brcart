<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <meta name="theme-color" content="#fa3424">
    <?php if ($pvalue['pgTitle'] == 'Product Details') { ?>
    <title><?php echo $details['product_name']; ?> | <?php echo SITE_NAME ?></title>

    <meta property="og:url" content="<?php echo WEB_URL . 'item/' . $details['slug']; ?>" />
    <meta property="og:type" content="Product" />
    <meta property="og:title" content="<?php echo $details['product_name']; ?>" />
    <meta property="og:description" content="<?php echo $details['meta_description']; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>" />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="robots" content="index,follow" />
    <meta name="keywords" content="<?php echo $details['meta_tag']; ?>,<?php echo SITE_NAME; ?>" />
    <meta name="description" content="<?php echo $details['meta_description']; ?>,<?php echo SITE_NAME; ?>" />
    <meta itemprop="name" content="<?php echo $details['product_name']; ?>">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    <meta property="article:tag" content="<?php echo $details['product_name']; ?>" />
    <meta property="og:type" content="article" />
    <meta name="twitter:creator" content="@brcart" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@brcart">
    <meta name="twitter:title" content="<?php echo $details['product_name']; ?>">
    <meta name="twitter:description" content="<?php echo $details['meta_description']; ?>">
    <meta name="twitter:image" content="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $details['photo']; ?>">
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
    <?php } else if ($pvalue['pgTitle'] == 'Home') {?>
    <title> Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery</title>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />


    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />

    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
		$fullurllink = "https";
	else $fullurllink = "http";
    $fullurllink .= "://";
	$fullurllink .= $_SERVER['HTTP_HOST'];
    $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />



    <meta name="twitter:site" content="@<?php echo SITE_NAME; ?>" />
    <meta name="twitter:title"
        content="U-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta name="twitter:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta name="twitter:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="twitter:app:country" content="IN" />
    <meta name="twitter:app:url:iphone" content="<?php echo WEB_URL; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />

    <meta name="robots" content="noodp">
    <!--Organization Schema-->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "U-BAAZAR-INDIA KA APNA BAAZAR!",
        "url": "https://brcart.com/",
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "7870757075",
            "email": "brcart@gmail.com",
            "contactType": "customer service",
            "contactOption": "TollFree"
        }, {
            "@type": "ContactPoint",
            "telephone": "brcart@gmail.com",
            "contactType": "customer service",
            "contactOption": "TollFree"
        }],
        "sameAs": [
            "https://facebook.com/brcartonline",
            "https://twitter.com/brcart",
            "https://www.instagram.com/u_baazar/",
            "",
            ""
        ]
    }
    </script>
    <!-- End of Organization Schema-->
    <?php } else if ($pvalue['pgTitle'] == 'Seller Log In') {?>
    <title>Seller Log IN | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <link rel="canonical" href="<?php echo WEB_URL; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Purnia - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
    <?php } else if ($pvalue['pgTitle'] == 'Search') {?>
    <title>Search | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />

    <?php } else if ($pvalue['pgTitle'] == 'Page Details') {?>
    <title> <?php echo $page_details['page_title']; ?> | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />

    <?php } else if ($pvalue['pgTitle'] == 'Category Page') {?>
    <title> <?php echo $pvalue['pgTitle']; ?> | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
   		$fullurllink = "https";
   	else $fullurllink = "http";
       $fullurllink .= "://";
   	$fullurllink .= $_SERVER['HTTP_HOST'];
       $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
    <?php } else if ($pvalue['pgTitle'] == 'Category Page') {?>
    <title> <?php echo $pvalue['pgTitle']; ?> | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
    <?php } else if ($pvalue['pgTitle'] == 'Category Page') {?>
    <title> <?php echo $pvalue['pgTitle']; ?> | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="OU-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
    <?php } else {?>
    <title> <?php echo $pvalue['pgTitle']; ?> | <?php echo SITE_NAME; ?></title>

    <meta itemprop="image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta name="keywords"
        content="brcart, brcart, ubazar, brcart, u baazar, u bazaar, ub, ubzar, uabazer, baazar, bazaar, baazaar,online shopping, online shopping sites, online shopping india, india shopping, Online shopping site" />
    <meta name="description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <?php 	if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    		$fullurllink = "https";
    	else $fullurllink = "http";
        $fullurllink .= "://";
    	$fullurllink .= $_SERVER['HTTP_HOST'];
        $fullurllink .= $_SERVER['REQUEST_URI']; ?>
    <link rel="canonical" href="<?php echo $fullurllink; ?>" />
    <meta property="og:title"
        content="U-BAAZAR Online Gift items Shopping Site In Patna - Buy Gift items Online and Get Same Day Delivery" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo WEB_URL; ?>" />
    <meta property="og:image" content="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>" />
    <meta property="og:description"
        content="Buy Online Gift Items And Get Fast Delivery In 3 Hours., Fruits &amp; Vegetables, Stationery &amp; Gifts items with our different categories for Pulses, Rice, Oil, Milk, Personal Care, Household supplies, Baby Care, Beverages, Fruits and vegetables in Patna Bihar." />
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />

    <?php }?>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $fav_Icon; ?>">

    <!-- WebFont.js -->
    <script>
    WebFontConfig = {
        google: {
            families: ['Poppins:400,500,600,700,800']
        }
    };
    (function(d) {
        var wf = d.createElement('script'),
            s = d.scripts[0];
        wf.src = '<?php echo WEB_PATH_FRONT; ?>js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
    </script>

    <link rel="preload" href="<?php echo WEB_PATH_FRONT; ?>vendor/fontawesome-free/webfonts/fa-regular-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo WEB_PATH_FRONT; ?>vendor/fontawesome-free/webfonts/fa-solid-900.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo WEB_PATH_FRONT; ?>vendor/fontawesome-free/webfonts/fa-brands-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo WEB_PATH_FRONT; ?>fonts/wolmart87d5.ttf?png09e" as="font" type="font/ttf"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo WEB_PATH_FRONT; ?>vendor/magnific-popup/magnific-popup.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->
    <script src="<?php echo WEB_PATH_FRONT; ?>js/jquery.min.js"></script>
    <script src="<?php echo WEB_PATH_FRONT; ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo WEB_PATH_FRONT; ?>js/bootstrap.js"></script>
    <script src="<?php echo WEB_PATH_FRONT; ?>js/loader.js"></script>
    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>csss/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH_FRONT; ?>css/page_orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.min.js" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo WEB_PATH_FRONT; ?>css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179585447-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-179585447-1');
    </script>


    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PDZS36D');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1202824426805209');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1202824426805209&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <meta name="facebook-domain-verification" content="tdtpc3mux2s5q8kyw3uv402zoajkp5" />

    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body class="home">
    <div class="page-wrapper">
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDZS36D" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- Start of Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">

                    </div>
                    <div class="header-right">

                        <!-- End of DropDown Menu -->

                        <div class="">
                            <a style="font-size:14px;letter-spacing:1.8;"
                                href="<?php echo WEB_URL . 'users/seller'; ?>">Sell</a>

                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
                        <a href="<?php echo WEB_URL . 'ask-question.html'; ?>"
                            style="font-size:14px;letter-spacing:1.8;" class="d-lg-show">Contact Us</a>
                        <?php if ($this->isUserLoggedIn) {?>
                        <a href="javascript:void()" style="font-size:14px;letter-spacing:1.8;"
                            onclick="window.location.href='<?php echo WEB_URL . 'myaccount'; ?>'" class="d-lg-show">My
                            Account</a>
                        <?php } else {?>
                        <a style="font-size:14px;letter-spacing:1.8;" href="javascript:void()"
                            onclick="window.location.href='<?php echo WEB_URL . 'login'; ?>'"
                            class="d-lg-show login sign-in">
                            <i class="w-icon-account"></i>Sign In</a>
                        <?php }?>

                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                        </a>
                        <a href="<?php echo WEB_URL; ?>" class="logo ml-lg-0">
                            <img src="<?php echo WEB_ATTACHMENT_LOGO_PATH; ?><?php echo $headerLogo; ?>"
                                alt="brcart logo" width="144" height="55" />
                        </a>
                        <form method="get" action="<?php echo WEB_URL . 'search?q=' ?>"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>

                                </select>
                            </div>

                            <input id="product-box" type="text" class="form-control" name="q" placeholder="Search in..."
                                required />

                            <button id="fsearch" class="btn btn-search" type="submit"><i class="w-icon-search"></i>

                            </button>
                            <div id="productList"></div>
                            <div class="spinner-border text-success" id="fspinner" style="display:none;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </form>


                    </div>
                    <div class="header-right ml-4">

                        <a style="text-decoration:none;" class="wishlist label-down link d-xs-show text_decoration"
                            href="<?php echo WEB_URL; ?>">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <?php if (false) {?>
                        <a style="text-decoration:none;" class="compare label-down link d-xs-show"
                            href="javascript:void(0)">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a><?php }?>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <!--<div class="cart-overlay"></div>-->
                            <a id="cart_details" style="text-decoration:none;" href="<?php echo WEB_URL . 'cart' ?>"
                                class="">
                                <i class="w-icon-cart">
                                    <span class="cart-count"><?php echo $this->cart->total_items(); ?></span>
                                </i>

                            </a>

                            <?php if ($this->cart->total_items() > 0) {?>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <?php foreach ($cartItems as $item) {?>

                                <div class="products">
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="<?php echo WEB_URL . 'item/' . $item['slug']; ?>"
                                                class="product-name">
                                                <?php echo $item["name"]; ?></a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">Rs&nbsp;<?php echo $item["price"]; ?></span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $item['photo']; ?>"
                                                    alt="product" height="54" width="64" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>


                                </div>
                                <?php }?>
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">Rs&nbsp; <?php echo $this->cart->total(); ?></span>
                                </div>

                                <div class="cart-action">
                                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                            <?php } else {?>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="container">
                                    <div class="main-content-wrap">
                                        <div class="main-content">
                                            <div class="woocommerce">
                                                <div class="cart-empty-page text-center">
                                                    <div class="woocommerce-notices-wrapper"></div>
                                                    <p class="cart-empty woocommerce-danger">Your cart is currently
                                                        empty.</p>
                                                    <i style="font-size:20px;" class="cart-empty w-icon-cart"></i>
                                                    <p class="return-to-shop">
                                                        </br>
                                                        </br>
                                                        </br>
                                                        <a class="button wc-backward btn btn-rounded btn-dark"
                                                            href="<?php echo WEB_URL; ?>">Return to shop</a>
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

                </div>


            </div>

            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <!-- left side categories---->

                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a style="text-decoration:none;" href="<?php echo WEB_URL; ?>">Home</a>
                                    </li>
                                    <?php if (false) {?>
                                    <li>
                                        <a href="<?php echo WEB_URL . 'shop' ?>">Shop</a>
                                        <ul>
                                            <?php
foreach ($categories_list as $category) {?>
                                            <li>
                                                <a
                                                    href="<?php echo WEB_URL; ?>category?cat=<?php echo $category->id; ?>"><?php echo $category->name; ?></a>
                                                <ul>
                                                    <?php foreach ($category->subs as $sub) {?>
                                                    <li><a
                                                            href="<?php echo WEB_URL; ?>category?cat=<?php echo $category->id; ?>&subcat=<?php echo $sub->id; ?>"><?php echo $sub->name; ?></a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </li>
                                            <?php }?>

                                        </ul>
                                    </li>

                                    <?php }?>

                                    <li>
                                        <a href="<?php echo WEB_URL . 'category?cat=29' ?>">Gift items</a>

                                        <ul>

                                        </ul>
                                    </li>

                                    <li>
                                        <a href="<?php echo WEB_URL . 'category?cat=25' ?>">Books</a>

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
                                        <a href="<?php echo WEB_URL . 'category?cat=24' ?>">Health</a>

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
                                        <a href="<?php echo WEB_URL . 'category?cat=23' ?>">Fashion</a>

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
                                        <a href="<?php echo WEB_URL . 'category?cat=22' ?>">Beauty</a>

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
                                    <?php if(false) { ?>
                                    <li>
                                        <a href="<?php echo WEB_URL . 'category?cat=19' ?>">Home</a>

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
                                        <a href="<?php echo WEB_URL . 'category?cat=18' ?>">Baby Care</a>

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
                                    </li><?php } ?>


                                    <li>
                                        <a href="<?php echo WEB_URL . 'browsecategories' ?>">More</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo WEB_URL . 'browsecategories' ?>">Distributor</a>
                                        <ul>

                                            <li><a href="<?php echo WEB_URL.'distributor-login'; ?>">Login</a>
                                            </li>
                                            <li><a href="<?php echo WEB_URL.'distributor-register'; ?>">Register</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="<?php echo WEB_URL.'home/trackOrder'?>" class="d-xl-show"><i
                                    class="w-icon-map-marker mr-1"></i>Track
                                Order</a>
                            <a href="<?php echo WEB_URL . 'dailydeals' ?>"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->