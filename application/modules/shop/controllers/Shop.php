<?php

class Shop extends Frontcontroller
{
    
    public function __construct()
    {
		parent::__construct();
		$this->load->model('shop_model');
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
        
    }
	
    public function index()
    {
        $this->load->model('home/home_model', 'home_model');
		
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 5));
        $data['allCategories'] = $this->home_model->getAllCategories(array('limit' => 8));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
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
		$data['categoyHeaderAd'] = $this->home_model->getcategoyHeaderAd(array('limit'=>1));
        $data['pvalue'] = array('view' => 'product_rana_view', 'pgTitle' => 'Shop Your Collest Product');
        $this->loadView($data);
    }
	
	 
}

//End