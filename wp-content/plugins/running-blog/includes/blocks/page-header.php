<?php 

function rb_page_header_render_cb($atts) {

	$heading = esc_html($atts['content']);

	if ($atts['showCategory']) {
		$heading = get_the_archive_title();
	}

	ob_start();

	?>
		<div id="list-title" class="wp-block-udemy-plus-page-header">			 
			<h4 class="text-5xl marker light-text pb-2 border-b -mb-2 relative bottom-5">
				<?php echo $heading; ?>
			</h4>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}