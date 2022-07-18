<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myorders extends Frontcontroller{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('checkout_model');
        // Load cart library
        $this->load->library('cart');
       $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');   
    }
    
    function index(){
		if($this->isUserLoggedIn){ 
            $con = array( 
                'id_user' => $this->session->userdata('userId') 
            ); 
        $data = array();
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
		$this->load->model('home/home_model','home_model');
		
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$this->load->model('users/users_model','users_model');
		$data['user'] = $this->users_model->getUserRows($con);
		$data['user_address_list'] = $this->users_model->getAllUserAddress(array('limit'=>2));
		$data['user_address'] = $this->checkout_model->getCustAllRecentAddress(array('limit'=>1));
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['allProduct'] = $this->home_model->getAllProduct(array('limit'=>5));
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
		$data['categories_list'] = $this->home_model->get_categories();
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
		$data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
		$data['address_id'] = $this->checkout_model->getCustomerAddress();
		$data['user_default_address'] = $this->checkout_model->getCustomerDefaultAddress(array('id'=>$data['address_id']));
        
		if(isset($_POST['make_order']) && $_POST['make_order']=='make_order'){
			if ($this->form_validation->run('order_form') == TRUE) {
				$response = $this->checkout_model->order($_POST);
				$this->setSuccessFailMessage($response);
				 if($response['status']==STATUS_SUCCESS) {
					 redirect(WEB_URL.'myorders');
				 }
				
			}
		}
		
		$data['pvalue'] = array('view'=>'checkout_view','pgTitle'=>'Checkout');
		$this->loadView($data);
		} else {
			 redirect('login');
		}
    }
    
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('cart/');
    }
    
}

?>
