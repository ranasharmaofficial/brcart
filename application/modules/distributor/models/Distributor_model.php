<?php

class Distributor_model extends MY_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->table = 'users'; 
		$this->distributorID = $this->session->userdata('distributorId');
	}
	public function getDobAmount()
    {
        $total = 0;
        $fields = "a.dob_amount as dateOfBirth";
		$this->db->select($fields);
        $this->db->from(TBL_APPLICATION_AMOUNT. ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['dateOfBirth'];
        }
        return $total;
    }
	public function getDeathAmount()
    {
        $total = 0;
        $fields = "a.death_amount as deathAmount";
		$this->db->select($fields);
        $this->db->from(TBL_APPLICATION_AMOUNT. ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['deathAmount'];
        }
        return $total;
    }
	
    function addDOBApplcation($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$dobAmount = $this->getDobAmount();
		$data = array(
			'type'=>1,
			'name'=>$postVal['name'],
			'distributor_id'=> $this->distributorId,
			'aadhar_no'=>$postVal['aadhar_no'],
			'gender'=>$postVal['gender'],
			'dob'=>$postVal['dob'],
			'dob_inwords'=>$postVal['dob_inwords'],
			'place_of_birth'=>$postVal['place_of_birth'],
			'fathersname'=>$postVal['fathersname'],
			'fatheraadhar'=>$postVal['fatheraadhar'],
			'mothersname'=>$postVal['mothersname'],
			'motheraadhar'=>$postVal['motheraadhar'],
			'permanent_address'=>$postVal['permanent_address'],
			'address_of_birth'=>$postVal['address_of_birth'],
			'dob_registration'=>$postVal['dob_registration'],
			'state'=>$postVal['state'],
			'amount'=>$dobAmount
			
		);
		if($this->db->insert(TBL_BIRTHDAY_APPLICATION,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}
	function addDeathApplcation($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$deathAmount = $this->getDeathAmount();
		$data = array(
			'type'=>2,
			'name'=>$postVal['name'],
			'distributor_id'=> $this->distributorId,
			'aadhar_no'=>$postVal['aadhar_no'],
			'gender'=>$postVal['gender'],
			'dob'=>$postVal['dob'],
			'dob_inwords'=>$postVal['dob_inwords'],
			'place_of_birth'=>$postVal['place_of_birth'],
			'fathersname'=>$postVal['fathersname'],
			'fatheraadhar'=>$postVal['fatheraadhar'],
			'mothersname'=>$postVal['mothersname'],
			'motheraadhar'=>$postVal['motheraadhar'],
			'permanent_address'=>$postVal['permanent_address'],
			'address_of_birth'=>$postVal['address_of_birth'],
			'dob_registration'=>$postVal['dob_registration'],
			'state'=>$postVal['state'],
			'amount'=>$deathAmount
			
		);
		if($this->db->insert(TBL_BIRTHDAY_APPLICATION,$data)) {
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Added Successfully');
		}
		return $response;
	}
	public function num_rows()
  {
	$id=$this->session->userdata('userId');
	$fields = "a.*";
    $q=$this->db->select()
            ->from(TBL_BIRTHDAY_APPLICATION.' a')
			->where('distributor_id', $this->distributorId)
			->where('type',1)
            ->get();
           return $q->num_rows();

  }
  public function death_num_rows()
  {
	$id=$this->session->userdata('userId');
	$fields = "a.*";
    $q=$this->db->select()
            ->from(TBL_BIRTHDAY_APPLICATION.' a')
			->where('distributor_id', $this->distributorId)
			->where('type',2)
            ->get();
           return $q->num_rows();

  }
	function getAllApplicationList($limit,$offset)
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_BIRTHDAY_APPLICATION.' a');
		$this->db->where('distributor_id',$this->distributorId);
		$this->db->where('type',1);
		$this->db->limit($limit,$offset);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}
	function getDeathApplicationList($limit,$offset)
	{
		$result = array();
		$fields = "a.*";
		$this->db->select($fields);
		$this->db->from(TBL_BIRTHDAY_APPLICATION.' a');
		$this->db->where('distributor_id',$this->distributorId);
		$this->db->where('type',2);
		$this->db->limit($limit,$offset);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		return $result;
	}
	
    function getAllApplicationListss($postVal=array())
	{
		if(isset($postVal['count'])){
			$result = 0;
			$fields = "count(a.id) as totalCount";
		}else{
			$result = array();
			$fields = "a.*";
		}
		$this->db->select($fields);
		$this->db->from(TBL_BIRTHDAY_APPLICATION.' a');
		$this->db->where('distributor_id', $this->distributorId);
		$this->db->order_by('id','DESC');
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
	function getStateId($postVal=array()){
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
	public function getTotalApplication()
    {
        $total = 0;
        $fields = "count(a.id) as totalApplication";
        $this->db->select($fields);
        $this->db->from(TBL_BIRTHDAY_APPLICATION . ' a');
		$this->db->where('distributor_id', $this->distributorId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalApplication'];
        }
        return $total;
    }
    
	function makePaymenySuccess($postVal=array()){
		$response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
		$data = array(
			'payment_status'=>2,
			'transaction_id'=>rand(999999,889988).date('dY'),
			'payment_id'=>$this->input->post('razorpay_payment_id'),
			'payment_time'=>getCurrentDateTime(),
			);
		$this->db->where('id',$postVal['id']);
		if($this->db->update(TBL_BIRTHDAY_APPLICATION,$data)){
			$response = array('status' => STATUS_SUCCESS, 'msg' => 'Updated successfully!');
		}
		return $response;
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
	
	
	
//End
}
?>