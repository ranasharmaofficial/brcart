<?php

class Filterproduct_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		 $this->table = 'products';
	} 
	
	function fetch_data($limit, $start)
	{

		$this->db->select("*");
		$this->db->from("products");
		$this->db->order_by("id", "DESC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query;
	}
	
//End
}
?>
