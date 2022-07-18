<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Checkout_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		 $this->table = 'products';
		 $this->ordItemsTable = 'orderdetails';
	}
	function getUserName(){
		$total = 0;
		$fields = "a.first_name as customerName";
		
		$this->db->select($fields);
		$this->db->from(TBL_USER.' a');
		$this->db->where('id_user',$this->session->userdata('userId'));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['customerName'];
		}
		return $total;
     }
	
	function order($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		include('db.php');
		 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$getorderno = "SELECT `order_no` FROM `myorder` ORDER BY `id` DESC LIMIT 1";
if ($stmt = $con->prepare($getorderno)) {
    $stmt->execute();
    $stmt->bind_result($ordernogen);	
    while ($stmt->fetch()) {	
	
        		}  
}
if(isset($ordernogen)){
	$order_no = $ordernogen+1;
} else{
	$order_no = time().rand(111,999);
}
		
$a=$postVal['address'];
 

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT pin FROM customer_address where id='$a'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($pin);	
    while ($stmt->fetch()) {	
	
        		}  
}	

 include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT count(id) FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($count_pin);	
    while ($stmt->fetch()) {	
	
        		}  
}


if($count_pin==1)
{
	 include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT cod FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($cod);	
    while ($stmt->fetch()) {	
	
        		}  
}	
	$session_user_id=$this->session->userdata('userId');
	
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT first_name FROM users where id_user='$session_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Name);	
    while ($stmt->fetch()) {	
	
        		}  
}

$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT mobile_no FROM users where id_user='$session_user_id'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($customer_Mobile);	
    while ($stmt->fetch()) {	
	
        		}  
}


include('db.php');

 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT cod_limit FROM pin where pin='$pin'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($cod_limit);	
    while ($stmt->fetch()) {	
	
        		}  
}	

}
else
{
	$cod='NO';
	$cod_limit='NO';
}

		
		
		$d=1;
		$price=0;
		$save=0;
		$mrp=0;
		$cartItems = $this->cart->contents();
						   foreach($cartItems as $item)
						   {   

						   
						   
			$productID=$item["id"];  
						   include('db.php');
 $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT previous_price FROM products where id='$productID'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($mrp);	
    while ($stmt->fetch()) {	
	
        		}  
}

$sellerid=$item["sellerid"];


$price=$price+($item['price']*$item['qty']);
$save=$save+($mrp*$item['qty'])-($item['price']*$item['qty']); 
						   }
						   if($cod=='YES')
{
if($cod_limit>=$price)
{
	$cod='YES';
}
else
{
	$cod='NO';
}
}

include('db.php');
$con = new mysqli($host, $user, $password, $dbname)
or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT order_amount FROM pin_charge WHERE `pin`='$pin' ORDER BY `id` ASC";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($orderAmountPin);	
    while ($stmt->fetch()) {	
	
        		}  
}
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT `delivery_amount` FROM `pin_charge` WHERE `pin`='$pin' ORDER BY `id` ASC";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($deliveryAmountPinCharge);	
    while ($stmt->fetch()) {	
	
        		}  
}
// 100>=117
if($orderAmountPin>=$this->cart->total() && $orderAmountPin>=$price)	{	
		$delivery=$deliveryAmountPinCharge;
}
else{
	$delivery=0;
}
// echo $delivery; die;

		$data = array(
			'user_id'=>$this->session->userdata('userId'),
			'address_id'=>$postVal['address'],
			// 'payment_id'=>$postVal['razorpay_payment_id'],
			'total_item'=>$postVal['total_item'],
			'discount'=>0,
			'order_no'=>$order_no,
			'total_payment'=>$price+$delivery,
			'delivery_charge'=>$delivery,
			'shippping_cost'=>$postVal['shippping_cost'],
			'save'=>$save,
			'order_date'=>date('d-m-Y'),
			'order_time'=>getCurrentDateTime(),
			'payment_mode'=>$postVal['payment_mode']);
		if($this->db->insert(TBL_ORDERS,$data)) {
			
			
 
$mobile=$customer_Mobile;
$msg="Hello ".$customer_Name.", Thank you for your order. We'll send a confirmation when your order ships. Order id : ".$d.''.$order_no." Regards - UBaazar"; 	

// $phones=$mobile;
$phones=$customer_Mobile;
  
$url="http://45.249.108.134/api.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=ubaazar&password=283363&sender=UBZAAR&sendto=".$phones."&message=".$msg."&type=3&PEID=1001541570000044395&templateid=1007163832928528012");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$response = curl_exec($ch);
 
 
			$last_id = $this->db->insert_id();
			if($last_id){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            // Cart items
            $ordItemData = array();
            $i=0;

            foreach($cartItems as $item){
			
$p=$item['id'];			
							include('db.php');
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT gst_amount FROM products where id='$p'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($gst_amount);	
    while ($stmt->fetch()) {	
	
        		}  
}

							include('db.php');
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT without_gst_price FROM products where id='$p'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($without_gst_price);	
    while ($stmt->fetch()) {	
	
        		}  
}

							include('db.php');
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT admin_commission_amount FROM products where id='$p'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($admin_commission_amount);	
    while ($stmt->fetch()) {	
	
        		}  
}

							include('db.php');
$con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error());	
$query = "SELECT seller_payable_amount FROM products where id='$p'";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($seller_payable_amount);	
    while ($stmt->fetch()) {	
	
        		}  
}

				$total_price = $item['qty'] * $item['price'];
                $ordItemData[$i]['orderid']     = $last_id;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['qty']     = $item['qty'];
                $ordItemData[$i]['product_price']     = $item["price"];
                $ordItemData[$i]['seller_id']     = $item["sellerid"];
                $ordItemData[$i]['total_price']     = $total_price;
                $ordItemData[$i]['gst_amount']     = $gst_amount;
                $ordItemData[$i]['without_gst_price']     = $without_gst_price;
                $ordItemData[$i]['seller_payable_amount']     = $seller_payable_amount*$item['qty'];
                $ordItemData[$i]['admin_commission_amount']     = $admin_commission_amount*$item['qty'];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->insertOrderItems($ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    // Return order ID
                   // return $last_id;
				   $response = array('status' => STATUS_SUCCESS, 'msg' => 'Thank you for order!');
                }
            }
        }
			// $response = array('status' => STATUS_SUCCESS, 'msg' => 'Thank you for order!');
		}
	
		return $response;
	}
	
	function countUserAddress(){
		$total = 0;
		$fields = "count(a.id) as userAddressCount";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		$this->db->where('user_id',$this->session->userdata('userId'));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['userAddressCount'];
		}
		return $total;
	}
	
	/*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);
		// Return the status
        return $insert?true:false;
    }
	
	function getCustomerAddress(){
            $total = 0;
            $fields = "a.address as address_id";
            $this->db->select($fields);
            $this->db->from(TBL_USER.' a');
			$this->db->where('id_user',$this->session->userdata('userId'));
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['address_id'];
            }
            return $total;
    }
	
	function getCustAllRecentAddress($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		$this->db->where('a.user_id',$this->session->userdata('userId'));
		$this->db->order_by('id','DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	
	}
	
	function getCustomerDefaultAddress($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		// $this->db->where(array('a.id'=>$address_id));
		$this->db->where(array('a.id'=>$postVal['id']));
		$this->db->order_by('id','DESC');
		//$this->db->order_by('id', 'DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	
	}
	
	function NestedProducts($offset=null) {
    /*$sql = "Select C.name as cat_name,C.id as cat_id, P.name as product_name
        From categories C left join products P on C.id = P.category_id 
        Order by C.name";
		*/
      
if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 20;
        $offset = ($pageno-1) * $no_of_records_per_page;
	 include('./db.php');
	 $conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
mysqli_set_charset($conn,"utf8");

		 $total_pages_sql = "SELECT COUNT(*) FROM products";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
		 
		$cat=$_GET['cat'];


if(isset($_GET['brand']))


{
	$brand=$_GET['brand'];
	
  $where_brand="and brand='$brand'";
} 

else
{
	$where_brand='';
}
 
if(isset($_GET['subcat']))
{
	
	if(isset($_GET['sort']))
		
		{

$sort=$_GET['sort'];

if($sort=='l')
{
		
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand order by price asc LIMIT $offset, $no_of_records_per_page";
	
}
else if($sort=='h')
{
		
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand order by price desc LIMIT $offset, $no_of_records_per_page";
}

else if($sort=='p')
{
		
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand order by seen desc LIMIT $offset, $no_of_records_per_page";
}


else if($sort=='n')
{
		
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand order by id desc LIMIT $offset, $no_of_records_per_page";
}


 


else if($sort=='d')
{
	 	
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand  order by price asc LIMIT $offset, $no_of_records_per_page";
}

else
{
		
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand order by price asc LIMIT $offset, $no_of_records_per_page";
}		
			
		
			
			
			
			
        }
		
		else
		{
			
			$subcat=$_GET['subcat'];
			$where="and subcategory_id='$subcat'";
			$sql = "SELECT * FROM products where category_id='$cat' $where $where_brand  order by price asc LIMIT $offset, $no_of_records_per_page";
			
		}

}


else
	
	{
		
		$sql = "SELECT * FROM products where category_id='$cat' $where_brand order by price asc LIMIT $offset, $no_of_records_per_page";
	}
        $query = $this->db->query($sql);
        $products = array();
        if ($query->num_rows()) {
          foreach ($query->result_array() as $row) {
            $products[$row['name']][] = $row;
          }
        }
        return $query->result_array();
}
	
	/*function getCategoryDetailsRows($params = array()){
		$fields = "a.name as product_name,a.slug as product_slug, a.sku, a.id as product_id, 
		 a.status, a.photo, a.size, a.size_qty, a.size_price, a.weight, a.color, a.price, a.details,
		  a.policy, a.is_meta, a.meta_tag, a.meta_description, tc.slug as cat_slug, tc.name as cat_name, ts.slug as subcat_slug, ts.name as subcat_name, tci.slug as childcat_slug, tci.name as childcat_name";
		$this->db->select($fields);
		$this->db->from(TBL_PRODUCT.' a');
		$this->db->join(TBL_CATEGORY.' tc','a.category_id=tc.id','left');
		$this->db->join(TBL_SUBCATEGORY.' ts','a.subcategory_id=ts.id','inner');
		$this->db->join(TBL_CHILDCATEGORY.' tci','a.childcategory_id=tci.id','inner');
		$this->db->join(TBL_GALLERY.' tg','a.id=tg.pid','left');
		//set start and limit
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
		if(array_key_exists("slug", $params)){
			$this->db->where('tc.slug', $params['slug']);
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
		}else{
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		//return fetched data
		return $result;
	}*/
	
	/* Product Filter work Start Here */
	
	 public function get_product_brand()
    {
        return $this->db->select('*')->from('brand_filter')->get();
    }

    public function get_product_category()
    {
        return $this->db->select('*')->from('categories')->get();
    }

 function fetch_category($type)
 {
    $this->db->select($type);
    $this->db->from('products');
    $this->db->where('status', '1');
    return $this->db->get();
 }
 
	public function fetch_query($minimum_price, $maximum_price, $brand, $category)
 {
    $query = "SELECT p.*, b.brand, c.name as cat_name FROM products as p
    INNER JOIN brand_filter as b ON b.id = p.brand
    INNER JOIN categories as c ON c.id = p.category_id
    WHERE p.status = '1' 
    ";

    if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
    {
       $query .= "AND p.price BETWEEN '".$minimum_price."' AND '".$maximum_price."'";
    }

    if(isset($brand))
    {
       $brand_filter = implode("','", $brand);
       $query .= "AND p.brand IN('".$brand_filter."')";
    }

    if(isset($category))
    {
       $category_filter = implode("','", $category);
       $query .= "AND p.category_id IN('".$category_filter."')";
    }
    return $query;
 }

  public function count_all_product($minimum_price, $maximum_price, $brand, $category)
  {
      $query = $this->fetch_query($minimum_price, $maximum_price, $brand, $category);
      $data = $this->db->query($query);
      return $data->num_rows();
  }

  public function fetch_product_list_model($limit, $start, $minimum_price, $maximum_price, $brand, $category)
  {
      $query = $this->fetch_query($minimum_price, $maximum_price, $brand, $category);

      $query .= ' LIMIT '.$start.', ' . $limit;

      $data = $this->db->query($query);

      $output = '';
      if($data->num_rows() > 0)
      {
         foreach($data->result_array() as $row)
         {

            if(strlen($row['name']) > 30 ){
              $name = substr($row['name'], 0,30).'...';
            }
            else{
              $name = substr($row['name'], 0,30);
            }

            
			$output .= '<div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="'.base_url().'item/'. $row['slug'] .'">
                                                <img src="'.base_url().'uploads/'. $row['photo'] .'" alt="Product" width="300"
                                                    height="338" />
                                            </a>
                                            <div class="product-action-horizontal">
                                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                    title="Add to cart"></a>
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                    title="Compare"></a>
                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                    title="Quick View"></a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a style="text-decoration:none;" href="'.base_url().'item/'. $row['slug'] .'">'. $row['cat_name'].'</a>
                                            </div>
											<div class="product-cat">
                                                <a style="text-decoration:none;" href="'.base_url().'item/'. $row['slug'] .'">'. $row['brand'].'</a>
                                            </div>
                                            <h3 class="product-name">
                                                <a style="text-decoration:none;" href="'.base_url().'item/'. $row['slug'] .'">'. $name .'</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                    Rs '. $row['price'] .'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
         }
      }
      else
      {
          $output = '<div class="col-sm-3"></div><div class="col-sm-6"><img src="'.base_url().'uploads/empty.png" style="width: 100%; margin-top: 100px;"></div>';
      }
      return $output;
   }
	
	
	
	
	
	
	
	
	/* 
     * Fetch records from the database 
     * @param array filter data based on the passed parameters 
     */ 
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("search", $params)){ 
            // Filter data by searched keywords 
            if(!empty($params['search']['keywords'])){ 
                $this->db->like('name', $params['search']['keywords']); 
            } 
        } 
         
        // Sort data by ascending or desceding order 
        if(!empty($params['search']['sortBy'])){ 
            $this->db->order_by('name', $params['search']['sortBy']); 
        }else{ 
            $this->db->order_by('id', 'desc'); 
        } 
		
		// Sort data by ascending or desceding order 
        if(!empty($params['search']['category'])){ 
            $this->db->where('category_id', $params['search']['category']); 
        }else{ 
            $this->db->order_by('id', 'desc'); 
        } 
		
		if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
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
