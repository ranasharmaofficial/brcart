<?php

class product_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}
	
	function checkAdminCommission($postVal=array()){
            $total = 0;
            $fields = "a.id,a.admin_commission_percentage as admin_commission_percentage";
            $this->db->select($fields);
            $this->db->from(TBL_SUBCATEGORY.' a');
			$this->db->where(array('a.id'=>$postVal['subcategory_id']));
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $row = $query->row_array();
                $total = $row['admin_commission_percentage'];
            }
            return $total;
     }
	 
	public function insert($data = array()){ 
        $insert = $this->db->insert_batch('gallery',$data); 
        return $insert?true:false; 
    } 
	function addProduct($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		// $AdminCommission = $this->checkAdminCommission(array('subcategory_id' => $postVal['subcategory_id']));
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isProductUrlExists('products',$titleURL.'.html')){
			$titleURL = $titleURL.'-'.time();
		}


		if(isset($_FILES["file"]["name"]))  
		{  
			 
			 $config['upload_path'] = './uploads/';  
			 $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|WebP|webp';  
			 $this->load->library('upload', $config);  
			 if(!$this->upload->do_upload('file'))  
			 {  
				  echo $this->upload->display_errors();  
			 }  
			 else  
			 {  
				  $data = $this->upload->data();  
				  $config['image_library'] = 'gd2';  
				  $config['source_image'] = './uploads/'.$data["file_name"];  
				  $config['create_thumb'] = FALSE;  
				  $config['maintain_ratio'] = TRUE;  
				  $config['quality'] = '80%';  
				  $config['width'] = 915;  
				  $config['height'] = 915; 
				  $config['new_image'] = './uploads/'.$data["file_name"]; 
				  $this->load->library('image_lib', $config);  
				  $this->image_lib->resize();  
			}  
		}
		
		// $AddAdminCommission=100+$AdminCommission;
		// $commission=$postVal['price']*100/$AddAdminCommission;
		// $commissionMadeToAdmin=$postVal['price']-$commission;
		
		// $GstCommission=100+$postVal['gst_percentage'];
		// $commissionGst=$postVal['price']*100/$GstCommission;
		// $commissionMadeToGst=$postVal['price']-$commissionGst;
		// $WithoutGstAmount=$postVal['price']-$commissionMadeToGst;
		// $volumetric_weight=$postVal['length']*$postVal['breadth']*$postVal['height']/5000;
		// $seller_Payable_aMount=$postVal['price']-$commissionMadeToAdmin;
		
		// $percentage = (($postVal['previous_price'] - $postVal['price']) * 100) / $postVal['previous_price'];
        // $is_discount = round($percentage);
		
		$data = array(
		// 'gst_percentage'=>$postVal['gst_percentage'],
		'name'=>$postVal['name'],
		'sku'=>$postVal['sku'],
		'category_id'=>$postVal['category_id'],
		'subcategory_id'=>$postVal['subcategory_id'],
		// 'childcategory_id'=>$postVal['childcategory_id'],
		// 'admin_commission_percentage'=>$AdminCommission,
		// 'admin_commission_amount'=>$commissionMadeToAdmin,
		// 'without_gst_price'=>$WithoutGstAmount,
		// 'gst_amount'=>$commissionMadeToGst,
		// 'is_discount'=>$is_discount,
		// 'seller_payable_amount'=>$seller_Payable_aMount,
		// 'brand'=>$postVal['brand'],
		// 'ship'=>$postVal['ship'],
		// 'whole_sell_qty'=>$postVal['whole_sell_qty'],
		// 'whole_sell_discount'=>$postVal['whole_sell_discount'],
		// 'measure'=>$postVal['measure'],
		'details'=>$postVal['details'],
		'description'=>$postVal['description'],
		'short_details'=>$postVal['short_details'],
		// 'weight'=>$postVal['shipping_weight'],
		// 'shipping_weight'=>$postVal['shipping_weight'],
		// 'shipping_measurement'=>$postVal['shipping_measurement'],
		// 'volumetric_weight'=>$volumetric_weight,
		// 'policy'=>$postVal['policy'],
		'is_meta'=>$postVal['is_meta'],
		'meta_tag'=>$postVal['meta_tag'],
		'meta_description'=>$postVal['meta_description'],
		'created_at'=>getCurrentDateTime(),
		'type'=>'Physical',
		// 'cod_available'=>$postVal['cod_available'],
		// 'stock'=>$postVal['stock'],
		'price'=>$postVal['price'],
		// 'purchase_price'=>$postVal['purchase_price'],
		'previous_price'=>$postVal['previous_price'],
		'photo'=>$data["file_name"],
		'slug'=>$titleURL.'.html');
		if($this->db->insert(TBL_PRODUCT,$data)) {
			// $last_id = $this->db->insert_id();
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}
	
	function addProductSize($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'size'=>$postVal['size'],
		'size_qty'=>$postVal['size_qty'],
		'size_price'=>$postVal['size_price'],
		'pid'=>$postVal['pid'],
		'color'=>$postVal['color']);
		if($this->db->insert(TBL_PRODUCT_SIZE,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getProductDetailsRows($params = array()){
		$fields = "a.cod_available,a.description,a.shipping_weight,a.volumetric_weight,a.shipping_measurement,a.short_details, a.admin_commission_percentage,a.ship,a.size,a.size_qty,a.size_price,a.whole_sell_qty,a.whole_sell_discount,a.previous_price,a.ship,a.ship,a.ship,a.meta_tag,a.meta_description,a.ship,a.stock,a.name as product_name, a.sku, a.id as product_id, 
		 a.status,a.purchase_price,a.admin_commission_amount,a.gst_amount,a.without_gst_price,a.seller_payable_amount, a.photo, a.size, a.size_qty, a.size_price, a.weight, a.color, a.price, a.details,
		  a.policy, a.is_meta, a.meta_tag, a.meta_description,a.delivery_charge_pay_by, tc.slug as cat_slug, tc.name as cat_name, ts.slug as subcat_slug, ts.name as subcat_name,ts.id as subcat_id, tci.slug as childcat_slug, tci.name as childcat_name, tb.brand as brand_name";
		 $this->db->select($fields);
		$this->db->from(TBL_PRODUCT.' a');
        $this->db->join(TBL_CATEGORY.' tc','a.category_id=tc.id','left');
		$this->db->join(TBL_SUBCATEGORY.' ts','a.subcategory_id=ts.id','inner');
		$this->db->join(TBL_CHILDCATEGORY.' tci','a.childcategory_id=tci.id','inner');
		$this->db->join(TBL_GALLERY.' tg','a.id=tg.pid','left');
		$this->db->join(TBL_BRAND.' tb','a.brand=tb.id','left');
		//set start and limit
		if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit'],$params['start']);
		}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
			$this->db->limit($params['limit']);
		}
		if(array_key_exists("slug", $params)){
			$this->db->where('a.slug', $params['slug']);
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
		}else{
			$query = $this->db->get();
			$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
		}
		//return fetched data
		return $result;
	}

	function getSubcategoryId($postVal=array()){
		$result = array(''=>'Select '.$postVal['data_type']);
		$fields = "a.id,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_CATEGORY.' a');
		//$this->db->where(array('a.id_parent'=>$postVal['id_parent']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id']] = $val['name'];
			}
		}
		return $result;
	}

	function getAllBrand($postVal=array()){
		$result = array(''=>'Select '.$postVal['data_type']);
		$fields = "a.id,a.brand";
		$this->db->select($fields);
		$this->db->from(TBL_BRAND.' a');
		//$this->db->where(array('a.id_parent'=>$postVal['id_parent']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id']] = $val['brand'];
			}
		}
		return $result;
	}
	
	function getAllProduct($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			
		}
		$this->db->select($fields);
		$this->db->from(TBL_PRODUCT.' a');
		$this->db->order_by('id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.name',$keyword,'both');
				$this->db->or_like('a.meta_tag',$keyword,'both');
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
	
	function getProductGalleryR($postVal=array())
	{
		$result = array();
		$this->db->select("a.*");
		$this->db->from(TBL_GALLERY.' a');
		$this->db->where(array('a.pid'=>$postVal['pid']));
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
			if($query->num_rows() > 0) {
				$result = $query->result_array();
			}
		
		return $result;
	}
	function getProductSizeQty($postVal=array())
	{
		$result = array();
		$this->db->select("a.*");
		$this->db->from(TBL_PRODUCT_SIZE.' a');
		$this->db->where(array('a.pid'=>$postVal['pid']));
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
			if($query->num_rows() > 0) {
				$result = $query->result_array();
			}
		return $result;
	}
	
	
	function getProductGalleryRows($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_GALLERY.' a');
		$this->db->where(array('a.pid'=>$postVal['pid']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	
	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$percentage = (($postVal['previous_price'] - $postVal['price']) * 100) / $postVal['previous_price'];
        $is_discount = round($percentage);
		$data = array('gst_percentage'=>$postVal['gst_percentage'],
		'name'=>$postVal['name'],
		'sku'=>$postVal['sku'],
		'category_id'=>$postVal['category_id'],
		'subcategory_id'=>$postVal['subcategory_id'],
		'childcategory_id'=>$postVal['childcategory_id'],
		'admin_commission_percentage'=>$postVal['admin_commission_percentage'],
		'admin_commission_amount'=>$postVal['admin_commission_amount'],
		'without_gst_price'=>$postVal['without_gst_price'],
		'gst_amount'=>$postVal['gst_amount'],
		'seller_payable_amount'=>$postVal['seller_payable_amount'],
		'brand'=>$postVal['brand'],
		'is_discount'=>$is_discount,
		// 'ship'=>$postVal['ship'],
		// 'whole_sell_qty'=>$postVal['whole_sell_qty'],
		// 'whole_sell_discount'=>$postVal['whole_sell_discount'],
		// 'measure'=>$postVal['measure'],
		'details'=>$postVal['details'],
		'description'=>$postVal['description'],
		'short_details'=>$postVal['short_details'],
		'policy'=>$postVal['policy'],
		'weight'=>$postVal['weight'],
		'meta_tag'=>$postVal['meta_tag'],
		'meta_description'=>$postVal['meta_description'],
		'type'=>'Physical',
		'cod_available'=>$postVal['cod_available'],
		// 'stock'=>$postVal['stock'],
		'delivery_charge_pay_by'=>$postVal['delivery_charge_pay_by'],
		'price'=>$postVal['price'],
		'purchase_price'=>$postVal['purchase_price'],
		'previous_price'=>$postVal['previous_price']);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	function updateProductPicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		if(isset($_FILES["file"]["name"]))  
		{  
			 
			 $config['upload_path'] = './uploads/';  
			 $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|WebP|webp';  
			 $this->load->library('upload', $config);  
			 if(!$this->upload->do_upload('file'))  
			 {  
				  echo $this->upload->display_errors();  
			 }  
			 else  
			 {  
				  $data = $this->upload->data();  
				  $config['image_library'] = 'gd2';  
				  $config['source_image'] = './uploads/'.$data["file_name"];  
				 $config['create_thumb'] = FALSE;  
				  $config['maintain_ratio'] = TRUE;  
				  $config['quality'] = '60%';  
				  $config['width'] = 915;  
				  $config['height'] = 915;
				  $config['new_image'] = './uploads/'.$data["file_name"]; 
				  $this->load->library('image_lib', $config);  
				  $this->image_lib->resize();  
			}  
		}
		
		$data = array('photo'=>$data["file_name"]);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>