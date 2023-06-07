<?php

// Register Custom Post Type
function news_post_type() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'nepaleseinfinland' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'nepaleseinfinland' ),
		'menu_name'             => __( 'News', 'nepaleseinfinland' ),
		'name_admin_bar'        => __( 'News', 'nepaleseinfinland' ),
		'archives'              => __( 'News Archives', 'nepaleseinfinland' ),
		'attributes'            => __( 'News Attributes', 'nepaleseinfinland' ),
		'parent_item_colon'     => __( 'Parent Item:', 'nepaleseinfinland' ),
		'all_items'             => __( 'All News', 'nepaleseinfinland' ),
		'add_new_item'          => __( 'Add News Item', 'nepaleseinfinland' ),
		'add_new'               => __( 'Add New News', 'nepaleseinfinland' ),
		'new_item'              => __( 'New News', 'nepaleseinfinland' ),
		'edit_item'             => __( 'Edit News', 'nepaleseinfinland' ),
		'update_item'           => __( 'Update News', 'nepaleseinfinland' ),
		'view_item'             => __( 'View News', 'nepaleseinfinland' ),
		'view_items'            => __( 'View News', 'nepaleseinfinland' ),
		'search_items'          => __( 'Search News', 'nepaleseinfinland' ),
		'not_found'             => __( 'Not found', 'nepaleseinfinland' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nepaleseinfinland' ),
		'featured_image'        => __( 'Featured Image', 'nepaleseinfinland' ),
		'set_featured_image'    => __( 'Set featured image', 'nepaleseinfinland' ),
		'remove_featured_image' => __( 'Remove featured image', 'nepaleseinfinland' ),
		'use_featured_image'    => __( 'Use as featured image', 'nepaleseinfinland' ),
		'insert_into_item'      => __( 'Insert into News', 'nepaleseinfinland' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News', 'nepaleseinfinland' ),
		'items_list'            => __( 'News list', 'nepaleseinfinland' ),
		'items_list_navigation' => __( 'News list navigation', 'nepaleseinfinland' ),
		'filter_items_list'     => __( 'Filter items News', 'nepaleseinfinland' ),
	);
	$args = array(
		'label'                 => __( 'News', 'nepaleseinfinland' ),
		'description'           => __( 'Add news', 'nepaleseinfinland' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'taxonomies'            => array( 'News category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=>'dashicons-text-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'news_post_type', 0 );


// Register Custom Post Type
function uas_post_type() {

	$labels = array(
		'name'                  => _x( 'UAS', 'Post Type General Name', 'nepaleseinfinland' ),
		'singular_name'         => _x( 'UAS', 'Post Type Singular Name', 'nepaleseinfinland' ),
		'menu_name'             => __( 'UAS', 'nepaleseinfinland' ),
		'name_admin_bar'        => __( 'UAS', 'nepaleseinfinland' ),
		'archives'              => __( 'UAS Archives', 'nepaleseinfinland' ),
		'attributes'            => __( 'UAS Attributes', 'nepaleseinfinland' ),
		'parent_item_colon'     => __( 'Parent UAS :', 'nepaleseinfinland' ),
		'all_items'             => __( 'All UAS', 'nepaleseinfinland' ),
		'add_new_item'          => __( 'Add New UAS', 'nepaleseinfinland' ),
		'add_new'               => __( 'Add UAS', 'nepaleseinfinland' ),
		'new_item'              => __( 'New UAS', 'nepaleseinfinland' ),
		'edit_item'             => __( 'Edit UAS', 'nepaleseinfinland' ),
		'update_item'           => __( 'Update UAS', 'nepaleseinfinland' ),
		'view_item'             => __( 'View UAS', 'nepaleseinfinland' ),
		'view_items'            => __( 'View UAS', 'nepaleseinfinland' ),
		'search_items'          => __( 'Search UAS', 'nepaleseinfinland' ),
		'not_found'             => __( 'Not found', 'nepaleseinfinland' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nepaleseinfinland' ),
		'featured_image'        => __( 'Featured Image', 'nepaleseinfinland' ),
		'set_featured_image'    => __( 'Set featured image', 'nepaleseinfinland' ),
		'remove_featured_image' => __( 'Remove featured image', 'nepaleseinfinland' ),
		'use_featured_image'    => __( 'Use as featured image', 'nepaleseinfinland' ),
		'insert_into_item'      => __( 'Insert into UAS', 'nepaleseinfinland' ),
		'uploaded_to_this_item' => __( 'Uploaded to this UAS', 'nepaleseinfinland' ),
		'items_list'            => __( 'UAS list', 'nepaleseinfinland' ),
		'items_list_navigation' => __( 'UAS list navigation', 'nepaleseinfinland' ),
		'filter_items_list'     => __( 'Filter UAS list', 'nepaleseinfinland' ),
	);
	$args = array(
		'label'                 => __( 'UAS', 'nepaleseinfinland' ),
		'description'           => __( 'Add all universities', 'nepaleseinfinland' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'				=>'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'uas', $args );

}
add_action( 'init', 'uas_post_type', 0 );

// Register Custom Post Type
function event_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'nepaleseinfinland' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'nepaleseinfinland' ),
		'menu_name'             => __( 'Events', 'nepaleseinfinland' ),
		'name_admin_bar'        => __( 'Events', 'nepaleseinfinland' ),
		'archives'              => __( 'Events Archives', 'nepaleseinfinland' ),
		'attributes'            => __( 'Events Attributes', 'nepaleseinfinland' ),
		'parent_item_colon'     => __( 'Parent Events :', 'nepaleseinfinland' ),
		'all_items'             => __( 'All Events', 'nepaleseinfinland' ),
		'add_new_item'          => __( 'Add New Event', 'nepaleseinfinland' ),
		'add_new'               => __( 'Add New Event', 'nepaleseinfinland' ),
		'new_item'              => __( 'New Event', 'nepaleseinfinland' ),
		'edit_item'             => __( 'Edit Event', 'nepaleseinfinland' ),
		'update_item'           => __( 'Update Event', 'nepaleseinfinland' ),
		'view_item'             => __( 'View Event', 'nepaleseinfinland' ),
		'view_items'            => __( 'View Event', 'nepaleseinfinland' ),
		'search_items'          => __( 'Search Event', 'nepaleseinfinland' ),
		'not_found'             => __( 'Not found', 'nepaleseinfinland' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'nepaleseinfinland' ),
		'featured_image'        => __( 'Featured Image', 'nepaleseinfinland' ),
		'set_featured_image'    => __( 'Set featured image', 'nepaleseinfinland' ),
		'remove_featured_image' => __( 'Remove featured image', 'nepaleseinfinland' ),
		'use_featured_image'    => __( 'Use as featured image', 'nepaleseinfinland' ),
		'insert_into_item'      => __( 'Insert into Event', 'nepaleseinfinland' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event', 'nepaleseinfinland' ),
		'items_list'            => __( 'Events list', 'nepaleseinfinland' ),
		'items_list_navigation' => __( 'Events list navigation', 'nepaleseinfinland' ),
		'filter_items_list'     => __( 'Filter Events list', 'nepaleseinfinland' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'nepaleseinfinland' ),
		'description'           => __( 'Add event and description.', 'nepaleseinfinland' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'				=>'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Event_post_type', $args );

}
add_action( 'init', 'event_post_type', 0 );