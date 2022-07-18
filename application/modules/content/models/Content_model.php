<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class content_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addContent($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('title'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isContentUrlExists('pages',$titleURL.'.html')){
			$titleURL = $titleURL.'-'.time();
		}
		$data = array(
			'title'=>$postVal['title'],
			'details'=>$postVal['details'],
			'meta_tag'=>$postVal['meta_tag'],
			'meta_description'=>$postVal['meta_description'],
			'slug'=>$titleURL.'.html'
		);
		if($this->db->insert(TBL_CONTENT,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllContent($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_CONTENT.' a');
		$this->db->order_by('id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.title',$keyword,'both');
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
		$this->db->from(TBL_CONTENT.' a');
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
		'title'=>$postVal['title'],
		'details'=>$postVal['details'],
		'meta_description'=>$postVal['meta_description'],
		'meta_tag'=>$postVal['meta_tag'],
		'slug'=>$postVal['slug']);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_CONTENT,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
//End
}
?>
