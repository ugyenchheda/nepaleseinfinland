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
			'priority' => 29,
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
			 'label'		=> __('Select total news to display on the top bar:', 'nepaleseinfinland'),
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

	/*adv banner */
	$wp_customize->add_section(
		'section_adv_banner' ,
			array(
				'title'       	=> __( 'Adv Banner Setting', 'nepaleseinfinland' ),
				'description' 	=> __( 'Setup Adv Banner.', 'nepaleseinfinland' ),
				'panel'			=> 'nepaleseinfinland_setting_panel',
			)
		);
		   	
	/*header Adv section*/
	$wp_customize->add_setting(
		'adv_banner_head',
		array(
			'default'			=> get_template_directory_uri() . '/assets/images/ad/ad-1.png',
		)
	   );
   
	   $wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'adv_banner_head',
			   array(
				   'label'    => __( 'Header Advertisement Banner', 'nepaleseinfinland' ),
				   'section'  => 'section_adv_banner',
				   'settings' => 'adv_banner_head',
			   )
		   )
	   );
	   
	   $wp_customize->add_setting(
		   'link_to_adv',
		   array(
			   'default'			=> '#',
		   )
	  );
	   $wp_customize->add_control(
		   'header_text',
			   array(
				'label'		=> __('Link to Header Adv.', 'nepaleseinfinland'),
				'section' 	=> 'section_adv_banner',
				'type' 		=> 'text',
				'settings'	=> 'link_to_adv',
			   )
	   );
		   $wp_customize->add_setting(
			'adv_banner',
			array(
				'default' 			=> get_template_directory_uri() . '/images/ad/ad-2.jpg',
			)
		);
	// adv banner for sidebar
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'adv_banner_image_control',
				array(
					'label'    => __( 'Upload Image Adv For Sidebar', 'nepaleseinfinland' ),
					'section'  => 'section_adv_banner',
					'settings' => 'adv_banner',
				)
			)
	
		);
		$wp_customize->add_setting(
			'adv_banner_link',
				array(
				 'default' 			=>  __( '#', 'nepaleseinfinland' ),
			 )
		);
		$wp_customize->add_control(
			'adv_banner_link',
				array(
				 'label'		=> __('Add link to the adv.', 'nepaleseinfinland'),
				 'section' 	=> 'section_adv_banner',
				 'type' 		=> 'text',
				 'settings'	=> 'adv_banner_link',
				)
		);

// adv banner for footer
$wp_customize->add_setting(
	'adv_banner_footer',
	array(
		'default'			=> get_template_directory_uri() . '/assets/images/ad/ad-1.png',
	)
   );

   $wp_customize->add_control(
   new WP_Customize_Image_Control(
	   $wp_customize,
	   'adv_banner_footer',
		   array(
			   'label'    => __( 'Footer Adv Banner', 'nepaleseinfinland' ),
			   'section'  => 'section_adv_banner',
			   'settings' => 'adv_banner_footer',
		   )
	   )
   );
   
   $wp_customize->add_setting(
	   'footer_adv_link',
	   array(
		   'default'			=> '#',
	   )
  );
   $wp_customize->add_control(
	   'header_text',
		   array(
			'label'		=> __('Link to Footer Adv.', 'nepaleseinfinland'),
			'section' 	=> 'section_adv_banner',
			'type' 		=> 'text',
			'settings'	=> 'footer_adv_link',
		   )
   );
	   $wp_customize->add_setting(
		'adv_banner',
		array(
			'default' 			=> get_template_directory_uri() . '/images/ad/ad-2.jpg',
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





	//News feed to display

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
'section_newslist' ,
array(
	'title'       	=> __( 'Homepage News', 'nepaleseinfinland' ),
	'description' 	=> __( 'Setup Homepage News.', 'nepaleseinfinland' ),
	'panel'			=> 'nepaleseinfinland_setting_panel',
	'priority' => 30,
)
);
//Homepage Youtube video section News
$wp_customize->add_setting(
	'hompage_video_title',
	array(
		'default'			=> 'Video News',
	)
	);
	$wp_customize->add_control(
	'hompage_video_title',
		array(
		 'label'		=> __('Video Title', 'nepaleseinfinland'),
		 'section' 	=> 'section_newslist',
		 'type' 		=> 'text',
		 'settings'	=> 'hompage_video_title',
		)
	);
	$wp_customize->add_setting(
		'hompage_video_description',
		array(
		)
		);
		$wp_customize->add_control(
		'hompage_video_description',
			array(
			 'label'		=> __('Add Video Description', 'nepaleseinfinland'),
			 'section' 	=> 'section_newslist',
			 'type' 		=> 'textarea',
			 'settings'	=> 'hompage_video_description',
			)
		);
	$wp_customize->add_setting(
		'hompage_video_link',
		array(
			'default'			=> 'Video Link',
		)
		);
		$wp_customize->add_control(
		'hompage_video_link',
			array(
			 'label'		=> __('Add the youtube video link', 'nepaleseinfinland'),
			 'section' 	=> 'section_newslist',
			 'type' 		=> 'text',
			 'settings'	=> 'hompage_video_link',
			)
		);
//Homepage bottom section News
$wp_customize->add_setting(
'hompage_news_title',
array(
	'default'			=> 'Homepage News List',
)
);
$wp_customize->add_control(
'hompage_news_title',
	array(
	 'label'		=> __('Title for News Section at bottom', 'nepaleseinfinland'),
	 'section' 	=> 'section_newslist',
	 'type' 		=> 'text',
	 'settings'	=> 'hompage_news_title',
	)
);

$terms = get_terms(array(
'taxonomy'=> 'news_category',
'hide_empty'=> false,
));
$caters = array();
$i = 0;
foreach($terms as $category){
$caters[$category->term_id] = $category->name;
}

$wp_customize->add_setting('homepage_news_category', 
array(
	'default'			=> 'Latest News',
	)
);

$wp_customize->add_control(
'homepage_news_category',
	array(
	'label'		=> __('Choose News Category:', 'nepaleseinfinland'),
	'description' => 'Select news category to display in homepage bottom section.',
	'section' 	=> 'section_newslist',
	'type' 		=> 'text',
	'settings'	=> 'homepage_news_category',
	'type'    => 'select',
	'choices' => $caters
	)
);

$wp_customize->add_setting(
'no_of_news_hp',
array(
	'default'			=> '4',
)
);
$wp_customize->add_control(
'no_of_news_hp',
	array(
	 'label'		=> __('Select total news to display on homepage:', 'nepaleseinfinland'),
	 'section' 	=> 'section_newslist',
	 'type' 		=> 'text',
	 'settings'	=> 'no_of_news_hp',
	)
);

//Homepage Sidebar News Listing
$wp_customize->add_section(
	'section_sidebar_news' ,
	array(
		'title'       	=> __( 'Sidebar News', 'nepaleseinfinland' ),
		'description' 	=> __( 'Setup Sidebar News.', 'nepaleseinfinland' ),
		'panel'			=> 'nepaleseinfinland_setting_panel',
		'priority' => 31,
	)
	);
		//sidebar news 1
	$wp_customize->add_setting(
	'sidebar_news_title_one',
	array(
		'default'			=> 'Sidebar News List One',
	)
	);
	$wp_customize->add_control(
	'sidebar_news_title_one',
		array(
		 'label'		=> __('Title for Sidebar News 1', 'nepaleseinfinland'),
		 'section' 	=> 'section_sidebar_news',
		 'type' 		=> 'text',
		 'settings'	=> 'sidebar_news_title_one',
		)
	);
	
	$terms = get_terms(array(
	'taxonomy'=> 'news_category',
	'hide_empty'=> false,
	));
	$caters = array();
	$i = 0;
	foreach($terms as $category){
	$caters[$category->term_id] = $category->name;
	}
	
	$wp_customize->add_setting('sidebar_news_one', 
	array(
		'default'			=> 'Latest News',
		)
	);
	
	$wp_customize->add_control(
	'sidebar_news_one',
		array(
		'label'		=> __('Choose Category for Sidebar News 1:', 'nepaleseinfinland'),
		'description' => 'Select news category to display in slider  in home page.',
		'section' 	=> 'section_sidebar_news',
		'type' 		=> 'text',
		'settings'	=> 'sidebar_news_one',
		'type'    => 'select',
		'choices' => $caters
		)
	);
	
	$wp_customize->add_setting(
	'no_of_news_one',
	array(
		'default'			=> '4',
	)
	);
	$wp_customize->add_control(
	'no_of_news_one',
		array(
		 'label'		=> __('Select total news to display on homepage:', 'nepaleseinfinland'),
		 'section' 	=> 'section_sidebar_news',
		 'type' 		=> 'text',
		 'settings'	=> 'no_of_news_one',
		)
	);
	
	$wp_customize->add_setting('sidebar_news_one', 
	array(
		'default'			=> 'Latest News',
		)
	);


	//sidebar news 2
	$wp_customize->add_setting(
		'sidebar_news_title_two',
		array(
			'default'			=> 'Sidebar News List Two',
		)
		);
		$wp_customize->add_control(
		'sidebar_news_title_two',
			array(
			 'label'		=> __('Title for Sidebar News 2', 'nepaleseinfinland'),
			 'section' 	=> 'section_sidebar_news',
			 'type' 		=> 'text',
			 'settings'	=> 'sidebar_news_title_two',
			)
		);

		$wp_customize->add_setting('sidebar_news_two', 
		array(
			'default'			=> 'Latest News',
			)
		);
	
	$wp_customize->add_control(
	'sidebar_news_two',
		array(
		'label'		=> __('Choose Category for Sidebar News 2:', 'nepaleseinfinland'),
		'description' => 'Select news category to display in slider  in home page.',
		'section' 	=> 'section_sidebar_news',
		'type' 		=> 'text',
		'settings'	=> 'sidebar_news_two',
		'type'    => 'select',
		'choices' => $caters
		)
	);
	
	$wp_customize->add_setting(
	'no_of_news_two',
	array(
		'default'			=> '4',
	)
	);
	$wp_customize->add_control(
	'no_of_news_two',
		array(
		 'label'		=> __('Select total news to display on homepage:', 'nepaleseinfinland'),
		 'section' 	=> 'section_sidebar_news',
		 'type' 		=> 'text',
		 'settings'	=> 'no_of_news_two',
		)
	);//sidebar news 3
	$wp_customize->add_setting(
		'sidebar_news_title_three',
		array(
			'default'			=> 'Sidebar News List three',
		)
		);
		$wp_customize->add_control(
		'sidebar_news_title_three',
			array(
			 'label'		=> __('Title for Sidebar News 2', 'nepaleseinfinland'),
			 'section' 	=> 'section_sidebar_news',
			 'type' 		=> 'text',
			 'settings'	=> 'sidebar_news_title_three',
			)
		);

		$wp_customize->add_setting('sidebar_news_three', 
		array(
			'default'			=> 'Latest News',
			)
		);
	
	$wp_customize->add_control(
	'sidebar_news_three',
		array(
		'label'		=> __('Choose Category for Sidebar News 3:', 'nepaleseinfinland'),
		'description' => 'Select news category to display in slider  in home page.',
		'section' 	=> 'section_sidebar_news',
		'type' 		=> 'text',
		'settings'	=> 'sidebar_news_three',
		'type'    => 'select',
		'choices' => $caters
		)
	);
	
	$wp_customize->add_setting(
	'no_of_news_three',
	array(
		'default'			=> '4',
	)
	);
	$wp_customize->add_control(
	'no_of_news_three',
		array(
		 'label'		=> __('Select total news to display on homepage:', 'nepaleseinfinland'),
		 'section' 	=> 'section_sidebar_news',
		 'type' 		=> 'text',
		 'settings'	=> 'no_of_news_three',
		)
	);
	
	
	
	
	
//google map field for customizer


$wp_customize->add_section(
	'section_mapapi' ,
	array(
		'title'       	=> __( 'Google Map API', 'nepaleseinfinland' ),
		'description' 	=> __( 'Add google map API.', 'nepaleseinfinland' ),
		'panel'			=> 'nepaleseinfinland_setting_panel',
	)
	);
	
	$wp_customize->add_setting(
	'google_map_api',
	array(
		
	)
	);
	$wp_customize->add_control(
	'google_map_api',
		array(
		 'label'		=> __('Enter Map API', 'nepaleseinfinland'),
		 'section' 	=> 'section_mapapi',
		 'type' 		=> 'text',
		 'settings'	=> 'google_map_api',
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
