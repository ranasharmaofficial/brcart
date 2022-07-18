<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Filter_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		 $this->table = 'products';
	}
	
	function fetch_data($limit, $start)
	{

		$this->db->select("*");
		$this->db->from("products");
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}
	 
	
	/* Product Filter work Start Here */
	
	 public function get_product_brand()
    {
        return $this->db->select('*')->from('brand_filter')->get();
    }

    public function get_product_category()
    {
        return $this->db->select('*')->from('categories')->get();
    }

 /*function fetch_filter_type($type)
 {
    $this->db->distinct();
    $this->db->select($type);
    $this->db->from('products');
    $this->db->where('status', '1');
    return $this->db->get();
 }*/
 
 function fetch_filter_type($type)
 {
    $cat=$_GET['cat'];
    $subcat=$_GET['subcat'];
    $chilcat=$_GET['chilcat'];
	
	$this->db->distinct();
    $this->db->select($type);
    $this->db->from('products');
	if(isset($cat))
    {
    $this->db->where('status', '1');
    $this->db->where('category_id', $cat);
	}
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

            
			$output .= '<div class="product-wrap p-1 shadow-sm">
                                    <div class="product text-center">
									<center>
                                        <figure class="product-media">
                                            <a href="'.base_url().'item/'. $row['slug'] .'">
                                                <img style="height:140px;width:auto;" src="'.base_url().'uploads/'. $row['photo'] .'" alt="'. $name .'"  />
                                            </a>
                                            <div class="product-action-horizontal">
                                                 
                                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                    title="Wishlist"></a>
                                                
                                            </div>

                                        </figure>
										</center>
                                        <div class="product-details">
                                            
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
