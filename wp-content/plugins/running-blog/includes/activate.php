<?php

function rb_activate_plugin() {
	if (version_compare(get_bloginfo('version', '5.9', '<'))) {
		wp_die(__('You must update WordPress to use this plugin', 'running-blog'));
	}

	rb_review_post_type();
	flush_rewrite_rules();

	// options API for admin page
	// careful for overriding exisiting values (ie, activiating and deactivating)
	$options = get_option('rb_options');

	// for the admin page for supplements
	if (!$options) {
		add_option('rb_options', [
			'vitamin-mix' => 0,
			'creatine' => 0,
			'beta-alanine' => 0,
			'betaine-anhydrous' => 0,
			'potassium' => 0,
			'vitamin-k-d3' => 0,
			'iron' => 0,
			'calcium-magnesium' => 0,
			'omega-3' => 0,
			'joint-support-mix' => 0,
			'collegen' => 0,
			'probiotic' => 0,
			'tumeric' => 0,
			'berberine' => 0,
			'CoQ-10' => 0,
			'pomegranite-extract' => 0,
			'L-Tyrosine' => 0,
			'L-Theanine' => 0,
			'5-HTP' => 0,
			'nac' => 0,
			'nmn' => 0,
			'resveratrol' => 0,
			'olive-oil' => 0,
			'fisetin-quercetin' => 0,
		]);
	}

	// run data - check!
	// race data - check! 
	// meal data - check! 
	// meta data - check! 
	// sleep data - check!
	// supplement data - check!
	// workout data
 
	global $wpdb;
	$runDataTableName = "{$wpdb->prefix}rb_run_data";
	$charsetCollate = $wpdb->get_charset_collate();

	$tableName = "{$wpdb->prefix}rb_run_data";

	$sql = "CREATE TABLE {$runDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) unsigned NOT NULL unique,
		user_id bigint(20) unsigned NOT NULL,
		run_date datetime NOT NULL,
		run_distance float(4,2) unsigned NULL,
		minutes_per_mile float(4,2) unsigned NULL,
		run_time_of_day time NULL,
		vest_weight float(4,2) unsigned NULL,
		arm_weight float(4,2) unsigned NULL,
		leg_weight float(4,2) unsigned NULL,
		other_weight float(4,2) unsigned NULL,
		total_weight float(4,2) unsigned NULL, 
		temperature float(4,1) unsigned NULL,
		humidity tinyint(3) unsigned NULL,
		wind float(4,1) unsigned NULL,
		weather_conditions varchar(24) NULL,
		ground_conditions varchar(24) NULL,
		ground_type varchar(24) NULL,
		average_heart_rate float(4,1) unsigned NULL,
		power float(4,1) unsigned NULL,
		elevation_gained float(4,1) unsigned NULL,
		cadence float(4,1) unsigned NULL,
		stride_length float(4,1) unsigned NULL,
		ground_contact float(4,1) unsigned NULL,
		vertical_osc float(4,1) unsigned NULL
	) ENGINE='InnoDB' {$charsetCollate};";
 
	require_once(ABSPATH . "/wp-admin/includes/upgrade.php");

	dbDelta($sql); // handles duplicate tables

	$raceDataTableName = "{$wpdb->prefix}rb_race_data";

	$sql = "CREATE TABLE {$raceDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) unsigned NOT NULL unique,
		user_id bigint(20) unsigned NOT NULL,
		race_name varchar(24) NULL,
		race_date datetime NOT NULL,
		entry_fee float(4,2) NULL,
		race_length float(4,2) unsigned NULL,
		time_start time NULL,
		pace_goal float(4,2) unsigned NULL,
		actual_pace float(4,2) unsigned NULL,
		weather_conditions varchar(24) NULL,
		ground_conditions varchar(24) NULL,
		ground_type varchar(24) NULL,
		temperature float(4,1) unsigned NULL,
		humidity tinyint(3) unsigned NULL,
		wind float(4,1) unsigned NULL,
		hill_difficulty tinyint(2) unsigned NULL,
		stride_length float(4,1) unsigned NULL,
		ground_contact float(4,1) unsigned NULL,
		vert_osc float(4,1) unsigned NULL,
		average_heart_rate float(4,1) unsigned NULL,
		power float(4,1) unsigned NULL,
		elevation_gained float(4,1) unsigned NULL,
		cadence float(4,1) unsigned NULL,
		starting_energy tinyint(3) unsigned NULL,
		percieved_effort_level tinyint(3) unsigned NULL
	) ENGINE='InnoDB' {$charsetCollate};";

	dbDelta($sql);

	$mealDataTableName = "{$wpdb->prefix}rb_meal_data";

	$sql = "CREATE TABLE {$mealDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) unsigned NOT NULL unique,
		user_id bigint(20) unsigned NOT NULL,
		meal_date datetime NOT NULL,
		meal_type varchar(24) NOT NULL,
		meal_time_of_day time NULL,
		calories int(4) unsigned NULL,
		protein tinyint(3) unsigned NULL,
		fat tinyint(3) unsigned NULL,
		carbs tinyint(3) unsigned NULL,
		fiber tinyint(3) unsigned NULL,
		sugar tinyint(3) unsigned NULL,
		salt tinyint(3) unsigned NULL
	) ENGINE='InnoDB' {$charsetCollate};";

	dbDelta($sql);

	$metaDataTableName = "{$wpdb->prefix}rb_meta_data";

	$sql = "CREATE TABLE {$metaDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) unsigned NOT NULL unique,
		user_id bigint(20) unsigned NOT NULL,
		meta_date datetime NOT NULL,
		is_fast tinyint(1) unsigned NULL,
		body_fat float(4,2) unsigned NULL,
		bmi float(4,2) unsigned NULL,
		body_water float(4,2) unsigned NULL,
		bone_density float(4,2) unsigned NULL,
		knee_pain tinyint(2) unsigned NULL,
		sholder_pain tinyint(2) unsigned NULL,
		energy tinyint(2) unsigned NULL,
		time_awake float(4,1) unsigned NULL,
		body_weight float(4,1) unsigned NULL,
		got_stuff_done tinyint(2) unsigned NULL,
		cups_of_coffee tinyint(2) unsigned NULL,
		total_calories int (5) unsigned NULL,
		total_carbs int (5) unsigned NULL,
		total_protien int(5) unsigned NULL,
		total_fiber int (5) unsigned NULL,
		total_sugar int (5) unsigned NULL,
		total_salt int (5) unsigned NULL,
		total_fat int (5) unsigned NULL
	) ENGINE='InnoDB'; {$charsetCollate}";

	dbDelta($sql);

	$sleepDataTableName = "{$wpdb->prefix}rb_sleep_data";

	$sql = "CREATE TABLE {$sleepDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) NOT NULL unique,
		user_id bigint(20) NOT NULL,
		sleep_date datetime NULL,
		start_time time NULL,
		end_time time NULL,
		awake float(3,2) unsigned NULL,
		rem float(3,2) unsigned NULL,
		core float(3,2) unsigned NULL,
		deep float(3,2) unsigned NULL,
		sleep_cycles int(2) unsigned NULL,
		sleeping_hr int(3) unsigned NULL,
		sleeping_o2 float(4,1) unsigned NULL
	) ENGINE='InnoDB'; {$charsetCollate}";

	dbDelta($sql);

	$supplimentDataTableName = "{$wpdb->prefix}rb_suppliment_data";

	// remove sleeping_hr and sleeping_02 from meta
	// add naps to meta, description to meal
	$sql = "CREATE TABLE {$supplimentDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id int NOT NULL unique,
		user_id int NOT NULL,
		supplement_date datetime NOT NULL,
		daily_cost float(5,2) unsigned NULL,
		vitamin_mix tinyint(1) unsigned NULL,
		creatine tinyint(1) unsigned NULL,
		beta_alaninie tinyint(1) unsigned NULL,
		beta_anhydrous tinyint(1) unsigned NULL,
		potassium tinyint(1) unsigned NULL,
		vitamin_k_d3 tinyint(1) unsigned NULL,
		iron tinyint(1) unsigned NULL,
		calcium_magnesium tinyint(1) unsigned NULL,
		omega_3 tinyint(1) unsigned NULL,
		joint_support_mix tinyint(1) unsigned NULL,
		collegen tinyint(1) unsigned NULL,
		probiotic tinyint(1) unsigned NULL,
		tumeric tinyint(1) unsigned NULL,
		berberine tinyint(1) unsigned NULL,
		CoQ_10 tinyint(1) unsigned NULL,
		pomegranite_extract tinyint(1) unsigned NULL,
		L_Tyrosine tinyint(1) unsigned NULL,
		L_Theanine tinyint(1) unsigned NULL,
		five_HTP tinyint(1) unsigned NULL,
		nac tinyint(1) unsigned NULL,
		nmn tinyint(1) unsigned NULL,
		resveratrol tinyint(1) unsigned NULL,
		olive_oil tinyint(1) unsigned NULL,
		fisetin_quercetin tinyint(1) unsigned NULL
	) ENGINE='InnoDB'; {$charsetCollate}";

	dbDelta($sql);

	$workoutDataTableName = "{$wpdb->prefix}rb_workout_data";

	$sql = "CREATE TABLE {$workoutDataTableName} (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
		post_id bigint(20) unsigned NOT NULL unique,
		user_id bigint(20) unsigned NOT NULL,
		workout_date datetime NOT NULL,
		workout_time time NULL,
		pushup_type varchar(16) NULL,
		pushup_sets tinyint(2) unsigned NULL,
		pushup_number tinyint(3) unsigned NULL,
		pushup_weight tinyint(3) unsigned NULL,
		pullup_type varchar(16) NULL,
		pullup_sets tinyint(2) unsigned NULL,
		pullup_number tinyint(3) unsigned NULL,
		pullup_weight tinyint(3) unsigned NULL,
		plank_type varchar(16) NULL,
		plank_sets tinyint(2) unsigned NULL,
		plank_length tinyint(3) unsigned NULL,
		plank_weight tinyint(3) unsigned NULL,
		deadlift_sets tinyint(2) unsigned NULL,
		deadlift_number tinyint(3) unsigned NULL,
		deadlift_weight tinyint(3) unsigned NULL,
		squat_sets tinyint(2) unsigned NULL,
		squat_number tinyint(3) unsigned NULL,
		squat_weight tinyint(3) unsigned NULL,
		jumping_jack_sets tinyint(2) unsigned NULL,
		jumping_jack_number tinyint(3) unsigned NULL,
		jumping_jack_weight tinyint(3) unsigned NULL
	) ENGINE='InnoDB'; {$charsetCollate}";

	dbDelta($sql);

	// heh 'phew!
}