<?php

class Users_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		$this->table = 'users'; 
		$this->distributortable = 'distributor'; 
	}
	public function checkDuplicate($table,$fildname,$data) {
        $this->db->where($fildname, $data);
        $query = $this->db->get($table);
        $count_row = $query->num_rows();
        if ($count_row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function countCustomerAddress(){
        $total = 0;
        $fields = "count(a.id) as totalCustomerAddress";
        $this->db->select($fields);
        $this->db->from(TBL_CUSTOMER_ADDRESS.' a');
        $this->db->where('user_id',$this->session->userdata('userId'));
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $row = $query->row_array();
            $total = $row['totalCustomerAddress'];
        }
        return $total;
    }
	
	function getAddressDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function update_address($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'fullname'=>$postVal['name'],
		'mobile'=>$postVal['mobile'],
		'address'=>$postVal['address'],
		'state'=>$postVal['state'],
		'city'=>$postVal['city'],
		'pin'=>$postVal['pin'],
		'house_no'=>$postVal['house_no'],
		'address_type'=>$postVal['address_type'],
		'delivery_time'=>$postVal['delivery_time'],
		'created_at'=>date('d-m-Y'),
		'landmark'=>$postVal['landmark']);
		$this->db->where('user_id',$this->session->userdata('userId'));
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_CUSTOMER_ADDRESS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Address Updated successfully!');
		}
		return $response;
	}
	
	function addAddress($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'fullname'=>$postVal['name'],
		'mobile'=>$postVal['mobile'],
		'address'=>$postVal['address'],
		'state'=>$postVal['state'],
		'city'=>$postVal['city'],
		'pin'=>$postVal['pin'],
		'user_id'=>$this->session->userdata('userId'),
		'house_no'=>$postVal['house_no'],
		'address_type'=>$postVal['address_type'],
		'delivery_time'=>$postVal['delivery_time'],
		'created_at'=>date('d-m-Y'),
		'landmark'=>$postVal['landmark']);
		if($this->db->insert(TBL_CUSTOMER_ADDRESS,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Address Added Successfully');
		}
		return $response;
	}
	
	function getAllSubscription($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SUBSCRIPTION.' a');
		// $this->db->order_by('id','DESC');
		$this->db->order_by('id', 'ASC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	function getSubscriptionPlanDetails($params = array()){
		
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SUBSCRIPTION.' a');
		//set start and limit
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
		if(array_key_exists("id", $params)){
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
		}else{
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		//return fetched data
		return $result;
	}
	function getAllUserAddress($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		$this->db->where('user_id',$this->session->userdata('userId'));
		$this->db->order_by('id', 'DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	
	function getAllOrderedProduct($postVal=array())
	{
		$result = array();
		$fields = "a.*,b.name as product_name,b.photo,s.shop_name";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_PRODUCT.' b','a.product_id=b.id','inner');
		$this->db->join(TBL_SELLER.' s','a.seller_id=s.id','inner');
		$this->db->where('orderid',$postVal['orderid']);
		$this->db->order_by('a.id', 'DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	
	public function orderList($limit,$offset)
	  {
		$id=$this->session->userdata('userId');
		$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,d.photo as product_photo";
		$q=$this->db->select($fields)
			->from(TBL_ORDER_DETAILS.' a')
			->join(TBL_ORDERS.' b','a.orderid=b.id','left')
			->join(TBL_USER.' c','b.user_id=c.id_user','left')
			->join(TBL_PRODUCT.' d','a.product_id=d.id','left')
			// $q=$this->db->select()
            // ->from('myorder')
			->where(['b.user_id'=>$id])
			->order_by('a.id','DESC')
			->limit($limit,$offset)
			->get();
		   return $q->result();
	  }
  
  public function num_rows()
  {
	$id=$this->session->userdata('userId');
	$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
    $q=$this->db->select()
            ->from(TBL_ORDER_DETAILS.' a')
			->join(TBL_ORDERS.' b','a.orderid=b.id','left')
			->join(TBL_USER.' c','b.user_id=c.id_user','left')
			->join(TBL_PRODUCT.' d','a.product_id=d.id','left')
            ->where(['b.user_id'=>$id])
            ->get();
           return $q->num_rows();

  }
  
  function getAllOrder($limit,$offset)
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_ORDERS.' a');
		$this->db->where('user_id',$this->session->userdata('userId'));
		$this->db->limit($limit,$offset);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getOrderDetails($params = array()){
		$fields = "a.*,b.fullname as user_name,b.mobile,b.house_no,b.address,b.landmark,b.city,b.pin,b.state,b.address_type";
		$this->db->select($fields);
		$this->db->from(TBL_ORDERS.' a');
		$this->db->join(TBL_CUSTOMER_ADDRESS.' b','a.address_id=b.id','left');
		//set start and limit
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
		if(array_key_exists("id", $params)){
			$this->db->where('a.id', $params['id']);
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
		}else{
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		//return fetched data
		return $result;
	}
	
	
	
	function getOrderedProduct($params = array()){
		$fields = "a.*,b.name as product_name,b.photo,s.shop_name";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_PRODUCT.' b','a.product_id=b.id','inner');
		$this->db->join(TBL_SELLER.' s','a.seller_id=s.id','inner');
		//set start and limit
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
		if(array_key_exists("orderid", $params)){
			$this->db->where('orderid', $params['orderid']);
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
		}else{
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		//return fetched data
		return $result;
	}
	
	function letsCountorderId($params = array()){
            $total = 0;
            $fields = "count(a.id) as totalOrder_id";
            $this->db->select($fields);
            $this->db->from(TBL_ORDERS.' a');
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
				}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
				}
			if(array_key_exists("id", $params)){
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['totalOrder_id'];
            }
		}else{
			$query = $this->db->get();
			if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['totalOrder_id'];
            }
		}
            return $total;
    }
	
	function selectorderId($params = array()){
            $total = 0;
            $fields = "a.orderid";
            $this->db->select($fields);
            $this->db->from(TBL_ORDER_DETAILS.' a');
			if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
				}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
				}
			if(array_key_exists("orderid", $params)){
			$this->db->where('orderid', $params['orderid']);
			$query = $this->db->get();
			if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['totalOrder_id'];
            }
		}else{
			$query = $this->db->get();
			if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['totalOrder_id'];
            }
		}
            return $total;
    }
	
	function getUserRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table);  
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id_user", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id_user'])){ 
                    $this->db->where('id_user', $params['id_user']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id_user', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
	
	function getSellerRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->sellertable);  
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    }
	
	 public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'mobile_no' => $str 
            ) 
        ); 
        $checkEmail = $this->user->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('mobile', 'The given mobile already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
	
	 public function insert($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created_at'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified_at'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->table, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
	
	 public function insertseller($data = array()) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created_at'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified_at'] = date("Y-m-d H:i:s"); 
            } 
             
            // Insert member data 
            $insert = $this->db->insert($this->sellertable, $data); 
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
	
	function getUsersDetails_old($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_USER.' a');
		$this->db->where(array('a.id_user'=>$this->session->userdata('userId')));
		$this->db->order_by('id_user', 'DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	
	function getUsersDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_USER.' a');
		$this->db->where(array('a.id_user'=>$this->session->userdata('userId')));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getSellerDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SELLER.' a');
		$this->db->where(array('a.id'=>$this->session->userdata('sellerId')));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	 function checkMobileNumber($postVal=array()){
            $total = 0;
            $fields = "count(a.id_user) as mobile";
            $this->db->select($fields);
            $this->db->from(TBL_USER.' a');
			$this->db->where(array('a.mobile_no'=>$postVal['mobile_no']));
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['mobile'];
            }
            return $total;
     }
	
	function add_user($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'first_name' => $_SESSION['first_name'],
				'last_name' => $_SESSION['last_name'],
				'mobile_no' => $_SESSION['mobile'],
				'password' => md5($_SESSION['password']),
				'gender' => $_SESSION['gender'],
				// 'id_user_type' => 3,
				'id_role' => 3,
				'created_at' => date('d-m-Y')
				);
		if($this->db->insert(TBL_USER,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Your account registration has been successful. Please login to your account.!');
		}
		return $response;
	}

	function getAllUser($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id_user) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_USER_NEW.' a');
		$this->db->order_by('id_user','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if(FALSE && $keyword){
				$this->db->like('a.name',$keyword,'both');
			}
		}
		if($postVal['count']){
			$q = $this->db->get();
			if($q->num_rows() > 0){
				$row = $q->row_array();
				$result = $row['totalCount'];
			}
		}else {
			$this->db->limit($postVal['limit'], $postVal['offset']);
			$query = $this->db->get();
			if($query->num_rows() > 0) {
				$result = $query->result_array();
			}
		}
		return $result;
	}
	function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}
	
	function sellorApply($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$SubscriptionStart=date('d-m-Y');
		$ExpiryDaye=date('d-m-Y', strtotime($SubscriptionStart. ' + 365 days'));
			$data = array(
			'subscription_id'=>$postVal['subscription_id'],
			'subscription_start'=>$SubscriptionStart,
			'vendor_status'=>3,
			'subscription_expiry'=>$ExpiryDaye,
			);
		$this->db->where('id',$postVal['userid']);
		$this->db->where('is_vendor',$postVal['is_vendor']);
		if($this->db->update(TBL_SELLER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Seller Account Activated Successfully!');
		}
		return $response;
	}
	
	function cancelOrder($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'cancel_time'=>getCurrentDateTime(),
			'cancel_reason'=>$postVal['cancel_reason'],
			'delivery_status'=>5
			);
		$this->db->where('id',$postVal['cancelid']);
		//$this->db->where('is_vendor',$postVal['is_vendor']);
		if($this->db->update(TBL_ORDERS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'You have requesed to cancel your order!');
		}
		return $response;
	}
	public function addDistributor($postVal=array())
	{
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		// $order_no = time().rand(111,999);
		$data = array(
			'name'=>$this->session->userdata('first_name').' '.$this->session->userdata('last_name'),
			// 'last_name'=>$this->session->userdata('last_name'),
			'mobile'=>$this->session->userdata('mobile_no'),
			'email'=>$this->session->userdata('email'),
			'state'=>$this->session->userdata('state'),
			'city'=>$this->session->userdata('city'),
			'user_type'=>$this->session->userdata('user_type'),
			'password'=>$this->session->userdata('password'),
			'amount'=>$postVal['amount'],
			'payment_id'=>$postVal['razorpay_payment_id'],
			'payment_status'=>2,
			'transaction_no' => time().rand(11,99).date('yd'),
			'receipt_no' => rand(11,99).date('yd'));
		if($this->db->insert(TBL_DISTRIBUTOR,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Address Updated successfully!');
		}
		return $response;
	}
	
	function getDistributorRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->distributortable);  
         
        if(array_key_exists("conditions", $params)){ 
            foreach($params['conditions'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || $params['returnType'] == 'single'){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('id', 'desc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    }
	
	
//End
}
?>