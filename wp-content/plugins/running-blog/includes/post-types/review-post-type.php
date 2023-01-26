<?php 


function rb_review_post_type() {
	$labels = array(
		'name'                  => _x( 'Reviews', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Review', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Reviews', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Review', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Review', 'running-blog' ),
		'new_item'              => __( 'New Review', 'running-blog' ),
		'edit_item'             => __( 'Edit Review', 'running-blog' ),
		'view_item'             => __( 'View Review', 'running-blog' ),
		'all_items'             => __( 'All Reviews', 'running-blog' ),
		'search_items'          => __( 'Search Reviews', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Reviews:', 'running-blog' ),
		'not_found'             => __( 'No Reviews found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Reviews found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Review Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Review archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Review', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Review', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Reviews list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Reviews list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Reviews list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'review' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ), // removed comments, added custom-fields
		'show_in_rest'			 => true, // enables guttenberg editor
		'description' 			 => __('A custom post type for reviews', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'review', $args );

	register_post_meta('review','rating', [
		'type' => 'number',
		'description' => __('the rating for the review', 'running-blog'),
		'single' => true,
		'default' => 0,
		'show_in_rest' => true 
	]);
}

