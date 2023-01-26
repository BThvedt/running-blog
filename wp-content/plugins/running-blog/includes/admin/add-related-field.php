<?php 

function rb_add_related_field_to_posts() {
	register_post_meta('post','rb_related', [
		'type' => 'array',
		'description' => __('Array of Ids of related posts', 'running-blog'),
		'single' => true,
		'default' => [],
		'show_in_rest' => array(
			'schema' => array(
				'type'  => 'array',
				'items' => array(
					'type' => 'number',
				),
			),
		),
		'auth_callback' => function() {
				return current_user_can( 'edit_posts' );
		}
	]);
}