<?php

class News extends Admincontroller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	function index(){
		redirect(WEB_URL.'dashboard/myDashboard');
	}

	function all(){
		$data['getAllNews'] = array();
		$data['pvalue'] = array('view'=>'list_view','page_heading'=> 'News');
		$this->loadView($data);
	}

	function get_news_ajax_list($offset=null){
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		$this->load->library('pagination');

		$limit = ADM_PER_PAGE_RECORDS;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$postVal = array('limit'=>$limit,'offset'=>$offset,'searchVal'=>$search,'count'=>TRUE);
		$config['base_url'] = WEB_URL . 'news/get_news_ajax_list';
		$config['total_rows'] = $this->news_model->getAllNews($postVal);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current_page" href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['pagelinks'] = $this->pagination->create_links();
		$postVal['count'] = FALSE;
		$data['getAllNews'] = $this->news_model->getAllNews($postVal);
		$this->load->view('list_ajax_view',$data);
	}
/*
	function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			if ($this->form_validation->run('add_news') == TRUE) {
				$response = $this->news_model->addProduct($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'news/all');
				}
			}
		}
		//$data['getCat'] = array();
		$data['getCat'] = $this->news_model->getCat(array('data_type'=>'Category'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add News');
		$this->loadView($data);
	}
*/
	 function add(){
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			//printData($_FILES);
			if ($this->form_validation->run('add_news') == TRUE) {
				$response = $this->news_model->addNews($_POST);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'news/all');
				}
			}
		}
		//$data['getCat'] = array();
		//$data['getCat'] = $this->news_model->getCat(array('data_type'=>'Category'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add News');
		$this->loadView($data);
	} 
	function takeData(){
		$this->load->dbutil();

		$prefs = array(
			'format'      => 'zip',
			'filename'    => 'my_db_backup.sql'
		);


		$backup =& $this->dbutil->backup($prefs);

		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'assets/db_backup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup);


		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	function takeDbBackup(){
		//load helpers

		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');

//load database
		$this->load->dbutil();

//create format
		$db_format=array('format'=>'zip','filename'=>'backup.sql');

		$backup=& $this->dbutil->backup($db_format);

// file name

		$dbname='backup-on-'.date('d-m-y H:i').'.zip';
		$save='assets/db_backup/'.$dbname;

// write file

		write_file($save,$backup);

// and force download
		force_download($dbname,$backup);
	}


/*  this is Working
	public function add(){
        $data = array();
        $postData = array();
        if(isset($_POST['submit']) && $_POST['submit']=='submit'){
            // $this->form_validation->set_rules('title', 'Title', 'required');
            // $this->form_validation->set_rules('content', 'Content', 'required');

            $postData = array(
				'id_category' => strip_tags($this->input->post('id_category')),
                'title' => strip_tags($this->input->post('title')),
                'english_url_title' => strip_tags($this->input->post('english_url_title')),
                'details' => strip_tags($this->input->post('details'))
                // 'created_at' => getCurrentDateTime()
            );

            if($this->form_validation->run('add_news') == TRUE) {
                /*
                 * Generate SEO friendly URL
                  
                $english_url_title = strip_tags($this->input->post('english_url_title'));
                $titleURL = strtolower(url_title($english_url_title));
                if(isUrlExists('news',$titleURL)){
                   $titleURL = $titleURL.'-'.time(); 
                }
                $postData['url_slug'] = $titleURL;
                
                //Insert post data to database
                $insert = $this->db->insert('news', $postData);
                if($insert){
                    $postData = array();
                    $data['success_msg'] = 'Post data inserted successfully.';
					redirect(WEB_URL . 'news/all');
                } else {
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        
        $data['post'] = $postData;
        
        //load the view
        //$this->load->view('posts/add', $data, false);
		$data['getCat'] = $this->news_model->getCat(array('data_type'=>'Category'));
		$data['pvalue'] = array('view'=>'add_view','page_heading'=>'Add News');
		$this->loadView($data);
    }*/
	
	
	/*function edit(){
		$id = (isset($_GET['id']) && $_GET['id'] > 0)?$_GET['id']:0;
		$data['row'] = $this->news_model->getDetails(array('id'=>$id));
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			//printData($_FILES);
			if(isset($_FILES['attachment']['size']) && $_FILES['attachment']['size'] > 0) {
				$_POST['fileDetails'] = array("temp_file_path" => $_FILES["attachment"]["tmp_name"],
					"file_name" => $_FILES['attachment']['name'],
					"file_size" => $_FILES['attachment']['size'],
					"allowExtensions" => array('gif','jpeg', 'jpg', 'png')
				);
			}
			$_POST['category_id'] = 1;
			if ($this->form_validation->run('add_news') == TRUE) {
				$response = $this->news_model->update($_POST);
				$this->setSuccessFailMessage($response);
				if($response['status']==STATUS_SUCCESS) {
					redirect(WEB_URL . 'news/all');
				}
			}
		}
		$data['pvalue'] = array('view'=>'edit_view','page_heading'=>'Edit News Details');
		$this->loadView($data);
	}*/

	function check_document_upload(){
		if(isset($_POST['fileDetails']['required'])) {
			if ($_POST['fileDetails']['required']) {
				$fileSize = $_POST['fileDetails']['file_size'];
				$fileExtensions = $_POST['fileDetails']['allowExtensions'];
				$fileName = $_POST['fileDetails']['file_name'];
				$tmp = explode('.', $fileName);
				$fileExtension = end($tmp);
				//$fileExtension = strtolower(end(explode('.', $fileName)));
				if ($fileSize == 0) {
					$this->form_validation->set_message('check_document_upload', 'Please select the file');
					return false;
				}
				if (!in_array($fileExtension, $fileExtensions)) {
					$this->form_validation->set_message('check_document_upload', 'This file extension is not allowed');
					return false;
				}
				if ($fileSize > DEFAULT_MAX_FILESIZE) {
					$this->form_validation->set_message('check_document_upload', 'This file is more than 2MB. Sorry, it has to be less than or equal to 2MB');
					return false;
				}
				return TRUE;
			}
			else{

				$fileSize = (isset($_POST['fileDetails']['file_size']) && $_POST['fileDetails']['file_size'] > 0)?$_POST['fileDetails']['file_size']:0;
				if($fileSize > 0) {
					$fileExtensions = $_POST['fileDetails']['allowExtensions'];
					$fileName = $_POST['fileDetails']['file_name'];
					$tmp = explode('.', $fileName);
					$fileExtension = end($tmp);
					if (!in_array($fileExtension, $fileExtensions)) {
						$this->form_validation->set_message('check_document_upload', 'This file extension is not allowed');
						return false;
					}
					if ($fileSize > DEFAULT_MAX_FILESIZE) {
						$this->form_validation->set_message('check_document_upload', 'This file is more than 2MB. Sorry, it has to be less than or equal to 2MB');
						return false;
					}
				}
				return TRUE;
			}
		}
		return TRUE;
	}
	
	function deleteSingleData()
	{
		$student_id = $this->input->post('id');
		$dataDelete = $this->news_model->deleteData('news',array('id'=>$student_id));
		if($dataDelete==true)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
//End
}
?>
