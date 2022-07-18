<?php

class vendor_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getAllVendor($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_SELLER.' a');
		$this->db->order_by('id','DESC');
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
	function getSellerDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SELLER.' a');
		$this->db->where(array('a.id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
		}
		return $result;
	}
	function getTotalSellerProduct($postVal=array()){
		$total = 0;
		$fields = "count(a.id) as totalSellerProduct";
		$this->db->select($fields);
		$this->db->from(TBL_VENDOR_PRODUCT.' a');
		$this->db->where(array('vendor_id'=>$postVal['id']));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['totalSellerProduct'];
		}
		return $total;
	}
	
	function getTotalSellerOrder($postVal=array()){
		$total = 0;
		$fields = "count(a.id) as TotalSellerOrder";
		$this->db->select($fields);
		$this->db->from(TBL_ORDER_DETAILS.' a');
		$this->db->where('seller_id',$postVal['id']);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$total = $row['TotalSellerOrder'];
		}
		return $total;
	}
	function deleteData($tablename,$where)
	{
		$query = $this->db->delete($tablename,$where);
		return $query;
	}
//End
}
?>
