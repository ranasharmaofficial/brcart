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
	 
	function addProduct($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$AdminCommission = $this->checkAdminCommission(array('subcategory_id' => $postVal['subcategory_id']));
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isProductUrlExists('products',$titleURL.'.html')){
			$titleURL = $titleURL.'-'.time();
		}


		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'u-baazar'. $file_ext;
			if (file_exists(".'.WEB_ATTACHMENT_PATH.'" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{
				//move_uploaded_file($_FILES["file"]["tmp_name"], ".'.WEB_IMG_PATH.'" . $newfilename);
				move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/" . $newfilename);
				//echo "Successfully Uploaded Pic.";
			}
		}
		elseif (empty($file_basename))
		{
			// file selection error
			echo "Please select a file to upload.";
		}
		elseif ($filesize > 200000000)
		{
			// file size error
			echo "The file you are trying to upload is too large.";
		}
		else
		{
			// file type error
			echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
			unlink($_FILES["file"]["tmp_name"]);
		}
		$x=''.WEB_ATTACHMENT_PATH.''.$newfilename;
		
		$AddAdminCommission=100+$AdminCommission;
		$commission=$postVal['price']*100/$AddAdminCommission;
		$commissionMadeToAdmin=$postVal['price']-$commission;
		
		$GstCommission=100+$postVal['gst_percentage'];
		$commissionGst=$postVal['price']*100/$GstCommission;
		$commissionMadeToGst=$postVal['price']-$commissionGst;
		$WithoutGstAmount=$postVal['price']-$commissionMadeToGst;
		
		$seller_Payable_aMount=$postVal['price']-$commissionMadeToAdmin;
		$data = array(
		'gst_percentage'=>$postVal['gst_percentage'],
		'name'=>$postVal['name'],
		'sku'=>$postVal['sku'],
		'category_id'=>$postVal['category_id'],
		'subcategory_id'=>$postVal['subcategory_id'],
		'childcategory_id'=>$postVal['childcategory_id'],
		'admin_commission_percentage'=>$AdminCommission,
		'admin_commission_amount'=>$commissionMadeToAdmin,
		'without_gst_price'=>$WithoutGstAmount,
		'gst_amount'=>$commissionMadeToGst,
		'seller_payable_amount'=>$seller_Payable_aMount,
		'brand'=>$postVal['brand'],
		'ship'=>$postVal['ship'],
		'whole_sell_qty'=>$postVal['whole_sell_qty'],
		'whole_sell_discount'=>$postVal['whole_sell_discount'],
		'measure'=>$postVal['measure'],
		'details'=>$postVal['details'],
		'policy'=>$postVal['policy'],
		'weight'=>$postVal['weight'],
		'is_meta'=>$postVal['is_meta'],
		'meta_tag'=>$postVal['meta_tag'],
		'meta_description'=>$postVal['meta_description'],
		'created_at'=>getCurrentDateTime(),
		'type'=>'Physical',
		'cod_available'=>$postVal['cod_available'],
		'stock'=>$postVal['stock'],
		//'delivery_charge_pay_by'=>$postVal['delivery_charge_pay_by'],
		'price'=>$postVal['price'],
		'purchase_price'=>$postVal['purchase_price'],
		'previous_price'=>$postVal['previous_price'],
			'photo'=>$newfilename,
			'slug'=>$titleURL.'.html');
		if($this->db->insert(TBL_PRODUCT,$data)) {
			$last_id = $this->db->insert_id();
			// File upload configuration
// Create database connection
$servername = "localhost";
$username = "u340364106_papamummy_db";
$password = "h[NueSsbo7";
$dbname = "u340364106_papamummy_db";
$db = new mysqli($servername, $username, $password, $dbname);   
   $targetDir = "gallery/";
    $allowTypes = array('jpg','png','jpeg','gif','webp');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
			$nid=$last_id;
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."','".$nid."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        // $details = array('pid'=>$last_id,
				// 'gallery_pic'=>$fileName);
			// $this->db->insert(TBL_GALLERY,$details);
			
			
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
			 // $details = array('pid'=>$last_id,
				// 'gallery_pic'=>$fileName);
			//$this->db->insert(TBL_GALLERY,$details);
            $insert = $db->query("INSERT INTO gallery (gallery_pic,pid) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
		
		
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
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
		$fields = "a.name as product_name, a.sku, a.id as product_id, 
		 a.status,a.purchase_price,a.admin_commission_amount,a.gst_amount,a.without_gst_price,a.seller_payable_amount, a.photo, a.size, a.size_qty, a.size_price, a.weight, a.color, a.price, a.details,
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
		$data = array('name'=>$postVal['name'],
			'mrp_price'=>$postVal['mrp_price'],
			'discount_amount'=>$postVal['discount_amount'],
			'sell_price'=>$postVal['sell_price'],
			'description'=>$postVal['description'],
			'quantity'=>$postVal['quantity'],
			'hindi_desc'=>$postVal['hindi_desc'],
			'purchase_price'=>$postVal['purchase_price']
			);
		if (isset($postVal['fileDetails']['file_size']) && strlen($postVal['fileDetails']['file_size']) > 0) {
			if(CLDNRY_ACCESS) {
				if(isset($postVal['file_id']) && strlen(trim($postVal['file_id'])) > 0) {
					$this->delImageFromCloud($postVal['file_id']);
				}
				$image_url = $this->uploadImageToCloud($postVal['fileDetails']['temp_file_path'], array("folder" => date('Y') . '/' . date('m')));
				$data['file_name'] = $postVal['fileDetails']['file_name'];
				$data['file_path'] = $image_url['secure_url'];
				$data['file_id'] = $image_url['public_id'];
			}
		}
		$this->db->where('id_product',$postVal['id']);
		if($this->db->update(TBL_PRODUCT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>
