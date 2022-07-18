<style>
star {
    color: red;
    font-weight: bold;
    font-size: 15px;
}

.error_prefix {
    color: red;
    font-size: 15px;
}
</style>
<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Ask a Question | Contact Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->
    </br>
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">Contact
                    Information
                </h3>

            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class=" swiper-container swiper-theme " data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 4
                                }
                            }
                        }">
                    <?php
if (is_array($companyAddress) && count($companyAddress) > 0) {
    foreach ($companyAddress as $val) {
        ?>
                    <div class=" swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <a style="text-decoration:none;" href="mailtp:<?php echo $val['email']; ?>">
                                    <p><?php echo $val['email']; ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <a style="text-decoration:none;" href="tel:7645830199">
                                    <p>7645830199</p>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p><?php echo $val['address']; ?></p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-fax">
                                <a style="text-decoration:none;"
                                    href="https://wa.me/+917645830199?text=Hello%20Team%20Sagar%20Baazar."> <i
                                        style="font-size:5.1rem;" class="fa fa-whatsapp"></i> </a>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">WhatsApp</h4>
                                <a style="text-decoration:none;"
                                    href="https://wa.me/+917645830199?text=Hello%20Team%20Sagar%20Baazar."> <i
                                        <p>7645830199</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <?php if (false) {?>
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">People usually ask these</h4>
                        <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                </div>
                                <div id="collapse1" class="card-body expanded">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                        orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                        sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                </div>
                                <div id="collapse2" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                        orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                        sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                </div>
                                <div id="collapse3" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                        orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                        sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse4" class="expand">How can I track an order?</a>
                                </div>
                                <div id="collapse4" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                        orincid
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu
                                        sceler
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse5" class="expand">How can I get money back?</a>
                                </div>
                                <div id="collapse5" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                        metus vulp utate eu sceler isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div class="col-lg-3 mb-8">
                    </div>
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">Ask a Question</h4>
                        <?php $this->load->view('adminlayout/message_view');?>
                        <form class="form contact-us-form" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input style="font-size:15px;" type="text"
                                            value="<?php echo set_value('name'); ?>" name="name"
                                            class="form-control form-control-sm form-control-a" placeholder="Your Name">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <input style="font-size:15px;" name="mobile" type="tel"
                                            value="<?php echo set_value('mobile'); ?>"
                                            class="form-control form-control-lg form-control-a"
                                            placeholder="Your Mobile">
                                        <?php echo form_error('mobile'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input style="font-size:15px;" type="text" name="email"
                                            value="<?php echo set_value('email'); ?>"
                                            class="form-control form-control-lg form-control-a"
                                            placeholder="Your E-mail">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea style="font-size:15px;" name="message"
                                            value="<?php echo set_value('message'); ?>" class="form-control"
                                            name="message" cols="45" rows="8" data-rule="required"
                                            data-msg="Please write something for us" placeholder="Message"></textarea>
                                        <?php echo form_error('message'); ?>
                                    </div>
                                </div>


                                <div class="col-md-12 text-center">
                                    <button style="padding:10px;" type="submit" name="submit" value="submit"
                                        class="btn btn-dark btn-rounded">Proceed</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-3 mb-8">
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location.
        <div class="google-map contact-google-map" id="googlemaps"></div>
          End Map Section -->--->
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->