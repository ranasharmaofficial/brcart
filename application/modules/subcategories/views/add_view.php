<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Sub Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List'; ?>
                </h3>

                <div class="card-tools">
                    <a href="<?php echo WEB_URL.'subcategories/all';?>" class="btn btn-sm btn-danger">Back</a>
                </div>
            </div>
            <form class="form-row" method="post" action="" enctype="multipart/form-data">
                <div class="card-body row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <p for="ChooseCategory">Choose Category <star>*</star>
                            </p>
                            <?php
					echo form_dropdown('category_id',$CategoryId,'','class="form-control" id="category_id" ');
					?>
                            <?php echo form_error('category_id'); ?>
                        </div>
                        <div class="form-group">
                            <p for="subject">Subcategory Name <star>*</star>
                            </p>
                            <input class="form-control" value="<?php echo set_value('name'); ?>" id="subject"
                                type="text" placeholder="Enter Subcategory name" name="name" />
                            <?php echo form_error('name'); ?>
                        </div>
                        <!-- <div class="form-group">
					<p for="subject">Admin Commission Percentage <star>*</star></p>
					<input class="form-control" value=" echo set_value('admin_commission_percentage'); ?>" id="subject" type="number" placeholder="Enter Admin commission" name="admin_commission_percentage"/>
					 echo form_error('admin_commission_percentage'); ?>
				</div> -->

                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-info">Add
                                Subcategory</button>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->