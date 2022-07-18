
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit <?php echo $row['title']; ?> Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></li>
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
          <div class="col-md-2">
		  </div>
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
			  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <div class="card-body row">
                <div class="form-group col-sm-6">
					<p for="name">Title <star>*</star></p>
					<input class="form-control" value="<?php echo $row['title']; ?>" id="name" type="text" name="title"/>
					<?php echo form_error('title'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Currency <star>*</star></p>
					<input class="form-control" value="<?php echo $row['currency']; ?>" id="subject" type="text" placeholder="Enter Currency" name="currency"/>
					<?php echo form_error('currency'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Currency Code <star>*</star></p>
					<input class="form-control" value="<?php echo $row['currency_code']; ?>" id="subject" type="text" placeholder="Enter Currency Code" name="currency_code"/>
					<?php echo form_error('currency_code'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Price <star>*</star></p>
					<input class="form-control" value="<?php echo $row['price']; ?>" id="subject" type="text" placeholder="Enter Price" name="price"/>
					<?php echo form_error('price'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Days <star>*</star></p>
					<input class="form-control" value="<?php echo $row['days']; ?>" id="subject" type="text" placeholder="Enter Days" name="days"/>
					<?php echo form_error('days'); ?>
				</div>
				<div class="form-group col-sm-6">
					<p for="subject">Allowed Products </p>
					<input class="form-control" value="<?php echo $row['allowed_products']; ?>" id="subject" type="text" placeholder="Enter Allowed Products" name="allowed_products"/>
				</div>
				<div class="form-group col-sm-12">
					<p>Enter Description <star>*</star></p>
					<textarea class="form-control" type="text" placeholder="Enter Description" name="details"><?php echo $row['details']; ?></textarea>
					

				</div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                  <button type="submit" name="submit" value="submit" class="btn btn-sm btn-warning">Update&nbsp;Details</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
         <div class="col-md-2">
		  </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
