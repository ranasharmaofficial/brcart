<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_hospital' => array(
        array(
            'field' => 'name',
            'label' => 'Hospital Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'trim|required'
		)
    ),'edit_hospital' => array(
        array(
            'field' => 'name',
            'label' => 'State Name',
            'rules' => 'trim|required'
        )
    )
	
);
?>