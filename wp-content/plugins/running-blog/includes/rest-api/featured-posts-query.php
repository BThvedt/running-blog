<?php 

function rb_rest_post_query($args, $request) {
	$featured = $request->get_param('featured');
	
	if (isset($featured)) {
		// want random featured posts
		// 'orderby' => 'rand'
		$args['orderby'] = 'rand';
		$args['meta_key'] = 'rb_featured';
		$args['meta_value'] = true;
		$args['meta_compare'] = '=';
	}

	return $args;
}