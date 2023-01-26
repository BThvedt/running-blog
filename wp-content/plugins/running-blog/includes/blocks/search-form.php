<?php

function rb_search_form_render_cb() {
	ob_start();

	?>
		<div>
			<form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
				<div class="relative focus-within:text-gray-400 float-right hidden lg:block">
					<span class="absolute inset-y-0 left-0 flex pl-2">
						<button
							type="submit"
							class="p-1 focus:outline-none focus:shadow-outline"
						>
							<svg
								fill="none"
								stroke="#fff"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								viewBox="0 0 24 24"
								class="w-6 h-6"
							>
								<path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
							</svg>
						</button>
					</span>
					<input
						id="non-front-page-search-bar"
						type="search"
						name="s"
						class="py-2 pr-2 outline-none text-white bg-slate-400 rounded-3xl pl-10"
						placeholder="<?php esc_html_e('Search', 'running-blog'); ?>"
						autocomplete="off"
						value="<?php the_search_query(); ?>"
					/>
				</div>
			</form>
		</div>
	<?php

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}