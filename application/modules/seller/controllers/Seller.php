<?php

class Seller extends Sellercontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('seller_model');
	}

	function index(){
		redirect(WEB_URL.'seller/sellerDashboard');
	}
	
	function sellerDashboard()
	{
		$data['totalSellerProduct'] = $this->seller_model->getTotalSellerProduct();
		$data['totalPendingOrder'] = $this->seller_model->getTotalPendingOrder();
		$data['totalApprovedOrder'] = $this->seller_model->getTotalApprovedOrder();
		$data['totalShippedOrder'] = $this->seller_model->getTotalShippedOrder();
		$data['totalDeliveredOrder'] = $this->seller_model->getTotalDeliveredOrder();
		$data['totalCancelReqOrder'] = $this->seller_model->getTotalCancelReqOrder();
		$data['totalCancelledOrder'] = $this->seller_model->getTotalCancelledOrder();
		$data['totalSellItem'] = $this->seller_model->getTotalsellItem();
		$data['totalEarnings'] = $this->seller_model->getTotalEarnings();
		$data['totalProfits'] = $this->seller_model->getTotalProfitOfSeller();
		$data['pvalue'] = array('view'=>'seller_dashboard_view','page_heading'=>'Seller Dashboard');
		$this->loadView($data);
	}
	function pendingOrder(){
		$data['getAllPendingOrder'] = array();
		$data['pvalue'] = array('view'=>'pending_list_view','page_heading'=> 'Pending Order');
		$this->loadView($data);
	}
	function approvedOrder(){
		$data['getAllApprovedOrder'] = array();
		$data['pvalue'] = array('view'=>'approved_list_view','page_heading'=> 'Approved Order');
		$this->loadView($data);
	}
	function shippedOrder(){
		$data['getAllShippedOrder'] = array();
		$data['pvalue'] = array('view'=>'shipped_list_view','page_heading'=> 'Shipped Order');
		$this->loadView($data);
	}
	function deliveredOrder(){
		$data['getAllDeliveredOrder'] = array();
		$data['pvalue'] = array('view'=>'delivered_list_view','page_heading'=> 'Delivered Order');
		$this->loadView($data);
	}
	function cancelRequestOrder(){
		$data['getAllCancelRequestOrder'] = array();
		$data['pvalue'] = array('view'=>'cancel_request_list_view','page_heading'=> 'Cancellation Request Order');
		$this->loadView($data);
	}
	function cancelledOrder(){
		$data['getAllCancelledOrder'] = array();
		$data['pvalue'] = array('view'=>'cancelled_list_view','page_heading'=> 'Cancelled Order');
		$this->loadView($data);
	}
	
	public function orderdetails($id){
		 $id = $this->uri->segment(3);
		 // print_r($id);
		 // die;
		$data = array(); 
        $data['OrderDetails'] = $this->seller_model->getOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->seller_model->letsCountorderId(array('id'=>$id));
		$data['OrderProduct'] = $this->seller_model->getAllOrderedProduct(array('orderid'=>$id));
		// if($data['totalOrder_id']!='1')
            // {
                // redirect(WEB_URL.'seller/pendingOrder?ref=wrong_order_id');
            // }
		$data['pvalue'] = array('view'=>'orderdetails_view_details','page_heading'=>'Order Details');
		$this->loadView($data);
         
    }
	public function invoice($id){
		$id = decrypt_url($id);
		$data = array();
		$data['invoiceLogo'] = $this->seller_model->getInvoiceLogo();
		$data['OrderDetails'] = $this->seller_model->getOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->seller_model->letsCountorderId(array('id'=>$id));
		$data['OrderProduct'] = $this->seller_model->getAllOrderedProduct(array('orderid'=>$id));
		if($data['totalOrder_id']!='1')
            {
                redirect(WEB_URL.'seller/pendingOrder?ref=wrong_order_id');
            }
		$this->load->view('invoice_view', $data);
         
    }
	public function viewInvoice($id){
		// $id = decrypt_url($id);
		$id = decrypt_url($this->uri->segment(3));
		 // print_r($id);
		// die;
		// $id = decrypt_url($id);
		$data = array();
		$data['invoiceLogo'] = $this->seller_model->getInvoiceLogo();
		$data['details'] = $this->seller_model->getInvoiceDetails(array('id'=>$id));
		//$data['totalOrder_id'] = $this->seller_model->letsCountorderId(array('id'=>$id));
		//$data['OrderProduct'] = $this->seller_model->getAllOrderedProduct(array('orderid'=>$id));
		// if($data['totalOrder_id']!='1')
            // {
                // redirect(WEB_URL.'order/pendingOrder?ref=wrong_order_id');
            // }
		$this->load->view('bill_view', $data);
         
    }
	function updatePendingStatus($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'delivery_status'=>2
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_ORDER_DETAILS,$data)){
			
			// $session_user_id=$this->session->userdata('userId');
	include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT orderid FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderid);	
    while ($stmt->fetch()) {	
	
        		}  
}
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT user_id FROM myorder where id='$orderid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_user_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name);	
    while ($stmt->fetch()) {	
	
        		}  
}
			$phones=$customer_Mobile;
			
			$msg='Dear '.$first_name.' , Microsoet Team team says that your order has been approved.
Order id : '.$customer_Mobile.'
Order amount : Rs '.$customer_Mobile.'
Regards - New Microsoet Computer';	

  
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&PEID=1001541570000044395&templateid=1007163832885535095");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);

			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/approvedOrder?i='.$customer_Mobile);
		return $response;
	}
	
	function updateDeclineStatus($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'delivery_status'=>6
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_ORDER_DETAILS,$data)){
			
			// $session_user_id=$this->session->userdata('userId');
	include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT orderid FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderid);	
    while ($stmt->fetch()) {	
	
        		}  
}
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT user_id FROM myorder where id='$orderid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_user_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name);	
    while ($stmt->fetch()) {	
	
        		}  
}
			$phones=$customer_Mobile;
			
			$msg='Dear '.$first_name.' , Microsoet Team team says that your order has been approved.
Order id : '.$customer_Mobile.'
Order amount : Rs '.$customer_Mobile.'
Regards - New Microsoet Computer';	

  
// $url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&PEID=1001541570000044395&templateid=1007163832885535095");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);

			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/cancelledOrder?i='.$customer_Mobile);
		return $response;
	}
	
	function updateApprovedStatus($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'delivery_status'=>3
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_ORDER_DETAILS,$data)){
			include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT orderid FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderid);	
    while ($stmt->fetch()) {	
	
        		}  
}
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT user_id FROM myorder where id='$orderid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_user_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name);	
    while ($stmt->fetch()) {	
	
        		}  
}
			$phones=$customer_Mobile;
			

$msg="Hello ".$first_name.", We thought you'd like to know that we've dispatched your item(s). Your order is on the way. If you need to manage your orders please visit Your U-Baazar Account. Regards – UBaazar";	

  
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163835077925104");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
			
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/shippedOrder');
		return $response;
	}
	
	function updateShippedStatus($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'delivery_status'=>4
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_ORDER_DETAILS,$data)){
			
			include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT orderid FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderid);	
    while ($stmt->fetch()) {	
	
        		}  
}
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT user_id FROM myorder where id='$orderid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_user_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT product_id FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($product_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT name FROM products where id='$product_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($productName);	
    while ($stmt->fetch()) {	
	
        		}  
}
			$phones=$customer_Mobile;
			


 $msg="Hello ".$first_name.",
 We’re writing to let you know that your package containing (".$productName.") has been successfully delivered.
 Regards – UBaazar";
 
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163835049521189");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/deliveredOrder');
		return $response;
	}
	function updateCancellationStatus($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'delivery_status'=>6
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_ORDER_DETAILS,$data)){
			
			include('./db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT orderid FROM orderdetails where id='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderid);	
    while ($stmt->fetch()) {	
	
        		}  
}
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT user_id FROM myorder where id='$orderid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_user_id);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$customer_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($first_name);	
    while ($stmt->fetch()) {	
	
        		}  
}
			$phones=$customer_Mobile;
$msg = 'Hello '.$first_name.', We are writing to let you know that your order has been successfully cancelled.
To know more go to Your UBaazar Account.
Regards – UBaazar';
  
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163835012654869");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/cancelledOrder');
		return $response;
	}
	
	function get_brand_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'categories/get_brand_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllBrand($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllBrand'] = $this->seller_model->getAllBrand($postVal);
		$this->load->view('brand_list_ajax_view',$data);
	}
	
	function get_pending_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_pending_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllPendingOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllPendingOrder'] = $this->seller_model->getAllPendingOrder($postVal);
		$this->load->view('pending_list_ajax_view',$data);
	}
	
	function get_approved_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_approved_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllApprovedOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllApprovedOrder'] = $this->seller_model->getAllApprovedOrder($postVal);
		$this->load->view('approved_list_ajax_view',$data);
	}
	
	function get_shipped_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_shipped_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllShippedOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllShippedOrder'] = $this->seller_model->getAllShippedOrder($postVal);
		$this->load->view('shipped_list_ajax_view',$data);
	}
	
	function get_delivered_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_delivered_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllDeliveredOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllDeliveredOrder'] = $this->seller_model->getAllDeliveredOrder($postVal);
		$this->load->view('delivered_list_ajax_view',$data);
	}
	
	function get_cancel_request_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_cancel_request_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllCancelRequestOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllCancelRequestOrder'] = $this->seller_model->getAllCancelRequestOrder($postVal);
		$this->load->view('cancellation_request_ajax',$data);
	}

	function get_cancelled_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_cancelled_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllCancelledOrder($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllCancelledOrder'] = $this->seller_model->getAllCancelledOrder($postVal);
		$this->load->view('cancelled_ajax_view',$data);
	}

	
	
	function showProduct()
	{
		$data['pvalue'] = array('view'=>'productdata_view','page_heading'=>'All Products');
		$this->loadView($data);
	}
	function countProductIdFromVendor($pid)
	{
		include('db.php');
					$pid=$row['id'];
		$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) from vendor_product where pid='$pid'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($CountPidInSellerStock);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();
	return $CountPidInSellerStock;
	}
	function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('seller_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->seller_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>ID</th>
       <th>Product Name</th>
       <th>MRP</th>
       <th>Admin&nbsp;Price</th>
        
       <th>Action</th>
        
      </tr>
  ';
  if($data->num_rows() > 0)
  {
	  $s=1;
   foreach($data->result() as $row)
   {
	   //$CountPidInSellerStock=countProductIdFromVendor($row->id);
    // 
		include('db.php');
					$pid=$row->id;
		$con = new mysqli($servername, $username, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) from vendor_product where pid='$pid' and vendor_id='$this->sellerId'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($CountPidInSellerStock);	
    while ($stmt->fetch()) {	
	
        		}  
}
$stmt->close();
$con->close();
if($CountPidInSellerStock=='0')
	{
	$output .= '
      <tr>
       <td>'.$row->id.'</td>
       <td>'.$row->name.'</td>
       <td>Rs '.getNumberFormat($row->previous_price).'</td>
       <td>Rs '.getNumberFormat($row->price).'</td>
       <td><a style="color:#fff;" href="'.WEB_URL.'seller/addproduct?pid='.$row->id.'"><button type="button" name="update" id="'.$row->id.'" class="btn btn-info btn-xs">Add&nbsp;Product</a></td>
      </tr>
    ';
	 }
	 $s=$s+1;
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }
	
	function productslist(){
		$data['getAllSellerProduct'] = array();
		$data['pvalue']=array('view'=>'list_view','page_heading'=>'Product List');
		$this->loadView($data);
	}
	function lowstock(){
		$data['getLowStockProduct'] = array();
		$data['pvalue']=array('view'=>'lowstock_list_view','page_heading'=>'Low Stock List');
		$this->loadView($data);
	}
	
	function inactiveproduct(){
		$data['getInactiveSellerProduct'] = array();
		$data['pvalue']=array('view'=>'inactive_list_view','page_heading'=>'In Active List');
		$this->loadView($data);
	}
	function get_seller_inactiveproduct_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_seller_inactiveproduct_ajax_list';
		$config['total_rows'] = $this->seller_model->getInactiveSellerProduct($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getInactiveSellerProduct'] = $this->seller_model->getInactiveSellerProduct($postVal);
		$this->load->view('inactivelist_ajax_view',$data);
	}
	
	function get_seller_product_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_seller_product_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllSellerProduct($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllSellerProduct'] = $this->seller_model->getAllSellerProduct($postVal);
		$this->load->view('list_ajax_view',$data);
	}
	
	function get_low_stock_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_low_stock_ajax_list';
		$config['total_rows'] = $this->seller_model->getLowStockProduct($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getLowStockProduct'] = $this->seller_model->getLowStockProduct($postVal);
		$this->load->view('low_stock_list_ajax_view',$data);
	}
	
	function allproducts(){
		// $pid = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['getAllProductList'] = array();
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			//if ($this->form_validation->run('add_vendor_product') == TRUE) {
				$response = $this->seller_model->uploadSellerProduct($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'seller/allproducts');
				}
			//}
		}
		$data['pvalue'] = array('view'=>'prdouct_list_view','page_heading'=> 'Product List');
		$this->loadView($data);
	}

	function get_product_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');
		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'seller/get_product_ajax_list';
		$config['total_rows'] = $this->seller_model->getAllProductList($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllProductList'] = $this->seller_model->getAllProductList($postVal);
		$this->load->view('product_list_ajax_view',$data);
	}

	public function delete($id)
	{
		$this->db->delete('vendor_product', array('id' => $id));
		echo 'Deleted successfully.';
	}
	
	public function activeProduct($id)
	{
		$data=array('status'=>2);
		$this->db->where(array('id'=>$id));
		$this->db->update('vendor_product',$data);
		echo 'Updated successfully.';
	}
	
	public function activeProducts($id)
	{
		$data=array('status'=>2);
		$this->db->where(array('id'=>$id));
		$this->db->update('vendor_product',$data);
		echo 'Deleted successfully.';
	}
	
	function searchproduct()
	{
		$data['pvalue'] = array('view'=>'search_product_list_view','page_heading'=>'Search Product');
		$this->loadView($data);
	}
	
	function searchproductsList(){
     $postData = $this->input->post();
	$data = $this->seller_model->getProductsListforSeller($postData);

     echo json_encode($data);
	}
	
	function addproduct()
	{
		// $id = decrypt_url($_GET['pid']);
		$id = $_GET['pid'];
		$id = (isset($id) && $id > 0)?$id:0;
		$data['row'] = $this->seller_model->getProductDetails(array('id'=>$id));
		$data['vendor_product_row'] = $this->seller_model->getVendorProductDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_vendor_product') == TRUE) {
				$response = $this->seller_model->uploadSellerProduct($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					// redirect(WEB_URL . 'seller/searchproduct');
					redirect(WEB_URL . 'seller/showProduct');
				}
			}
		}
		if(isset($_POST['update']) && $_POST['update']=='update'){
			if ($this->form_validation->run('edit_vendor_product') == TRUE) {
				$response = $this->seller_model->updateSellerProduct($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'seller/showProduct');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_product_seller','page_heading'=>'Add Product');
		$this->loadView($data);
	}
	
	function updateStatusactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>2
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_VENDOR_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/productlist');
		return $response;
	}
	
	function updateStatusdeactive($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$pid=$_GET['id'];
		$data = array(
		'status'=>1
		);
		$this->db->where('id',$pid);
		if($this->db->update(TBL_VENDOR_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('seller/inactiveproduct');
		return $response;
	}
	
	function edit()
	{
		$id = $_GET['pid'];
		//$id = (isset($id) && $id > 0)?$id:0;
		$data['row'] = $this->seller_model->getProductDetails(array('id'=>$id));
		$data['vendor_product_row'] = $this->seller_model->getVendorProductDetails(array('id'=>$id));
		if(isset($_POST['update']) && $_POST['update']=='update'){
			if ($this->form_validation->run('edit_vendor_product') == TRUE) {
				$response = $this->seller_model->updateSellerProduct($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'seller/productslist');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_product_seller','page_heading'=>'Edit Product');
		$this->loadView($data);
	}
	function pid_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'id' => $str 
            ) 
        ); 
        $checkProductId = $this->seller_model->getProductsRows($con); 
        if($checkProductId <= 0){ 
            $this->form_validation->set_message('pid_check', 'The given Product Id does not exist.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    }
	
	function profile()
	{
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_seller_profile') == TRUE) {
				$response = $this->seller_model->updateSellerDetails($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'seller/profile');
				}
			}
		}
		$data['totalSellerProduct'] = $this->seller_model->getTotalSellerProduct();
		$data['totalSellerOrder'] = $this->seller_model->getTotalSellerOrder();
		$data['row'] = $this->seller_model->getSellerProfileDetails();
		$data['pvalue']  =array('view'=>'profile_view','page_heading'=>'Seller Profile');
		$this->loadView($data);
	}
	
//End
}
?>
