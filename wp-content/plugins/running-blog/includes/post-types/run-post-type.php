<?php 


function rb_run_post_type() {
	$labels = array(
		'name'                  => _x( 'Runs', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Run', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Runs', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Run', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Run', 'running-blog' ),
		'new_item'              => __( 'New Run', 'running-blog' ),
		'edit_item'             => __( 'Edit Run', 'running-blog' ),
		'view_item'             => __( 'View Run', 'running-blog' ),
		'all_items'             => __( 'All Runs', 'running-blog' ),
		'search_items'          => __( 'Search Runs', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Runs:', 'running-blog' ),
		'not_found'             => __( 'No Runs found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Runs found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Run Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Run archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Run', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Run', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Runs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Runs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Runs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'run' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'custom-fields' ),  
		'show_in_rest'			 => true, // enables guttenberg editor
		'description' 			 => __('A custom post type for runs', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'run', $args );

	// register_post_meta('review','rating', [
	// 	'type' => 'number',
	// 	'description' => __('the rating for the review', 'running-blog'),
	// 	'single' => true,
	// 	'default' => 0,
	// 	'show_in_rest' => true 
	// ]);

	register_post_meta('run','date', [
		'type' => 'date',
		'description' => __('The date of the run', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','run-distance', [
		'type' => 'number',
		'description' => __('The distance in miles of the run', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','minutes-per-mile', [
		'type' => 'number',
		'description' => __('Minutes per Mile', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','run-time-of-day', [
		'type' => 'string',
		'description' => __('Time of Day', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','vest-weight', [
		'type' => 'number',
		'description' => __('Minutes per Mile', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','arm-weight', [
		'type' => 'number',
		'description' => __('Arm Weight', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','leg-weight', [
		'type' => 'number',
		'description' => __('Leg Weight', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','other-weight', [
		'type' => 'number',
		'description' => __('Other Weight', 'running-blog'),
		'single' => true
	]);
 
	register_post_meta('run','run-time-of-day', [
		'type' => 'string',
		'description' => __('Time of Day', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','temperature', [
		'type' => 'number',
		'description' => __('Outside Temperature in F', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','humidity', [
		'type' => 'number',
		'description' => __('Humidity', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','wind', [
		'type' => 'number',
		'description' => __('Wind Speed', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','weather-conditions', [
		'type' => 'string',
		'description' => __('Weather Conditions', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','ground-conditions', [
		'type' => 'string',
		'description' => __('Ground conditions', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','ground-type', [
		'type' => 'string',
		'description' => __('Ground Type', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','average-heart-rate', [
		'type' => 'number',
		'description' => __('Average Heart Rate', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','power', [
		'type' => 'number',
		'description' => __('Power', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','elevation-gained', [
		'type' => 'number',
		'description' => __('Elevation Gained', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','stride-length', [
		'type' => 'number',
		'description' => __('Stride Length', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','cadence', [
		'type' => 'number',
		'description' => __('Cadence', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','ground-contact', [
		'type' => 'number',
		'description' => __('Ground Contact', 'running-blog'),
		'single' => true
	]);

	register_post_meta('run','vert-osc', [
		'type' => 'number',
		'description' => __('Vertical Oscillation', 'running-blog'),
		'single' => true
	]);


}


// https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/#what-is-a-meta-box
function runs_add_meta_boxes() {
 
		add_meta_box(
			'test-field',                 // Unique ID
			'Test Field Title',      // Box title
			'run_test_field_html',  // Content callback, must be of type callable
			'run'                            // Post type
		);

		add_meta_box(
			'run-data', // Unique ID for meta box
			'The Run Data', // Box Title
			'rb_custom_post_fields_cb', // render callback
			'run', // the post type, obviously 'run' here 
			'advanced',
			'high'
		);
 
}

function rb_custom_post_fields_cb($post) {

	$date = get_post_meta( $post->ID, 'date', true );
	$run_distance = get_post_meta( $post->ID, 'run-distance', true );
	$minutes_per_mile = get_post_meta( $post->ID, 'minutes-per-mile', true );

	$vest_weight = get_post_meta( $post->ID, 'vest-weight', true );
	$arm_weight = get_post_meta( $post->ID, 'arm-weight', true );
	$leg_weight = get_post_meta( $post->ID, 'leg-weight', true );
	$other_weight = get_post_meta( $post->ID, 'other-weight', true );

	$run_time_of_day = get_post_meta( $post->ID, 'run-time-of-day', true );
	$temperature = get_post_meta( $post->ID, 'temperature', true );
	$humidity = get_post_meta( $post->ID, 'humidity', true );
	$wind = get_post_meta( $post->ID, 'wind', true );

	$weather_conditions = get_post_meta( $post->ID, 'weather-conditions', true );
	$ground_conditions = get_post_meta( $post->ID, 'ground-conditions', true );
	$ground_type = get_post_meta( $post->ID, 'ground-type', true );

	$average_heart_rate = get_post_meta( $post->ID, 'average-heart-rate', true );
	$power = get_post_meta( $post->ID, 'power', true );
	$elevation_gained = get_post_meta( $post->ID, 'elevation-gained', true );
	$cadence = get_post_meta( $post->ID, 'cadence', true);
	$stride_length = get_post_meta( $post->ID, 'stride-length', true );
	$ground_contact = get_post_meta( $post->ID, 'ground-contact', true );
	$vert_osc = get_post_meta( $post->ID, 'vert-osc', true );



	?>
		<div class="rb-post-meta-row"> 

			<div class="rb-post-meta-wrapper">
				<label for="date">Date</label>
				<input 
					type="date" 
					id="date" 
					name="date" 
					value="<?php print $date ? $date : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper">
				<label for="run-distance">Distance (Miles)</label>
				<input 
					type="number" 
					id="run-distance" 
					name="run-distance" 
					placeholder="0.0" 
					step="0.01" 
					value="<?php print $run_distance ? $run_distance : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper">
				<label for="minutes-per-mile">Minutes per Mile</label>
				<input 
					type="number" 
					id="minutes-per-mile" 
					name="minutes-per-mile" 
					placeholder="0.0" 
					step="0.01" 
					value="<?php print $minutes_per_mile ? $minutes_per_mile : ""; ?>" 
				/>
			</div>

		</div>

		<div class="rb-post-meta-row">

			<div class="rb-post-meta-wrapper small">
				<label for="vest-weight">Vest Weight (kg)</label>
				<input 
					type="number" 
					id="vest-weight" 
					name="vest-weight" 
					placeholder="0" 
					step="0.01"
					value="<?php print $vest_weight ? $vest_weight : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="arm-weight">Arm Weight (kg)</label>
				<input 
					type="number" 
					id="arm-weight" 
					name="arm-weight" 
					placeholder="0" 
					step="0.01"
					value="<?php print $arm_weight ? $arm_weight : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="leg-weight">Leg Weight (kg)</label>
				<input 
					type="number" 
					id="leg-weight" 
					name="leg-weight" 
					placeholder="0" 
					step="0.01"
					value="<?php print $leg_weight ? $leg_weight : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="other-weight">Other Weight (kg)</label>
				<input 
					type="number" 
					id="other-weight" 
					name="other-weight" 
					placeholder="0" 
					step="0.01"
					value="<?php print $other_weight ? $other_weight : ""; ?>" 
				/>
			</div>

		</div>
		
		<div class="rb-post-meta-row">

			<div class="rb-post-meta-wrapper small">
				<label for="run-time-of-day">Time of Day</label>
				<input 
					type="time" 
					id="run-time-of-day" 
					name="run-time-of-day" 
					value="<?php print $run_time_of_day ? $run_time_of_day : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="temperature">Tempurature (F)</label>
				<input 
					type="number" 
					id="temperature" 
					name="temperature" 
					placeholder="0"  
					step="0.1"
					value="<?php print $temperature ? $temperature : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="humidity">Humidity (%)</label>
				<input 
					type="number" 
					id="humidity" 
					name="humidity" 
					placeholder="0"   
					value="<?php print $humidity ? $humidity : ""; ?>"
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="wind">Wind</label>
				<input 
					type="number" 
					id="wind" 
					name="wind" 
					placeholder="0"  
					value="<?php print $wind ? $wind : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper">
				<label for="weather-conditions">Weather Conditions</label>
				<select name="weather-conditions" id="weather-conditions" class="postbox">
					<option value="">Make Selection</option>
					<option value="clear" <?php selected( $weather_conditions, 'clear' ); ?>>Clear</option>
					<option value="partially-cloudy" <?php selected( $weather_conditions, 'partially-cloudy' ); ?>>Partially Cloudy</option>
					<option value="overcast" <?php selected( $weather_conditions, 'overcast' ); ?>>Overcast</option>
					<option value="light-rain" <?php selected( $weather_conditions, 'light-rain' ); ?>>Light Rain</option>
					<option value="rainy" <?php selected( $weather_conditions, 'rainy' ); ?>>Rainy</option>
					<option value="light-snow" <?php selected( $weather_conditions, 'light-snow' ); ?>>Light Snow</option>
					<option value="snowy" <?php selected( $weather_conditions, 'snowy' ); ?>>Snowy</option>
					<option value="sleet" <?php selected( $weather_conditions, 'sleet' ); ?>>Sleet</option>
					<option value="hail" <?php selected( $weather_conditions, 'hail' ); ?>>Hail</option>
				</select>
			</div>

			<div class="rb-post-meta-wrapper">
				<label for="ground-conditions">Ground Conditions</label>
				<select name="ground-conditions" id="ground-conditions" class="postbox">
					<option value="">Make Selection</option>
					<option value="normal" <?php selected( $ground_conditions, 'normal' ); ?>>Normal</option>
					<option value="light-snow" <?php selected( $ground_conditions, 'light-snow' ); ?>>Light Snow</option>
					<option value="snow" <?php selected( $ground_conditions, 'snow' ); ?>>Snow</option>
					<option value="deep-snow" <?php selected( $ground_conditions, 'deep-snow' ); ?>>Deep Snow</option>
					<option value="light-ice" <?php selected( $ground_conditions, 'light-ice' ); ?>>Light Ice</option>
					<option value="icy" <?php selected( $ground_conditions, 'icy' ); ?>>Icy</option>
					<option value="very-icy" <?php selected( $ground_conditions, 'very-icy' ); ?>>very Icy</option>
					<option value="light-snow-and-ice" <?php selected( $ground_conditions, 'light-snow-and-ice' ); ?>>Light Snow and Ice</option>
					<option value="moderalte-snow-and-ice" <?php selected( $ground_conditions, 'moderalte-snow-and-ice' ); ?>>Moderate Snow and Ice</option>
					<option value="heavy-snow-and-ice" <?php selected( $ground_conditions, 'heavy-snow-and-ice' ); ?>>Heavy Snow and Ice</option>
				</select>
			</div>

			<div class="rb-post-meta-wrapper">
				<label for="ground-type">Ground Type</label>
				<select name="ground-type" id="ground-type" class="postbox">
					<option value="">Make Selection</option>
					<option value="pavement" <?php selected( $ground_type, 'pavement' ); ?>>Pavement</option>
					<option value="smooth-trail" <?php selected( $ground_type, 'smooth-trail' ); ?>>Smooth Trail</option>
					<option value="bumpy-trail" <?php selected( $ground_type, 'bumpy-trail' ); ?>>Bumpy Trail</option>
				</select>
			</div>
		</div>
		
		
		
		<div class="rb-post-meta-row">

			<div class="rb-post-meta-wrapper small">
				<label for="average-heart-rate">Avg HR (BPM)</label>
				<input 
					type="number" 
					id="average-heart-rate" 
					name="average-heart-rate" 
					placeholder="0"  
					value="<?php print $average_heart_rate ? $average_heart_rate : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="power">Power (watts)</label>
				<input 
					type="number" 
					id="power" 
					name="power" 
					placeholder="0"   
					value="<?php print $power ? $power : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="elevation-gained">Elevation Gained (ft)</label>
				<input 
					type="number" 
					id="elevation-gained" 
					name="elevation-gained"
					placeholder="0"   
					value="<?php print $elevation_gained ? $elevation_gained : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="stride-length">Cadence (spm)</label>
				<input 
					type="number" 
					id="cadence" 
					name="cadence" 
					placeholder="0"  
					value="<?php print $cadence ? $cadence : ""; ?>"  
				/>
			</div>

			<div class="rb-align-left">
				
				<div class="rb-post-meta-wrapper small">
					<label for="stride-length">Stride Length (m)</label>
					<input 
						type="number" 
						id="stride-length" 
						name="stride-length" 
						placeholder="0.0" 
						step="0.01" 
						value="<?php print $stride_length ? $stride_length : ""; ?>"  
					/>
				</div>

				<div class="rb-post-meta-wrapper small">
					<label for="ground-contact">Ground Contact (ms)</label>
					<input 
						type="number" 
						id="ground-contact" 
						name="ground-contact" 
						placeholder="0" 
						value="<?php print $ground_contact ? $ground_contact : ""; ?>"    
					/>
				</div>

				<div class="rb-post-meta-wrapper small">
					<label for="vert-osc">Vertical Osc (cm)</label>
					<input 
						type="number" 
						id="vert-osc"
						name="vert-osc" 
						placeholder="0"  
						value="<?php print $vert_osc ? $vert_osc : ""; ?>"    
					/>
				</div>
			</div>

		</div>

	<?php


}

function run_test_field_html( $post ) {
	

	$value = get_post_meta( $post->ID, 'test-field', true );
	?>
		<div class="rb-post-meta-wrapper">
			<label for="test-field">Description for this field</label>
			<select name="test-field" id="test-field" class="postbox">
				<option value="">Select something...</option>
				<option value="something" <?php selected( $value, 'something' ); ?>>Something</option>
				<option value="else" <?php selected( $value, 'else' ); ?>>Else</option>
			</select>
		</div>
	<?php
}

function run_save_postdata( $post_id ) {

	if (get_post_type( $post_id ) === 'run') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$run_date = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		// Date
		if ( array_key_exists( 'date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'date',
				$_POST['date']
			);

			$run_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
			$database_array['run_date'] = $run_date;
		}

		// Distance
		if ( array_key_exists( 'run-distance', $_POST ) ) {
			update_post_meta(
				$post_id,
				'run-distance',
				$_POST['run-distance']
			);

			$database_array['run_distance'] = $_POST['run-distance'];
		}

		// Minutes per Mile
		if ( array_key_exists( 'minutes-per-mile', $_POST ) ) {
			update_post_meta(
				$post_id,
				'minutes-per-mile',
				$_POST['minutes-per-mile']
			);

			$database_array['minutes_per_mile'] = $_POST['minutes-per-mile'];
		}

		// run start time
		if ( array_key_exists( 'run-time-of-day', $_POST ) ) {
			update_post_meta(
				$post_id,
				'run-time-of-day',
				$_POST['run-time-of-day']
			);

			$database_array['run_time_of_day'] = $_POST['run-time-of-day'];
		}

		// vest weight
		if ( array_key_exists( 'vest-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'vest-weight',
				$_POST['vest-weight']
			);

			$database_array['vest_weight'] = $_POST['vest-weight'];
		}

		// arm weight
		if ( array_key_exists( 'arm-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'arm-weight',
				$_POST['arm-weight']
			);

			$database_array['arm_weight'] = $_POST['arm-weight'];
		}

		// leg weight
		if ( array_key_exists( 'leg-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'leg-weight',
				$_POST['leg-weight']
			);

			$database_array['leg_weight'] = $_POST['leg-weight'];
		}

		// other weight
		if ( array_key_exists( 'other-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'other-weight',
				$_POST['other-weight']
			);

			$database_array['other_weight'] = $_POST['other-weight'];
		}

		// time-of-day
		if (array_key_exists( 'vest_weight', $database_array ) && 
				array_key_exists( 'arm_weight', $database_array ) &&  
				array_key_exists( 'leg_weight', $database_array ) && 
				array_key_exists( 'other_weight', $database_array ) ) {
			update_post_meta(
				$post_id,
				'run-time-of-day',
				$_POST['run-time-of-day']
			);

			$database_array['total_weight'] = round(floatval($database_array['arm_weight']) + floatval($database_array['leg_weight']) + floatval($database_array['other_weight']), 2);
		}

		// temperature
		if ( array_key_exists( 'temperature', $_POST ) ) {
			update_post_meta(
				$post_id,
				'temperature',
				$_POST['temperature']
			);

			$database_array['temperature'] = $_POST['temperature'];
		}

		// humidity
		if ( array_key_exists( 'humidity', $_POST ) ) {
			update_post_meta(
				$post_id,
				'humidity',
				$_POST['humidity']
			);

			$database_array['humidity'] = $_POST['humidity'];
		}

		// wind
		if ( array_key_exists( 'wind', $_POST ) ) {
			update_post_meta(
				$post_id,
				'wind',
				$_POST['wind']
			);

			$database_array['wind'] = $_POST['wind'];
		}

		// weather conditions
		if ( array_key_exists( 'weather-conditions', $_POST ) ) {
			update_post_meta(
				$post_id,
				'weather-conditions',
				$_POST['weather-conditions']
			);

			$database_array['weather_conditions'] = $_POST['weather-conditions'];
		}

		// ground conditions
		if ( array_key_exists( 'ground-conditions', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-conditions',
				$_POST['ground-conditions']
			);

			$database_array['ground_conditions'] = $_POST['ground-conditions'];
		}

		// ground type
		if ( array_key_exists( 'ground-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-type',
				$_POST['ground-type']
			);

			$database_array['ground_type'] = $_POST['ground-type'];
		}

		// average-heart rate
		if ( array_key_exists( 'average-heart-rate', $_POST ) ) {
			update_post_meta(
				$post_id,
				'average-heart-rate',
				$_POST['average-heart-rate']
			);

			$database_array['average_heart_rate'] = $_POST['average-heart-rate'];
		}

		// power
		if ( array_key_exists( 'power', $_POST ) ) {
			update_post_meta(
				$post_id,
				'power',
				$_POST['power']
			);

			$database_array['power'] = $_POST['power'];
		}

		// elevation-gained
		if ( array_key_exists( 'elevation-gained', $_POST ) ) {
			update_post_meta(
				$post_id,
				'elevation-gained',
				$_POST['elevation-gained']
			);

			$database_array['elevation_gained'] = $_POST['elevation-gained'];
		}

		// stride-length
		if ( array_key_exists( 'stride-length', $_POST ) ) {
			update_post_meta(
				$post_id,
				'stride-length',
				$_POST['stride-length']
			);

			$database_array['stride_length'] = $_POST['stride-length'];
		}

		// cadence
		if ( array_key_exists( 'cadence', $_POST ) ) {
			update_post_meta(
				$post_id,
				'cadence',
				$_POST['cadence']
			);

			$database_array['cadence'] = $_POST['cadence'];
		}

		// ground-contact
		if ( array_key_exists( 'ground-contact', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-contact',
				$_POST['ground-contact']
			);

			$database_array['ground_contact'] = $_POST['ground-contact'];
		}

		// vert-osc
		if ( array_key_exists( 'vert-osc', $_POST ) ) {
			update_post_meta(
				$post_id,
				'vert-osc',
				$_POST['vert-osc']
			);

			$database_array['vertical_osc'] = $_POST['vert-osc'];
		}
		/*
		// Set this variable to false initially.
		static $updated = false;

		// If title has already been set once, bail.
		if ( $updated ) {
				return;
		}

		// Since we're updating this post's title, set this
		// variable to true to ensure it doesn't happen again.
		$updated = true;

		if ( array_key_exists( 'date', $_POST ) ) {
			$post_update = array(
				'ID'         => $post_id,
				'post_title' => $_POST['date'] . ' Run' 
			);

			wp_update_post( $post_update );
		} */

		// try to insert into the database. Select from wp_rb_run_data where the date is the same.
		// if doesn't exist, then insert
		// just override the data if duplicate posts are made with whatever the lastest is
		// sloppy but OH WELL

		if ( array_key_exists( 'date', $_POST ) ) {

			global $wpdb;
			$runDataTableName = "{$wpdb->prefix}rb_run_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$runDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($runDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($runDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 

		}

	}
}

function delete_run_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'run') { 

		global $wpdb;
		$runDataTableName = "{$wpdb->prefix}rb_run_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$runDataTableName} where post_id=%d", $postID
			)
		);
	}
}
 