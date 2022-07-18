<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Sellerorder extends Sellercontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
	}
	
	
	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
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
		 $id = decrypt_url($id);
		$data = array(); 
        $data['OrderDetails'] = $this->order_model->getOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->order_model->letsCountorderId(array('id'=>$id));
		$data['OrderProduct'] = $this->order_model->getAllOrderedProduct(array('orderid'=>$id));
		if($data['totalOrder_id']!='1')
            {
                redirect(WEB_URL.'order/pendingOrder?ref=wrong_order_id');
            }
		$data['pvalue'] = array('view'=>'orderdetails_view_details','page_heading'=>'Order Details');
		$this->loadView($data);
         
    }
	public function invoice($id){
		$id = decrypt_url($id);
		$data = array();
		$data['invoiceLogo'] = $this->order_model->getInvoiceLogo();
		$data['OrderDetails'] = $this->order_model->getOrderDetails(array('id'=>$id));
		$data['totalOrder_id'] = $this->order_model->letsCountorderId(array('id'=>$id));
		$data['OrderProduct'] = $this->order_model->getAllOrderedProduct(array('orderid'=>$id));
		if($data['totalOrder_id']!='1')
            {
                redirect(WEB_URL.'order/pendingOrder?ref=wrong_order_id');
            }
		$this->load->view('invoice_view', $data);
         
    }
	public function viewInvoice($id){
		$id = decrypt_url($id);
		$data = array();
		$data['invoiceLogo'] = $this->order_model->getInvoiceLogo();
		$data['details'] = $this->order_model->getInvoiceDetails(array('id'=>$id));
		//$data['totalOrder_id'] = $this->order_model->letsCountorderId(array('id'=>$id));
		//$data['OrderProduct'] = $this->order_model->getAllOrderedProduct(array('orderid'=>$id));
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
// curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&PEID=1001541570000044395&templateid=1007163832885535095");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);

			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('order/approvedOrder?i='.$customer_Mobile);
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
			
			// $msg='Dear '.$first_name.' , Microsoet Team team says that your order has been approved.
// Order id : '.$customer_Mobile.'
// Order amount : Rs '.$customer_Mobile.'
// Regards - New Microsoet Computer';

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
		redirect('order/shippedOrder');
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
			
			// $msg='Dear '.$first_name.' , Microsoet Team team says that your order has been approved.
// Order id : '.$customer_Mobile.'
// Order amount : Rs '.$customer_Mobile.'
// Regards - New Microsoet Computer';	

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
		redirect('order/deliveredOrder');
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
			
			$msg='Dear '.$first_name.' , Microsoet Team team says that your order has been approved.
Order id : '.$customer_Mobile.'
Order amount : Rs '.$customer_Mobile.'
Regards - New Microsoet Computer';	

  
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=newmicrosoet&password=363073&sender=NMCPUR&sendto=".$phones."&type=3&message=".$msg."&PEID=1201162953204307943&templateid=1207163041696233583");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		redirect('order/cancelledOrder');
		return $response;
	}
	
	function allbrand(){
		$data['getAllBrand'] = array();
		$data['pvalue'] = array('view'=>'brand_list_view','page_heading'=> 'Brand');
		$this->loadView($data);
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
		$config['total_rows'] = $this->order_model->getAllBrand($postVal);
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
		$data['getAllBrand'] = $this->order_model->getAllBrand($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_pending_ajax_list';
		$config['total_rows'] = $this->order_model->getAllPendingOrder($postVal);
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
		$data['getAllPendingOrder'] = $this->order_model->getAllPendingOrder($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_approved_ajax_list';
		$config['total_rows'] = $this->order_model->getAllApprovedOrder($postVal);
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
		$data['getAllApprovedOrder'] = $this->order_model->getAllApprovedOrder($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_shipped_ajax_list';
		$config['total_rows'] = $this->order_model->getAllShippedOrder($postVal);
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
		$data['getAllShippedOrder'] = $this->order_model->getAllShippedOrder($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_delivered_ajax_list';
		$config['total_rows'] = $this->order_model->getAllDeliveredOrder($postVal);
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
		$data['getAllDeliveredOrder'] = $this->order_model->getAllDeliveredOrder($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_cancel_request_ajax_list';
		$config['total_rows'] = $this->order_model->getAllCancelRequestOrder($postVal);
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
		$data['getAllCancelRequestOrder'] = $this->order_model->getAllCancelRequestOrder($postVal);
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
		$config['base_url'] = WEB_URL . 'order/get_cancelled_ajax_list';
		$config['total_rows'] = $this->order_model->getAllCancelledOrder($postVal);
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
		$data['getAllCancelledOrder'] = $this->order_model->getAllCancelledOrder($postVal);
		$this->load->view('cancelled_ajax_view',$data);
	}

	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_category') == TRUE) {
				$response = $this->order_model->addCategory($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add Category');
		$this->loadView($data);
	}
	
	function addbrand(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_brand') == TRUE) {
				$response = $this->order_model->addedNewBrand($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/allbrand');
				}
			}
		}
		$data['pvalue'] = array('view'=>'brand_add_view','page_heading'=>'Add Brand');
		$this->loadView($data);
	}

	public function delete($id)
	{
		$this->db->delete('categories', array('id' => $id));
		echo 'Deleted successfully.';
	}
	public function deletebrand($id)
	{
		$this->db->delete('brand_filter', array('id' => $id));
		echo 'Deleted successfully.';
	}

	function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->order_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_category') == TRUE) {
				$response = $this->order_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/all');
				}
			}
		}
		if(isset($_POST['updatepicture']) && $_POST['updatepicture']=='updatepicture'){
			// if ($this->form_validation->run('edit_pic_category') == TRUE) {
				$response = $this->order_model->updateCatPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/all');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit Category');
		$this->loadView($data);
	}
	function editbrand(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->order_model->getBrandDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('edit_brand') == TRUE) {
				$response = $this->order_model->updateBrand($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/allbrand');
				}
			}
		}
		if(isset($_POST['updatebrandpicture']) && $_POST['updatebrandpicture']=='updatebrandpicture'){
			// if ($this->form_validation->run('edit_pic_category') == TRUE) {
				$response = $this->order_model->updateBrandPicture($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'categories/allbrand');
				}
			// }
		}
		$data['pvalue'] = array('view'=>'brand_edit_view','page_heading'=>'Edit Brand');
		$this->loadView($data);
	}
//End
}
?>
