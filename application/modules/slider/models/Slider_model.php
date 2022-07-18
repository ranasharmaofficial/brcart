<?php

class slider_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addSliders($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		if(isset($_FILES["image_file"]["name"]))  
           {  
				
                $config['upload_path'] = './uploads/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif|svg|WebP|webp';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
                     $data = $this->upload->data();  
                     $config['image_library'] = 'gd2';  
                     $config['source_image'] = './uploads/'.$data["file_name"];  
                     $config['create_thumb'] = FALSE;  
                     $config['maintain_ratio'] = FALSE;  
                     $config['quality'] = '60%';  
                     $config['width'] = 350;  
                     $config['height'] = 250;  
                     $config['new_image'] = './uploads/'.$data["file_name"]; 
					$this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                    
                }  
           }
		$data = array(
			'name'=>$postVal['name'],
			'photo'=>$data["file_name"],
			'slug'=>$titleURL
		);
		if($this->db->insert(TBL_CATEGORY,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function addSlider($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		
		$filename = $_FILES["sliderfile"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["sliderfile"]["size"];
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
				move_uploaded_file($_FILES["sliderfile"]["tmp_name"], "./uploads/" . $newfilename);
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
			'short_title'=>$postVal['short_title'],
			'long_title'=>$postVal['long_title'],
			'sale_discount'=>$postVal['sale_discount'],
			'link'=>$postVal['link'],
			'text_color'=>$postVal['text_color'],
			'slider_pic'=>$newfilename
		);
		if($this->db->insert(TBL_SLIDER,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}


	function getAllSlider($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_SLIDER.' a');
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
		$this->db->from(TBL_SLIDER.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	
	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'short_title'=>$postVal['short_title'],
		'long_title'=>$postVal['long_title'],
		'sale_discount'=>$postVal['sale_discount'],
		'link'=>$postVal['link'],
		'text_color'=>$postVal['text_color']
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_SLIDER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	
	
	
	
	function updateCatPicture($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		 $filename = $_FILES["sliderfile"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["sliderfile"]["size"];
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
				move_uploaded_file($_FILES["sliderfile"]["tmp_name"], "./uploads/" . $newfilename);
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
			'slider_pic'=>$newfilename);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_SLIDER,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
//End
}
?>
