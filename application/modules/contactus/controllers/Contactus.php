<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Contactus extends Frontcontroller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contactus_model');
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    }

    public function index()
    {
        redirect(WEB_URL . 'home');
    }

    public function contactPage()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();
        $this->load->model('home/home_model', 'home_model');
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 2));
        $data['allProduct'] = $this->home_model->getAllProduct(array('limit' => 10));
        $data['dailydeals'] = $this->home_model->getDailyDealsProduct(array('limit' => 10));
        $data['hotProduct'] = $this->home_model->getHotProduct(array('limit' => 10));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 10));
        $data['trendingProduct'] = $this->home_model->getTrendingProduct(array('limit' => 10));
        $data['widgetProduct'] = $this->home_model->getAllProduct(array('limit' => 4));
        $data['groceryProduct'] = $this->home_model->getgroceryProduct(array('limit' => 10));
        $data['fashionProduct'] = $this->home_model->getfashionProduct(array('limit' => 10));
        $data['clothingApparelProduct'] = $this->home_model->getClothingApparelProduct(array('limit' => 10));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['HomeDisplayAds'] = $this->home_model->getHomeDisplayAds(array('limit' => 1));
        $data['ClothingApparel'] = $this->home_model->getClothingApparelAds(array('limit' => 1));
        $data['homeDailydeals'] = $this->home_model->gethomeDailydealsAds(array('limit' => 2));
        $data['homeFashion'] = $this->home_model->gethomeFashionAds(array('limit' => 2));
        $data['productDetailsRight'] = $this->home_model->getproductDetailsRightAds(array('limit' => 1));
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['totalCategory'] = $this->home_model->getCatCount(array('category_id' => 11));
        $data['brand_list'] = $this->home_model->getAllBrand();
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
        $data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
        $data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
        $data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
            if ($this->form_validation->run('contact_us') == true) {
                $response = $this->contactus_model->addContact($_POST);
                $this->setSuccessFailMessage($response);
                if ($response['status'] == STATUS_SUCCESS) {
                    redirect(WEB_URL . 'ask-question.html');
                }
            }
        }
        $data['pvalue'] = array('view' => 'contact_view', 'pgTitle' => 'Ask a Question');
        $this->loadView($data);
    }

    public function faqView()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();
        $this->load->model('home/home_model', 'home_model');
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 2));
        $data['allProduct'] = $this->home_model->getAllProduct(array('limit' => 10));
        $data['dailydeals'] = $this->home_model->getDailyDealsProduct(array('limit' => 10));
        $data['hotProduct'] = $this->home_model->getHotProduct(array('limit' => 10));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 10));
        $data['trendingProduct'] = $this->home_model->getTrendingProduct(array('limit' => 10));
        $data['widgetProduct'] = $this->home_model->getAllProduct(array('limit' => 4));
        $data['groceryProduct'] = $this->home_model->getgroceryProduct(array('limit' => 10));
        $data['fashionProduct'] = $this->home_model->getfashionProduct(array('limit' => 10));
        $data['clothingApparelProduct'] = $this->home_model->getClothingApparelProduct(array('limit' => 10));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['HomeDisplayAds'] = $this->home_model->getHomeDisplayAds(array('limit' => 1));
        $data['ClothingApparel'] = $this->home_model->getClothingApparelAds(array('limit' => 1));
        $data['homeDailydeals'] = $this->home_model->gethomeDailydealsAds(array('limit' => 2));
        $data['homeFashion'] = $this->home_model->gethomeFashionAds(array('limit' => 2));
        $data['productDetailsRight'] = $this->home_model->getproductDetailsRightAds(array('limit' => 1));
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['totalCategory'] = $this->home_model->getCatCount(array('category_id' => 11));
        $data['brand_list'] = $this->home_model->getAllBrand();
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
        $data['mobile_subcategories_list'] = $this->home_model->get_Mobile_categories();
        $data['Computer_subcategories_list'] = $this->home_model->get_Computer_categories();
        $data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        $data['pvalue'] = array('view' => 'faq_view', 'pgTitle' => 'FAQ - Frequently Asked Questions');
        $this->loadView($data);
    }
//End
}