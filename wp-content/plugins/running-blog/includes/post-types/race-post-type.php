<?php 

function rb_race_post_type() {
	$labels = array(
		'name'                  => _x( 'Races', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Race', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Races', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Race', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Race', 'running-blog' ),
		'new_item'              => __( 'New Race', 'running-blog' ),
		'edit_item'             => __( 'Edit Race', 'running-blog' ),
		'view_item'             => __( 'View Race', 'running-blog' ),
		'all_items'             => __( 'All Races', 'running-blog' ),
		'search_items'          => __( 'Search Race', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Race:', 'running-blog' ),
		'not_found'             => __( 'No Race found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Race found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Race Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Race archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Race', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Race', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Race list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Race list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Race list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'race' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'  ),  
		'show_in_rest'			 => true, // enables guttenberg editor
		'description' 			 => __('A custom post type for Race posts', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'race', $args );
}

function race_add_meta_boxes($post) {
	add_meta_box(
		'race-data', // Unique ID for meta box
		'The Race Data', // Box Title
		'rb_custom_race_fields_cb', // render callback
		'race', // the post type, obviously 'race' here 
		'advanced',
		'high'
	);
}

function rb_custom_race_fields_cb($post) {
	// race display
	// custom dispalys for lists of post types
	// then what.. hmm .. I guess get started on saving calories (make a field in meta)
	// and then saving various fields in a custom database table

	$race_name = get_post_meta( $post->ID, 'race-name', true );
	$race_date = get_post_meta( $post->ID, 'race-date', true );
	$entry_fee = get_post_meta( $post->ID, 'entry-fee', true );

	$race_length = get_post_meta( $post->ID, 'race-length', true );
	$time_start = get_post_meta( $post->ID, 'time-start', true );
	$pace_goal = get_post_meta( $post->ID, 'pace-goal', true );
	$actual_pace = get_post_meta( $post->ID, 'actual-pace', true );

	$temperature = get_post_meta( $post->ID, 'temperature', true );
	$humidity = get_post_meta( $post->ID, 'humidity', true );
	$wind = get_post_meta( $post->ID, 'wind', true );

	$hill_difficulty = get_post_meta( $post->ID, 'hill-difficulty', true );
	$stride_length = get_post_meta( $post->ID, 'stride-length', true );
	$ground_contact = get_post_meta( $post->ID, 'ground-contact', true );
	$vert_osc = get_post_meta( $post->ID, 'vert-osc', true );

	$weather_conditions = get_post_meta( $post->ID, 'weather-conditions', true );
	$ground_conditions = get_post_meta( $post->ID, 'ground-conditions', true );
	$ground_type = get_post_meta( $post->ID, 'ground-type', true );

	$average_heart_rate = get_post_meta( $post->ID, 'average-heart-rate', true );
	$power = get_post_meta( $post->ID, 'power', true );
	$elevation_gained = get_post_meta( $post->ID, 'elevation-gained', true );
	$cadence = get_post_meta( $post->ID, 'cadence', true );

	$starting_energy = get_post_meta( $post->ID, 'starting-energy', true );
	$percieved_effort_level = get_post_meta( $post->ID, 'percieved-effort-level', true );

	?>
		<div><p class="my-2 font-bold">Remember for this post type, there needs to be editor content or it won't save.</p></div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper">
				<label for="race-name">Name</label>
				<input 
					id="race-name" 
					name="race-name" 
					value="<?php print $race_name ? $race_name : ""; ?>" 
					required
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="race-date">Race Date</label>
				<input 
					type="date" 
					id="race-date" 
					name="race-date" 
					value="<?php print $race_date ? $race_date : ""; ?>" 
					required
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="entry-fee">Entry Fee</label>
				<input 
					type="number" 
					id="entry-fee" 
					name="entry-fee" 
					step="0.01"
					value="<?php print $entry_fee ? $entry_fee : ""; ?>"   
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
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
			<div class="rb-post-meta-wrapper">
				<label for="temperature">Tempurature (F)</label>
				<input 
					type="number" 
					id="temperature" 
					name="temperature" 
					placeholder="0"  
					value="<?php print $temperature ? $temperature : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="humidity">Humidity (%)</label>
				<input 
					type="number" 
					id="humidity" 
					name="humidity" 
					placeholder="0"   
					value="<?php print $humidity ? $humidity : ""; ?>"
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="wind">Wind</label>
				<input 
					type="number" 
					id="wind" 
					name="wind" 
					placeholder="0"  
					value="<?php print $wind ? $wind : ""; ?>" 
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="race-length">Race Length (miles)</label>
				<input 
					type="number" 
					id="race-length" 
					name="race-length" 
					placeholder="0.0" 
					step="0.01" 
					value="<?php print $race_length ? $race_length : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="time-start">Time Start</label>
				<input 
					type="time" 
					id="time-start" 
					name="time-start" 
					value="<?php print $time_start ? $time_start : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pace-goal">Pace Goal (mile)</label>
				<input 
					type="number" 
					id="pace-goal" 
					name="pace-goal" 
					placeholder="0.0" 
					step="0.01" 
					value="<?php print $pace_goal ? $pace_goal : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="actual-pace">Actual Pace (mile)</label>
				<input 
					type="number" 
					id="actual-pace" 
					name="actual-pace" 
					placeholder="0.0" 
					step="0.01" 
					value="<?php print $actual_pace ? $actual_pace : ""; ?>" 
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="hill-difficulty">Hill Difficulty</label>
				<input 
					type="number" 
					id="hill-difficulty" 
					name="hill-difficulty" 
					placeholder="0"  
					min="0"
					max="10"
					value="<?php print $hill_difficulty ? $hill_difficulty : ""; ?>" 
				/>
			</div>
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
				<label for="cadence">Cadence (spm)</label>
				<input 
					type="number" 
					id="cadence" 
					name="cadence" 
					placeholder="0"  
					value="<?php print $cadence ? $cadence : ""; ?>"  
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-align-left">
				<div class="rb-post-meta-wrapper small">
					<label for="starting-energy">Starting Energy</label>
					<input 
						type="number" 
						id="starting-energy" 
						name="starting-energy" 
						placeholder="0"   
						min="0"
						max="10"
						value="<?php print $starting_energy ? $starting_energy : ""; ?>" 
					/>
				</div>
				<div class="rb-post-meta-wrapper small">
					<label for="percieved-effort-level">Percieved Effort Level</label>
					<input 
						type="number" 
						id="percieved-effort-level" 
						name="percieved-effort-level" 
						placeholder="0"   
						min="0"
						max="10"
						value="<?php print $percieved_effort_level ? $percieved_effort_level : ""; ?>" 
					/>
				</div>
			</div>
		</div>
	<?php 
}

function race_data_save_postdata($post_id) {

	if (get_post_type( $post_id ) === 'race') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$race_date = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		if ( array_key_exists( 'race-name', $_POST ) ) {
			update_post_meta(
				$post_id,
				'race-name',
				$_POST['race-name']
			);

			$database_array['race_name'] = $_POST['race-name'];
		}

		if ( array_key_exists( 'race-date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'race-date',
				$_POST['race-date']
			);

			$race_date = date("Y-m-d H:i:s", strtotime($_POST['race-date']));
			$database_array['race_date'] = $race_date;
		}

		if ( array_key_exists( 'entry-fee', $_POST ) ) {
			update_post_meta(
				$post_id,
				'entry-fee',
				$_POST['entry-fee']
			);

			$database_array['entry_fee'] = $_POST['entry-fee'];
		}

		if ( array_key_exists( 'race-length', $_POST ) ) {
			update_post_meta(
				$post_id,
				'race-length',
				$_POST['race-length']
			);

			$database_array['race_length'] = $_POST['race-length'];
		}

		 if ( array_key_exists( 'time-start', $_POST ) ) {
			update_post_meta(
				$post_id,
				'time-start',
				$_POST['time-start']
			);

			$database_array['time_start'] = $_POST['time-start'];
		}

		if ( array_key_exists( 'pace-goal', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pace-goal',
				$_POST['pace-goal']
			);

			$database_array['pace_goal'] = $_POST['pace-goal'];
		}

		if ( array_key_exists( 'actual-pace', $_POST ) ) {
			update_post_meta(
				$post_id,
				'actual-pace',
				$_POST['actual-pace']
			);

			$database_array['actual_pace'] = $_POST['actual-pace'];
		}

		if ( array_key_exists( 'weather-conditions', $_POST ) ) {
			update_post_meta(
				$post_id,
				'weather-conditions',
				$_POST['weather-conditions']
			);

			$database_array['weather_conditions'] = $_POST['weather-conditions'];
		}

		if ( array_key_exists( 'ground-conditions', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-conditions',
				$_POST['ground-conditions']
			);

			$database_array['ground_conditions'] = $_POST['ground-conditions'];
		}

		if ( array_key_exists( 'ground-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-type',
				$_POST['ground-type']
			);

			$database_array['ground_type'] = $_POST['ground-type'];
		}

		if ( array_key_exists( 'temperature', $_POST ) ) {
			update_post_meta(
				$post_id,
				'temperature',
				$_POST['temperature']
			);

			$database_array['temperature'] = $_POST['temperature'];
		}

		if ( array_key_exists( 'humidity', $_POST ) ) {
			update_post_meta(
				$post_id,
				'humidity',
				$_POST['humidity']
			);

			$database_array['humidity'] = $_POST['humidity'];
		}

		if ( array_key_exists( 'wind', $_POST ) ) {
			update_post_meta(
				$post_id,
				'wind',
				$_POST['wind']
			);

			$database_array['wind'] = $_POST['wind'];
		}

		if ( array_key_exists( 'hill-difficulty', $_POST ) ) {
			update_post_meta(
				$post_id,
				'hill-difficulty',
				$_POST['hill-difficulty']
			);

			$database_array['hill_difficulty'] = $_POST['hill-difficulty'];
		}

		if ( array_key_exists( 'stride-length', $_POST ) ) {
			update_post_meta(
				$post_id,
				'stride-length',
				$_POST['stride-length']
			);

			$database_array['stride_length'] = $_POST['stride-length'];
		}

		if ( array_key_exists( 'ground-contact', $_POST ) ) {
			update_post_meta(
				$post_id,
				'ground-contact',
				$_POST['ground-contact']
			);

			$database_array['ground_contact'] = $_POST['ground-contact'];
		}

		if ( array_key_exists( 'vert-osc', $_POST ) ) {
			update_post_meta(
				$post_id,
				'vert-osc',
				$_POST['vert-osc']
			);

			$database_array['vert_osc'] = $_POST['vert-osc'];
		}

		if ( array_key_exists( 'average-heart-rate', $_POST ) ) {
			update_post_meta(
				$post_id,
				'average-heart-rate',
				$_POST['average-heart-rate']
			);

			$database_array['average_heart_rate'] = $_POST['average-heart-rate'];
		}

		if ( array_key_exists( 'power', $_POST ) ) {
			update_post_meta(
				$post_id,
				'power',
				$_POST['power']
			);

			$database_array['power'] = $_POST['power'];
		}

		if ( array_key_exists( 'elevation-gained', $_POST ) ) {
			update_post_meta(
				$post_id,
				'elevation-gained',
				$_POST['elevation-gained']
			);

			$database_array['elevation_gained'] = $_POST['elevation-gained'];
		}

		if ( array_key_exists( 'cadence', $_POST ) ) {
			update_post_meta(
				$post_id,
				'cadence',
				$_POST['cadence']
			);

			$database_array['cadence'] = $_POST['cadence'];
		}

		if ( array_key_exists( 'starting-energy', $_POST ) ) {
			update_post_meta(
				$post_id,
				'starting-energy',
				$_POST['starting-energy']
			);

			$database_array['starting_energy'] = $_POST['starting-energy'];
		}

		if ( array_key_exists( 'percieved-effort-level', $_POST ) ) {
			update_post_meta(
				$post_id,
				'percieved-effort-level',
				$_POST['percieved-effort-level']
			);

			$database_array['percieved_effort_level'] = $_POST['percieved-effort-level'];
		} 

		if ( array_key_exists( 'race-date', $_POST ) ) {

			global $wpdb;
			$raceDataTableName = "{$wpdb->prefix}rb_race_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$raceDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($raceDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($raceDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 

		}

	}

}


function delete_race_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'race') { 

		global $wpdb;
		$raceDataTableName = "{$wpdb->prefix}rb_race_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$raceDataTableName} where post_id=%d", $postID
			)
		);
	}
}