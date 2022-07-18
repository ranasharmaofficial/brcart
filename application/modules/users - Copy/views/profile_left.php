<div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
											<div class="card-body">
												<div class="list-group list-group-flush">	<a href="<?php echo WEB_URL.'users/account' ?>" class="list-group-item active d-flex justify-content-between align-items-center">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
													<a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Orders <i class='bx bx-cart-alt fs-5'></i></a>
													<a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Downloads <i class='bx bx-download fs-5'></i></a>
													<a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Addresses <i class='bx bx-home-smile fs-5'></i></a>
													<a href="#" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
													<a href="<?php echo WEB_URL.'users/accountdetails' ?>" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Account Details <i class='bx bx-user-circle fs-5'></i></a>
													<a href="<?php echo WEB_URL.'logout'?>" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
												</div>
											</div>
										</div>
										<?php if(false) { ?>
										<ul class="nav nav-tabs mb-6" role="tablist">
						 <a href="<?php echo WEB_URL.'users/account' ?>" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3 active">
                     <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;DASHBOARD
                   </li>
               </a>
			    
			   <a href="#account-details" class="text-decoration-none text-white link-to-tab">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile Details
                   </li>
               </a>
			   <a href="#" class="text-decoration-none text-white">
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
			   <?php if(false) { ?>
			   <a href="my_address.php" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex align-items-center p-3">
                     <i class="w-icon-heart"></i>&nbsp;MY WISHLIST
                  </li>
               </a><?php } ?>
			   
               <a href="<?php echo WEB_URL.'logout'?>" class="text-decoration-none text-white">
                  <li style="font-size:1.8rem;" class="border-bottom bg-info d-flex  align-items-center p-3">
                    <i class="w-icon-logout"></i>&nbsp; LOGOUT
                  </li>
               </a>
					
                        </ul>
										<?php } ?>