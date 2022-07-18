<input type="hidden" name="id" value="<?php echo $row['id_user'];?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $row['first_name'].' '.$row['last_name'];?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <?php echo $row['first_name'].' '.$row['last_name'];?></h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Purchased Products</b> <a class="float-right"><?php echo $totalpp; ?></a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-envelope mr-1"></i> Education</strong>

                            <p class="text-muted">
                                <?php echo $row['email'];?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-mobile mr-1"></i> Location</strong>

                            <p class="text-muted"><?php echo $row['mobile_no'];?></p>

                            <hr>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Address</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="<?php echo WEB_URL.'user/all' ?>">Go&nbsp;Back</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="row">

                                        <?php
				if(is_array($user_address_list) && count($user_address_list) > 0) {
					foreach ($user_address_list as $val) {
					
// $address_id=my_address_id($user['id_user']); 					
						 $text='';
	  if($row['address']==$val['id'])
	  {
		  $text='<strong>(Default Address)</strong>';
	  }
						?>
                                        <div class="col-sm-6 mb-3">
                                            <div style="cursor:pointer;" class="card card-body">
                                                <p style="margin-bottom: 0.3rem;" class="font-weight-bold">
                                                    <?php echo $val['fullname']; ?></p>
                                                <p style="margin-bottom: 0.3rem;">House No. -
                                                    <?php echo $val['house_no']; ?></p>
                                                <p style="margin-bottom: 0.3rem;"><?php echo $val['address']; ?>,
                                                    <?php echo $val['landmark']; ?></p>
                                                <p style="margin-bottom: 0.3rem;"><?php echo $val['city']; ?>,
                                                    <?php echo $val['state']; ?> - <?php echo $val['pin']; ?></p>
                                                <p style="margin-bottom: 0.3rem;"><strong>Address Type -</strong>
                                                    <?php echo $val['address_type']; ?></p>
                                                <p style="margin-bottom: 0.3rem;"><strong>Delivery Time -</strong>
                                                    <?php echo $val['delivery_time']; ?></p>
                                                <hr>
                                                <div class="row">

                                                    <div class="col-6 text-left">
                                                        <?php if($text=='') { ?>
                                                        <a href="#"> <button
                                                                class="btn btn-danger btn-sm text-white float-left"><i
                                                                    class="fa fa-map-pin">&nbsp;</i>Set as
                                                                default</button></a>
                                                        <?php } else { ?>
                                                        <button class="btn btn-success btn-sm text-white float-left"><i
                                                                class="fa fa-map-pin">&nbsp;</i>Pinned</button>
                                                        <?php } ?>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <?php }
				}
					?>


                                    </div>
                                    <!-- /.post -->


                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->