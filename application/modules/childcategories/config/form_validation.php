<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_childcategories' => array(
        array(
			'field' => 'subcategory_id',
			'label' => 'Sub Category',
			'rules' => 'trim|required'
		),array(
            'field' => 'name',
            'label' => 'Child Category Name',
            'rules' => 'trim|required'
        )
    ),'edit_city' => array(
        array(
            'field' => 'name',
            'label' => 'Chil Category Name',
            'rules' => 'trim|required'
        )
    )
);
?>
