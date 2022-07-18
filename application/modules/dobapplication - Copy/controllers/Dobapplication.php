<?php

class Dobapplication extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dobapplication_model');
	}
	
	
	
	public function addApplication(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_application') == TRUE) {
				$response = $this->dobapplication_model->addDOBApplcation($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'distributor/applicationlist');
				}
			}
		}
		$data['StateId'] = $this->dobapplication_model->getStateId(array('data_type'=>'State'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Birthday Application');
		$this->loadView($data);
	}

	function applicationlist(){
		$this->load->library('pagination');
		$config=[
        'base_url' => base_url('distributor/applicationlist'),
        'per_page' =>4,
        'total_rows' => $this->dobapplication_model->num_rows(),
        'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'next_tag_open' =>"<li class='page-item'>",
        'next_tag_close' =>"</li>",
        'prev_tag_link' =>"Previous",
        'prev_tag_open' =>"<li class='page-item'>",
        'prev_tag_close' =>"</li>",
		'first_link' =>"First",
		'first_tag_open' =>"<li>",
		'first_tag_close' =>"</li>",
		'last_link' =>"Last",
		'last_tag_open' =>"<li>",
		'last_tag_close' =>"</li>",
        'num_tag_open' =>"<li class='page-item'>",
        'num_tag_close' =>"<li>",
        'cur_tag_open' =>"<li><a class='current_page' href=''>",
        'cur_tag_close' =>"</a></li>"];
		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;  
		$data['getAllApplicationList'] = $this->dobapplication_model->getAllDobApplicationList($config['per_page'],$this->uri->segment(3));
		
		if(isset($_POST['pay_online']) && $_POST['pay_online']=='pay_online'){
			// if ($this->form_validation->run('add_application') == TRUE) {
				$response = $this->dobapplication_model->makePaymenySuccess($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'distributor/applicationlist');
				}
			// }
		}
		
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Dob Application List');
		$this->loadView($data);
	}
	public function viewDetails(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->dobapplication_model->getDetails(array('id'=>$id));
		$data['pvalue'] = array('view'=>'details_view','page_heading'=>'Application Details');
		$this->loadView($data);
	}
	function get_application_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'distributor/get_application_ajax_list';
		$config['total_rows'] = $this->dobapplication_model->getAllApplicationList($postVal);
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
		$data['getAllApplicationList'] = $this->dobapplication_model->getAllApplicationList($postVal);
		$this->load->view('list_ajax_view',$data);
	}
	public function distributorlogout(){ 
        $this->session->unset_userdata('isDistributorLoggedIn'); 
        $this->session->unset_userdata('distributorId'); 
        $this->session->unset_userdata('roleID'); 
        $this->session->unset_userdata('distributorName'); 
        $this->session->unset_userdata('distributorName'); 
        $this->session->sess_destroy(); 
        redirect(WEB_URL); 
    }

	
//End
}
?>