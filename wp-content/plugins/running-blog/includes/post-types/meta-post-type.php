<?php 

function rb_meta_post_type() {
	$labels = array(
		'name'                  => _x( 'Meta', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Meta', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Meta', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Meta', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Meta', 'running-blog' ),
		'new_item'              => __( 'New Meta', 'running-blog' ),
		'edit_item'             => __( 'Edit Meta', 'running-blog' ),
		'view_item'             => __( 'View Meta', 'running-blog' ),
		'all_items'             => __( 'All Meta', 'running-blog' ),
		'search_items'          => __( 'Search Meta', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Meta:', 'running-blog' ),
		'not_found'             => __( 'No Meta found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Meta found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Meta Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Meta archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Meta', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Meta', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Meta list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Meta list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Meta list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'meta' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'custom-fields' ),  
		'show_in_rest'			 => true, // enables guttenberg editor
		'description' 			 => __('A custom post type for Meta posts', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'meta', $args );
}

function meta_add_meta_boxes($post) {
	add_meta_box(
		'meta-data', // Unique ID for meta box
		'The Meta Data', // Box Title
		'meta_custom_meal_fields_cb', // render callback
		'meta', // the post type, obviously 'meta' here 
		'advanced',
		'high'
	);
}

function meta_custom_meal_fields_cb($post) {
	$date = get_post_meta( $post->ID, 'date', true );
	$fast = get_post_meta( $post->ID, 'is-fast', true );

	$body_fat = get_post_meta( $post->ID, 'body-fat', true );
	$bmi = get_post_meta( $post->ID, 'bmi', true );
	$body_water = get_post_meta( $post->ID, 'body-water', true );
	$bone_density = get_post_meta( $post->ID, 'bone-density', true );

	$knee_pain = get_post_meta( $post->ID, 'knee-pain', true );
	$sholder_pain = get_post_meta( $post->ID, 'sholder-pain', true );
	$energy = get_post_meta( $post->ID, 'energy', true );
	$time_awake = get_post_meta( $post->ID, 'time-awake', true );

	$sleeping_hr = get_post_meta( $post->ID, 'sleeping-hr', true );
	$sleeping_O2 = get_post_meta( $post->ID, 'sleeping-O2', true );
	$weight = get_post_meta( $post->ID, 'weight', true );
	$got_stuff_done = get_post_meta( $post->ID, 'got-stuff-done', true );

	$cups_of_coffee = get_post_meta( $post->ID, 'cups-of-coffee', true );

	?>
		<div class="rb-post-meta-row">
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
			<div class="rb-post-meta-wrapper small single-checkbox">
				<input 
					type="checkbox" 
					id="is-fast" 
					name="is-fast"  
					<?php checked($fast, 'on', true) ?>
				>
				<label for="is-fast">Is a fast</label>
			</div>
	
		</div>

		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="body-fat">Body Fat</label>
				<input 
					type="number" 
					id="body-fat" 
					name="body-fat" 
					min="0"
					max="100"
					step="0.01"
					value="<?php print $body_fat ? $body_fat : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="bmi">BMI</label>
				<input 
					type="number" 
					id="bmi" 
					name="bmi" 
					min="0"
					max="100"
					step="0.01"
					value="<?php print $bmi ? $bmi : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="body-water">Body Water</label>
				<input 
					type="number" 
					id="body-water" 
					name="body-water" 
					min="0"
					max="100"
					step="0.01"
					value="<?php print $body_water ? $body_water : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="bone-density">Bone Density</label>
				<input 
					type="number" 
					id="bone-density" 
					name="bone-density" 
					min="0"
					max="100"
					step="0.01"
					value="<?php print $bone_density ? $bone_density : ""; ?>"   
				/>
			</div>
		</div>

		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="knee-pain">Knee Pain</label>
				<input 
					type="number" 
					id="knee-pain" 
					name="knee-pain" 
					min="0"
					max="10"
					value="<?php print $knee_pain ? $knee_pain : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="sholder-pain">Sholder Pain</label>
				<input 
					type="number" 
					id="sholder-pain" 
					name="sholder-pain" 
					min="0"
					max="10"
					value="<?php print $sholder_pain ? $sholder_pain : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="energy">Energy</label>
				<input 
					type="number" 
					id="energy" 
					name="energy" 
					min="0"
					max="10"
					value="<?php print $energy ? $energy : ""; ?>"   
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="time-awake">Time Awake (hrs)</label>
				<input 
					type="number" 
					id="time-awake" 
					name="time-awake" 
					min="0"
					max="24"
					value="<?php print $time_awake ? $time_awake : ""; ?>"   
				/>
			</div>
		</div>
		
		<div class="rb-post-meta-row">
			<div class="rb-align-left">
				<div class="rb-post-meta-wrapper small">
					<label for="weight">Weight (lbs)</label>
					<input 
						type="number" 
						id="weight" 
						name="weight" 
						placeholder="0"  
						value="<?php print $weight ? $weight : ""; ?>" 
					/>
				</div>
				<div class="rb-post-meta-wrapper small">
					<label for="got-stuff-done">Got stuff Done</label>
					<input 
						type="number" 
						id="got-stuff-done" 
						name="got-stuff-done" 
						placeholder="0"  
						value="<?php print $got_stuff_done ? $got_stuff_done : ""; ?>" 
					/>
				</div>
				<div class="rb-post-meta-wrapper small">
					<label for="cups-of-coffee">Cups of Coffee</label>
					<input 
						type="number" 
						id="cups-of-coffee" 
						name="cups-of-coffee" 
						placeholder="0"  
						value="<?php print $cups_of_coffee ? $cups_of_coffee : ""; ?>" 
					/>
				</div>
			</div>
		</div>
	<?php
}

function meta_data_save_postdata($post_id) {
 
	if (get_post_type( $post_id ) === 'meta') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$meta_date = null;

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

			$meta_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
			$database_array['meta_date'] = $meta_date;
		}

		if (get_post_type( $post_id ) === 'meta') {
			if ( array_key_exists( 'is-fast', $_POST ) ) {
				update_post_meta(
					$post_id,
					'is-fast',
					$_POST['is-fast']
				);

				$database_array['is_fast'] = 1;
			} else {
				update_post_meta(
					$post_id,
					'is-fast',
					''
				);

				$database_array['is_fast'] = 0;
			}
		}


		if ( array_key_exists( 'body-fat', $_POST ) ) {
			update_post_meta(
				$post_id,
				'body-fat',
				$_POST['body-fat']
			);

			$database_array['body_fat'] = $_POST['body-fat'];
		}
		

		if ( array_key_exists( 'bmi', $_POST ) ) {
			update_post_meta(
				$post_id,
				'bmi',
				$_POST['bmi']
			);

			$database_array['bmi'] = $_POST['bmi'];
		}

		if ( array_key_exists( 'body-water', $_POST ) ) {
			update_post_meta(
				$post_id,
				'body-water',
				$_POST['body-water']
			);

			$database_array['body_water'] = $_POST['body-water'];
		}

		if ( array_key_exists( 'bone-density', $_POST ) ) {
			update_post_meta(
				$post_id,
				'bone-density',
				$_POST['bone-density']
			);

			$database_array['bone_density'] = $_POST['bone-density'];
		}

		if ( array_key_exists( 'knee-pain', $_POST ) ) {
			update_post_meta(
				$post_id,
				'knee-pain',
				$_POST['knee-pain']
			);

			$database_array['knee_pain'] = $_POST['knee-pain'];
		}
		
		if ( array_key_exists( 'sholder-pain', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sholder-pain',
				$_POST['sholder-pain']
			);

			$database_array['sholder_pain'] = $_POST['sholder-pain'];
		}

		if ( array_key_exists( 'energy', $_POST ) ) {
			update_post_meta(
				$post_id,
				'energy',
				$_POST['energy']
			);

			$database_array['energy'] = $_POST['energy'];
		}

		if ( array_key_exists( 'time-awake', $_POST ) ) {
			update_post_meta(
				$post_id,
				'time-awake',
				$_POST['time-awake']
			);

			$database_array['time_awake'] = $_POST['time-awake'];
		}


		if ( array_key_exists( 'weight', $_POST ) ) {
			update_post_meta(
				$post_id,
				'weight',
				$_POST['weight']
			);

			$database_array['body_weight'] = $_POST['weight'];
		}

		if ( array_key_exists( 'got-stuff-done', $_POST ) ) {
			update_post_meta(
				$post_id,
				'got-stuff-done',
				$_POST['got-stuff-done']
			);

			$database_array['got_stuff_done'] = $_POST['got-stuff-done'];
		}

		if ( array_key_exists( 'cups-of-coffee', $_POST ) ) {
			update_post_meta(
				$post_id,
				'cups-of-coffee',
				$_POST['cups-of-coffee']
			);

			$database_array['cups_of_coffee'] = $_POST['cups-of-coffee'];
		}

		if ( array_key_exists( 'date', $_POST ) ) {

			global $wpdb;
			$metaDataTableName = "{$wpdb->prefix}rb_meta_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$metaDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($metaDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($metaDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 
		}

	}

}

function delete_meta_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'meta') { 

		global $wpdb;
		$metaDataTableName = "{$wpdb->prefix}rb_meta_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$metaDataTableName} where post_id=%d", $postID
			)
		);

	}
}