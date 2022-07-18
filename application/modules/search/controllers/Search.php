<?php

class Search extends Frontcontroller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->library('ajax_pagination');
        $this->load->library('cart');
        // Per page limit
        $this->perPage = 10;
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    }

    public function searchDetails()
    {
        $cat = (isset($_GET['cat']) && $_GET['cat'] > 0) ? $_GET['cat'] : 0;
        $this->load->model('home/home_model', 'home_model');
        $data['product_brand'] = $this->search_model->get_product_brand();
        $data['product_category'] = $this->search_model->get_product_category();
        $data['cartItems'] = $this->cart->contents();
        $data['categoyHeaderAd'] = $this->home_model->getcategoyHeaderAd(array('limit' => 1));
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['category'] = $this->search_model->getAllProductas(array('category_id' => $cat));
        $data['productsbycategory'] = $this->search_model->NestedProducts();
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
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
        $data['pvalue'] = array('view' => 'search_view', 'pgTitle' => 'Search Product');
        $this->loadView($data);
    }

}

//End