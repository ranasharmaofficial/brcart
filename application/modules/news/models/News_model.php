<?php

class news_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

				 
	/*
	 function addNews($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('english_url_title'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isUrlExists('news',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
		$data = array(
		'id_category' => strip_tags($postVal['id_category']),
		'title' => strip_tags($postVal['title']),
		'english_url_title' => strip_tags($postVal['english_url_title']),
		'details' => strip_tags($postVal['details']),
		'created_at'=>getCurrentDateTime(),
		'url_slug'=>$titleURL
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
		if($this->db->insert(TBL_NEWS,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'News Added Successfully');
		}
		return $response;
	}
	*/
	function addNews($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('title'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isUrlExists('news',$titleURL)){
                   $titleURL = $titleURL.'-'.time();
                }
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'PropertyCradle'. $file_ext;
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
			$data = array(
		'title' => strip_tags($postVal['title']),
		'details' => strip_tags($postVal['details']),
		'created_at'=>getCurrentDateTime(),
		'date'=>date('d-M-Y'),
		'file_name' => $newfilename,
		'file_path' => $x,
		'file_id' => time(),
		'url_slug'=>$titleURL
         );

		if($this->db->insert(TBL_NEWS,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'News Added Successfully');
		}
		return $response;
	}
	
	/*
     * Insert post data to table
     
    public function insert($data = array()) {
        if(!array_key_exists("created", $data)){
            $data['created_at'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified_at'] = date("Y-m-d H:i:s");
        }
        
        //insert data
        $insert = $this->db->insert('news', $data);
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }
*/
	function getAllNews($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_NEWS.' a');
		$this->db->order_by('id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.url_slug',$keyword,'both');
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
	
	function getCataa($postVal=array())
	{
		
		/*if($postVal['count']){
			$result = 0;
			$fields = "count(a.id_category) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}*/
		$result = array();
		$fields = "a.id_category,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_CATEGORY.' a');
		$this->db->order_by('id_category','DESC');
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

	function getDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_NEWS.' a');
		$this->db->where(array('a.id_product'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getCat($postVal=array()){
		$result = array(''=>'Select '.$postVal['data_type']);
		$fields = "a.id_category,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_CATEGORY.' a');
		//$this->db->where(array('a.id_parent'=>$postVal['id_parent']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id_category']] = $val['name'];
			}
		}
		return $result;
	}
	function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}
	/*function update($postVal=array()){
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
		if($this->db->update(TBL_NEWS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}*/
//End
}
?>
