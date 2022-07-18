<?php
/**
 * Created by IntelliJ IDEA.
 * User: Deepak
 * Date: 20/1/20
 * Time: 11:53 AM
 */

use SendGrid\Mail\To;
use SendGrid\Mail\Cc;
use SendGrid\Mail\Bcc;
use SendGrid\Mail\From;
use SendGrid\Mail\Content;
use SendGrid\Mail\Mail;
use SendGrid\Mail\Personalization;
use SendGrid\Mail\Subject;
use SendGrid\Mail\Header;
use SendGrid\Mail\CustomArg;
use SendGrid\Mail\SendAt;
use SendGrid\Mail\Attachment;
use SendGrid\Mail\Asm;
use SendGrid\Mail\MailSettings;
use SendGrid\Mail\BccSettings;
use SendGrid\Mail\SandBoxMode;
use SendGrid\Mail\BypassListManagement;
use SendGrid\Mail\Footer;
use SendGrid\Mail\SpamCheck;
use SendGrid\Mail\TrackingSettings;
use SendGrid\Mail\ClickTracking;
use SendGrid\Mail\OpenTracking;
use SendGrid\Mail\SubscriptionTracking;
use SendGrid\Mail\Ganalytics;
use SendGrid\Mail\ReplyTo;

class Email_lib{

	public function __construct(){
		$this->ci =& get_instance();
		$this->ci->config->load('custom_config');
	}

	function sendMail($postVal=array()){
	    if(is_array($postVal) && count($postVal) == 0){
            $response = array('status'=>STATUS_FAIL,'msg'=>'Please provide the data','data'=>array('sendgrid_id'=>0));
            return $response;
        }
		$response = array('status'=>STATUS_FAIL,'msg'=>'Fail','data'=>array('sendgrid_id'=>0));
		if($this->ci->config->item('notification_status_mode')=='test'){
			$postVal['to'] = $this->ci->config->item('enquiry_send_to');
		}
		$sendGrid = new \SendGrid(SYS_EMAIL_SMTP_SENDGRID_PWD);
		$from = new From($postVal['from'], CLIENT_NAME);
		$subject = $postVal['subject'];
		$to = new To($postVal['to'], "");
		$content = new Content("text/html", $postVal['message']);
		$mail = new Mail($from, $to, $subject, $content);
		if(isset($postVal['cc']) && !empty($postVal['cc'])) {
			$personalizeCc = new Personalization();
			$personalizeCc->addTo(new To($postVal['to'], ""));
			$ccEmails = explode(',', $postVal['cc']);
			foreach ($ccEmails as $ccEmail) {
				$personalizeCc->addCc(new Cc($ccEmail, ""));
			}
			$personalizeCc->setSubject(new Subject($subject));
			$mail->addPersonalization($personalizeCc);
		}

		if(isset($postVal['bcc']) && !empty($postVal['bcc'])) {
			$personalizeBcc = new Personalization();
			$personalizeBcc->addTo(new To($postVal['to'], ""));
			$bccEmails = explode(',', $postVal['bcc']);
			foreach ($bccEmails as $bccEmail) {
				$personalizeBcc->addCc(new Bcc($bccEmail, ""));
			}
			$personalizeBcc->setSubject(new Subject($subject));
			$mail->addPersonalization($personalizeBcc);
		}
		if(FALSE && isset($postVal['attachment']) && !empty($postVal['attachment'])){
            $full_path = CRON_ROOT_PATH;
			$attachment_arr = explode(",",$postVal['attachment']);
			if(!empty($attachment_arr)) {
				foreach($attachment_arr as $atmVal) {
					$file_name = basename($atmVal);
					$file_mime_type = getFileMimeTypes($file_name);
					$file_path = $full_path.$atmVal;
					$file_encoded = base64_encode(file_get_contents($file_path)); // file encode

					$attachment = new Attachment();
					$attachment->setContent($file_encoded);
					$attachment->setType($file_mime_type);
					$attachment->setFilename($file_name);
					$attachment->setDisposition("attachment");
					$mail->addAttachment($attachment);
				}
			}
		}
		try {
			$mailResponse = $sendGrid->client->mail()->send()->post($mail);
			$headers = $mailResponse->headers('X-Message-Id');
			$response['status'] = STATUS_SUCCESS;
			$response['msg'] = STATUS_SUCCESS;
			$response['data']['sendgrid_id'] = $headers['X-Message-Id'];
		} catch (Exception $e) {
			$response['msg'] = 'Caught exception: '. $e->getMessage();
		}
		return $response;
	}
//End
}
