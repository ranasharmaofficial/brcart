<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontcontroller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->library('cart');
        if (CLDNRY_ACCESS) {
            $this->load->library('cloudinary_lib');
        }
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    }

    public function index()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 2));
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 2));
        $data['allProduct'] = $this->home_model->getAllProduct(array('limit' => 7));
        $data['newArrivalProduct'] = $this->home_model->getAllProduct(array('limit' => 10));
        $data['nextallProduct'] = $this->home_model->getNextAllProduct(array('limit' => 7, 'offset'=>7));
        $data['dailydeals'] = $this->home_model->getDailyDealsProduct(array('limit' => 10));
        $data['beautyProducts'] = $this->home_model->getBeautyProducts(array('limit' => 10));
        $data['hotProduct'] = $this->home_model->getHotProduct(array('limit' => 7));
		$data['nexthotProduct'] = $this->home_model->getNextHotProduct(array('limit' => 7, 'offset' =>7));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 7));
        $data['nextsaleProduct'] = $this->home_model->getNextSaleProduct(array('limit' => 7, 'offset' =>7));
        $data['trendingProduct'] = $this->home_model->getTrendingProduct(array('limit' => 7));
        $data['nexttrendingProduct'] = $this->home_model->getNextTrendingProduct(array('limit' => 7, 'offset' =>7));
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
        $data['pvalue'] = array('view' => 'home_view', 'pgTitle' => 'Home');
        $this->loadView($data);
    }

    public function sameDayDelivery()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 1));
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
        $data['pvalue'] = array('view' => 'same_day_delivery', 'pgTitle' => 'Same Day Delivery');
        $this->loadView($data);
    }
    public function freeShipping()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 1));
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
        $data['pvalue'] = array('view' => 'free_shipping_view', 'pgTitle' => 'Free Shipping');
        $this->loadView($data);
    }
    public function moneyBackGuarantee()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 1));
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
        $data['pvalue'] = array('view' => 'money_back_guarantee_view', 'pgTitle' => 'Money Back Guarantee');
        $this->loadView($data);
    }
    public function securePayment()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 1));
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
        $data['brand_list'] = $this->home_model->getAllBrand(array('limit'=> 10));
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
        $data['pvalue'] = array('view' => 'secure_payment_view', 'pgTitle' => 'Secure Payment');
        $this->loadView($data);
    }

    public function getDailyDeals()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['dailydeals'] = $this->home_model->getDailyDealsProduct(array('limit' => 10));
        $data['hotProduct'] = $this->home_model->getHotProduct(array('limit' => 10));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 10));
        $data['trendingProduct'] = $this->home_model->getTrendingProduct(array('limit' => 10));
        $data['widgetProduct'] = $this->home_model->getAllProduct(array('limit' => 4));
        $data['groceryProduct'] = $this->home_model->getgroceryProduct(array('limit' => 10));
        $data['fashionProduct'] = $this->home_model->getfashionProduct(array('limit' => 10));
        $data['clothingApparelProduct'] = $this->home_model->getClothingApparelProduct(array('limit' => 10));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
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
        $data['pvalue'] = array('view' => 'dailydeals_view', 'pgTitle' => 'Daily Deals');
        $this->loadView($data);
    }
	
	public function trackOrder()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['dailydeals'] = $this->home_model->getDailyDealsProduct(array('limit' => 10));
        $data['hotProduct'] = $this->home_model->getHotProduct(array('limit' => 10));
        $data['saleProduct'] = $this->home_model->getSaleProduct(array('limit' => 10));
        $data['trendingProduct'] = $this->home_model->getTrendingProduct(array('limit' => 10));
        $data['widgetProduct'] = $this->home_model->getAllProduct(array('limit' => 4));
        $data['groceryProduct'] = $this->home_model->getgroceryProduct(array('limit' => 10));
        $data['fashionProduct'] = $this->home_model->getfashionProduct(array('limit' => 10));
        $data['clothingApparelProduct'] = $this->home_model->getClothingApparelProduct(array('limit' => 10));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
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
        $data['pvalue'] = array('view' => 'trackorder', 'pgTitle' => 'Track Order');
        $this->loadView($data);
    }

    public function allcategories()
    {
        $this->load->library('cart');
        $data['cartItems'] = $this->cart->contents();

        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['allSlider'] = $this->home_model->getAllSlider(array('limit' => 1));
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 30));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
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
        $data['pvalue'] = array('view' => 'all_cat_view', 'pgTitle' => 'All Categories');
        $this->loadView($data);
    }

    public function search()
    {
        $data['cartItems'] = $this->cart->contents();
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['categoyHeaderAd'] = $this->home_model->getcategoyHeaderAd(array('limit' => 1));
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 10));
        $data['allProduct'] = $this->home_model->getAllProduct(array('limit' => 10));
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
        $data['pvalue'] = array('view' => 'search_view', 'pgTitle' => 'Search');
        $this->loadView($data);
    }

    public function productDetails($slug)
    {
        $id = 0;
        $data['cartItems'] = $this->cart->contents();

        // echo "<pre>";
        // print_r($data);
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['productIds'] = $this->home_model->getProductID();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['categoryId'] = $this->home_model->selectProCategoryId(array('slug' => $slug));
        $data['childcategoryId'] = $this->home_model->selectProChildCategory(array('slug' => $slug));
        $data['productBrandId'] = $this->home_model->selectProBrand(array('slug' => $slug));
        $data['relatedProducts'] = $this->home_model->getRelatedProduct(array('childcategory_id' => $data['childcategoryId'], 'limit' => 9));
        $data['relatedProductsbyBrand'] = $this->home_model->getRelatedBrandProduct(array('brand' => $data['productBrandId'], 'limit' => 12));
        $data['totalP'] = $this->home_model->getCountSlug(array('slug' => $slug));
        $data['productId'] = $this->home_model->selectProductId(array('slug' => $slug));
        $data['vendorIDfromdetails'] = $this->home_model->getVendorIDRows(array('slug' => $slug));
        $data['allCategory'] = $this->home_model->getAllCategory(array('limit' => 6));
        $data['allProduct'] = $this->home_model->getAllProduct(array('limit' => 5));
        $data['productDetailsRight'] = $this->home_model->getproductDetailsRightAds(array('limit' => 1));
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['details'] = $this->home_model->getItemDetailsRows(array('slug' => $slug));
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['galleryItem'] = $this->home_model->getProductGalleryR(array('pid' => $data['productId']));
        $data['related_product_from_seller'] = $this->home_model->getrelatedProductFrmSeller(array('pid' => $data['productId'], 'id' => $data['vendorIDfromdetails'], 'limit' => 10));
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

        $data['subcategories_list'] = $this->home_model->get_grocery_categories();
        $data['socialmediaicons'] = $this->home_model->getAllSocialIcons();
        if ($data['totalP'] != '1') {
            redirect(WEB_URL);
        }
        $data['pvalue'] = array('view' => 'details_view', 'pgTitle' => 'Product Details');
        $this->loadView($data);
    }

    public function pageDetails($slug)
    {
        $id = 0;
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['page_details'] = $this->home_model->getContentPageDetailsRows(array('slug' => $slug));
        $data['totalPageSlug'] = $this->home_model->CountPageDetailsSlug(array('slug' => $slug));
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
        if ($data['totalPageSlug'] != '1') {
            redirect(WEB_URL);
        }
        $data['pvalue'] = array('view' => 'content_page_details', 'pgTitle' => 'Page Details');
        $this->loadView($data);
    }

    public function addToCart($proID)
    {
        $this->load->library('cart');
        // Fetch specific product by ID
        $product = $this->home_model->getRows($proID);

        // Add product to the cart
        $datas = array(
            'id' => $product['id'],
            'qty' => 1,
            'price' => $product['price'],
            'previous_price' => $product['previous_price'],
            'name' => $product['name'],
            'slug' => $product['slug'],
            'photo' => $product['photo'],
        );
        $this->cart->insert($datas);
        $this->session->set_flashdata('success', 'Successfully Added to Cart!');
        redirect(WEB_URL);

    }

    public function addcart()
    {
        $this->load->library("cart");
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "qty" => $_POST["quantity"],
            "slug" => $_POST["product_slug"],
            "sellerid" => $_POST["product_sellerid"],
            "photo" => $_POST["product_photo"],
            "price" => $_POST["product_price"],
        );
        $this->cart->insert($data); //return rowid
        $this->session->set_flashdata('success', 'Successfully Added to Cart!');
        echo $this->view();
    }

    public function updateplus()
    {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $qty = $_POST["qty"] + 1;
        // $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $row_id,
            'qty' => $qty,
        );
        $this->cart->update($data);
        $this->session->set_flashdata('success', 'Successfully Added to Cart!');
        echo $this->view();
    }

    public function updateminus()
    {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $qty = $_POST["qty"] - 1;
        // $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $row_id,
            'qty' => $qty,
        );
        $this->cart->update($data);
        $this->session->set_flashdata('success', 'Successfully Added to Cart!');
        echo $this->view();
    }

    public function removecart()
    {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->view();
    }

    public function decart()
    {
        $this->load->library("cart");
        $row_id = $_GET["row_id"];
        $qty = $_GET["qty"] - 1;
        // $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $row_id,
            'qty' => $qty,
        );
        $this->cart->update($data);
        echo $this->view();
        redirect(WEB_URL . 'cart');
    }

    public function upcart()
    {
        $this->load->library("cart");
        $row_id = $_GET["row_id"];
        $qty = $_GET["qty"] + 1;
        // $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $row_id,
            'qty' => $qty,
        );
        $this->cart->update($data);
        echo $this->view();
        redirect(WEB_URL . 'cart');
    }

    public function clear()
    {
        $this->load->library("cart");
        $this->cart->destroy();
        //echo $this->view();
        redirect(WEB_URL);
    }

    public function load()
    {
        echo $this->view();
    }

    public function view()
    {
        $this->load->library("cart");
        $output = '';

        $output .= '
			<i class="w-icon-cart">
				<span class="cart-count"> ' . $this->cart->total_items() . '</span>
			</i>';
		// dd($output);
		// die;
        return $output;
    }

    public function categoryProduct($slug)
    {
        $data['catId'] = $this->home_model->selectCategoryId(array('slug' => $slug));
        $data['headerLogo'] = $this->home_model->getHeaderLogo();
        $data['footerLogo'] = $this->home_model->getFooterLogo();
        $data['fav_Icon'] = $this->home_model->getFavicon();
        $data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
        $data['pagesList'] = $this->home_model->getAllPagesList(array('limit' => 4));
        $data['productByCategory'] = $this->home_model->getProductbyCat(array('category_id' => $data['catId']));
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

        $data['pvalue'] = array('view' => 'category_view', 'pgTitle' => 'Category Page');
        $this->loadView($data);
    }

    public function buyNow()
    {
        $_GET = getDecryptArray($_GET);
        $id = (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0;
        $data['productDetails'] = $this->home_model->getProductDetails(array('id_product' => $id));
        if (is_array($data['productDetails']) && count($data['productDetails']) == 0) {
            redirect(WEB_URL);
        }
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
            if ($this->form_validation->run('order_form') == true) {
                $response = $this->home_model->order($_POST);
                $this->setSuccessFailMessage($response);
                if ($response['status'] == STATUS_SUCCESS) {
                    redirect(WEB_URL . 'home/buyNow?id=' . $id);
                }
            }
        }
        $data['pvalue'] = array('view' => 'details_view_two');
        $this->loadView($data);
    }

    /*public function buyNow()
    {
    $id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
    if($id==0){
    redirect(WEB_URL);
    }
    $data['productDetails'] = $this->home_model->getProductDetails(array('id_product'=>$id));
    if(is_array($data['productDetails']) && count($data['productDetails'])==0){
    redirect(WEB_URL);
    }
    if(isset($_POST['submit']) && $_POST['submit']=='submit'){
    if ($this->form_validation->run('order_form') == TRUE) {
    $response = $this->home_model->order($_POST);
    $this->setSuccessFailMessage($response);
    if($response['status']==STATUS_SUCCESS) {
    redirect(WEB_URL . 'home/buyNow?id='.$id);
    }
    }
    }
    $data['pvalue'] = array('view'=>'details_view_two');
    $this->loadView($data);
    }*/

    public function subscribe()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $data = array(

            'email' => $this->input->post('email'),
            'ip_address' => $ip,
            'created_at' => getCurrentDateTime(),
        );
        $this->load->model('home_model');
        $result = $this->home_model->addEmailSubscribe($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

//End
}