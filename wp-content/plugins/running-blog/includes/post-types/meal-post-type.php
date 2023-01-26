<?php 


function rb_meal_post_type() {
	$labels = array(
		'name'                  => _x( 'Meals', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Meal', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Meals', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Meal', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Meal', 'running-blog' ),
		'new_item'              => __( 'New Meal', 'running-blog' ),
		'edit_item'             => __( 'Edit Meal', 'running-blog' ),
		'view_item'             => __( 'View Meal', 'running-blog' ),
		'all_items'             => __( 'All Meals', 'running-blog' ),
		'search_items'          => __( 'Search Meals', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Meals:', 'running-blog' ),
		'not_found'             => __( 'No Meals found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Meals found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Meal Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Meal archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Meal', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Meal', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Meals list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Meals list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Meals list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
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
		'show_in_rest'			 => true, // enables guttenberg editor  - but also enables post to show up in query loop block
		'description' 			 => __('A custom post type for meals', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'meal', $args );

	// register_post_meta('review','rating', [
	// 	'type' => 'number',
	// 	'description' => __('the rating for the review', 'running-blog'),
	// 	'single' => true,
	// 	'default' => 0,
	// 	'show_in_rest' => true 
	// ]);
}

function meals_add_meta_boxes() {
	add_meta_box(
		'meal-data', // Unique ID for meta box
		'The Meal Data', // Box Title
		'meal_custom_meal_fields_cb', // render callback
		'meal', // the post type, obviously 'meail' here 
		'advanced',
		'high'
	);
}

function meal_custom_meal_fields_cb($post) {

	$description = get_post_meta( $post->ID, 'description', true );
	$date = get_post_meta( $post->ID, 'date', true );

	$meal_type = get_post_meta( $post->ID, 'meal-type', true );
	$meal_time_of_day = get_post_meta( $post->ID, 'meal-time-of-day', true );
	$calories = get_post_meta( $post->ID, 'calories', true );

	$protein = get_post_meta( $post->ID, 'protein', true );
	$fat = get_post_meta( $post->ID, 'fat', true );
	$carbs = get_post_meta( $post->ID, 'carbs', true );
	$fiber = get_post_meta( $post->ID, 'fiber', true );

	$sugar = get_post_meta( $post->ID, 'sugar', true );
	$salt = get_post_meta( $post->ID, 'salt', true );

	?>
		<div id="meal-textarea-wrapper">
			<label for="description">Meal Description</label>
			<textarea id="description" name="description" rows="4" placeholder="The Meal Description"><?php print $description ? $description : ''; ?></textarea>
		</div> 
		
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="meal-type">Meal Type</label>
				<select name="meal-type" id="meal-type" class="postbox">
					<option value="">Select something...</option>
					<option value="breakfast" <?php selected( $meal_type, 'breakfast' ); ?>>Breakfast</option>
					<option value="lunch" <?php selected( $meal_type, 'lunch' ); ?>>Lunch</option>
					<option value="dinner" <?php selected( $meal_type, 'dinner' ); ?>>Dinner</option>
					<option value="desert" <?php selected( $meal_type, 'desert' ); ?>>Desert</option>
					<option value="brunch" <?php selected( $meal_type, 'brunch' ); ?>>Brunch</option>
					<option value="snack" <?php selected( $meal_type, 'snack' ); ?>>Snack</option> 
					<option value="snack_2" <?php selected( $meal_type, 'snack_2' ); ?>>Snack 2</option> 
					<option value="snack_3" <?php selected( $meal_type, 'snack_3' ); ?>>Snack 3</option> 
					<option value="snack_4" <?php selected( $meal_type, 'snack_4' ); ?>>Snack 4</option> 
					<option value="snack_5" <?php selected( $meal_type, 'snack_5' ); ?>>Snack 5</option> 
					<option value="snack_6" <?php selected( $meal_type, 'snack_6' ); ?>>Snack 6</option> 
					<option value="snack_7" <?php selected( $meal_type, 'snack_7' ); ?>>Snack 7</option> 
					<option value="snack_8" <?php selected( $meal_type, 'snack_8' ); ?>>Snack 8</option> 
					<option value="snack_9" <?php selected( $meal_type, 'snack_9' ); ?>>Snack 9</option> 
				</select>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="date">Date</label>
				<input 
					type="date" 
					id="date" 
					name="date" 
					value="<?php print $date ? $date : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="meal-time-of-day">Time of Day</label>
				<input 
					type="time" 
					id="meal-time-of-day" 
					name="meal-time-of-day"  
					value="<?php print $meal_time_of_day ? $meal_time_of_day : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="calories">Est. Calories</label>
				<input 
					type="number" 
					id="calories" 
					name="calories" 
					placeholder="0"  
					value="<?php print $calories ? $calories : ""; ?>" 
				/>
			</div>
		</div>

		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="protein">Est. Protein (g)</label>
				<input 
					type="number" 
					id="protein" 
					name="protein" 
					placeholder="0"  
					value="<?php print $protein ? $protein : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="fat">Est. Fat (g)</label>
				<input 
					type="number" 
					id="fat" 
					name="fat" 
					placeholder="0"  
					value="<?php print $fat ? $fat : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="carbs">Est. Carbs (g)</label>
				<input 
					type="number" 
					id="carbs" 
					name="carbs" 
					placeholder="0"  
					value="<?php print $carbs ? $carbs : ""; ?>" 
				/>
			</div>

			<div class="rb-post-meta-wrapper small">
				<label for="fiber">Est. Fiber (g)</label>
				<input 
					type="number" 
					id="fiber" 
					name="fiber" 
					placeholder="0" 
					value="<?php print $fiber ? $fiber : ""; ?>"  
				/>
			</div>
		</div>

		<div class="rb-post-meta-row">
			<div class="rb-align-left">
				<div class="rb-post-meta-wrapper small">
					<label for="sugar">Est Sugar (g)</label>
					<input 
						type="number" 
						id="sugar" 
						name="sugar" 
						placeholder="0"  
						value="<?php print $sugar ? $sugar : ""; ?>"
					/>
				</div>

				<div class="rb-post-meta-wrapper small">
					<label for="salt">Est. Salt (mg)</label>
					<input 
						type="number" 
						id="salt" 
						name="salt" 
						placeholder="0"  
						value="<?php print $salt ? $salt : ""; ?>"
					/>
				</div>
			</div>
		</div>

	<?php
}

// protien fats carbs fiber
// sugar salt

function meals_save_postdata($post_id) {

	if (get_post_type( $post_id ) === 'meal') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$meal_date = null;
		$meal_type = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		if ( array_key_exists( 'description', $_POST ) ) {
			update_post_meta(
				$post_id,
				'description',
				$_POST['description']
			);
		}

		if ( array_key_exists( 'date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'date',
				$_POST['date']
			);

			$meal_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
			$database_array['meal_date'] = $meal_date;
		}

		if ( array_key_exists( 'meal-type', $_POST ) ) {
			update_post_meta(
				$post_id,
				'meal-type',
				$_POST['meal-type']
			);

			$database_array['meal_type'] = $_POST['meal-type'];
			$meal_type = $_POST['meal-type'];
		}

		if ( array_key_exists( 'meal-time-of-day', $_POST ) ) {
			update_post_meta(
				$post_id,
				'meal-time-of-day',
				$_POST['meal-time-of-day']
			);

			$database_array['meal_time_of_day'] = $_POST['meal-time-of-day'];
		}

		if ( array_key_exists( 'calories', $_POST ) ) {
			update_post_meta(
				$post_id,
				'calories',
				$_POST['calories']
			);

			$database_array['calories'] = $_POST['calories'];
		}

		if ( array_key_exists( 'protein', $_POST ) ) {
			update_post_meta(
				$post_id,
				'protein',
				$_POST['protein']
			);

			$database_array['protein'] = $_POST['protein'];
		}

		if ( array_key_exists( 'fat', $_POST ) ) {
			update_post_meta(
				$post_id,
				'fat',
				$_POST['fat']
			);

			$database_array['fat'] = $_POST['fat'];
		}

		if ( array_key_exists( 'carbs', $_POST ) ) {
			update_post_meta(
				$post_id,
				'carbs',
				$_POST['carbs']
			);

			$database_array['carbs'] = $_POST['carbs'];
		}

		if ( array_key_exists( 'fiber', $_POST ) ) {
			update_post_meta(
				$post_id,
				'fiber',
				$_POST['fiber']
			);

			$database_array['fiber'] = $_POST['fiber'];
		}

		if ( array_key_exists( 'sugar', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sugar',
				$_POST['sugar']
			);

			$database_array['sugar'] = $_POST['sugar'];
		}

		if ( array_key_exists( 'salt', $_POST ) ) {
			update_post_meta(
				$post_id,
				'salt',
				$_POST['salt']
			);

			$database_array['salt'] = $_POST['salt'];
		}

		// refresshing the 'add new' page runs this hook, so make sure date exists
		if ( array_key_exists( 'date', $_POST ) ) {

			global $wpdb;
			$mealDataTableName = "{$wpdb->prefix}rb_meal_data";

			// $recordId = $wpdb->get_var($wpdb->prepare(
			// 	"SELECT ID from {$mealDataTableName} WHERE meal_date=%s AND meal_type=%s", $meal_date, $meal_type
			// ));

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$mealDataTableName} WHERE post_id=%s", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($mealDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($mealDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 

		
			// ok now that the meal is saved.. now we must get ALL the calories and macros and prepare
			// to update the meta database table
			$meals = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID, calories, protein, fat, carbs, fiber, sugar, salt
					from {$mealDataTableName} WHERE meal_date=%s", $meal_date
				)
			);

			$total_calories = 0;
			$total_protien = 0;
			$total_carbs = 0;
			$total_fiber = 0;
			$total_sugar = 0;
			$total_salt = 0;
			$total_fat = 0;


			foreach ( $meals as $meal ) {
				$total_calories = $total_calories + intval($meal->calories);
				$total_protien = $total_protien + intval($meal->protein);
				$total_carbs = $total_carbs + intval($meal->carbs);
				$total_fiber = $total_fiber + intval($meal->fiber);
				$total_sugar = $total_sugar + intval($meal->sugar);
				$total_salt = $total_salt + intval($meal->salt);
				$total_fat = $total_fat + intval($meal->fat);
			}

			$meta_database_array = array(
				'post_id' => $postID,
				'user_id' => $userID
			);

			// ok. Now look up meta for this date

			$metaDataTableName = "{$wpdb->prefix}rb_meta_data";

			$metaId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$metaDataTableName} WHERE meta_date=%s", $meal_date
			));

			// if no meta data, make a meta post
			// the meta post is already saved with $_POST['date'] since that's the $_POST key it uses
			// to save it's own data and the save function runs.. so both will get the $_POST['date']!!
			// https://wordpress.stackexchange.com/questions/77201/programmatically-publish-a-post-custom-post-type-with-custom-fields
			
			if (!isset($metaId)) {
				// Hmm.. theyre MAY be a case where there's a meta post
				// but no database table .. but I don't really expect this to happen often
				// in actual useage.. 
				if ($_POST['date']) {
					$new_meta_post_id = wp_insert_post(array (
						'post_title' => $_POST['date'] . ' Meta',
						'post_type' => 'meta',
						'post_status' => 'publish',
					), false, false);

					update_post_meta( $new_meta_post_id, 'meta_date', $meal_date );

					// NOW  try to get get the meta ID again, it should exist
					$metaId = $wpdb->get_var($wpdb->prepare(
						"SELECT ID from {$metaDataTableName} WHERE meta_date=%s", $meal_date
					));
				}
			} 

			$wpdb->update($metaDataTableName, [
				'total_calories' => $total_calories,
				'total_protien' => $total_protien,
				'total_carbs' => $total_carbs,
				'total_fiber' => $total_fiber,
				'total_sugar' => $total_sugar,
				'total_salt' => $total_salt,
				'total_fat' => $total_fat
			], [
				'ID' => $metaId
			]); 
			
		} // end saving the meal and meta table
	}
}

function delete_meal_extra_data($post_id, $post) {
	// delete the meal from the database.. but also have to re-total the meta totals.. but pretty easy
	// just copy from what works in the save postdata function

	// first get the data
	$postID = absint($post_id); // not sure this is necessary

	if (get_post_type( $post_id ) === 'meal') {

		$meal_date_custom_field = get_post_meta( $post->ID, 'date', true );

		$meal_date = date("Y-m-d H:i:s", strtotime($meal_date_custom_field));

		global $wpdb;
		$mealDataTableName = "{$wpdb->prefix}rb_meal_data";

		// ok let's get meal date ANOTHER way
		$new_meal_date = $wpdb->get_var($wpdb->prepare(
			"SELECT meal_date from {$mealDataTableName} WHERE post_id=%d", $post_id
		));
		
		// ok now delete
		
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$mealDataTableName} where post_id=%d", $postID
			)
		);

		// finally update the meta 
		// re-add everything up
		$meals = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT ID, calories, protein, fat, carbs, fiber, sugar, salt
				from {$mealDataTableName} WHERE meal_date=%s", $new_meal_date
			)
		);
 
		$total_calories = 0;
		$total_protien = 0;
		$total_carbs = 0;
		$total_fiber = 0;
		$total_sugar = 0;
		$total_salt = 0;
		$total_fat = 0;

		foreach ( $meals as $meal ) {
			$total_calories = $total_calories + intval($meal->calories);
			$total_protien = $total_protien + intval($meal->protein);
			$total_carbs = $total_carbs + intval($meal->carbs);
			$total_fiber = $total_fiber + intval($meal->fiber);
			$total_sugar = $total_sugar + intval($meal->sugar);
			$total_salt = $total_salt + intval($meal->salt);
			$total_fat = $total_fat + intval($meal->fat);
		}

		$metaDataTableName = "{$wpdb->prefix}rb_meta_data";

		$wpdb->update($metaDataTableName, [
			'total_calories' => $total_calories,
			'total_protien' => $total_protien,
			'total_carbs' => $total_carbs,
			'total_fiber' => $total_fiber,
			'total_sugar' => $total_sugar,
			'total_salt' => $total_salt,
			'total_fat' => $total_fat
		], [
			'meta_date' => $new_meal_date
		]); 
	}

}