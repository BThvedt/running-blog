<?php 

function rb_admin_menus() {
	add_menu_page(
		__('Running Blog', 'running-blog'),
		__('Running Blog', 'running-blog'),
		'edit_theme_options', // capibiity of users, both Admin and Super Admin
		'rb-options', // id of the menu page
		'rb_plugins_options_page', // callback
		plugins_url('rb-icon.svg', RB_PLUGIN_FILE)
	);
}