<style>
star {
    color: red;
}

.error_prefix {
    color: red;
}

.razorpay-payment-button {
    color: white !important;
    background-color: #251564 !important;
    border-color: #251564;
    font-size: 14px;
    width: 100%;
    height: 45px;
    text-align: center;
    border-radius: 2px;
    padding: 10px;
}
 
star {
    color: red;
    font-weight: bold;
}

.error_prefix {
    color: red;
}

.pagination {
    float: right;
}

.pagination li a {
    padding: 6px 16px;
    border: 1px solid #007bff;
    border-radius: 3px;
    margin: 2px;
}

.pagination li a:hover {
    text-decoration: none;
    background-color: #007bff;
    border-radius: 3px;
    color: #fff;
}

.pagination li a.current_page {
    background-color: #007bff;
    color: #fff;
    padding: 6px 16px;
    border-radius: 3px margin:2px;

}
</style>
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
              <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home- <?php echo $this->uri->segment(3); ?></a></li>
              <li class="breadcrumb-item active"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></li>
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
          <h3 class="card-title"><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'';?></h3>

          <div class="card-tools">
           <a href="<?php echo WEB_URL.'distributor/addapplication';?>" class="btn btn-sm btn-danger">Add Application</a>
          </div>
        </div>
		<div class="card-body">
					
					<?php $this->load->view('adminlayout/message_view');?>
					<!---<div id="categoryContent"></div>-->
					
<div class="table-responsive">
	<div style="min-height: 250px;">
		<table class="table table-bordered"  width="100%" cellspacing="0">
			<thead class="thead-light">
			<tr>
				<th>Sl</th>
				<th>Type</th>
				<th>Name</th>
				 
				<th>Gender</th>
				<th>Date of Birth</th>
				 
				<th>Date</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			 
			
			 <?php if (count($getAllApplicationList)): 
			 $s=1;
			 ?>
                                <?php foreach ($getAllApplicationList as $val): ?>
				<tr id="<?php echo $val['id']; ?>">
					<td><?= $s; ?></td>
					<td><?php if($val['type']=='1') { echo '<span style="color:blue;">DOB CERTIFICATE</span>'; } else {  echo '<span style="color:red;">DEATH CERTIFICATE</span>'; } ?></td>
					<td><?= $val['name']; ?></td>
					 
					<td><?= $val['gender']; ?></td>
					<td><?= $val['dob']; ?></td>
					
					<td><?= $val['created_at']; ?></td>
					<td>
					<?php if($val['payment_status']=='1') { ?>
						<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" value="pay_online" name="pay_online">
						<input type="hidden" value="<?= $val['amount']; ?>" name="amount">
						<input type="hidden" value="<?= $val['id']; ?>" name="id">
						<script src="https://checkout.razorpay.com/v1/checkout.js"
							data-key="rzp_test_4ThugwziGyAF6F"
							data-amount="<?= $val['amount']; ?>00"
							data-buttontext="Pay Now" data-name="Sharma Telecom"
							data-description="Pay Registration Fee"
							data-image=""
							data-prefill.name="<?= $this->distributorName; ?>"
							data-prefill.contact="8825171386"
							data-prefill.email="cgcgfc@gmail.com"
							data-theme.color="#251564">
							</script>
						</form>
						<hr>
						<a href="<?php echo WEB_URL.'distributor/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					<?php } else if($val['payment_status']=='2') { ?>
					<button class="btn btn-success btn-sm">In&nbsp;Process</button><hr>
					<a href="<?php echo WEB_URL.'distributor/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					
					<?php } else if($val['payment_status']=='3') { ?>
					<a href="<?php echo base_url();?>dob_application/<?= $val['dob_certificate']; ?>" download ><button class="btn btn-info btn-sm">Download&nbsp;Certificate</button></a>
					<a href="<?php echo WEB_URL.'distributor/viewDetails?id='.$val['id'];?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye">&nbsp;</i></button></a>
					<?php } ?>
					</td>
					
					
					
					 
				</tr>
				
			 <?php $s=$s+1; endforeach;?>
                                <?php else: ?>
                                <center>
                                    <img style="width:auto;height:250px;"
                                        src="<?php echo WEB_PATH_FRONT . 'images/no_order.svg' ?>">
                                    <p
                                        style="width:100%;text-align:center;font-size:18px;color:orange;font-weight:bold;">
                                        No Data Found !</p>
                                </center>
                                <?php endif;?>
			</tbody>
		</table>
	</div>
</div>
<nav aria-label="...">
                            <?php echo $pagelinks ?>
                        </nav>
						
				</div>
			
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   
<script>

$(document).on('click','.status_checks',function()
 { 
var status = ($(this).hasClass("btn-success")) ? '0' : '1'; 
var msg = (status=='0')? 'Deactivate' : 'Activate'; 
if(confirm("Are you sure to "+ msg))
{ 
    var current_element = $(this); 
    var id = $(current_element).attr('data');
    url = "<?php echo base_url().'index.php/Dashboard/update_status'?>"; 
        $.ajax({
          type:"POST",
          url: url, 
          data: {"id":id,"status":status}, 
          success: function(data) { 
          location.reload();
    } });
 }  
 });
 
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
			base_url = base_url+"distributor/get_application_ajax_list";
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
