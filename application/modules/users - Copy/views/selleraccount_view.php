  <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Seller Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

 <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg p-2">
					 
                        <ul class="nav nav-tabs mb-6" role="tablist">
						 <a href="#account-dashboard" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3 active">
                     <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;DASHBOARD
                   </li>
               </a>
			    <?php if($seller['vendor_status']=='3') { ?>
			   <a href="<?php echo WEB_URL.'seller/sellerDashboard' ?>" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="w-icon-heart"></i>&nbsp;Seller Panel
                  </li>
               </a>
			   <?php } ?>
			   <a href="#account-details" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile Details
                   </li>
               </a>
			   <a href="change_password.php" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="fa fa-key" aria-hidden="true"></i>&nbsp;CHANGE PASSWORD
                   </li>
               </a>
               
			   <a href="<?php echo WEB_URL.'users/address'?>" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                      <i class="w-icon-map-marker"></i>&nbsp;MY ADDRESS
                  </li>
               </a>
			   <a href="<?php echo WEB_URL.'users/myorders'?>" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="w-icon-orders"></i>&nbsp;MY ORDERS
                  </li>
               </a>
                   <a href="<?php echo WEB_URL.'cart'?>" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                      <i class="w-icon-cart"></i>&nbsp;MY CART
                  </li>
               </a>
			   <a href="my_address.php" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="w-icon-heart"></i>&nbsp;MY WISHLIST
                  </li>
               </a>
			   <?php if($seller['is_vendor']=='1' and $seller['vendor_status']=='0') { ?>
			   <a href="<?php echo WEB_URL.'selectplan' ?>" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="w-icon-heart"></i>&nbsp;Select Subscription Plan
                  </li>
               </a>
			   <?php } ?>
              
               <a href="<?php echo WEB_URL.'sellerlogout'?>" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex  align-items-center p-3">
                    <i class="w-icon-logout"></i>&nbsp; LOGOUT
                  </li>
               </a>
					
                        </ul>

                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <p class="greeting">
                                  <div class="container">
								  <?php if($seller['is_vendor']=='1') { ?>
								  <div class="store store-banner mb-4">
                                <figure class="store-media">
                                    <img src="<?php echo WEB_PATH_FRONT; ?>images/profile_background.jpg" alt="Vendor" width="930" height="416"
                                        style="background-color: #414960;" />
                                </figure>
                                <div class="store-content">
                                    <figure class="seller-brand">
                                        <img src="<?php echo WEB_PATH_FRONT; ?>images/vendor/brand/1.jpg" alt="Brand" width="80"
                                            height="80" />
                                    </figure>
                                    <h4 class="store-title">Welcome <?php echo $seller['first_name']; ?>!</h4>
                                    <ul class="seller-info-list list-style-none mb-6">
                                        <?php if(false) { ?>
										<li class="store-address">
                                            <i class="w-icon-map-marker"></i>
                                            Steven Street, El Carjon
                                            California, United States (US)
								  </li><?php } ?>
                                        <li class="store-phone">
                                            <a href="tel:<?php echo $seller['mobile_no']; ?>">
                                                <i class="w-icon-phone"></i>
                                                <?php echo $seller['mobile_no']; ?>
                                            </a>
                                        </li>
										<li class="store-phone">
                                            <a href="mailto:<?php echo $seller['email']; ?>">
                                                <i class="w-icon-envelop"></i>
                                                <?php echo $seller['email']; ?>
												
												<?php if(false) {  ?>
        <p><b>Gender: </b><?php echo $seller['id_seller_type']; ?></p>
        <p><b>Usertype: </b><?php echo $this->session->userdata('id_seller_type'); ?></p>
								  <p><b>Id: </b><?php echo $this->session->userdata('sellerId'); ?></p> <?php } ?> 
                                            </a>
                                        </li>
										<li class="store-phone">
                                            <a href="mailto:<?php echo $seller['email']; ?>">
                                                <i class="w-icon-user"></i>
                                                <?php echo $seller['gender']; ?>
											</a>
                                        </li>
										 
                                        <li class="store-rating">
                                            <i class="w-icon-star-full"></i>
                                            4.33 rating from 3 reviews
                                        </li>
                                        <li class="store-open">
                                            <i class="w-icon-cart"></i>
                                            Visit Store
                                        </li> 
                                    </ul>
									<?php if(false) { ?>
                                    <div class="social-icons social-no-color border-thin">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-google w-icon-google"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div><?php } ?>
                                </div>
                            </div>
								  <?php } ?>
								  
 </p>
   
</div>
                               
								<?php $this->load->view('adminlayout/message_view');?>
                                 
                            </div>

                             
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->