<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class subcategories_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addSubcategories($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isSubcategoryUrlExists('subcategories',$titleURL)){
			$titleURL = $titleURL.'-'.time();
		}
		$data = array(
		'name'=>$postVal['name'],
		'category_id'=>$postVal['category_id'],
		// 'admin_commission_percentage'=>$postVal['admin_commission_percentage'],
		'slug'=>$titleURL
		);
		if($this->db->insert(TBL_SUBCATEGORY,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllSubcategories($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			$fields = "a.admin_commission_percentage,a.name as subcategory_name,a.id as subcategory_id,a.status,b.name as category_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_SUBCATEGORY.' a');
		$this->db->join(TBL_CATEGORY.' b','a.category_id=b.id','left');
		$this->db->order_by('a.id','DESC');
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
	
	function getDetails($postVal=array()){
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_SUBCATEGORY.' a');
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
			'name'=>$postVal['name'],
			'admin_commission_percentage'=>$postVal['admin_commission_percentage']
		);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_SUBCATEGORY,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
//End
}
?>