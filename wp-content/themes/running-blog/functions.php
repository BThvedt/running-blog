<?php 

// Variables

// Includes
include(get_theme_file_path('/includes/front/enqueue.php'));
include(get_theme_file_path('/includes/front/head.php'));
include(get_theme_file_path('/includes/setup.php'));

// Hooks
add_action('wp_enqueue_scripts','rb_enqueue');
add_action('wp_head', 'rb_head', 5);
add_action('after_setup_theme', 'rb_setup_theme');

// Filters 
add_filter( 'body_class', function( $classes ) {
	return array_merge( $classes, array( 'container', '!mx-auto', 'relative','bg-slate-50/[0.45]','text-slate-700' ) );
} );
// apply_filters( 'body_class', array('class-one', 'class-two') );