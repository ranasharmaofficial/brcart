<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class Papa extends Backendcontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('adm_model');
	}

	function index()
	{
		redirect(WEB_URL);
	}

	function login()
	{
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('check_login') == TRUE) {
				$response = $this->adm_model->checkLogin($_POST);
				if ($response['status'] == STATUS_SUCCESS) {
					$this->setUserDataInSession($response['data']);
					redirect(WEB_URL . 'dashboard/myDashboard');
				}
			}
		}
		$this->load->view('login_view');
	}

	function setUserDataInSession($postVal=array())
	{
		$this->session->set_userdata($postVal);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(WEB_URL.'papa/login');
	}
//End
}
?>
