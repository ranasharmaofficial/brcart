
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'seller/sellerDashboard' ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></li>
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
                <h3 class="card-title">Main Price</h3>
              </div>
              <!-- /.card-header -->
			   <?php 
			   include('db.php');
					$pid=$row['product_id'];
					$vendorid=$this->sellerId;
		$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) from vendor_product where pid='$pid' and vendor_id='$vendorid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($CountPidInSellerStock);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();

$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT admin_commission_percentage from products where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($adminComPercent);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();

			   ?>
			  
               <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">
                <div class="card-body">
					<div class="col-12 text-center">
					<img style="height:130px;width:auto;" src="<?php echo WEB_ATTACHMENT_PATH; ?><?php echo $row['photo']; ?>" class="product-image" alt="Product Image">
				  </div>
			   <h5 class=""><?php echo $row['product_name']; ?></h5>
			   <ul class="list-group list-group-unbordered">
					  <li class="list-group-item">
						<span>Category</span> <a class="float-right"><?php echo $row['cat_name']; ?></a>
					  </li>
					  <li class="list-group-item">
						<span>Sub Category</span> <a class="float-right"><?php echo $row['subcat_name']; ?></a>
					  </li>
					  <li class="list-group-item">
						<span>Main Price</span> <a class="float-right">Rs&nbsp;<?php echo getNumberFormat($row['price']); ?></a>
					  </li>
					   <li class="list-group-item">
						<span>MRP</span> <a class="float-right">Rs&nbsp;<?php echo getNumberFormat($row['previous_price']); ?></a>
					  </li>
				</ul>
               
                </div>
			  
				 
			   
                 
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
		
			<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Enter your Stock</h3>
				
              </div>
			   <?php if($CountPidInSellerStock<1) {  ?>
			   <form method="post" action="" enctype="multipart/form-data">  
              <div class="card-body">
			  <?php echo form_error('pid'); ?>
                <div class="form-group">
                    <p for="Price">Price <star>*</star></p>
                    <input name="price" type="number" class="form-control" id="Price">
					<?php echo form_error('price'); ?>
				</div>
				<input type="hidden" name="name" value="<?php echo $adminComPercent; ?>">
				<div class="form-group">
                    <p for="Stock">Stock <star>*</star></p>
                    <input name="stock" type="text" class="form-control" id="Stock">
					<?php echo form_error('stock'); ?>
                    <input name="pid" value="<?php echo $_GET['pid']; ?>" type="hidden">
                    <input name="vendor_id" value="<?php echo $this->sellerId; ?>" type="hidden">
				</div>
				<div class="form-group">
                    <p for="Remarks">Any Remarks</p>
                    <textarea rows="5" name="remarks" type="text" class="form-control" id="Remarks"></textarea>
				</div>
				  
				  <div class="form-group text-right">
                  <button type="submit" name="submit" value="submit"  class="btn btn-sm btn-info">Add</button>
                </div>
				   
              </div>
			  </form>
			   <?php } else { ?>
			   <form method="post" action="" enctype="multipart/form-data">  
			   <div class="card-body">
			   <h3 class="text-danger">This product is added to your profile So update price & Stock</h3>
			  <div class="form-group">
                    <p for="Price">Price <star>*</star></p>
                    <input name="price" value="<?php echo $vendor_product_row['price']; ?>" type="number" class="form-control" id="Price">
					<?php echo form_error('price'); ?>
				</div>
				<div class="form-group">
                    <p for="Stock">Stock <star>*</star></p>
                    <input name="stock" value="<?php echo $vendor_product_row['stock']; ?>" type="text" class="form-control" id="Stock">
					<?php echo form_error('stock'); ?>
                    <input name="pid" value="<?php echo $_GET['pid']; ?>" type="hidden">
                    <input name="vendor_id" value="<?php echo $this->sellerId; ?>" type="hidden">
				</div>
				<div class="form-group">
                    <p for="Remarks">Any Remarks</p>
                    <textarea rows="5" name="remarks" type="text" class="form-control" id="Remarks"><?php echo $vendor_product_row['remarks']; ?></textarea>
				</div>
				  
				  <div class="form-group text-right">
                  <button type="submit" name="update" value="update" class="btn btn-sm btn-warning">Update</button>
                </div>
				   
              </div>
              </form>
			   <?php }  ?>
            </div>
		
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
