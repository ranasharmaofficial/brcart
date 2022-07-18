<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Product_rana extends Frontcontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_rana_model');
		$this->load->library('ajax_pagination'); 
		// Per page limit 
        $this->perPage = 6;
	}

	function index(){
		redirect(WEB_URL.'home');
	}

	function productFilter(){
		$this->load->model('home/home_model','home_model');
		$data = array(); 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->product_rana_model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('product_rana/ajaxPaginationData'); 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions = array( 
            'limit' => $this->perPage 
        ); 
        $data['posts'] = $this->product_rana_model->getRows($conditions); 
         
        // Load the list page view 
		$data['headerLogo'] = $this->home_model->getHeaderLogo();
		$data['footerLogo'] = $this->home_model->getFooterLogo();
		$data['fav_Icon'] = $this->home_model->getFavicon();
		$data['companyAddress'] = $this->product_rana_model->getCompanyAddressDetails(array());
		 $data['pvalue'] = array('view'=>'product_rana_view','page_heading'=>'List');
		$this->loadView($data);
	}
	
	 function ajaxPaginationData(){ 
        // Define offset 
        $page = $this->input->post('page'); 
        if(!$page){ 
            $offset = 0; 
        }else{ 
            $offset = $page; 
        } 
         
        // Set conditions for search and filter 
        $keywords = $this->input->post('keywords'); 
        $sortBy = $this->input->post('sortBy'); 
        if(!empty($keywords)){ 
            $conditions['search']['keywords'] = $keywords; 
        } 
        if(!empty($sortBy)){ 
            $conditions['search']['sortBy'] = $sortBy; 
        } 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->product_rana_model->getRows($conditions); 
         
        // Pagination configuration 
        $config['target']      = '#dataList'; 
        $config['base_url']    = base_url('product_rana/ajaxPaginationData'); 
       $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        $config['link_func']   = 'searchFilter'; 
         
        // Initialize pagination library 
        $this->ajax_pagination->initialize($config); 
         
        // Get records 
        $conditions['start'] = $offset; 
        $conditions['limit'] = $this->perPage; 
        unset($conditions['returnType']); 
        $data['posts'] = $this->product_rana_model->getRows($conditions); 
         
        // Load the data list view 
        $this->load->view('ajax-data', $data, false); 
		
    } 
}

	
//End

?>
