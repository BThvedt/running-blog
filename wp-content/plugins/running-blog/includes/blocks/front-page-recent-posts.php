<?php 

function front_page_recent_posts($atts) {
	ob_start();

	$args = [
		'post_type' => 'post',
		'posts_per_page' => $atts['count']
	];

	$query = new WP_Query($args);
	$postCount = 0;

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			?>
				<article class="my-4 pb-4 <?php print $postCount !== ($atts['count'] - 1) ? 'border-b' : ''; ?>">
					<p class="float-right light-text handwriting"><?php print get_the_date('M j'); ?></p>
					 
					<?php 
						$postcategories = get_the_category();
						if ($postcategories):
					?>
						<h4 class="light-text handwriting">
							<?php 
								foreach($postcategories as $category) {
							?>
								<a href="<?php print get_term_link($category->term_id, $category->taxonomy ); ?>" class="light-text bold-link handwriting no-underline"><?php echo $category->name; ?></a>&nbsp;
							<?php 
								}
							?>
						</h4>
					<?php
						endif;
					?>

					<a href="<?php the_permalink(); ?>" class="hover:underline">
						<h3 class="small-title article-title my-2">
							<?php the_title(); ?>
						</h3>
						<p class="mb-2 article-blurb">
							<?php the_excerpt(); ?>
						</p>
					</a>

					<?php 
						$posttags = get_the_tags();
						if ($posttags): 
					?> 
						<p class="mt-2 no-underline">
							<?php
								foreach($posttags as $tag) {
							?>
								<a href="<?php print get_term_link($tag->term_id, $tag->taxonomy ); ?>" class="light-text subtle-site-link handwriting"><?php echo $tag->name; ?></a>&nbsp;
							<?php 
								}
							?>
						</p>
					<?php
						endif; // end printing tags
					?>

				</article>
			<?php
			$postCount += 1;
		}
	}

	wp_reset_postdata();

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}