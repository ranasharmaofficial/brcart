<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana
 */
class Dashboard_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function updatePassword($postVal = array())
    {
        $response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
        $data = array('modified_by' => $postVal['action_by'], 'modified_at' => getCurrentDateTime(), 'password' => md5($postVal['new_password']));
        $this->db->where('id_user', $postVal['id_user']);
        if ($this->db->update(TBL_USER_LOGINS, $data)) {
            $response = array('status' => STATUS_SUCCESS, 'msg' => 'Password updated Successfully!');
        }
        return $response;
    }

    public function check_old_password($postVal = array())
    {
        $return = false;
        $fields = "a.id_login";
        $this->db->select($fields);
        $this->db->from(TBL_USER_LOGINS . ' a');
        $this->db->where(array('a.id_user' => $postVal['id_user'], 'a.password' => md5($postVal['oldpassword'])));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $return = true;
        }
        return $return;
    }
    public function gettotalEnquiryCount()
    {
        $total = 0;
        $fields = "count(a.id) as totalEnquiry";
        $this->db->select($fields);
        $this->db->from(TBL_ENQUIRY . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalEnquiry'];
        }
        return $total;
    }

    public function getTotalProducts()
    {
        $total = 0;
        $fields = "count(a.id) as totalProducts";
        $this->db->select($fields);
        $this->db->from(TBL_PRODUCT . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalProducts'];
        }
        return $total;
    }

    public function getTotalUser()
    {
        $total = 0;
        $fields = "count(a.id_user) as totalUser";
        $this->db->select($fields);
        $this->db->from(TBL_USER . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalUser'];
        }
        return $total;
    }
    public function getTotalSeller()
    {
        $total = 0;
        $fields = "count(a.id) as totalSeller";
        $this->db->select($fields);
        $this->db->from(TBL_SELLER . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalSeller'];
        }
        return $total;
    }

    public function getTotalPendingOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalPendingOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalPendingOrder'];
        }
        return $total;
    }
	public function getTotalOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        // $this->db->where('delivery_status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalOrder'];
        }
        return $total;
    }

    public function getTotalApprovedOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalApprovedOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalApprovedOrder'];
        }
        return $total;
    }
    public function getTotalShippedOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalShippedOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 3);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalShippedOrder'];
        }
        return $total;
    }
    public function getTotalDeliveredOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalDeliveredOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 4);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalDeliveredOrder'];
        }
        return $total;
    }
    public function getTotalCancelReqOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalCancelReqOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 5);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalCancelReqOrder'];
        }
        return $total;
    }
    public function getTotalCancelledOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalCancelledOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDER_DETAILS . ' a');
        $this->db->where('delivery_status', 6);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalCancelledOrder'];
        }
        return $total;
    }
    public function getTotalCodOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalCodOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDERS . ' a');
        $this->db->where('payment_mode', 'COD');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalCodOrder'];
        }
        return $total;
    }
    public function getTotalNonCodOrder()
    {
        $total = 0;
        $fields = "count(a.id) as totalNonCodOrder";
        $this->db->select($fields);
        $this->db->from(TBL_ORDERS . ' a');
        $this->db->where('payment_mode', 'ONLINE');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalNonCodOrder'];
        }
        return $total;
    }

    public function getSubscriptionCount()
    {
        $total = 0;
        $fields = "count(a.id) as totalSubscription";
        $this->db->select($fields);
        $this->db->from(TBL_EMAIL_SUBSCRIBE . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalSubscription'];
        }
        return $total;
    }

    public function getPropertyReqCount()
    {
        $total = 0;
        $fields = "count(a.id_preq) as totalProReqCount";
        $this->db->select($fields);
        $this->db->from(TBL_PROPERTY_REQUEST . ' a');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalProReqCount'];
        }
        return $total;
    }

    public function getPendingProperty()
    {
        $total = 0;
        $fields = "count(a.id) as totalPendingPropertyCount";
        $this->db->select($fields);
        $this->db->from(TBL_PROPERTY_DETAILS . ' a');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalPendingPropertyCount'];
        }
        return $total;
    }

    public function getVerifiedProperty()
    {
        $total = 0;
        $fields = "count(a.id) as totalVerifiedPropertyCount";
        $this->db->select($fields);
        $this->db->from(TBL_PROPERTY_DETAILS . ' a');
        $this->db->where('a.status', 2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $total = $row['totalVerifiedPropertyCount'];
        }
        return $total;
    }
    /*
    function getTeacherReqCount()
    {
    $total = 0;
    $fields = "count(a.id_teacher_reg) as totalCount";
    $this->db->select($fields);
    $this->db->from(TBL_REGISTER_TEACHER.' a');
    $this->db->where('a.status',1);
    $query = $this->db->get();
    if($query->num_rows() > 0){
    $row = $query->row_array();
    $total = $row['totalCount'];
    }
    return $total;
    }

     */

//End
}