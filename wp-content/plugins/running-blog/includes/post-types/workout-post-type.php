<?php 

function rb_workout_post_type() {
	$labels = array(
		'name'                  => _x( 'Workouts', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Workout', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Workouts', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Workout', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Workout', 'running-blog' ),
		'new_item'              => __( 'New Workout', 'running-blog' ),
		'edit_item'             => __( 'Edit Workout', 'running-blog' ),
		'view_item'             => __( 'View Workout', 'running-blog' ),
		'all_items'             => __( 'All Workouts', 'running-blog' ),
		'search_items'          => __( 'Search Workouts', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Workouts:', 'running-blog' ),
		'not_found'             => __( 'No Workouts found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Workouts found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Workout Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Workout archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Workout', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Workout', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Workouts list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Workouts list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Workouts list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'workout' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'custom-fields' ),  
		'show_in_rest'			 => false, // enables guttenberg editor
		'description' 			 => __('A custom post type for Workouts', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'workout', $args );
}

function workouts_add_meta_boxes() {
	add_meta_box(
		'workout-data', // Unique ID for meta box
		'The Workout Data', // Box Title
		'workout_custom_meal_fields_cb', // render callback
		'workout', // the post type, obviously 'email' here 
		'advanced',
		'high'
	);
}

function workout_custom_meal_fields_cb($post) {

	// pushups pullups planks. Types for each
	// deadlifts, squats, weight
	// jumping jack sets, numbers, weights
	$date = get_post_meta( $post->ID, 'date', true );
	$workout_time_of_day = get_post_meta( $post->ID, 'workout-time-of-day', true );

	$pushup_type = get_post_meta( $post->ID, 'pushup-type', true );
	$pushup_sets = get_post_meta( $post->ID, 'pushup-sets', true );
	$pushup_number = get_post_meta( $post->ID, 'pushups', true );
	$pushup_weight = get_post_meta( $post->ID, 'pushup-weight', true );

	$pullup_type = get_post_meta( $post->ID, 'pullup-type', true );
	$pullup_sets = get_post_meta( $post->ID, 'pullup-sets', true );
	$pullup_number = get_post_meta( $post->ID, 'pullups', true );
	$pullup_weight = get_post_meta( $post->ID, 'pullup-weight', true );

	$plank_type = get_post_meta( $post->ID, 'plank-type', true );
	$plank_sets = get_post_meta( $post->ID, 'plank-sets', true );
	$plank_length = get_post_meta( $post->ID, 'plank-length', true );
	$plank_weight = get_post_meta( $post->ID, 'plank-weight', true );

	$deadlift_sets = get_post_meta( $post->ID, 'deadlift-sets', true );
	$deadlift_number = get_post_meta( $post->ID, 'deadlift-set-number', true );
	$deadlift_weight = get_post_meta( $post->ID, 'deadlift-weight', true );

	$squat_sets = get_post_meta( $post->ID, 'squat-sets', true );
	$squat_number = get_post_meta( $post->ID, 'squat-set-number', true );
	$squat_weight = get_post_meta( $post->ID, 'squat-weight', true );

	$jumping_jack_sets = get_post_meta( $post->ID, 'jumping-jack-sets', true );
	$jumping_jack_number = get_post_meta( $post->ID, 'jumping-jack-set-number', true );
	$jumping_jack_weight = get_post_meta( $post->ID, 'jumping-jack-weight', true );


	?>
		<div class="rb-post-meta-row">
			<div class="rb-align-left">
				<div class="rb-post-meta-wrapper">
					<label for="date">Date</label>
					<input 
						type="date" 
						id="date" 
						name="date" 
						value="<?php print $date ? $date : ""; ?>" 
						required
					/>
				</div>
				<div class="rb-post-meta-wrapper">
					<label for="workout-time-of-day">Time of Day</label>
					<input 
						type="time" 
						id="workout-time-of-day" 
						name="workout-time-of-day" 
						value="<?php print $workout_time_of_day ? $workout_time_of_day : ""; ?>" 
					/>
				</div>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="pushup-type">Pushup Type</label>
				<select name="pushup-type" id="pushup-type" class="postbox">
					<option value="">Select something...</option>
					<option value="regular" <?php selected( $pushup_type, 'regular' ); ?>>Regular</option>
					<option value="elevated" <?php selected( $pushup_type, 'elevated' ); ?>>Elevated Feet</option>
					<option value="wall" <?php selected( $pushup_type, 'wall' ); ?>>Wall</option>
				</select>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pushups">Pushups Sets</label>
				<input 
					type="number" 
					id="pushup-sets" 
					name="pushup-sets" 
					value="<?php print $pushup_sets ? $pushup_sets : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pushups">Pushups per Set</label>
				<input 
					type="number" 
					id="pushups" 
					name="pushups" 
					value="<?php print $pushup_number ? $pushup_number : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pushup-weight">Added Weight (lbs)</label>
				<input 
					type="number" 
					id="pushup-weight" 
					name="pushup-weight"   
					value="<?php print $pushup_weight ? $pushup_weight : ""; ?>"   
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="pullup-type">Pullup Type</label>
				<select name="pullup-type" id="pullup-type" class="postbox">
					<option value="">Select something...</option>
					<option value="reverse" <?php selected( $pullup_type, 'reverse' ); ?>>Reverse</option>
					<option value="regular" <?php selected( $pullup_type, 'regular' ); ?>>Regular</option>
					<option value="kipping" <?php selected( $pullup_type, 'kipping' ); ?>>Kipping</option>
				</select>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pushups">Pullup Sets</label>
				<input 
					type="number" 
					id="pullup-sets" 
					name="pullup-sets" 
					value="<?php print $pullup_sets ? $pullup_sets : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pullups">Pullups per Set</label>
				<input 
					type="number" 
					id="pullups" 
					name="pullups"   
					value="<?php print $pullup_number ? $pullup_number : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="pullup-weight">Added Weight (lbs)</label>
				<input 
					type="number" 
					id="pullup-weight" 
					name="pullup-weight"   
					value="<?php print $pullup_weight ? $pullup_weight : ""; ?>"   
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="plank-type">Plank Type</label>
				<select name="plank-type" id="plank-type" class="postbox">
					<option value="">Select something...</option>
					<option value="knee" <?php selected( $plank_type, 'knee' ); ?>>Knee</option>
					<option value="regular" <?php selected( $plank_type, 'regular' ); ?>>Regular</option>
					<option value="elevated" <?php selected( $plank_type, 'elevated' ); ?>>Elevated</option>
				</select>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="plank-sets">Planks</label>
				<input 
					type="number" 
					id="plank-sets" 
					name="plank-sets" 
					value="<?php print $plank_sets ? $plank_sets : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="plank-length">Length of Plank (s)</label>
				<input 
					type="number" 
					id="plank-length" 
					name="plank-length"  
					value="<?php print $plank_length ? $plank_length : ""; ?>"    
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="plank-weight">Added Weight (lbs)</label>
				<input 
					type="number" 
					id="plank-weight" 
					name="plank-weight"   
					value="<?php print $plank_weight ? $plank_weight : ""; ?>"    
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper">
				<label for="deadlift-sets">Deadlift Sets</label>
				<input 
					type="number" 
					id="deadlift-sets" 
					name="deadlift-sets"   
					value="<?php print $deadlift_sets ? $deadlift_sets : ""; ?>"    
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="deadlift-set-number">Number Per Set</label>
				<input 
					type="number" 
					id="deadlift-set-number" 
					name="deadlift-set-number"  
					value="<?php print $deadlift_number ? $deadlift_number : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="deadlift-weight">Weight (lbs)</label>
				<input 
					type="number" 
					id="deadlift-weight" 
					name="deadlift-weight"   
					value="<?php print $deadlift_weight ? $deadlift_weight : ""; ?>"   
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper">
				<label for="squat-sets">Squat Sets</label>
				<input 
					type="number" 
					id="squat-sets" 
					name="squat-sets"   
					value="<?php print $squat_sets ? $squat_sets : ""; ?>"  
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="squat-set-number">Number Per Set</label>
				<input 
					type="number" 
					id="squat-set-number" 
					name="squat-set-number"   
					value="<?php print $squat_number ? $squat_number : ""; ?>"  
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="squat-weight">Weight (lbs)</label>
				<input 
					type="number" 
					id="squat-weight" 
					name="squat-weight"   
					value="<?php print $squat_weight ? $squat_weight : ""; ?>"  
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper">
				<label for="jumping-jack-sets">Jumping Jack Sets</label>
				<input 
					type="number" 
					id="jumping-jack-sets" 
					name="jumping-jack-sets"   
					value="<?php print $jumping_jack_sets ? $jumping_jack_sets : ""; ?>"  
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="jumping-jack-set-number">Number Per Set</label>
				<input 
					type="number" 
					id="jumping-jack-set-number" 
					name="jumping-jack-set-number"   
					value="<?php print $jumping_jack_number ? $jumping_jack_number : ""; ?>"  
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="jumping-jack-weight">Added Weight (lbs)</label>
				<input 
					type="number" 
					id="jumping-jack-weight" 
					name="jumping-jack-weight"   
					value="<?php print $jumping_jack_weight ? $jumping_jack_weight : ""; ?>"  
				/>
			</div>
		</div>
	<?php
}

function workouts_save_postdata($post_id) {

	if (get_post_type( $post_id ) === 'workout') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$race_date = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		if ( array_key_exists( 'date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'date',
				$_POST['date']
			);

			$workout_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
			$database_array['workout_date'] = $workout_date;
		}

		if ( array_key_exists( 'workout-time-of-day', $_POST ) ) {
			update_post_meta(
				$post_id,
				'workout-time-of-day',
				$_POST['workout-time-of-day']
			);

			$database_array['workout_time'] = $_POST['workout-time-of-day'];
		}

		if ( array_key_exists( 'pushup-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pushup-type',
				$_POST['pushup-type']
			);

			$database_array['pushup_type'] = $_POST['pushup-type'];
		}

		if ( array_key_exists( 'pushup-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pushup-sets',
				$_POST['pushup-sets']
			);

			$database_array['pushup_sets'] = $_POST['pushup-sets'];
		}

		if ( array_key_exists( 'pushups', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pushups',
				$_POST['pushups']
			);

			$database_array['pushup_number'] = $_POST['pushups'];
		}

		if ( array_key_exists( 'pushup-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pushup-weight',
				$_POST['pushup-weight']
			);

			$database_array['pushup_weight'] = $_POST['pushup-weight'];
		}

		if ( array_key_exists( 'pullup-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pullup-type',
				$_POST['pullup-type']
			);

			$database_array['pullup_type'] = $_POST['pullup-type'];
		}

		if ( array_key_exists( 'pullup-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pullup-sets',
				$_POST['pullup-sets']
			);

			$database_array['pullup_sets'] = $_POST['pullup-sets'];
		}

		if ( array_key_exists( 'pullups', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pullups',
				$_POST['pullups']
			);

			$database_array['pullup_number'] = $_POST['pullups'];
		}

		if ( array_key_exists( 'pullup-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pullup-weight',
				$_POST['pullup-weight']
			);

			$database_array['pullup_weight'] = $_POST['pullup-weight'];
		}

		if ( array_key_exists( 'plank-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'plank-type',
				$_POST['plank-type']
			);

			$database_array['plank_type'] = $_POST['plank-type'];
		}

		if ( array_key_exists( 'plank-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'plank-sets',
				$_POST['plank-sets']
			);

			$database_array['plank_sets'] = $_POST['plank-sets'];
		}


		if ( array_key_exists( 'plank-length', $_POST ) ) {
			update_post_meta(
				$post_id,
				'plank-length',
				$_POST['plank-length']
			);

			$database_array['plank_length'] = $_POST['plank-length'];
		}

		if ( array_key_exists( 'plank-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'plank-weight',
				$_POST['plank-weight']
			);

			$database_array['plank_weight'] = $_POST['plank-weight'];
		}

		if ( array_key_exists( 'deadlift-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'deadlift-sets',
				$_POST['deadlift-sets']
			);

			$database_array['deadlift_sets'] = $_POST['deadlift-sets'];
		}

		if ( array_key_exists( 'deadlift-set-number', $_POST ) ) {
			update_post_meta(
				$post_id,
				'deadlift-set-number',
				$_POST['deadlift-set-number']
			);

			$database_array['deadlift_number'] = $_POST['deadlift-set-number'];
		}

		if ( array_key_exists( 'deadlift-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'deadlift-weight',
				$_POST['deadlift-weight']
			);

			$database_array['deadlift_weight'] = $_POST['deadlift-weight'];
		}

		if ( array_key_exists( 'squat-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'squat-sets',
				$_POST['squat-sets']
			);

			$database_array['squat_sets'] = $_POST['squat-sets'];
		}

		if ( array_key_exists( 'squat-set-number', $_POST ) ) {
			update_post_meta(
				$post_id,
				'squat-set-number',
				$_POST['squat-set-number']
			);

			$database_array['squat_number'] = $_POST['squat-set-number'];
		}

		if ( array_key_exists( 'squat-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'squat-weight',
				$_POST['squat-weight']
			);

			$database_array['squat_weight'] = $_POST['squat-weight'];
		}

		if ( array_key_exists( 'jumping-jack-sets', $_POST ) ) {
			update_post_meta(
				$post_id,
				'jumping-jack-sets',
				$_POST['jumping-jack-sets']
			);

			$database_array['jumping_jack_sets'] = $_POST['jumping-jack-sets'];
		}

		if ( array_key_exists( 'jumping-jack-set-number', $_POST ) ) {
			update_post_meta(
				$post_id,
				'jumping-jack-set-number',
				$_POST['jumping-jack-set-number']
			);

			$database_array['jumping_jack_number'] = $_POST['jumping-jack-set-number'];
		}

		if ( array_key_exists( 'jumping-jack-weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'jumping-jack-weight',
				$_POST['jumping-jack-weight']
			);

			$database_array['jumping_jack_weight'] = $_POST['jumping-jack-weight'];
		}

		if ( array_key_exists( 'date', $_POST ) ) {

			global $wpdb;
			$workoutDataTableName = "{$wpdb->prefix}rb_workout_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$workoutDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($workoutDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($workoutDataTableName, $database_array, [
					'ID' => $recordId
				]);
			}

		}

	}
}


function delete_workout_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'workout') { 

		global $wpdb;
		$workoutDataTableName = "{$wpdb->prefix}rb_workout_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$workoutDataTableName} where post_id=%d", $postID
			)
		);
	}
}