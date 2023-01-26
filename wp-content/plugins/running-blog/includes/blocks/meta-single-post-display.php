<?php 

function rb_meta_single_post_display() {

	$postID = get_the_ID(); 

	$post_meta = get_post_meta($postID);

	ob_start();

	?>
		<div class="mt-4" style="width:250px;">
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Date: </span>
				<span class="inline-block">
					<?php print isset($post_meta['date']) && isset($post_meta['date'][0]) ? $post_meta['date'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Is a Fast: </span>
				<span class="inline-block">
					<?php print isset($post_meta['is-fast']) && isset($post_meta['is-fast'][0]) ? $post_meta['is-fast'][0] : ''; ?>
				</span>
			</p><br/><br/>

			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Body Fat: </span>
				<span class="inline-block">
					<?php print isset($post_meta['body-fat']) && isset($post_meta['body-fat'][0]) ? $post_meta['body-fat'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">BMI: </span>
				<span class="inline-block">
					<?php print isset($post_meta['bmi']) && isset($post_meta['bmi'][0]) ? $post_meta['bmi'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Body Water: </span>
				<span class="inline-block">
					<?php print isset($post_meta['body-water']) && isset($post_meta['body-water'][0]) ? $post_meta['body-water'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Bone Density: </span>
				<span class="inline-block">
					<?php print isset($post_meta['bone-density']) && isset($post_meta['bone-density'][0]) ? $post_meta['bone-density'][0] : ''; ?> hrs
				</span>
			</p><br/><br/>

			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Knee Pain: </span>
				<span class="inline-block">
					<?php print isset($post_meta['knee-pain']) && isset($post_meta['knee-pain'][0]) ? $post_meta['knee-pain'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Sholder Pain: </span>
				<span class="inline-block">
					<?php print isset($post_meta['sholder-pain']) && isset($post_meta['sholder-pain'][0]) ? $post_meta['sholder-pain'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Energy: </span>
				<span class="inline-block">
					<?php print isset($post_meta['energy']) && isset($post_meta['energy'][0]) ? $post_meta['energy'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Time Awake: </span>
				<span class="inline-block">
					<?php print isset($post_meta['time-awake']) && isset($post_meta['time-awake'][0]) ? $post_meta['time-awake'][0] : ''; ?> hrs
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Sleeping HR: </span>
				<span class="inline-block">
					<?php print isset($post_meta['sleeping-hr']) && isset($post_meta['sleeping-hr'][0]) ? $post_meta['sleeping-hr'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Sleeping O2: </span>
				<span class="inline-block">
					<?php print isset($post_meta['sleeping-O2']) && isset($post_meta['sleeping-O2'][0]) ? $post_meta['sleeping-O2'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['weight']) && isset($post_meta['weight'][0]) ? $post_meta['weight'][0] : ''; ?> lbs
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Got stuff Done: </span>
				<span class="inline-block">
					<?php print isset($post_meta['got-stuff-done']) && isset($post_meta['got-stuff-done'][0]) ? $post_meta['got-stuff-done'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Cups of Coffee: </span>
				<span class="inline-block">
					<?php print isset($post_meta['cups-of-coffee']) && isset($post_meta['cups-of-coffee'][0]) ? $post_meta['cups-of-coffee'][0] : ''; ?>
				</span>
			</p>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
	
}