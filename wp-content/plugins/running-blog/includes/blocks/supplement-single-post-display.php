<?php 

function rb_supplement_single_post_display() {

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
				<span class="font-bold inline-block">Vitamin Mix: </span>
				<span class="inline-block">
					<?php print isset($post_meta['vitamin-mix']) && $post_meta['vitamin-mix'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Beta Alanine: </span>
				<span class="inline-block">
					<?php print isset($post_meta['beta-alanine']) && $post_meta['beta-alanine'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Betaine Anhydrous: </span>
				<span class="inline-block">
					<?php print isset($post_meta['betaine-anhydrous']) && $post_meta['betaine-anhydrous'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Potassium: </span>
				<span class="inline-block">
					<?php print isset($post_meta['potassium']) && $post_meta['potassium'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Vitamin K D3: </span>
				<span class="inline-block">
					<?php print isset($post_meta['vitamin-k-d3']) && $post_meta['vitamin-k-d3'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Iron: </span>
				<span class="inline-block">
					<?php print isset($post_meta['iron']) && $post_meta['iron'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Calcium Magnesium & Zinc: </span>
				<span class="inline-block">
					<?php print isset($post_meta['calcium-magnesium']) && $post_meta['calcium-magnesium'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Omega 3: </span>
				<span class="inline-block">
					<?php print isset($post_meta['omega-3']) && $post_meta['omega-3'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Creatine: </span>
				<span class="inline-block">
					<?php print isset($post_meta['creatine']) && $post_meta['creatine'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Joint Support Mix: </span>
				<span class="inline-block">
					<?php print isset($post_meta['joint-support-mix']) && $post_meta['joint-support-mix'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Collegen: </span>
				<span class="inline-block">
					<?php print isset($post_meta['collegen']) && $post_meta['collegen'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Probiotic: </span>
				<span class="inline-block">
					<?php print isset($post_meta['probiotic']) && $post_meta['probiotic'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Tumeric: </span>
				<span class="inline-block">
					<?php print isset($post_meta['tumeric']) && $post_meta['tumeric'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Berberine: </span>
				<span class="inline-block">
					<?php print isset($post_meta['berberine']) && $post_meta['berberine'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">CoQ-10: </span>
				<span class="inline-block">
					<?php print isset($post_meta['CoQ-10']) && $post_meta['CoQ-10'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Probiotic: </span>
				<span class="inline-block">
					<?php print isset($post_meta['probiotic']) && $post_meta['probiotic'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">L-Tyrosine: </span>
				<span class="inline-block">
					<?php print isset($post_meta['L-Tyrosine']) && $post_meta['L-Tyrosine'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">L-Theanine: </span>
				<span class="inline-block">
					<?php print isset($post_meta['L-Theanine']) && $post_meta['L-Theanine'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">5-HTP: </span>
				<span class="inline-block">
					<?php print isset($post_meta['5-HTP']) && $post_meta['5-HTP'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Nac: </span>
				<span class="inline-block">
					<?php print isset($post_meta['nac']) && $post_meta['nac'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">NMN: </span>
				<span class="inline-block">
					<?php print isset($post_meta['nmn']) && $post_meta['nmn'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Resveratrol: </span>
				<span class="inline-block">
					<?php print isset($post_meta['resveratrol']) && $post_meta['resveratrol'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Olive Oil: </span>
				<span class="inline-block">
					<?php print isset($post_meta['olive-oil']) && $post_meta['olive-oil'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
			<p class="mb-2 border-b p-1 flex justify-between">
				<span class="font-bold inline-block">Fisetin Quercetin: </span>
				<span class="inline-block">
					<?php print isset($post_meta['fisetin-quercetin']) && $post_meta['fisetin-quercetin'][0] === 'on' ? '&#10004;' : ''; ?>
				</span>
			</p>
		</div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
	
}