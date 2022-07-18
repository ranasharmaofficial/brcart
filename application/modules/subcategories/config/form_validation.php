<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_subcategory' => array(
        array(
            'field' => 'name',
            'label' => 'Subcategory Name',
            'rules' => 'trim|required'
        ),array(
			'field' => 'category_id',
			'label' => 'Category',
			'rules' => 'trim|required'
		)
    ),'edit_subcategory' => array(
        array(
            'field' => 'name',
            'label' => 'State Name',
            'rules' => 'trim|required'
        ),    array(
            'field' => 'admin_commission_percentage',
            'label' => 'Admin Commission',
            'rules' => 'trim|required'
        )
    )
	
);
?>