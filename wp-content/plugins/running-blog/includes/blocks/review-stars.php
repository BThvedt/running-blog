<?php 

function rb_review_stars_render_cb($atts, $content, $block) {

	// $heading = esc_html($atts['content']);

	// if ($atts['showCategory']) {
	// 	$heading = get_the_archive_title();
	// }
	// print_r('???????????//');

	$postID = $block->context['postId'];
	$rating = get_post_meta( $postID, 'rating', true);

	ob_start();

	?>
		<div id="list-title" class="wp-block-udemy-plus-page-header">			 
			<h4 class="text-5xl marker light-text pb-2 border-b -mb-2 relative bottom-5">
				hello world <?php print $rating; ?>
			</h4>
			<div 
				id="review-rating" 
				class="review-rating" 
				data-post-id="<?php echo $postID; ?>" 
				data-rating="<?php echo $rating; ?>"
			>

			</div>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}