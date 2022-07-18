<?php

// $user_type=$this->session->userdata('id_user_type');
if($seller_type==3){
	$this->load->view('adminlayout/seller_meta_info_view');
	$this->load->view('adminlayout/seller_top_menu_view');
	$this->load->view('adminlayout/seller_left_menu_view');
}else {
	$this->load->view('adminlayout/meta_info_view');
	$this->load->view('adminlayout/top_menu_view');
	$this->load->view('adminlayout/left_menu_view');
}
$this->load->view($pvalue['view']);
$this->load->view('adminlayout/footer_view');


?>
