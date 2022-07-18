<?php

class Ads_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addSlider($postVal=array()){
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
                     $config['maintain_ratio'] = TRUE;  
                     $config['quality'] = '60%';  
                     $config['width'] = 350;  
                     $config['height'] = 250;  
                     $config['new_image'] = './uploads/'.$data["file_name"]; 
					$this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                    
                }  
           }
		$data = array(
			'date'=>date('d-m-Y'),
			'short_title'=>$postVal['short_title'],
			'long_title'=>$postVal['long_title'],
			'discount'=>$postVal['sale_discount'],
			'link'=>$postVal['link'],
			'text_color'=>$postVal['text_color'],
			'category'=>$postVal['category'],
			'picture'=>$data["file_name"]
		);
		if($this->db->insert(TBL_ADS,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}


	function getAllAds($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_ADS.' a');
		$this->db->order_by('id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			
			if($keyword){
				$this->db->like('short_title',$keyword,'both');
				// $this->db->orLike('keyword',$keyword,'both');
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
		$this->db->from(TBL_ADS.' a');
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
		'category'=>$postVal['category'],
		'short_title'=>$postVal['short_title'],
		'long_title'=>$postVal['long_title'],
		'discount'=>$postVal['sale_discount'],
		'link'=>$postVal['link'],
		'text_color'=>$postVal['text_color']
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_ADS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	
	
	
	
	function updateCatPicture($postVal=array()){
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
                     $config['maintain_ratio'] = TRUE;  
                     $config['quality'] = '60%';  
                     $config['width'] = 350;  
                     $config['height'] = 250;  
                     $config['new_image'] = './uploads/'.$data["file_name"]; 
					$this->load->library('image_lib', $config);  
                     $this->image_lib->resize();  
                    
                }  
           }
		$data = array(
			'picture'=>$data["file_name"]);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_ADS,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
//End
}
?>
