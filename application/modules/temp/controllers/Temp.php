<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Temp extends Admincontroller{
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function listT(){
		$data['pvalue'] = array('view'=>'list_view','page_heading'=>'List');
		$this->loadView($data);
	}

	function tForm(){
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add');
		$this->loadView($data);
	}
//End
}
?>
