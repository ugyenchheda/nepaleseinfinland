<?php
/**
 * NepaleseinFinland Theme Customizer
 *
 * @package NepaleseinFinland
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nepaleseinfinland_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'nepaleseinfinland_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'nepaleseinfinland_customize_partial_blogdescription',
			)
		);
	}

	/* Custom codes for customizer
	.........................................  */

	$wp_customize->add_panel('nepaleseinfinland_setting_panel', array(
				'capability' 		=> 'edit_theme_options',
				'theme_supports' 	=> '',
				'title' 			=> __('Nepalese In Finland Settings', 'nepaleseinfinland'),
				'description' 		=> __('Setup website Settings', 'nepaleseinfinland'),
				'priority' 			=> 12,
		));


	$wp_customize->add_section(
		'section_headersetting' ,
		array(
			'title'       	=> __( 'Header Setting', 'nepaleseinfinland' ),
			'description' 	=> __( 'Setup header settings.', 'nepaleseinfinland' ),
			'panel'			=> 'nepaleseinfinland_setting_panel',
		)
	);

	$wp_customize->add_setting(
		'news_title',
		array(
			'default'			=> 'Trending',
		)
   );
	$wp_customize->add_control(
		'news_title',
			array(
			 'label'		=> __('Title for News', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'news_title',
			)
	);
	
	$terms = get_terms(array(
		'taxonomy'=> 'news_category',
		'hide_empty'=> false,
	));
	$cats = array();
	$i = 0;
	foreach($terms as $category){
		$cats[$category->term_id] = $category->name;
	}
	
	$wp_customize->add_setting('news_highlight', 
		array(
			
			)
	);
		
	$wp_customize->add_control(
		'news_highlight',
			array(
			'label'		=> __('Choose Category:', 'nepaleseinfinland'),
			'description' => 'Select news category to display in slider on top bar.',
			'section' 	=> 'section_headersetting',
			'type' 		=> 'text',
			'settings'	=> 'news_highlight',
			'type'    => 'select',
			'choices' => $cats
			)
	);

	$wp_customize->add_setting(
		'news_number',
		array(
			'default'			=> '5',
		)
   );
	$wp_customize->add_control(
		'news_number',
			array(
			 'label'		=> __('Select total news to display:', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'news_number',
			)
	);


	//for social medias
	$wp_customize->add_setting(
		'facebook_link',
		array(
			'default'			=> '#',
		)
   );
	$wp_customize->add_control(
		'facebook_link',
			array(
			 'label'		=> __('Facebook', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'facebook_link',
			)
	);
	$wp_customize->add_setting(
		'twitter_link',
		array(
			'default'			=> '#',
		)
   );
	$wp_customize->add_control(
		'twitter_link',
			array(
			 'label'		=> __('Twitter', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'twitter_link',
			)
	);
	$wp_customize->add_setting(
		'instagram_link',
		array(
			'default'			=> '#',
		)
   );
	$wp_customize->add_control(
		'instagram_link',
			array(
			 'label'		=> __('Instagram', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'instagram_link',
			)
	);
	$wp_customize->add_setting(
		'youtube_link',
		array(
			'default'			=> '#',
		)
   );
	$wp_customize->add_control(
		'youtube_link',
			array(
			 'label'		=> __('Youtube', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'youtube_link',
			)
	);
	
	$wp_customize->add_setting(
		'linkedin_link',
		array(
			'default'			=> '#',
		)
   );
	$wp_customize->add_control(
		'linkedin_link',
			array(
			 'label'		=> __('Linkedin', 'nepaleseinfinland'),
			 'section' 	=> 'section_headersetting',
			 'type' 		=> 'text',
			 'settings'	=> 'linkedin_link',
			)
	);
	
	/*Adv section*/
	$wp_customize->add_setting(
		'adv_banner',
		array(
			'default'			=> get_template_directory_uri() . '/assets/images/ad/ad-1.png',
		)
	   );
   
	   $wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'adv_banner',
			   array(
				   'label'    => __( 'Header Advertisement Banner', 'nepaleseinfinland' ),
				   'section'  => 'section_headersetting',
				   'settings' => 'adv_banner',
			   )
		   )
	   );
	   
	   /* Header Text*/
	   $wp_customize->add_setting(
		   'link_to_adv',
		   array(
			   'default'			=> '#',
		   )
	  );
	   $wp_customize->add_control(
		   'header_text',
			   array(
				'label'		=> __('Link to ad.', 'nepaleseinfinland'),
				'section' 	=> 'section_headersetting',
				'type' 		=> 'text',
				'settings'	=> 'link_to_adv',
			   )
	   );


	/*Archive Page*/
	$wp_customize->add_section(
		'section_archieve_page' ,
			array(
				'title'       	=> __( 'Archive Page Setting', 'nepaleseinfinland' ),
				'description' 	=> __( 'Setup Archive Page.', 'nepaleseinfinland' ),
				'panel'			=> 'nepaleseinfinland_setting_panel',
			)
	   );
	   $wp_customize->add_setting(
		'archive_banner',
		array(
			'default' 			=> get_template_directory_uri() . '/images/pagebanner-img.jpg',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'archive_banner_image',
			array(
				'label'    => __( 'Upload Image Archive Page', 'nepaleseinfinland' ),
				'section'  => 'section_archieve_page',
				'settings' => 'archive_banner',
			)
		)

	);
	$wp_customize->add_setting(
		'archive_header',
			array(
			 'default' 			=>  __( 'Archive Page', 'nepaleseinfinland' ),
		 )
	);
	$wp_customize->add_control(
		'archive_header',
			array(
			 'label'		=> __('Add Title for archive page.', 'nepaleseinfinland'),
			 'section' 	=> 'section_archieve_page',
			 'type' 		=> 'textarea',
			 'settings'	=> 'archive_header',
			)
	);
	/* Footer Section */
	$wp_customize->add_section(
	 'section_footer' ,
		 array(
			 'title'       	=> __( 'Footer Settings', 'nepaleseinfinland' ),
			 'description' 	=> __( 'Setup footer settings.', 'nepaleseinfinland' ),
			 'panel'			=> 'nepaleseinfinland_setting_panel',
		 )
	);

	$wp_customize->add_setting(
		'btm_footer_text',
			array(
			 'default' 			=>  __( '&copy; 2018 <a href="/">nepaleseinfinland</a>. All Rights Reserved.', 'nepaleseinfinland' ),
		 )
	);

	$wp_customize->add_control(
		'btm_footer_text',
			array(
			 'label'		=> __('Bottom Footer Text', 'nepaleseinfinland'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'textarea',
			 'settings'	=> 'btm_footer_text',
			)
	);

	$wp_customize->add_setting(
		'footer_text',
			array(
			 'default' 			=>  __( 'Intranett', 'nepaleseinfinland' ),
		 )
	);

	$wp_customize->add_control(
		'footer_text',
			array(
			 'label'		=> __('Link Text Footer', 'nepaleseinfinland'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'footer_text',
			)
	);

	$wp_customize->add_setting(
		'link_footer_text',
			array(
			 'default' 			=>  __( '#', 'nepaleseinfinland' ),
		 )
	);

	$wp_customize->add_control(
		'link_footer_text',
			array(
			 'label'		=> __('Link Text Footer', 'nepaleseinfinland'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'link_footer_text',
			)
	);

	$wp_customize->add_setting(
		'cookies_policy',
			array(
			 'default' 			=>  __( 'Personvern og cookies', 'nepaleseinfinland' ),
		 )
	);

	$wp_customize->add_control(
		'cookies_policy',
			array(
			 'label'		=> __('Text For Cookies Policy', 'nepaleseinfinland'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'cookies_policy',
			)
	);

	$wp_customize->add_setting(
		'cookies_policy_link',
			array(
			 'default' 			=>  __( '#', 'nepaleseinfinland' ),
		 )
	);

	$wp_customize->add_control(
		'cookies_policy_link',
			array(
			 'label'		=> __('Link For Cookies Policy', 'nepaleseinfinland'),
			 'section' 	=> 'section_footer',
			 'type' 		=> 'text',
			 'settings'	=> 'cookies_policy_link',
			)
	);
}
add_action( 'customize_register', 'nepaleseinfinland_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function nepaleseinfinland_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function nepaleseinfinland_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nepaleseinfinland_customize_preview_js() {
	wp_enqueue_script( 'nepaleseinfinland-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'nepaleseinfinland_customize_preview_js' );
