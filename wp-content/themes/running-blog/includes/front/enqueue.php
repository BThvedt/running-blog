<?php

function rb_enqueue() {
	wp_register_style(
		'rb_fonts',
		'https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500;600;700&family=Open+Sans&family=PT+Sans+Narrow:wght@400;700&family=Permanent+Marker&display=swap',
		[],
		null
	);
	// wp_register_style(
	// 	'u_bootstrap_icons',
	// 	get_theme_file_uri('assets/bootstrap-icons/bootstrap-icons.css')
	// );
	wp_register_style(
		'rb_tailwind_styles',
		get_theme_file_uri('assets/public/style.css')
	);

	wp_register_style(
		'rb_additional_styles',
		get_theme_file_uri('assets/public/main.css')
	);

	// remove me for production
	/*
		make notes of extra classes here
	*/
	wp_register_style(
		'taliwind_remove_me',
		'https://cdn.tailwindcss.com',
		[],
		null
	);

	wp_enqueue_style('taliwind_remove_me');

	// end remove for production

	wp_enqueue_style('rb_fonts');
	// wp_enqueue_style('u_bootstrap_icons');
	wp_enqueue_style('rb_tailwind_styles');
	wp_enqueue_style('rb_additional_styles');
}