<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Generalsettings extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('generalsettings_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllCategory'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'Category');
		$this->loadView($data);
	}

	function get_category_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'general-settings/get_category_ajax_list';
		$config['total_rows'] = $this->generalsettings_model->getAllCategory($postVal);
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
		$data['getAllCategory'] = $this->generalsettings_model->getAllCategory($postVal);
		$this->load->view('list_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_category') == TRUE) {
				$response = $this->generalsettings_model->addCategory($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'general-settings/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Category');
		$this->loadView($data);
	}

	public function delete($id)
	{
		$this->db->delete('general-settings', array('id' => $id));
		echo 'Deleted successfully.';
	}

	function logo(){
		$id = 1;
		$data['row'] = $this->generalsettings_model->getDetails(array('id'=>$id));
		if(isset($_POST['headerlogo']) && $_POST['headerlogo']=='headerlogo'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateHeaderPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/logo');
				}
			// }
		}
		if(isset($_POST['footerlogo']) && $_POST['footerlogo']=='footerlogo'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateFooterPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/logo');
				}
			// }
		}
		if(isset($_POST['invoicelogo']) && $_POST['invoicelogo']=='invoicelogo'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateInvoicePicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/logo');
				}
			// }
		}
		
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Update Logo');
		$this->loadView($data);
	}
	
	function favicon(){
		$id = 1;
		$data['row'] = $this->generalsettings_model->getDetails(array('id'=>$id));
		if(isset($_POST['fav_icon']) && $_POST['fav_icon']=='fav_icon'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateFavicon($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/favicon');
				}
			// }
		}
		
		
		$data['pvalue'] = array('view'=>'add_favicon_view','page_heading'=>'Update Logo');
		$this->loadView($data);
	}
	function UpdateAddress(){
		$id = 1;
		$data['row'] = $this->generalsettings_model->getAddressDetails(array('id_address'=>$id));
		if(isset($_POST['update_address']) && $_POST['update_address']=='update_address'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateWebsiteAddress($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/UpdateAddress');
				}
			// }
		}
		
		
		$data['pvalue'] = array('view'=>'update_address_view','page_heading'=>'Update Address');
		$this->loadView($data);
	}
	function UpdateSocialMedia(){
		$id = 3;
		$data['row'] = $this->generalsettings_model->getSocialMediaLinks(array('id_socialmedia'=>$id));
		if(isset($_POST['update_social']) && $_POST['update_social']=='update_social'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateSocial($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'generalsettings/UpdateSocialMedia');
				}
			// }
		}
		
		
		$data['pvalue'] = array('view'=>'update_social_media','page_heading'=>'Update Social Media Links');
		$this->loadView($data);
	}
	function manageapplicationamount(){
		$id = 1;
		$data['row'] = $this->generalsettings_model->fetchApplicationAmount(array('id'=>$id));
		if(isset($_POST['RetailerAmount']) && $_POST['RetailerAmount']=='RetailerAmount'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateRetailerAmount($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'manage-application-amount');
				}
			// }
		}
		if(isset($_POST['DistributorAmount']) && $_POST['DistributorAmount']=='DistributorAmount'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateDistributorAmount($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'manage-application-amount');
				}
			// }
		}
		if(isset($_POST['dobAmount']) && $_POST['dobAmount']=='dobAmount'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateDobAmount($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'manage-application-amount');
				}
			// }
		}
		if(isset($_POST['deathAmount']) && $_POST['deathAmount']=='deathAmount'){
			// if ($this->form_validation->run('header_logo_update') == TRUE) {
				$response = $this->generalsettings_model->updateDeathAmount($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'manage-application-amount');
				}
			// }
		}
		
		$data['pvalue'] = array('view'=>'manage_app_amount','page_heading'=>'Manage Application Amount');
		$this->loadView($data);
	}
//End
}
?>