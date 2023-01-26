<?php 

function rb_register_blocks() {

	$blocks = [
		[ 'name' => 'fancy-header' ],
		['name' => 'search-form', 'options' => [
			'render_callback' => 'rb_search_form_render_cb'
		]],
		['name' => 'front-search-form', 'options' => [
			'render_callback' => 'rb_front_search_form_render_cb'
		]],
		['name' => 'page-header', 'options' => [
			'render_callback' => 'rb_page_header_render_cb'
		]],
		['name' => 'review-stars', 'options' => [
			'render_callback' => 'rb_review_stars_render_cb'
		]],
		['name' => 'run-single-post-display', 'options' => [
			'render_callback' => 'rb_run_single_post_display'
		]],
		['name' => 'meal-single-post-display', 'options' => [
			'render_callback' => 'rb_meal_single_post_display'
		]],
		['name' => 'workout-single-post-display', 'options' => [
			'render_callback' => 'rb_workout_single_post_display'
		]],
		['name' => 'supplement-single-post-display', 'options' => [
			'render_callback' => 'rb_supplement_single_post_display'
		]],
		['name' => 'supplement-single-post-display', 'options' => [
			'render_callback' => 'rb_supplement_single_post_display'
		]],
		['name' => 'meta-single-post-display', 'options' => [
			'render_callback' => 'rb_meta_single_post_display'
		]],
		['name' => 'front-page-recent-posts', 'options' => [
			'render_callback' => 'front_page_recent_posts'
		]],
		['name' => 'front-page-featured-posts', 'options' => [
			'render_callback' => 'rb_front_page_featured_posts'
		]],
		['name' => 'sidebar-related-posts', 'options' => [
			'render_callback' => 'rb_sidebar_related_posts'
		]],
		['name' => 'sidebar-featured-posts', 'options' => [
			'render_callback' => 'rb_sidebar_featured_posts'
		]],
		['name' => 'add-sidebar-stuff' ],
		['name' => 'graph-container' ],
		['name' => 'graph',
		'options' => [
			'render_callback' => 'rb_graph_render_cb'
		]], // this one will need a render callback
		// ['name' => 'sleep-data-single-post-display', 'options' => [
		// 	'render_callback' => 'rb_sleep_data_single_post_display'
		// ]]
	];

	foreach($blocks as $block) {
		//print_r(RB_PLUGIN_DIR . 'build/blocks/' . $block['name']);
		register_block_type(
			RB_PLUGIN_DIR . 'build/blocks/' . $block['name'],
			isset($block['options']) ? $block['options'] : []
		);
	}	
	
}

// make a featured data table
// on save, save the featured data
// featured page with blocks
// metric is a sidebar choice
// color is a sidebar choice
// and post-types are a sidebar choice (actually it should be all that complicated, really)
// gonna have to have a search page for meals


// time per mile
// supplement cost
// hours of sleep (quality popup)
// sleep cycles
// running heartrate
// pushups
// pushup weight
// pullups
// pullup weight
// squats
// squat weight
// jumping jacks
// weight
// resting heartrate
// blood oxygen
// weight
// calories
// race time per mile
// pain level
// daily energy level
// hours spent excercising
// ids of related posts per mile
// supplement cost
// time up
// time in bed

// popup has date, link to relevant metrics
// most of this save on save, calories requires a cron job I think
// so does 

// expose all the custom fields to rest
// race custom post type & views for the custom post types

