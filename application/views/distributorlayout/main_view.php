<?php

// $user_type=$this->session->userdata('id_user_type');

	$this->load->view('distributorlayout/seller_meta_info_view');
	$this->load->view('distributorlayout/seller_top_menu_view');
	$this->load->view('distributorlayout/seller_left_menu_view');

$this->load->view($pvalue['view']);
$this->load->view('distributorlayout/footer_view');


?>
