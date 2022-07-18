<?php
$config = array(
    'error_prefix' => '<div class="error_prefix">',
    'error_suffix' => '</div>',
    'add_news' => array(
      array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required'
        ),array(
            'field' => 'details',
            'label' => 'News Details',
            'rules' => 'trim|required'
        )
    )
);
?>
