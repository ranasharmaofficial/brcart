<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_city' => array(
        array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'trim|required'
		),
		array(
            'field' => 'country_id',
            'label' => 'Country',
            'rules' => 'trim|required'
        ),
		array(
            'field' => 'name',
            'label' => 'City Name',
            'rules' => 'trim|required'
        )
    ),'edit_city' => array(
        array(
            'field' => 'name',
            'label' => 'City Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'id',
			'label' => 'State ID',
			'rules' => 'trim|required'
		)
    )
);
?>
