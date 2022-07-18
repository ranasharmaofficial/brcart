 
 <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav style="width:100%;" class="breadcrumb-nav container">
                <ul  class="breadcrumb bb-no">
                    <li><a href="<?php echo WEB_URL; ?>">Home</a></li>
                    <li>All Categories</li>
                    
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div style="width:100%" class="col-sm-12">
                            <div class="card row">
								<div class="card-body">
								<!--Grocery Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=29'?>"><h2 class="text-danger">Grocery</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($grocery_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=29&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=29&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Grocery End--->
									<!--Fashion Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=23'?>"><h2 class="text-danger">Fashion</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($fashion_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=23&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=23&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Fashion End--->
									<!--Beauty Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=22'?>"><h2 class="text-danger">Beauty</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($beauty_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=22&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=22&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Beauty End--->
									<!--Home & Appliances Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=19'?>"><h2 class="text-danger">Home & Appliances</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($home_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=19&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=19&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Home & Appliances End--->
									<!--Health Care Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=24'?>"><h2 class="text-danger">Health Care</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($health_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=24&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=24&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Health Care End--->
									<!--Baby Care Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=28'?>"><h2 class="text-danger">Baby Care</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($babycare_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=28&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=28&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Baby Care End--->
									<!--Electronics Care Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=16'?>"><h2 class="text-danger">Electronics</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($electronic_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=16&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=16&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Electronics Care End--->
									<!--Mobile Care Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=15'?>"><h2 class="text-danger">Mobile</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($mobile_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=15&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=15&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Mobile Care End--->
									<!--Computer & Laptops Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=14'?>"><h2 class="text-danger">Computer & Laptops</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($Computer_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=14&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=14&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Computer & Laptops End--->
									<!--Automobiles Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=17'?>"><h2 class="text-danger">Automobiles</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($automobiles_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=17&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=17&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Automobiles End--->
									<!--Sports Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=21'?>"><h2 class="text-danger">Sports</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($sports_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=21&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=21&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Sports End--->
									<!--Books Start--->
									<div class="col-md-12 mb-6">
											<a style="color:red;text-decoration:none;" href="<?php echo WEB_URL.'category?cat=25'?>"><h2 class="text-danger">Sports</h2></a>
											<hr>
										<div class="row">
																	<?php 
												foreach ($books_subcategories_list as $subcategory)
													{ ?>
											<div class="col-md-3">
												<a style="color:black;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=25&subcat=<?php echo $subcategory->id; ?>"><p style="font-size:20px;" class="font-weight-bold text-black"><?php echo $subcategory->name; ?></p></a>
													<ul style="list-style:none;">
														<?php foreach ($subcategory->childsubs as $childsubs)  { ?>
														<li style="font-size:17px;"><a style="color:#626567;text-decoration:none;" href="<?php echo WEB_URL; ?>category?cat=25&subcat=<?php echo $subcategory->id; ?>&childcat=<?php echo $childsubs->id; ?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $childsubs->name; ?></a></li>
														<?php } ?>
													</ul>
											</div>
											<?php } ?>
										</div>
									</div>
									<!--Books End--->
								</div> 
                            </div>
							
                            
                            
                             
                        </div>
						 
                        
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
 


