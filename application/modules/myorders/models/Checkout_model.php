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
	
	function order($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$order_no = strtotime(date('Y-m-d H:i:s'));
		$data = array(
			// 'created_by'=>$postVal['name'],
			// 'created_at'=>getCurrentDateTime(),
			'user_id'=>$this->session->userdata('userId'),
			'address_id'=>$postVal['address'],
			'discount'=>0,
			'order_no'=>$order_no,
			'total_payment'=>$postVal['total'],
			'delivery_charge'=>$postVal['delivery_charge'],
			'shippping_cost'=>$postVal['shippping_cost'],
			'save'=>$postVal['save'],
			'order_date'=>date('d-m-Y'),
			'order_time'=>getCurrentDateTime(),
			'payment_mode'=>$postVal['payment_mode']);
		if($this->db->insert(TBL_ORDERS,$data)) {
			$last_id = $this->db->insert_id();
			if($last_id){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['orderid']     = $last_id;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['qty']     = $item['qty'];
                // $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $ordItemData[$i]['product_price']     = $item["price"];
                $ordItemData[$i]['seller_id']     = $item["sellerid"];
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
