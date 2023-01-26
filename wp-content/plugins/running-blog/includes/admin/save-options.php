<?php 

function rb_save_options() {
	print_r($_POST);

	if (!current_user_can('edit_theme_options')) {
		wp_die(
			__("You are not allowed to be on this page.", "running-blog")
		);
	}

	check_admin_referer('rb_options_verify'); // verifies nonce

	$options = get_option('rb_options');

	$options['vitamin-mix'] = floatval($_POST['vitamin-mix']);
	$options['creatine'] = floatval($_POST['creatine']); 
	$options['beta-alanine'] = floatval($_POST['beta-alanine']); 
	$options['betaine-anhydrous'] = floatval($_POST['betaine-anhydrous']); 
	$options['potassium'] = floatval($_POST['potassium']); 
	$options['vitamin-k-d3'] = floatval($_POST['vitamin-k-d3']); 
	$options['iron'] = floatval($_POST['iron']); 
	$options['calcium-magnesium'] = floatval($_POST['calcium-magnesium']); 
	$options['omega-3'] = floatval($_POST['omega-3']); 
	$options['joint-support-mix'] = floatval($_POST['joint-support-mix']); 
	$options['collegen'] = floatval($_POST['collegen']); 
	$options['probiotic'] = floatval($_POST['probiotic']); 
	$options['tumeric'] = floatval($_POST['tumeric']); 
	$options['berberine'] = floatval($_POST['berberine']); 
	$options['CoQ-10'] = floatval($_POST['CoQ-10']); 
	$options['pomegranite-extract'] = floatval($_POST['pomegranite-extract']); 
	$options['L-Tyrosine'] = floatval($_POST['L-Tyrosine']); 
	$options['L-Theanine'] = floatval($_POST['L-Theanine']); 
	$options['5-HTP'] = floatval($_POST['5-HTP']); 
	$options['nac'] = floatval($_POST['nac']); 
	$options['nmn'] = floatval($_POST['nmn']); 
	$options['resveratrol'] = floatval($_POST['resveratrol']); 
	$options['olive-oil'] = floatval($_POST['olive-oil']); 
	$options['fisetin-quercetin'] = floatval($_POST['fisetin-quercetin']); 

	update_option('rb_options', $options);

	wp_redirect(admin_url('admin.php?page=rb-options&status=1'));
	
}