<?php

class User_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getAllUser($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id_user) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_USER.' a');
		$this->db->order_by('id_user','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if(FALSE && $keyword){
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
		$this->db->from(TBL_USER.' a');
		$this->db->where(array('a.id_user'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	function getTotalPurchasedProducts($postVal=array()){
		$result = 0;
		$fields = "sum(a.total_item) as totalpp";
		$this->db->Select($fields);
		$this->db->from(TBL_ORDERS.' a');
		$this->db->where(array('a.user_id'=>$postVal['id']));
		$query = $this->db->get();
		// if($query->num_rows() > 0){
		// 	$result = $query->row_array();
		// }
		if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $result = $row['totalpp'];
        }
		return $result;
	}
	
	
	function getAllUserAddress($postVal=array())
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_CUSTOMER_ADDRESS.' a');
		$this->db->where(array('a.user_id'=>$postVal['id']));
		$this->db->order_by('id', 'DESC');
		if(isset($postVal['limit']) && $postVal['limit'] > 0) {
			$this->db->limit($postVal['limit']);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = $query->result_array();
		}
		return $result;
	}
	
	
	
	function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}
//End
}
?>