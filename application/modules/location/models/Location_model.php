<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class location_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addLocation($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
		'name'=>$postVal['name'],
		'id_state'=>$postVal['id_state'],
		'id_city'=>$postVal['id_city'],
		'id_country'=>$postVal['id_country']
		);
		if($this->db->insert(TBL_LOCATION,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllLocation($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id_location) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			$fields = "a.name as location_name,a.id_location as location_id,a.status,tc.name as country_name,ts.name as state_name,tci.name as city_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_LOCATION.' a');
		$this->db->join(TBL_COUNTRY.' tc','a.id_country=tc.id','inner');
		$this->db->join(TBL_STATE.' ts','a.id_state=ts.id','inner');
		$this->db->join(TBL_CITY.' tci','a.id_city=tci.id','inner');
		$this->db->order_by('id_location','DESC');
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
		$fields = "a.id_country,a.name";
		$this->db->select($fields);
		$this->db->from(TBL_COUNTRY.' a');
		//$this->db->where(array('a.id_parent'=>$postVal['id_parent']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $val){
				$result[$val['id_country']] = $val['name'];
			}
		}
		return $result;
	}
	
	function getDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CITY.' a');
		$this->db->where(array('a.id_city'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}

	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array('name'=>$postVal['name']);
		$this->db->where('id_city',$postVal['id']);
		if($this->db->update(TBL_CITY,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>
