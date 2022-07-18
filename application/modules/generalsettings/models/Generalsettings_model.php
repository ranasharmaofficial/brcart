<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Generalsettings_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	

	function getAllCategory($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_CATEGORY.' a');
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
		$this->db->from(TBL_LOGO.' a');
		$this->db->where(array('a.id'=>1));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getAddressDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_ADDRESS.' a');
		$this->db->where(array('a.id_address'=>1));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	function getSocialMediaLinks($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SOCIAL_MEDIA.' a');
		$this->db->where(array('a.id_socialmedia'=>3));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'name'=>$postVal['name'],
		'slug'=>$postVal['slug']
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_CATEGORY,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function updateCatPicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
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
		$data = array('image'=>$x,
			'photo'=>$newfilename);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_CATEGORY,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	function updateHeaderPicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'u-baazar'. $file_ext;
			if (file_exists(".'.WEB_ATTACHMENT_LOGO_PATH.'" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "./logo/" . $newfilename);
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
		$x=''.WEB_ATTACHMENT_LOGO_PATH.''.$newfilename;
		$data = array('header_logo'=>$newfilename);
		$this->db->where('id',1);
		if($this->db->update(TBL_LOGO,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	function updateFooterPicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'u-baazar'. $file_ext;
			if (file_exists(".'.WEB_ATTACHMENT_LOGO_PATH.'" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "./logo/" . $newfilename);
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
		$x=''.WEB_ATTACHMENT_LOGO_PATH.''.$newfilename;
		$data = array('footer_logo'=>$newfilename);
		$this->db->where('id',1);
		if($this->db->update(TBL_LOGO,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	function updateInvoicePicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'u-baazar'. $file_ext;
			if (file_exists(".'.WEB_ATTACHMENT_LOGO_PATH.'" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "./logo/" . $newfilename);
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
		$x=''.WEB_ATTACHMENT_LOGO_PATH.''.$newfilename;
		$data = array('invoice_logo'=>$newfilename);
		$this->db->where('id',1);
		if($this->db->update(TBL_LOGO,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	function updateFavicon($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$filename = $_FILES["file"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["file"]["size"];
		$allowed_file_types = array('.gif','.png','.JPG','.jpg','.PNG','.jpeg','.WebP','.svg');
		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
		{
			$t=time();
			$newfilename = $file_basename. $t .'u-baazar'. $file_ext;
			if (file_exists(".'.WEB_ATTACHMENT_LOGO_PATH.'" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "./logo/" . $newfilename);
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
		$x=''.WEB_ATTACHMENT_LOGO_PATH.''.$newfilename;
		$data = array('favicon'=>$newfilename);
		$this->db->where('id',1);
		if($this->db->update(TBL_LOGO,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	function updateWebsiteAddress($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'address'=>$postVal['address'],
		'mobile'=>$postVal['mobile'],
		'email'=>$postVal['email']
		);
		$this->db->where('id_address',1);
		if($this->db->update(TBL_ADDRESS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => ' Updated successfully!');
		}
		return $response;
	}
	function updateSocial($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'facebook'=>$postVal['facebook'],
		'twitter'=>$postVal['twitter'],
		'instagram'=>$postVal['instagram'],
		'linkedin'=>$postVal['linkedin'],
		'whatsapp'=>$postVal['whatsapp']
		);
		$this->db->where('id_socialmedia',3);
		if($this->db->update(TBL_SOCIAL_MEDIA,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	function fetchApplicationAmount($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_APPLICATION_AMOUNT.' a');
		$this->db->where(array('a.id'=>1));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function updateRetailerAmount($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$retailer_amount = $this->input->post('retailer_amount');
		$data = array('retailer_amount'=>$retailer_amount);
		$this->db->where('id',1);
		if($this->db->update(TBL_APPLICATION_AMOUNT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function updateDistributorAmount($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$distributor_amount = $this->input->post('distributor_amount');
		$data = array('distributor_amount'=>$distributor_amount);
		$this->db->where('id',1);
		if($this->db->update(TBL_APPLICATION_AMOUNT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function updateDobAmount($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$dob_amount = $this->input->post('dob_amount');
		$data = array('dob_amount'=>$dob_amount);
		$this->db->where('id',1);
		if($this->db->update(TBL_APPLICATION_AMOUNT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function updateDeathAmount($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$death_amount = $this->input->post('death_amount');
		$data = array('death_amount'=>$death_amount);
		$this->db->where('id',1);
		if($this->db->update(TBL_APPLICATION_AMOUNT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
//End
}
?>