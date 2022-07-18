<?php
$config = array(
	'error_prefix' => '<div class="error_prefix">',
	'error_suffix' => '</div>',
	'add_application' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'aadhar_no',
			'label' => 'Aadhar Number',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required'
		),
		array(
			'field' => 'dob',
			'label' => 'Date of Birth',
			'rules' => 'required'
		),
		array(
			'field' => 'dob_inwords',
			'label' => 'DOB in Words',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'place_of_birth',
			'label' => 'Birth Place',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'fathersname',
			'label' => 'Father Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'fatheraadhar',
			'label' => 'Father Aadhar Number',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'mothersname',
			'label' => 'Mother Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'motheraadhar',
			'label' => 'Mother Aadhar Number',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'permanent_address',
			'label' => 'Permanen Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'address_of_birth',
			'label' => 'Birth Place Address',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'dob_registration',
			'label' => 'DOb Registration',
			'rules' => 'trim|required'
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