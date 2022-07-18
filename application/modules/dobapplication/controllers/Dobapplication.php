<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class Dobapplication extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dobapplication_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function pendingapplication(){
		$data['getAllDobApplication'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Pending Dob Application');
		$this->loadView($data);
	}

	function get_dobapplication_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'dobapplication/get_dobapplication_ajax_list';
		$config['total_rows'] = $this->dobapplication_model->getAllDobApplication($postVal);
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
		$data['getAllDobApplication'] = $this->dobapplication_model->getAllDobApplication($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_hospital') == TRUE) {
				$response = $this->dobapplication_model->addhospital($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'hospital/all');
				}
			}
		}
		$data['CategoryId'] = $this->dobapplication_model->getSubcategoryId(array('data_type'=>'State'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Hospital');
		$this->loadView($data);
	}
	public function delete($id)
	{
		$this->db->delete('dob_application', array('id' => $id));
		echo 'Deleted successfully.';
	}
	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->dobapplication_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_hospital') == TRUE) {
				$response = $this->dobapplication_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'hospital/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Hospital');
		$this->loadView($data);
	}
	public function viewDetails(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->dobapplication_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			// if ($this->form_validation->run('edit_hospital') == TRUE) {
				$response = $this->dobapplication_model->uploadCertificate($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'dobapplication/pendingapplication');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'details_view','page_heading'=>'Application Details');
		$this->loadView($data);
	}
//End
}
?>
