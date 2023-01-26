<?php 

function rb_add_featured_field_to_posts() {
	register_post_meta('post','rb_featured', [
		'type' => 'boolean',
		'description' => __('Whether a post is featured or not', 'running-blog'),
		'single' => true,
		'default' => 0,
		'show_in_rest' => true 
	]);
}