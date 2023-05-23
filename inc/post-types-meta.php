<?php

add_action('cmb2_admin_init', 'news_post_meta');
function news_post_meta()
{

    $cmb = new_cmb2_box(array(
        'id' => 'news',
        'title' => __('More Info:', 'cmb2'),
        'object_types' => array('news'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => false,

    ));


    $cmb->add_field(array(
		'name' => 'Hot News',
		'desc' => 'Check if this is hot news.',
		'id'   => 'news_hot',
		'type' => 'checkbox',
    ));

}