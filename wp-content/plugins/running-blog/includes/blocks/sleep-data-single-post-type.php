<?php 

function rb_sleep_data_single_post_display($atts, $content, $block) {

	$postID = get_the_ID(); 

	$post_meta = get_post_meta($postID);



	ob_start();

	?>
		<div class="mt-4" style="width:250px;">
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Start Time: </span>
				<span class="inline-block">
					<?php print isset($post_meta['start-time']) && isset($post_meta['start-time'][0]) ? $post_meta['start-time'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">End Time: </span>
				<span class="inline-block">
					<?php print isset($post_meta['end-time']) && isset($post_meta['end-time'][0]) ? $post_meta['end-time'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Awake: </span>
				<span class="inline-block">
					<?php print isset($post_meta['awake']) && isset($post_meta['awake'][0]) ? $post_meta['awake'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Rem: </span>
				<span class="inline-block">
					<?php print isset($post_meta['rem']) && isset($post_meta['rem'][0]) ? $post_meta['rem'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Core: </span>
				<span class="inline-block">
					<?php print isset($post_meta['core']) && isset($post_meta['core'][0]) ? $post_meta['core'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Deep: </span>
				<span class="inline-block">
					<?php print isset($post_meta['deep']) && isset($post_meta['deep'][0]) ? $post_meta['deep'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Sleeping Heartrate (avg): </span>
				<span class="inline-block">
					<?php print isset($post_meta['sleeping_hr']) && isset($post_meta['sleeping_hr'][0]) ? $post_meta['sleeping_hr'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Sleeping O2 (avg): </span>
				<span class="inline-block">
					<?php print isset($post_meta['sleeping_o2']) && isset($post_meta['sleeping_o2'][0]) ? $post_meta['sleeping_o2'][0] : ''; ?>
				</span>
			</p>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}