
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage <?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?> List</li>
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
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?> List</h3>

          <?php if(false) { ?><div class="card-tools">
           <a href="<?php echo WEB_URL.'categories/add';?>" class="btn btn-sm btn-danger">Add Category</a>
          </div><?php } ?>
        </div>
		<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="search_key" id="search_key" placeholder="By Order number" />
						</div>
						<div class="col-sm-3">
							<button type="button" id="searchBtn" class="btn btn-success">Search</button>
							<button type="button" id="resetBtn" class="btn btn-danger">Reset</button>
						</div>
					</div>
				<br>
					<?php $this->load->view('adminlayout/message_view');?>
					<div id="categoryContent"></div>
				</div>
			
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   
<script>

		categoryList(page_url=false);

		$(document).on('click', "#searchBtn", function(event) {
			categoryList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			categoryList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click',".pagination li a", function(){
			var page_url = $(this).attr('href');
			categoryList(page_url);
			return false;
		});

		function categoryList(page_url)
		{
			var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"order/get_online_order_ajax_list";
			var search_key = $('#search_key').val();
			var dataString = 'search_key='+search_key;
			if(page_url){
				base_url=page_url;
			}
			$.ajax({
				type:"POST",
				url:base_url,
				data: dataString,
				success: function(response){
					$("#categoryContent").html(response);
				}
			})
		}

	</script>
