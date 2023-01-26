<?php 

function rb_supplement_post_type() {
	$labels = array(
		'name'                  => _x( 'Supplements', 'Post type general name', 'running-blog' ),
		'singular_name'         => _x( 'Supplement', 'Post type singular name', 'running-blog' ),
		'menu_name'             => _x( 'Supplements', 'Admin Menu text', 'running-blog' ),
		'name_admin_bar'        => _x( 'Supplement', 'Add New on Toolbar', 'running-blog' ),
		'add_new'               => __( 'Add New', 'running-blog' ),
		'add_new_item'          => __( 'Add New Supplement', 'running-blog' ),
		'new_item'              => __( 'New Supplement', 'running-blog' ),
		'edit_item'             => __( 'Edit Supplement', 'running-blog' ),
		'view_item'             => __( 'View Supplement', 'running-blog' ),
		'all_items'             => __( 'All Supplements', 'running-blog' ),
		'search_items'          => __( 'Search Supplements', 'running-blog' ),
		'parent_item_colon'     => __( 'Parent Supplements:', 'running-blog' ),
		'not_found'             => __( 'No Supplements found.', 'running-blog' ),
		'not_found_in_trash'    => __( 'No Supplements found in Trash.', 'running-blog' ),
		'featured_image'        => _x( 'Supplement Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Supplement archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Supplement', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Supplement', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Supplements list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Supplements list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Supplements list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true, // ?review=pizza
		'rewrite'            => array( 'slug' => 'supplement' ), // /review/pizza
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'author', 'custom-fields' ),  
		'show_in_rest'			 => true, // enables guttenberg editor
		'description' 			 => __('A custom post type for Workouts', 'running-blog'),
		'taxonomies'				 => ['category', 'post_tag']
	);

	register_post_type( 'supplement', $args );
}

function supplement_add_meta_boxes() {
	add_meta_box(
		'supplement-data', // Unique ID for meta box
		'The Supplement Data', // Box Title
		'rb_custom_supplement_fields_cb', // render callback
		'supplement', // the post type, obviously 'meail' here 
		'advanced',
		'high'
	);
}

function rb_custom_supplement_fields_cb($post) {
	$date = get_post_meta( $post->ID, 'date', true );

	$vitamin_mix = get_post_meta( $post->ID, 'vitamin-mix', true );
	$creatine = get_post_meta( $post->ID, 'creatine', true );
	$beta_alaninie = get_post_meta( $post->ID, 'beta-alanine', true );
	$betaine_anhydrous = get_post_meta( $post->ID, 'betaine-anhydrous', true );

	$potassium = get_post_meta( $post->ID, 'potassium', true );
	$vitamin_k_d3 = get_post_meta( $post->ID, 'vitamin-k-d3', true );
	$iron = get_post_meta( $post->ID, 'iron', true );
	$calcium_magnesium = get_post_meta( $post->ID, 'calcium-magnesium', true );

	$omega_3 = get_post_meta( $post->ID, 'omega-3', true );
	$joint_support_mix = get_post_meta( $post->ID, 'joint-support-mix', true );
	$collegen = get_post_meta( $post->ID, 'collegen', true );
	$probiotic = get_post_meta( $post->ID, 'probiotic', true );

	$tumeric = get_post_meta( $post->ID, 'tumeric', true );
	$berberine = get_post_meta( $post->ID, 'berberine', true );
	$CoQ_10 = get_post_meta( $post->ID, 'CoQ-10', true );
	$pomegranite_extract = get_post_meta( $post->ID, 'pomegranite-extract', true );

	$L_Tyrosine = get_post_meta( $post->ID, 'L-Tyrosine', true );
	$L_Theanine = get_post_meta( $post->ID, 'L-Theanine', true );
	$five_HTP = get_post_meta( $post->ID, '5-HTP', true );
	$nac = get_post_meta( $post->ID, 'nac', true );

	$nmn = get_post_meta( $post->ID, 'nmn', true );
	$resveratrol = get_post_meta( $post->ID, 'resveratrol', true );
	$olive_oil = get_post_meta( $post->ID, 'olive-oil', true );
	$fisetin_quercetin = get_post_meta( $post->ID, 'fisetin-quercetin', true );


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
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="vitamin-mix" 
					name="vitamin-mix" 
					<?php echo $vitamin_mix ? $vitamin_mix === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="vitamin-mix">Vitamin Mix</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="creatine"
					name="creatine" 
					<?php echo $creatine ? $creatine === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="creatine">Creatine</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="beta-alanine" 
					name="beta-alanine" 
					<?php echo $beta_alaninie ? $beta_alaninie === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="beta-alanine">Beta Alanine</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="betaine-anhydrous" 
					name="betaine-anhydrous" 
					<?php echo $betaine_anhydrous ? $betaine_anhydrous === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="betaine-anhydrous">Betaine Anhydrous</label>
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="potassium" 
					name="potassium" 
					<?php echo $potassium ? $potassium === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="potassium">Potassium</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="vitamin-k-d3" 
					name="vitamin-k-d3" 
					<?php echo $vitamin_k_d3 ? $vitamin_k_d3 === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="vitamin-k-d3">Vitamin K + d3</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="iron" 
					name="iron" 
					<?php echo $iron ? $iron === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="iron">Iron</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="calcium-magnesium" 
					name="calcium-magnesium" 
					<?php echo $calcium_magnesium ? $calcium_magnesium === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="calcium-magnesium">Calcium & Magnesium</label>
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="omega-3" 
					name="omega-3" 
					<?php echo $omega_3 ? $omega_3 === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="omega-3">Omega 3</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="joint-support-mix" 
					name="joint-support-mix" 
					<?php echo $joint_support_mix ? $joint_support_mix === 'off' ? '' : 'checked' : 'checked'  ?>
				>
				<label for="joint-support-mix">Joint Support Mix</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="collegen" 
					name="collegen"
					<?php echo $collegen ? $collegen === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="collegen">Collegen</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="probiotic" 
					name="probiotic" 
					<?php echo $probiotic ? $probiotic === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="probiotic">Probiotic</label>
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="tumeric" 
					name="tumeric" 
					<?php echo $tumeric ? $tumeric === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="tumeric">Tumeric</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="berberine" 
					name="berberine" 
					value="on"
					<?php echo $berberine ? $berberine === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="berberine">Berberine</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="CoQ-10" 
					name="CoQ-10" 
					<?php echo $CoQ_10 ? $CoQ_10 === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="CoQ-10">CoQ-10</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="pomegranite-extract" 
					name="pomegranite-extract" 
					<?php echo $pomegranite_extract ? $pomegranite_extract === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="pomegranite-extract">Pomegranite Extract</label>
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="L-Tyrosine" 
					name="L-Tyrosine" 
					<?php echo $L_Tyrosine ? $L_Tyrosine === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="L-Tyrosine">L-Tyrosine</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="L-Theanine" 
					name="L-Theanine" 
					<?php echo $L_Theanine ? $L_Theanine === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="L-Theanine">L-Theanine</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="5-HTP" 
					name="5-HTP" 
					<?php echo $five_HTP ? $five_HTP === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="5-HTP">5-HTP</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="nac" 
					name="nac" 
					<?php echo $nac ? $nac === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="nac">NAC</label>
			</div>
		</div>
		<div class="rb-post-meta-row-checkboxes">
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="nmn" 
					name="nmn" 
					<?php echo $nmn ? $nmn === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="nmn">NMN</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="resveratrol" 
					name="resveratrol" 
					<?php echo $resveratrol ? $resveratrol === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="resveratrol">Resveratrol</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="olive-oil" 
					name="olive-oil" 
					<?php echo $olive_oil ? $olive_oil === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="olive-oil">Olive Oil</label>
			</div>
			<div class="rb-post-meta-wrapper small">
				<input 
					type="checkbox" 
					id="fisetin-quercetin" 
					name="fisetin-quercetin" 
					<?php echo $fisetin_quercetin ? $fisetin_quercetin === 'off' ? '' : 'checked' : 'checked'  ?> 
				>
				<label for="fisetin-quercetin">Fisetin Quercetin</label>
			</div>
		</div>

	<?php
}

function supplement_save_postdata($post_id) {

	if (get_post_type( $post_id ) === 'supplement') {

		$userID = get_current_user_id();
		$postID = absint($post_id);

		$supplement_date = null;

		$database_array = array(
			'post_id' => $postID,
			'user_id' => $userID
		);

		$options = get_option('rb_options');
		$daily_cost = 0;

		if ( array_key_exists( 'date', $_POST ) ) {
			update_post_meta(
				$post_id,
				'date',
				$_POST['date']
			);

			$supplement_date = date("Y-m-d H:i:s", strtotime($_POST['date']));
			$database_array['supplement_date'] = $supplement_date;
		}

		if ( array_key_exists( 'vitamin-mix', $_POST ) ) {
			update_post_meta(
				$post_id,
				'vitamin-mix',
				$_POST['vitamin-mix']
			);

			$database_array['vitamin_mix'] = 1;
			$daily_cost += floatval($options['vitamin-mix']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'vitamin-mix',
				'off'
			);

			$database_array['vitamin_mix'] = 0;
		}

		if ( array_key_exists( 'creatine', $_POST ) ) {
			update_post_meta(
				$post_id,
				'creatine',
				$_POST['creatine']
			);

			$database_array['creatine'] = 1;
			$daily_cost += floatval($options['creatine']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'creatine',
				'off'
			);

			$database_array['creatine'] = 0;
		}


		if ( array_key_exists( 'beta-alanine', $_POST ) ) {
			update_post_meta(
				$post_id,
				'beta-alanine',
				$_POST['beta-alanine']
			);

			$database_array['beta_alaninie'] = 1;
			$daily_cost += floatval($options['beta-alanine']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'beta-alanine',
				'off'
			);

			$database_array['beta_alaninie'] = 0;
		}

		if ( array_key_exists( 'betaine-anhydrous', $_POST ) ) {
			update_post_meta(
				$post_id,
				'betaine-anhydrous',
				$_POST['betaine-anhydrous']
			);

			$database_array['beta_anhydrous'] = 1;
			$daily_cost += floatval($options['betaine-anhydrous']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'betaine-anhydrous',
				'off'
			);

			$database_array['beta_anhydrous'] =0;
		}

			if ( array_key_exists( 'potassium', $_POST ) ) {
			update_post_meta(
				$post_id,
				'potassium',
				$_POST['potassium']
			);

			$database_array['potassium'] = 1;
			$daily_cost += floatval($options['potassium']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'potassium',
				'off'
			);

			$database_array['potassium'] = 0;
		}

		if ( array_key_exists( 'vitamin-k-d3', $_POST ) ) {
			update_post_meta(
				$post_id,
				'vitamin-k-d3',
				$_POST['vitamin-k-d3']
			);

			$database_array['vitamin_k_d3'] = 1;
			$daily_cost += floatval($options['vitamin-k-d3']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'vitamin-k-d3',
				'off'
			);

			$database_array['vitamin_k_d3'] = 0;
		}

		if ( array_key_exists( 'iron', $_POST ) ) {
			update_post_meta(
				$post_id,
				'iron',
				$_POST['iron']
			);

			$database_array['iron'] = 1;
			$daily_cost += floatval($options['iron']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'iron',
				'off'
			);

			$database_array['iron'] = 0;
		}

		if ( array_key_exists( 'calcium-magnesium', $_POST ) ) {
			update_post_meta(
				$post_id,
				'calcium-magnesium',
				$_POST['calcium-magnesium']
			);

			$database_array['calcium_magnesium'] = 1;
			$daily_cost += floatval($options['calcium-magnesium']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'calcium-magnesium',
				'off'
			);

			$database_array['calcium_magnesium'] = 0;
		}


		if ( array_key_exists( 'omega-3', $_POST ) ) {
			update_post_meta(
				$post_id,
				'omega-3',
				$_POST['omega-3']
			);

			$database_array['omega_3'] = 1;
			$daily_cost += floatval($options['omega-3']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'omega-3',
				'off'
			);

			$database_array['omega_3'] = 0;
		}

		if ( array_key_exists( 'joint-support-mix', $_POST ) ) {
			update_post_meta(
				$post_id,
				'joint-support-mix',
				$_POST['joint-support-mix']
			);

			$database_array['joint_support_mix'] = 1;
			$daily_cost += floatval($options['joint-support-mix']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'joint-support-mix',
				'off'
			);

			$database_array['joint_support_mix'] = 0;
		}

		if ( array_key_exists( 'collegen', $_POST ) ) {
			update_post_meta(
				$post_id,
				'collegen',
				$_POST['collegen']
			);

			$database_array['collegen'] = 1;
			$daily_cost += floatval($options['collegen']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'collegen',
				'off'
			);

			$database_array['collegen'] = 0;
		}

		if ( array_key_exists( 'probiotic', $_POST ) ) {
			update_post_meta(
				$post_id,
				'probiotic',
				$_POST['probiotic']
			);

			$database_array['probiotic'] = 1;
			$daily_cost += floatval($options['probiotic']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'probiotic',
				'off'
			);

			$database_array['probiotic'] = 0;
		}

		if ( array_key_exists( 'tumeric', $_POST ) ) {
			update_post_meta(
				$post_id,
				'tumeric',
				$_POST['tumeric']
			);

			$database_array['tumeric'] = 1;
			$daily_cost += floatval($options['tumeric']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'tumeric',
				'off'
			);

			$database_array['tumeric'] = 0;
		}

		if ( array_key_exists( 'berberine', $_POST ) ) {
			update_post_meta(
				$post_id,
				'berberine',
				$_POST['berberine']
			);

			$database_array['berberine'] = 1;
			$daily_cost += floatval($options['berberine']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'berberine',
				'off'
			);

			$database_array['berberine'] = 0;
		}


		if ( array_key_exists( 'CoQ-10', $_POST ) ) {
			update_post_meta(
				$post_id,
				'CoQ-10',
				$_POST['CoQ-10']
			);

			$database_array['CoQ_10'] = 1;
			$daily_cost += floatval($options['CoQ-10']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'CoQ-10',
				'off'
			);

			$database_array['CoQ_10'] = 0;
		}

		if ( array_key_exists( 'pomegranite-extract', $_POST ) ) {
			update_post_meta(
				$post_id,
				'pomegranite-extract',
				$_POST['pomegranite-extract']
			);

			$database_array['pomegranite_extract'] = 1;
			$daily_cost += floatval($options['pomegranite-extract']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'pomegranite-extract',
				'off'
			);

			$database_array['pomegranite_extract'] = 0;
		}

		if ( array_key_exists( 'L-Tyrosine', $_POST ) ) {
			update_post_meta(
				$post_id,
				'L-Tyrosine',
				$_POST['L-Tyrosine']
			);

			$database_array['L_Tyrosine'] = 1;
			$daily_cost += floatval($options['L-Tyrosine']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'L-Tyrosine',
				'off'
			);

			$database_array['L_Tyrosine'] = 0;
		}

		if ( array_key_exists( 'L-Theanine', $_POST ) ) {
			update_post_meta(
				$post_id,
				'L-Theanine',
				$_POST['L-Theanine']
			);

			$database_array['L_Theanine'] = 1;
			$daily_cost += floatval($options['L-Theanine']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'L-Theanine',
				'off'
			);

			$database_array['L_Theanine'] = 0;
		}

		if ( array_key_exists( '5-HTP', $_POST ) ) {
			update_post_meta(
				$post_id,
				'5-HTP',
				$_POST['5-HTP']
			);

			$database_array['five_HTP'] = 1;
			$daily_cost += floatval($options['5-HTP']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'5-HTP',
				'off'
			);

			$database_array['five_HTP'] = 0;
		}


		if ( array_key_exists( 'nac', $_POST ) ) {
			update_post_meta(
				$post_id,
				'nac',
				$_POST['nac']
			);

			$database_array['nac'] = 1;
			$daily_cost += floatval($options['nac']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'nac',
				'off'
			);

			$database_array['nac'] = 0;
		}

		if ( array_key_exists( 'nmn', $_POST ) ) {
			update_post_meta(
				$post_id,
				'nmn',
				$_POST['nmn']
			);

			$database_array['nmn'] = 1;
			$daily_cost += floatval($options['nmn']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'nmn',
				'off'
			);

			$database_array['nmn'] = 0;
		}

		if ( array_key_exists( 'resveratrol', $_POST ) ) {
			update_post_meta(
				$post_id,
				'resveratrol',
				$_POST['resveratrol']
			);

			$database_array['resveratrol'] = 1;
			$daily_cost += floatval($options['resveratrol']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'resveratrol',
				'off'
			);

			$database_array['resveratrol'] = 0;
		}

		if ( array_key_exists( 'olive-oil', $_POST ) ) {
			update_post_meta(
				$post_id,
				'olive-oil',
				$_POST['olive-oil']
			);

			$database_array['olive_oil'] = 1;
			$daily_cost += floatval($options['olive-oil']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'olive-oil',
				'off'
			);

			$database_array['olive_oil'] = 0;
		}

		if ( array_key_exists( 'fisetin-quercetin', $_POST ) ) {
			update_post_meta(
				$post_id,
				'fisetin-quercetin',
				$_POST['fisetin-quercetin']
			);

			$database_array['fisetin_quercetin'] = 1;
			$daily_cost += floatval($options['fisetin_quercetin']);

		} else if (!is_edit_page('new')) {
			update_post_meta(
				$post_id,
				'fisetin-quercetin',
				'off'
			);

			$database_array['fisetin_quercetin'] = 0;
		}

		$database_array['daily_cost'] = $daily_cost;

		// date 
		if ( array_key_exists( 'date', $_POST ) ) {
			global $wpdb;
			$supplimentDataTableName = "{$wpdb->prefix}rb_suppliment_data";

			$recordId = $wpdb->get_var($wpdb->prepare(
				"SELECT ID from {$supplimentDataTableName} WHERE post_id=%d", $post_id
			));

			if (!isset($recordId)) {
				// do an insert $_POST['date']
				$wpdb->insert($supplimentDataTableName, $database_array);

			} else {
				// do an update
				$wpdb->update($supplimentDataTableName, $database_array, [
					'ID' => $recordId
				]);
			} 
		}

	}

}


function delete_supplement_extra_data($post_id, $post) {
	$postID = absint($post_id);

	if (get_post_type( $post_id ) === 'supplement') { 

		global $wpdb;
		$supplementDataTableName = "{$wpdb->prefix}rb_supplement_data";

		// ok now delete
		$wpdb->query(
			$wpdb->prepare(
				"DELETE from {$supplementDataTableName} where post_id=%d", $postID
			)
		);

	}
}