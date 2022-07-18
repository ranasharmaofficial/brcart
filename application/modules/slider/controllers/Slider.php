<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Slider extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllSlider'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Slider');
		$this->loadView($data);
	}
	
	 
 
	function get_slider_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'slider/get_slider_ajax_list';
		$config['total_rows'] = $this->slider_model->getAllSlider($postVal);
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
		$data['getAllSlider'] = $this->slider_model->getAllSlider($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_slider') == TRUE) {
				$response = $this->slider_model->addSlider($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'slider/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Slider');
		$this->loadView($data);
	}
	
	public function delete($id)
	{
		$this->db->delete('slider', array('id' => $id));
		echo 'Deleted successfully.';
	}
	

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->slider_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			// if ($this->form_validation->run('edit_category') == TRUE) {
				$response = $this->slider_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'slider/all');
				}
			// }
		}
		if(isset($_POST['updatepicture']) && $_POST['updatepicture']=='updatepicture'){
			// if ($this->form_validation->run('edit_pic_category') == TRUE) {
				$response = $this->slider_model->updateCatPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'slider/all');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Update Slider');
		$this->loadView($data);
	}
	function editbrand(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->slider_model->getBrandDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_brand') == TRUE) {
				$response = $this->slider_model->updateBrand($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'slider/allbrand');
				}
			}
		}
		if(isset($_POST['updatebrandpicture']) && $_POST['updatebrandpicture']=='updatebrandpicture'){
			// if ($this->form_validation->run('edit_pic_category') == TRUE) {
				$response = $this->slider_model->updateBrandPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'slider/allbrand');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'brand_edit_view','page_heading'=>'Edit Brand');
		$this->loadView($data);
	}
	function updateStatusactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>2
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_SLIDER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('slider/all');
		return $response;
	}
	
	function updateStatusdeactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_SLIDER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('slider/all');
		return $response;
	}
//End
}
?>
