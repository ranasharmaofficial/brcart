 <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">About Us</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul style="background-color:none;margin-top:10px;" class="breadcrumb">
                        <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                        <li><?php echo $page_details['page_title']; ?></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            
            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <section class="introduce">
                        <h2 class="title title-center">
                           <?php echo $page_details['page_title']; ?>
                        </h2>
                        <p style="text-align:justify;" class="text-align-justify mx-auto text-center"><?php echo $page_details['details']; ?></p>
                        <figure class="br-lg">
                            <img src="<?php echo WEB_PATH_FRONT; ?>images/pages/about_us/1.jpg" alt="Banner" 
                                width="1240" height="540" style="background-color: #D0C1AE;" />
                        </figure>
                    </section>

                 </div>

             </div>
        </main>
        <!-- End of Main -->