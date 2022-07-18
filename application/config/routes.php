<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
// $route['default_controller'] = 'adm/login';

$route['default_controller'] = 'home';
$route['aboutUs'] = 'home/about';
$route['same-day-delivery'] = 'home/sameDayDelivery';
$route['secure-payment'] = 'home/securePayment';
$route['money-back-guarantee'] = 'home/moneyBackGuarantee';
$route['free-shipping'] = 'home/freeShipping';
$route['browsecategories'] = 'home/allcategories';
$route['dailydeals'] = 'home/getDailyDeals';
$route['ask-question.html'] = 'contactus/contactPage';
$route['faq'] = 'contactus/faqView';
$route['blog'] = 'home/blog';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
$route['category-list/(:any)']['delete'] = "categories/all";
$route['category-list/(:any)']['delete'] = "categories/delete/$1";
//specify route for post details page
$route['post/(:any)'] = 'product/details/$1';
$route['editpost/(:any)'] = 'product/edit/$1';

$route['products/(:any)'] = 'home/productDetails/$1';
$route['pages/(:any)'] = 'home/pageDetails/$1';
$route['category'] = 'category/categoryDetails';
// $route['catss'] = 'cat/cats';

$route['search'] = 'search/searchDetails';
$route['subscription/(:any)'] = 'users/subscription/$1';

$route['login'] = 'users/login';
$route['register'] = 'users/register';
$route['myaccount'] = 'users/account';
$route['logout'] = 'users/logout';
$route['sellerlogout'] = 'users/sellerlogout';
$route['selectplan'] = 'users/selectplan';
$route['shop'] = 'filter/index';
$route['shops'] = 'shop/index';
// $route['search'] = 'home/search';
$route['cart.html'] = 'cart';
$route['mypdf'] = "welcome/mypdf";
//$route['category'] = 'home/categoryProduct';
$route['products'] = 'product_filter/productFilter';
$route['rana'] = 'product_rana/productFilter';
//$route['category/(:any)'] = 'home/categoryProduct/$1';
$route['gallery/(:any)'] = 'product/gallery/$1';
$route['404_override'] = 'default_page';
$route['distributor-register'] = 'users/distributorRegister';
$route['distributor-login'] = 'users/distributorLogin';
$route['distributor-verification'] = 'users/distributorVerification';
$route['distributor/dashboard'] = 'distributor/distributorDashboard';
$route['distributorlogout'] = 'distributor/distributorlogout';
$route['manage-application-amount'] = 'generalsettings/manageapplicationamount';