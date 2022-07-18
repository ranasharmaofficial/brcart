<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo (isset($pvalue['page_heading'])) ? $pvalue['page_heading'] : 'List'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo WEB_URL . 'dashboard/myDashboard' ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php echo (isset($pvalue['page_heading'])) ? $pvalue['page_heading'] : 'List'; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <p for="subject">Select Category : <?php echo $row['category']; ?></p>
                                    <select class="form-control" name="category">
                                        <option value="homeDisplay">homeDisplay</option>
                                        <option value="ClothingApparel">ClothingApparel</option>
                                        <option value="homeDailydeals">homeDailydeals</option>
                                        <option value="homeFashion">homeFashion</option>
                                        <option value="productDetailsRight">productDetailsRight</option>
                                        <option value="categoyHeaderAd">categoyHeaderAd</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p for="subject">Short Title <star>*</star>
                                    </p>
                                    <input class="form-control" value="<?php echo $row['short_title']; ?>" id="subject"
                                        type="text" placeholder="Enter short title" name="short_title" />
                                    <?php echo form_error('short_title'); ?>
                                </div>
                                <div class="form-group">
                                    <p for="subject">Long Title <star>*</star>
                                    </p>
                                    <input class="form-control" value="<?php echo $row['long_title']; ?>" id="subject"
                                        type="text" placeholder="Enter long title" name="long_title" />
                                    <?php echo form_error('long_title'); ?>
                                </div>
                                <div class="form-group">
                                    <p for="subject">Sale Discount <small>in Number</small>
                                        <star>*</star>
                                    </p>
                                    <input class="form-control" value="<?php echo $row['discount']; ?>" id="subject"
                                        type="text" placeholder="Enter sale discount" name="sale_discount" />
                                </div>
                                <div class="form-group">
                                    <p for="subject">Page Link <star>*</star>
                                    </p>
                                    <input class="form-control" value="<?php echo $row['link']; ?>" id="subject"
                                        type="text" placeholder="Enter Link" name="link" />
                                    <?php echo form_error('link'); ?>
                                </div>
                                <div class="form-group">
                                    <p for="subject">Text Color <star>*</star>&nbsp;
                                    <div
                                        style="height:20px;width:20px;background-color:<?php echo $row['text_color']; ?>;">
                                    </div>
                                    </p>
                                    <input class="form-control" id="subject" type="color" name="text_color" />
                                    <?php echo form_error('text_color'); ?>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-right">
                                <button type="submit" name="submit" value="submit"
                                    class="btn btn-sm btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <!-- Form Element sizes -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Update Picture</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <p for="exampleInputFile">Select Picture</p>
                                    <input onchange="loadFile(event)" required name="image_file" type="file"
                                        class="form-control" id="exampleInputFile">
                                </div>
                                <div class="form-group">
                                    <img style="width:auto;height:100px;padding-top:5px;padding-bottom:2px;"
                                        class="img-fluid" id="picone" />
                                    <script>
                                    var loadFile = function(event) {
                                        var input = document.getElementById('picone');
                                        picone.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="updatepicture" value="updatepicture"
                                        class="btn btn-sm btn-warning">Update&nbsp;Picture</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p for="exampleInputFile">Current Picture Preview : </p>
                                    <hr>
                                    <img style="height:80px;"
                                        src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['picture']; ?>"
                                        class="img-thumbnail" />


                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </form>

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->