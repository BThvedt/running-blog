<?php 

function rb_plugins_options_page() {

	$options = get_option('rb_options');

	?>
		<div class="wrap">
			<h1><?php esc_html_e('Supplement Prices Per Serving', 'running-blog' ); ?></h1>
			<?php 
				if (isset($_GET['status']) && $_GET['status'] == 1) {
					?>
						<div class="notice notice-succes inline">
							<p>
								<?php esc_html_e('Options updated successfully','running-blog'); ?>
							</p>
						</div>
					<?php 
				}
			?>
			<form novalidate="novalidate" method="POST" action="admin-post.php">
				<input type="hidden" name="action" value="rb_save_options" />
				<?php wp_nonce_field('rb_options_verify'); ?>

				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
					<label for="vitamin-mix">Vitamin Mix</label>
						<input 
							type="number" 
							id="vitamin-mix" 
							name="vitamin-mix" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['vitamin-mix']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="creatine">Creatine</label>
						<input 
							type="number" 
							id="creatine"
							name="creatine" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['creatine']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="beta-alanine">Beta Alanine</label>
						<input 
							type="number" 
							id="beta-alanine" 
							name="beta-alanine" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['beta-alanine']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
					<label for="betaine-anhydrous">Betaine Anhydrous</label>
						<input 
							type="number" 
							id="betaine-anhydrous" 
							name="betaine-anhydrous" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['betaine-anhydrous']; ?>"
						>
					</div>
				</div>
				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
					<label for="potassium">Potassium</label>
						<input 
							type="number" 
							id="potassium" 
							name="potassium" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['potassium']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="vitamin-k-d3">Vitamin K + d3</label>
						<input 
							type="number" 
							id="vitamin-k-d3" 
							name="vitamin-k-d3" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['vitamin-k-d3']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="iron">Iron</label>
						<input 
							type="number" 
							id="iron" 
							name="iron"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['iron']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="calcium-magnesium">Calcium & Magnesium</label>
						<input 
							type="number" 
							id="calcium-magnesium" 
							name="calcium-magnesium"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['calcium-magnesium']; ?>"
						>
					</div>
				</div>
				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
						<label for="omega-3">Omega 3</label>
						<input 
							type="number" 
							id="omega-3" 
							name="omega-3"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['omega-3']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="joint-support-mix">Joint Support Mix</label>
						<input 
							type="number" 
							id="joint-support-mix" 
							name="joint-support-mix"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['joint-support-mix']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="collegen">Collegen</label>
						<input 
							type="number" 
							id="collegen" 
							name="collegen" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['collegen']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="probiotic">Probiotic</label>
						<input 
							type="number" 
							id="probiotic" 
							name="probiotic"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['probiotic']; ?>"
						>
					</div>
				</div>
				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
						<label for="tumeric">Tumeric</label>
						<input 
							type="number" 
							id="tumeric" 
							name="tumeric"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['tumeric']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="berberine">Berberine</label>
						<input 
							type="number" 
							id="berberine" 
							name="berberine" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['berberine']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="CoQ-10">CoQ-10</label>
						<input 
							type="number" 
							id="CoQ-10" 
							name="CoQ-10"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['CoQ-10']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="pomegranite-extract">Pomegranite Extract</label>
						<input 
							type="number" 
							id="pomegranite-extract" 
							name="pomegranite-extract"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['pomegranite-extract']; ?>"
						> 
					</div>
				</div>
				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
						<label for="L-Tyrosine">L-Tyrosine</label>
						<input 
							type="number" 
							id="L-Tyrosine" 
							name="L-Tyrosine" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['L-Tyrosine']; ?>" 
						> 
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="L-Theanine">L-Theanine</label>
						<input 
							type="number" 
							id="L-Theanine" 
							name="L-Theanine"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['L-Theanine']; ?>" 
						> 
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="5-HTP">5-HTP</label>
						<input 
							type="number" 
							id="5-HTP" 
							name="5-HTP"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['5-HTP']; ?>" 
						> 
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="nac">NAC</label>
						<input 
							type="number" 
							id="nac" 
							name="nac"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['nac']; ?>"
						> 
					</div>
				</div>
				<div class="rb-post-meta-row">
					<div class="rb-post-meta-wrapper small">
						<label for="nmn">NMN</label>
						<input 
							type="number" 
							id="nmn" 
							name="nmn"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['nmn']; ?>"
						>
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="resveratrol">Resveratrol</label>
						<input 
							type="number" 
							id="resveratrol" 
							name="resveratrol" 
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['resveratrol']; ?>"
						> 
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="olive-oil">Olive Oil</label>
						<input 
							type="number" 
							id="olive-oil" 
							name="olive-oil"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['olive-oil']; ?>"
						> 
					</div>
					<div class="rb-post-meta-wrapper small">
						<label for="fisetin-quercetin">Fisetin Quercetin</label>
						<input 
							type="number" 
							id="fisetin-quercetin" 
							name="fisetin-quercetin"  
							placeholder="0" 
							step="0.01" 
							value="<?php print $options['fisetin-quercetin']; ?>"
						> 
					</div>
				</div>
				<?php submit_button(); ?>
			</form>
		</div>
	<?php 
}