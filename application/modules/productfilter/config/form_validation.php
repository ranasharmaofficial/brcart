<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'edit_category' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required'
        )
    ),'edit_pic_category' => array(
        array(
            'field' => 'file',
            'label' => 'Picture',
            'rules' => 'required'
        )
    )
);
?>
