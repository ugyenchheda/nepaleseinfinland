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
    'type' => 'select',
    'show_option_none' => true,
    'default'          => 'custom',
    'options'          => array(
        '1' => __( 'Level One', 'cmb2' ),
        '2'   => __( 'Level Two', 'cmb2' ),
        '3'     => __( 'Level Three', 'cmb2' ),
    ),
    ));

    $cmb->add_field(array(
		'name' => 'Author',
		'desc' => 'Add the name of the author.',
		'id'   => 'news_author',
		'type' => 'text',
    ));
    ;$cmb->add_field( array(
      'name'    => 'News Image',
      'desc'    => 'Upload an image or enter an URL.',
      'id'      => 'news_image',
      'type'    => 'file',
      'options' => array(
          'url' => false, 
      ),
      'text'    => array(
          'add_upload_file_text' => 'Add File'
      ),
      'query_args' => array(
          'type' => array(
           'image/jpeg',
          'image/png',
                ),
      'preview_size' => 'large',) 
  ) );

}

add_action('cmb2_admin_init', 'events_post_meta');
function events_post_meta() {
      $cmb = new_cmb2_box(array(
          'id' => 'events',
          'title' => __('More Info:', 'cmb2'),
          'object_types' => array('events'),
          'context' => 'normal',
          'priority' => 'high',
          'show_names' => true,
          'closed' => false,

      ));

      $cmb->add_field(array(
      'name' => 'Hot Event',
      'desc' => 'Check if this is hot event.',
      'id'   => 'event_hot',
      'type' => 'select',
      'show_option_none' => true,
      'default'          => 'custom',
      'options'          => array(
          '1' => __( 'Level One', 'cmb2' ),
          '2'   => __( 'Level Two', 'cmb2' ),
          '3'     => __( 'Level Three', 'cmb2' ),
      ),
      ));

      $cmb->add_field(array(
      'name' => 'Free Event',
      'desc' => 'Check if the event is free of cost to attend.',
      'id'   => 'events_free',
      'type' => 'checkbox',
      ));

      $cmb->add_field(array(
      'name' => 'Cost of Ticket',
      'desc' => 'Add ticket price if event is not free event.',
      'id'   => 'events_price',
      'type' => 'text',
      ));

      $cmb->add_field(array(
      'name' => 'Organizer',
      'desc' => 'Add the name of the organizer.',
      'id'   => 'events_organizer',
      'type' => 'text',
      ));
      
      $cmb->add_field(array(
      'name' => 'Event Starting Date',
      'desc' => 'Select event starting date.',
      'id'   => 'event_sdate',
      'type' => 'text_date',
      'date_format' => 'l, F j,  Y',
      ));
      
      $cmb->add_field(array(
      'name' => 'Event Ending Date',
      'desc' => 'Select event ending date.',
      'id'   => 'event_edate',
      'type' => 'text_date',
      'date_format' => 'l, F j,  Y',
      ));
      $cmb->add_field( array(
        'name' => 'Starting Time',
        'desc' => 'Select event starting time.',
        'id' => 'event_stime',
        'type' => 'text_time'
    ) );
        $cmb->add_field( array(
          'name' => 'Ending Time',
          'desc' => 'Select event ending time.',
          'id' => 'event_etime',
          'type' => 'text_time'
      ) );
          
      ;$cmb->add_field( array(
        'name'    => 'Event Photos',
        'desc'    => 'Upload an image or enter an URL of image.',
        'id'      => 'event_banner',
        'type' => 'file_list',
        'preview_size' => array( 200, 200 ), 
        'query_args' => array( 'type' => 'image' ), 
        'text' => array(
            'add_upload_files_text' => 'Add or upload Files', 
            'remove_image_text' => 'Remove Image', 
            'file_text' => 'Images', 
            'file_download_text' => 'Download', 
            'remove_text' => 'Remove', 
        'options' => array(
            'url' => false, 
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add Image' 
        ),
        'query_args' => array(
            'type' => 'application/pdf', 
            // 'type' => array(
            //     'image/gif',
            //     'image/jpeg',
            //     'image/png',
            // ),
        ),
        'preview_size' => 'large',
        )
      ) );
      $cmb->add_field( array(
        'name' => 'Add Video',
        'desc' => 'Enter a youtube, twitter, or instagram URL.',
        'id'   => 'event_video',
        'type' => 'oembed',
    ) );
    $API_KEY = get_theme_mod('google_map_api');
    $cmb->add_field( array(
      'name' => 'Event Location',
      'desc' => 'Drag the marker to set the exact location',
      'id' => 'event_location',
      'type' => 'pw_map',
      'split_values' => true, 
      'api_key' => $API_KEY, 
    ) );
}




add_action('cmb2_admin_init', 'uas_post_meta');
function uas_post_meta() {
      $cmb = new_cmb2_box(array(
          'id' => 'uas',
          'title' => __('More Info:', 'nepaleseinfinland'),
          'object_types' => array('uas'),
          'context' => 'normal',
          'priority' => 'high',
          'show_names' => true,
          'closed' => false,

      ));

      $cmb->add_field(array(
      'name' => 'Hot uas',
      'desc' => 'Check if this is hot uas.',
      'id'   => 'uas_hot',
      'type' => 'checkbox',
      ));

      $cmb->add_field(array(
      'name' => 'Fees',
      'desc' => 'Add ticket price if uas is not free uas.',
      'id'   => 'uas_price',
      'type' => 'text',
      ));
      
      $cmb->add_field(array(
      'name' => 'Admission Starting Date',
      'desc' => 'Select uas starting date.',
      'id'   => 'uas_sdate',
      'type' => 'text_date',
      'date_format' => 'l, F j,  Y',
      ));
      
      $cmb->add_field(array(
      'name' => 'Admission ending date',
      'desc' => 'Select uas ending date.',
      'id'   => 'uas_edate',
      'type' => 'text_date',
      'date_format' => 'l, F j,  Y',
      ));
          
      ;$cmb->add_field( array(
        'name'    => 'University Photos',
        'desc'    => 'Add images to show on gallery.',
        'id'      => 'uas_banner',
        'type' => 'file_list',
        'text' => array(
            'add_upload_files_text' => 'Add or upload Files',
            'remove_image_text' => 'Remove Image', 
            'file_text' => 'Images', 
            'file_download_text' => 'Download', 
            'remove_text' => 'Remove', 
        'options' => array(
            'url' => false,
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add Image' 
        ),
        
        'query_args' => array(
            'type' => 'application/pdf', 
            // 'type' => array(
            //     'image/gif',
            //     'image/jpeg',
            //     'image/png',
            // ),
        ),
        'preview_size' => 'large', 
        )
      ) );
      $cmb->add_field( array(
        'name' => 'Add Video',
        'desc' => 'Enter a youtube, twitter, or instagram URL.',
        'id'   => 'uas_video',
        'type' => 'oembed',
    ) );
   $API_KEY = get_theme_mod('google_map_api'); 
    $cmb->add_field( array(
      'name' => 'UAS Location',
      'desc' => 'Drag the marker to set the exact location',
      'id' => 'uas_location',
      'type' => 'pw_map',
      'split_values' => true, 
      'api_key' => $API_KEY, 
    ) )
    ;$cmb->add_field( [
      'name' => __( 'Facebook Page Link', 'nepaleseinfinland' ),
      'desc' => __( 'Add link of facebook page..', 'nepaleseinfinland' ),
      'id' => 'uas_facebook',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Twitter Page Link', 'nepaleseinfinland' ),
      'desc' => __( 'Add link of Twitter page..', 'nepaleseinfinland' ),
      'id' => 'uas_twitter',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Youtube Page Link', 'nepaleseinfinland' ),
      'desc' => __( 'Add link of Youtube page..', 'nepaleseinfinland' ),
      'id' => 'uas_youtube',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Instagram Page Link', 'nepaleseinfinland' ),
      'desc' => __( 'Add link of Instagram page..', 'nepaleseinfinland' ),
      'id' => 'uas_instagram',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Linkedin Page Link', 'nepaleseinfinland' ),
      'desc' => __( 'Add link of Linkedin page..', 'nepaleseinfinland' ),
      'id' => 'uas_linkedin',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Official Email', 'nepaleseinfinland' ),
      'desc' => __( 'Email address of University', 'nepaleseinfinland' ),
      'id' => 'uas_email',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Contact Number', 'nepaleseinfinland' ),
      'desc' => __( 'Contact number of University', 'nepaleseinfinland' ),
      'id' => 'uas_phone',
      'type' => 'text',
      ],
    );
    ;$cmb->add_field( [
      'name' => __( 'Website Url', 'nepaleseinfinland' ),
      'desc' => __( 'Add website or university.', 'nepaleseinfinland' ),
      'id' => 'uas_website',
      'type' => 'text',
      ],
    );
}


add_action('cmb2_admin_init', 'univeristy_study_fields');
function univeristy_study_fields()
{

  $cmb_group = new_cmb2_box(array(
        'id' => 'uas_classes',
        'title' => __('Courses', 'nepaleseinfinland'),
        'object_types' => array('uas'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => false,

    ));

    $group_field_id = $cmb_group->add_field(array(
      'id' => 'faculties',
      'type' => 'group',
      'options' => array(
          'group_title' => esc_html__('Courses Conducting {#}', 'nepaleseinfinland'),
          'add_button' => esc_html__('Add New Course', 'nepaleseinfinland'),
          'remove_button' => esc_html__('Remove Courses', 'nepaleseinfinland'),
          'sortable' => true,

      ),
  ));

  $cmb_group->add_group_field($group_field_id, array(
      'name' => esc_html__('Course Name', 'nepaleseinfinland'),
      'id' => 'course_name',
      'type' => 'text',
  ));

  $cmb_group->add_group_field($group_field_id, array(
      'name' => 'Course Inforamtion.',
      'desc' => 'Add the description of courses here...',
      'id' => 'course_desc',
      'type' => 'wysiwyg',
      'options' => array(
          'wpautop' => true,
          'media_buttons' => true,
          'textarea_name' => 'course_desc',
          'textarea_rows' => get_option('default_post_edit_rows', 10),
          'tabindex' => '',
          'editor_css' => '',
          'editor_class' => '',
          'teeny' => false,
          'dfw' => false,
          'tinymce' => true,
          'quicktags' => true,
      ),
  ));

  $cmb_group->add_group_field( $group_field_id, array(
      'name' => 'Add Banner',
      'id'   => 'faculty_banner',
      'type' => 'file',
  ) );
}

add_action('cmb2_admin_init', 'video_blogs_meta');
function video_blogs_meta()
{

    $cmb = new_cmb2_box(array(
        'id' => 'vb',
        'title' => __('More Info:', 'cmb2'),
        'object_types' => array('video_blogs'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => false,

    ));

    $cmb->add_field(array(
		'name' => 'Hot News',
		'desc' => 'Check if this is hot news.',
		'id'   => 'news_hot',
    'type' => 'select',
    'show_option_none' => true,
    'default'          => 'custom',
    'options'          => array(
        '1' => __( 'Level One', 'cmb2' ),
        '2'   => __( 'Level Two', 'cmb2' ),
        '3'     => __( 'Level Three', 'cmb2' ),
    ),
    ));

    $cmb->add_field(array(
		'name' => 'Video Link',
		'desc' => 'Add the the link to video.',
		'id'   => 'video_link',
		'type' => 'text',
    ));

}

add_action( 'cmb2_admin_init', 'news_taxonomy_image' ); 
function news_taxonomy_image () {
  $cmb_term = new_cmb2_box ( array (
    'id'                =>  'edit' ,
    'title'             => esc_html__ ( 'Category Metabox' , 'cmb2' ),
    'object_types'      => array ( 'term' ),
    'taxonomies'        => array ( 'news_category' ),
  ) );
  $cmb_term -> add_field ( array (
    'name' => esc_html__ ( 'Feature Image' , 'cmb2' ),
    'desc' => esc_html__ ( 'Add feature image for branch.' , 'cmb2' ),
    'id'    => 'news_category_thumbnail' ,
    'type' => 'file' ,
  ) );


}

