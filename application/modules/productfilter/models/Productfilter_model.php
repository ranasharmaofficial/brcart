<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Productfilter_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addCategory($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isUrlExists('productfilter',$titleURL)){
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
		$data = array(
			'name'=>$postVal['name'],
			'image'=>$x,
			'photo'=>$newfilename,
			'slug'=>$titleURL
		);
		if($this->db->insert(TBL_PRODUCT,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllProductbyFilter($postVal=array())
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

	function getDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_PRODUCT.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	
//End
}
?>
