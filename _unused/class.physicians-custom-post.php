<?php

	// Register 'Physicians' Custom Post Type
function physicians() {

	$labels = array(
		'name'                  => 'Physicians',
		'singular_name'         => 'Physician',
		'menu_name'             => 'Physicians',
		'name_admin_bar'        => 'Physician',
		'archives'              => 'Physician Archives',
		'attributes'            => 'Physician Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Physicians',
		'add_new_item'          => 'Add New Physician',
		'add_new'               => 'Add New',
		'new_item'              => 'New Physician',
		'edit_item'             => 'Edit Physician',
		'update_item'           => 'Update Physician',
		'view_item'             => 'View Physician',
		'view_items'            => 'View Physicians',
		'search_items'          => 'Search Physicians',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Physicians list',
		'items_list_navigation' => 'Physicians list navigation',
		'filter_items_list'     => 'Filter Physicians list',
	);
	$capabilities = array(
		'edit_post'             => 'edit_physician',
		'read_post'             => 'read_physician',
		'delete_post'           => 'delete_physician',
		'edit_posts'            => 'edit_physicians',
		'edit_others_posts'     => 'edit_others_physicians',
		'publish_posts'         => 'publish_physicians',
		'read_private_posts'    => 'read_private_physicians',
	);
	$args = array(
		'label'                 => 'Physician',
		'description'           => 'UAMS Physicians for Find-a-Doctor',
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', ),
		'taxonomies'            => array( 'specialties', 'department', 'patient_type', 'medical_procedures', 'medical_terms' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => get_stylesheet_directory_uri() .'/assets/admin-icons/physicians-icon.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'slug'					=> 'physicians',
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capabilities'          => $capabilities,
		'show_in_rest'          => true,
		'rest_base'             => 'physicians',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	);
	register_post_type( 'physicians', $args );

}
add_action( 'init', 'physicians', 0 );

if ( ! function_exists('locations') ) {

// Register Custom Post Type
function locations() {

	$labels = array(
		'name'                  => 'Locations',
		'singular_name'         => 'Location',
		'menu_name'             => 'Locations',
		'name_admin_bar'        => 'Location',
		'archives'              => 'Location Archives',
		'attributes'            => 'Location Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Locations',
		'add_new_item'          => 'Add New Location',
		'add_new'               => 'Add New',
		'new_item'              => 'New Location',
		'edit_item'             => 'Edit Location',
		'update_item'           => 'Update Location',
		'view_item'             => 'View Location',
		'view_items'            => 'View Locations',
		'search_items'          => 'Search Locations',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Locations list',
		'items_list_navigation' => 'Locations list navigation',
		'filter_items_list'     => 'Filter Locations list',
	);
	$capabilities = array(
		'edit_post'             => 'edit_location',
		'read_post'             => 'read_location',
		'delete_post'           => 'delete_location',
		'edit_posts'            => 'edit_locations',
		'edit_others_posts'     => 'edit_others_locations',
		'publish_posts'         => 'publish_locations',
		'read_private_posts'    => 'read_private_locations',
	);
	$args = array(
		'label'                 => 'Location',
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => get_stylesheet_directory_uri() .'/assets/admin-icons/locations-icon.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capabilities'          => $capabilities,
		'show_in_rest'          => true,
		'rest_base'             => 'locations',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	);
	register_post_type( 'locations', $args );

}
add_action( 'init', 'locations', 0 );

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_clinical_conditions_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_clinical_conditions_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Conditions',
		'singular_name'                  => 'Condition',
		'search_items'                   => 'Search Conditions',
		'all_items'                      => 'All Conditions',
		'edit_item'                      => 'Edit Condition',
		'update_item'                    => 'Update Condition',
		'add_new_item'                   => 'Add New Condition',
		'new_item_name'                  => 'New Condition',
		'menu_name'                      => 'Conditions',
		'view_item'                      => 'View Condition',
		'popular_items'                  => 'Popular Condition',
		'separate_items_with_commas'     => 'Separate conditions with commas',
		'add_or_remove_items'            => 'Add or remove conditions',
		'choose_from_most_used'          => 'Choose from the most used conditions',
		'not_found'                      => 'No conditions found',
		'parent_item'                	 => 'Parent Condition',
		'parent_item_colon'          	 => 'Parent Condition:',
		'no_terms'                   	 => 'No Conditions',
		'items_list'                 	 => 'Conditions list',
		'items_list_navigation'      	 => 'Conditions list navigation',
	);
  	$rewrite = array(
		'slug'                       => 'conditions',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 					 => __( 'Conditions' ),
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'       		 => true,
  		'rest_base'          		 => 'condition',
  		'rest_controller_class' 	 => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'condition', array( 'physicians' ), $args );

}

// Register Custom Taxonomy
function create_medical_specialties_taxonomy() {

	$labels = array(
		'name'                       => 'Medical Specialties',
		'singular_name'              => 'Medical Specialty',
		'menu_name'                  => 'Medical Specialty',
		'all_items'                  => 'All Specialties',
		'parent_item'                => 'Parent Specialty',
		'parent_item_colon'          => 'Parent Specialty:',
		'new_item_name'              => 'New Specialty',
		'add_new_item'               => 'Add New Specialty',
		'edit_item'                  => 'Edit Specialty',
		'update_item'                => 'Update Specialty',
		'view_item'                  => 'View Specialty',
		'separate_items_with_commas' => 'Separate specialties with commas',
		'add_or_remove_items'        => 'Add or remove specialties',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Specialties',
		'search_items'               => 'Search Specialties',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Specialties',
		'items_list'                 => 'Specialties list',
		'items_list_navigation'      => 'Specialties list navigation',
	);
	$rewrite = array(
		'slug'                       => 'specialties',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 					 => __( 'Medical Specialties' ),
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'       		 => true,
  		'rest_base'          		 => 'specialties',
  		'rest_controller_class' 	 => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'specialty', array( 'physicians' ), $args );

}
add_action( 'init', 'create_medical_specialties_taxonomy', 0 );

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_departments_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_departments_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Medical Departments',
		'singular_name'                  => 'Medical Departments',
		'search_items'                   => 'Search Departments',
		'all_items'                      => 'All Departments',
		'edit_item'                      => 'Edit Department',
		'update_item'                    => 'Update Department',
		'add_new_item'                   => 'Add New Department',
		'new_item_name'                  => 'New Department',
		'menu_name'                      => 'Medical Departments',
		'view_item'                      => 'View Department',
		'popular_items'                  => 'Popular Department',
		'separate_items_with_commas'     => 'Separate departments with commas',
		'add_or_remove_items'            => 'Add or remove departments',
		'choose_from_most_used'          => 'Choose from the most used departments',
		'not_found'                      => 'No departments found',
		'parent_item'                	 => 'Parent Department',
		'parent_item_colon'          	 => 'Parent Department:',
		'no_terms'                   	 => 'No Medical Departments',
		'items_list'                 	 => 'Medical Departments list',
		'items_list_navigation'      	 => 'Medical Departments list navigation',
	);
  	$rewrite = array(
		'slug'                       => 'department',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 					 => __( 'Medical Departments' ),
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'       		 => true,
  		'rest_base'          		 => 'medical_department',
  		'rest_controller_class' 	 => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'department', array( 'physicians' ), $args );

}
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_patient_type_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_patient_type_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  	$labels = array(
		'name'                           => 'Patient Types',
		'singular_name'                  => 'Patient Type',
		'search_items'                   => 'Search Types',
		'all_items'                      => 'All Types',
		'edit_item'                      => 'Edit Type',
		'update_item'                    => 'Update Type',
		'add_new_item'                   => 'Add New Type',
		'new_item_name'                  => 'New Type',
		'menu_name'                      => 'Patient Types',
		'view_item'                      => 'View Type',
		'popular_items'                  => 'Popular Type',
		'separate_items_with_commas'     => 'Separate types with commas',
		'add_or_remove_items'            => 'Add or remove types',
		'choose_from_most_used'          => 'Choose from the most used types',
		'not_found'                      => 'No types found',
		'parent_item'                	 => 'Parent Type',
		'parent_item_colon'          	 => 'Parent Type:',
		'no_terms'                   	 => 'No Patient Types',
		'items_list'                 	 => 'Patient types list',
		'items_list_navigation'      	 => 'Patient types list navigation',
	);
  	$rewrite = array(
		'slug'                       => 'patient_type',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 					 => __( 'Patient Types' ),
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'       		 => true,
  		'rest_base'          		 => 'patient_type',
  		'rest_controller_class' 	 => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'patient_type', array( 'physicians' ), $args );

}
add_action( 'init', 'profile_type', 0 );

// Register Custom Taxonomy
function profile_type() {

	$labels = array(
		'name'                       => _x( 'Profile Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Profile Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Profile Type', 'text_domain' ),
		'all_items'                  => __( 'All Profile Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Profile Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Profile Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Profile Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Profile Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Profile Type', 'text_domain' ),
		'update_item'                => __( 'Update Profile Type', 'text_domain' ),
		'view_item'                  => __( 'View Profile Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'profile_type',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true, //make true to add another
		'show_admin_column'          => true,
		'meta_box_cb' 				 => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
// 		'rewrite'                    => array( 'slug' => '%profile_type%' ),
		'capabilities'               => $capabilities,
		'show_in_rest'               => true,
		'rest_base'                  => 'profile_type',
		'rest_controller_class'      => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'profile_type', array( 'physicians' ), $args );

}

//hook into the init action and call create_medical_procedures_taxonomy when it fires
add_action( 'init', 'create_medical_procedures_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_medical_procedures_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Medical Procedures',
		'singular_name'                  => 'Medical Procedures',
		'search_items'                   => 'Search Procedures',
		'all_items'                      => 'All Procedures',
		'edit_item'                      => 'Edit Procedure',
		'update_item'                    => 'Update Procedure',
		'add_new_item'                   => 'Add New Procedure',
		'new_item_name'                  => 'New Procedure',
		'menu_name'                      => 'Medical Procedures',
		'view_item'                      => 'View Procedure',
		'popular_items'                  => 'Popular Procedure',
		'separate_items_with_commas'     => 'Separate procedures with commas',
		'add_or_remove_items'            => 'Add or remove procedures',
		'choose_from_most_used'          => 'Choose from the most used procedures',
		'not_found'                      => 'No procedures found'
	);
  	$rewrite = array(
		'slug'                       => 'medical_procedures',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 				 	 => __( 'Medical Procedures' ),
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true, //make true to add another
		'show_admin_column'          => false,
		'meta_box_cb' 				 => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
 		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'               => true,
		'rest_base'                  => 'medical_procedures',
		'rest_controller_class'      => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'medical_procedures', array( 'physicians' ), $args );

}
add_action( 'init', 'create_medical_procedures_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_affiliations_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Affiliations',
		'singular_name'                  => 'Affiliations',
		'search_items'                   => 'Search Affiliations',
		'all_items'                      => 'All Affiliations',
		'edit_item'                      => 'Edit Affiliation',
		'update_item'                    => 'Update Affiliation',
		'add_new_item'                   => 'Add New Affiliation',
		'new_item_name'                  => 'New Affiliation',
		'menu_name'                      => 'Affiliations',
		'view_item'                      => 'View Affiliation',
		'popular_items'                  => 'Popular Affiliation',
		'separate_items_with_commas'     => 'Separate affiliations with commas',
		'add_or_remove_items'            => 'Add or remove affiliations',
		'choose_from_most_used'          => 'Choose from the most used affiliations',
		'not_found'                      => 'No affiliations found'
	);
  	$rewrite = array(
		'slug'                       => 'affiliations',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 				 	 => __( 'Affiliations' ),
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true, //make true to add another
		'show_admin_column'          => false,
		'meta_box_cb' 				 => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
 		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'               => true,
		'rest_base'                  => 'affiliations',
		'rest_controller_class'      => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'affiliations', array( 'physicians' ), $args );

}

add_action( 'init', 'create_affiliations_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_languages_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  	$labels = array(
		'name'                           => 'Languages',
		'singular_name'                  => 'Languages',
		'search_items'                   => 'Search Languages',
		'all_items'                      => 'All Languages',
		'edit_item'                      => 'Edit Language',
		'update_item'                    => 'Update Language',
		'add_new_item'                   => 'Add New Language',
		'new_item_name'                  => 'New Language',
		'menu_name'                      => 'Languages',
		'view_item'                      => 'View Language',
		'popular_items'                  => 'Popular Language',
		'separate_items_with_commas'     => 'Separate languages with commas',
		'add_or_remove_items'            => 'Add or remove languages',
		'choose_from_most_used'          => 'Choose from the most used languages',
		'not_found'                      => 'No languages found'
	);
  	$rewrite = array(
		'slug'                       => 'languages',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 				 	 => __( 'Languages' ),
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true, //make true to add another
		'show_admin_column'          => false,
		'meta_box_cb' 				 => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
 		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
		'show_in_rest'               => true,
		'rest_base'                  => 'languages',
		'rest_controller_class'      => 'WP_REST_Terms_Controller',
	);
	register_taxonomy( 'languages', array( 'physicians' ), $args );

}

add_action( 'init', 'create_languages_taxonomy', 0 );

// Register Custom Taxonomy
function create_medical_terms_taxonomy() {

	$labels = array(
		'name'                       => 'Medical Terms',
		'singular_name'              => 'Medical Term',
		'menu_name'                  => 'Medical Terms',
		'all_items'                  => 'All Terms',
		'parent_item'                => 'Parent Term',
		'parent_item_colon'          => 'Parent Term:',
		'new_item_name'              => 'New Term',
		'add_new_item'               => 'Add New Term',
		'edit_item'                  => 'Edit Term',
		'update_item'                => 'Update Term',
		'view_item'                  => 'View Term',
		'separate_items_with_commas' => 'Separate terms with commas',
		'add_or_remove_items'        => 'Add or remove terms',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Terms',
		'search_items'               => 'Search Terms',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Terms',
		'items_list'                 => 'Terms list',
		'items_list_navigation'      => 'Terms list navigation',
	);
	$rewrite = array(
		'slug'                       => 'medical-terms',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'medical_terms', array( 'physicians' ), $args );

}
add_action( 'init', 'create_medical_terms_taxonomy', 0 );

// Register Custom Taxonomy
function create_academic_position_taxonomy() {

	$labels = array(
		'name'                       => 'Positions',
		'singular_name'              => 'Position',
		'menu_name'                  => 'Academic Positions',
		'all_items'                  => 'All Positions',
		'parent_item'                => 'Parent Position',
		'parent_item_colon'          => 'Parent Position:',
		'new_item_name'              => 'New Position',
		'add_new_item'               => 'Add New Position',
		'edit_item'                  => 'Edit Position',
		'update_item'                => 'Update Position',
		'view_item'                  => 'View Position',
		'separate_items_with_commas' => 'Separate positions with commas',
		'add_or_remove_items'        => 'Add or remove positions',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Positions',
		'search_items'               => 'Search Positions',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Positions',
		'items_list'                 => 'Positions list',
		'items_list_navigation'      => 'Positions list navigation',
	);
	$rewrite = array(
		'slug'                       => 'academic-position',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,	//Made true to add / edit
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'academic_positions', array( 'physicians' ), $args );

}
add_action( 'init', 'create_academic_position_taxonomy', 0 );

// Register Custom Taxonomy
function create_academic_college_taxonomy() {

	$labels = array(
		'name'                       => 'Colleges',
		'singular_name'              => 'College',
		'menu_name'                  => 'Colleges',
		'all_items'                  => 'All Colleges',
		'parent_item'                => 'Parent College',
		'parent_item_colon'          => 'Parent College:',
		'new_item_name'              => 'New College',
		'add_new_item'               => 'Add New College',
		'edit_item'                  => 'Edit College',
		'update_item'                => 'Update College',
		'view_item'                  => 'View College',
		'separate_items_with_commas' => 'Separate colleges with commas',
		'add_or_remove_items'        => 'Add or remove colleges',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Colleges',
		'search_items'               => 'Search Colleges',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Colleges',
		'items_list'                 => 'Colleges list',
		'items_list_navigation'      => 'Colleges list navigation',
	);
	$rewrite = array(
		'slug'                       => 'college',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,  //Made true to add / edit
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'academic_colleges', array( 'physicians' ), $args );

}
add_action( 'init', 'create_academic_college_taxonomy', 0 );

// Register Custom Taxonomy
function create_schools_taxonomy() {

	$labels = array(
		'name'                       => 'Schools',
		'singular_name'              => 'School',
		'menu_name'                  => 'Schools',
		'all_items'                  => 'All Schools',
		'parent_item'                => 'Parent School',
		'parent_item_colon'          => 'Parent School:',
		'new_item_name'              => 'New School',
		'add_new_item'               => 'Add New School',
		'edit_item'                  => 'Edit School',
		'update_item'                => 'Update School',
		'view_item'                  => 'View School',
		'separate_items_with_commas' => 'Separate school with commas',
		'add_or_remove_items'        => 'Add or remove schools',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Schools',
		'search_items'               => 'Search Schools',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Schools',
		'items_list'                 => 'Schools list',
		'items_list_navigation'      => 'Schools list navigation',
	);
	$rewrite = array(
		'slug'                       => 'school',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,  //Made true to add / edit
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'schools', array( 'physicians' ), $args );

}
add_action( 'init', 'create_schools_taxonomy', 0 );


add_action( 'init', 'create_academic_departments_taxonomy', 0 );//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts
function create_academic_departments_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Academic Departments',
		'singular_name'                  => 'Academic Departments',
		'search_items'                   => 'Search Departments',
		'all_items'                      => 'All Departments',
		'edit_item'                      => 'Edit Department',
		'update_item'                    => 'Update Department',
		'add_new_item'                   => 'Add New Department',
		'new_item_name'                  => 'New Department',
		'menu_name'                      => 'Academic Departments',
		'view_item'                      => 'View Department',
		'popular_items'                  => 'Popular Department',
		'separate_items_with_commas'     => 'Separate departments with commas',
		'add_or_remove_items'            => 'Add or remove departments',
		'choose_from_most_used'          => 'Choose from the most used departments',
		'not_found'                      => 'No departments found'
	);
  	$rewrite = array(
		'slug'                       => 'academic_department',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label'						 => __( 'Academic Departments' ),
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,  //Made true to add / edit
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'academic_department', array( 'physicians' ), $args );

}

add_action( 'init', 'create_boards_taxonomy', 0 );//hook into the init action and call create_book_taxonomies when it fires

//create a custom taxonomy name it topics for your posts
function create_boards_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI

  $labels = array(
		'name'                           => 'Boards',
		'singular_name'                  => 'Board',
		'search_items'                   => 'Search Boards',
		'all_items'                      => 'All Boards',
		'edit_item'                      => 'Edit Board',
		'update_item'                    => 'Update Board',
		'add_new_item'                   => 'Add New Board',
		'new_item_name'                  => 'New Board',
		'menu_name'                      => 'Academic Boards',
		'view_item'                      => 'View Board',
		'popular_items'                  => 'Popular Boards',
		'separate_items_with_commas'     => 'Separate boards with commas',
		'add_or_remove_items'            => 'Add or remove boards',
		'choose_from_most_used'          => 'Choose from the most used boards',
		'not_found'                      => 'No boards found'
	);
  	$rewrite = array(
		'slug'                       => 'board',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$capabilities = array(
		'manage_terms'               => 'manage_options',
		'edit_terms'                 => 'manage_options',
		'delete_terms'               => 'manage_options',
		'assign_terms'               => 'edit_physicians',
	);
	$args = array(
		'label' 					 => __( 'Boards' ),
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,  //Made true to add / edit
		'meta_box_cb'				 => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'boards', array( 'physicians' ), $args );

}

function add_roles_on_plugin_activation() {
       add_role( 'doc_editor', 'Doc Profile Editor', 
       		array( 	'read' => true,
       				'read_physician' => true, 
       				'edit_physicians' => true, 
       				'edit_published_physicians' => true, 
       				'read_location' => true, 
       				'read_private_locations' => true, 
       				'edit_locations' => true, 
       				'edit_published_locations' => true,  
       				'upload_files' => true, 
       				'edit_files' => true 
       			) 
       	);
   }
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );

function add_theme_caps() {
    // gets the author role
    $role = get_role( 'administrator' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->add_cap( 'edit_others_posts' );
    $role->add_cap( 'edit_physician' );
	$role->add_cap( 'read_physician');
	$role->add_cap( 'delete_physician');
	$role->add_cap( 'edit_physicians');
	$role->add_cap( 'edit_others_physicians');
	$role->add_cap( 'publish_physicians');
	$role->add_cap( 'read_private_physicians');
    $role->add_cap( 'edit_location');
	$role->add_cap( 'read_location');
	$role->add_cap( 'delete_location');
	$role->add_cap( 'edit_locations');
	$role->add_cap( 'edit_others_locations');
	$role->add_cap( 'publish_locations');
	$role->add_cap( 'read_private_locations');
}
add_action( 'admin_init', 'add_theme_caps');

// Remove the taxonomy metabox [slugnamediv]
function remove_physician_meta() {
	remove_meta_box( 'conditiondiv', 'physicians', 'side' );
	remove_meta_box( 'specialtydiv', 'physicians', 'side' );
	remove_meta_box( 'departmentdiv', 'physicians', 'side' );
	remove_meta_box( 'patient_typediv', 'physicians', 'side' );
	remove_meta_box( 'tagsdiv-medical_procedures', 'physicians', 'side' );
	remove_meta_box( 'medical_termsdiv', 'physicians', 'side' );
	remove_meta_box( 'custom-post-type-onomies-locations', 'physicians', 'side');
}

add_action( 'admin_menu' , 'remove_physician_meta' );

add_action('admin_head', 'acf_hide_title');

function acf_hide_title() {
  echo '<style>
    .acf-field.hide-acf-title {
    border: none;
    padding: 6px 12px;
	}
	.hide-acf-title .acf-label {
	    display: none;
	}
	.acf-field.pbn { padding-bottom:0; }
  </style>';
}

/**
 * Changes strings referencing Featured Images for a post type
 * 
 * In this example, the post type in the filter name is "employee" 
 * and the new reference in the labels is "headshot".
 *
 * @see 	https://developer.wordpress.org/reference/hooks/post_type_labels_post_type/
 *
 * @param 		object 		$labels 		Current post type labels
 * @return 		object 					Modified post type labels
 */
function change_featured_image_labels( $labels ) {

	$labels->featured_image 	= 'Headshot';
	$labels->set_featured_image 	= 'Set headshot';
	$labels->remove_featured_image 	= 'Remove headshot';
	$labels->use_featured_image 	= 'Use as headshot';

	return $labels;

} // change_featured_image_labels()

add_filter( 'post_type_labels_physicians', 'change_featured_image_labels', 10, 1 );

/**
 * Add REST API support to Teams Meta.
 */
function rest_api_physician_meta() {
    register_rest_field('physicians', 'physician_meta', array(
            'get_callback' => 'get_physician_meta',
            'update_callback' => null,
            'schema' => null,
        )
    );
}
function get_physician_meta($object) {
    $postId = $object['id'];
    //$data = get_post_meta($postId); //Returns All
    //$data = array();
    //Physicians
    $data['physician_first_name'] = get_post_meta( $postId, 'physician_first_name', true );
    $data['physician_middle_name'] = get_post_meta( $postId, 'physician_middle_name', true );
    $data['physician_last_name'] = get_post_meta( $postId, 'physician_last_name', true );
    $data['physician_degree'] = get_post_meta( $postId, 'physician_degree', true );
    //Physician Data
    $data['physician_title'] = get_post_meta( $postId, 'physician_title', true );
    $data['physician_clinical_bio'] = get_post_meta( $postId, 'physician_clinical_bio', true );
    $data['physician_short_clinical_bio'] = wp_trim_words( get_post_meta( $postId, 'physician_short_clinical_bio', true ), 30, ' &hellip;' );
    $data['physician_gender'] = get_post_meta( $postId, 'physician_gender', true );
    $data['physician_youtube_link'] = get_post_meta( $postId, 'physician_youtube_link', true );
    $data['physician_languages'] = get_post_meta( $postId, 'physician_languages', true );
    //$data['physician_locations_id'] = get_post_meta( $postId, 'physician_locations', true );
    //$data['physician_locations']['link'] = get_permalink( get_post_meta( $postId, 'physician_locations', true ) );
    //$data['physician_locations']['title'] = get_the_title( get_post_meta( $postId, 'physician_locations', true ) );
    //$data['physician_locations']['slug'] = get_post_field( 'post_name', get_post_meta( $postId, 'physician_locations', true ) );
    //Locations
    $i = 1;
	foreach (get_post_meta( $postId, 'physician_locations', true ) as $location) {
		$data['physician_locations'][$location]['link'] = get_permalink( $location );
		$data['physician_locations'][$location]['title'] = get_the_title( $location );
		$data['physician_locations'][$location]['slug'] = get_post_field( 'post_name', $location );
		$data['physician_locations'][$location]['location_address_1'] = get_post_meta( $location, 'location_address_1', true );
		$data['physician_locations'][$location]['location_address_2'] = get_post_meta( $location, 'location_address_2', true );
		$data['physician_locations'][$location]['location_city'] = get_post_meta( $location, 'location_city', true );
		$data['physician_locations'][$location]['location_state'] = get_post_meta( $location, 'location_state', true ); 
		$data['physician_locations'][$location]['location_zip'] =  get_post_meta( $location, 'location_zip', true );
		$data['physician_locations'][$location]['location_phone'] = get_post_meta( $location, 'location_phone', true );
		$data['physician_locations'][$location]['location_fax'] = get_post_meta( $location, 'location_fax', true );
		$data['physician_locations'][$location]['location_email'] = get_post_meta( $location, 'location_email', true );
		$data['physician_locations'][$location]['location_web_name'] = get_post_meta( $location, 'location_web_name', true );
		$data['physician_locations'][$location]['location_url'] = get_post_meta( $location, 'location_url', true );
		$map = get_post_meta( $location, 'location_map', true );
		$data['physician_locations'][$location]['location_lat'] = $map['lat'];
		$data['physician_locations'][$location]['location_lng'] = $map['lng'];
		$data['physician_locations'][$location]['map_marker'] = '<div class="marker" data-lat="'. $map['lat'] .'" data-lng="'. $map['lng'] .'" data-label="'. $i .'"></div>';
		$i++;
		//$data['location_link'][$location] = get_post_permalink( $location );
		//$data['location_title'] .= get_the_title( $location ) . ',';
	}
    $data['physician_affiliation'] = get_post_meta( $postId, 'physician_affiliation', true );
    $data['physician_appointment_link'] = get_post_meta( $postId, 'physician_appointment_link', true );
    $data['physician_primary_care'] = get_post_meta( $postId, 'physician_primary_care', true );
    $data['physician_refferal_required'] = get_post_meta( $postId, 'physician_refferal_required', true );
    $data['physician_accepting_patients'] = get_post_meta( $postId, 'physician_accepting_patients', true );
    $data['physician_second_opinion'] = get_post_meta( $postId, 'physician_second_opinion', true );
    $data['physician_patient_types'] = get_the_terms( $postId, 'patient_type' );
    $data['physician_npi'] = get_post_meta( $postId, 'physician_npi', true );
    $data['medical_specialties'] = get_the_terms( $postId, 'specialty' );
	$data['pphoto'] = wp_get_attachment_url( get_post_meta( $postId, 'physician_photo', true ), 'file' );
	$data['physician_conditions'] = get_the_terms( $postId, 'condition' );
	$data['medical_procedures'] = get_the_terms( $postId, 'medical_procedures' );
	$data['physician_boards'] = get_post_meta( $postId, 'physician_boards', true );
	if( get_post_meta( $postId, 'physician_boards', true ) ) :
		for( $i = 0; $i < get_post_meta( $postId, 'physician_boards', true ); $i++ ){
			$data['physician_board_name'][$i] =  get_post_meta( $postId, 'physician_boards_' . $i .'_physician_board_name', true );
		}
	endif;
	//Academic Data
	$data['physician_academic_title'] = get_post_meta( $postId, 'physician_academic_title', true );
	$data['physician_academic_college'] = get_the_terms( $postId, 'academic_colleges' );
	$data['physician_academic_position'] = get_the_terms( $postId, 'academic_positions' );
	$data['physician_academic_bio'] = get_post_meta( $postId, 'physician_academic_bio', true );
	$data['physician_academic_short_bio'] = wp_trim_words( get_post_meta( $postId, 'physician_academic_short_bio', true ), 30, ' &hellip;' );
	$data['physician_academic_office'] = get_post_meta( $postId, 'physician_academic_office', true );
	$data['physician_academic_map'] = get_post_meta( $postId, 'physician_academic_map', true );
	$data['physician_research_profiles_link'] = get_post_meta( $postId, 'physician_research_profiles_link', true );
	$data['physician_pubmed_author_id'] = get_post_meta( $postId, 'physician_pubmed_author_id', true );
	$data['pubmed_author_number'] = get_post_meta( $postId, 'pubmed_author_number', true );
	if( get_post_meta( $postId, 'physician_publications', true ) ) :
		$i = 0;
		foreach (get_post_meta( $postId, 'physician_publications', true ) as $publication) {
			$data['physician_publication'][$i] = get_post_meta( $postId, 'physician_publications_' . $i .'_publication_pubmed_info', true );
			$i++;
		}
	endif;
	if( get_post_meta( $postId, 'physician_contact_infomation', true ) ) :
		for ( $i = 0; $i < get_post_meta( $postId, 'physician_contact_infomation', true ); $i++ ){
			$data['office_full'][$i] = get_post_meta( $postId, 'physician_contact_infomation_' . $i . '_office_contact_type', true ) . ': ' . get_post_meta( $postId, 'physician_contact_infomation_' . $i . '_office_contact_value', true );
			$data['office_contact_type'][$i] = get_post_meta( $postId, 'physician_contact_infomation_' . $i . '_office_contact_type', true );
			$data['office_contact_value'][$i] =  get_post_meta( $postId, 'physician_contact_infomation_' . $i . '_office_contact_value', true );
		}
	endif;
	if( get_post_meta( $postId, 'physician_academic_appointment', true ) ) :
		for ( $i = 0; $i < get_post_meta( $postId, 'physician_academic_appointment', true ); $i++ ){
			$data['physician_academic_appointment'][$i] = get_post_meta( $postId, 'physician_academic_appointment_' . $i .'_academic_title', true ) . ': ' . get_post_meta( $postId, 'physician_academic_appointment_' . $i .'_academic_department', true );
			//$data['academic_title'][$i] = get_post_meta( $postId, 'physician_academic_appointment_' . $i .'_academic_title', true );
			//$data['academic_department'][$i] =  get_post_meta( $postId, 'physician_academic_appointment_' . $i .'_academic_department', true );
		}
	endif;
	if( get_post_meta( $postId, 'physician_education', true ) ) :
		for ( $i = 0; $i < get_post_meta( $postId, 'physician_education', true ); $i++ ){
			$data['physician_education'][$i] = get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_type', true ) . ': ' . get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_school', true ) . ' ' . get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_description', true );
			//$data['physician_education_type'][$i] = get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_type', true );
			//$data['physician_education_school'][$i] = get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_school', true );
			//$data['physician_education_description'][$i] =  get_post_meta( $postId, 'physician_education_' . $i .'_physician_education_description', true );
		}
	endif;
	//Research
	$data['physician_researcher_bio'] = get_post_meta( $postId, 'physician_researcher_bio', true );
	$data['physician_research_interests'] = get_post_meta( $postId, 'physician_research_interests', true );
	//Additional
	if( get_post_meta( $postId, 'physician_awards', true ) ) :
		for ( $i = 0; $i < get_post_meta( $postId, 'physician_awards', true ); $i++ ){
			$data['physician_awards'][$i] = get_post_meta( $postId, 'physician_awards_' . $i .'_award_title', true ) . ' (' . get_post_meta( $postId, 'physician_awards_' . $i .'_award_year', true ) . ') ' . get_post_meta( $postId, 'physician_awards_' . $i .'_award_infor', true );
			//$data['award_year'][$i] = get_post_meta( $postId, 'physician_awards_' . $i .'_award_year', true );
			//$data['award_title'][$i] = get_post_meta( $postId, 'physician_awards_' . $i .'_award_title', true );
			//$data['award_infor'][$i] =  get_post_meta( $postId, 'physician_awards_' . $i .'_award_infor', true );
		}
	endif;
	$data['physician_additional_info'] = get_post_meta( $postId, 'physician_additional_info', true );

    return $data;
}
add_action('rest_api_init', 'rest_api_physician_meta');

// Add REST API query var filters
add_filter('rest_query_vars', 'physicians_add_rest_query_vars');
function physicians_add_rest_query_vars($query_vars) {
    $query_vars = array_merge( $query_vars, array('meta_key', 'meta_value', 'meta_compare') );
    return $query_vars;
}