<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Teacherrequestmodel extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function getDetails($postVal=array()){
		$result = array();
		$fields ="a.*";
		$this->db->select($fields);
		$this->db->from(TBL_REGISTER_TEACHER.' a');
		$this->db->where(array('a.id_teacher_reg'=>$postVal['id']));
		$query= $this->db->get();
		if($query->num_rows()>0){
			$result=$query->row_array();
		}
		return $result;
	}

	function getAllTeacherRequest($postVal=array())
	{
		if($postVal['count']){
			$result = 0;
			$fields = "count(a.id_teacher_reg) as totalCount";
		}else{
			$result = array();
			$fields = "a.*,b.name as state_name,c.name as city_name";
		}
		$this->db->select($fields);
		$this->db->from(TBL_REGISTER_TEACHER.' a');
		$this->db->join(TBL_COUNTRY_STATE_CITY_LOCATION.' b','a.id_state=b.id','left');
		$this->db->join(TBL_COUNTRY_STATE_CITY_LOCATION.' c','a.id_city=c.id','left');
		$this->db->order_by('a.status','ASC');
		$this->db->order_by('a.id_teacher_reg','DESC');
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

	function update($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data=array('first_name'=>$postVal['first_name'],
			'last_name'=>$postVal['last_name'],
			'mobile_no'=>$postVal['mobile_no'],
			'email'=>$postVal['email'],
			'alt_mobile_no'=>$postVal['alt_mobile_no'],
			'gender'=>$postVal['gender'],
			'modified_at'=>getCurrentDateTime(),
			'modified_by'=>$postVal['action_by'],
			'status'=>$postVal['status'],
			'about_us'=>$postVal['description'],
			'specialization'=>$postVal['specialization'],
			'id_country'=>$postVal['id_country'],
			'id_state'=>$postVal['id_state'],
			'id_city'=>$postVal['id_city']
		);
		$this->db->where('id_teacher_reg',$postVal['id']);
		if($this->db->update(TBL_REGISTER_TEACHER,$data)){
			if($postVal['status']==2){
				/*Need to create a teacher account*/
				$this->addToTeacher($postVal);
				$response = array('status' => STATUS_SUCCESS, 'msg' => 'Account created successfully!');
			}else {
				$response = array('status' => STATUS_SUCCESS, 'msg' => 'Teacher record updated successfully!');
			}
		}
		return $response;
	}

	function addToTeacher($postVal=array())
	{
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$id_user = $this->createUserLogin($postVal);
		if($id_user > 0){
			$postVal['id_teacher'] = $id_user;
			$postVal['action_type'] = 'add';
			$this->addTeacherDetails($postVal);
			$this->addTeacherStateCity($postVal);
		}
		return $response;
	}

	function createUserLogin($postVal=array())
	{
		$id_user = 0;
		$data = array('created_at'=>getCurrentDateTime(),
			'created_by'=>$postVal['action_by'],
			'status'=>2,
			'is_staff'=>'N',
			'id_user_type'=>$this->config->item('customer_user_type'),
			'id_role'=>$this->config->item('customer_teacher_role'),
			'first_name'=>convertToFirstUpper($postVal['first_name']),
			'last_name'=>convertToFirstUpper($postVal['last_name']),
			'email'=>convertToAllLower($postVal['email']),
			'mobile_no'=>$postVal['mobile_no'],
			'alt_mobile_no'=>$postVal['alt_mobile_no']
		);
		if($this->db->insert(TBL_USER,$data)){
			$id_user = $this->db->insert_id();
			/*Create a login*/
			$loginData = array('status'=>2,
				'id_user'=>$id_user,
				'username'=>convertToAllLower($postVal['email']),
				'password'=>md5('ctaoi@123'));
			$this->db->insert(TBL_USER_LOGINS,$loginData);
		}
		/*
		 * Add to Email Queue
		 * */
		return $id_user;
	}

	function addTeacherDetails($postVal=array()){
		$data = array('id_teacher'=>$postVal['id_teacher'],
			'about_us'=>$postVal['description'],
			'specialization'=>$postVal['specialization']);
		if(isset($postVal['action_type']) && $postVal['action_type']=='add') {
			if($this->db->insert(TBL_TEACHER_DETAILS,$data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}elseif(isset($postVal['action_type']) && $postVal['action_type']=='update'){
			unset($data['id_teacher']);
			$this->db->where('id_teacher',$postVal['id_teacher']);
			if($this->db->update(TBL_TEACHER_DETAILS,$data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		return TRUE;
	}

	function addTeacherStateCity($postVal=array()){
		$data = array('id_teacher'=>$postVal['id_teacher'],
			'id_state'=>$postVal['id_state'],
			'id_city'=>$postVal['id_city']);
		if(isset($postVal['action_type']) && $postVal['action_type']=='add') {
			if($this->db->insert(TBL_TEACHER_AREA,$data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}elseif(isset($postVal['action_type']) && $postVal['action_type']=='update'){
			unset($data['id_teacher']);
			$this->db->where('id_teacher',$postVal['id_teacher']);
			if($this->db->update(TBL_TEACHER_AREA,$data)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		return TRUE;
	}
//End
}
?>
