 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery View</h1>
          </div>
		  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery View</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	 <!-- <input type="hidden" name="pid" value="<?php// echo $row['pid'];?>">-->
    <!-- Main content -->
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Gallery</h4>
              </div>
              <div class="card-body">
                <div class="row">
				
				<?php
			if(is_array($galleryItem) && count($galleryItem) > 0){
				foreach($galleryItem as $val) {
					?>
                  <div class="col-sm-2">
                    <a href="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                      <img src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>
			<?php
				}
			}
			else {
				?>
				<tr><td><?php echo NO_RECORDS_FOUND;?></td></tr>
				<?php
			}
			?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
