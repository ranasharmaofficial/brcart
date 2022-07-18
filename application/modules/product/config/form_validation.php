<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_product' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'sku',
            'label' => 'Product Sku',
            'rules' => 'trim|required'
        ),array(
            'field' => 'category_id',
            'label' => 'Category',
            'rules' => 'trim|required'
        ),
        // ,array(
        //     'field' => 'subcategory_id',
        //     'label' => 'Sub Category',
        //     'rules' => 'trim|required'
        // ),array(
        //     'field' => 'childcategory_id',
        //     'label' => 'Child Category',
        //     'rules' => 'trim|required'
        // )
        array(
            'field' => 'details',
            'label' => 'Product Details',
            'rules' => 'trim|required'
        ),array(
            'field' => 'price',
            'label' => 'Sell Price',
            'rules' => 'trim|required'
        ),array(
            'field' => 'previous_price',
            'label' => 'MRP',
            'rules' => 'trim|required'
        )
    ),'edit_product' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'sku',
            'label' => 'Product Sku',
            'rules' => 'trim|required'
        ),array(
            'field' => 'category_id',
            'label' => 'Category',
            'rules' => 'trim|required'
        ),array(
            'field' => 'subcategory_id',
            'label' => 'Sub Category',
            'rules' => 'trim|required'
        ),array(
            'field' => 'childcategory_id',
            'label' => 'Child Category',
            'rules' => 'trim|required'
        ),array(
            'field' => 'details',
            'label' => 'Product Details',
            'rules' => 'trim|required'
        ),array(
            'field' => 'price',
            'label' => 'Sell Price',
            'rules' => 'trim|required'
        ),array(
            'field' => 'brand',
            'label' => 'Brand',
            'rules' => 'trim|required'
        ),array(
            'field' => 'previous_price',
            'label' => 'MRP',
            'rules' => 'trim|required'
        ),array(
            'field' => 'seller_payable_amount',
            'label' => 'Seller Payable Amount',
            'rules' => 'trim|required'
        ),array(
            'field' => 'gst_amount',
            'label' => 'GST Amount',
            'rules' => 'trim|required'
        ),array(
            'field' => 'without_gst_price',
            'label' => 'Without GST Amount',
            'rules' => 'trim|required'
        ),array(
            'field' => 'admin_commission_amount',
            'label' => 'Admin Cm. Amount',
            'rules' => 'trim|required'
        ),array(
            'field' => 'admin_commission_percentage',
            'label' => 'Admin Cm. Percentage',
            'rules' => 'trim|required'
        )
    ),'add_product_size' => array(
        array(
            'field' => 'size',
            'label' => 'Size',
            'rules' => 'trim|required'
        ),array(
            'field' => 'size_qty',
            'label' => 'Product Quantity',
            'rules' => 'trim|required'
        ),array(
            'field' => 'size_price',
            'label' => 'Product Price',
            'rules' => 'trim|required'
        ),array(
            'field' => 'color',
            'label' => 'Product Color',
            'rules' => 'trim|required'
        )
    )
);
?>