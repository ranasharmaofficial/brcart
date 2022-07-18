<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<div class="page-title-header mb-4">
				<div class="row">
					<div class="col-sm-10"><strong><?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></strong></div>
					<div class="col-sm-2 text-right">&nbsp;</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<?php
					if(FALSE) {
						?>
						<div class="row">
							<div class="col-sm-2">
								<input type="text" class="form-control" name="search_key" id="search_key"
									   placeholder="By Subject"/>
							</div>
							<div class="col-sm-3">
								<button type="button" id="searchBtn" class="btn btn-success">Search</button>
								<button type="button" id="resetBtn" class="btn btn-danger">Reset</button>
							</div>
						</div>
						<br>
						<?php
					}
					?>
					<?php $this->load->view('adminlayout/message_view');?>
					<div id="subjectContent"></div>
				</div>
			</div>
		</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script>

		subjectList(page_url=false);

		$(document).on('click', "#searchBtn", function(event) {
			subjectList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			subjectList(page_url=false);
			event.preventDefault();
		});

		$(document).on('click',".pagination li a", function(){
			var page_url = $(this).attr('href');
			subjectList(page_url);
			return false;
		});

		function subjectList(page_url)
		{
			var base_url = $('meta[name="weburl"]').attr('content');
			base_url = base_url+"user/get_user_ajax_list";
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
					$("#subjectContent").html(response);
				}
			})
		}

	</script>
	<script>
		//Delete Records
		$(document).on("click",".delete-btn", function(){
			if(confirm("Do you really want to delete this record ?")){
				var studentId = $(this).data("id");
				var element = this;
				var base_url = $('meta[name="weburl"]').attr('content');
				base_url = base_url+"user/deleteSingleData";
				//alert(studentId);
				$.ajax({
					url: base_url,
					type : "POST",
					data : {id : studentId},
					success : function(data){
						if(data == 1){
							$(element).closest("tr").fadeOut();
						}else{
							$("#error-message").html("Can't Delete Record.").slideDown();
							$("#success-message").html("Deleted Record.").slideUp();
						}
					}
				});
			}
		});

	</script>
