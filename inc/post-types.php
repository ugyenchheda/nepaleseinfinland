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
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
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