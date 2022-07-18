<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class Childcategories_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addChildCategory($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isChildcategoryUrlExists('childcategories',$titleURL)){
			$titleURL = $titleURL.'-'.time();
		}
		$data = array
		(
		'subcategory_id'=>$postVal['subcategory_id'],
		'name'=>$postVal['name'],
		'slug'=>$titleURL
		);
		if($this->db->insert(TBL_CHILDCATEGORY,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllChildCategories($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			$fields = "a.name as childcategories_name,a.id as childcategories_id,a.status,b.name as subcategory_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_CHILDCATEGORY.' a');
		$this->db->join(TBL_SUBCATEGORY.' b','a.subcategory_id=b.id','inner');
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.name',$keyword,'both');
			}
		} 
		// select a.name as city_name,a.id as city_id,a.status,b.name as state_name from cities 
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
	
	function getSubcategoryName($postVal=array()){
		$result = array(''=>'Select ');
		$fields = "a.id,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_CATEGORY.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		//$this->db->where(array('a.id_parent'=>$postVal['id_parent']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id']] = $val['name'];
			}
		}
		return $result;
	}
	
	function getDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CHILDCATEGORY.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array('name'=>$postVal['name']);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_CHILDCATEGORY,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>
