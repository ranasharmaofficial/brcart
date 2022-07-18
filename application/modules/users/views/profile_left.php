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