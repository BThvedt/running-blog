<?php
/**
 * Plugin Name:       Running Blog
 * Description:       A plugin for adding blocks to a theme
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Text Domain:       running-blog
 * Domain Path:       /languages
 */

if (!function_exists('add_action')) {
	echo 'Seems like you stumbled here by accident. 😜';
	exit;
}

// Setup 
define('RB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('RB_PLUGIN_FILE', __FILE__);

// https://wordpress.stackexchange.com/questions/50043/how-to-determine-whether-we-are-in-add-new-page-post-cpt-or-in-edit-page-post-cp
function is_edit_page($new_edit = null){
	global $pagenow;
	//make sure we are on the backend
	if (!is_admin()) return false;

	
	if($new_edit == "edit")
			return in_array( $pagenow, array( 'post.php',  ) );
	elseif($new_edit == "new") //check for new post page
			return in_array( $pagenow, array( 'post-new.php' ) );
	else //check for either new or edit
			return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

// Includes
$rootFiles = glob(RB_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(RB_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename) {
	include_once($filename);
}

// include(RB_PLUGIN_DIR . 'includes/register-blocks.php');
// include(RB_PLUGIN_DIR . 'includes/blocks/search-form.php');
// include(RB_PLUGIN_DIR . 'includes/blocks/front-search-form.php');
// include(RB_PLUGIN_DIR . 'includes/blocks/page-header.php');

// Hooks

add_action( 'admin_init', 'add_styles_for_admin_pages' ); // adds styles for the admin pages

add_action('init', 'rb_register_blocks'); // registers all the custom blocks
add_action('init', 'rb_review_post_type'); // registers the 'review' post type
add_action('init', 'rb_meal_post_type'); // regestiers the 'meal' post type
add_action('init', 'rb_run_post_type'); // regestiers the 'meal' post type
add_action('init', 'rb_workout_post_type'); // regestiers the 'workout' post type
add_action('init', 'rb_supplement_post_type'); // regestiers the 'supplement' post type
add_action('init', 'rb_sleep_data_post_type'); // regestiers the 'sleep data' post type
add_action('init', 'rb_meta_post_type'); // regestiers the 'meta' post type
add_action('init', 'rb_race_post_type'); // regestiers the 'race' post type
add_action('init', 'rb_add_featured_field_to_posts'); // adds a meta field - "featured" to the 'post' type
add_action('init', 'rb_add_related_field_to_posts'); // adds a meta field - "related" to the 'post' type
add_action( 'add_meta_boxes', 'runs_add_meta_boxes' ); // adds meta boxes w/ custom fields for the run post type
add_action( 'save_post', 'run_save_postdata' ); // saves the post data, but also puts stuff in custom database tables
add_action( 'add_meta_boxes', 'meals_add_meta_boxes' );  // adds meta boxes for the meals post type
add_action( 'save_post', 'meals_save_postdata' ); // for saving the custom post data and putting stuff in custom database tables
add_action( 'add_meta_boxes', 'workouts_add_meta_boxes' );   // etc .. 
add_action( 'save_post', 'workouts_save_postdata' );  
add_action( 'add_meta_boxes', 'supplement_add_meta_boxes' );  
add_action( 'save_post', 'supplement_save_postdata' ); 
add_action( 'add_meta_boxes', 'sleep_data_add_meta_boxes' );  
add_action( 'save_post', 'sleep_data_save_postdata' );  
add_action( 'add_meta_boxes', 'meta_add_meta_boxes' );  
add_action( 'save_post', 'meta_data_save_postdata' );  
add_action( 'add_meta_boxes', 'race_add_meta_boxes' ); 
add_action( 'save_post', 'race_data_save_postdata' );  

// time for deleting posts
add_action('delete_post', 'delete_meal_extra_data', 10, 2); // deletes the extra database stuff
add_action('delete_post', 'delete_meta_extra_data', 10, 2); // ... delets ths stuff for that one .. 

// cost is in the supplement data, so don't have to worry about that.. 
add_action('delete_post', 'delete_supplement_extra_data', 10, 2);  
add_action('delete_post', 'delete_workout_extra_data', 10, 2);  
add_action('delete_post', 'delete_sleep_extra_data', 10, 2);  
add_action('delete_post', 'delete_race_extra_data', 10, 2);  
add_action('delete_post', 'delete_run_extra_data', 10, 2);  



// SET THE POST TITLE
add_filter('wp_insert_post_data','set_post_title', 10,2);

// admin pages
add_action('admin_menu', 'rb_admin_menus');
add_action('admin_post_rb_save_options', 'rb_save_options'); // named after the action of the hidden element on the page see docs

// add_action('enqueue_block_editor_assets', 'rb_review_post_type_enqueue');
//add_action( 'admin_enqueue_scripts', 'add_styles_for_admin_pages' ); // adds styles for the admin pages
// add_action('wp_enqueue_scripts', 'add_styles_for_admin_pages');

// add_action('save_post_review', 'rb_save_post_review');

// querying posts
add_filter('rest_post_query', 'rb_rest_post_query', 10, 2);

register_activation_hook(__FILE__, 'rb_activate_plugin');