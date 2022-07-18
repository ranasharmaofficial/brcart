<?php
/*
 
$rana=$user['id_user'];	
include('./db.php');
$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "Select address from users where id_user='$rana'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($address_id);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();	


$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "select count(id) from customer_address where id='$address_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_adds);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();	
*/
?>
  <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Your Address</h1>
                </div>
            </div>
            <!-- End of Page Header -->

 <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg p-2">
					 
                    <?php include('profile_left.php'); ?>    

                        <div class="tab-content mb-6">
                            <div class="tab-pane " id="account-dashboard">
                                <p class="greeting">
                                  <div class="container">
								  <?php if($user['is_vendor']=='1') { ?>
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
                                    <h4 class="store-title">Welcome <?php echo $user['first_name']; ?>!</h4>
                                    <ul class="seller-info-list list-style-none mb-6">
                                        <li class="store-address">
                                            <i class="w-icon-map-marker"></i>
                                            Steven Street, El Carjon
                                            California, United States (US)
                                        </li>
                                        <li class="store-phone">
                                            <a href="tel:<?php echo $user['mobile_no']; ?>">
                                                <i class="w-icon-phone"></i>
                                                <?php echo $user['mobile_no']; ?>
                                            </a>
                                        </li>
										<li class="store-phone">
                                            <a href="mailto:<?php echo $user['email']; ?>">
                                                <i class="w-icon-envelop"></i>
                                                <?php echo $user['email']; ?>
												<p><b>Gender: </b><?php echo $user['id_user']; ?></p>
        <p><b>Gender: </b><?php echo $user['id_user_type']; ?></p>
        <p><b>Usertype: </b><?php echo $this->session->userdata('id_user_type'); ?></p>
        <p><b>Id: </b><?php echo $this->session->userdata('userId'); ?></p>
                                            </a>
                                        </li>
										 
                                        <li class="store-rating">
                                            <i class="w-icon-star-full"></i>
                                            4.33 rating from 3 reviews
                                        </li>
                                        <li class="store-open">
                                            <i class="w-icon-cart"></i>
                                            Store Open
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
        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
        <?php if(false) { ?><p><b>Cust: </b><?php echo $user['id_user']; ?></p>
        <p><b>Seller: </b><?php echo $user['is_vendor']; ?></p>
        <p><b>ID: </b><?php echo $this->session->userdata('userId'); ?></p><?php } ?>
        <p><b>ID--: </b><?php echo $userId; ?></p><?php } ?>
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
                                <p class="mb-4">
                                    From your account dashboard you can view your <a href="#account-orders"
                                        class="text-primary link-to-tab">recent orders</a>,
                                    manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                        and billing
                                        addresses</a>, and
                                    <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                        account details.</a>
                                </p>

                                <div class="row">
								
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-orders" class="link-to-tab ">
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
                                        <a href="#account-downloads" class="link-to-tab">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-download">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-download"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Downloads</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-addresses" class="link-to-tab">
                                            <div class="icon-box text-center myaccount_box">
                                                <span class="icon-box-icon icon-address">
                                                    <i style="text-decoration:none;color:#fff;" class="w-icon-map-marker"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p style="text-decoration:none;color:#fff;" class="text-uppercase mb-0">Addresses</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-details" class="link-to-tab">
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
                                        <a href="wishlist.html" class="link-to-tab">
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
                                        <a href="<?php echo WEB_URL.'logout'?>">
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

                             

                            

                            <div class="tab-pane active in" id="account-addresses">
                                <div class="icon-box icon-box-side icon-box-light mb-4">
                                    <div class="icon-box-content">
                                        <h3 class="address-box-title mb-0 ls-normal">Your Address <?php if(false) { ?><?php echo $totalAddress; ?><?php } ?></h3>
                                    </div>
                                </div>
                                <?php $this->load->view('adminlayout/message_view'); ?>
							<?php if($totalAddress<'1') { ?>   
                                <div class="row">
                                    <div class="col-sm-4 mb-4">
									</div>
                                    <div class="col-sm-4 mb-4">
                                        <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'users/addAddress'?>'" class="address-box">
											<center>
											<img src="<?php echo WEB_PATH_FRONT.'images/plus.png' ?>" style="height:50px;wisth:50px;">
                                            <h4 style="" class="address-box-title">Add Address</h4></center>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4">
									</div>
                                </div>
							<?php } ?>
							<?php if($totalAddress>='1') { ?>
							<div class="container">
								<h4 class="">Personal Address</h4>
								<hr>
                                
								<div class="row">
								
								<div class="col-sm-6 mb-3">
                                       <div style="cursor:pointer;" onclick="window.location.href='<?php echo WEB_URL.'users/addAddress'?>'" class="address-box">
											<center>
											<img src="<?php echo WEB_PATH_FRONT.'images/plus.png' ?>" style="height:50px;wisth:50px;">
                                            <h4 style="" class="address-box-title">Add Address</h4></center>
                                        </div>
                                    </div>
									
									<?php
				if(is_array($user_address_list) && count($user_address_list) > 0) {
					foreach ($user_address_list as $val) {
					
// $address_id=my_address_id($user['id_user']); 					
						 $text='';
	  if($user['address']==$val['id'])
	  {
		  $text='<strong>(Default Address)</strong>';
	  }
						?>
									<div class="col-sm-6 mb-3">
                                        <div style="cursor:pointer;" class="personal-address-box">
											<span class="font-weight-bold"><?php echo $val['fullname']; ?></span></br>
											<span>House No. - <?php echo $val['house_no']; ?></span></br>
											<span><?php echo $val['address']; ?>, <?php echo $val['landmark']; ?></span></br>
											<span><?php echo $val['city']; ?>, <?php echo $val['state']; ?> - <?php echo $val['pin']; ?></span></br>
											<span><strong>Address Type -</strong> <?php echo $val['address_type']; ?></span></br>
											<span><strong>Delivery Time -</strong> <?php echo $val['delivery_time']; ?></span>
											 
											 
											<hr>
										<div class="row">
										
						<div class="col-6 text-left">
						<?php if($text=='') { ?>
						<a href="<?php echo WEB_URL.'users/setdefault'?>?address=<?php echo $val['id']; ?>"> <button class="btn btn-danger text-white float-left"><i  class="fa fa-map-pin">&nbsp;</i>Set as default</button></a>
						<?php } else { ?>
						<button class="btn btn-success text-white float-left"><i  class="fa fa-map-pin">&nbsp;</i>Pinned</button>
						<?php } ?>
						</div>
						<div class="col-6 text-right">
							<a href="<?php echo WEB_URL.'users/remove_address'?>?aid=<?php echo $val['id']; ?>"> <button class="btn btn-danger text-white float-right" ><i  class="fa fa-trash">&nbsp;</i>Remove</button></a>
					
						</div>
										</div>
										
										</div>
                                    </div>
					<?php }
				}
					?>			
						 
									
									
									 
									
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