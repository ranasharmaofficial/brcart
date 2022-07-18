<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_state' => array(
        array(
            'field' => 'name',
            'label' => 'State Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'country_id',
			'label' => 'Country',
			'rules' => 'trim|required'
		)
    ),'edit_state' => array(
        array(
            'field' => 'name',
            'label' => 'State Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'id',
			'label' => 'State ID',
			'rules' => 'trim|required'
		)
    )
	
);
?>
