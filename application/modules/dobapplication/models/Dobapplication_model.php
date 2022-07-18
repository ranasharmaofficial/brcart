<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class dobapplication_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function addhospital($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$english_url_title = strip_tags($this->input->post('name'));
		$titleURL = strtolower(url_title($english_url_title));
		if(isSubcategoryUrlExists('hospitals',$titleURL)){
			$titleURL = $titleURL.'-'.time();
		}
		$data = array(
		'name'=>$postVal['name'],
		'state_id'=>$postVal['state_id'],
		// 'admin_commission_percentage'=>$postVal['admin_commission_percentage'],
		'slug'=>$titleURL
		);
		if($this->db->insert(TBL_HOSPITAL,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}

	function getAllDobApplication($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
			// $fields = "a.name as subcategory_name,a.id as subcategory_id,a.status,b.name as category_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_BIRTHDAY_APPLICATION.' a');
		// $this->db->join(TBL_STATE.' b','a.state_id=b.id','left');
		$this->db->where('status','1');
		$this->db->order_by('a.id','DESC');
		if(is_array($postVal['searchVal']) && count($postVal['searchVal'])){
			$keyword = $postVal['searchVal']['keyword'];
			if($keyword){
				$this->db->like('a.aadhar_no',$keyword,'both');
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
		$this->db->from(TBL_STATE.' a');
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
		$this->db->from(TBL_BIRTHDAY_APPLICATION.' a');
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
			'name'=>$postVal['name']
			);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_HOSPITAL,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	function uploadCertificate($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$config3['upload_path']   = './dob_application/';
			$config3['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG|JPEG|GIF|PDF|pdf';
			$config3['max_size']      = 2048;
			$this->load->library('upload', $config3);
			$this->upload->initialize($config3);
			$this->upload->do_upload('dob_certificate');
			$dob_certificate = $this->upload->data();
		$data = array(
			'dob_certificate'=>$dob_certificate['file_name'],
			'upload_time'=>getCurrentDateTime(),
			'status'=>2,
			'payment_status'=>3,
			);
		$this->db->where('id',$postVal['dob_appl_id']);
		if($this->db->update(TBL_BIRTHDAY_APPLICATION,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
	}
	
//End
}
?>