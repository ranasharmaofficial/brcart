<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right"><a href="<?php echo WEB_URL.'city/add';?>" class="btn btn-sm btn-primary">Add City</a> </div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="search_key" id="search_key" placeholder="By City" />
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
		</div>
	</main>
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
			base_url = base_url+"city/get_state_ajax_list";
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
