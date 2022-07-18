<?php

class Requestproduct extends Sellercontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('requestproduct_model');
		$this->load->model('Dropdown');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
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
		$config['total_rows'] = $this->requestproduct_model->getAllProduct($postVal);
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
		$data['getAllProduct'] = $this->requestproduct_model->getAllProduct($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_product') == TRUE) {
				$response = $this->requestproduct_model->addProduct($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/all');
				}
			}
		}
		$data['CategoryId'] = $this->requestproduct_model->getSubcategoryId(array('data_type'=>'Category'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Product');
		$this->loadView($data);
	}
	
	function addsize(){
		$id = (isset($_GET['pid']) && $_GET['pid'] > 0)?$_GET['pid']:0;
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_product_size') == TRUE) {
				$response = $this->requestproduct_model->addProductSize($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/addsize?pid='.$id);
				}
			}
		}
		$data['productSizeQuantity'] = $this->requestproduct_model->getProductSizeQty(array('pid'=>$id));
		$data['pvalue'] = array('view'=>'add_size_view','page_heading'=>'Add Size Quantity');
		$this->loadView($data);
	}

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->requestproduct_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			//printData($_FILES);
			if(isset($_FILES['attachment']['size']) && $_FILES['attachment']['size'] > 0) {
				$_POST['fileDetails'] = array("temp_file_path" => $_FILES["attachment"]["tmp_name"],
					"file_name" => $_FILES['attachment']['name'],
					"file_size" => $_FILES['attachment']['size'],
					"allowExtensions" => array('gif','jpeg', 'jpg', 'png')
				);
			}
			$_POST['category_id'] = 1;
			if ($this->form_validation->run('add_product') == TRUE) {
				$response = $this->requestproduct_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'product/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Product Details');
		$this->loadView($data);
	}
	
	function galleryview(){
		$id = (isset($_GET['pid']) && $_GET['pid'] > 0)?$_GET['pid']:0;
		//$data['row'] = $this->requestproduct_model->getProductGalleryRows(array('pid'=>$id));
		$data['galleryItem'] = $this->requestproduct_model->getProductGalleryR(array('pid'=>$id));
		$data['pvalue'] = array('view'=>'gallery_view','page_heading'=>'Edit Product Details');
		$this->loadView($data);
	}
	function details($product_slug){
		$data['row'] = $this->requestproduct_model->getProductDetailsRows(array('slug'=>$product_slug));
		$data['pvalue'] = array('view'=>'product_view','page_heading'=>'View Product Details');
		$this->loadView($data);
	}
	/*function gallery($product_slug){
		$data['row'] = $this->requestproduct_model->getProductGalleryRows(array('slug'=>$product_slug));
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
