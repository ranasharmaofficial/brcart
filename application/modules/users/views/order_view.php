<style>
star {
    color: red;
    font-weight: bold;
}

.error_prefix {
    color: red;
}

.pagination {
    float: right;
}

.pagination li a {
    padding: 6px 16px;
    border: 1px solid #007bff;
    border-radius: 3px;
    margin: 2px;
}

.pagination li a:hover {
    text-decoration: none;
    background-color: #007bff;
    border-radius: 3px;
    color: #fff;
}

.pagination li a.current_page {
    background-color: #007bff;
    color: #fff;
    padding: 6px 16px;
    border-radius: 3px margin:2px;

}
</style>

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Orders</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg p-2">

                <?php include 'profile_left.php';?>

                <div class="tab-content mb-6">
                    <div class="tab-pane active" id="account-dashboard">

                        <style>
                        @media only screen and (max-width: 600px) {

                            #img {
                                margin-top: -30px;
                            }


                        }

                        ol.progtrckr {
                            margin: 0;
                            padding: 0;
                            list-style-type none;
                        }

                        ol.progtrckr li {
                            display: inline-block;
                            text-align: center;
                            font-size: 9px;
                            line-height: 3.5em;
                        }

                        ol.progtrckr[data-progtrckr-steps="2"] li {
                            width: 100%;
                        }

                        ol.progtrckr[data-progtrckr-steps="3"] li {
                            width: 33%;
                        }

                        ol.progtrckr[data-progtrckr-steps="4"] li {
                            width: 24%;
                        }

                        ol.progtrckr[data-progtrckr-steps="5"] li {
                            width: 24%;
                        }

                        ol.progtrckr[data-progtrckr-steps="6"] li {
                            width: 16%;
                        }

                        ol.progtrckr[data-progtrckr-steps="7"] li {
                            width: 14%;
                        }

                        ol.progtrckr[data-progtrckr-steps="8"] li {
                            width: 12%;
                        }

                        ol.progtrckr[data-progtrckr-steps="9"] li {
                            width: 11%;
                        }

                        ol.progtrckr li.progtrckr-done {
                            color: black;
                            border-bottom: 4px solid #278b5b;
                        }

                        ol.progtrckr li.progtrckr-todo {
                            color: silver;
                            border-bottom: 4px solid silver;
                        }

                        ol.progtrckr li:after {
                            content: "\00a0\00a0";
                        }

                        ol.progtrckr li:before {
                            position: relative;
                            bottom: -2.5em;
                            float: left;
                            left: 50%;
                            line-height: 1em;
                        }

                        ol.progtrckr li.progtrckr-done:before {
                            content: "\2713";
                            color: white;
                            background-color: #278b5b;
                            height: 2.2em;
                            width: 2.2em;
                            line-height: 2.2em;
                            border: none;
                            border-radius: 2.2em;
                        }

                        ol.progtrckr li.progtrckr-todo:before {
                            content: "\039F";
                            color: silver;
                            background-color: white;
                            font-size: 2.2em;
                            bottom: -1.2em;
                        }

                        ol.progtrckrcan {
                            margin: 0;
                            padding: 0;
                            list-style-type none;
                        }

                        ol.progtrckrcan li {
                            display: inline-block;
                            text-align: center;
                            font-size: 9px;
                            line-height: 3.5em;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="2"] li {
                            width: 100%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="3"] li {
                            width: 33%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="4"] li {
                            width: 24%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="5"] li {
                            width: 24%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="6"] li {
                            width: 16%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="7"] li {
                            width: 14%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="8"] li {
                            width: 12%;
                        }

                        ol.progtrckrcan[data-progtrckrcan-steps="9"] li {
                            width: 11%;
                        }

                        ol.progtrckrcan li.progtrckrcan-done {
                            color: black;
                            border-bottom: 4px solid #e21837;
                        }

                        ol.progtrckrcan li.progtrckrcan-todo {
                            color: silver;
                            border-bottom: 4px solid silver;
                        }

                        ol.progtrckrcan li:after {
                            content: "\00a0\00a0";
                        }

                        ol.progtrckrcan li:before {
                            position: relative;
                            bottom: -2.5em;
                            float: left;
                            left: 90%;
                            line-height: 1em;
                        }

                        ol.progtrckrcan li.progtrckrcan-done:before {
                            content: "\2573";
                            color: white;
                            background-color: #e21837;
                            height: 2.2em;
                            width: 2.4em;
                            line-height: 2.2em;
                            border: none;
                            border-radius: 2.2em;
                        }

                        ol.progtrckrcan li.progtrckrcan-todo:before {
                            content: "\2573";
                            color: silver;
                            background-color: white;
                            font-size: 2.2em;
                            bottom: -1.2em;
                        }
                        </style>

                        <div class="row justify-content-center">

                            <div class="col-xs-10 mb-4">
                                <?php $this->load->view('adminlayout/message_view');?>
                                <?php if (count($getAllorder)): ?>
                                <?php if(is_array($getAllorder) && count($getAllorder) > 0){
									foreach ($getAllorder as $art): ?>

                                </br>
                                <div onclick="window.location.href='<?php echo WEB_URL . 'users/orderdetails/' ?><?php echo encrypt_url($art->id); ?>'"
                                    style="margin-top:5px;cursor:pointer;" class="col-sm-12 shadow-sm card">
                                    <div style="line-height:1.8;" class="content text-priamry p-2">
                                        <?php if ($art->deliverystatus != '5') {?>


                                        <ol class="progtrckr" data-progtrckr-steps="5">
                                            <li class="progtrckr-done">Order Placed</li>
                                            <!--
	-->
                                            <li
                                                class="progtrckr-<?php if ($art->deliverystatus == '2' or $art->deliverystatus == '3' or $art->deliverystatus == '4') {echo 'done';} else {echo 'todo';}?>">
                                                Approved</li>
                                            <!--
 -->
                                            <li
                                                class="progtrckr-<?php if ($art->deliverystatus == '3' or $art->deliverystatus == '4') {echo 'done';} else {echo 'todo';}?>">
                                                Shipped</li>
                                            <!--
 -->
                                            <li
                                                class="progtrckr-<?php if ($art->deliverystatus == '4') {echo 'done';} else {echo 'todo';}?>">
                                                Delivered</li>
                                        </ol>


                                        <?php } else {?>

                                        <ol class="progtrckrcan" data-progtrckrcan-steps="2">
                                            <li class="progtrckrcan-done">
                                                <div style="float: left; display: inline-block;font-size: 14px;">Order
                                                    Cancelled</div>
                                            </li>
                                        </ol>


                                        <?php }?>
                                        <hr>

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="content">
                                                    <img style="height:70px;" class="img-thumbnail"
                                                        src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $art->product_photo; ?>"
                                                        alt="">

                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <span style="float:left;font-size:16px;color:#000;"
                                                    class="font-weight-bold"><?php echo $art->product_name; ?></span>
                                            </div>

                                        </div>
                                        <a style="text-decoration:none;font-size:16px;color:#000;font-weight:700; vertical-align: middle;"
                                            href="<?php echo WEB_URL . 'users/orderdetails/' ?><?php echo encrypt_url($art->id); ?>">Order
                                            ID : #<?php echo $art->order_no; ?></a></br>


                                        <?php if ($art->deliverystatus != '5') {?>
                                        <p
                                            style="text-decoration:none;font-size:13px;color:#797D7F;font-weight:400; vertical-align: middle;">
                                            Orderd Time : <?php echo $art->order_time; ?>
                                            <a
                                                href="<?php echo WEB_URL . 'users/orderdetails/' ?><?php echo encrypt_url($art->id); ?>">
                                                <i style="color:#34495E;font-weight:900;font-size:16px;float:right;"
                                                    class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <span
                                            style="text-decoration:none;font-size:13px;color:#797D7F;font-weight:400; vertical-align: middle;">Orderd
                                            Status :
                                            <span style="color:grey;">
                                                <?php if ($art->deliverystatus == '1') {?>
                                                <span
                                                    style="background-color:red;font-size:1.3rem;color:#fff;font-weight:bold;"
                                                    class="badge badge-danger p-2">Order Placed</span>
                                                <?php } else if ($art->deliverystatus == '2') {?>
                                                <span style="color:#000;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-warning p-2">Order Approved</span>
                                                <?php } else if ($art->deliverystatus == '3') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-primary p-2">Order Shipped</span>
                                                <?php } else if ($art->deliverystatus == '4') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-success p-2">Order Delivered</span>
                                                <?php } else if ($art->deliverystatus == '5') {?>
                                                <span style="color:#fff;font-weight:none;font-size:1.3rem;"
                                                    class="badge badge-info p-2">Request for order Cancel</span>
                                                <?php } else if ($art->deliverystatus == '6') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-danger p-2">Order Cancelled</span>
                                                <?php }?>
                                            </span>
                                        </span>
                                        <?php } else {?>
                                        <p
                                            style="text-decoration:none;font-size:13px;color:#797D7F;font-weight:400; vertical-align: middle;">
                                            Cancelled Time : <?php echo $art->cancel_time; ?>
                                            <a
                                                href="<?php echo WEB_URL . 'users/orderdetails/' ?><?php echo encrypt_url($art->id); ?>">
                                                <i style="color:#34495E;font-weight:900;font-size:16px;float:right;"
                                                    class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <span
                                            style="text-decoration:none;font-size:13px;color:#797D7F;font-weight:400; vertical-align: middle;">Orderd
                                            Status :
                                            <span style="color:grey;">
                                                <?php if ($art->deliverystatus == '1') {?>
                                                <span
                                                    style="background-color:red;font-size:1.3rem;color:#fff;font-weight:bold;"
                                                    class="badge badge-danger p-2">Order Placed</span>
                                                <?php } else if ($art->deliverystatus == '2') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-warning p-2">Order Approved</span>
                                                <?php } else if ($art->deliverystatus == '3') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-primary p-2">Order Shipped</span>
                                                <?php } else if ($art->deliverystatus == '4') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-success p-2">Order Delivered</span>
                                                <?php } else if ($art->deliverystatus == '5') {?>
                                                <span style="color:#fff;font-weight:none;font-size:1.3rem;"
                                                    class="badge badge-info p-2">Request for order Cancel</span>
                                                <?php } else if ($art->deliverystatus == '6') {?>
                                                <span style="color:#fff;font-weight:bold;font-size:1.3rem;"
                                                    class="badge badge-danger p-2">Order Cancelled</span>
                                                <?php }?>
                                            </span>
                                        </span>
                                        <?php }?>
                                    </div>
                                </div>
			

                                <?php endforeach; } ?>
                                <?php else: ?>
                                <center>
                                    <img style="width:auto;height:250px;"
                                        src="<?php echo WEB_PATH_FRONT . 'images/no_order.svg' ?>">
                                    <p
                                        style="width:100%;text-align:center;font-size:18px;color:orange;font-weight:bold;">
                                        No Orders !</p>
                                </center>
                                <?php endif;?>


                            </div>

                        </div>
                        <nav aria-label="...">
                            <?php echo $pagelinks ?>
                        </nav>
                    </div>




                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->

<script>
categoryList(page_url = false);

$(document).on('click', "#searchBtn", function(event) {
    categoryList(page_url = false);
    event.preventDefault();
});

$(document).on('click', "#resetBtn", function(event) {
    $("#search_key").val('');
    categoryList(page_url = false);
    event.preventDefault();
});

$(document).on('click', ".pagination li a", function() {
    var page_url = $(this).attr('href');
    categoryList(page_url);
    return false;
});

function categoryList(page_url) {
    var base_url = $('meta[name="weburl"]').attr('content');
    base_url = base_url + "users/get_order_ajax_list";
    //var search_key = $('#search_key').val();
    var dataString = 'search_key=' + search_key;
    if (page_url) {
        base_url = page_url;
    }
    $.ajax({
        type: "POST",
        url: base_url,
        data: dataString,
        success: function(response) {
            $("#categoryContent").html(response);
        }
    })
}
</script>