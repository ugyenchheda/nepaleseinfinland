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
			'menu-1' => esc_html__( 'Primary', 'nepaleseinfinland' ),
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

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nepaleseinfinland_scripts' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

