<?php
/**
 * NepaleseinFinland functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NepaleseinFinland
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function nepaleseinfinland_setup() {

	load_theme_textdomain( 'nepaleseinfinland', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			
	    	'primary_menu' => __( 'Primary Menu', 'nepaleseinfinland' ),
	    	'footer_menu'  => __( 'Footer Menu', 'nepaleseinfinland' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'nepaleseinfinland_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'nepaleseinfinland_setup' );

function nepaleseinfinland_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nepaleseinfinland_content_width', 640 );
}
add_action( 'after_setup_theme', 'nepaleseinfinland_content_width', 0 );
function nepaleseinfinland_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nepaleseinfinland' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nepaleseinfinland' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nepaleseinfinland_widgets_init' );

function nepaleseinfinland_scripts() {
	wp_enqueue_style( 'nepaleseinfinland-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
	wp_enqueue_style( 'stellarnav', get_template_directory_uri() . '/assets/css/stellarnav.css' );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_style_add_data( 'nepaleseinfinland-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nepaleseinfinland-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.6.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-1.12.4.min', get_template_directory_uri() . '/assets/js/vendor/jquery-1.12.4.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper.min', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-min', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.nice-select.min', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'stellarnav.min', get_template_directory_uri() . '/assets/js/stellarnav.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'circle-progress.min', get_template_directory_uri() . '/assets/js/circle-progress.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery.magnific-popup.min', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nepaleseinfinland_scripts' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/post-types-meta.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require_once __DIR__ . '/library/CMB2/init.php';
//require_once __DIR__ . '/library/CMB2/cmb_field_map/cmb-field-map.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//image sizes.....
add_image_size('item_image', 300, 300, true);
add_image_size('post_image_xs', 100, 90, true);
add_image_size('post_image_s', 240, 186, true);
add_image_size('widget_right_thumbnail', 232, 123, true);
add_image_size('post_image_m', 263, 175, true);
add_image_size('post_image_l', 387, 242, true);
add_image_size('post_image_xl', 774, 484, true);
add_image_size('post_feat_xl', 1090, 521, true);
add_image_size('feature_galleries', 1090, 521, true);

function li_new_class($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
	}
	add_filter('nav_menu_li_class', 'li_new_class', 1, 3);

	if ( ! function_exists( 'news_category' ) ) {

		// Register Custom Taxonomy
		function news_category() {
		
			$labels = array(
				'name'                       => _x( 'categories', 'Taxonomy General Name', 'nepaleseinfinland' ),
				'singular_name'              => _x( 'category', 'Taxonomy Singular Name', 'nepaleseinfinland' ),
				'menu_name'                  => __( 'News Categories', 'nepaleseinfinland' ),
				'all_items'                  => __( 'All Categories', 'nepaleseinfinland' ),
				'parent_item'                => __( 'Parent Categories', 'nepaleseinfinland' ),
				'parent_item_colon'          => __( 'Parent Categories:', 'nepaleseinfinland' ),
				'new_item_name'              => __( 'New Item Category', 'nepaleseinfinland' ),
				'add_new_item'               => __( 'Add New Category', 'nepaleseinfinland' ),
				'edit_item'                  => __( 'Edit Category', 'nepaleseinfinland' ),
				'update_item'                => __( 'Update Category', 'nepaleseinfinland' ),
				'view_item'                  => __( 'View Category', 'nepaleseinfinland' ),
				'separate_items_with_commas' => __( 'Separate Categories with commas', 'nepaleseinfinland' ),
				'add_or_remove_items'        => __( 'Add or remove Categories', 'nepaleseinfinland' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'nepaleseinfinland' ),
				'popular_items'              => __( 'Popular Categories', 'nepaleseinfinland' ),
				'search_items'               => __( 'Search Categories', 'nepaleseinfinland' ),
				'not_found'                  => __( 'Not Found', 'nepaleseinfinland' ),
				'no_terms'                   => __( 'No Categories', 'nepaleseinfinland' ),
				'items_list'                 => __( 'Categories list', 'nepaleseinfinland' ),
				'items_list_navigation'      => __( 'Items list navigation', 'nepaleseinfinland' ),
			);
			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			);
			register_taxonomy( 'news category', array( 'news' ), $args );
		
		}
		add_action( 'init', 'news_category', 0 );
		
		}

		function event_location($latitude,$longitude) {
			//Google Map API URL
			$API_KEY = "AIzaSyC_g4sqti9HeM-c2_CklyEnPoVZq-j3bMU"; // Google Map Free API Key
			$url = "https://maps.google.com/maps/api/geocode/json?latlng=".$latitude.",".$longitude."&key=".$API_KEY."";
			// Send CURL Request
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$response = curl_exec($ch);
			curl_close($ch);
			$returnBody = json_decode($response);
			// Google MAP
			$status = $returnBody->status;
			if($status == "REQUEST_DENIED"){ 
			$result = $returnBody->error_message;
			} else { 
			$result = $returnBody->results[0]->formatted_address;
			}
			return $result;
			}

function remove_comment_url($arg) {
$arg['url'] = '';
return $arg;
}
 
add_filter('comment_form_default_fields', 'remove_comment_url');