<?php


class Adm_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function checkLogin($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN,'data'=>array());
		$fields = "a.id_user,b.first_name,b.id_seller_type,b.id_role";
		$this->db->select($fields);
		$this->db->from(TBL_USER_LOGINS.' a');
		$this->db->join(TBL_USER.' b','a.id_user=b.id_user AND b.is_staff = "Y" ','inner');
		$this->db->where(array('a.status'=>2,'a.username'=>trim($postVal['username']),'a.password'=>md5(trim($postVal['password']))));
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
			$response = array('status' => STATUS_SUCCESS, 'msg' => STATUS_SUCCESS,'data'=>$result);
		}
		return $response;
	}
//End
}
?>
