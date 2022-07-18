<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
	'edit_teacher' => array(
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
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|max_length[150]'
		),
		array(
			'field' => 'specialization',
			'label' => 'Specialization',
			'rules' => 'trim|required|max_length[85]'
		),
		array(
			'field' => 'id_state',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_city',
			'label' => 'City',
			'rules' => 'trim|required'
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
	)
);
?>
