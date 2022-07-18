<?php
/**
 * Created by IntelliJ IDEA.
 * Olddata: Deepak
 */
class Olddata extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('olddata_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllOlddata'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=>'All Data List');
		$this->loadView($data);
	}

	function getall_olddata_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'olddata/getall_olddata_ajax_list';
		$config['total_rows'] = $this->olddata_model->getAllOlddata($postVal);
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
		$data['getAllOlddata'] = $this->olddata_model->getAllOlddata($postVal);
		$this->load->view('list_ajax_view',$data);
	}
	
	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_datas') == TRUE) {
				$response = $this->olddata_model->addOldData($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'olddata/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Data');
		$this->loadView($data);
	}
	function deleteSingleData()
	{
		$student_id = $this->input->post('id');
		$dataDelete = $this->olddata_model->deleteData('olddata',array('id'=>$student_id));
		if($dataDelete==true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
//End
}
?>
