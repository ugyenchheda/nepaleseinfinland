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
add_action('cmb2_admin_init', 'events_post_meta');
function events_post_meta()
{

    $cmb = new_cmb2_box(array(
        'id' => 'events',
        'title' => __('More Info:', 'cmb2'),
        'object_types' => array('event_post_type'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
        'closed' => false,

    ));

    $cmb->add_field(array(
		'name' => 'Hot events',
		'desc' => 'Check if this is hot events.',
		'id'   => 'events_hot',
		'type' => 'checkbox',
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
    // 'timezone_meta_key' => 'wiki_test_timezone',
    'type' => 'text_date',
    'date_format' => 'l, F j,  Y',
    ));
    
    $cmb->add_field(array(
		'name' => 'Event Ending Date',
		'desc' => 'Select event ending date.',
		'id'   => 'event_edate',
    // 'timezone_meta_key' => 'wiki_test_timezone',
    'type' => 'text_date',
    'date_format' => 'l, F j,  Y',
    ));
    $cmb->add_field( array(
      'name' => 'Starting Time',
      'desc' => 'Select event starting time.',
      'id' => 'event_stime',
      'type' => 'text_time'
      // Override default time-picker attributes:
      // 'attributes' => array(
      //     'data-timepicker' => json_encode( array(
      //         'timeOnlyTitle' => __( 'Choose your Time', 'cmb2' ),
      //         'timeFormat' => 'HH:mm',
      //         'stepMinute' => 1, // 1 minute increments instead of the default 5
      //     ) ),
      // ),
      // 'time_format' => 'h:i:s A',
  ) );
  $cmb->add_field( array(
    'name' => 'Ending Time',
    'desc' => 'Select event ending time.',
    'id' => 'event_etime',
    'type' => 'text_time'
    // Override default time-picker attributes:
    // 'attributes' => array(
    //     'data-timepicker' => json_encode( array(
    //         'timeOnlyTitle' => __( 'Choose your Time', 'cmb2' ),
    //         'timeFormat' => 'HH:mm',
    //         'stepMinute' => 1, // 1 minute increments instead of the default 5
    //     ) ),
    // ),
    // 'time_format' => 'h:i:s A',
) );
    
    ;$cmb->add_field( array(
      'name'    => 'Event Photos',
      'desc'    => 'Upload an image or enter an URL of image.',
      'id'      => 'event_banner',
      'type'    => 'file',
      // Optional:
      'options' => array(
          'url' => false, // Hide the text input for the url
      ),
      'text'    => array(
          'add_upload_file_text' => 'Add Image' // Change upload button text. Default: "Add or Upload File"
      ),
      // query_args are passed to wp.media's library query.
      'query_args' => array(
          'type' => 'application/pdf', // Make library only display PDFs.
          // Or only allow gif, jpg, or png images
          // 'type' => array(
          //     'image/gif',
          //     'image/jpeg',
          //     'image/png',
          // ),
      ),
      'preview_size' => 'large', // Image size to use when previewing in the admin.
  ) );
  $cmb->add_field( array(
    'name' => 'Add Video',
    'desc' => 'Enter a youtube, twitter, or instagram URL.',
    'id'   => 'event_video',
    'type' => 'oembed',
) );
$cmb->add_field( array(
	'name' => 'Event Location',
	'desc' => 'Drag the marker to set the exact location',
	'id' => 'event_location',
	'type' => 'pw_map',
	'split_values' => true, // Save latitude and longitude as two separate fields
  'api_key' => 'AIzaSyC_g4sqti9HeM-c2_CklyEnPoVZq-j3bMU', // Google API Key
) );
}
