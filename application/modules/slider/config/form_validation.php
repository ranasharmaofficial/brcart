<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_slider' => array(
        array(
            'field' => 'short_title',
            'label' => 'Short Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'long_title',
            'label' => 'Long Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'sale_discount',
            'label' => 'Discount',
            'rules' => 'trim|required'
        ),array(
            'field' => 'link',
            'label' => 'Link',
            'rules' => 'trim|required'
        ),
    ),'edit_category' => array(
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
    ),'add_brand' => array(
        array(
            'field' => 'brand',
            'label' => 'Brand',
            'rules' => 'trim|required'
        )
    ),'edit_brand' => array(
        array(
            'field' => 'brand',
            'label' => 'Brand',
            'rules' => 'trim|required'
        )
    )
);
?>
