<?php
$config = array(
	'error_prefix' => '<div class="error_prefix">',
	'error_suffix' => '</div>',
	'users_reg' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'mobile_no',
			'label' => 'Mobile',
			'rules' => 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|max_length[15]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
		)
	),
	'verify_otp' => array(
		array(
			'field' => 'otp',
			'label' => 'OTP',
			'rules' => 'trim|required|max_length[6]'
		)
	),'change_password' => array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		),array(
			'field' => 'cpassword',
			'label' => 'Confirm Password',
			'rules' => 'trim|required|matches[password]'
		)
	),'add_address' => array(
		array(
			'field' => 'name',
			'label' => 'Full Name',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'pin',
			'label' => 'Pin Code',
			'rules' => 'trim|required|max_length[8]'
		),array(
			'field' => 'house_no',
			'label' => 'House Number',
			'rules' => 'trim|required'
		),array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'trim|required|max_length[100]'
		),array(
			'field' => 'delivery_time',
			'label' => 'Delivery Time',
			'rules' => 'trim|required|max_length[100]'
		),
		array(
			'field' => 'mobile',
			'label' => 'Mobile',
			'rules' => 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'
		),
		array(
			'field' => 'state',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'city',
			'label' => 'City',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'landmark',
			'label' => 'Landmark',
			'rules' => 'trim|required'
		)
	)
);
?>