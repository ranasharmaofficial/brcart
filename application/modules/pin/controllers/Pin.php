<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Pin extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pin_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllPin'] = array();
		
		if(isset($_POST['save']) && $_POST['save']=='save'){
			$id=$_POST['id'];
		$id--;
			// if ($this->form_validation->run('add_pin') == TRUE) {
				$response = $this->pin_model->addPinCharge($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/all#'.$id);
				}
			// }
		}
		if(isset($_POST['updatepincharge']) && $_POST['updatepincharge']=='updatepincharge'){
			// if ($this->form_validation->run('add_pin') == TRUE) {
				$response = $this->pin_model->updateCharge($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/all');
				}
			// }
		}
		
		
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Pin');
		$this->loadView($data);
	}
	
	
	function get_pin_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'pin/get_pin_ajax_list';
		$config['total_rows'] = $this->pin_model->getAllPin($postVal);
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
		$data['getAllPin'] = $this->pin_model->getAllPin($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_pin') == TRUE) {
				$response = $this->pin_model->addPin($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Pin');
		$this->loadView($data);
	}
	
	function addbrand(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_brand') == TRUE) {
				$response = $this->pin_model->addedNewBrand($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/allbrand');
				}
			}
		}
		$data['pvalue'] = array('view'=>'brand_add_view','page_heading'=>'Add Brand');
		$this->loadView($data);
	}

	public function delete($id)
	{
		$this->db->delete('pin', array('id' => $id));
		echo 'Deleted successfully.';
	}
	
	public function deletecharge($id)
	{
		$this->db->delete('pin_charge', array('id' => $id));
		echo 'Deleted successfully.';
	}

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->pin_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_pin') == TRUE) {
				$response = $this->pin_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Pin');
		$this->loadView($data);
	}
	function editbrand(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->pin_model->getBrandDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_brand') == TRUE) {
				$response = $this->pin_model->updateBrand($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/allbrand');
				}
			}
		}
		if(isset($_POST['updatebrandpicture']) && $_POST['updatebrandpicture']=='updatebrandpicture'){
			// if ($this->form_validation->run('edit_pic_category') == TRUE) {
				$response = $this->pin_model->updateBrandPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'pin/allbrand');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'brand_edit_view','page_heading'=>'Edit Brand');
		$this->loadView($data);
	}
//End
}
?>
