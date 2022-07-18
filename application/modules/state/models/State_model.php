<?php

class state_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addState($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'name'=>$postVal['name'],
		'country_id'=>$postVal['country_id']
		);
		if($this->db->insert(TBL_STATE,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllState($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			$fields = "a.name as state_name,a.id as state_id,a.status,b.name as country_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_STATE.' a');
		$this->db->join(TBL_COUNTRY.' b','a.country_id=b.id','left');
		$this->db->order_by('country_id','DESC');
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
	function getCountryId($postVal=array()){
		$result = array(''=>'Select '.$postVal['data_type']);
		$fields = "a.id,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_COUNTRY.' a');
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
		$this->db->from(TBL_STATE.' a');
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
		if($this->db->update(TBL_STATE,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>
