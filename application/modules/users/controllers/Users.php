<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Users extends Frontcontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		// User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
        $this->isSellerLoggedIn = $this->session->userdata('isSellerLoggedIn'); 
	}

	function index(){
		if($this->isUserLoggedIn){ 
            redirect('myaccount'); 
        }else{ 
            redirect('register'); 
        } 
	}

	public function account(){
		  
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
             
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['totalAddress'] = $this->users_model->countCustomerAddress();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['userrow'] = $this->users_model->getUsersDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['userId'] = $this->userId = $this->session->userdata('userId');
		$data['pvalue'] = array('view'=>'myaccount_view','pgTitle'=>'My Account');
		$this->loadView($data);
        }else{ 
            redirect('users/login'); 
        } 
    }
	
	public function myorders(){
		  $this->load->model('home/home_model','home_model');
		
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
          
		$this->load->library('pagination');
		// $limit = 4;
		// $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $postVal = array('limit'=>$limit,'offset'=>$offset);
		$config=[
        'base_url' => base_url('users/myorders'),
        'per_page' =>3,
        'total_rows' => $this->users_model->num_rows(),
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
        'cur_tag_close' =>"</a></li>"

 ];

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;   
            // Pass the user data and load view 
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['totalAddress'] = $this->users_model->countCustomerAddress();
		$data['getAllorder'] = $this->users_model->orderList($config['per_page'],$this->uri->segment(3));
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['userrow'] = $this->users_model->getUsersDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['userId'] = $this->userId = $this->session->userdata('userId');
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		
		$data['pvalue'] = array('view'=>'order_view','pgTitle'=>'My Orders');
		$this->loadView($data);
        }else{ 
            redirect('users/login'); 
        } 
    }
	
	function get_order_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'users/get_order_ajax_list';
		$config['total_rows'] = $this->users_model->getAllorder($postVal);
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
		$data['getAllorder'] = $this->users_model->getAllorder($postVal);
		$this->load->view('ajax_order_view',$data);
	}
	
	public function address(){
		  
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
             
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
        $this->load->model('checkout/checkout_model','checkout_model');
		$data['userAddressCount'] = $this->checkout_model->countUserAddress();
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['totalAddress'] = $this->users_model->countCustomerAddress();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['userrow'] = $this->users_model->getUsersDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['user_address_list'] = $this->users_model->getAllUserAddress(array('limit'=>6));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['userId'] = $this->userId = $this->session->userdata('userId');
		$data['pvalue'] = array('view'=>'address_view','pgTitle'=>'My Address');
		$this->loadView($data);
        }else{ 
            redirect('users/login'); 
        } 
    }
	
	public function addaddress(){
		  
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
             
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['totalAddress'] = $this->users_model->countCustomerAddress();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['userrow'] = $this->users_model->getUsersDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['user_address_list'] = $this->users_model->getAllUserAddress(array('limit'=>6));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['userId'] = $this->userId = $this->session->userdata('userId');
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_address') == TRUE) {
				$response = $this->users_model->addAddress($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					if($_POST['ref']=='checkout')
					{
						redirect(WEB_URL.'checkout?address');
					}
						else
					{
						redirect(WEB_URL.'users/address');
					}
					
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_address_view','pgTitle'=>'Add Your New Address');
		$this->loadView($data);
        }else{ 
            redirect('users/login'); 
        } 
    }
	
	public function editaddress(){
		  
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
        $id=decrypt_url($_GET['aid']);   
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['row'] = $this->users_model->getAddressDetails(array('id'=>$id));
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['totalAddress'] = $this->users_model->countCustomerAddress();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['userrow'] = $this->users_model->getUsersDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['user_address_list'] = $this->users_model->getAllUserAddress(array('limit'=>6));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['userId'] = $this->userId = $this->session->userdata('userId');
		if(isset($_POST['update']) && $_POST['update']=='update'){
			if ($this->form_validation->run('add_address') == TRUE) {
				$response = $this->users_model->update_address($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					if($_POST['ref']=='checkout')
					{
						redirect(WEB_URL.'checkout?address');
					}
						else
					{
						redirect(WEB_URL.'users/address');
					}
					
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_address_view','pgTitle'=>'Edit Address');
		$this->loadView($data);
        }else{ 
            redirect('users/login'); 
        } 
    }
	
	function setdefault($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$default=$_GET['address'];
		$data = array(
		'address'=>$default
		);
		$this->db->where('id_user',$this->session->userdata('userId'));
		if($this->db->update(TBL_USER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Default Address Has Been Successfully Updated!');
		}
		redirect('users/address');
		return $response;
	}
	
	function remove_address($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$aid=$_GET['aid'];
		$address='';
		$data = array(
		'address'=>$address
		);
		$this->db->where('id_user',$this->session->userdata('userId'));
		$this->db->update(TBL_USER,$data);
		$this->db->where('id', $aid);
		if($this->db->delete('customer_address')){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Your Address Has Been Successfully Updated!');
		}
		redirect('users/address');
		return $response;
	}
	
	public function selleraccount(){
		  
        $data = array(); 
        if($this->isSellerLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('sellerId') 
            ); 
            $data['seller'] = $this->users_model->getSellerRows($con); 
             
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['sellerrow'] = $this->users_model->getSellerDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'selleraccount_view','pgTitle'=>'Seller Account');
		$this->loadView($data);
        }else{ 
            redirect('users/seller'); 
        } 
    }
	
	public function selectplan(){
		  
        $data = array(); 
        if($this->isSellerLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('sellerId') 
            ); 
            $data['seller'] = $this->users_model->getSellerRows($con); 
             
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['sellerrow'] = $this->users_model->getSellerDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['sellerSubscriptionList'] = $this->users_model->getAllSubscription(array('limit'=>3));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'selectplan_view','pgTitle'=>'Seller Account');
		$this->loadView($data);
        }else{ 
            redirect(WEB_URL); 
        } 
    } 
	
	public function orderdetails($id){
		 $id = decrypt_url($id);
		 
		$data = array(); 
         if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
		 
		if(isset($_POST['apply']) && $_POST['apply']=='apply'){
			$response = $this->users_model->sellorApply($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'users/selleraccount');
				}
			}
		
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['sellerrow'] = $this->users_model->getSellerDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['OrderDetails'] = $this->users_model->getOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->users_model->letsCountorderId(array('id'=>$id));
		//$data['Order_id'] = $this->users_model->selectorderId(array('id'=>$id));
		$data['OrderProduct'] = $this->users_model->getAllOrderedProduct(array('orderid'=>$id));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		if($data['totalOrder_id']!='1')
            {
                redirect(WEB_URL.'users/myorders?ref=wrong_order_id');
            }
		$data['pvalue'] = array('view'=>'orderdetails_view_details','pgTitle'=>'Order Details');
		$this->loadView($data);
        }else{ 
            redirect(WEB_URL); 
        } 
    } 
	
	public function cancelorder($id){
		 $id = decrypt_url($id);
		 
		$data = array(); 
         if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->users_model->getUserRows($con); 
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
		 
		if(isset($_POST['requestCancel']) && $_POST['requestCancel']=='requestCancel'){
			$response = $this->users_model->cancelOrder($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'users/myorders');
				}
			}
		
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['sellerrow'] = $this->users_model->getSellerDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['OrderDetails'] = $this->users_model->getOrderDetails(array('id'=>$id));
		$data['cancelOrderDetails'] = $this->users_model->getCanceOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->users_model->letsCountorderId(array('id'=>$id));
		//$data['Order_id'] = $this->users_model->selectorderId(array('id'=>$id));
		// $data['OrderProduct'] = $this->users_model->getAllOrderedProduct(array('orderid'=>$id));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		if($data['totalOrder_id']!='1')
            {
                redirect(WEB_URL.'users/myorders?ref=wrong_order_id');
            }
		$data['pvalue'] = array('view'=>'cancel_details','pgTitle'=>'Cancel Order');
		$this->loadView($data);
        }else{ 
            redirect(WEB_URL); 
        } 
    } 
	
	public function subscription($id){
		 $id = decrypt_url($id);
		$data = array(); 
         if($this->isSellerLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('sellerId') 
            ); 
            $data['seller'] = $this->users_model->getSellerRows($con); 
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
		 
		if(isset($_POST['apply']) && $_POST['apply']=='apply'){
			$response = $this->users_model->sellorApply($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'users/selleraccount');
				}
			}
		
            // Pass the user data and load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['sellerrow'] = $this->users_model->getSellerDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['SubscriptionListDetails'] = $this->users_model->getSubscriptionPlanDetails(array('id'=>$id));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'selectplan_view_details','pgTitle'=>'Seller Account');
		$this->loadView($data);
        }else{ 
            redirect(WEB_URL); 
        } 
    } 
	
	public function forgotPassword(){ 
		$data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
		 // if(isset($_POST['apply']) && $_POST['apply']=='apply'){
			// $response = $this->users_model->sellorApply($_POST);
				// $this->setSuccessFailMessage($response);
				// if($response['status']==STATUS_SUCCESS) {
					// redirect(WEB_URL . 'users/selleraccount');
				// }
			// }
		 
        // If login request submitted 
        if(isset($_POST['proceed']))
{
	$this->form_validation->set_rules('mobile_no', 'Mobile', 'required'); 
	if($this->form_validation->run() == true){ 
	
	include('db.php'); 
	$mobile=$_POST['mobile_no'];
$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "select count(id_user ) from `users` where `mobile_no`='$mobile'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();	
	
	if($count_mobile==1)
	{
	
	$otp_two=rand(356545,987454);
	
$msg='Dear customer! '.$otp_two.' is the OTP to verify your mobile number for UBaazar.
OTP is confidential. Please do not share it with anyone.
Team UBaazar';

$phones=$_POST['mobile_no'];

$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163832885535095");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);

$_SESSION['otp_two'] = $otp_two;
$_SESSION["mobile"] = $_POST['mobile_no'];
	$otp_two='';
	redirect(WEB_URL . 'users/forgotPassword');
	
	}
	else
	{
		 // header("Location: forgot_password.php?notfound=true");	
		 // redirect(WEB_URL .'users/forgotPassword');
		 $data['error_msg'] = 'Mobile Number Not Found.'; 
	}
	
}
else {
	 $data['error_msg'] = 'Please fill Mobile Number.'; 
}
}

if(isset($_POST['verifyotp']))
{
	$this->form_validation->set_rules('otp_two', 'Otp', 'required'); 
	if($this->form_validation->run() == true){ 
		
		$mobile=$_SESSION["mobile"];
	$otp=$_POST['otp_two'];
	 
	if($_SESSION["otp_two"]==$_POST['otp_two'])
	{
		redirect(WEB_URL . 'users/changePassword');
	}
	
	else
		{
			//redirect(WEB_URL . 'users/changePassword');
			$data['error_msg'] = 'That’s not the OTP we sent! Please check and try again';
		}
	
	}
	else{
		$data['error_msg'] = 'Please fill Otp.'; 
	}
}

		// Load view 
         $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'forgotpassword_view','pgTitle'=>'Lost Password');
		$this->loadView($data);
		
		
    }

	public function verifyotp(){ 
		$data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
		// If login request submitted 
        if(isset($_POST['verify_otp']))
{
	$this->form_validation->set_rules('otp_two', 'Otp', 'required'); 
	if($this->form_validation->run() == true){ 
		
		$mobile=$_SESSION["mobile"];
	$otp=$_POST['otp_two'];
	 
	if($_SESSION["otp_two"]==$_POST['otp_two'])
	{
		redirect(WEB_URL . 'users/changePassword');
	}
	
	else
		{
			redirect(WEB_URL . 'users/changePassword');
			$data['error_message'] = 'That’s not the OTP we sent! Please check and try again';
		}
	
	}
	else{
		$data['error_msg'] = 'Please fill Otp.'; 
	}
}

		// Load view 
         $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'verifyotp_view','pgTitle'=>'Verify Otp');
		$this->loadView($data);
		
		
    }
	
	public function changePassword(){ 
		 
        $data = array(); 
        // Get messages from the session 
        // if($this->session->userdata('success_msg')){ 
            // $data['success_msg'] = $this->session->userdata('success_msg'); 
            // $this->session->unset_userdata('success_msg'); 
        // } 
        // if($this->session->userdata('error_msg')){ 
            // $data['error_msg'] = $this->session->userdata('error_msg'); 
            // $this->session->unset_userdata('error_msg'); 
        // } 
         
		// If password resubmitted 
       if(isset($_POST['change_pass']) && $_POST['change_pass']=='change_pass'){
			if ($this->form_validation->run('change_password') == TRUE) {
				// $response = $this->users_model->updatesPassword($_POST);
				// $this->setSuccessFailMessage($response);
				// if($response['status']==STATUS_SUCCESS) {
					// redirect(WEB_URL . 'users/login');
				// }
				
				
		$pass=md5($_POST['password']);
	 $mobile=$_SESSION["mobile"];
		 
		// include('./db.php'); 
// $con = new mysqli($host, $user, $password, $dbname)
	// or die ('Could not connect to the database server' . mysqli_connect_error());	
// $query = "update `users` set `password`='$pass' where `mobile_no`='$mobile'";
// if ($stmt = $con->prepare($query)) {
    // $stmt->execute();
    // $stmt->bind_result($query);	
    // while ($stmt->fetch()) {	
	 
        		// }  
// }
// $stmt->close();
// $con->close();
include('./db.php');
$sql = "update `users` set `password`='$pass' where `mobile_no`='$mobile'";

if ($conn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  $userarray = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mobile_no' => $_SESSION['mobile'],
                        // 'password' => md5($this->input->post('passwords')), 
                        // 'status' => 2 
                    ) 
                ); 
                $checkLogin = $this->users_model->getUserRows($userarray); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id_user']);
                    $this->session->set_userdata('id_user_type', $checkLogin['id_user_type']);
					$this->setUserDataInSession($checkLogin);					
                    if($_SESSION['ref']=='checkout')
					{
						redirect(WEB_URL.'checkout?redirect_via_login');
					}
						else
					{
						redirect(WEB_URL . '');
					}
					
                }
				
  
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

					

			}
		}
		
		// Load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['pvalue'] = array('view'=>'changepassword_view','pgTitle'=>'Change Password');
		$this->loadView($data);
		
		
    }

	
	
	public function login(){ 
		
		if($this->isUserLoggedIn){ 
          redirect('users/account'); 
		 } 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('mobile', 'Mobile', 'required'); 
            $this->form_validation->set_rules('passwords', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mobile_no'=> $this->input->post('mobile'), 
                        'password' => md5($this->input->post('passwords')), 
                        'status' => 2 
                    ) 
                ); 
                $checkLogin = $this->users_model->getUserRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id_user']);
                    $this->session->set_userdata('id_user_type', $checkLogin['id_user_type']);
					$this->setUserDataInSession($checkLogin);					
                    if($_POST['ref']=='checkout')
					{
						redirect(WEB_URL.'checkout?redirect_via_login');
					}
						else
					{
						redirect(WEB_URL . 'users/account');
					}
					
                }else{ 
                    $data['error_msg'] = 'Wrong mobile or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
		// session_start();
		
		
		// If registration request is submitted 
        if($this->input->post('registerSubmit')){ 
		
		
// $stmt->close();
// $con->close();
				 
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
            $this->form_validation->set_rules('mobile_no', 'Mobile', 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'); 
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'ref' => $this->input->post('gender'), 
                'gender' => $this->input->post('gender'), 
                'mobile_no' => strip_tags($this->input->post('mobile_no')) 
            ); 
 
            if($this->form_validation->run() == true){  
			
                $mobile=$_POST['mobile_no'];
	include('./db.php'); 
	 // mysqli_set_charset($conn,"utf8");
	$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "select count(id_user) from users where mobile_no='$mobile'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_user);	
    while ($stmt->fetch()) {	
	
        		}  
} 
				 
				 
				 if($count_user==0) 
				 {
					$otp=rand(356545,987454);
	
// $msg='Dear customer! '.$otp.' is the OTP to verify your mobile number for New Microsoet Computer. OTP is confidential do not share with anyone. Regards - New Microsoet Computer.';
$msg='Dear customer! '.$otp.' is the OTP to verify your mobile number for UBaazar.
OTP is confidential. Please do not share it with anyone.
Team UBaazar';
	
	
$phones=$mobile;

$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163832885535095");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
	 
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$ref=$_POST['ref'];
	
   
	$_SESSION['first_name']=$first_name;
	$_SESSION['last_name']=$last_name;
	
	$_SESSION['password']=$password;
	$_SESSION['gender']=$gender;
	$_SESSION['ref']=$ref;
	$_SESSION['otp']=$otp;
	$_SESSION['mobile']=$mobile;
	
	 
		redirect(WEB_URL.'users/verification?ok='.$count_user);
	
				 }
				 else
		{
			//$mobile=$_POST['mobile'];
			$_SESSION['mobile']=$mobile;
		$_SESSION['error_message'] = 'This number is already registered with us.';
			$this->session->set_userdata('session_mobile_no', $_SESSION['mobile']);					
			//header("Location: signin.php?error_message");
			redirect(WEB_URL.'users/login?error_message&ok='.$_SESSION['mobile']);
		
		}
		
		}
			
			 
			else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        }
          
         
        // Load view 
         $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'logins_view','pgTitle'=>'Log In');
		$this->loadView($data);
		
		
    }
		
	
	function verification(){ 
	if($this->isUserLoggedIn){ 
          redirect('users/account'); 
		 } 
        $data = array(); 
         // session_start();
		if(isset($_POST['verifyotp']) && $_POST['verifyotp']=='verifyotp'){
			
			$otp=$_POST['otp'];
	
		
				if ($this->form_validation->run('verify_otp') == TRUE) {
					if($_SESSION["otp"]==$otp)
						{
					$response = $this->users_model->add_user($_POST);
						if($response['status']==STATUS_SUCCESS) {
							 $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
							
							//start here
							
							$con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mobile_no' => $_SESSION['mobile'],
                        // 'password' => md5($this->input->post('passwords')), 
                        // 'status' => 2 
                    ) 
                ); 
                $checkLogin = $this->users_model->getUserRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id_user']);
                    $this->session->set_userdata('id_user_type', $checkLogin['id_user_type']);
					$this->setUserDataInSession($checkLogin);					
                    if($_SESSION['ref']=='checkout')
					{
						redirect(WEB_URL.'checkout?redirect_via_login');
					}
						else
					{
						redirect(WEB_URL . '');
					}
					
                } 
						}
					}
					else
						{
							redirect(WEB_URL . 'users/verification?otp_attempt=false');
						}
				}
		
	}
	
		
        // Load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'verification_view','pgTitle'=>'Otp Verification');
		$this->loadView($data);
		
		
    }
	
	
	public function seller(){ 
	if($this->isSellerLoggedIn){ 
          redirect('users/selleraccount'); 
		 } 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('VendorloginSubmit')){ 
            $this->form_validation->set_rules('mobile', 'Mobile', 'required'); 
            $this->form_validation->set_rules('passwords', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mobile_no'=> $this->input->post('mobile'), 
                        'password' => md5($this->input->post('passwords')), 
                        'is_vendor' => 1, 
                        'status' => 2 
                    ) 
                ); 
                $checkSellerLogin = $this->users_model->getSellerRows($con); 
                if($checkSellerLogin){ 
                    $this->session->set_userdata('isSellerLoggedIn', TRUE); 
                    $this->session->set_userdata('sellerId', $checkSellerLogin['id']);
					$this->session->set_userdata('id_seller_type', $checkSellerLogin['id_seller_type']);					
					$this->session->set_userdata('first_name', $checkSellerLogin['first_name']);					
					// redirect('users/account/'); 
					redirect(WEB_URL . 'users/selleraccount');
                }else{ 
                    $data['error_msg'] = 'Wrong mobile or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
		
		// If registration request is submitted 
        if($this->input->post('VendorsignupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
            $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required'); 
            $this->form_validation->set_rules('shop_number', 'Shop Number', 'trim|required'); 
            $this->form_validation->set_rules('shop_address', 'Shop Address', 'trim|required'); 
            $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required'); 
            $this->form_validation->set_rules('reg_number', 'Reg. Number', 'trim|required'); 
            $this->form_validation->set_rules('mobile_no', 'Mobile', 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]|callback_seller_mobile_no_check'); 
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
			$english_url_title = strip_tags($this->input->post('shop_name'));
			$shopSlug = strtolower(url_title($english_url_title));
			if(isUrlExists('seller',$shopSlug)){
				$shopSlug = $shopSlug.'-'.time();
			}
		
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'gender' => $this->input->post('gender'), 
                'shop_name' => $this->input->post('shop_name'), 
                'slug' => $shopSlug, 
                'shop_number' => $this->input->post('shop_number'), 
                'shop_address' => $this->input->post('shop_address'), 
                'owner_name' => $this->input->post('owner_name'), 
                'reg_number' => $this->input->post('reg_number'), 
                'is_vendor' => 1, 
                'mobile_no' => strip_tags($this->input->post('mobile_no')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->users_model->insertseller($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('users/seller'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        }
          
         
        // Load view 
         $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		
		$data['pvalue'] = array('view'=>'add_vendor_view','pgTitle'=>'Seller Log In');
		$this->loadView($data);
	}
	
	function setUserDataInSession($checkLogin=array())
	{
		$this->session->set_userdata($checkLogin);
	}
	function setSellerDataInSession($checkSellerLogin=array())
	{
		$this->session->set_userdata($checkSellerLogin);
	}
	public function registration(){ 
        $data = $userData = array(); 
         
         
         
        // Posted data 
        $data['user'] = $userData; 
         $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['pvalue'] = array('view'=>'register_view','pgTitle'=>'Sign Up');
		$this->loadView($data);
    } 
	
	public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect(WEB_URL); 
    } 
	
	public function sellerlogout(){ 
        $this->session->unset_userdata('isSellerLoggedIn'); 
        $this->session->unset_userdata('sellerId'); 
        $this->session->sess_destroy(); 
        redirect(WEB_URL); 
    }
	
	 public function mobile_no_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'mobile_no' => $str 
            ) 
        ); 
        $checkEmail = $this->users_model->getUserRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('mobile_no_check', 'The given mobile number already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }

	public function seller_mobile_no_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'mobile_no' => $str 
            ) 
        ); 
        $checkEmail = $this->users_model->getSellerRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('seller_mobile_no_check', 'The given mobile number already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }	
	
	function myAccount(){
		
		// if($this->isUserLoggedIn){
		$this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['pvalue'] = array('view'=>'myaccount_view','pgTitle'=>'My Account');
		$this->loadView($data);
			 
			 // } else { 
         // redirect('users/register'); 
		 // } 
		
	}
	public function getPinDetails(){
		$pincode=$_POST['pincode'];
		$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
		$data=json_decode($data);
		if(isset($data->PostOffice['0'])){
			$arr['city']=$data->PostOffice['0']->Taluk;
			$arr['state']=$data->PostOffice['0']->State;
			echo json_encode($arr);
		}else{
			echo 'no';
		}
	}

	public function distributorRegister(){
		  
          
		
		$data = array(); 
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
        
		// If registration request is submitted 
        if(isset($_POST['submit'])){ 
			
			$this->form_validation->set_rules('user_type', 'First Name', 'trim|required'); 
			$this->form_validation->set_rules('state', 'State', 'trim|required'); 
			$this->form_validation->set_rules('city', 'City', 'trim|required'); 
			$this->form_validation->set_rules('first_name', 'User', 'trim|required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required'); 
            $this->form_validation->set_rules('mobile_no', 'Mobile', 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'); 
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'user_type' => strip_tags($this->input->post('user_type')), 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'state' => $this->input->post('state'), 
                'city' => $this->input->post('city'), 
                'mobile_no' => strip_tags($this->input->post('mobile_no')) 
            ); 
 
            if($this->form_validation->run() == true){  
			$mobile=$this->input->post('mobile_no');
			
			$checkMobile =$this->users_model->checkDuplicate('distributor','mobile',$mobile);
             
				 if($checkMobile=='0') 
				 {
					$otp=rand(356545,987454);
	

// $msg='Dear customer! '.$otp.' is the OTP to verify your mobile number for UBaazar.
// OTP is confidential. Please do not share it with anyone.
// Team UBaazar';
	
	
// $phones=$mobile;

// $url="http://45.249.108.134/api.php";
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163832885535095");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
// $response = curl_exec($ch);
	 
	$first_name=$this->input->post('first_name');
	$last_name=$this->input->post('last_name');
	$mobile=$this->input->post('mobile_no');
	$password=md5($this->input->post('password'));
	$state=$this->input->post('state');
	$city=$this->input->post('city');
	$email=$this->input->post('email');
	$user_type=$this->input->post('user_type');
	 
	$this->session->set_userdata('first_name', $first_name);
	$this->session->set_userdata('last_name', $last_name);
	$this->session->set_userdata('mobile_no', $mobile);
	$this->session->set_userdata('password', $password);
	$this->session->set_userdata('state', $state);
	$this->session->set_userdata('city', $city);
	$this->session->set_userdata('email', $email);
	$this->session->set_userdata('user_type', $user_type);
	
	
	 
		redirect(WEB_URL.'distributor-verification?ok='.$count_user);
	
				 }
				 else
		{
			//$mobile=$_POST['mobile'];
			$_SESSION['mobile_no']=$mobile;
			$_SESSION['error_message'] = 'This number is already registered with us.';
			$this->session->set_userdata('session_mobile_no', $_SESSION['mobile_no']);					
			//header("Location: signin.php?error_message");
			redirect(WEB_URL.'distributor-register?error_message&ok='.$_SESSION['mobile_no']);
		
		}
		
		}
			
			 
			else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        }
		
		
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
		$data['distributorAmount'] = $this->users_model->getDistributorAmount();
        $data['userId'] = $this->userId = $this->session->userdata('userId');
		$data['pvalue'] = array('view'=>'distributor_register_view','pgTitle'=>'Register');
		$this->loadView($data);
         
    }
	public function distributorVerification(){ 
	
        $data = array(); 
         
		if(isset($_POST['pay_online']) && $_POST['pay_online']=='pay_online'){
			// if ($this->form_validation->run('order_form') == TRUE) {
				$response = $this->users_model->addDistributor($_POST);
				$this->setSuccessFailMessage($response);
				 if($response['status']==STATUS_SUCCESS) {
					 redirect(WEB_URL.'');
				 }
				
			// }
		}
		
		 // Load view 
        $this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['distributorAmount'] = $this->users_model->getDistributorAmount();
		$data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['pvalue'] = array('view'=>'dis_verification_view.php','pgTitle'=>'Otp Verification');
		$this->loadView($data);
		
		
    }
	
	public function distributorLogin(){
		$data = array();
		// If login request submitted 
        if(isset($_POST['loginSubmit'])){  
            $this->form_validation->set_rules('mobile', 'Mobile', 'required'); 
            $this->form_validation->set_rules('passwords', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'mobile'=> $this->input->post('mobile'), 
                        'password' => md5($this->input->post('passwords')), 
                        'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->users_model->getDistributorRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isDistributorLoggedIn', TRUE); 
                    $this->session->set_userdata('distributorId', $checkLogin['id']);
                    $this->session->set_userdata('distributorName', $checkLogin['name']);
                    $this->session->set_userdata('roleID', $checkLogin['user_type']);
					$this->setUserDataInSession($checkLogin);					
                     
						redirect(WEB_URL . 'distributor/dashboard');
					 
                }else{ 
                    $data['error_msg'] = 'Wrong mobile or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        }
		$this->load->model('home/home_model','home_model');
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['grocery_subcategories_list'] = $this->home_model->get_grocery_categories();
		$data['books_subcategories_list'] = $this->home_model->get_books_categories();
		$data['health_subcategories_list'] = $this->home_model->get_health_categories();
		$data['fashion_subcategories_list'] = $this->home_model->get_fashion_categories();
		$data['beauty_subcategories_list'] = $this->home_model->get_beauty_categories();
		$data['sports_subcategories_list'] = $this->home_model->get_sport_categories();
		$data['home_subcategories_list'] = $this->home_model->get_home_categories();
		$data['babycare_subcategories_list'] = $this->home_model->get_baby_categories();
		$data['automobiles_subcategories_list'] = $this->home_model->get_Automobiles_categories();
		$data['electronic_subcategories_list'] = $this->home_model->get_Electronic_categories();
		$data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
		$data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
		$data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['userId'] = $this->userId = $this->session->userdata('userId');
		$data['pvalue'] = array('view'=>'distributor_login_view','pgTitle'=>'Distributor Login');
		$this->loadView($data);
	}
	
//End
}
?>