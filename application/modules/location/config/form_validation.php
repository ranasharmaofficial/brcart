<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_location' => array(
        array(
            'field' => 'name',
            'label' => 'Location Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'id_country',
			'label' => 'Country',
			'rules' => 'trim|required'
		),array(
			'field' => 'id_state',
			'label' => 'State',
			'rules' => 'trim|required'
		),array(
			'field' => 'id_city',
			'label' => 'City',
			'rules' => 'trim|required'
		)
    )
);
?>
