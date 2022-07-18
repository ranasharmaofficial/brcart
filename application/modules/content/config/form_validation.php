<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_content' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'details',
            'label' => 'Description',
            'rules' => 'trim|required'
        )
    ),'edit_content' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'details',
            'label' => 'Description',
            'rules' => 'trim|required'
        ),array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required'
        )
    )
);
?>
