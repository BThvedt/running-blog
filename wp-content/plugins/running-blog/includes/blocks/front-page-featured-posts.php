<?php 

function rb_front_page_featured_posts($atts) {
	ob_start();

	$args = [
		'post_type' => 'post',
		'posts_per_page' => $atts['count'],
		'meta_key' => 'rb_featured',
		'meta_value' => true,
		'meta_compare' => '=',
		'orderby' => 'rand'
	];

	$query = new WP_Query($args);
	$postCount = 0;

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			if ($postCount === 0) {
				?>
					<article id="top-featured-post" class="my-4 pb-4 border-b">
						<figure
							class="w-full mb-4 max-md:h-64 max-lg:h-48 overflow-hidden relative thumbnail-figure shadow-hover"
						>
							<?php the_post_thumbnail('large', array('class' => 'object-cover w-full h-full')); ?>
							<!-- <img src="imgs/630x360.png" class="object-cover w-full h-full" /> -->

							<a href="<?php the_permalink(); ?>" class="absolute w-full h-full top-0 left-0">
								<div class="vignette-radial fade-on-hover" />
							</a>
						</figure>

						<?php 
							$postcategories = get_the_category();
							if ($postcategories):
						?>
							<h4>
								<?php 
									foreach($postcategories as $category) {
								?>
									<a href="<?php print get_term_link($category->term_id, $category->taxonomy ); ?>" class="light-text bold-link handwriting"><?php echo $category->name; ?></a>&nbsp;
								<?php 
									}
								?>
							</h4>
						<?php
							endif;
						?>
						<a href="<?php the_permalink(); ?>" class="hover:underline">
							<h3 class="text-3xl article-title font-bold my-2">
								<?php the_title(); ?>
							</h3>
							<p class="mb-2 text-lg">
								<?php the_excerpt(); ?>
							</p>
						</a>
						<?php 
							$posttags = get_the_tags();
							if ($posttags): 
						?> 
								<p>
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
			} else {
				
				?> 
					<article class="my-4 pb-4 <?php print $postCount !== ($atts['count'] - 1) ? 'border-b' : ''; ?> flex flex-col-reverse lg:flex-row">
						<div>
							<?php 
								$postcategories = get_the_category();
								if ($postcategories):
							?>
								<h4 class="-mt-1">
									<?php 
										foreach($postcategories as $category) {
									?>
										<a href="<?php print get_term_link($category->term_id, $category->taxonomy ); ?>" class="light-text bold-link handwriting"><?php echo $category->name; ?></a>&nbsp;
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
								<p class="mb-2 lg:mb-0 article-blurb">
									<?php the_excerpt(); ?>
								</p>
							</a>
 
							<?php 
								$posttags = get_the_tags();
								if ($posttags): 
							?> 
									<p class="lg:hidden">
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

						</div>
						<div class="lg:ml-4">
							<figure
								class="shadow-lg mb-3 md:max-lg:h-40 lg:h-40 lg:max-xl:w-48 xl:h-40 xl:w-56 md:shrink-0 overflow-hidden relative thumbnail-figure shadow-hover"
							>
								<?php the_post_thumbnail('large', array('class' => 'object-cover w-full h-full')); ?>

								<a href="<?php the_permalink(); ?>" class="absolute w-full h-full top-0 left-0">
									<div class="vignette-radial fade-on-hover" />
								</a>
							</figure>

							<?php  
								if ($posttags): 
							?> 
									<p class="hidden lg:block">
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

						</div>
					</article>
				<?php
			}
			$postCount += 1;
		}
	}

	wp_reset_postdata();

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}