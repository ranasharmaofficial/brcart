<?php
 

class MY_Controller extends CI_Controller{
	public function __construct()
    {
        parent::__construct();

    }

    function checkUserLogin($id){
		if($id > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function checkSellerLogin($id){
		if($id > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function checkDistributorLogin($id){
		if($id>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

class Frontcontroller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function loadView($data=array())
	{
		$this->load->view('layout/main_view',$data);
	}
	
	

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		if($data['status']==STATUS_FAIL) {
			$css_class = ADDED_MSG_FAIL_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}

//End
}

class Backendcontroller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function loadView($data=array())
	{
		$this->load->view('web/layout/main_view',$data);
	}
//End
}

class Admincontroller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->id_user = $this->session->userdata('id_user');
		if(!$this->checkUserLogin($this->id_user)){
			redirect(WEB_URL.'adm/logout');
		}
		$this->user_first_name = $this->session->userdata('first_name');
		$this->id_seller_type = $this->session->userdata('id_seller_type');
		$this->id_user_role = $this->session->userdata('id_role');
	}

	function loadView($data=array())
	{	
		$data['seller_type'] = $this->id_seller_type;
		//$data['seller_type'] = $this->id_seller_type;
		$this->load->view('adminlayout/main_view',$data);
	}

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}

//End
}

class Sellercontroller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->id = $this->session->userdata('sellerId');
		if(!$this->checkSellerLogin($this->id)){
			redirect(WEB_URL.'');
		}
		$this->sellerId = $this->session->userdata('sellerId');
		$this->first_name = $this->session->userdata('first_name');
		$this->id_seller_type = $this->session->userdata('id_seller_type');
		// $this->id_user_role = $this->session->userdata('id_role');
	}

	function loadView($data=array())
	{
		$data['seller_type'] = $this->id_seller_type;
		$this->load->view('sellerlayout/main_view',$data);
	}

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}

//End
}
class Distributorcontroller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->id = $this->session->userdata('distributorId');
		if(!$this->checkDistributorLogin($this->id)){
			redirect(WEB_URL.'');
		}
		$this->distributorId = $this->session->userdata('distributorId');
		$this->distributorName = $this->session->userdata('distributorName');
		$this->roleID = $this->session->userdata('roleID');
		// $this->id_user_role = $this->session->userdata('id_role');
	}

	function loadView($data=array())
	{
		$data['role_id'] = $this->roleID;
		$this->load->view('distributorlayout/main_view',$data);
	}

	function setSuccessFailMessage($data){
		$css_class = ADDED_MSG_FAIL_CLASS;
		if($data['status']==STATUS_SUCCESS) {
			$css_class = ADDED_MSG_SUCC_CLASS;
		}
		$this->session->set_flashdata('message', $data['msg']);
		$this->session->set_flashdata('color', $css_class);
		return true;
	}

//End
}
?>