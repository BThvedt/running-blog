<?php 

function add_styles_for_admin_pages() {
	//print_r(RB_PLUGIN_DIR . 'admin-style.css' );
	wp_register_style( 'admin_style', plugin_dir_url( __FILE__ ) . '../admin-style.css' );

	wp_enqueue_style( 'admin_style' );
 
}

//C:\Users\bthve\Local Sites\runninglocal\app\public\wp-content\plugins\running-blog/admin-style.css