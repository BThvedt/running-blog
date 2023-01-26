<?php

function rb_setup_theme() {
	add_theme_support('editor-styles');

	add_editor_style([
		'https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500;600;700&family=Open+Sans&family=PT+Sans+Narrow:wght@400;700&family=Permanent+Marker&display=swap',
		'assets/public/style.css',
		'assets/public/main.css',
		'https://cdn.tailwindcss.com' // remove me for production
	]);
}