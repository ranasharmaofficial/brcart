<?php

class MY_Model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	function uploadImageToCloud($image_file,$postVal=array()){
		if(CLDNRY_ACCESS) {
			$this->load->library('cloudinary_lib');
			return $this->cloudinary_lib->uploadImageToCloudinary($image_file, $postVal);
		}
		return TRUE;
	}

	/*Delete Image From Cloud*/
	function delImageFromCloud($image_id){
		if(CLDNRY_ACCESS) {
			$this->load->library('cloudinary_lib');
			return $this->cloudinarylib->delImageFromCloudinary($image_id);
		}
		return TRUE;
	}
//End
}
?>
