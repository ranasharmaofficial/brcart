<?php
/**
 * Created by IntelliJ IDEA.
 * User: Rana Sharma
 */
class Dashboard extends Admincontroller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        // redirect(WEB_URL.'papa/logout');
        $seller_type = $this->id_seller_type;
        switch ($seller_type) {
            case 1:
                $this->myDashboard();
                break;
            case 2:
                $this->myDashboard();
                break;
            case 3:
                $this->sellerDashboard();
                break;
            default:
                $this->myDashboard();
        }
    }

    public function myDashboard()
    {
        $data['totalPendingOrder'] = $this->dashboard_model->getTotalPendingOrder();
        $data['totalApprovedOrder'] = $this->dashboard_model->getTotalApprovedOrder();
        $data['totalShippedOrder'] = $this->dashboard_model->getTotalShippedOrder();
        $data['totalDeliveredOrder'] = $this->dashboard_model->getTotalDeliveredOrder();
        $data['totalCancelReqOrder'] = $this->dashboard_model->getTotalCancelReqOrder();
        $data['totalCancelledOrder'] = $this->dashboard_model->getTotalCancelledOrder();
        $data['totalCodOrder'] = $this->dashboard_model->getTotalCodOrder();
        $data['totalNonCodOrder'] = $this->dashboard_model->getTotalNonCodOrder();
        $data['totalProducts'] = $this->dashboard_model->getTotalProducts();
        $data['totalOrders'] = $this->dashboard_model->getTotalOrder();
        $data['totalUser'] = $this->dashboard_model->getTotalUser();
        $data['totalSeller'] = $this->dashboard_model->getTotalSeller();
        $data['pvalue'] = array('view' => 'dashboard_view', 'page_heading' => 'Dashboard');
        $this->loadView($data);
    }

    public function changePassword()
    {
        if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
            if ($this->form_validation->run('change_password') == true) {
                $_POST['id_user'] = $this->id_user;
                $_POST['action_by'] = $this->id_user;
                $response = $this->dashboard_model->updatePassword($_POST);
                $this->setSuccessFailMessage($response);
                if ($response['status'] == STATUS_SUCCESS) {
                    redirect(WEB_URL . 'dashboard/changePassword');
                }
            }
        } elseif (isset($_POST['reset']) && $_POST['reset'] == 'reset') {
            redirect(WEB_URL . 'dashboard/changePassword');
        }
        $data['pvalue'] = array('view' => 'change_password_view', 'page_heading' => 'Change Password');
        $this->loadView($data);
    }

    public function check_old_password()
    {
        $postVal = $_POST;
        $postVal['id_user'] = $this->id_user;
        $response = $this->dashboard_model->check_old_password($postVal);
        if (!$response) {
            $this->form_validation->set_message('check_old_password', 'Please enter correct old password!');
            return false;
        } else {
            return true;
        }
    }
//End
}