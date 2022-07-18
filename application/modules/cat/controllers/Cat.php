<?php

class Cat extends Frontcontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('cat_model');
		$this->load->library('ajax_pagination'); 
		$this->load->library('cart');
		// Per page limit 
        $this->perPage = 10;
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
	}
/*
$c=$this->uri->segment(3)
	include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT id FROM categories where slug='$c' limit 1";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($catid);	
    while ($stmt->fetch()) {	
	
        		}  
}*/
	function cats(){
		$this->load->model('categories/category_model','category_model');
		$this->load->model('home/home_model','home_model');
		// 'category_id'=>$cat
		$cat=$this->uri->segment(3);
		$subcat=$this->uri->segment(4);
		
		$data['catID'] = $this->cat_model->getCatId();
		$data['subcatID'] = $this->cat_model->getSubCatId();
		$data['childcatID'] = $this->cat_model->getChildCatId();
		$data['productAllcategory'] = $this->cat_model->getAllProdByCat(array('category_id'=>$data['catID'],'subcategory_id'=>$data['subcatID'],'childcategory_id'=>$data['childcatID']));
		// $data['product_brand'] = $this->category_model->get_product_brand();
		// $data['product_category'] = $this->category_model->get_product_category();
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['fav_Icon'] = $this->home_model->getFavicon();
		// $data['catID'] = $this->home_model->getCatId();
		$data['allCategory'] = $this->home_model->getAllCategory(array('limit'=>5));
		$data['allCategories'] = $this->home_model->getAllCategories(array('limit'=>8));
		$data['pagesList'] = $this->home_model->getAllPagesList(array('limit'=>4));
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
		
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		
		$data['pvalue'] = array('view'=>'category_view','pgTitle'=>'Category');
		$this->loadView($data);
	}
	
	public function catDetails()
	{	
		$cat = (isset($_GET['cat']) && $_GET['cat'] > 0)?$_GET['cat']:0;
		$this->load->model('categories/category_model','category_model');
		$this->load->model('home/home_model','home_model');
		// 'category_id'=>$cat
		$cat=$this->uri->segment(2);
		$data['productAllcategory'] = $this->cat_model->getAllProdByCat(array('category_id'=>$cat));
		// $data['product_brand'] = $this->category_model->get_product_brand();
		// $data['product_category'] = $this->category_model->get_product_category();
		$data['cartItems'] = $this->cart->contents();
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['companyAddress'] = $this->home_model->getCompanyAddressDetails(array());
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['category'] = $this->category_model->getAllProductas(array('category_id'=>$cat));
		// $data['category'] = $this->category_model->getAllProductas(array('limit'=>4));
		$data['productsbycategory'] = $this->category_model->NestedProducts();
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
		$data['pvalue'] = array('view'=>'category_view','pgTitle'=>'Category');
		$this->loadView($data);
	}
	
	
}

	
//End

?>
