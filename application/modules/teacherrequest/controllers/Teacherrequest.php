<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Teacherrequest extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('teacherrequestmodel');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function allteacherrequest(){
		$data['getAllTeacherRequest'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=>'Teacher Request');
		$this->loadView($data);
	}

	function getallteacher($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'teacherrequest/getallteacher';
		$config['total_rows'] = $this->teacherrequestmodel->getAllTeacherRequest($postVal);
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
		$data['getAllTeacherRequest'] = $this->teacherrequestmodel->getAllTeacherRequest($postVal);
		$this->load->view('teacher_request_view',$data);
	}


	function edit(){
		$_GET = getDecryptArray($_GET);
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row']=$this->teacherrequestmodel->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			/*if(isset($_FILES['attachment']['size']) && $_FILES['attachment']['size'] > 0) {
				$_POST['fileDetails'] = array("temp_file_path" => $_FILES["attachment"]["tmp_name"],
					"file_name" => $_FILES['attachment']['name'],
					"file_size" => $_FILES['attachment']['size'],
					"allowExtensions" => array('gif','jpeg', 'jpg', 'png')
				);
			}*/
			if ($this->form_validation->run('edit_teacher') == TRUE) {
				$_POST['id_country'] = 1;
				$_POST['action_by'] = $this->id_user;
				$response = $this->teacherrequestmodel->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'teacherrequest/allteacherrequest');
				}
			}
		}
		$this->load->model('cscl/cscl_model','cscl_model');
		$data['state'] = $this->cscl_model->getCscl(array('id_parent'=>1,'data_type'=>'State'));
		$data['city'] = $this->cscl_model->getCscl(array('id_parent'=>$data['row']['id_state'],'data_type'=>'City'));
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Teacher Request Details');
		$this->loadView($data);
	}
//End
}
?>
