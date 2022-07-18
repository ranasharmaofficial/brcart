<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'change_password' => array(
        array(
            'field' => 'oldpassword',
            'label' => 'Old Password',
            'rules' => 'trim|required|callback_check_old_password'
        ),array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'trim|required'
        ),
		array(
			'field'   => 're_enter_password',
			'label'   => 'Re enter password',
			'rules'   => 'trim|required|matches[new_password]'
		)
    )
);
?>
