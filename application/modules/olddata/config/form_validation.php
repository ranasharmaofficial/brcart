<?php

$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_datas' => array(
      array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required'
        )
    )
);

?>