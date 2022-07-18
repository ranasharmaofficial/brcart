
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
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?> List</li>
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
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?> List</h3>

          <div class="card-tools">
           <a href="<?php echo WEB_URL.'categories/add';?>" class="btn btn-sm btn-danger">Add Category</a>
          </div>
        </div>
		
		<div class="card-body">
				<?php $this->load->view('adminlayout/message_view');?> 
					<div class="table-responsive">
					<table id='empTable' class='display dataTable table table-hover table-bordered'>

		<thead>
         <tr>
           <th>Name</th>
           <th>Price</th>
           <th>Photo</th>
           <th>Category</th>
         </tr>
		</thead>

     </table>

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>seller/searchproductsList'
          },
          'columns': [
             { data: 'name' },
             { data: 'price' },
             { data: 'photo' },
             { data: 'category_id' },
            
          ]
        });
     });
     </script>
				</div>
			
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

