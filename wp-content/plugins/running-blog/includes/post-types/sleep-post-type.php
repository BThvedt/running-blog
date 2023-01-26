<?php 

function rb_sleep_data_post_type() {
	$labels = array(
		'name'                  => _x( 'Sleep Data', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Sleep Data', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Sleep Data', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Sleep Data', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Sleep Data', 'running-blog' ),
		'new_item'              => __( 'New Sleep Data', 'running-blog' ),
		'edit_item'             => __( 'Edit Sleep Data', 'running-blog' ),
		'view_item'             => __( 'View Sleep Data', 'running-blog' ),
		'all_items'             => __( 'All Sleep Datas', 'running-blog' ),
		'search_items'          => __( 'Search Sleep Datas', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Sleep Datas:', 'running-blog' ),
		'not_found'             => __( 'No Sleep Datas found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Sleep Datas found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Sleep Data Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Sleep Data archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Sleep Data', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Sleep Data', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Sleep Datas list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Sleep Datas list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Sleep Datas list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'sleep_data' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'custom-fields' ), 
		'show_in_rest'			 => false, // enables guttenberg editor
		'description' 			 => __('A custom post type for Sleep Data', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'sleep_data', $args );
}

function sleep_data_add_meta_boxes() {
	add_meta_box(
		'sleep-data', // Unique ID for meta box
		'The Sleep Data', // Box Title
		'rb_custom_sleep_data_fields_cb', // render callback
		'sleep_data', // the post type 
		'advanced',
		'high'
	);
}

function rb_custom_sleep_data_fields_cb($post) {

	$sleep_date = get_post_meta( $post->ID, 'sleep-date', true ); 
	$start_time = get_post_meta( $post->ID, 'start-time', true ); 
	$end_time = get_post_meta( $post->ID, 'end-time', true ); 

	$awake = get_post_meta( $post->ID, 'awake', true ); 
	$rem = get_post_meta( $post->ID, 'rem', true ); 
	$core = get_post_meta( $post->ID, 'core', true ); 
	$deep = get_post_meta( $post->ID, 'deep', true ); 

	$sleep_cycles = get_post_meta( $post->ID, 'sleep-cycles', true );
	$sleeping_hr = get_post_meta( $post->ID, 'sleeping_hr', true );
	$sleeping_o2 = get_post_meta( $post->ID, 'sleeping_o2', true );

	?>
		<div class="rb-post-meta-row">
			
			<div class="rb-post-meta-wrapper">
				<label for="sleep-date">Sleep Date</label>
				<input 
					type="date" 
					id="sleep-date" 
					name="sleep-date" 
					value="<?php print $sleep_date ? $sleep_date : ""; ?>" 
					required
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="start-time">Start Time</label>
				<input 
					type="time" 
					id="start-time" 
					name="start-time"   
					value="<?php print $start_time ? $start_time : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper">
				<label for="end-time">End Time</label>
				<input 
					type="time" 
					id="end-time" 
					name="end-time"   
					value="<?php print $end_time ? $end_time : ""; ?>" 
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-post-meta-wrapper small">
				<label for="awake">Awake</label>
				<input 
					type="number" 
					id="awake" 
					name="awake" 
					placeholder="0"  
					value="<?php print $awake ? $awake : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="rem">REM</label>
				<input 
					type="number" 
					id="rem" 
					name="rem" 
					placeholder="0"  
					value="<?php print $rem ? $rem : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="core">Core</label>
				<input 
					type="number" 
					id="core" 
					name="core" 
					placeholder="0"  
					value="<?php print $core ? $core : ""; ?>" 
				/>
			</div>
			<div class="rb-post-meta-wrapper small">
				<label for="deep">Deep</label>
				<input 
					type="number" 
					id="deep" 
					name="deep" 
					placeholder="0"  
					value="<?php print $deep ? $deep : ""; ?>" 
				/>
			</div>
		</div>
		<div class="rb-post-meta-row">
			<div class="rb-align-left">
			<div class="rb-post-meta-wrapper small">
					<label for="sleep-cycles">Sleep Cycles</label>
					<input 
						type="number" 
						id="sleep-cycles" 
						name="sleep-cycles" 
						placeholder="0"  
						value="<?php print $sleeping_hr ? $sleeping_hr : ""; ?>" 
					/>
				</div>
				<div class="rb-post-meta-wrapper small">
					<label for="sleeping_hr">Sleeping HR</label>
					<input 
						type="number" 
						id="sleeping_hr" 
						name="sleeping_hr" 
						placeholder="0"  
						value="<?php print $sleeping_hr ? $sleeping_hr : ""; ?>" 
					/>
				</div>
				<div class="rb-post-meta-wrapper small">
					<label for="sleeping_o2">Sleeping O2 levels</label>
					<input 
						type="number" 
						id="sleeping_o2" 
						name="sleeping_o2" 
						placeholder="0"  
						value="<?php print $sleeping_o2 ? $sleeping_o2 : ""; ?>" 
					/>
				</div>
			</div>
		</div>
	<?php
}

function sleep_data_save_postdata($post_id) {
	if (get_post_type( $post_id ) === 'sleep_data') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$race_date = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		if ( array_key_exists( 'sleep-date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sleep-date',
				$_POST['sleep-date']
			);

			$sleep_date = date("Y-m-d H:i:s", strtotime($_POST['sleep-date']));
			$database_array['sleep_date'] = $sleep_date;
		}

		if ( array_key_exists( 'start-time', $_POST ) ) {
			update_post_meta(
				$post_id,
				'start-time',
				$_POST['start-time']
			);
			$database_array['start_time'] = $_POST['start-time'];
		}
 

		if ( array_key_exists( 'end-time', $_POST ) ) {
			update_post_meta(
				$post_id,
				'end-time',
				$_POST['end-time']
			);

			$database_array['end_time'] = $_POST['end-time'];
		}

		if ( array_key_exists( 'awake', $_POST ) ) {
			update_post_meta(
				$post_id,
				'awake',
				$_POST['awake']
			);

			$database_array['awake'] = $_POST['awake'];
		}

		if ( array_key_exists( 'rem', $_POST ) ) {
			update_post_meta(
				$post_id,
				'rem',
				$_POST['rem']
			);

			$database_array['rem'] = $_POST['rem'];
		}

		if ( array_key_exists( 'core', $_POST ) ) {
			update_post_meta(
				$post_id,
				'core',
				$_POST['core']
			);

			$database_array['core'] = $_POST['core'];
		}

		if ( array_key_exists( 'deep', $_POST ) ) {
			update_post_meta(
				$post_id,
				'deep',
				$_POST['deep']
			);

			$database_array['deep'] = $_POST['deep'];
		}

		// sleep-cycles
		if ( array_key_exists( 'sleep-cycles', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sleep-cycles',
				$_POST['sleep-cycles']
			);

			$database_array['sleep_cycles'] = $_POST['sleep-cycles'];
		}

		if ( array_key_exists( 'sleeping_hr', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sleeping_hr',
				$_POST['sleeping_hr']
			);

			$database_array['sleeping_hr'] = $_POST['sleeping_hr'];
		}

		if ( array_key_exists( 'sleeping_o2', $_POST ) ) {
			update_post_meta(
				$post_id,
				'sleeping_o2',
				$_POST['sleeping_o2']
			);

			$database_array['sleeping_o2'] = $_POST['sleeping_o2'];
		}

		// sleep-date

		if ( array_key_exists( 'sleep-date', $_POST ) ) {

			global $wpdb;
			$sleepDataTableName = "{$wpdb->prefix}rb_sleep_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$sleepDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($sleepDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($sleepDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 
		}
	}

}

function delete_sleep_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'sleep_data') { 

		global $wpdb;
		$sleepDataTableName = "{$wpdb->prefix}rb_sleep_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$sleepDataTableName} where post_id=%d", $postID
			)
		);
	}
}