<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 */
class Contactus_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addContact($postVal = array())
    {
        $response = array('status' => STATUS_FAIL, 'msg' => PLEASE_TRY_AGAIN);
        $dateTime = getCurrentDateTime();
        $postVal['subject'] = "Inquiry - " . $dateTime;
        $data = array('name' => $postVal['name'],
            'mobile' => $postVal['mobile'],
            'message' => $postVal['message'],
            'email' => $postVal['email'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'created_at' => $dateTime,
        );
        if ($this->db->insert(TBL_ENQUIRY, $data)) {
            // if (EMAIL_SEND_STATUS) {
            //     $this->load->library('email_lib');
            //     $message = "Enquery " . $dateTime . "<br>";
            //     $message .= "Name " . $postVal['name'] . "<br>";
            //     $message .= "Mobile " . $postVal['mobile'] . "<br>";
            //     $message .= "Email " . $postVal['email'] . "<br>";
            //     $message .= "Message " . $postVal['message'] . "<br>";
            //     $postVal = array('from' => $this->config->item('email_from'), 'to' => $this->config->item('enquiry_send_to'), 'subject' => $postVal['subject'], 'message' => $message);
            //     $this->email_lib->sendMail($postVal);
            //     /*Add To Email Queue*/
            //     $this->load->model('notification/notification_model', 'notification_model');
            //     $messageData = array('sent_status' => $this->config->item('email_send_status'),
            //         'from' => $this->config->item('email_from'),
            //         'to_email' => $this->config->item('enquiry_send_to'),
            //         'subject' => $postVal['subject'],
            //         'message' => $postVal['message'],
            //     );
            //     $this->notification_model->addToEmailQueue($messageData);
            // }
            $response = array('status' => STATUS_SUCCESS, 'msg' => 'Thank you for enquiry with us!');
        }
        return $response;
    }
//End
}