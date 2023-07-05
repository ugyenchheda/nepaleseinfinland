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
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );
	$homepage_news_category = get_theme_mod('homepage_news_category');
    $no_of_news_hp = get_theme_mod('no_of_news_hp');

    $args = array(
        'posts_per_page' => $no_of_news_hp,
        'post_type'      => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $query = new WP_Query($args);
    $ajax_url = admin_url('admin-ajax.php');
    wp_localize_script( 'custom', 'my_ajax_object', array(
        'ajax_url' => $ajax_url,
        'homepage_news_category' => get_theme_mod('homepage_news_category'),
        'no_of_news_hp' => get_theme_mod('no_of_news_hp'),
        'max_pages' => $query->max_num_pages,
        // Add any other variables you need to pass to your custom script here
    ));

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

if ( ! function_exists( 'nepaleseinfinland_news_category' ) ) {

	// Register Custom Taxonomy
	function nepaleseinfinland_news_category() {
	
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
		register_taxonomy( 'news_category', array( 'news' ), $args );
	
	}
	add_action( 'init', 'nepaleseinfinland_news_category', 0 );
	
}

if ( ! function_exists( 'event_taxonomy' ) ) {

	// Register Custom Taxonomy
	function event_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'nepaleseinfinland' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'nepaleseinfinland' ),
			'menu_name'                  => __( 'Event Categories', 'nepaleseinfinland' ),
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
		register_taxonomy( 'event_category', array( 'event_post_type' ), $args );
	
	}
	add_action( 'init', 'event_taxonomy', 0 );
}		
			
if ( ! function_exists( 'uas_taxonomy' ) ) {

	// Register Custom Taxonomy
	function uas_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'nepaleseinfinland' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'nepaleseinfinland' ),
			'menu_name'                  => __( 'UAS Categories', 'nepaleseinfinland' ),
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
		register_taxonomy( 'uas_category', array( 'uas' ), $args );
	
	}
	add_action( 'init', 'uas_taxonomy', 0 );
	
}
if ( ! function_exists( 'video_blogs_taxonomy' ) ) {
	// Register Custom Taxonomy
	function video_blogs_taxonomy() {
	
		$labels = array(
			'name'                       => _x( 'Video Blog Categories', 'Taxonomy General Name', 'nepaleseinfinland' ),
			'singular_name'              => _x( 'Video Blog Category', 'Taxonomy Singular Name', 'nepaleseinfinland' ),
			'menu_name'                  => __( 'Video Blog Categories', 'nepaleseinfinland' ),
			'all_items'                  => __( 'All Video Blog Categories', 'nepaleseinfinland' ),
			'parent_item'                => __( 'Parent Video Blog Categories', 'nepaleseinfinland' ),
			'parent_item_colon'          => __( 'Parent Video Blog Categories:', 'nepaleseinfinland' ),
			'new_item_name'              => __( 'New Item Video Blog Category', 'nepaleseinfinland' ),
			'add_new_item'               => __( 'Add New Video Blog Category', 'nepaleseinfinland' ),
			'edit_item'                  => __( 'Edit Video Blog Category', 'nepaleseinfinland' ),
			'update_item'                => __( 'Update Video Blog Category', 'nepaleseinfinland' ),
			'view_item'                  => __( 'View Video Blog Category', 'nepaleseinfinland' ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', 'nepaleseinfinland' ),
			'add_or_remove_items'        => __( 'Add or remove Video Blog Categories', 'nepaleseinfinland' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'nepaleseinfinland' ),
			'popular_items'              => __( 'Popular Video Blog Categories', 'nepaleseinfinland' ),
			'search_items'               => __( 'Search Video Blog Categories', 'nepaleseinfinland' ),
			'not_found'                  => __( 'Not Found', 'nepaleseinfinland' ),
			'no_terms'                   => __( 'No Video Blog Categories', 'nepaleseinfinland' ),
			'items_list'                 => __( 'Video Blog Categories list', 'nepaleseinfinland' ),
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
		register_taxonomy( 'video_blogs_category', array( 'video_blogs' ), $args );
	
	}
	add_action( 'init', 'video_blogs_taxonomy', 0 );
	
}
function event_location($latitude,$longitude) {
	//Google Map API URL
	$API_KEY = get_theme_mod('google_map_api'); // Google Map Free API Key
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
	if($longitude||$latitude){
		if($status == "REQUEST_DENIED"){ 
			$result = $returnBody->error_message;
		} else { 
			$result = $returnBody->results[0]->formatted_address;
		}
		return $result;
	}
}

function remove_comment_url($arg) {
	$arg['url'] = '';
	return $arg;
}
 
add_filter('comment_form_default_fields', 'remove_comment_url');

function good_comment_policy($arg) {
	$arg['comment_notes_before'] = '<p class="comment-policy">We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href="https://nepaleseinfinland/comment-policy-page/" style="text-decoration: underline;">comment policy</a>.</p>';
	return $arg;
}
add_filter('comment_form_defaults', 'good_comment_policy');

function move_comment_form_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_form_to_bottom');

function custom_taxonomy_pagination( $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( is_tax( 'news_category' ) || is_tax( 'event_category' ) || is_tax( 'event_category' ) ) ) {
		$query->set( 'posts_per_page', 1 );
	}
}
add_action( 'pre_get_posts', 'custom_taxonomy_pagination' );




add_action('wp_ajax_loadingNews', 'loadingNews');
add_action('wp_ajax_nopriv_loadingNews', 'loadingNews');

function loadingNews() {
    $homepage_news_category = $_POST['homepage_news_category'];
    $no_of_news_hp = $_POST['no_of_news_hp'];
    $page = $_POST['page'];
    $loaded_post_ids = isset($_POST['loaded_post_ids']) ? $_POST['loaded_post_ids'] : array();

    $args = array(
        'posts_per_page' => $no_of_news_hp,
        'post_type'      => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'post__not_in' => $loaded_post_ids,
		'offset' => 2,
    );

    $query = new WP_Query($args);

    ob_start(); // Start output buffering

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $loaded_post_ids[] = get_the_ID();
            // Output the news items HTML
            echo '<div class="col-lg-4 col-md-4">
                <div class="trending-news-item mb-30">
                    <div class="trending-news-thumb">
                    ' . get_the_post_thumbnail($post->ID, 'post_image_l') . '
					<div class="circle-bar">
					<div class="first circle"><canvas width="40" height="40"></canvas>
						<strong>25</strong>
					</div>
				</div>
                    </div>
                    <div class="trending-news-content">
                        <div class="post-meta">';

							$taxonomies = get_object_taxonomies('news'); // Replace 'post' with your desired post type

							foreach ($taxonomies as $taxonomy) {
								if (!in_array($taxonomy, ['category', 'post_tag'])) {
									$terms = get_the_terms(get_the_ID(), $taxonomy);
									if ($terms && !is_wp_error($terms)) {
										echo '<div class="meta-categories">';
										foreach ($terms as $term) {
											echo '<a href="' . esc_url(get_term_link($term)) . '" class="home-event">' . esc_html($term->name) . '</a> ';
										}
										echo '</div>';
									}
								}
							}

							echo '<div class="meta-date">
									<span>' . get_the_date('F j, Y') . '</span>
								</div>
							</div>
							<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
							<p class="text">' . wp_trim_words(get_the_excerpt(), 15) . '</p>
						</div>
					</div>
				</div>';
			}
			wp_reset_postdata();
		}
	
		$response = ob_get_clean(); // Get the buffered output and store it in $response variable
		$max_pages = $query->max_num_pages;
		$last_page = $query->max_num_pages === $page;
		wp_send_json(array('content' => $response, 'max_pages' => $max_pages));
	}


	function flush_rewrite_rules_custom() {
		flush_rewrite_rules();
	}
	add_action('after_switch_theme', 'flush_rewrite_rules_custom');

	//sidebar news tab
	function display_sidebar_news($no_of_news, $sidebar_news) {
		$args = array(
			'post_type' => 'news', 
			'order' => 'DESC', 
			'posts_per_page' => $no_of_news,
			'tax_query' => array(
				array(
					'taxonomy' => 'news_category',
					'field' => 'term_id',
					'terms' => $sidebar_news,
				),
			),
		);
	
		$query = new WP_Query($args);
		$is_first_news = true; // Variable to track the first news item
		if ($query->have_posts()) {
			$tab_pane_class = $is_first_news ? 'active' : '';
			while ($query->have_posts()) {
				
				$query->the_post();
				echo '<div class="tab-pane fade show active" id="sidebar_news_title_' . $sidebar_news . '" role="tabpanel" aria-labelledby="sidebar_news_title_' . $sidebar_news . '-tab">
						<div class="post_gallery_items"><div class="gallery_item">
							<div class="gallery_item_thumb">' . get_the_post_thumbnail(get_the_ID(), 'post_image_xs') . '</div>
							<div class="gallery_item_content">
								<div class="post-meta">';
								$taxonomies = get_object_taxonomies('news'); // Replace 'post' with your desired post type
	
								foreach ($taxonomies as $taxonomy) {
									if (!in_array($taxonomy, ['category', 'post_tag'])) {
										$terms = get_the_terms(get_the_ID(), $taxonomy);
										if ($terms && !is_wp_error($terms)) {
											echo '<div class="meta-categories">';
											foreach ($terms as $term) {
												echo '<a href="' . esc_url(get_term_link($term)) . '" class="home-event">' . esc_html($term->name) . '</a> ';
											}
											echo '</div>';
										}
									}
								}
								echo '<div class="meta-date"><span> ' . get_the_date('F j, Y') . '</span></div></div>
									<h3 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
							</div>
						</div>
					</div>
				</div>';
				$is_first_news = false; // Set to false after the first iteration
			}
		} else {
			echo 'Sorry there is no post to display.';
		}
		wp_reset_postdata(); 
	}

	function get_youtube_video_id($url) {
		$query_string = parse_url($url, PHP_URL_QUERY);
		parse_str($query_string, $query_params);
		if (isset($query_params['v'])) {
			return $query_params['v'];
		} else {
			return false;
		}
	}
	
	
	
	
	