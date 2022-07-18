<?php

class Product extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('Dropdown');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}
	
	public function delete($id)
	{
		$this->db->delete('products', array('id' => $id));
		echo 'Deleted successfully.';
	}
	public function gallerydelete($id){
		$this->db->delete('gallery', array('id' => $id));
		echo 'Deleted successfully.';
	}
	
	function all(){
		$pid = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['getAllProduct'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Product');
		$this->loadView($data);
	}

	function get_product_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'product/get_product_ajax_list';
		$config['total_rows'] = $this->product_model->getAllProduct($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllProduct'] = $this->product_model->getAllProduct($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_product') == TRUE) {
				$response = $this->product_model->addProduct($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/all');
				}
			}
		}
		$data['CategoryId'] = $this->product_model->getSubcategoryId(array('data_type'=>'Category'));
		$data['brandId'] = $this->product_model->getAllBrand(array('data_type'=>'Brand'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Product');
		$this->loadView($data);
	}
	
	
	function addsize(){
		$id = (isset($_GET['pid']) && $_GET['pid'] > 0)?$_GET['pid']:0;
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_product_size') == TRUE) {
				$response = $this->product_model->addProductSize($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/addsize?pid='.$id);
				}
			}
		}
		$data['productSizeQuantity'] = $this->product_model->getProductSizeQty(array('pid'=>$id));
		$data['pvalue'] = array('view'=>'add_size_view','page_heading'=>'Add Size Quantity');
		$this->loadView($data);
	}

	function edit($product_slug){
		//$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		//$data['row'] = $this->product_model->getProductDetailsRows(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			//printData($_FILES);
			if ($this->form_validation->run('edit_product') == TRUE) {
				$response = $this->product_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/all');
				}
			}
		}
		if(isset($_POST['updatePicture']) && $_POST['updatePicture']=='updatePicture'){
			//printData($_FILES);
			// if ($this->form_validation->run('edit_product') == TRUE) {
				$response = $this->product_model->updateProductPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/all');
				}
			// }
		}
		$data['row'] = $this->product_model->getProductDetailsRows(array('slug'=>$product_slug));
		$data['CategoryId'] = $this->product_model->getSubcategoryId(array('data_type'=>'Category'));
		$data['brandId'] = $this->product_model->getAllBrand(array('data_type'=>'Brand'));
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Product Details');
		$this->loadView($data);
	}
	
	function updateStatusactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>2
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function dailydealson($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'dailydeals'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function dailydealsoff($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'dailydeals'=>0
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function hoton($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'hot'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function hotoff($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'hot'=>0
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function saleon($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'sale'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function saleoff($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'sale'=>0
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function trendingon($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'trending'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function trendingoff($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'trending'=>0
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function updateStatusdeactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('product/all');
		return $response;
	}
	
	function galleryview(){
		$id = (isset($_GET['pid']) && $_GET['pid'] > 0)?$_GET['pid']:0;
		  $data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
             
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'gallery/'; 
                    $config['upload_path'] = $uploadPath;
					$config['maintain_ratio'] = TRUE; 					
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['gallery_pic'] = $fileData['file_name']; 
                        //$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                        $uploadData[$i]['pid'] = $_POST['pid']; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->product_model->insert($uploadData); 
                     
                    // Upload status message 
                    $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }else{ 
                $statusMsg = 'Please select image files to upload.'; 
            } 
			redirect(WEB_URL . 'product/all');
        } 
         
        // Get files data from the database 
        //$data['files'] = $this->file->getRows(); 
         
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg; 
		$data['galleryItem'] = $this->product_model->getProductGalleryR(array('pid'=>$id));
		$data['pvalue'] = array('view'=>'gallery_view','page_heading'=>'Edit Product Details');
		$this->loadView($data);
	}
	function details($product_slug){
		$data['row'] = $this->product_model->getProductDetailsRows(array('slug'=>$product_slug));
		$data['pvalue'] = array('view'=>'product_view','page_heading'=>'View Product Details');
		$this->loadView($data);
	}
	/*function gallery($product_slug){
		$data['row'] = $this->product_model->getProductGalleryRows(array('slug'=>$product_slug));
		$data['pvalue'] = array('view'=>'gallery_view','page_heading'=>'View Product Details');
		$this->loadView($data);
	}*/
	function check_document_upload(){
		if(isset($_POST['fileDetails']['required'])) {
			if ($_POST['fileDetails']['required']) {
				$fileSize = $_POST['fileDetails']['file_size'];
				$fileExtensions = $_POST['fileDetails']['allowExtensions'];
				$fileName = $_POST['fileDetails']['file_name'];
				$tmp = explode('.', $fileName);
				$fileExtension = end($tmp);
				//$fileExtension = strtolower(end(explode('.', $fileName)));
				if ($fileSize == 0) {
					$this->form_validation->set_message('check_document_upload', 'Please select the file');
					return false;
				}
				if (!in_array($fileExtension, $fileExtensions)) {
					$this->form_validation->set_message('check_document_upload', 'This file extension is not allowed');
					return false;
				}
				if ($fileSize > DEFAULT_MAX_FILESIZE) {
					$this->form_validation->set_message('check_document_upload', 'This file is more than 2MB. Sorry, it has to be less than or equal to 2MB');
					return false;
				}
				return TRUE;
			}
			else{

				$fileSize = (isset($_POST['fileDetails']['file_size']) && $_POST['fileDetails']['file_size'] > 0)?$_POST['fileDetails']['file_size']:0;
				if($fileSize > 0) {
					$fileExtensions = $_POST['fileDetails']['allowExtensions'];
					$fileName = $_POST['fileDetails']['file_name'];
					$tmp = explode('.', $fileName);
					$fileExtension = end($tmp);
					if (!in_array($fileExtension, $fileExtensions)) {
						$this->form_validation->set_message('check_document_upload', 'This file extension is not allowed');
						return false;
					}
					if ($fileSize > DEFAULT_MAX_FILESIZE) {
						$this->form_validation->set_message('check_document_upload', 'This file is more than 2MB. Sorry, it has to be less than or equal to 2MB');
						return false;
					}
				}
				return TRUE;
			}
		}
		return TRUE;
	}
//End
}
?>