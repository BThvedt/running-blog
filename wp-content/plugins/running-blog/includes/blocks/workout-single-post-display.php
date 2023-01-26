<?php 

function rb_workout_single_post_display() {

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
				<span class="font-bold inline-block">Time of Day: </span>
				<span class="inline-block">
					<?php print isset($post_meta['workout-time-of-day']) && isset($post_meta['workout-time-of-day'][0]) ? $post_meta['workout-time-of-day'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pushup Type: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pushup-type']) && isset($post_meta['pushup-type'][0]) ? $post_meta['pushup-type'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pushup Sets: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pushup-sets']) && isset($post_meta['pushup-sets'][0]) ? $post_meta['pushup-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pushups Per set: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pushups']) && isset($post_meta['pushups'][0]) ? $post_meta['pushups'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pushup Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pushup-weight']) && isset($post_meta['pushup-weight'][0]) ? $post_meta['pushup-weight'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pullup Type: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pullup-type']) && isset($post_meta['pullup-type'][0]) ? $post_meta['pullup-type'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pullup Sets: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pullup-sets']) && isset($post_meta['pullup-sets'][0]) ? $post_meta['pullup-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pullups per Set: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pullups']) && isset($post_meta['pullups'][0]) ? $post_meta['pullups'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Pullup Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['pullup-weight']) && isset($post_meta['pullup-weight'][0]) ? $post_meta['pullup-weight'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Plank Type: </span>
				<span class="inline-block">
					<?php print isset($post_meta['plank-type']) && isset($post_meta['plank-type'][0]) ? $post_meta['plank-type'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Planks: </span>
				<span class="inline-block">
					<?php print isset($post_meta['plank-sets']) && isset($post_meta['plank-sets'][0]) ? $post_meta['plank-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Plank Length: </span>
				<span class="inline-block">
					<?php print isset($post_meta['plank-length']) && isset($post_meta['plank-length'][0]) ? $post_meta['plank-length'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Plank Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['plank-weight']) && isset($post_meta['plank-weight'][0]) ? $post_meta['plank-weight'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Deadlift Sets: </span>
				<span class="inline-block">
					<?php print isset($post_meta['deadlift-sets']) && isset($post_meta['deadlift-sets'][0]) ? $post_meta['deadlift-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Deadlifts per set: </span>
				<span class="inline-block">
					<?php print isset($post_meta['deadlift-set-number']) && isset($post_meta['deadlift-set-number'][0]) ? $post_meta['deadlift-set-number'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Deadlift Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['deadlift-weight']) && isset($post_meta['deadlift-weight'][0]) ? $post_meta['deadlift-weight'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Squat Sets: </span>
				<span class="inline-block">
					<?php print isset($post_meta['squat-sets']) && isset($post_meta['squat-sets'][0]) ? $post_meta['squat-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Squats per Set: </span>
				<span class="inline-block">
					<?php print isset($post_meta['squat-set-number']) && isset($post_meta['squat-set-number'][0]) ? $post_meta['squat-set-number'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Squat Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['squat-weight']) && isset($post_meta['squat-weight'][0]) ? $post_meta['squat-weight'][0] : ''; ?>
				</span>
			</p><br/><br/>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Jumping Jack Sets: </span>
				<span class="inline-block">
					<?php print isset($post_meta['jumping-jack-sets']) && isset($post_meta['jumping-jack-sets'][0]) ? $post_meta['jumping-jack-sets'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Jumping Jacks per Set: </span>
				<span class="inline-block">
					<?php print isset($post_meta['jumping-jack-set-number']) && isset($post_meta['jumping-jack-set-number'][0]) ? $post_meta['jumping-jack-set-number'][0] : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Jumping Jack Weight: </span>
				<span class="inline-block">
					<?php print isset($post_meta['jumping-jack-weight']) && isset($post_meta['jumping-jack-weight'][0]) ? $post_meta['jumping-jack-weight'][0] : ''; ?>
				</span>
			</p>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
	
}