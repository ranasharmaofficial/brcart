<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
	'contact_us' => array(
		array(
			'field' => 'name',
			'label' => 'Your Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'mobile',
			'label' => 'Mobile',
			'rules' => 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		),array(
			'field' => 'message',
			'label' => 'Message',
			'rules' => 'trim|max_length[500]|required'
		)
	)
);
?>
