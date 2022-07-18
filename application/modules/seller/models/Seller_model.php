<?php

class Seller_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getTotalSellerProduct(){
		$total = 0;
		$fields = "count(a.id) as totalSellerProduct";
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
		$this->db->where(array('vendor_id'=>$this->id));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalSellerProduct'];
		}
		return $total;
	}
	
	function getTotalSellerOrder(){
		$total = 0;
		$fields = "count(a.id) as TotalSellerOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['TotalSellerOrder'];
		}
		return $total;
	}
	function getTotalsellItem(){
		$total = 0;
		$fields = "count(a.id) as TotalSellItem";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['TotalSellItem'];
		}
		return $total;
	}
	function getTotalEarnings(){
		$total = 0;
		$fields = "sum(a.total_price) as TotalEarning";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['TotalEarning'];
		}
		return $total;
	}
	function getTotalProfitOfSeller(){
		$total = 0;
		$fields = "sum(a.seller_payable_amount) as TotalEarning";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['TotalEarning'];
		}
		return $total;
	}
	
	function getTotalPendingOrder(){
		$total = 0;
		$fields = "count(a.id) as totalPendingOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',1);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalPendingOrder'];
		}
		return $total;
	}
	
	function getTotalApprovedOrder(){
		$total = 0;
		$fields = "count(a.id) as totalApprovedOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',2);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalApprovedOrder'];
		}
		return $total;
	}
	function getTotalShippedOrder(){
		$total = 0;
		$fields = "count(a.id) as totalShippedOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',3);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalShippedOrder'];
		}
		return $total;
	}
	function getTotalDeliveredOrder(){
		$total = 0;
		$fields = "count(a.id) as totalDeliveredOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',4);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalDeliveredOrder'];
		}
		return $total;
	}
	function getTotalCancelReqOrder(){
		$total = 0;
		$fields = "count(a.id) as totalCancelReqOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',5);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalCancelReqOrder'];
		}
		return $total;
	}
	function getTotalCancelledOrder(){
		$total = 0;
		$fields = "count(a.id) as totalCancelledOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('delivery_status',6);
		$this->db->where('seller_id',$this->sellerId);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalCancelledOrder'];
		}
		return $total;
	}
	
	function fetch_data($query)
	{
	  $this->db->select("*");
	  $this->db->from("products");
	  if($query != '')
	  {
	   $this->db->like('name', $query);
	   $this->db->or_like('meta_tag', $query);
	  }
	  $this->db->order_by('id', 'DESC');
	  return $this->db->get();
	}
 
	
	
function getProductsListforSeller($postData=null){

     $response = array();
	 ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (name like '%".$searchValue."%' or sku like '%".$searchValue."%' or price like'%".$searchValue."%' ) ";
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
     $records = $this->db->get('products')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $records = $this->db->get('products')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('products')->result();
		$data = array();  
// $CountPidInSellerStock=countProductIdFromVendor($row['id']);          
		  foreach($records as $row)  
           {
            include('db.php');
					$pid=$row->id;
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

            //$CountPidInSellerStock=$row->id;
			if($CountPidInSellerStock=='0')
	{
			$sub_array = array();  
			$sub_array['photo'] = '<img src="'.base_url().'uploads/'.$row->photo.'" class="img-thumbnail" width="50" height="35" />';  
			$sub_array['name'] = $row->name;  
			$sub_array['price'] =  $row->price;  
						 $sub_array['category_id'] = '
			
			<a href="'.WEB_URL.'seller/addproduct?pid='.$row->id.'"><button type="button" name="update" id="'.$row->id.'" class="btn btn-info btn-xs">Add&nbsp;Product'; 
			$data[] = $sub_array;  
           }
		   }
	## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response; 
   }
   
	function getInactiveSellerProduct($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.pid,a.id,a.vendor_id,a.status as product_status, a.price as seller_product_price,a.stock as seller_product_stock,tp.name as product_name,tp.photo as product_photo";
		}
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
		$this->db->join(TBL_PRODUCT.' tp','a.pid=tp.id','inner');
		$this->db->where('product_status',1);
		$this->db->where(array('vendor_id'=>$this->sellerId));
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('name',$keyword,'both');
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
	
	function getAllSellerProduct($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.admin_commission_amount,a.seller_payable_amount,a.pid,a.id,a.vendor_id,a.status as product_status, a.price as seller_product_price,a.stock as seller_product_stock,tp.name as product_name,tp.photo as product_photo";
		}
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
		$this->db->join(TBL_PRODUCT.' tp','a.pid=tp.id','inner');
		$this->db->where(array('vendor_id'=>$this->sellerId));
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('name',$keyword,'both');
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

	function getLowStockProduct($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.admin_commission_amount,a.seller_payable_amount,a.pid,a.id,a.vendor_id,a.status as product_status, a.price as seller_product_price,a.stock as seller_product_stock,tp.name as product_name,tp.photo as product_photo";
		}
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
		$this->db->join(TBL_PRODUCT.' tp','a.pid=tp.id','inner');
		$this->db->where(array('vendor_id'=>$this->sellerId));
		// $this->db->where(array('a.stock'<=5));
		$this->db->where(array('a.stock<='=>5));
		$this->db->order_by('a.stock','ASC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.stock',$keyword,'both');
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


	function getSellerProfileDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SELLER.' a');
		$this->db->where(array('a.id'=>$this->sellerId));
		// $this->db->where(array('a.id_seller_type'=>$this->id_seller_type));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getProductDetails($postVal=array()){
		$result = array();
		$fields = "a.name as product_name, a.sku, a.id as product_id, a.status, a.photo, a.size, a.size_qty, a.size_price, a.weight, a.color, a.price,a.previous_price, a.details,
		  a.policy, a.is_meta, a.meta_tag, a.meta_description, tc.slug as cat_slug, tc.name as cat_name, ts.name as subcat_name";		
		$this->db->select($fields);
		$this->db->from(TBL_PRODUCT.' a');
        $this->db->join(TBL_CATEGORY.' tc','a.category_id=tc.id','left');
		$this->db->join(TBL_SUBCATEGORY.' ts','a.subcategory_id=ts.id','left');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getVendorProductDetails($postVal=array()){
		$result = array();
		$fields = "a.*";		
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
        $this->db->where(array('a.pid'=>$postVal['id']));
        $this->db->where(array('a.vendor_id'=>$this->sellerId));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	

	function updateSellerDetails($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'first_name'=>strip_tags($postVal['first_name']),
		'last_name'=>$postVal['last_name'],
		'email'=>$postVal['email'],
		'alt_mobile_no'=>$postVal['alt_mobile_no'],
		'shop_name'=>$postVal['shop_name'],
		'shop_number'=>$postVal['shop_number'],
		'shop_address'=>$postVal['shop_address'],
		'reg_number'=>$postVal['reg_number'],
		'owner_name'=>$postVal['owner_name'],
		'zip'=>$postVal['zip'],
		'country'=>$postVal['country'],
		'state'=>$postVal['state'],
		'city'=>$postVal['city'],
		'gst'=>$postVal['gst'],
		'pan'=>$postVal['pan'],
		'modified_at'=>date("Y-m-d H:i:s")
		);
		$this->db->where(array('id'=>$this->sellerId));
		// $this->db->where(array('id_seller_type'=>$this->id_seller_type));
		if($this->db->update(TBL_SELLER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	function update_product_status($course_id,$status){
		  $data['status'] = $status;
		  $this->db->where('id', $course_id);
		  $this->db->update('courses',$data);
	}


	function uploadSellerProduct($postVal=array())
	{
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$AddAdminCommission=100+$postVal['name'];
		$commission=$postVal['price']*100/$AddAdminCommission;
		$commissionMadeToAdmin=$postVal['price']-$commission;
		$seller_Payable_aMount=$postVal['price']-$commissionMadeToAdmin;
		$data = array(
			'price'=>$postVal['price'],
			'admin_commission_amount'=>$commissionMadeToAdmin,
			'seller_payable_amount'=>$seller_Payable_aMount,
			'stock'=>$postVal['stock'],
			'remarks'=>$postVal['remarks'],
			'pid'=>$postVal['pid'],
			'status'=>2,
			'vendor_id'=>$this->sellerId
		);
		if($this->db->insert(TBL_VENDOR_PRODUCT,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}
	
	function updateSellerProduct($postVal=array())
	{
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$AddAdminCommission=100+$postVal['name'];
		$commission=$postVal['price']*100/$AddAdminCommission;
		$commissionMadeToAdmin=$postVal['price']-$commission;
		$seller_Payable_aMount=$postVal['price']-$commissionMadeToAdmin;
		$data = array(
			'price'=>$postVal['price'],
			'admin_commission_amount'=>$commissionMadeToAdmin,
			'seller_payable_amount'=>$seller_Payable_aMount,
			'stock'=>$postVal['stock'],
			'remarks'=>$postVal['remarks']
		);
		$this->db->where('id',$postVal['id']);
		$this->db->where('pid',$postVal['pid']);
		$this->db->where('vendor_id',$this->sellerId);
		if($this->db->update(TBL_VENDOR_PRODUCT,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated Successfully');
		}
		return $response;
	}
	
	function getProductsRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from(TBL_PRODUCT);  
         
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
	function getInvoiceLogo(){
		$total = 0;
		$fields = "a.invoice_logo as invoiceLogo";
		
		$this->db->select($fields);
		$this->db->from(TBL_LOGO.' a');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['invoiceLogo'];
		}
		return $total;
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
	function getInvoiceDetails($params = array()){
		$fields = "a.*,d.fullname as user_name,d.mobile,d.house_no,
		d.address,d.landmark,d.city,d.pin,d.state,d.address_type,d.delivery_time,
		b.order_no,a.seller_id,b.total_item,b.user_id,
		b.address_id,b.total_payment,b.delivery_charge,
		b.save,b.order_date,b.order_time,b.delivery_status,b.payment_mode,
		c.mobile_no,e.mobile_no as seller_mobile,e.shop_name,e.city,e.shop_address,e.state,e.zip,e.email,e.gst,e.pan,f.name as product_name,f.price as p_price,f.gst_percentage,f.previous_price";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','inner');
		$this->db->join(TBL_CUSTOMER_ADDRESS.' d','b.address_id=d.id','left');
		$this->db->join(TBL_SELLER.' e','a.seller_id=e.id','left');
		$this->db->join(TBL_PRODUCT.' f','a.product_id=f.id','left');
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
	
	function getAllPendingOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','1');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	function getAllApprovedOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','2');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	function getAllShippedOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','3');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	function getAllDeliveredOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','4');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	
	function getAllCancelRequestOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','5');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	function getAllCancelledOrder($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.id as order_id,a.orderid,a.product_id,a.qty,a.seller_id,a.product_price,a.total_price,a.delivery_status as deliverystatus,b.*,c.first_name,c.last_name,c.mobile_no,d.name as product_name,";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->join(TBL_ORDERS.' b','a.orderid=b.id','left');
		$this->db->join(TBL_USER.' c','b.user_id=c.id_user','left');
		$this->db->join(TBL_PRODUCT.' d','a.product_id=d.id','left');
		$this->db->where('a.delivery_status','6');
		$this->db->where('seller_id',$this->sellerId);
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('b.order_no',$keyword,'both');
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
	 
	
	
	
	
//End
}
?>