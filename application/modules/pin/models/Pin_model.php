<?php

class Pin_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addPin($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'pin'=>$postVal['pin'],
			'place'=>$postVal['place'],
			'state'=>$postVal["state"],
			'cod'=>$postVal["cod"],
			'cod_limit'=>$postVal["cod_limit"]
		);
		if($this->db->insert(TBL_PIN,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}
	
	function addPinCharge($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'pin'=>$postVal['pin'],
			'order_amount'=>$postVal['order_amount'],
			'delivery_amount'=>$postVal["delivery_amount"]
		);
		if($this->db->insert(TBL_PIN_CHARGE,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Charge Added Successfully');
		}
		return $response;
	}

	function getAllPin($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_PIN.' a');
		$this->db->order_by('id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.pin',$keyword,'both');
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
		$this->db->from(TBL_PIN.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	
	function getBrandDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_BRAND.' a');
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
			'pin'=>$postVal['pin'],
			'place'=>$postVal['place'],
			'state'=>$postVal["state"],
			'cod'=>$postVal["cod"],
			'cod_limit'=>$postVal["cod_limit"]
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_PIN,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function updateCharge($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'order_amount'=>$postVal['order_amount'],
			'delivery_amount'=>$postVal["delivery_amount"]
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_PIN_CHARGE,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
	function updateBrandPicture($postVal=array()){
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
		'photo'=>$data["file_name"]
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_BRAND,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
	
	
	function updateBrand($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'brand'=>$postVal['brand']
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_BRAND,$data)){
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
			'photo'=>$data["file_name"]);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_PIN,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Picture Updated successfully!');
		}
		return $response;
	}
//End
}
?>
