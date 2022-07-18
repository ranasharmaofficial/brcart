<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">My Orders</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Account</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">My Orders</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
				<section class="py-4">
					<div class="container">
						<h3 class="d-none">Account</h3>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-4">
										<?php include('profile_left.php'); ?>
									</div>
									<div class="col-lg-8">
										<div class="card shadow-none mb-0">
											<div class="card-body">
												<p>Hello <strong><?php echo $user['first_name'].' '.$user['last_name']; ?></strong> (not <strong><?php echo $user['first_name'].' '.$user['last_name']; ?>?</strong>  <a href="<?php echo WEB_URL.'logout'?>">Logout</a>)</p>
												<p>From your account dashboard you can view your Recent Orders, manage your shipping and billing addesses and edit your password and account details</p>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
		<!--end page wrapper -->


<?php if(false){ ?>
  <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

 <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg p-2">
					 
                         <?php include('profile_left.php'); ?>

                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">
                                <p class="greeting">
                                  <div class="container">
								  <?php if($user['is_vendor']=='0') { ?>
							 <section class="mb-10 row">
							 <div class="col-2 col-md-2 col-sm-2 col-xs-2 mb-4">
									</div>
									<div class="col-sm-8 col-md-8 col-sm-8 col-xs-8 mb-4">
									<div style="border:2px solid #143250;" class="card shadow">
										<div  style="background-color:#143250;color:#fff;" class="card-header">Profile Details</div>
										<div class="card-body">
										<h2>Welcome <?php echo $user['first_name']; ?>!</h2>
    
    <div class="regisFrm">
        <p><b>Name: </b><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Phone: </b><?php echo $user['mobile_no']; ?></p>
        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
         <?php if(false) { ?><p><b>Cust: </b><?php echo $user['id_user']; ?></p>
        <p><b>Seller: </b><?php echo $user['is_vendor']; ?></p>
        <p><b>ID: </b><?php echo $this->session->userdata('userId'); ?></p>
		<p><b>ID: </b><?php echo $userId; ?></p>
		<?php } ?>
        <?php } ?>
    </div>
									</div>
									</div>
									</div>
                        
						<div class="col-2 col-md-2 col-sm-2 col-xs-2 mb-4">
									</div>
                    </section>
                            <!-- End of Store Banner -->
								   
 </p>
   
</div>
                               
								<?php $this->load->view('adminlayout/message_view'); ?>
                                
								<div class="row">
								
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a style="text-decoration:none;" href="<?php echo WEB_URL.'users/myorders'?>" class="link-to-tab ">
                                            <div style="border-radius:8px;" class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-orders">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a style="text-decoration:none;" href="<?php echo WEB_URL.'users/address'?>" class="link-to-tab">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-address">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-map-marker"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Address</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a style="text-decoration:none;" href="#account-details" class="link-to-tab">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-account">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Account Details</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a style="text-decoration:none;" href="#" class="link-to-tab">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-heart"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Wishlist</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a style="text-decoration:none;" href="<?php echo WEB_URL.'logout'?>">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-logout">
                                                    <i  style="text-decoration:none;color:#fff;" class="w-icon-logout"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Logout</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane mb-4" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="order-id">#2321</td>
                                            <td class="order-date">August 20, 2021</td>
                                            <td class="order-status">Processing</td>
                                            <td class="order-total">
                                                <span class="order-price">$121.00</span> for
                                                <span class="order-quantity"> 1</span> item
                                            </td>
                                            <td class="order-action">
                                                <a href="#"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order-id">#2321</td>
                                            <td class="order-date">August 20, 2021</td>
                                            <td class="order-status">Processing</td>
                                            <td class="order-total">
                                                <span class="order-price">$150.00</span> for
                                                <span class="order-quantity"> 1</span> item
                                            </td>
                                            <td class="order-action">
                                                <a href="#"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order-id">#2319</td>
                                            <td class="order-date">August 20, 2021</td>
                                            <td class="order-status">Processing</td>
                                            <td class="order-total">
                                                <span class="order-price">$201.00</span> for
                                                <span class="order-quantity"> 1</span> item
                                            </td>
                                            <td class="order-action">
                                                <a href="#"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="order-id">#2318</td>
                                            <td class="order-date">August 20, 2021</td>
                                            <td class="order-status">Processing</td>
                                            <td class="order-total">
                                                <span class="order-price">$321.00</span> for
                                                <span class="order-quantity"> 1</span> item
                                            </td>
                                            <td class="order-action">
                                                <a href="#"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="tab-pane" id="account-downloads">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-downloads mr-2">
                                        <i class="w-icon-download"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title ls-normal">Downloads</h4>
                                    </div>
                                </div>
                                <p class="mb-4">No downloads available yet.</p>
                                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="tab-pane" id="account-addresses">
                                <div class="icon-box icon-box-side icon-box-light mb-4">
                                    <div class="icon-box-content">
                                        <h3 class="address-box-title mb-0 ls-normal">Your Addresses ---<?php echo $totalAddress; ?></h3>
                                    </div>
                                </div>
                               
							<?php if($totalAddress<'1') { ?>   
                                <div class="row">
                                    <div class="col-sm-12 mb-4">
                                        <div style="" class="address-box">
											<center>
											<img src="<?php echo WEB_PATH_FRONT.'images/download.png' ?>" style="height:50px;wisth:50px;">
                                            <h4 style="" class="address-box-title">Add Address</h4></center>
                                        </div>
                                    </div>
                                </div>
							<?php } else { ?>
							<div class="container">
								<div class="row">
								<h4 style="" class="address-box-title">Add a New Address</h4></center>
                                    <div class="col-sm-12 mb-4">
                                        
                                    </div>
                                </div>
                                </div>
							<?php } ?>
								
                            </div>

                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                    </div>
                                </div>
								
                                <form class="form account-details-form" action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First name *</label>
                                                <input type="text" value="<?php echo $userrow['first_name']; ?>" id="firstname" name="firstname" class="form-control form-control-md">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last name *</label>
                                                <input type="text" value="<?php echo $userrow['last_name']; ?>" id="lastname" name="lastname" class="form-control form-control-md">
                                            </div>
                                        </div>
                                    </div>
									<div class="form-group mb-6">
                                        <label for="email_1">Email address *</label>
                                        <input type="email" value="<?php echo $userrow['email']; ?>"  id="email_1" name="email"
                                            class="form-control form-control-md">
                                    </div>
                                  
                                    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="cur-password" name="cur_password">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="new-password" name="new_password">
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="conf-password" name="conf_password">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
<?php } ?>