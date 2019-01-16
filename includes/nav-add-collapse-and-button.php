<?php
/**
 * Add Bootstrap Collapse and Toggler Button
 * to Primary nav.
 *
 * @package bootstrap4genesis
 */
add_filter( 'genesis_do_nav', 'bs4g_genesis_do_nav', 10, 3 );

function bs4g_genesis_do_nav( $nav_output, $nav, $args ) {
	$data_target = 'genesis-nav-' . $args['theme_location'];

	$pre = sprintf( '
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#%1$s" aria-controls="%1$s" aria-expanded="true" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<nav class="collapse navbar-collapse nav-primary" id="%1$s">
		',
		$data_target
	);

	$post = "\n</nav>\n";
	return $pre . $nav . $post;
}
