<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dropdowns extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('dropdown');
    }
    
    public function index(){
        $data['countries'] = $this->dropdown->getCountryRows();
        $this->load->view('dropdowns/index', $data);
    }
    
    public function getStates(){
        $states = array();
        $country_id = $this->input->post('country_id');
        if($country_id){
            $con['conditions'] = array('country_id'=>$country_id);
            $states = $this->dropdown->getStateRows($con);
        }
        echo json_encode($states);
    }
	public function getSubcategory(){
        $subcategory = array();
        $category_id = $this->input->post('category_id');
        if($category_id){
            $con['conditions'] = array('state_id'=>$category_id);
            $subcategory = $this->dropdown->getSubcategoryRows($con);
        }
        echo json_encode($subcategory);
    }

	public function getChildcategory(){
		$childcategory = array();
		$subcategory_id = $this->input->post('subcategory_id');
		if($subcategory_id){
			$con['conditions'] = array('subcategory_id'=>$subcategory_id);
			$childcategory = $this->dropdown->getChildcategoryRows($con);
		}
		echo json_encode($childcategory);
	}
	public function getAdminCommission(){
		$admincommission = array();
		$subcategory_id = $this->input->post('subcategory_id');
		if($subcategory_id){
			$con['conditions'] = array('subcategory_id'=>$subcategory_id);
			$admincommission = $this->dropdown->getAdCommsiionRows($con);
		}
		echo json_encode($admincommission);
	}
    
    public function getCities(){
        $cities = array();
        $state_id = $this->input->post('state_id');
        if($state_id){
            $con['conditions'] = array('state_id'=>$state_id);
            $cities = $this->dropdown->getCityRows($con);
        }
        echo json_encode($cities);
    }

}

?>
