<?php

// $user_type=$this->session->userdata('id_user_type');

	$this->load->view('sellerlayout/seller_meta_info_view');
	$this->load->view('sellerlayout/seller_top_menu_view');
	$this->load->view('sellerlayout/seller_left_menu_view');

$this->load->view($pvalue['view']);
$this->load->view('sellerlayout/footer_view');


?>
