<?php
if(isset($_POST['submit'])){
    // Include the database configuration file
     
       include('./db.php'); 
	
	// Create database connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
    // File upload configuration
    $targetDir = "gallery/";
    $allowTypes = array('jpg','png','jpeg','gif','webp');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $pid=$_POST['pid']; 
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."','".$pid."'),";
					// $insertValuesSQL .= "('".$fileName."','".$nid."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = $db->query("INSERT INTO gallery (gallery_pic, pid) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
    
    // Display status message
   // echo $statusMsg;
	
	echo '<script language="javascript">';
echo 'alert("Successfully Uploaded. Press Enter Button")';
echo '</script>';
header('location: '.WEB_URL.'product/all'); 
}

?>

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

                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Gallery</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table-bordered table">
                                    <tr>
                                        <td>Sl</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                    <?php
                                    $i=1;
			if(is_array($galleryItem) && count($galleryItem) > 0){
				foreach($galleryItem as $val) {
					?>
                                    <tr id="<?php echo $val['id']; ?>">
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                data-toggle="lightbox" data-title="sample 1 - white"
                                                data-gallery="gallery">
                                                <img style="height:150px;"
                                                    src="<?php echo WEB_ATTACHMENT_GALLERY; ?><?php echo $val['gallery_pic']; ?>"
                                                    class="img-fluid mb-2" alt="white sample" />
                                            </a></td>
                                        <td><button class="btn btn-sm btn-danger remove">Delete</button></td>
                                    </tr>
                                    <?php
                                    $i=$i+1;
				}
			}
			else {
				?>
                                    <tr>
                                        <td><?php echo NO_RECORDS_FOUND;?></td>
                                    </tr>
                                    <?php
			}
			?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Add More Picture</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-12 form-group">
                                        <label>Select Multiple Picture</label>
                                        <input type="file" name="files[]" multiple style="height:40px;"
                                            class="form-control">
                                    </div>
                                    <input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>">
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-success" style="height:40px;" type="submit" name="fileSubmit"
                                        value="submit"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
$(".remove").click(function() {
    var id = $(this).parents("tr").attr("id");

    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            var base_url = $('meta[name="weburl"]').attr('content');
            base_url = base_url + "product/gallerydelete/" + id;

            if (isConfirm) {
                $.ajax({
                    url: base_url,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    }
                });
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });

});
</script>
<script>
$(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})
</script>