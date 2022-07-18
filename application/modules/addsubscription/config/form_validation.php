<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_subscription' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'currency',
            'label' => 'Currency',
            'rules' => 'trim|required'
        ),array(
            'field' => 'currency_code',
            'label' => 'Currency Code',
            'rules' => 'trim|required'
        ),array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|required'
        ),array(
            'field' => 'days',
            'label' => 'Days',
            'rules' => 'trim|required'
        )
    ),'edit_content' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'currency',
            'label' => 'Currency',
            'rules' => 'trim|required'
        ),array(
            'field' => 'currency_code',
            'label' => 'Currency Code',
            'rules' => 'trim|required'
        ),array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|required'
        ),array(
            'field' => 'days',
            'label' => 'Days',
            'rules' => 'trim|required'
        )
    )
);
?>
