<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
	'register_user' => array(
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
				'field' => 'gender',
				'label' => 'Gender',
				'rules' => 'required|max_length[1]'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			)
		),
		'order_form' => array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required|max_length[85]'
			),
			array(
				'field' => 'mobile',
				'label' => 'Mobile',
				'rules' => 'trim|required|max_length[85]'
			),
			array(
				'field' => 'contact_name_no',
				'label' => 'Contact Person Number',
				'rules' => 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]'
			),
			array(
				'field' => 'contact_person',
				'label' => 'Contact Person Name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'state',
				'label' => 'State',
				'rules' => 'required|max_length[10]'
			),array(
				'field' => 'pin_code',
				'label' => 'Pin Code',
				'rules' => 'required|max_length[10]|numeric'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			),
			array(
				'field' => 'quantity',
				'label' => 'Quantity',
				'rules' => 'trim|required|numeric'
			),
			array(
				'field' => 'billing_address',
				'label' => 'Billing Address',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'shipping_address',
				'label' => 'Shipping Address',
				'rules' => 'trim|required'
			)
	)
	
);
?>
