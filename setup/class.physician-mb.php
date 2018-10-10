<?php

/*
 *  Meta Box Fields for UAMS-2016
 */

//register_activation_hook( __FILE__, 'prefix_create_table' );

global $wpdb;
//$table_name = $wpdb->prefix.'uams_locations';
if($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}uams_locations'") != "{$wpdb->prefix}uams_locations") {
  add_action( 'init', 'location_create_table' );
  function location_create_table() {

      global $wpdb;
    
      if ( ! class_exists( 'MB_Custom_Table_API' ) ) {
          return;
      }
      MB_Custom_Table_API::create( "{$wpdb->prefix}uams_locations", array(
          'location_abbreviation' => 'VARCHAR(25) NOT NULL',
          'location_address_1'   => 'VARCHAR(50) NOT NULL',
          'location_address_2'   => 'VARCHAR(65) NOT NULL',
          'location_city'   => 'VARCHAR(50) NOT NULL',
          'location_state'   => 'VARCHAR(2) NOT NULL',
          'location_zip'   => 'VARCHAR(10) NOT NULL',
          'location_map'   => 'TEXT NOT NULL',
          'location_phone'   => 'VARCHAR(30) NOT NULL',
          'location_appointments'   => 'VARCHAR(255) NOT NULL',
          'location_fax'   => 'VARCHAR(30) NOT NULL',
          'location_email'   => 'VARCHAR(100) NOT NULL',
          'location_web_name'   => 'VARCHAR(50) NOT NULL',
          'location_url'   => 'VARCHAR(100) NOT NULL',
          'location_24_7'  => 'TINYINT(1) NOT NULL',
          'location_mon_open'  => 'VARCHAR(12) NOT NULL',
          'location_mon_close'  => 'VARCHAR(12) NOT NULL',
          'location_tues_open'  => 'VARCHAR(12) NOT NULL',
          'location_tues_close'  => 'VARCHAR(12) NOT NULL',
          'location_wed_open'  => 'VARCHAR(12) NOT NULL',
          'location_wed_close'  => 'VARCHAR(12) NOT NULL',
          'location_thurs_open'  => 'VARCHAR(12) NOT NULL',
          'location_thurs_close'  => 'VARCHAR(12) NOT NULL',
          'location_fri_open'  => 'VARCHAR(12) NOT NULL',
          'location_fri_close'  => 'VARCHAR(12) NOT NULL',
          'location_sat_open'  => 'VARCHAR(12) NOT NULL',
          'location_sat_close'  => 'VARCHAR(12) NOT NULL',
          'location_sun_open'  => 'VARCHAR(12) NOT NULL',
          'location_sun_close'  => 'VARCHAR(12) NOT NULL',
          'location_details'   => 'VARCHAR(100) NOT NULL',
          'location_parking'   => 'TEXT NOT NULL',
          'location_directions'   => 'TEXT NOT NULL',
      ) );
  }
}

$table_name = $wpdb->prefix.'uams_physicians';
if($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}uams_physicians'") != "{$wpdb->prefix}uams_physicians") {
  add_action( 'init', 'physicians_create_table' );
  function physicians_create_table() {

      global $wpdb;
    
      if ( ! class_exists( 'MB_Custom_Table_API' ) ) {
          return;
      }
      MB_Custom_Table_API::create( "{$wpdb->prefix}uams_physicians", array(
          //'profile_type' => 'VARCHAR(25) NOT NULL',
          'physician_first_name' => 'VARCHAR(50) NOT NULL',
          'physician_middle_name' => 'VARCHAR(50) NOT NULL',
          'physician_last_name' => 'VARCHAR(50) NOT NULL',
          'physician_degree' => 'VARCHAR(25) NOT NULL',
          'physician_title' => 'VARCHAR(255) NOT NULL',
          'physician_clinical_bio' => 'LONGTEXT NOT NULL',
          'physician_short_clinical_bio' => 'VARCHAR(255) NOT NULL',
          'physician_gender' => 'VARCHAR(10) NOT NULL',
          'physician_youtube_link' => 'VARCHAR(255) NOT NULL',
          'physician_appointment_link' => 'VARCHAR(255) NOT NULL',
          'physician_primary_care' => 'TINYINT(2) NOT NULL',
          'physician_referral_required' => 'TINYINT(2) NOT NULL',
          'physician_accepting_patients' => 'TINYINT(2) NOT NULL',
          'physician_second_opinion' => 'TINYINT(2) NOT NULL',
          'physician_pid' => 'VARCHAR(10) NOT NULL',
          'physician_npi' => 'VARCHAR(10) NOT NULL',
          'physician_academic_title' => 'VARCHAR(255) NOT NULL',
          'physician_academic_bio' => 'LONGTEXT NOT NULL',
          'physician_academic_short_bio' => 'VARCHAR(255) NOT NULL',
          'physician_academic_office' => 'VARCHAR(255) NOT NULL',
          'physician_academic_map' => 'VARCHAR(25) NOT NULL',
          'physician_contact_information' => 'LONGTEXT NOT NULL',
          'physician_academic_appointment' => 'LONGTEXT NOT NULL',
          'physician_education' => 'LONGTEXT NOT NULL',
          'physician_research_profiles_link' => 'VARCHAR(255) NOT NULL',
          'physician_pubmed_author_id' => 'VARCHAR(10) NOT NULL',
          'pubmed_author_number' => 'TINYINT(2) NOT NULL',
          'physician_select_publications' => 'LONGTEXT NOT NULL',
          'physician_research_bio' => 'LONGTEXT NOT NULL',
          'physician_research_interests' => 'TEXT NOT NULL',
          'physician_awards' => 'LONGTEXT NOT NULL',
          'physician_additional_info' => 'LONGTEXT NOT NULL',
      ) );
  }
}

// if($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}uams_services'") != "{$wpdb->prefix}uams_locations") {
//   add_action( 'init', 'location_create_table' );
//   function location_create_table() {

//       global $wpdb;
    
//       if ( ! class_exists( 'MB_Custom_Table_API' ) ) {
//           return;
//       }
//       MB_Custom_Table_API::create( "{$wpdb->prefix}uams_services", array(
//           'location_abbreviation' => 'VARCHAR(25) NOT NULL',
//           'location_address_1'   => 'VARCHAR(50) NOT NULL',
//           'location_address_2'   => 'VARCHAR(65) NOT NULL',
//           'location_city'   => 'VARCHAR(50) NOT NULL',
//           'location_state'   => 'VARCHAR(2) NOT NULL',
//           'location_zip'   => 'VARCHAR(10) NOT NULL',
//           'location_map'   => 'TEXT NOT NULL',
//           'location_phone'   => 'VARCHAR(30) NOT NULL',
//           'location_appointments'   => 'VARCHAR(255) NOT NULL',
//           'location_fax'   => 'VARCHAR(30) NOT NULL',
//           'location_email'   => 'VARCHAR(100) NOT NULL',
//           'location_web_name'   => 'VARCHAR(50) NOT NULL',
//           'location_url'   => 'VARCHAR(100) NOT NULL',
//           'location_24_7'  => 'TINYINT(1) NOT NULL',
//           'location_mon_open'  => 'VARCHAR(12) NOT NULL',
//           'location_mon_close'  => 'VARCHAR(12) NOT NULL',
//           'location_tues_open'  => 'VARCHAR(12) NOT NULL',
//           'location_tues_close'  => 'VARCHAR(12) NOT NULL',
//           'location_wed_open'  => 'VARCHAR(12) NOT NULL',
//           'location_wed_close'  => 'VARCHAR(12) NOT NULL',
//           'location_thurs_open'  => 'VARCHAR(12) NOT NULL',
//           'location_thurs_close'  => 'VARCHAR(12) NOT NULL',
//           'location_fri_open'  => 'VARCHAR(12) NOT NULL',
//           'location_fri_close'  => 'VARCHAR(12) NOT NULL',
//           'location_sat_open'  => 'VARCHAR(12) NOT NULL',
//           'location_sat_close'  => 'VARCHAR(12) NOT NULL',
//           'location_sun_open'  => 'VARCHAR(12) NOT NULL',
//           'location_sun_close'  => 'VARCHAR(12) NOT NULL',
//           'location_details'   => 'VARCHAR(100) NOT NULL',
//           'location_parking'   => 'TEXT NOT NULL',
//           'location_directions'   => 'TEXT NOT NULL',
//       ) );
//   }
// }

add_filter( 'rwmb_meta_boxes', 'uams_physicians_register_meta_boxes' );

function uams_physicians_register_meta_boxes( $meta_boxes ) {

    global $wpdb;

    // Get the current post content and set as the default value for the wysiwyg field.
    $default_excerpt = '';
    $post_id         = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
    if ( ! $post_id ) {
        $post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
    }
    if ( $post_id ) {
        $default_excerpt = get_the_excerpt( $post_id );
    }

    $meta_boxes[] = array (
      'id' => 'locations',
      'title' => 'Location Information',
      'post_types' =>   array (
         'locations',
      ),
       'storage_type' => 'custom_table',    // Important
       'table' => "{$wpdb->prefix}uams_locations", // Your custom table name
      'context' => 'after_title',
      'priority' => 'high',
      'autosave' => true,
      'tabs' =>   array (
        'tab_address' =>     array (
          'label' => 'Address',
          'icon' => 'dashicons-location-alt',
        ),
        'tab_location_details' =>     array (
          'label' => 'Location Details',
          'icon' => 'dashicons-location',
        ),
        'tab_location_hours' =>     array (
          'label' => 'Hours of Operation',
          'icon' => 'dashicons-clock',
        ),
        'tab_location_medical' =>     array (
          'label' => 'Medical Info',
          'icon' => 'dashicons-heart',
        ),
      ),
      'fields' =>   array (
         
        array (
          'id' => 'location_abbreviation',
          'type' => 'text',
          'name' => 'Abbreviation',
          'tab' => 'tab_address',
          'columns'    => 12,
        ),

        array (
          'id' => 'location_description',
          'type' => 'text',
          'name' => 'Location Description',
          'tab' => 'tab_address',
          'columns'    => 12,
        ),
         
        array (
          'id' => 'location_address_1',
          'type' => 'text',
          'name' => 'Address',
          'tab' => 'tab_address',
          'columns'    => 12,
        ),
         
        array (
          'id' => 'location_address_2',
          'type' => 'text',
          'name' => 'Address (2)',
          'tab' => 'tab_address',
          'columns'    => 12,
        ),
         
        array (
          'id' => 'location_city',
          'type' => 'text',
          'name' => 'City',
          'tab' => 'tab_address',
          'columns'    => 12,
        ),
         
        array (
          'id' => 'location_state',
          'name' => 'State',
          'tab' => 'tab_address',
          'type' => 'select',
          'columns'    => 12,
          'placeholder' => 'Select an Item',
          'options' =>       array (
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
          ),
          'std' =>       array (
             'AR',
          ),
        ),
         
        array (
          'id' => 'location_zip',
          'type' => 'text',
          'name' => 'Zip',
          'placeholder' => '72205',
          'size' => '30',
          'columns'    => 12,
          'tab' => 'tab_address',
        ),
         
        array (
          'id' => 'location_map',
          'type' => 'map',
          'name' => 'Map',
          'std' => '34.7492719,-92.3198281,14',
          'address_field' => 'location_address_1,location_city,location_state,location_zip',
          'columns'    => 12,
          'tab' => 'tab_address',
        ),

        array (
          'id' => 'location_parking',
          'type' => 'wysiwyg',
          'name' => 'Parking Instructions',
          'tab' => 'tab_address',
          'columns'    => 12,
          'options' => array(
            'textarea_rows' => 3,
            'media_buttons' => false,
            'teeny'         => true,
          ),
        ),

        array (
          'id' => 'location_direction',
          'type' => 'wysiwyg',
          'name' => 'Directions (Written)',
          'tab' => 'tab_address',
          'columns'    => 12,
          'options' => array(
            'textarea_rows' => 3,
            'media_buttons' => false,
            'teeny'         => true,
          ),
        ),
         
        array (
          'type' => 'custom_html',
          'std' => '<style>#postexcerpt{display:none;}</style>' . ($default_excerpt ? '<div class="rwmb-label"><label>Short Description: </label></div><div class="rwmb-input">' . $default_excerpt . '</div>' : ''),
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),
        
        array (
          'id' => 'excerpt',
          'type' => 'textarea',
          'name' => 'Update Short Description',
          'std' => $default_excerpt,
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),
        
        array (
          'id' => 'location_phone',
          'type' => 'text',
          'name' => 'Phone',
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),
         
        array (
          'id' => 'location_fax',
          'type' => 'text',
          'name' => 'Fax',
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),

        array (
          'id' => 'location_appointments',
          'type' => 'fieldset_text',
          'name' => 'Additional Phone Numbers',
          'label_description' => 'Example: <br/>New Patients: ###-###-####  ',
          'columns'    => 12,
          'tab' => 'tab_location_details',
          'options' => array(
            'text'  => 'Text',
            'number'  => 'Phone #',
          ),
          'clone'  => true,
        ),
         
        array (
          'id' => 'location_email',
          'name' => 'Email',
          'type' => 'email',
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),
         
        array (
          'id' => 'location_web_name',
          'type' => 'text',
          'name' => 'Website Name',
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),
         
        array (
          'id' => 'location_url',
          'type' => 'url',
          'name' => 'URL',
          'columns'    => 12,
          'tab' => 'tab_location_details',
        ),

        array(
          'type' => 'heading',
          'name' => 'Hours of Operation',
          'desc' => 'Set the time for each day or 24/7. Leave time blank for closed.',
          'columns'    => 12,
          'tab' => 'tab_location_hours', 
        ),

        array(
          'name' => 'Open 24/7',
          'id'   => 'location_24_7',
          'type' => 'switch',
          'std'  => 0, // 0 or 1
          'columns'    => 12,
          'tab' => 'tab_location_hours',
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '&nbsp;',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Open</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Close</h4>',
          'columns' => 6,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Sunday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),
        
        array(
          'name'       => ' ',
          'id'         => 'location_sun_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
              'stepMinute'      => 15,
              'timeFormat'      => 'h:mm tt',
              'showButtonPanel' => true,
              'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_sun_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'class'  => 'inline',
          'js_options' => array(
              'stepMinute'      => 15,
              'timeFormat'      => 'h:mm tt',
              'showButtonPanel' => true,
              'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Monday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_mon_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_mon_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Tuesday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_tues_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_tues_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Wednesday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_wed_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_wed_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Thursday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_thurs_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_thurs_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Friday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_fri_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_fri_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'type' => 'custom_html',
          // HTML content
          'std'  => '<h4>Saturday Hours</h4>',
          'columns' => 3,
          'tab' => 'tab_location_hours',
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_sat_open',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 3,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array(
          'name'       => ' ',
          'id'         => 'location_sat_close',
          'type'       => 'time',
          'size'       => 8,
          'columns'    => 6,
          'tab'        => 'tab_location_hours',
          'js_options' => array(
            'stepMinute'      => 15,
            'timeFormat'      => 'h:mm tt',
            'showButtonPanel' => true,
            'oneLine'         => true,
          ),
          'inline'     => false,
          'hidden' => array( 'location_24_7', '=', '1' ),
        ),

        array (
          'id' => 'location_medical_specialties',
          'type' => 'taxonomy',
          'name' => 'Medical Specialties Offered',
          'tab' => 'tab_location_medical',
          'taxonomy' => 'specialty',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'columns'    => 12,
          'js_options'      => array(
            'width' => '100%',
          ),
        ),
        array (
          'id' => 'location_medical_terms',
          'type' => 'taxonomy',
          'name' => 'Medical Terms',
          'tab' => 'tab_location_medical',
          'taxonomy' => 'medical_terms',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'columns'    => 12,
          'js_options'      => array(
            'width' => '100%',
          ),
        ),
      ),
      'validation' => array(
		    'rules'  => array(
		        'location_address_1' => array(
		            'required'  => true,
		        ),
		        'location_city' => array(
		            'required'  => true,
		        ),
		        'location_state' => array(
		            'required'  => true,
		        ),
		        'location_zip' => array(
		            'required'  => true,
		            'zipcodeUS' => true,
		            'maxlength' => 10,
          			'minlength' => 5,
		        ),
		        'location_map' => array(
		            'required'  => true,
		        ),
		        'location_phone' => array(
		            'required'  => true,
		            'phoneUS' => true,
		        ),
		    ),
		    // Optional override of default error messages
		    // 'messages' => array(
		    //     'field_id' => array(
		    //         'required'  => 'Password is required',
		    //         'minlength' => 'Password must be at least 7 characters',
		    //     ),
		    // )
		  ),
    );

    $meta_boxes[] = array (
      'id' => 'physicians',
      'title' => 'Physicians',
      'post_types' =>   array (
         'physicians',
      ),
      'storage_type' => 'custom_table',    // Important
      'table' => "{$wpdb->prefix}uams_physicians", // Your custom table name
      'context' => 'normal',
      'priority' => 'high',
      'autosave' => true,
      'tab_style' => 'box',
      'tab_wrapper' => true,
      'tabs' =>   array (
	        'tab_details' =>     array (
	          'label' => 'Details',
	          'icon' => 'dashicons-admin-users',
	        ),
	        'tab_clin_profile' =>     array (
	          'label' => 'Clinical Profile',
	          'icon' => 'dashicons-id-alt',
	        ),
	        'tab_clin_details' =>     array (
	          'label' => 'Clinical Details',
	          'icon' => 'dashicons-forms',
	        ),
	        'tab_academic' =>     array (
	          'label' => 'Academic Profile',
	          'icon' => 'dashicons-edit',
	        ),
	        'tab_edu' =>     array (
	          'label' => 'Education',
	          'icon' => 'dashicons-book-alt',
	        ),
	        'tab_research' =>     array (
	          'label' => 'Research',
	          'icon' => 'dashicons-clipboard',
	        ),
	        'tab_extra' =>     array (
	          'label' => 'Extra',
	          'icon' => 'dashicons-awards',
	        ),
      ),

      'fields' =>   array (

         
        array (
          	'id' => 'physician_first_name',
          	'type' => 'text',
          	'name' => 'First Name',
          	'tab' => 'tab_details',
            'columns' => 4,
        ),
         
        array (
          	'id' => 'physician_middle_name',
          	'type' => 'text',
          	'name' => 'Middle Name',
          	'tab' => 'tab_details',
            'columns' => 2,
        ),
         
        array (
          'id' => 'physician_last_name',
          'type' => 'text',
          'name' => 'Last Name',
          'tab' => 'tab_details',
          'columns' => 4,
        ),
         
        array (
          'id' => 'physician_degree',
          'type' => 'text',
          'name' => 'Degree',
          'tab' => 'tab_details',
          'columns' => 2,
        ),
        array(
            'id'   => 'physician_full_name_meta',
            'type' => 'hidden',
            'tab' => 'tab_details',
            // Hidden field must have predefined value
            'std'  => '',
        ),
         
        /* Clinical Profile Tab */ 
        array (
          'id' => 'physician_title',
          'type' => 'text',
          'name' => 'Title',
          'tab' => 'tab_clin_profile',
          'label_description' => 'Main Title',
          'columns' => 12,
        ),
         
        array (
          'id' => 'physician_clinical_bio',
          'name' => 'Clinical Bio',
          'type' => 'wysiwyg',
          'options' => array(
              'textarea_rows' => 16,
              'teeny'         => false,
              'media_buttons' => false,
          ),
          'tab' => 'tab_clin_profile',
          'columns' => 12,
        ),
         
        array (
          'id' => 'physician_short_clinical_bio',
          'type' => 'textarea',
          'name' => 'Short Bio',
          'tab' => 'tab_clin_profile',
          'label_description' => 'Limit of 30 words. Preferred length is approx 18 words.',
          'columns' => 6,
        ),
         
        array (
          'id' => 'physician_gender',
          'name' => 'Gender',
          'type' => 'radio',
          'columns' => 6,
          'options' => array(
            'Male' => 'Male', 
            'Female' => 'Female', 
          ),
          'inline' => false,
          'tab' => 'tab_clin_profile',
        ),
         
        array (
          'id' => 'physician_youtube_link',
          'type' => 'url',
          'name' => 'Youtube Link',
          'label_description' => 'Full URL, including https://',
          'columns' => 6,
          'tab' => 'tab_clin_profile',
        ),

        array (
          'id' => 'physician_languages',
          'name' => 'Language(s)',
          'type' => 'taxonomy',
          'taxonomy' => 'languages',
          'field_type' => 'select_advanced',
          'multiple'    => true,
          'columns' => 6,
          'tab' => 'tab_clin_profile',
          'std' => '542', // English
          'query_args' => array(
            'orderby' => 'term_id',
          ),
          'js_options'      => array(
            'width' => '100%',
          ),
        ),

        // array (
        //   'id' => 'physician_locations',
        //   'type' => 'post',
        //   'name' => 'Location(s)',
        //   'post_type' => 'locations',
        //   'multiple' => true,
        //   'field_type' => 'select_advanced',
        //   'columns' => 6,
        //   'tab' => 'tab_clin_profile',
        //   'placeholder' => 'Select an Item',
        //   'std' => '179', // UAMS
        //   'query_args'  => array(
        //       'post_status'    => 'publish',
        //       'posts_per_page' => - 1,
        //   ),
        //   'js_options'      => array(
        //     'width' => '100%',
        //   ),
        // ),
         
        array (
          'id' => 'physician_affiliation',
          'name' => 'Affiliation',
          'type' => 'taxonomy',
          'taxonomy' => 'affiliations',
          'field_type' => 'checkbox_list',
          'columns' => 6,
          'multiple'    => true,
          'std' => '532', // UAMS
          'query_args' => array(
            'orderby' => 'term_id',
          ),
          'tab' => 'tab_clin_profile',
        ),


        /* Clinical Details Tab */ 
        array (
          'id' => 'clinical_info',
          'type' => 'heading',
          'name' => 'Clinical Info',
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'physician_appointment_link',
          'type' => 'url',
          'size' => 45,
          'std' => 'https://uamshealth.com/appointments',
          'name' => 'Appointment Link',
          'tab' => 'tab_clin_details',
        ),

        array (
          'id' => 'physician_primary_care',
          // 'name' => 'Primary Care',
          'type' => 'checkbox',
          'desc' => 'Primary Care Physician?',
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'physician_referral_required',
          // 'name' => 'Referral Required',
          'type' => 'checkbox',
          'desc' => 'Referral required for new patients',
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'physician_accepting_patients',
          // 'name' => 'Accepting New Patients',
          'type' => 'checkbox',
          'desc' => 'Currently accepting new patients',
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'physician_second_opinion',
          // 'name' => 'Provides Second Opinion',
          'type' => 'checkbox',
          'desc' => 'Provides second opinion',
          'tab' => 'tab_clin_details',
        ),

        array (
          'id' => 'physician_patient_types',
          'type' => 'taxonomy',
          'name' => 'Patient Types',
          'taxonomy' => 'patient_type',
          'field_type' => 'checkbox_list',
          'multiple'    => true,
          'tab' => 'tab_clin_details',
        ),

        array (
          'id' => 'medical_specialties',
          'type' => 'taxonomy',
          'name' => 'Medical Specialties',
          'taxonomy' => 'specialty',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'tab' => 'tab_clin_details',
        ),

        array (
          'id' => 'physician_conditions',
          'type' => 'taxonomy',
          'name' => 'Conditions Treated',
          'taxonomy' => 'condition',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'tab' => 'tab_clin_details',
        ),

        array (
          'id' => 'medical_procedures',
          'type' => 'taxonomy',
          'name' => 'Medical Procedures',
          'taxonomy' => 'medical_procedures',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'medical_terms',
          'type' => 'taxonomy',
          'name' => 'Medical Terms (Tags)',
          'taxonomy' => 'medical_terms',
          'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'tab' => 'tab_clin_details',

        ),

        array (
          'id' => 'physician_pid',
          'type' => 'text',
          'name' => 'PID',
          'columns' => 6,
          'tab' => 'tab_clin_details',
        ),
         
        array (
          'id' => 'physician_npi',
          'type' => 'text',
          'name' => 'NPI',
          'columns' => 6,
          'tab' => 'tab_clin_details',
        ),
        
        /* Academic Profile Tab */ 
        array (
          'id' => 'profile_info',
          'type' => 'heading',
          'desc' => 'This information is designed for department and public websites.',
          'name' => 'Profile Information',
          'tab' => 'tab_academic',
          'columns' => 12,
        ),
         
        array (
          'id' => 'physician_academic_title',
          'type' => 'text',
          'name' => 'Academic Title',
          'size' => 45,
          'tab' => 'tab_academic',
          'columns' => 12,
        ),
         
        array (
          'id' => 'physician_academic_college',
          'type' => 'taxonomy',
          'name' => 'College Affiliation',
          'taxonomy' => 'academic_colleges',
          'field_type' => 'checkbox_list',
          'multiple'    => true,
          'columns' => 6,
          'tab' => 'tab_academic',
        ),
         
        array (
          'id' => 'physician_academic_position',
          'type' => 'taxonomy',
          'name' => 'Position',
          'taxonomy' => 'academic_positions',
          'field_type' => 'checkbox_list',
          'multiple'    => true,
          'columns' => 6,
          //'placeholder' => 'Select an Item',
          'tab' => 'tab_academic',
        ),
         
        array (
          'id' => 'physician_academic_bio',
          'name' => 'Academic Bio',
          'type' => 'wysiwyg',
          'columns' => 12,
          'options' => array(
              'textarea_rows' => 16,
              //'teeny'         => false,
              'media_buttons' => false,
          ),
          'tab' => 'tab_academic',
        ),
         
        array (
          'id' => 'physician_academic_short_bio',
          'type' => 'textarea',
          'name' => 'Short Academic Bio',
          'label_description' => 'Limit of 30 words. Preferred length is approx 18 words.',
          'tab' => 'tab_academic',
          'columns' => 12,
        ),
         
        // array(
        //     'type' => 'heading',
        //     'name' => 'Office Information',
        //     'desc' => '',
        //     'tab' => 'tab_academic',
        //     'columns' => 12,
        // ),

        array (
          'id' => 'physician_academic_office',
          'type' => 'text',
          'name' => 'Office Location',
          'tab' => 'tab_academic',
          'columns' => 6,
        ),
         
        array (
          'id' => 'physician_academic_map',
          'name' => 'Building / Map',
          'type' => 'select',
          'columns' => 6,
          'placeholder' => 'Select an Item',
          'options' => array(
            '127' => '12th St. Clinic',
            '116' => 'Administration West (ADMINW)',
            '117' => 'Barton Research (BART)',
            '118' => 'Biomedical Research Center I (BMR1)',
            '119' => 'Biomedical Research Center II (BMR2)',
            '120' => 'Bioventures (BVENT)',
            '121' => 'Boiler House (BH)',
            '122' => 'Central Building (CENT)',
            '123' => 'College of Public Health (COPH)',
            '124' => 'Computer Building (COMP)',
            '125' => 'Cottage 3 (C3)',
            '128' => 'Distribution Center (DIST)',
            '129' => 'Donald W. Reynolds Institute on Aging (RIOA)',
            '126' => 'Ear Nose Throat (ENT)',
            '131' => 'Education Building South (EDS)',
            '130' => 'Education II (EDII)',
            '132' => 'Family Medical Center (FMC)',
            '133' => 'Freeway Medical Tower (FWAY)',
            '134' => 'Harvey and Bernice Jones Eye Institute (JEI)',
            '135' => 'Hospital (HOSP)',
            '136' => 'I. Dodd Wilson Education Building (IDW)',
            '137' => 'Jackson T. Stephens Spine Institute (JTSSI)',
            '138' => 'Magnetic Resonance Imaging (MRI)',
            '139' => 'Mediplex Apartments (1 unit) (MEDPX)',
            '140' => 'Northwest Campus (NWA)',
            '141' => 'Outpatient Center (OPC)',
            '142' => 'Outpatient Diagnostic Center (OPDC)',
            '143' => 'Paint Shop & Flammable Storage (PAINT)',
            '144' => 'PET (PET)',
            '145' => 'Physical Plant (PP)',
            '146' => 'Psychiatric Research Institute (PRI)',
            '147' => 'Radiation Oncology [ROC] (RADONC)',
            '148' => 'Residence Hall Complex (RHC)',
            '149' => 'Ricks Armory',
            '150' => 'Walker Annex (ANNEX)',
            '151' => 'Ward Tower (WARD)',
            '152' => 'West Central Energy Plant (WCEP)',
            '153' => 'Westmark (WESTM)',
            '154' => 'Winston K. Shorey Building (SHOR)',
            '155' => 'Winthrop P. Rockefeller Cancer Institute (WPRCI)',
          ),
          'tab' => 'tab_academic',
        ),

        array(
          'id'     => 'physician_contact_information',
          'group_title' => 'Contact Infomation',
          'type'   => 'group',
          'tab' => 'tab_academic',
	      	'clone'  => true,
	      	'sort_clone' => true,
          'collapsible' => true,
	      	'fields' => array(
	            array(
	                'name' => 'Type',
	                'id'   => 'office_contact_type',
	                'type' => 'select',
                  'columns' => 6,
                  'placeholder' => 'Select an Item',
	                'options' => array(
	                	  'phone' => 'Phone',
          						'fax' => 'Fax',
          						'mobile' => 'Mobile',
          						'email' => 'Email',
          						'sms' => 'Text/SMS',
	                ),
	            ),
	            array(
	                'name' => 'Value',
	                'id'   => 'office_contact_value',
	                'type' => 'text',
                  'columns' => 6,
	            ),
        	),
        ),

        
        /* Education Tab */
        array(
          'id'     => 'physician_academic_appointment',
          'group_title' => 'Academic Appointment',
          'type'   => 'group',
          'tab' => 'tab_edu',
	      	'clone'  => true,
	      	'sort_clone' => true,
          'collapsible' => true,
          'add_button' => 'Add Academic Appointment',
	      	'fields' => array(
	            array(
	                'name' => 'Academic Title',
	                'id'   => 'academic_title',
	                'type' => 'text',
                  'columns' => 6,
                  'size' => 45,
	            ),
	            array(
                  'id' => 'academic_department',
                  'name' => 'Department',
                  'type' => 'taxonomy',
                  'taxonomy' => 'academic_department',
                  'columns' => 6,
                  'multiple'    => false,
                  //'std' => '532', // UAMS
                  'query_args' => array(
                    'orderby' => 'name',
                  ),
	            ),
        	),
        ),

		    array(
          	'id'     => 'physician_education',
            'group_title' => 'Education',
          	'type'   => 'group',
          	'tab' => 'tab_edu',
            'collapsible' => true,
	      	  'clone'  => true,
	      	  'sort_clone' => true,
            'add_button' => 'Add Education',
	      	  'fields' => array(
	            array(
	                'name' => 'Education Type',
	                'id'   => 'physician_education_type',
	                'type' => 'select_advanced',
                  'columns' => 4,
                  'placeholder'     => 'Select an Item',
	                'options' => array(
	                	'University' => 'University',
        						'Internship' => 'Internship',
        						'Residency' => 'Residency',
        						'Fellowship' => 'Fellowship',
        						'AmbulatoryCareTraining' => 'Ambulatory Care Training',
        						'Certificate' => 'Certificate',
        						'ChildAbusePediatricsFellowship' => 'Child Abuse Pediatrics Fellowship',
        						'Clinicaltraining' => 'Clinical training',
        						'Diploma' => 'Diploma',
        						'DoctorofOsteopathicMedicine' => 'Doctor of Osteopathic Medicine',
        						'DoctorofVeterinaryMedicine' => 'Doctor of Veterinary Medicine',
        						'Doctorate' => 'Doctorate',
        						'Graduateschool' => 'Graduate school',
        						'InternshipandResidency' => 'Internship and Residency',
        						'Masters' => 'Masters',
        						'MedicalSchool' => 'Medical School',
        						'Nursingschool' => 'Nursing school',
        						'OneYearofFellowship' => 'One Year of Fellowship',
        						'PostDoctoralTraining' => 'Post Doctoral Training',
        						'Post-graduatetraining' => 'Post-graduate training',
        						'Pre-doctoralIntern' => 'Pre-doctoral Intern',
        						'ResearchScholar' => 'Research Scholar',
        						'Undergraduate' => 'Undergraduate',
	                ),
	            ),
	            array(
	                'name' => 'School',
	                'id'   => 'physician_education_school',
                  'type' => 'taxonomy',
                  'taxonomy' => 'schools',
                  'columns' => 4,
                  'multiple'    => false,
                  'query_args' => array(
                    'orderby' => 'name',
                  ),
	            ),
	            array(
	                'name'    => 'Desctiption',
	                'id'      => 'physician_education_description',
	                'type'    => 'text',
                  'label_description' => 'Description of the Education (if needed)',
                  'columns' => 4,
	            ),
        	),
        ),

		    array(
        	'tab' => 'tab_edu',
          'name' => 'Boards',
          'id'   => 'physician_boards',
          'type' => 'taxonomy',
          'taxonomy' => 'boards',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '95%',
          ),
          'query_args' => array(
            'orderby' => 'name',
          ),
        ),
         
        array (
          'id' => 'physician_research_profiles_link',
          'type' => 'url',
          'name' => 'Profiles Link',
          'size' => 50,
          'label_description'  => 'Please include the full URL, including https://',
          'tab' => 'tab_edu',
          'columns' => 5,
        ),
         
        array (
          'id' => 'physician_pubmed_author_id',
          'type' => 'text',
          'name' => 'Pubmed Author ID',
          'tab' => 'tab_edu',
          'desc' => 'Used to link to Pubmed complete list. AuthorID is found at the end of a link URL for Author.',
          'columns' => 4,
        ),
         
        array (
          'id' => 'pubmed_author_number',
          'name' => 'Number Lastest Articles',
          'type' => 'select',
          'columns' => 3,
          'tab' => 'tab_edu',
          'placeholder' => __( 'Select an option', 'uams-physicians' ),
          'std' => '3',
          'options' => array(
            '1' => '1',
            '3' => '3',
            '5' => '5',
            '10' => '10',
          ),
        ),

        array(
          'id'     => 'physician_select_publications',
          'group_title' => 'Selected Publications',
          'type'   => 'group',
          'tab' => 'tab_edu',
          'add_button' => 'Add Publication',
          'clone'  => true,
          'sort_clone' => true,
          'collapsible' => true,
          'fields' => array(
              array(
                  'name' => 'PubMed ID (PMID)',
                  'id'   => 'publication_pmid',
                  'type' => 'text',
                  'columns' => 3,
              ),
              array(
                  'name' => 'Pubmed Information',
                  'id'   => 'publication_pubmed_info',
                  'type' => 'textarea',
                  'columns' => 9,
              ),
          ),
        ),
         
        /* Research Tab */
        array (
          'id' => 'physician_research_bio',
          'name' => 'Researcher Bio',
          'type' => 'wysiwyg',
          'options' => array(
              'textarea_rows' => 16,
              'teeny'         => false,
              'media_buttons' => false,
          ),
          'tab' => 'tab_research',
          'columns' => 12,
        ),
         
        array (
          'id' => 'physician_research_interests',
          'type' => 'textarea',
          'name' => 'Research Interests',
          'tab' => 'tab_research',
        ),

        /* Extra Tab */
        array(
        	'id'     => 'physician_awards',
          'group_title' => 'Award(s)',
        	'type'   => 'group',
        	'tab' => 'tab_extra',
          'collapsible' => true,
	      	'clone'  => true,
          'add_button' => 'Add Award',
	      	'sort_clone' => true,
	      	'fields' => array(
	            array(
	                'name' => 'Year',
	                'id'   => 'award_year',
	                'type' => 'text',
                  'columns' => 6,
	            ),
	            array(
	                'name' => 'Award Title',
	                'id'   => 'award_title',
	                'type' => 'text',
                  'columns' => 6,
	            ),
	            array(
	                'name'    => 'Information',
	                'id'      => 'award_infor',
	                'type'    => 'wysiwyg',
                  'columns' => 12,
                  'options' => array(
                      'textarea_rows' => 6,
                      'teeny'         => true,
                      'media_buttons' => false,
                  ),
	            ),
        	),
          'tab' => 'tab_extra',
        ),
         
        array (
          'id' => 'physician_additional_info',
          'name' => 'Additional Info',
          'type' => 'wysiwyg',
          'options' => array(
              'textarea_rows' => 16,
              'teeny'         => false,
              'media_buttons' => false,
          ),
          'tab' => 'tab_extra',
        ),
      ),
      'validation' => array(
		    'rules'  => array(
		        'physician_first_name' => array(
		            'required'  => true,
		        ),
            'physician_last_name' => array(
                'required'  => true,
            ),
		    ),
		    // Optional override of default error messages
		    // 'messages' => array(
		    //     'field_id' => array(
		    //         'required'  => 'Password is required',
		    //         'minlength' => 'Password must be at least 7 characters',
		    //     ),
		    // )
		  ),
    );

    // $service_excerpt = '';
    // $post_id         = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
    // if ( ! $post_id ) {
    //     $post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
    // }
    // if ( $post_id ) {
    //     $default_content = get_post_field( 'excerpt', $post_id );
    // }

    $meta_boxes[] = array (
      'id' => 'services',
      'title' => 'Medical Service Information',
      'post_types' =>   array (
         'services',
      ),
      // 'storage_type' => 'custom_table',    // Important
      // 'table' => "{$wpdb->prefix}uams_services", // Your custom table name
      'context' => 'normal',
      'priority' => 'high',
      'autosave' => true,
      'fields' =>   array (
        array (
          'id' => 'service_lines',
          'type' => 'taxonomy',
          'name' => 'Service Line',
          'desc' => 'Is this part of a service line?',
          'taxonomy' => 'service-line',
          //'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
        ),
        array (
          'id' => 'medical_specialties',
          'type' => 'taxonomy',
          'name' => 'Medical Specialties Offered',
          'taxonomy' => 'specialty',
          //'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'hidden' => array( 'parent_id', '!=', '' ),
        ),
        array (
          'id' => 'medical_terms',
          'type' => 'taxonomy',
          'name' => 'Medical Terms (Tags)',
          'taxonomy' => 'medical_terms',
          //'field_type' => 'select_advanced',
          'placeholder' => 'Select an Item',
          'multiple'    => true,
          'js_options'      => array(
            'width' => '100%',
          ),
          'hidden' => array( 'parent_id', '!=', '' ),
        ),
        array (
          'id' => 'excerpt', // This is the must! Replace default Excerpt
          'name' =>'Short Description',
          'label_description' => 'Recommended between 180-320 characters',
          'type' => 'textarea',
          'desc' => 'Short description used for lists',
        ),
        array(
          'id'   => 'action_bar_active',
          'name' => 'Action Bar',
          'type' => 'checkbox',
          'std'  => 0, // 0 or 1
          'label_description' => 'Add Action Bar to the page',
          'desc' => 'Show "Action Bar" Menu',
        ),
        array(
          'id'     => 'action_menu',
          'name'   => 'Action Menu Items',
          'type'   => 'group',
          'collapsible' => true,
          'clone'  => true,
          'sort_clone'    => true,
          'max_clone' => 6,
          'group_title'   => 'Action Item',
          'hidden' => array( 'action_bar_active', '!=', true ),
          // List of sub-fields
          'fields' => array(
              array(
                  'name' => 'Link Title',
                  'id'   => 'action_link_title',
                  'type' => 'text',
              ),
              array(
                  'name' => 'Link Icon',
                  'id'   => 'action_link_icon',
                  'type' => 'text',
              ),
              array(
                'name' => 'URL',
                'id'   => 'action_link_url',
                'type' => 'text',
              ),
          ),
      ),
        array (
          'type' => 'custom_html',
          'std' => '<style>#postexcerpt{display:none;}</style>',
        ),
      ),
      // 'validation' => array(
		  //   'rules'  => array(
		  //       'location_address_1' => array(
		  //           'required'  => true,
		  //       ),
		  //   ),
		    // Optional override of default error messages
		    // 'messages' => array(
		    //     'field_id' => array(
		    //         'required'  => 'Password is required',
		    //         'minlength' => 'Password must be at least 7 characters',
		    //     ),
		    // )
		  // ),
    );

    $meta_boxes[] = array(
      'title'      => 'Images',
      'post_types' => 'services',
      'context'    => 'side',
      'priority'   => 'low',
      'fields' => array(
          array(
              'name' => 'Featured Image',
              'id'   => '_thumbnail_id', // This is the must! Replace default Featured Image
              'label_description' => 'Recommended size 720 x 480 px',
              'desc' => 'Used to display with on list pages',
              'type' => 'image_advanced',
              'max_file_uploads' => 1,
              'max_status' => false,
          ),
          array(
            'name' => 'Header Image',
            'id'   => 'service_header_image',
            'label_description' => 'Recommended size 1600 x 450 px',
            'desc' => 'Hero image on service page',
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'max_status' => false,
          ),
          array(
            'name' => 'Header Mobile Image',
            'id'   => 'service_header_mobile_image',
            'label_description' => 'Recommended size 750 x 450 px',
            'desc' => 'Mobile Hero image on service page',
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
            'max_status' => false,
          ),
          array(
            'id'   => 'header_dark_text',
            'name' => 'Dark Header Text',
            'type' => 'checkbox',
            'std'  => 0, // 0 or 1
            'desc' => 'Dark Text',
            'label_description' => 'Use dark text for a light colored background',
            'hidden' =>  array( 'service_header_image', 0 ),
          ),
          array (
            'type' => 'custom_html',
            'std' => '<style>#postimagediv{display:none;}</style>',
          ),
      ),
    );

    $meta_boxes[] = array(
      'title'      => 'Additional Information',
      'taxonomies' => 'academic_colleges', // List of taxonomies. Array or string

      'fields' => array(
          array(
              'name' => 'Website URL',
              'id'   => 'college_url',
              'type' => 'url',
              'size' => 40,
              'columns' => 12,
          ),
      ),
      'validation' => array(
        'rules'  => array(
            'college_url' => array(
                'required'  => true,
            ),
        ),
      ),        
    );

    $meta_boxes[] = array(
      'title'      => '',
      'taxonomies' => 'specialty', // List of taxonomies. Array or string

      'fields' => array(
          array(
              'name' => 'Link to Specialty Page',
              'id'   => 'specialty_url',
              'type' => 'url',
              'size' => 40,
              'columns' => 12,
          ),
      ),        
    );

    $meta_boxes[] = array(
      'title'      => '',
      'taxonomies' => 'service-line', // List of taxonomies. Array or string

      'fields' => array(
          array (
            'type' => 'custom_html',
            'std' => '<style>.term-description-wrap{display:none;}#edittag .rwmb-wysiwyg-wrapper .rwmb-input{width:100%;} #addtag .rwmb-meta-box{display:none;}</style>',
          ),
          array(
              'name' => 'Featured Content',
              'id'   => 'service_line_content',
              'type' => 'wysiwyg',
          ),
          array(
              'name' => 'Featured Image',
              'id'   => 'service_line_featured_image',
              'type' => 'image_advanced',
              'max_file_uploads' => 1,
          ),
          array(
            'name' => 'Header Image',
            'id'   => 'service_line_header_image',
            'type' => 'image_advanced',
            'max_file_uploads' => 1,
          ),
      ),
    );

    return $meta_boxes;

}

add_action( 'rwmb_enqueue_scripts', function ()
{
  wp_enqueue_script( 'pubmed-update', get_stylesheet_directory_uri() . '/js/mb-pubmed.js', [ 'jquery' ] );
} );

add_action('rwmb_before_save_post', function( $post_id )
{
  // Get person ID to save from "Select a Customer" field
  $first_name = $_POST['physician_first_name'];
  $middle_name = $_POST['physician_middle_name'];
  $last_name = $_POST['physician_last_name'];

  
  // Save related field to phone field
  $_POST['physician_full_name_meta'] = $last_name . ' ' . $first_name . ' ' . $middle_name;
  
} );