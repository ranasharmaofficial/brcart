<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Addsubscription extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subscription_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllSubscription'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Subscription');
		$this->loadView($data);
	}

	function get_subscription_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'addsubscription/get_subscription_ajax_list';
		$config['total_rows'] = $this->subscription_model->getAllSubscription($postVal);
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
		$data['getAllSubscription'] = $this->subscription_model->getAllSubscription($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_subscription') == TRUE) {
				$response = $this->subscription_model->addSubscription($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'addsubscription/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Subscription');
		$this->loadView($data);
	}

	public function delete($id)
	{
		$this->db->delete('pages', array('id' => $id));
		echo 'Deleted successfully.';
	}

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->subscription_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_content') == TRUE) {
				$response = $this->subscription_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'addsubscription/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Subscription');
		$this->loadView($data);
	}
//End
}
?>
