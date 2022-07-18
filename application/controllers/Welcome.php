<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function testEmail()
	{
		if(FALSE) {
			$this->load->library('email_lib');
			$postVal = array('from'=>$this->config->item('email_from'),'to'=>$this->config->item('enquiry_send_to'),'subject'=>'Test','message'=>'Hello this is testing');
			$response = $this->email_lib->sendMail($postVal);
			print_r($response);
		}
	}

	function tD()
	{
		echo FILE_UPLOAD_PATH;
	}
	function printAllSession()
	{
		// if(FALSE) {
			$arr = $this->session->userdata();
			printData($arr);
		// }
	}
    function mypdf(){
		$this->load->library('pdf');
		$this->pdf->load_view('mypdf');
		$this->pdf->render();
		$this->pdf->stream("welcome.pdf");
    }
//End
}
?>
