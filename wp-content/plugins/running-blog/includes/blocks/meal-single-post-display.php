<?php

function rb_meal_single_post_display() {
	$postID = get_the_ID(); 

	$post_meta = get_post_meta($postID);

	ob_start();

	?>
		<div class="mt-4" style="width:250px;">

			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Meal Type: </span>
				<span class="inline-block">
					<?php print isset($post_meta['meal-type']) && isset($post_meta['meal-type'][0]) ? $post_meta['meal-type'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Date: </span>
				<span class="inline-block">
					<?php print isset($post_meta['date']) && isset($post_meta['date'][0]) ? $post_meta['date'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Description: </span>
				<span class="inline-block">
					<?php print isset($post_meta['description']) && isset($post_meta['description'][0]) ? $post_meta['description'][0] : ''; ?>
				</span>
			</p><br/><br/>
			
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Time of Day: </span>
				<span class="inline-block">
					<?php print isset($post_meta['meal-time-of-day']) && isset($post_meta['meal-time-of-day'][0]) ? $post_meta['meal-time-of-day'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Calories: </span>
				<span class="inline-block">
					<?php print isset($post_meta['calories']) && isset($post_meta['calories'][0]) ? $post_meta['calories'][0] : ''; ?>
				</span>
			</p><br/><br/>

			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Protein (g): </span>
				<span class="inline-block">
					<?php print isset($post_meta['protein']) && isset($post_meta['protein'][0]) ? $post_meta['protein'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Fat (g): </span>
				<span class="inline-block">
					<?php print isset($post_meta['fat']) && isset($post_meta['fat'][0]) ? $post_meta['fat'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Carbs (g): </span>
				<span class="inline-block">
					<?php print isset($post_meta['carbs']) && isset($post_meta['carbs'][0]) ? $post_meta['carbs'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Fiber (g): </span>
				<span class="inline-block">
					<?php print isset($post_meta['fiber']) && isset($post_meta['fiber'][0]) ? $post_meta['fiber'][0] : ''; ?>
				</span>
			</p><br/><br/>

			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Sugar (g): </span>
				<span class="inline-block">
					<?php print isset($post_meta['sugar']) && isset($post_meta['sugar'][0]) ? $post_meta['sugar'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Est. Salt (mg): </span>
				<span class="inline-block">
					<?php print isset($post_meta['salt']) && isset($post_meta['salt'][0]) ? $post_meta['salt'][0] : ''; ?>
				</span>
			</p>
		</div>
	<?php

	$output = ob_get_contents();
	ob_end_clean();

	return $output;

}