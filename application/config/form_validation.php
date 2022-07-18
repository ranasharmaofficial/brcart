<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'email_subscribe' => array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			)
	 ),'check_login' => array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required'
			),array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required'
			)
	 )

);
?>
