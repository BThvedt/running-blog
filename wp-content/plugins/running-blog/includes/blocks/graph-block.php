<?php

function rb_graph_render_cb() {
	ob_start();

	?>
		<div   class="graph mt-4">
        <p>Totally a graph</p>
    </div>
	<?php 

	$output = ob_get_contents();
	ob_end_clean();

	return $output;
}