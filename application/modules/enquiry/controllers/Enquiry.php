<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Enquiry extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('enquiry_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllEnquiry'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=>'All Enquiry');
		$this->loadView($data);
	}
	
	
		
	function deleteSingleData()
	{
		$student_id = $this->input->post('id');
		$dataDelete = $this->enquiry_model->deleteData('enquiry',array('id'=>$student_id));
		if($dataDelete==true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}

	function get_enquiry_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'enquiry/get_enquiry_ajax_list';
		$config['total_rows'] = $this->enquiry_model->getAllEnquiry($postVal);
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
		$data['getAllEnquiry'] = $this->enquiry_model->getAllEnquiry($postVal);
		$this->load->view('list_ajax_view',$data);
	}
//End
}
?>
