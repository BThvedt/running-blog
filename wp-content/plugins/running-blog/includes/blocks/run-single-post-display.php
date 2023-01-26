<?php 

function rb_run_single_post_display($atts, $content, $block) {

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
				<span class="font-bold inline-block">Run Distance: </span>
				<span class="inline-block">
					<?php print isset($post_meta['run-distance']) && isset($post_meta['run-distance'][0]) ? $post_meta['run-distance'][0] : ''; ?>
					miles
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Minutes per Mile: </span>
				<span class="inline-block">
					<?php print isset($post_meta['minutes-per-mile']) && isset($post_meta['minutes-per-mile'][0]) ? $post_meta['minutes-per-mile'][0] : ''; ?>
					mins
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Time of Day: </span>
				<span class="inline-block">
					<?php print isset($post_meta['run-time-of-day']) && isset($post_meta['run-time-of-day'][0]) ? $post_meta['run-time-of-day'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Vest Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['vest-weight']) && isset($post_meta['vest-weight'][0]) ? $post_meta['vest-weight'][0] : ''; ?>
					lbs
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Arm Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['arm-weight']) && isset($post_meta['arm-weight'][0]) ? $post_meta['arm-weight'][0] : ''; ?>
					lbs
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Leg Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['leg-weight']) && isset($post_meta['leg-weight'][0]) ? $post_meta['leg-weight'][0] : ''; ?>
					lbs
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Other Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['other-weight']) && isset($post_meta['other-weight'][0]) ? $post_meta['other-weight'][0] : ''; ?>
					lbs
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Leg Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['leg-weight']) && isset($post_meta['leg-weight'][0]) ? $post_meta['leg-weight'][0] : ''; ?>
					lbs
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Temperature: </span>
				<span class="inline-block">
					<?php print isset($post_meta['temperature']) && isset($post_meta['temperature'][0]) ? $post_meta['temperature'][0] : ''; ?>
					F
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Humidity: </span>
				<span class="inline-block">
					<?php print isset($post_meta['humidity']) && isset($post_meta['humidity'][0]) ? $post_meta['humidity'][0] : ''; ?>
					%
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Wind: </span>
				<span class="inline-block">
					<?php print isset($post_meta['wind']) && isset($post_meta['wind'][0]) ? $post_meta['wind'][0] : ''; ?>
					mph
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Weather Conditions: </span>
				<span class="inline-block">
					<?php print isset($post_meta['weather-conditions']) && isset($post_meta['weather-conditions'][0]) ? $post_meta['weather-conditions'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Ground Conditions: </span>
				<span class="inline-block">
					<?php print isset($post_meta['ground-conditions']) && isset($post_meta['ground-conditions'][0]) ? $post_meta['ground-conditions'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Ground Type: </span>
				<span class="inline-block">
					<?php print isset($post_meta['ground-type']) && isset($post_meta['ground-type'][0]) ? $post_meta['ground-type'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Avg Heart Rate: </span>
				<span class="inline-block">
					<?php print isset($post_meta['average-heart-rate']) && isset($post_meta['average-heart-rate'][0]) ? $post_meta['average-heart-rate'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Power: </span>
				<span class="inline-block">
					<?php print isset($post_meta['power']) && isset($post_meta['power'][0]) ? $post_meta['power'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Elevation Gained: </span>
				<span class="inline-block">
					<?php print isset($post_meta['elevation-gained']) && isset($post_meta['elevation-gained'][0]) ? $post_meta['elevation-gained'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Cadence: </span>
				<span class="inline-block">
					<?php print isset($post_meta['cadence']) && isset($post_meta['cadence'][0]) ? $post_meta['cadence'][0] : ''; ?>
					SPM
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Stride Length: </span>
				<span class="inline-block">
					<?php print isset($post_meta['stride-length']) && isset($post_meta['stride-length'][0]) ? $post_meta['stride-length'][0] : ''; ?>
					M
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Ground Contact: </span>
				<span class="inline-block">
					<?php print isset($post_meta['ground-contact']) && isset($post_meta['ground-contact'][0]) ? $post_meta['ground-contact'][0] : ''; ?>
					ms
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Vert Osc: </span>
				<span class="inline-block">
					<?php print isset($post_meta['vert-osc']) && isset($post_meta['vert-osc'][0]) ? $post_meta['vert-osc'][0] : ''; ?>
					cm
				</span>
			</p>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}