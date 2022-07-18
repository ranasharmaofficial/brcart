<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class Location extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('location_model');
		$this->load->model('Dropdown', 'location');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllLocation'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Location');
		$this->loadView($data);
	}
	
	
	function get_location_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'location/get_location_ajax_list';
		$config['total_rows'] = $this->location_model->getAllLocation($postVal);
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
		$data['getAllLocation'] = $this->location_model->getAllLocation($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_location') == TRUE) {
				$response = $this->location_model->addLocation($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'location/all');
				}
			}
		}
		$data['countries'] = $this->location->getCountryRows();
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Location');
		$this->loadView($data);
	}

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->location_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_location') == TRUE) {
				$response = $this->location_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'Location/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Location');
		$this->loadView($data);
	}
//End
}
?>
