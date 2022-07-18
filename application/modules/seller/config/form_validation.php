<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'edit_seller_profile' => array(
        array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'last_name',
            'label' => 'Last Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'email',
            'label' => 'E-Mail',
            'rules' => 'trim|required'
        )
    ),'add_vendor_product' => array(
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),array(
            'field' => 'stock',
            'label' => 'Stock',
            'rules' => 'required'
        ),array(
            'field' => 'pid',
            'label' => 'Product Id',
            'rules' => 'required|callback_pid_check'
        )
    ),'edit_vendor_product' => array(
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),array(
            'field' => 'stock',
            'label' => 'Stock',
            'rules' => 'required'
        ),array(
            'field' => 'pid',
            'label' => 'Product Id',
            'rules' => 'required|callback_pid_check'
        ),array(
            'field' => 'vendor_id',
            'label' => 'Vendor Id',
            'rules' => 'required'
        )
    )
);
?>
