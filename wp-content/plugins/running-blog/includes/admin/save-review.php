<?php

function rb_save_post_review($postID) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	$rating = get_post_meta($postID, 'rating', true );
	$rating = empty($rating) ? 0 : floatval($rating);

	update_post_meta($postID, 'rating', $rating);
}